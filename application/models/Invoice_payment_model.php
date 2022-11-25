<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Invoice_payment_model extends CI_Model
{
	/**
	* Instanciar o CI
	*/
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
       public function getGenPrmforDropdown($genPrmGroup,$search='')
    {
        $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='".$genPrmGroup."' and gnp_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $genPrmSqlQuery.=" and gnp_name LIKE '%".$search."%' ";
        }
        $genPrmSqlQuery.="  ORDER BY gnp_order ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
        if($search =='')
        {
          array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
      public function getCompanyDropdown($cmp_type,$search='',$lead='')
    {
        $customSqlQuery = "SELECT  cmp_id as id,cmp_name as text,
         (SELECT fnGetPeopleNameByID(cpl_ppl_id) from cmp_people where cpl_cmp_id=cmp_id and cpl_status='".ACTIVE_STATUS."' LIMIT 1) cpl_ppl_name,
        (SELECT cpl_ppl_id from cmp_people where cpl_cmp_id=cmp_id and cpl_status='".ACTIVE_STATUS."' LIMIT 1) cpl_ppl_id
        FROM company where cmp_status IN ('".ACTIVE_STATUS."')  ";
        // and cmp_type_id='".$cmp_type."'
         if($lead !='' && $lead != 0)
        {
          $customSqlQuery.=" and cmp_id in (SELECT led_cmp_id from lead where led_id='".$lead."') ";
        }
       
        if($search !='')
        {
          $customSqlQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
        $customSqlQuery.="  ORDER BY cmp_name ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select','cmp_address'=>'','cmp_gst_no'=>'');
        $queryResult     = $this->home_model->executeSqlQuery($customSqlQuery,'result');
        if($search =='')
        {
          array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
      public function getPeopleDropdown($search='',$lead='',$company='')
    {
        $sqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN ('".ACTIVE_STATUS."')  ";
         if($lead !='' && $lead != 0)
        {
          $sqlQuery.=" and ppl_id in (SELECT led_ppl_id from lead where led_id='".$lead."') ";
        }
         if($company !='' && $company != 0)
        {
          $sqlQuery.=" and ppl_id in (SELECT cpl_ppl_id from cmp_people where cpl_cmp_id='".$company."' and cpl_status='".ACTIVE_STATUS."') ";
        }
        if($search !='')
        {
          $sqlQuery.=" and ppl_name LIKE '%".$search."%' ";
        }
        $sqlQuery.="  ORDER BY ppl_name ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>' Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
        if($search =='')
        {
          array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    public function invoice_payment_data_save()
    {
       // **** invoice payment ***//
        $invoice_payment_data = $_POST;
        $invoice_payment_data['ipt_code'] =   $this->home_model->getNewCode(
                                        array(
                                          'column'  => 'ipt_code',
                                          'table'   => 'invoice_payment',
                                          'type'    => 'invoice_payment_code',
                                          'where'   => ''
                                        )
                                      );
        $invoice_payment_data['ipt_invoice_amt'] =  rtrim($invoice_payment_data['ipt_invoice_amt'],',');
        $invoice_payment_data['ipt_chq_date']    = mysqldate($invoice_payment_data['ipt_chq_date']);
        $invoice_payment_data['ipt_crdt_by']     = $this->session->userdata(PEOPLE_SESSION_ID);
        unset($invoice_payment_data['invoice_checkbox']);
        unset($invoice_payment_data['ipt_balance']);
        $ipt_id = $this->home_model->insert('invoice_payment',$invoice_payment_data); 

       
        $status_transact = array();
        $inv_id = $invoice_payment_data['ipt_invoice'];
        if($inv_id !='')
        {
              $inv_id = explode(',',$inv_id);
              for ($i=0; $i < count($inv_id) ; $i++) 
              { 
                if($inv_id[$i] != '')
                {
                    $sql = " UPDATE invoice set inv_payment_status='".INVOICE_PAYMENT_STATUS_PAID."' where inv_id=".$inv_id[$i].";";
                    $res = $this->db->query($sql);
                    $status_transact[] = array(
                      'itr_inv_id'    => $inv_id[$i],
                      'itr_field'     => INVOICE_TRANSACTION_FIELD_PAYMENT,
                      'itr_old_value' => INVOICE_PAYMENT_STATUS_PENDING,
                      'itr_new_value' => INVOICE_PAYMENT_STATUS_PAID,
                      'itr_crdt_by'   => $this->session->userdata(PEOPLE_SESSION_ID),
                      'itr_crdt_dt'   => date('Y-m-d H:i:s')
                       );
                // $status_transact_insert   = $this->home_model->insert('invoice_transaction', $status_transact);
                }
              }
              if(!empty($status_transact))
              {
                $status_transact_insert   = $this->db->insert_batch('invoice_transaction', $status_transact);
              }
        }
        // **** invoice payment ***//
       
        return $ipt_id;
    }
       public function getInvoiceDataByCompany($cmp_id)
    {
        $sqlQuery = "SELECT inv_code,inv_id,inv_total,FORMAT(inv_total,2) inv_total_format FROM invoice WHERE inv_status='".ACTIVE_STATUS."' and inv_cmp_id='".$cmp_id."' and inv_payment_status='".INVOICE_PAYMENT_STATUS_PENDING."' ";
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
        public function getCompanyDetailsById($cmp_id)
    {
        $customSqlQuery = "SELECT cmp_id,cmp_name,
        (SELECT fnGetPeopleNameByID(cpl_ppl_id) from cmp_people where cpl_cmp_id=cmp_id and cpl_status='".ACTIVE_STATUS."' LIMIT 1) cpl_ppl_name,
        (SELECT cpl_ppl_id from cmp_people where cpl_cmp_id=cmp_id and cpl_status='".ACTIVE_STATUS."' LIMIT 1) cpl_ppl_id,
        (SELECT  IFNULL(SUM(ipt_total-SUM_OF_LIST(ipt_invoice_amt)),0) FROM invoice_payment WHERE ipt_cmp_id=cmp_id and ipt_status='".ACTIVE_STATUS."')
        on_acc
          from company cmp  where cmp_status='".ACTIVE_STATUS."' and cmp_id='".$cmp_id."'";
        $queryResult     = $this->home_model->executeSqlQuery($customSqlQuery,'row');
        return $queryResult;
    }
        public function getInvoicePaymentDataById($mnu_name,$ipt_id)
    {
        $customSqlQuery = "SELECT  `ipt_id`,`ipt_code`,  `ipt_cmp_id`,  `ipt_ppl_id`,  `ipt_date`,  `ipt_mode`,  `ipt_bank`,  `ipt_branch`,  `ipt_chq_date`,fnNextasyDate(`ipt_date`) ipt_date_format,fnNextasyDate(`ipt_chq_date`) ipt_chq_date_format,  `ipt_payment_no`,  `ipt_amt`,  `ipt_disc`,  `ipt_sub_total`,  `ipt_tds_percent`,  `ipt_tds_amt`,  `ipt_total`,ipt_on_acc,  `ipt_invoice`,SUM_OF_LIST(ipt_invoice_amt) ipt_invoice_amt,ipt_status,FORMAT(`ipt_amt`,2) ipt_amt_format,FORMAT(`ipt_tds_amt`,2) ipt_tds_amt_format,FORMAT(`ipt_total`,2) ipt_total_format,FORMAT(`ipt_disc`,2) ipt_disc_format,FORMAT(`ipt_sub_total`,2) ipt_sub_total_format,FORMAT(`ipt_on_acc`,2) ipt_on_acc_format,ipt_managed_by,
        fnGetPeopleNameByID(`ipt_ppl_id`) ppl_name,
        fnGetPeopleNameByID(`ipt_crdt_by`) ipt_crdt_by_name,
        fnGetPeopleNameByID(`ipt_managed_by`) ipt_managed_by_name,
        fnNextasyDate(`ipt_crdt_dt`) ipt_crdt_dt_format,
        (SELECT gnp_name from gen_prm where gnp_group='finance_payment_mode' and gnp_value=ipt_mode LIMIT 1 ) ipt_mode_name,
        (SELECT cmp_name from company where cmp_id=ipt_cmp_id ) cmp_name,
        (SELECT GROUP_CONCAT(inv_code SEPARATOR ',') FROM invoice WHERE FIND_IN_SET(inv_id,ipt_invoice)) ipt_invoice_detail,
        (SELECT GROUP_CONCAT(inv_total SEPARATOR ',') FROM invoice WHERE FIND_IN_SET(inv_id,ipt_invoice)) ipt_invoice_amt,
        (IFNULL((select MIN(ipt_id) from invoice_payment where ipt_id > '" . $ipt_id . "' and ipt_status='" . ACTIVE_STATUS . "'),(SELECT MIN(ipt_id) from invoice_payment where ipt_status='" . ACTIVE_STATUS . "'))) next_ipt_id,
          (IFNULL((select MAX(ipt_id) from invoice_payment where ipt_id < '" . $ipt_id . "' and ipt_status='" . ACTIVE_STATUS . "'),(SELECT MAX(ipt_id) from invoice_payment where ipt_status='" . ACTIVE_STATUS . "'))) prev_ipt_id
         
         " . checkPrivate($mnu_name, 'ipt_crdt_by') . "  from invoice_payment ipt where ipt_status='".ACTIVE_STATUS."' and ipt_id='".$ipt_id."'";
        $queryResult     = $this->home_model->executeSqlQuery($customSqlQuery,'row');
        return $queryResult;
    }
      function invoicePaymentlist($resType, $dataOptn = '')
    {
      $sqlQuery = "SELECT `ipt_id`,`ipt_code`,  `ipt_cmp_id`,  `ipt_ppl_id`,  `ipt_date`,  `ipt_mode`,  `ipt_bank`,  `ipt_branch`,  `ipt_chq_date`,fnNextasyDate(`ipt_date`) ipt_date_format,fnNextasyDate(`ipt_chq_date`) ipt_chq_date_format,  `ipt_payment_no`,  `ipt_amt`,  `ipt_disc`,  `ipt_sub_total`,  `ipt_tds_percent`,  `ipt_tds_amt`,  `ipt_total`,  `ipt_invoice`,SUM_OF_LIST(ipt_invoice_amt) ipt_invoice_amt,ipt_status,FORMAT(`ipt_amt`,2) ipt_amt_format,FORMAT(`ipt_tds_amt`,2) ipt_tds_amt_format,FORMAT(`ipt_total`,2) ipt_total_format,FORMAT(`ipt_disc`,2) ipt_disc_format,ipt_managed_by,
        fnGetPeopleNameByID(`ipt_ppl_id`) ppl_name,
        fnGetPeopleNameByID(`ipt_crdt_by`) ipt_crdt_by_name,
        fnGetPeopleNameByID(`ipt_managed_by`) ipt_managed_by_name,
        fnNextasyDate(`ipt_crdt_dt`) ipt_crdt_dt_format,
        (SELECT gnp_name from gen_prm where gnp_group='finance_payment_mode' and gnp_value=ipt_mode LIMIT 1 ) ipt_mode_name,
        (SELECT cmp_name from company where cmp_id=ipt_cmp_id ) cmp_name
         ".checkPrivate($dataOptn['mnu_name'], 'ipt_crdt_by')." from invoice_payment where ipt_status='".ACTIVE_STATUS."' ";
        $sqlQuery.= " ORDER BY ipt_crdt_dt DESC";

      $queryResult = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
      return $queryResult;
    }
       function getInvoicePaymentClosingBalance($cmp_id)
    {
      $sqlQuery = "SELECT ((SELECT SUM(inv_total) from invoice WHERE inv_status='".ACTIVE_STATUS."' AND inv_cmp_id='".$cmp_id."')-(SELECT IFNULL(SUM(ipt_total),0) from invoice_payment where ipt_status='".ACTIVE_STATUS."' AND ipt_cmp_id='".$cmp_id."')) closing_bal ";
      $queryResult = $this->home_model->executeSqlQuery($sqlQuery,'row');
      return isset($queryResult->closing_bal) ? $queryResult->closing_bal:'';
    }
       public function updateCustomData()
    {
      $delete_func = $this->input->get('delete_func');
      if(isset($_POST['field']) && $_POST['field']) 
      {
         $customData = array(
           $_POST['field'] => $_POST['field_value']
         );
      }else
      {
        $customData = $_POST;
      }
      $ipt_id = $_POST['ipt_id'];
      if (!empty($customData))
      {
        $custmData = $this->home_model->update('ipt_id', $ipt_id, $customData, 'invoice_payment');
      }
      if($delete_func !='' && $delete_func =='true')
      {
              $status_transact = array();
              $inv_id = $_POST['ipt_invoice'];
              if($inv_id !='')
              {
                    $inv_id = explode(',',$inv_id);
                    for ($i=0; $i < count($inv_id) ; $i++) 
                    { 
                      if($inv_id[$i] != '')
                      {
                          $sql = " UPDATE invoice set inv_payment_status='".INVOICE_PAYMENT_STATUS_PENDING."' where inv_id=".$inv_id[$i].";";
                          $res = $this->db->query($sql);
                          $status_transact[] = array(
                            'itr_inv_id'    => $inv_id[$i],
                            'itr_field'     => INVOICE_TRANSACTION_FIELD_PAYMENT,
                            'itr_old_value' => INVOICE_PAYMENT_STATUS_PAID,
                            'itr_new_value' => INVOICE_PAYMENT_STATUS_PENDING,
                            'itr_crdt_by'   => $this->session->userdata(PEOPLE_SESSION_ID),
                            'itr_crdt_dt'   => date('Y-m-d H:i:s')
                             );
                      // $status_transact_insert   = $this->home_model->insert('invoice_transaction', $status_transact);
                      }
                    }
                    if(!empty($status_transact))
                    {
                      $status_transact_insert   = $this->db->insert_batch('invoice_transaction', $status_transact);
                    }
              }
      }
      return $custmData;
    }
          function getInvoiceListByInvoiceId($resType, $dataOptn = '')
    {
      $invoice =0;
      if(isset($dataOptn['invoice']) && $dataOptn['invoice'] !='')
      {
        $invoice =isset($dataOptn['invoice']) ? rtrim($dataOptn['invoice'],','):0;
      }
       $sqlQuery = "SELECT inv_title,fnNextasyDate(`inv_due_date`) inv_due_date,`inv_code`,`inv_total`,FORMAT(inv_total,2) inv_total_format, `inv_id` from invoice where inv_id IN (".$invoice.")";
        // $sqlQuery.= " ORDER BY inv_crdt_dt DESC";

      $queryResult = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
      return $queryResult;
    }
}