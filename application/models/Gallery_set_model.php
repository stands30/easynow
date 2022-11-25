<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Gallery_set_model extends CI_Model
{
	/**
	* Instanciar o CI
	*/
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

		public function getGenPrmforDropdown($genPrmGroup,$search='')
    {
        $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='".$genPrmGroup."' and gnp_status IN (".ACTIVE_STATUS.")  ";
        if($search !='')
        {
          $genPrmSqlQuery.=" and gnp_name LIKE '%".$search."%' ";
        }
        $genPrmSqlQuery.="  ORDER BY gnp_order ASC";
        $result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
        return $result;
    }

		public function getGalleryForList($resType,$dataOptn='')
		{
			$sqlQuery = "Select *,(DATE_FORMAT(gls_crdt_dt, '%d/%m/%Y')) gls_crdt_date,
									(select gnp_name from gen_prm where gen_prm.gnp_value = gallery_set.gls_type and gnp_group = 'gallery_type')gls_types
									from gallery_set where gls_status = '".ACTIVE_STATUS."'";
			$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
			return $result;
		}

		public function getGalleryForEdit($gls_id)
		{
			$sqlQuery = "Select *,(select gnp_name from gen_prm where gen_prm.gnp_value = gallery_set.gls_type and gnp_group = 'gallery_type')gls_types from gallery_set where gls_status = '".ACTIVE_STATUS."' and gls_id = ".$gls_id;
			$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
			return $row;
		}

		public function galleryDelete($id)
	  {
	  	$sql = "delete from  gallery_set  Where gls_id = ".$id;
			$sql .= "  ORDER BY gls_order_by ASC";
			$query = $this->db->query($sql);
			if(!empty($query))
			{
			return true;
	    }
	  }
	  public function getLoginGallery()
		{
			$sqlQuery = "Select * from gallery_set where gls_status = '".ACTIVE_STATUS."' and gls_type = ".LOGIN_GALLERY;
			$result = $this->home_model->executeSqlQuery($sqlQuery,'result');
			return $result;
		}

}
