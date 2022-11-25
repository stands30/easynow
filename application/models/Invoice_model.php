<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Invoice_model extends CI_Model
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
        $companyQuery = "SELECT  cmp_id as id,cmp_name as text,cmp_address,cmp_gst_no,cmp_stm_id,
        (SELECT cpl_ppl_id from cmp_people where cpl_cmp_id=cmp_id and cpl_status='".ACTIVE_STATUS."' LIMIT 1) cpl_id,
        (SELECT fnGetPeopleNameByID(cpl_ppl_id) from cmp_people where cpl_cmp_id=cmp_id and cpl_status='".ACTIVE_STATUS."' LIMIT 1) cpl_name
        FROM company where cmp_status IN ('".ACTIVE_STATUS."')  ";
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
        $sqlQuery = "SELECT  ppl_id as id,fnGetPeopleNameByID(ppl_id) as text FROM people where ppl_status IN ('".ACTIVE_STATUS."')  ";
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
    public function invoice_data_save()
    {
       // **** invoice ***//
        $invoice_data = $_POST;
        $invoice_product = array();
        $inv_id = $this->input->post('inv_id');
        $delete_inp_id = $this->input->post('delete_inp_id');
        $inv_total_old_value = $this->input->post('inv_total_old_value');
        $inv_total = $this->input->post('inv_total');
        $invoice_product = $invoice_data['invoice_product'];
        unset($invoice_data['invoice_product']);
        unset($invoice_data['delete_inp_id']);
        unset($invoice_data['inv_total_old_value']);
        // $invoice_data['inv_date']    = mysqlDateFormat($invoice_data['inv_date']);
        if($inv_id != '')
        {   
            $invoice_data['inv_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $invoice_data['inv_updt_dt'] = date('Y-m-d H:i:m');
            $inv_data = $this->home_model->update('inv_id',$inv_id,$invoice_data,'invoice');
             if($inv_total_old_value != $inv_total)
            {
              $status_transact = array(
              'itr_inv_id'    => $inv_id,
              'itr_field'     => INVOICE_TRANSACTION_FIELD_AMOUNT,
              'itr_old_value' => $inv_total_old_value,
              'itr_new_value' => $inv_total,
              'itr_crdt_by'   => $this->session->userdata(PEOPLE_SESSION_ID),
              'itr_crdt_dt'   => date('Y-m-d H:i:s')
               );
               $cmp_status = $this->updateCompanyIfNotAccount($invoice_data['inv_cmp_id']);
               $this->home_model->insert('invoice_transaction',$status_transact); 
            }
        }
        else
        {
            $invoice_data['inv_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $invoice_data['inv_crdt_dt'] = date('Y-m-d H:i:m');
            $inv_id = $this->home_model->insert('invoice',$invoice_data);
            $status_transact = array(
            'itr_inv_id'    => $inv_id,
            'itr_field'     => INVOICE_TRANSACTION_FIELD_APPRVL_STATUS,
            'itr_old_value' => 0,
            'itr_new_value' => INVOICE_APPROVAL_STATUS_DRAFT,
            'itr_crdt_by'   => $this->session->userdata(PEOPLE_SESSION_ID),
            'itr_crdt_dt'   => date('Y-m-d H:i:s')
             );
             $this->home_model->insert('invoice_transaction',$status_transact); 

        }
        // **** invoice ***//
        // **** invoice Product ***//

        $invoice_product_insert = array();
        $invoice_product_update = array();
      for ($i=0; $i < count($invoice_product) ; $i++) { 
          $invoice_product[$i]['inp_inv_id'] = $inv_id;
          if(isset($invoice_product[$i]['inp_id']) && $invoice_product[$i]['inp_id'] == '')
          {
                unset($invoice_product[$i]['inp_id']);
                array_push($invoice_product_insert,$invoice_product[$i]);
               /* $invoice_product_insert = array(
                  'inp_inv_id'=>$inv_id,
                  'inp_prd_gst' => $invoice_product[$i]['inp_prd_gst'],
                  'inp_prd_id' => $invoice_product[$i]['inp_prd_id'],
                  'inp_desc' => $invoice_product[$i]['inp_desc'],
                  'inp_rate' => $invoice_product[$i]['inp_rate'],
                  'inp_qty' => $invoice_product[$i]['inp_qty'],
                  'inp_prd_amt' => $invoice_product[$i]['inp_prd_amt'],
                  'inp_disc_type' => $invoice_product[$i]['inp_disc_type'],
                  'inp_disc' => $invoice_product[$i]['inp_disc'],
                  'inp_disc_amt' => $invoice_product[$i]['inp_disc_amt'],
                  'inp_sub_total' => $invoice_product[$i]['inp_sub_total'],
                  'inp_tax' => $invoice_product[$i]['inp_tax'],
                  'inp_total' => $invoice_product[$i]['inp_total'],
                  'inp_inv_id' => $invoice_product[$i]['inp_inv_id']
                );*/
          }
          else
          {
                array_push($invoice_product_update,$invoice_product[$i]);
          }
        }
        /*echo ' insert >> ';
        print_r($invoice_product_insert);
        echo ' insert << ';
        echo ' update >> ';
        print_r($invoice_product_update);
        echo ' update >> ';*/
            if(!empty($invoice_product_insert))
            {
                   $invoiceProductData_insert   = $this->db->insert_batch('invoice_product', $invoice_product_insert);
            }
            if(!empty($invoice_product_update))
            {
                 $invoiceProductData_update     = $this->db->update_batch('invoice_product', $invoice_product_update,'inp_id');
            }
          if($delete_inp_id)
          {
              
            $res_data = $this->home_model->deleteMultipleData('invoice_product','inp_id',$delete_inp_id,true);
          }
        // **** invoice Product ***//
        return $inv_id;
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
     function getInvoiceList($resType, $dataOptn = '')
  {
    $sqlQuery = "SELECT inv_id,inv_led_id,inv_title,inv_code,inv_cmp_id,inv_apprvl_status,
    FORMAT(inv_total,2) inv_total,
    IFNULL((DATE_FORMAT(inv_date, '%d %M,%Y')),'') inv_date_format,
    IFNULL((DATE_FORMAT(inv_crdt_dt, '%d %M,%Y')),'') inv_crdt_dt_format,
    fnNextasyDate(inv_due_date) inv_due_date_format,
    inv_crdt_dt,
    (SELECT gnp_name from gen_prm where gnp_group='".INVOICE_STATUS."' and gnp_value=inv_apprvl_status ) inv_apprvl_status_name,
    CONCAT((SELECT ppl_name from people where ppl_id=inv_apprvl_by),' on '
    ,IFNULL((DATE_FORMAT(inv_apprvl_date, '%d %M,%Y')),'')) inv_approval_by,
    (SELECT CONCAT(led_title,'-',ppl.ppl_name) FROM lead led RIGHT JOIN people ppl on led.led_ppl_id=ppl.ppl_id where led_status IN ('".ACTIVE_STATUS."') and ppl_status IN ('".ACTIVE_STATUS."') and led_id = inv_led_id) lead_name,
    (SELECT cmp_name from company where cmp_id=inv_cmp_id and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) inv_company " . checkPrivate('invoice-list', 'inv_crdt_by') . "
     from invoice where inv_status IN (" . ACTIVE_STATUS . ")";
   if(isset($dataOptn['lead']) && $dataOptn['lead'] != '')
   {
     $sqlQuery.=" and inv_led_id = ".$dataOptn['lead']." ";
   }
    $sqlQuery.= " ORDER BY inv_crdt_dt DESC";

    $queryResult = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
    return $queryResult;
  }
    public function getinvoicedataById($inv_id,$mnu_name='')
    {
      $private_condition='';
      if ($mnu_name != '' && checkaccess($mnu_name, 'private')) {
      $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
      $private_condition =" and inv_crdt_by ='".$ppl_id."' ";
     }
       $sqlQuery = "SELECT inv_id,inv_date,inv_led_id,inv_title,inv_code,inv_cmp_id,inv_apprvl_status,inv_due_date,
       inv_billing_addr,inv_billing_gst,inv_billing_people, inv_shipping_addr,inv_shipping_gst,inv_shipping_people,inv_reference,inv_payment_terms,inv_internal_remark,inv_external_remark,inv_currency,inv_shipping,inv_tax,inv_total,inv_amt,inv_disc_type,inv_disc,inv_disc_amt,inv_sub_total,inv_tax_percent,inv_product_tax,
    FORMAT(inv_tax,2) inv_tax_format,inv_billing_cmp_state,inv_cmp_state,inv_billing_cmp,inv_tax_computation,
    FORMAT(inv_total,2) inv_total_format,inv_payment_status,
    inv_crdt_dt,
    fnNextasyDate(inv_due_date) inv_due_date_format,
    fnNextasyDate(inv_date) inv_date_format,
    fnNextasyDate(inv_crdt_dt) inv_crdt_dt_format,
    (SELECT gnp_name from gen_prm where gnp_group='".INVOICE_STATUS."' and gnp_value=inv_apprvl_status ) inv_apprvl_status_name,
    (SELECT gnp_name from gen_prm where gnp_group='finance_currency' and gnp_value=inv_currency LIMIT 1) inv_currency_name,
    (SELECT gnp_name from gen_prm where gnp_group='finance_shipping' and gnp_value=inv_shipping LIMIT 1) inv_shipping_name,
    CONCAT((SELECT ppl_name from people where ppl_id=inv_apprvl_by),' on '
    ,IFNULL((DATE_FORMAT(inv_apprvl_date, '%d %M,%Y')),'')) inv_approval_by,
    (SELECT CONCAT(led_title,'-',ppl.ppl_name) FROM lead led RIGHT JOIN people ppl on led.led_ppl_id=ppl.ppl_id where led_status IN ('".ACTIVE_STATUS."') and ppl_status IN ('".ACTIVE_STATUS."') and led_id = inv_led_id) lead_name,
    (SELECT cmp_name from company where cmp_id=inv_cmp_id and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) inv_company,
    (SELECT cmp_address from company where cmp_id=inv_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) inv_blng_cmp_address,
    (SELECT cmp_gst_no from company where cmp_id=inv_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) inv_blng_cmp_gst_no,
    (SELECT cmp_name from company where cmp_id=inv_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) inv_billing_cmp_name,
    (SELECT cmp_logo from company where cmp_id=inv_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) inv_billing_cmp_logo,
    (SELECT ppl_name from people where ppl_id=inv_crdt_by) inv_crdt_by_name,
    (SELECT CONCAT((select gnp_name from gen_prm where gnp_group = 'ppl_title' and gnp_value = ppl_title_id),'',ppl_name) from people where ppl_id=inv_billing_people) inv_billing_people_name,
    (SELECT CONCAT((select gnp_name from gen_prm where gnp_group = 'ppl_title' and gnp_value = ppl_title_id),'',ppl_name) from people where ppl_id=inv_shipping_people) inv_shipping_people_name,
    (IFNULL((select MIN(inv_id) from invoice where inv_id > '" . $inv_id . "' and inv_status='" . ACTIVE_STATUS . "' ".$private_condition."),(SELECT MIN(inv_id) from invoice where inv_status='" . ACTIVE_STATUS . "' ".$private_condition."))) next_invoice,
    (IFNULL((select MAX(inv_id) from invoice where inv_id < '" . $inv_id . "' and inv_status='" . ACTIVE_STATUS . "' ".$private_condition."),(SELECT MAX(inv_id) from invoice where inv_status='" . ACTIVE_STATUS . "' ".$private_condition."))) prev_invoice,
    getGenPrmValueByGroup('inv_payment_status',inv_payment_status) inv_payment_status_name,
    (SELECT gnp_name from gen_prm where gnp_group='finance_disc_type' and gnp_value=inv_disc_type LIMIT 1) inv_disc_type_name,
    (SELECT gnp_description from gen_prm where gnp_group='inv_payment_status' and gnp_value=inv_payment_status LIMIT 1) inv_payment_status_desc
    ".checkPrivate('invoice-list', 'inv_crdt_by')."

     from invoice where inv_status IN (" . ACTIVE_STATUS . ") and inv_id='".$inv_id."' "; 
     //".$private_condition." ";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'row');
     return $queryResult;
    }
       public function getinvoiceProductDataById($inv_id)
    {
    
       $sqlQuery = "SELECT inp_id,inp_prd_gst,inp_desc,inp_rate,inp_qty,inp_prd_amt,inp_disc,inp_disc_amt,inp_tax,inp_sub_total,inp_total,inp_prd_id,inp_disc_type,FORMAT(inp_prd_amt,2) inp_prd_amt_format,inp_size,inp_unit,
       FORMAT(inp_disc_amt,2) inp_disc_amt_format,FORMAT(inp_tax,2) inp_tax_format,FORMAT(inp_sub_total,2) inp_sub_total_format,FORMAT(inp_total,2) inp_total_format,
       (SELECT prd_name from product where prd_id=inp_prd_id and prd_status='".ACTIVE_STATUS."') prd_name,
    (SELECT gnp_name from gen_prm where gnp_group='finance_disc_type' and gnp_value=inp_disc_type LIMIT 1) inp_disc_type_name,
    (SELECT gnp_name from gen_prm where gnp_group='".PRODUCT_SIZE."' and gnp_value=inp_size LIMIT 1) inp_size_name,
    (SELECT gnp_name from gen_prm where gnp_group='".PRODUCT_UNIT."' and gnp_value=inp_unit LIMIT 1) inp_unit_name
          from invoice_product where inp_status IN (" . ACTIVE_STATUS . ") and inp_inv_id='".$inv_id."' ";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
     return $queryResult;
    }
       public function updateCustomData($customArray)
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
      $inv_id = $_POST['inv_id'];
      if (!empty($customData))
      {
        $custmData = $this->home_model->update('inv_id', $inv_id, $customData, 'invoice');
      }
       if(isset($_POST['field']) && $_POST['field'] == 'inv_apprvl_status') 
       {
          $status_transact = array(
            'itr_inv_id' => $inv_id,
            'itr_field' => INVOICE_TRANSACTION_FIELD_APPRVL_STATUS,
            'itr_old_value' => $_POST['old_value'],
            'itr_new_value' => $_POST['field_value'],
            'itr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
            'itr_crdt_dt' => date('Y-m-d H:i:s')
             );
             $this->home_model->insert('invoice_transaction',$status_transact); 
        }
      return $custmData;
    }
    public function deleteinvoiceProductType($ids = array(),$inv_id = '')
  {
        $this->db->where_not_in('inp_id',$ids);
        $this->db->where('inp_inv_id',$inv_id);
        $this->db->delete('invoice_products');
        return $inv_id;
  }
    public function getLeadData($lead_id)
    {
       $sqlQuery="SELECT CONCAT(led_title,'-',ppl_name) lead_title,ppl_id,CONCAT( (select gnp_name from gen_prm where gnp_group = 'ppl_title' and gnp_value = ppl_title_id) ,'',ppl_name) ppl_name,cmp_id,cmp_name,cmp_payment_terms,cmp_address,cmp_gst_no,cmp_stm_id,cmp_payment_terms from lead led RIGHT JOIN people ppl on led.led_ppl_id=ppl.ppl_id RIGHT JOIN company cmp on led.led_cmp_id=cmp.cmp_id where led_id='".$lead_id."' and led_status='".ACTIVE_STATUS."' and cmp_status='".ACTIVE_STATUS."' and ppl_status='".ACTIVE_STATUS."' ";
      /*  $companyQuery = "SELECT cmp_id,cmp_name,cmp_stm_id cmp_state,cmp_payment_terms,cmp_address,
cmp_gst_no from company cmp RIGHT JOIN lead led on cmp.cmp_id=led.led_cmp_id where led_id='".$lead_id."' and led_status='".ACTIVE_STATUS."' and cmp_status='".ACTIVE_STATUS."' ";*/
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'row');
        return $queryResult;
    }
   function checkinvoiceUnique($field, $field_value, $inv_id = '')
  {
    log_message('nexlog', 'invoice_model::checkinvoiceUnique >>');
    $sqlQuery = "SELECT COUNT(*) as count FROM invoice where inv_status='" . ACTIVE_STATUS . "' and  ".$field.'= \''. $field_value."' ";
    if ($inv_id != '')
    {
      $sqlQuery.= " and inv_id !='" . $inv_id . "'";
    }

    log_message('nexlog', ' sqlQuery : ' . $sqlQuery);
    $row = $this->home_model->executeSqlQuery($sqlQuery, 'row');
    log_message('nexlog', ' row : ' . json_encode($row));
    log_message('nexlog', 'invoice_model::checkinvoiceUnique <<');
    return $row;
  }
  function getActivity($inv_id = '')
  {
    log_message('nexlog', 'invoice_model::checkinvoiceActivity >>');
    $sqlQuery = "SELECT itr_old_value field_old_value,itr_new_value field_new_value,itr_crdt_by created_by,itr_crdt_dt created_dt,
    (SELECT ppl_name from people where ppl_status='" . ACTIVE_STATUS . "' and ppl_id=itr_crdt_by ) field_changed_by,
    if(itr_old_value = 0 ,CONCAT(' created Invoice'),
    CASE
     when  itr_field = ".INVOICE_TRANSACTION_FIELD_APPRVL_STATUS."
      THEN
      CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='itr_field' and gnp_value=itr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',(SELECT gnp_name from gen_prm where gnp_group='".INVOICE_STATUS."' and gnp_value=itr_old_value LIMIT 1),'</span> to <span class=\"activity-end-status\">',(SELECT gnp_name from gen_prm where gnp_group='".INVOICE_STATUS."' and gnp_value=itr_new_value LIMIT 1),'</span>')
    when  itr_field = ".INVOICE_TRANSACTION_FIELD_AMOUNT."
      THEN
      CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='itr_field' and gnp_value=itr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',CONVERT(FORMAT(itr_old_value, 2) using utf8),'</span> to <span class=\"activity-end-amount\">',CONVERT(FORMAT(itr_new_value, 2) using utf8),'</span>')
   when  itr_field = ".INVOICE_TRANSACTION_FIELD_PAYMENT."
      THEN
      CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='itr_field' and gnp_value=itr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',getGenPrmValueByGroup('inv_payment_status',itr_old_value) ,'</span> to <span class=\"activity-end-status\">', getGenPrmValueByGroup('inv_payment_status',itr_new_value),'</span>')
    END ) field_changed_desc,'fas fa-info' field_icon,
      CONCAT('filter_',itr_new_value) field_filter
    FROM invoice_transaction where itr_status='" . ACTIVE_STATUS . "'  ";
    // echo ' $inv_id : '.$inv_id;
    if ($inv_id != '')
    {
      $sqlQuery.= " and itr_inv_id ='" . $inv_id . "'";
    }
      $sqlQuery.= " ORDER BY itr_crdt_dt  DESC";
    log_message('nexlog', ' sqlQuery : ' . $sqlQuery);
    $result = $this->home_model->executeSqlQuery($sqlQuery, 'result');
    log_message('nexlog', ' row : ' . json_encode($result));
    log_message('nexlog', 'invoice_model::checkinvoiceActivity <<');
    return $result;
  }
      public function getInvoicePaymentDataByInvoice($invoice_id)
    {
        $customSqlQuery = "SELECT  `ipt_id`,`ipt_code`,  `ipt_cmp_id`,  `ipt_ppl_id`,  `ipt_date`,  `ipt_mode`,  `ipt_bank`,  `ipt_branch`,  `ipt_chq_date`,fnNextasyDate(`ipt_date`) ipt_date_format,fnNextasyDate(`ipt_chq_date`) ipt_chq_date_format,  `ipt_payment_no`,  `ipt_amt`,  `ipt_disc`,  `ipt_sub_total`,  `ipt_tds_percent`,  `ipt_tds_amt`,  `ipt_total`,ipt_on_acc,  `ipt_invoice`,SUM_OF_LIST(ipt_invoice_amt) ipt_invoice_amt,ipt_status,FORMAT(`ipt_amt`,2) ipt_amt_format,FORMAT(`ipt_tds_amt`,2) ipt_tds_amt_format,FORMAT(`ipt_total`,2) ipt_total_format,FORMAT(`ipt_disc`,2) ipt_disc_format,FORMAT(`ipt_sub_total`,2) ipt_sub_total_format,FORMAT(`ipt_on_acc`,2) ipt_on_acc_format,ipt_managed_by,
        fnGetPeopleNameByID(`ipt_ppl_id`) ppl_name,
        fnGetPeopleNameByID(`ipt_crdt_by`) ipt_crdt_by_name,
        fnGetPeopleNameByID(`ipt_managed_by`) ipt_managed_by_name,
        fnNextasyDate(`ipt_crdt_dt`) ipt_crdt_dt_format,
        (SELECT gnp_name from gen_prm where gnp_group='finance_payment_mode' and gnp_value=ipt_mode LIMIT 1 ) ipt_mode_name,
        (SELECT cmp_name from company where cmp_id=ipt_cmp_id ) cmp_name
         from invoice_payment ipt where ipt_status='".ACTIVE_STATUS."' and FIND_IN_SET(".$invoice_id.",ipt_invoice) ";
        $queryResult     = $this->home_model->executeSqlQuery($customSqlQuery,'row');
        return $queryResult;
    }
    function updateCompanyIfNotAccount($cmp_id)
    {
      $sqlQuery = "UPDATE company set cmp_type_id='".COMPANY_TYPE_ACCOUNT."' where cmp_type_id!='".COMPANY_TYPE_ACCOUNT."' and cmp_id='".$cmp_id."' ";
      $res      = $this->db->query($sqlQuery);
      return true;
    }
}