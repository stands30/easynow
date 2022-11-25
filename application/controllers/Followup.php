<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Followup extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('followup_model');
		$this->mnu_name = 'sales-followup-list';
	}

	function index()
	{
		$this->followup_list();
	}

	public function followup_list()
	{
		$data['title'] 		=	'Follow Up List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Followup', base_url('followup-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$data['leadfollowUpTypeToday'] = $this->followup_model->followup_getlist('today',TABLE_COUNT);
		$data['leadfollowUpTypePending'] = $this->followup_model->followup_getlist('pending',TABLE_COUNT);
		$data['leadfollowUpTypeCompleted'] = $this->followup_model->followup_getlist('completed',TABLE_COUNT);
		$data['leadfollowUpTypeUpcoming'] = $this->followup_model->followup_getlist('upcoming',TABLE_COUNT);
		$data['leadfollowUpTypeAll'] = $this->followup_model->followup_getlist('all',TABLE_COUNT);
		$this->load->view('followup/followup-list', $data);
	}


	public function sales_followup_list()
	{
		$data['title'] 		=	'Sales Followup List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Followup', base_url('followup-dashboard'));
		$data['breadcrumb_data'][] = array('List');

		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

        if (checkaccess($this->mnu_name, 'list'))
        {
        	$data['global_asset_version'] = global_asset_version();
			// ***** Breadcrum Data Ends here *******//
			$data['leadfollowUpTypeToday'] = $this->followup_model->followup_getlist('today',TABLE_COUNT);
			$data['leadfollowUpTypePending'] = $this->followup_model->followup_getlist('pending',TABLE_COUNT);
			$data['leadfollowUpTypeCompleted'] = $this->followup_model->followup_getlist('completed',TABLE_COUNT);
			$data['leadfollowUpTypeUpcoming'] = $this->followup_model->followup_getlist('upcoming',TABLE_COUNT);
			$data['leadfollowUpTypeAll'] = $this->followup_model->followup_getlist('all',TABLE_COUNT);
            $data = array_merge($data, checkaccess($this->mnu_name));  
			$this->load->view('followup/sales-followup-list', $data);
        }
        else $this->load->view('errors/easynow_404', $data);
	}

	

	function followup_getlist($led_list_by)
	{
		  $dataOptn = $this->input->get();
	      $dataTableArray['data'] = $this->followup_model->followup_getlist($led_list_by,TABLE_RESULT,$dataOptn);

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

	public

	function followup_insert()
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
			$updateData['lfp_managed_by'] 		= $leadData['old_lfp_managed_by'];
			$updateData['lfp_module_type_id'] 		= $leadData['old_lfp_module_type_id'];
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
		$leadData['lfp_status'] 		= '1';
		$leadData['lfp_type'] 			= $leadData['lfp_type'];
		//$leadData['lfp_follow_by'] 		= $leadData['lfp_follow_by'];
		$leadData['lfp_managed_by'] 	= $leadData['lfp_managed_by'];
		$leadData['lfp_module_type_id'] = $leadData['lfp_module_type_id'];
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
				$success_msg = 'Follow up renewed successfully';
			else
				$success_msg = 'Follow Up added successfully';

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

	function followup_update()
	{
		$followup_data = $this->input->post();

		$sendmail = $followup_data['lfp_sendmail'];

		$lfp_instruction 	= $followup_data['lfp_instruction'];
		$lfp_remark 		= $followup_data['lfp_remark'];

		unset($followup_data['lfp_sendmail']);

		$followup_data['lfp_id'] 		=  $this->input->post('lfp_id');
		//$followup_data['lfp_follow_by'] =  $this->input->post('lfp_follow_by');
		$followup_data['lfp_managed_by'] =  $this->input->post('lfp_managed_by');
		$followup_data['lfp_module_type_id'] =  $this->input->post('lfp_module_type_id');
		$followup_data['lfp_status'] 	= '1';
		$followup_data['lfp_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$followup_data['lfp_updt_dt'] = date("Y-m-d H:i:s");

		unset($followup_data['old_lfp_id']);
		unset($followup_data['old_lfp_type']);

		$date_time = $this->input->post('lfp_next_date');
		$date = explode(' ', $date_time)[0];
		$time = explode(' ', $date_time)[1].':00';
		$followup_data['lfp_next_date'] = mysqlDateFormat($date).' '.$time;

		$updated = $this->home_model->update('lfp_id', $followup_data['lfp_id'], $followup_data, 'lead_follow_up');

		if ($updated)
		{
			$lfp_id = $followup_data['lfp_id'];
			$response = array(
				'success' => true,
				'message' => 'Follow Up Updated successfully',
				'linkn' => base_url('lead-details-' . $this->nextasy_url_encrypt->encrypt_openssl($followup_data['lfp_module_type_id']))
			);

			if($sendmail == 'true')
				$this->sendFollowupMail($followup_data['lfp_module_type_id'], $lfp_instruction, $lfp_remark);

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
		$lead_data = $this->followup_model->getLeadById($lead_id);

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

	function followup_delete($lfp_id)
	{
		$check = $this->home_model->delete_data('lead_follow_up', $lfp_id, 'lfp_id');
		if ($check)
		{
			$response = array(
				'success' => true,
				'message' => 'Follow Up Deleted successfully',
				'linkn' => base_url('followup-list')
			);
			echo json_encode($response);
		}
	}

	function lfp_optn_inst($lfp_type)
	{
		echo json_encode($this->followup_model->lfp_optn_inst($lfp_type));
	}

	function getFollowUpdetailById($lfp_id)
	{
		echo json_encode($this->followup_model->getFollowUpdetailById($lfp_id));
	}

	function getPeopleDropdown()
    {
        $search             = $this->input->get('q');
        $peopleData = array('results'=>$this->followup_model->getPeopleDropdown($search));
        echo json_encode($peopleData);
    }

	function getFollowUpTypeDropdown()
    {
        $search             = $this->input->get('q');
        $followUpData = array('results'=>$this->followup_model->getGenPrmDropdown($search, 'follow_up_module_type'));
        echo json_encode($followUpData);
    }

	function getFollowUpTypeIDDropdown($followuptype)
    {
    	$followUpTypeIDData = array();
        $search             = $this->input->get('q');

		switch ($followuptype) {
			case FOLLOWUP_MODULE_TYPE_LEAD:
        		$followUpTypeIDData = array('results'=>$this->followup_model->getLeadListByType($search, ''));			
			break;
			case FOLLOWUP_MODULE_TYPE_ACCOUNT:
        		$followUpTypeIDData = array('results'=>$this->followup_model->getAccountListByType($search, ''));			
			break;
		}

        echo json_encode($followUpTypeIDData);
    }

	function updateFollowupStatus($lfp_id, $status)
	{
		echo json_encode($this->followup_model->updateFollowupStatus($lfp_id, $status));
	}
}
?>
