<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outstanding extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->mnu_name = 'outstanding-list';
		$this->payment_mnu_name = 'payment-list';
		$this->load->model('outstanding_model');
	}

	public function outstanding_list()
	{
		$data['title'] 		=	'Outstanding List';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'list'))
		  {
		  	 $data['global_asset_version'] = global_asset_version();
		  	 $dataOptn['mnu_name']=$this->mnu_name;
	         $data['dataTableData'] = $this->outstanding_model->getOutstandingData(TABLE_RESULT,$dataOptn);
             $data = array_merge($data, checkaccess($this->mnu_name));  
            $data['payment_access'] = checkaccess($this->payment_mnu_name); 
		      $this->load->view('finance/outstanding/outstanding-list', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function outstanding_add()
	{
		$data['title'] 		=	'Outstanding Add';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('outstanding-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		if (checkaccess($this->mnu_name, 'add'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		    $this->load->view('finance/outstanding/outstanding-add', $data);
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}


	public function outstanding_details($cmp_encrypted_id)
	{
		$data['title'] 		=	'Outstanding Details';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('outstanding-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		  	$cmp_id = $this->nextasy_url_encrypt->decrypt_openssl($cmp_encrypted_id);
		  	if($cmp_id != '')
		  	{
		  		$dataOptn = array();
		  		$data['cmp_encrypted_id'] = $cmp_encrypted_id;
		  		$dataOptn['cmp_id'] = $cmp_id;
		  		$dataOptn['mnu_name'] = $this->mnu_name;
		  		$data['start_date'] = $this->input->get('start_date');
		  		$data['end_date']   = $this->input->get('end_date');
		  		$data['company'] = $this->outstanding_model->getOutstandingDataByCompany($dataOptn);
		  		$data['title'] = isset($data['company']->cmp_name) ? $data['company']->cmp_name.' Outstanding Details':'';
                $data = array_merge($data, checkaccess($this->mnu_name));
                $data['payment_access'] = checkaccess($this->payment_mnu_name);   
		        $this->load->view('finance/outstanding/outstanding-details', $data);
   			}
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}

	public function outstanding_print($cmp_encrypted_id)
	{
		$data['title'] 		=	'Outstanding Print';
		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('outstanding-list'));
		$data['breadcrumb_data'][] = array('Print');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'print'))
		  {	
		  	$data['global_asset_version'] = global_asset_version();
		  		$cmp_id = $this->nextasy_url_encrypt->decrypt_openssl($cmp_encrypted_id);
		  	if($cmp_id != '')
		  	{
		  		$dataOptn = array();
		  		$data['cmp_encrypted_id'] = $cmp_encrypted_id;
		  		$dataOptn['cmp_id'] = $cmp_id;
		  		$dataOptn['mnu_name'] = $this->mnu_name;
		  		$data['company'] = $this->outstanding_model->getOutstandingDataByCompany($dataOptn);
		  		$data['title'] = isset($data['company']->cmp_name) ? $data['company']->cmp_name.' Outstanding Details':'';
      		  	$this->load->view('finance/outstanding/outstanding-print', $data);
   			}
		  }
	    else 
	     {
	    	$this->load->view('errors/easynow_404', $data);
	     }
	}


	 public function getOutstandingList()
    {
        log_message('nexlog','outstanding::getOutstandingList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->outstanding_model->getOutstandingData(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['inv_id']          = 'inv_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        $enc_arr['inv_crdt_by']          = 'crdt_by_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        $enc_arr['inv_cmp_id']          = 'cmp_encrypted_id';
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
        log_message('nexlog','outstanding::getOutstandingList << ');
        echo json_encode($dataTableArray);
    }
     public function getCompanyOutstandingsList()
    {
        log_message('nexlog','outstanding::getCompanyOutstandingsList >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
 
		 $dataOptn['mnu_name']=$this->mnu_name;

        $dataTableData = $this->outstanding_model->getCompanyOutstandingsList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['payment_detail_id']          = 'payment_detail_id_encrypted';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
      
         $dataTableArray['data']  = $dataTableData;
        // ******** Encrypt Data from multidimensional array ******//
        if(isset($dataOptn['columns']))
        {
            // *********** Get Data Count **********//
            $dataTableArray['draw']             = $dataOptn['draw'];
            $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
            $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//
        }
        log_message('nexlog','outstanding::getCompanyOutstandingsList << ');
        echo json_encode($dataTableArray);
    }

         public function getOutstandingBalanceData()
    {
    	$dataOptn = array();
  		$dataOptn['cmp_id'] = $this->input->post('cmp_id');
  		$dataOptn['start_date'] = $this->input->post('start_date');
  		$dataOptn['end_date'] = $this->input->post('end_date');
  		$dataOptn['mnu_name'] = $this->mnu_name;
  		$cmp_data = $this->outstanding_model->getOutstandingDataByCompany($dataOptn);
  		if(empty($cmp_data))
  		{
  			$cmp_data = array();
  		}
        echo json_encode($cmp_data);
    }
}

?>
