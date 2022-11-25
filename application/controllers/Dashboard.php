<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        check_logged();
		$this->load->model('dashboard_model');
		 $this->mnu_name = 'dashboard';
    }

	public function index()
	{
		$data['title'] 		=	'Dashboard';
		$data['include'] 	=	'dashboard';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$data['today_follow_up'] = $this->dashboard_model->getTodayFollowUp();
		$data['sales'] 			 = $this->dashboard_model->getSalesPiepeLine();
		$data['lead_status'] 	 = $this->dashboard_model->getLeadStatus();
		$this->load->view('dashboard', $data);
	}
	public function dashboard_main()
	{
		$data['breadcrumb_data'][] = array('Home');
		
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$this->load->view('dashboard-main', $data);
	}
	public function admin_dashboard()
	{
		$data['breadcrumb_data'][] = array('Home');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['sales_funnel'] = $this->dashboard_model->getLeadStage();
		$data['global_asset_version'] = global_asset_version();
		$data['ci_asset_versn'] = ci_asset_versn();

		$data['lead_upcoming_followup'] = $this->dashboard_model->getFollowUpListByStatus('upcoming');
		$data['lead_today_followup'] 	= $this->dashboard_model->getFollowUpListByStatus('today');
		$data['lead_pending_followup'] 		= $this->dashboard_model->getFollowUpListByStatus('pending');

		$this->load->view('admin-dashboard', $data);
	}	

	public function my_team_dashboard()
	{
		$data['breadcrumb_data'][] = array('Home');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);		
		$data['global_asset_version'] = global_asset_version();
		$data['ci_asset_versn'] = ci_asset_versn();
		$this->load->view('my-team-dashboard', $data);
	}	

	public function team_dashboard()
	{
		$data['title'] 		=	'Team Dashboard';
		$data['breadcrumb_data'][] = array('Home');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);		
		$data['global_asset_version'] = global_asset_version();
		$data['ci_asset_versn'] = ci_asset_versn();
		$this->load->view('team-dashboard', $data);
	}	

	public function dashboard_pipeline()
	{
		$data['title']      =   'People Dashboard';
		$data['breadcrumb_data'][] = array('Home');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$this->load->view('dashboard-pipeline', $data);
	}

	public function lead_status_list($lead_encrypt_status = '')
	{
		$data['led_lead_status'] = $lead_encrypt_status;
		$data['title'] 		=	'Status List';
		$data['include'] 	=	'dashboard';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('lead/lead_status_list', $data);

	}

	function leadstatus_getlist($led_lead_status)
	{
		$led_lead_status = $this->nextasy_url_encrypt->decrypt_openssl($led_lead_status);
		$obj['data']     = $this->dashboard_model->leadstatus_getlist($led_lead_status);

		for($i = 0; $i < count($obj['data']); $i++)
		{
			$obj['data'][$i]->led_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($obj['data'][$i]->led_id);
			$obj['data'][$i]->led_ppl_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($obj['data'][$i]->led_ppl_id);
		}

		echo json_encode($obj);
	}
	public function dashboard_my_day()
	{
		$data['breadcrumb_data'][] = array('Home');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		
		$this->load->view('dashboard-my-day', $data);
	}

	public function sales_pipeline()
	{
		$data['title']      =   'Sales Pipeline Dashboard';
		$data['breadcrumb_data'][] = array('Home');
		$data['global_asset_version'] = global_asset_version();
		$data['ci_asset_versn'] = ci_asset_versn();

		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$this->load->view('sales-pipeline', $data);
	}


	public function customer_dashboard()
	{
		$data['title'] 		=	'Dashboard';
		$data['breadcrumb_data'][] = array('Home');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('customer-dashboard', $data);
	}

	public function order_dashboard()
	{
		$data['title'] 		         =	'Dashboard';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
	   if (checkaccess($this->mnu_name, 'list'))
	    {
	       	$data['ci_asset_version']          	  = ci_asset_versn();
	    	$data['global_asset_version']      	  = global_asset_version();
	    	$data['dataTableData'] = $this->dashboard_model->pendingPOList(TABLE_COUNT);
	    	$data['dataTableData'] = $this->dashboard_model->dorList(TABLE_COUNT);
	        $data = array_merge($data, checkaccess($this->mnu_name));
	        $this->load->view('order_dashboard', $data);
	    }
	    else $this->load->view('errors/easynow_404', $data);
	}
	public function pendingPOList()
	 {
	  $dataOptn = $this->input->get();
      $dataTableData = $this->dashboard_model->pendingPOList(TABLE_RESULT,$dataOptn);
      // ******** Encrypt Data from multidimensional array ******//
      $enc_arr['por_id']    	= 'por_id_encrypt';
      $enc_arr['por_vdr_id']    = 'por_vdr_id_encrypt';
      $dataTableArray['data'] 	= encrypt_key_in_array($dataTableData,$enc_arr);
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
	 public function dorList()
	 {
	  $dataOptn = $this->input->get();
      $dataTableData = $this->dashboard_model->dorList(TABLE_RESULT,$dataOptn);
      // ******** Encrypt Data from multidimensional array ******//
      $enc_arr['dor_id']    = 'dor_id_encrypt';
      $enc_arr['dor_cmp_id']    = 'dor_cmp_id_encrypt';
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
}

?>