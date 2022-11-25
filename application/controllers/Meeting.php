<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meeting extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('meeting_model');
		$this->mnu_name = 'meeting-list';
	}

	public function meeting_list()
	{
		$data['title'] = 'Meeting List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'list')) {
			$data['global_asset_version'] = global_asset_version();
			$data['dataTableData'] = $this->meeting_model->meeting_getlist(TABLE_COUNT);
        	$data 								 = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('meeting/meeting-list', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	public function meeting_add()
	{
		$data['title'] = 'Meeting Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('meeting-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		if (checkaccess($this->mnu_name, 'add')) {
			  $data['meetingdata'] = $this->meeting_model->getHostByLoginID();
			  // ***** Breadcrumb Data Ends here *******//
			  $data['global_asset_version'] = global_asset_version();
        $data 								 = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('meeting/meeting-add', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	public function meeting_edit($slug = '')
	{
		$data['title'] = 'Meeting Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('meeting-list'));
		$data['breadcrumb_data'][] = array('Detail',base_url('meeting-details-'.$slug));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'edit')) {
			  $slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
				$data['meetingdata'] = $this->meeting_model->getMeetingById($slug);
				// ***** Breadcrumb Data Ends here *******//
				$data['global_asset_version'] = global_asset_version();
        $data 								 = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('meeting/meeting-edit', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	public function meeting_detail($slug = '')
	{


		$data['title'] = 'Meeting Detail';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('meeting-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail')) {
			  $slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
				$data['meetingdata'] 		= $this->meeting_model->getMeetingById($slug);
				$data['meeting_att_data']	= $this->meeting_model->getMeetingAttById($slug);
				$data['meetingdata']->mtg_id_encrypt 			= $this->nextasy_url_encrypt->encrypt_openssl($data['meetingdata']->mtg_id);
				$data['meetingdata']->next_encrypt 				= $this->nextasy_url_encrypt->encrypt_openssl($data['meetingdata']->next);
				$data['meetingdata']->prev_encrypt 				= $this->nextasy_url_encrypt->encrypt_openssl($data['meetingdata']->prev);
				$data['meetingdata']->mtg_people_encrypt 		= $this->nextasy_url_encrypt->encrypt_openssl($data['meetingdata']->mtg_people);
				$data['meetingdata']->mtg_host_encrypt 		= $this->nextasy_url_encrypt->encrypt_openssl($data['meetingdata']->mtg_host);
				$data['meetingdata']->mtg_led_ppl_id_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['meetingdata']->mtg_led_ppl_id);
				$data['meetingdata']->mtg_task_encrypt 		= $this->nextasy_url_encrypt->encrypt_openssl($data['meetingdata']->mtg_task);
				$data['meetingdata']->mtg_act_encrypt 		= $this->nextasy_url_encrypt->encrypt_openssl($data['meetingdata']->mtg_act);
				$data['meetingdata']->mtg_prod_encrypt 		= $this->nextasy_url_encrypt->encrypt_openssl($data['meetingdata']->mtg_prod);
				$data['meetingdata']->mtg_cmp_encrypt 		= $this->nextasy_url_encrypt->encrypt_openssl($data['meetingdata']->mtg_cmp);
				$data['global_asset_version']  = global_asset_version();
        		$data 								 = array_merge($data, checkaccess($this->mnu_name));
        		$data['title'] 		=	$data['meetingdata']->mtg_title;
        // echo '<pre>';
        // print_r($data);
        // exit;
        $this->load->view('meeting/meeting-detail', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	function meeting_getlist()
	{
	    $dataOptn = $this->input->get();
	    $dataTableData = $this->meeting_model->meeting_getlist(TABLE_RESULT,$dataOptn);
	    // ******** Encrypt Data from multidimensional array ******//
	    $enc_arr['mtg_id']    = 'mtg_id_encrypt';
	    $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
	    $enc_arr['mtg_host']    = 'mtg_host_encrypt';
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

	public

	function meeting_insert()
	{
		$meetingData = $this->input->post();
		$meetingData['mtg_status'] 	= ACTIVE_STATUS;
		$meetingData['mtg_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$meetingData['mtg_crdt_dt'] = date("Y-m-d H:i:s");
		$meetingData['mtg_from_dt_time'] =	mysqldatebymeridian($meetingData['mtg_fr_dt'], $meetingData['mtg_fr_time']);
		$meetingData['mtg_to_dt_time'] 	 =	mysqldatebymeridian($meetingData['mtg_to_dt'], $meetingData['mtg_to_time']);
		unset($meetingData['mtg_fr_dt']);
		unset($meetingData['mtg_to_dt']);
		unset($meetingData['mtg_fr_time']);
		unset($meetingData['mtg_to_time']);
		// echo '<pre>';
		// print_r($meetingData);
		// exit;
		$inserted_id = $this->home_model->insert('meeting', $meetingData);

		if ($inserted_id)
		{
	        if(isset($_FILES['mtg_document']['name'][0]))
	        {
				$meetingAtt = array();

				for($i = 0; $i < count($_FILES['mtg_document']['name']); $i++)
				{
					$meetingAtt[$i]['mta_name']		= upload_multiple_doc(MEETING_DOC,MEETING_DOC,'mtg_document',$i,'attachment');
					$meetingAtt[$i]['mta_mtg_id']	= $inserted_id;
					$meetingAtt[$i]['mta_status'] 	= ACTIVE_STATUS;
					$meetingAtt[$i]['mta_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
					$this->home_model->insert('meeting_att', $meetingAtt[$i]);
				}
	        }

			$response = array(
				'success' 	=> true,
				'message' 	=> 'Meeting Added successfully',
				'linkn' 	=> base_url('meeting-details-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Meeting'
			);
			echo json_encode($response);
		}
	}	

	public function meeting_update()
	{
		$meetingData = $this->input->post();
		$meetingData['mtg_status']      = ACTIVE_STATUS;
		$meetingData['mtg_updt_by']     = $this->session->userdata(PEOPLE_SESSION_ID);
		$meetingData['mtg_from_dt_time'] =	mysqldatebymeridian($meetingData['mtg_fr_dt'] ,$meetingData['mtg_fr_time']);
		$meetingData['mtg_to_dt_time'] 	 =	mysqldatebymeridian($meetingData['mtg_to_dt'] ,$meetingData['mtg_to_time']);
		unset($meetingData['mtg_fr_dt']);
		unset($meetingData['mtg_to_dt']);
		unset($meetingData['mtg_fr_time']);
		unset($meetingData['mtg_to_time']);
		$updated = $this->home_model->update('mtg_id', $meetingData['mtg_id'], $meetingData, 'meeting');
		if ($updated)
		{
	        if(isset($_FILES['mtg_document']['name'][0]))
	        {
				$meetingAtt = array();
				for($i = 0; $i < count($_FILES['mtg_document']['name']); $i++)
				{
			    	$meetingAtt[$i]['mta_name']		= upload_multiple_doc(MEETING_DOC,MEETING_DOC,'mtg_document',$i,'attachment');
					$meetingAtt[$i]['mta_mtg_id']	= $meetingData['mtg_id'];
					$meetingAtt[$i]['mta_status'] 	= ACTIVE_STATUS;
					$meetingAtt[$i]['mta_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
					$this->home_model->insert('meeting_att', $meetingAtt[$i]);
				}
	        }

			$mtg_id = $meetingData['mtg_id'];
			$response = array(
				'success' => true,
				'message' => 'Meeting Updated successfully',
				'linkn' => base_url('meeting-details-' . $this->nextasy_url_encrypt->encrypt_openssl($mtg_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Meeting'
			);
			echo json_encode($response);
		}
	}

	// public

	// function meeting_delete($mtg_id)
	// {
	// 	$mtg_id = $this->nextasy_url_encrypt->decrypt_openssl($mtg_id);
	// 	$check = $this->home_model->delete('met', $mtg_id, 'meeting');
	// 	if ($check)
	// 	{
	// 		$response = array(
	// 			'success' => true,
	// 			'message' => 'Meeting deleted successfully',
	// 			'linkn' => base_url('meeting-list')
	// 		);
	// 		echo json_encode($response);
	// 	}
	// }

	public function meeting_delete($mtg_id)
    {
       	$mtg_id = $this->nextasy_url_encrypt->decrypt_openssl($mtg_id);
        $check     = $this->meeting_model->deleteMeeting($mtg_id);
        if($check)
        {
            $response = array('success' => True, 'message'=>'Meeting removed successfully' ,'linkn' => base_url('meeting-list'));
            echo json_encode($response);
        }
    }

	// ***** People Start Here *******//
	public function getPeopleforDropdown($type = '')
	{
		$search     = $this->input->get('q');
		$peopleData = array('results'=>$this->meeting_model->getPeopleforDropdown($search,$type));
		echo json_encode($peopleData);
	}
    // ***** People End Here ********//

	// ***** Company Start Here *******//
	public function getAccountforDropdown()
	{
		$search      = $this->input->get('q');
		$CompanyData = array('results'=>$this->meeting_model->getAccountforDropdown($search,COMPANY_TYPE_ACCOUNT));
		echo json_encode($CompanyData);
	}
	// ***** Company End Here *******//

  // ***** Product Start Here *******//
	public function getProductforDropdown()
	{
		$search      = $this->input->get('q');
		$ProductData = array('results'=>$this->meeting_model->getProductforDropdown($search));
		echo json_encode($ProductData);
	}
	// ***** Product End Here *******//

  // ***** Task Start Here *******//
	public function getTaskForDropdown()
	{
		$search      = $this->input->get('q');
		$TaskData = array('results'=>$this->meeting_model->getTaskforDropdown($search));
		echo json_encode($TaskData);
	}
	// ***** GenPrm End Here *******//
	public function getGenPrmforDropdown($genPrmGroup)
	{
		$search   = $this->input->get('q');
		$GenPrmData = array('results'=>$this->meeting_model->getGenPrmforDropdown($genPrmGroup,$search));
		echo json_encode($GenPrmData);
	}
	// ***** Lead End Here *******//
	public function getLeadforDropdown()
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->meeting_model->getLeadforDropdown($search));
		echo json_encode($LeadData);
	}

	function meeting_att_upload()
	{
		$taskAtt = array();

		$mtg_id = $this->input->post('mtg_id');

		for($i = 0; $i < count($_FILES['mtg_document']['name']); $i++)
		{
	    	$taskAtt[$i]['mta_name']	= upload_multiple_doc(MEETING_DOC,MEETING_DOC,'mtg_document',$i,'attachment');
			$taskAtt[$i]['mta_mtg_id']	= $mtg_id;
			$taskAtt[$i]['mta_status'] 	= '1';
			$taskAtt[$i]['mta_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
			$this->home_model->insert('meeting_att', $taskAtt[$i]);
		}

		$response = array(
			'success' => true,
			'message' => 'Attachment Uploaded Successfully',
			'linkn' => base_url('meeting-details-' . $this->nextasy_url_encrypt->encrypt_openssl($mtg_id))
		);
		echo json_encode($response);
	}

	public function updateMeetingCustomData()
    {
        $companyData = $this->meeting_model->updateMeetingCustomData();
        if($companyData)
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
	
}

?>
