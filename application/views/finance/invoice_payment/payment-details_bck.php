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

    <!-- OPTIONAL LAYOUT STYLES -->

    

    <!-- END OPTIONAL LAYOUT STYLES -->  

    <style type="text/css">

      td{

        text-align: left;

      }

      .inner-right{

        text-align: right;

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

                                    <div class="col-md-12 no-side-padding inner-row">

                                        <span class="panel-title">

                                            <?php echo isset($inv_payment->cmp_name) ? $inv_payment->cmp_name.' - '.(isset($inv_payment->ipt_code) ? $inv_payment->ipt_code:''):''; ?>

                                        </span>

                                        <?php

                                        if($delete_access) {

                                          $ipt_id = isset($inv_payment->ipt_id) ? $inv_payment->ipt_id:'';

                                          $ipt_invoice = isset($inv_payment->ipt_invoice) ? $inv_payment->ipt_invoice:'';

                                        ?>

                                        <a class="btn-edit" href="javascript:;" onclick="return deleteData(this);" data-title="Delete Payment" data-toggle="tooltip" data-ipt_id='<?php echo $ipt_id ?>' data-ipt_invoice='<?php echo $ipt_invoice; ?>'>

                                          <i class="fa fa-trash"></i>

                                          <span class="btn-text">

                                            Delete

                                          </span>

                                        </a>

                                      <?php } ?>

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

                                    <td><?php echo isset($inv_payment->ipt_mode_name) ? $inv_payment->ipt_mode_name:''; ?></td>



                                    <td><i class="fas fa-calendar-alt list-level"></i>Payment Date </td>

                                    <td><?php echo isset($inv_payment->ipt_date_format) ? $inv_payment->ipt_date_format:''; ?></td>



                                    

                                    

                                  </tr>



                                  <tr>

                                    <td><i class="fas fa-university list-level"></i>Bank Name </td>

                                    <td><?php echo isset($inv_payment->ipt_bank) ? $inv_payment->ipt_bank:''; ?></td>

                                    <td><i class="fas fa-university list-level"></i>Branch Name </td>

                                    <td><?php echo isset($inv_payment->ipt_branch) ? $inv_payment->ipt_branch:''; ?></td>

                                  </tr>



                                  <tr>

                                    <td><i class="fas fa-calendar-alt list-level"></i>Cheque Date </td>

                                    <td><?php echo isset($inv_payment->ipt_chq_date_format) ? $inv_payment->ipt_chq_date_format:''; ?></td>



                                    <td><i class="fas fa-th-list list-level"></i>Cheque No/UTR No </td>

                                    <td><?php echo isset($inv_payment->ipt_payment_no) ? $inv_payment->ipt_payment_no:''; ?></td>

                                  </tr>



                                   

                                    

                                    

                                </tbody>

                            </table>





                        </div>



                    </div>









                  



                    </section>

                    

                    

                </aside>





                <aside class="profile-info col-md-12">

                  <section class="panel">

                    <div class="flip-scroll table-div">

                      <table class="table table-bordered table-striped table-condensed flip-content custom-flip-content">

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

                              <td><i class="fas fa-rupee-sign list-level"></i> TDS Deducted 
                                <?php   (isset($inv_payment->ipt_tds_percent) && $inv_payment->ipt_tds_percent != 0) ? ' '.$inv_payment->ipt_tds_percent.'':'';  ?>
                              </td>

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

                  </section>

                </aside>

                <aside class="profile-info col-md-12">

                  <section>

                    <div class="portlet light table-bordered table-details-table">

                      <div class="flip-scroll table-div">

                        <table class="table table-bordered table-striped table-condensed flip-content custom-flip-content" id="invoice_list">

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

      <!-- OPTIONAL SCRIPTS -->

      <script type="text/javascript">

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

      </script>

    </div>

  </body>

</html>