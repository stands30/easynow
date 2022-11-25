<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmailTemplate extends CI_Controller
{
	public function __construct()
	{
			parent::__construct();
			check_logged();
			$this->load->model('email_temp_model');
			$this->mnu_name = 'email-template-list';
	}
	public function email_template_list()
	{
		$data['title'] = 'Email Template List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']                = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['dataTableData']             = $this->email_temp_model->email_temp_getlist(TABLE_COUNT);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'list'))
		{
		$data['global_asset_version'] = global_asset_version();        
		$this->load->view('email/email-template/email-template-list', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	public function email_template_add()
	{
		$data['title'] = 'Email Template Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('email-template-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add')) {
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('email/email-template/email-template-add', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	public function email_template_edit($emt_id = '')
	{
		$data['title'] = 'Email Template Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('email-template-list'));
		$data['breadcrumb_data'][] = array('Detail',base_url('email-template-detail-'.$emt_id));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']          = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$emt_id = $this->nextasy_url_encrypt->decrypt_openssl($emt_id);
		if (checkaccess($this->mnu_name, 'edit')) {
			$data['emailTemp_data']	     = $this->email_temp_model->getEmtById($emt_id);
			// ***** Breadcrumb Data Ends here *******//
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('email/email-template/email-template-edit', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	public function email_template_detail($emt_id = '')
	{
		$emt_id = $this->nextasy_url_encrypt->decrypt_openssl($emt_id);
		$data['title'] = 'Email Template Detail';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('email-template-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		if (checkaccess($this->mnu_name, 'detail'))
		{
			$data['emailTemp_data']	                        = $this->email_temp_model->getEmtById($emt_id);
			$data['emailTemp_att_data']	                    = $this->email_temp_model->getEmtAttById($emt_id);
	    	$data['emailTemp_data']->emt_id_encrypt 	      = $this->nextasy_url_encrypt->encrypt_openssl($data['emailTemp_data']->emt_id);
	    	$data['emailTemp_data']->next 	    						= $this->nextasy_url_encrypt->encrypt_openssl($data['emailTemp_data']->next);
			$data['emailTemp_data']->prev 	    						= $this->nextasy_url_encrypt->encrypt_openssl($data['emailTemp_data']->prev);
			// ***** Breadcrumb Data Ends here *******//
			$data['global_asset_version'] = global_asset_version();
			$data['title'] 		=	$data['emailTemp_data']->emt_title;
			// echo '<pre>';
			// print_r($data);
			// exit;
			$this->load->view('email/email-template/email-template-detail', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}
	public function email_temp_insert()
	{
		$emtData                    = $this->input->post();
		$emtData['emt_status'] 	    = ACTIVE_STATUS;
		$emtData['emt_crdt_by'] 	  = $this->session->userdata(PEOPLE_SESSION_ID);
		$emtData['emt_crdt_dt'] 	  = date("Y-m-d H:i:s");
	    $inserted_id                = $this->home_model->insert('email_template', $emtData);
		if ($inserted_id)
		{
	        if(isset($_FILES['emt_document']['name'][0]))
	        {
    				$emtAtt = array();
    				for($i = 0; $i < count($_FILES['emt_document']['name']); $i++)
    				{
    			    $emtAtt[$i]['eta_name']		= upload_multiple_doc(EMAIL_DOC,EMAIL_DOC,'emt_document',$i,'attachment');
    					$emtAtt[$i]['eta_emt_id']	= $inserted_id;
    					$emtAtt[$i]['eta_status'] 	= ACTIVE_STATUS;
    					$emtAtt[$i]['eta_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
    					$this->home_model->insert('email_template_att', $emtAtt[$i]);
    				}
	        }
			$response = array(
				'success' => true,
				'message' => 'Email Template added successfully',
				'linkn' => base_url('email-template-detail-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding '
			);
			echo json_encode($response);
		}
	}
	public function email_temp_update()
	{
		$emtData                    = $this->input->post();
		$emtData['emt_status'] 	    = ACTIVE_STATUS;
		$emtData['emt_crdt_by'] 	  = $this->session->userdata(PEOPLE_SESSION_ID);
		$emtData['emt_crdt_dt'] 	  = date("Y-m-d H:i:s");
		$updated = $this->home_model->update('emt_id', $emtData['emt_id'], $emtData, 'email_template');
		if ($updated)
		{
	        if(isset($_FILES['emt_document']['name'][0]))
	        {
				$emtAtt = array();
    				for($i = 0; $i < count($_FILES['emt_document']['name']); $i++)
    				{
    			    $emtAtt[$i]['eta_name']		  = upload_multiple_doc(EMAIL_DOC,EMAIL_DOC,'emt_document',$i,'attachment');
    					$emtAtt[$i]['eta_emt_id']	  = $emtData['emt_id'];
    					$emtAtt[$i]['eta_status'] 	  = ACTIVE_STATUS;
    					$emtAtt[$i]['eta_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
    					$this->home_model->insert('email_template_att', $emtAtt[$i]);
    				}
	        }
			$emt_id = $emtData['emt_id'];
			$response = array(
				'success' => true,
				'message' => 'Email Template Updated successfully',
				'linkn' => base_url('email-template-detail-' . $this->nextasy_url_encrypt->encrypt_openssl($emt_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating '
			);
			echo json_encode($response);
		}
	}
	function emt_att_upload()
	{
		$emtAtt = array();
		$emt_id = $this->nextasy_url_encrypt->decrypt_openssl($this->input->post('emt_id'));
		for($i = 0; $i < count($_FILES['emt_document']['name']); $i++)
		{
	    $emtAtt[$i]['eta_name']		= upload_multiple_doc(EMAIL_DOC,EMAIL_DOC,'emt_document',$i,'attachment');
			$emtAtt[$i]['eta_emt_id']	= $emt_id;
			$emtAtt[$i]['eta_status'] 	= '1';
			$emtAtt[$i]['eta_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
			$this->home_model->insert('email_template_att', $emtAtt[$i]);
		}
		$response = array(
			'success' => true,
			'message' => 'Attachment Uploaded Successfully',
			'linkn' => base_url('email-template-detail-' . $this->nextasy_url_encrypt->encrypt_openssl($emt_id))
		);
		echo json_encode($response);
	}
	function email_temp_getlist()
	{
    $dataOptn = $this->input->get();
    $dataTableData = $this->email_temp_model->email_temp_getlist(TABLE_RESULT,$dataOptn);
    // ******** Encrypt Data from multidimensional array ******//
    $enc_arr['emt_id']    = 'emt_id_encrypt';
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
}
?>
