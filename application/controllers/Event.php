<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller
{
	function __construct()
	{
		// Call the Model constructor

		parent::__construct();
		$this->load->model('event_model');
		check_logged();
		$this->mnu_name = 'event-list';
	}

	public function event_dashboard()
	{
		$data['title'] = 'Event Dashboard';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Event');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('event/event-dashboard', $data);
		// resu(menuid, submenuid)
	}

	public function event_list()
	{
		$data['title'] = 'Event List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'list'))
		{
			$data['global_asset_version'] = global_asset_version();
			$data['ci_asset_versn'] = ci_asset_versn();
			$data['dataTableData'] = $this->event_model->getEventForList(TABLE_COUNT);
			$data = array_merge($data, checkaccess($this->mnu_name));	
			$this->load->view('event/event-list', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

	public function event_add()
	{
		$data['title'] = 'Event Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('event-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		if (checkaccess($this->mnu_name, 'add')) {
			$data['global_asset_version'] = global_asset_version();
			$data['ci_asset_versn'] = ci_asset_versn();
			$this->load->view('event/event-add', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

	public function event_edit($slug = '')
	{
		$data['title'] = 'Event Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));		
		$data['breadcrumb_data'][] = array('List',base_url('event-list'));
		$data['breadcrumb_data'][] = array('Detail',base_url('event-details-'.$slug));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'edit')) {
			$data['global_asset_version'] = global_asset_version();
			$data['ci_asset_versn'] = ci_asset_versn();
			$evt_id = $this->nextasy_url_encrypt->decrypt_openssl($slug);
			$data['eventDetail'] = $this->event_model->getEventById($evt_id);
			$this->load->view('event/event-edit', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

	public function event_details($slug = '')
	{
		$data['title'] = 'Event Name';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));

		// $data['breadcrumb_data'][] = array('Event', base_url('event-dashboard'));

		$data['breadcrumb_data'][] = array('List',base_url('event-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail'))
		{
			$data['global_asset_version'] = global_asset_version();
			$data['ci_asset_versn'] = ci_asset_versn();

			$evt_id = $this->nextasy_url_encrypt->decrypt_openssl($slug);
			$data['eventDetail'] = $this->event_model->getEventById($evt_id);

			$data['eventDetail']->evt_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['eventDetail']->evt_id);
			$data['eventDetail']->evt_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['eventDetail']->evt_name);
			$data['eventDetail']->next_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['eventDetail']->next);
			$data['eventDetail']->prev_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['eventDetail']->prev);
			
			$data['edit_access'] = checkaccess($this->mnu_name, 'edit');
			$data['title'] 		=	$data['eventDetail']->evt_name;
			$this->load->view('event/event-details', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

	public function event_insert()
	{
		$this->form_validation->set_rules('evt_name', 'Event Name', 'required');
		if ($this->form_validation->run() == TRUE)
		{
			$eventData = array(
				'evt_name' => $this->input->post('evt_name') ,
				'evt_managed_by' => $this->input->post('evt_managed_by') ,
				'evt_date' => mysqlDateFormat($this->input->post('evt_date')) ,
				'evt_desc' => $this->input->post('evt_desc') ,
				'evt_status' => '1',
				'evt_crdt_dt' => date("Y-m-d H:i:s") ,
				'evt_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID) ,
			);
			$inserted_id = $this->home_model->insert('event', $eventData);
			if ($inserted_id)
			{
				$evt_id = $this->nextasy_url_encrypt->encrypt_openssl($inserted_id);
				$response = array(
					'success' => True,
					'message' => 'Event Added successfully',
					'linkn' => base_url('event-details-' . $evt_id)
				);
				echo json_encode($response);
				exit();
			}
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => '1'
			);
			echo json_encode($response);
			exit();
		}
	}

	public function event_update()
	{
		$evt_id = $this->input->post('evt_id');
		$this->form_validation->set_rules('evt_name', 'Event Name', 'required');
		if ($this->form_validation->run() == TRUE)
		{

			// $data['user_id'] = $this->session->userdata('mha_prs_id');

			$eventData = array(
				'evt_name' => $this->input->post('evt_name') ,
				'evt_managed_by' => $this->input->post('evt_managed_by') ,
				'evt_date' => mysqlDateFormat($this->input->post('evt_date')) ,
				'evt_desc' => $this->input->post('evt_desc') ,
				'evt_status' => '1',

				// 'evt_updt_by'           =>

			);
			$updated = $this->home_model->update('evt_id', $evt_id, $eventData, 'event');
			if ($updated)
			{
				$evt_id = $this->nextasy_url_encrypt->encrypt_openssl($evt_id);
				$response = array(
					'success' => True,
					'message' => 'Event Updated successfully',
					'linkn' => base_url('event-details-' . $evt_id)
				);
				echo json_encode($response);
				exit();
			}
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => '1'
			);
			echo json_encode($response);
			exit();
		}
	}

	public function deleteEvent()
	{
		$evt_id = $this->input->post('evt_id');
		$type = $this->input->post('type');
		$check = $this->event_model->eventDelete($evt_id, $type);
		if ($check)
		{
			$response = array(
				'success' => True,
				'message' => 'Event removed successfully'
			);
			echo json_encode($response);
		}
	}

	public function event_people_add($id = '', $name = '', $type = '')
	{
		$link = '';
		if ($type == 'event')
		{
			$data['evt_id'] = $this->nextasy_url_encrypt->decrypt_openssl($id);
			$data['evt_name'] = $this->nextasy_url_encrypt->decrypt_openssl($name);
			$link = 'event-details-';
		}
		else
		if ($type == 'people')
		{
			$data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($id);
			$data['ppl_name'] = $this->nextasy_url_encrypt->decrypt_openssl($name);
			$link = 'people-details-';
		}
		$data['title'] = 'Event People Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Event', base_url('event-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url($link . $id));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['global_asset_version'] = global_asset_version();
		$data['ci_asset_versn'] = ci_asset_versn();
		// ***** Breadcrumb Data Ends here *******//
		$this->load->view('event/event-people-add', $data);
	}

	public function event_people_edit($epl_id = '')
	{
		$data['title'] = 'Event People Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Event', base_url('event-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('event-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['global_asset_version'] = global_asset_version();
		$data['ci_asset_versn'] = ci_asset_versn();
		// ***** Breadcrumb Data Ends here *******//
		$epl_id = $this->nextasy_url_encrypt->decrypt_openssl($epl_id);
		$data['eventPplDetail'] = $this->event_model->getEventPplById($epl_id);
		// print_r($data['eventPplDetail']);
		// exit;
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('event/event-people-edit', $data);
	}

	public function event_people_insert()
	{
		$eventData = array(
			'epl_ppl_id' => $this->input->post('epl_ppl_id') ,
			'epl_remark' => $this->input->post('epl_remark') ,
			'epl_evt_id' => $this->input->post('epl_evt_id') ,
			'epl_status' => '1',
			'epl_crdt_dt' => date("Y-m-d H:i:s") ,
			'epl_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID) ,
		);
		$inserted_id = $this->home_model->insert('event_people', $eventData);
		if ($inserted_id)
		{
			$evt_encrypt_id = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('epl_evt_id'));
			$response = array(
				'success' => True,
				'message' => 'Event People Added successfully',
				'linkn' => base_url('event-people-detail-' . $evt_encrypt_id)
			);
			echo json_encode($response);
			exit();
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => '1'
			);
			echo json_encode($response);
			exit();
		}
	}

	public function event_people_update()
	{
		$epl_id = $this->input->post('epl_id');
		$eventData = array(
			'epl_ppl_id' => $this->input->post('epl_ppl_id') ,
			'epl_evt_id' => $this->input->post('epl_evt_id') ,
			'epl_remark' => $this->input->post('epl_remark') ,
			'epl_status' => '1',
			'epl_updt_by' => $this->session->userdata(PEOPLE_SESSION_ID) ,
		);
		$updated = $this->home_model->update('epl_id', $epl_id, $eventData, 'event_people');
		if ($updated)
		{
			$evt_encrypt_id = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('epl_evt_id'));
			$response = array(
				'success' => True,
				'message' => 'Event People Updated successfully',
				'linkn' => base_url('event-people-detail-' . $evt_encrypt_id)
			);
			echo json_encode($response);
			exit();
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => '1'
			);
			echo json_encode($response);
			exit();
		}
	}

	public function event_people_detail($slug)
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
		$data['title'] = 'Event People List';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Event',base_url('event-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('event-list'));
		$data['breadcrumb_data'][] = array('People Details');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['eventdata'] = $this->event_model->getEventById($slug);
		// print_r($data['eventdata']);
		// exit;
		$data['eventdata']->evt_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['eventdata']->evt_id);
		$data['eventdata']->evt_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['eventdata']->evt_name);
		$data['global_asset_version'] = global_asset_version();
		$data['dataTableData'] = $this->event_model->getEventForListing($data['eventdata']->evt_id, TABLE_COUNT);
		$this->load->view('event/event-people-details', $data);
	}

	public function getPeopleDropdown()
	{
		$search = $this->input->get('q');
		$peopleData = array(
			'results' => $this->event_model->getPeopleforDropdown($search)
		);
		echo json_encode($peopleData);
	}

	public function getEventsDropdown()
	{
		$search = $this->input->get('q');
		$bankData = array(
			'results' => $this->event_model->getEventDropdown($search)
		);
		echo json_encode($bankData);
	}

	public function getEventDataTableList()
	{
		$dataOptn = $this->input->get();
		$dataTableData = $this->event_model->getEventForList(TABLE_RESULT, $dataOptn);

		// ******** Encrypt Data from multidimensional array ******//

		$enc_arr['evt_id'] = 'evt_encrypt_id';
		$dataTableArray['data'] = encrypt_key_in_array($dataTableData, $enc_arr);

		// ******** Encrypt Data from multidimensional array ******//

		if (isset($dataOptn['columns']))
		{

			// *********** Get Data Count **********//

			$dataTableArray['draw'] = $dataOptn['draw'];
			$dataTableArray['recordsTotal'] = $dataOptn['table_data_count'];
			$dataTableArray['recordsFiltered'] = $dataOptn['table_data_count'];

			// *********** Get Data Count **********//

		}

		echo json_encode($dataTableArray);
	}

	public function getEventPplDataTableList($evt_id)
	{
		$evt_id = $this->nextasy_url_encrypt->decrypt_openssl($evt_id);
		$dataOptn = $this->input->get();
		$dataTableData = $this->event_model->getEventForListing($evt_id, TABLE_RESULT, $dataOptn);

		// ******** Encrypt Data from multidimensional array ******//

		$enc_arr['epl_id'] = 'epl_encrypt_id';
		$enc_arr['epl_ppl_id'] = 'ppl_encrypt_id';
		$enc_arr['epl_crdt_by'] = 'crdt_by_encrypt_id';
		$dataTableArray['data'] = encrypt_key_in_array($dataTableData, $enc_arr);

		// ******** Encrypt Data from multidimensional array ******//

		if (isset($dataOptn['columns']))
		{

			// *********** Get Data Count **********//

			$dataTableArray['draw'] = $dataOptn['draw'];
			$dataTableArray['recordsTotal'] = $dataOptn['table_data_count'];
			$dataTableArray['recordsFiltered'] = $dataOptn['table_data_count'];

			// *********** Get Data Count **********//

		}

		echo json_encode($dataTableArray);
	}
    
    public function updateEventCustomData()
    {
        $eventData = $this->event_model->updateEventCustomData();
        if($eventData)
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

	function getEmployeeforDropdown()
	{
		$search   = $this->input->get('q');
		$teamData = array('results'=>$this->event_model->getEmployeeforDropdown($search));
		echo json_encode($teamData);
	}
}

?>
