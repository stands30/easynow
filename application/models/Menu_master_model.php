<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Menu_master_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

		public function getMnuList()
		{
			$bsnPrmSqlQuery = "SELECT  *,mnu_status as  mnu_status_name,mnu_id as mnu_encrypt_id   FROM menu_master where mnu_status != '".MENU_INACTIVE_STATUS."'";

 			$result = $this->home_model->executeSqlQuery($bsnPrmSqlQuery,'result_array');
			return $result;
		}

		public function getStatusforDropdown($gnp_group)
    {
			$genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_value != 3 and gnp_group = '".$gnp_group."'";
			$genPrmSqlQuery.=" ORDER BY gnp_id ASC";
			$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
			return $result;
		}

		public function getMnuById($mnu_id)
		{
				$sqlQuery = "Select *,mnu_status as  mnu_status_name,(select ppl_name from people where people.ppl_id = menu_master.mnu_crdt_by)crdt_by from menu_master where  mnu_id = ".$mnu_id;
				$row      = $this->home_model->executeSqlQuery($sqlQuery,'row');
				return $row;
		}

		public function deleteMnuParam($mnu_id)
	  {
			$sql = "Update menu_master set mnu_status = '".MENU_INACTIVE_STATUS."'  Where mnu_id = ".$mnu_id;
			$query = $this->db->query($sql);
			if(!empty($query))
			{
			return true;
	    }
	  }

}
