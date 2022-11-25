<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Cashbook_sub_category_model extends CI_Model 
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    // ***** Cashbook Category Start Here *******//
   public function getCategoryforDropdown($search)
    {
       $CategorySqlQuery = "SELECT cbc_id as id, cbc_name as text from cashbook_category where cbc_status IN (".ACTIVE_STATUS.") ";
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

    public function getCashbook_sub_categoryList($resType,$dataOptn='')
    {
        $sqlQuery = 'SELECT csc.*,(select cbc_name from cashbook_category where cashbook_category.cbc_id = csc.csc_cbc_id )csc_cbc_name,(select gnp_name from gen_prm where gen_prm.gnp_value = (select cbc_type from cashbook_category where cashbook_category.cbc_id = csc.csc_cbc_id ) and gnp_group = "cashbook_type" ) csc_cbc_type
                FROM cashbook_sub_category csc
                Where csc_status <> "'.IN_ACTIVE_STATUS.'" ';

        $queryResult     = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);

        return $queryResult;
    }
   
}
?>