<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Business_param_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

		public function getBsnList($resType,$dataOptn='')
		{
			$bsnPrmSqlQuery = "SELECT  *,
			                    (SELECT gnp_name from gen_prm where gnp_status='".ACTIVE_STATUS."' and gnp_group='active_status' and gnp_value = bpm_status) bpm_status_name
											    FROM bsn_prm where bpm_status != ".DELETE_STATUS." and bpm_visible = ".ACTIVE_STATUS;
			$result = $this->home_model->executeDataTableSqlQuery($bsnPrmSqlQuery,$resType,$dataOptn);
			return $result;
 	
		}

		public function getStatusforDropdown($gnp_group)
    {
			$genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_value != 3 and gnp_group = '".$gnp_group."'";
			$genPrmSqlQuery.=" ORDER BY gnp_id ASC";
			$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
			return $result;
		}

		public function deleteBsnParam($bpm_id)
	  {

			$sql = "Update bsn_prm set bpm_status = ".DELETE_STATUS." , bpm_visible = ".INACTIVE_STATUS."   Where bpm_id = ".$bpm_id;
			$query = $this->db->query($sql);
			if(!empty($query))
			{
			return true;
	    }
	  }

}
