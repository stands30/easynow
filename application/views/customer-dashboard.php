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
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/css/style.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/module/dashboard/css/customer-dashboard.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />   
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
                                  <a href="#" class="btn btn-primary btn-month-srt">Today</a>
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
                                            <h1 class="dash-main-title">Productivity</h1>
                                        </div>
                                    </div>
                                    <div class="row widget-row mb-10">
                                        <div class="col-md-12">
                                            <div class="detail-container-wrapper">
                                                <div class="row mb-20">
                                                    <div class="col-md-9 col-xs-6">
                                                        <h1 class="dashboard-sub-title">Ticket</h1>
                                                    </div>
                                                    <div class="col-md-3 col-xs-6 text-right">
                                                        <a id="sample_editable_1_new" href="<?php echo base_url('task-add'); ?>" class="btn green btn-add-new"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <a href="#" class="dashboard-item">
                                                                <div class="wrapper-tile sky-blue">
                                                                    <div class="wrapper-circle-icon">
                                                                        <i class="fas fa-list"></i>
                                                                    </div>
                                                                    <div class="wrapper-body">
                                                                        <h6 class="main-title">Closed Tickets</h6>
                                                                        <p class="main-amt">22,50,000</p>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <a href="#" class="dashboard-item">
                                                                <div class="wrapper-tile red">
                                                                    <div class="wrapper-circle-icon">              
                                                                        <i class="fas fa-ticket-alt"></i>
                                                                    </div>
                                                                    <div class="wrapper-body">
                                                                        <h6 class="main-title">Open Tickets</h6>
                                                                        <p class="main-amt">22,50,000</p>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <a href="#" class="dashboard-item">
                                                                <div class="wrapper-tile yellow">
                                                                    <div class="wrapper-circle-icon">
                                                                        <i class="fas fa-pause-circle"></i>
                                                                    </div>
                                                                    <div class="wrapper-body">
                                                                        <h6 class="main-title">On Hold Tickets</h6>
                                                                        <p class="main-amt">22,50,000</p>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-20">
                                                            <a href="#" class="dashboard-item">
                                                                <div class="wrapper-tile green">
                                                                    <div class="wrapper-circle-icon">
                                                                        <i class="fas fa-clipboard-check"></i>
                                                                    </div>
                                                                    <div class="wrapper-body">
                                                                        <h6 class="main-title">All Ticket</h6>
                                                                        <p class="main-amt">22,50,000</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>

                                                <div class="row">
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                            <a href="<?php echo base_url('meeting-list') ?>" class="dashboard-item">
                                                                <div class="wrapper-tile green">
                                                                    <div class="wrapper-circle-icon">
                                                                        <i class="far fa-handshake"></i>
                                                                    </div>
                                                                    <div class="wrapper-body">
                                                                        <h6 class="main-title">Meeting </h6>
                                                                        <p class="main-amt">22,50,000</p>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                            <a href="<?php echo base_url('team-list') ?>" class="dashboard-item">
                                                                <div class="wrapper-tile sky-blue">
                                                                    <div class="wrapper-circle-icon">              
                                                                        <i class="fas fa-users"></i>
                                                                    </div>
                                                                    <div class="wrapper-body">
                                                                        <h6 class="main-title">Team </h6>
                                                                        <p class="main-amt">22,50,000</p>
                                                                    </div>
                                                                   
                                                                </div>
                                                            </a>
                                                        </div>
                                                        

                                                    </div>
                                            </div>
                                        </div>
                                        
                                    </div>


                                    <div class="row widget-row mb-20">
                                        <div class="col-md-12">
                                            <h1 class="dash-main-title">Finance</h1>
                                        </div>
                                    </div>
                                    <div class="row widget-row mb-20">
                                        <div class="col-md-12">
                                            <div class="detail-container-wrapper">
                                                <div class="row mb-20">
                                                    <div class="col-md-12">
                                                        <h1 class="dashboard-sub-title">Quotation</h1>
                                                    </div>
                                                </div>

                                                <div class="row mb-20">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <a href="#" class="dashboard-item">
                                                            <div class="wrapper-tile orange">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-mail-bulk"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Submitted</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <a href="#" class="dashboard-item">
                                                            <div class="wrapper-tile green">
                                                                <div class="wrapper-circle-icon">              
                                                                    <i class="far fa-thumbs-up"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Approved</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <a href="#" class="dashboard-item">
                                                            <div class="wrapper-tile purple">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-envelope-open-text"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">All</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="row mb-20">
                                                    <div class="col-md-12">
                                                        <h1 class="dashboard-sub-title">Invoice</h1>
                                                    </div>
                                                </div>

                                                <div class="row mb-20">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <a href="#" class="dashboard-item">
                                                            <div class="wrapper-tile sky-blue">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-file-invoice"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Due</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <div class="wrapper-tile yellow">
                                                            <div class="wrapper-circle-icon">              
                                                                <i class="fas fa-file-invoice-dollar"></i>
                                                            </div>
                                                            <div class="wrapper-body">
                                                                <h6 class="main-title">Outstanding</h6>
                                                                <p class="main-amt">22,50,000</p>
                                                            </div>
                                                            <div class="wrapper-count">
                                                                <span>5</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <div class="wrapper-tile green">
                                                            <div class="wrapper-circle-icon">
                                                                <i class="fas fa-tasks"></i>
                                                            </div>
                                                            <div class="wrapper-body">
                                                                <h6 class="main-title">Completed</h6>
                                                                <p class="main-amt">22,50,000</p>
                                                            </div>
                                                            <div class="wrapper-count">
                                                                <span>5</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-20">
                                                    <div class="col-md-12">
                                                        <h1 class="dashboard-sub-title">Outstanding</h1>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <a href="#" class="dashboard-item">
                                                            <div class="wrapper-tile red">
                                                                <div class="wrapper-circle-icon">
                                                                    <i class="fas fa-money-check-alt"></i>
                                                                </div>
                                                                <div class="wrapper-body">
                                                                    <h6 class="main-title">Closing Balance</h6>
                                                                    <p class="main-amt">22,50,000</p>
                                                                </div>
                                                                <div class="wrapper-count">
                                                                    <span>5</span>
                                                                </div>
                                                            </div>
                                                        </a>
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