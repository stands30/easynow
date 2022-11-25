<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Sub_menu_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

		public function getSubMnuList()
		{
			$bsnPrmSqlQuery = "SELECT  *,sbm_status as  sbm_status_name,sbm_id as sbm_encrypt_id,
			(select mnu_name from  menu_master where menu_master.mnu_id = sm.sbm_mnu_id )mnu_name,
			(select sbm_name from sub_menu_master smm where smm.sbm_id = sm.sbm_parent_id)submnu_name
			FROM sub_menu_master sm where sbm_status != '".MENU_INACTIVE_STATUS."'";
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

		public function getMenusforDropdown()
    		{
			$genPrmSqlQuery = "SELECT  mnu_id as id,mnu_name as text FROM menu_master where mnu_status = '".MENU_ACTIVE_STATUS."'";
			$genPrmSqlQuery.=" ORDER BY mnu_id ASC";

			$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
			return $result;
		}

		public function getSubMenusforDropdown($search)
    		{
			$genPrmSqlQuery = "SELECT  sbm_id as id,sbm_name as text FROM sub_menu_master where sbm_status = '".MENU_ACTIVE_STATUS."'";
			$genPrmSqlQuery.=" and sbm_id <> ".$search['exclude']." ORDER BY sbm_id ASC";
			$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
			return $result;
		}

		public function getSubMnuById($sbm_id)
		{
				$sqlQuery = "Select *,sbm_status as  sbm_status_name,sbm_name as submnu_name,
										(select ppl_name from people where people.ppl_id = sm.sbm_crdt_by)crdt_by,
										(select mnu_name from  menu_master where menu_master.mnu_id = sm.sbm_mnu_id )mnu_name,
										(select sbm_name from sub_menu_master smm where smm.sbm_id = sm.sbm_parent_id)submnu_name
										from sub_menu_master sm where  sbm_id = ".$sbm_id;
				$row      = $this->home_model->executeSqlQuery($sqlQuery,'row');
				if(!isset($row->sbm_parent_id))
				{

					$sql = "select distinct sbm_name as submnu_name from  sub_menu_master where sbm_id = ".$result->sbm_parent_id;
					$row1 = $this->home_model->executeSqlQuery($sql,'row_array');
					$row->submnu_name = $row1->submnu_name;
				}

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
