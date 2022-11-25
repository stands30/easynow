<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	public function getProductById($prd_id)
	{
		$sqlQuery = "
		Select *,
		date_format(prd_crdt_dt,'%d/%m/%Y %H:%i:%s') prd_crdt_on_format,
		(IFNULL((select MIN(prd_id) from product where prd_id > '".$prd_id."' and prd_status = '".ACTIVE_STATUS."'),(SELECT MIN(prd_id) from product where prd_status = '".ACTIVE_STATUS."'))) next,
		(IFNULL((select MAX(prd_id) from product where prd_id < '".$prd_id."' and prd_status = '".ACTIVE_STATUS."'),(SELECT MAX(prd_id) from product where prd_status = '".ACTIVE_STATUS."'))) prev,
		(select ppl_name from people where ppl_id = prd_crdt_by) prd_crdt_by_name,
     getGenPrmValueByGroup('prd_category',prd_category) prd_category_name,
     getGenPrmValueByGroup('".PRODUCT_UNIT."',prd_unit) prd_unit_name ".checkPrivate('product-list', 'prd_crdt_by')."
		from product where prd_status = '".ACTIVE_STATUS."' and prd_id = '".$prd_id."'";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}
	public function product_getlist($resType,$dataOptn='')
	{
   $mnu_name = checkPrivate($dataOptn['mnu_name'], 'prd_crdt_by');
		$sqlQuery = "Select *,
                  getGenPrmValueByGroup('prd_category',prd_category) prd_category_name,
                  getGenPrmValueByGroup('".PRODUCT_UNIT."',prd_unit) prd_unit_name
                  ".$mnu_name."
		from product where prd_status = '".ACTIVE_STATUS."' ";
    if(isset($dataOptn['prd_category']) && $dataOptn['prd_category'] !='null')
    {
      $sqlQuery.=" and prd_category ='".$dataOptn['prd_category']."'";
    }
    $sqlQuery.=" order by prd_crdt_dt desc";
		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;
	}
	public function deleteProduct($prd_id)
  {
  	$sql = "update product set prd_status = 0  Where prd_id = '".$prd_id."'";
		$query = $this->db->query($sql);
		if(!empty($query))
		{
			return true;
	  }
	}
	// function product_people_list($prd_id)
	// {
	// 	$sqlQuery = "select *,
	// 	(select ppl_name from people where cpl_ppl_id = ppl_id) cpl_ppl_name,
	// 	(select ppl_met_on from people where cpl_prd_id = ppl_id) cpl_met_on,
	// 	(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_MOBILE.") cpl_ppl_mobile,
	// 	(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_EMAIL.") cpl_ppl_email
	// 	 from prd_people where cpl_prd_id =  '".$prd_id."' and cpl_status = '".ACTIVE_STATUS."' order by cpl_crdt_dt desc";
	//
	// 	$result = $this->home_model->executeSqlQuery($sqlQuery,'result');
	// 	return $result;
	// }
	// public function getProductDropdown()
	// {
	// 	$genPrmSqlQuery = "SELECT  prd_id as id,prd_name as text FROM product where prd_status IN ('".ACTIVE_STATUS."')";
	// 	$genPrmSqlQuery.=" ORDER BY prd_id asc";
	// 	$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
	// 	return $result;
	// }
	//
	// public function getCompPplById($cpl_id)
	// {
	// 		$sqlQuery = "Select *,(select ppl_name from people where people.ppl_id = prd_people.cpl_ppl_id and cpl_status In ('".ACTIVE_STATUS."') )ppl_name,
	// 			(select prd_name from product where product.prd_id = prd_people.cpl_prd_id and prd_status In ('".ACTIVE_STATUS."'))prd_name
	// 				from prd_people where cpl_status = '".ACTIVE_STATUS."' and cpl_id = ".$cpl_id;
	// 		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
	// 		return $row;
	// }
    // ******* Lead End Here *********//
    // public function getPeopleforDropdown($search)
    // {
    //     $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (".ACTIVE_STATUS.")
		// 												and ppl_id Not In (SELECT prd_ppl_id from product where prd_dept = '".PEOPLE_ADMIN_DEPT."')";
    //     if($search !='')
    //     {
    //       $peopleSqlQuery.=" and ppl_name LIKE '%".$search."%' ";
    //     }
    //     $peopleSqlQuery.="  ORDER BY ppl_crdt_dt ASC";
    //     // ***** It is used to reset value of select2 ****** //
    //     $resetResult     = array('id'=>'0','text'=>'Please Select People');
    //     $queryResult     = $this->home_model->executeSqlQuery($peopleSqlQuery,'result');
    //       if($search =='')
              // {
              //   array_unshift($queryResult,$resetResult);
              // }
    //     // ***** It is used to reset value of select2 ****** //
    //     return $queryResult;
    // }
    //  // ******* Event Start Here ********//
    // // ******* Lead End Here *********//
    // public function getDepartmentforDropdown($search)
    // {
    //     $departmentSqlQuery = "SELECT  dpt_id as id,dpt_name as text FROM department where dpt_status IN (".ACTIVE_STATUS.") ";
    //     if($search !='')
    //     {
    //       $departmentSqlQuery.=" and dpt_name LIKE '%".$search."%' ";
    //     }
    //     $departmentSqlQuery.="  ORDER BY dpt_crdt_dt ASC";
    //     // ***** It is used to reset value of select2 ****** //
    //     $resetResult     = array('id'=>'0','text'=>'Please Select Department');
    //     $queryResult     = $this->home_model->executeSqlQuery($departmentSqlQuery,'result');
    //       if($search =='')
          /*{
            array_unshift($queryResult,$resetResult);
          }*/
    //     // ***** It is used to reset value of select2 ****** //
    //     return $queryResult;
    // }
    //  // ******* Event Start Here ********//
   public function getGenPrmforDropdown($genPrmGroup, $search,$prv_variant_id)
  {
    $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='" . $genPrmGroup . "' and gnp_status IN (" . ACTIVE_STATUS . ") ";
   
    if ($prv_variant_id != '')
    {
      $genPrmSqlQuery.= "and gnp_value NOT IN(".$prv_variant_id.") ";
    }
    if ($search != '')
    {
      $genPrmSqlQuery.= " and gnp_name LIKE '%" . $search . "%'  ";
    }
    $genPrmSqlQuery.= "  ORDER BY gnp_order ASC";
    // ***** It is used to reset value of select2 ****** //
    $resetResult = array(
      'id' => '0',
      'text' => 'Please Select'
    );
    $queryResult = $this->home_model->executeSqlQuery($genPrmSqlQuery, 'result');
        if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }
    // ***** It is used to reset value of select2 ****** //
    return $queryResult;
  }
