<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends CI_Controller
{
	

	

	public function module_list()
	{
		$data['title'] 		=	'Module List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
        
		$this->load->view('module/module-list', $data);
	}
	public function module_add()
	{
		$data['title'] 		=	'Module Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('module-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
		$this->load->view('module/module-add', $data);
	}
	public function module_details()
	{
		$data['title'] 		=	'Module Details';
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('module-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['cacheversion'] = global_asset_version();
		$this->load->view('module/module-details', $data);
	}
	
}

?>