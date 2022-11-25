
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Task_model extends CI_Model
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getDashboardData()
    {
        $sql_total  = "select count(tsk_id) total from task";
        $sql_mytask = "select count(tsk_id) mytask from task where tsk_status = '".ACTIVE_STATUS."' and tsk_user_ass_to = ".$this->session->userdata(PEOPLE_SESSION_ID);

        $sql_priority   = "select 
                (select count(tsk_id) from task where tsk_priority = ".TASK_PRIORITY_LOW." and tsk_status = '".ACTIVE_STATUS."') low,
                (select count(tsk_id) from task where tsk_priority = ".TASK_PRIORITY_MEDIUM." and tsk_status = '".ACTIVE_STATUS."') medium,
                (select count(tsk_id) from task where tsk_priority = ".TASK_PRIORITY_HIGH." and tsk_status = '".ACTIVE_STATUS."') high,
                (select count(tsk_id) from task where tsk_priority = ".TASK_PRIORITY_CRITICAL." and tsk_status = '".ACTIVE_STATUS."') critical;";


        $sql_status     = "select 
                (select count(tsk_id) from task where tsk_progress_status = ".TASK_PROGRESS_STATUS_OPEN." and tsk_status = '".ACTIVE_STATUS."') open,
                (select count(tsk_id) from task where tsk_progress_status = ".TASK_PROGRESS_STATUS_REVIEW." and tsk_status = '".ACTIVE_STATUS."') reviewed,
                (select count(tsk_id) from task where tsk_progress_status = ".TASK_PROGRESS_STATUS_RELEASED." and tsk_status = '".ACTIVE_STATUS."') released,
                (select count(tsk_id) from task where tsk_progress_status = ".TASK_PROGRESS_STATUS_CLOSED." and tsk_status = '".ACTIVE_STATUS."') closed;";

        return array(
            'total'     =>  $this->home_model->executeSqlQuery($sql_total,'row')->total,
            'mytask'    =>  $this->home_model->executeSqlQuery($sql_mytask,'row')->mytask,
            'priority'  =>  $this->home_model->executeSqlQuery($sql_priority,'row'),
            'status'    =>  $this->home_model->executeSqlQuery($sql_status,'row')
        );
    }

    public function getTaskById($tsk_id)
    {
        $sqlQuery = "
        select *,
        (select gnp_name from gen_prm where gnp_group = 'tsk_progress_status' and gnp_value = tsk_progress_status) tsk_progress_status_name,
        (select cmp_name from company where cmp_id = tsk_client_id) tsk_client_id_name,
        (select cmp_name from company where cmp_id = tsk_related_cmp) tsk_related_cmp_name,
        date_format(tsk_datetime, '%d-%b-%Y %h:%i %p') tsk_datetime_format,
        date_format(tsk_due_dt, '%d-%b-%Y') tsk_due_dt_format,
        date_format(tsk_due_dt, '%d-%m-%Y %h:%i:%s') tsk_due_dt,
        (select ppl_name from people where ppl_id = (select led_ppl_id from lead where led_id = tsk_led_id)) tsk_lead_name,
        (select gnp_name from gen_prm where gnp_group = 'tsk_priority' and gnp_value = tsk_priority) tsk_priority_name,
        (select ppl_name from people where ppl_id = tsk_user_ass_to) tsk_user_ass_to_name,
        (select ppl_name from people where ppl_id = tsk_supporter) tsk_supporter_name,
        (select ppl_name from people where ppl_id = tsk_reviewer) tsk_reviewer_name,
        (select ppl_name from people where ppl_id = tsk_user_ass_by) tsk_user_ass_by_name,
        (select ppl_name from people where ppl_id = tsk_related_ppl) tsk_related_ppl_name,
        (select gnp_name from gen_prm where gnp_group = 'tsk_type' and gnp_value = tsk_type) tsk_type_name,
        (select ppl_name from people where ppl_id = tsk_crdt_by) tsk_crdt_by_name,
        date_format(tsk_crdt_dt, '%d-%b-%Y %h:%i %p') tsk_crdt_dt_format,
        date_format(tsk_updt_dt, '%d-%b-%Y %h:%i %p') tsk_updt_dt_format,
        (IFNULL((select MIN(tsk_id) from task where tsk_id > '".$tsk_id."'),(SELECT MIN(tsk_id) from task))) next_task,
        (IFNULL((select MAX(tsk_id) from task where tsk_id < '".$tsk_id."'),(SELECT MAX(tsk_id) from task))) prev_task
        from task
        where tsk_status = '".ACTIVE_STATUS."' and tsk_id = '".$tsk_id."'";
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        return $row;
    }

    public function getTaskAttById($tsk_id)
    {
        $sqlQuery = "select *
        from task_att
        where tka_status = '".ACTIVE_STATUS."' and tka_tsk_id = '".$tsk_id."'";
        $result = $this->home_model->executeSqlQuery($sqlQuery,'result');
        return $result;
    }

