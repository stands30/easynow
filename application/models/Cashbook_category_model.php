<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Cashbook_category_model extends CI_Model 
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    // ***** Cashbook type Start Here *******//
   public function getGenPrmforDropdown($genPrmGroup,$search)
    {
        $genPrmSqlQuery = "SELECT  gnp_value as id,gnp_name as text FROM gen_prm where gnp_group ='".$genPrmGroup."' and gnp_status IN (".ACTIVE_STATUS.") ";
        if($search !='')
        {
          $genPrmSqlQuery.=" and gnp_name LIKE '%".$search."%' ";
        }
        $genPrmSqlQuery.="  ORDER BY gnp_order DESC";
        // ***** It is used to reset value of select2 ****** //
        $resetResult     = array('id'=>'0','text'=>'Please Select type');
       if($search =='')
          {
            array_unshift($queryResult,$resetResult);
          }
        // ***** It is used to reset value of select2 ****** //
        return $queryResult;
    }
    // ******** Cashbook type End Here ********//


    public function getCashbook_categoryList($resType,$dataOptn='')
    {
        $sqlQuery = 'SELECT cbc.*,(select gnp_name from gen_prm where gen_prm.gnp_value = cbc.cbc_type and gnp_group = "cashbook_type" ) cbc_types
                FROM cashbook_category cbc
                Where cbc_status <> "'.IN_ACTIVE_STATUS.'" ';

        $queryResult     = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);

        return $queryResult;
    }
   
}
?>