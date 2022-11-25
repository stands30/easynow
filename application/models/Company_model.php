<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Company_model extends CI_Model
{

	function __construct()
    {

        parent::__construct();
    }

	public function getCompanyById($cmp_id)
	{

		$sqlQuery = "
		select *,
		(select gnp_name from gen_prm where gnp_group = 'cmp_industry_type' and gnp_value = cmp_industry) cmp_industry_name,
		(select gnp_name from gen_prm where gnp_group = 'cmp_type' and gnp_value = cmp_type) cmp_type_name,
		(select gnp_name from gen_prm where gnp_group = 'cmp_anl_rev' and gnp_value = cmp_anl_rev) cmp_anl_rev_name,
		(select stm_name from state_master where  stm_id = cmp_stm_id) cmp_stm_name,

		(case 
			when cmp_type_id = ".COMPANY_TYPE_COMPANY." then 'Company'
			when cmp_type_id = ".COMPANY_TYPE_ACCOUNT." then 'Account'
		end) cmp_type_id_name,

		(select ppl_name from people where ppl_id = cmp_crdt_by) cmp_crdt_by,
		(select ppl_name from people where ppl_id = cmp_managed_by) cmp_managed_by_name,
		(IFNULL((select MIN(cmp_id) from company where cmp_id > '".$cmp_id."'),(SELECT MIN(cmp_id) from company))) next,
		(IFNULL((select MAX(cmp_id) from company where cmp_id < '".$cmp_id."'),(SELECT MAX(cmp_id) from company))) prev,
    	(SELECT count(*) from cmp_people where cpl_cmp_id=cmp_id) cmp_ppl_count
		from company
		where cmp_status = '".ACTIVE_STATUS."' and cmp_id = '".$cmp_id."'";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}

	public function company_getlist($resType,$dataOptn='')
	{
		$sqlQuery = "Select *,
		(select stm_name from state_master where stm_id = cmp_stm_id) cmp_state_name,
		(select gnp_name from gen_prm where gnp_value = cmp_type and gnp_group = 'cmp_type') cmp_type_name
		from company where cmp_status = '".ACTIVE_STATUS."' and cmp_type_id = ".COMPANY_TYPE_COMPANY;

		$filter_type = $this->nextasy_url_encrypt->decrypt_openssl($dataOptn['filter_type']);
		$filter_value = $this->nextasy_url_encrypt->decrypt_openssl($dataOptn['filter_value']);

		switch ($filter_type) {
			case COMPANY_FILTER_INDUSTRY:
			$sqlQuery .= " and cmp_industry = ".$filter_value;
				break;
			case COMPANY_FILTER_REVENUE:
			$sqlQuery .= " and cmp_anl_rev = ".$filter_value;
				break;
			case COMPANY_FILTER_STATE:
			$sqlQuery .= " and cmp_stm_id = ".$filter_value;
				break;	
			case COMPANY_FILTER_TYPE:
			$sqlQuery .= " and cmp_type = ".$filter_value;
				break;			
			default:
				# code...
				break;
		}

		$sqlQuery .= " order by cmp_crdt_dt desc";

		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;
	}

	public function account_getlist($resType,$dataOptn='')
	{
		$sqlQuery = "Select *,
		(select stm_name from state_master where stm_id = cmp_stm_id) cmp_state_name,
		(select gnp_name from gen_prm where gnp_value = cmp_type and gnp_group = 'cmp_type') cmp_type_name
		from company where cmp_status = '".ACTIVE_STATUS."' and cmp_type_id = ".COMPANY_TYPE_ACCOUNT." order by cmp_crdt_dt desc";
		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;
	}

	public function companyDelete($cmp_id)
  	{
  		$sql = "update company set cmp_status = 0  Where cmp_id = '".$cmp_id."'";
		$query = $this->db->query($sql);

		if(!empty($query))
		{
			return true;
	    }
	}

	function company_people_list($cmp_id,$resType,$dataOptn='')
	{
		$sqlQuery = "select *,
		(select ppl_name from people where cpl_ppl_id = ppl_id) cpl_ppl_name,
		(select ppl_met_on from people where cpl_cmp_id = ppl_id) cpl_met_on,
		(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_MOBILE." LIMIT 1) cpl_ppl_mobile,
		(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_EMAIL." LIMIT 1) cpl_ppl_email
		 from cmp_people where cpl_cmp_id =  '".$cmp_id."' and cpl_status = '".ACTIVE_STATUS."' order by cpl_crdt_dt desc";

		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;
	}

	public function getCompanyDropdown($search)
	{
		$genPrmSqlQuery = "SELECT  cmp_id as id,cmp_name as text FROM company where cmp_status IN ('".ACTIVE_STATUS."')";
		if($search !='')
		{
			$genPrmSqlQuery.=" and cmp_name LIKE '%".$search."%'";
		}
		$genPrmSqlQuery.=" ORDER BY cmp_id ASC";
		$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
		return $result;
	}

	public function getPeopleDropdown($search)
	{
		$genPrmSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN ('".ACTIVE_STATUS."')";
		if($search !='')
		{
			$genPrmSqlQuery.=" and ppl_name LIKE '%".$search."%'";
		}
		$genPrmSqlQuery.=" ORDER BY ppl_id ASC";
		$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
		return $result;
	}

	public function getDropdown($search,$gpm_group)
	{
		$genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='".$gpm_group."' ";
		if($search !='')
			{
				$genPrmSqlQuery.="and gnp_name LIKE '%".$search."%'";
			}
		$genPrmSqlQuery.="and   gnp_status='".ACTIVE_STATUS."' ORDER by gnp_order ASC";
		switch ($gpm_group) {
			case COMPANY_INDUSTRY:
						$resetResult     = array('id'=>'0','text'=>'Select industry name');
			    	break;
			case COMPANY_TYPE:
						$resetResult     = array('id'=>'0','text'=>'Select company type');
			    	break;
			case COMPANY_ANNUAL_REV:
						$resetResult     = array('id'=>'0','text'=>'Select company annual revenue');
			    	break;
		}
		$queryResult = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result_array');
		if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
		return $queryResult;
	}

	public function getStateDropdown($search)
	{
		$genPrmSqlQuery = "SELECT  stm_id as id,stm_name as text FROM state_master where stm_status='".ACTIVE_STATUS."' ";
		if($search !='')
			{
				$genPrmSqlQuery.=" and stm_name LIKE '%".$search."%'";
			}
		$genPrmSqlQuery.= "ORDER by stm_id ASC";
		$resetResult     = array('id'=>'0','text'=>'Please Select State');
		$queryResult = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result_array');
		if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
		return $queryResult;
	}

	public function getCompPplById($cpl_id)
	{
			$sqlQuery = "Select *,fnGetPeopleNameByID(cpl_ppl_id) ppl_name,
				(select cmp_name from company where company.cmp_id = cmp_people.cpl_cmp_id and cmp_status In ('".ACTIVE_STATUS."'))cmp_name
					from cmp_people where cpl_status = '".ACTIVE_STATUS."' and cpl_id = ".$cpl_id;
			$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
			return $row;
	}
    
    public function getEmployeeforDropdown($search)
    {
       	$teamSqlQuery = "select * from (select emp_ppl_id as id, (select ppl_name from people where ppl_id = emp_ppl_id) text, emp_crdt_dt from employee where emp_status IN (".ACTIVE_STATUS.") ";
       	
        if($search !='')
        {
          $teamSqlQuery.=" and (SELECT ppl_name FROM people WHERE ppl_id = emp_ppl_id and ppl_status = 1) LIKE '%".$search."%' ";
        }
        $teamSqlQuery.=" ) a ORDER BY emp_crdt_dt DESC";

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

	public function updateCompanyCustomData()
	{
	  	if(isset($_POST['field']) && $_POST['field'])
	  		$cmpData = array($_POST['field'] => $_POST['field_value']);
	  	else
	  		$cmpData = $_POST;
	   
	    $cmp_id = $_POST['cmp_id'];

	    if (!empty($cmpData))
	      return $this->home_model->update('cmp_id', $cmp_id, $cmpData, 'company');
	}
}
