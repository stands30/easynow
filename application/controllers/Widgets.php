<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widgets extends CI_Controller
{
	public function custom_widgets()
	{
		$data['title'] 		=	'Custom Widgets';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
        
		$this->load->view('widgets/custom-widgets', $data);
	}
}

?>