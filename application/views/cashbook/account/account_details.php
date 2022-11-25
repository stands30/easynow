<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <title>
    <?php echo $title.' | '.TITLE_POSTFIX; ?>
  </title>
  <head>    
    <?php $this->load->view('common/header_styles'); ?> 
      <link href="<?php echo base_url(); ?>assets/module/cashbook/accounts/css/account-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?> 
    <div class="clearfix"> 
    </div>
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
            <div class="breadcrumb-button">
                <a href="<?php echo base_url('account-detail-'.$account_details['prev_encrypt']) ?>" class=" previous" title="">
                    <button id="newlead" class="btn green">
                        <i class="fa fa-arrow-left"></i>
                        <!-- Previous  -->
                    </button>
                </a>
                <a href="<?php echo base_url('account-detail-'.$account_details['next_encrypt']) ?>" class="next">
                    <button id="newlead" class="btn green">
                        <!-- Next --><i class="fa fa-arrow-right"></i>
                    </button>
                </a>
            </div>
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <h3 class="page-title text-center mb-40"> <?php echo $account_details['acc_name'] ?> | <i class="fa fa-inr"></i> <?php echo ($account_details['total_income'] - $account_details['total_expense']) ?>
            <small></small>
          </h3>
           <div class="row mt-20">
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="dashboard-stat2 ">
                <div class="display">
                  <small class="text-center mb-5">Income</small>
                  <div class="special">
                  <span><?php echo $account_details['total_income_trans'] ?> </span>
                  </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="number">
                  <h3 class="font-red-haze">
                    <span data-counter="counterup" data-value="<?php echo $account_details['total_income'] ?>"><?php echo $account_details['total_income'] ?></span>
                  </h3> 
                </div>
                </div>                                               
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="dashboard-stat2 ">
                <div class="display">
                  <small class="text-center mb-5">Income (Draft)</small>
                  <div class="special">
                  <span><?php echo $account_details['total_pending_income_trans'] ?></span>
                  </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="number">
                  <h3 class="font-green-sharp">
                    <span data-counter="counterup" data-value="<?php echo $account_details['total_pending_income'] ?>"><?php echo $account_details['total_pending_income'] ?></span>
                  </h3>
                </div>
                </div>                                               
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="dashboard-stat2 ">
                <div class="display">
                  <small class="text-center mb-5">Expenses</small>
                  <div class="special">
                  <span><?php echo $account_details['total_expense_trans'] ?></span>
                  </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="number">
                  <h3 class="font-red-haze">
                    <span data-counter="counterup" data-value="<?php echo $account_details['total_expense'] ?>"><?php echo $account_details['total_expense'] ?></span>
                  </h3> 
                </div>
                </div>                                               
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="dashboard-stat2 ">
                <div class="display">
                  <small class="text-center mb-5">Expenses (Draft)</small>
                  <div class="special">
                  <span><?php echo $account_details['total_pending_expense_trans'] ?></span>
                  </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="number">
                  <h3 class="font-green-sharp">
                    <span data-counter="counterup" data-value="<?php echo $account_details['total_pending_expense'] ?>"><?php echo $account_details['total_pending_expense'] ?></span>
                  </h3>
                </div>
                </div>                                               
              </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-dark hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Top Category Income</span>
                    </div>                    
                   </div>
                    <div class="portlet-body">
                      <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                        <ul class="feeds">
                          <?php if(isset($category_income) && $category_income != ''){ 
                              foreach($category_income as $key=>$cat_inc){
                            ?> 

                          <li>
                            <div class="col1">
                              <div class="cont">
                                <div class="cont-col1">
                                  <div class="label label-sm label-success">
                                    <i class="fa fa-shopping-cart"></i>
                                  </div>
                                </div>
                                <div class="cont-col2">
                                  <div class="desc"> 
                                    <?php echo $cat_inc['category_name'] ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col2">
                               <div class="date"> <?php echo $cat_inc['total_amount'] ?></div>
                            </div>
                          </li>
                          <?php }} ?>
                        </ul>
                          </div>
                          <div class="scroller-footer">
                              <div class="btn-arrow-link pull-right">
                                 
                                  <a class="btn btn-sm blue btn-outline btn-circle" href="<?php echo base_url('cashbook'); ?>"> See All Records
                                    <i class="icon-arrow-right"></i>
                                  </a>
                              </div>
                          </div>
                    </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-dark hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Top Category Expense</span>
                    </div>                    
                   </div>
                    <div class="portlet-body">
                      <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                        <ul class="feeds">
                           <?php if(isset($category_expense) && $category_expense != ''){ 
                              foreach($category_expense as $key=>$cat_exp){
                            ?> 
                          <li>
                            <div class="col1">
                              <div class="cont">
                                <div class="cont-col1">
                                  <div class="label label-sm label-success">
                                    <i class="fa fa-shopping-cart"></i>
                                  </div>
                                </div>
                                <div class="cont-col2">
                                  <div class="desc"> 
                                   <?php echo $cat_exp['category_name'] ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col2">
                               <div class="date"><?php echo $cat_exp['total_amount'] ?></div>
                            </div>
                          </li>
                          <?php }} ?>
                        </ul>
                        </div>
                        <div class="scroller-footer">
                            <div class="btn-arrow-link pull-right">
                               
                                <a class="btn btn-sm blue btn-outline btn-circle" href="<?php echo base_url('cashbook'); ?>"> See All Records
                                  <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption ">
                      <span class="caption-subject font-dark bold uppercase">Top CATEGORY Income</span>
                    </div>
                  </div>
                <div class="portlet-body">
                  <div id="chartdiv"></div>
                </div>
                </div>
              </div>

               <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption ">
                      <span class="caption-subject font-dark bold uppercase">Top CATEGORY Expenses</span>
                    </div>
                  </div>
                <div class="portlet-body">
                  <div id="chartdivexpnses"></div>
                </div>
                </div>
              </div>

            </div>

             <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-dark hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Top User Income</span>
                    </div>                    
                   </div>
                    <div class="portlet-body">
                      <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                        <ul class="feeds">
                           <?php if(isset($user_income) && $user_income != ''){ 
                              foreach($user_income as $key=>$usr_inc){
                            ?> 
                          <li>
                            <div class="col1">
                              <div class="cont">
                                <div class="cont-col1">
                                  <div class="label label-sm label-success">
                                    <i class="fa fa-user"></i>
                                  </div>
                                </div>
                                <div class="cont-col2">
                                  <div class="desc"> 
                                    <?php echo $usr_inc['people_name'] ?> 
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col2">
                               <div class="date"> <?php echo $usr_inc['total_amount'] ?> </div>
                            </div>
                          </li>
                          <?php }} ?>
                        </ul>
                        </div>
                        <div class="scroller-footer">
                            <div class="btn-arrow-link pull-right">
                               
                                <a class="btn btn-sm blue btn-outline btn-circle" href="<?php echo base_url('cashbook'); ?>"> See All Records
                                  <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-dark hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Top User Expense</span>
                    </div>                    
                   </div>
                    <div class="portlet-body">
                      <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                        <ul class="feeds">
                          <?php if(isset($user_expense) && $user_expense != ''){ 
                              foreach($user_expense as $key=>$usr_exp){
                            ?> 
                          <li>
                            <div class="col1">
                              <div class="cont">
                                <div class="cont-col1">
                                  <div class="label label-sm label-success">
                                    <i class="fa fa-user"></i>
                                  </div>
                                </div>
                                <div class="cont-col2">
                                  <div class="desc"> 
                                   <?php echo $usr_exp['people_name'] ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col2">
                               <div class="date"> <?php echo $usr_exp['total_amount'] ?> </div>
                            </div>
                          </li>
                        <?php }} ?>
                        </ul>
                      </div>
                      <div class="scroller-footer">
                        <div class="btn-arrow-link pull-right">
                          <a class="btn btn-sm blue btn-outline btn-circle" href="<?php echo base_url('cashbook'); ?>"> See All Records
                            <i class="icon-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            
             <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption ">
                      <span class="caption-subject font-dark bold uppercase">Top User Income</span>
                    </div>
                  </div>
                <div class="portlet-body">
                  <div id="userIncome"></div>
                </div>
                </div>
              </div>

               <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption ">
                      <span class="caption-subject font-dark bold uppercase">Top User Expenses</span>
                    </div>
                  </div>
                <div class="portlet-body">
                  <div id="userExpenses"></div>
                </div>
                </div>
              </div>

            </div>
            <!-- Styles -->

