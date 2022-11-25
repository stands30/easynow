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
        
        <style>
          .sales-funnel {
            width: 100%;
            height: 400px;
          }
          @media only screen and (max-width: 599px) {
            .sales-funnel {
              width: 100%;
              height: 500px;
            }
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
                        <div class="col-md-6">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Sales Funnel Quantity
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body dashboard-body">
                              <div class="row">
                                <div class="">
                                  <div id="stage-qty" class="sales-funnel"></div>
                                </div>
                              </div>
                              
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Sales Funnel Volume
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body dashboard-body">
                              <div class="row">
                                <div class="">
                                  <div id="stage-volume" class="sales-funnel"></div>
                                </div>
                              </div>
                              
                              
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Sales Funnel Follow Up
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body dashboard-body">
                              <div class="row">
                                <div class="">
                                  <div id="stage-follow-up" class="sales-funnel"></div>
                                </div>
                              </div>
                              
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Sales Funnel Mismatch
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body dashboard-body">
                              <div class="row">
                                <div class="">
                                  <div id="stage-mismatch" class="sales-funnel"></div>
                                </div>
                              </div>
                              
                              
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Sales Funnel Rejection
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body dashboard-body">
                              <div class="row">
                                <div class="">
                                  <div id="stage-rejection" class="sales-funnel"></div>
                                </div>
                              </div>
                              
                              
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
             <script src="<?php echo base_url(); ?>assets/project/global/plugins/amcharts/amchartsnew/core.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/amcharts/amchartsnew/charts.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/amcharts/amchartsnew/animated.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            
            

            <script>
              // Themes begin
              am4core.useTheme(am4themes_animated);
              // Themes end

              var chart = am4core.create("stage-qty", am4charts.SlicedChart);
              chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

              chart.data = [{
                  "name": "Stage 1",
                  "value": 600
              }, {
                  "name": "Stage 2",
                  "value": 300
              }, {
                  "name": "Stage 3",
                  "value": 200
              }, {
                  "name": "Stage 4",
                  "value": 180
              }, {
                  "name": "Stage 5",
                  "value": 50
              }];

              var series = chart.series.push(new am4charts.FunnelSeries());
              series.colors.step = 2;
              series.dataFields.value = "value";
              series.dataFields.category = "name";
              series.alignLabels = true;
              // series.orientation = "horizontal";
              // series.bottomRatio = 1;

              chart.legend = new am4charts.Legend();
              // chart.legend.position = "left";
              chart.legend.position = "bottom";
              chart.legend.valign = "bottom";
            </script>

            <script>
              // Themes begin
              am4core.useTheme(am4themes_animated);
              // Themes end

              var chart = am4core.create("stage-volume", am4charts.SlicedChart);
              chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

              chart.data = [{
                  "name": "Stage 1",
                  "value": 500
              }, {
                  "name": "Stage 2",
                  "value": 200
              }, {
                  "name": "Stage 3",
                  "value": 180
              }, {
                  "name": "Stage 4",
                  "value": 200
              }, {
                  "name": "Stage 5",
                  "value": 50
              }];

              var series = chart.series.push(new am4charts.FunnelSeries());
              series.colors.step = 2;
              series.dataFields.value = "value";
              series.dataFields.category = "name";
              series.alignLabels = true;
              // series.orientation = "horizontal";
              // series.bottomRatio = 1;

              chart.legend = new am4charts.Legend();
              // chart.legend.position = "left";
              chart.legend.position = "bottom";
              chart.legend.valign = "bottom";
            </script>

            <script>
              // Themes begin
              am4core.useTheme(am4themes_animated);
              // Themes end

              var chart = am4core.create("stage-follow-up", am4charts.SlicedChart);
              chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

              chart.data = [{
                  "name": "Stage 1",
                  "value": 500
              }, {
                  "name": "Stage 2",
                  "value": 200
              }, {
                  "name": "Stage 3",
                  "value": 180
              }, {
                  "name": "Stage 4",
                  "value": 200
              }, {
                  "name": "Stage 5",
                  "value": 50
              }];

              var series = chart.series.push(new am4charts.FunnelSeries());
              series.colors.step = 2;
              series.dataFields.value = "value";
              series.dataFields.category = "name";
              series.alignLabels = true;
              // series.orientation = "horizontal";
              // series.bottomRatio = 1;

              chart.legend = new am4charts.Legend();
              // chart.legend.position = "left";
              chart.legend.position = "bottom";
              chart.legend.valign = "bottom";
            </script>

            <script>
              // Themes begin
              am4core.useTheme(am4themes_animated);
              // Themes end

              var chart = am4core.create("stage-mismatch", am4charts.SlicedChart);
              chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

              chart.data = [{
                  "name": "Stage 1",
                  "value": 200
              }, {
                  "name": "Stage 2",
                  "value": 100
              }, {
                  "name": "Stage 3",
                  "value": 50
              }, {
                  "name": "Stage 4",
                  "value": 25
              }, {
                  "name": "Stage 5",
                  "value": 15
              }];

              var series = chart.series.push(new am4charts.FunnelSeries());
              series.colors.step = 2;
              series.dataFields.value = "value";
              series.dataFields.category = "name";
              series.alignLabels = true;
              // series.orientation = "horizontal";
              // series.bottomRatio = 1;

              chart.legend = new am4charts.Legend();
              // chart.legend.position = "left";
              chart.legend.position = "bottom";
              chart.legend.valign = "bottom";
            </script>

            <script>
              // Themes begin
              am4core.useTheme(am4themes_animated);
              // Themes end

              var chart = am4core.create("stage-rejection", am4charts.SlicedChart);
              chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

              chart.data = [{
                  "name": "Stage 1",
                  "value": 200
              }, {
                  "name": "Stage 2",
                  "value": 100
              }, {
                  "name": "Stage 3",
                  "value": 50
              }, {
                  "name": "Stage 4",
                  "value": 25
              }, {
                  "name": "Stage 5",
                  "value": 15
              }];

              var series = chart.series.push(new am4charts.FunnelSeries());
              series.colors.step = 2;
              series.dataFields.value = "value";
              series.dataFields.category = "name";
              series.alignLabels = true;
              // series.orientation = "horizontal";
              // series.bottomRatio = 1;

              chart.legend = new am4charts.Legend();
              // chart.legend.position = "left";
              chart.legend.position = "bottom";
              chart.legend.valign = "bottom";
            </script>


              

        </div>

    </body>

    </html>
