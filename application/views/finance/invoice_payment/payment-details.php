<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <title>
    <?php echo $title.' | '.TITLE_POSTFIX; ?>
  </title>
  <head>
    
    <?php $this->load->view('common/header_styles'); ?> 
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url();?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
    <!-- OPTIONAL LAYOUT STYLES -->
    
    <!-- END OPTIONAL LAYOUT STYLES -->  
    <style type="text/css">
      td{
        text-align: left;
      }
      .inner-right{
        text-align: right;
      }
      .details-list{
        padding: 10px 0px!important;
      }

    </style>
  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?> 
    <div class="clearfix"> 
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
      <?php $this->load->view('common/sidebar'); ?> 
      <!-- BEGIN CONTENT -->
      <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content page-content-detail">
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <div class="page-bar" id="breadcrumbs-list">
            <?php echo $breadcrumb; ?>
            <div class="breadcrumb-button">
              <?php
                  $prev_ipt_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($inv_payment->prev_ipt_id);
                  $next_ipt_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($inv_payment->next_ipt_id);
                ?>
                 <!-- Previous  -->
                <a href="<?php echo base_url('payment-details-'.$prev_ipt_encrypted_id); ?>" class=" previous" title="">
                    <button class="btn green">
                        <i class="fa fa-arrow-left"></i>                                    
                    </button>
                    
                </a>
                <!-- Next -->
                <a href="<?php echo base_url('payment-details-'.$next_ipt_encrypted_id); ?>" class="next">
                    <button class="btn green">
                        <i class="fa fa-arrow-right"></i>
                    </button>
                    
                </a>
            </div>
          </div>
          <div class="portlet">
            <div class="row">
              <div class="container-fluid">
                <aside class="profile-info col-md-12">
                    <section class="panel">
                      <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                        <header class="panel-heading panel-heading-lead color-primary">
                            <div class="row detail-box">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <span class="detail-list-heading">Payment Details</span>
                                    <br>
                                    <?php $ipt_id = isset($inv_payment->ipt_id) ? $inv_payment->ipt_id:''; ?>
                                    <input type="hidden" name="ipt_id" id="ipt_id" value="<?php echo $ipt_id ?>">
                                    <div class="col-md-12 no-side-padding inner-row">
                                        <span class="panel-title">
                                            <?php echo isset($inv_payment->cmp_name) ? $inv_payment->cmp_name.' - '.(isset($inv_payment->ipt_code) ? $inv_payment->ipt_code:''):''; ?>
                                        </span>
                                        <?php  if(!property_exists($inv_payment, 'private_access') || (property_exists($inv_payment, 'private_access') && $inv_payment->private_access == 1)) { ?>
                                        <?php
                                        if($delete_access) {
                                          
                                          $ipt_invoice = isset($inv_payment->ipt_invoice) ? $inv_payment->ipt_invoice:'';
                                        ?>
                                        <a class="btn-edit" href="javascript:;" onclick="return deleteData(this);" data-title="Delete Payment" data-toggle="tooltip" data-ipt_id='<?php echo $ipt_id ?>' data-ipt_invoice='<?php echo $ipt_invoice; ?>'>
                                          <i class="fa fa-trash"></i>
                                          <span class="btn-text">
                                            Delete
                                          </span>
                                        </a>
                                      <?php } } ?>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                  <span class="created">Created By: <?php echo isset($inv_payment->ipt_crdt_by_name) ? $inv_payment->ipt_crdt_by_name:''; ?>
                                  </span>
                                  <br>
                                  <span class="sp-date">Created On:<?php echo isset($inv_payment->ipt_crdt_dt_format) ? $inv_payment->ipt_crdt_dt_format:''; ?>
                                  </span>
                                </div>
                            </div>

                        </header>
                        <div class="table-responsive" >
                            <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                <tbody>
                                  <tr>
                                    <td><i class="fa fa-user icon-people list-level"></i>Payment By</td>
                                    <td>
                                      <?php $ppl_encrypted_id = isset($inv_payment->ipt_ppl_id) ? $this->nextasy_url_encrypt->encrypt_openssl($inv_payment->ipt_ppl_id):'#'; ?>
                                      <a href="<?php echo base_url('people-details-').$ppl_encrypted_id ?>">
                                   <?php echo isset($inv_payment->ppl_name) ? $inv_payment->ppl_name:''; ?></a></td>
                                   <td><i class="fa fa-user icon-people list-level"></i>Received By</td>
                                    <td>
                                      <?php $managed_by_encrypted_id = isset($inv_payment->ipt_managed_by) ? $this->nextasy_url_encrypt->encrypt_openssl($inv_payment->ipt_managed_by):'#'; ?>
                                      <a href="<?php echo base_url('people-details-').$managed_by_encrypted_id ?>"><?php echo isset($inv_payment->ipt_managed_by_name) ? $inv_payment->ipt_managed_by_name:''; ?></a></td>
                                  </tr>

                                  <tr>
                                    <td><i class="fas fa-file-invoice-dollar color-dark-blue list-level"></i>Payment Mode</td>
                                    <td><a href="javascript:;" id="ipt_mode" class=" ipt_mode_editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Payment Mode" data-original-title="Select Payment Mode" data-custom_select2_id="<?php echo isset($inv_payment->ipt_mode) ? $inv_payment->ipt_mode:''; ?>" data-custom_select2_name="<?php echo isset($inv_payment->ipt_mode_name) ? $inv_payment->ipt_mode_name:''; ?>"  data-custom-gnp-grp='ipt_mode' data-gnp-grp="finance_payment_mode"><?php echo isset($inv_payment->ipt_mode_name) ? $inv_payment->ipt_mode_name:''; ?></a>
                                      </td>

                                    <td><i class="fas fa-calendar-alt list-level"></i>Payment Date </td>
                                    <td><a href="javascript:;" id="ipt_date" class="ipt_date ipt_date_editable" data-type="date" data-format="yyyy-m-dd" data-viewformat="dd M, yyyy" data-pk="1" data-placement="top" data-placeholder="Please enter Payment date" data-original-title="Select Payment Date" data-value="<?php echo isset($inv_payment->ipt_date_format) ? $inv_payment->ipt_date_format:''; ?>"  data-custom-gnp-grp='ipt_date' data-gnp-grp=""><?php echo isset($inv_payment->ipt_date_format) ? $inv_payment->ipt_date_format:''; ?></a></td>

                                    
                                    
                                  </tr>

                                  <tr class="cheque-details">
                                    <td><i class="fas fa-university list-level"></i>Bank Name </td>
                                    <td><a href="javascript:;" id="ipt_bank" class="ipt_bank1 ipt_bank_editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Please enter Bank Name" data-original-title="enter Bank Name"   data-custom-gnp-grp='ipt_bank' data-gnp-grp=""><?php echo isset($inv_payment->ipt_bank) ? $inv_payment->ipt_bank:''; ?></a>
                                      </td>
                                    <td><i class="fas fa-university list-level"></i>Branch Name </td>
                                    <td><a href="javascript:;" id="ipt_branch" class="ipt_branch1 ipt_branch_editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Please enter Branch Name" data-original-title="Enter Branch Name"   data-custom-gnp-grp='ipt_branch' data-gnp-grp=""><?php echo isset($inv_payment->ipt_branch) ? $inv_payment->ipt_branch:''; ?></a></td>
                                  </tr>

                                  <tr>
                                    <td class="cheque-details"><i class="fas fa-calendar-alt list-level"></i>Cheque Date </td>
                                    <td class="cheque-details"><a href="javascript:;" id="ipt_chq_date" class="ipt_chq_date_format1 ipt_chq_date_editable" data-type="date" data-format="yyyy-m-dd" data-viewformat="dd M, yyyy" data-pk="1" data-placement="top" data-placeholder="Please enter Cheque date" data-original-title="Select Cheque Date" data-value="<?php echo isset($inv_payment->ipt_chq_date) ? $inv_payment->ipt_chq_date:''; ?>"  data-custom-gnp-grp='ipt_chq_date' data-gnp-grp=""><?php echo isset($inv_payment->ipt_chq_date_format) ? $inv_payment->ipt_chq_date_format:''; ?></a></td>

                                    <td class="payment-no"><i class="fas fa-th-list list-level"></i>Cheque No/UTR No </td>
                                    <td class="payment-no payment-no-value"><a href="javascript:;" id="ipt_payment_no" class="ipt_payment_no1 ipt_payment_no_editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Please enter Payment no" data-original-title="Enter Payment no"   data-custom-gnp-grp='ipt_payment_no' data-gnp-grp=""><?php echo isset($inv_payment->ipt_payment_no) ? $inv_payment->ipt_payment_no:''; ?></a></td>
                                  </tr>

                                   
                                    
                                    
                                </tbody>
                            </table>


                        </div>

                    </div>




                  

                    </section>
                    
                    
                </aside>


                <aside class="profile-info col-md-12">
                  <section class="panel">
                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view table-payment-calculation">
                      <div class="table-responsive" >
                    <!-- <div class="flip-scroll table-div"> -->
                      <table class="table table-detail-custom table-stylm " style="margin-bottom: 0px">
                      <!-- <table class="table table-bordered table-striped table-condensed flip-content custom-flip-content"> -->
                        <tbody>
                          <?php
                           $ipt_sub_total= isset($inv_payment->ipt_sub_total) ? $inv_payment->ipt_sub_total:0;
                           $ipt_sub_total_format= isset($inv_payment->ipt_sub_total_format) ? $inv_payment->ipt_sub_total_format:0; 
                            $on_account=  isset($inv_payment->ipt_on_acc) ? $inv_payment->ipt_on_acc:0;
                            $total = isset($inv_payment->ipt_total) ? $inv_payment->ipt_total:0; 
                            $grand_total = $total+$on_account;
                             $inv_payment_amt = isset($inv_payment->ipt_invoice_amt) ? $inv_payment->ipt_invoice_amt:0;
                              $inv_payment_amt_format = ($inv_payment->ipt_invoice_amt ) ? number_format($inv_payment->ipt_invoice_amt,2):0;
                               ?>
                          <tr>
                              <td><i class="fas fa-rupee-sign list-level"></i> Amount paid by Client</td>
                              <td class="inner-right"><b><?php echo isset($inv_payment->ipt_amt_format) ? $inv_payment->ipt_amt_format:''; ?></b></td>
                              <td><i class="fas fa-rupee-sign list-level"></i> On Account</td>
                              <td class="inner-right"><b><?php echo isset($inv_payment->ipt_on_acc_format) ? $inv_payment->ipt_on_acc_format:''; ?></b></td>
                          </tr>
                          <tr>
                              <td><i class="fas fa-rupee-sign list-level"></i> Adjustment</td>
                              <td class="inner-right"><b><?php echo isset($inv_payment->ipt_disc_format) ? $inv_payment->ipt_disc_format:''; ?></b></td>
                              <td><i class="fas fa-rupee-sign list-level"></i> Grand Total </td>
                              <td class="inner-right"><b><?php echo number_format($grand_total,2); ?></b></td>
                          </tr>
                          <tr>
                              <td><i class="fas fa-rupee-sign list-level"></i> Sub Total</td>
                               <td class="inner-right"><b><?php echo isset($inv_payment->ipt_sub_total_format) ? $inv_payment->ipt_sub_total_format:''; ?></b></td>
                                <td><i class="fas fa-rupee-sign list-level"></i> Invoices Cleared</td>
                               <td  class="inner-right"><b><?php 
                             
                              echo $inv_payment_amt_format; ?></b></td>
                          </tr>
                          <tr>
                              <td><i class="fas fa-rupee-sign list-level"></i> TDS Deducted <?php echo  (isset($inv_payment->ipt_tds_percent) && $inv_payment->ipt_tds_percent != 0) ? ' ('.$inv_payment->ipt_tds_percent.'%)':'';  ?></td>
                               <td class="inner-right"><b><?php echo isset($inv_payment->ipt_tds_amt_format) ? $inv_payment->ipt_tds_amt_format:''; 
                             ?></b></td>
                              <td><i class="fas fa-rupee-sign list-level"></i> Balance on Account</td>
                                <td class="inner-right"> <b><?php $balance = $grand_total-$inv_payment_amt;
                               echo number_format($balance,2); ?></b></td>
                          </tr>
                          <tr>
                            <td ><i class="fas fa-rupee-sign list-level"></i> Total Amount </td>
                            <td  class="inner-right"><b><?php echo isset($inv_payment->ipt_total_format) ? $inv_payment->ipt_total_format:''; ?></b></td>
                            <td colspan="2"></td>
                            
                          </tr>
                        </tbody>
                       <!--    <thead class="flip-content">
                            <tr class="content-center">
                              <th><i class="fas fa-rupee-sign list-level"></i> Amount</th>
                              <th><i class="fas fa-rupee-sign list-level"></i> Discount</th>
                              <th><i class="fas fa-rupee-sign list-level"></i> Sub Total</th>
                              <th><i class="fas fa-rupee-sign list-level"></i> TDS </th>
                              <th><i class="fas fa-rupee-sign list-level"></i> Total </th>
                              <th><i class="fas fa-rupee-sign list-level"></i> Account</th>
                              <th><i class="fas fa-rupee-sign list-level"></i> Grand Total </th>
                              <th><i class="fas fa-rupee-sign list-level"></i> Invoice </th>
                              <th><i class="fas fa-rupee-sign list-level"></i> Balance</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="content-center">
                              <td><b><?php echo isset($inv_payment->ipt_amt_format) ? $inv_payment->ipt_amt_format:''; ?></b></td>
                              <td><b><?php echo isset($inv_payment->ipt_disc_format) ? $inv_payment->ipt_disc_format:''; ?></b></td>
                              <td><b><?php 
                               $ipt_sub_total= isset($inv_payment->ipt_sub_total) ? $inv_payment->ipt_sub_total:0;
                               $ipt_sub_total_format= isset($inv_payment->ipt_sub_total_format) ? $inv_payment->ipt_sub_total_format:0;
                              echo $ipt_sub_total_format; ?></b></td>
                              <td><b><?php echo isset($inv_payment->ipt_tds_amt_format) ? $inv_payment->ipt_tds_amt_format:''; 
                              echo  (isset($inv_payment->ipt_tds_percent) && $inv_payment->ipt_tds_percent != 0) ? ' ('.$inv_payment->ipt_tds_percent.'%)':''; ?></b></td>
                              <td><b><?php echo isset($inv_payment->ipt_total_format) ? $inv_payment->ipt_total_format:''; ?></b></td>
                              <td><b><?php echo isset($inv_payment->ipt_on_acc_format) ? $inv_payment->ipt_on_acc_format:''; ?></b></td>
                              <td><b><?php 
                              $on_account=  isset($inv_payment->ipt_on_acc) ? $inv_payment->ipt_on_acc:0;
                              $total = isset($inv_payment->ipt_total) ? $inv_payment->ipt_total:0; 
                              $grand_total = $total+$on_account;
                              echo number_format($grand_total,2);
                              ?></b></td>

                              <td><b><?php 
                              $inv_payment_amt = isset($inv_payment->ipt_invoice_amt) ? $inv_payment->ipt_invoice_amt:0;
                              $inv_payment_amt_format = ($inv_payment->ipt_invoice_amt ) ? number_format($inv_payment->ipt_invoice_amt,2):0;
                              echo $inv_payment_amt_format; ?></b></td>
                              <td><b><?php $balance = $grand_total-$inv_payment_amt;
                               echo number_format($balance,2); ?></b></td>
                            </tr>
                          </tbody> -->
                      </table>
                    </div>
                    </div>
                  </section>
                </aside>
                <aside class="profile-info col-md-12">
                  <section>
                    <div class="portlet light table-bordered table-details-table details-list">
                      <!-- <div class="flip-scroll table-div"> -->
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-quot table-list" id="invoice_list">
                        <!-- <table class="table table-bordered table-striped table-condensed flip-content custom-flip-content" id="invoice_list"> -->
                        <thead>
                          <tr>
                            <th>Invoice</th>
                            <th>Title</th>
                            <th>Amt</th>
                            <th>Due Date</th>
                          </tr>
                        </thead>
                     
                      </table>
                      </div>
                    </div>
                  </section>
                </aside>
                


                <!-- -----MAIN CONTENTS END HERE----- -->
              </div>
            </div>
          </div>
        
      </div>
    </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?> 
       <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>  
       <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- OPTIONAL SCRIPTS -->
      <script type="text/javascript">
                        check_payment_mode('<?php echo  isset($inv_payment->ipt_mode) ? $inv_payment->ipt_mode:0; ?>');
                 var primary_key     = 'ipt_id';
                 var updateUrl       = baseUrl + 'invoice_payment/updateCustomData';
                
                 var editableElement = '.ipt_mode_editable';
                 var select2Class    = 'ipt_mode_select2';
                 var dropdownUrl     = 'invoice/getGenPrmforDropdown/';
                newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl,'getPaymentMode');

                 var editableElement = '.ipt_bank_editable';
                customTextEditable(editableElement, primary_key, updateUrl);
                 var editableElement = '.ipt_branch_editable';
                customTextEditable(editableElement, primary_key, updateUrl);
                 var editableElement = '.ipt_chq_date_editable';
                customTextEditable(editableElement, primary_key, updateUrl);
                 var editableElement = '.ipt_payment_no_editable';
                customTextEditable(editableElement, primary_key, updateUrl);
                 var editableElement = '.ipt_date_editable';
                customTextEditable(editableElement, primary_key, updateUrl);
                function getPaymentMode(response,new_value)
                {
                  nexlog('in function ');
                    check_payment_mode(new_value);
                }
           function deleteData(thisElement)
                 {
                   swal({
                          title: "Are you sure?",
                          text: "You will not be able to recover this Payment Details ",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonClass: "btn-danger",
                          confirmButtonText: "Yes, delete it!",
                          cancelButtonText: "No, cancel plx!",
                          closeOnConfirm: false,
                          closeOnCancel: false
                            },
                            function(isConfirm) {
                              if (isConfirm) 
                              {
                                var ipt_id = $(thisElement).attr('data-ipt_id');
                                var ipt_invoice = $(thisElement).attr('data-ipt_invoice');
                                   dataString =
                                  {
                                     ipt_id:ipt_id,
                                     ipt_invoice:ipt_invoice,
                                     ipt_status:2                    
                                    }
                                   $.ajax({
                                          type: "POST",
                                          url: baseUrl + 'invoice_payment/updateCustomData?delete_func=true',
                                          data: dataString,
                                          dataType: "json",
                                          success: function(response)
                                          {
                                              if (response.success == true)
                                              {
                                                  message="Payment Deleted successfully";
                                                  
                                                  swal(
                                                  {
                                                      title: "Done",
                                                      text:  message,
                                                      type: "success",
                                                      icon: "success",
                                                      button: true,
                                                  });
                                                  window.location.href=baseUrl+'payment-list';
                                              }
                                              else
                                              {
                                                  $('.btn_save').button('reset');
                                                  swal(
                                                  {
                                                      title: "Opps",
                                                      text: "Something Went wrong",
                                                      type: "error",
                                                      icon: "error",
                                                      button: true,
                                                  });
                                              }
                                          }
                                      });
                              }else {
                                swal("Cancelled", "Payment Details is safe :)", "error");
                              }
                          });

                 }
                     $(document).ready(function(){
                        getDataTableList();
                    });
                    function getDataTableList()
                    {
                        var customDataTableElement = '#invoice_list';
                        var invoice = '<?php echo isset($inv_payment->ipt_invoice) ? $inv_payment->ipt_invoice:''; ?>';
                        $(customDataTableElement).DataTable().destroy();
                        var customDataTableCount   = '<?php  echo isset($dataTableData->table_data_count) ? $dataTableData->table_data_count:0; ?>';
                        var customDataTableServer   = '<?php echo  isset($dataTableData->table_server_status) ? $dataTableData->table_server_status:0; ?>';
                        var customDataTableUrl     = baseUrl + 'invoice_payment/getInvoiceListByInvoiceId?table_data_count='+customDataTableCount+'&invoice='+invoice;
                        var customDataTableColumns = [
                            {   'data'  : 'inv_id' ,
                                'render': function(data, type, row, meta)
                                {
                                    var link = ''+row.inv_code+'';
                                     link = '<a href="'+baseUrl+'invoice-details-'+row.inv_encrypted_id+'" title="View Detail">'+row.inv_code+'</a>&nbsp;';
                                         return link;
                                  

                                      
                                }
                            },
                            {   'data'  : 'inv_title'},
                            {   'data'  : 'inv_total',
                              'render': function(data, type, row, meta)
                                {
                                  return row.inv_total_format;
                                }
                             },
                            {   'data'  : 'inv_due_date'}
                           
                        ];
                        customDatatablex({
                          element: customDataTableElement, 
                          url: customDataTableUrl, 
                          columns: customDataTableColumns, 
                          buttons : true, 
                          serverSide : customDataTableServer,
                          delay : 1000,
                          optParam : {
                           /*<?php 
                              if($export_access)
                                echo 'exportAccess : true,';
                              if($print_access)
                                echo 'printAccess : true,';
                            ?>*/
                          }
                        });
                        //customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                    }
                    function check_payment_mode(ipt_mode)
                    {
                       var ipt_mode_cheque = '<?php echo INVOICE_PAYMENT_MODE_CHEQUE; ?>';
                       var ipt_mode_utr = '<?php echo INVOICE_PAYMENT_MODE_UTR; ?>';
                              console.log(' ipt_mode : '+ipt_mode);
                      switch(ipt_mode)
                      {
                        case ipt_mode_cheque:
                             /* $('.cheque-details').css('display','block');
                              $('.payment-no').css('display','block');*/
                              $('.cheque-details').removeClass('hidden');
                              $('.payment-no').removeClass('hidden');
                              $('.payment-no-value').attr('colspan','');
                              break;
                        case ipt_mode_utr:
                              /*$('.payment-no').css('display','block');
                              $('.cheque-details').css('display','none');*/
                              $('.payment-no').removeClass('hidden');
                              $('.cheque-details').addClass('hidden');
                              $('.payment-no-value').attr('colspan','3');
                              console.log(' ipt_mode_utr mode');
                              break;
                        default:
                              /*$('.cheque-details').css('display','none');
                              $('.payment-no').css('display','none');*/
                              $('.cheque-details, .payment-no').addClass('hidden');
                              console.log(' default mode');
                              break;
                      }
                    }
      </script>
    </div>
  </body>
</html>