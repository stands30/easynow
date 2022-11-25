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
            <!-- daterange picker -->
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
             <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/finance/outstanding/outstanding-custom.css">
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
                                        <span class="list-title-caption caption-subject bold "><i class="fas fa-file-invoice color-dark-green"></i><?php  echo $title; ?></span>
                                        <!-- <div  id="btn-box" class="btn-group">
                                            <a id="sample_editable_1_new" href="<?php echo base_url('outstanding-add'); ?>" class="btn green"> Add Outstanding
                                                <i class="fa fa-plus"></i>
                                            </a>
                                       </div> -->
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-quot table-list" id="oustanding_list">
                                        <thead>
                                            <tr>
                                                <th>Account Name </th>
                                                <th>Bill Amt  </th>
                                                <th>Paid Amt </th>
                                                <th>Closing Amt </th>
                                                <th>Created On </th>
                                                <th>Created By </th>
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
                        var customDataTableElement = '#oustanding_list';
                        $(customDataTableElement).DataTable().destroy();
                          var customDataTableCount   = '<?php isset($dataTableData->table_data_count) ? $dataTableData->table_data_count:'0'; ?>';
                        var customDataTableServer   = '<?php isset($dataTableData->table_server_status) ? $dataTableData->table_server_status:'0'; ?>';
                        var customDataTableUrl     = baseUrl + 'outstanding/getOutstandingList?table_data_count='+customDataTableCount;
                        var customDataTableColumns = [
                            {   'data'  : 'inv_id' ,
                                'render': function(data, type, row, meta)
                                {
                                    var link = ''+row.cmp_name+'';
                                    
                                    <?php if($detail_access) { ?>
                                        link = '<a href="'+baseUrl+'outstanding-details-'+row.cmp_encrypted_id+'" title="View Detail" >'+row.cmp_name+'</a>&nbsp;';
                                         return link;
                                    <?php }else{ ?>
                                        link = row.cmp_name;
                                    <?php }?>
                                      return link;

                                      
                                }
                            },
                            {   'data'  : 'bill_amt',
                                 'render':function(data, type, row, meta)
                                {
                                    var bill_amt = parseFloat(row.bill_amt);
                                    return indiancurrency(bill_amt.toFixed(2));
                                },
                            },
                            {   'data'  : 'paid_amt',
                                'render':function(data, type, row, meta)
                                {
                                    var paid_amt = parseFloat(row.paid_amt);
                                    return indiancurrency(paid_amt.toFixed(2));
                                },
                            },
                           
                            {   'data'  : 'ots_amt' ,
                                'render':function(data, type, row, meta)
                                {
                                    var paid_amt = parseFloat(row.paid_amt);
                                    var ots_amt = parseFloat(row.bill_amt)-parseFloat(paid_amt);
                                    return indiancurrency(ots_amt.toFixed(2));
                                },
                            },
                            {   'data'  : 'due_date' },
                            {   'data'  : 'crdt_by',
                                'render':function(data, type, row, meta)
                                {
                                    var link = '<a href="'+baseUrl+'people-details-'+row.crdt_by_encrypted_id+'">'+row.crdt_by+'</a>';
                                    return link;
                                },
                            },
                            {   'data'  : 'inv_id' ,
                                'render': function(data, type, row, meta)
                                {
                                  var link = '';
                                  if(row.private_access == 0)
                                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                                     <?php 
                                      if($payment_access['add_access']) { ?>
                                        link = '<a href="'+baseUrl+'payment-add-'+row.cmp_encrypted_id+'" title="View Detail" class="datatable-links edit"> <i class="fas fa fa-plus"></i> Payment </a>&nbsp;';
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
                
                  
        
                </script>
            </div>
        </body>
    </html>
