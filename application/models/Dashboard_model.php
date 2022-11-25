<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard_model extends CI_Model 
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
     public function getTodayFollowUp()
    {
        log_message('nexlog','Dashboard_model::getTodayFollowUp >>');

        $sqlQuery = "Select COUNT(lfp_id) flp_count from lead_follow_up where  date(lfp_next_date) = CURDATE() and lfp_followup_status = '".LEAD_FOLLOWUP_STATUS_PENDING."' ";
        /*if($pct_id != '')
        {
           $sqlQuery .=" and pct_id !='".$pct_id."'";
        }*/
        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        log_message('nexlog',' row : '.json_encode($row));
        log_message('nexlog','Dashboard_model::getTodayFollowUp <<');
        return $row;
    }
     public function getSalesPiepeLine()
    {
        log_message('nexlog','Dashboard_model::getSalesPiepeLine >>');

        $sqlQuery = "Select COUNT(led_id) led_count,FORMAT(SUM(led_amount),0) led_amt from lead where led_status = '".ACTIVE_STATUS."' ";
        /*if($pct_id != '')
        {
           $sqlQuery .=" and pct_id !='".$pct_id."'";
        }*/
        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        log_message('nexlog',' row : '.json_encode($row));
        log_message('nexlog','Dashboard_model::getSalesPiepeLine <<');
        return $row;
    }
    public function getLeadStatus()
    {
        log_message('nexlog','Dashboard_model::getLeadStatus >>');

        $sqlQuery = "Select gnp_name lead_status,(SELECT COUNT(led_id) from lead where led_lead_status =gnp_value) lead_status_count,gnp_value from gen_prm where gnp_status = '".ACTIVE_STATUS."' and gnp_group='led_lead_status' ";
        /*if($pct_id != '')
        {
           $sqlQuery .=" and pct_id !='".$pct_id."'";
        }*/
        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'result');
        log_message('nexlog',' row : '.json_encode($row));
        log_message('nexlog','Dashboard_model::getLeadStatus <<');
        return $row;
    }

    public function leadstatus_getlist($led_lead_status)
  	{
  		$sqlQuery = "Select *,
  		fnGetPeopleNameByID(led_ppl_id) led_ppl_name,
  		(select ppl_name from people where ppl_id = led_ref_by) led_ref_by_name,
  		(select ppl_name from people where ppl_id = led_managed_by) led_managed_by_name,
  		(select gnp_name from gen_prm where gnp_group = 'led_temp' and gnp_value = led_temp) led_temp_name,
  		(select gnp_name from gen_prm where gnp_group = 'led_lead_status' and gnp_value = led_lead_status) led_lead_status_name,
  		(select gnp_name from gen_prm where gnp_group = 'led_lead_stage' and gnp_value = led_lead_stage) led_lead_stage_name
  		from lead where led_status = '".ACTIVE_STATUS."' and led_lead_status = ".$led_lead_status." order by led_crdt_dt desc";
  		$result = $this->home_model->executeSqlQuery($sqlQuery,'result');
  		return $result;
  	}
      public function getFollowUpDataByDay($status,$custom_date)
    {
        log_message('nexlog','Dashboard_model::getTodayFollowUp >>');

        $sqlQuery = "Select COUNT(lfp_id) flp_count from lead_follow_up where date(lfp_next_date) = '".$custom_date."' and lfp_followup_status = '".$status."' and lfp_module_type='".FOLLOWUP_MODULE_TYPE_LEAD."' ";
        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        log_message('nexlog',' row : '.json_encode($row));
        log_message('nexlog','Dashboard_model::getTodayFollowUp <<');
        return $row;
    }
     public function getLeadStage()
    {
       /* $leadStageQuery = "SELECT  lsg_name as name,(SELECT COUNT(led_id)/(SELECT COUNT(led_id) from lead where led_status='".ACTIVE_STATUS."'))*100 from lead where led_lead_stage in (SELECT led_lead_stage from lead where led_status='".ACTIVE_STATUS."' and led_lead_status IN (".LEAD_STATUS_PENDING.','.LEAD_STATUS_ON_HOLD."))) value FROM lead_stage where lsg_status IN (".ACTIVE_STATUS.") and lsg_id in (SELECT lps_lsg_id FROM lead_pipeline_stage WHERE lps_status='1' and lps_lsg_id=lsg_id and lps_id in (SELECT led_lead_stage from lead where led_status='".ACTIVE_STATUS."')))  ORDER BY lsg_crdt_dt ASC";*/

      /*$sqlQuery ="SELECT lsg_name as name,(
        (SELECT (if (SUM(led_amount) > 0,FORMAT(SUM(led_amount),0),0)) from lead where led_lead_stage IN 
                    (SELECT lps_lsg_id from lead_pipeline_stage where lps_lsg_id =lsg_id and led_status='".ACTIVE_STATUS."' and led_lead_status not in (".LEAD_STATUS_WON.",".LEAD_STATUS_LOST.")))/ (SELECT if (SUM(led_amount) > 0,FORMAT(SUM(led_amount),0),0) from lead where led_status='".ACTIVE_STATUS."')*100) value,(SELECT COUNT(led_id) from lead where led_lead_stage = 
                    (SELECT lps_id from lead_pipeline_stage where lps_lsg_id =lsg_id and lps_status='".ACTIVE_STATUS."' and led_lead_status not in (".LEAD_STATUS_WON.",".LEAD_STATUS_LOST."))) as led_count,(SELECT if (SUM(led_amount) > 0,FORMAT(SUM(led_amount),0),0) from lead where led_lead_stage = 
                    (SELECT lps_id from lead_pipeline_stage where lps_lsg_id =lsg_id and led_status='".ACTIVE_STATUS."' and led_lead_status not in (".LEAD_STATUS_WON.",".LEAD_STATUS_LOST."))) as led_amt 
                      FROM lead_stage
                       WHERE lsg_status='".ACTIVE_STATUS."' ORDER BY (SELECT lps_order from lead_pipeline_stage where lps_lsg_id =lsg_id and lps_status='".ACTIVE_STATUS."') ASC ";*/

                     /* AND 
                     lsg_id IN ( SELECT lps_lsg_id
                    FROM lead_pipeline_stage WHERE lps_id IN ( SELECT led_lead_stage FROM lead WHERE led_status='".ACTIVE_STATUS."'))*/

        $sqlQuery=" SELECT lsg_name,
        concat(lsg_name,' (₹ ' ,(if (SUM(led_amount) > 0,FORMAT(SUM(led_amount),0),0)) COLLATE utf8_general_ci,') ') lsg_name_value,
        (if (SUM(led_amount) > 0,FORMAT(SUM(led_amount),0),0)) value,
        COUNT(led_id) led_count from lead_pipeline_stage lps RIGHT JOIN lead_stage lsg ON lps.lps_lsg_id=lsg.lsg_id RIGHT JOIN lead led ON lps.lps_lsg_id=led.led_lead_stage  where led.led_status='".ACTIVE_STATUS."' AND lps.lps_status='".ACTIVE_STATUS."' AND lsg.lsg_status='".ACTIVE_STATUS."' AND led_lead_status NOT IN (".LEAD_STATUS_WON.",".LEAD_STATUS_LOST.") GROUP BY lsg_id ORDER BY lps.lps_order";
        // ***** It is used to reset value of select2 ****** //
        // $resetResult     = array('id'=>'0','text'=>'Please Select company');
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
      //   if($search =='')
      // {
      //   array_unshift($queryResult,$resetResult);
      // }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
     public function getWonLeads($type)
    {
       /* $leadStageQuery = "SELECT  lsg_name as name,(SELECT COUNT(led_id)/(SELECT COUNT(led_id) from lead where led_status='".ACTIVE_STATUS."'))*100 from lead where led_lead_stage in (SELECT led_lead_stage from lead where led_status='".ACTIVE_STATUS."' and led_lead_status IN (".LEAD_STATUS_PENDING.','.LEAD_STATUS_ON_HOLD."))) value FROM lead_stage where lsg_status IN (".ACTIVE_STATUS.") and lsg_id in (SELECT lps_lsg_id FROM lead_pipeline_stage WHERE lps_status='1' and lps_lsg_id=lsg_id and lps_id in (SELECT led_lead_stage from lead where led_status='".ACTIVE_STATUS."')))  ORDER BY lsg_crdt_dt ASC";*/

      $sqlQuery ="SELECT COUNT(led_id) led_count,( if (SUM(led_amount) > 0,FORMAT(SUM(led_amount),0),0)) led_amt from lead where led_status ='".ACTIVE_STATUS."' and led_lead_status='".LEAD_STATUS_WON."' ";
      switch ($type) {
        case 'today':
           $sqlQuery .= " and date(led_crdt_dt) = CURDATE() ";
          break;
        case 'week':
           $sqlQuery .= " and WEEK(led_crdt_dt) = WEEK(CURDATE()) ";
          break;
        case 'month':
           $sqlQuery .= " and MONTH(led_crdt_dt) = MONTH(CURDATE()) ";
          break;
        case 'year':
           $sqlQuery .= " and YEAR(led_crdt_dt) = YEAR(CURDATE()) ";
          break;
        
        default:
          # code...
          break;
      }
                     /* AND 
                     lsg_id IN ( SELECT lps_lsg_id
                    FROM lead_pipeline_stage WHERE lps_id IN ( SELECT led_lead_stage FROM lead WHERE led_status='".ACTIVE_STATUS."'))*/
    
        // ***** It is used to reset value of select2 ****** //
        // $resetResult     = array('id'=>'0','text'=>'Please Select company');
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'row');
      //   if($search =='')
      // {
      //   array_unshift($queryResult,$resetResult);
      // }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }

    function getTaskDetailCount()
    {
      $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
      $sql = 'select * from (
                (select count(tsk_id) my_task from task where tsk_user_ass_to = '.$ppl_id.' and tsk_status = '.ACTIVE_STATUS.') my_task,
                (select count(tsk_id) my_support from task where tsk_supporter = '.$ppl_id.' and tsk_status = '.ACTIVE_STATUS.') my_support,
                (select count(tsk_id) my_review from task where tsk_reviewer = '.$ppl_id.' and tsk_status = '.ACTIVE_STATUS.') my_review,
                (select count(mtg_id) my_meeting from meeting where mtg_people = '.$ppl_id.' and mtg_status = '.ACTIVE_STATUS.') my_meeting 
              );';

      return $this->db->query($sql)->row();
    }

    function getFollowUpListByStatus($status)
    {
      switch ($status) {
        case 'upcoming':
          $condition = " and date(lfp_next_date) > CURDATE() and lfp_followup_status = '".LEAD_FOLLOWUP_STATUS_PENDING."' ";
          break;
        case 'pending':
          $condition = " and lfp_next_date < NOW() and date(lfp_next_date) <> CURDATE() and lfp_followup_status = '".LEAD_FOLLOWUP_STATUS_PENDING."' ";
          break;
        case 'today':
          $condition = " and date(lfp_next_date) = CURDATE() and lfp_followup_status = '".LEAD_FOLLOWUP_STATUS_PENDING."' ";
          break;
        default:
            $condition = " ";
      }

      // (select (select ppl_name from people where ppl_id = (select led_ppl_id from lead where led_id = lfp_module_type_id and led_status = ".ACTIVE_STATUS.") and ppl_status = ".ACTIVE_STATUS.") from lead_follow_up where lfp_module_type = 1 and lfp_status = ".ACTIVE_STATUS." limit 1) lfp_name,

      $sqlQuery = "Select lfp_remark,lfp_id,
        CASE 
           when  lfp_module_type = 1
             then fnGetPeopleNameByID((SELECT led_ppl_id from lead where led_id=lfp_module_type_id and led_status=".ACTIVE_STATUS."))
             else
               ''
               end
      lfp_name,
      IF( lfp_instruction = '' or isnull(lfp_instruction), lfp_type_remark, lfp_instruction) AS lfp_instruction,
      date_format(lfp_next_date,'%D %b, %Y %h:%i %p') lfp_next_date_format,
      (select gnp_name from gen_prm where gnp_group = 'lfp_type' and gnp_value = lfp_type) followup_type,
      (select gnp_name from gen_prm where gnp_group = 'follow_up_module_type' and gnp_value = lfp_module_type) followup_module_type,
      (select gnp_name from gen_prm where gnp_group = 'lfp_followup_status' and gnp_value = lfp_followup_status) followup_status,
      fnGetPeopleNameByID((select led_ppl_id from lead where led_id = lfp_module_type_id and lfp_module_type=".FOLLOWUP_MODULE_TYPE_LEAD.")) lead_name,
      date_format(lfp_next_date,'%D %b, %Y') lfp_crdt_dt,
      (select ppl_name from people where ppl_id = lfp_crdt_by) lfp_crdt_by,
      (select ppl_name from people where ppl_id = lfp_managed_by) lfp_managed_by
      from lead_follow_up where
      lfp_status = '".ACTIVE_STATUS."'
      and lfp_managed_by = ".$this->session->userdata(PEOPLE_SESSION_ID)."
      ".$condition."
      order by lfp_crdt_dt ASC";

      return $this->db->query($sqlQuery)->result();
    }

    function getLeadSalesDetail()
    {
      $sql = 'select * from (
                (select count(*) no_action from (select count(led_id) no_action from lead where led_id not in 
                  (select lfp_module_type_id from lead_follow_up where lfp_module_type = 1 and lfp_next_date > now()) 
                  and led_lead_stage not in (1,2) group by led_ppl_id)a) no_action,
                (select count(*) hot_lead from (select count(led_id) hot_lead from lead where led_id in 
                  (select lfp_module_type_id from lead_follow_up where lfp_module_type = 1 and lfp_next_date > now()) 
                  and led_lead_stage = 1 group by led_ppl_id)a) hot_lead,
                (select count(*) rejected_lead from (select count(led_id) rejected_lead from lead where led_id in 
                  (select lfp_module_type_id from lead_follow_up where lfp_module_type = 1 and lfp_next_date > now()) 
                  and led_lead_stage = 4 group by led_ppl_id)a) rejected_lead
              );';
      return $this->db->query($sql)->row();
    }
    public function pendingPOList($resType,$dataOptn='')
    {
      $sqlQuery = "Select *,(DATE_FORMAT(por_date, '%d %M, %Y')) as order_date,(select cmp_name from company where cmp_id=por_vdr_id) as cmp_value,fnGetPeopleNameByID(por_crdt_by) as created_by,
      getGenPrmValueByGroup('por_received_status',por_received_status) as order_status 
                  from purchase_order where por_status = '".ACTIVE_STATUS."' and por_received_status='".PURCHASE_ORDER_RECEIVED_STATUS_PENDING."' order by por_id desc";
      $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
      return $result;
    }
    public function dorList($resType,$dataOptn='')
    {
      $sqlQuery = "Select *,(DATE_FORMAT(dor_date, '%d %M, %Y')) as order_date,(select cmp_name from company where cmp_id=dor_cmp_id) as cmp_value,fnGetPeopleNameByID(dor_crdt_by) as created_by,
      getGenPrmValueByGroup('dor_dispatch_status',dor_dispatch_status) as order_status 
                  from dispatch_order where dor_status = '".ACTIVE_STATUS."' order by dor_id desc";
      $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
      return $result;
    }
}
?>