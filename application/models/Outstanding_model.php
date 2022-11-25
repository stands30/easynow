<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Outstanding_model extends CI_Model
{
	/**
	* Instanciar o CI
	*/
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
      function getOutstandingData($resType, $dataOptn = '')
    {
      $cmp_query='';
      if(isset($dataOptn['cmp_id']) && $dataOptn['cmp_id'] !='')
      {
        $cmp_query = ' and inv_cmp_id="'.$dataOptn['cmp_id'].'" ';
      }
      $sqlQuery = "SELECT inv_id,inv_cmp_id, inv_crdt_by,
          (SELECT cmp_name FROM company WHERE cmp_id=inv_cmp_id) cmp_name,
          SUM(inv_total) bill_amt,
          (IFNULL((SELECT FORMAT(SUM(ipt_total),2) FROM invoice_payment where ipt_status='1' AND ipt_cmp_id = inv_cmp_id),0.00)) paid_amt_format,
          (IFNULL((SELECT SUM(ipt_total) FROM invoice_payment where ipt_status='1' AND ipt_cmp_id = inv_cmp_id),0.00)) paid_amt,
           (IFNULL(( SELECT SUM(ipt_total-SUM_OF_LIST(ipt_invoice_amt)) FROM invoice_payment WHERE ipt_status='1' AND ipt_cmp_id = inv_cmp_id),0.00)) on_acc,
           fnNextasyDate(inv_due_date) due_date,
           fnGetPeopleNameByID(inv_crdt_by) crdt_by
          ".checkPrivate($dataOptn['mnu_name'], 'inv_crdt_by')." from invoice where inv_status='".ACTIVE_STATUS."' ".$cmp_query." GROUP BY inv_cmp_id ";
        $sqlQuery.= " ORDER BY inv_crdt_dt DESC";

      $queryResult = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
      return $queryResult;
    }
    function getOutstandingDataByCompany( $dataOptn = '')
    {
      $cmp_query='';
      if(isset($dataOptn['cmp_id']) && $dataOptn['cmp_id'] !='')
      {
        $cmp_query = ' and inv_cmp_id="'.$dataOptn['cmp_id'].'" ';
      }
      if(isset($dataOptn['start_date']) && $dataOptn['start_date'] !='' && isset($dataOptn['end_date']) && $dataOptn['end_date'] !='')
      {
        $cmp_query .= ' and inv_date BETWEEN "'.$dataOptn['start_date'].'" and "'.$dataOptn['end_date'].'" ';
      }
      $sqlQuery = "SELECT inv_id,inv_cmp_id, inv_crdt_by,
          (SELECT cmp_name FROM company WHERE cmp_id=inv_cmp_id) cmp_name,
          (SELECT cmp_gst_no FROM company WHERE cmp_id=inv_cmp_id) cmp_gst_no,
          (SELECT cmp_payment_terms FROM company WHERE cmp_id=inv_cmp_id) cmp_payment_terms,
          (SELECT cmp_address FROM company WHERE cmp_id=inv_cmp_id) cmp_address,
          SUM(inv_total) bill_amt,
          (IFNULL((SELECT FORMAT(SUM(ipt_total),2) FROM invoice_payment where ipt_status='1' AND ipt_cmp_id = inv_cmp_id),0.00)) paid_amt_format,
          (IFNULL((SELECT SUM(ipt_total) FROM invoice_payment where ipt_status='1' AND ipt_cmp_id = inv_cmp_id),0.00)) paid_amt,
           (IFNULL(( SELECT SUM(ipt_total-SUM_OF_LIST(ipt_invoice_amt)) FROM invoice_payment WHERE ipt_status='1' AND ipt_cmp_id = inv_cmp_id),0.00)) on_acc,
           fnNextasyDate(inv_due_date) due_date,
           fnGetPeopleNameByID(inv_crdt_by) crdt_by,
           (SELECT SUM(inv_total) from invoice where inv_cmp_id=inv.inv_cmp_id and inv_status='".ACTIVE_STATUS."' and inv_payment_status='".INVOICE_PAYMENT_STATUS_PENDING."') pending_amt,
           (SELECT SUM(inv_total) from invoice where inv_cmp_id=inv.inv_cmp_id and inv_status='".ACTIVE_STATUS."' and inv_payment_status='".INVOICE_PAYMENT_STATUS_PENDING."' and inv_due_date <= CURDATE()) due_amt,
           (SELECT SUM(ipt_disc) from invoice_payment where ipt_status='".ACTIVE_STATUS."' and ipt_cmp_id=inv.inv_cmp_id) disc_amt,
            (IFNULL((select MIN(inv_cmp_id) from invoice where inv_cmp_id > '" . $dataOptn['cmp_id'] . "' and inv_status='" . ACTIVE_STATUS . "'),(SELECT MIN(inv_cmp_id) from invoice where inv_status='" . ACTIVE_STATUS . "'))) next_id,
          (IFNULL((select MAX(inv_cmp_id) from invoice where inv_cmp_id < '" . $dataOptn['cmp_id'] . "' and inv_status='" . ACTIVE_STATUS . "'),(SELECT MAX(inv_cmp_id) from invoice where inv_status='" . ACTIVE_STATUS . "'))) prev_id
          ".checkPrivate($dataOptn['mnu_name'], 'inv_crdt_by')." from invoice inv where inv_status='".ACTIVE_STATUS."' ".$cmp_query." GROUP BY inv_cmp_id ";
        $sqlQuery.= " ORDER BY inv_crdt_dt DESC";

      $queryResult = $this->home_model->executeSqlQuery($sqlQuery,'row');
      return $queryResult;
    }
     function getCompanyOutstandingsList($resType, $dataOptn = '')
    {
      $inv_cstm_query='';
      $ipt_cstm_query='';
      
      if(isset($dataOptn['start_date']) && $dataOptn['start_date'] !='' && isset($dataOptn['end_date']) && $dataOptn['end_date'] !='')
      {
        $inv_cstm_query .= ' and inv_date BETWEEN "'.$dataOptn['start_date'].'" and "'.$dataOptn['end_date'].'" ';
        $ipt_cstm_query .= ' and ipt_date BETWEEN "'.$dataOptn['start_date'].'" and "'.$dataOptn['end_date'].'" ';
      }
      $sqlQuery = "SELECT * from 
                (SELECT 
                  getGenPrmValueByGroup('inv_payment_status',inv_payment_status) inv_payment_status_name,
                  inv_id payment_detail_id,
                  inv_code payment_code,'invoice-details-' payment_detail_url,
                             fnNextasyDate(inv_date) generated_date_format,inv_date  generated_date,
                  (SELECT fnNextasyDate(ipt_date) FROM invoice_payment WHERE ipt_status='".ACTIVE_STATUS."' AND FIND_IN_SET(inv_id,ipt_invoice) ) payment_date,0 payment_credit, DATEDIFF(CURDATE(),inv_date) inv_age,
                             inv_total payment_debit,inv_crdt_dt created_date, '' payment_id,'' payment_invoice
                   FROM invoice WHERE inv_status='".ACTIVE_STATUS."' AND inv_cmp_id='".$dataOptn['cmp_id']."' ".$inv_cstm_query."
                  UNION ALL
                  SELECT 'Payment' inv_payment_status_name,ipt_id payment_detail_id,ipt_code payment_code,'payment-details-' payment_detail_url,
                  fnNextasyDate(ipt_crdt_dt) generated_date_format,ipt_crdt_dt  generated_date,fnNextasyDate(ipt_date) payment_date,if(ipt_total != '',ipt_total,0) payment_credit, '' inv_age,0 payment_debit,ipt_crdt_dt created_date,ipt_id payment_id,ipt_invoice payment_invoice

                   FROM invoice_payment WHERE ipt_status='".ACTIVE_STATUS."' AND ipt_cmp_id='".$dataOptn['cmp_id']."'  ".$ipt_cstm_query.") ots_data ORDER BY created_date ASC ";
                   // echo $sqlQuery;
      $queryResult = $this->home_model->executeDataTableSqlQuery($sqlQuery, $resType, $dataOptn);
      return $queryResult;
    }
      
}