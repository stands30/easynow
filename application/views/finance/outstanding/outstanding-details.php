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
    <!-- OPTIONAL LAYOUT STYLES -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/finance/outstanding/outstanding-custom.css">
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- END OPTIONAL LAYOUT STYLES -->  
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
            <div class="row">
                <div class="col-md-4 col-sm-4 mob-breadcrumb">
                  <?php echo $breadcrumb; ?>
                </div>
                <div class="col-md-8 col-sm-8 mob-date mob-date-custom date-filter pull-right">
                  <div class="breadcrumb-date">
                    <div class="page-toolbar page-toolbar-custom">
                      <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider date-range-picker-div" data-container="body" data-placement="bottom" data-original-title="change Outstanding Detail date range" data-daterangevaluestart="" data-daterangevalueend="">
                          <span class="thin uppercase"></span>&nbsp;
                          <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                      </div>
                    </div>
                    <!-- <div class="page-toolbar page-custom-toolbar"> -->
                      <a href="#" class="pull-right btn btn-primary btn-month-srt date-range-picker-div date-list-picker" data-daterangevaluestart="" data-daterangevalueend="" >All Time</a>
                      <a href="#" class="pull-right btn btn-primary btn-month-srt date-range-picker-div date-list-picker" data-daterangevaluestart="<?php echo date('Y-m').'-01'; ?>" data-daterangevalueend="<?php echo date('Y-m-d'); ?>" ><?php echo date('M') ?></a>
                      <a href="#" class="pull-right btn btn-primary btn-month-srt date-range-picker-div  date-list-picker" data-daterangevaluestart="<?php echo date('Y').'-01-01' ?>" data-daterangevalueend="<?php echo date('Y').'-12-31'; ?>" ><?php echo date('Y') ?></a>
                    <!-- </div> -->
                  </div>
                </div>
                 <div class="breadcrumb-button breadcrumb-button-custom">
                          <?php
                        $prev_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($company->prev_id);
                        $next_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($company->next_id);
                      ?>
                       
                      <a href="<?php echo base_url('outstanding-details-'.$prev_encrypted_id); ?>" class=" previous" title="">
                          <button class="btn green">
                              <i class="fa fa-arrow-left"></i>                                    
                          </button>
                          
                      </a>
                      
                      <a href="<?php echo base_url('outstanding-details-'.$next_encrypted_id); ?>" class="next">
                          <button class="btn green">
                              <i class="fa fa-arrow-right"></i>
                          </button>
                          
                      </a>
                  </div>
              </div>
           
          </div>
          <!-- END PAGE BAR -->
          <!-- Start date filter -->
          <div class="date-range-set">
            
          </div>
          <!-- End date filter -->

          <!-- END PAGE HEADER-->
          <div class="portlet">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <!-- -----MAIN CONTENTS START HERE----- -->

                <aside class="profile-info col-md-12">
                    <section class="panel">
                         <!-- <label>Duration (years/months/days) according to the radio button condition , MAKE STATUS EDITABLE</label> -->
                      <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                        <header class="panel-heading panel-heading-lead color-primary">
                            <div class="row detail-box">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <span class="detail-list-heading">Account Info</span>
                                     <br>
                                        <div class="col-md-12 no-side-padding inner-row">
                                            <span class="panel-title">
                                              <a href="<?php echo base_url('company-details-'.$cmp_encrypted_id) ?>"><?php echo isset($company->cmp_name) ? $company->cmp_name:''; ?></a>
                                             
                                            </span>
                                        </div>
                                        <div class="col-md-12 no-side-padding inner-row">
                                          <span class="panel-title"> <span class="panel-title panel-new-title">GST No :</span> <span style="font-size: 13px;font-weight: 600;">  <?php echo isset($company->cmp_gst_no) ? $company->cmp_gst_no:''; ?></span></span>
                                        </div>
                                        
                                        
                                    
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                  <div class="col-md-12 no-side-padding inner-row">
                                          <span class="panel-title panel-new-title">
                                            Billing Address
                                          </span>
                                          <br>
                                          <span class="panel-sub-title">
                                            <?php echo isset($company->cmp_address) ? $company->cmp_address:''; ?>
                                              
                                          </span>
                                        </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                  <div class="col-md-12 no-side-padding inner-row">
                                    <span class="panel-title panel-new-title">
                                            Payment Terms 
                                          </span>
                                          <br>
                                          <span class="panel-sub-title">
                                            <?php echo isset($company->cmp_payment_terms) ? $company->cmp_payment_terms:''; ?>
                                          </span>
                                  </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 text-right">
                                   <?php 
                                      if($payment_access['add_access']) { ?>
                                       <div class="col-md-12 no-side-padding inner-row">
                                          <a class="btn btn-edit header-btn" href="<?php echo base_url('payment-add-'.$cmp_encrypted_id) ?>">
                                            <i class="fa fa-plus"></i><span class="btn-text"> Add Payment</span>
                                          </a>
                                    <?php }
                                      if($print_access){ ?>
                                          <a class="btn btn-edit header-btn" href="<?php echo base_url('outstanding-print-'.$cmp_encrypted_id); ?>">
                                            <i class="fa fa-print"></i><span class="btn-text"> Print</span>
                                          </a>
                                          <?php } ?>
                                        </div>
                                </div>
                                <!-- <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                  <span class="created">Created By: Vinay Pagare (Admin)
                                  </span>
                                  <br>
                                  <span class="sp-date">Created On: 08th Mar, 2019
                                  </span>
                                </div> -->
                            </div>
                        </header>

                        <div class="table-responsive" >
                            <table class="table table-detail-custom table-stylm table-out" style="margin-bottom: 0px">
                              <span style="display: none;">
                              <!--   <?php $due_amt       =  isset($company->due_amt) ? $company->due_amt:0; 
                                      $bill_amt      =  isset($company->bill_amt) ? $company->bill_amt:0;
                                      $paid_amt      =  isset($company->paid_amt) ? $company->paid_amt:0;
                                      $on_acc        =  isset($company->on_acc) ? $company->on_acc:0;
                                      $amount        =  $paid_amt; 
                                      $ots_amt       =  $bill_amt-$amount; 
                                      $pending_amt   =  isset($company->pending_amt) ? $company->pending_amt:0;
                                      $total_due_amt =  $due_amt-$on_acc; 
                                      $disc_amt      =  isset($company->disc_amt) ? $company->disc_amt:0; ?> -->
                                <?php    echo ($due_amt > 0) ? number_format($due_amt,2):0; ?></span>
                                <tbody>
                                   <tr>
                                      <td><!-- <i class="fas fa-rupee-sign list-level"></i> --><i class="fas fa-coins color-yellow list-level"></i> Billed Amount</td>
                                      <!-- <td><?php  echo number_format($bill_amt,2); ?></td> -->
                                      <td class="bill_amt"></td>
                                      <td><!-- <i class="fas fa-rupee-sign list-level"></i> -->
                                        <img src="<?php echo base_url() ?>assets/project/svg/outstanding.svg" style="width: 16px;" class="list-level"> Paid Amount</td>
                                      <td class="paid_amt"></td>
                               <!--        <td><?php
                                        echo number_format($paid_amt,2); ?></td> -->
                                      <td><i class="fas fa-address-card color-dark-green list-level"></i> On Account</td>
                                      <td class="on_acc"></td>
                                     <!--  <td><?php echo number_format($on_acc,2); ?></td> -->
                                      <td style="background: #f5f5f5;"><i class="fas fa-money-check-alt color-red list-level"></i> Closing Balance</td>
                                      <td  style="background: #f5f5f5;"><b><span  class="ots_amt"></span></b></td>
                                     <!--  <td style="background: #f5f5f5;"><b><?php 
                                      echo number_format($ots_amt,2); ?></b></td> -->
                                    </tr>

                                   <tr>
                                        <td><i class="fas fa-file-invoice-dollar color-dark-blue list-level"></i> Pending Bills</td>
                                        <td  class="pending_amt"></td>
                                        <!-- <td><?php 
                                        echo number_format($pending_amt,2); ?></td> -->
                                        <td><i class="fas fa-file-invoice color-dark-green list-level"></i> Outstanding Amount</td>
                                        <td  class="ots_amt"></td>
                                        <!-- <td><?php echo ($ots_amt > 0) ? number_format($ots_amt,2):0; ?></td> -->
                                        <td><i class="fas fa-money-bill-wave-alt color-red list-level"></i> Due Amount</td>
                                        <td  class="total_due_amt"></td>
                                        <!-- <td><?php  echo ($total_due_amt) ? number_format($total_due_amt,2):0; ?></td> -->
                                        <td><img src="<?php echo base_url() ?>assets/project/svg/discount-tag.svg" style="width: 16px;" class="list-level"> Adjustment</td>
                                        <!-- <td><?php echo number_format($disc_amt,2); ?></td> -->
                                        <td  class="disc_amt"></td>
                                    </tr>
                                    
                                    
                                    
                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="table-responsive" >
                            <table class="table table-detail-custom table-stylm table-out" style="margin-bottom: 0px">
                                <tbody>
                                   <tr>
                                        <td><i class="fas fa-rupee-sign list-level"></i>On Account</td>
                                        <td><i class="fas fa-rupee-sign list-level"></i>Bill</td>
                                        <td><i class="fas fa-rupee-sign list-level"></i> Paid</td>
                                        <td colspan="2"><i class="fas fa-rupee-sign list-level"></i> Closing Balance</td>
                                    </tr>
                                    <tr>
                                        <td><b><?php $on_acc= isset($company->on_acc) ? $company->on_acc:0;
                                        echo number_format($on_acc,2); ?></b></td>
                                        <td><b><?php $bill_amt= isset($company->bill_amt) ? $company->bill_amt:0;
                                        echo number_format($bill_amt,2); ?></b></td>
                                        <td><b><?php $paid_amt =  isset($company->paid_amt) ? $company->paid_amt:'0';
                                              $on_acc =  isset($company->on_acc) ? $company->on_acc:'0'; 
                                        $amount =  $paid_amt; 
                                        echo number_format($amount,2); ?></b></td>
                                        <td colspan="2"><b><?php 
                                        $ots_amt = $bill_amt-$amount;
                                        echo number_format($ots_amt,2); ?></b></td>
                                        
                                    </tr>
                                   <tr>
                                        <td><i class="fas fa-rupee-sign list-level"></i>Pending</td>
                                        <td><i class="fas fa-rupee-sign list-level"></i>Outstanding</td>
                                        <td><i class="fas fa-rupee-sign list-level"></i> Due Amt</td>
                                        <td><i class="fas fa-rupee-sign list-level"></i> Due - Account Amt</td>
                                        <td colspan="2"><i class="fas fa-rupee-sign list-level"></i> Discount Amt</td>
                                    </tr>
                                    <tr>
                                        <td><b><?php $pending_amt= isset($company->pending_amt) ? $company->pending_amt:0;
                                        echo number_format($pending_amt,2); ?></b></td>
                                        <td><b><?php echo ($ots_amt > 0) ? number_format($ots_amt,2):0; ?></b></td>
                                        <td><b><?php $due_amt =  isset($company->due_amt) ? $company->due_amt:0; 
                                        echo ($due_amt > 0) ? number_format($due_amt,2):0; ?></b></td>
                                        <td><b><?php echo $due_amt-$on_acc; ?></b></td>
                                        <td colspan="2"><b><?php $disc_amt =  isset($company->disc_amt) ? $company->disc_amt:0; 
                                        echo number_format($disc_amt,2); ?></b></td>
                                        
                                    </tr>
                                   
                                    
                                    
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                 

                    </section>
                    

                </aside>

                          
                <aside class="profile-info col-md-12 mb-20">
                  <section class="content-pannel">
                    <div class="portlet light table-bordered bordered table-footer-custom"> 
                      <header class="">
                        <div class="detail-box mb-10">
                          <div>
                            <span class="panel-title">Outstanding Details</span> 
                          </div>
                        </div>
                      </header>
                      <!-- <div class="flip-scroll table-div">
                        <table class="table table-bordered table-striped table-condensed flip-content text-center stripe custom-flip-content" id="ots_payment_list">
                          <thead class="flip-content">
                            <tr>
                              <th>Sr No.</th>
                              <th>Status</th>
                              <th>Transaction No</th>
                              <th>Generate Date</th>
                              <th>Payment Date</th>
                              <th>Invoice Age</th>
                              <th>Debit</th>
                              <th>Credit</th>                              
                              <th>Net</th>                              
                            </tr>
                          </thead>
                        <tbody></tbody>
                        <tfoot>
                          <tr>
                            <td colspan="5"></td>
                           
                              <td class="firstdata">  Total</td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            </tr>
                           
                        </tfoot> 
                        </table>
                      </div> -->
                      

                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-quot table-list table-content-details" id="ots_payment_list">
                          <thead class="flip-content">
                            <tr>
                              <th>Sr No.</th>
                              <th>Status</th>
                              <th>Transaction No</th>
                              <th>Generate Date</th>
                              <th>Payment Date</th>
                              <th>Invoice Age</th>
                              <th>Debit</th>
                              <th>Credit</th>                              
                              <th>Net</th>                              
                            </tr>
                          </thead>
                          <tbody></tbody>
                          <tfoot>
                            <tr>
                              <td colspan="5"></td>
                             
                                <td class="firstdata">  Total</td>
                              <td ></td>
                              <td ></td>
                              <td ></td>
                              </tr>
                             
                          </tfoot> 
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
      <!-- OPTIONAL SCRIPTS -->
       <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>  
         <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script type="text/javascript">
              $(document).ready(function(){
                // alert('in js');
                         getDataTableList('<?php echo $start_date; ?>','<?php echo $end_date; ?>');
                        getOutstandingBalanceData('<?php echo $start_date; ?>','<?php echo $end_date; ?>');
                        higlightSelectedDate();
                    });
                $('.date-range-picker-div').click(function(){
                   updateDateFilter($(this),function(start_date,end_date){
                           getDataTableList(start_date,end_date);
                            getOutstandingBalanceData(start_date,end_date);
                        });
                });
                $('#daterangepicker-custom-range').on('apply.daterangepicker', function(ev, picker) {
             
                        updateDateFilter($('#daterangepicker-custom-range'),function(start_date,end_date){
                           getDataTableList(start_date,end_date);
                            getOutstandingBalanceData(start_date,end_date);
                        });
              });
                
                var payment_delete_access = '<?php echo isset($payment_access['delete_access']) ? $payment_access['delete_access']:0; ?>';
                    function getDataTableList(start_date,end_date)
                    {
                        var customDataTableElement = '#ots_payment_list';
                        $(customDataTableElement).DataTable().destroy();
                       /* var customDataTableCount   = '<?php isset($dataTableData->table_data_count) ? $dataTableData->table_data_count:''; ?>';
                        var customDataTableServer   = '<?php isset($dataTableData->table_server_status) ? $dataTableData->table_server_status:''; ?>';*/
                         var customDataTableCount   = 0;
                        var customDataTableServer   = 0;
                        var customDataTableUrl     = baseUrl + 'outstanding/getCompanyOutstandingsList?table_data_count='+customDataTableCount+'&cmp_id='+<?php echo isset($company->inv_cmp_id) ? $company->inv_cmp_id:0; ?>+'&start_date='+start_date+'&end_date='+end_date;
                        var customDataTableColumns = [
                            {   'data'  : 'payment_detail_id' },
                            {   'data'  : 'inv_payment_status_name' ,
                                'render': function(data, type, row, meta)
                                {
                                    var link = ''+row.inv_payment_status_name+'';
                                    
                                    /*<?php if($detail_access) { ?>
                                        link = '<a href="'+baseUrl+'payment-details-'+row.ipt_encrypted_id+'" title="View Detail">'+row.ipt_code+'</a>&nbsp;';
                                         return link;
                                    <?php }else{ ?>
                                        link = row.ipt_code;
                                    <?php }?>*/
                                      return link;

                                      
                                }
                            },
                            {   'data'  : 'payment_code',
                                'render': function(data, type, row, meta)
                                {
                                    // var link = row.qtn_cmp_encrypted_id;
                                    var  link = '';
                                    if(row.payment_code != '')
                                    {
                                       link = '<a href="'+baseUrl+row.payment_detail_url+row.payment_detail_id_encrypted+'" title="View Detail">'+row.payment_code+'</a>';
                                       if(row.payment_id != '' && payment_delete_access == '1')
                                       {
                                          link += '   <a class="btn-edit btn-delete-row" href="javascript:;" onclick="return deleteData(this);" data-title="Delete Payment" data-toggle="tooltip" data-ipt_id='+row.payment_id+' data-ipt_invoice='+row.payment_invoice+'> <i class="fa fa-trash"></i>  <span class="btn-text"></span></a>';
                                       }
                                       // else
                                       // {
                                       //  link+=' &nbsp;&nbsp;&nbsp;&nbsp;';
                                       // }
                                       
                                    }
                                  return link;
                                }
                            },
                            {   'data'  : 'generated_date',
                                'render': function(data, type, row, meta)
                                {
                                  return row.generated_date_format;
                                }
                             },
                            {   'data'  : 'payment_date' },
                            {   'data'  : 'inv_age' ,
                                 'render': function(data, type, row, meta)
                                {
                                  return (row.inv_age != '') ? row.inv_age+' Days':'';
                                }
                            },
                            {   'data'  : 'payment_debit' },
                            {   'data'  : 'payment_credit' },
                            {   'data'  : 'payment_credit' ,
                                'render': function(data, type, row, meta)
                                {
                                  // nexlog(meta);
                                  var prev_row = meta.row;
                                    var prev_net=0;
                                  if(prev_row >0)
                                  {
                                    prev_net_string=meta.settings.aoData[meta.row-1].anCells[8].innerText;
                                    prev_net = parseFloat(prev_net_string.replace(",", ''));
                                    // nexlog('prev_net'+parseFloat(prev_net_string.replace(",", ''))+' || row.payment_debit'+row.payment_debit+' || row.payment_credit ' +row.payment_credit);
                                  }
                                   if(row.payment_debit > 0 )
                                   {
                                    net  =parseFloat(row.payment_debit)+prev_net;
                                   }
                                   else
                                   {
                                    net  =prev_net-parseFloat(row.payment_credit);
                                   }
                                   /* if(row.payment_debit > 0 )
                                   {
                                    net  =row.payment_debit;
                                   }
                                   else
                                   {
                                    net  =row.payment_credit;
                                   }*/
                                       net = indiancurrency(parseFloat(net).toFixed(2));
                                       return net;
                                },
                            },
                     /*       {   'data'  : 'inv_id' ,
                                'render': function(data, type, row, meta)
                                {
                                  var link = '';
                                  if(row.private_access == 0)
                                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";
                                  <?php if($edit_access) { ?>
                                     link += '<a href="'+baseUrl+'payment-details-'+row.ipt_encrypted_id+'" title="View Details "><i style="font-size: 15px; color:#EF7F1A;" class="fa fa-book" aria-hidden="true"></i></a>&nbsp;';
                                  <?php }?>
                                  <?php if($delete_access) { ?>
                                    link += '<a href="javascript:;" title="Delete Quotation" data-toggle="tooltip" onclick=deleteData("'+row.ipt_id+'")><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;';
                                  <?php } ?>
                                  return link;
                                }
                            }*/
                        ];
                         var  columnDefs= [
                                            { className: "inner-position", "targets": [ 2 ] },
                                              // { className: "inner-left", "targets": [ 2 ] },
                                            ];
                        var footerCallback =  function ( row, data, start, end, display ) {
                                      var api = this.api(), data;
                           
                                      // converting to interger to find total
                                      var intVal = function ( i ) {
                                          return typeof i === 'string' ?
                                              i.replace(/[\$,]/g, '')*1 :
                                              typeof i === 'number' ?
                                                  i : 0;
                                      };
                                        // console.log(' api >>');
                                       

                                        // console.log(' api <<');
                                      // computing column Total of the complete result 
                                      var debit_total = api
                                          .column(6)
                                          .data()
                                          .reduce( function (a, b) {
                                              return intVal(a) + intVal(b);
                                          }, 0 );
                                  
                                      var credit_Total = api
                                          .column(7)
                                          .data()
                                          .reduce( function (a, b) {
                                              return intVal(a) + intVal(b);
                                          }, 0 );
                                    
                                     
                                      var net_Total = parseFloat(debit_total)-parseFloat(credit_Total);
                                      var closing_balance = parseFloat(debit_total)-parseFloat(net_Total);
                                       debit_total = indiancurrency(debit_total.toFixed(2));
                                       credit_Total = indiancurrency(credit_Total.toFixed(2));
                                       net_Total = indiancurrency(net_Total.toFixed(2));
                                    // console.log(' debit_total : '+debit_total+' credit_Total : '+credit_Total+' net_Total : '+net_Total);
                                
                                      // Update footer by showing the total with the reference of the column index 
                                // $( api.column( 0 ).footer() ).html('Total');
                                      $( api.column(6).footer() ).html(debit_total);
                                      $( api.column(7).footer() ).html(credit_Total);
                                      $( api.column(8).footer() ).html(net_Total);

                                  }
                        
                        customDatatablex({
                          element: customDataTableElement, 
                          url: customDataTableUrl, 
                          columns: customDataTableColumns, 
                          buttons : false, 
                          serverSide : customDataTableServer,
                          delay : 1000,
                          optParam : {
                         /*  <?php 
                              if($export_access)
                                echo 'exportAccess : true,';
                              if($print_access)
                                echo 'printAccess : true,';
                            ?>*/
                          },
                          sr_no: true,
                          footerCallback:footerCallback,
                          columnDefs:columnDefs
                        });
                        //customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
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
                                                   location.reload();
                                                  // window.location.href=baseUrl+'payment-list';
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
                    function getOutstandingBalanceData(start_date,end_date)
                 {
                  
                   var cmp_id     = <?php echo isset($company->inv_cmp_id) ? $company->inv_cmp_id:''; ?>;
                       dataString =
                      {
                         start_date:start_date,
                         end_date:end_date,
                         cmp_id:cmp_id                 
                        }
                       $.ajax({
                              type: "POST",
                              url: baseUrl + 'outstanding/getOutstandingBalanceData',
                              data: dataString,
                              dataType: "json",
                              success: function(response)
                              {
                                nexlog(response);
                                  /*if (response)
                                  {*/
                                     var due_amt          =  (response.due_amt != null) ? response.due_amt:0; 
                                     var bill_amt      =  (response.bill_amt != null) ? response.bill_amt:0;
                                     var paid_amt      =  (response.paid_amt != null) ? response.paid_amt:0;
                                     var on_acc        =  (response.on_acc != null) ? response.on_acc:0;
                                     var amount        =  response.paid_amt; 
                                     var ots_amt       =  parseFloat(response.bill_amt)-parseFloat(amount); 
                                     var pending_amt   =  (response.pending_amt != null) ? response.pending_amt:0;
                                     var total_due_amt =  parseFloat(response.due_amt)-parseFloat(response.on_acc); 
                                     var disc_amt      =  (response.disc_amt != null) ? response.disc_amt:0; 
                                         ots_amt       =  (!isNaN(ots_amt)) ? ots_amt:0; 
                                         total_due_amt =  (!isNaN(total_due_amt)) ? total_due_amt:0; 
                                     $('.due_amt').html(indiancurrency(parseFloat(due_amt).toFixed(2)));
                                     $('.bill_amt').html(indiancurrency(parseFloat(bill_amt).toFixed(2)));
                                     $('.paid_amt').html(indiancurrency(parseFloat(paid_amt).toFixed(2)));
                                     $('.on_acc').html(indiancurrency(parseFloat(on_acc).toFixed(2)));
                                     $('.amount').html(indiancurrency(parseFloat(amount).toFixed(2)));
                                     $('.ots_amt').html(indiancurrency(parseFloat(ots_amt).toFixed(2)));
                                     $('.pending_amt').html(indiancurrency(parseFloat(pending_amt).toFixed(2)));
                                     $('.total_due_amt').html(indiancurrency(parseFloat(total_due_amt).toFixed(2)));
                                     $('.disc_amt').html(indiancurrency(parseFloat(disc_amt).toFixed(2)));
                                  // }
                             }
                          });

                 }
                 
        </script>
      <!-- OPTIONAL SCRIPTS -->
     
      <!-- END OPTIONAL SCRIPTS -->
    </div>
  </body>
</html>