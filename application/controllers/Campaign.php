<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller
{

	function __construct()
	{
		// Call the Model constructor

		parent::__construct();
		$this->mnu_name = 'campaign-list';
	}

	public function campaign_list()
	{
		$data['title'] 		=	'Campaign List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'list'))
		{
			$data['global_asset_version'] = global_asset_version();        
			$this->load->view('campaign/campaign-list', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	public function campaign_add()
	{
		$data['title'] 		=	'Campaign Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('campaign-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add')) {
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('campaign/campaign-add', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	public function campaign_details()
	{
		$data['title'] 		=	'Campaign Details';
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('campaign-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		if (checkaccess($this->mnu_name, 'detail')){
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('campaign/campaign-details', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	
}

?>