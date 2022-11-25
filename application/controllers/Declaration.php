<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Declaration extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->mnu_name = 'declaration-list';
	}
	public function declaration_list()
	{
		$data['title'] 		=	'Declaration List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'list'))
		{
			$data['global_asset_version'] = global_asset_version();
        
			$this->load->view('declaration/declaration-list', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	public function declaration_add()
	{
		$data['title'] 		=	'Declaration Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('declaration-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add')) {
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('declaration/declaration-add', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	public function declaration_details()
	{
		$data['title'] 		=	'Declaration Details';
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('declaration-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		if (checkaccess($this->mnu_name, 'detail'))
		{
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('declaration/declaration-details', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	
}

?>