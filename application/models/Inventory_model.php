<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Inventory_model extends CI_Model
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
         public function getProductDropdown($search='',$location_from='')
    {
      $cstm_sql_query = '';
      $cstm_variant_sql_query = '';
      $other_variant = $this->input->get('other_variant');
      $product_size = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
      if($location_from  != '')
      {
        $cstm_sql_query = ' and piv_location="'.$location_from.'" ';
      }
      if($product_size  == '1')
      {
        $cstm_variant_sql_query ="  and piv_prv_id = (SELECT prv_id FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id ORDER BY prv_id ASC LIMIT 1) ";
      }
        
        $dropdDownQuery = "SELECT  prd_id as id,(IF(prd_unit != 0 && prd_unit != '',CONCAT(prd_name,' - ',getGenPrmValueByGroup('product_unit',prd_unit)),prd_name)) as text,prd_desc,prd_gst,
        (SELECT getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id  ORDER BY prv_id ASC LIMIT 1) prd_variant,
        (SELECT prv_id FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id  ORDER BY prv_id ASC LIMIT 1) prd_variant_id,
        (SELECT prv_price FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id =prd_id  LIMIT 1) prd_price,
        ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE  piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id ".$cstm_variant_sql_query." ".$cstm_sql_query." ),'')) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id  ".$cstm_variant_sql_query." ".$cstm_sql_query." ),''))) total_stock,
         ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE  piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id ".$cstm_variant_sql_query." ".$cstm_sql_query." ),'')) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id  ".$cstm_variant_sql_query." ".$cstm_sql_query." ),''))) unblocked_stock
         FROM product where prd_status IN ('".ACTIVE_STATUS."')  ";
        if($location_from  != '')
        {
          $dropdDownQuery .= " and  ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE  piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id ".$cstm_variant_sql_query." ".$cstm_sql_query." ),'')) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE  piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id  ".$cstm_variant_sql_query." ".$cstm_sql_query." ),''))) > 0";
        }
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
     public function getProductVariantDropdown($prd_id,$location_from='',$search='')
    {
      // $other_variant = $this->input->get('other_variant');
       $cstm_sql_query = '';
      if($location_from  != '')
      {
        $cstm_sql_query = ' and piv_location="'.$location_from.'" ';
      }
        $dropdDownQuery = "SELECT  prv_id as id,getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id)  as text,prv_price,
         ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id and piv_prv_id = prv_id ".$cstm_sql_query." ),0)) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id  and piv_prv_id = prv_id ".$cstm_sql_query." ),0))) total_stock,
           ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id and piv_prv_id = prv_id ".$cstm_sql_query." ),0)) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id  and piv_prv_id = prv_id ".$cstm_sql_query." ),0))) unblocked_stock
         FROM product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id = '".$prd_id."'  ";
         if($search !='')
        {
          $dropdDownQuery.=" and text LIKE '%".$search."%' ";
        }
        if($location_from  != '')
        {
          $dropdDownQuery .= " and  ( IFNULL( (SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id and piv_prv_id = prv_id ".$cstm_sql_query.") ,0)  - 
                 IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prv_prd_id  and piv_prv_id = prv_id ".$cstm_sql_query." ),0))  > 0 ";
        }
        
        /*if($other_variant !='')
        {
          $other_variant = rtrim($other_variant,',');
          $dropdDownQuery.=" and prv_id NOT IN (".$other_variant.") ";
        }*/
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
       
        // **** Form ***//
        // **** Form Product ***//
        $por_flag  = false;
        $por_qty  = 0;
        $dor_flag  = false;
        $dor_qty  = 0;
        $form_product_insert = array();
        $form_product_update = array();
      for ($i=0; $i < count($form_product) ; $i++) 
      { 
         array_push($form_product_update,$form_product[$i]);
         $form_product[$i] =array_merge($form_product[$i],$form_data);
         $form_product[$i][$form_prd_prefix.'_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
         $form_product[$i][$form_prd_prefix.'_crdt_dt'] = date('Y-m-d H:i:m');
           // echo ' inv type : '.$form_product[$i][$form_prd_prefix.'_inv_type']. ' ||  _type : '.$form_product[$i][$form_prd_prefix.'_type'];
         // update purchase order when all products are receievd in the purchase order
          if($form_product[$i][$form_prd_prefix.'_inv_type'] == PRODUCT_INVENTORY_TYPE_IN && $form_product[$i][$form_prd_prefix.'_type'] == PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER)
          {
            $por_flag  = true;
            $por_qty += $form_product[$i][$form_prd_prefix.'_pending'];
            unset($form_product[$i][$form_prd_prefix.'_pending']);
          }
        // update purchase order when all products are receievd in the purchase order
        // update dispatch order when all products are dispatched in the purchase order
          if($form_product[$i][$form_prd_prefix.'_inv_type'] == PRODUCT_INVENTORY_TYPE_OUT && $form_product[$i][$form_prd_prefix.'_type'] == PRODUCT_INVENTORY_OUT_TYPE_DISPATCH_ORDER)
          {
            $dor_flag  = true;
            $dor_qty += $form_product[$i][$form_prd_prefix.'_pending'];
            unset($form_product[$i][$form_prd_prefix.'_pending']);
          }
           if($form_product[$i][$form_prd_prefix.'_qty'] == 0)
           {
            unset($form_product[$i]);
           }
        // update dispatch order when all products are dispatched in the purchase order
      }
      // update purchase order when all products are receievd in the purchase order
        if($por_flag == true && $por_qty == 0)
        {
          $por_sql = "UPDATE purchase_order set por_received_status='".PURCHASE_ORDER_RECEIVED_STATUS_RECEIVED."' where por_id='".$form_data['piv_type_id']."'";
          $por_res = $this->db->query($por_sql);
        }
      // update purchase order when all products are receievd in the purchase order
      // update dispatch order when all products are dispatched in the purchase order
        // echo ' dor_flag : '.$dor_flag.' || dor_qty : '.$dor_qty;
         if($dor_flag == true && $dor_qty == 0)
        {
           $dor_sql = "UPDATE dispatch_order set dor_dispatch_status=".DISPATCH_ORDER_DISPATCH_STATUS_DISPATCH." , dor_dispatch_by=".$this->session->userdata(PEOPLE_SESSION_ID)." , dor_dispatch_date='".date('Y-m-d H:i:s')."' where dor_id=".$form_data['piv_type_id']." ";
          $dor_res = $this->db->query($dor_sql);
        }
      // update dispatch order when all products are dispatched in the purchase order
        // print_r($form_product);
            if(!empty($form_product))
            {
                   $form_product_insert                 = $this->db->insert_batch($form_product_table, $form_product);
            }
            
          
        // **** Form Product ***//
        return $form_product_insert;
    }
  public function getInventoryList($resType,$dataOptn='')
  {
   $mnu_name = checkPrivate($dataOptn['mnu_name'], 'prd_crdt_by');
   $custm_query='';
   if(isset($dataOptn['piv_location']) && $dataOptn['piv_location'] !='null')
    {
      $custm_query=" and piv_location ='".$dataOptn['piv_location']."'";
    }
   $sqlQuery = "SELECT prd_name,prd_id,prd_price,
                  getGenPrmValueByGroup('".PRODUCT_UNIT."',prd_unit) prd_unit_name,
                  getGenPrmValueByGroup('prd_category',prd_category) prd_category_name,
                  ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id ".$custm_query."),0)) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id  ".$custm_query."),0))) total_stock
                  ,AVG(piv.piv_price) avg_cost FROM product prd
                  JOIN product_inventory piv ON prd.prd_id = piv.piv_prd_id
                  WHERE prd_status='".ACTIVE_STATUS."' and piv.piv_status='".ACTIVE_STATUS."'
                  and piv.piv_inv_type  = '".PRODUCT_INVENTORY_TYPE_IN."' ".$custm_query." ";
  
    $sqlQuery.=" GROUP BY prd_id order by piv.piv_crdt_dt desc";  
                   
    $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
    return $result;
  }
   public function getCompanyDropdown($cmp_type,$search='',$lead='')
    {
      $purchase_order = $this->input->get('purchase_order');
      $dispatch_order = $this->input->get('dispatch_order');
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
         if($purchase_order == 1)
        {
          $companyQuery.=" and cmp_id in (SELECT por_vdr_id from purchase_order where por_status='".ACTIVE_STATUS."' and por_received_status!='".PURCHASE_ORDER_RECEIVED_STATUS_RECEIVED."') ";
        }
        if($dispatch_order == 1)
        {
          $companyQuery.=" and cmp_id in (SELECT dor_cmp_id from dispatch_order where dor_status='".ACTIVE_STATUS."' and dor_dispatch_status!='".DISPATCH_ORDER_DISPATCH_STATUS_DISPATCH."') ";
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
     public function getPODropdown($search='',$cmp_id)
    {
        $companyQuery = "SELECT  por_id as id,CONCAT(por_code,' - ',por_subject) as text, CONCAT(por_code,' - ',por_subject) por_text FROM purchase_order where por_status IN ('".ACTIVE_STATUS."')  ";
        // and por_type_id='".$por_type."'
       if($cmp_id !='')
        {
          $companyQuery.=" and por_vdr_id = '".$cmp_id."' ";
        }
        if($search !='')
        {
          $companyQuery.=" and por_code LIKE '%".$search."%' ";
          $companyQuery.=" or por_subject LIKE '%".$search."%' ";
        }
        $companyQuery.=" AND ((SELECT SUM(pop_qty) FROM purchase_order_product WHERE pop_status='".ACTIVE_STATUS."' AND pop_por_id=por_id)-(IFNULL(
           (SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' AND piv_type='".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."' AND piv_type_id=por_id),0))) > 0";
        $companyQuery.="  ORDER BY por_text ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($companyQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
       public function getPOProducts($por_id)
    {

      $sqlQuery="SELECT pop_id piv_type_prd_id,pop_prd_id piv_prd_id,(
                  SELECT IF(prd_unit != '', CONCAT(prd_name,' - ', getGenPrmValueByGroup('product_unit',prd_unit)),prd_name)
                  FROM product
                  WHERE prd_id=pop_prd_id AND prd_status='".ACTIVE_STATUS."') piv_prd_id_value,pop_qty piv_qty,pop_prv_id piv_prv_id, (
                  SELECT getGenPrmValueByGroup('product_size',prv_variant_id)
                  FROM product_variant
                  WHERE prv_status = '".ACTIVE_STATUS."' AND prv_id =pop_prv_id) piv_prv_id_value, 
                  (pop_qty-(IFNULL((
                  SELECT  SUM(piv_qty)
                  FROM product_inventory
                  WHERE piv_status='".ACTIVE_STATUS."' and piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' AND piv_type='".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."' AND piv_type_id=pop_por_id and piv_type_prd_id=pop_id),0))) piv_pending,
                   (pop_qty-(IFNULL((
                  SELECT  SUM(piv_qty)
                  FROM product_inventory
                  WHERE piv_status='".ACTIVE_STATUS."' and piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' AND piv_type='".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."' AND piv_type_id=pop_por_id and piv_type_prd_id=pop_id),0))) unblocked_stock,
                  pop_price piv_price,pop_price piv_price_value,pop_qty total_stock
                  FROM purchase_order_product
                  WHERE pop_status IN (".ACTIVE_STATUS.") AND pop_por_id='".$por_id."' and (pop_qty-(IFNULL((
                  SELECT  SUM(piv_qty)
                  FROM product_inventory
                  WHERE piv_status='".ACTIVE_STATUS."' and piv_inv_type='".PRODUCT_INVENTORY_TYPE_IN."' AND piv_type='".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."' AND piv_type_id=pop_por_id and piv_type_prd_id=pop_id),0))) > 0";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
     return $queryResult;
    }
        public function getProductDetails($prd_id,$start_date='',$end_date='')
    {
      $customSqlQuery='';
      if($start_date !='' && $end_date !='')
        {
          $customSqlQuery =" and piv_date BETWEEN '".$start_date."' and '".$end_date."' ";
        }
      $sqlQuery="SELECT prd_name,prd_id,piv_price,piv_prd_id,piv_id,piv_cmp_id,
                  (select cmp_name from company where cmp_id=piv_cmp_id) as piv_cmp_value,
                  getGenPrmValueByGroup('".PRODUCT_UNIT."',prd_unit) prd_unit_name,
                  getGenPrmValueByGroup('prd_category',prd_category) prd_category_name,
                  ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id ".$customSqlQuery." ),0)) - 
                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id  ".$customSqlQuery." ),0))) total_stock
                  ,(IFNULL((select MIN(prd_id) from product where prd_id > '" . $prd_id . "' and prd_status='" . ACTIVE_STATUS . "'  AND prd_id IN (SELECT piv_prd_id FROM product_inventory WHERE piv_status='" . ACTIVE_STATUS . "') ),(SELECT MIN(prd_id) from product where prd_status='".ACTIVE_STATUS."' AND prd_id IN (SELECT piv_prd_id FROM product_inventory WHERE piv_status='" . ACTIVE_STATUS . "')))) next_product_inventory,
                  (IFNULL((select MAX(prd_id) from product where prd_id < '" . $prd_id . "' and prd_status='" . ACTIVE_STATUS . "' AND prd_id IN (SELECT piv_prd_id FROM product_inventory WHERE piv_status='" . ACTIVE_STATUS . "')),(SELECT MAX(prd_id) from product where prd_status='" . ACTIVE_STATUS . "' AND prd_id IN (SELECT piv_prd_id FROM product_inventory WHERE piv_status='" . ACTIVE_STATUS . "')))) prev_product_inventory,
                  (SELECT AVG(piv_price) from product_inventory where piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id ".$customSqlQuery.") avg_cost_purchase ,
                  (SELECT AVG(piv_price) from product_inventory where piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = prd_id ".$customSqlQuery.") avg_cost_selling 
                  FROM product prd
                  JOIN product_inventory piv ON prd.prd_id = piv.piv_prd_id
                  WHERE prd_status='".ACTIVE_STATUS."' and piv.piv_status='".ACTIVE_STATUS."'
                  and piv.piv_inv_type  = '".PRODUCT_INVENTORY_TYPE_IN."'  
                  AND prd_id='".$prd_id."'  ".$customSqlQuery." ";
        
      $sqlQuery.=" order by piv.piv_crdt_dt desc";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'row');
     return $queryResult;
    }
     public function getProductDetailsByLocation($prd_id,$start_date='',$end_date='')
    {
      $custm_query='';
      if($start_date !='' && $end_date !='')
        {
          $custm_query =" and piv_date BETWEEN '".$start_date."' and '".$end_date."' ";
        }
      $sqlQuery="SELECT gnp_value,gnp_name,
                      ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = '".$prd_id."' AND piv_location=gnp_value ".$custm_query."),0)) - 
                       (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = '".$prd_id."' AND piv_location=gnp_value ".$custm_query."),0))) stock_qty
                      FROM gen_prm gnp
                      WHERE gnp_status =1 AND gnp_group='piv_location'; " ;

     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
     return $queryResult;
    }
     public function getProductDetailsByVariant($prd_id,$start_date='',$end_date='',$location='')
    {
       $custm_query='';
      if($start_date !='' && $end_date !='')
        {
          $custm_query =" and piv_date BETWEEN '".$start_date."' and '".$end_date."' ";
        }
        if($location !='' )
        {
          $location = rtrim($location,',');
          $custm_query =" and piv_location in (SELECT gnp_value from gen_prm where gnp_group='piv_location' and gnp_name in (".$location.")) ";
        }
        $sqlQuery = "SELECT prv_id,prv_prd_id,prv_variant_id,
                     getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) prv_variant_name,
                     ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = '".$prd_id."' AND piv_prv_id = prv_id ".$custm_query." ),0)) - 
                       (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = '".$prd_id."' AND piv_prv_id = prv_id ".$custm_query." ),0))) stock_qty
                     FROM product_variant WHERE prv_status='".ACTIVE_STATUS."' AND prv_prd_id='".$prd_id."'";
   /* echo  $sqlQuery="SELECT gnp_value,gnp_name,
                   getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) prv_variant_name
                      ((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = '".$prd_id."' AND piv_prv_id IN (SELECT prv_id from product_variant where prv_status='".ACTIVE_STATUS."' AND prv_variant_id=gnp_value ) ".$custm_query." ),0)) - 
                       (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_prd_id = '".$prd_id."' AND piv_prv_id IN (SELECT prv_id from product_variant where prv_status='".ACTIVE_STATUS."'  AND prv_variant_id=gnp_value ) ".$custm_query." ),0))) stock_qty
                      FROM gen_prm gnp
                      WHERE gnp_status = '".ACTIVE_STATUS."' AND gnp_group='".PRODUCT_SIZE."'" ;*/
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
     return $queryResult;
    }
    public function getInventoryDetailList($resType,$dataOptn='')
  {
   $sqlQuery = "SELECT * ,
                   getGenPrmValueByGroup('piv_location',piv_location) piv_location_value,
                   (SELECT getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) from product_variant where prv_status='".ACTIVE_STATUS."' and prv_id=piv_prv_id) piv_prv_id_value,
                   fnNextasyDate(`piv_date`) piv_date_format,
                   fnGetPeopleNameByID(piv_managed_by) piv_managed_by_name,
                   (
                   CASE
                     WHEN  piv_inv_type = ".PRODUCT_INVENTORY_TYPE_IN." and piv_type = ".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."
                     THEN (SELECT por_code from purchase_order where por_id=piv_type_id)
                     WHEN  piv_inv_type = ".PRODUCT_INVENTORY_TYPE_IN." and piv_type = ".PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER."
                     THEN (SELECT stf_code from stock_transfer where stf_id=piv_type_id)
                     WHEN  piv_inv_type = ".PRODUCT_INVENTORY_TYPE_OUT." and piv_type = ".PRODUCT_INVENTORY_OUT_TYPE_DISPATCH_ORDER."
                     THEN (SELECT dor_code from dispatch_order where dor_id=piv_type_id)
                     WHEN  piv_inv_type = ".PRODUCT_INVENTORY_TYPE_OUT." and piv_type = ".PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER."
                     THEN (SELECT stf_code from stock_transfer where stf_id=piv_type_id)
                     ELSE piv_code
                   END) reference_code,
                   (
                   CASE
                     WHEN  piv_inv_type = ".PRODUCT_INVENTORY_TYPE_IN." and piv_type = ".PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER."
                     THEN 'purchase-order-details-'
                     WHEN  piv_inv_type = ".PRODUCT_INVENTORY_TYPE_IN." and piv_type = ".PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER."
                     THEN 'stock-transfer-details-'
                     WHEN  piv_inv_type = ".PRODUCT_INVENTORY_TYPE_OUT." and piv_type = ".PRODUCT_INVENTORY_OUT_TYPE_DISPATCH_ORDER."
                     THEN 'dispatch-order-details-'
                     WHEN  piv_inv_type = ".PRODUCT_INVENTORY_TYPE_OUT." and piv_type = ".PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER."
                     THEN 'stock-transfer-details-'
                     ELSE piv_code
                   END) reference_route
                  from product_inventory piv 
                  WHERE  piv.piv_status='".ACTIVE_STATUS."' and piv.piv_inv_type  = '".$dataOptn['inv_type']."' ";
     if(isset($dataOptn['product']) && $dataOptn['product'] !='')
     {
        $sqlQuery .="  and piv_prd_id='".$dataOptn['product']."' ";
     }
      if(isset($dataOptn['location']) && $dataOptn['location'] !='' && $dataOptn['location'] !='null')
         {
           $dataOptn['location'] = rtrim($dataOptn['location'],',');
            $sqlQuery .="  and piv_location in (SELECT gnp_value from gen_prm where gnp_group='piv_location' and gnp_name in (".$dataOptn['location'].")) ";
         }
      if(isset($dataOptn['variant']) && $dataOptn['variant'] !='' && $dataOptn['variant'] !='null')
         {
           $dataOptn['variant'] = rtrim($dataOptn['variant'],',');
           $sqlQuery .="  and piv_prv_id IN (SELECT prv_id from product_variant where prv_status='".ACTIVE_STATUS."'  AND prv_variant_id in (SELECT gnp_value from gen_prm where gnp_group='".PRODUCT_SIZE."' and gnp_name in (".$dataOptn['variant']."))) ";
         }

      if(isset($dataOptn['start_date']) && $dataOptn['start_date'] !='' && $dataOptn['start_date'] !='null' && isset($dataOptn['end_date']) && $dataOptn['end_date'] !='' && $dataOptn['end_date'] !='null')
      {
        $sqlQuery .= ' and piv_date BETWEEN "'.$dataOptn['start_date'].'" and "'.$dataOptn['end_date'].'" ';
      }
    $sqlQuery .="  order by piv.piv_crdt_dt desc ";
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
     if(isset($_POST['piv_status']) && $_POST['piv_status'] == '2' ) 
       {
          $cstm_variant_sql_query='';
         
          $product_size = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
          if($product_size  == '1')
          {
            $cstm_variant_sql_query = ' and piv_prv_id=piv.piv_prv_id';
          }
          $inv_check_sql = "SELECT IFNULL((((IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_IN."' AND piv_status = '".ACTIVE_STATUS."' AND piv_location=piv.piv_location AND piv_prd_id = piv.piv_prd_id ".$cstm_variant_sql_query."),0)) - 
                                 (IFNULL(( SELECT SUM(piv_qty) FROM product_inventory WHERE piv_inv_type = '".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_status = '".ACTIVE_STATUS."' AND piv_location=piv.piv_location AND piv_prd_id = piv.piv_prd_id ".$cstm_variant_sql_query."),0)))-piv_qty),0) total_stock
                 FROM product_inventory piv WHERE piv_id=2 ";
          $inv_check_res = $this->home_model->executeSqlQuery($inv_check_sql,'row'); 
          if(!empty($inv_check_res))
          {
             // $inv_check_res->total_stock = -1;
              if($inv_check_res->total_stock < 0)
              {
                return 'total_stock_negative';
              }
          }

          unset($customData->piv_inv_type);
          unset($customData->piv_type);
          unset($customData->piv_type_id);
        }
      $piv_id = $_POST['piv_id'];
      if (!empty($customData))
      {
        $custmData = $this->home_model->update('piv_id', $piv_id, $customData, 'product_inventory');
        $custmData = true;
          $piv_inv_type  = $_POST['piv_status'];
          $piv_type      = $_POST['piv_type'];
          $piv_type_id   = $_POST['piv_type_id'];
          if(isset($piv_inv_type) && $piv_inv_type !='' && isset($piv_inv_type) && $piv_inv_type !='')
          {
            if(isset($piv_inv_type) && $piv_inv_type == PRODUCT_INVENTORY_TYPE_IN && isset($piv_type) && $piv_type == PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER )
            {
                $por_sql = "UPDATE purchase_order set por_received_status='".PURCHASE_ORDER_RECEIVED_STATUS_PENDING."' where por_id='".$piv_type_id."'";
                $por_res = $this->db->query($por_sql);
            }
            if(isset($piv_inv_type) && $piv_inv_type == PRODUCT_INVENTORY_TYPE_OUT && isset($piv_type) && $piv_type == PRODUCT_INVENTORY_OUT_TYPE_DISPATCH_ORDER )
            {
                $dor_sql = "UPDATE dispatch_order set dor_dispatch_status=".DISPATCH_ORDER_DISPATCH_STATUS_PENDING." , dor_dispatch_by='' , dor_dispatch_date='' where dor_id=".$piv_type_id." ";
                 $dor_res = $this->db->query($dor_sql);
            }
          }
        
      }
       
      return $custmData;
    }
     public function getDODropdown($search='',$cmp_id)
    {
        $companyQuery = "SELECT  dor_id as id,dor_code as text, dor_code dor_text FROM dispatch_order where dor_status IN ('".ACTIVE_STATUS."')  ";
        // and dor_type_id='".$dor_type."'
       if($cmp_id !='')
        {
          $companyQuery.=" and dor_cmp_id = '".$cmp_id."' ";
        }
        if($search !='')
        {
          $companyQuery.=" and dor_code LIKE '%".$search."%' ";
        }
        $companyQuery.=" and dor_dispatch_status!='".DISPATCH_ORDER_DISPATCH_STATUS_DISPATCH."' ";
        $companyQuery.="  ORDER BY dor_text ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($companyQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
       public function getDOProducts($dor_id)
    {
      $sqlQuery="SELECT dop_id piv_type_prd_id,dop_prd_id piv_prd_id,(
                  SELECT IF(prd_unit != '', CONCAT(prd_name,' - ', getGenPrmValueByGroup('product_unit',prd_unit)),prd_name)
                  FROM product
                  WHERE prd_id=dop_prd_id AND prd_status='".ACTIVE_STATUS."') piv_prd_id_value,dop_qty piv_qty,dop_prv_id piv_prv_id, (
                  SELECT getGenPrmValueByGroup('product_size',prv_variant_id)
                  FROM product_variant
                  WHERE prv_status = '".ACTIVE_STATUS."' AND prv_id =dop_prv_id) piv_prv_id_value, 
                  (dop_qty-(IFNULL((
                  SELECT piv_qty
                  FROM product_inventory
                  WHERE piv_status='".ACTIVE_STATUS."' and piv_inv_type='".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_type='".PRODUCT_INVENTORY_OUT_TYPE_DISPATCH_ORDER."' AND piv_type_id=dop_dor_id and piv_type_prd_id=dop_id),0))) piv_pending,
                  (dop_qty-(IFNULL((
                  SELECT piv_qty
                  FROM product_inventory
                  WHERE piv_status='".ACTIVE_STATUS."' and piv_inv_type='".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_type='".PRODUCT_INVENTORY_OUT_TYPE_DISPATCH_ORDER."' AND piv_type_id=dop_dor_id and piv_type_prd_id=dop_id),0))) unblocked_stock,
                  dop_rate piv_price,dop_rate piv_price_value,dop_qty total_stock
                  FROM dispatch_order_product
                  WHERE dop_status IN (".ACTIVE_STATUS.") AND dop_dor_id='".$dor_id."' and   (dop_qty-(IFNULL((
                  SELECT piv_qty
                  FROM product_inventory
                  WHERE piv_status='".ACTIVE_STATUS."' and piv_inv_type='".PRODUCT_INVENTORY_TYPE_OUT."' AND piv_type='".PRODUCT_INVENTORY_OUT_TYPE_DISPATCH_ORDER."' AND piv_type_id=dop_dor_id and piv_type_prd_id=dop_id),0))) > 0";
     $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
     return $queryResult;
    }
}
?>
