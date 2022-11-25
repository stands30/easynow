
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Ticket_model extends CI_Model
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    // ***** Tags Start Here *******//

    public function getTicketById($tck_id)
    {
        $sqlQuery = "
        select *, 
        (select gnp_name from gen_prm where gnp_group = 'ticket_status' and gnp_value = tck_progress_status) tck_progress_status_name,
        (select cmp_name from company where cmp_id = (select cli_cmp_id from client where cli_id = tck_client_id)) tck_client_id_name,
        date_format(tck_datetime, '%d-%m-%Y %h:%i %p') tck_datetime_format,
        (select gnp_name from gen_prm where gnp_group = 'ticket_proirity' and gnp_value = tck_priority) tck_priority_name,
        (select ppl_name from people where ppl_id = tck_user_ass_to) tck_user_ass_to_name,
        (select ppl_name from people where ppl_id = tck_user_ass_by) tck_user_ass_by_name,
        (select gnp_name from gen_prm where gnp_group = 'ticket_type' and gnp_value = tck_type) tck_type_name,
        (select ppl_name from people where ppl_id = tck_crdt_by) tck_crdt_by_name,
        date_format(tck_crdt_dt, '%d-%m-%Y %h:%i %p') tck_crdt_dt_format,
        date_format(tck_updt_dt, '%d-%m-%Y %h:%i %p') tck_updt_dt_format
        from ticket
        where tck_status = '".ACTIVE_STATUS."' and tck_id = '".$tck_id."'";
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        return $row;
    }

    public function getTicketAttById($tck_id)
    { 
        $sqlQuery = "select *
        from ticket_att
        where tka_status = '".ACTIVE_STATUS."' and tka_tck_id = '".$tck_id."'";
        $result = $this->home_model->executeSqlQuery($sqlQuery,'result');
        return $result;

    }

    public function ticket_getlist()
    {
        $sqlQuery = "
        select *, 
        (select gnp_name from gen_prm where gnp_group = 'ticket_status' and gnp_value = tck_progress_status) tck_progress_status_name,
        (select cmp_name from company where cmp_id = (select cli_cmp_id from client where cli_id = tck_client_id)) tck_client_id_name,
        (select gnp_name from gen_prm where gnp_group = 'ticket_proirity' and gnp_value = tck_priority) tck_priority_name,
        date_format(tck_datetime, '%d-%m-%Y %h:%i %p') tck_datetime_format
        from ticket
        where tck_status = '".ACTIVE_STATUS."' order by tck_crdt_dt desc";
        $result = $this->home_model->executeSqlQuery($sqlQuery,'result');
        return $result;
    }

    public function ticket_getlist_byme()
    {
        $sqlQuery = "
        select *, 
        (select gnp_name from gen_prm where gnp_group = 'ticket_status' and gnp_value = tck_progress_status) tck_progress_status_name,
        (select cmp_name from company where cmp_id = (select cli_cmp_id from client where cli_id = tck_client_id)) tck_client_id_name,
        (select gnp_name from gen_prm where gnp_group = 'ticket_proirity' and gnp_value = tck_priority) tck_priority_name,
        date_format(tck_datetime, '%d-%m-%Y %h:%i %p') tck_datetime_format
        from ticket
        where tck_status = '".ACTIVE_STATUS."' 
        and tck_user_ass_by = '".$this->session->userdata(PEOPLE_SESSION_ID)."'
        order by tck_crdt_dt desc";
        $result = $this->home_model->executeSqlQuery($sqlQuery,'result');
        return $result;
    }

    // ******* Ticket End Here *********//
    public function getPeopleforDropdown($search)
    {
        $peopleSqlQuery = "SELECT  ppl_id as id,ppl_name as text FROM people where ppl_status IN (".ACTIVE_STATUS.") ";
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
    public function getCompanyforDropdown($search)
    {
        $CompanySqlQuery = "SELECT cmp_id as id, cmp_name as text from company where cmp_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $CompanySqlQuery.=" and cmp_name LIKE '%".$search."%' ";
        }
          $CompanySqlQuery.="  ORDER BY cmp_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Company');
        $queryResult     = $this->home_model->executeSqlQuery($CompanySqlQuery,'result');
           if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          } 
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
}
?>