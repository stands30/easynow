<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Target_model extends CI_Model
{
	/**
	* Instanciar o CI
	*/
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

		public function getGenPrmforDropdown($tgt_type,$search='')
    {
			switch ($tgt_type) {
				case TARGET_TYPE_USER:
					$genPrmSqlQuery = "SELECT ppl_id as id,ppl_name as text FROM people where  ppl_status IN (".ACTIVE_STATUS.")";
					if($search !='')
		        {
		          $genPrmSqlQuery.=" and ppl_name LIKE '%".$search."%'";
		        }
					$resetResult     = array('id'=>'0','text'=>'Select  People');
					break;
				case TARGET_TYPE_STAGE:
					$genPrmSqlQuery = "SELECT gnp_value as id,gnp_name as text FROM gen_prm where gnp_group = 'led_lead_stage' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS;
					if($search !='')
		        {
		          $genPrmSqlQuery.=" and gnp_name LIKE '%".$search."%'";
		        }
					$resetResult     = array('id'=>'0','text'=>'Select Lead Stage');
					break;
				case TARGET_TYPE_PRODUCT:
					$genPrmSqlQuery = "SELECT prd_id as id,prd_name as text FROM product where prd_status IN (".ACTIVE_STATUS.")";
					if($search !='')
		        {
		          $genPrmSqlQuery.=" and prd_name LIKE '%".$search."%'";
		        }
					$resetResult     = array('id'=>'0','text'=>'Select  Product');
				  break;
				case TARGET_TYPE_SOURCE:
					$genPrmSqlQuery = "SELECT gnp_value as id,gnp_name as text FROM gen_prm where gnp_group = 'led_src' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS;
					if($search !='')
		        {
		          $genPrmSqlQuery.=" and prd_name LIKE '%".$search."%'";
		        }
					$resetResult     = array('id'=>'0','text'=>'Select Lead Source');
			   break;
				 case 'durability':
					$genPrmSqlQuery = "SELECT gnp_value as id,gnp_name as text FROM gen_prm where gnp_group = 'tgt_durability' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS;
					if($search !='')
						{
							$genPrmSqlQuery.=" and prd_name LIKE '%".$search."%'";
						}
					$resetResult     = array('id'=>'0','text'=>'Select Durability');
 				 break;
				default:
					// code...
					break;
			}
				$queryResult = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
				  if($search =='')
				  {
				    array_unshift($queryResult,$resetResult);
				  }
				return $result;
    }

		public function getTargetForList()
		{
			$sqlQuery = "Select *,tgt_id as tgt_encrypt_id,
                  (select gnp_name from gen_prm where gnp_group = 'tgt_durability' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS." and gnp_value = tgt_durability )tgt_durability_name,
						 			(select ppl_name from people where ppl_id = tgt_crdt_by)crdt_by
						 			from target where tgt_status = '".ACTIVE_STATUS."' order by tgt_crdt_dt desc";
			$result = $this->home_model->executeSqlQuery($sqlQuery,'result_array');
			return $result;
		}

		public function getTargetForEdit($tgt_id)
		{
			$sqlQuery = "Select *,(select gnp_name from gen_prm where gnp_group = 'tgt_durability' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS." and gnp_value = tgt_durability )tgt_durability_name,
										(IFNULL((select MIN(tgt_id) from target where tgt_id > '".$tgt_id."'),(SELECT MIN(tgt_id) from target))) next,
										(IFNULL((select MAX(tgt_id) from target where tgt_id < '".$tgt_id."'),(SELECT MAX(tgt_id) from target))) prev,
										(select ppl_name from people where ppl_id = tgt_crdt_by )tgt_crdt_by_name
										from target where tgt_status = '".ACTIVE_STATUS."' and tgt_id = ".$tgt_id;
			$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
			// print_r($row);
			return $row;
		}

		public function getTargetType($tgt_id,$sbt_type = '')
		{

			switch ($sbt_type) {
					case TARGET_TYPE_USER:
						$sqlQuery = "Select sbt_id,sbt_title,sbt_qty,sbt_volume,sbt_type_id,sbt_durability,(select ppl_name from people where ppl_id = sbt_type_id )sbt_type_name,
						            date_format(sbt_from_dt, '%d-%m-%Y')sbt_from_dt,date_format(sbt_to_dt, '%d-%m-%Y')sbt_to_dt,
												(select gnp_name from gen_prm where gnp_group = 'tgt_durability' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS." and gnp_value = sbt_durability )sbt_durability_name
												from sub_target where sbt_status = '".ACTIVE_STATUS."' and sbt_tgt_id = ".$tgt_id." and sbt_type = ".$sbt_type;
						break;
					case TARGET_TYPE_STAGE:
						$sqlQuery = "Select sbt_id,sbt_title,sbt_qty,sbt_volume,sbt_type_id,sbt_durability,(select gnp_name from gen_prm where gnp_group = 'led_lead_stage' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS." and gnp_value = sbt_type_id )sbt_type_name,
						            date_format(sbt_from_dt, '%d-%m-%Y')sbt_from_dt,date_format(sbt_to_dt, '%d-%m-%Y')sbt_to_dt,
												(select gnp_name from gen_prm where gnp_group = 'tgt_durability' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS." and gnp_value = sbt_durability )sbt_durability_name
												from sub_target where sbt_status = '".ACTIVE_STATUS."' and sbt_tgt_id = ".$tgt_id." and sbt_type = ".$sbt_type;
						break;
					case TARGET_TYPE_PRODUCT:
						$sqlQuery = "Select sbt_id,sbt_title,sbt_qty,sbt_volume,sbt_type_id,sbt_durability,(select prd_name from product where prd_id = sbt_type_id)sbt_type_name,
						            date_format(sbt_from_dt, '%d-%m-%Y')sbt_from_dt,date_format(sbt_to_dt, '%d-%m-%Y')sbt_to_dt,
												(select gnp_name from gen_prm where gnp_group = 'tgt_durability' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS." and gnp_value = sbt_durability )sbt_durability_name
												from sub_target where sbt_status = '".ACTIVE_STATUS."' and sbt_tgt_id = ".$tgt_id." and sbt_type = ".$sbt_type;
						break;
					case TARGET_TYPE_SOURCE:
						$sqlQuery = "Select sbt_id,sbt_title,sbt_qty,sbt_volume,sbt_type_id,sbt_durability,(select gnp_name from gen_prm where gnp_group = 'led_src' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS." and gnp_value = sbt_type_id )sbt_type_name,
						            date_format(sbt_from_dt, '%d-%m-%Y')sbt_from_dt,date_format(sbt_to_dt, '%d-%m-%Y')sbt_to_dt,
												(select gnp_name from gen_prm where gnp_group = 'tgt_durability' and gnp_status IN (".ACTIVE_STATUS.") and gnp_visible = ".ACTIVE_STATUS." and gnp_value = sbt_durability )sbt_durability_name
												from sub_target where sbt_status = '".ACTIVE_STATUS."' and sbt_tgt_id = ".$tgt_id." and sbt_type = ".$sbt_type;
					 break;

					default:
						// code...
						break;
				}
			$result = $this->home_model->executeSqlQuery($sqlQuery,'result');

			return $result;
		}





		public function deleteTargetProduct($sbt_ids = array(),$tgt_id = '')
		{
		  $this->db->where_not_in('sbt_id',$sbt_ids);
		  $this->db->where('sbt_tgt_id',$tgt_id);
		  $this->db->delete('sub_target');
		  return $tgt_id;
		}

		// public function targetDelete($id)
	  // {
		// 	$sql1 = "Delete from tgtimate_product  Where sbt_tgt_id = ".$id;
	  // 	$sql2 = "Delete from tgtimate  Where tgt_id = ".$id;
		// 	$query1 = $this->db->query($sql1);
		// 	$query2 = $this->db->query($sql2);
		// 	if(!empty($query1) and !empty($query2))
		// 	{
		// 	return true;
	  //   }
	  // }

}
