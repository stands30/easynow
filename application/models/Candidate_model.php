<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Candidate_model extends CI_Model
{

	function __construct()
    {

        parent::__construct();
    }

	public function getCandidateById($cdt_id)
	{
		$sqlQuery = "
		Select *,
		fnGetPeopleNameByID(cdt_ppl_id) cdt_name,
		(select ppl_name from people where candidate.cdt_crdt_by = people.ppl_id) cdt_crdt_by_name,
		date_format(cdt_crdt_dt,'%d/%m/%Y %H:%i:%s') cdt_crdt_on_format,
		(select gnp_name from gen_prm where gnp_group = 'cdt_role' and gnp_value = cdt_role) cdt_role_name
		from candidate where cdt_status = '".ACTIVE_STATUS."' and cdt_id = '".$cdt_id."'";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}

	public function candidate_getlist()
	{
		$sqlQuery = "Select *,
		fnGetPeopleNameByID(cdt_ppl_id) cdt_ppl_name,
		(select gnp_name from gen_prm where gnp_group = 'cdt_role' and gnp_value = cdt_role) cdt_role_name
		from candidate where cdt_status = '".ACTIVE_STATUS."' order by cdt_crdt_dt ASC";
		$result = $this->home_model->executeSqlQuery($sqlQuery,'result');
		return $result;
	}

	public function candidateDelete($id)
  	{
  		$sql = "update candidate set cdt_status = 0  Where cdt_id = '".$cdt_id."'";
		$query = $this->db->query($sql);

		if(!empty($query))
		{
			return true;
	    }
	}

	function candidate_people_list($cdt_id)
	{
		$sqlQuery = "select *,
		fnGetPeopleNameByID(cpl_ppl_id) cpl_ppl_name,
		(select ppl_met_on from people where cpl_cdt_id = ppl_id) cpl_met_on,
		(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_MOBILE.") cpl_ppl_mobile,
		(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_EMAIL.") cpl_ppl_email
		 from cdt_people where cpl_cdt_id =  '".$cdt_id."' and cpl_status = '".ACTIVE_STATUS."' order by cpl_crdt_dt ASC";

		$result = $this->home_model->executeSqlQuery($sqlQuery,'result');
		return $result;
	}

	public function getCandidateDropdown()
	{
		$genPrmSqlQuery = "SELECT  cdt_id as id,cdt_name as text FROM candidate where cdt_status IN ('".ACTIVE_STATUS."')";
		$genPrmSqlQuery.=" ORDER BY cdt_id ASC";
		$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
		return $result;
	}

	public function getCompPplById($cpl_id)
	{
			$sqlQuery = "Select *,fnGetPeopleNameByID(cdt_ppl_id) ppl_name,
				(select cdt_name from candidate where candidate.cdt_id = cdt_people.cpl_cdt_id and cdt_status In ('".ACTIVE_STATUS."'))cdt_name
					from cdt_people where cpl_status = '".ACTIVE_STATUS."' and cpl_id = ".$cpl_id;
			$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
			return $row;
	}
    // ******* Lead End Here *********//
    public function getPeopleforDropdown($search)
    {
        $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (".ACTIVE_STATUS.")
				and ppl_id Not In (SELECT emp_ppl_id from employee where emp_dept = '".PEOPLE_ADMIN_DEPT."')";
        if($search !='')
        {
          $peopleSqlQuery.=" and ppl_name LIKE '%".$search."%' ";
        }
        $peopleSqlQuery.="  ORDER BY ppl_crdt_dt ASC";
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
     // ******* Event Start Here ********//
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
}
