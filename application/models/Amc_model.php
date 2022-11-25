<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Amc_model extends CI_Model
{

	

	public function getAmcById($amc_id)
	{

		$sqlQuery = "
		select *,
		(select cmp_name from company where cmp_id = amc_cmp_id and cmp_status = ".ACTIVE_STATUS.") amc_cmp_name,
		(select prd_name from product where prd_id = amc_prd_id and prd_status = ".ACTIVE_STATUS.") amc_prd_name,
		fnGetPeopleNameByID(amc_ppl_id) amc_ppl_name,
		(select inv_code from invoice where inv_id = amc_inv_id and inv_status = ".ACTIVE_STATUS.") amc_inv_name,
		(select gnp_name from gen_prm where gnp_group = 'amc_type_status' and gnp_value = amc_type_status) amc_type_status_name,
		(select gnp_name from gen_prm where gnp_group = 'amc_durations' and gnp_value = amc_duration_rad) amc_duration_rad_name,
		(select ppl_name from people where ppl_id = amc_crdt_by) amc_crdt_by_name,
		date_format(amc_start_date,'%m/%d/%Y') amc_start_dt_edit,
		date_format(amc_start_date,'%d %M %Y') amc_start_dt_detail,
		date_format(amc_renewal_date,'%m/%d/%Y') amc_renewal_dt_edit,
		date_format(amc_renewal_date,'%d %M %Y') amc_renewal_dt_detail,
		date_format(amc_crdt_dt,'%d/%m/%Y') amc_crdt_on_format,
		(IFNULL((select MIN(amc_id) from amc where amc_id > '".$amc_id."' and amc_status = '".ACTIVE_STATUS."'),(SELECT MIN(amc_id) from amc ))) next,
		(IFNULL((select MAX(amc_id) from amc where amc_id < '".$amc_id."' and amc_status = '".ACTIVE_STATUS."'),(SELECT MAX(amc_id) from amc ))) prev
		from amc
		where amc_status = '".ACTIVE_STATUS."' and amc_id = '".$amc_id."'";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}

	function amc_getlist($amc_list_by,$resType,$dataOptn='')
	{
		$condition = '';
		
		switch ($amc_list_by) {
		    case 'Future':
		        $condition = " and date(amc_start_date) > CURDATE()";
		        break;
		   
		    case 'Due':
                $condition = " and amc_start_date < NOW() and date(amc_start_date) <> CURDATE()";
		        break;
		    case 'Upcoming':
		        $condition = " and date(amc_start_date) = CURDATE() ";
		        break;
		    default:
        		$condition = " ";
		}

		$sqlQuery = "select *,
		(select cmp_name from company where cmp_id = amc_cmp_id and cmp_status = ".ACTIVE_STATUS.") amc_cmp_name,
		(select prd_name from product where prd_id = amc_prd_id and prd_status = ".ACTIVE_STATUS.") amc_prd_name,
		fnGetPeopleNameByID(amc_ppl_id) amc_ppl_name,
		(select inv_code from invoice where inv_id = amc_inv_id and inv_status = ".ACTIVE_STATUS.") amc_inv_name,
		(select gnp_name from gen_prm where gnp_group = 'amc_type_status' and gnp_value = amc_type_status) amc_type_status_name,
		(select gnp_name from gen_prm where gnp_group = 'amc_durations' and gnp_value = amc_duration_rad) amc_duration_rad_name,
		(select ppl_name from people where ppl_id = amc_crdt_by) amc_crdt_by_name,
		date_format(amc_start_date,'%m/%d/%Y') amc_start_dt_edit,
		date_format(amc_start_date,'%d %M %Y') amc_start_dt_detail,
		date_format(amc_renewal_date,'%m/%d/%Y') amc_renewal_dt_edit,
		date_format(amc_renewal_date,'%d %M %Y') amc_renewal_dt_detail,
		date_format(amc_crdt_dt,'%d/%m/%Y') amc_crdt_on_format
		from amc
		where amc_status = '".ACTIVE_STATUS."'
		".$condition."
		order by amc_start_date ASC";
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
		fnGetPeopleNameByID(cpl_ppl_id) cpl_ppl_name,
		(select ppl_met_on from people where cpl_cmp_id = ppl_id) cpl_met_on,
		(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_MOBILE." LIMIT 1) cpl_ppl_mobile,
		(select pct_value from people_contact where pct_ppl_id = cpl_ppl_id and pct_type = ".PEOPLE_CONTACT_TYPE_EMAIL." LIMIT 1) cpl_ppl_email
		 from cmp_people where cpl_cmp_id =  '".$cmp_id."' and cpl_status = '".ACTIVE_STATUS."' order by cpl_crdt_dt desc";

		$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
		return $result;
	}

	public function getCompanyDropdown($search,$ppl_id)
	{
		$sqlQuery = "SELECT cmp_id as id,cmp_name as text FROM company where cmp_status IN ('".ACTIVE_STATUS."') and cmp_id in (select cpl_cmp_id from cmp_people where cpl_ppl_id = ".$ppl_id." and cpl_status = ".ACTIVE_STATUS." )";
		if($search !='')
			{
				$sqlQuery.=" and cmp_name LIKE '%".$search."%'";
			}
		$sqlQuery.=" ORDER BY cmp_id ASC";
        $resetResult     = array('id'=>'0','text'=>'Please Select Product');
		$queryResult = $this->home_model->executeSqlQuery($sqlQuery,'result');
		 if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
		return $queryResult;
	}

	public function getProductForDropdown($search)
    {
        $sqlQuery = "SELECT  prd_id as id,prd_name as text FROM product where prd_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $sqlQuery.=" and prd_name LIKE '%".$search."%' ";
        }
        $sqlQuery.="  ORDER BY prd_crdt_dt ASC";
        // ***** It is used to reset value of select2 ****** //
       $resetResult     = array('id'=>'0','text'=>'Please Select Product');
		$queryResult = $this->home_model->executeSqlQuery($sqlQuery,'result');
		 if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
      	
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }

    public function getPeopleForDropdown($search)
    {
        $sqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $sqlQuery.=" and ppl_name LIKE '%".$search."%' ";
        }
        $sqlQuery.="  ORDER BY ppl_crdt_dt ASC";
        // ***** It is used to reset value of select2 ****** //
       $resetResult     = array('id'=>'0','text'=>'Please Select Product');
		$queryResult = $this->home_model->executeSqlQuery($sqlQuery,'result');
		 if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
      	
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }

    public function getInvoiceForDropdown($search)
    {
        $sqlQuery = "SELECT  inv_id as id,inv_code as text FROM invoice where inv_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $sqlQuery.=" and inv_code LIKE '%".$search."%' ";
        }
        $sqlQuery.="  ORDER BY inv_crdt_dt ASC";
        // ***** It is used to reset value of select2 ****** //
       $resetResult     = array('id'=>'0','text'=>'Please Select Product');
		$queryResult = $this->home_model->executeSqlQuery($sqlQuery,'result');
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
        $genPrmSqlQuery.="  ORDER BY gnp_order asc";
        // ***** It is used to reset value of select2 ****** //
         $resetResult     = array('id'=>'0','text'=>'Please Select Product');
		$queryResult = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
		 if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
      	
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }

	public function updateAmcCustomData()
    {
        if(isset($_POST['field']) && $_POST['field'])
            $amcData = array($_POST['field'] => $_POST['field_value']);
        else
            $amcData = $_POST;
       
        $amc_id = $_POST['amc_id'];
        if (!empty($amcData))
          return $this->home_model->update('amc_id', $amc_id, $amcData, 'amc');
    }

	public function deleteAmc($amc_id)
  	{
  		$sql = "update amc set amc_status = ".INACTIVE_STATUS."  Where amc_id = '".$amc_id."'";
		$query = $this->db->query($sql);

		if(!empty($query))
		{
			return true;
	    }
	}
}
