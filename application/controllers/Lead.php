<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('lead_model');
		//$this->mnu_name = 'lead-list';
	}

    public function lead_dashboard()
	{
		$data['title'] 		=	'Lead Dashboard';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Lead');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['lead_status'] 	 = $this->lead_model->getLeadStatus();
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('lead/lead-dashboard', $data);
	}

	public function lead_list($type = '', $value = '')
	{
		$data['title'] 		=	'Lead List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Lead', base_url('lead-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$filter['filter_type'] 	=	$data['filter_type'] 	= $type;
		$filter['filter_value'] =	$data['filter_value'] 	= $value;
        $data['dataTableData'] = $this->lead_model->lead_getlist(TABLE_COUNT,$filter) ;
		$this->load->view('lead/lead-list', $data);
	}

	public function active_lead_list()
	{
		$data['title'] 		=	'Active Lead List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Lead', base_url('lead-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$lead_stage_array  = $this->lead_model->getAllLeadStageDropdown();
        $lead_stage_array[] = (object) array('f1'=>'all','f2'=>'All');
        $data['lead_stage_array'] =$lead_stage_array;
		$this->load->view('lead/active-lead-list', $data);
	}

	

	public function lead_add($ppl_encrypted_id = '',$ppl_encrypted_name = '')
	{

		$data['title'] 		=	'Lead Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('lead-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$data['ppl_id']        = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
		$data['ppl_name']      = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_name);
	
		$this->load->view('lead/lead-add', $data);
	}

	public function lead_edit($slug = '')
	{

		$data['title'] 		=	'Lead Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Lead', base_url('lead-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('lead-list'));
		$data['breadcrumb_data'][] = array('Detail',base_url('lead-details-'.$slug));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
		$data['leaddata'] = $this->lead_model->getLeadById($slug);
		$data['leaddata']->led_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['leaddata']->led_id);
		$data['leaddata']->led_ppl_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['leaddata']->led_ppl_id);
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('lead/lead-edit', $data);
	}

	public function lead_details($slug = '')
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);

		$data['title'] 		=	'Lead Details';
	   	// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Lead', base_url('lead-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('lead-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//

		/*if (checkaccess($this->mnu_name, 'list'))
		{*/
			$data['leaddata'] = $this->lead_model->getLeadById($slug);

			$data['leaddata']->led_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['leaddata']->led_id);
			$data['leaddata']->led_ppl_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['leaddata']->led_ppl_id);
			$data['leaddata']->next_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['leaddata']->next);
			$data['leaddata']->prev_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['leaddata']->prev);
			$data['global_asset_version'] = global_asset_version();
			// print_r($data);
			// exit;
			$data['leadfollowUpTypeToday'] = $this->lead_model->lead_follow_getlist('today',$data['leaddata']->led_id,TABLE_COUNT);
			$data['leadfollowUpTypePending'] = $this->lead_model->lead_follow_getlist('pending',$data['leaddata']->led_id,TABLE_COUNT);
			$data['leadfollowUpTypeCompleted'] = $this->lead_model->lead_follow_getlist('completed',$data['leaddata']->led_id,TABLE_COUNT);
			$data['leadfollowUpTypeUpcoming'] = $this->lead_model->lead_follow_getlist('upcoming',$data['leaddata']->led_id,TABLE_COUNT);
			$data['leadfollowUpTypeAll'] = $this->lead_model->lead_follow_getlist('all',$data['leaddata']->led_id,TABLE_COUNT);
			$data['pending_task'] = $this->lead_model->getPendingTaskByID($data['leaddata']->led_id);
			$data['company_details'] = $this->lead_model->getCompanyDetails($data['leaddata']->led_id);

	    	$data['dataTableData']             = $this->lead_model->lead_task_getlist(TABLE_COUNT,'',$data['leaddata']->led_id);
	    	$data['title'] 		=	$data['leaddata']->led_title." for ".$data['leaddata']->led_ppl_name;
			// print_r($data);
			$this->load->view('lead/lead-details', $data);
	    /*}
	    else $this->load->view('errors/easynow_404', $data);*/
	}

	public

	function lead_followup_insert()
	{
		$leadData = $this->input->post();

		$updateid = $leadData['old_lfp_id'];
		$sendmail = $leadData['lfp_sendmail'];

		$lfp_instruction 	= $leadData['lfp_instruction'];
		$lfp_remark 		= $leadData['lfp_remark'];

		unset($leadData['lfp_sendmail']);

		if($leadData['old_lfp_id'] != '')
		{
			$updateData = array();

			$updateData['lfp_id'] 				= $leadData['old_lfp_id'];
			$updateData['lfp_type'] 			= $leadData['old_lfp_type'];
			//$updateData['lfp_follow_by'] 		= $leadData['old_lfp_follow_by'];
			$updateData['lfp_status'] 			= '1';
			$updateData['lfp_followup_status'] 	= LEAD_FOLLOWUP_STATUS_DONE;
			$updateData['lfp_updt_by'] 			= $this->session->userdata(PEOPLE_SESSION_ID);
			$updateData['lfp_updt_dt'] 			= date("Y-m-d H:i:s");

			$updated = $this->home_model->update('lfp_id', $updateData['lfp_id'], $updateData, 'lead_follow_up');
		}

		unset($leadData['lfp_id']);
		unset($leadData['old_lfp_id']);
		unset($leadData['old_lfp_type']);

		$leadData['lfp_instruction'] 	= $this->input->post('lfp_instruction');
		$leadData['lfp_remark'] 		= $this->input->post('lfp_remark');
		//$leadData['lfp_follow_by'] 		= $this->input->post('lfp_follow_by');
		$leadData['lfp_status'] 		= '1';
		$leadData['lfp_type'] 			= $leadData['lfp_type'];
		$leadData['lfp_crdt_by'] 		= $this->session->userdata(PEOPLE_SESSION_ID);
		$leadData['lfp_crdt_dt'] 		= date("Y-m-d H:i:s");

		$date_time = $this->input->post('lfp_next_date');
		$date = explode(' ', $date_time)[0];
		$time = explode(' ', $date_time)[1].':00';

		$leadData['lfp_next_date'] = mysqlDateFormat($date).' '.$time;

		$inserted_id = $this->home_model->insert('lead_follow_up', $leadData);

		if ($inserted_id)
		{
			if($updateid != '')
				$success_msg = 'Follow up Renewed successfully';
			else
				$success_msg = 'Follow Up Added successfully';

			if($sendmail == 'true')
				$this->sendFollowupMail($leadData['lfp_module_type_id'], $lfp_instruction, $lfp_remark);

			$response = array(
				'success' => true,
				'message' => $success_msg,
				'linkn' => base_url('lead-details-' . $this->nextasy_url_encrypt->encrypt_openssl($leadData['lfp_module_type_id']))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Follow Up'
			);
			echo json_encode($response);
		}
	}

	public

	function lead_followup_update()
	{
		$leadFlpData = $this->input->post();

		$leadFlpData['lfp_status'] 	= '1';
		$leadFlpData['lfp_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$leadFlpData['lfp_updt_dt'] = date("Y-m-d H:i:s");

		$sendmail = $leadFlpData['lfp_sendmail'];

		$lfp_instruction 	= $leadFlpData['lfp_instruction'];
		$lfp_remark 		= $leadFlpData['lfp_remark'];

		unset($leadFlpData['lfp_sendmail']);
		unset($leadFlpData['old_lfp_id']);
		unset($leadFlpData['old_lfp_type']);

		$date_time = $this->input->post('lfp_next_date');
		$date = explode(' ', $date_time)[0];	
		$time = explode(' ', $date_time)[1].':00';
		$leadFlpData['lfp_next_date'] = mysqlDateFormat($date).' '.$time;

		$updated = $this->home_model->update('lfp_id', $leadFlpData['lfp_id'], $leadFlpData, 'lead_follow_up');

		if ($updated)
		{
			$lfp_id = $leadFlpData['lfp_id'];

			if($sendmail == 'true')
				$this->sendFollowupMail($leadFlpData['lfp_module_type_id'], $lfp_instruction, $lfp_remark);

			$response = array(
				'success' => true,
				'message' => 'Follow up Updated successfully',
				'linkn' => base_url('lead-details-' . $this->nextasy_url_encrypt->encrypt_openssl($lfp_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Follow up'
			);
			echo json_encode($response);
		}
	}

	function sendFollowupMail($lead_id, $lfp_instruction, $lfp_remark)
	{
		$lead_data = $this->lead_model->getLeadById($lead_id);

		$lead_data->lfp_instruction 	= $lfp_instruction;
		$lead_data->lfp_remark 			= $lfp_remark;
		$lead_data->company_name 		= $this->home_model->getBusinessParamData('company_name')->bpm_value;

		$email_data = (object)array(
			'email' => $lead_data->lead_email,
			'subject' => FOLLOWUP_MAIL_SUBJECT,
			'message' => '',
			'template' => FOLLOWUP_MAIL_HTMP_PATH,
			'email_cc' => $this->home_model->getBusinessParamData('email_cc')->bpm_value,
			'reply_to' => $this->home_model->getBusinessParamData('email_reply_to')->bpm_value,
		);

		$email_data = array_merge((array)$email_data, (array)$lead_data);

		$this->home_model->sendMail($email_data);
	}

	public

	function lead_insert()
	{
		$leadData = $this->input->post();

		$leadData['led_status'] = '1';
		$leadData['led_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$leadData['led_crdt_dt'] = date("Y-m-d H:i:s");

		$inserted_id = $this->home_model->insert('lead', $leadData);

		if ($inserted_id)
		{
			$response = array(
				'success' => true,
				'message' => 'Lead Added successfully',
				'linkn' => base_url('lead-details-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Lead'
			);
			echo json_encode($response);
		}
	}

	public

	function lead_update()
	{
		$leadData = $this->input->post();

		$leadData['led_status'] = '1';
		$leadData['led_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$leadData['led_updt_dt'] = date("Y-m-d H:i:s");

		$updated = $this->home_model->update('led_id', $leadData['led_id'], $leadData, 'lead');

		if ($updated)
		{
			$led_id = $leadData['led_id'];
			$response = array(
				'success' => true,
				'message' => 'Lead Updated successfully',
				'linkn' => base_url('lead-details-' . $this->nextasy_url_encrypt->encrypt_openssl($led_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Lead'
			);
			echo json_encode($response);
		}
	}

	public

	function lead_delete($led_id)
	{
		$led_id = $this->nextasy_url_encrypt->decrypt_openssl($led_id);
		$check = $this->home_model->delete_data('lead', $led_id,'led_id');
		if ($check)
		{
			$response = array(
				'success' => true,
				'message' => 'Lead deleted successfully',
				'linkn' => base_url('lead-list')
			);
			echo json_encode($response);
		}
	}

	function getCode($string)
	{
		return str_replace(' ', '-',$string);
	}

	function lead_getlist($type = '',$value = '')
	{
		$dataOptn = $this->input->get();
		
		$dataOptn['filter_type'] = $type;
		$dataOptn['filter_value'] = $value;

		$dataTableData = $this->lead_model->lead_getlist(TABLE_RESULT,$dataOptn);
		// ******** Encrypt Data from multidimensional array ******//
		$enc_arr['led_id']          = 'led_id_encrypt';
		$enc_arr['led_ppl_id']      = 'led_ppl_id_encrypt';
		$enc_arr['led_cmp_id']      = 'led_cmp_id_encrypt';
		$enc_arr['led_managed_by']  = 'led_ppl_mng_id_encrypt';
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

	function lead_active_getlist()
	{
    	  $dataOptn = $this->input->get();
	      $dataTableData = $this->lead_model->lead_active_getlist(TABLE_RESULT,$dataOptn);
	      // ******** Encrypt Data from multidimensional array ******//
	      $enc_arr['led_id']          = 'led_id_encrypt';
	      $enc_arr['led_ppl_id']      = 'led_ppl_id_encrypt';
	      $enc_arr['led_cmp_id']      = 'led_cmp_id_encrypt';
	      $enc_arr['led_managed_by']  = 'led_ppl_mng_id_encrypt';
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

	function lead_follow_getlist($led_list_by,$led_id)
	{
		  $dataOptn = $this->input->get();
	      $dataTableArray['data'] = $this->lead_model->lead_follow_getlist($led_list_by, $led_id,TABLE_RESULT,$dataOptn);

	      log_message('nexlog','lead::lead_follow_getlist >>');
	      log_message('nexlog',' dataTableData : '.json_encode($dataTableArray));
	      log_message('nexlog','lead::lead_follow_getlist <<');
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

	function lfp_optn_inst($lfp_type)
	{
		echo json_encode($this->lead_model->lfp_optn_inst($lfp_type));
	}

	function get_lead_overview($led_id)
	{
		echo json_encode($this->lead_model->getfollowUpOverview($led_id));
	}

	function getFollowUpdetailById($lfp_id)
	{
		echo json_encode($this->lead_model->getFollowUpdetailById($lfp_id));
	}
	public function getProductForDropdown()
	{
		$search   = $this->input->get('q');
		$productData = array('results'=>$this->lead_model->getProductForDropdown($search));
		echo json_encode($productData);
	}
	public function getCompanyForDropdown()
	{
		$search   = $this->input->get('q');
		$productData = array('results'=>$this->lead_model->getCompanyForDropdown($search));
		echo json_encode($productData);
	}
	public function getLeadCompanyForDropdown($led_id)
	{
		$search   = $this->input->get('q');
		$productData = array('results'=>$this->lead_model->getLeadCompanyForDropdown($search, $led_id));
		echo json_encode($productData);
	}

	function updateFollowupStatus($lfp_id, $status)
	{
		echo json_encode($this->lead_model->updateFollowupStatus($lfp_id, $status));
	}


	function lead_task_getlist()
	{
	    $dataOptn = $this->input->get();

	    $dataTableData = $this->lead_model->lead_task_getlist(TABLE_RESULT,$dataOptn,$dataOptn['lead_id']);

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

	function getEmployeeforDropdown()
	{
		$search   = $this->input->get('q');
		$teamData = array('results'=>$this->lead_model->getEmployeeforDropdown($search));
		echo json_encode($teamData);
	}

	function getProductTotalAmt()
	{
		$productlist = implode(", ", $this->input->post('data'));
		echo $this->lead_model->getProductTotalAmt($productlist);
	}

	function updateLeadData()
	{
		$data = $this->input->post();
		echo $this->lead_model->updateLeadData($data);
	}

	function getDefaultvalue()
	{
		$gnp_group = $this->input->post('data');
		echo json_encode($this->home_model->getDefaultvalue($gnp_group));
	}
	public function getCampaignDropdown()
    {
        $search             = $this->input->get('q');
        $stateData = array('results'=>$this->lead_model->getCampaignDropdown($search));
        echo json_encode($stateData);
    }
     public function updateLeadCustomData()
    {
        $pplData = $this->lead_model->updateLeadCustomData();
        if($pplData)
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
    public function getLeadStageDropdown($led_pipeline_id)
	{
		$search   = $this->input->get('q');
		$leadData = array('results'=>$this->lead_model->getLeadStageDropdown($search, $led_pipeline_id));
		echo json_encode($leadData);
	}

	function setLeadCompany($ppl_id)
	{
		echo json_encode($this->lead_model->getLeadCompanyForDropdown('',$ppl_id));
	}
}

?>
