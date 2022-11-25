<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Client_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

	public function getClientById($cmp_id)
	{

		$sqlQuery = "
		select *,
		(select gnp_name from gen_prm where gnp_group = 'cpl_designation' and gnp_value = cpl_designation) cpl_designation_name,
		(select gnp_name from gen_prm where gnp_group = 'cmp_industry_type' and gnp_value = cmp_industry) cmp_industry_name,
		(select gnp_name from gen_prm where gnp_group = 'cmp_type' and gnp_value = cmp_type) cmp_type_name,
		(select gnp_name from gen_prm where gnp_group = 'cmp_anl_rev' and gnp_value = cmp_anl_rev) cmp_annual_rev,
		(select stm_name from state_master where  stm_id = cmp_stm_id) cmp_stm_name,
		(select ppl_name from people where ppl_id = cmp_crdt_by) cmp_crdt_by,
    (SELECT count(*) from cmp_people where cpl_cmp_id=cmp_id) cmp_ppl_count,
		(IFNULL((select MIN(cli_cmp_id) from client where cli_cmp_id > '".$cmp_id."'),(SELECT MIN(cli_cmp_id) from client))) next,
		(IFNULL((select MAX(cli_cmp_id) from client where cli_cmp_id < '".$cmp_id."'),(SELECT MAX(cli_cmp_id) from client))) prev
		from company
		where cmp_status = '".ACTIVE_STATUS."' and cmp_id = '".$cmp_id."'";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}

	public function client_getlist($resType,$dataOptn='')
	{
		$sqlQuery = "SELECT *,(select gnp_name from gen_prm where gnp_group = 'cmp_industry_type' and gnp_value = cmp_industry) cmp_industry_name
		FROM `company` where cmp_id in ((select cli_cmp_id from client where cli_status = '".ACTIVE_STATUS."'))  order by cmp_crdt_dt desc";
		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;

	}

	public function companyDelete($id)
  	{
  		$sql = "update company set cmp_status = 0  Where cmp_id = '".$cmp_id."'";
		$query = $this->db->query($sql);

		if(!empty($query))
		{
		 return true;
    }
	}

	function client_people_list($cmp_id,$resType,$dataOptn='')
	{
		$sqlQuery = "select *,
		fnGetPeopleNameByID(cpl_ppl_id) cpl_ppl_name,
		(select ppl_met_on from people where cpl_cmp_id = ppl_id) cpl_met_on,
		(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_MOBILE.") cpl_ppl_mobile,
		(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_EMAIL.") cpl_ppl_email
		 from cmp_people where cpl_cmp_id =  '".$cmp_id."' and cpl_status = '".ACTIVE_STATUS."' order by cpl_crdt_dt desc";

		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;
	}

	public function getClientDropdown($search)
	{
		$genPrmSqlQuery = "SELECT  cmp_id as id,cmp_name as text FROM company where cmp_status IN ('".ACTIVE_STATUS."') and cmp_id in ((select cli_cmp_id from client where cli_status = '".ACTIVE_STATUS."'))";
		if($search !='')
			{
				$genPrmSqlQuery.="and cmp_name LIKE '%".$search."%'";
			}
		$genPrmSqlQuery.=" ORDER BY cmp_id ASC";
		$resetResult     = array('id'=>'0','text'=>'Select Client name');
		$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
		if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
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

		$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result_array');
		if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
		return $result;
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
		$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result_array');
		if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
		return $result;
	}

	public function getCompPplById($cpl_id)
	{
			$sqlQuery = "Select *,fnGetPeopleNameByID(cpl_ppl_id) ppl_name,
				(select cmp_name from company where company.cmp_id = cmp_people.cpl_cmp_id and cmp_status In ('".ACTIVE_STATUS."'))cmp_name
					from cmp_people where cpl_status = '".ACTIVE_STATUS."' and cpl_id = ".$cpl_id;
			$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
			return $row;
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
  }($queryResult, $resetResult);

    // ***** It is used to reset value of select2 ****** //

    return $queryResult;
  }
}
