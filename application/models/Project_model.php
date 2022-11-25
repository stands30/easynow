<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Project_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
  	 public function getPeopleDropdown($search='',$managed_by='')
    {
        $sqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN ('".ACTIVE_STATUS."')  ";
         if($managed_by !='' && $managed_by != 0)
        {
          $sqlQuery.=" and ppl_id IN (SELECT emp_ppl_id from employee where emp_status = '" . ACTIVE_STATUS . "') ";
        }
        
        if($search !='')
        {
          $sqlQuery.=" and ppl_name LIKE '%".$search."%' ";
        }
        $sqlQuery.="  ORDER BY ppl_name ASC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>' Please Select');
        $queryResult     = $this->home_model->executeSqlQuery($sqlQuery,'result');
        if($search =='')
        {
          array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
  	public function getCompanyDropdown($search)
  	{
	    $SqlQuery = "SELECT cmp_id as id, cmp_name as text from company where cmp_status IN (" . ACTIVE_STATUS . ")";
	    if ($search != '')
	    {
	      $SqlQuery.= " and cmp_name LIKE '%" . $search . "%' ";
	    }
	    $SqlQuery.= "  ORDER BY cmp_crdt_dt ASC";
	    $queryResult = $this->home_model->executeSqlQuery($SqlQuery, 'result');
	    return $queryResult;
  	}
  	public function getdropdown($group,$search)
  	{
		$SqlQuery = "SELECT gnp_value as id, gnp_name as text from gen_prm where gnp_status=" . ACTIVE_STATUS . " and gnp_group='".$group."'";
		if ($search != '')
		{
	  		$SqlQuery.= " and gnp_name LIKE '%" . $search . "%' ";
		}
		$SqlQuery.= "  ORDER BY gnp_order ";
		$queryResult = $this->home_model->executeSqlQuery($SqlQuery, 'result');
		return $queryResult;
  	}
  	 public function getProjectById($slug)
    {
      $sqlQuery = "Select *
      ,getGenPrmValueByGroup('prj_project_status',prj_project_status) as prj_project_status_value 
      ,(select cmp_name from company where cmp_id=prj_cmp_id) as prj_cmp_id_value,
      (select ppl_name from people where ppl_id=prj_manage_by) as prj_manage_by_value,
      (IFNULL((select MIN(prj_id) from project where prj_id > '" . $slug . "' and prj_status='" . ACTIVE_STATUS . "'),(SELECT MIN(prj_id) from project where prj_status='" . ACTIVE_STATUS . "'))) next_project,
      (IFNULL((select MAX(prj_id) from project where prj_id < '" . $slug . "' and prj_status='" . ACTIVE_STATUS . "'),(SELECT MAX(prj_id) from project where prj_status='" . ACTIVE_STATUS . "'))) prev_project,
      fnNextasyDate(prj_crdt_dt) as created_on,fnGetPeopleNameByID(prj_crdt_by) as prj_created_by ".checkPrivate('project-list', 'prj_crdt_by')."
      from project where prj_status = '".ACTIVE_STATUS."' and prj_id='".$slug."' ";
          $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
      return $row;
    }
    public function project_getlist($resType,$dataOptn='')
    {
      $sqlQuery = "Select *,(DATE_FORMAT(prj_crdt_dt, '%d %M, %Y')) as crdt_dt,(select cmp_name from company where cmp_id=prj_cmp_id) as cmp_value,(select ppl_name from people where ppl_id=prj_manage_by) as manage_by_value,getGenPrmValueByGroup('prj_project_status',prj_project_status) as prj_project_status_value " . checkPrivate('project-list', 'prj_crdt_by') . "
                  from project where prj_status = '".ACTIVE_STATUS."' order by prj_id desc";
      $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
      return $result;
    }
  	public function project_save()
    {
    $data =  $this->input->post();
        $prj = array(
          'prj_id'                 => $data['prj_id'],
          'prj_title'              => $data['title'],
          'prj_cmp_id'             => $data['cmp_id'],
          'prj_work_ord'           => $data['work_ord'],
          'prj_project_status'     => $data['project_status'],
          'prj_manage_by'      	   => $data['manage_by'],
          'prj_site_loc' 		   => $data['site_loc'],
          'prj_site_add'      	   => $data['site_add'],
          'prj_desc'           	   => $data['desc'],
          'prj_crdt_by'            => $this->session->userdata(PEOPLE_SESSION_ID),
          'prj_crdt_dt'            => date('Y-m-d'),
        );
        if ($data['prj_id']=='') {
          unset($data['prj_id']);
          $inserted_id     = $this->home_model->insert('project', $prj);
        }
        else{
          $inserted_id     = $this->home_model->update('prj_id', $prj['prj_id'], $prj, 'project');
        }
        return $inserted_id;
    }
    public function updateProjectCustomData()
    {
      if(isset($_POST['field']) && $_POST['field'])
        $prjData = array($_POST['field'] => $_POST['field_value']);
      else
        $prjData = $_POST;
      $prj_id = $_POST['prj_id'];
      if (!empty($prjData))
        return $this->home_model->update('prj_id', $prj_id, $prjData, 'project');
    }
}