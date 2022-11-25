<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_access extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		check_logged();
        $this->load->model('form_access_model');
        $this->mnu_name = 'form-access';
    }

    public function index()
	{
		$data['title'] 		=	'Form Access';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		 if (checkaccess($this->mnu_name, 'list'))
	    {
	       	$data['cacheversion'] = global_asset_version();
	        $data = array_merge($data, checkaccess($this->mnu_name));
	        $this->load->view('form-access', $data);
	    }
	    else $this->load->view('errors/easynow_404', $data);	
	}

	function getModules()
	{
		echo json_encode($this->form_access_model->getModules());
	}

	function updateAccess()
	{
		$access_data = $this->input->post();
		echo $this->form_access_model->updateAccess($access_data);
	}

	function getEmployeeforDropdown()
	{
        $search   = $this->input->get('q');
        $employee_data = array('results'=>$this->form_access_model->getEmployeeforDropdown($search));
        echo json_encode($employee_data);
    }

    function getAccessDetail($ppl_id)
    {
    	echo json_encode($this->form_access_model->getAccessDetail($ppl_id));
    }

    function encrypt($data)
    {
    	echo $this->nextasy_url_encrypt->encrypt_openssl($data);
    }

    function decrypt($data)
    {
    	echo $this->nextasy_url_encrypt->decrypt_openssl($data);
    }
}