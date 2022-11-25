<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_logged();
        $this->load->model('people_model');
        $this->load->library('excel');
        $this->mnu_name = 'people-dashboard';         
    }

    function dashboard()
    {
        echo json_encode($this->people_model->dashboard_detail());
    }
    public function people_dashboard()

    {
        $data['title']      =   'People Dashboard';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);

        $data['dashboard_detail']  = $this->people_model->dashboard_detail();
        $data['company_dashboard_detail']  = $this->people_model->company_dashboard_detail();
        // ***** Breadcrumb Data Ends here *******//
        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
        $this->load->view('people/people_dashboard', $data);
    }

    public function easynow_404_page()

    {        
        $data['title']      =   'Page Not Found';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('Page Not Found');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
        $this->load->view('errors/easynow-404-page', $data);
    }

    public function list_people($peopleFilter = '')
    {
        $data['title']      =   'People List';
        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        
        // ***** Breadcrumb Data Ends here *******//
        
        if (checkaccess($this->mnu_name, 'list'))
        {
            $data['global_asset_version'] = global_asset_version();
            $data['ci_asset_versn'] = ci_asset_versn();
            $data['peopleFilter'] = $peopleFilter;
            $data['dataTableData'] = $this->people_model->getPeopleList(TABLE_COUNT);
            $data = array_merge($data, checkaccess($this->mnu_name));  
            $this->load->view('people/people_list', $data);
        }
        else $this->load->view('errors/easynow_404', $data);
    }

    public function add_people()
    {
        $data['title']      =   'People Add';
        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Add');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        //****** People Categories ******//

        //****** People Categories ******//
        // $data['global_asset_version'] = global_asset_version();

        if (checkaccess($this->mnu_name, 'add')) {
            $data['peopleType']                 = $this->home_model->getGenPrmResultByGroup('people_type','result_array');
            $data['peopleAdditionalDetails']    = $this->people_model->getPeopleAdditionalDetails();
            $data['global_asset_version']       = global_asset_version();
            $data['ci_asset_versn']             = ci_asset_versn();
            $this->load->view('people/people_add', $data);
        }
        else 
            $this->load->view('errors/easynow_404', $data);
    }

    public function peopleEdit($ppl_encrypted_id)
    {
        $data['title']      =   'People Edit Details';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Detail',base_url('people-details-'.$ppl_encrypted_id));
        $data['breadcrumb_data'][] = array('Edit');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//

        if (checkaccess($this->mnu_name, 'edit')) {
            $ppl_id = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
            $data['people'] = $this->people_model->getPeopledataById($ppl_id);
            // $data['global_asset_version'] = global_asset_version();
            $data['global_asset_version'] = global_asset_version();
            $this->load->view('people/people_edit', $data);
        }
        else $this->load->view('errors/easynow_404', $data);
    }

    public function details_people($id)
    {
        $data['title']      =   'People Details';
        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Details');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//

        if (checkaccess($this->mnu_name, 'detail'))
        {
            $ppl_id = $this->nextasy_url_encrypt->decrypt_openssl($id);
            $data['people'] = $this->people_model->getPeopledataById($ppl_id);
            $data['people_contact']  = $this->people_model->getPeopleContactDataById($ppl_id);
            $data['people_details']  = $this->people_model->getPeopleAdditionalDetailsById($ppl_id);
            $data['additional_detail_visible']  = $this->home_model->getGenPrmResultByValue('people_type', PEOPLE_ADDITIONAL_DETAILS,'result')[0]->gnp_visible;

            $data['title'] = $data['people']->ppl_name;

            // $data['global_asset_version'] = global_asset_version();
            $data['edit_access'] = checkaccess($this->mnu_name, 'edit');
            $data['delete_access'] = checkaccess($this->mnu_name, 'delete');
            $data['global_asset_version'] = global_asset_version();
          // print_r($data);
          // exit;
            $this->load->view('people/people_detail', $data);
        }
        else $this->load->view('errors/easynow_404', $data);
    }

    public function details_company($ppl_encrypted_id,$ppl_encrypted_name)
    {
        $data['title']      =   'Company List';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Company Details');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        $data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
        $data['ppl_encrypted_id']   = $ppl_encrypted_id;
        $data['ppl_encrypted_name'] = $ppl_encrypted_name;
        // $data['global_asset_version'] = global_asset_version();
        if (checkaccess($this->mnu_name, 'list'))
        {
            $data['global_asset_version'] = global_asset_version();
            $data['dataTableData'] = $this->people_model->people_company_getlist($data['ppl_id'],'company',TABLE_COUNT);
            $data = array_merge($data, checkaccess($this->mnu_name));  
            $this->load->view('people/people_company_detail', $data);
        }
        else $this->load->view('errors/easynow_404', $data);
    }

    public function details_client($ppl_encrypted_id)
    {
        $data['title']      =   'People Client Details';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Client Details');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        $data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
        $data['dataTableData'] = $this->people_model->people_company_getlist($data['ppl_id'],'client',TABLE_COUNT);
        $this->load->view('people/people_client_detail', $data);
    }

    public function details_candidate($ppl_encrypted_id,$ppl_encrypted_name)
    {
        $data['title']      =   'People Candidate Details';
        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Candidate Details');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        $data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
        $data['ppl_encrypted_id']   = $ppl_encrypted_id;
        $data['ppl_encrypted_name'] = $ppl_encrypted_name;
        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
        $data['dataTableData'] = $this->people_model->getPeopleCandidateList($data['ppl_id'],TABLE_COUNT);
        $this->load->view('people/people_candidate_detail', $data);
    }

    public function details_event($ppl_encrypted_id,$ppl_encrypted_name)
    {
        $data['title']      =   'Event List';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Event Details');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
         $data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
         $data['ppl_encrypted_id']   = $ppl_encrypted_id;
         $data['ppl_encrypted_name'] = $ppl_encrypted_name;
        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
        $data['dataTableData'] = $this->people_model->people_event_getlist($data['ppl_id'],TABLE_COUNT);
        $this->load->view('people/people_event_detail', $data);
    }

    public function details_lead($ppl_encrypted_id,$ppl_encrypted_name)
    {
        $data['title']      =   'Lead List';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Lead Details');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        $data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
        $data['ppl_encrypted_id']    = $ppl_encrypted_id;
        $data['ppl_encrypted_name']  = $ppl_encrypted_name;
        $data['global_asset_version']       = global_asset_version();
        $data['dataTableData'] = $this->people_model->getPeopleLeadList($data['ppl_id'],TABLE_COUNT);
        $this->load->view('people/people_lead_detail', $data);
    }

    public function details_vendor($ppl_encrypted_id )
    {
        $data['title']      =   'People Vendor Details';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Vendor Details');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        $data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
        $data['dataTableData'] = $this->people_model->people_company_getlist($data['ppl_id'],'vendor',TABLE_COUNT);
        $this->load->view('people/people_vendor_detail', $data);
    }

    public function details_team($ppl_encrypted_id,$ppl_encrypted_name)
    {
        $data['title']      =   'People Team Details';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Team Details');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        $data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
        $data['ppl_encrypted_id'] = $ppl_encrypted_id;
        $data['ppl_encrypted_name'] = $ppl_encrypted_name;
        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
        $data['dataTableData'] = $this->people_model->peopleTeamDataTablelist($data['ppl_id'],TABLE_COUNT);
        $this->load->view('people/people_team_detail', $data);
    }

    public function details_activity($ppl_encrypted_id,$ppl_encrypted_name)
    {
        $data['title']      =   'People Team Details';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Team Details');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        $data['ppl_id'] = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
        $data['ppl_encrypted_id'] = $ppl_encrypted_id;
        $data['ppl_encrypted_name'] = $ppl_encrypted_name;
        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
        // $data['dataTableData'] = $this->people_model->peopleTeamDataTablelist($data['ppl_id'],TABLE_COUNT);
        $this->load->view('people/people_activity_detail', $data);
    }
    // ***** Tags Start Here *******//
    public function getTagsforDropdown()
    {
        $search   = $this->input->get('q');
        $tagsData = array('results'=>$this->people_model->getTagsforDropdown($search));
        echo json_encode($tagsData);
    }
    // ***** Tags End Here ********//
    // ***** Company Start Here *******//
    public function getCompanyforDropdown($search = '')
    {
        //$search      = $this->input->get('term');
        // $CompanyData = array('results'=>$this->people_model->getCompanyforDropdown($search));
        $CompanyData = $this->people_model->getCompanyforDropdown(urldecode($search));
        echo json_encode($CompanyData);
    }
    public function getCompanyDetailsById()
    {
        $cmpId    = $this->input->post('cmp_id');
        $cmpData  = $this->people_model->getCompanyDetailsById($cmpId);
        echo json_encode($cmpData);
    }
    // ***** Company End Here ********//
    // ***** Lead Start Here *******//
    public function getGenPrmforDropdown($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $LeadData = array('results'=>$this->people_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($LeadData);
    }
    public function getProductForDropdown()
    {
        $search   = $this->input->get('q');
        $productData = array('results'=>$this->people_model->getProductForDropdown($search));
        echo json_encode($productData);
    }
    // ***** Lead End Here ********//
   // ***** People Start Here *******//
    public function getPeopleforDropdown($manage='')
    {
        $search     = $this->input->get('q');
        $peopleData = array('results'=>$this->people_model->getPeopleforDropdown($search,$manage));
        echo json_encode($peopleData);
    }
    // ***** People End Here ********//
      // ***** Event Start Here *******//
    public function getEventforDropdown()
    {
        $search    = $this->input->get('q');
        $eventData = array('results'=>$this->people_model->getEventForDropdown($search));
        echo json_encode($eventData);
    }
    // ***** Event End Here ********//
     // ***** Department Start Here *******//
    public function getDepartmentforDropdown()
    {
        $search    = $this->input->get('q');
        $deptData  = array('results'=>$this->people_model->getDepartmentforDropdown($search));
        echo json_encode($deptData);
    }
    // ***** Department End Here ********//
    // ***** People Insert Starts Here ********//
    public function insertPeople()
    {
          log_message('nexlog','people::insertPeople >>');
        //*************** Start Validation *******************//
        $ppl_email       = $this->input->post('ppl_email');
        $ppl_mobile      = $this->input->post('ppl_mobile');
        $flag            = false;
        $mob_msg         = '';
        $message         = '';
        $email_msg       = '';

        if($ppl_email != '')
        {
             $validate_email  = $this->people_model->checkPeopleContact(CONTACT_EMAIL,$ppl_email);
              if($validate_email->count > 0)
              {
               $flag = true;
               $email_msg= $ppl_email.' is already taken';
              }
        }
        if($ppl_mobile != '')
        {
             $validate_mob    = $this->people_model->checkPeopleContact(CONTACT_MOBILE,$ppl_mobile);
              if($validate_mob->count > 0)
              {
               $flag = true;
               $mob_msg= $ppl_mobile.' is already taken';
              }
        }
         if($flag == true)
         {
            if($email_msg != '' && $mob_msg != '')
            {
                $message = $ppl_email.' and '.$ppl_mobile.' are already taken';
            }
            echo json_encode(array('success'=>false,'message'=>$message,'email_msg'=>$email_msg,'mob_msg'=>$mob_msg));
            exit();
         }
     //*************** End Validation *******************//
        $pplId = $this->people_model->peopleInsert();
        if($pplId)
        {
            $ppl_encrypted_id      = $this->nextasy_url_encrypt->encrypt_openssl($pplId);
            $success = true;
            $message = 'People Added successfully';
            $linkn   =  base_url('people-details-'.$ppl_encrypted_id);
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
            log_message('nexlog','people::insertPeople <<');
        echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    // ***** People Insert End Here ********//
    public function peopleDataTablelist()
    {
        log_message('nexlog','people::peopleDataTablelist >> ');
        $dataOptn = $this->input->get();
        log_message('nexlog','dataOptn >> '.json_encode($dataOptn));
        $dataTableData = $this->people_model->getPeopleList(TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['ppl_id']          = 'ppl_encrypted_id';
        $enc_arr['ppl_managed_by']  = 'ppl_managed_encrypted_id';
        $dataTableArray['data']     = encrypt_key_in_array($dataTableData,$enc_arr);
        // ******** Encrypt Data from multidimensional array ******//
        if(isset($dataOptn['columns']))
        {
            // *********** Get Data Count **********//
            $dataTableArray['draw']             = $dataOptn['draw'];
            $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
            $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//
        }
        log_message('nexlog','people::peopleDataTablelist << ');
        echo json_encode($dataTableArray);
    }
    // ******** People Sub Module List Starts Here ******//
    public function peopleCompanyDataTablelist($ppl_id)
    {
        $dataOptn = $this->input->get();
        $dataTableList = $this->people_model->people_company_getlist($ppl_id,'company',TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        if(!empty($dataTableList))
        {
            // ******** Encrypt Data from multidimensional array ******//
            $enc_arr['cmp_ppl_id']          = 'ppl_id_encrypt';
            $enc_arr['cmp_id']              = 'cmp_id_encrypt';
            $dataTableListArray['data']     = encrypt_key_in_array($dataTableList,$enc_arr);
            // ******** Encrypt Data from multidimensional array ******//
        }
        if(isset($dataOptn['columns']))
        {
            // *********** Get Data Count **********//
              $dataTableArray['draw']             = $dataOptn['draw'];
              $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
              $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//
        }
        // ******** Encrypt Data from multidimensional array ******//
        $dataTableListArray['data'] = $dataTableList;
        echo json_encode($dataTableListArray);
    }
    public function peopleLeadDataTablelist($ppl_id)
    {
        $dataOptn = $this->input->get();
        $dataTableList = $this->people_model->getPeopleLeadList($ppl_id,TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
            $enc_arr['led_encrypt_id']      = 'led_encrypt_id';
            $dataTableListArray['data']     = encrypt_key_in_array($dataTableList,$enc_arr);
            // ******** Encrypt Data from multidimensional array ******//
        if(isset($dataOptn['columns']))
        {
           // *********** Get Data Count **********//
              $dataTableArray['draw']             = $dataOptn['draw'];
              $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
              $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
          // *********** Get Data Count **********//
        }
        $dataTableListArray['data'] = $dataTableList;
        echo json_encode($dataTableListArray);
    }
    public function peopleEventDataTablelist($ppl_id)
    {
      $dataOptn = $this->input->get();
      $dataTableData = $this->people_model->people_event_getlist($ppl_id,TABLE_RESULT,$dataOptn);
      // ******** Encrypt Data from multidimensional array ******//
      $enc_arr['epl_evt_id']    = 'evt_encrypted_id';
      $dataTableArray['data']   = encrypt_key_in_array($dataTableData,$enc_arr);
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
    public function peopleCandidateDataTablelist($ppl_id)
    {
          $dataOptn = $this->input->get();
          $dataTableData = $this->people_model->getPeopleCandidateList($ppl_id,TABLE_RESULT,$dataOptn);
          // ******** Encrypt Data from multidimensional array ******//
          $enc_arr['cdt_id']    = 'cdt_encrypt_id';
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
    public function peopleClientDataTablelist($ppl_id)
    {
        $dataOptn = $this->input->get();
        $peopleCompList = $this->people_model->people_company_getlist($ppl_id,'client',TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        if(!empty($peopleCompList))
        {
            // ******** Encrypt Data from multidimensional array ******//
            $enc_arr['cpl_cmp_id']      = 'cmp_id_encrypt';
            $peopleList['data']     = encrypt_key_in_array($peopleCompList,$enc_arr);
            // ******** Encrypt Data from multidimensional array ******//
        }
        if(isset($dataOptn['columns']))
        {
           // *********** Get Data Count **********//
              $dataTableArray['draw']             = $dataOptn['draw'];
              $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
              $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
          // *********** Get Data Count **********//
        }
        // ******** Encrypt Data from multidimensional array ******//
        $peopleCompListData['data'] = $peopleCompList;
        echo json_encode($peopleCompListData);
    }
    public function peopleVendorDataTablelist($ppl_id)
    {
          $dataOptn = $this->input->get();
          $dataTableData = $this->people_model->people_company_getlist($ppl_id,'vendor',TABLE_RESULT,$dataOptn);
          // ******** Encrypt Data from multidimensional array ******//
          $enc_arr['cpl_cmp_id']    = 'cmp_id_encrypt';
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
    public function peopleTeamDataTablelist($ppl_id)
    {
      $dataOptn = $this->input->get();
      $dataTableData = $this->people_model->peopleTeamDataTablelist($ppl_id,TABLE_RESULT,$dataOptn);
      // ******** Encrypt Data from multidimensional array ******//
      $enc_arr['emp_id']      = 'emp_encrypt_id';
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
    // ******** People Sub Module List Ends Here ******//
        function people_event_list()
    {
        $data['title'] = 'People Event List';

        // ***** Breadcrumb Data Starts here *******//

        $data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People',base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('People Event List');
        $data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
        $data['dataTableData'] = $this->people_model->people_event_getlist('',TABLE_COUNT,'');    
        $this->load->view('people/people-event-list', $data);
    }

    function people_event_getlist()
    {
        
          $dataOptn = $this->input->get();
          $dataTableData = $this->people_model->people_event_getlist('',TABLE_RESULT,$dataOptn);
          // ******** Encrypt Data from multidimensional array ******//
          $enc_arr['evt_id']    = 'evt_id_encrypt';
          $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
          $enc_arr['ppl_id']    = 'ppl_id_encrypt';
          $dataTableArray['data'] = encrypt_key_in_array($dataTableData,$enc_arr);
          // ******** Encrypt Data from multidimensional array ******//
          if(isset($dataOptn['columns']))
            {
          // *********** Get Data Count **********//
          $queryData['column']    = 'epl_id';
          $queryData['table']     = 'event_people';
          $queryData['where']     = " where epl_status = '".ACTIVE_STATUS."' ";
          $queryDataCount           = $this->home_model->getDataCountByField($queryData);
            $dataTableArray['recordsTotal']     = $queryDataCount;
            $dataTableArray['recordsFiltered']  = $queryDataCount;
          // *********** Get Data Count **********//
          }
          echo json_encode($dataTableArray);
    }

    public

    function people_company_list()
    {
        $data['title'] = 'People Company List';
        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home',base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People',base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('People Company List');
        $data['breadcrumb'] = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        // $data['global_asset_version'] = global_asset_version();
        if (checkaccess($this->mnu_name, 'list'))
        {
            $data['global_asset_version'] = global_asset_version();
            $data['dataTableData'] = $this->people_model->people_company_getlist('','',TABLE_COUNT);
            $data = array_merge($data, checkaccess($this->mnu_name));  
            $this->load->view('people/people-company-list', $data);
        }
        else $this->load->view('errors/easynow_404', $data);
    }

    function people_company_getlist()
    {
        $dataOptn = $this->input->get();
        $peopleCompList['data'] = $this->people_model->people_company_getlist('','',TABLE_RESULT,$dataOptn);
        // ******** Encrypt Data from multidimensional array ******//
        $enc_arr['cmp_id']          = 'cmp_id_encrypt';
        $peopleCompList['data']             = encrypt_key_in_array($peopleCompList['data'],$enc_arr);
        $enc_arr['cmp_ppl_id']      = 'cpl_ppl_id_encrypt';
        $peopleCompList['data']             = encrypt_key_in_array($peopleCompList['data'],$enc_arr);
        // ******** Encrypt Data from multidimensional array ******//
        if(isset($dataOptn['columns']))
        {
            // *********** Get Data Count **********//
            $dataTableArray['draw']             = $dataOptn['draw'];
            $dataTableArray['recordsTotal']     = $dataOptn['table_data_count'];
            $dataTableArray['recordsFiltered']  = $dataOptn['table_data_count'];
            // *********** Get Data Count **********//

        }

        echo json_encode($peopleCompList);
    }
    public function updatePeople()
    {
        $ppl_id = $this->input->post('ppl_id');
        //*************** Start Validation *******************//
        $ppl_email          = $this->input->post('ppl_email');
        $ppl_mobile         = $this->input->post('ppl_mobile');
        $ppl_email_id       = $this->input->post('ppl_email_id');
        $ppl_mob_id         = $this->input->post('ppl_mob_id');
        $flag               = false;
        $mob_msg            = '';
        $message            = '';
        $email_msg          = '';
         if($ppl_email != '')
        {
             $validate_email     = $this->people_model->checkPeopleContact(CONTACT_EMAIL,$ppl_email,$ppl_email_id);
              if($validate_email->count > 0)
              {
               $flag = true;
               $email_msg= $ppl_email.' is already taken';
              }
        }
        if($ppl_mobile != '')
        {
             $validate_mob       = $this->people_model->checkPeopleContact(CONTACT_MOBILE,$ppl_mobile,$ppl_mob_id);
              if($validate_mob->count > 0)
              {
               $flag = true;
               $mob_msg= $ppl_mobile.' is already taken';
              }
        }
         if($flag == true)
         {
            if($email_msg != '' && $mob_msg != '')
            {
                $message = $ppl_email.' and '.$ppl_mobile.' are already taken';
            }
            echo json_encode(array('success'=>false,'message'=>$message,'email_msg'=>$email_msg,'mob_msg'=>$mob_msg));
            exit();
         }
     //*************** End Validation *******************//
        $pplData = $this->people_model->peopleUpdate($ppl_id);
        if($pplData)
        {
            $ppl_encrypted_id      = $this->nextasy_url_encrypt->encrypt_openssl($ppl_id);
            $success = true;
            $message = 'People Updated successfully';
            $linkn   =  base_url('people-details-'.$ppl_encrypted_id);
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
    public function sendMail()
    {
        $ppl_id = $this->input->post('ppl_id');
        $sendMail = $this->people_model->sendMailtoPeople($ppl_id);
        if($sendMail)
        {
            $success = true;
            $message = 'Mail Sent successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message));
    }
    public function peopleContactValidation($type,$id='')
    {
        $pct_value = $this->input->post('value');
        switch ($type) {
            case 'mobile':
                 $pct_type = CONTACT_MOBILE;
                break;
            case 'email':
                 $pct_type = CONTACT_EMAIL;
                break;

            default:
                 $pct_type = '';
                break;
        }
      $validate =  $this->people_model->checkPeopleContact($pct_type,$pct_value,$id);
      if($validate->count > 0)
      {
         echo 'false';
      }
      else
      {
         echo 'true';
      }
    }
    public function peopleUsernameValidation()
    {
        $username = $this->input->post('value');
        
        $validate =  $this->people_model->peopleUsernameValidation($username);

        if($validate->count > 0)
            echo 'false';
        else
            echo 'true';
    }
    public function people_login($id, $opt)
    {
        $data['title']      =   'People Login Details';
        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Details');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        $ppl_id               = $this->nextasy_url_encrypt->decrypt_openssl($id);
        $data['people']       = $this->people_model->getPeopledataById($ppl_id);
        $peopleLoginDept      = $this->home_model->getGenPrmResultByGroup('people_login_dept','result_array');
        // ******* People Login Check ******//
        $peopleLoginCheckVisible = false;
               if(!empty($peopleLoginDept))
               {
                  foreach ($peopleLoginDept as $peopleLoginDeptkey)
                   {
                      switch ($peopleLoginDeptkey['f1']) {
                        case PEOPLE_LOGIN_TEAM:
                          if(!empty($people->emp_ppl_count) || $data['people']->emp_ppl_count > 0)
                          {
                            $peopleLoginCheckVisible = true;
                          }
                          break;
                        case PEOPLE_LOGIN_COMPANY:
                          if(!empty($people->cmp_ppl_count) || $data['people']->cmp_ppl_count > 0)
                          {
                            $peopleLoginCheckVisible = true;
                          }
                          break;
                        case PEOPLE_LOGIN_CLIENT:
                          if(!empty($people->cli_ppl_count) || $data['people']->cli_ppl_count > 0)
                          {
                            $peopleLoginCheckVisible = true;
                          }
                          break;
                        case PEOPLE_LOGIN_VENDOR:
                          if(!empty($people->vdr_ppl_count) || $data['people']->vdr_ppl_count > 0)
                          {
                            $peopleLoginCheckVisible = true;
                          }
                          break;

                        default:
                            $peopleLoginCheckVisible = false;
                          break;
                      }
                   }
                }
        $data['peopleLoginCheckVisible'] = $peopleLoginCheckVisible;
        // ******* People Login Check ******//
        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
        $this->load->view('people/people_login', $data);
    }
    public function updateLoginData()
    {
        log_message('nexlog','people::updateLoginData >>');
        // ********* Check Max users *********//
          $checkUserData['peopleLoginType']     = $this->input->post('ppl_login_type');
          $checkUserData['peopleLoginDept']     = array($this->input->post('ppl_login_dept'));
          $checkUserData['peopleLoginUserName'] = $this->input->post('ppl_username');
          $checkUserData['currentState']       = $this->input->post('currentState');
          log_message('nexlog','peopleLoginDept : '.json_encode($checkUserData['peopleLoginDept']).' || peopleLoginUserName : '.$checkUserData['peopleLoginUserName']);
          $this->checkMaxUsers($checkUserData);
        // ********* Check Max users *********//
        $pplData = $this->people_model->updateLoginData();
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
        log_message('nexlog','people::updateLoginData <<');
        echo json_encode(array('success'=>$success,'message'=>$message));
    }
    public function contactDetailsUpdate()
    {
        $pplData = $this->people_model->contactDetailsUpdate();
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
    public function company_profile()
    {
        $data['title']      =   'Company Profile';

        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('Company Profile');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//


        $this->sbm_mnu_name = 'company-profile';
        if (checkaccess($this->sbm_mnu_name, 'detail')) {
            $data['global_asset_version']     = global_asset_version();
            $data['ppl_session_id']           = $this->session->userdata(PEOPLE_SESSION_ID);
            $data['ppl_encrypted_id']         = $this->nextasy_url_encrypt->encrypt_openssl($data['ppl_session_id']);
            $data['company_profile']          = $this->people_model->getCompanyprofileData($data['ppl_session_id']);
            if(!empty($data['company_profile']))
            {
            $data['company_profile_attach']   = $this->people_model->getCompanyprofileAttach($data['company_profile']->cpf_id);
            }
            $data = array_merge($data, checkaccess($this->sbm_mnu_name));
            $this->load->view('people/company_profile', $data);
        }
        else $this->load->view('errors/easynow_404', $data);
    }
    public function company_profile_update($ppl_encrypted_id)
    {
        $data['title']      =   'Company Profile Update';

        $this->sbm_mnu_name = 'company-profile';
        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('Company Profile');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        if (checkaccess($this->sbm_mnu_name, 'detail')) {
            $data['global_asset_version']     = global_asset_version();
            $data['ci_asset_versn']           = ci_asset_versn();
            $data['ppl_id']                   = $this->nextasy_url_encrypt->decrypt_openssl($ppl_encrypted_id);
            $data['company_profile']          = $this->people_model->getCompanyprofileData($data['ppl_id']);
            $data = array_merge($data, checkaccess($this->sbm_mnu_name));
            $this->load->view('people/company_profile_update', $data);
        }
        else $this->load->view('errors/easynow_404', $data);



    }
    public function companyProfileUpdateData()
    {
        $cpf_id = $this->people_model->companyProfileUpdate();
        if($cpf_id != '' || isset($cpf_id))
        {
            $success = true;
            $message = 'Company Profile saved successfully';
            $linkn   = base_url('company-profile');
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
            $linkn   = '';
        }
        echo json_encode(array('success'=>$success,'message'=>$message,'linkn'=>$linkn));
    }
     public function deleteDoc()
    {
        $doc = $this->people_model->deleteDoc();
        if($doc != '')
        {
            $success = true;
            $message = 'Document deleted successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message));
    }

    public function checkMaxUsers($checkUserData)
    {
        // ********* Check Max users *********//
          $peopleLoginType     = $checkUserData['peopleLoginType'];
          $peopleLoginDept     = $checkUserData['peopleLoginDept'];
          $peopleLoginUserName = $checkUserData['peopleLoginUserName'];
          $currentState        = $checkUserData['currentState'];
          log_message('nexlog','peopleLoginDept : '.json_encode($peopleLoginDept).' || peopleLoginUserName : '.$peopleLoginUserName);
          if($peopleLoginType == '' && $peopleLoginUserName == '')
          {
          log_message('nexlog','currentState : '.$currentState.'|| in_array(PEOPLE_LOGIN_TEAM,$peopleLoginDept) : '.in_array(PEOPLE_LOGIN_TEAM,$peopleLoginDept));
            if($currentState == 'true' && in_array(PEOPLE_LOGIN_TEAM,$peopleLoginDept))
             {
                 $businessParamData = $this->home_model->getBusinessParamData(MAX_USERS);
                 log_message('nexlog','businessParamData : '.json_encode($businessParamData));
                 if(!empty($businessParamData))
                 {
                    $max_users   = $businessParamData->bpm_value;
                    log_message('nexlog','max_users : '.$max_users);
                    $users_count = $this->people_model->getTotalTeamMembers();
                    log_message('nexlog','users_count : '.json_encode($users_count));
                    if(!empty($users_count))
                    {
                        $no_of_users = $users_count->no_of_users;
                        log_message('nexlog','max_users : '.$max_users.' || no_of_users : '.$no_of_users);
                        if($no_of_users >= $max_users)
                        {
                            $success = false;
                            $message = 'Sorry Max no. of Users Reached';
                            echo json_encode(array('success'=>$success,'message'=>$message));
                            exit();
                        }
                    }
                 }
             }
          }
          return true;
        // ********* Check Max users *********//
    }
    public function checkMaxUsersAtInsert()
    {
        log_message('nexlog','people::checkMaxUsersAtInsert >>');
        // ********* Check Max users *********//
          $checkUserData['peopleLoginType']     = $this->input->post('ppl_login_type');
          $checkUserData['peopleLoginDept']     = array($this->input->post('ppl_login_dept'));
          $checkUserData['peopleLoginUserName'] = $this->input->post('ppl_username');
          $checkUserData['currentState']        = $this->input->post('currentState');
          log_message('nexlog','peopleLoginDept : '.json_encode($checkUserData['peopleLoginDept']).' || peopleLoginUserName : '.$checkUserData['peopleLoginUserName']);
         $pplData = $this->checkMaxUsers($checkUserData);
        // ********* Check Max users *********//
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
        log_message('nexlog','people::checkMaxUsersAtInsert <<');
        echo json_encode(array('success'=>$success,'message'=>$message));
    }
    public function getStateDropdown()
    {
        $search             = $this->input->get('q');
        $stateData = array('results'=>$this->people_model->getStateDropdown($search));
        echo json_encode($stateData);
    }
     public function deletePeople()
    {
        $ppl_id = $this->input->post('ppl_id');
        $check = $this->home_model->delete_data('people',$ppl_id,'ppl_id' );
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
     public function deletePeopleContact()
    {
        $pct_id = $this->input->post('pct_id');
        $check = $this->home_model->delete_data('people_contact',$pct_id,'pct_id' );
        if($check)
        {
            $success = true;
            $message = 'Contact Deleted successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message));
    }

    function peopleAdditionalDetailEdit($id)
    {
        $data['title']      =   'People Additional Details Edit';
        // ***** Breadcrumb Data Starts here *******//
        $data['breadcrumb_data'][] = array('Home', base_url('dashboard'));
        $data['breadcrumb_data'][] = array('People', base_url('people-dashboard'));
        $data['breadcrumb_data'][] = array('List',base_url('people-list'));
        $data['breadcrumb_data'][] = array('Additional Details Edit');
        $data['breadcrumb']        = $this->nextasy_library->ci_breadcrumbs($data['breadcrumb_data']);
        // ***** Breadcrumb Data Ends here *******//
        $ppl_id = $this->nextasy_url_encrypt->decrypt_openssl($id);
        $data['people_additional_detail']  = $this->people_model->getPeopleAdditionalDetailsById($ppl_id);

        // $data['global_asset_version'] = global_asset_version();
        $data['global_asset_version'] = global_asset_version();
      // print_r($data);
      // exit;
        $this->load->view('people/people_additional_detail_edit', $data);
    }

    function saveAdditionalDetails()
    {
        $data = $this->input->post()['obj'];
        $check = $this->people_model->saveAdditionalDetails($data);
        if($check)
        {
            $success = true;
            $message = 'Additional Details Saved successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message));
    }
    public function getPeopleContactType($genPrmGroup)
    {
        $search   = $this->input->get('q');
        $LeadData = array('results'=>$this->people_model->getGenPrmforDropdown($genPrmGroup,$search));
        echo json_encode($LeadData);
    }
    public function getDesignationDropdown()
    {
        $search   = $this->input->get('q');
        $LeadData = array('results'=>$this->people_model->getDesignationDropdown($search));
        echo json_encode($LeadData);
    }

    function getProductTotalAmt()
    {
        $productlist = implode(", ", $this->input->post('data'));
        echo $this->people_model->getProductTotalAmt($productlist);
    }
     public function updatePeopleCustomData()
    {
        $pplData = $this->people_model->updatePeopleCustomData();
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
    public function getCampaignDropdown()
    {
        $search             = $this->input->get('q');
        $stateData = array('results'=>$this->people_model->getCampaignDropdown($search));
        echo json_encode($stateData);
    }
     public function deletePeopleCompany()
    {
        $cmp_id = $this->input->post('cmp_id');
        $ppl_id = $this->input->post('ppl_id');
        
        $cmp_id = $this->nextasy_url_encrypt->decrypt_openssl($cmp_id);
        $ppl_id = $this->nextasy_url_encrypt->decrypt_openssl($ppl_id);


        $check = $this->people_model->deletePeopleCompany($cmp_id, $ppl_id);

        if($check)
        {
            $success = true;
            $message = 'Company Deleted successfully';
        }
        else
        {
            $success = false;
            $message = 'Oops !! Some error occured';
        }
        echo json_encode(array('success'=>$success,'message'=>$message));
    }

    function importPeopleExcel()
    {
        $data = array();
        ini_set("max_execution_time", 0);
        set_time_limit(0);
        ini_set('memory_limit', "-1");
        $config['upload_path'] = $this->config->item('upload') . PEOPLE_EXCEL_DOCS_PATH;
        $config['allowed_types'] = 'xls|txt|text|xlsx|csv';
        $config['max_size'] = 551200;
        $this->load->library('upload', $config);

        $validation_msg = '';

        if (!$this->upload->do_upload('userfile'))
        {
            $this->session->set_flashdata('excel_uploaded', '<div class="alert alert-danger">Please select a file to Upload</div>');
            redirect(base_url('people-list'));
        }
        else
        {
            $upload_data = $this->upload->data();
            $import_file_name = $this->config->item('upload') . PEOPLE_EXCEL_DOCS_PATH . $upload_data['file_name'];

            // load the excel library

            $this->load->library('excel');
            $inputFileType = PHPExcel_IOFactory::identify($import_file_name);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($import_file_name);

            //  Get worksheet dimensions

            $validation_msg .= $this->addExcelPeople($objPHPExcel->getSheet(0));   
        }

        if($validation_msg)
            $validation_msg = '<div class="alert alert-danger">'.$validation_msg.'</div>';

        $this->session->set_flashdata('excel_uploaded', '<div class="alert alert-success">Excel Uploaded Successfully </div>'.$validation_msg);
        redirect(base_url('people-list'));
    }

    function addExcelPeople($people)
    {
        $row_name_array = array('ppl_code','ppl_name','ppl_gender','ppl_dob','ppl_met_on','ppl_remark','ppl_title_id','ppl_social_fb','ppl_social_linkedin','ppl_social_instagram','ppl_social_twitter','ppl_social_youtube','ppl_website');
        return $this->insertExcelData($people, 'people', $row_name_array, 'O');
    }

    function peopleValidation($arrAddData)
    {
        /*$sql = 'select count(prd_id) cnt from people where prd_sku = "'.$arrAddData['prd_sku'].'" and prd_status = '.ACTIVE_STATUS;
        $sku_exist = $this->db->query($sql)->row()->cnt;

        if($sku_exist)
            return (object)array('status'=>false, 'data'=>'<b>People:</b> SKU '.$arrAddData['prd_sku'].' Exist, not Updated');
        else
            $arrAddData['prd_slug'] = $this->createSlug($arrAddData['prd_name']);

        return (object)array('status'=>true, 'data'=>$arrAddData);*/
    }

    function insertExcelData($array_data, $table_name, $row_name_array, $last_row_name, $callback = false)
    {
        $highestRow = $array_data->getHighestRow();

        $validation_msg = '';

        for ($row = 2; $row <= $highestRow; $row++)
        {
            $rowData = $array_data->rangeToArray('A' . $row . ':'.$last_row_name.$row, NULL, TRUE, FALSE)[0];

            $column_prefix = explode('_', $row_name_array[0])[0];

            $arrAddData = array();

            for($i = 0; $i < count($rowData); $i++)
                $arrAddData[$row_name_array[$i]] = trim($rowData[$i]);

            $validation = (object)array('status'=>true, 'data'=>$arrAddData);

            if($callback)
                $validation = $this->$callback($arrAddData);

            if(!$validation->status)
            {
                $validation_msg .= $validation->data.'<br />';
            }
            else
            {
                $arrAddData = $validation->data;
                $arrAddData[$column_prefix.'_status']   = ACTIVE_STATUS;
                $arrAddData[$column_prefix.'_crdt_by']  = $this->session->userdata(PEOPLE_SESSION_ID);

                $this->db->insert($table_name, $arrAddData);
            }
        }

        return $validation_msg;
    }

    function createSlug($string)
    {
        $charac   = array(" ",".","'","/","*",";","?",":","@","=","+","$",",","&","%","#","'","\"","`","(",")","_","`","{","}","/","<",">","\,","‘","’","[","]","|","%","~","!","”","“");

        return str_replace($charac,"-", $string);
    }    
}
