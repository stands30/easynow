<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Additional_details_model extends CI_Model
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    public function getadtCatList($resType,$dataOptn='')
    {
      $pplSqlQuery = "SELECT IFNULL(adc_category,'') adc_category, IFNULL(adc_id,'') adc_id, IFNULL(adc_order,'') adc_order from additional_details_category where adc_status IN (".ACTIVE_STATUS.")";
     
      $queryResult     = $this->home_model->executeDataTableSqlQuery($pplSqlQuery,$resType, $dataOptn);
      return $queryResult;
    }
    public function getadtMasterList($resType,$dataOptn='')
    {
      $pplSqlQuery = "SELECT adm_id,adm_name,adm_placeholder,adm_group,adm_order,
                        (SELECT gnp_name  FROM gen_prm where gnp_group ='adm_type' and gnp_value=adm_type) adm_type_name, 
                        (SELECT gpn_title FROM gen_prm_name where gpn_id = adm_group and adm_group > 0) adm_group_name, 
                        (SELECT adc_category  FROM additional_details_category where adc_id=adm_adc_id) adm_adc_name 
                         from additional_details_master where adm_status IN (".ACTIVE_STATUS.") and (SELECT adc_status FROM additional_details_category where adc_id=adm_adc_id) = ".ACTIVE_STATUS;
     
      $queryResult     = $this->home_model->executeDataTableSqlQuery($pplSqlQuery,$resType, $dataOptn);
      return $queryResult;
    }
     public function getGenPrmforDropdown($genPrmGroup,$search='')
    {
        $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='".$genPrmGroup."' and gnp_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $genPrmSqlQuery.=" and gnp_name LIKE '%".$search."%' ";
        }
        $genPrmSqlQuery.="  ORDER BY gnp_order ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
          if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    public function getAdtCategory($search='')
    {
        $sqlQuery = "SELECT  adc_id as id,adc_category as text FROM additional_details_category where adc_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $sqlQuery.=" and adc_category LIKE '%".$search."%' ";
        }
        $sqlQuery.="  ORDER BY adc_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
          if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    public function getGenPrmGroupName($search='')
    {
        $sqlQuery = "SELECT  gpn_id as id,gpn_title as text FROM gen_prm_name where gpn_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $sqlQuery.=" and gpn_title LIKE '%".$search."%' ";
        }
        $sqlQuery.="  ORDER BY gpn_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
          if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    public function masterUpdate()
    {
      $adm_id           = $this->input->post('adm_id');
      $adm_all_type     = json_decode($this->input->post('adm_all_type'));

      $adtMasterData    = array();
      $adtMasterData['adm_adc_id']        = $this->input->post('adm_adc_id');
      $adtMasterData['adm_type']          = $this->input->post('adm_type');
      $adtMasterData['adm_name']          = $this->input->post('adm_name');
      $adtMasterData['adm_group']         = $this->input->post('adm_group');
      $adtMasterData['adm_order']         = $this->input->post('adm_order');
      $adtMasterData['adm_placeholder']   = $this->input->post('adm_placeholder');

      if($adtMasterData['adm_type'] == $adm_all_type->dropdown || $adtMasterData['adm_type'] == $adm_all_type->dropdown_multiple)
      {
        //$adm_group_value = $this->gnpGroupAdd($adtMasterData['adm_name']);
        //$adm_group = $this->gnpGroupAdd($adtMasterData['adm_name']);
        $adtMasterData['adm_group'] = $this->gnpGroupAdd($adtMasterData['adm_name'], $adtMasterData['adm_group']);
      }

      if($adm_id == '')
      {
          $adtMasterData['adm_crdt_by']       = $this->session->userdata(PEOPLE_SESSION_ID);
         $admData           =  $this->home_model->insert('additional_details_master',$adtMasterData);
      }
      else
      {
         $adtMasterData['adm_updt_by']       = $this->session->userdata(PEOPLE_SESSION_ID);
         $admData           =  $this->home_model->update('adm_id',$adm_id,$adtMasterData,'additional_details_master');
      }
      
      return true;
    }
     public function getadtMasterData($adm_id='')
    {
      $sqlQuery = "SELECT adm_id,adm_name,adm_placeholder,adm_group,adm_adc_id,adm_type,adm_group,adm_order,
                  (SELECT gnp_name FROM gen_prm where gnp_group ='adm_type' and gnp_value=adm_type) adm_type_name,
                  (SELECT gpn_title FROM gen_prm_name where gpn_id = adm_group and adm_group > 0) adm_group_name, 
                  (SELECT adc_category  FROM additional_details_category where adc_id=adm_adc_id) adm_adc_name 
                   from additional_details_master where adm_id='".$adm_id."' ";

      $queryResult  = $this->home_model->executeSqlQuery($sqlQuery,'row');
      return $queryResult;
    }

    function gnpGroupAdd($adm_name, $adm_group_value)
    {
      $adm_group_name = strtolower(str_replace(' ', '_', $adm_group_value));

      if(!is_numeric($adm_group_value))
      {
        $gnpNameSql = "SELECT count(gpn_id) gnp_cnt from gen_prm_name where gpn_group LIKE '%".$adm_group_name."%' ";

        if($this->home_model->executeSqlQuery($gnpNameSql,'row')->gnp_cnt == 0)
        {
          return $this->home_model->insert(
            'gen_prm_name', array(
              'gpn_title' => $adm_name,
              'gpn_group' => $adm_group_name,
              'gpn_status' => ACTIVE_STATUS,
            )
          );
        }
      }

      return $adm_group_value;
    }

    /*function gnpGroupAdd($gnp_group_name)
    {
         $gnp_group_id = $gnp_group_name;
        if($gnp_group_name != '')
        {
            log_message('nexlog','Additional_details_model::gnpGroupAdd >>');
            log_message('nexlog','gnp_group_name from input >>'.$gnp_group_name);
               if(!is_numeric($gnp_group_name))
               {
                 // ******* Gen Prm Group Check *******
                 $gnpNameSql    = "SELECT count(*) gpn_group_count,gpn_id from gen_prm_name where gpn_group LIKE '%".$gnp_group_name."%' ";
                 log_message('nexlog','gnpNameSql : '.$gnpNameSql);
                 $checkResult = $this->home_model->executeSqlQuery($gnpNameSql,'row');
                 log_message('nexlog','checkResult : '.json_encode($checkResult));
                 log_message('nexlog','$checkResult->gpn_group_count : '.$checkResult->gpn_group_count);
                    if($checkResult->gpn_group_count < 0)
                  {
                 log_message('nexlog','$checkResult->gpn_group_count  < 0 : '.$checkResult->gpn_group_count.' >> ');
                        $gpnInsert = array();
                        $gpnInsert['gpn_title']   = $gnp_group_name;
                        $gpnInsert['gpn_group']   = $gnp_group_name;
                        $gpnInsert['gpn_status'] = ACTIVE_STATUS;
                        $gpnInsertId = $this->home_model->insert('gen_prm_name',$gpnInsert);
                        log_message('nexlog','new tag value : '.$gnp_group_name.' || id :'. $gpnInsertId);
                 log_message('nexlog','$checkResult->gpn_group_count  < 0 : '.$checkResult->gpn_group_count.' << ');
                         $gnp_group_id = $gpnInsertId;
                    }
                 // ******* Gen Prm Group Check ******* 
               }
        log_message('nexlog','gnp_group_id : '.$gnp_group_id);
        log_message('nexlog','Additional_details_model::gnpGroupAdd <<');
        }
        return $gnp_group_id;
    }*/

    public function saveAdtCategory($adcCategoryData)
    {
      $adcCategoryData['adc_id'] = $this->nextasy_url_encrypt->decrypt_openssl($adcCategoryData['adc_id']);

      if($adcCategoryData['adc_id'] == '')
      {
        $adcCategoryData['adc_crdt_by']   = $this->session->userdata(PEOPLE_SESSION_ID);
        $admData                        =  $this->home_model->insert('additional_details_category',$adcCategoryData);
      }
      else
      {
        $adcCategoryData['adc_updt_by']   = $this->session->userdata(PEOPLE_SESSION_ID);
        $admData                        =  $this->home_model->update('adc_id',$adcCategoryData['adc_id'],$adcCategoryData,'additional_details_category');
      }
      
      return true;
    }

    function deleteAdtCategory($adc_id)
    {
      $sql = "update additional_details_category set adc_status = 0 where adc_id = '".$adc_id."'";

      $query = $this->db->query($sql);
      if(!empty($query))
      {
        return true;
      }
    }

    function getNextOrder($adc_id)
    {
      $sql = 'select ifnull((max(adm_order) + 1),1) adm_order from additional_details_master where adm_adc_id = '.$adc_id;
      return $this->home_model->executeSqlQuery($sql,'row')->adm_order;
    }

    function deleteMaster($adm_id)
    {
      $sql = "update additional_details_master set adm_status = 0 where adm_id = '".$adm_id."'";

      $query = $this->db->query($sql);
      if(!empty($query))
      {
        return true;
      }
    }
}