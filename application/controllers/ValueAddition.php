<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValueAddition extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->mnu_name = 'value-addition-list';
	}
	public function value_addition_list()
	{
		$data['title'] 		=	'Value Addition List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'list'))
		{
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('value-addition/value-addition-list', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	public function value_addition_add()
	{
		$data['title'] 		=	'Value Addition Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('value-addition-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add')) {
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('value-addition/value-addition-add', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	public function value_addition_details()
	{
		$data['title'] 		=	'Value Addition Details';
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('value-addition-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		if (checkaccess($this->mnu_name, 'detail'))
		{
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('value-addition/value-addition-details', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

}

?>
