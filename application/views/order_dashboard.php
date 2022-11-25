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
                        <?php echo $breadcrumb; ?>
                    </div>
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="list-title-caption caption-subject bold ">Pending Purchase Order List</span>
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-quot table-list" id="pendingPOTable">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-file-invoice-dollar color-dark-blue list-level"></i> Purchase Order No </th>
                                        <th><i class="fas fa-id-card list-level"></i> Reference No</th>
                                        <th><i class="fas fa-calendar-alt list-level"></i> Date  </th>
                                        <th><i class="fas fa-handshake icon-client list-level"></i> Vendor </th>           
                                        <th><i class="fas fa-th-list list-level	"></i> Subject </th>
                                        <th><i class="far fa-money-bill-alt icon-lead list-level"></i> Total</th>
                                        <th><i class="fa fa-user icon-people list-level"></i> Created By</th>
                                        <th><i class="fa fa-info-circle list-level"></i> Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <!-- <i class="icon-settings font-dark"></i> -->
                                    <span class="list-title-caption caption-subject bold ">Dispatch Order List</span>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-quot table-list" id="dispacthDeliveryTable">
                                    <thead>
                                        <tr>
                                            <th><i class="fas fa-truck-loading list-level"></i>  Dispatch Order No  </th>
                                            <th><i class="fas fa-calendar-alt list-level"></i> Dispatch Date</th>
	                                        <th><i class="fas fa-user list-level"></i> Customer </th>           
	                                        <th><i class="fas fa-user list-level"></i> Shipping Name  </th>
	                                        <th><i class="far fa-money-bill-alt icon-lead list-level"></i> Total</th>
	                                        <th><i class="fa fa-user icon-people list-level"></i> Created By</th>
	                                        <th><i class="fa fa-info-circle list-level"></i> Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
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
  
            <!-- OPTIONAL SCRIPTS -->
            <!-- END OPTIONAL SCRIPTS -->
        <script type="text/javascript">
                $(document).ready(function(){
                 pendingPOList();
                 dorList();
                    
                });
                function pendingPOList()
                {
                $('#pendingPOTable').DataTable().destroy();
                var customDataTableElement = '#pendingPOTable';
                var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                var customDataTableUrl     =  baseUrl + 'dashboard/pendingPOList?table_data_count='+customDataTableCount;
                var por_id_i = 0;
                var customDataTableColumns = [
                {
                  'data'  : 'por_id' ,
                  'render': function(data, type, row, meta)
                  {
                    var link = '';
                    link += '<a href="'+baseUrl+'purchase-order-details-'+row.por_id_encrypt+'" title="Purchase Order Detail">'+row.por_code+'</a>&nbsp';
                    return link;
                  }
                },
                {
                  'data'   : 'por_reference'}
                ,
                {
                  'data'  : 'order_date' }
                ,
                 {
                  'data'  : 'por_vdr_id' ,
                  'render': function(data, type, row, meta)
                  {
                    var link = '';
                    link += '<a href="'+baseUrl+'company-details-'+row.por_vdr_id_encrypt+'" title="Company Detail">'+row.cmp_value+'</a>&nbsp';
                    return link;
                  }
                },
                {
                  'data'  : 'por_subject' }
                ,
                {
                  'data'  : 'por_total' }
                ,
                {
                  'data'  : 'created_by' }
                ,
                {
                  'data'  : 'order_status' }
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
              }

              function dorList()
                {
                $('#dispacthDeliveryTable').DataTable().destroy();
                var customDataTableElement = '#dispacthDeliveryTable';
                var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                var customDataTableUrl     =  baseUrl + 'dashboard/dorList?table_data_count='+customDataTableCount;
                var por_id_i = 0;
                var customDataTableColumns = [
                {
                  'data'  : 'dor_id' ,
                  'render': function(data, type, row, meta)
                  {
                    var link = '';
                    link += '<a href="'+baseUrl+'dispatch-order-details-'+row.dor_id_encrypt+'" title="Dispatch Order Detail">'+row.dor_code+'</a>&nbsp';
                    return link;
                  }
                },
                {
                  'data'   : 'order_date'}
                ,
               {
                  'data'  : 'dor_cmp_id' ,
                  'render': function(data, type, row, meta)
                  {
                    var link = '';
                    link += '<a href="'+baseUrl+'company-details-'+row.dor_cmp_id_encrypt+'" title="Company Detail">'+row.cmp_value+'</a>&nbsp';
                    return link;
                  }
                },
                {
                  'data'  : 'dor_transport_name' }
                ,
                {
                  'data'  : 'dor_total' }
                ,
                {
                  'data'  : 'created_by' }
                ,
                {
                  'data'  : 'order_status' }
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
              }

              
    
            </script>
        </div>
    </body>
</html>
