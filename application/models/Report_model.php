<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Report_model extends CI_Model 
{
    /**
    * Instanciar o CI
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
      public function getFollowUpDataByDay($status,$custom_date, $ppl_id)
    {

        $sqlQuery = "Select COUNT(lfp_id) flp_count from lead_follow_up where date(lfp_next_date) = '".$custom_date."' and (select led_ppl_id from lead where led_id = lfp_module_type_id and led_status = ".ACTIVE_STATUS." limit 1) = ".$ppl_id." and lfp_followup_status = '".$status."' and lfp_module_type='".FOLLOWUP_MODULE_TYPE_LEAD."' and lfp_status='".ACTIVE_STATUS."'";
        
        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        log_message('nexlog',' row : '.json_encode($row));
        return $row;
    }
      public function getTaskDataByDay($status,$custom_date, $ppl_id)
    {
        switch ($status) {
            case TASK_PENDING:
                 $statusCondition=' and tsk_supporter = "'.$ppl_id.'" ';
                break;
            case TASK_DONE:
                 $statusCondition=' and tsk_reviewer = "'.$ppl_id.'" ';
                break;
            default:
                 $statusCondition=' and tsk_user_ass_to = "'.$ppl_id.'" ';
                break;
        }
        $sqlQuery = "select count(tsk_id) task_count from task where date_format(tsk_datetime, '%Y-%m-%d') = '".$custom_date."' ".$statusCondition." and tsk_status = '".ACTIVE_STATUS."' ";
        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        log_message('nexlog',' row : '.json_encode($row));
        return $row;
    }
       public function getNewPeopleDataByDay($custom_date, $ppl_id)
    {
        $sqlQuery = "select count(ppl_id) ppl_count from people where date_format(ppl_crdt_dt, '%Y-%m-%d') = '".$custom_date."' and ppl_id = ".$ppl_id." and ppl_status = '".ACTIVE_STATUS."' ";
        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        log_message('nexlog',' row : '.json_encode($row));
        return $row;
    }
       public function getNewLeadDataByDay($custom_date, $ppl_id)
    {
        $sqlQuery = "select count(led_id) led_count from lead where date_format(led_crdt_dt, '%Y-%m-%d') = '".$custom_date."' and led_ppl_id = ".$ppl_id." and led_status = '".ACTIVE_STATUS."' and led_type='".LEAD_TYPE_NEW."'";
        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        log_message('nexlog',' row : '.json_encode($row));
        return $row;
    }
       public function getNewAccountDataByDay($custom_date, $ppl_id)
    {
        $sqlQuery = "select count(cmp_id) cmp_count from company where date_format(cmp_crdt_dt, '%Y-%m-%d') = '".$custom_date."' and (select cpl_ppl_id from cmp_people where cpl_cmp_id = cmp_id and cpl_status = ".ACTIVE_STATUS." limit 1) = ".$ppl_id." and cmp_status = '".ACTIVE_STATUS."' and cmp_type_id='".COMPANY_TYPE_ACCOUNT."'";

        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        log_message('nexlog',' row : '.json_encode($row));
        return $row;
    }

    public function getMyTaskDataByDay($custom_date, $ppl_id)
    {
        $sqlQuery = "select * from (
                        (select count(tsk_id) tsk_review_count from task where date_format(tsk_datetime, '%Y-%m-%d') = '".$custom_date."' and tsk_status = ".ACTIVE_STATUS." and tsk_user_ass_to = ".$ppl_id.") tsk_review_count,
                        (select count(tsk_id) tsk_support_count from task where date_format(tsk_datetime, '%Y-%m-%d') = '".$custom_date."' and tsk_status = ".ACTIVE_STATUS." and tsk_user_ass_to = ".$ppl_id.") tsk_support_count
                    ) ";
        log_message('nexlog',' sqlQuery : '.$sqlQuery);
        $row = $this->home_model->executeSqlQuery($sqlQuery,'row');
        log_message('nexlog',' row : '.json_encode($row));
        return $row;
    }

    function getSalesDashboard()
    {
        $sql = 'select 
                fnGetPeopleNameByID(emp_ppl_id) emp_name,
                (select count(led_id) from lead where led_managed_by = emp_ppl_id) led_count,
                (select ifnull(sum(led_amount),0) from lead where led_managed_by = emp_ppl_id and led_lead_status <> '.LEAD_STATUS_WON.') led_amount,
                (select count(led_ppl_id) from lead where led_managed_by = emp_ppl_id) ppl_count,
                (select count(lfp_id) from lead_follow_up where lfp_module_type_id in 
                    (select led_id from lead where led_managed_by = emp_ppl_id) 
                and lfp_module_type='.FOLLOWUP_MODULE_TYPE_LEAD.' and lfp_status = '.ACTIVE_STATUS.' and date(lfp_next_date) > CURDATE() and lfp_followup_status = '.ACTIVE_STATUS.') pending_follow_up,
                (select count(tsk_id) from task where tsk_user_ass_to = emp_ppl_id) task_count,
                (select sum(led_amount) from lead where led_managed_by = emp_ppl_id and led_lead_status = '.LEAD_STATUS_WON.') sales_amt
                from employee limit 5;';
        return $this->db->query($sql)->result();
    }

    //sales Report Functions

    function getLeadStageDashboard()
    {
        $sql = '
            SELECT COUNT(*) cnt, IFNULL(SUM(led_amount),0) led_amt, "Pending" stage_name FROM lead WHERE led_lead_status = '.LEAD_STATUS_PENDING.' AND led_status = 1
            UNION
            SELECT COUNT(*) cnt, IFNULL(SUM(led_amount),0) led_amt, "On Going" stage_name FROM lead WHERE led_lead_status = '.LEAD_STATUS_ON_HOLD.' AND led_status = 1
            UNION
            SELECT COUNT(*) cnt, IFNULL(SUM(led_amount),0) led_amt, "Rejected" stage_name FROM lead WHERE led_lead_status = '.LEAD_STATUS_LOST.' AND led_status = 1
            UNION
            SELECT COUNT(*) cnt, IFNULL(SUM(led_amount),0) led_amt, "All" stage_name FROM lead WHERE led_lead_status in ('.LEAD_STATUS_PENDING.','.LEAD_STATUS_ON_HOLD.','.LEAD_STATUS_LOST.') AND led_status = 1
        ';

        return $this->db->query($sql)->result();
    }

    function getQuotationDashboard()
    {
        $sql = '
            SELECT COUNT(*) cnt, IFNULL(SUM(qtn_total),0) qtn_amt, "Draft" status_name FROM quotation WHERE qtn_apprvl_status = '.QUOTATION_APPROVAL_STATUS_DRAFT.' AND qtn_status = 1
            UNION
            SELECT COUNT(*) cnt, IFNULL(SUM(qtn_total),0) qtn_amt, "Submitted" status_name FROM quotation WHERE qtn_apprvl_status = '.QUOTATION_APPROVAL_STATUS_SUBMITTED.' AND qtn_status = 1
            UNION
            SELECT COUNT(*) cnt, IFNULL(SUM(qtn_total),0) qtn_amt, "Approved" status_name FROM quotation WHERE qtn_apprvl_status = '.QUOTATION_APPROVAL_STATUS_APPROVED.' AND qtn_status = 1
            UNION
            SELECT COUNT(*) cnt, IFNULL(SUM(qtn_total),0) qtn_amt, "All" status_name FROM quotation WHERE qtn_apprvl_status in ('.QUOTATION_APPROVAL_STATUS_DRAFT.','.QUOTATION_APPROVAL_STATUS_SUBMITTED.','.QUOTATION_APPROVAL_STATUS_APPROVED.') AND qtn_status = 1
        ';

        return $this->db->query($sql)->result();
    }

    function getInvoiceDashboard()
    {
        $sql = '
            SELECT COUNT(*) cnt, IFNULL(SUM(inv_total),0) inv_amt, "Pending" status_name FROM invoice WHERE inv_payment_status = '.INVOICE_PAYMENT_STATUS_PENDING.' AND inv_status = 1
            UNION
            SELECT COUNT(*) cnt, IFNULL(SUM(inv_total),0) inv_amt, "Paid" status_name FROM invoice WHERE inv_payment_status = '.INVOICE_PAYMENT_STATUS_PAID.' AND inv_status = 1
            UNION
            SELECT COUNT(*) cnt, IFNULL(SUM(inv_total),0) inv_amt, "All" status_name FROM invoice WHERE inv_payment_status in ('.INVOICE_PAYMENT_STATUS_PENDING.','.INVOICE_PAYMENT_STATUS_PAID.') AND inv_status = 1
        ';

        return $this->db->query($sql)->result();
    }

    function getLeadFollowUpDashboard()
    {
        $followup_status = array(
            'upcoming' => " and date(lfp_next_date) > CURDATE() and lfp_followup_status in (".LEAD_FOLLOWUP_STATUS_PENDING.",".LEAD_FOLLOWUP_STATUS_RESCHEDULE.") ",
            'due' => " and lfp_next_date < NOW() and date(lfp_next_date) <> CURDATE() and lfp_followup_status in (".LEAD_FOLLOWUP_STATUS_PENDING.",".LEAD_FOLLOWUP_STATUS_RESCHEDULE.") ",
            'today' => " and date(lfp_next_date) = CURDATE() and lfp_followup_status in (".LEAD_FOLLOWUP_STATUS_PENDING.",".LEAD_FOLLOWUP_STATUS_RESCHEDULE.") "
        );

        $sql = '
            SELECT COUNT(*) cnt, "Today" status_name from lead_follow_up where lfp_status = "'.ACTIVE_STATUS.'" '.$followup_status["today"].'
            UNION
            SELECT COUNT(*) cnt, "Due" status_name from lead_follow_up where lfp_status = "'.ACTIVE_STATUS.'" '.$followup_status["due"].'
            UNION
            SELECT COUNT(*) cnt, "Upcoming" status_name from lead_follow_up where lfp_status = "'.ACTIVE_STATUS.'" '.$followup_status["upcoming"];

        $result = $this->db->query($sql)->result();

        $total = 0;

        foreach ($result as $data) {
            $total += $data->cnt;
        }

        array_push($result, 
            (object)array('cnt'=>$total, 'status_name'=>'All')
        );

        return $result;
    }
}
?>