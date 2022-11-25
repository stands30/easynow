<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller 
{

	public function master_process_list()
	{
		$data['title'] 		=	'Master Process List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('process/master-process-list', $data);
	}

	public function master_process_add()
	{
		$data['title'] 		=	'Master Process Add';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('master-process-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('process/master-process-add', $data);
	}

	public function master_process_detail()
	{
		$data['title'] 		=	'Master Process Details';
	   	// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('master-process-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('process/master-process-detail', $data);
	}

	public function master_task_list()
	{
		$data['title'] 		=	'Master Task List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('process/master-task-list', $data);
	}

	public function master_task_add()
	{
		$data['title'] 		=	'Master Task Add';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('master-task-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('process/master-task-add', $data);
	}

	public function master_task_detail()
	{
		$data['title'] 		=	'Master Task Details';
	   	// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('master-task-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('process/master-task-detail', $data);
	}

	public function process_initiate_list()
	{
		$data['title'] 		=	'Process Initiate List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		
		$this->load->view('process/process-initiate-list', $data);
	}

	public function process_initiate_detail()
	{
		$data['title'] 		=	'Process Initiate Details';
	   	// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('process-initiate-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('process/process-initiate-detail', $data);
	}

	public function assign_task_list()
	{
		$data['title'] 		=	'Assign Task List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('process/assign-task-list', $data);
	}

	public function my_task_list()
	{
		$data['title'] 		=	'My Task List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
	
		$this->load->view('process/my-task-list', $data);
	}

	public function my_task_edit()
	{
		$data['title'] 		=	'Master Task Add';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('my-task-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		/*$data['cache_version'] = cache_version();*/
		$this->load->view('process/my-task-edit', $data);
	}

	public function my_task_detail()
	{
		$data['title'] 		=	'My Task Details';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('my-task-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
	
		$this->load->view('process/my-task-detail', $data);
	}
	
	public function process_assign_task_list()
	{
		$data['title'] 		=	'Assign Task List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Settings', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		/*$data['cache_version'] = cache_version();*/
		$this->load->view('process/process-assign-task-list', $data);
	}

}

?>