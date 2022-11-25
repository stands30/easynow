<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscription_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function subscriptionList($resType,$dataOptn='')
    {
        $sqlQuery = 'SELECT *,
        (SELECT ppl_name FROM people WHERE ppl_id = scr_client_id) cus_name,
        ifnull((SELECT cmp_name FROM company WHERE cmp_id = scr_account_id),"") cmp_name,
        (SELECT gnp_name FROM gen_prm WHERE gnp_value = scr_status AND gnp_group = "sub_status") scr_status_name,
        fnNextasyDate(scr_crdt_dt) scr_crdt_dt_format
        FROM xsubscription order by scr_id desc';

        $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
        return $result;
    }

    function getSubscriptionDetailByID($scr_id)
    {
        $sqlQuery = 'SELECT *,
        (SELECT ppl_name FROM people WHERE ppl_id = scr_client_id) cus_name,
        fnGetPeopleNameByID(scr_crdt_by) scr_crdt_by_name, 
        ifnull((SELECT cmp_name FROM company WHERE cmp_id = scr_account_id),"") cmp_name,
        (SELECT gnp_name FROM gen_prm WHERE gnp_value = scr_status AND gnp_group = "sub_status") scr_status_name,
        fnNextasyDate(scr_crdt_dt) scr_crdt_dt_format
        FROM xsubscription where scr_id = '.$scr_id;

        return  $this->home_model->executeSqlQuery($sqlQuery,'row');
    }

    function getSubscriptionTrnDetailByID($scr_id)
    {
        $sqlQuery = 'SELECT 
        str_id, CONCAT("S",LPAD(str_id, 4, "0")) str_code,
        str_users,
        if(str_price = 0, "Free", str_price) str_price,
        (SELECT pln_name FROM xplan WHERE pln_id = str_pln_id) str_pln_name,
        fnNextasyDate(str_start_date) str_start_date,
        fnNextasyDate(str_end_date) str_end_date
        FROM xsubscription_transaction WHERE str_scr_id = '.$scr_id.' and str_status = '.ACTIVE_STATUS;

        return  $this->home_model->executeSqlQuery($sqlQuery,'result');
    }
    
    public function getStatusforDropdown($search)
    {
        $teamSqlQuery = "select gnp_value as id, gnp_name as text from gen_prm where gnp_group = 'sub_status'";
        
        if($search !='')
        {
          $teamSqlQuery.=" and gnp_name LIKE '%".$search."%' ";
        }
        $teamSqlQuery.=" ORDER BY gnp_order";

        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Status');
        $queryResult     = $this->home_model->executeSqlQuery($teamSqlQuery,'result');
        if($search =='')
        {
        array_unshift($queryResult,$resetResult);
        }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }

    function updateSubscriptionCustomData()
    {
        if(isset($_POST['field']) && $_POST['field'])
            $cmpData = array($_POST['field'] => $_POST['field_value']);
        else
            $cmpData = $_POST;
       
        $scr_id = $_POST['pk'];

        if (!empty($cmpData))
          return $this->home_model->update('scr_id', $scr_id, $cmpData, 'xsubscription');
    }    
}
?>