<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resources extends CI_Controller
{
	

	

	public function resources_list()
	{
		$data['title'] = 'Resources List';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['global_asset_version'] = global_asset_version();
		$data['ci_asset_versn'] = ci_asset_versn();
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		$this->load->view('resources/resources-list', $data);
	}

	public function resources_add()
	{
		$data['title'] = 'Resources Add';
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('resources-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['global_asset_version'] = global_asset_version();
		$data['ci_asset_versn'] = ci_asset_versn();
		$this->load->view('resources/resources-add', $data);
	}

	

	public function resources_details()
	{
		$data['title'] = 'Resources Details';
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('resources-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$this->load->view('resources/resources-details', $data);
	}

	
}

?>
