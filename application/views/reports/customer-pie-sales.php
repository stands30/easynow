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
        <link href="<?php echo base_url(); ?>assets/module/reports/css/report-80-20.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        
         <!-- BEGIN PAGE LEVEL PLUGINS -->

    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <?php $this->load->view('common/header'); ?>
        <div class="clearfix"> </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container" >
            <?php $this->load->view('common/sidebar'); ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper" >
                <!-- BEGIN CONTENT BODY -->
                <div class="">
                <div class="page-content color">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar" id="breadcrumbs-list">
                        <?php echo $breadcrumb; ?>
                    </div>

                    <!-- END PAGE BAR -->
                    <!-- END PAGE HEADER-->                  
                    <div class="portlet">                      
                      <div class="col-md-12 no-side-padding">
                         <div class="col-md-6 no-side-padding"></div>
                         <div class="col-md-3 no-side-padding custom-right-padding">
                                      <div class="form-group">
                                        <!-- <label>nwe</label> -->
                                        <select name="condition" id="conditionn" class="form-control condition custom-select2">
                                          <option>Monthly</option>
                                          <option>Annually</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-3 no-side-padding">
                                      <div class="form-group">
                                        <!-- <label>nwe</label>                                         -->
                                        <select name="sub-condition" id="sub-condition " class="form-control sub-condition custom-select2">
                                          <option>2019</option>
                                          <option>2018</option>
                                          <option>2017</option>
                                          <option>2016</option>
                                          <option>2015</option>
                                        </select>
                                      </div>
                                    </div>
                      </div>
                      <div class="row">
                        
                        
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Top 5 Customer Pie Sales
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body dashboard-body">
                              <div class="row">
                                <div class="custom-chart-pie">
                                  <div id="customer-pie-chart"></div>
                                </div>
                              </div>
                              
                              
                            </div>
                          </div>

                         

                        </div>

                        
                        
                        

                      </div>

                      <div class="row">
                        
                        
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Customer Pie Sales
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body">
                               
                                    <table class="table table-striped table-bordered table-hover table-quot table-list" id="module-list">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ITI</td>
                                                <td>501234</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Tripfeber</td>
                                                <td>801234</td>
                                               
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>

                         

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
           <script src="<?php echo base_url(); ?>assets/project/global/plugins/amcharts/amchartsnew/lib/4/core.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/amcharts/amchartsnew/lib/4/charts.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/amcharts/amchartsnew/lib/4/themes/kelly.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/amcharts/amchartsnew/lib/4/themes/animated.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>


            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script>
              // Themes begin
               am4core.useTheme(am4themes_kelly);
              am4core.useTheme(am4themes_animated);
              // Themes end

              var chart = am4core.create("customer-pie-chart", am4charts.PieChart3D);
              chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

              chart.legend = new am4charts.Legend();

              chart.data = [
                {
                  customer: "Dr Patkar",
                  amount: 80000
                },
                {
                  customer: "ITI",
                  amount: 90000
                },
                {
                  customer: "Tripfeber",
                  amount: 90000
                },
                {
                  customer: "Sanmiti",
                  amount: 50000
                },
                {
                  customer: "Samrat",
                  amount: 80800
                }  

              ];

              chart.innerRadius = 100;

              var series = chart.series.push(new am4charts.PieSeries3D());
              series.dataFields.value = "amount";
              series.dataFields.category = "customer";
              </script>

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
