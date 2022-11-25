<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Event_model extends CI_Model
{

	function __construct()
    {

        parent::__construct();
    }
		public function getEventById($evt_id)
		{
				$sqlQuery = "Select *,(select ppl_name from people where people.ppl_id = event.evt_crdt_by) evt_crdt_by,
				fnGetPeopleNameByID(evt_managed_by) evt_managed_by_name,
				(IFNULL((select MIN(evt_id) from event where evt_id > '".$evt_id."'),(SELECT MIN(evt_id) from event))) next,
				(IFNULL((select MAX(evt_id) from event where evt_id < '".$evt_id."'),(SELECT MAX(evt_id) from event))) prev,
				(SELECT count(*) from event_people where epl_evt_id=evt_id) evt_ppl_count
				from event where evt_status = '".ACTIVE_STATUS."' and evt_id = ".$evt_id;
				$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
				return $row;
		}

		public function getEventForList($resType,$dataOptn='')
		{
			$sqlQuery = "Select *,evt_id as evt_encrypt_id from event where evt_status = '".ACTIVE_STATUS."' order by evt_crdt_dt desc";
			$result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
			return $result;
		}

		public function eventDelete($id,$type)
	  {

			switch ($type)
			{
				case '1':
					$sql = "update event set evt_status = 0  Where evt_id = ".$id;
					break;
				case '2':
					$sql = "update event_people set epl_status = 0  Where epl_id = ".$id;
					break;
				default:

					break;
			}
			$query = $this->db->query($sql);
			if(!empty($query))
			{
			return true;
	    }
	  }

		public function getEventForListing($evt_id,$resType,$dataOptn='')
		{
				$sqlQuery = "Select *,epl_id as epl_encrypt_id,epl_ppl_id as ppl_encrypt_id,
				fnGetPeopleNameByID(epl_ppl_id) ppl_name,
						(select ppl_name from people where ppl_id = event_people.epl_crdt_by and ppl_status = '".ACTIVE_STATUS."' )crtd_by,
                      IFNULL((DATE_FORMAT(epl_crdt_dt, '%d-%M-%Y')),'') epl_crdt_date
																from event_people where epl_status = '".ACTIVE_STATUS."' and epl_evt_id = ".$evt_id." order by epl_crdt_dt desc";
				$row = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
				return $row;
		}

		public function getPeopleforDropdown($search)
    {
			$genPrmSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN ('".ACTIVE_STATUS."')
												and ppl_id Not In (SELECT emp_ppl_id from employee where emp_dept = '".PEOPLE_ADMIN_DEPT."')";
			if($search !='')
				{
					$genPrmSqlQuery.="and ppl_name LIKE '%".$search."%'";
				}
			$genPrmSqlQuery.=" ORDER BY ppl_id ASC";
			$resetResult     = array('id'=>'0','text'=>'Please Select People');
			$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result_array');
			if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
			return $result;
		}

		public function getEventDropdown($search)
    {
			$genPrmSqlQuery = "SELECT  evt_id as id,evt_name as text FROM event where evt_status IN ('".ACTIVE_STATUS."')";
			if($search !='')
				{
					$genPrmSqlQuery.="and evt_name LIKE '%".$search."%'";
				}
			$genPrmSqlQuery.=" ORDER BY evt_id ASC";
			$resetResult     = array('id'=>'0','text'=>'Please Select Event');
			$result = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result_array');
			if($search =='')
		  {
		    array_unshift($queryResult,$resetResult);
		  }
			return $result;
		}

		public function getEventPplById($epl_id)
		{
			$sqlQuery = "Select *, fnGetPeopleNameByID(epl_ppl_id) ppl_name,
			(select evt_name from event where event.evt_id = event_people.epl_evt_id and evt_status In ('".ACTIVE_STATUS."'))evt_name
			from event_people where epl_status = '".ACTIVE_STATUS."' and epl_id = ".$epl_id;
			$row = $this->home_model->executeSqlQuery($sqlQuery,'row');
			return $row;
		}

	public function updateEventCustomData()
	{
	  	if(isset($_POST['field']) && $_POST['field'])
	  		$evtData = array($_POST['field'] => $_POST['field_value']);
	  	else
	  		$evtData = $_POST;
	   
	    $evt_id = $_POST['evt_id'];

	    if (!empty($evtData))
	      return $this->home_model->update('evt_id', $evt_id, $evtData, 'event');
	}

     public function getEmployeeforDropdown($search)
    {
       $teamSqlQuery = "select * from (select emp_ppl_id as id, (select ppl_name from people where ppl_id = emp_ppl_id) text, emp_crdt_dt from employee where emp_status IN (".ACTIVE_STATUS.")) a ";
        if($search !='')
        {
          $teamSqlQuery.=" and emp_name LIKE '%".$search."%' ";
        }
        $teamSqlQuery.="  ORDER BY emp_crdt_dt DESC";
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

}
