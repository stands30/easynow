<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller
{
  function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('tag_model');
        $this->load->model('people_model');

    		$this->mnu_name = 'tags';
        check_logged();
    }


  public function people_tags()
	{
		$data['title'] 		=	'Tags List';
		// ***** Breadcrum Data Starts here *******//
		$data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('List');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
		// ***** Breadcrum Data Ends here *******//

    if (checkaccess($this->mnu_name, 'list')) {
        $data['global_asset_version'] = global_asset_version();
        $data['ci_asset_versn']       = ci_asset_versn();
				$data['dataTableData'] = $this->tag_model->getTagList(TABLE_COUNT) ;
        $data 								 = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('tags/tags', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
	}

  public function tags_insert()
  {
      $tagsData = array(

		  		'tgs_name'              => $this->input->post('tgs_name'),
					'tgs_status'            => $this->input->post('tgs_status'),
          'tgs_crdt_dt'           => date("Y-m-d H:i:s"),
          'tgs_crdt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),
	  		);
			$inserted_id = $this->home_model->insert('tags',$tagsData);
			if($inserted_id)
			{

  				$response  = array('success' => True , 'message' => 'Tags Added successfully');
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

  public function tag_people_list($tgs_encrypt_id,$tgs_encrypt_name)
  {
    $data['title'] 		=	'People Tags';
		// ***** Breadcrum Data Starts here *******//
    $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Tags', base_url('tags'));
		$data['breadcrumb_data'][] = array('People list');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

    //$people_ids   = $this->tag_model->getPeopleIdByTagsId($tgs_id);



    if (checkaccess($this->mnu_name, 'list')) {
        $data['tgs_name']          = $this->nextasy_url_encrypt->decrypt_openssl($tgs_encrypt_name);
        $data['tgs_id']            = $this->nextasy_url_encrypt->decrypt_openssl($tgs_encrypt_id);
        $data['global_asset_version'] = global_asset_version();
				$data['dataTableData'] = $this->tag_model->getTagsDataByType('people',$data['tgs_id'] ,TABLE_COUNT);
        $data 								 = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('tags/people-tags-detail', $data);
    }
    else $this->load->view('errors/easynow_404', $data);


  }

  public function tag_company_list($tgs_encrypt_id,$tgs_encrypt_name)
  {
    $data['title'] 		=	'Company Tags';
		// ***** Breadcrum Data Starts here *******//
    $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
		$data['breadcrumb_data'][] = array('Tags', base_url('tags'));
		$data['breadcrumb_data'][] = array('Company list');
		$data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

    //$people_ids   = $this->tag_model->getPeopleIdByTagsId($tgs_id);
    if (checkaccess($this->mnu_name, 'list')) {
        $data['tgs_name']          = $this->nextasy_url_encrypt->decrypt_openssl($tgs_encrypt_name);
        $data['tgs_id']            = $this->nextasy_url_encrypt->decrypt_openssl($tgs_encrypt_id);
        $data['global_asset_version'] = global_asset_version();
				$data['dataTableData'] = $this->tag_model->getTagsDataByType('company',$data['tgs_id'],TABLE_COUNT);
        $data 								 = array_merge($data, checkaccess($this->mnu_name));
        $this->load->view('tags/company-tags-detail', $data);
    }
    else $this->load->view('errors/easynow_404', $data);
  }
  public function tags_update()
  {

      $tgs_id = $this->input->post('tgs_id');
			//$data['user_id'] = $this->session->userdata('mha_prs_id');
      $tagsData = array(

        'tgs_name'              => $this->input->post('tgs_name'),
        'tgs_status'            => $this->input->post('tgs_status'),
        'tgs_updt_by'           => $this->session->userdata(PEOPLE_SESSION_ID),
	  		);
      $updated = $this->home_model->update('tgs_id',$tgs_id,$tagsData,'tags');
			if($updated)
			{
          // $evt_id = $this->nextasy_url_encrypt->encrypt_openssl($evt_id);
  				$response  = array('success' => True , 'message' => 'Tags Updated successfully');
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

    public function getTagDataTableList()
    {
      $dataOptn = $this->input->get();
        $dataTableData = $this->tag_model->getTagList(TABLE_RESULT,$dataOptn);

      // ******** Encrypt Data from multidimensional array ******//
      $enc_arr['tgs_id']      = 'tgs_encrypt_id';
      $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
      $enc_arr['tgs_name']    = 'tgs_encrypt_name';
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

    public function getTagDetailByType($type = '')
    {
    $dataOptn = $this->input->get();
    $dataTableData = $this->tag_model->getTagsDataByType($type,'',TABLE_RESULT,$dataOptn);
    // ******** Encrypt Data from multidimensional array ******//
    switch ($type)
    {
      case 'people':
                    $enc_arr['ppl_id']    = 'ppl_id_encrypt';
                    $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
                    break;
      case 'company':
                    $enc_arr['cmp_id']    = 'cmp_id_encrypt';
                    $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
                    break;

      default:
                     $dataTableArray['data'] = $dataTableData;
        break;
    }
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
  		$peopleData  = array('results'=>$this->tag_model->getStatusforDropdown('active_status'));
  		echo json_encode($peopleData);
  	}

    public function deleteTags()
    {
      $tgs_id    = $this->input->post('tgs_id');
      $check     = $this->tag_model->deleteTags($tgs_id);
      if($check)
      {
        $response = array('success' => True, 'message'=>'Tags removed successfully');
        echo json_encode($response);
      }
    }
}

?>
