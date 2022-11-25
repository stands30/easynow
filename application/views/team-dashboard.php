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
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
                     
            <link href="<?php echo base_url(); ?>assets/project/css/style.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/module/dashboard/css/team-dashboard.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />   
            <style type="text/css">
                
            </style>
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
                        <div class="page-bar page-breadcrumb" id="breadcrumbs-list">
                            <div class="row">
                              <div class="col-md-6 col-sm-6 mob-breadcrumb">
                                <?php echo $breadcrumb; ?>
                              </div>
                              <div class="col-md-6 col-sm-6 mob-date text-right">
                                <div class="breadcrumb-date">
                                
                                  <div class="page-toolbar">
                                    <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                        <span class="thin uppercase"></span>&nbsp;
                                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                    </div>
                                  </div>
                                  <a href="#" class="btn btn-primary btn-month-srt">2019</a>
                                  <a href="#" class="btn btn-primary btn-month-srt">April</a>
                                  <a href="#" class="btn btn-primary btn-month-srt" onclick="getToday()">Today</a>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->
                        <div class="portlet">
                            <div class="row">
                                <!-- END PAGE HEADER-->
                                <div class="container-fluid">
                                    <div class="row widget-row mb-20">
                                        <div class="col-md-12">
                                            <div class="row-sticky">
                                                <div class="first-row" id="myHeader">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-3 col-xs-12 text-center">
                                                            <img src="<?php echo base_url() ?>assets/project/images/dashboard-images/main/ankush.jpg" class="img-responsive img-circle img-team-profile img-team-slide">
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-xs-12">
                                                            <h2 class="emp-name">Ankush Gautam</h2>
                                                            <p class="emp-desg">Senior Software Developer - EMP001</p>
                                                            <p class="emp-contact-details"><a href="#">ankush.nextasy@gmail.com</a> | <a href="#">+91 9876543210</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="second-row">
                                                <div class="row">
                                                    <div class="col-md-2 col-xs-12"></div>
                                                    <div class="col-md-10 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="sub-list-container align-items-center">
                                                                    <span class="icon-start">
                                                                        <img src="<?php echo base_url() ?>assets/project/svg/department.svg" style="width: 35px">
                                                                    </span>
                                                                    <div class="media-body">
                                                                        <p>Department</p>
                                                                        <h4>IT</h4>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <!-- <div class="col-md-4">
                                                                EMP0001
                                                            </div> -->
                                                            <div class="col-md-4">
                                                                <div class="sub-list-container align-items-center">
                                                                    <span class="icon-start">
                                                                        <img src="<?php echo base_url() ?>assets/project/svg/file-pie-chart.svg" style="width: 30px">
                                                                    </span>
                                                                    <div class="media-body">
                                                                        <p>Reporting To</p>
                                                                        <h4>Stanley</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                 <div class="sub-list-container sub-list-container-last align-items-center">
                                                                    <span class="icon-start">
                                                                        <img src="<?php echo base_url() ?>assets/project/svg/user-outline.svg" style="width: 35px">
                                                                    </span>
                                                                    <div class="media-body">
                                                                        <p>Team</p>
                                                                        <h4>5</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row widget-row mb-20">
                                        <div class="col-md-12">
                                            <div class="team-container-wrapper">
                                                <div class="row">
                                                    <div class="col-md-9 col-xs-6">
                                                        <h1 class="team-title">Sales</h1>
                                                    </div>
                                                    <div class="col-md-3 col-xs-6 text-right">
                                                        <h4 class="team-head-date">23 Apr, 2019</h4>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="team-wrapper-list">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile blue">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-chalkboard-teacher"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Total Leads</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile yellow">
                                                                <div class="wrapper-circle-icon">              
                                                                    <i class="fas fa-list"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Closed Leads</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile red">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="far fa-window-close"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Rejected Leads </h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile purple">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-envelope-open-text"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Drafted Quotations </h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile orange">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-mail-bulk"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Submitted Quotations </h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile green">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="far fa-thumbs-up"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Approved Quotation </h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile sky-blue">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="far fa-calendar-check"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Completed Follow Up</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile gray">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-calendar"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Pending Follow Up</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile green">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="far fa-handshake"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Meetings</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row widget-row">
                                        <div class="col-md-12">
                                            <div class="team-container-wrapper">
                                                <div class="row">
                                                    <div class="col-md-9 col-xs-6">
                                                        <h1 class="team-title">Operations</h1>
                                                    </div>
                                                    <div class="col-md-3 col-xs-6 text-right">
                                                        <h4 class="team-head-date">23 Apr, 2019</h4>
                                                    </div>
                                                </div>
                                                <div class="team-wrapper-list">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile sky-blue">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-list"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Closed Tickets</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile red">
                                                                <div class="wrapper-circle-icon">              
                                                                    <i class="fas fa-ticket-alt"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Open Tickets</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile yellow">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-pause-circle"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">On Hold Tickets</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile purple">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-envelope-open-text"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Meetings </h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div> -->
                                                        
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <div class="wrapper-tile green">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="far fa-handshake"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Meetings</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>

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
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
                 <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                 <script src="<?php echo base_url(); ?>assets/project/global/scripts/jquery.matchHeight.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- OPTIONAL SCRIPTS -->
                <script type="text/javascript">
                    window.onscroll = function() {myFunction()};
                    var header = document.getElementById("myHeader");
                    var sticky = header.offsetTop;

                    function myFunction() {
                      if (window.pageYOffset > sticky) {
                        header.classList.add("sticky");
                      } else {
                        header.classList.remove("sticky");
                      }
                    }

                     $(document).ready(function()
                    {
                        $('.wrapper-tile').matchHeight();
                        $('h6.main-title').matchHeight();
                    });
                </script>
                
            </div>
        </body>
    </html>

    <!--  

    

    -->