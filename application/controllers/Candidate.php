<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('candidate_model');
	}

	public function candidate_list()
	{
		$data['title'] 		=	'Candidate List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Banks', base_url('candidate-dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
		$this->load->view('candidate/candidate-list', $data);
	}

	public function candidate_add($ppl_encrypt_id = '',$ppl_encrypt_name = '')
	{
		$data['title'] 		=	'Candidate Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Banks', base_url('candidate-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('candidate-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
		$data['ppl_id']       = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypt_id);
		$data['ppl_name']       = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypt_name);
		$this->load->view('candidate/candidate-add', $data);
	}

	public

	function candidate_edit($slug)
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);

		$data['title'] = 'Candidate Edit';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Candidate',base_url('candidate-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('candidate-list'));
		$data['breadcrumb_data'][] = array('Edit');

		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//

		$data['candidatedata'] = $this->candidate_model->getCandidateById($slug);
		$data['candidatedata']->cdt_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['candidatedata']->cdt_id);
		$data['cacheversion'] = global_asset_version();
		$this->load->view('candidate/candidate-edit', $data);
	}

	public function candidate_details($slug ='')
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
		$data['title'] 		=	'Candidate Details';
	   	// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		// $data['breadcrumb_data'][] = array('Banks', base_url('candidate-dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('candidate-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		$data['candidatedata'] = $this->candidate_model->getCandidateById($slug);
		// print_r($data['candidatedata']);
		// exit;
		$data['candidatedata']->cdt_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['candidatedata']->cdt_id);
		$data['candidatedata']->cdt_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['candidatedata']->cdt_name);
		$data['cacheversion'] = global_asset_version();
		// ***** Breadcrumb Data Ends here *******//
		$data['cacheversion'] = global_asset_version();
		$this->load->view('candidate/candidate-details', $data);
	}

	function candidate_getlist()
	{
		$obj['data'] = $this->candidate_model->candidate_getlist();

		// print_r($obj['data']);
		//
		// exit;
		for($i = 0; $i < count($obj['data']); $i++)
		{
			$obj['data'][$i]->cdt_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($obj['data'][$i]->cdt_id);
			$obj['data'][$i]->cdt_ppl_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($obj['data'][$i]->cdt_ppl_id);
		}

		echo json_encode($obj);
	}

	public

	function candidate_insert()
	{
		$cdtData = $this->input->post();

		$cdtData['cdt_status'] 	= '1';
		$cdtData['cdt_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$cdtData['cdt_crdt_dt'] 	= date("Y-m-d H:i:s");

		$inserted_id = $this->home_model->insert('candidate', $cdtData);

		if ($inserted_id)
		{
			$response = array(
				'success' => true,
				'message' => 'Candidate Added successfully',
				'linkn' => base_url('candidate-details-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Candidate'
			);
			echo json_encode($response);
		}
	}

	public

	function candidate_update()
	{
		$cdtData = $this->input->post();

		$cdtData['cdt_status'] = '1';
		$cdtData['cdt_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$cdtData['cdt_updt_dt'] = date("Y-m-d H:i:s");

		$updated = $this->home_model->update('cdt_id', $cdtData['cdt_id'], $cdtData, 'candidate');

		if ($updated)
		{
			$cdt_id = $cdtData['cdt_id'];
			$response = array(
				'success' => true,
				'message' => 'Candidate Updated successfully',
				'linkn' => base_url('candidate-details-' . $this->nextasy_url_encrypt->encrypt_openssl($cdt_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Candidate'
			);
			echo json_encode($response);
		}
	}
   // ***** People Start Here *******//
	public function getPeopleforDropdown()
	{
		$search     = $this->input->get('q');
		$peopleData = array('results'=>$this->candidate_model->getPeopleforDropdown($search));
		echo json_encode($peopleData);
	}
    // ***** People End Here ********//

	public function getGenPrmforDropdown($genPrmGroup)
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->candidate_model->getGenPrmforDropdown($genPrmGroup,$search));
		echo json_encode($LeadData);
	}
}

?>
