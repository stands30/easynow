<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productivity extends CI_Controller
{
	

	

	public function productivity_dashboard()
	{
		$data['title'] 		=	'Productivity Dashboard';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
		$this->load->view('productivity/productivity-dashboard', $data);
	}
	
	
}

?>