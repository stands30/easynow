<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Quotation_model extends CI_Model
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
        $companyQuery = "SELECT  cmp_id as id,cmp_name as text,cmp_address,cmp_gst_no,cmp_stm_id FROM company where cmp_status IN ('".ACTIVE_STATUS."')  ";
        // and cmp_type_id='".$cmp_type."'
         if($lead !='' && $lead != 0)
        {
          $companyQuery.=" and cmp_id in (SELECT led_cmp_id from lead where led_id='".$lead."') ";
        }
       
        if($search !='')
        {
          $companyQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
        $companyQuery.="  ORDER BY cmp_name ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select','cmp_address'=>'','cmp_gst_no'=>'');
        $queryResult     = $this->home_model->executeSqlQuery($companyQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
      public function getPeopleDropdown($search='',$lead='',$company='')
    {
        $sqlQuery = "SELECT  ppl_id as id,CONCAT( (select gnp_name from gen_prm where gnp_group = 'ppl_title' and gnp_value = ppl_title_id) ,'',ppl_name)  as text FROM people where ppl_status IN ('".ACTIVE_STATUS."')  ";
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
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
       public function getLeadDropdown($search='')
    {
        $companyQuery = "SELECT  led_id as id,CONCAT(led_title,'-',ppl.ppl_name) as text,ppl.ppl_id,ppl.ppl_name,led_cmp_id,cmp_name led_cmp_name,cmp_address led_cmp_address,cmp_gst_no  led_cmp_gst_no,cmp_stm_id led_cmp_state,cmp_payment_terms led_cmp_payment_terms
         FROM lead led RIGHT JOIN people ppl on led.led_ppl_id=ppl.ppl_id RIGHT JOIN company cmp on led.led_cmp_id=cmp.cmp_id  where led_status ='".ACTIVE_STATUS."' and ppl_status ='".ACTIVE_STATUS."' ";
        if($search !='')
        {
          $companyQuery.=" and CONCAT(led_title,'-',ppl.ppl_name) LIKE '%".$search."%' ";
        }
        $companyQuery.="  ORDER BY CONCAT(led_title,'-',ppl.ppl_name) ASC";
        // ***** It is used to reset value of select2 ****** //
        // echo $companyQuery;
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($companyQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
        public function getProductDropdown($search='')
    {
        $dropdDownQuery = "SELECT  prd_id as id,prd_name as text,prd_price,prd_gst FROM product where prd_status IN ('".ACTIVE_STATUS."')  ";
        if($search !='')
        {
          $dropdDownQuery.=" and prd_name LIKE '%".$search."%' ";
        }
        $dropdDownQuery.="  ORDER BY prd_name ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($dropdDownQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    public function quotation_data_save()
    {
        // **** Quotation ***//
        $quotation_data = $_POST;
        $quotation_product = array();
        $qtn_id = $this->input->post('qtn_id');
        $delete_qtp_id = $this->input->post('delete_qtp_id');
        $qtn_total_old_value = $this->input->post('qtn_total_old_value');
        $qtn_total = $this->input->post('qtn_total');
        $quotation_product = $quotation_data['quotation_product'];
        unset($quotation_data['quotation_product']);
        unset($quotation_data['delete_qtp_id']);
        unset($quotation_data['qtn_total_old_value']);
        // $quotation_data['qtn_date']    = mysqlDateFormat($quotation_data['qtn_date']);
        if($qtn_id != '')
        {   
            $quotation_data['qtn_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $quotation_data['qtn_updt_dt'] = date('Y-m-d H:i:m');
            $qtn_data = $this->home_model->update('qtn_id',$qtn_id,$quotation_data,'quotation');
            if($qtn_total_old_value != $qtn_total)
            {
              $status_transact = array(
              'qtr_qtn_id' => $qtn_id,
              'qtr_field' => QUOTATION_TRANSACTION_FIELD_AMOUNT,
              'qtr_old_value' => $qtn_total_old_value,
              'qtr_new_value' => $qtn_total,
              'qtr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
              'qtr_crdt_dt' => date('Y-m-d H:i:s')
               );
               $this->home_model->insert('quotation_transaction',$status_transact); 
            }
        }
        else
        {
            $quotation_data['qtn_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $quotation_data['qtn_crdt_dt'] = date('Y-m-d H:i:m');
            $qtn_id = $this->home_model->insert('quotation',$quotation_data);
            $status_transact = array(
            'qtr_qtn_id' => $qtn_id,
            'qtr_field' => QUOTATION_TRANSACTION_FIELD_APPRVL_STATUS,
            'qtr_old_value' => 0,
            'qtr_new_value' => QUOTATION_APPROVAL_STATUS_DRAFT,
            'qtr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
            'qtr_crdt_dt' => date('Y-m-d H:i:s')
             );
             $this->home_model->insert('quotation_transaction',$status_transact); 

        }
        // **** Quotation ***//
        // **** Quotation Product ***//

        $quotation_product_insert = array();
        $quotation_product_update = array();
      for ($i=0; $i < count($quotation_product) ; $i++) { 
          $quotation_product[$i]['qtp_qtn_id'] = $qtn_id;
          if(isset($quotation_product[$i]['qtp_id']) && $quotation_product[$i]['qtp_id'] == '')
          {
                unset($quotation_product[$i]['qtp_id']);
                array_push($quotation_product_insert,$quotation_product[$i]);
               /* $quotation_product_insert = array(
                  'qtp_qtn_id'=>$qtn_id,
                  'qtp_prd_gst' => $quotation_product[$i]['qtp_prd_gst'],
                  'qtp_prd_id' => $quotation_product[$i]['qtp_prd_id'],
                  'qtp_desc' => $quotation_product[$i]['qtp_desc'],
                  'qtp_rate' => $quotation_product[$i]['qtp_rate'],
                  'qtp_qty' => $quotation_product[$i]['qtp_qty'],
                  'qtp_prd_amt' => $quotation_product[$i]['qtp_prd_amt'],
                  'qtp_disc_type' => $quotation_product[$i]['qtp_disc_type'],
                  'qtp_disc' => $quotation_product[$i]['qtp_disc'],
                  'qtp_disc_amt' => $quotation_product[$i]['qtp_disc_amt'],
                  'qtp_sub_total' => $quotation_product[$i]['qtp_sub_total'],
                  'qtp_tax' => $quotation_product[$i]['qtp_tax'],
                  'qtp_total' => $quotation_product[$i]['qtp_total'],
                  'qtp_qtn_id' => $quotation_product[$i]['qtp_qtn_id']
                );*/
          }
          else
          {
                array_push($quotation_product_update,$quotation_product[$i]);
          }
        }
        /*echo ' insert >> ';
        print_r($quotation_product_insert);
        echo ' insert << ';
        echo ' update >> ';
        print_r($quotation_product_update);
        echo ' update >> ';*/
            if(!empty($quotation_product_insert))
            {
                   $quotationProductData_insert                 = $this->db->insert_batch('quotation_product', $quotation_product_insert);
            }
            if(!empty($quotation_product_update))
            {
                 $quotationProductData_update                 = $this->db->update_batch('quotation_product', $quotation_product_update,'qtp_id');
            }
          if($delete_qtp_id)
          {
              
            $res_data = $this->home_model->deleteMultipleData('quotation_product','qtp_id',$delete_qtp_id,true);
          }
        // **** Quotation Product ***//
        return $qtn_id;
    }
     public function getBillingCompanyDropdown($search='')
    {
        $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
       
        $companyQuery = "SELECT  cmp_id as id,cmp_name as text,cmp_address,cmp_gst_no,cmp_stm_id cmp_state,cmp_payment_terms FROM company where cmp_status IN ('".ACTIVE_STATUS."')  and cmp_id IN (SELECT cpl_cmp_id from cmp_people where cpl_ppl_id ='".$ppl_id."' and cpl_status='".ACTIVE_STATUS."') ";
         
        if($search !='')
        {
          $companyQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
        $companyQuery.="  ORDER BY cmp_name ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($companyQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
         public function getCurrentBillingCompany()
    {
        $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
       
        $companyQuery = "SELECT cmp_id,cmp_name,cmp_stm_id cmp_state,cmp_payment_terms from company cmp RIGHT JOIN employee emp on cmp.cmp_id=emp.emp_cmp_id where emp_ppl_id='".$ppl_id."' and emp_status='".ACTIVE_STATUS."' and cmp_status='".ACTIVE_STATUS."' ";
        $queryResult     = $this->home_model->executeSqlQuery($companyQuery,'row');
        return $queryResult;
    }
     function getQuotationList($resType, $dataOptn = '')
  {
    $sqlQuery = "SELECT qtn_id,qtn_led_id,qtn_title,qtn_code,qtn_cmp_id,qtn_apprvl_status,
    FORMAT(qtn_total,2) qtn_total,
    IFNULL((DATE_FORMAT(qtn_date, '%d %M,%Y')),'') qtn_date_format,
    IFNULL((DATE_FORMAT(qtn_crdt_dt, '%d %M,%Y')),'') qtn_crdt_dt_format,
    qtn_crdt_dt,
    (SELECT gnp_name from gen_prm where gnp_group='qtn_approval_status' and gnp_value=qtn_apprvl_status ) qtn_apprvl_status_name,
    CONCAT((SELECT ppl_name from people where ppl_id=qtn_apprvl_by),' on '
    ,IFNULL((DATE_FORMAT(qtn_apprvl_date, '%d %M,%Y')),'')) qtn_approval_by,
    (SELECT CONCAT(led_title,'-',ppl.ppl_name) FROM lead led RIGHT JOIN people ppl on led.led_ppl_id=ppl.ppl_id where led_status IN ('".ACTIVE_STATUS."') and ppl_status IN ('".ACTIVE_STATUS."') and led_id = qtn_led_id) lead_name,
    (SELECT cmp_name from company where cmp_id=qtn_cmp_id and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) qtn_company " . checkPrivate('quotation-list', 'qtn_crdt_by') . "
     from quotation where qtn_status IN (" . ACTIVE_STATUS . ")";
   if(isset($dataOptn['lead']) && $dataOptn['lead'] != '')
   {
     $sqlQuery.=" and qtn_led_id = ".$dataOptn['lead']." ";
   }
    $sqlQuery.= " ORDER BY qtn_crdt_dt DESC";

    $queryResult = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
    return $queryResult;
  }
    public function getQuotationdataById($qtn_id,$mnu_name='')
    {
      $private_condition='';
      if ($mnu_name != '' && checkaccess($mnu_name, 'private')) {
      $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
      $private_condition =" and qtn_crdt_by ='".$ppl_id."' ";
     }
       $sqlQuery = "SELECT qtn_id,qtn_date,qtn_led_id,qtn_title,qtn_code,qtn_cmp_id,qtn_apprvl_status,
       qtn_billing_addr,qtn_billing_gst,qtn_billing_people, qtn_shipping_addr,qtn_shipping_gst,qtn_shipping_people,qtn_reference,qtn_payment_terms,qtn_internal_remark,qtn_external_remark,qtn_currency,qtn_shipping,qtn_tax,qtn_total,qtn_amt,qtn_disc_type,qtn_disc,qtn_disc_amt,qtn_sub_total,qtn_tax_percent,qtn_product_tax,
    FORMAT(qtn_tax,2) qtn_tax_format,qtn_billing_cmp_state,qtn_cmp_state,qtn_billing_cmp,qtn_tax_computation,
    FORMAT(qtn_total,2) qtn_total_format,
    qtn_crdt_dt,
    IFNULL((DATE_FORMAT(qtn_date, '%d %M,%Y')),'') qtn_date_format,
    IFNULL((DATE_FORMAT(qtn_crdt_dt, '%d %M,%Y')),'') qtn_crdt_dt_format,
    (SELECT gnp_name from gen_prm where gnp_group='qtn_approval_status' and gnp_value=qtn_apprvl_status ) qtn_apprvl_status_name,
    (SELECT gnp_description from gen_prm where gnp_group='qtn_approval_status' and gnp_value=qtn_apprvl_status ) qtn_apprvl_status_name_desc,
    (SELECT gnp_name from gen_prm where gnp_group='finance_currency' and gnp_value=qtn_currency LIMIT 1) qtn_currency_name,
    (SELECT gnp_name from gen_prm where gnp_group='finance_shipping' and gnp_value=qtn_shipping LIMIT 1) qtn_shipping_name,
    CONCAT((SELECT ppl_name from people where ppl_id=qtn_apprvl_by),' on '
    ,IFNULL((DATE_FORMAT(qtn_apprvl_date, '%d %M,%Y')),'')) qtn_approval_by,
    (SELECT CONCAT(led_title,'-',ppl.ppl_name) FROM lead led RIGHT JOIN people ppl on led.led_ppl_id=ppl.ppl_id where led_status IN ('".ACTIVE_STATUS."') and ppl_status IN ('".ACTIVE_STATUS."') and led_id = qtn_led_id) lead_name,
    (SELECT cmp_name from company where cmp_id=qtn_cmp_id and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) qtn_company,
    (SELECT cmp_address from company where cmp_id=qtn_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) qtn_blng_cmp_address,
    (SELECT cmp_gst_no from company where cmp_id=qtn_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) qtn_blng_cmp_gst_no,
    (SELECT cmp_name from company where cmp_id=qtn_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) qtn_billing_cmp_name,
    (SELECT cmp_logo from company where cmp_id=qtn_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) qtn_billing_cmp_logo,
    (SELECT ppl_name from people where ppl_id=qtn_crdt_by) qtn_crdt_by_name,
    (SELECT CONCAT((select gnp_name from gen_prm where gnp_group = 'ppl_title' and gnp_value = ppl_title_id),'',ppl_name) from people where ppl_id=qtn_billing_people) qtn_billing_people_name,
    (SELECT CONCAT((select gnp_name from gen_prm where gnp_group = 'ppl_title' and gnp_value = ppl_title_id),'',ppl_name) from people where ppl_id=qtn_shipping_people) qtn_shipping_people_name,
    (IFNULL((select MIN(qtn_id) from quotation where qtn_id > '" . $qtn_id . "' and qtn_status='" . ACTIVE_STATUS . "' ".$private_condition."),(SELECT MIN(qtn_id) from quotation where qtn_status='" . ACTIVE_STATUS . "' ".$private_condition."))) next_quotation,
    (IFNULL((select MAX(qtn_id) from quotation where qtn_id < '" . $qtn_id . "' and qtn_status='" . ACTIVE_STATUS . "' ".$private_condition."),(SELECT MAX(qtn_id) from quotation where qtn_status='" . ACTIVE_STATUS . "' ".$private_condition."))) prev_quotation,
    (SELECT gnp_name from gen_prm where gnp_group='finance_disc_type' and gnp_value=qtn_disc_type LIMIT 1) qtn_disc_type_name
    ".checkPrivate('quotation-list', 'qtn_crdt_by')."
     from quotation where qtn_status IN (" . ACTIVE_STATUS . ") and qtn_id='".$qtn_id."' ";
     //".$private_condition." ";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'row');
     return $queryResult;
    }
       public function getQuotationProductDataById($qtn_id)
    {
    
       $sqlQuery = "SELECT qtp_id,qtp_prd_gst,qtp_desc,qtp_rate,qtp_qty,qtp_prd_amt,qtp_disc,qtp_disc_amt,qtp_tax,qtp_sub_total,qtp_total,qtp_prd_id,qtp_disc_type,qtp_size,qtp_unit,
       FORMAT(qtp_disc_amt,2) qtp_disc_amt_format,FORMAT(qtp_tax,2) qtp_tax_format,FORMAT(qtp_sub_total,2) qtp_sub_total_format,FORMAT(qtp_total,2) qtp_total_format,
       (SELECT prd_name from product where prd_id=qtp_prd_id and prd_status='".ACTIVE_STATUS."') prd_name,
    (SELECT gnp_name from gen_prm where gnp_group='finance_disc_type' and gnp_value=qtp_disc_type LIMIT 1) qtp_disc_type_name,
    (SELECT gnp_name from gen_prm where gnp_group='".PRODUCT_SIZE."' and gnp_value=qtp_size LIMIT 1) qtp_size_name,
    (SELECT gnp_name from gen_prm where gnp_group='".PRODUCT_UNIT."' and gnp_value=qtp_unit LIMIT 1) qtp_unit_name 
          from quotation_product where qtp_status IN (" . ACTIVE_STATUS . ") and qtp_qtn_id='".$qtn_id."' ";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
     return $queryResult;
    }
       public function updateQuotationCustomData($customArray)
    {
      if(isset($_POST['field']) && $_POST['field']) 
      {
         $customData = array(
        $_POST['field'] => $_POST['field_value']
      );
      }else
      {
        $customData = $_POST;
      }
     if(!empty($customArray))
     {
        $customData = array_merge($customArray,$customData);

     }
      $qtn_id = $_POST['qtn_id'];
      if (!empty($customData))
      {
        $custmData = $this->home_model->update('qtn_id', $qtn_id, $customData, 'quotation');
      }
       if(isset($_POST['field']) && $_POST['field'] == 'qtn_apprvl_status') 
       {
          $status_transact = array(
            'qtr_qtn_id' => $qtn_id,
            'qtr_field' => QUOTATION_TRANSACTION_FIELD_APPRVL_STATUS,
            'qtr_old_value' => $_POST['old_value'],
            'qtr_new_value' => $_POST['field_value'],
            'qtr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
            'qtr_crdt_dt' => date('Y-m-d H:i:s')
             );
             $this->home_model->insert('quotation_transaction',$status_transact); 
        }
      return $custmData;
    }
    public function deleteQuotationProductType($ids = array(),$qtn_id = '')
  {
        $this->db->where_not_in('qtp_id',$ids);
        $this->db->where('qtp_qtn_id',$qtn_id);
        $this->db->delete('quotation_products');
        return $qtn_id;
  }
    public function getLeadData($lead_id)
    {
       $sqlQuery="SELECT CONCAT(led_title,'-',ppl_name) lead_title,ppl_id,CONCAT( (select gnp_name from gen_prm where gnp_group = 'ppl_title' and gnp_value = ppl_title_id) ,'',ppl_name) ppl_name,cmp_id,cmp_name,cmp_payment_terms,cmp_address,cmp_gst_no,cmp_stm_id,cmp_payment_terms from lead led RIGHT JOIN people ppl on led.led_ppl_id=ppl.ppl_id RIGHT JOIN company cmp on led.led_cmp_id=cmp.cmp_id where led_id='".$lead_id."' and led_status='".ACTIVE_STATUS."' and cmp_status='".ACTIVE_STATUS."' and ppl_status='".ACTIVE_STATUS."' ";
      /*  $companyQuery = "SELECT cmp_id,cmp_name,cmp_stm_id cmp_state,cmp_payment_terms,cmp_address,
cmp_gst_no from company cmp RIGHT JOIN lead led on cmp.cmp_id=led.led_cmp_id where led_id='".$lead_id."' and led_status='".ACTIVE_STATUS."' and cmp_status='".ACTIVE_STATUS."' ";*/
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'row');
        return $queryResult;
    }
   function checkQuotationUnique($field, $field_value, $qtn_id = '')
  {
    log_message('nexlog', 'quotation_model::checkQuotationUnique >>');
    $sqlQuery = "SELECT COUNT(*) as count FROM quotation where qtn_status='" . ACTIVE_STATUS . "' and  ".$field.'= \''. $field_value."' ";
    if ($qtn_id != '')
    {
      $sqlQuery.= " and qtn_id !='" . $qtn_id . "'";
    }

    log_message('nexlog', ' sqlQuery : ' . $sqlQuery);
    $row = $this->home_model->executeSqlQuery($sqlQuery, 'row');
    log_message('nexlog', ' row : ' . json_encode($row));
    log_message('nexlog', 'quotation_model::checkQuotationUnique <<');
    return $row;
  }
  function checkQuotationActivity($qtn_id = '')
  {
    log_message('nexlog', 'quotation_model::checkQuotationActivity >>');
    $sqlQuery = "SELECT qtr_old_value field_old_value,qtr_new_value field_new_value,qtr_crdt_by created_by,qtr_crdt_dt created_dt,
    (SELECT ppl_name from people where ppl_status='" . ACTIVE_STATUS . "' and ppl_id=qtr_crdt_by ) field_changed_by,
    if(qtr_old_value = 0 ,CONCAT(' created Quotation'),
    CASE
     when  qtr_field = ".QUOTATION_TRANSACTION_FIELD_APPRVL_STATUS."
      THEN
    CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='qtr_field' and gnp_value=qtr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',(SELECT gnp_name from gen_prm where gnp_group='qtn_approval_status' and gnp_value=qtr_old_value LIMIT 1),'</span> to <span class=\"activity-end-status\">',(SELECT gnp_name from gen_prm where gnp_group='qtn_approval_status' and gnp_value=qtr_new_value LIMIT 1),'</span>')
    when  qtr_field = ".QUOTATION_TRANSACTION_FIELD_AMOUNT."
      THEN
    CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='qtr_field' and gnp_value=qtr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',CONVERT(FORMAT(qtr_old_value, 2) using utf8),'</span> to <span class=\"activity-end-amount\">',CONVERT(FORMAT(qtr_new_value, 2) using utf8),'</span>')
    END ) field_changed_desc,'fas fa-info' field_icon,
      CONCAT('filter_',qtr_new_value) field_filter
    FROM quotation_transaction where qtr_status='" . ACTIVE_STATUS . "'  ";
    // echo ' $qtn_id : '.$qtn_id;
    if ($qtn_id != '')
    {
      $sqlQuery.= " and qtr_qtn_id ='" . $qtn_id . "'";
    }
      $sqlQuery.= " ORDER BY qtr_crdt_dt DESC";
    log_message('nexlog', ' sqlQuery : ' . $sqlQuery);
    $result = $this->home_model->executeSqlQuery($sqlQuery, 'result');
    log_message('nexlog', ' row : ' . json_encode($result));
    log_message('nexlog', 'quotation_model::checkQuotationActivity <<');
    return $result;
  }
}