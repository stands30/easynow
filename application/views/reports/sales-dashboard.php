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
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/css/style.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-main.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/module/dashboard/css/sales-dashboard.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                                        <h2 class="dashboard-sub-title">Sales</h2>
                                    </div>
                                </div>
                                <div class="row widget-row mt-20">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title">Today's Sale</small>
                                                    <div class="special special-people">
                                                        <span><?php if(isset($today_sales->led_count)) echo $today_sales->led_count ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup"><?php if(isset($today_sales->led_amt)) echo $today_sales->led_amt ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title">This Week</small>
                                                    <div class="special special-people">
                                                        <span><?php if(isset($week_sales->led_count)) echo $week_sales->led_count ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup"><?php if(isset($week_sales->led_amt)) echo $week_sales->led_amt ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title">This Month</small>
                                                    <div class="special special-people">
                                                        <span><?php if(isset($month_sales->led_count)) echo $month_sales->led_count ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup"><?php if(isset($month_sales->led_amt)) echo $month_sales->led_amt ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title">This Year</small>
                                                    <div class="special special-people">
                                                        <span><?php if(isset($year_sales->led_count)) echo $year_sales->led_count ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup"><?php if(isset($year_sales->led_amt)) echo $year_sales->led_amt ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                    
                                   
                                    
                                </div>
                                <div class="row widget-row mt-20">
                                    <div class="col-md-12 mt-10">
                                        <h2 class="dashboard-sub-title">Stages</h2>
                                    </div>
                                </div>
                                <div class="row widget-row mt-20">
                                    <?php foreach ($lead_stages as $lead_stages_key ) { ?>
                                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title"><?php echo  $lead_stages_key->lsg_name; ?></small>
                                                    <div class="special special-people">
                                                        <span><?php echo $lead_stages_key->led_count; ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup"><?php echo $lead_stages_key->value; ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                   <?php } ?>
                                </div>

                                <div class="row widget-row mt-20">
                                   <div class="col-md-12">
                                        <div class="portlet light bordered mb-30">
                                            <div class="portlet-title">
                                              <div class="caption font-dark">
                                                <!-- <i class="icon-settings font-dark"></i> -->
                                                <span class="caption-subject  bold">Team Reports
                                                </span> &nbsp;
                                              </div>
                                            </div>
                                            <div class="portlet-body"> 
                                                <table class="table table-striped table-bordered table-hover table-quot table-list" id="module-list">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>Name </th>
                                                            <th>Total People</th>
                                                            <th>Total Lead</th>
                                                            <th>Lead Amount</th>
                                                            <th>Pending Follow up</th>
                                                            <th>Task Pending</th>
                                                            <th>Sales Amt </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php
                                                    $i = 1;
                                                    $sales_dashboard_data = $this->report_model->getSalesDashboard();
                                                    foreach ($sales_dashboard_data as $lead_data) 
                                                    {
?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><a href="#"><?php echo $lead_data->emp_name; ?></a></td>
                                                            <td><?php echo $lead_data->ppl_count; ?></td>
                                                            <td><?php echo $lead_data->led_count; ?></td>
                                                            <td><?php echo $lead_data->led_amount; ?></td>
                                                            <td><?php echo $lead_data->pending_follow_up; ?></td>
                                                            <td><?php echo $lead_data->task_count; ?></td>
                                                            <td><?php echo $lead_data->sales_amt; ?></td>
                                                        </tr>
<?php
                                                    $i++;
                                                    }
?>                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                     

                                    </div>
                                </div>

                                <div class="row widget-row mt-20">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title">No Action Leads</small>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="number">
                                                        <h3 class="font-green-sharp">
                                                            <span><?php echo $lead_sales->no_action; ?></span>               
                                                        </h3>
                                                    </div>
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title">No Quotation Leads</small>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span><?php echo $lead_sales->no_action; ?></span>                                                    
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title">Hot Leads</small>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span><?php echo $lead_sales->hot_lead; ?></span>                                                 
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="#">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">
                                                    <small class="text-center mb-5 people-title">Rejected Leads</small>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span><?php echo $lead_sales->rejected_lead; ?></span>                                                
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                    
                                   
                                    
                                </div>

                                <!-- <div class="row widget-row mt-20">
                                   <div class="col-md-12">
                                        <div class="portlet light bordered mb-30">
                                            <div class="portlet-title">
                                              <div class="caption font-dark">
                                                <span class="caption-subject  bold">Products Reports
                                                </span> &nbsp;
                                              </div>
                                            </div>
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover table-quot table-list" id="product-list">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>Name</th>
                                                            <th>Unit Sold</th>
                                                            <th>Total Sales</th>
                                                            <th>Avg Price</th>
                                                            <th>Repeat Sales</th>
                                                            <th>New Sales</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td><a href="#">Apple Cider Vinegar</a></td>
                                                            <td>100</td>
                                                            <td>10000</td>
                                                            <td>100</td>
                                                            <td>80</td>
                                                            <td>50</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td><a href="#">Water Flosser</a></td>
                                                            <td>50</td>
                                                            <td>100</td>
                                                            <td>5000</td>
                                                            <td>40</td>
                                                            <td>30</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                     

                                    </div>
                                </div> -->
                               
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

            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <!-- END OPTIONAL SCRIPTS -->
            <script type="text/javascript">
                    $(document).ready(function(){
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