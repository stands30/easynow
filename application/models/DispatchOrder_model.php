<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class DispatchOrder_model extends CI_Model
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
        (SELECT fnGetPeopleNameByID(cpl_ppl_id) from cmp_people where cpl_cmp_id=cmp_id and cpl_status='".ACTIVE_STATUS."' LIMIT 1) cpl_ppl_name,
        (SELECT cpl_ppl_id from cmp_people where cpl_cmp_id=cmp_id and cpl_status='".ACTIVE_STATUS."' LIMIT 1) cpl_ppl_id
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
  
        public function getProductDropdown($search='')
    {
        $dropdDownQuery = "SELECT  prd_id as id,(IF(prd_unit != 0 && prd_unit != '',CONCAT(prd_name,' - ',getGenPrmValueByGroup('product_unit',prd_unit)),prd_name)) as text,prd_desc,prd_gst,
        (SELECT getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id ORDER BY prv_id ASC LIMIT 1) prd_variant,
        (SELECT prv_id FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id ORDER BY prv_id ASC LIMIT 1) prd_variant_id,
        (SELECT prv_price FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id LIMIT 1) prd_price
         FROM product where prd_status IN ('".ACTIVE_STATUS."')  ";
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
    public function multi_form_data_save($form_data_id='')
    {
        // **** Form ***//
        $form_data = $_POST;
        $form_prefix = 'dor';
        $form_prd_prefix = 'dop';
        $form_table = 'dispatch_order';
        $form_product_table = 'dispatch_order_product';
        $form_product = array();
        $form_product = $form_data['product_repeater_item'];
        $delete_form_prod_id = $this->input->post('delete_form_prod_id');
        $file_count = $this->input->post('file_count');
        $module_total_old_value = $form_data['dor_total_old_value'];
        $module_total = $form_data['dor_total'];
        unset($form_data['product_repeater_item']);
        unset($form_data['delete_form_prod_id']);
        unset($form_data['dor_total_old_value']);
        unset($form_data['file_count']);
        unset($form_data['dor_document']);
        unset($form_data['clone_check']);
        // $form_data['qtn_date']    = mysqlDateFormat($form_data['qtn_date']);
        if($form_data_id != '')
        {   
            $form_data[$form_prefix.'_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $form_data[$form_prefix.'_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $form_data_update = $this->home_model->update($form_prefix.'_id',$form_data_id,$form_data,$form_table);
            if($module_total_old_value != $module_total)
            {
              $status_transact = array(
              'dtr_dor_id' => $form_data_id,
              'dtr_field' => DISPATCH_ORDER_TRANSACTION_FIELD_AMOUNT,
              'dtr_old_value' => $module_total_old_value,
              'dtr_new_value' => $module_total,
              'dtr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
              'dtr_crdt_dt' => date('Y-m-d H:i:s')
               );
               $this->home_model->insert('dispatch_order_transaction',$status_transact); 
            }
        }
        else
        {
           $form_data[$form_prefix.'_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $form_data[$form_prefix.'_crdt_dt'] = date('Y-m-d H:i:m');
            $form_data[$form_prefix.'_apprvl_status'] = DISPATCH_ORDER_APPROVAL_STATUS_PENDING;
            $form_data[$form_prefix.'_dispatch_status'] = DISPATCH_ORDER_DISPATCH_STATUS_PENDING;
            $form_data_id = $this->home_model->insert($form_table,$form_data);
             $status_transact = array(
            'dtr_dor_id' => $form_data_id,
            'dtr_field' => DISPATCH_ORDER_TRANSACTION_FIELD_APPROVAL_STATUS,
            'dtr_old_value' => 0,
            'dtr_new_value' => DISPATCH_ORDER_APPROVAL_STATUS_PENDING,
            'dtr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
            'dtr_crdt_dt' => date('Y-m-d H:i:s')
             );
             $this->home_model->insert('dispatch_order_transaction',$status_transact); 

        }
        // **** Form ***//
        // **** Form Product ***//

        $form_product_insert = array();
        $form_product_update = array();
      for ($i=0; $i < count($form_product) ; $i++) { 
          if(isset($form_product[$i][$form_prd_prefix.'_id']) && $form_product[$i][$form_prd_prefix.'_id'] == '')
          {
                $form_product[$i][$form_prd_prefix.'_'.$form_prefix.'_id'] = $form_data_id;
                $form_product[$i][$form_prd_prefix.'_crdt_dt'] = date('Y-m-d H:i:s');
                unset($form_product[$i][$form_prd_prefix.'_id']);
                array_push($form_product_insert,$form_product[$i]);
              
          }
          else
          {
                array_push($form_product_update,$form_product[$i]);
          }
        }
      /*  echo ' insert >> ';
        print_r($form_product_insert);
        echo ' insert << ';
        echo ' update >> ';
        print_r($form_product_update);
        echo ' update << ';*/

            if(!empty($form_product_insert))
            {
                   $quotationProductData_insert                 = $this->db->insert_batch($form_product_table, $form_product_insert);
            }
            if(!empty($form_product_update))
            {
                 $quotationProductData_update                 = $this->db->update_batch($form_product_table, $form_product_update,$form_prd_prefix.'_id');
            }
          if($delete_form_prod_id)
          {
              
            $res_data = $this->home_model->deleteMultipleData($form_product_table,$form_prd_prefix.'_id',$delete_form_prod_id,true);
          }
           // ************** IMAGE INSERT *************//
            $imageData = array();
            if ($file_count > 0)
            {
              for ($k = 0; $k < $file_count; $k++)
              {
                log_message('nexlog', 'image >> $this->upload_image for loop i :' . $k);
                $imageData[] = array(
                  'doc_type' => DOCUMENT_TYPE_DISPATCH_ORDER,
                  'doc_type_id' => $form_data_id,
                  'doc_name' => upload_multiple_doc(DISPATCH_ORDER_DOCUMENT_PATH, DISPATCH_ORDER_DOCUMENT_PATH, 'dor_document', $k, 'document') ,
                  'doc_status' => ACTIVE_STATUS,
                  'doc_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID) ,
                  'doc_crdt_dt' => date('Y-m-d H:i:s')
                );
              }
              // print_r($imageData);
              $docId = $this->db->insert_batch('document', $imageData);
            }

            // ************** IMAGE INSERT *************//
        // **** Form Product ***//
        return $form_data_id;
    }
   
     function getModuleList($resType, $dataOptn = '')
  {
    $sqlQuery = "SELECT dor_id,dor_code,dor_cmp_id,dor_dispatch_status,
    FORMAT(dor_total,2) dor_total_format,dor_lr_no,
    IFNULL((DATE_FORMAT(dor_date, '%d %M,%Y')),'') dor_date_format,
    IFNULL((DATE_FORMAT(dor_crdt_dt, '%d %M,%Y')),'') dor_crdt_dt_format,
    dor_crdt_dt,
        getGenPrmValueByGroup('dor_dispatch_status',dor_dispatch_status) dor_dispatch_status_value,
    (SELECT cmp_name from company where cmp_id=dor_cmp_id and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) dor_cmp_id_value
     " . checkPrivate($dataOptn['mnu_name'], 'dor_crdt_by') . "
     from dispatch_order where dor_status IN (" . ACTIVE_STATUS . ")";
    if(isset($dataOptn['dor_apprvl_status']) && $dataOptn['dor_apprvl_status'] != '' && $dataOptn['dor_apprvl_status'] != 'all')
     {
      $sqlQuery.=" and dor_apprvl_status='".$dataOptn['dor_apprvl_status']."' ";
     }
    if(isset($dataOptn['dor_dispatch_status']) && $dataOptn['dor_dispatch_status'] != '' && $dataOptn['dor_dispatch_status'] != 'all')
     {
      $sqlQuery.=" and dor_dispatch_status='".$dataOptn['dor_dispatch_status']."' ";
     }
   
    $sqlQuery.= " ORDER BY dor_crdt_dt DESC";

    $queryResult = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
    return $queryResult;
  }
    public function getDODataById($dor_id,$mnu_name='')
    {
      $private_condition='';
      if ($mnu_name != '' && checkaccess($mnu_name, 'private')) {
      $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
      $private_condition =" and dor_crdt_by ='".$ppl_id."' ";
     }
       $sqlQuery = "
       SELECT dor_id,dor_code,dor_cmp_id,dor_remark,dor_tax_computation,dor_product_tax,dor_lr_no,
        FORMAT(dor_sub_total,2) dor_sub_total_format,dor_tax,dor_tax_percent,dor_billing_cmp,dor_date,
        FORMAT(dor_tax,2) dor_tax_format,dor_cmp_state,dor_billing_cmp_state,dor_sub_total,dor_total,
        FORMAT(dor_total,2) dor_total_format,dor_total dor_total_old_value,dor_tax,
        IFNULL((DATE_FORMAT(dor_date, '%d %M,%Y')),'') dor_date_format,
        IFNULL((DATE_FORMAT(dor_crdt_dt, '%d %M,%Y')),'') dor_crdt_dt_format,
        IFNULL((DATE_FORMAT(dor_transport_date, '%d %M,%Y')),'') dor_transport_date_format,
        IFNULL((DATE_FORMAT(dor_dispatch_date, '%d %M,%Y')),'') dor_dispatch_date_format,
        fnGetPeopleNameByID(`dor_crdt_by`) dor_crdt_by_name,
        dor_crdt_dt,
         CONCAT(fnGetPeopleNameByID(`dor_dispatch_by`),' on '
         ,IFNULL((DATE_FORMAT(dor_dispatch_date, '%d %M,%Y')),'')) dor_dispatched_by,
          dor_billing_addr,dor_billing_gst,dor_billing_people,dor_shipping_addr,dor_shipping_gst,dor_shipping_people,dor_apprvl_status,
        fnGetPeopleNameByID(`dor_billing_people`) dor_billing_people_value,
        fnGetPeopleNameByID(`dor_shipping_people`) dor_shipping_people_value,
        dor_transport_name,dor_dispatch_status,dor_transport_approx_distance,dor_transport_id,dor_transport_doc_no,dor_transport_vehicle_no,
        getGenPrmValueByGroup('dor_transport_mode',dor_transport_mode) dor_transport_mode_value,
        getGenPrmValueByGroup('dor_apprvl_status',dor_apprvl_status) dor_apprvl_status_value,
        getGenPrmValueByGroup('dor_dispatch_status',dor_dispatch_status) dor_dispatch_status_value,
        (SELECT cmp_name from company where cmp_id=dor_cmp_id and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) dor_cmp_id_value,
        (SELECT cmp_name from company where cmp_id=dor_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) dor_billing_cmp_value,
        (SELECT cmp_address from company where cmp_id=dor_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) dor_billing_cmp_address,
        (SELECT cmp_gst_no from company where cmp_id=dor_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) dor_billing_cmp_gst_no, 
        (SELECT cmp_gst_no from company where cmp_id=dor_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) dor_cmp_gst_no, 
        (SELECT cmp_logo from company where cmp_id=dor_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) dor_billing_cmp_logo,
        (IFNULL((select MIN(dor_id) from dispatch_order where dor_id > '" . $dor_id . "' and dor_status='" . ACTIVE_STATUS . "' ),(SELECT MIN(dor_id) from dispatch_order where dor_status='" . ACTIVE_STATUS . "' ))) next_dispatch_order,
        (IFNULL((select MAX(dor_id) from dispatch_order where dor_id < '" . $dor_id . "' and dor_status='" . ACTIVE_STATUS . "' ),(SELECT MAX(dor_id)  from dispatch_order where dor_status='" . ACTIVE_STATUS . "' ))) prev_dispatch_order ".checkPrivate('dispatch-order-list', 'dor_crdt_by')."
     from dispatch_order where dor_status IN (" . ACTIVE_STATUS . ") and dor_id='".$dor_id."' ";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'row');
     return $queryResult;
    }
       public function getDOProductDataById($dor_id)
    {
    
      $sqlQuery = "SELECT dop_id,dop_desc,dop_rate,dop_qty,FORMAT(dop_rate,2) dop_rate_format,dop_prv_id,
       FORMAT(dop_tax,2) dop_tax_format,FORMAT(dop_sub_total,2) dop_sub_total_format,FORMAT(dop_total,2) dop_total_format,dop_tax_percent,dop_sub_total,dop_prd_id,dop_total,dop_tax,
       (SELECT if(prd_unit != '',CONCAT(prd_name,' - ', getGenPrmValueByGroup('".PRODUCT_UNIT."',prd_unit)),prd_name) from product where prd_id=dop_prd_id and prd_status='".ACTIVE_STATUS."') dop_prd_id_value,
       (SELECT getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_id =dop_prv_id ) dop_prv_id_value
          from dispatch_order_product where dop_status IN (" . ACTIVE_STATUS . ") and dop_dor_id='".$dor_id."' ";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
     return $queryResult;
    }

  function getDocumentAttach($dor_id)
  {
    $sqlQuery = "Select * from document where doc_status='" . ACTIVE_STATUS . "' and doc_type='" . DOCUMENT_TYPE_DISPATCH_ORDER . "' and doc_type_id='" . $dor_id . "' ";
    $result = $this->home_model->executeSqlQuery($sqlQuery, 'result');
    return $result;
  }

  function deleteDocument()
  {
    $doc_id = $this->input->post('doc_id');
    $doc_name = $this->input->post('doc_name');
    $sqlQuery = "DELETE from document where doc_id='" . $doc_id . "'";
    $query = $this->home_model->executeSqlQuery($sqlQuery, '');
    UnlinkFile(DISPATCH_ORDER_DOCUMENT_PATH . $doc_name);
    return true;
  }
 
 
  function getActivity($dor_id = '')
  {
    log_message('nexlog', 'dispatchOrder_model::checkPOActivity >>');
    $sqlQuery = "SELECT dtr_old_value field_old_value,dtr_new_value field_new_value,dtr_crdt_by created_by,dtr_crdt_dt created_dt,
    (SELECT ppl_name from people where ppl_status='" . ACTIVE_STATUS . "' and ppl_id=dtr_crdt_by ) field_changed_by,
    if(dtr_old_value = 0 ,CONCAT(' created <span class=\"activity-created\">Dispatch Order</span>'),
    CASE
     when  dtr_field = ".DISPATCH_ORDER_TRANSACTION_FIELD_APPROVAL_STATUS."
      THEN
    CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='dtr_field' and gnp_value=dtr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',(SELECT gnp_name from gen_prm where gnp_group='dor_dispatch_status' and gnp_value=dtr_old_value LIMIT 1),'</span> to <span class=\"activity-end-status\">',(SELECT gnp_name from gen_prm where gnp_group='dor_dispatch_status' and gnp_value=dtr_new_value LIMIT 1),'</span>')
     when  dtr_field = ".DISPATCH_ORDER_TRANSACTION_FIELD_DISPATCH_STATUS."
      THEN
    CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='dtr_field' and gnp_value=dtr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',(SELECT gnp_name from gen_prm where gnp_group='dor_apprvl_status' and gnp_value=dtr_old_value LIMIT 1),'</span> to <span class=\"activity-end-status\">',(SELECT gnp_name from gen_prm where gnp_group='dor_apprvl_status' and gnp_value=dtr_new_value LIMIT 1),'</span>')
    when  dtr_field = ".DISPATCH_ORDER_TRANSACTION_FIELD_AMOUNT."
      THEN
    CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='dtr_field' and gnp_value=dtr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',CONVERT(FORMAT(dtr_old_value, 2) using utf8),'</span> to <span class=\"activity-end-amount\">',CONVERT(FORMAT(dtr_new_value, 2) using utf8),'</span>')
    END ) field_changed_desc,'fas fa-info' field_icon,
      CONCAT('filter_',dtr_new_value) field_filter
    FROM dispatch_order_transaction where dtr_status='" . ACTIVE_STATUS . "'  ";
    // echo ' $dor_id : '.$dor_id;
    if ($dor_id != '')
    {
      $sqlQuery.= " and dtr_dor_id ='" . $dor_id . "'";
    }
      $sqlQuery.= " ORDER BY dtr_crdt_dt DESC";
    log_message('nexlog', ' sqlQuery : ' . $sqlQuery);
    $result = $this->home_model->executeSqlQuery($sqlQuery, 'result');
    log_message('nexlog', ' row : ' . json_encode($result));
    log_message('nexlog', 'dispatchOrder_model::checkPOActivity <<');
    return $result;
  }
   public function getProductVariantDropdown($prd_id,$search='')
    {
        $dropdDownQuery = "SELECT  prv_id as id,getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id)  as text,prv_price FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id = '".$prd_id."'  ";
        if($search !='')
        {
          $dropdDownQuery.=" and text LIKE '%".$search."%' ";
        }
        $dropdDownQuery.="  ORDER BY prv_id ASC";
        // ***** It is used to reset value of select2 ****** //
        // $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($dropdDownQuery,'result');
        if($search =='')
          {
            // array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
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
      $dor_id = $_POST['dor_id'];
      if (!empty($customData))
      {
        $custmData = $this->home_model->update('dor_id', $dor_id, $customData, 'dispatch_order');
      }
       if(isset($_POST['field']) && $_POST['field'] == 'dor_apprvl_status' ||  $_POST['field'] == 'dor_dispatch_status') 
       {
        $field = ($_POST['field'] == 'dor_apprvl_status') ? DISPATCH_ORDER_TRANSACTION_FIELD_APPROVAL_STATUS:DISPATCH_ORDER_TRANSACTION_FIELD_DISPATCH_STATUS;
          $status_transact = array(
            'dtr_dor_id' => $dor_id,
            'dtr_field' => $field,
            'dtr_old_value' => $_POST['old_value'],
            'dtr_new_value' => $_POST['field_value'],
            'dtr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
            'dtr_crdt_dt' => date('Y-m-d H:i:s')
             );
             $this->home_model->insert('dispatch_order_transaction',$status_transact); 
        }
      return $custmData;
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
}