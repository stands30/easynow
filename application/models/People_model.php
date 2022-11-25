<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class People_model extends CI_Model

{
  /**
   * Instanciar o CI
   */
  function __construct()
  {

    // Call the Model constructor

    parent::__construct();
  }

  // ***** Tags Start Here *******//

  public

  function getTagsforDropdown($search)
  {
    $tagsSqlQuery = "SELECT tgs_id as id, tgs_name as text from tags where tgs_status IN (" . ACTIVE_STATUS . ")";
    if ($search != '')
    {
      $tagsSqlQuery.= " and tgs_name LIKE '%" . $search . "%' ";
    }

    $tagsSqlQuery.= "  ORDER BY tgs_crdt_dt ASC";

    // ***** It is used to reset value of select2 ****** //
    // $resetResult     = array('id'=>'0','text'=>'Please Select Tags');

    $queryResult = $this->home_model->executeSqlQuery($tagsSqlQuery, 'result');

    //  if($search =='')
      // {
      //   array_unshift($queryResult,$resetResult);
      // }
    // ***** It is used to reset value of select2 ****** //

    return $queryResult;
  }

  // ******** Tags End Here ********//
  // ******** Company Start Here *******//

  public

  function getCompanyforDropdown($search)
  {
    $CompanySqlQuery = "SELECT cmp_id as id, cmp_name as text from company where cmp_status IN (" . ACTIVE_STATUS . ") ";
    if ($search != '')
    {
      $CompanySqlQuery.= " and cmp_name LIKE '%" . $search . "%' ";
    }

    $CompanySqlQuery.= "  ORDER BY cmp_name ASC";

    // ***** It is used to reset value of select2 ****** //

    $queryResult = $this->home_model->executeSqlQuery($CompanySqlQuery, 'result');
    if(count($queryResult) > 0)
      $resetResult = array('id' => '0', 'text' => 'Please Select Company');
    else
      $resetResult = array('id' => '0', 'text' => 'Please Enter Name to Add New Company');

        if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }

    // ***** It is used to reset value of select2 ****** //

    return $queryResult;
  }

  public

  function getCompanyDetailsById($cmpId)
  {
    $row = false;
    log_message('nexlog', 'people_model::getCompanyDetailsById >> ');
    log_message('nexlog', ' cmpId : ' . json_encode($cmpId));
    if ($cmpId != '')
    {
      $CompanySqlQuery = "SELECT *, 
      ifnull((SELECT stm_name from state_master where stm_id=cmp_stm_id),'') state_name,
      (select gnp_name from gen_prm where gnp_value = cmp_industry and gnp_group = 'cmp_industry_type' and gnp_status = ".ACTIVE_STATUS.") cmp_industry_name,
      ifnull((select gnp_name from gen_prm where gnp_value = cmp_type and gnp_group = 'cmp_type' and gnp_status = ".ACTIVE_STATUS."),'') cmp_type_name,
      ifnull((select gnp_name from gen_prm where gnp_value = cmp_anl_rev and gnp_group = 'cmp_anl_rev' and gnp_status = ".ACTIVE_STATUS."),'') cmp_anl_rev_name,
      ifnull(fnGetPeopleNameByID(cmp_managed_by),'') cmp_managed_by_name,
      ifnull((select group_concat(tgs_name) from tags where find_in_set(tgs_id, cmp_tgs_id) and tgs_status = ".ACTIVE_STATUS."),'') cmp_tgs_id_name from company where cmp_status IN (" . ACTIVE_STATUS . ") and cmp_id='" . $cmpId . "' LIMIT 1";

      $row = $this->home_model->executeSqlQuery($CompanySqlQuery, 'row');
    }

    log_message('nexlog', 'people_model::getCompanyDetailsById << ');
    return $row;
  }

  // ******* Company End Here ********//
  // ******* Lead Start Here ********//

  public

  function getGenPrmforDropdown($genPrmGroup, $search)
  {
    $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='" . $genPrmGroup . "' and gnp_status IN (" . ACTIVE_STATUS . ") ";
    if ($search != '')
    {
      $genPrmSqlQuery.= " and gnp_name LIKE '%" . $search . "%' ";
    }

    $genPrmSqlQuery.= "  ORDER BY gnp_order ASC";

    // ***** It is used to reset value of select2 ****** //

    $resetResult = array(
      'id' => '0',
      'text' => 'Please Select'
    );
    $queryResult = $this->home_model->executeSqlQuery($genPrmSqlQuery, 'result');
        if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }

    // ***** It is used to reset value of select2 ****** //

    return $queryResult;
  }

  public

  function getDesignationDropdown($search)
  {
    $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='cpl_designation' and gnp_status IN (" . ACTIVE_STATUS . ") ";
    if ($search != '')
    {
      $genPrmSqlQuery.= " and gnp_name LIKE '%" . $search . "%' ";
    }

    $genPrmSqlQuery.= "  ORDER BY gnp_order ASC";

    // ***** It is used to reset value of select2 ****** //

    $resetResult = array(
      'id' => '0',
      'text' => 'Please Select'
    );
    $queryResult = $this->home_model->executeSqlQuery($genPrmSqlQuery, 'result');
        if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }

    // ***** It is used to reset value of select2 ****** //

    return $queryResult;
  }

  public

  function getProductForDropdown($search)
  {
    $productSqlQuery = "SELECT  prd_id as id,prd_name as text FROM product where prd_status IN (" . ACTIVE_STATUS . ") ";
    if ($search != '')
    {
      $productSqlQuery.= " and prd_name LIKE '%" . $search . "%' ";
    }

    $productSqlQuery.= "  ORDER BY prd_crdt_dt ASC";

    // ***** It is used to reset value of select2 ****** //
    $resetResult     = array('id'=>'0','text'=>'Please Select Product');

    $queryResult = $this->home_model->executeSqlQuery($productSqlQuery, 'result');

      if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }
    // ***** It is used to reset value of select2 ****** //

    return $queryResult;
  }

  // ******* Lead End Here *********//

  public

  function getPeopleforDropdown($search, $manage = '')
  {
    $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (" . ACTIVE_STATUS . ")";
    if ($manage == 'manage')
    {
      $peopleSqlQuery.= " and ppl_id IN (SELECT emp_ppl_id from employee where emp_status = '" . ACTIVE_STATUS . "')";
    }
    else
    {
      $peopleSqlQuery.= " and ppl_id NOT IN (SELECT emp_ppl_id from employee where emp_dept != '" . PEOPLE_ADMIN_DEPT . "')";
    }

    if ($search != '')
    {
      $peopleSqlQuery.= " and ppl_name LIKE '%" . $search . "%' ";
    }

    $peopleSqlQuery.= "  ORDER BY ppl_crdt_dt ASC";

    // ***** It is used to reset value of select2 ****** //

    $resetResult = array(
      'id' => '0',
      'text' => 'Please Select People'
    );
    $queryResult = $this->home_model->executeSqlQuery($peopleSqlQuery, 'result');
        if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }

    // ***** It is used to reset value of select2 ****** //

    return $queryResult;
  }

  // ******* Event Start Here ********//

  public

  function getEventForDropdown($search)
  {
    $eventSqlQuery = "SELECT  evt_id as id,evt_name as text FROM event where evt_status IN (" . ACTIVE_STATUS . ") ";
    if ($search != '')
    {
      $eventSqlQuery.= " and evt_name LIKE '%" . $search . "%' ";
    }

    $eventSqlQuery.= "  ORDER BY evt_crdt_dt DESC";

    // ***** It is used to reset value of select2 ****** //

    $resetResult = array(
      'id' => '0',
      'text' => 'Please Select Event'
    );
    $queryResult = $this->home_model->executeSqlQuery($eventSqlQuery, 'result');
        if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }

    // ***** It is used to reset value of select2 ****** //

    return $queryResult;
  }

  // ******* Event End Here *********//
  // ******* Department Start Here ********//

  public

  function getDepartmentforDropdown($search)
  {
    $deptSqlQuery = "SELECT  dpt_id as id,dpt_name as text FROM department where dpt_status IN (" . ACTIVE_STATUS . ") ";
    if ($search != '')
    {
      $deptSqlQuery.= " and dpt_name LIKE '%" . $search . "%' ";
    }

    $deptSqlQuery.= "  ORDER BY dpt_crdt_dt ASC";

    // ***** It is used to reset value of select2 ****** //

    $resetResult = array(
      'id' => '0',
      'text' => 'Please Select Department'
    );
    $queryResult = $this->home_model->executeSqlQuery($deptSqlQuery, 'result');
        if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }

    // ***** It is used to reset value of select2 ****** //

    return $queryResult;
  }

  // ******* Department End Here *********//

  public

  function peopleInsert()
  {
    log_message('nexlog', 'people_model::peopleInsert >>');

    // ******* People Data Starts Here *********//

    log_message('nexlog', ' people data >>');
    $peopleData = array();

    // **** Sub Module Tag Addition ***********//

    log_message('nexlog', 'People Sub Tags Starts Here >>');
    $subModuleTag = '';
    $allSubmodeTag = '';
    $peopleType = $this->home_model->getGenPrmResultByGroup('people_type', 'result_array');
    $peopleTypeF1KeyArray = array_column($peopleType, 'f1');

    // ******* People sub moodule ******//

    $lead_src = $this->input->post('led_src');
    $led_title = $this->input->post('led_title');
    $cpl_cmp_id = $this->input->post('cpl_cmp_id');
    $cli_cmp_id = $this->input->post('cli_cmp_id');
    $vdr_cmp_id = $this->input->post('vdr_cmp_id');
    $cdt_role = $this->input->post('cdt_role');
    $epl_evt_id = $this->input->post('epl_evt_id');
    $emp_dept = $this->input->post('emp_dept');
    $ppl_email = $this->input->post('ppl_email');
    $ppl_mobile = $this->input->post('ppl_mobile');
    $adt_adm_id = $this->input->post('adt_adm_id');
    $adt_value = $this->input->post('adt_value');

    // ******* People sub moodule ******//
    // Removed Default Tag Code - Check Previous versions

    $allSubmodeTag = removeLastCharacter($subModuleTag, ',');
    log_message('nexlog', 'subModuleTag : ' . $subModuleTag . '|| allSubmodeTag : ' . $allSubmodeTag);
    log_message('nexlog', 'People Sub Tags Ends Here <<');

    // **** Sub Module Tag Addition ***********//

    $peopleData = $this->peopleData($allSubmodeTag);
    $ppl_username = $this->input->post('ppl_username');
    $ppl_password = $this->input->post('ppl_password');
    if ($ppl_username != '')
    {
      $peopleData['ppl_username'] = $ppl_username;
    }

    if ($ppl_password != '')
    {
      $peopleData['ppl_password'] = $this->nextasy_url_encrypt->encrypt_openssl($ppl_password);
    }

    $peopleData['ppl_login_type'] = removeLastCharacter($this->input->post('ppl_login_type') , ',');
    $peopleData['ppl_login_dept'] = removeLastCharacter($this->input->post('ppl_login_dept') , ',');
    $peopleData['ppl_status'] = ACTIVE_STATUS;
    $peopleData['ppl_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
    $pplId = $this->home_model->insert('people', $peopleData);
    log_message('nexlog', ' people id : ' . $pplId);
    log_message('nexlog', ' people data : ' . json_encode($peopleData));
    log_message('nexlog', ' people data <<');

    // ******* People Contact Data Starts Here *******//

    if ($ppl_email != '')
    {
      log_message('nexlog', ' ppl_email != "" >>');

      // ******* Email Starts Here *******//

      $peopleEmailData['pct_type'] = CONTACT_EMAIL;
      $peopleEmailData['pct_ppl_id'] = $pplId;
      $peopleEmailData['pct_value'] = $this->input->post('ppl_email');
      $peopleEmailData['pct_active'] = ACTIVE_STATUS;
      $peopleEmailData['pct_primary'] = ACTIVE_STATUS; // ACTIVE_STATUS = primary
      $peopleEmailData['pct_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
      $pplEmailId = $this->home_model->insert('people_contact', $peopleEmailData);

      // ******* Email Ends Here *******//

      log_message('nexlog', ' peopleEmailData : ' . json_encode($peopleEmailData));
      log_message('nexlog', ' ppl_email != "" <<');
    }

    if ($ppl_mobile != '')
    {
      log_message('nexlog', ' ppl_mobile != "" >>');

      // ******* Mobile Starts Here *******//

      $peopleMobData['pct_type'] = CONTACT_MOBILE;
      $peopleMobData['pct_ppl_id'] = $pplId;
      $peopleMobData['pct_value'] = $this->input->post('ppl_mobile');
      $peopleMobData['pct_active'] = ACTIVE_STATUS;
      $peopleMobData['pct_primary'] = ACTIVE_STATUS; // ACTIVE_STATUS = primary
      $peopleMobData['pct_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
      $pplMobileId = $this->home_model->insert('people_contact', $peopleMobData);

      // ******* Mobile Ends Here *******//

      log_message('nexlog', ' peopleMobData : ' . json_encode($peopleMobData));
      log_message('nexlog', ' ppl_mobile != "" <<');
    }

    // ******* People Contact Data Ends Here *******//
    // ******* People Data End Here *********//
    // ******* People Sub Module Starts Here *********//

    $peopleType = $this->home_model->getGenPrmResultByGroup('people_type', 'result_array');
    $peopleTypeF1KeyArray = array_column($peopleType, 'f1');
    if ($pplId != '-1')
    {
      if (!empty($peopleType))
      {
        if (in_array(PEOPLE_TYPE_COMPANY, $peopleTypeF1KeyArray))
        {
          if ($cpl_cmp_id != 'null' && $cpl_cmp_id != '0' && $cpl_cmp_id != '')
          {
            log_message('nexlog', ' company data >>');
            $peopleCompData = $this->peopleCompData();
            $peopleCompData['cmp_status'] = ACTIVE_STATUS;
            $peopleCompData['cmp_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $cmpId = $this->checkDataExistsByType($peopleCompData, 'company');
            log_message('nexlog', 'cmpId : ' . $cmpId);
            $cmpPeopleData['cpl_cmp_id'] = $cmpId;
            $cmpPeopleData['cpl_ppl_id'] = $pplId;
            $cmpPeopleData['cpl_designation'] = $this->input->post('cpl_designation');
            $cmpPeopleData['cpl_status'] = ACTIVE_STATUS;
            $cmpPeopleData['cpl_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $pplClientId = $this->home_model->insert('cmp_people', $cmpPeopleData);
            log_message('nexlog', ' company data : ' . json_encode($peopleCompData));
            log_message('nexlog', ' company data <<');
          }
        }

        if (in_array(PEOPLE_TYPE_LEAD, $peopleTypeF1KeyArray))
        {
          if ($led_title != 'null' && $led_title != '0' && $led_title != '')
          {
            log_message('nexlog', ' lead data >>');
            $peopleLeadData = $this->peopleLeadData();
            $peopleLeadData['led_ppl_id'] = $pplId;
            if (isset($peopleCompData['led_ppl_id']) && $peopleCompData['led_ppl_id'] != '')
            {
              $peopleLeadData['led_cmp_id'] = $peopleCompData['led_ppl_id'];
            }

            $peopleLeadData['led_status'] = ACTIVE_STATUS;
            $peopleLeadData['led_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $pplLeadId = $this->home_model->insert('lead', $peopleLeadData);
            log_message('nexlog', ' lead id : ' . $pplLeadId);
            log_message('nexlog', ' lead data : ' . json_encode($peopleLeadData));
            log_message('nexlog', ' lead data <<');
          }
        }

        if (in_array(PEOPLE_TYPE_CANDIDATE, $peopleTypeF1KeyArray))
        {
          if ($cdt_role != 'null' && $cdt_role != '0' && $cdt_role != '')
          {
            log_message('nexlog', ' cdt_role data >>');
            $peopleCandidateData = $this->peopleCandidateData();
            $peopleCandidateData['cdt_ppl_id'] = $pplId;
            $peopleCandidateData['cdt_status'] = ACTIVE_STATUS;
            $peopleCandidateData['cdt_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $pplCandidateId = $this->home_model->insert('candidate', $peopleCandidateData);
            log_message('nexlog', ' cdt_role id : ' . $pplCandidateId);
            log_message('nexlog', ' cdt_role data : ' . json_encode($peopleCandidateData));
            log_message('nexlog', ' cdt_role data <<');
          }
        }

        if (in_array(PEOPLE_TYPE_CLIENT, $peopleTypeF1KeyArray))
        {
          if ($cli_cmp_id != 'null' && $cli_cmp_id != '0' && $cli_cmp_id != '')
          {
            log_message('nexlog', ' client data >>');
            $peopleClientData = $this->peopleClientData();
            $peopleClientData['cpl_ppl_id'] = $pplId;
            $peopleClientData['cpl_status'] = ACTIVE_STATUS;
            $peopleClientData['cpl_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $pplClientId = $this->home_model->insert('cmp_people', $peopleClientData);
            log_message('nexlog', ' client id : ' . $pplClientId);
            log_message('nexlog', ' client data : ' . json_encode($peopleClientData));
            log_message('nexlog', ' client data <<');
          }
        }

        if (in_array(PEOPLE_TYPE_VENDOR, $peopleTypeF1KeyArray))
        {
          if ($vdr_cmp_id != 'null' && $vdr_cmp_id != '0' && $vdr_cmp_id != '')
          {
            log_message('nexlog', ' vendor data >>');
            $peopleVendorData = $this->peopleVendorData();
            $peopleVendorData['cpl_ppl_id'] = $pplId;
            $peopleVendorData['cpl_status'] = ACTIVE_STATUS;
            $peopleVendorData['cpl_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $pplVendorId = $this->home_model->insert('cmp_people', $peopleVendorData);
            log_message('nexlog', ' vendor id : ' . $pplVendorId);
            log_message('nexlog', ' vendor data : ' . json_encode($peopleVendorData));
            log_message('nexlog', ' vendor data >>');
          }
        }

        if (in_array(PEOPLE_TYPE_EVENT, $peopleTypeF1KeyArray))
        {
          if ($epl_evt_id != 'null' && $epl_evt_id != '0' && $epl_evt_id != '')
          {
            log_message('nexlog', ' event data >>');
            $peopleEventData = $this->peopleEventData();
            $peopleEventData['epl_ppl_id'] = $pplId;
            $peopleEventData['epl_status'] = ACTIVE_STATUS;
            $peopleEventData['epl_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $pplEventId = $this->home_model->insert('event_people', $peopleEventData);
            log_message('nexlog', ' event id : ' . $pplEventId);
            log_message('nexlog', ' event data : ' . json_encode($peopleEventData));
            log_message('nexlog', ' event data >>');
          }
        }

        if (in_array(PEOPLE_TYPE_TEAM, $peopleTypeF1KeyArray))
        {
          if ($emp_dept != 'null' && $emp_dept != '0' && $emp_dept != '')
          {
            log_message('nexlog', ' team data >>');
            $peopleTeamData = $this->peopleTeamData();
            $peopleTeamData['emp_ppl_id'] = $pplId;
            $peopleTeamData['emp_status'] = ACTIVE_STATUS;
            $peopleTeamData['emp_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $pplTeamId = $this->home_model->insert('employee', $peopleTeamData);
            log_message('nexlog', ' team id : ' . $pplTeamId);
            log_message('nexlog', ' team data : ' . json_encode($peopleTeamData));
            log_message('nexlog', ' team data >>');
          }
        }

        if (in_array(PEOPLE_ADDITIONAL_DETAILS, $peopleTypeF1KeyArray))
        {
          log_message('nexlog', ' additional detail data >>');
          $peopleAdditionalData = $this->peopleAdditionalData();
          for ($i = 0; $i < count($peopleAdditionalData); $i++)
          {
            $peopleAdditionalData_new = $peopleAdditionalData[$i];
            $peopleAdditionalData_new['adt_ppl_id'] = $pplId;
            $peopleAdditionalData_new['adt_status'] = ACTIVE_STATUS;
            $peopleAdditionalData_new['adt_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
            $pplAdditionalDetId = $this->home_model->insert('additional_details', $peopleAdditionalData_new);
            log_message('nexlog', ' additional detail id : ' . $pplAdditionalDetId);
            log_message('nexlog', ' additional detail data : ' . json_encode($peopleAdditionalData_new));
            log_message('nexlog', ' additional detail data >>');
          }
        }
      }
    }

    // ********* Send Mail ***********//

    $send_mail = $this->input->post('send_mail');
    if ($send_mail == '1')
    {
      $this->sendMailtoPeople($pplId);
    }

    // ********* Send Mail ***********//

    log_message('nexlog', 'people_model::peopleInsert <<');
    return $pplId;
  }

  function peopleData($allSubmodeTag = '')
  {
    log_message('nexlog', 'people_model::allSubmodeTag >> ');
    $peopleData = array();
    $peopleData['ppl_name'] = $this->input->post('ppl_name');
    $peopleData['ppl_title_id'] = $this->input->post('ppl_title_id');
    $peopleData['ppl_address'] = $this->input->post('ppl_address');
    $peopleData['ppl_dob'] = mysqldate($this->input->post('ppl_dob'));
    $peopleData['ppl_met_on'] = mysqldate($this->input->post('ppl_met_on'));
    $peopleData['ppl_gender'] = $this->input->post('ppl_gender');
    $peopleData['ppl_remark'] = $this->input->post('ppl_remark');
    $peopleData['ppl_social_fb'] = $this->input->post('ppl_social_fb');
    $peopleData['ppl_social_linkedin'] = $this->input->post('ppl_social_linkedin');
    $peopleData['ppl_social_instagram'] = $this->input->post('ppl_social_instagram');
    $peopleData['ppl_social_twitter'] = $this->input->post('ppl_social_twitter');
    $peopleData['ppl_social_youtube'] = $this->input->post('ppl_social_youtube');
    $peopleData['ppl_website'] = $this->input->post('ppl_website');
    $peopleData['ppl_managed_by'] = $this->input->post('ppl_managed_by');
    $peopleData['ppl_location'] = $this->input->post('ppl_location');
    $peopleData['ppl_google_lat'] = $this->input->post('ppl_google_lat');
    $peopleData['ppl_google_long'] = $this->input->post('ppl_google_long');
    if (isset($_FILES['ppl_profile_image']['name']))
    {
      $peopleData['ppl_profile_image'] = doc_upload(PEOPLE_PROFILE_IMAGE, PEOPLE_PROFILE_IMAGE_RESIZE, 'ppl_profile_image', 'image');
    }

    // ********** Tags Section *********//

    $tags_id = $this->input->post('ppl_tgs_id');
    log_message('nexlog', 'tags_id : ' . $this->input->post('ppl_tgs_id'));
    if ($allSubmodeTag != '')
    {
      $tags_post_id = $this->input->post('ppl_tgs_id');
      log_message('nexlog', 'tags_post_id : ' . $tags_post_id . ' || allSubmodeTag : ' . $allSubmodeTag);
      if ($tags_id != '' && $tags_id != 'null')
      {
        log_message('nexlog', ' $tags_post_id != "" ');
        $tags_id = $this->input->post('ppl_tgs_id') . ',' . $allSubmodeTag;
        log_message('nexlog', ' $tags_post_id != "" :  ' . $tags_id);
      }
      else
      {
        $tags_id = $allSubmodeTag;
        log_message('nexlog', ' $tags_id == "" :  ' . $tags_id);
      }
    }

    if ($tags_id != '' && $tags_id != 'null')
    {
      log_message('nexlog', ' $tags_id != "" :  ' . $tags_id);
      $peopleData['ppl_tgs_id'] = $this->getTagsId($tags_id);
      log_message('nexlog', ' $tags_id != "" :  ' . $peopleData['ppl_tgs_id']);
    }
    else $peopleData['ppl_tgs_id'] = '';
    log_message('nexlog', 'peopleData : ' . json_encode($peopleData));
    log_message('nexlog', 'people_model::allSubmodeTag << ');

    // ********** Tags Section *********//

    return $peopleData;
  }

  function peopleCompData()
  {
    $peopleCompData = array();
    log_message('nexlog', 'people_model::peopleCompData  !is_numeric($cmpId) >>');
    $peopleCompData = array();
    $cmpId = $this->input->post('cpl_cmp_id');
    $peopleCompData['cmp_name'] = $cmpId;
    if (isset($_FILES['cmp_logo']['name']))
    {
      $peopleCompData['cmp_logo'] = doc_upload(COMPANY_LOGO, COMPANY_LOGO_RESIZE, 'cmp_logo', 'image');
    }

    unset($peopleCompData['file_count']);
    $peopleCompData['cmp_website'] = $this->input->post('cmp_website');
    $peopleCompData['cmp_industry'] = $this->input->post('cmp_industry');
    $peopleCompData['cmp_address'] = $this->input->post('cmp_address');
    $peopleCompData['cmp_payment_terms'] = $this->input->post('cmp_payment_terms');
    $peopleCompData['cmp_pay_due'] = $this->input->post('cmp_pay_due');
    $peopleCompData['cmp_pan'] = $this->input->post('cmp_pan');
    $peopleCompData['cmp_gst_no'] = $this->input->post('cmp_gst_no');
    $peopleCompData['cmp_stm_id'] = $this->input->post('cmp_stm_id');
    $peopleCompData['cmp_type'] = $this->input->post('cmp_type');
    $peopleCompData['cmp_anl_rev'] = $this->input->post('cmp_anl_rev');
    $peopleCompData['cmp_employee'] = $this->input->post('cmp_employee');
    $peopleCompData['cmp_managed_by'] = $this->input->post('cmp_managed_by');
    $peopleCompData['cmp_type_id'] = $this->input->post('cmp_type_id');
    $peopleCompData['cmp_facebook'] = $this->input->post('cmp_facebook');
    $peopleCompData['cmp_linkedin'] = $this->input->post('cmp_linkedin');
    $peopleCompData['cmp_instagram'] = $this->input->post('cmp_instagram');
    $peopleCompData['cmp_twitter'] = $this->input->post('cmp_twitter');
    $peopleCompData['cmp_youtube'] = $this->input->post('cmp_youtube');
    $peopleCompData['cmp_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
    log_message('nexlog', 'peopleCompData : ' . json_encode($peopleCompData));
    log_message('nexlog', 'people_model::peopleCompData  !is_numeric($cmpId)<<');
    return $peopleCompData;
  }

  function peopleLeadData()
  {
    $peopleLeadData = array();
    $peopleLeadData['led_src'] = $this->input->post('led_src');
    $peopleLeadData['led_title'] = $this->input->post('led_title');
    $peopleLeadData['led_temp'] = $this->input->post('led_temp');
    $peopleLeadData['led_ref_by'] = $this->input->post('led_ref_by');

    // $peopleLeadData['led_prod'] = $this->input->post('led_prod');

    $peopleLeadData['led_amount'] = $this->input->post('led_amount');
    $peopleLeadData['led_managed_by'] = $this->input->post('led_managed_by');
    $peopleLeadData['led_lead_status'] = $this->input->post('led_lead_status');
    $peopleLeadData['led_lead_stage'] = $this->input->post('led_lead_stage');
    $peopleLeadData['led_remark'] = $this->input->post('led_remark');
    $peopleLeadData['led_type'] = $this->input->post('led_type');
    $peopleLeadData['led_campaign'] = $this->input->post('led_campaign');
    $peopleLeadData['led_pipeline'] = $this->input->post('led_pipeline');

    $compData = array();

    log_message('nexlog', ' TEST : ' . json_encode($this->input->post('cpl_cmp_id')));
    $compData['cmp_name'] = $this->input->post('cpl_cmp_id');

    if($compData['cmp_name'])
    {
      $cmpId = $this->checkDataExistsByType($compData, 'company');
      $peopleLeadData['led_cmp_id'] = $cmpId;
      log_message('nexlog', ' TEST : ' . json_encode($cmpId));
    }

    return $peopleLeadData;
  }

  function peopleCandidateData()
  {
    $peopleCandidateData = array();
    $peopleCandidateData['cdt_role'] = $this->input->post('cdt_role');
    $peopleCandidateData['cdt_total_exp'] = $this->input->post('cdt_total_exp');
    $peopleCandidateData['cdt_relative_exp'] = $this->input->post('cdt_relative_exp');
    $peopleCandidateData['cdt_notice_period'] = $this->input->post('cdt_notice_period');
    $peopleCandidateData['cdt_exp_ctc'] = $this->input->post('cdt_exp_ctc');
    $peopleCandidateData['cdt_cur_ctc'] = $this->input->post('cdt_cur_ctc');
    $peopleCandidateData['cdt_skills'] = $this->input->post('cdt_skills');
    $peopleCandidateData['cdt_remark'] = $this->input->post('cdt_remark');
    return $peopleCandidateData;
  }

  function peopleClientData()
  {
    $peopleClientData = array();
    $cmpId = $this->input->post('cli_cmp_id');
    if (!is_numeric($cmpId))
    {
      log_message('nexlog', 'people_model::peopleClientData  !is_numeric($cmpId) >>');
      $compData = array();
      $compData['cmp_name'] = $this->input->post('cli_cmp_id');
      $compData['cmp_gst_no'] = $this->input->post('cli_cmp_gst_no');
      $compData['cmp_stm_id'] = $this->input->post('cli_cmp_state');
      $compData['cmp_payment_terms'] = $this->input->post('cli_cmp_payment_terms');
      $cmpId = $this->checkDataExistsByType($compData, 'company');
      $compCliData = array();
      $compCliData['cli_cmp_id'] = $cmpId;
      log_message('nexlog', ' compCliData : ' . json_encode($compCliData));
      $clicompany = $this->checkDataExistsByType($compCliData, 'client');
      log_message('nexlog', ' cliCmpId : ' . $clicompany);
      log_message('nexlog', 'people_model::peopleClientData  !is_numeric($cmpId) <<');
    }

    $peopleClientData['cpl_cmp_id'] = $cmpId;
    $peopleClientData['cpl_designation'] = $this->input->post('cli_cpl_designation');
    $peopleClientData['cpl_remark'] = $this->input->post('cli_cpl_remark');
    return $peopleClientData;
  }

  function peopleVendorData()
  {
    $peopleVendorData = array();
    $cmpId = $this->input->post('vdr_cmp_id');
    if (!is_numeric($cmpId))
    {
      log_message('nexlog', 'people_model::peopleVendorData  !is_numeric($cmpId) >>');
      $compData = array();
      $compData['cmp_name'] = $this->input->post('vdr_cmp_id');
      $compData['cmp_gst_no'] = $this->input->post('vdr_cmp_gst_no');
      $compData['cmp_stm_id'] = $this->input->post('vdr_cmp_state');
      $compData['cmp_payment_terms'] = $this->input->post('vdr_cmp_payment_terms');
      $cmpId = $this->checkDataExistsByType($compData, 'company');
      $compVendorData = array();
      $compVendorData['vdr_cmp_id'] = $cmpId;
      log_message('nexlog', 'compVendorData : ' . json_encode($compVendorData));
      $vdrcompany = $this->checkDataExistsByType($compVendorData, 'vendor');
      log_message('nexlog', ' vdrCmpId : ' . $vdrcompany);
      log_message('nexlog', 'people_model::peopleVendorData  !is_numeric($cmpId) <<');
    }

    $peopleVendorData['cpl_cmp_id'] = $cmpId;
    $peopleVendorData['cpl_designation'] = $this->input->post('vdr_cpl_designation');
    $peopleVendorData['cpl_remark'] = $this->input->post('vdr_cpl_remark');
    return $peopleVendorData;
  }

  function peopleEventData()
  {
    $peopleEventData = array();
    $eventId = $this->input->post('epl_evt_id');
    log_message('nexlog', 'people_model::peopleEventData  !is_numeric($eventId) >>');
    $eventData = array();
    $eventData['evt_name'] = $this->input->post('epl_evt_id');
    $eventData['evt_date'] = date('Y-m-d');
    $eventData['evt_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
    log_message('nexlog', ' eventData : ' . json_encode($eventData));
    $eventId = $this->checkDataExistsByType($eventData, 'event');
    log_message('nexlog', ' eventId : ' . $eventId);
    log_message('nexlog', 'people_model::peopleEventData  !is_numeric($eventId) <<');

    $peopleEventData['epl_evt_id'] = $eventId;
    $peopleEventData['epl_remark'] = $this->input->post('epl_remark');
    return $peopleEventData;
  }

  function peopleTeamData()
  {
    $peopleTeamData = array();
    $peopleTeamData['emp_dept'] = $this->input->post('emp_dept');
    $peopleTeamData['emp_code'] = $this->input->post('emp_code');
    $peopleTeamData['emp_designation'] = $this->input->post('emp_designation');
    return $peopleTeamData;
  }

  function peopleAdditionalData()
  {
    $adt_adm_id = $this->input->post('adt_adm_id');
    $adt_value = $this->input->post('adt_value');
    $data = array(); // To add data to array from index 0 (Prevent blank entries)
    for ($i = 0; $i < count($adt_adm_id); $i++)
    {
      $data[$i]['adt_adm_id'] = $adt_adm_id[$i];
      $data[$i]['adt_value'] = $adt_value[$i];
    }

    return $data;
  }

  function getTagsId($tgs_id)
  {
    $tags_value = '';
    $tagsId = '';
    if ($tgs_id != '')
    {
      log_message('nexlog', 'people_model::getTagsId >>');
      $tagsArray = explode(",", $tgs_id);
      log_message('nexlog', 'tags from input >>' . json_encode($tagsArray));
      for ($i = 0; $i < count($tagsArray); $i++)
      {
        if (is_numeric($tagsArray[$i]))
        {
          log_message('nexlog', 'tag already present :' . $tagsArray[$i]);
          $tags_value.= $tagsArray[$i] . ',';
        }
        else
        {

          // ******* Tags Check *******//

          $tagsCheckSql = "SELECT count(*) tags_count,tgs_id from tags where tgs_name LIKE '%" . $tagsArray[$i] . "%' ";
          log_message('nexlog', 'tagsCheckSql : ' . $tagsCheckSql);
          $tagsCheckResult = $this->home_model->executeSqlQuery($tagsCheckSql, 'row');
          log_message('nexlog', 'tagsCheckResult : ' . json_encode($tagsCheckResult));
          log_message('nexlog', '$tagsCheckResult->tags_count : ' . $tagsCheckResult->tags_count);
          if ($tagsCheckResult->tags_count > 0)
          {
            log_message('nexlog', '$tagsCheckResult->tags_count > 0: ' . $tagsCheckResult->tags_count . ' >> ');
            $tags_value.= $tagsCheckResult->tgs_id . ',';
            log_message('nexlog', 'tags_value : ' . $tags_value);
            log_message('nexlog', '$tagsCheckResult->tags_count > 0: ' . $tagsCheckResult->tags_count . ' << ');
          }
          else
          {
            log_message('nexlog', '$tagsCheckResult->tags_count  < 0 : ' . $tagsCheckResult->tags_count . ' >> ');
            $tagsInsert = array();
            $tagsInsert['tgs_name'] = $tagsArray[$i];
            $tagsInsert['tgs_status'] = ACTIVE_STATUS;
            $tagsInsertId = $this->home_model->insert('tags', $tagsInsert);
            $tags_value.= $tagsInsertId . ',';
            log_message('nexlog', 'new tag value : ' . $tagsArray[$i] . ' || id :' . $tagsInsertId);
            log_message('nexlog', '$tagsCheckResult->tags_count  < 0 : ' . $tagsCheckResult->tags_count . ' << ');
          }

          // ******* Tags Check *******//

        }
      }

      log_message('nexlog', 'tags : ' . $tags_value);
      log_message('nexlog', 'people_model::getTagsId <<');
    }

    if ($tags_value != '')
    {
      $tagsId = rtrim($tags_value, ",");
    }

    return $tagsId;
  }

  public

  function getPeopleList($resType, $dataOptn = '')
  {
    $pplSqlQuery = "SELECT  ppl_id,
    fnGetPeopleNameByID(ppl_id) ppl_name,
    ppl_crdt_dt,ppl_managed_by,
    IFNULL((DATE_FORMAT(ppl_met_on, '%d-%M-%Y')),'') ppl_met_on_dt,
    fnGetPeopleNameByID(ppl_managed_by) ppl_managed_name,
    -- (select group_concat(cpl_designation) from cmp_people where cpl_ppl_id = ppl_id) cpl_designation_name,
    (SELECT cpl_designation from cmp_people where cpl_ppl_id=ppl_id and cpl_status ='" . ACTIVE_STATUS . "' order by cpl_crdt_dt LIMIT 1) cpl_designation,
    (select group_concat(gnp_name) from gen_prm where gnp_group = 'cpl_designation' and gnp_value in (select cpl_designation from cmp_people where cpl_ppl_id = ppl_id)) cpl_designation_name, 
    (select group_concat(cmp_name) from company where cmp_id in (select cpl_cmp_id from cmp_people where cpl_ppl_id = ppl_id)) cmp_name, 
    (SELECT pct_value FROM `people_contact` where pct_ppl_id=ppl_id and pct_type='" . CONTACT_EMAIL . "' LIMIT 1) ppl_email,
    (SELECT pct_value FROM `people_contact` where pct_ppl_id=ppl_id and pct_type='" . CONTACT_MOBILE . "' LIMIT 1) ppl_mob,
    (DATE_FORMAT(ppl_crdt_dt, '%D %M %Y')) ppl_crdt_date " . checkPrivate('people-dashboard', 'ppl_crdt_by') . "
    from people where ppl_status IN (" . ACTIVE_STATUS . ")";

    // print_r($dataOptn);

    if (isset($dataOptn['people_tags']) && $dataOptn['people_tags'] != 'null')
    {
      $pplSqlQuery.= "  and ppl_tgs_id IN (" . $dataOptn['people_tags'] . ")";
    } 

    if (isset($dataOptn['people_filter']) && $dataOptn['people_filter'] != 'null')
    {
      if($dataOptn['people_filter'] == 'clients')
        $pplSqlQuery.= " and ppl_id IN (select cpl_ppl_id from cmp_people where cpl_status = ".ACTIVE_STATUS." and cpl_cmp_id in (select cmp_id from company where cmp_type_id = ".COMPANY_TYPE_ACCOUNT." and cmp_status = ".ACTIVE_STATUS."))";

      if($dataOptn['people_filter'] == 'connects')
        $pplSqlQuery.= " and ppl_id IN (select cpl_ppl_id from cmp_people where cpl_status = ".ACTIVE_STATUS." and cpl_cmp_id in (select cmp_id from company where cmp_type_id = ".COMPANY_TYPE_COMPANY." and cmp_status = ".ACTIVE_STATUS."))";
    } 

    $pplSqlQuery.= " ORDER BY ppl_crdt_dt DESC";

    $queryResult = $this->home_model->executeDataTableSqlQuery($pplSqlQuery, $resType, $dataOptn);
    return $queryResult;
  }

  public

  function getPeopledataById($ppl_id, $dataOptn = '')
  {
    log_message('nexlog', 'people_model::getPeopledataById >>');
    $pplSqlQuery = "SELECT  *,
                        (DATE_FORMAT(ppl_met_on, '%D %M %Y')) ppl_met_on_dt,
                        (DATE_FORMAT(ppl_dob, '%D %M %Y')) ppl_dob_dt,
                        (DATE_FORMAT(ppl_crdt_dt, '%D %M %Y')) ppl_crdt_date,
                        (SELECT pct_value FROM `people_contact` where pct_ppl_id=ppl_id and pct_type='" . CONTACT_EMAIL . "' and pct_primary='" . ACTIVE_STATUS . "' and pct_status='" . ACTIVE_STATUS . "') ppl_email,
                        (SELECT pct_value FROM `people_contact` where pct_ppl_id=ppl_id and pct_type='" . CONTACT_MOBILE . "' and pct_primary='" . ACTIVE_STATUS . "' and pct_status='" . ACTIVE_STATUS . "') ppl_mob,
                        (SELECT pct_id FROM `people_contact` where pct_ppl_id=ppl_id and pct_type='" . CONTACT_EMAIL . "' and pct_primary='" . ACTIVE_STATUS . "' and pct_status='" . ACTIVE_STATUS . "') ppl_email_id,
                        (SELECT pct_id FROM `people_contact` where pct_ppl_id=ppl_id and pct_type='" . CONTACT_MOBILE . "' and pct_primary='" . ACTIVE_STATUS . "' and pct_status='" . ACTIVE_STATUS . "') ppl_mob_id,
                        (select gnp_name from gen_prm where gnp_group = 'ppl_gender' and gnp_value = ppl_gender) ppl_gender_name,
                        (select gnp_name from gen_prm where gnp_group = 'ppl_title' and gnp_value = ppl_title_id) ppl_title_name,
                        (SELECT ppl_name from people where ppl_id =ppl.ppl_crdt_by) crtd_by_name,
                        (SELECT evt_name from event where evt_id =(SELECT epl_evt_id from event_people where epl_ppl_id=ppl_id ORDER BY epl_crdt_dt ASC LIMIT 1)) event_name,
                        (SELECT DATE_FORMAT(evt_date, '%D %M %Y') from event where evt_id =(SELECT epl_evt_id from event_people where epl_ppl_id=ppl_id ORDER BY epl_crdt_dt ASC LIMIT 1)) event_date,
                        (SELECT count(*) from cmp_people where cpl_ppl_id=ppl_id and cpl_cmp_id NOT IN (SELECT vdr_cmp_id cmp_id from vendor where  vdr_status= '" . ACTIVE_STATUS . "' UNION SELECT cli_cmp_id cmp_id from client where  cli_status= '" . ACTIVE_STATUS . "' )) cmp_ppl_count,
                        (SELECT count(*) from lead where led_ppl_id=ppl_id) led_ppl_count,
                        (SELECT count(*) from event_people where epl_ppl_id=ppl_id) epl_ppl_count,
                        (SELECT count(*) from candidate where cdt_ppl_id=ppl_id) cdt_ppl_count,
                        (SELECT count(*) from employee where emp_ppl_id=ppl_id) emp_ppl_count,
                        (SELECT count(*) from cmp_people where cpl_ppl_id=ppl_id and cpl_cmp_id IN (SELECT cli_cmp_id from client where  cli_status= '" . ACTIVE_STATUS . "' and cli_cmp_id=cpl_cmp_id and cpl_ppl_id=ppl_id)) cli_ppl_count,
                        (SELECT count(*) from cmp_people where cpl_cmp_id IN (SELECT vdr_cmp_id from vendor where  vdr_status= '" . ACTIVE_STATUS . "' and vdr_cmp_id=cpl_cmp_id and cpl_ppl_id=ppl_id)) vdr_ppl_count,
                        (IFNULL((select MIN(ppl_id) from people where ppl_id > '" . $ppl_id . "' and ppl_status='" . ACTIVE_STATUS . "'),(SELECT MIN(ppl_id) from people where ppl_status='" . ACTIVE_STATUS . "'))) next_people,
                        (IFNULL((select MAX(ppl_id) from people where ppl_id < '" . $ppl_id . "' and ppl_status='" . ACTIVE_STATUS . "'),(SELECT MAX(ppl_id) from people where ppl_status='" . ACTIVE_STATUS . "'))) prev_people,
                        fnGetPeopleNameByID(ppl.ppl_managed_by) ppl_managed_by_name,
                        (SELECT cmp_name from company where cmp_id in (SELECT cpl_cmp_id from cmp_people where cpl_ppl_id=ppl_id and cpl_status ='" . ACTIVE_STATUS . "' order by cpl_crdt_dt ) LIMIT 1) company_name,
                        (SELECT cpl_cmp_id from cmp_people where cpl_ppl_id=ppl_id and cpl_status ='" . ACTIVE_STATUS . "' order by cpl_crdt_dt LIMIT 1) company_id,
                        (SELECT cpl_id from cmp_people where cpl_ppl_id=ppl_id and cpl_status ='" . ACTIVE_STATUS . "' order by cpl_crdt_dt LIMIT 1) cpl_id,
                        (select gnp_name from gen_prm where gnp_group = 'cpl_designation' and gnp_value = (SELECT cpl_designation from cmp_people where cpl_ppl_id=ppl_id and cpl_status ='" . ACTIVE_STATUS . "' order by cpl_crdt_dt LIMIT 1)) cpl_designation_name,
                         (SELECT cpl_designation from cmp_people where cpl_ppl_id=ppl_id and cpl_status ='" . ACTIVE_STATUS . "' order by cpl_crdt_dt LIMIT 1) cpl_designation
                        " . checkPrivate('people-dashboard', 'ppl_crdt_by') . "
                         from people ppl where ppl_id='" . $ppl_id . "' ";
    log_message('nexlog', 'pplSqlQuery : ' . $pplSqlQuery);
    $queryResult = $this->home_model->executeSqlQuery($pplSqlQuery, 'row');
    log_message('nexlog', 'queryResult : ' . json_encode($queryResult));
    log_message('nexlog', 'people_model::getPeopledataById <<');
    return $queryResult;
  }

  // ******** People Sub Module List Query Starts Here ******//

  public

  function getPeopleLeadList($ppl_id, $resType, $dataOptn = '')
  {
    $sqlQuery = "Select *,led_id as led_encrypt_id,
        fnGetPeopleNameByID(led_ppl_id) led_ppl_name,
        fnGetPeopleNameByID(led_ref_by) led_ref_by_name,
        fnGetPeopleNameByID(led_managed_by) led_managed_by_name,
        (select gnp_name from gen_prm where gnp_group = 'led_temp' and gnp_value = led_temp) led_temp_name,
        (select gnp_name from gen_prm where gnp_group = 'led_prod' and gnp_value = led_prod) led_prod_name,
        (select gnp_name from gen_prm where gnp_group = 'led_lead_status' and gnp_value = led_lead_status) led_lead_status_name,
        (select gnp_name from gen_prm where gnp_group = 'led_type' and gnp_value = led_type) lead_type_name,
        (select cpn_name from campaign where cpn_id=led_campaign) campaign_name,
        (SELECT lsg_name from lead_stage where lsg_id in (SELECT lps_lsg_id from lead_pipeline_stage where lps_id=led_lead_stage)) led_lead_stage_name
        from lead where led_status = '" . ACTIVE_STATUS . "' ";
    if ($ppl_id != '')
    {
      $sqlQuery.= " and led_ppl_id='" . $ppl_id . "' ";
      $resultType = 'result_array';
    }

    $sqlQuery.= " order by led_crdt_dt desc";
    $queryResult = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
    return $queryResult;
  }

  public

  function getPeopleCandidateList($ppl_id = '', $resType, $dataOptn = '')
  {
    $sqlQuery = "Select cdt_id,cdt_role,cdt_total_exp,cdt_relative_exp,cdt_notice_period,cdt_exp_ctc,cdt_skills, (select gnp_name from gen_prm where gnp_group = 'cdt_role' and gnp_value = cdt_role) cdt_role_name
         from candidate where cdt_status = '" . ACTIVE_STATUS . "' ";
    $resultType = 'result';
    if ($ppl_id != '')
    {
      $sqlQuery.= " and cdt_ppl_id='" . $ppl_id . "' ";
    }

    $sqlQuery.= " order by cdt_crdt_dt desc";
    $result = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
    return $result;
  }

  public

  function peopleTeamDataTablelist($ppl_id = '', $resType, $dataOptn = '')
  {
    $sqlQuery = "Select emp_id,emp_code,emp_designation,
        (SELECT  dpt_name FROM department where dpt_id = emp_dept) emp_dept_name
         from employee where emp_status = '" . ACTIVE_STATUS . "' ";
    $resultType = 'result';
    if ($ppl_id != '')
    {
      $sqlQuery.= " and emp_ppl_id='" . $ppl_id . "' ";
    }

    $sqlQuery.= " order by emp_crdt_dt desc";
    $result = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
    return $result;
  }

  // ******** People Sub Module List Query Ends Here ******//

  function dashboard_detail()
  {
    $ppl_dsh_qry = "select gnp_name, gnp_description from gen_prm where gnp_group = 'people_type' and gnp_status = " . ACTIVE_STATUS." order by gnp_description;";
    $ppl_dsh_list = $this->home_model->executeSqlQuery($ppl_dsh_qry, 'result');

    $ppl_dsh_arr = array(
      //'Clients' => 'select count(cpl_id) total, (select count(distinct cpl_ppl_id) from cmp_people) distnt from cmp_people where cpl_status = ' . ACTIVE_STATUS . ' and cpl_cmp_id in (select cmp_id from company where cmp_type_id = ' . COMPANY_TYPE_COMPANY . ');',
      //'Connects' => 'select count(cpl_id) total, (select count(distinct cpl_ppl_id) from cmp_people) distnt from cmp_people where cpl_status = ' . ACTIVE_STATUS . ' and cpl_cmp_id in (select cmp_id from company where cmp_type_id = ' . COMPANY_TYPE_ACCOUNT . ');',
      /*'Candidate' => 'select count(cdt_id) total, (select count(distinct cdt_ppl_id) from candidate) distnt from candidate where cdt_status = ' . ACTIVE_STATUS . ' ;',*/
      //'Lead' => 'select count(led_id) total, (select count(distinct led_ppl_id) from lead) distnt from lead where led_status = ' . ACTIVE_STATUS . ' ;',
    );
      
    $ppl_dsh_arr = array(
      'Connects' => 'SELECT COUNT(distinct cpl_ppl_id) total, COUNT(distinct cpl_id) distnt FROM cmp_people WHERE cpl_cmp_id IN (SELECT cmp_id FROM company WHERE cmp_type_id = '.COMPANY_TYPE_COMPANY.' and cmp_status = '.ACTIVE_STATUS.') and cpl_status = '.ACTIVE_STATUS,
      'Clients' => 'SELECT COUNT(distinct cpl_ppl_id) total, COUNT(distinct cpl_id) distnt FROM cmp_people WHERE cpl_cmp_id IN (SELECT cmp_id FROM company WHERE cmp_type_id = '.COMPANY_TYPE_ACCOUNT.' and cmp_status = '.ACTIVE_STATUS.') and cpl_status = '.ACTIVE_STATUS,
      'Event_Participants' => 'select count(distinct epl_ppl_id) total, (select count(distinct epl_id) from event_people) distnt from event_people where epl_status = ' . ACTIVE_STATUS . ' ;',
      'Team' => 'select count(emp_id) total, (select count(distinct emp_ppl_id) from employee) distnt from employee where emp_status = ' . ACTIVE_STATUS . ' ;',
      'Lead' => 'select count(distinct led_ppl_id) total, (select count(led_id) from lead) distnt from lead where led_status = ' . ACTIVE_STATUS . ' ;'
    );

    $ppl_dsh_links = array(
      'Clients' => 'people-list-clients',
      'Connects' => 'people-list-connects',
      'Event_Participants' => 'people-event-list',
      'Team' => 'team-list',
      'Lead' => 'lead-list'
      //'Candidate' => 'people-dashboard',
    );

    $ppl_dsh_info = array(
      'Clients' => 'Client Info',
      'Connects' => 'Connects Info',
      'Event_Participants' => 'Event info',
      'Team' => 'Team Info',
      'Lead' => 'Lead Info'
      //'Candidate' => 'people-dashboard',
    );

    $ppl_query = 'select count(ppl_id) total, (select count(distinct ppl_id) from people) distnt from people where ppl_status = '.ACTIVE_STATUS.';';
    $ppl_dsh['People'] = $this->home_model->executeSqlQuery($ppl_query, 'result') [0];
    $ppl_dsh['People']->link = 'people-list';
    $ppl_dsh['People']->info = 'People Info';

    for ($i = 0; $i < count($ppl_dsh_list); $i++)
    {
      if (isset($ppl_dsh_arr[$ppl_dsh_list[$i]->gnp_name]))
      {
        $query = $ppl_dsh_arr[$ppl_dsh_list[$i]->gnp_name];
        $ppl_dsh[$ppl_dsh_list[$i]->gnp_name] = $this->home_model->executeSqlQuery($query, 'result') [0];
        $ppl_dsh[$ppl_dsh_list[$i]->gnp_name]->link = $ppl_dsh_links[$ppl_dsh_list[$i]->gnp_name];
        $ppl_dsh[$ppl_dsh_list[$i]->gnp_name]->info = $ppl_dsh_info[$ppl_dsh_list[$i]->gnp_name];
      }
    }

    return $ppl_dsh;
  }

  function company_dashboard_detail()
  {
    $ppl_dsh = array();

    $ppl_dsh_arr = array(
      'Clients' => 'select count(cmp_id) total, (select count(distinct cmp_id) from company where cmp_status = '.ACTIVE_STATUS.' and cmp_type_id = ' . COMPANY_TYPE_COMPANY.') distnt from company where cmp_type_id = ' . COMPANY_TYPE_COMPANY . ' and cmp_status = ' . ACTIVE_STATUS,
      'Accounts' => 'select count(cmp_id) total, (select count(distinct cmp_id) from company where cmp_status = '.ACTIVE_STATUS.' and cmp_type_id = ' . COMPANY_TYPE_ACCOUNT.') distnt from company where cmp_type_id = ' . COMPANY_TYPE_ACCOUNT . ' and cmp_status = ' . ACTIVE_STATUS,
      'All' => 'select count(cmp_id) total, (select count(distinct cmp_id) from company where cmp_status = '.ACTIVE_STATUS.') distnt from company where cmp_status = ' . ACTIVE_STATUS
    );

    $ppl_dsh_links = array(
      'Clients'   => 'company-list',
      'Accounts'  => 'account-list',
      'All'       => 'company-list'
    );

    $ppl_dsh_info = array(
      'Clients'   => 'Company info',
      'Accounts'  => 'Account Info',
      'All'       => 'All info'
    );

    $ppl_arr_keys = array_keys($ppl_dsh_arr);

    for ($i = 0; $i < count($ppl_dsh_arr); $i++)
    {
      if (isset($ppl_dsh_arr[$ppl_arr_keys[$i]]))
      {
        $query = $ppl_dsh_arr[$ppl_arr_keys[$i]];
        $ppl_dsh[$ppl_arr_keys[$i]] = $this->home_model->executeSqlQuery($query, 'result') [0];

        $ppl_dsh[$ppl_arr_keys[$i]]->link = $ppl_dsh_links[$ppl_arr_keys[$i]];
        $ppl_dsh[$ppl_arr_keys[$i]]->info = $ppl_dsh_info[$ppl_arr_keys[$i]];
      }
    }

    return $ppl_dsh;
  }

  public

  function people_event_getlist($ppl_id = '', $resType, $dataOptn = '')
  {
    $sqlQuery = "select
        epl_id, epl_evt_id,fnNextasyDateTime(epl_crdt_dt) epl_crdt_dt,
        epl_evt_id as evt_id_encrypt,
        (select evt_id from event where epl_evt_id = evt_id) evt_id,
        (select evt_desc from event where epl_evt_id = evt_id) evt_desc,
        (select ppl_id from people where epl_ppl_id = ppl_id) ppl_id,
        (select evt_name from event where epl_evt_id = evt_id) event_name,
        fnGetPeopleNameByID(epl_ppl_id) people_name,
        fnNextasyDate((select evt_date from event where epl_evt_id = evt_id)) event_date,
        (select ppl_name from people where ppl_id = (select evt_crdt_by from event where epl_evt_id = evt_id) and ppl_status = 1) event_crtd_by
         from event_people where epl_status = '" . ACTIVE_STATUS . "' and (select evt_status from event where epl_evt_id = evt_id) = '" . ACTIVE_STATUS . "' ";
    if ($ppl_id != '')
    {
      $sqlQuery.= " and epl_ppl_id='" . $ppl_id . "' ";
    }

    $sqlQuery.= " order by epl_crdt_dt desc";
    $result = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
    return $result;
  }

  public

  function people_company_getlist($ppl_id = '', $type = '', $resType, $dataOptn = '')
  {
    /*$sqlQuery = "Select cpl_id,cpl_cmp_id,cpl_designation,cpl_ppl_id,
        (SELECT cmp_name from company where cmp_id = cpl.cpl_cmp_id) cmp_name,
        (SELECT cmp_website from company where cmp_id = cpl.cpl_cmp_id) cmp_website,
        (SELECT ppl_name from people where ppl_id=cpl_ppl_id) ppl_name,
        (SELECT  date_format(ppl_met_on, '%d/%m/%Y %h:%i %p') from people where ppl_id=cpl_ppl_id) ppl_met_on,
        (SELECT pct_value from people_contact where  pct_type='" . CONTACT_MOBILE . "' and pct_primary='" . ACTIVE_STATUS . "' and pct_ppl_id=cpl_ppl_id) cpl_email,
        (SELECT pct_value from people_contact where pct_type='" . CONTACT_EMAIL . "' and pct_primary='" . ACTIVE_STATUS . "' and pct_ppl_id=cpl_ppl_id) cpl_mob
        from cmp_people cpl
        where cpl_status = '" . ACTIVE_STATUS . "' ";*/

      $sqlQuery = "select cpl_cmp_id cmp_id, cpl_ppl_id cmp_ppl_id,
        (select cmp_name from company where cmp_id = cpl_cmp_id and cpl_status = ".ACTIVE_STATUS.") cmp_name,
        (select cmp_employee from company where cmp_id = cpl_cmp_id and cpl_status = ".ACTIVE_STATUS.") cmp_employee,
        (SELECT gnp_name FROM gen_prm WHERE gnp_value=(select cmp_industry from company where cmp_id = cpl_cmp_id and cpl_status = ".ACTIVE_STATUS.") and gnp_group = 'cmp_industry_type' AND gnp_status = " . ACTIVE_STATUS . ") cmp_industry_name,
        (SELECT gnp_name FROM gen_prm WHERE gnp_value=(select cmp_type from company where cmp_id = cpl_cmp_id and cpl_status = ".ACTIVE_STATUS.") and gnp_group = 'cmp_type' AND gnp_status = " . ACTIVE_STATUS . ") cmp_type_name
        from cmp_people cpl
        where cpl_status = '" . ACTIVE_STATUS . "' ";

    if ($ppl_id != '')
    {
      $sqlQuery.= " and cpl_cmp_id in (select cpl_cmp_id from cmp_people where cpl_ppl_id='" . $ppl_id . "') and cpl_ppl_id='" . $ppl_id . "' ";
      switch ($type)
      {
        case 'client':
          $sqlQuery.= " and cpl_cmp_id IN (SELECT cli_cmp_id from client where  cli_status= '" . ACTIVE_STATUS . "' ) ";
          break;

        case 'vendor':
          $sqlQuery.= " and cpl_cmp_id IN (SELECT vdr_cmp_id from vendor where  vdr_status= '" . ACTIVE_STATUS . "' ) ";
          break;

        case 'company':
          $sqlQuery.= " and cpl_cmp_id NOT IN (SELECT vdr_cmp_id cmp_id from vendor where  vdr_status= '" . ACTIVE_STATUS . "' UNION SELECT cli_cmp_id cmp_id from client where  cli_status= '" . ACTIVE_STATUS . "' )";
          break;

        default:

        // code...

        break;
      }
    }

    $sqlQuery.= " order by cpl_crdt_dt desc";

    $result = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
    return $result;
  }

  public

  function peopleUpdate($ppl_id)
  {
    log_message('nexlog', 'people_model::peopleUpdate >>');

    // ******* People Data Starts Here *********//

    log_message('nexlog', ' people data >>');
    $peopleData = array();
    $peopleData = $this->peopleData();
    $ppl_email_id = $this->input->post('ppl_email_id');
    $ppl_mob_id = $this->input->post('ppl_mob_id');
    $ppl_email = $this->input->post('ppl_email');
    $ppl_mobile = $this->input->post('ppl_mobile');
    $peopleData['ppl_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
    $pplId = $this->home_model->update('ppl_id', $ppl_id, $peopleData, 'people');
    log_message('nexlog', ' people id : ' . $pplId);
    log_message('nexlog', ' people data : ' . json_encode($peopleData));
    log_message('nexlog', ' people data <<');

    // ******* People Contact Data Starts Here *******//

    if ($ppl_email_id != '')
    {
      log_message('nexlog', ' ppl_email_id != "" >>');
      log_message('nexlog', ' ppl_email_id : ' . $ppl_email_id);

      // ******* Email Starts Here *******//

      $peopleEmailData['pct_value'] = $this->input->post('ppl_email');
      $peopleEmailData['pct_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
      $pplEmail = $this->home_model->update('pct_id', $ppl_email_id, $peopleEmailData, 'people_contact');

      // ******* Email Ends Here *******//

      log_message('nexlog', ' peopleEmailData : ' . json_encode($peopleEmailData));
      log_message('nexlog', ' ppl_email_id != "" <<');
    }
    else
    if ($ppl_email != '')
    {
      log_message('nexlog', ' ppl_email != "" >>');

      // ******* Email Starts Here *******//

      $peopleEmailData['pct_type'] = CONTACT_EMAIL;
      $peopleEmailData['pct_ppl_id'] = $ppl_id;
      $peopleEmailData['pct_value'] = $this->input->post('ppl_email');
      $peopleEmailData['pct_active'] = ACTIVE_STATUS;
      $peopleEmailData['pct_primary'] = ACTIVE_STATUS; // ACTIVE_STATUS = primary
      $peopleEmailData['pct_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
      $pplEmailId = $this->home_model->insert('people_contact', $peopleEmailData);

      // ******* Email Ends Here *******//

      log_message('nexlog', ' peopleEmailData : ' . json_encode($peopleEmailData));
      log_message('nexlog', ' ppl_email != "" <<');
    }

    if ($ppl_mob_id != '')
    {
      log_message('nexlog', ' ppl_mob_id != "" >>');
      log_message('nexlog', ' ppl_mob_id : ' . $ppl_mob_id);

      // ******* Mobile Starts Here *******//

      $peopleMobData['pct_value'] = $this->input->post('ppl_mobile');
      $peopleMobData['pct_updt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
      $pplMobile = $this->home_model->update('pct_id', $ppl_mob_id, $peopleMobData, 'people_contact');

      // ******* Mobile Ends Here *******//

      log_message('nexlog', ' peopleEmailData : ' . json_encode($peopleEmailData));
      log_message('nexlog', ' ppl_mob_id != "" <<');
    }
    else
    if ($ppl_mobile != '')
    {
      log_message('nexlog', ' ppl_mobile != "" >>');

      // ******* Mobile Starts Here *******//

      $peopleMobData['pct_type'] = CONTACT_MOBILE;
      $peopleMobData['pct_ppl_id'] = $ppl_id;
      $peopleMobData['pct_value'] = $this->input->post('ppl_mobile');
      $peopleMobData['pct_active'] = ACTIVE_STATUS;
      $peopleMobData['pct_primary'] = ACTIVE_STATUS; // ACTIVE_STATUS = primary
      $peopleMobData['pct_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
      $pplMobileId = $this->home_model->insert('people_contact', $peopleMobData);

      // ******* Mobile Ends Here *******//

      log_message('nexlog', ' peopleMobData : ' . json_encode($peopleMobData));
      log_message('nexlog', ' ppl_mobile != "" <<');
    }

    log_message('nexlog', 'people_model::peopleUpdate <<');
    return $pplId;
  }

  public

  function sendMailtoPeople($ppl_id)
  {
    $emaildata['people'] = $this->getPeopledataById($ppl_id);
    $emaildata['company_profile'] = $this->getCompanyprofileData($this->session->userdata(PEOPLE_SESSION_ID));
    if (!empty($emaildata['company_profile']))
    {
      $emaildata['doc_attach'] = $this->getCompanyprofileAttach($emaildata['company_profile']->cpf_id);
    }

    $emaildata['doc_attach_path'] = COMPANY_PROFILE_PATH;
    $emaildata['people_company_name'] = $this->home_model->getBusinessParamData(COMPANY_NAME);
    $emaildata['email'] = $emaildata['people']->ppl_email;
    $admin_email_data = $this->home_model->getBusinessParamData(ADMIN_EMAIL);
    $admin_email = PEOPLE_ADMIN_EMAIL;
    if (!empty($admin_email_data))
    {
      if (isset($admin_email_data->bpm_value))
      {
        $admin_email = $admin_email_data->bpm_value;
      }
    }

    $emaildata['email_cc'] = $admin_email;
    if (isset($emaildata['company_profile']->cpf_subject) && $emaildata['company_profile']->cpf_subject != '')
    {
      $emaildata['subject'] = $emaildata['company_profile']->cpf_subject;
    }
    else
    {
      $emaildata['subject'] = PEOPLE_EMAIL_NO_SUBJECT;
    }

    $emaildata['message'] = '';
    $emaildata['template'] = PEOPLE_MAIL_HTML_PATH . 'people_mail';
    $reply_to_data = $this->home_model->getBusinessParamData(REPLY_TO_EMAIL);
    $reply_to = EASYNOW_REPLY_TO_EMAIL;
    if (!empty($reply_to_data))
    {
      if (isset($reply_to_data->bpm_value))
      {
        $reply_to = $reply_to_data->bpm_value;
      }
    }
    $emaildata['reply_to'] = $reply_to;

    $email_attach = '';
    $emaildata['attachment'] = $email_attach;
    $email = $this->home_model->sendMail($emaildata);
    return true;
  }

  public

  function checkPeopleContact($pct_type, $pct_value, $pct_id = '')
  {
    log_message('nexlog', 'people_model::checkPeopleContact >>');
    $sqlQuery = "SELECT COUNT(*) as count FROM people_contact where pct_status='" . ACTIVE_STATUS . "' and pct_type='" . $pct_type . "' and pct_value='" . $pct_value . "' and pct_primary='" . ACTIVE_STATUS . "' and (select ppl_status from people where ppl_id = pct_ppl_id) = ".ACTIVE_STATUS."";
    if ($pct_id != '')
    {
      $sqlQuery.= " and pct_id !='" . $pct_id . "'";
    }

    log_message('nexlog', ' sqlQuery : ' . $sqlQuery);
    $row = $this->home_model->executeSqlQuery($sqlQuery, 'row');
    log_message('nexlog', ' row : ' . json_encode($row));
    log_message('nexlog', 'people_model::checkPeopleContact <<');
    return $row;
  }

  public

  function peopleUsernameValidation($username)
  {
    log_message('nexlog', 'people_model::checkPeopleUsername >>');
    $sqlQuery = "SELECT COUNT(*) as count FROM people where ppl_status='" . ACTIVE_STATUS . "' and ppl_username='" . $username . "'";
    log_message('nexlog', ' sqlQuery : ' . $sqlQuery);
    $row = $this->home_model->executeSqlQuery($sqlQuery, 'row');
    log_message('nexlog', ' row : ' . json_encode($row));
    log_message('nexlog', 'people_model::checkPeopleContact <<');
    return $row;
  }

  public

  function updateLoginData()
  {
    $pplData = true;
    $ppl_id = $this->input->post('ppl_id');
    $peopleLoginType = $this->input->post('ppl_login_type');
    $peopleLoginDept = $this->input->post('ppl_login_dept');
    $peopleLoginUserName = $this->input->post('ppl_username');
    $peopleLoginData = array();

    // ****** Login Type **********//

    if ($peopleLoginDept == '' && $peopleLoginUserName == '')
    {
      $peopleLoginData['ppl_login_type'] = removeLastCharacter($peopleLoginType, ',');
    }

    // ****** Login Type **********//
    // ****** Login Department **********//

    if ($peopleLoginType == '' && $peopleLoginUserName == '')
    {
      $peopleLoginData['ppl_login_dept'] = removeLastCharacter($peopleLoginDept, ',');
    }

    // ****** Login Department **********//

    if ($peopleLoginUserName != '')
    {

      // ****** Login username **********//

      $peopleLoginData['ppl_username'] = $peopleLoginUserName;

      // ****** Login username **********//

    }

    if (!empty($peopleLoginData))
    {
      $pplData = $this->home_model->update('ppl_id', $ppl_id, $peopleLoginData, 'people');
    }

    return $pplData;
  }

  public

  function contactDetailsUpdate()
  {
    $pct_id = $this->input->post('pct_id');
    $peopleContactData = array();
    $peopleContactData['pct_type'] = $this->input->post('pct_type');
    $peopleContactData['pct_ppl_id'] = $this->input->post('pct_ppl_id');
    $peopleContactData['pct_value'] = $this->input->post('pct_value');

    // $peopleContactData['pct_contact_type'] = $this->input->post('pct_contact_type');

    $peopleContactData['pct_active'] = $this->input->post('pct_active');
    if ($pct_id == '')
    {
      $pplContactId = $this->home_model->insert('people_contact', $peopleContactData);
    }
    else
    {
      $pplContactId = $this->home_model->update('pct_id', $pct_id, $peopleContactData, 'people_contact');
    }

    return true;
  }

  public

  function checkDataExistsByType($customData, $type)
  {
    log_message('nexlog', 'people_model::checkDataExistsByType >>');
    $type_id = 0;
    $checkResult = (object)array();
    switch ($type)
    {
    case 'company':
      if (is_numeric($customData['cmp_name']))
      {
        $checkResult->data_count = 1;
        $checkResult->cmp_id = $customData['cmp_name'];
      }
      else
      {
        $checkSql = "SELECT *,count(*) data_count from company where cmp_name LIKE '" . trim($customData['cmp_name']) . "' and cmp_status='" . ACTIVE_STATUS . "' ";
        $checkResult = $this->home_model->executeSqlQuery($checkSql, 'row');
      }

      if ($checkResult->data_count > 0)
      {
        $type_id = $checkResult->cmp_id;
      }
      else
      {
        $customData['cmp_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
        $type_id = $this->home_model->insert('company', $customData);
      }

      break;

    case 'client':
      $checkSql = "SELECT cli_cmp_id,count(*) data_count from client where cli_cmp_id = (SELECT cmp_id from company where cmp_id = '" . $customData['cli_cmp_id'] . "' and cmp_status='" . ACTIVE_STATUS . "' LIMIT 1) ";
      $checkResult = $this->home_model->executeSqlQuery($checkSql, 'row');
      if ($checkResult->data_count > 0)
      {
        $type_id = $checkResult->cli_cmp_id;
      }
      else
      {
        $customData['cli_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
        $type_id = $this->home_model->insert('client', $customData);
      }

      break;

    case 'vendor':
      $checkSql = "SELECT vdr_cmp_id,count(*) data_count from vendor where vdr_cmp_id = (SELECT cmp_id from company where cmp_id = '" . $customData['vdr_cmp_id'] . "' and cmp_status='" . ACTIVE_STATUS . "' LIMIT 1) ";
      $checkResult = $this->home_model->executeSqlQuery($checkSql, 'row');
      if ($checkResult->data_count > 0)
      {
        $type_id = $checkResult->vdr_cmp_id;
      }
      else
      {
        $customData['vdr_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
        $type_id = $this->home_model->insert('vendor', $customData);
      }

      break;

    case 'event':

      if (is_numeric($customData['evt_name']))
      {
        $checkResult->data_count = 1;
        $checkResult->evt_id = $customData['evt_name'];
      }
      else
      {
        $checkSql = "SELECT *,count(*) data_count from event where evt_name LIKE '" . $customData['evt_name'] . "' and evt_status='" . ACTIVE_STATUS . "' ";
        $checkResult = $this->home_model->executeSqlQuery($checkSql, 'row');
      }

      if ($checkResult->data_count > 0)
      {
        $type_id = $checkResult->evt_id;
      }
      else
      {
        $customData['evt_crdt_by'] = $this->session->userdata(PEOPLE_SESSION_ID);
        $type_id = $this->home_model->insert('event', $customData);
      }

      break;

    default:
      $type_id = 0;
      break;
    }

    log_message('nexlog', ' checkResult : ' . json_encode($checkResult));
    log_message('nexlog', 'people_model::checkDataExistsByType <<');
    return $type_id;
  }

  public

  function getPeopleContactDataById($ppl_id = '')
  {
    $sqlQuery = "Select *,
        (select gnp_name from gen_prm where gnp_group = 'active_status' and gnp_value = pct_active) pct_active_name,
        (select gnp_name from gen_prm where gnp_group = 'people_contact_type' and gnp_value = pct_contact_type) pct_contact_type_name
         from people_contact where pct_ppl_id = '" . $ppl_id . "' and pct_status='" . ACTIVE_STATUS . "' and pct_primary!='" . ACTIVE_STATUS . "' order by pct_type asc";
    $result = $this->home_model->executeSqlQuery($sqlQuery, 'result');
    return $result;
  }

  public

  function getTotalTeamMembers()
  {
    $peopleSql = " SELECT COUNT(*) no_of_users from people where ppl_status='" . ACTIVE_STATUS . "' and ppl_login_dept IN (" . PEOPLE_LOGIN_TEAM . ")";
    $result = $this->home_model->executeSqlQuery($peopleSql, 'row');
    return $result;
  }

  public

  function companyProfileUpdate()
  {
    $cpf_id = $this->input->post('cpf_id');
    $companyProfile = array();
    $companyProfile['cpf_ppl_id'] = $this->input->post('cpf_ppl_id');
    $companyProfile['cpf_subject'] = $this->input->post('cpf_subject');
    $companyProfile['cpf_desc'] = $this->input->post('cpf_desc');
    if ($cpf_id == '')
    {
      $companyProfileId = $this->home_model->insert('company_profile', $companyProfile);
    }
    else
    {
      $companyProfileId = $this->home_model->update('cpf_id', $cpf_id, $companyProfile, 'company_profile');;
    }

    // ************** IMAGE INSERT *************//

    $file_count = $this->input->post('file_count');
    $imageData = array();
    if ($file_count > 0)
    {
      for ($k = 0; $k < $file_count; $k++)
      {
        log_message('nexlog', 'image >> $this->upload_image for loop i :' . $k);
        $imageData[] = array(
          'doc_type' => COMPANY_PROFILE_TYPE,
          'doc_type_id' => $companyProfileId,
          'doc_name' => upload_multiple_doc(COMPANY_PROFILE_PATH, COMPANY_PROFILE_PATH, 'cpl_doc', $k, 'document') ,
          'doc_status' => ACTIVE_STATUS,
          'doc_crdt_by' => $this->session->userdata(PEOPLE_SESSION_ID) ,
          'doc_crdt_dt' => date('Y-m-d H:i:s')
        );
      }

      $docId = $this->db->insert_batch('document', $imageData);
    }

    // ************** IMAGE INSERT *************//

    return $companyProfileId;
  }

  public

  function getCompanyprofileData($prs_id)
  {
    $sqlQuery = "Select *  from company_profile where cpf_status='" . ACTIVE_STATUS . "' and cpf_ppl_id='" . $prs_id . "' ";
    $result = $this->home_model->executeSqlQuery($sqlQuery, 'row');
    return $result;
  }

  public

  function getCompanyprofileAttach($cpf_id)
  {
    $sqlQuery = "Select * from document where doc_status='" . ACTIVE_STATUS . "' and doc_type='" . COMPANY_PROFILE_TYPE . "' and doc_type_id='" . $cpf_id . "' ";
    $result = $this->home_model->executeSqlQuery($sqlQuery, 'result');
    return $result;
  }

  public

  function deleteDoc()
  {
    $doc_id = $this->input->post('doc_id');
    $doc_name = $this->input->post('doc_name');
    $sqlQuery = "DELETE from document where doc_id='" . $doc_id . "'";
    $query = $this->home_model->executeSqlQuery($sqlQuery, '');
    UnlinkFile(COMPANY_PROFILE_PATH . $doc_name);
    return true;
  }

  public

  function sendMailForPasswordReset($people_data = array())
  {
    $subject = $this->home_model->getBusinessParamData(COMPANY_NAME);
    $emaildata['people'] = $this->getPeopledataById($people_data->ppl_id);
    $emaildata['email'] = $emaildata['people']->ppl_email;
    $emaildata['project_name'] = $subject->bpm_value;
    $emaildata['subject'] = FORGET_PASS_SUBJECT . ' | ' . $subject->bpm_value;
    $emaildata['message'] = '';
    $emaildata['link'] = $people_data->link;
    $emaildata['template'] = PEOPLE_MAIL_HTML_PATH . 'forget_password_mail';
    $emaildata['email_cc'] = '';

    // print_r($emaildata);
    // exit;
    // $emaildata['template']              = PEOPLE_MAIL_HTML_PATH.'reset_mail';

    $email = $this->home_model->sendMail($emaildata);
    return true;
  }

  public

  function getForgotpswdTransaction($fpt_ppl_id, $fpt_code)
  {
    $sql = "SELECT * FROM `forgot_password_transaction` WHERE  fpt_ppl_id= '" . $fpt_ppl_id . "' and fpt_code = '" . $fpt_code . "' and fpt_status='" . FPT_ACTIVE . "' and  NOW() <= DATE_ADD(fpt_crtd_dt, INTERVAL " . FPT_LINK_VALIDITY_TIME . ") ORDER BY fpt_id DESC LIMIT 1";
    $query = $this->db->query($sql);
    $row = $query->row();
    return $row;
  }

  public

  function getStateDropdown($search)
  {
    $selectedValue = $this->input->get('selectedValue');
    $selectedSqlCondition = '';
    if ($selectedValue != '')
    {
      $selectedSqlCondition = ' ,IF(stm_id = "' . $selectedValue . '","TRUE","") selected ';
    }

    $genPrmSqlQuery = "SELECT  stm_id as id,stm_name as text " . $selectedSqlCondition . " FROM state_master where stm_status='" . ACTIVE_STATUS . "' ";
    if ($search != '')
    {
      $genPrmSqlQuery.= " and stm_name LIKE '%" . $search . "%'";
    }

    $genPrmSqlQuery.= "ORDER by stm_id ASC";

    // echo $genPrmSqlQuery;

    $resetResult = array(
      'id' => '0',
      'text' => 'Please Select State'
    );
    $queryResult = $this->home_model->executeSqlQuery($genPrmSqlQuery, 'result_array');
      if($search =='')
    {
      array_unshift($queryResult,$resetResult);
    }
    return $result;
  }

  function getPeopleAdditionalDetails()
  {
    $sql_details = "select adc_id, adm_id,adc_category, adm_name, adm_placeholder, gpn_group, adm_type, 
            (SELECT gnp_name FROM gen_prm where gnp_group ='adm_type' and gnp_value=adm_type) adm_type_name 
            from additional_details_category adc
            left join additional_details_master adm on adc.adc_id = adm.adm_adc_id
            left join gen_prm_name gpn on gpn.gpn_id = adm.adm_group
            where adm_id > 0 and adm_status = 1
            order by adm_order";
    $sql_category = "select adc_id, adc_category from additional_details_category 
            where adc_status = 1 
            and adc_id in (select adm_adc_id from additional_details_master) 
            order by adc_order";
    return array(
      'details' => $this->db->query($sql_details)->result() ,
      'category' => $this->db->query($sql_category)->result()
    );
  }

  function getPeopleAdditionalDetailsById($ppl_id)
  {
    $sql_details = "select adt_id, adm_id, adm_placeholder, gpn_group, adm_type, 
    (SELECT gnp_name FROM gen_prm where gnp_group ='adm_type' and gnp_value=adm_type) adm_type_name,
    (SELECT gnp_description FROM gen_prm where gnp_group ='adm_type' and gnp_value=adm_type) adm_desc, 
    adt_ppl_id ppl_id,
    fnGetPeopleNameByID(adt_ppl_id) ppl_name, 
    adt_value, adm_name, adc_id, adc_category,
    CASE
    WHEN (select gnp_value from gen_prm where gnp_group = 'adm_type' and gnp_value = adm_type and gnp_description = 'dropdown') = adm_type THEN 
      (select gnp_name from gen_prm where gnp_group = (select gpn_group from gen_prm_name where gpn_id = adm_group) and gnp_value = adt_value)
    WHEN (select gnp_value from gen_prm where gnp_group = 'adm_type' and gnp_value = adm_type and gnp_description = 'dropdown_multiple') = adm_type THEN 
      (select group_concat(gnp_name) gnp_name from gen_prm where gnp_group = (select gpn_group from gen_prm_name where gpn_id = adm_group) and FIND_IN_SET(gnp_value, adt_value))
    else 
      adt_value
    END as adt_value_name 
    from additional_details adt
    inner join additional_details_master adm on adm.adm_id = adt.adt_adm_id
    inner join additional_details_category adc on adc.adc_id = adm.adm_adc_id
    left join gen_prm_name gpn on gpn.gpn_id = adm.adm_group
    where adt_ppl_id = " . $ppl_id;

    // $sql_category = "select adc_id, adc_category from additional_details_category where adc_status = 1";

    $sql_category = "select adc_id, adc_category from additional_details_category 
            where adc_status = 1 
            and adc_id in (select adm_adc_id from additional_details_master) 
            order by adc_order";
    return array(
      'details' => $this->db->query($sql_details)->result() ,
      'category' => $this->db->query($sql_category)->result()
    );
  }

  function saveAdditionalDetails($data)
  {
    for ($i = 0; $i < count($data); $i++)
    {
      $this->home_model->update('adt_id', $data[$i]['adt_id'], $data[$i], 'additional_details');

      //      $this->home_model->insert('additional_details', $data[$i]);

    }

    return true;
  }

  function update($field, $id, $array, $table)
  {
    $this->db->where($field, $id);
    $this->db->update($table, $array);
    return $id;
  }

  function getPeopleContactType($search)
  {
    $deptSqlQuery = "SELECT  dpt_id as id,dpt_name as text FROM department where dpt_status IN (" . ACTIVE_STATUS . ") ";
    if ($search != '') $deptSqlQuery.= " and dpt_name LIKE '%" . $search . "%' ";
    $deptSqlQuery.= "  ORDER BY dpt_crdt_dt ASC";
    $resetResult = array(
      'id' => '0',
      'text' => 'Please Select Department'
    );
    $queryResult = $this->home_model->executeSqlQuery($deptSqlQuery, 'result');
        if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }
    return $queryResult;
  }

  function getProductTotalAmt($prd_ids)
  {
    $sql = "select sum(prd_price) price from product where prd_id in (" . $prd_ids . ") and prd_status = " . ACTIVE_STATUS;
    return $this->db->query($sql)->row()->price;
  }

  public

  function updatePeopleCustomData()
  {
    $peopleData = $_POST['people_data'];
    $ppl_id = $_POST['people_data']['ppl_id'];
    if (!empty($peopleData))
    {
      $pplData = $this->home_model->update('ppl_id', $ppl_id, $peopleData, 'people');
    }

    return $pplData;
  }

  public

  function getCampaignDropdown($search, $manage = '')
  {
    $peopleSqlQuery = "SELECT  cpn_id as id,cpn_name as text FROM campaign where cpn_status IN (" . ACTIVE_STATUS . ")";
    if ($search != '')
    {
      $peopleSqlQuery.= " and cpn_name LIKE '%" . $search . "%' ";
    }

    $peopleSqlQuery.= "  ORDER BY cpn_crdt_dt ASC";

    // ***** It is used to reset value of select2 ****** //

    $resetResult = array(
      'id' => '0',
      'text' => 'Please Select Campaign'
    );
    $queryResult = $this->home_model->executeSqlQuery($peopleSqlQuery, 'result');
        if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }

    // ***** It is used to reset value of select2 ****** //

    return $queryResult;
  }

  function deletePeopleCompany($cmp_id, $ppl_id)
  {
    $sql = 'update cmp_people set cpl_status = "'.INACTIVE_STATUS.'" where cpl_cmp_id = '.$cmp_id.' and cpl_ppl_id = '.$ppl_id;
    return $this->db->query($sql);
  }
}

?>

