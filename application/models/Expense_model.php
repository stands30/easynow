<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Expense_model extends CI_Model 
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    // ***** Cashbook Approval Start Here *******//
   public function getGenPrmforDropdown($genPrmGroup,$search)
    {
        $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='".$genPrmGroup."' and gnp_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $genPrmSqlQuery.=" and gnp_name LIKE '%".$search."%' ";
        }
        $genPrmSqlQuery.="  ORDER BY gnp_order DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select ');
        $queryResult     = $this->home_model->executeSqlQuery($genPrmSqlQuery,'result');
       if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    // ******** Cashbook Approval End Here ********//


      // ***** Cashbook Category Start Here *******//
   public function getCategoryforDropdown($search)
    {
       $CategorySqlQuery = "SELECT cbc_id as id, cbc_name as text from cashbook_category where cbc_status IN (".ACTIVE_STATUS.") and cbc_type = '".CASHBOOK_EXPENSE."' ";
        if($search !='')
        {
          $CategorySqlQuery.=" and cbc_name LIKE '%".$search."%' ";
        }
          $CategorySqlQuery.="  ORDER BY cbc_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Category');
        $queryResult     = $this->home_model->executeSqlQuery($CategorySqlQuery,'result');
       if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    // ******** Cashbook Category End Here ********//


     // ***** Cashbook Sub Category Start Here *******//
   public function getSubCategoryforDropdown($search,$category_id = '')
    {
       $CategorySqlQuery = "SELECT csc_id as id, csc_name as text from cashbook_sub_category where csc_status IN (".ACTIVE_STATUS.") and csc_cbc_id = '".$category_id."' ";
        if($search !='')
        {
          $CategorySqlQuery.=" and csc_name LIKE '%".$search."%' ";
        }
          $CategorySqlQuery.="  ORDER BY csc_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select Sub Category');
        $queryResult     = $this->home_model->executeSqlQuery($CategorySqlQuery,'result');
       if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    // ******** Cashbook Sub Category End Here ********//


    // ***** Cashbook People Start Here *******//
   public function getPersonforDropdown($search)
    {
       $PeopleSqlQuery = "SELECT ppl_id as id, ppl_name as text from people where ppl_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $PeopleSqlQuery.=" and ppl_name LIKE '%".$search."%' ";
        }
          $PeopleSqlQuery.="  ORDER BY ppl_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select person');
        $queryResult     = $this->home_model->executeSqlQuery($PeopleSqlQuery,'result');
       if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    // ******** Cashbook People End Here ********//

    // ***** Cashbook Account Start Here *******//
   public function getAccountforDropdown($search)
    {
       $AccountSqlQuery = "SELECT acc_id as id, acc_name as text from account where acc_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $AccountSqlQuery.=" and acc_name LIKE '%".$search."%' ";
        }
          $AccountSqlQuery.="  ORDER BY acc_crdt_dt DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select account');
        $queryResult     = $this->home_model->executeSqlQuery($AccountSqlQuery,'result');
       if($search =='')
      {
        array_unshift($queryResult,$resetResult);
      }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    // ******** Cashbook Account End Here ********//
    public function getUserExpenseList($resType,$dataOptn='')
  {
    $sqlQuery = "SELECT csb.csb_id as cashbook_id,csb_particular,csb_amount,DATE_FORMAT(csb.csb_date,'%d-%M-%Y')csbdate,LOWER((select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_type and gnp_group = 'cashbook_type')) csb_type,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_type and gnp_group = 'cashbook_type' ) csb_type_name,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_approve and gnp_group = 'approval_status' ) csb_approve_name,(select cbc_name from cashbook_category where cashbook_category.cbc_id = csb.csb_cbc_id ) csb_cbc_name ,(select csc_name from cashbook_sub_category where cashbook_sub_category.csc_id = csb.csb_csc_id ) csb_csc_name ,fnGetPeopleNameByID(csb.csb_ppl_id) csb_ppl_name,(select acc_name from account where account.acc_id = csb.csb_acc_id ) csb_acc_name from cashbook csb where csb_status <> '".IN_ACTIVE_STATUS."' and csb_transaction_type = '".CASHBOOK_USER."' ";
    $result = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);
    return $result;
  }



   
}
?>