/*    public function task_getlist($resType,$dataOptn='')
    {
        $sqlQuery = "
        select *,
        (select gnp_name from gen_prm where gnp_group = 'task_status' and gnp_value = tsk_progress_status) tsk_progress_status_name,
        (select cmp_name from company where cmp_id = tsk_client_id) tsk_client_id_name,
        date_format(tsk_due_dt, '%d-%b-%Y %h:%i %p') tsk_due_dt_format,
        (select ppl_name from people where ppl_id = tsk_user_ass_to) tsk_user_ass_to_name,
        (select ppl_name from people where ppl_id = tsk_user_ass_by) tsk_user_ass_by_name,
        (select gnp_name from gen_prm where gnp_group = 'tsk_priority' and gnp_value = tsk_priority) tsk_priority_name,
        date_format(tsk_datetime, '%d-%m-%Y %h:%i %p') tsk_datetime_format
        from task
        where tsk_status = '".ACTIVE_STATUS."' and tsk_user_ass_to = ".$this->session->userdata(PEOPLE_SESSION_ID)." order by tsk_crdt_dt desc";
        $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
            return $result;
    }*/

    public function task_getlist($resType,$dataOptn='')
    {
        $condition = '';

        //$by_me = " and tsk_user_ass_by = '".$this->session->userdata(PEOPLE_SESSION_ID)."' ";

        switch ($dataOptn['status']) {
          case 'today':
            $condition = ' and tsk_due_dt = date(now()) ';
            break;
          case 'mytask':
            $condition = ' and tsk_user_ass_to = "'.$this->session->userdata(PEOPLE_SESSION_ID).'" ';
            break;
          case 'mysupport':
            $condition = ' and tsk_supporter = "'.$this->session->userdata(PEOPLE_SESSION_ID).'" ';
            break;
          case 'myreview':
            $condition = ' and tsk_reviewer = "'.$this->session->userdata(PEOPLE_SESSION_ID).'" ';
            break;
        }

        $sqlQuery = "
        select *,
        (select gnp_name from gen_prm where gnp_group = 'tsk_progress_status' and gnp_value = tsk_progress_status) tsk_progress_status_name,
        (select cmp_name from company where cmp_id = tsk_client_id) tsk_client_id_name,
        date_format(tsk_due_dt, '%d-%b-%Y') tsk_due_dt_format,
        (select ppl_name from people where ppl_id = tsk_user_ass_to) tsk_user_ass_to_name,
        (select ppl_name from people where ppl_id = tsk_user_ass_by) tsk_user_ass_by_name,
        (select gnp_name from gen_prm where gnp_group = 'tsk_priority' and gnp_value = tsk_priority) tsk_priority_name,
        date_format(tsk_datetime, '%d-%m-%Y %h:%i %p') tsk_datetime_format
        from task
        where tsk_status = '".ACTIVE_STATUS."'
        ".$condition."
        order by tsk_crdt_dt desc";

        $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
            return $result;
    }

    // ******* Task End Here *********//
    public function getPeopleforDropdown($search,$type = '')
    {
        switch ($type) {
          case 'team':
          $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (".ACTIVE_STATUS.")
                               and ppl_id In (SELECT emp_ppl_id from employee where emp_status = '".ACTIVE_STATUS."')";
            break;
          case 'all':
          $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (".ACTIVE_STATUS.")";
            break;
          case 'tsk_related_ppl':
          $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (".ACTIVE_STATUS.")";
            break;
          default:
            // code...
            break;
        }

        if($search !='')
        {
          $peopleSqlQuery.=" and ppl_name LIKE '%".$search."%' ";
        }
        $peopleSqlQuery.="  ORDER BY ppl_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select People');
        $queryResult     = $this->home_model->executeSqlQuery($peopleSqlQuery,'result');
          if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    // ******** Company Start Here *******//
    public function getCompanyforDropdown($search,$type = '')
    {

        switch ($type) {
          case 'client':
          $CompanySqlQuery = "SELECT cmp_id as id, cmp_name as text from company where cmp_status IN (".ACTIVE_STATUS.")
                              and cmp_id in (select  cli_cmp_id from client where cli_status IN (".ACTIVE_STATUS.")) ";
            break;
          case 'company':
          $CompanySqlQuery = "SELECT cmp_id as id, cmp_name as text from company where cmp_status IN (".ACTIVE_STATUS.")";
            break;
          default:
            // code...
            break;
        }

        if($search !='')
        {
          $CompanySqlQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
          $CompanySqlQuery.="  ORDER BY cmp_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Client');
        $queryResult     = $this->home_model->executeSqlQuery($CompanySqlQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }

    // ******** Product Start Here *******//
    public function getProductforDropdown($search)
    {
        $ProductSqlQuery = "SELECT prd_id as id, prd_name as text from product where prd_status IN (".ACTIVE_STATUS.")";
        if($search !='')
        {
          $ProductSqlQuery.=" and prd_name LIKE '%".$search."%' ";
        }
          $ProductSqlQuery.="  ORDER BY prd_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Product');
        $queryResult     = $this->home_model->executeSqlQuery($ProductSqlQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }

    public function getLeadforDropdown($search)
    {
        $ProductSqlQuery = "SELECT led_id as id, (select ppl_name from people where ppl_id = led_ppl_id) text from lead where led_status IN (".ACTIVE_STATUS.")";
        if($search !='')
        {
          $ProductSqlQuery.=" and led_name LIKE '%".$search."%' ";
        }
          $ProductSqlQuery.="  ORDER BY led_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Lead');
        $queryResult     = $this->home_model->executeSqlQuery($ProductSqlQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
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
        // $resetResult     = array('id'=>'0','text'=>'Please Select Team');
        $queryResult     = $this->home_model->executeSqlQuery($teamSqlQuery,'result');
        // if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    
    public function getAccountforDropdown($search)
    {
        $CompanySqlQuery = "SELECT cmp_id as id, cmp_name as text from company where cmp_status IN (".ACTIVE_STATUS.") ";

        if($search !='')
            $CompanySqlQuery.=" and cmp_name LIKE '%".$search."%' ";

        $CompanySqlQuery.="  ORDER BY cmp_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Account');
        $queryResult     = $this->home_model->executeSqlQuery($CompanySqlQuery,'result');
        if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }

    public function updateTaskCustomData()
    {
        if(isset($_POST['field']) && $_POST['field'])
            $tskData = array($_POST['field'] => $_POST['field_value']);
        else
            $tskData = $_POST;
       
        $tsk_id = $_POST['tsk_id'];

        if (!empty($tskData))
          return $this->home_model->update('tsk_id', $tsk_id, $tskData, 'task');
    }
    public
    function getGenPrmforDropdown($genPrmGroup, $search)
    {
        $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='" . $genPrmGroup . "' and gnp_status IN (" . ACTIVE_STATUS . ") ";
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
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
}
?>
