<!DOCTYPE html>
  <html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title>Dashboard</title>
    <head>
        <?php $this->load->view('common/header_styles'); ?>
        <link href="<?php echo base_url(); ?>assets/module/reports/css/report-80-20.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
         <style>
          #chartdiv {
            width: 100%;
            height: 100%;
          }

          </style>
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
                      <div class="row">
                        
                        
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Business Generation
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body dashboard-body">
                              <div class="row">
                                <div class="business-genertaion-pie">
                                  <div id="bussiness-generation-chart"></div>
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
                                <span class="caption-subject  bold">Business Generation Comparison
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body">
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
                                    <table class="table table-striped table-bordered table-hover table-quot table-list" id="module-list">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>New</th>
                                                <th>Repeat</th>
                                                <th>Existing</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2017</td>
                                                <td>5</td>
                                                <td>2</td>
                                                <td>50</td>
                                            </tr>
                                            <tr>
                                                <td>2016</td>
                                                <td>50</td>
                                                <td>20</td>
                                                <td>70</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>

                         

                        </div>

                        
                        
                        

                      </div>

                      <div class="row">
                        
                        
                        <div class="col-md-12">
                          <div class="portlet light bordered">
                            
                            <div class="portlet-body">
                                <div id="chartdiv"></div> 
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
            <script src="//www.amcharts.com/lib/3/amcharts.js<?php echo $global_asset_version; ?>"></script>
            <script src="//www.amcharts.com/lib/3/serial.js<?php echo $global_asset_version; ?>"></script>
            <script src="//www.amcharts.com/lib/3/themes/light.js<?php echo $global_asset_version; ?>"></script>
            <script src="//www.amcharts.com/lib/3/amstock.js<?php echo $global_asset_version; ?>"></script>
            <script src="//www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js<?php echo $global_asset_version; ?>"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script>
              // Themes begin
               am4core.useTheme(am4themes_kelly);
              am4core.useTheme(am4themes_animated);
              // Themes end

              var chart = am4core.create("bussiness-generation-chart", am4charts.PieChart3D);
              chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

              chart.legend = new am4charts.Legend();

              chart.data = [
                {
                  bussiness: "New",
                  values: 50
                },
                {
                  bussiness: "Repeat",
                  values: 10
                },
                {
                  bussiness: "Existing",
                  values: 40
                }                
              ];

              chart.innerRadius = 100;

              var series = chart.series.push(new am4charts.PieSeries3D());
              series.dataFields.value = "values";
              series.dataFields.category = "bussiness";
              </script>

               <script type="text/javascript">
                 var chart = AmCharts.makeChart( "chartdiv", {
  "type": "stock",
  "theme": "light",

  "dataDateFormat": "DD-MM-YYYY",

  "dataSets": [ {
    "title": "MSFT",
    "fieldMappings": [ {
      "fromField": "Close",
      "toField": "value"
    }, {
      "fromField": "Volume",
      "toField": "volume"
    } ],
    "dataLoader": {

      /**
       * Originally we assume URL:
       * https://finance.google.co.uk/finance/historical?q=MSFT&startdate=Oct+1,2008&enddate=Oct+9,2008&output=csv
       * However, due to CORS restrictions, we are using the copy of the out
       */
      "url": "https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-160/google_msft.csv",
      "format": "csv",
      "delimiter": ",",
      "useColumnNames": true,
      "skip": 1,
      "numberFields": ["Close", "Volume"],
      "reverse": true,

      /**
       * Google Finance API returns dates formatted like this "24-Apr-17".
       * The chart can't parse month names as well as two-digit years, so we 
       * need to use `postProcess` callback to reformat those dates into a 
       * chart-readable format
       */
      "postProcess": function( data ) {

        // Function that reformats dates
        function reformatDate( input ) {

          // Reformat months
          var mapObj = {
            "Jan": "01",
            "Feb": "02",
            "Mar": "03",
            "Apr": "04",
            "May": "05",
            "Jun": "06",
            "Jul": "07",
            "Aug": "08",
            "Sep": "09",
            "Oct": "10",
            "Nov": "11",
            "Dec": "12"
          };

          var re = new RegExp( Object.keys( mapObj ).join( "|" ), "gi" );
          input = input.replace( re, function( matched ) {
            return mapObj[ matched ];
          } );

          // Reformat years and days into four and two digits respectively
          var p = input.split("-");
          if (p[0].length == 1) {
            p[0] = "0" + p[0];
          }
          if (Number(p[2]) > 50) {
            p[2] = "19" + p[2];
          }
          else {
            p[2] = "20" + p[2];
          }
          return p.join("-");
        }

        // Reformat all dates
        for ( var i = 0; i < data.length; i++ ) {
          data[ i ].Date = reformatDate( data[ i ].Date );
        }
        
        console.log(data);

        return data;
      }
    },
    "categoryField": "Date"
  } ],

  "panels": [ {
      "showCategoryAxis": false,
      "title": "Value",
      "percentHeight": 70,

      "stockGraphs": [ {
        id: "g1",
        valueField: "value",
        comparable: true,
        compareField: "value",
        balloonText: "[[title]]:<b>[[value]]</b>",
        compareGraphBalloonText: "[[title]]:<b>[[value]]</b>"
      } ],

      stockLegend: {
        periodValueTextComparing: "[[percents.value.close]]%",
        periodValueTextRegular: "[[value.close]]"
      }
    },

    {
      "title": "Volume",
      "percentHeight": 30,
      "stockGraphs": [ {
        valueField: "volume",
        type: "column",
        showBalloon: false,
        fillAlphas: 1
      } ],

      stockLegend: {
        periodValueTextRegular: "[[value.close]]"
      }
    }
  ],

  "chartScrollbarSettings": {
    "graph": "g1"
  },

  "chartCursorSettings": {
    "valueBalloonsEnabled": true,
    "fullWidth": true,
    "cursorAlpha": 0.1,
    "valueLineBalloonEnabled": true,
    "valueLineEnabled": true,
    "valueLineAlpha": 0.5
  },

  periodSelector: {
    periods: [ {
      period: "MM",
      selected: true,
      count: 1,
      label: "1 month"
    }, {
      period: "YYYY",
      count: 1,
      label: "1 year"
    }, {
      period: "YTD",
      label: "YTD"
    }, {
      period: "MAX",
      label: "MAX"
    } ]
  }
} );
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
