<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('team_model');
		$this->mnu_name = 'team-list';  
	}

	public function team_list()
	{
		$data['title'] 		=	'Team List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
    	if (checkaccess($this->mnu_name, 'list'))
    	{
    		$data['global_asset_version'] = global_asset_version();
    		$data['dataTableData'] = $this->team_model->team_getlist(TABLE_COUNT);
			$this->load->view('team/team-list', $data);
    	}
    	else $this->load->view('errors/easynow_404', $data);
	}

	public function team_add($ppl_encrypt_id = '',$ppl_encrypt_name = '')
	{
		$data['title'] 		=	'Team Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('team-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add'))
		{
			$data['global_asset_version'] = global_asset_version();
			$data['ppl_id']       = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypt_id);
			$data['ppl_name']       = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypt_name);
			$this->load->view('team/team-add', $data);
		}
		 else 
            $this->load->view('errors/easynow_404', $data);
	}

	public function team_edit($slug = '')
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
		$data['title'] 		=	'Team Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('team-list'));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		if (checkaccess($this->mnu_name, 'edit')) {
			$data['teamdata'] = $this->team_model->getTeamById($slug);
			// print_r($data['teamdata']);
			// exit;
			$data['teamdata']->emp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['teamdata']->emp_id);
			$data['teamdata']->emp_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['teamdata']->emp_name);
			// ***** Breadcrumb Data Ends here *******//
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('team/team-edit', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

	public function team_details($slug = '')
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
		$data['title'] 		=	'Team Detail';
	   	// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('team-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		if (checkaccess($this->mnu_name, 'detail'))
        {
        	$data['teamdata'] = $this->team_model->getTeamById($slug);
			// print_r($data['teamdata']);
			// exit;
			$data['teamdata']->emp_id_encrypt   = $this->nextasy_url_encrypt->encrypt_openssl($data['teamdata']->emp_id);
			$data['teamdata']->emp_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['teamdata']->emp_name);
			$data['teamdata']->next_encrypt 	  = $this->nextasy_url_encrypt->encrypt_openssl($data['teamdata']->next);
			$data['teamdata']->prev_encrypt 	  = $this->nextasy_url_encrypt->encrypt_openssl($data['teamdata']->prev);
			// ***** Breadcrumb Data Ends here *******//
			$data['global_asset_version'] = global_asset_version();
			$this->load->view('team/team-details', $data);
        }
        else $this->load->view('errors/easynow_404', $data);
	}

	function team_getlist()
	{
		  $dataOptn = $this->input->get();
	      $dataTableData = $this->team_model->team_getlist(TABLE_RESULT,$dataOptn);
	      // ******** Encrypt Data from multidimensional array ******//
	      $enc_arr['emp_id']    			= 'emp_id_encrypt';
	      $enc_arr['emp_cmp_id']    		= 'emp_cmp_id_encrypt';
	      $enc_arr['emp_ppl_id']    		= 'emp_ppl_encrypt';
	      $enc_arr['emp_reporting_to']    	= 'emp_reporting_encrypt';
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

	function team_insert()
	{
		$cdtData = $this->input->post();

		$cdtData['emp_status'] 	= '1';
		$cdtData['emp_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$cdtData['emp_crdt_dt'] 	= date("Y-m-d H:i:s");

		$inserted_id = $this->home_model->insert('employee', $cdtData);

		if ($inserted_id)
		{
			$response = array(
				'success' => true,
				'message' => 'Team added successfully',
				'linkn' => base_url('team-details-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Team'
			);
			echo json_encode($response);
		}
	}

	public

	function team_update()
	{
		$cdtData = $this->input->post();

		$cdtData['emp_status'] = '1';
		$cdtData['emp_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$cdtData['emp_updt_dt'] = date("Y-m-d H:i:s");

		$updated = $this->home_model->update('emp_id', $cdtData['emp_id'], $cdtData, 'employee');

		if ($updated)
		{
			$emp_id = $cdtData['emp_id'];
			$response = array(
				'success' => true,
				'message' => 'Team Updated successfully',
				'linkn' => base_url('team-details-' . $this->nextasy_url_encrypt->encrypt_openssl($emp_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Team'
			);
			echo json_encode($response);
		}
	}
   // ***** People Start Here *******//
	public function getPeopleforDropdown()
	{
		$search     = $this->input->get('q');
		$peopleData = array('results'=>$this->team_model->getPeopleforDropdown($search));
		echo json_encode($peopleData);
	}
    // ***** People End Here ********//
   // ***** Department Start Here *******//
	public function getDepartmentforDropdown()
	{
		$search     = $this->input->get('q');
		$peopleData = array('results'=>$this->team_model->getDepartmentforDropdown($search));
		echo json_encode($peopleData);
	}
    // ***** Department End Here ********//

	public function getGenPrmforDropdown($genPrmGroup)
	{
		$search   = $this->input->get('q');
		$LeadData = array('results'=>$this->team_model->getGenPrmforDropdown($genPrmGroup,$search));
		echo json_encode($LeadData);
	}

    public function deleteTeam($team_id)
    {
        $team_id = $this->nextasy_url_encrypt->decrypt_openssl($team_id);

        if($this->team_model->teamDelete($team_id))
        {
            $success = true;
            $message = 'Team Deleted successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message, 'linkn' => base_url('team-list')));
    }
    
    public function updateTeamCustomData()
    {
        $pplData = $this->team_model->updateTeamCustomData();
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

    public function getTeamDropdown()
	{
		$search     = $this->input->get('q');
		$peopleData = array('results'=>$this->team_model->getTeamDropdown($search));
		echo json_encode($peopleData);
	}
	 public function getCompanyDropdown()
	{
		$search     = $this->input->get('q');
		$ppl_id     = $this->input->get('emp_ppl');
		$companyData = array('results'=>$this->team_model->getCompanyDropdown($ppl_id,$search));
		echo json_encode($companyData);
	}
	function exportToExcel()
    {
        $query = $this->db->get('employee');
 
        if(!$query)
            return false;
 
        // Starting the PHPExcel library
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');
 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
 
        $objPHPExcel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $objPHPExcel->setActiveSheetIndex(0);
 
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Products_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
    }
 
}

?>
