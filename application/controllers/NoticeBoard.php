<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NoticeBoard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->mnu_name = 'notice-board-list';
	}


	public function notice_board_list()
	{
		$data['title'] 		=	'Notice Board List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'list')){	
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('notice-board/notice-board-list', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

	public function notice_board_add()
	{
		$data['title'] 		=	'Notice Board Add';		
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('notice-board-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add')) {
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('notice-board/notice-board-add', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

}

?>
