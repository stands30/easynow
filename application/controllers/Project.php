<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		check_logged();
		$this->load->model('project_model');
        $this->mnu_name = 'project-list';
    }
	public function project_list()
	{
		$data['title'] 		         =	'Project List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//
	    if (checkaccess($this->mnu_name, 'list'))
	    {
	        $data['ci_asset_version']          	  = ci_asset_versn();
	        $data['global_asset_version']      	  = global_asset_version();
	        $data['dataTableData'] = $this->project_model->project_getlist(TABLE_COUNT);
	        $data = array_merge($data, checkaccess($this->mnu_name));
	        $this->load->view('project/project-list', $data);
	    }
	    else $this->load->view('errors/easynow_404', $data);
	}
	public function project_getlist()
	 {
	  $dataOptn = $this->input->get();
      $dataTableData = $this->project_model->project_getlist(TABLE_RESULT,$dataOptn);
      // ******** Encrypt Data from multidimensional array ******//
      $enc_arr['prj_id']    = 'prj_id_encrypt';
      $enc_arr['prj_cmp_id']    = 'prj_cmp_id_encrypt';
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
	public function project_add($slug='')
	{

		if ($slug=='') 
		{
		    $data['title']     	= 'Project Add';
		    $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
			$data['breadcrumb_data'][] = array('List', base_url('project-list'));
			$data['breadcrumb_data'][] = array('Add');
			$data['prj_data'] = new stdClass();
		  	$prs_id = $this->session->userdata(PEOPLE_SESSION_ID);
		  	$prs_name = $this->session->userdata(PEOPLE_SESSION_NAME);
		  	if($prs_id != '')
		  	{
		  	  $data['prj_data']->prj_manage_by        = $prs_id;
		  	  $data['prj_data']->prj_manage_by_value  = $prs_name;
		  	}
	    }
	    else{
			$data['title'] 		=	'Project Edit';
		    $encrypt            =  $this->nextasy_url_encrypt->decrypt_openssl($slug);
		    $encrypt_id 		= $this->nextasy_url_encrypt->encrypt_openssl($encrypt);
			$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
			$data['breadcrumb_data'][] = array('List',base_url('project-list'));
		    $data['breadcrumb_data'][] = array('Details',base_url('project-details-'.$encrypt_id));
			$data['breadcrumb_data'][] = array('Edit');
			$slug             		   =  $this->nextasy_url_encrypt->decrypt_openssl($slug);
			$data['prj_data']      	   = $this->project_model->getProjectById($slug);
	    }
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//

	    if (checkaccess($this->mnu_name, 'add')) {
	      $data['ci_asset_version']          = ci_asset_versn();
	      $data['global_asset_version']    = global_asset_version();
	      
	      $data = array_merge($data, checkaccess($this->mnu_name));
	      $this->load->view('project/project-add', $data);
	    }
	    else
	       $this->load->view('errors/easynow_404', $data);
	}
	public function project_details($prj_encrypted_id)
	{
		$data['title'] 		    =	'Project Detail';
		$prj_id               =  $this->nextasy_url_encrypt->decrypt_openssl($prj_encrypted_id);
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List', base_url('project-list'));
		$data['breadcrumb_data'][] = array('Details');
		
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
	    if (checkaccess($this->mnu_name, 'detail'))
	    {
    		$data['ci_asset_version']        = ci_asset_versn();
    		$data['prj_data']		   		= $this->project_model->getProjectById($prj_id);
    		$data['prj_data']->prj_encrypted_id = $prj_encrypted_id;
    		$data['global_asset_version']    = global_asset_version();
    		$data = array_merge($data, checkaccess($this->mnu_name));
    		$this->load->view('project/project-details', $data);
	    }
	    else $this->load->view('errors/easynow_404', $data);
	}

	public function getPeopleDropdown()
    {
        $search   = $this->input->get('q');
        $managed_by   = $this->input->get('managed_by'); 
        $status = array('results'=>$this->project_model->getPeopleDropdown($search,
        	$managed_by));
        echo json_encode($status);
    }
    public function getCompanyDropdown()
    {
        $search   = $this->input->get('q');
        $status = array('results'=>$this->project_model->getCompanyDropdown($search));
        echo json_encode($status);
    }
    public function getDropdown($group)
    {
        $search   = $this->input->get('q');
        $status = array('results'=>$this->project_model->getDropdown($group,$search));
        echo json_encode($status);
    }

    public function project_save()
    {
      $result = $this->project_model->project_save();
       if ($result) {
          $prj_id          = $this->nextasy_url_encrypt->encrypt_openssl($result);
            $response = array(
                'success' => True,
                'message' => 'Success',
                'linkn' => base_url('project-details-'.$prj_id)
            );
            echo json_encode($response);
        }
    }
    public function updateProjectCustomData()
    {
        $projectData = $this->project_model->updateProjectCustomData();
        if($projectData)
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
	
}

?>