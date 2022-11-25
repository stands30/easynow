<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Gen_prm_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

		public function getGnpList($resType,$dataOptn='')
		{
			$gpn_id = 0;
	
			if(isset($dataOptn['gnp_id']))
				$gpn_id = $dataOptn['gnp_id'];

			$genPrmSqlQuery = "SELECT group_concat(gpn_group SEPARATOR '\',\'') gpn_group  FROM gen_prm_name where gpn_status IN ('".ACTIVE_STATUS."') and gpn_visible='".ACTIVE_STATUS."' ";

			if($gpn_id > 0)
				$genPrmSqlQuery .= " and gpn_id = ".$gpn_id;

			$row = $this->home_model->executeSqlQuery($genPrmSqlQuery,'row');

			$genPrmSqlQuery = "SELECT  *, (select gpn_title from gen_prm_name where gpn_group = gnp_group) gpn_title, gnp_id as gnp_encrypt_id FROM gen_prm where gnp_status != ".DELETE_STATUS."   and  gnp_group in ('".$row->gpn_group."') order by gnp_group, gnp_order";

			//$result = $this->home_model->executeDataTableSqlQuery($genPrmSqlQuery,$resType,$dataOptn);
 			//$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result_array');
			//return $result;

			//return $this->home_model->executeSqlQuery($genPrmSqlQuery,'result_array');
			return $this->home_model->executeDataTableSqlQuery($genPrmSqlQuery,$resType,$dataOptn);
		}

		public function getGenPrmById($gnp_id)
		{

				$sqlQuery = "Select *	from gen_prm where  gnp_id = ".$gnp_id;
				$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
				return $row;
		}

		public function getGenGroupDropdown($search)
    	{
			// $genPrmSqlQuery = "SELECT * from (select gnp_id as id,gnp_group as text FROM gen_prm where gnp_status IN ('".ACTIVE_STATUS."') and gnp_visible='".ACTIVE_STATUS."'  group by  gnp_group )gen";
			// if($search !='')
			//   {
			//     $genPrmSqlQuery.=" where gen.text LIKE '%".$search."%' ";
			//   }
			// $genPrmSqlQuery.=" ORDER BY gen.id";

			$genPrmSqlQuery = "SELECT   gpn_id as id,gpn_title as text,gpn_group as 'data-gnp_group' FROM gen_prm_name where gpn_status IN ('".ACTIVE_STATUS."') and gpn_visible='".ACTIVE_STATUS."'";
			if($search !='')
			{
				$genPrmSqlQuery.=" and gpn_title LIKE '%".$search."%'";
			}

			$resetResult     = array('id'=>'0','text'=>'Please Select Parameter Group');
			$queryResult = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
				 if($search =='')
			  {
			    array_unshift($queryResult,$resetResult);
			  }
			return $queryResult;
		}

		public function deleteGenParam($gnp_id)
		{

			$sql = "Update gen_prm set gnp_status = ".DELETE_STATUS."  Where gnp_id = ".$gnp_id;
			$query = $this->db->query($sql);
			if(!empty($query))
			{
			return true;
		    }
		}

	public function getGenPrmIncrnValue($gnp_group)
	{
		$sqlQuery = "select (ifnull(max(gnp_value),0) + 1) new_gnp_value from gen_prm where gnp_group = '".$gnp_group."'";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}

	public function getGpnDatabyGpnID($gnp_id)
	{
		$sqlQuery = "select gpn_id, gpn_title, gpn_group from gen_prm_name where gpn_id = '".$gnp_id."' ";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}

	public function getGpnDatabyGnpID($gnp_id)
	{
		$sqlQuery = "select gpn_id, gpn_title, gpn_group from gen_prm_name where gpn_group = (select gnp_group from gen_prm where gnp_id = '".$gnp_id."') ";
		$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
		return $row;
	}

	function updateDefaultvalue($group_name, $value)
	{
		$sql = "Update gen_prm set gnp_default = ".GEN_PRM_DEFAULT_NO."  Where gnp_group = '".$group_name."'";
		$this->db->query($sql);
		$sql = "Update gen_prm set gnp_default = ".GEN_PRM_DEFAULT_YES."  Where gnp_group = '".$group_name."' and gnp_value = ".$value;
		$this->db->query($sql);
	}
}
