    <!DOCTYPE html>
    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
        <head>
            <?php
            $global_asset_version = global_asset_version();
             $this->load->view('common/header_styles');
             ?>
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- daterange picker -->
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        </head>
        <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
            <?php $this->load->view('common/header'); ?>
            <div class="clearfix"> </div>
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <?php $this->load->view('common/sidebar'); ?>
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar" id="breadcrumbs-list">
                          <div class="row">
                            <div class="col-md-6 col-sm-6 mob-breadcrumb">
                              <?php echo $breadcrumb; ?>
                            </div>
                            <div class="col-md-6 col-sm-6 mob-date text-right">
                              <div class="breadcrumb-date">
                              
                                <div class="page-toolbar">
                                  <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change Outstanding List Date Range" data-daterangevaluestart="" data-daterangevalueend="">
                                      <span class="thin uppercase"></span>&nbsp;
                                      <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                  </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-month-srt">2019</a>
                                <a href="#" class="btn btn-primary btn-month-srt">April</a>
                                <a href="#" class="btn btn-primary btn-month-srt">Today</a>
                              </div>
                            </div>
                          </div>
                        </div>
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <!-- <i class="icon-settings font-dark"></i> -->
                                        <span class="list-title-caption caption-subject bold "><svg  style="width: 16px;margin-right: 10px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="vote-yea" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-vote-yea fa-w-20"><path fill="#2fc751" d="M608 320h-64v64h22.4c5.3 0 9.6 3.6 9.6 8v16c0 4.4-4.3 8-9.6 8H73.6c-5.3 0-9.6-3.6-9.6-8v-16c0-4.4 4.3-8 9.6-8H96v-64H32c-17.7 0-32 14.3-32 32v96c0 17.7 14.3 32 32 32h576c17.7 0 32-14.3 32-32v-96c0-17.7-14.3-32-32-32zm-96 64V64.3c0-17.9-14.5-32.3-32.3-32.3H160.4C142.5 32 128 46.5 128 64.3V384h384zM211.2 202l25.5-25.3c4.2-4.2 11-4.2 15.2.1l41.3 41.6 95.2-94.4c4.2-4.2 11-4.2 15.2.1l25.3 25.5c4.2 4.2 4.2 11-.1 15.2L300.5 292c-4.2 4.2-11 4.2-15.2-.1l-74.1-74.7c-4.3-4.2-4.2-11 0-15.2z" class=""></path></svg><?php  echo $title; ?></span>
                                        <!-- <div  id="btn-box" class="btn-group">
                                            <a id="sample_editable_1_new" href="<?php echo base_url('outstanding-add'); ?>" class="btn green"> Add Outstanding
                                                <i class="fa fa-plus"></i>
                                            </a>
                                       </div> -->
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-quot table-list" id="inv_payment_list">
                                        <thead>
                                            <tr>
                                              <th>Code</th>
                                              <th>Account</th>
                                              <th>Payment By</th>
                                              <th>Date</th>
                                              <th>Mode</th>                        
                                              <th>Received By</th>                        
                                              <th>Chq No.</th>                        
                                              <!-- <th>Amount</th> 
                                              <th>Adjustment</th>  -->
                                              <th>TDS </th> 
                                              <th>Total </th> 
                                              <th>Action</th> 
                                            </tr>
                                        </thead>
                                        
                                    </table>

                                   

                                </div>
                            </div>
                                <!-- -----MAIN CONTENTS END HERE----- -->
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <div class="js-scripts">
                <?php $this->load->view('common/footer_scripts'); ?>
                <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> 
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> 
                <!-- OPTIONAL SCRIPTS -->
                <!-- END OPTIONAL SCRIPTS -->
             <script type="text/javascript">
                      $(document).ready(function(){
                        getDataTableList();
                    });
                    function getDataTableList()
                    {
                        var customDataTableElement = '#inv_payment_list';
                        $(customDataTableElement).DataTable().destroy();
                        var customDataTableCount   = '<?php isset($dataTableData->table_data_count) ? $dataTableData->table_data_count:''; ?>';
                        var customDataTableServer   = '<?php isset($dataTableData->table_server_status) ? $dataTableData->table_server_status:''; ?>';
                        var customDataTableUrl     = baseUrl + 'invoice_payment/invoicePaymentDataTablelist?table_data_count='+customDataTableCount;
                        var customDataTableColumns = [
                            {   'data'  : 'ipt_id' ,
                                'render': function(data, type, row, meta)
                                {
                                    var link = ''+row.ipt_code+'';
                                    
                                    <?php if($detail_access) { ?>
                                        link = '<a href="'+baseUrl+'payment-details-'+row.ipt_encrypted_id+'" title="View Detail">'+row.ipt_code+'</a>&nbsp;';
                                         return link;
                                    <?php }else{ ?>
                                        link = row.ipt_code;
                                    <?php }?>
                                      return link;

                                      
                                }
                            },
                            {   'data'  : 'ipt_id',
                                'render': function(data, type, row, meta)
                                {
                                    // var link = row.qtn_cmp_encrypted_id;
                                    var  link = '<a href="'+baseUrl+'company-details-'+row.cmp_encrypted_id+'" title="View Detail">'+row.cmp_name+'</a>&nbsp;';
                                  return link;
                                }
                            },
                            {   'data'  : 'ipt_ppl_id',
                                'render': function(data, type, row, meta)
                                {
                                    // var link = row.ppl_name;
                                      var link = (row.ppl_name != null) ?'<a href="'+baseUrl+'people-details-'+row.ppl_encrypted_id+'" title="View Detail">'+ row.ppl_name+'</a>&nbsp;':'';
                                  return link;
                                }
                            },
                            {   'data'  : 'ipt_date_format' },
                            {   'data'  : 'ipt_mode_name' },
                             {   'data'  : 'ipt_managed_by',
                                'render': function(data, type, row, meta)
                                {
                                    // var link = row.ppl_name;
                                      var link = (row.ipt_managed_by_name != null) ?'<a href="'+baseUrl+'people-details-'+row.ipt_managed_by_encrypted_id+'" title="View Detail">'+ row.ipt_managed_by_name+'</a>&nbsp;':'';
                                  return link;
                                }
                            },
                           /* {   'data'  : 'ipt_invoice_amt' },
                            {   'data'  : 'ipt_disc_format' },*/
                            
                            {   'data'  : 'ipt_tds_amt',
                               'render':function(data, type, row, meta)
                                {
                                    var link = row.ipt_tds_amt_format;
                                    // link +=(row.ipt_tds_percent != 0 ) ? ' ('+row.ipt_tds_percent+'%)':'';
                                    return link;
                                },
                            },
                            {   'data'  : 'ipt_payment_no' },
                            {   'data'  : 'ipt_total',
                                 'render': function(data, type, row, meta)
                                {
                                    // var link = row.ppl_name;
                                      var link = indiancurrency(parseFloat(row.ipt_total).toFixed(2));
                                  return link;
                                }
                             },
                            {   'data'  : 'ipt_id' ,
                                'render': function(data, type, row, meta)
                                {
                                  var link = '';
                                  
                                  <?php if($detail_access) { ?>
                                     link += '<a href="'+baseUrl+'payment-details-'+row.ipt_encrypted_id+'" title="View Details " class="datatable-links"><i class="fas fa-clipboard-list"></i></a>&nbsp;';
                                  <?php }?>
                                  if(row.private_access == 1)
                                  <?php if($delete_access) { ?>
                                    link += '<a href="javascript:;" title="Delete Quotation" data-toggle="tooltip" onclick=deleteData(this) data-ipt_id="'+row.ipt_id+'" data-ipt_invoice="'+row.ipt_invoice+'" class="datatable-links edit"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;';
                                  <?php } ?>
                                  return link;
                                }
                            }
                        ];
                        customDatatablex({
                          element: customDataTableElement, 
                          url: customDataTableUrl, 
                          columns: customDataTableColumns, 
                          buttons : true, 
                          serverSide : customDataTableServer,
                          delay : 1000,
                          optParam : {
                           <?php 
                              if($export_access)
                                echo 'exportAccess : true,';
                              if($print_access)
                                echo 'printAccess : true,';
                            ?>
                          }
                        });
                        //customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                    }
                     function deleteData(ipt_id)
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
                                          url: baseUrl + 'invoice_payment/updateCustomData',
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
                                                  getDataTableList();
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
                  
        
                </script>
            </div>
        </body>
    </html>
