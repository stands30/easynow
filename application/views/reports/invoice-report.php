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
        <!-- Page Level style -->
         <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url(); ?>assets/module/reports/css/invoice-report.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <!-- Page Level style -->
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
                <div class="page-content page-content-detail">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar" id="breadcrumbs-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-5 col-sm-5 mob-breadcrumb">
                              <?php echo $breadcrumb; ?>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-7 mob-date text-right">
                              <div class="breadcrumb-date">
                                <div class="page-toolbar">
                                  <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider date-range-picker-div" data-container="body" data-placement="bottom" data-original-title="Select Date Range For Invoice Report" data-daterangevaluestart="" data-daterangevalueend="">
                                      <span class="thin uppercase"></span>&nbsp;
                                      <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                  </div>
                                </div>
                                <!-- <div class="page-toolbar page-custom-toolbar"> -->
                                  <a href="#" class="btn btn-primary btn-month-srt date-range-picker-div  date-list-picker" data-daterangevaluestart="<?php echo date('Y').'-01-01' ?>" data-daterangevalueend="<?php echo date('Y').'-12-31'; ?>" ><?php echo date('Y') ?></a>
                                  <a href="#" class="btn btn-primary btn-month-srt date-range-picker-div date-list-picker" data-daterangevaluestart="<?php echo date('Y-m').'-01'; ?>" data-daterangevalueend="<?php echo date('Y-m-d'); ?>" ><?php echo date('M') ?></a>
                                  <a href="#" class="btn btn-primary btn-month-srt date-range-picker-div date-list-picker" data-daterangevaluestart="" data-daterangevalueend="" >All Time</a>
                                <!-- </div> -->
                              </div>
                            </div>
                        </div>
                    </div>
                        <div class="portlet light bordered">
                            <!-- <div class="portlet-title portlet-title-checkbox">
                                <div class="caption font-dark custom-block caption-checkbox">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            Machine
                                        </div>
                                        <div class="col-md-6 text-center">
                                            Furnace
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Filter with select2 -->
                           <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="list-title-caption caption-subject bold ">Machine</span>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-list table-hover table-quot" id="machine-list">
                                    <thead>
                                      <tr>
                                        <th> Account</th>
                                        <th>Invoice </th>
                                        <th>Sum without Tax</th>
                                        <th> Sum with Tax</th>
                                        <th>Outstanding </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Nextasy</td>
                                        <td>4</td>
                                        <td>40000</td>
                                        <td>30000</td>
                                        <td>1200</td>
                                      </tr>
                                      <tr>
                                        <td>Harissons</td>
                                        <td>3</td>
                                        <td>40000</td>
                                        <td>30000</td>
                                        <td>1200</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="list-title-caption caption-subject bold ">Furnace</span>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-list table-hover table-quot" id="furnace-list">
                                    <thead>
                                      <tr>
                                        <th> Account</th>
                                        <th>Invoice </th>
                                        <th>Sum without Tax</th>
                                        <th> Sum with Tax</th>
                                        <th>Outstanding </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Nextasy</td>
                                        <td>4</td>
                                        <td>40000</td>
                                        <td>30000</td>
                                        <td>1200</td>
                                      </tr>
                                      <tr>
                                        <td>Harissons</td>
                                        <td>3</td>
                                        <td>40000</td>
                                        <td>30000</td>
                                        <td>1200</td>
                                      </tr>
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
             <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script> 
             <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> 
            <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>  
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>            
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
             <script type="text/javascript">
            $(document).ready(function(){
                $('.invoice_curr').select2({
                    placeholder: "Please Select Title",
                    ajax: {
                      url:  baseUrl + 'people/getGenPrmforDropdown/' + 'ppl_title',
                      dataType: 'json',
                    }
                });

                $('.invoice_account').select2();

                $('.invoice_tax_rate').select2();

                 $('.invoice_oustanding').select2();

                // getList();
                $('#machine-list').dataTable({
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

                $('#furnace-list').dataTable({
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

             $('.date-range-picker-div').click(function(){
           updateDateFilter($(this),function(start_date,end_date){
              // getDataTableList(start_date,end_date);
              //  getOutstandingBalanceData(start_date,end_date);
            });
          });
          $('#daterangepicker-custom-range').on('apply.daterangepicker', function(ev, picker) {
            updateDateFilter($('#daterangepicker-custom-range'),function(start_date,end_date){
              // getDataTableList(start_date,end_date);
              //  getOutstandingBalanceData(start_date,end_date);
            });
          });
          </script>
        </div>
    </body>
</html>