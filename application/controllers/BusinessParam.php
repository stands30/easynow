<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BusinessParam extends CI_Controller
{
  function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('business_param_model');
        $this->sbm_mnu_name = 'business-parameter';
        check_logged();
    }



  public function business_parameter()
	{
		$data['title'] 		=	'Business Parameter';
		// ***** Breadcrumb Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Add');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrumb Data Ends here *******//


    if (checkaccess($this->sbm_mnu_name, 'list'))
    {
        $data['global_asset_version'] = global_asset_version();
        $data['ci_asset_versn']       = ci_asset_versn();
        $data['dataTableData']        = $this->business_param_model->getBsnList(TABLE_COUNT);
        $data                         = array_merge($data, checkaccess($this->sbm_mnu_name));
        $this->load->view('business-parameter', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
    // print_r($data['dataTableData']);
    // exit;


	}

  public function bsn_prm_insert()
  {
      $bsnPrmData = array(

		  		'bpm_name'              => $this->input->post('bpm_name'),
          'bpm_value'             => $this->input->post('bpm_value'),
          'bpm_desc'              => $this->input->post('bpm_desc'),
					'bpm_status'            => $this->input->post('bpm_status'),
          'bpm_crtd_dt'           => date("Y-m-d H:i:s"),
          'bpm_crtd_by'           => $this->session->userdata(PEOPLE_SESSION_ID),
	  		);
			$inserted_id = $this->home_model->insert('bsn_prm',$bsnPrmData);
			if($inserted_id)
			{

  				$response  = array('success' => True , 'message' => 'Business Parameter Added successfully');
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

  public function bsn_prm_update()
  {

      $bpm_id = $this->input->post('bpm_id');
			//$data['user_id'] = $this->session->userdata('mha_prs_id');
      $bsnPrmData = array(

        'bpm_name'              => $this->input->post('bpm_name'),
        'bpm_value'             => $this->input->post('bpm_value'),
        'bpm_desc'              => $this->input->post('bpm_desc'),
        'bpm_status'            => $this->input->post('bpm_status'),
        'bpm_updt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),
	  		);
      $updated = $this->home_model->update('bpm_id',$bpm_id,$bsnPrmData,'bsn_prm');
			if($updated)
			{
          // $evt_id = $this->nextasy_url_encrypt->encrypt_openssl($evt_id);
  				$response  = array('success' => True , 'message' => 'Business Parameter Updated successfully');
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

  public function getBsnDataTableList()
    {


    $dataOptn = $this->input->get();
    $dataTableArray['data'] = $this->business_param_model->getBsnList(TABLE_RESULT,$dataOptn);
    // ******** Encrypt Data from multidimensional array ******//

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

    public function getStatusDropdown()
  	{
  		$search      = $this->input->get('q');
  		$peopleData  = array('results'=>$this->business_param_model->getStatusforDropdown('active_status'));
  		echo json_encode($peopleData);
  	}

    public function deleteBsnParam()
    {
      $bpm_id    = $this->input->post('bpm_id');
      $check     = $this->business_param_model->deleteBsnParam($bpm_id);
      if($check)
      {
        $response = array('success' => True, 'message'=>'Business Parameter removed successfully');
        echo json_encode($response);
      }
    }
}

?>
