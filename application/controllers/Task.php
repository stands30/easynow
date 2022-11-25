<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		    check_logged();
        $this->load->model('task_model');
        $this->mnu_name = 'task-dashboard';
    }
    public function task_dashboard()
  	{
  		$data['breadcrumb_data'][] = array('Home');
  		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
  		$data['dashboardData'] = $this->task_model->getDashboardData();
  		$data['global_asset_version']      	  = global_asset_version();
  		$this->load->view('task/task-dashboard', $data);
  	}
	// ***** Task Client Starts here *******//
	public function task_list()
	{
		$data['title'] 		         =	'Task List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//


    if (checkaccess($this->mnu_name, 'list'))
    {
        $data['ci_asset_version']          	  = ci_asset_versn();
        $data['global_asset_version']      	  = global_asset_version();
        $data['dataTableData']['today']			  = $this->task_model->task_getlist(TABLE_COUNT, array('status'=>'today'));
    		$data['dataTableData']['mytask']		  = $this->task_model->task_getlist(TABLE_COUNT, array('status'=>'mytask'));
    		$data['dataTableData']['mysupport']		= $this->task_model->task_getlist(TABLE_COUNT, array('status'=>'mysupport'));
    		$data['dataTableData']['myreview']		= $this->task_model->task_getlist(TABLE_COUNT, array('status'=>'myreview'));
    		$data['dataTableData']['all']			    = $this->task_model->task_getlist(TABLE_COUNT, array('status'=>'all'));
        $data = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('task/task-list', $data);
    }
    else $this->load->view('errors/easynow_404', $data);

//		$data['dataTableDataAssignMe']     	= $this->task_model->task_getlist_byme(TABLE_COUNT);

	}
	public function task_add()
	{
		$data['title'] 		=	'Task Add';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('task-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//

    if (checkaccess($this->mnu_name, 'add')) {
      $data['ci_asset_version']          = ci_asset_versn();
      $data['global_asset_version']    = global_asset_version();
      $data = array_merge($data, checkaccess($this->mnu_name));
      $this->load->view('task/task-add', $data);
    }
    else
        $this->load->view('errors/easynow_404', $data);


	}

	public function task_edit($tsk_id)
	{

		$data['title'] 		=	'Task Edit';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('task-list'));
		$data['breadcrumb_data'][] = array('Detail',base_url('task-detail-'.$tsk_id));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
      if (checkaccess($this->mnu_name, 'edit')) {
          $tsk_id = $this->nextasy_url_encrypt->decrypt_openssl($tsk_id);
          $data['task_data']	     = $this->task_model->getTaskById($tsk_id);
          $data['ci_asset_version']        = ci_asset_versn();
    	    $data['global_asset_version']    = global_asset_version();
          $data = array_merge($data, checkaccess($this->mnu_name));
          $this->load->view('task/task-edit', $data);
      }
      else $this->load->view('errors/easynow_404', $data);


	}

	public function task_detail($tsk_id)
	{

		$data['title'] 		=	'Task Detail';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('task-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);



    if (checkaccess($this->mnu_name, 'detail'))
    {
        $tsk_id = $this->nextasy_url_encrypt->decrypt_openssl($tsk_id);
        $data['task_data']	       = $this->task_model->getTaskById($tsk_id);
    		$data['task_att_data']	   = $this->task_model->getTaskAttById($tsk_id);
    		$data['task_data']->tsk_id_encrypt 	        = $this->nextasy_url_encrypt->encrypt_openssl($data['task_data']->tsk_id);
    		$data['task_data']->tsk_client_id_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['task_data']->tsk_client_id);
    		$data['task_data']->next_task_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['task_data']->next_task);
    		$data['task_data']->prev_task_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['task_data']->prev_task);
    		// ***** Breadcrum Data Ends here *******//
    		$data['ci_asset_version']        = ci_asset_versn();
    		$data['global_asset_version']    = global_asset_version();
        	$data = array_merge($data, checkaccess($this->mnu_name));
        	$data['title'] 		=	$data['task_data']->tsk_title;
    		$this->load->view('task/task-detail', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	public function task_insert()
	{
		$taskData = $this->input->post();

		$taskData['tsk_status'] 	    = ACTIVE_STATUS;
		$taskData['tsk_due_dt'] 	    = date("Y-m-d H:i:s", strtotime($taskData['tsk_due_dt']));
		$taskData['tsk_crdt_by'] 	    = $this->session->userdata(PEOPLE_SESSION_ID);
		$taskData['tsk_user_ass_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);

		$inserted_id = $this->home_model->insert('task', $taskData);

		if ($inserted_id)
		{
	        if(isset($_FILES['tsk_document']['name'][0]))
	        {
				$taskAtt = array();

				for($i = 0; $i < count($_FILES['tsk_document']['name']); $i++)
				{
					$taskAtt[$i]['tka_name']		= upload_multiple_doc(TASK_DOC,TASK_DOC,'tsk_document',$i,'attachment');
					$taskAtt[$i]['tka_tsk_id']	= $inserted_id;
					$taskAtt[$i]['tka_status'] 	= ACTIVE_STATUS;
					$taskAtt[$i]['tka_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
					$this->home_model->insert('task_att', $taskAtt[$i]);
				}
	        }

			$response = array(
				'success' => true,
				'message' => 'Task added successfully',
				'linkn' => base_url('task-detail-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Task'
			);
			echo json_encode($response);
		}
	}

	public function task_update()
	{
		$taskData = $this->input->post();

		$taskData['tsk_status']       = ACTIVE_STATUS;
		$taskData['tsk_due_dt'] 	    = date("Y-m-d H:i:s", strtotime($taskData['tsk_due_dt']));
		$taskData['tsk_updt_by']      = $this->session->userdata(PEOPLE_SESSION_ID);
		$taskData['tsk_user_ass_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$updated = $this->home_model->update('tsk_id', $taskData['tsk_id'], $taskData, 'task');

		if ($updated)
		{
	        if(isset($_FILES['tsk_document']['name'][0]))
	        {
				$taskAtt = array();
    				for($i = 0; $i < count($_FILES['tsk_document']['name']); $i++)
    				{
    			    $taskAtt[$i]['tka_name']		  = upload_multiple_doc(TASK_DOC,TASK_DOC,'tsk_document',$i,'attachment');
    					$taskAtt[$i]['tka_tsk_id']	  = $taskData['tsk_id'];
    					$taskAtt[$i]['tka_status'] 	  = ACTIVE_STATUS;
    					$taskAtt[$i]['tka_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
    					$this->home_model->insert('task_att', $taskAtt[$i]);
    				}
	        }

			$tsk_id = $taskData['tsk_id'];
			$response = array(
				'success' => true,
				'message' => 'Task Updated successfully',
				'linkn' => base_url('task-detail-' . $this->nextasy_url_encrypt->encrypt_openssl($tsk_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Task'
			);
			echo json_encode($response);
		}
	}

	function task_att_upload()
	{
		$taskAtt = array();

		$tsk_id = $this->nextasy_url_encrypt->decrypt_openssl($this->input->post('tsk_id'));

		for($i = 0; $i < count($_FILES['tsk_document']['name']); $i++)
		{
	    $taskAtt[$i]['tka_name']		= upload_multiple_doc(TASK_DOC,TASK_DOC,'tsk_document',$i,'attachment');
			$taskAtt[$i]['tka_tsk_id']	= $tsk_id;
			$taskAtt[$i]['tka_status'] 	= '1';
			$taskAtt[$i]['tka_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
			$this->home_model->insert('task_att', $taskAtt[$i]);
		}

		$response = array(
			'success' => true,
			'message' => 'Attachment Uploaded Successfully',
			'linkn' => base_url('task-detail-' . $this->nextasy_url_encrypt->encrypt_openssl($tsk_id))
		);
		echo json_encode($response);
	}

	public function task_delete($tsk_id)
	{
		$tsk_id = $this->nextasy_url_encrypt->decrypt_openssl($tsk_id);
		$check = $this->home_model->delete_data('task', $tsk_id, 'tsk_id');
		if ($check)
		{
			$response = array(
				'success' => true,
				'message' => 'Task deleted successfully',
				'linkn' => base_url('task-list')
			);
			echo json_encode($response);
		}
	}

	function task_getlist()
	{
	    $dataOptn = $this->input->get();
	    $dataTableData = $this->task_model->task_getlist(TABLE_RESULT,$dataOptn);
	    // ******** Encrypt Data from multidimensional array ******//
	    $enc_arr['tsk_id']    = 'tsk_id_encrypt';
	    $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
	    // ******** Encrypt Data from multidimensional array ******//
	    if(isset($dataOptn['columns']))
		{
		 // *********** Get Data Count **********//
		    $dataTableArray['draw']             = $dataOptn['draw'];
		    $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
		    $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
		// *********** Get Data Count **********//
	    }
	    echo json_encode($dataTableArray);
	}

	function task_getlist_byme()
	{
	    $dataOptn = $this->input->get();
	    $dataTableData = $this->task_model->task_getlist_byme(TABLE_RESULT,$dataOptn);
	    // ******** Encrypt Data from multidimensional array ******//
	    $enc_arr['tsk_id']    = 'tsk_id_encrypt';
	    $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
	    // ******** Encrypt Data from multidimensional array ******//
	    if(isset($dataOptn['columns']))
		{
		 // *********** Get Data Count **********//
		    $dataTableArray['draw']             = $dataOptn['draw'];
		    $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
		    $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
		// *********** Get Data Count **********//
	    }
	    echo json_encode($dataTableArray);
	}

	// ***** Task Client Ends here *******//

   // ***** People Start Here *******//
	public function getPeopleforDropdown($type = '')
	{
		$search     = $this->input->get('q');
		$peopleData = array('results'=>$this->task_model->getPeopleforDropdown($search,$type));
		echo json_encode($peopleData);
	}
    // ***** People End Here ********//

	// ***** Company Start Here *******//
	public function getCompanyforDropdown($type = '')
	{
		$search      = $this->input->get('q');
		$CompanyData = array('results'=>$this->task_model->getCompanyforDropdown($search,$type));
		echo json_encode($CompanyData);
	}
	// ***** Company End Here *******//

  // ***** Product Start Here *******//
	public function getProductforDropdown()
	{
		$search      = $this->input->get('q');
		$ProductData = array('results'=>$this->task_model->getProductforDropdown($search));
		echo json_encode($ProductData);
	}
	// ***** Product End Here *******//

	// ***** Lead Start Here *******//
	public function getLeadforDropdown($type = '')
	{
		$search     = $this->input->get('q');
		$peopleData = array('results'=>$this->task_model->getLeadforDropdown($search,$type));
		echo json_encode($peopleData);
	}

	function getEmployeeforDropdown()
	{
		$search   = $this->input->get('q');
		$teamData = array('results'=>$this->task_model->getEmployeeforDropdown($search));
		echo json_encode($teamData);
	}

	function getAccountforDropdown()
	{
		$search   = $this->input->get('q');
		$teamData = array('results'=>$this->task_model->getAccountforDropdown($search));
		echo json_encode($teamData);
	}
   // ***** Lead End Here ********//

	function getNewCode()
	{
		echo '<br />'.$this->home_model->getNewCode(
			array(
		 		'column'	=> 'prd_code',
		 		'table'		=> 'product',
		 		'type'		=> CODE_TYPE_PRODUCT,
		 		'where'		=> ''
			)
		);
		echo '<br />'.$this->home_model->getNewCode(
			array(
		 		'column'	=>'tsk_no',
		 		'table'		=>'task',
		 		'type'		=> CODE_TYPE_TASK,
		 		'where'		=>''
			)
		);
		echo '<br />'.$this->home_model->getNewCode(
			array(
		 		'column'	=>'ppl_id',
		 		'table'		=>'people',
		 		'type'		=> CODE_TYPE_PEOPLE,
		 		'where'		=>''
			)
		);
	}
    
    public function updateTaskCustomData()
    {
        $taskData = $this->task_model->updateTaskCustomData();
        if($taskData)
        {
            $success = true;
            $message = 'Details saved successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message));
    }
    public function getGenPrmforDropdown($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $LeadData = array('results'=>$this->task_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($LeadData);
    }
}
