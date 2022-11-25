<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockTransfer extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->mnu_name = 'stock-transfer-list';
		$this->load->model('stockTransfer_model');
	}

	public function stock_transfer_list()
	{
		$data['title'] 		=	'Stock Transfer List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'list'))
		  {
		  	$data['global_asset_version'] = global_asset_version();
		  	$dataOptn['mnu_name']		  = $this->mnu_name;
            $data['dataTableData']        = $this->stockTransfer_model->getStockTransferList(TABLE_COUNT,$dataOptn);
            $data 						  = array_merge($data, checkaccess($this->mnu_name)); 
		    $this->load->view('stock-transfer/stock-transfer-list', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function stock_transfer_add()
	{
		$data['title'] 		=	'Stock Transfer Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('stock-transfer-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		  	$data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
		  	$stockTransfer_data =  new stdClass();
		  	$stockTransfer_data->piv_code = $this->home_model->getNewCode(
                                     		array(
                                     	 		'column'	=> 'stf_code',
                                     	 		'table'		=> 'stock_transfer',
                                     	 		'type'		=>  STOCK_TRANSFER_CODE,
                                     	 		'where'		=> '' 
                                     		)
                                     	);
		  	$stockTransfer_data->piv_date  = date('Y-m-d');
		  	$prs_id = $this->session->userdata(PEOPLE_SESSION_ID);
		  	$prs_name = $this->session->userdata(PEOPLE_SESSION_NAME);
		  	if($prs_id != '')
		  	{
		  	  $stockTransfer_data->piv_managed_by  = $prs_id;
		  	  $stockTransfer_data->piv_managed_by_value  = $prs_name;
		  	}
		  	$data['stockTransfer_data'] = $stockTransfer_data;
		    $this->load->view('stock-transfer/stock-transfer-add', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}


	public function stock_transfer_details($stf_encrypted_id)
	{
		$data['title'] 		=	'Stock Transfer Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('stock-transfer-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		  	$stf_id  = $this->nextasy_url_encrypt->decrypt_openssl($stf_encrypted_id);
		  	$data['stock_transfer'] = $this->stockTransfer_model->getStockTransferDetails($stf_id);
		  	$data['product_size'] = ($this->home_model->getBusinessParamData(PRODUCT_SIZE)) ? $this->home_model->getBusinessParamData(PRODUCT_SIZE)->bpm_value:'0';
		  	if(!empty($data['stock_transfer']))
		  	{
		  		
		  	$data['title'] =    'Stock Transfer '.isset($data['stock_transfer']->stf_code) ? $data['stock_transfer']->stf_code:'';
		  	}
            $data = array_merge($data, checkaccess($this->mnu_name)); 
		    $this->load->view('stock-transfer/stock-transfer-details', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}


	 public function getProductDropdown()
	{
		$search      	= $this->input->get('q');
		$location_from  = $this->input->get('location_from');
		$dropDownData = array('results'=>$this->stockTransfer_model->getProductDropdown($search,$location_from));
		echo json_encode($dropDownData);
	}
	public function getProductVariantDropdown()
	{
		$search       = $this->input->get('q');
		$product      = $this->input->get('product');
		$location_from      = $this->input->get('location_from');
		$dropDownData = array('results'=>$this->stockTransfer_model->getProductVariantDropdown($product,$search,$location_from));
		echo json_encode($dropDownData);
	}
	public function multi_form_data_save()
    {
    	// $form_data_save_id = $this->input->post('piv_id');
    	
        $form_data_id = $this->stockTransfer_model->multi_form_data_save();
        if($form_data_id)
        {
            $form_data_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($form_data_id);
            $success = true;
            $message = 'Stock Transfer added successfully';
           /* if($form_data_save_id !='')
            {
               $message = 'Inventory updated successfully';
            }*/
            $linkn   = base_url('stock-transfer-details-'.$form_data_encrypted_id);
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
        $gnp_value   = $this->input->get('gnp_value');
        $genData = array('results'=>$this->stockTransfer_model->getGenPrmforDropdown($genPrmGroup,$search,$gnp_value));
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
        $custom_data['custom_where']  = ' and piv_inv_type="'.PRODUCT_INVENTORY_TYPE_IN.'"';
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
		$dropDownData = array('results'=>$this->stockTransfer_model->getPeopleDropdown($search,$managed_by));
		echo json_encode($dropDownData);
	}
	  public function getInventoryList()
    {
        log_message('nexlog','inventory ::getInventoryList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->stockTransfer_model->getInventoryList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['piv_id']          = 'piv_encrypted_id';
        $enc_arr['piv_prd_id']      = 'piv_prd_encrypted_id';
        $enc_arr['piv_managed_by']  = 'piv_managed_by_encrypted_id';
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
		$dropDownData = array('results'=>$this->stockTransfer_model->getCompanyDropdown(COMPANY_TYPE_ACCOUNT,$search));
		echo json_encode($dropDownData);
	}
	public function getPODropdown()
	{
		$search       = $this->input->get('q');
		$cmp_id       = $this->input->get('cmp_id');
		$dropDownData = array('results'=>$this->stockTransfer_model->getPODropdown($search,$cmp_id));
		echo json_encode($dropDownData);
	}
	public function getPOProducts($po_id)
	{
		$dropDownData = $this->stockTransfer_model->getPOProducts($po_id);
		echo json_encode($dropDownData);
	}
	  public function getStockTransferList()
    {
        log_message('nexlog','stockTransfer ::getStockTransferList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->stockTransfer_model->getStockTransferList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['stf_id']          = 'stf_encrypted_id';
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
        log_message('nexlog','stockTransfer ::getStockTransferList << ');
        echo json_encode($dataTableArray);
    }

    public function updateCustomData()
    {
    	$response = array();
        $custmData = $this->stockTransfer_model->updateCustomData();
        if($custmData)
        {
        	 
            $success = true;
            $message = 'Details saved successfully';
            // $response = array_merge($response,$customData);
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $response = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'response'=>$response));
    }
}

?>

	
