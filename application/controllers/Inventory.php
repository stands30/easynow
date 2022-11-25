<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('inventory_model');
		$this->mnu_name = 'inventory-list';
	}

	public function inventory_list()
	{
		$data['title'] 		=	'Inventory List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'list'))
		  {
		  	$data['global_asset_version'] = global_asset_version();
		  	$dataOptn['mnu_name']		  = $this->mnu_name;
            $data['dataTableData']        = $this->inventory_model->getInventoryList(TABLE_COUNT,$dataOptn);
            $data 						  = array_merge($data, checkaccess($this->mnu_name)); 
		    $this->load->view('inventory/inventory-list', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function inventory_add()
	{
		$data['title'] 		=	'Inventory Add';

		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('inventory-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$data['code_title']    = 'Direct In Code';
		  	$data['global_asset_version'] = global_asset_version();

		  	$data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
		  	$inventory_data =  new stdClass();
		  	$inventory_data->piv_code = $this->home_model->getNewCode(
                                     		array(
                                     	 		'column'	=> 'piv_code',
                                     	 		'table'		=> 'product_inventory',
                                     	 		'type'		=>  PRODUCT_INVENTORY_DIRECT_IN_CODE,
                                     	 		'where'		=> 'piv_inv_type="'.PRODUCT_INVENTORY_TYPE_IN.'" and piv_type="'.PRODUCT_INVENTORY_IN_TYPE_DIRECT_IN.'" ' 
                                     		)
                                     	);
		  	$inventory_data->piv_date  = date('Y-m-d');
		  	$inventory_data->piv_inv_type  = PRODUCT_INVENTORY_TYPE_IN;
		  	$inventory_data->piv_type  = PRODUCT_INVENTORY_IN_TYPE_DIRECT_IN;
		  	$prd_id  = $this->input->get('product_id');
		  	$prd_name = $this->input->get('product_name');

		  	if(isset($prd_id) && isset($prd_name) && $prd_id != ''  && $prd_name != '')
		  	{

		  	$data['piv_prd_id']  	   =  $this->nextasy_url_encrypt->decrypt_openssl($prd_id);
		  	$data['piv_prd_id_value']  =  $this->nextasy_url_encrypt->decrypt_openssl($prd_name);
		  	$data['product'] = $this->inventory_model->getProductDetails($data['piv_prd_id']);
			  	if(isset($data['product']) && !empty($data['product']) && $data['product_size'] != '1')
			  	{
			  	     $data['piv_price'] = $data['product']->piv_price	;
			  	}
			  	if(isset($data['product']) && !empty($data['product']) && isset($data['product']->total_stock) && $data['product']->total_stock <= 0)
			  	{
				  	$data['piv_prd_id']  	   =  '';
				  	$data['piv_prd_id_value']  =  '';
				  	$data['piv_price']         =  '';
			  	}
		  	}
		  	else
	  		{
			  	$data['piv_prd_id']  	   =  '';
			  	$data['piv_prd_id_value']  =  '';
			  	$data['piv_price']         =  '';
		  	}
		  	$prs_id = $this->session->userdata(PEOPLE_SESSION_ID);
		  	$prs_name = $this->session->userdata(PEOPLE_SESSION_NAME);
		  	if($prs_id != '')
		  	{
		  	  $inventory_data->piv_managed_by  = $prs_id;
		  	  $inventory_data->piv_managed_by_value  = $prs_name;
		  	}
		  	$data['inventory_data'] = $inventory_data;
		    $this->load->view('inventory/inventory-add', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function inventory_add_purchase()
	{
		$data['title'] 		=	'Inventory Add Purchase';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('inventory-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		  	$data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
		  	$inventory_data =  new stdClass();
		  	$inventory_data->piv_date  = date('Y-m-d');
		  	$inventory_data->piv_inv_type  = PRODUCT_INVENTORY_TYPE_IN;
		  	$inventory_data->piv_type  = PRODUCT_INVENTORY_IN_TYPE_PURCHASE_ORDER;
		  	$prs_id = $this->session->userdata(PEOPLE_SESSION_ID);
		  	$prs_name = $this->session->userdata(PEOPLE_SESSION_NAME);
		  	$cmp_id  = $this->input->get('cmp_id');
		  	$cmp_name = $this->input->get('cmp_name');
		  	if(isset($cmp_id) && isset($cmp_name))
		  	{

		  	$inventory_data->piv_cmp_id  	    =  $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);
		  	$inventory_data->piv_cmp_id_value  	=  $this->nextasy_url_encrypt->decrypt_openssl($cmp_name);
		  	}
		  	$por_id  = $this->input->get('por_id');
		  	$por_name = $this->input->get('por_name');
		  	if(isset($por_id) && isset($por_name))
		  	{
		  	$inventory_data->piv_type_id  	    =  $this->nextasy_url_encrypt->decrypt_openssl($por_id);
		  	$inventory_data->piv_type_id_value  =  $this->nextasy_url_encrypt->decrypt_openssl($por_name);
		  	}

		  	if($prs_id != '')
		  	{
		  	  $inventory_data->piv_managed_by  = $prs_id;
		  	  $inventory_data->piv_managed_by_value  = $prs_name;
		  	}
		  	$data['inventory_data'] = $inventory_data;
		    $this->load->view('inventory/inventory-add-purchase', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}


	public function inventory_details($prd_encrypted_id)
	{
		$data['title'] 		=	'Inventory Details';
		$data['prd_encrypted_id']=$prd_encrypted_id;
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('inventory-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		  	$prd_id  = $this->nextasy_url_encrypt->decrypt_openssl($prd_encrypted_id);
		  	$data['product'] = $this->inventory_model->getProductDetails($prd_id);
		  	$data['product_location'] = $this->inventory_model->getProductDetailsByLocation($prd_id);
		  	$data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
		  	$data['product_variant'] = array();
		  	if($data['product_size'] == '1')
		  	{
    		  	$data['product_variant'] = $this->inventory_model->getProductDetailsByVariant($prd_id);
		  	}
		  		$data['start_date'] = $this->input->get('start_date');
		  		$data['end_date']   = $this->input->get('end_date');
		  	$data['title'] =    isset($data['product']->prd_name) ? $data['product']->prd_name:'';
		  	if(isset($data['product']->prd_unit_name)) $data['title'].= ' - '.$data['product']->prd_unit_name. " Inventory Details";
            $data = array_merge($data, checkaccess($this->mnu_name)); 
		  	$this->load->view('inventory/inventory-details', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	
     public function getProductDropdown()
	{
		$search      = $this->input->get('q');
		$location_from      = $this->input->get('location_from');
		$dropDownData = array('results'=>$this->inventory_model->getProductDropdown($search,$location_from));
		echo json_encode($dropDownData);
	}
	public function getProductVariantDropdown()
	{
		$search        = $this->input->get('q');
		$product       = $this->input->get('product');
		$location_from = $this->input->get('location_from');
		$dropDownData = array('results'=>$this->inventory_model->getProductVariantDropdown($product,$location_from,$search));
		echo json_encode($dropDownData);
	}
	public function multi_form_data_save()
    {
    	$form_data_save_id = $this->input->post('piv_id');
    	
        $form_data_id = $this->inventory_model->multi_form_data_save($form_data_save_id);
        if($form_data_id)
        {
            $form_data_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($form_data_id);
            $success = true;
            $message = 'Inventory updated successfully';
           /* if($form_data_save_id !='')
            {
               $message = 'Inventory updated successfully';
            }*/
            $linkn   = base_url('inventory-list');
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    public function getGenPrmforDropdown($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $genData = array('results'=>$this->inventory_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($genData);
    }
    public function checkUniqueCode($field,$id='')
    {
        $custom_data = array();
        $custom_data['table']	     = 'product_inventory';
        $custom_data['unique_col']   = 'piv_id';
        $custom_data['unique_id']    = $id;
        $custom_data['field']	     = $field;
        $custom_data['field_value']  = $this->input->post('value');
        $custom_data['custom_where']  =  ' and piv_inv_type="'.PRODUCT_INVENTORY_TYPE_IN.'" and piv_type="'.PRODUCT_INVENTORY_IN_TYPE_DIRECT_IN.'" ';
      $validate =  $this->home_model->checkUniqueCode($custom_data);
      if($validate->count > 0)
      {
         echo 'false';
      }
      else
      {
         echo 'true';
      }
    }

    public function getPeopleDropdown()
	{
		$search      = $this->input->get('q');
		$managed_by  = $this->input->get('managed_by');
		$dropDownData = array('results'=>$this->inventory_model->getPeopleDropdown($search,$managed_by));
		echo json_encode($dropDownData);
	}
	  public function getInventoryList()
    {
        log_message('nexlog','inventory ::getInventoryList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->inventory_model->getInventoryList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['prd_id']          = 'prd_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        // ******** Encrypt Data from multidimensional array ******//
        if(isset($dataOptn['columns']))
        {
            // *********** Get Data Count **********//
            $dataTableArray['draw']             = $dataOptn['draw'];
            $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
            $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//
        }
        log_message('nexlog','inventory ::getInventoryList << ');
        echo json_encode($dataTableArray);
    }
    public function getCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$dropDownData = array('results'=>$this->inventory_model->getCompanyDropdown(COMPANY_TYPE_ACCOUNT,$search));
		echo json_encode($dropDownData);
	}
	public function getPODropdown()
	{
		$search       = $this->input->get('q');
		$cmp_id       = $this->input->get('cmp_id');
		$dropDownData = array('results'=>$this->inventory_model->getPODropdown($search,$cmp_id));
		echo json_encode($dropDownData);
	}
	public function getPOProducts($po_id)
	{
		$dropDownData = $this->inventory_model->getPOProducts($po_id);
		echo json_encode($dropDownData);
	}
	  public function getInventoryDetailList($inv_type)
    {
        log_message('nexlog','inventory ::getInventoryDetailList >> ');
        $dataOptn = $this->input->get();
        $dataOptn['inv_type'] = $inv_type;
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->inventory_model->getInventoryDetailList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['piv_id']          = 'piv_encrypted_id';
        $enc_arr['piv_type_id']     = 'piv_type_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        // ******** Encrypt Data from multidimensional array ******//
        if(isset($dataOptn['columns']))
        {
            // *********** Get Data Count **********//
            $dataTableArray['draw']             = $dataOptn['draw'];
            $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
            $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//
        }
        log_message('nexlog','inventory ::getInventoryDetailList << ');
        echo json_encode($dataTableArray);
    }
     public function getProductInventoryData()
	{
		$prd_id          = $this->input->post('prd_id');
		$start_date      = $this->input->post('start_date');
		$end_date        = $this->input->post('end_date');
		$location_value  = $this->input->post('location_value');
		$data['product']		  = $this->inventory_model->getProductDetails($prd_id,$start_date,$end_date);
		$data['product_location'] = $this->inventory_model->getProductDetailsByLocation($prd_id,$start_date,$end_date);
		$data['product_variant']  = $this->inventory_model->getProductDetailsByVariant($prd_id,$start_date,$end_date,$location_value);
		echo json_encode($data);
	}
	public function updateCustomData()
    {
    	$response = array();
        $custmData = $this->inventory_model->updateCustomData();
         if($custmData == 1)
        {
            $success = true;
            $message = 'Details saved successfully';
            // $response = array_merge($response,$customData);
        }
        else if($custmData == 'total_stock_negative')
        {
        	$success  = false;
            $message  = TOTAL_STOCK_NEGATIVE_MESSAGE;
            $response = '';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $response = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'response'=>$response));
    }
    public function inventory_out()
	{
		$data['title'] 		=	'Inventory Out';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('inventory-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$data['code_title']    = 'Direct Out Code';
		  	$data['global_asset_version'] = global_asset_version();
		  	$data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
		  	$inventory_data =  new stdClass();
		  	$inventory_data->piv_code = $this->home_model->getNewCode(
                                     		array(
                                     	 		'column'	=> 'piv_code',
                                     	 		'table'		=> 'product_inventory',
                                     	 		'type'		=>  PRODUCT_INVENTORY_DIRECT_OUT_CODE,
                                     	 		'where'		=> 'piv_inv_type="'.PRODUCT_INVENTORY_TYPE_OUT.'" and piv_type="'.PRODUCT_INVENTORY_OUT_TYPE_DIRECT_OUT.'" ' 
                                     		)
                                     	);
		  	$inventory_data->piv_date  = date('Y-m-d');
		  	$inventory_data->piv_inv_type  = PRODUCT_INVENTORY_TYPE_OUT;
		  	$inventory_data->piv_type  = PRODUCT_INVENTORY_OUT_TYPE_DIRECT_OUT;
		  	$prd_id  = $this->input->get('product_id');
		  	$prd_name = $this->input->get('product_name');
		  	if(isset($prd_id) && isset($prd_name))
		  	{

		  	$data['piv_prd_id']  	   =  $this->nextasy_url_encrypt->decrypt_openssl($prd_id);
		  	$data['piv_prd_id_value']  =  $this->nextasy_url_encrypt->decrypt_openssl($prd_name);
		  	$data['product'] = $this->inventory_model->getProductDetails($data['piv_prd_id']);
			  	if(isset($data['product']) && !empty($data['product']) && $data['product_size'] != '1')
			  	{
			  		 $data['piv_price'] 	  = $data['product']->piv_price	;
			  		 $data['total_stock'] 	  = $data['product']->total_stock;
			  	}
			  	if(isset($data['product']) && !empty($data['product']) && isset($data['product']->total_stock) && $data['product']->total_stock <= 0)
			  	{
				  	$data['piv_prd_id']  	   =  '';
				  	$data['piv_prd_id_value']  =  '';
				  	$data['piv_price']         =  '';
			  		$data['total_stock']  	   = '';
			  	}
		  	}
		  	$prs_id = $this->session->userdata(PEOPLE_SESSION_ID);
		  	$prs_name = $this->session->userdata(PEOPLE_SESSION_NAME);
		  	

		  	if($prs_id != '')
		  	{
		  	  $inventory_data->piv_managed_by  = $prs_id;
		  	  $inventory_data->piv_managed_by_value  = $prs_name;
		  	}
		  	$data['inventory_data'] = $inventory_data;
		    $this->load->view('inventory/inventory-out', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}
	public function inventory_out_dispatch()
	{
		$data['title'] 		=	'Inventory Dispatch Out ';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('inventory-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		  	$data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
		  	$inventory_data =  new stdClass();
		  	$inventory_data->piv_date  = date('Y-m-d');
		  	$inventory_data->piv_inv_type  = PRODUCT_INVENTORY_TYPE_OUT;
		  	$inventory_data->piv_type  = PRODUCT_INVENTORY_OUT_TYPE_DISPATCH_ORDER;
		  	$prs_id = $this->session->userdata(PEOPLE_SESSION_ID);
		  	$prs_name = $this->session->userdata(PEOPLE_SESSION_NAME);
		  	
		  	$cmp_id  = $this->input->get('cmp_id');
		  	$cmp_name = $this->input->get('cmp_name');
		  	if(isset($cmp_id) && isset($cmp_name))
		  	{

		  	$inventory_data->piv_cmp_id  	    =  $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);
		  	$inventory_data->piv_cmp_id_value  	=  $this->nextasy_url_encrypt->decrypt_openssl($cmp_name);
		  	}
		  	$dor_id  = $this->input->get('dor_id');
		  	$dor_name = $this->input->get('dor_name');
		  	if(isset($dor_id) && isset($dor_name))
		  	{

		  	$inventory_data->piv_type_id  	    =  $this->nextasy_url_encrypt->decrypt_openssl($dor_id);
		  	$inventory_data->piv_type_id_value  =  $this->nextasy_url_encrypt->decrypt_openssl($dor_name);
		  	}

		  	if($prs_id != '')
		  	{
		  	  $inventory_data->piv_managed_by  = $prs_id;
		  	  $inventory_data->piv_managed_by_value  = $prs_name;
		  	}
		  	$data['inventory_data'] = $inventory_data;
		    $this->load->view('inventory/inventory-out-dispatch', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}
		public function getDODropdown()
	{
		$search       = $this->input->get('q');
		$cmp_id       = $this->input->get('cmp_id');
		$dropDownData = array('results'=>$this->inventory_model->getDODropdown($search,$cmp_id));
		echo json_encode($dropDownData);
	}
	public function getDOProducts($po_id)
	{
		$dropDownData = $this->inventory_model->getDOProducts($po_id);
		echo json_encode($dropDownData);
	}
	  public function getProductVariantData()
	{
		$prd_id        = $this->input->post('prd_id');
		$start_date    = $this->input->post('start_date');
		$end_date      = $this->input->post('end_date');
		$location_value      = $this->input->post('location_value');
		$data['product_variant']  = $this->inventory_model->getProductDetailsByVariant($prd_id,$start_date,$end_date,$location_value);
		echo json_encode($data);
	}
}

?>
