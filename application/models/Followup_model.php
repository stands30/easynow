<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Followup_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

    function followup_getlist($led_list_by,$resType,$dataOptn='')
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
		-- (select ppl_name from people where ppl_id = lfp_crdt_by) lfp_crdt_by
		fnGetPeopleNameByID(lfp_crdt_by) lfp_crdt_by
		".checkPrivate('sales-followup-list','lfp_crdt_by')."
		from lead_follow_up where
		lfp_status = '".ACTIVE_STATUS."'
		".$condition."
		order by lfp_crdt_dt ASC";

		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;
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
		(select ppl_name from people where ppl_id = lfp_managed_by) lfp_managed_by_name, 
		(select gnp_name from gen_prm where gnp_group = 'lfp_type' and gnp_value = lfp_type) lfp_followup_type,
        fnGetPeopleNameByID((select led_ppl_id from lead where led_id = lfp_module_type_id)) lfp_module_type_id_name,
		date_format(lfp_next_date,'%d-%m-%Y %H:%i') lfp_next_date_format from lead_follow_up where lfp_id = '".$lfp_id."' and lfp_status = ".ACTIVE_STATUS;
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}

	function getPeopleDropdown($search)
	{
	    $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (" . ACTIVE_STATUS . ")";
	    if ($search != '')
	    {
	      $peopleSqlQuery.= " and ppl_name LIKE '%" . $search . "%' ";
	    }
	    $peopleSqlQuery.= "  ORDER BY ppl_crdt_dt ASC";
	    $queryResult = $this->home_model->executeSqlQuery($peopleSqlQuery, 'result');
	    return $queryResult;
	}

	function getLeadListByType($search = '')
	{
	    $leadSqlQuery = "SELECT led_id as id, (select ppl_name from people where led_ppl_id = ppl_id and led_status = ".ACTIVE_STATUS.") as text FROM lead where led_status IN (" . ACTIVE_STATUS . ")";
	    if ($search != '')
	    {
	      $leadSqlQuery.= " and led_name LIKE '%" . $search . "%' ";
	    }
	    $leadSqlQuery.= "  ORDER BY led_crdt_dt ASC";
	    $queryResult = $this->home_model->executeSqlQuery($leadSqlQuery, 'result');
	    return $queryResult;		
	}

	function getAccountListByType()
	{
	    $accountSqlQuery = "SELECT ppl_id as id,ppl_name as text FROM account where ppl_status IN (" . ACTIVE_STATUS . ")";
	    if ($search != '')
	    {
	      $accountSqlQuery.= " and ppl_name LIKE '%" . $search . "%' ";
	    }
	    $accountSqlQuery.= "  ORDER BY ppl_crdt_dt ASC";
	    $queryResult = $this->home_model->executeSqlQuery($accountSqlQuery, 'result');
	    return $queryResult;		
	}
	public function getLeadById($led_id)
	{
		$sqlQuery = "
		select
		fnGetPeopleNameByID(led_ppl_id) led_ppl_name,
		(select pct_value from people_contact where pct_ppl_id = led_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_EMAIL." LIMIT 1) lead_email
		from lead
		where led_status = '".ACTIVE_STATUS."' and led_id = '".$led_id."'";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		// $sql = 'select GROUP_CONCAT(prd_name) prd_name_all from product where prd_id in ('.$row->led_prod.')';
		// $row->led_prd_name_all = $this->home_model->executeSqlQuery($sql,'row')->prd_name_all;;
		return $row;
	}

    function updateFollowupStatus($lfp_id, $status)
    {
        $sql = 'update lead_follow_up set lfp_followup_status = '.$status.' where lfp_id = '.$lfp_id;
        return $this->db->query($sql);
    }
}
?>