public function save_product()
    {
        // **** Product ***//
        $product_data    = $_POST;
        $product_variant = array();
        $prd_id          = $this->input->post('prd_id');
        $delete_prv_id   = $this->input->post('delete_prv_id');
        $product_variant   = $this->input->post('product_variant');
        unset($product_data['product_variant']);
        unset($product_data['delete_prv_id']);
        if($prd_id != '')
        {   
            $product_data['prd_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $product_data['prd_updt_dt'] = date('Y-m-d H:i:m');
            $prd_data = $this->home_model->update('prd_id',$prd_id,$product_data,'product');
            
        }
        else
        {
            $product_data['prd_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $product_data['prd_crdt_dt'] = date('Y-m-d H:i:m');
            $prd_id = $this->home_model->insert('product',$product_data);
        }
        // **** Product ***//
        // **** Product Product ***//
        $product_variant_insert = array();
        $product_variant_update = array();
      for ($i=0; $i < count($product_variant) ; $i++) { 
          $product_variant[$i]['prv_prd_id'] = $prd_id;
          if(isset($product_variant[$i]['prv_id']) && $product_variant[$i]['prv_id'] == '')
          {
                unset($product_variant[$i]['prv_id']);
                array_push($product_variant_insert,$product_variant[$i]);
             
          }
          else
          {
                array_push($product_variant_update,$product_variant[$i]);
          }
        }
     /*   print_r($product_data);
        echo ' insert >> ';
        print_r($product_variant_insert);
        echo ' insert << ';
        echo ' update >> ';
        print_r($product_variant_update);
        echo ' update >> ';*/
            if(!empty($product_variant_insert))
            {
                   $productVariant_insert                 = $this->db->insert_batch('product_variant', $product_variant_insert);
            }
            if(!empty($product_variant_update))
            {
                 $productVariant_update                 = $this->db->update_batch('product_variant', $product_variant_update,'prv_id');
            }
          if($delete_prv_id)
          {
              
            $res_data = $this->home_model->deleteMultipleData('product_variant','prv_id',$delete_prv_id,true);
          }
        // **** Quotation Product ***//
        return $prd_id;
    }
    public function getProductVariantByProductId($prd_id)
  {
    $sqlQuery = " Select *,
     getGenPrmValueByGroup('".PRODUCT_SIZE."',prv_variant_id) prv_variant_name
     from product_variant where prv_status = '".ACTIVE_STATUS."' and prv_prd_id = '".$prd_id."'";
    $result = $this->home_model->executeSqlQuery($sqlQuery,'result');
    return $result;
  }
    public function is_sku_available()
    {
      $sku = $this->input->post('prv_sku');
      $sql="select * from product_variant where prv_sku='".$sku."'";
      $query= $this->db->query($sql);            
      if($query->num_rows() > 0)
      {
        return false;                                
      } 
      else
      {
        return true;
      }
    }
}
