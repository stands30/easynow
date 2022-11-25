<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Cashbook_model extends CI_Model 
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    // ***** Change to Approved Start Here *******//
   public function update_cashbook_to_approved($hdn_id = '')
    {
       
        $arrData    = array('csb_approve'=>CASHBOOK_APPROVED,
                            'csb_updt_dt'=>date('Y-m-d H:i:s'),
                            'csb_updt_by'=>1,
                            'csb_approved_by'=>1);
            
        if(is_array($hdn_id) && count($hdn_id)>0)
        {
            $this->db->where_in('csb_id',$hdn_id);
        }
        
        $this->db->update('cashbook',$arrData);
        return true;
    }
    // ********  Change to Approved End Here ********//


     // ***** Change to Disapprove Start Here *******//
   public function update_cashbook_to_reject($hdn_id = '')
    {
       
        $arrData    = array('csb_approve'=>CASHBOOK_REJECTED,
                            'csb_updt_dt'=>date('Y-m-d H:i:s'),
                            'csb_updt_by'=>1,
                            'csb_approved_by'=>1);
            
        if(is_array($hdn_id) && count($hdn_id)>0)
        {
            $this->db->where_in('csb_id',$hdn_id);
        }
        
        $this->db->update('cashbook',$arrData);
        return true;
    }
    // ********  Change to Disapprove End Here ********//


     public function getCashbookList($resType,$dataOptn='')
    {
        $sqlQuery = 'SELECT csb.*,csb.csb_id as cashbook_id,DATE_FORMAT(csb.csb_date,"%d-%M-%Y")csbdate,LOWER((select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_type and gnp_group = "cashbook_type")) csb_type_1,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_type and gnp_group = "cashbook_type" ) csb_type_name,(select gnp_name from gen_prm where gen_prm.gnp_value = csb.csb_approve and gnp_group = "approval_status" ) csb_approve_name,(select cbc_name from cashbook_category where cashbook_category.cbc_id = csb.csb_cbc_id ) csb_cbc_name ,(select csc_name from cashbook_sub_category where cashbook_sub_category.csc_id = csb.csb_csc_id ) csb_csc_name ,(select ppl_name from people where people.ppl_id = csb.csb_ppl_id ) csb_ppl_name,(select acc_name from account where account.acc_id = csb.csb_acc_id ) csb_acc_name
                FROM cashbook csb
                Where csb_status <> "'.IN_ACTIVE_STATUS.'" ';

        $queryResult     = $this->home_model->executeDataTableSqlQuery($sqlQuery,$resType,$dataOptn);

        return $queryResult;
    }

   
}
?>