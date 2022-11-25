<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class PurchaseOrder_model extends CI_Model
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
        $form_prefix = 'por';
        $form_prd_prefix = 'pop';
        $form_table = 'purchase_order';
        $form_product_table = 'purchase_order_product';
        $form_product = array();
        $form_product = $form_data['product_repeater_item'];
        $delete_form_prod_id = $this->input->post('delete_form_prod_id');
        $module_total_old_value = $form_data['por_total_old_value'];
        $module_total = $form_data['por_total'];
        unset($form_data['product_repeater_item']);
        unset($form_data['delete_form_prod_id']);
        unset($form_data['por_total_old_value']);
        // exit();
        // $form_data['qtn_date']    = mysqlDateFormat($form_data['qtn_date']);
        if($form_data_id != '')
        {   
            $form_data[$form_prefix.'_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $form_data[$form_prefix.'_updt_dt'] = date('Y-m-d H:i:m');
            $form_data_update = $this->home_model->update($form_prefix.'_id',$form_data_id,$form_data,$form_table);
            if($module_total_old_value != $module_total)
            {
              $status_transact = array(
              'ptr_por_id' => $form_data_id,
              'ptr_field' => PURCHASE_ORDER_TRANSACTION_FIELD_AMOUNT,
              'ptr_old_value' => $module_total_old_value,
              'ptr_new_value' => $module_total,
              'ptr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
              'ptr_crdt_dt' => date('Y-m-d H:i:s')
               );
               $this->home_model->insert('purchase_order_transaction',$status_transact); 
            }
        }
        else
        {
            $form_data['por_apprvl_status'] = PURCHASE_ORDER_STATUS_PENDING;
            $form_data[$form_prefix.'_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $form_data[$form_prefix.'_crdt_dt'] = date('Y-m-d H:i:m');
            $form_data_id = $this->home_model->insert($form_table,$form_data);
            $status_transact = array(
            'ptr_por_id' => $form_data_id,
            'ptr_field' => PURCHASE_ORDER_TRANSACTION_FIELD_STATUS,
            'ptr_old_value' => 0,
            'ptr_new_value' => PURCHASE_ORDER_STATUS_PENDING,
            'ptr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
            'ptr_crdt_dt' => date('Y-m-d H:i:s')
             );
             $this->home_model->insert('purchase_order_transaction',$status_transact); 

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
        /*echo ' insert >> ';
        print_r($form_product_insert);
        echo ' insert << ';
        echo ' update >> ';
        print_r($form_product_update);
        echo ' update >> ';*/
            if(!empty($form_product_insert))
            {
                   $productData_insert                 = $this->db->insert_batch($form_product_table, $form_product_insert);
            }
            if(!empty($form_product_update))
            {
                 $productData_update                 = $this->db->update_batch($form_product_table, $form_product_update,$form_prd_prefix.'_id');
            }
          if($delete_form_prod_id)
          {
              
            $res_data = $this->home_model->deleteMultipleData($form_product_table,$form_prd_prefix.'_id',$delete_form_prod_id,true);
          }
        // **** Form Product ***//
        return $form_data_id;
    }
   
     function getPurchaseOrderList($resType, $dataOptn = '')
    {
      $sqlQuery = "SELECT por_id,por_code,por_vdr_id,por_reference,
      FORMAT(por_total,2) por_total,
      IFNULL((DATE_FORMAT(por_date, '%d %M,%Y')),'') por_date_format,
      IFNULL((DATE_FORMAT(por_crdt_dt, '%d %M,%Y')),'') por_crdt_dt_format,
      por_crdt_dt,por_received_status,
      (IFNULL(
             (SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' AND piv_type='".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."' AND piv_type_id=por_id),0)) total_stock,
      (SELECT cmp_name from company where cmp_id=por_vdr_id and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) por_vendor
       " . checkPrivate($dataOptn['mnu_name'], 'por_crdt_by') . "
       from purchase_order where por_status IN (" . ACTIVE_STATUS . ")";
     if(isset($dataOptn['por_apprvl_status']) && $dataOptn['por_apprvl_status'] != '' && $dataOptn['por_apprvl_status'] != 'all')
     {
      $sqlQuery.=" and por_apprvl_status='".$dataOptn['por_apprvl_status']."' ";
     }
     if(isset($dataOptn['por_received_status']) && $dataOptn['por_received_status'] != '' && $dataOptn['por_received_status'] != 'all')
     {
      $sqlQuery.=" and por_received_status='".$dataOptn['por_received_status']."' ";
     }
      $sqlQuery.= " ORDER BY por_crdt_dt DESC";

      $queryResult = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
      return $queryResult;
    }
    public function getPODataById($por_id,$mnu_name='')
    {
      $private_condition='';
      if ($mnu_name != '' && checkaccess($mnu_name, 'private')) {
      $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
      $private_condition =" and por_crdt_by ='".$ppl_id."' ";
     }
       $sqlQuery = "
       SELECT por_id,por_code,por_vdr_id,por_reference,por_subject,por_remark,por_terms,por_tax_computation,por_prod_tax,por_other_address,
        FORMAT(por_sub_total,2) por_sub_total_format,por_address,por_gst,por_gst_percent,por_billing_cmp,por_date,
        FORMAT(por_gst,2) por_gst_format,por_vdr_cmp_state,por_billing_cmp_state,por_sub_total,por_gst,por_total,
        FORMAT(por_total,2) por_total_format,por_total por_total_old_value,
        IFNULL((DATE_FORMAT(por_date, '%d %M,%Y')),'') por_date_format,
        IFNULL((DATE_FORMAT(por_crdt_dt, '%d %M,%Y')),'') por_crdt_dt_format,
        getGenPrmValueByGroup('por_apprvl_status',por_apprvl_status) por_apprvl_status_value,
        getGenPrmValueByGroup('por_address',por_address) por_address_value,
        fnGetPeopleNameByID(`por_crdt_by`) por_crdt_by_name,por_received_status,
        getGenPrmValueByGroup('por_received_status',por_received_status) por_received_status_value,
        por_crdt_dt,por_apprvl_status,
          CONCAT((SELECT ppl_name from people where ppl_id=por_apprvl_by),' on '
    ,IFNULL((DATE_FORMAT(por_apprvl_date, '%d %M,%Y')),'')) por_apprvl_by_details,
        (SELECT cmp_name from company where cmp_id=por_vdr_id and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) por_vdr_id_value,
        (SELECT cmp_name from company where cmp_id=por_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) por_billing_cmp_value,
        (SELECT cmp_address from company where cmp_id=por_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) por_billing_cmp_address,
        (SELECT cmp_gst_no from company where cmp_id=por_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) por_billing_cmp_gst_no, 
        (SELECT cmp_gst_no from company where cmp_id=por_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) por_vdr_id_cmp_gst_no, 
        (SELECT cmp_logo from company where cmp_id=por_billing_cmp and  cmp_status IN ('".ACTIVE_STATUS."')  LIMIT 1) por_billing_cmp_logo,
        (IFNULL((select MIN(por_id) from purchase_order where por_id > '" . $por_id . "' and por_status='" . ACTIVE_STATUS . "' ),(SELECT MIN(por_id) from purchase_order where por_status='" . ACTIVE_STATUS . "' ))) next_purchase_order,
        (IFNULL((select MAX(por_id) from purchase_order where por_id < '" . $por_id . "' and por_status='" . ACTIVE_STATUS . "' ),(SELECT MAX(por_id) from purchase_order where por_status='" . ACTIVE_STATUS . "' ))) prev_purchase_order,
        ((SELECT SUM(pop_qty) FROM purchase_order_product WHERE pop_status='".ACTIVE_STATUS."' AND pop_por_id=por_id)-(IFNULL(
           (SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' AND piv_type='".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."' AND piv_type_id=por_id),0))) total_stock,
           (SELECT sum(pop_qty) from purchase_order_product where por_status='".ACTIVE_STATUS."' and pop_por_id=por_id) por_total_qty,
           (SELECT sum(piv_qty) from product_inventory where piv_status='".ACTIVE_STATUS."' and piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' and piv_type='".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."' and piv_type_id=por_id) por_received_qty
            ".checkPrivate('purchase-order-list', 'por_crdt_by')."
     from purchase_order where por_status IN (" . ACTIVE_STATUS . ") and por_id='".$por_id."' ";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'row');
     return $queryResult;
    }
       public function getPOProductDataById($por_id)
    {
       
      $sqlQuery = "SELECT pop_id,pop_prd_desc,pop_prd_desc,pop_price,pop_qty,FORMAT(pop_price,2) pop_price_format,pop_prv_id,
       FORMAT(pop_gst,2) pop_gst_format,FORMAT(pop_sub_total,2) pop_sub_total_format,FORMAT(pop_total,2) pop_total_format,pop_gst_percent,pop_sub_total,pop_prd_id,pop_total,pop_gst,
       (SELECT if(prd_unit != '',CONCAT(prd_name,' - ', getGenPrmValueByGroup('".PRODUCT_UNIT."',prd_unit)),prd_name) from product where prd_id=pop_prd_id and prd_status='".ACTIVE_STATUS."') pop_prd_id_value,
       (SELECT getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_id =pop_prv_id ) pop_prv_id_value,
        (SELECT sum(piv_qty) from product_inventory where piv_status='".ACTIVE_STATUS."' and piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' and piv_type='".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."' and piv_type_id=pop_por_id and piv_type_prd_id=pop_id ) pop_received_qty
          from purchase_order_product where pop_status IN (" . ACTIVE_STATUS . ") and pop_por_id='".$por_id."' ";
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
      $por_id = $_POST['por_id'];
      if (!empty($customData))
      {
        $custmData = $this->home_model->update('por_id', $por_id, $customData, 'purchase_order');
      }
       if(isset($_POST['field']) && $_POST['field'] == 'por_apprvl_status') 
       {
          $status_transact = array(
            'ptr_por_id' => $por_id,
            'ptr_field' => PURCHASE_ORDER_TRANSACTION_FIELD_STATUS,
            'ptr_old_value' => $_POST['old_value'],
            'ptr_new_value' => $_POST['field_value'],
            'ptr_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID),
            'ptr_crdt_dt' => date('Y-m-d H:i:s')
             );
             $this->home_model->insert('purchase_order_transaction',$status_transact); 
        }
      return $custmData;
    }

 
 
  function checkPOActivity($por_id = '')
  {
    log_message('nexlog', 'PurchaseOrder_model::checkPOActivity >>');
    $sqlQuery = "SELECT ptr_old_value field_old_value,ptr_new_value field_new_value,ptr_crdt_by created_by,ptr_crdt_dt created_dt,
    (SELECT ppl_name from people where ppl_status='" . ACTIVE_STATUS . "' and ppl_id=ptr_crdt_by ) field_changed_by,
    if(ptr_old_value = 0 ,CONCAT(' created <span class=\"activity-created\">Purchase Order</span>'),
    CASE
     when  ptr_field = ".PURCHASE_ORDER_TRANSACTION_FIELD_STATUS."
      THEN
    CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='ptr_field' and gnp_value=ptr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',(SELECT gnp_name from gen_prm where gnp_group='por_apprvl_status' and gnp_value=ptr_old_value LIMIT 1),'</span> to <span class=\"activity-end-status\">',(SELECT gnp_name from gen_prm where gnp_group='por_apprvl_status' and gnp_value=ptr_new_value LIMIT 1),'</span>')
    when  ptr_field = ".PURCHASE_ORDER_TRANSACTION_FIELD_AMOUNT."
      THEN
    CONCAT(' changed   <span class=\"activity-status\">',(SELECT gnp_name from gen_prm where gnp_group='ptr_field' and gnp_value=ptr_field LIMIT 1),'</span> from <span class=\"activity-start-status\">',CONVERT(FORMAT(ptr_old_value, 2) using utf8),'</span> to <span class=\"activity-end-amount\">',CONVERT(FORMAT(ptr_new_value, 2) using utf8),'</span>')
    END ) field_changed_desc,'fas fa-info' field_icon,
      CONCAT('filter_',ptr_new_value) field_filter
    FROM purchase_order_transaction where ptr_status='" . ACTIVE_STATUS . "'  ";
    // echo ' $por_id : '.$por_id;
    if ($por_id != '')
    {
      $sqlQuery.= " and ptr_por_id ='" . $por_id . "'";
    }
      $sqlQuery.= " ORDER BY ptr_crdt_dt DESC";
    log_message('nexlog', ' sqlQuery : ' . $sqlQuery);
    $result = $this->home_model->executeSqlQuery($sqlQuery, 'result');
    log_message('nexlog', ' row : ' . json_encode($result));
    log_message('nexlog', 'PurchaseOrder_model::checkPOActivity <<');
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
      public function getInventoryList($resType,$dataOptn='')
    {
     $sqlQuery = "SELECT * ,
                     (SELECT (IF(prd_unit != 0 && prd_unit != '',CONCAT(prd_name,' - ',getGenPrmValueByGroup('product_unit',prd_unit)),prd_name)) from product where prd_id=piv_prd_id) piv_prd_id_value,
                     getGenPrmValueByGroup('piv_location',piv_location) piv_location_value,
                     (SELECT getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) from product_variant where prv_status='".ACTIVE_STATUS."' and prv_id=piv_prv_id) piv_prv_id_value,
                     fnNextasyDate(`piv_date`) piv_date_format,FORMAT(piv_price,2) piv_price_format,
                   fnGetPeopleNameByID(piv_managed_by) piv_managed_by_name
                    from product_inventory piv 
                    WHERE  piv.piv_status='".ACTIVE_STATUS."' and piv.piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' and piv.piv_type='".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."' and piv.piv_type_id  = '".$dataOptn['por_id']."' ";
       
      $sqlQuery .="  order by piv.piv_crdt_dt desc ";
      $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
      return $result;
    }
}