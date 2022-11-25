<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GenParameter extends CI_Controller

{

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('gen_prm_model');
        $this->sbm_mnu_name = 'general-parameter-list';
        check_logged();
    }

	public function general_parameter_add($gpn_id = '')
	{
		//$gpn_data 	= $this->gen_prm_model->getGpnDatabyGnpID($gnp_id);
		$gpn_data 	= $this->gen_prm_model->getGpnDatabyGpnID($gpn_id);
		// echo $gnp_group_name;
		// $gnp_group        =   $this->nextasy_url_encrypt->decrypt_openssl($gnp_group_name);
		$data['title'] 		           =	'General Parameter Add';

		//gpn_id, gpn_title, gpn_group

		$data['gnp_group']	         =  $gpn_data->gpn_group;
		$data['gpn_id']	             =  $gpn_data->gpn_id;	
		$data['gpn_title']	         =  $gpn_data->gpn_title;
		$data['gnp_value']			 =  $this->gen_prm_model->getGenPrmIncrnValue($data['gnp_group']);
		// print_r($data['gnp_value']);
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][]   = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][]   = array('List', base_url('general-parameter-list'));
		$data['breadcrumb_data'][]   = array('Add');

		$data['breadcrumb']          = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//

		if (checkaccess($this->sbm_mnu_name, 'add')) {
				$data['global_asset_version'] = global_asset_version();
				$data['ci_asset_versn']      = ci_asset_versn();
        $data = array_merge($data, checkaccess($this->sbm_mnu_name));
        $this->load->view('general-parameter/general-parameter-add', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	public function general_parameter_edit($gnp_id = '')
	{
		//$gnp_id 	= $this->nextasy_url_encrypt->decrypt_openssl($gnp_id);

		$data['title'] 		         =	'General Parameter Edit';
		// $data['gnp_group_name']				 =  $gnp_group_name;
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('general-parameter-list'));
		$data['breadcrumb_data'][] = array('Edit');

		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//

		if (checkaccess($this->sbm_mnu_name, 'edit')) {
			  $gpn_data 	               = $this->gen_prm_model->getGpnDatabyGnpID($gnp_id);
				$data['global_asset_version'] = global_asset_version();
				$data['ci_asset_versn']    = ci_asset_versn();
				$data['gpn_id']				     = $gpn_data->gpn_id;
				$data['gpn_title']		     = $gpn_data->gpn_title;
				$data['genPrmDetail']      = $this->gen_prm_model->getGenPrmById($gnp_id);
        $data = array_merge($data, checkaccess($this->sbm_mnu_name));
        $this->load->view('general-parameter/general-parameter-edit', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

	public function gen_prm_insert()
  	{
      	$genPrmData = array(
			'gnp_name'              => $this->input->post('gnp_name'),
			'gnp_value'             => $this->input->post('gnp_value'),
			'gnp_group'             => $this->input->post('gnp_group'),
			'gnp_order'             => $this->input->post('gnp_order'),
			'gnp_status'            => $this->input->post('gnp_status'),
			'gnp_description'       => $this->input->post('gnp_description'),
			'gnp_crdt_dt'           => date("Y-m-d H:i:s"),
			'gnp_crdt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),
  		);
		$inserted_id = $this->home_model->insert('gen_prm',$genPrmData);
		if($inserted_id)
		{
			$gpn_encrypt_id     = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('gpn_id'));
			$gpn_encrypt_title  = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('gpn_title'));
			$gpn_encrypt_group  = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('gnp_group'));
			$response  = array('success' => True , 'message' => 'General Parameter added successfully','linkn' => base_url('general-parameter-list-'.$gpn_encrypt_id.'-'.$gpn_encrypt_title.'-'.$gpn_encrypt_group));
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

	public function gen_prm_update()
  {

      $gnp_id     = $this->input->post('gnp_id');
			$gpn_id     = $this->input->post('gpn_id');
			$gpn_title  = $this->input->post('gpn_title');
      $genPrmData = array(

				'gnp_name'              => $this->input->post('gnp_name'),
				'gnp_group'             => $this->input->post('gnp_group'),
				'gnp_order'             => $this->input->post('gnp_order'),
				'gnp_status'            => $this->input->post('gnp_status'),
				'gnp_description'       => $this->input->post('gnp_description'),
				'gnp_updt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),
	  		);
      $updated = $this->home_model->update('gnp_id',$gnp_id,$genPrmData,'gen_prm');
			if($updated)
			{
					$gpn_encrypt_id     = $this->nextasy_url_encrypt->encrypt_openssl($gpn_id);
					$gpn_encrypt_title  = $this->nextasy_url_encrypt->encrypt_openssl($gpn_title);
					$gpn_encrypt_group  = $this->nextasy_url_encrypt->encrypt_openssl($this->input->post('gnp_group'));
  				$response  = array('success' => True , 'message' => 'General Parameter updated successfully','linkn' => base_url('general-parameter-list-'.$gpn_encrypt_id.'-'.$gpn_encrypt_title.'-'.$gpn_encrypt_group));
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

	public function general_parameter_list($gnp_id = '',$gnp_title = '',$gnp_group = '')
		{
			$data['title'] 		=	'General Parameter List';
			// ***** Breadcrum Data Starts here *******//
			$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
			$data['breadcrumb_data'][] = array('list');

			$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
			// ***** Breadcrum Data Ends here *******//

			if (checkaccess($this->sbm_mnu_name, 'list'))
	    {
					$data['global_asset_version'] = global_asset_version();
					$data['ci_asset_versn']    						= ci_asset_versn();
					$data['gnp_id']						 = $this->nextasy_url_encrypt->decrypt_openssl($gnp_id);
					$data['gnp_title']				 = $this->nextasy_url_encrypt->decrypt_openssl($gnp_title);
					$data['gnp_group']				 = $this->nextasy_url_encrypt->decrypt_openssl($gnp_group);
					$data['dataTableData']		 = $this->gen_prm_model->getGnpList(TABLE_COUNT);
				  $data = array_merge($data, checkaccess($this->sbm_mnu_name));
					$this->load->view('general-parameter/general-parameter-list', $data);
	    }
	    else $this->load->view('errors/easynow_404', $data);
		}

		public function getGenGroupDropdown()
		{
			$search      = $this->input->get('q');
			$groupData = array('results'=>$this->gen_prm_model->getGenGroupDropdown($search));
			echo json_encode($groupData);
		}

		public function getGenDataTableList($gnp_id)
		{
		    $dataOptn = $this->input->get();
		    $dataOptn['gnp_id'] = $gnp_id;
		    //$dataTableData = $this->task_model->task_getlist(TABLE_RESULT,$dataOptn);
	      	$genParamList = $this->gen_prm_model->getGnpList(TABLE_RESULT,$dataOptn);

	      	// ******** Encrypt Data from multidimensional array ******//
			
	      	if(!empty($genParamList))
	      	{
		      	for($i = 0; $i < count($genParamList); $i++)
					$genParamList[$i]->gnp_id_encrypt = $this->nextasy_url_encrypt->encrypt_openssl($genParamList[$i]->gnp_id);
	      	}
	      	// ******** Encrypt Data from multidimensional array ******//
	  		$genParamListData['data'] = $genParamList;
	  		echo json_encode($genParamListData);
      	}

			public function deleteGenParam()
		  {
		    $gnp_id    = $this->input->post('gnp_id');

		    $check     = $this->gen_prm_model->deleteGenParam($gnp_id);
		    if($check)
		    {
		      $response = array('success' => True, 'message'=>'General Parameter removed successfully' ,'linkn' => base_url('general-parameter-list'));
		      echo json_encode($response);
		    }
		  }



		 public function blankPage($gnp_id = '',$gnp_title = '',$gnp_group = '')
		{
			$data['title'] 		=	'Blank Page List';
			// ***** Breadcrum Data Starts here *******//
			$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
			$data['breadcrumb_data'][] = array('list');
			$data['global_asset_version']      = global_asset_version();
			$data['ci_asset_versn']    = ci_asset_versn();
			$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
			// ***** Breadcrum Data Ends here *******//
			$data['gnp_id']						 = $this->nextasy_url_encrypt->decrypt_openssl($gnp_id);
			$data['gnp_title']				 = $this->nextasy_url_encrypt->decrypt_openssl($gnp_title);
			$data['gnp_group']				 = $this->nextasy_url_encrypt->decrypt_openssl($gnp_group);
			$this->load->view('blankpage/blank_page', $data);
		}

		public function blankparameter($gnp_group = '',$gnp_id = '',$gpn_title = '')
		{
			$data['title'] 		           =	'General Parameter Add';
			$data['gnp_group']	         =  urldecode($gnp_group);
			$data['gpn_id']	             =  urldecode($gnp_id);
			$data['gpn_title']	         =  urldecode($gpn_title);
			$data['gnp_value']				   =  $this->gen_prm_model->getGenPrmIncrnValue($gnp_group);
			// ***** Breadcrum Data Starts here *******//
			$data['breadcrumb_data'][]   = array('Home', base_url('dashboard'));
			$data['breadcrumb_data'][]   = array('list', base_url('general-parameter-list'));
			$data['breadcrumb_data'][]   = array('Add');
			$data['global_asset_version']        = global_asset_version();
			$data['ci_asset_versn']      = ci_asset_versn();
			$data['breadcrumb']          = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
			// ***** Breadcrum Data Ends here *******//
			$this->load->view('blankpage/blank-page-add', $data);
		}

		function updateDefaultvalue()
		{
			$data = $this->input->post();
			echo $this->gen_prm_model->updateDefaultvalue($data['group_name'], $data['value']);
		}
  }
  ?>
