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
                                        <span class="caption-subject bold">Product Sales</span> &nbsp;
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-quot table-list" id="module-list">
                                        <thead>
                                            <tr>
                                                <th> Product </th>
                                                <th> Sales </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Android App</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,22,982</b></a></td>                                                               
                                            </tr>
                                            <tr>
                                                <td>IOS App</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,19,937</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Resturant Order Solution</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>52,987</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>SEO</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>38,423</b></a></td>                                                               
                                            </tr>
                                            <tr>
                                                <td>SEM</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>36,246</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Email Configurtaion</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>31,167</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Logo Design</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>26,946</b></a></td>                                                               
                                            </tr>
                                            <tr>
                                                <td>Webhosting</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>18,934</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Email Templates</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>16,349</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Support</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>16,107</b></a></td>                                                               
                                            </tr>
                                            <tr>
                                                <td>SMS</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>14,346</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Payment Gateway</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>10,346</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Banner Design</td>
                                                <td><a href="<?php echo base_url('product-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>8,326</b></a></td>
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
           <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      </script>
      <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- OPTIONAL SCRIPTS -->
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
            </div>
        </body>
    </html>
