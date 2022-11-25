<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_logged();
        $this->load->model('Subscription_model');
		$this->mnu_name = 'subscription-list';
	}

	public function subscription_list()
	{
		$data['title'] 		=	'Subscription List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		$data['dataTableData'] = $this->Subscription_model->subscriptionList(TABLE_COUNT);
		if (checkaccess($this->mnu_name, 'list'))
		  {
		  	$data['global_asset_version'] = global_asset_version();
	        $data 					= array_merge($data, checkaccess($this->mnu_name));
		    $this->load->view('subscription/subscription-list', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function subscription_add()
	{
		$data['title'] 		=	'Subscription Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('subscription-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		    $this->load->view('subscription/subscription-add', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function subscription_details($scr_encrypted_id)
	{
		$data['title'] 		=	'Subscription Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('subscription-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail'))
		  {	
		  	$data['global_asset_version'] 	= global_asset_version();
			$data['scr_encrypted_id'] 		= $scr_encrypted_id;
			$scr_id  = $this->nextasy_url_encrypt->decrypt_openssl($scr_encrypted_id);

			$scr_details 		= $this->Subscription_model->getSubscriptionDetailByID($scr_id);
			$scr_trn_details 	= $this->Subscription_model->getSubscriptionTrnDetailByID($scr_id);

			$scr_details->scr_encrypt_id 			= $this->nextasy_url_encrypt->encrypt_openssl($scr_details->scr_id);
			$scr_details->scr_encrypt_client_id 	= $this->nextasy_url_encrypt->encrypt_openssl($scr_details->scr_client_id);
			$scr_details->scr_encrypt_account_id 	= $this->nextasy_url_encrypt->encrypt_openssl($scr_details->scr_account_id);

		  	$data['scr_details'] 		= $scr_details;
		  	$data['scr_trn_details'] 	= $scr_trn_details;
		  	$this->load->view('subscription/subscription-details', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	function getSubscriptionList()
	{
		$dataOptn = $this->input->get();
		$dataTableData = $this->Subscription_model->subscriptionList(TABLE_RESULT,$dataOptn);
		// ******** Encrypt Data from multidimensional array ******//
		$enc_arr['scr_id']    		= 'scr_id_encrypt';
		$enc_arr['scr_client_id']   = 'scr_ppl_id_encrypt';
		$enc_arr['scr_account_id']	= 'scr_cmp_id_encrypt';
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

	function getStatusforDropdown($col_name)
	{
		$search   = $this->input->get('q');
		$sub_status_data = array('results'=>$this->Subscription_model->getStatusforDropdown($search));
		echo json_encode($sub_status_data);
	}

	function updateSubscriptionCustomData()
	{
        $companyData = $this->Subscription_model->updateSubscriptionCustomData();
        if($companyData)
        {
            $success = true;
            $message = 'Details saved successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message));
	}

}

?>
