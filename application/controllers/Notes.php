<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller
{
	

	

	public function notes_list()
	{
		$data['title'] = 'Notes List';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['global_asset_version'] = global_asset_version();
		$data['ci_asset_versn'] = ci_asset_versn();
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		$this->load->view('notes/notes-list', $data);
	}

}

?>
