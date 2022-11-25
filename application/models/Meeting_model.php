<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Meeting_model extends CI_Model
{
	/**
	* Instanciar o CI
	*/
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function meeting_getlist($resType, $dataOptn='', $led_id ='')
    {
      $sqlQuery = "select mtg_id, mtg_title,fnGetPeopleNameByID(mtg_host) mtg_host_name,mtg_host,
      (select group_concat(
        concat((select gnp_name from gen_prm where gnp_value=ppl_title_id and gnp_group = 'ppl_title'),' ',ppl_name)
      ) from people where ppl_id in (mtg_people) and ppl_status = ".ACTIVE_STATUS.") mtg_people_names,
      (select gnp_name from gen_prm where gnp_group = 'mtg_status' and gnp_value = mtg_status) mtg_status,
      date_format(mtg_from_dt_time,'%d/%m/%Y %h:%i %p') mtg_from_dt_time_format,
      date_format(mtg_to_dt_time,'%d/%m/%Y %h:%i %p') mtg_to_dt_time_format,
      (select ppl_name from people where ppl_id = mtg_crdt_by) mtg_crdt_by,
      date_format(mtg_crdt_dt,'%d/%m/%Y %h:%i %p') mtg_crdt_dt_format " . checkPrivate('meeting-list', 'mtg_crdt_by') . "
      from meeting";
        $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
  		return $result;
    }
    function getHostByLoginID()
    {
    	$sqlQuery = "select (select ppl_name from people where ppl_id = ".$this->session->userdata(PEOPLE_SESSION_ID).") mtg_host_name,
		(select ".$this->session->userdata(PEOPLE_SESSION_ID).") mtg_host";
		return $this->home_model->executeSqlQuery($sqlQuery,'row');
    }
	public function getMeetingById($mtg_id)
	{
		$sqlQuery = "select *, 
		
		fnGetPeopleNameByID(mtg_host) mtg_host_name,
		(select gnp_name from gen_prm where gnp_group = 'mtg_status' and gnp_value = mtg_status and gnp_status = ".ACTIVE_STATUS.") mtg_status_name,
		fnGetPeopleNameByID((select led_ppl_id from lead where led_id = mtg_lead and led_status = ".ACTIVE_STATUS.")) mtg_led_name,
		(select led_ppl_id from lead where led_id = mtg_lead and led_status = ".ACTIVE_STATUS.") mtg_led_ppl_id,
        (select tsk_title from task where tsk_id = mtg_task and tsk_status = ".ACTIVE_STATUS.") mtg_tsk_name,
		(select cmp_name from company where cmp_id = mtg_act and cmp_status = ".ACTIVE_STATUS.") mtg_act_name,
        
		(select prd_name from product where prd_id = mtg_prod and prd_status = ".ACTIVE_STATUS.") mtg_prd_name,
		(select ppl_name from people where ppl_id = mtg_crdt_by and ppl_status = ".ACTIVE_STATUS.") mtg_crdt_by,
		date_format(mtg_crdt_dt,'%d/%m/%Y %h:%i %p') mtg_crdt_dt_format,
		date_format(mtg_from_dt_time,'%d/%m/%Y %h:%i %p') mtg_from_dt_time_format,
		date_format(mtg_to_dt_time,'%d/%m/%Y %h:%i %p') mtg_to_dt_time_format,
		
		date_format(mtg_crdt_dt,'%d/%m/%Y %h:%i %p') mtg_crdt_dt_format,  
		lower(date_format(mtg_from_dt_time,'%m/%d/%Y %l:%i%p')) mtg_from_dt_format_edit,
		lower(date_format(mtg_to_dt_time,'%m/%d/%Y %l:%i%p')) mtg_to_dt_format_edit,
		(IFNULL((select MIN(mtg_id) from meeting where mtg_id > '".$mtg_id."' and mtg_status = ".ACTIVE_STATUS."),(SELECT MIN(mtg_id) from meeting where mtg_status = ".ACTIVE_STATUS."))) next,
		(IFNULL((select MAX(mtg_id) from meeting where mtg_id < '".$mtg_id."' and mtg_status = ".ACTIVE_STATUS."),(SELECT MAX(mtg_id) from meeting where mtg_status = ".ACTIVE_STATUS."))) prev,
		(select cmp_name from company where cmp_id = mtg_cmp) mtg_cmp_name " . checkPrivate('meeting-list', 'mtg_crdt_by') . "
		from meeting
		where mtg_status = '".ACTIVE_STATUS."' and mtg_id = '".$mtg_id."'";
		return $this->home_model->executeSqlQuery($sqlQuery,'row');
	}
    // ******* Task End Here *********//
    public function getPeopleforDropdown($search,$type = '')
    {
    	$peopleSqlQuery = "";
        switch ($type) {
          case 'team':
          $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (".ACTIVE_STATUS.")
                               and ppl_id In (SELECT emp_ppl_id from employee where emp_dept != '".PEOPLE_ADMIN_DEPT."')";
            break;
          case 'all':
          $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (".ACTIVE_STATUS.")";
            break;
          default:
            // code...
            break;
        }
        if($search !='')
        {
          $peopleSqlQuery.=" and ppl_name LIKE '%".$search."%' ";
        }
        $peopleSqlQuery.="  ORDER BY ppl_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select People');
        $queryResult     = $this->home_model->executeSqlQuery($peopleSqlQuery,'result');
         if($search =='')
        {
          array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    // ******** Company Start Here *******//
  //   public function getCompanyforDropdown($search,$type = '')
  //   {
		// $CompanySqlQuery = "";
  //       switch ($type) {
  //         case 'client':
  //         $CompanySqlQuery = "SELECT cmp_id as id, cmp_name as text from company where cmp_status IN (".ACTIVE_STATUS.")
  //                             and cmp_id in (select  cli_cmp_id from client where cli_status IN (".ACTIVE_STATUS.")) ";
  //           break;
  //         case 'company':
  //         $CompanySqlQuery = "SELECT cmp_id as id, cmp_name as text from company where cmp_status IN (".ACTIVE_STATUS.")";
  //           break;
  //         default:
  //           // code...
  //           break;
  //       }
  //       if($search !='')
  //       {
  //         $CompanySqlQuery.=" and cmp_name LIKE '%".$search."%' ";
  //       }
  //         $CompanySqlQuery.="  ORDER BY cmp_crdt_dt DESC";
  //       // ***** It is used to reset value of select2 ****** //
  //       $resetResult     = array('id'=>'0','text'=>'Please Select Client');
  //       $queryResult     = $this->home_model->executeSqlQuery($CompanySqlQuery,'result');
  //         if($search =='')
     /* {
        array_unshift($queryResult,$resetResult);
      }*/
  //       // ***** It is used to reset value of select2 ****** //
  //       return $queryResult;
  //   }
    public function getAccountforDropdown($search,$type = '')
    {
        
        $CompanySqlQuery = "SELECT cmp_id as id, cmp_name as text from company where cmp_status IN (".ACTIVE_STATUS.") and cmp_type_id = ".$type;
        if($search !='')
        {
          $CompanySqlQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
          $CompanySqlQuery.="  ORDER BY cmp_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Company');
        $queryResult     = $this->home_model->executeSqlQuery($CompanySqlQuery,'result');
          if($search =='')
        {
          array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    // ******** Product Start Here *******//
    public function getProductforDropdown($search)
    {
        $ProductSqlQuery = "SELECT prd_id as id, prd_name as text from product where prd_status IN (".ACTIVE_STATUS.")";
        if($search !='')
        {
          $ProductSqlQuery.=" and prd_name LIKE '%".$search."%' ";
        }
          $ProductSqlQuery.="  ORDER BY prd_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Product');
        $queryResult     = $this->home_model->executeSqlQuery($ProductSqlQuery,'result');
          if($search =='')
        {
          array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    // ******** Task Start Here *******//
    public function getTaskforDropdown($search)
    {
        $TaskSqlQuery = "SELECT tsk_id as id, tsk_title as text from task where tsk_status IN (".ACTIVE_STATUS.")";
        if($search !='')
        {
          $TaskSqlQuery.=" and tsk_name LIKE '%".$search."%' ";
        }
          $TaskSqlQuery.="  ORDER BY tsk_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Task');
        $queryResult     = $this->home_model->executeSqlQuery($TaskSqlQuery,'result');
          if($search =='')
        {
          array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    public function getGenPrmforDropdown($genPrmGroup,$search)
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
    public function getLeadforDropdown($search)
    {
        $ProductSqlQuery = "SELECT led_id as id, (select ppl_name from people where ppl_id = led_ppl_id) text from lead where led_status IN (".ACTIVE_STATUS.")";
        if($search !='')
        {
          $ProductSqlQuery.=" and led_name LIKE '%".$search."%' ";
        }
          $ProductSqlQuery.="  ORDER BY led_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Lead');
        $queryResult     = $this->home_model->executeSqlQuery($ProductSqlQuery,'result');
          if($search =='')
        {
          array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    public function getMeetingAttById($mtg_id)
    {
        $sqlQuery = "select *
        from meeting_att
        where mta_status = '".ACTIVE_STATUS."' and mta_mtg_id = '".$mtg_id."'";
        $result = $this->home_model->executeSqlQuery($sqlQuery,'result');
        return $result;
    }
    public function updateMeetingCustomData()
    {
        if(isset($_POST['field']) && $_POST['field'])
            $cmpData = array($_POST['field'] => $_POST['field_value']);
        else
            $cmpData = $_POST;
       
        $mtg_id = $_POST['mtg_id'];
        if (!empty($cmpData))
          return $this->home_model->update('mtg_id', $mtg_id, $cmpData, 'meeting');
    }
    public function deleteMeeting($mtg_id)
    {
        $sqlm   = "delete from meeting  Where mtg_id = '" . $mtg_id . "'";
        $querym = $this->db->query($sqlm);
        if (!empty($querym) and !empty($querym)) {
            return true;
        }
    }
}