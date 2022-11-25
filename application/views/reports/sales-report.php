<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
    <head>
        <?php $this->load->view('common/header_styles'); ?> 
         <link href="<?php echo base_url(); ?>assets/project/global/plugins/webui-popover/jquery.webui-popover.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-main.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/module/dashboard/css/sales-dashboard.css" rel="stylesheet" type="text/css" />
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
                    <!-- END PAGE BAR -->
                    <!-- END PAGE HEADER-->
                    <div class="portlet">
                        <div class="row">
                            <!-- END PAGE HEADER-->
                            <div class="container-fluid">
                                <div class="row widget-row">
                                    <div class="col-md-12 mt-10">
                                        <h2 class="dashboard-sub-title">Lead</h2>
                                    </div>
                                </div>
                                <div class="row widget-row mt-20">
<?php
                                foreach ($lead_stage as $stage) {
?>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 display-2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title"><?php if(isset($stage->stage_name)) echo $stage->stage_name ?></small>
                                                    <div class="special special-people">
                                                        <span><?php if(isset($stage->cnt)) echo $stage->cnt ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup"><?php if(isset($stage->led_amt)) echo number_format($stage->led_amt) ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>   
                                                <a href="#" class="pop-up-details" href="#">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>  

                                            </div>
                                        </a>
                                    </div>
<?php
                                }
?>
                                </div>

                                <div class="row widget-row">
                                    <div class="col-md-12 mt-10">
                                        <h2 class="dashboard-sub-title">Quotation</h2>
                                    </div>
                                </div>
                                <div class="row widget-row mt-20">
<?php
                                foreach ($quotation_status as $status) {
?>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 display-2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title"><?php if(isset($status->status_name)) echo $status->status_name ?></small>
                                                    <div class="special special-people">
                                                        <span><?php if(isset($status->cnt)) echo $status->cnt ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup"><?php if(isset($status->qtn_amt)) echo number_format($status->qtn_amt) ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <a href="#" class="pop-up-details" href="#">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>                                                 
                                            </div>
                                        </a>
                                    </div>
<?php
                                }
?>
                                </div>

                                <div class="row widget-row">
                                    <div class="col-md-12 mt-10">
                                        <h2 class="dashboard-sub-title">Invoice</h2>
                                    </div>
                                </div>
                                <div class="row widget-row mt-20">
<?php
                                foreach ($invoice_status as $status) {
?>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 display-2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title"><?php if(isset($status->status_name)) echo $status->status_name ?></small>
                                                    <div class="special special-people">
                                                        <span><?php if(isset($status->cnt)) echo $status->cnt ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup"><?php if(isset($status->inv_amt)) echo number_format($status->inv_amt) ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div> 
                                                <a href="#" class="pop-up-details" href="#">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>                                                
                                            </div>
                                        </a>
                                    </div>
<?php
                                }
?>
                                </div>
                                <div class="row widget-row">
                                    <div class="col-md-12 mt-10">
                                        <h2 class="dashboard-sub-title">Follow Up</h2>
                                    </div>
                                </div>
                                <div class="row widget-row mt-20">
<?php
                                foreach ($followup_status as $status) {
?>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 display-2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title"><?php if(isset($status->status_name)) echo $status->status_name ?></small>
                                                    <div class="special special-people">
                                                        <span><?php if(isset($status->cnt)) echo $status->cnt ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup"><?php if(isset($status->cnt)) echo number_format($status->cnt) ?></span>
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div> 
                                                <a href="#" class="pop-up-details" href="#">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>                                                
                                            </div>
                                        </a>
                                    </div>
<?php
                                }
?>
                                </div>
                                
                                <!-- -----MAIN CONTENTS END HERE----- -->
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
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/webui-popover/jquery.webui-popover.min.js<?php echo $cacheversion; ?>"></script>
            <script src="<?php echo base_url(); ?>/assets/project/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>/assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>/assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js" type="text/javascript"></script>   
            <!-- END OPTIONAL SCRIPTS -->
            <script type="text/javascript">
                    $(document).ready(function(){

                        var description_msg = '<p>People includes all the stakeholders in company.</p><p>It gives overall idea about customer, team & connects</p>'
                        $('.pop-up-details').webuiPopover({content:description_msg ,trigger:'hover',placement:'auto'});
                        // getList();
                        $('#module-list').dataTable({
                            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                            "language": {
                                "aria": {
                                    "sortAscending": ": activate to sort column ascending",
                                    "sortDescending": ": activate to sort column descending"
                                },
                                "emptyTable": "No data available in table",
                                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                                "infoEmpty": "No entries found",
                                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                                "lengthMenu": "_MENU_ entries",
                                "search": "Search:",
                                "zeroRecords": "No matching records found"
                            },
                            // Or you can use remote translation file
                            //"language": {
                            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
                            //},
                            
                            buttons: [
                                { extend: 'print', className: 'btn dark btn-outline' },
                                { extend: 'copy', className: 'btn red btn-outline' },
                                // { extend: 'pdf', className: 'btn green btn-outline' },
                                { extend: 'excel', className: 'btn yellow btn-outline ' },
                                // { extend: 'csv', className: 'btn purple btn-outline ' },
                                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                            ],
                            // setup responsive extension: http://datatables.net/extensions/responsive/
                            responsive: false,
                            //"ordering": false, disable column ordering
                            //"paging": false, disable pagination
                            "order": [
                            ],
                            "lengthMenu": [
                                [100,200,-1],
                                [100,200,"All"] // change per page values here
                            ],
                            // set the initial value
                            "pageLength": 100,
                            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/project/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
                            // So when dropdowns used the scrollable div should be removed.
                            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
                        });
                       
                    });
                  
        
            </script>
             <script type="text/javascript">
                    $(document).ready(function(){
                        // getList();
                        $('#product-list').dataTable({
                            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                            "language": {
                                "aria": {
                                    "sortAscending": ": activate to sort column ascending",
                                    "sortDescending": ": activate to sort column descending"
                                },
                                "emptyTable": "No data available in table",
                                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                                "infoEmpty": "No entries found",
                                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                                "lengthMenu": "_MENU_ entries",
                                "search": "Search:",
                                "zeroRecords": "No matching records found"
                            },
                            // Or you can use remote translation file
                            //"language": {
                            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
                            //},
                            
                            buttons: [
                                { extend: 'print', className: 'btn dark btn-outline' },
                                { extend: 'copy', className: 'btn red btn-outline' },
                                // { extend: 'pdf', className: 'btn green btn-outline' },
                                { extend: 'excel', className: 'btn yellow btn-outline ' },
                                // { extend: 'csv', className: 'btn purple btn-outline ' },
                                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                            ],
                            // setup responsive extension: http://datatables.net/extensions/responsive/
                            responsive: false,
                            //"ordering": false, disable column ordering
                            //"paging": false, disable pagination
                            "order": [
                            ],
                            "lengthMenu": [
                                [100,200,-1],
                                [100,200,"All"] // change per page values here
                            ],
                            // set the initial value
                            "pageLength": 100,
                            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/project/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
                            // So when dropdowns used the scrollable div should be removed.
                            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
                        });
                       
                    });
                  
                    
                    

            </script>
                 
        </div>
    </body>
    </html>