<!-- Resources -->


<!-- Chart code -->


<!-- HTML -->

        
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?> 
         <script src="<?php echo base_url();?>assets/project/global/plugins/amcharts/amcharts/amcharts.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url();?>assets/project/global/plugins/amcharts/amcharts/pie.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       <!-- <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/pie.js"></script> -->
     <script src="<?php echo base_url(); ?>assets/module/cashbook/accounts/js/account-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script>
        var chart = AmCharts.makeChart( "chartdiv", {
          "type": "pie",
          "theme": "light",
          "dataProvider": <?php echo $category_income_json ?>,
          "valueField": "total_amount",
          "titleField": "category_name",
          "outlineAlpha": 0.4,
          "depth3D": 15,
          "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
          "angle": 25,
          "autoMargins": false,
          "marginTop": 0,
          "marginBottom": 0,
          "marginLeft": 0,
          "marginRight": 0,
           "pullOutRadius": 5,
          "export": {
              "enabled": true
          }
        } );
        </script>
        <script>
        var chart = AmCharts.makeChart( "chartdivexpnses", {
         "type": "pie",
          "theme": "light",
          "dataProvider": <?php echo $category_expense_json ?>,
          "valueField": "total_amount",
          "titleField": "category_name",
          "outlineAlpha": 0.4,
          "depth3D": 15,
          "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
          "angle": 25,
          "autoMargins": false,
          "marginTop": 0,
          "marginBottom": 0,
          "marginLeft": 0,
          "marginRight": 0,
           "pullOutRadius": 5,
          "export": {
              "enabled": true
          }
        } );
        </script>
         <script>
        var chart = AmCharts.makeChart( "userIncome", {
          "type": "pie",
          "theme": "light",
          "dataProvider": <?php echo $user_income_json ?>,
          "valueField": "total_amount",
          "titleField": "people_name",
          "outlineAlpha": 0.4,
          "depth3D": 15,
          "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
          "angle": 25,
          "autoMargins": false,
          "marginTop": 0,
          "marginBottom": 0,
          "marginLeft": 0,
          "marginRight": 0,
           "pullOutRadius": 5,
          "export": {
              "enabled": true
          }
        } );
        </script>
         <script>
        var chart = AmCharts.makeChart( "userExpenses", {
           "type": "pie",
          "theme": "light",
          "dataProvider": <?php echo $user_expense_json ?>,
          "valueField": "total_amount",
          "titleField": "people_name",
          "outlineAlpha": 0.4,
          "depth3D": 15,
          "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
          "angle": 25,
          "autoMargins": false,
          "marginTop": 0,
          "marginBottom": 0,
          "marginLeft": 0,
          "marginRight": 0,
           "pullOutRadius": 5,
          "export": {
              "enabled": true
          }
        } );
        </script>
    </div>
  </body>
</html>
