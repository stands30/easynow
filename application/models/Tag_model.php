<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Tag_model extends CI_Model
{

	  function __construct()
    {
        parent::__construct();
    }

		public function getTagList($resType,$dataOptn='')
		{
			$tagsSqlQuery = "SELECT  tgs_name,tgs_id,tgs_id as tgs_encrypt_id,tgs_name as tgs_encrypt_name,tgs_status,
			(SELECT IFNULL(COUNT(ppl_id),0) from people where ppl_status='".ACTIVE_STATUS."' and ppl_tgs_id IN (tgs_id)) tgs_ppl_count,
			(SELECT IFNULL(COUNT(cmp_id),0) from company where cmp_status='".ACTIVE_STATUS."' and cmp_tgs_id IN (tgs_id)) tgs_cmp_count,
			(SELECT IFNULL(COUNT(cmp_id),0) from company where cmp_status='".ACTIVE_STATUS."' and cmp_tgs_id IN (tgs_id) and cmp_id = (select cli_cmp_id from client where cli_cmp_id = cmp_id)) tgs_cli_count,
				(SELECT gnp_name from gen_prm where gnp_status='".ACTIVE_STATUS."' and gnp_group='active_status' and gnp_value = tgs_status) tgs_status_name,
				date_format(tgs_crdt_dt, '%d/%m/%Y %h:%i %p') tgs_crdt_dt,
				(select ppl_name from people where people.ppl_id = tags.tgs_crdt_by)crtd_by
												FROM tags where tgs_status != ".DELETE_STATUS;
 			$result = $this->home_model->executeDataTableSqlQuery($tagsSqlQuery,$resType,$dataOptn);
			return $result;
		}

		public function getStatusforDropdown($gnp_group)
    {
			$genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_value != 3 and gnp_group = '".$gnp_group."'";
			$genPrmSqlQuery.=" ORDER BY gnp_id ASC";
			$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
			return $result;
		}

		public function deleteTags($tgs_id)
	  {
			$sql   = "Update tags set tgs_status = ".DELETE_STATUS."  Where tgs_id = ".$tgs_id;
			$query = $this->db->query($sql);
			if(!empty($query))
			{
			return true;
	    }
	  }

		// public function getPeopleforCount($tgs_id)
		// {
		// 	$SqlQuerytg  = "SELECT ppl_id from people where find_in_set('".$tgs_id."', ppl_tgs_id) > 0 and ppl_status in ('".ACTIVE_STATUS."')";
		// 	$result      = $this->home_model->executeSqlQuery($SqlQuerytg,'result_array');
		// 	return sizeof($result);
		// }
		//
		// public function getCompanyforCount($tgs_id)
		// {
		// 	$SqlQuerytg  = "SELECT cmp_id from company where find_in_set('".$tgs_id."', cmp_tgs_id) > 0 and cmp_status in ('".ACTIVE_STATUS."')";
		// 	$result      = $this->home_model->executeSqlQuery($SqlQuerytg,'result_array');
		// 	return sizeof($result);
		// }
		//
		// public function getClientforCount($tgs_id)
		// {
		// 	$SqlQuerytg  = "SELECT cmp_id from company where find_in_set('".$tgs_id."', cmp_tgs_id) > 0 and cmp_status in ('".ACTIVE_STATUS."') and
		// 									cmp_id = (select cli_cmp_id from client where cli_cmp_id = cmp_id)";
		// 	$result      = $this->home_model->executeSqlQuery($SqlQuerytg,'result_array');
		// 	return sizeof($result);
		// }

	    public function getTagsDataByType($type,$tgs_id,$resType,$dataOptn='')
	    {
	    	if(isset($dataOptn['tgs_id']) && $dataOptn['tgs_id'] != '' && $tgs_id == '')
	    	{
	    	  $tgs_id = $dataOptn['tgs_id'];
	    	}
	    	switch($type)
	    	{
	    		case 'people':
	    				      $sqlQuery = "SELECT ppl_id,ppl_name,
                        (SELECT pct_value FROM `people_contact` where pct_ppl_id=ppl_id and pct_type='".CONTACT_EMAIL."' and pct_primary='".ACTIVE_STATUS."' and pct_status='".ACTIVE_STATUS."') ppl_email,
                        (SELECT pct_value FROM `people_contact` where pct_ppl_id=ppl_id and pct_type='".CONTACT_MOBILE."' and pct_primary='".ACTIVE_STATUS."' and pct_status='".ACTIVE_STATUS."') ppl_mob,
                        (DATE_FORMAT(ppl_met_on, '%D %M %Y')) ppl_met_on_dt
                         FROM people where ppl_status='".ACTIVE_STATUS."' and ppl_tgs_id IN (".$tgs_id.") ";
	    				      break;
	    		case 'company':
	    				      $sqlQuery = "SELECT *,(SELECT gnp_name FROM gen_prm where gnp_group = 'cmp_industry_type' and gnp_value = cmp_industry) cmp_industry_name FROM company where cmp_status = '".ACTIVE_STATUS."' and cmp_tgs_id IN (".$tgs_id.") ORDER BY cmp_crdt_dt desc";
	    				      break;

	    	}
 			$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
			return $result;
	    }
}
