<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged();
		$this->load->model('company_model');
		$this->mnu_name = 'company-list';
	}

	public

	function company_dashboard()
	{
		$data['title'] = 'Company Dashboard';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Company');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		$data['global_asset_version'] = global_asset_version();
		$this->load->view('company/company-dashboard', $data);
	}

	public function company_list($type = '', $value = '')
	{
		$data['title'] = 'Company List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		// $test =  checkaccess($this->mnu_name, 'list');
		// echo $test;
		// exit;
		if (checkaccess($this->mnu_name, 'list'))
		{
			$data['global_asset_version'] = global_asset_version();
			$filter['filter_type'] 	=	$data['filter_type'] 	= $type;
			$filter['filter_value'] =	$data['filter_value'] 	= $value;
			$data['dataTableData'] 	= $this->company_model->company_getlist(TABLE_COUNT, $filter);
	        $data 					= array_merge($data, checkaccess($this->mnu_name));
	        $this->load->view('company/company-list', $data);
	    }
	    else $this->load->view('errors/easynow_404', $data);
	}


	public function account_list()
	{
		$data['title'] = 'Account List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		if (checkaccess($this->mnu_name, 'list')) {
				$data['global_asset_version'] = global_asset_version();
				$data['dataTableData'] = $this->company_model->account_getlist(TABLE_COUNT);
		        $data 								 = array_merge($data, checkaccess($this->mnu_name));
		        $this->load->view('account/account-list', $data);
    	}
    	else $this->load->view('errors/easynow_404', $data);
	}


	public function company_add()
	{
		$data['title'] = 'Company Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('company-list'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add')) {
			  $data['global_asset_version'] = global_asset_version();
        $data 								 = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('company/company-add', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	public

	function company_people_add($id = '',$name = '',$type = '')
	{
		$details_url = '';
		$list_url = '';

		if($type == 'company')
		{
			$data['cmp_id']           = $this->nextasy_url_encrypt->decrypt_openssl($id);
			$data['cmp_id_encrypt']   = $id;
			$data['cmp_name']         = $this->nextasy_url_encrypt->decrypt_openssl($name);
			$list_url = 'company-list';
			$details_url = 'company-details-';
    	    $breadcrumb_data = array('Details',base_url('company-people-detail-'.$id));

		}
		else if($type == 'people')
		{
			$data['ppl_id']   = $this->nextasy_url_encrypt->decrypt_openssl($id);
			$data['ppl_id_encrypt']   = $id;
			$data['ppl_name'] = $this->nextasy_url_encrypt->decrypt_openssl($name);
			$list_url = 'people-list';
			$details_url = 'people-details-';
		}
		$data['title'] = 'Company People Add';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url($list_url));
		$data['breadcrumb_data'][] = array('Details',base_url($details_url.$id));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'add')) {
			$data['global_asset_version'] = global_asset_version();
        	$data = array_merge($data, checkaccess($this->mnu_name));
        	$this->load->view('company/company-people-add', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	public function company_people_edit($cpl_id = '',$cmp_id = '')
	{
		$data['title'] 		=	'Company People Edit 123';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Company', base_url('company-dashboard'));
    	$data['breadcrumb_data'][] = array('List',base_url('company-people-detail-'.$cmp_id));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

		if (checkaccess($this->mnu_name, 'edit')) {
			$cpl_id = $this->nextasy_url_encrypt->decrypt_openssl($cpl_id);
			$data['companyPplDetail'] = $this->company_model->getCompPplById($cpl_id);
			$data['companyPplDetail']->cmp_id_encrypt = $cmp_id;
			// ***** Breadcrumb Data Ends here *******//
			$data['cacheVersion'] = global_asset_version();
			$data['global_asset_version'] = global_asset_version();
	        $data 								 = array_merge($data, checkaccess($this->mnu_name));
	        $this->load->view('company/company-people-edit', $data);
	    }
	    else $this->load->view('errors/easynow_404', $data);
	}

	public

	function company_edit($slug = '')
	{
		$data['title'] = 'Company Edit';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('company-list'));
		$data['breadcrumb_data'][] = array('Detail',base_url('company-details-'.$slug));
		$data['breadcrumb_data'][] = array('Edit');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'edit'))
		{
			$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
			$data['companydata'] = $this->company_model->getCompanyById($slug);
			$data['companydata']->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['companydata']->cmp_id);
			// ***** Breadcrumb Data Ends here *******//
			$data['global_asset_version'] = global_asset_version();
			$data 								 = array_merge($data, checkaccess($this->mnu_name));
			$this->load->view('company/company-edit', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

	public function company_details($slug = '')
	{
		$data['title'] = 'Company Details';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('company-list'));
		$data['breadcrumb_data'][] = array('Details');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// companydata->cmp_name
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail')) {
				$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
				$data['companydata'] = $this->company_model->getCompanyById($slug);
				$data['companydata']->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['companydata']->cmp_id);
				$data['companydata']->cmp_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['companydata']->cmp_name);
				$data['companydata']->next_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['companydata']->next);
				$data['companydata']->prev_encrypt 	= $this->nextasy_url_encrypt->encrypt_openssl($data['companydata']->prev);
				$data['global_asset_version'] = global_asset_version();
				$data['peopleDataTableData'] = $this->company_model->company_people_list($data['companydata']->cmp_id,TABLE_COUNT);
				$data = array_merge($data, checkaccess($this->mnu_name));
				$data['title'] = $data['companydata']->cmp_name;
				$this->load->view('company/company-details', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

	public function company_people_detail($slug = '')
	{
		$data['title'] = 'Company People List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('company-list'));
		$data['breadcrumb_data'][] = array('People Details');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail')) {
			$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
			$data['companydata'] = $this->company_model->getCompanyById($slug);
			$data['companydata']->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['companydata']->cmp_id);
			$data['companydata']->cmp_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['companydata']->cmp_name);
			$data['global_asset_version'] = global_asset_version();
			$data['dataTableData'] = $this->company_model->company_people_list($data['companydata']->cmp_id,TABLE_COUNT);
			$data = array_merge($data, checkaccess($this->mnu_name));
			$this->load->view('company/company-people-details', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

	public function company_activity_detail($slug = '')
	{
		$data['title'] = 'Company People List';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List',base_url('company-list'));
		$data['breadcrumb_data'][] = array('Activity');
		$data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//
		if (checkaccess($this->mnu_name, 'detail')) {
			$slug = $this->nextasy_url_encrypt->decrypt_openssl($slug);
			$data['companydata'] = $this->company_model->getCompanyById($slug);
			$data['companydata']->cmp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['companydata']->cmp_id);
			$data['companydata']->cmp_name_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($data['companydata']->cmp_name);
			$data['global_asset_version'] = global_asset_version();
			$data['dataTableData'] = $this->company_model->company_people_list($data['companydata']->cmp_id,TABLE_COUNT);
			$data = array_merge($data, checkaccess($this->mnu_name));
			$this->load->view('company/company-activity-detail', $data);
		}
		else $this->load->view('errors/easynow_404', $data);
	}

	public function company_insert()
	{
		$compData = $this->input->post();
		$compData['cmp_status'] = '1';
		$compData['cmp_tgs_id'] = $this->getTagsId($this->input->post('cmp_tgs_id'));
	    if (isset($_FILES['cmp_logo']['name']))
	    {
	      $compData['cmp_logo'] = doc_upload(COMPANY_LOGO, COMPANY_LOGO_RESIZE, 'cmp_logo', 'image');
	    }
	    unset($compData['file_count']);
		$compData['cmp_status'] 	= '1';
		$compData['cmp_crdt_by'] 	= $this->session->userdata(PEOPLE_SESSION_ID);
		$compData['cmp_crdt_dt'] 	= date("Y-m-d H:i:s");
		$inserted_id = $this->home_model->insert('company', $compData);
		if ($inserted_id)
		{
			$response = array(
				'success' => true,
				'message' => 'Company Added successfully',
				'linkn' => base_url('company-details-' . $this->nextasy_url_encrypt->encrypt_openssl($inserted_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Adding Company'
			);
			echo json_encode($response);
		}
	}

	public function company_update()
	{
		$compData = $this->input->post();
		$compData['cmp_tgs_id'] = $this->getTagsId($this->input->post('cmp_tgs_id'));
		// print_r($compData['cmp_tgs_id']);
		// exit;
	    if (isset($_FILES['cmp_logo']['name']))
	    {
	      $compData['cmp_logo'] = doc_upload(COMPANY_LOGO, COMPANY_LOGO_RESIZE, 'cmp_logo', 'image');
	    }
	    unset($compData['file_count']);
		$compData['cmp_status'] = '1';
		$compData['cmp_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
		$compData['cmp_updt_dt'] = date("Y-m-d H:i:s");
		$updated = $this->home_model->update('cmp_id', $compData['cmp_id'], $compData, 'company');
		if ($updated)
		{
			$cmp_id = $compData['cmp_id'];
			$response = array(
				'success' => true,
				'message' => 'Company Updated successfully',
				'linkn' => base_url('company-details-' . $this->nextasy_url_encrypt->encrypt_openssl($cmp_id))
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'success' => false,
				'message' => 'Error in Updating Company'
			);
			echo json_encode($response);
		}
	}

	public function company_delete($cmp_id)
    {
        $cmp_id = $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);
        if($this->company_model->companyDelete($cmp_id))
        {
            $success = true;
            $message = 'Company Deleted successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message, 'linkn' => base_url('company-list')));
    }

	function getCode($string = '')
	{
		return str_replace(' ', '-',$string);
	}

	function company_getlist($type = '', $value = '')
	{
	  $dataOptn = $this->input->get();
	  $dataOptn['filter_type'] = $type;
	  $dataOptn['filter_value'] = $value;
      $dataTableData = $this->company_model->company_getlist(TABLE_RESULT,$dataOptn);
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

	function account_getlist()
	{
	  $dataOptn = $this->input->get();
      $dataTableData = $this->company_model->account_getlist(TABLE_RESULT,$dataOptn);
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

	public function company_people_insert()
  {
      $companyData = array(
		  'cpl_ppl_id'            => $this->input->post('cpl_ppl_id'),
          'cpl_designation'       => $this->input->post('cpl_designation'),
		  'cpl_cmp_id'            => $this->input->post('cpl_cmp_id'),
		  'cpl_status'            => '1',
          'cpl_crdt_dt'           => date("Y-m-d H:i:s"),
          'cpl_crdt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),

	  		);
			$inserted_id = $this->home_model->insert('cmp_people',$companyData);
			if($inserted_id)
			{
				$cmp_encrypt_id = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('cpl_cmp_id'));
				$ppl_encrypt_id = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('cpl_ppl_id'));
  				$response  = array('success' => True , 'message' => 'Company People Details added successfully','linkn'=>base_url('people-details-'.$ppl_encrypt_id));
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

	public function company_people_update()
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
  				$response  = array('success' => True , 'message' => 'Company People Details updated successfully','linkn' => base_url('company-people-detail-'.$cmp_id));
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

	function company_people_list($cmp_id)
	{
		$cmp_id = $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);

	  $dataOptn = $this->input->get();
      $dataTableData = $this->company_model->company_people_list($cmp_id,TABLE_RESULT,$dataOptn);
      // ******** Encrypt Data from multidimensional array ******//
      $enc_arr['cpl_ppl_id']    = 'cpl_ppl_id_encrypt';
      $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
      $enc_arr['cpl_id']    = 'cpl_id_encrypt';
      $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
      $enc_arr['cpl_cmp_id']    = 'cpl_cmp_id_encrypt';
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

	public function getPeopleDropdown()
	{
		$search      = $this->input->get('q');
		$companyData = array('results'=>$this->company_model->getPeopleDropdown($search));
		echo json_encode($companyData);
	}

	public function getCompanyDropdown()
	{
		$search      = $this->input->get('q');
		$companyData = array('results'=>$this->company_model->getCompanyDropdown($search));
		echo json_encode($companyData);
	}

	public function getIndustryDropdown()
	{
		$search      = $this->input->get('q');
		$industryData = array('results'=>$this->company_model->getDropdown($search,COMPANY_INDUSTRY));
		echo json_encode($industryData);
	}
	public function getCompanyTypeDropdown()
	{
		$search      = $this->input->get('q');
		$industryData = array('results'=>$this->company_model->getDropdown($search,COMPANY_TYPE));
		echo json_encode($industryData);
	}
	public function getCompanyAnnualDropdown()
	{
		$search      = $this->input->get('q');
		$industryData = array('results'=>$this->company_model->getDropdown($search,COMPANY_ANNUAL_REV));
		echo json_encode($industryData);
	}

	public function getStateDropdown()
	{
		$search      = $this->input->get('q');
		$stateData = array('results'=>$this->company_model->getStateDropdown($search));
		echo json_encode($stateData);
	}
	public function getCmpTypeDropdown()
	{
		$search      = $this->input->get('q');
		$industryData = array('results'=>array(
			array('id' => COMPANY_TYPE_COMPANY, 'text' => 'Company'),
			array('id' => COMPANY_TYPE_ACCOUNT, 'text' => 'Account')
		));
		echo json_encode($industryData);
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
		  public function deleteCompLogo()
    {
    	$cmp_id   = $this->input->post('cmp_id');
    	$cmp_logo = $this->input->post('cmp_logo');
    	$compData = array();
    	$compData['cmp_logo'] = '';
    	$compData['cmp_id'] = $cmp_id;
		$check = $this->home_model->update_data('company',$compData,'cmp_id');
    	if($check)
		{
			if($cmp_logo != '')
			{
              UnlinkFile(COMPANY_LOGO.$cmp_logo);
			}
			$success = true;
			$message = 'Logo Deleted successfully';
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
		$teamData = array('results'=>$this->company_model->getEmployeeforDropdown($search));
		echo json_encode($teamData);
	}
    
    public function updateCompanyCustomData()
    {
        $companyData = $this->company_model->updateCompanyCustomData();
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
     public function deletePeopleCompany()
    {
        $cpl_id = $this->input->post('cpl_id');
        $cpl_id = $this->nextasy_url_encrypt->decrypt_openssl($cpl_id);
        $check = $this->home_model->delete_data('cmp_people',$cpl_id,'cpl_id' );

        if($check)
        {
            $success = true;
            $message = 'People Deleted successfully';
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
