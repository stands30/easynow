
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Email_temp_model extends CI_Model
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getEmtById($emt_id)
    {
        $sqlQuery = "
        select *,
        (select ppl_name from people where ppl_id = emt_crdt_by) emt_crdt_by_name,
        date_format(emt_crdt_dt, '%d-%m-%Y') emt_crdt_dt_format,
        date_format(emt_updt_dt, '%d-%m-%Y') emt_updt_dt_format,
        (IFNULL((select MIN(emt_id) from email_template where emt_id > '".$emt_id."'),(SELECT MIN(emt_id) from email_template))) next,
        (IFNULL((select MAX(emt_id) from email_template where emt_id < '".$emt_id."'),(SELECT MAX(emt_id) from email_template))) prev
        from email_template
        where emt_status = '".ACTIVE_STATUS."' and emt_id = '".$emt_id."'";
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        return $row;
    }

    public function getEmtAttById($emt_id)
    {
        $sqlQuery = "select *
        from email_template_att
        where eta_status = '".ACTIVE_STATUS."' and eta_emt_id = '".$emt_id."'";
        $result = $this->home_model->executeSqlQuery($sqlQuery,'result');
        return $result;
    }

    public function email_temp_getlist($resType,$dataOptn='')
    {
        $sqlQuery = "
        select *
        from email_template
        where emt_status = '".ACTIVE_STATUS."' order by emt_crdt_dt desc";
        $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
  			return $result;
    }


    
}
?>
