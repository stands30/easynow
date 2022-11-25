<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class StockTransfer_model extends CI_Model
{
	/**
	* Instanciar o CI
	*/
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
       public function getGenPrmforDropdown($genPrmGroup,$search='',$gnp_value='')
    {
        $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='".$genPrmGroup."' and gnp_status IN (".ACTIVE_STATUS.") ";
         if($gnp_value !='')
        {
          $genPrmSqlQuery.=" and gnp_value  NOT IN (".$gnp_value.") ";
        }
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
         public function getProductDropdown($search='',$location_from='')
    {
        $cstm_sql_query = '';
        $cstm_variant_sql_query = '';
      if($location_from  != '')
      {
        $cstm_sql_query = ' and piv_location="'.$location_from.'" ';
      }
      $product_size = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
       if($product_size  == '1')
      {
        $cstm_variant_sql_query ="  and piv_prv_id = (SELECT prv_id FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id ORDER BY prv_id ASC LIMIT 1) ";
      }
        $dropdDownQuery = "SELECT  prd_id as id,(IF(prd_unit != 0 && prd_unit != '',CONCAT(prd_name,' - ',getGenPrmValueByGroup('product_unit',prd_unit)),prd_name)) as text,prd_desc,prd_gst,
        (SELECT getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id ORDER BY prv_id ASC LIMIT 1) prd_variant,
        (SELECT prv_id FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id ORDER BY prv_id ASC LIMIT 1) prd_variant_id,
        (SELECT prv_price FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id LIMIT 1) prd_price,
         ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id ".$cstm_variant_sql_query." ".$cstm_sql_query." ),'')) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id  ".$cstm_variant_sql_query." ".$cstm_sql_query." ),''))) total_stock,
          ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id ".$cstm_variant_sql_query." ".$cstm_sql_query." ),'')) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id  ".$cstm_variant_sql_query." ".$cstm_sql_query." ),''))) unblocked_stock
         FROM product where prd_status IN ('".ACTIVE_STATUS."') and ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id ".$cstm_variant_sql_query." ".$cstm_sql_query." ),'')) - (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id  ".$cstm_variant_sql_query." ".$cstm_sql_query." ),''))) > 0  ";
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
     public function getProductVariantDropdown($prd_id,$search='',$location_from='')
    {
       $cstm_sql_query = '';
      if($location_from  != '')
      {
        $cstm_sql_query = ' and piv_location="'.$location_from.'" ';
      }
        $dropdDownQuery = "SELECT  prv_id as id,getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id)  as text,prv_price,
         ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id and piv_prv_id=prv_id ".$cstm_sql_query." ),'')) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id  and piv_prv_id=prv_id ".$cstm_sql_query." ),''))) total_stock,
          ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id and piv_prv_id=prv_id ".$cstm_sql_query." ),'')) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id  and piv_prv_id=prv_id ".$cstm_sql_query." ),''))) unblocked_stock
                  FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id = '".$prd_id."' and ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id and piv_prv_id=prv_id ".$cstm_sql_query." ),'')) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id  and piv_prv_id=prv_id ".$cstm_sql_query." ),''))) > 0";
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
     public function getPeopleDropdown($search='',$managed_by='')
    {
        $sqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN ('".ACTIVE_STATUS."')  ";
         if($managed_by !='' && $managed_by != 0)
        {
          $sqlQuery.=" and ppl_id IN (SELECT emp_ppl_id from employee where emp_status = '" . ACTIVE_STATUS . "') ";
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
    public function multi_form_data_save($form_data_id='')
    {
        // **** Form ***//
        $form_data = $_POST;
        $form_prd_prefix = 'piv';
        $form_product_table = 'product_inventory';
        $form_product = array();
        $form_product = $form_data['product_repeater_item'];
        unset($form_data['product_repeater_item']);
        // $form_data['qtn_date']    = mysqlDateFormat($form_data['qtn_date']);
       $stockTransferData = array();
       $stockTransferData['stf_code']           = $form_data['piv_code'];
       $stockTransferData['stf_location_from']  = $form_data['location_from'];
       $stockTransferData['stf_location_to']    = $form_data['location_to'];
       $stockTransferData['stf_date']           = $form_data['piv_date'];
       $stockTransferData['stf_managed_by']     = $form_data['piv_managed_by'];
       $stockTransferData['stf_remark']         = $form_data['piv_remark'];
       $stockTransferData['stf_crdt_by']        = $this->session->userdata(PEOPLE_SESSION_ID);
       $stockTransferId = $this->home_model->insert('stock_transfer',$stockTransferData);
        // **** Form ***//
        // **** Form Product ***//
        unset($form_data['location_from']);
        unset($form_data['location_to']);

        $inventory_in_array = array();
        $inventory_out_array = array();
      for ($i=0; $i < count($form_product) ; $i++) 
      { 
         $form_product[$i] =array_merge($form_product[$i],$form_data);
         array_push($inventory_in_array,$form_product[$i]);
         array_push($inventory_out_array,$form_product[$i]);
         $inventory_in_array[$i]['piv_inv_type']  = PRODUCT_INVENTORY_TYPE_IN;
         $inventory_in_array[$i]['piv_type']      = PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER;
         $inventory_in_array[$i]['piv_type_id']   = $stockTransferId;
         $inventory_in_array[$i]['piv_location']  = $stockTransferData['stf_location_to'];
         // inventory out array
         $inventory_out_array[$i]['piv_inv_type']  = PRODUCT_INVENTORY_TYPE_OUT;
         $inventory_out_array[$i]['piv_type']      = PRODUCT_INVENTORY_OUT_TYPE_STOCK_TRANSFER;
         $inventory_out_array[$i]['piv_type_id']   = $stockTransferId;
         $inventory_out_array[$i]['piv_location']  = $stockTransferData['stf_location_from'];
        }
        
         /* echo 'inventory in array >>';
          print_r($inventory_in_array);
          echo 'inventory in array <<';
           echo 'inventory out array >>';
          print_r($inventory_out_array);
          echo 'inventory out array <<';*/
            if(!empty($inventory_in_array))
            {
                   $inventory_in                 = $this->db->insert_batch($form_product_table, $inventory_in_array);
            }
             if(!empty($inventory_out_array))
            {
                   $inventory_out                 = $this->db->insert_batch($form_product_table, $inventory_out_array);
            }
            
          
        // **** Form Product ***//
        return $stockTransferId;
    }
  public function getInventoryList($resType,$dataOptn='')
  {
   $sqlQuery = "SELECT * ,
                   (SELECT (IF(prd_unit != 0 && prd_unit != '',CONCAT(prd_name,' - ',getGenPrmValueByGroup('product_unit',prd_unit)),prd_name)) from product where prd_id=piv_prd_id) piv_prd_id_value,
                   (CASE 
                      WHEN  piv_inv_type = ".PRODUCT_INVENTORY_TYPE_IN." 
                      THEN  'In'
                      WHEN  piv_inv_type = ".PRODUCT_INVENTORY_TYPE_OUT." 
                      THEN  'Out'
                      ELSE
                         'Inventory'
                    END ) reference_type,
                   getGenPrmValueByGroup('piv_location',piv_location) piv_location_value,
                   (SELECT getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) from product_variant where prv_status='".ACTIVE_STATUS."' and prv_id=piv_prv_id) piv_prv_id_value,
                   fnNextasyDate(`piv_date`) piv_date_format,FORMAT(piv_price,2) piv_price_format,
                   fnGetPeopleNameByID(piv_managed_by) piv_managed_by_name
                  from product_inventory piv 
                  WHERE  piv.piv_status='".ACTIVE_STATUS."' and piv.piv_type='".PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER."' and piv.piv_type_id  = '".$dataOptn['stf_id']."' ";
     
    $sqlQuery .="  order by piv.piv_crdt_dt desc ";
    $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
    return $result;
  }
 
        public function getStockTransferDetails($stf_id)
    {
      $sqlQuery="SELECT stf_id,stf_code, getGenPrmValueByGroup('piv_location',stf_location_from) stf_location_from_value,getGenPrmValueByGroup('piv_location',stf_location_to) stf_location_to_value,(SELECT SUM(piv_qty) from product_inventory where piv_status='".ACTIVE_STATUS."' and piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' and piv_type='".PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER."' and piv_type_id=stf_id) total_stock ,stf_remark,
        fnGetPeopleNameByID(stf_managed_by) stf_managed_by_name,
        fnGetPeopleNameByID(stf_crdt_by) stf_created_by_name,
        fnNextasyDate(`stf_date`) stf_date_format,
        fnNextasyDate(`stf_crdt_dt`) stf_created_on,
         (IFNULL((select MIN(stf_id) from stock_transfer where stf_id > '" . $stf_id . "' and stf_status='" . ACTIVE_STATUS . "'),(SELECT MIN(stf_id) from stock_transfer where stf_status='" . ACTIVE_STATUS . "'))) next_stock_transfer,
         (IFNULL((select MAX(stf_id) from stock_transfer where stf_id < '" . $stf_id . "' and stf_status='" . ACTIVE_STATUS . "'),(SELECT MAX(stf_id) from stock_transfer where stf_status='" . ACTIVE_STATUS . "' ))) prev_stock_transfer ".checkPrivate('stock-transfer-list', 'stf_crdt_by')."
       from stock_transfer    WHERE  stf_id='".$stf_id."'  ";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'row');
     return $queryResult;
    }
    
    public function getStockTransferList($resType,$dataOptn='')
  {
   $sqlQuery = "SELECT stf_id,stf_code, getGenPrmValueByGroup('piv_location',stf_location_from) stf_location_from_value,getGenPrmValueByGroup('piv_location',stf_location_to) stf_location_to_value,(SELECT SUM(piv_qty) from product_inventory where piv_status='".ACTIVE_STATUS."' and piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' and piv_type='".PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER."' and piv_type_id=stf_id) total_stock " . checkPrivate('stock-transfer-list', 'stf_crdt_by') . "
    from stock_transfer 
    WHERE  stf_status='".ACTIVE_STATUS."'  ";
    
    $sqlQuery .="  order by stf_crdt_dt desc ";
    $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
    return $result;
  }
    public function updateCustomData()
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
     /*if(!empty($customArray))
     {
        $customData = array_merge($customArray,$customData);

     }*/
      $stf_id = $_POST['stf_id'];
      if (!empty($customData))
      {
        $custmData = $this->home_model->update('stf_id', $stf_id, $customData, 'stock_transfer');
      }
       if(isset($_POST['stf_status']) && $_POST['stf_status'] == '2' ) 
       {
          $sqlQuery_in = "update product_inventory set piv_status='".INACTIVE_STATUS."' where piv_inv_type=".PRODUCT_INVENTORY_TYPE_IN." and piv_type=".PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER." and piv_type_id='".$stf_id."' ";
          $sqlQuery_out = "update product_inventory set piv_status='".INACTIVE_STATUS."' where piv_inv_type=".PRODUCT_INVENTORY_TYPE_OUT." and piv_type=".PRODUCT_INVENTORY_OUT_TYPE_STOCK_TRANSFER." and piv_type_id='".$stf_id."' ";
          $res_in = $this->db->query($sqlQuery_in); 
          $res_out = $this->db->query($sqlQuery_out); 
        }
      return $custmData;
    }
}
?>
