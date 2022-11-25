<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('product_model');
		$this->mnu_name = 'product-list';
	}
	public function product_list($productFilter='')
	{
		$data['title'] 		=	'Product List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'list')) {
			  $data['global_asset_version']  = global_asset_version();
			  $data['productFilter'] = $productFilter;
			  $dataOptn['mnu_name'] =$this->mnu_name;
				$data['dataTableData'] = $this->product_model->product_getlist(TABLE_COUNT,$dataOptn);
        $data 								 = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('product/product-list', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}
	public function product_add()
	{
		$data['title'] 		=	'Product Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('product-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add')) {
			  $data['global_asset_version']  = global_asset_version();
	    $data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        $data['product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';
        $data 								 = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('product/product-add', $data);
    }
    else $this->load->view('errors/easynow_404', $data);

	}

	public function product_edit($prd_id_encrypt)
	{
		$data['title'] 		=	'Product Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('product-list'));
		$data['breadcrumb_data'][] = array('Detail',base_url('product-details-'.$prd_id_encrypt));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$prd_id = $this->nextasy_url_encrypt->decrypt_openssl($prd_id_encrypt);
		if (checkaccess($this->mnu_name, 'edit')) {
				$data['product']          = $this->product_model->getProductById($prd_id);
				$data['product_variant'] = $this->product_model->getProductVariantByProductId($prd_id);
				$data['product']->prd_id_encrypt   = $this->nextasy_url_encrypt->encrypt_openssl($data['product']->prd_id);
				$data['product']->prd_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['product']->prd_name);
				// ***** Breadcrumb Data Ends here *******//
				$data['global_asset_version'] = global_asset_version();
		$data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        $data['product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';		
        $data 								 = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('product/product-add', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	public function product_details($slug)
	{

		$data['title'] 		=	'Product Detail';
	   	// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('product-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'detail')) {
			  $slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
				$data['productdata'] = $this->product_model->getProductById($slug);
				$data['productdata']->prd_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['productdata']->prd_id);
				$data['productdata']->prd_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['productdata']->prd_name);
				$data['productdata']->next_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['productdata']->next);
				$data['productdata']->prev_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['productdata']->prev);
				// ***** Breadcrumb Data Ends here *******//
				$data['global_asset_version']  = global_asset_version();
				$data['product_variant'] = $this->product_model->getProductVariantByProductId($data['productdata']->prd_id);
        		$data = array_merge($data, checkaccess($this->mnu_name));
        		$data['title'] 		=	$data['productdata']->prd_name;
        		$data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
        		 $data['product_unit'] = ($this->home_model->getBusinessParamData(PRODUCT_UNIT)) ? $this->home_model->getBusinessParamData(PRODUCT_UNIT)->bpm_value:'0';
        $this->load->view('product/product-details', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	function product_getlist()
	{
		  $dataOptn = $this->input->get();
			  $dataOptn['mnu_name'] =$this->mnu_name;
	      $dataTableData = $this->product_model->product_getlist(TABLE_RESULT,$dataOptn);
	      // ******** Encrypt Data from multidimensional array ******//
	      $enc_arr['prd_id']    = 'prd_id_encrypt';
	      $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
	      // ******** Encrypt Data from multidimensional array ******//
	      if(isset($dataOptn['columns']))
	        {
	           // *********** Get Data Count **********//
	              $dataTableArray['draw']             = $dataOptn['draw'];
	              $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
	              $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
	          // *********** Get Data Count **********//
	      }
	      echo json_encode($dataTableArray);
	}

	public

	function product_insert()
	{
		$inserted_id = $this->product_model->save_product();

		if ($inserted_id)
		{
			$response = array(
				'success' => true,
				'message' => 'Product added successfully',
				'linkn' => base_url('product-details-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Product'
			);
			echo json_encode($response);
		}
	}

	public

	function product_update()
	{
		$prdData = $this->input->post();

		$prdData['prd_status'] = '1';
		$prdData['prd_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$prdData['prd_updt_dt'] = date("Y-m-d H:i:s");

		$updated = $this->home_model->update('prd_id', $prdData['prd_id'], $prdData, 'product');

		if ($updated)
		{
			$prd_id = $prdData['prd_id'];
			$response = array(
				'success' => true,
				'message' => 'Product Updated successfully',
				'linkn' => base_url('product-details-' . $this->nextasy_url_encrypt->encrypt_openssl($prd_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Product'
			);
			echo json_encode($response);
		}
	}

	public function deleteProduct()
	{
		$prd_id    = $this->input->post('prd_id');
		$prd_id = $this->nextasy_url_encrypt->decrypt_openssl($prd_id);

		$check     = $this->product_model->deleteProduct($prd_id);
		if($check)
		{
			$response = array('success' => True, 'message'=>'Product removed successfully' ,'linkn' => base_url('product-list'));
			echo json_encode($response);
		}
	}
   // ***** People Start Here *******//
	// public function getPeopleforDropdown()
	// {
	// 	$search     = $this->input->get('q');
	// 	$peopleData = array('results'=>$this->product_model->getPeopleforDropdown($search));
	// 	echo json_encode($peopleData);
	// }
  //   // ***** People End Here ********//
  //  // ***** Department Start Here *******//
	// public function getDepartmentforDropdown()
	// {
	// 	$search     = $this->input->get('q');
	// 	$peopleData = array('results'=>$this->product_model->getDepartmentforDropdown($search));
	// 	echo json_encode($peopleData);
	// }
  //   // ***** Department End Here ********//
	//
	public function getGenPrmforDropdown($genPrmGroup)
	{
		$search   = $this->input->get('q');
		$prv_variant_id = $this->input->get('product_size');
		$result = array('results'=>$this->product_model->getGenPrmforDropdown($genPrmGroup,$search,$prv_variant_id));
		echo json_encode($result);
	} 
    public function check_sku_avalibility()
     {
      	$result = $this->product_model->is_sku_available();
     	if($result)
      	{
           $valid = "true";
      	}
      	else
      	{
          $valid = "false";
      	}
      	echo $valid;       
      
     } 

}

?>
