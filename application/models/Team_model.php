<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Team_model extends CI_Model
{

	function __construct()
    {

        parent::__construct();
    }

	public function getTeamById($emp_id)
	{
		$sqlQuery = "
		Select *,
		(select ppl_name from people where ppl_id = emp_ppl_id) emp_name,
		(select ppl_name from people where ppl_id = emp_reporting_to) emp_reporting_to_name,
		(select dpt_name from department where dpt_id = emp_dept) emp_dept_name,
		(select ppl_name from people where emp_crdt_by = ppl_id) emp_crdt_by_name,
		(select cmp_name from company where cmp_id = emp_cmp_id) emp_cmp_id_name,
		(IFNULL((select MIN(emp_id) from employee where emp_id > '".$emp_id."'),(SELECT MIN(emp_id) from employee))) next,
		(IFNULL((select MAX(emp_id) from employee where emp_id < '".$emp_id."'),(SELECT MAX(emp_id) from employee))) prev,
		date_format(emp_crdt_dt,'%d/%m/%Y %H:%i:%s') emp_crdt_on_format
		from employee where emp_status = '".ACTIVE_STATUS."' and emp_id = '".$emp_id."'";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}

	public function team_getlist($resType,$dataOptn='')
	{
		$sqlQuery = "Select emp_id, emp_cmp_id, emp_ppl_id, emp_reporting_to, emp_designation,
		(select ppl_name from people where emp_ppl_id = ppl_id) emp_ppl_name,
		IFNULL((select ppl_name from people where emp_reporting_to = ppl_id),'') emp_reporting_name,
		IFNULL((select cmp_name from company where emp_cmp_id = cmp_id),'') emp_cmp_name,
		(select dpt_name from department where dpt_id = emp_dept) emp_dept_name,
		fnNextasyDateTime(emp_crdt_dt) emp_crdt_dt
		from employee where emp_status = '".ACTIVE_STATUS."' order by emp_crdt_dt desc";
		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;
	}

	public function teamDelete($emp_id)
  	{
  		$sql = "update employee set emp_status = 0 Where emp_id = '".$emp_id."'";
		$query = $this->db->query($sql);

		if(!empty($query))
		{
			return true;
	    }
	}

	function team_people_list($emp_id)
	{
		$sqlQuery = "select *,
		(select ppl_name from people where cpl_ppl_id = ppl_id) cpl_ppl_name,
		(select ppl_met_on from people where cpl_emp_id = ppl_id) cpl_met_on,
		(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_MOBILE.") cpl_ppl_mobile,
		(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_EMAIL.") cpl_ppl_email
		 from emp_people where cpl_emp_id =  '".$emp_id."' and cpl_status = '".ACTIVE_STATUS."' order by cpl_crdt_dt desc";

		$result = $this->home_model->executeSqlQuery($sqlQuery,'result');
		return $result;
	}

	public function getTeamDropdown()
	{
		//$genPrmSqlQuery = "SELECT emp_ppl_id as id, (select ppl_name from people where emp_ppl_id = ppl_id) as text from employee where emp_dept = '".PEOPLE_ADMIN_DEPT."' and emp_status IN ('".ACTIVE_STATUS."')";
		
		$genPrmSqlQuery = "SELECT emp_ppl_id as id, (select ppl_name from people where emp_ppl_id = ppl_id) as text from employee where  emp_status IN ('".ACTIVE_STATUS."')";

		$genPrmSqlQuery.=" ORDER BY emp_id asc";
		$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
		return $result;
	}

	public function getCompPplById($cpl_id)
	{
			$sqlQuery = "Select *,(select ppl_name from people where people.ppl_id = emp_people.cpl_ppl_id and cpl_status In ('".ACTIVE_STATUS."') )ppl_name,
				(select emp_name from employee where team.emp_id = emp_people.cpl_emp_id and emp_status In ('".ACTIVE_STATUS."'))emp_name
					from emp_people where cpl_status = '".ACTIVE_STATUS."' and cpl_id = ".$cpl_id;
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
    // ******* Lead End Here *********//
    public function getDepartmentforDropdown($search)
    {
        $departmentSqlQuery = "SELECT  dpt_id as id,dpt_name as text FROM department where dpt_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $departmentSqlQuery.=" and dpt_name LIKE '%".$search."%' ";
        }
        $departmentSqlQuery.="  ORDER BY dpt_crdt_dt ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Department');
        $queryResult     = $this->home_model->executeSqlQuery($departmentSqlQuery,'result');
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

	public function updateTeamCustomData()
	{
	  	if(isset($_POST['field']) && $_POST['field'])
	  		$teamData = array($_POST['field'] => $_POST['field_value']);
	  	else
	  		$teamData = $_POST;
	   
	    $team_id = $_POST['emp_id'];

	    if (!empty($teamData))
	      return $this->home_model->update('emp_id', $team_id, $teamData, 'employee');
	}

     public function getCompanyDropdown($ppl_id,$search)
    {
        $compSqlQuery = "SELECT cmp_id as id,cmp_name as text FROM cmp_people cpl RIGHT JOIN company cmp ON cpl.cpl_cmp_id=cmp.cmp_id WHERE cpl_status='".ACTIVE_STATUS."' and cmp_status='".ACTIVE_STATUS."' AND cpl.cpl_ppl_id='".$ppl_id."' ";
        if($search !='')
        {
          $compSqlQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
        $compSqlQuery.="  ORDER BY cmp_crdt_dt ASC";
        // echo $compSqlQuery;
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Company');
        $queryResult     = $this->home_model->executeSqlQuery($compSqlQuery,'result');
         if($search =='')
        {
          array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
}
