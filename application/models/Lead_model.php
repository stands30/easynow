<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Lead_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

	public function getLeadById($led_id)
	{
		$sqlQuery = "
		select *,
		(select ppl_code from people where ppl_id = led_ppl_id) led_ppl_code,
		fnGetPeopleNameByID(led_ppl_id) led_ppl_name,
		(select prd_name from product where prd_id = led_prod) led_prd_name,
        
        (SELECT cpl_cmp_id FROM cmp_people WHERE cpl_cmp_id = led_cmp_id AND cpl_ppl_id = led_ppl_id AND cpl_status = ".ACTIVE_STATUS." and (select cmp_id from company where cmp_id = led_cmp_id and cmp_status = ".ACTIVE_STATUS.")) led_cmp_id,

        (select cmp_name from company where cmp_id = (SELECT cpl_cmp_id FROM cmp_people WHERE cpl_cmp_id = led_cmp_id AND cpl_ppl_id = led_ppl_id AND cpl_status = ".ACTIVE_STATUS." and (select cmp_id from company where cmp_id = led_cmp_id and cmp_status = ".ACTIVE_STATUS."))) led_cmp_name,
		(select pct_value from people_contact where pct_ppl_id = led_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_EMAIL." LIMIT 1) lead_email,
		(select pct_value from people_contact where pct_ppl_id = led_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_MOBILE." LIMIT 1) lead_mobile,
		(select ppl_name from people where ppl_id = led_ref_by) led_ref_by_name,
		(select ppl_name from people where ppl_id = led_crdt_by) led_crdt_by,
		(select ppl_name from people where ppl_id = led_managed_by) led_managed_by_name,
		(select prd_name from product where prd_id = led_prod) led_prod_name,
		(select gnp_name from gen_prm where gnp_group = 'led_temp' and gnp_value = led_temp) led_temp_name,
		(select gnp_name from gen_prm where gnp_group = 'led_src' and gnp_value = led_src) led_src_name,
		(select gnp_name from gen_prm where gnp_group = 'led_lead_status' and gnp_value = led_lead_status) led_lead_status_name,
		(IFNULL((select MIN(led_id) from lead where led_id > '".$led_id."'),(SELECT MIN(led_id) from lead))) next,
		(IFNULL((select MAX(led_id) from lead where led_id < '".$led_id."'),(SELECT MAX(led_id) from lead))) prev,
		(SELECT lsg_name from lead_stage where lsg_id in (SELECT lps_lsg_id from lead_pipeline_stage where lps_id=led_lead_stage)) led_lead_stage_name,
        (select gnp_name from gen_prm where gnp_group = 'led_type' and gnp_value = led_type) lead_type_name,
        (select cpn_name from campaign where cpn_id=led_campaign) campaign_name,
		(select gnp_name from gen_prm where gnp_group = 'led_loss_reason' and gnp_value = led_loss_reason) led_loss_reason_name,
        (SELECT count(qtn_id) from quotation where qtn_led_id=led_id and qtn_status='".ACTIVE_STATUS."') qtn_count
		from lead
		where led_status = '".ACTIVE_STATUS."' and led_id = '".$led_id."'";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');

	/*	$sql = 'select GROUP_CONCAT(prd_name) prd_name_all from product where prd_id in ('.$row->led_prod.')';

		$row->led_prd_name_all = $this->home_model->executeSqlQuery($sql,'row')->prd_name_all;;*/

		return $row;
	}

    public function lead_getlist($resType,$dataOptn='')
    {
        $sqlQuery = "Select *,
        fnGetPeopleNameByID(led_ppl_id) led_ppl_name,
        (select ppl_name from people where ppl_id = led_ref_by) led_ref_by_name,
        (select ppl_name from people where ppl_id = led_managed_by) led_managed_by_name,
        (select cmp_name from company where cmp_id = led_cmp_id) led_cmp_name,
        (select lfp_next_date from lead_follow_up where lfp_next_date > now() and lfp_module_type_id = led_id order by lfp_next_date asc limit 1) next_followup_date,
        (select lfp_crdt_dt from lead_follow_up where lfp_next_date > now() and lfp_module_type_id = led_id order by lfp_next_date asc limit 1) lfp_crdt_dt,
        (select gnp_name from gen_prm where gnp_group = 'led_temp' and gnp_value = led_temp) led_temp_name,
        (select gnp_name from gen_prm where gnp_group = 'led_lead_status' and gnp_value = led_lead_status) led_lead_status_name,
        (SELECT lsg_name from lead_stage where lsg_id in (SELECT lps_lsg_id from lead_pipeline_stage where lps_lsg_id=led_lead_stage)) led_lead_stage_name
        from lead where led_status = '".ACTIVE_STATUS."' ";

        if(isset($dataOptn['led_stage']) and $dataOptn['led_stage'] != '' and $dataOptn['led_stage'] != 'all')
        {
            $sqlQuery.=" and led_lead_stage in (SELECT lps_id from lead_pipeline_stage where lps_lsg_id= '".$dataOptn['led_stage']."' )";
        }

        $filter_type = $this->nextasy_url_encrypt->decrypt_openssl($dataOptn['filter_type']);
        $filter_value = $this->nextasy_url_encrypt->decrypt_openssl($dataOptn['filter_value']);

        switch ($filter_type) {
            case LEAD_FILTER_SOURCE:
            $sqlQuery .= " and led_src = ".$filter_value;
                break;         
            default:
                # code...
                break;
        }

        $sqlQuery.=" order by led_crdt_dt desc";
        $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
        return $result;
    }

	public function lead_active_getlist($resType,$dataOptn='')
	{
		$sqlQuery = "Select *,
        	fnNextasyDate(led_crdt_dt) led_crdt_dt_format,
		fnGetPeopleNameByID(led_ppl_id) led_ppl_name,
		(select ppl_name from people where ppl_id = led_ref_by) led_ref_by_name,
		(select ppl_name from people where ppl_id = led_managed_by) led_managed_by_name,
		(select cmp_name from company where cmp_id = led_cmp_id) led_cmp_name,
		(select lfp_next_date from lead_follow_up where lfp_next_date > now() and lfp_module_type_id = led_id order by lfp_next_date asc limit 1) next_followup_date,
		(select lfp_crdt_dt from lead_follow_up where lfp_next_date > now() and lfp_module_type_id = led_id order by lfp_next_date asc limit 1) lfp_crdt_dt,
		(select gnp_name from gen_prm where gnp_group = 'led_temp' and gnp_value = led_temp) led_temp_name,
		-- (select gnp_name from gen_prm where gnp_group = 'led_lead_status' and gnp_value = led_lead_status) led_lead_status_name,
		(SELECT lsg_name from lead_stage where lsg_id in (SELECT lps_lsg_id from lead_pipeline_stage where lps_lsg_id=led_lead_stage)) led_lead_stage_name
		from lead where led_status = '".ACTIVE_STATUS."' and led_lead_status not in (".LEAD_STATUS_WON.",".LEAD_STATUS_LOST.",".LEAD_STATUS_ON_HOLD.")";
        if(isset($dataOptn['led_stage']) and $dataOptn['led_stage'] != '' and $dataOptn['led_stage'] != 'all')
        {
            $sqlQuery.=" and led_lead_stage in (SELECT lps_id from lead_pipeline_stage where lps_lsg_id= '".$dataOptn['led_stage']."' )";
        }
        $sqlQuery.=" order by led_crdt_dt ASC";
		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;
	}

	public function lead_follow_getlist($led_list_by, $led_id,$resType,$dataOptn='')
	{
        $condition = '';
        
        switch ($led_list_by) {
            case 'upcoming':
                $condition = " and date(lfp_next_date) > CURDATE() and lfp_followup_status in (".LEAD_FOLLOWUP_STATUS_PENDING.",".LEAD_FOLLOWUP_STATUS_RESCHEDULE.") ";
                break;
            case 'completed':
                $condition = " and date(lfp_next_date) = CURDATE() and lfp_followup_status = '".LEAD_FOLLOWUP_STATUS_DONE."' ";
                break;
            case 'pending':
                $condition = " and lfp_next_date < NOW() and date(lfp_next_date) <> CURDATE() and lfp_followup_status in (".LEAD_FOLLOWUP_STATUS_PENDING.",".LEAD_FOLLOWUP_STATUS_RESCHEDULE.") ";
                break;
            case 'today':
                $condition = " and date(lfp_next_date) = CURDATE() and lfp_followup_status in (".LEAD_FOLLOWUP_STATUS_PENDING.",".LEAD_FOLLOWUP_STATUS_RESCHEDULE.") ";
                break;
            default:
                $condition = " ";
		}

		$sqlQuery = "Select lfp_remark,lfp_id,
		IF( lfp_instruction = '' or isnull(lfp_instruction), lfp_type_remark, lfp_instruction) AS lfp_instruction,
		fnNextasyDatetime(lfp_next_date) lfp_next_date_format,
		(select gnp_name from gen_prm where gnp_group = 'lfp_type' and gnp_value = lfp_type) followup_type,
		(select gnp_name from gen_prm where gnp_group = 'lfp_followup_status' and gnp_value = lfp_followup_status) followup_status,
		fnGetPeopleNameByID((select led_ppl_id from lead where led_id = lfp_module_type_id and lfp_module_type=".FOLLOWUP_MODULE_TYPE_LEAD.")) lead_name,
		fnNextasyDate(lfp_next_date) lfp_crdt_dt,
		(select ppl_name from people where ppl_id = lfp_crdt_by) lfp_crdt_by
		from lead_follow_up where
		lfp_module_type_id = '".$led_id."' and lfp_module_type=".FOLLOWUP_MODULE_TYPE_LEAD." and
		lfp_status = '".ACTIVE_STATUS."'
		".$condition."
		order by lfp_crdt_dt ASC";
		log_message('nexlog','lead_model::lead_follow_getlist >>');
		log_message('nexlog',' led_list_by : '.$led_list_by);
		log_message('nexlog',' sqlQuery : '.$sqlQuery);
		log_message('nexlog',' |||||||||');
		log_message('nexlog','lead_model::lead_follow_getlist >>');
		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;
	}

	function get_lead_overview($led_id)
	{
		$sqllastdate 	= "Select max(lfp_next_date) lfp_next_date, date_format(max(lfp_next_date),'%d/%m/%Y %h:%i %p') lfp_next_date_format,";
		$sqlupcomingdate 		= "Select min(lfp_next_date) lfp_next_date, date_format(min(lfp_next_date),'%d/%m/%Y %h:%i %p') lfp_next_date_format,";

		$sql = " lfp_remark, lfp_id,
		IF(lfp_instruction = '' or isnull(lfp_instruction), lfp_type_remark, lfp_instruction) AS lfp_instruction,
		(select gnp_name from gen_prm where gnp_group = 'lfp_type' and gnp_value = lfp_type) followup_type,
		(select gnp_name from gen_prm where gnp_group = 'lfp_followup_status' and gnp_value = lfp_followup_status) followup_status,
		fnGetPeopleNameByID((select led_ppl_id from lead where led_id = lfp_module_type_id and lfp_module_type=".FOLLOWUP_MODULE_TYPE_LEAD.")) lead_name
		from lead_follow_up where
		lfp_module_type_id = '".$led_id."' and lfp_module_type=".FOLLOWUP_MODULE_TYPE_LEAD." and
		lfp_status = '".ACTIVE_STATUS."'";

		$last_sql 		= " and lfp_next_date < now() order by lfp_next_date desc";
		$upcoming_sql 	= " and lfp_next_date > now() order by lfp_next_date asc";

		return array(
			'upcoming'	=>	$this->home_model->executeSqlQuery($sqlupcomingdate.$sql.$upcoming_sql, 'row'),
			'last'		=>	$this->home_model->executeSqlQuery($sqllastdate.$sql.$last_sql, 'row')
		);
	}

	public function leadDelete($led_id)
  	{
  		$sql = "update lead set led_status = 0  Where led_id = '".$led_id."'";
		$query = $this->db->query($sql);

		if(!empty($query))
		{
			return true;
	    }
	}

	function lfp_optn_inst($lfp_type)
	{
  		$sqlQuery = "select gnp_description from gen_prm where gnp_value = '".$lfp_type."' and gnp_group = 'lfp_type'";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row->gnp_description;
	}

	function getFollowUpdetailById($lfp_id)
	{
        //(select ppl_name from people where ppl_id = lfp_follow_by) lfp_follow_by_name,
        $sqlQuery = "select *,
        fnGetPeopleNameByID((select led_ppl_id from lead where led_id = lfp_module_type_id)) lfp_module_type_id_name,
        (select ppl_name from people where ppl_id = lfp_managed_by) lfp_managed_by_name,
        (select gnp_name from gen_prm where gnp_group = 'lfp_type' and gnp_value = lfp_type) lfp_followup_type,
         date_format(lfp_next_date,'%d-%m-%Y %H:%i') lfp_next_date_format from lead_follow_up where lfp_id = '".$lfp_id."' and lfp_status = ".ACTIVE_STATUS;
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}
	   public function getProductForDropdown($search)
    {
        $productSqlQuery = "SELECT  prd_id as id,prd_name as text FROM product where prd_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $productSqlQuery.=" and prd_name LIKE '%".$search."%' ";
        }
        $productSqlQuery.="  ORDER BY prd_crdt_dt ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Product');
        $queryResult     = $this->home_model->executeSqlQuery($productSqlQuery,'result');
          if($search =='')
          {
           array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
	   public function getCompanyForDropdown($search)
    {
        $companySqlQuery = "SELECT  cmp_id as id,cmp_name as text FROM company where cmp_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $companySqlQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
        $companySqlQuery.="  ORDER BY cmp_crdt_dt ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select company');
        $queryResult     = $this->home_model->executeSqlQuery($companySqlQuery,'result');
           if($search =='')
          {
           array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
	   public function getLeadCompanyForDropdown($search, $led_id)
    {
        $companySqlQuery = "SELECT  cmp_id as id,cmp_name as text FROM company where cmp_status IN (".ACTIVE_STATUS.") and cmp_id in (SELECT cpl_cmp_id from cmp_people where cpl_ppl_id IN (".$led_id.")) ";
        if($search !='')
        {
          $companySqlQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
        $companySqlQuery.="  ORDER BY cmp_crdt_dt ASC";

        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select company');
        $queryResult     = $this->home_model->executeSqlQuery($companySqlQuery,'result');
           if($search =='')
          {
             array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    	 public function getLeadStatus()
    {
        log_message('nexlog','Lead_model::getLeadStatus >>');

        $sqlQuery = "Select gnp_name lead_status,(SELECT COUNT(led_id) from lead where led_lead_status =gnp_value) lead_status_count from gen_prm where gnp_status = '".ACTIVE_STATUS."' and gnp_group='led_lead_status' ";
        /*if($pct_id != '')
        {
           $sqlQuery .=" and pct_id !='".$pct_id."'";
        }*/
        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'result');
        log_message('nexlog',' row : '.json_encode($row));
        log_message('nexlog','Lead_model::getLeadStatus <<');
        return $row;
    }

    function getPendingTaskByID($tsk_led_id)
    {
		$sql = "select count(tsk_id) tasks from task where tsk_led_id = '".$tsk_led_id."'";

		$pending_sql = " and tsk_progress_status = '".TASK_PENDING."'";

		// return $this->home_model->executeSqlQuery($sql.$pending_sql, 'row')->tasks;
		return $this->home_model->executeSqlQuery($sql, 'row')->tasks;
    }

    function getCompanyDetails($led_id)
    {
    	$sql = 'select cmp_id, cmp_code, cmp_name, cmp_website, cmp_address, cmp_pincode, cmp_gst_no, cmp_pan, cmp_employee, cmp_tgs_id, cmp_anl_rev, cmp_payment_terms,
    	(select gnp_name from gen_prm where gnp_group = "cmp_industry_type" and gnp_value = cmp_industry) cmp_industry_name,
		(select gnp_name from gen_prm where gnp_group = "cmp_type" and gnp_value = cmp_type) cmp_type_name,
		(select gnp_name from gen_prm where gnp_group = "cmp_anl_rev" and gnp_value = cmp_anl_rev) cmp_annual_rev,
		(select stm_name from state_master where  stm_id = cmp_stm_id) cmp_stm_name,
		(select ppl_name from people where ppl_id = cmp_crdt_by) cmp_crdt_by
    	 from company where cmp_id = (select led_cmp_id from lead where led_id = '.$led_id.')';
    	return $this->home_model->executeSqlQuery($sql, 'row');
    }


    public function lead_task_getlist($resType, $dataOptn='', $led_id ='')
    {
        $sqlQuery = "
        select *,
        (select gnp_name from gen_prm where gnp_group = 'tsk_progress_status' and gnp_value = tsk_progress_status) tsk_progress_status_name,
        (select cmp_name from company where cmp_id = tsk_client_id) tsk_client_id_name,
        (select ppl_name from people where ppl_id = tsk_user_ass_to) tsk_user_ass_to_name,
        (select ppl_name from people where ppl_id = tsk_user_ass_by) tsk_user_ass_by_name,
        (select gnp_name from gen_prm where gnp_group = 'tsk_priority' and gnp_value = tsk_priority) tsk_priority_name,
        date_format(tsk_datetime, '%d-%m-%Y %h:%i %p') tsk_datetime_format
        from task
        where tsk_status = '".ACTIVE_STATUS."' and tsk_led_id = '".$led_id."' order by tsk_crdt_dt desc";
        $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
  			return $result;

  		//and tsk_user_ass_to = ".$this->session->userdata(PEOPLE_SESSION_ID)." -- check if required
    }

     public function getEmployeeforDropdown($search)
    {
       $teamSqlQuery = "select * from (select emp_ppl_id as id, (select ppl_name from people where ppl_id = emp_ppl_id) text, emp_crdt_dt from employee where emp_status IN (".ACTIVE_STATUS.")) a ";
        if($search !='')
        {
          $teamSqlQuery.=" and emp_name LIKE '%".$search."%' ";
        }
        $teamSqlQuery.="  ORDER BY emp_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Team');
        $queryResult     = $this->home_model->executeSqlQuery($teamSqlQuery,'result');
           if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }

    function getProductTotalAmt($prd_ids)
    {
    	$sql = "select sum(prd_price) price from product where prd_id in (".$prd_ids.") and prd_status = ".ACTIVE_STATUS;
    	return $this->db->query($sql)->row()->price;
    }

	public function updateLeadData($data)
  	{
  		$sql = "update people set ppl_name = '".$data['led_name']."' where ppl_id = (select led_ppl_id from lead where led_id = '".$data['led_id']."')";
		return $this->db->query($sql);
	}
	 public function getCampaignDropdown($search, $manage = '')
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
   public function updateLeadCustomData()
  {
  	if(isset($_POST['field']) && $_POST['field']) 
  	{
  		 $leadData = array(
    	$_POST['field'] => $_POST['field_value']
    );
  	}else
  	{
  		$leadData = $_POST;
  	}
   
    $lead_id = $_POST['led_id'];
    if (!empty($leadData))
    {
      $ledData = $this->home_model->update('led_id', $lead_id, $leadData, 'lead');
    }
    return $ledData;
  }
    public function getLeadStageDropdown($search, $led_pipeline_id)
    {
        $leadStageQuery = "SELECT  lps_id as id,(SELECT lsg_name from lead_stage where lsg_id=lps_lsg_id) as text,(SELECT lsg_name from lead_stage where lsg_id=lps_lsg_id) as stage_name FROM lead_pipeline_stage where lps_status IN (".ACTIVE_STATUS.") and lps_lpn_id = '".$led_pipeline_id."' ";
        if($search !='')
        {
          $leadStageQuery.=" and (SELECT lsg_name from lead_stage where lsg_id=lps_lsg_id) LIKE '%".$search."%' ";
        }
        $leadStageQuery.="  ORDER BY lps_crdt_dt ASC";

        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select company');
        $queryResult     = $this->home_model->executeSqlQuery($leadStageQuery,'result');
          if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    public function getAllLeadStageDropdown()
    {
        $leadStageQuery = "SELECT lsg_id as f1, lsg_name as f2 FROM lead_stage where lsg_status IN (".ACTIVE_STATUS.")  ORDER BY lsg_crdt_dt ASC";

        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select company');
        $queryResult     = $this->home_model->executeSqlQuery($leadStageQuery,'result');
          /* if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }*/
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }

    function getfollowUpOverview($led_id)
    {
        $sql = 'select lfp_id, date_format(lfp_next_date,"%D %b, %Y %h:%i %p") lfp_next_date, lfp_remark,
                (select gnp_name from gen_prm where gnp_value = lfp_followup_status and gnp_group = "lfp_followup_status") lfp_followup_status,
                (select ppl_name from people where ppl_id = lfp_managed_by) managed_by,
                fnGetPeopleNameByID((select led_ppl_id from lead where led_id = lfp_module_type_id)) ppl_name
                 from lead_follow_up where lfp_module_type_id = '.$led_id.' and lfp_module_type='.FOLLOWUP_MODULE_TYPE_LEAD.' and lfp_status = '.ACTIVE_STATUS;

        $upcoming_Condition = ' and lfp_followup_status = '.LEAD_FOLLOWUP_STATUS_PENDING.' and lfp_next_date > now() order by lfp_next_date asc limit 1';
        $last_Condition     = ' and lfp_followup_status = '.LEAD_FOLLOWUP_STATUS_DONE.' and lfp_next_date < now() order by lfp_next_date desc limit 1';

        return array(
            'upcoming'  => $this->db->query($sql.$upcoming_Condition)->row(),
            'last'      => $this->db->query($sql.$last_Condition)->row()
        );
    }

    function updateFollowupStatus($lfp_id, $status)
    {
        $sql = 'update lead_follow_up set lfp_followup_status = '.$status.' where lfp_id = '.$lfp_id;
        return $this->db->query($sql);
    }
}


/*stdClass Object ( [lps_id] => 1 [cmp_code] => [cmp_name] => Harissonss Bags Pvt Ltd [cmp_industry] => 3 [cmp_type] => 0 [cmp_anl_rev] => 0 [cmp_employee] => [cmp_website] => harissonbags.com [cmp_address] => 2-A, Zakaria Bunder Road, Behind Homa Engineering Works, Cotton Green (W), Mumbai-400033 [cmp_pincode] => 0 [cmp_tgs_id] => [cmp_stm_id] => 27 [cmp_gst_no] => [cmp_pan] => [cmp_payment_terms] => [cmp_pay_due] => 0 [cmp_logo] => [cmp_login] => 0 [cmp_status] => 1 [cmp_crdt_by] => 620 [cmp_crdt_dt] => 2018-08-27 03:15:32 [cmp_updt_by] => 0 [cmp_updt_dt] => 2018-08-27 03:15:32 ) */