<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		check_logged();
        $this->load->model('ticket_model');
    }

	// ***** Ticket Client Starts here *******//
	public function ticket_list()
	{
		$data['title'] 		=	'Client Ticket List';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Mandate', base_url('mandate-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('ticket/client-ticket-list', $data);
	}
	public function ticket_add()
	{
		$data['title'] 		=	'Client Ticket Add';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('ticket-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('ticket/client-ticket-add', $data);
	}

	public function ticket_edit($tck_id)
	{
		$tck_id = $this->nextasy_url_encrypt->decrypt_openssl($tck_id);

		$data['title'] 		=	'Client Ticket Edit';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('ticket-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['ticket_data']	   = $this->ticket_model->getTicketById($tck_id);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('ticket/client-ticket-edit', $data);
	}

	public function ticket_detail($tck_id)
	{
		$tck_id = $this->nextasy_url_encrypt->decrypt_openssl($tck_id);

		$data['title'] 		=	'Client Ticket Detail';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('ticket-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		$data['ticket_data']	   = $this->ticket_model->getTicketById($tck_id);
		$data['ticket_att_data']	   			= $this->ticket_model->getTicketAttById($tck_id);
		$data['ticket_data']->tck_id_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['ticket_data']->tck_id);

		// ***** Breadcrum Data Ends here *******//
		$this->load->view('ticket/client-ticket-detail', $data);
	}

	public function ticket_insert()
	{
		$ticketData = $this->input->post();

		$ticketData['tck_status'] 	= '1';
		$ticketData['tck_due_dt'] 	= mysqldate($ticketData['tck_due_dt']);
		$ticketData['tck_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$ticketData['tck_user_ass_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$ticketData['tck_crdt_dt'] 	= date("Y-m-d H:i:s");
		$ticketData['tck_datetime'] = date("Y-m-d H:i:s");

		$inserted_id = $this->home_model->insert('ticket', $ticketData);

		if ($inserted_id)
		{
	        if(isset($_FILES['tck_document']['name'][0]))
	        {
				$ticketAtt = array();

				for($i = 0; $i < count($_FILES['tck_document']['name']); $i++)
				{
			        $ticketAtt[$i]['tka_name']		= upload_multiple_doc(TICKET_DOC,TICKET_DOC,'tck_document',$i,'attachment');
					$ticketAtt[$i]['tka_tck_id']	= $inserted_id;
					$ticketAtt[$i]['tka_status'] 	= '1';
					$ticketAtt[$i]['tka_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
					$this->home_model->insert('ticket_att', $ticketAtt[$i]);
				}
	        }

			$response = array(
				'success' => true,
				'message' => 'Ticket added successfully',
				'linkn' => base_url('ticket-detail-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Ticket'
			);
			echo json_encode($response);
		}
	}

	public function ticket_update()
	{
		$ticketData = $this->input->post();

		$ticketData['tck_status'] = '1';
		$ticketData['tck_due_dt'] 	= mysqldate($ticketData['tck_due_dt']);
		$ticketData['tck_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$ticketData['tck_user_ass_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$ticketData['tck_updt_dt'] = date("Y-m-d H:i:s");

		$updated = $this->home_model->update('tck_id', $ticketData['tck_id'], $ticketData, 'ticket');

		if ($updated)
		{
	        if(isset($_FILES['tck_document']['name'][0]))
	        {
				$ticketAtt = array();

				for($i = 0; $i < count($_FILES['tck_document']['name']); $i++)
				{
			        $ticketAtt[$i]['tka_name']		= upload_multiple_doc(TICKET_DOC,TICKET_DOC,'tck_document',$i,'attachment');
					$ticketAtt[$i]['tka_tck_id']	= $ticketData['tck_id'];
					$ticketAtt[$i]['tka_status'] 	= '1';
					$ticketAtt[$i]['tka_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
					$this->home_model->insert('ticket_att', $ticketAtt[$i]);
				}
	        }

			$tck_id = $ticketData['tck_id'];
			$response = array(
				'success' => true,
				'message' => 'Ticket Updated successfully',
				'linkn' => base_url('ticket-detail-' . $this->nextasy_url_encrypt->encrypt_openssl($tck_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Ticket'
			);
			echo json_encode($response);
		}
	}

	function ticket_att_upload()
	{
		$ticketAtt = array();

		$tck_id = $this->nextasy_url_encrypt->decrypt_openssl($this->input->post('tck_id'));

		for($i = 0; $i < count($_FILES['tck_document']['name']); $i++)
		{
	    $ticketAtt[$i]['tka_name']		= upload_multiple_doc(TICKET_DOC,TICKET_DOC,'tck_document',$i,'attachment');
			$ticketAtt[$i]['tka_tck_id']	= $tck_id;
			$ticketAtt[$i]['tka_status'] 	= '1';
			$ticketAtt[$i]['tka_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
			$this->home_model->insert('ticket_att', $ticketAtt[$i]);
		}

		$response = array(
			'success' => true,
			'message' => 'Attachment Uploaded Successfully',
			'linkn' => base_url('ticket-detail-' . $this->nextasy_url_encrypt->encrypt_openssl($tck_id))
		);
		echo json_encode($response);
	}

	public function ticket_delete($tck_id)
	{
		$tck_id = $this->nextasy_url_encrypt->decrypt_openssl($tck_id);
		$check = $this->home_model->delete('ticket', $tck_id, 'tck_id');
		if ($check)
		{
			$response = array(
				'success' => true,
				'message' => 'Ticket deleted successfully',
				'linkn' => base_url('ticket-list')
			);
			echo json_encode($response);
		}
	}

	function ticket_getlist()
	{
		$obj['data'] = $this->ticket_model->ticket_getlist();

		for($i = 0; $i < count($obj['data']); $i++)
		{
			$obj['data'][$i]->tck_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($obj['data'][$i]->tck_id);
		}

		echo json_encode($obj);
	}

	function ticket_getlist_byme()
	{
		$obj['data'] = $this->ticket_model->ticket_getlist_byme();

		for($i = 0; $i < count($obj['data']); $i++)
		{
			$obj['data'][$i]->tck_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($obj['data'][$i]->tck_id);
		}

		echo json_encode($obj);
	}

	// ***** Ticket Client Ends here *******//



	// ***** Ticket Internel Starts here *******//

  public function internal_ticket_list()
	{
		$data['title'] 		=	'Internal Ticket List';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Mandate', base_url('mandate-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('ticket/internal-ticket-list', $data);
	}

	public function internal_ticket_add()
	{
		$data['title'] 		=	'Internal Ticket Add';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('internal-ticket-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('ticket/internal-ticket-add', $data);
	}

	public function internal_ticket_detail()
	{
		$data['title'] 		=	'Internal Ticket Detail';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('internal-ticket-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('ticket/internal-ticket-detail', $data);
	}

	// ***** Ticket Internal End here *******//

	// ***** Ticket Project Starts here *******//
  public function project_ticket_list()
	{
		$data['title'] 		=	'Project Ticket List';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Mandate', base_url('mandate-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('ticket/project-ticket-list', $data);
	}
	public function project_ticket_add()
	{
		$data['title'] 		=	'Project Ticket Add';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('project-ticket-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('ticket/project-ticket-add', $data);
	}

	public function project_ticket_detail()
	{
		$data['title'] 		=	'Project Ticket Detail';

		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('project-ticket-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
		$this->load->view('ticket/project-ticket-detail', $data);
	}

	// ***** Ticket project Starts here *******//

   // ***** People Start Here *******//
	public function getPeopleforDropdown()
	{
		$search     = $this->input->get('q');
		$peopleData = array('results'=>$this->ticket_model->getPeopleforDropdown($search));
		echo json_encode($peopleData);
	}
    // ***** People End Here ********//

	// ***** Company Start Here *******//
	public function getCompanyforDropdown()
	{
		$search      = $this->input->get('q');
		$CompanyData = array('results'=>$this->ticket_model->getCompanyforDropdown($search));
		echo json_encode($CompanyData);
	}
	// ***** Company End Here *******//
}
