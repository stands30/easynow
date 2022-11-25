<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Account_model extends CI_Model 
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    // ***** Change to default Start Here *******//
   public function changeToDefault($account_id = '')
    {
       $AccountSqlQuery = " update account set acc_default = '".ACCOUNT_DEFAULT."' where acc_id = '".$account_id."' ";

        $queryResult     = $this->home_model->executeSqlQuery($AccountSqlQuery,'update');

         $AccountSqlQuery = " update account set acc_default = NULL  where acc_id != '".$account_id."' ";

        $queryResult     = $this->home_model->executeSqlQuery($AccountSqlQuery,'update');
       
        return $account_id;
    }
    // ********  Change to default End Here ********//


    public function getAccountList($resType,$dataOptn='')
    {
        $sqlQuery = 'SELECT acc.*,((select SUM(cashbook.csb_amount) from cashbook where cashbook.csb_type= "'.CASHBOOK_INCOME.'" and cashbook.csb_approve != "'.CASHBOOK_PENDING.'" and acc.acc_id = cashbook.csb_acc_id) - (select SUM(cashbook.csb_amount) from cashbook where cashbook.csb_type= "'.CASHBOOK_EXPENSE.'" and cashbook.csb_approve != "'.CASHBOOK_PENDING.'" and acc.acc_id = cashbook.csb_acc_id))net_amount 
                FROM account acc
                Where acc_status <> "'.IN_ACTIVE_STATUS.'" ';

        $queryResult     = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);

        return $queryResult;
    }

   
}
?>