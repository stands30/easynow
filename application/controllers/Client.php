<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('client_model');
	}

	public

	function client_dashboard()
	{
		$data['title'] = 'Client Dashboard';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		$data['breadcrumb_data'][] = array(
			'Client'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-dashboard', $data);
	}

	public

	function client_list()
	{
		$data['title'] = 'Client List';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		$data['breadcrumb_data'][] = array(
			'List'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        $data['dataTableData'] = $this->client_model->client_getlist(TABLE_COUNT);
		$this->load->view('client/client-list', $data);
	}

	public

	function client_add()
	{
		$data['title'] = 'Client Add';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		$data['breadcrumb_data'][] = array(
			'List',
			base_url('client-list')
		);
		$data['breadcrumb_data'][] = array(
			'Add'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-add', $data);
	}

	public

	function client_people_add($cmp_id = '',$cmp_name = '')
	{
		$data['cmp_id']   = $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);
		$data['cmp_id_encrypt']   = $cmp_id;
		$data['cmp_name'] = $this->nextasy_url_encrypt->decrypt_openssl($cmp_name);
		$data['title'] = 'Client People Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		$data['breadcrumb_data'][] = array(
			'List',
			base_url('client-details-'.$cmp_id)
		);
		$data['breadcrumb_data'][] = array(
			'Add'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-people-add', $data);
	}

	public function client_people_edit($cpl_id = '',$cmp_id = '')
	{

		$data['title'] 		=	'Client People Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Event', base_url('client-dashboard'));
    $data['breadcrumb_data'][] = array('List',base_url('client-details-'.$cmp_id));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
    $data['cacheVersion'] = global_asset_version();
		// ***** Breadcrumb Data Ends here *******//
    $cpl_id = $this->nextasy_url_encrypt->decrypt_openssl($cpl_id);
    $data['clientPplDetail'] = $this->client_model->getCompPplById($cpl_id);
		$data['clientPplDetail']->cmp_id_encrypt = $cmp_id;
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-people-edit', $data);
	}

	public

	function client_edit($slug)
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);

		$data['title'] = 'Client Edit';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);

		$data['breadcrumb_data'][] = array(
			'List',
			base_url('client-list')
		);
		$data['breadcrumb_data'][] = array(
			'Edit'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//

		$data['clientdata'] = $this->client_model->getClientById($slug);
		$data['clientdata']->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->cmp_id);
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-edit', $data);
	}

	public

	function client_details($slug)
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
		$data['title'] = 'Client Details';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		$data['breadcrumb_data'][] = array(
			'List',
			base_url('client-list')
		);
		$data['breadcrumb_data'][] = array(
			'Details'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//

		$data['clientdata'] = $this->client_model->getClientById($slug);
		// print_r($data['clientdata']);
		// exit;
		$data['clientdata']->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->cmp_id);
		$data['clientdata']->cmp_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->cmp_name);
		$data['clientdata']->next_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->next);
		$data['clientdata']->prev_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->prev);
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-details', $data);
	}

	public

	function client_people_detail($slug)
	{
		$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
		$data['title'] = 'Client People Details';

		// ***** Breadcrumb Data Starts here *******//

		$data['breadcrumb_data'][] = array(
			'Home',
			base_url('dashboard')
		);
		$data['breadcrumb_data'][] = array(
			'List',
			base_url('client-list')
		);
		$data['breadcrumb_data'][] = array(
			'People Details'
		);
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		// ***** Breadcrumb Data Ends here *******//

		$data['clientdata'] = $this->client_model->getClientById($slug);
		$data['clientdata']->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->cmp_id);
		$data['clientdata']->cmp_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['clientdata']->cmp_name);
		$data['global_asset_version'] = global_asset_version();
        $data['dataTableData'] = $this->client_model->client_people_list($data['clientdata']->cmp_id,TABLE_COUNT);;
		$this->load->view('client/client-people-details', $data);
	}

	public

	function client_insert()
	{
		$compData    = $this->input->post();
		$clientData  = array();
		$compData['cmp_status'] = '1';
		$compData['cmp_tgs_id'] = $this->getTagsId($this->input->post('cmp_tgs_id'));
		if(isset($_FILES['cmp_logo']['name']))
		{
	        $sourcePath 		= $_FILES['cmp_logo']['tmp_name'];
	        $data['cmp_logo']   = $_FILES['cmp_logo']['name'];
	        $targetPath 		= 'assets/client/img/'.$data['cmp_logo'];
	        $check 				= move_uploaded_file($sourcePath,$targetPath);

			if(!$check)
			{
	            $response  = array('success' => false , 'message' => 'Error in Uploading Logo');
	            echo json_encode($response);
	            exit();
			}

			$compData['cmp_logo'] 	= $data['cmp_logo'];
		}

		$compData['cmp_status'] 	= '1';
		$compData['cmp_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$compData['cmp_crdt_dt'] 	= date("Y-m-d H:i:s");

		$inserted_id = $this->home_model->insert('company', $compData);

		if ($inserted_id)
		{
			$clientData['cli_cmp_id']  = $inserted_id;
			$clientData['cli_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
			$clientData['cli_crdt_dt'] = date("Y-m-d H:i:s");
			$client_id = $this->home_model->insert('client', $clientData);
			$response = array(
				'success' => true,
				'message' => 'Client Added successfully',
				'linkn' => base_url('client-details-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Client'
			);
			echo json_encode($response);
		}
	}

	public

	function client_update()
	{
		$compData = $this->input->post();
		$compData['cmp_tgs_id'] = $this->getTagsId($this->input->post('cmp_tgs_id'));
			
		if(isset($_FILES['cmp_logo']['name']))
		{
	        $sourcePath 		= $_FILES['cmp_logo']['tmp_name'];
	        $data['cmp_logo']   = $_FILES['cmp_logo']['name'];
	        $targetPath 		= 'assets/client/img/'.$data['cmp_logo'];
	        $check 				= move_uploaded_file($sourcePath,$targetPath);

			if(!$check)
			{
	            $response  = array('success' => false , 'message' => 'Error in Uploading Logo');
	            echo json_encode($response);
	            exit();
			}

			$compData['cmp_logo'] 	= $data['cmp_logo'];
		}

		$compData['cmp_status'] = '1';
		$compData['cmp_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$compData['cmp_updt_dt'] = date("Y-m-d H:i:s");

		$updated = $this->home_model->update('cmp_id', $compData['cmp_id'], $compData, 'company');

		if ($updated)
		{
			$cmp_id = $compData['cmp_id'];
			$response = array(
				'success' => true,
				'message' => 'Client Updated successfully',
				'linkn' => base_url('client-details-' . $this->nextasy_url_encrypt->encrypt_openssl($cmp_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Client'
			);
			echo json_encode($response);
		}
	}

	public

	function client_delete($cmp_id)
	{
		$cmp_id = $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);
		$check = $this->home_model->delete('cmp', $cmp_id, 'client');
		if ($check)
		{
			$response = array(
				'success' => true,
				'message' => 'Client Deleted successfully',
				'linkn' => base_url('client-list')
			);
			echo json_encode($response);
		}
	}

	function getCode($string)
	{
		return str_replace(' ', '-',$string);
	}

	function client_getlist()
	{
	  $dataOptn = $this->input->get();
      $dataTableData = $this->client_model->client_getlist(TABLE_RESULT,$dataOptn);
      // ******** Encrypt Data from multidimensional array ******//
      $enc_arr['cmp_id']    = 'cmp_id_encrypt';
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
	public function client_people_insert()
  {


      $clientData = array(

		  'cpl_ppl_id'            => $this->input->post('cpl_ppl_id'),
          'cpl_designation'       => $this->input->post('cpl_designation'),
		  'cpl_cmp_id'            => $this->input->post('cpl_cmp_id'),
		  'cpl_status'            => '1',
          'cpl_crdt_dt'           => date("Y-m-d H:i:s"),
          'cpl_crdt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),

	  		);
			$inserted_id = $this->home_model->insert('cmp_people',$clientData);
			if($inserted_id)
			{
					$cmp_encrypt_id = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('cpl_cmp_id'));
  					$response  = array('success' => True , 'message' => 'Client People Details added successfully','linkn'=>base_url('client-people-detail-'.$cmp_encrypt_id));
    	    		echo json_encode($response);
    	   			exit();
			}
      else
      {
       				 $response  = array('success' => false , 'message' => '1');
                	 echo json_encode($response);
                	 exit();
      }

  }

	public function client_people_update()
  {

      $cpl_id = $this->input->post('cpl_id');
			$cmp_id = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('cpl_cmp_id'));
      $copmayData = array(

				'cpl_ppl_id'            => $this->input->post('cpl_ppl_id'),
				'cpl_cmp_id'            => $this->input->post('cpl_cmp_id'),
				'cpl_designation'       => $this->input->post('cpl_designation'),
				'cpl_status'            => '1',
				'cpl_updt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),

	  		);
			$updated = $this->home_model->update('cpl_id',$cpl_id,$copmayData,'cmp_people');
			if($updated)
			{
  				$response  = array('success' => True , 'message' => 'Client People Details updated successfully','linkn' => base_url('client-people-detail-'.$cmp_id));
    	    echo json_encode($response);
    	    exit();
			}
      else
      {
        $response  = array('success' => false , 'message' => '1');
        echo json_encode($response);
        exit();
      }
  }

	function client_people_list($cmp_id)
	{
		$cmp_id = $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);
	  $dataOptn = $this->input->get();
      $dataTableData = $this->client_model->client_people_list($cmp_id,TABLE_RESULT,$dataOptn);
      // ******** Encrypt Data from multidimensional array ******//
      $enc_arr['cpl_ppl_id']  = 'cpl_ppl_id_encrypt';
      $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
      $enc_arr['cpl_id']      = 'cpl_id_encrypt';
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

	public function getClientDropdown()
	{
		$search      = $this->input->get('q');
		$clientData = array('results'=>$this->client_model->getClientDropdown($search));
		echo json_encode($clientData);
	}

	public function getIndustryDropdown()
	{
		$search      = $this->input->get('q');
		$industryData = array('results'=>$this->client_model->getDropdown($search,COMPANY_INDUSTRY));
		echo json_encode($industryData);
	}

	public function getClientTypeDropdown()
	{
		$search      = $this->input->get('q');
		$industryData = array('results'=>$this->client_model->getDropdown($search,COMPANY_TYPE));
		echo json_encode($industryData);
	}

	public function getClientAnnualDropdown()
	{
		$search      = $this->input->get('q');
		$industryData = array('results'=>$this->client_model->getDropdown($search,COMPANY_ANNUAL_REV));
		echo json_encode($industryData);
	}

	public function getStateDropdown()
	{
		$search      = $this->input->get('q');
		$stateData = array('results'=>$this->client_model->getStateDropdown($search));
		echo json_encode($stateData);
	}

	public function getTagsId($tgs_id)
	{
			$tags_value = '';
			$tagsId = '';
			if($tgs_id != '')
			{
					log_message('nexlog','people_model::getTagsId >>');
					$tagsArray = explode(",",$tgs_id);
					log_message('nexlog','tags from input >>'.json_encode($tagsArray));
					for ($i=0; $i < count($tagsArray); $i++)
					{
						 if(is_numeric($tagsArray[$i]))
						 {
							 log_message('nexlog','tag already present :'. $tagsArray[$i]);
							 $tags_value .= $tagsArray[$i].',';
						 }
						 else
						 {
							 // ******* Tags Check *******//
							 $tagsCheckSql    = "SELECT count(*) tags_count,tgs_id from tags where tgs_name LIKE '%".$tagsArray[$i]."%' ";
							 log_message('nexlog','tagsCheckSql : '.$tagsCheckSql);
							 $tagsCheckResult = $this->home_model->executeSqlQuery($tagsCheckSql,'row');
							 log_message('nexlog','tagsCheckResult : '.json_encode($tagsCheckResult));
							 log_message('nexlog','$tagsCheckResult->tags_count : '.$tagsCheckResult->tags_count);
									if($tagsCheckResult->tags_count > 0)
									{
							 log_message('nexlog','$tagsCheckResult->tags_count > 0: '.$tagsCheckResult->tags_count.' >> ');
											$tags_value .= $tagsCheckResult->tgs_id.',';
											log_message('nexlog','tags_value : '.$tags_value);
							 log_message('nexlog','$tagsCheckResult->tags_count > 0: '.$tagsCheckResult->tags_count.' << ');
									}
									else
									{
							 log_message('nexlog','$tagsCheckResult->tags_count  < 0 : '.$tagsCheckResult->tags_count.' >> ');
											$tagsInsert = array();
											$tagsInsert['tgs_name']      = $tagsArray[$i];
											$tagsInsert['tgs_crdt_by']   = $this->session->userdata(PEOPLE_SESSION_ID);
											$tagsInsert['tgs_status']    = ACTIVE_STATUS;
											$tagsInsertId = $this->home_model->insert('tags',$tagsInsert);
											$tags_value .= $tagsInsertId.',';
											log_message('nexlog','new tag value : '.$tagsArray[$i].' || id :'. $tagsInsertId);
							 log_message('nexlog','$tagsCheckResult->tags_count  < 0 : '.$tagsCheckResult->tags_count.' << ');
									}
							 // ******* Tags Check *******//
						 }
					}
			log_message('nexlog','tags : '.$tags_value);
			log_message('nexlog','people_model::getTagsId <<');
			}
			if($tags_value != '')
			{
				$tagsId = rtrim($tags_value,",");
			}
			return $tagsId;
	}

	public function client_account_list()
	{
		$data['title'] = 'Client Account List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
        $data['dataTableData'] = $this->client_model->client_getlist(TABLE_COUNT);
		$this->load->view('client/client-account-list', $data);
	}

	public function client_account_detail()
	{
		
		$data['title'] = 'Client Account Details';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('client-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('client/client-account-detail', $data);
	}

    
    public function getDesignationDropdown()
    {
        $search   = $this->input->get('q');
        $LeadData = array('results'=>$this->client_model->getDesignationDropdown($search));
        echo json_encode($LeadData);
    }


}

?>
