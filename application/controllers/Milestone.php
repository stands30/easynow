<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Milestone extends CI_Controller
{
	

	

	public function milestone_list()
	{
		$data['title'] 		=	'Milestone List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
        
		$this->load->view('milestone/milestone-list', $data);
	}
	public function milestone_add()
	{
		$data['title'] 		=	'Milestone Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('milestone-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
		$this->load->view('milestone/milestone-add', $data);
	}
	public function milestone_details()
	{
		$data['title'] 		=	'Milestone Details';
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('milestone-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['cacheversion'] = global_asset_version();
		$this->load->view('milestone/milestone-details', $data);
	}
	
}

?>