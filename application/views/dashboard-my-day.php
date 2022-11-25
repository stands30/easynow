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
            <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-customs.css" rel="stylesheet" type="text/css" />
             <link href="<?php echo base_url(); ?>assets/module/dashboard/css/myday-customs.css" rel="stylesheet" type="text/css" />
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
                              <div class="container-fluid">
                                <!-- My Task start here -->
                                <div class="row">
                                  <div class="col-md-12">
                                    <!-- task -->
                                    <div class="col-md-6">
                                      <div class="boxes-main task-main">
                                        <h4 class="dashboard-title task-main-title">My Task</h4>  
                                        <hr class="hr-row">
                                        <div class="col-md-4 col-sm-4 side-width">
                                          <div class="task-list task-list-first">
                                              <div class="task-icon task-icon-first">
                                                <i class="far fa-calendar-check"></i>
                                              </div>
                                              <div class="task-start">
                                                <a href="#" class="task-tile">
                                                  Today's Due
                                                </a>
                                              </div>  
                                              <div class="task-count task-count-first">
                                                <a href="#">8<span>/10</span></a>
                                              </div>
                                          </div>                           
                                        </div>
                                        <div class="col-md-4 col-sm-4 side-width">
                                          <div class="task-list task-list-second">
                                              <div class="task-icon task-icon-second">
                                                <i class="far fa-life-ring"></i>
                                              </div>
                                              <div class="task-start">
                                                <a href="#" class="task-tile">
                                                  Support
                                                </a>
                                              </div>  
                                              <div class="task-count task-count-second">
                                                <a href="#">8<span>/10</span></a>
                                              </div>
                                          </div>                           
                                        </div>
                                        <div class="col-md-4 col-sm-4 side-width">
                                          <div class="task-list task-list-third">
                                              <div class="task-icon task-icon-third">
                                                <i class="fas fa-search"></i>
                                              </div>
                                              <div class="task-start">
                                                <a href="#" class="task-tile">
                                                  Review
                                                </a>
                                              </div>  
                                              <div class="task-count task-count-third">
                                                <a href="#">8<span>/10</span></a>
                                              </div>
                                          </div>                           
                                        </div>
                                        <div class="clearfix"></div>
                                      </div>                                    
                                    </div>
                                    <!-- task -->
                                    <!-- follow up -->
                                    <div class="col-md-6">
                                      <div class="boxes-main follow-up-main">
                                        <h4 class="dashboard-title follow-up-main-title">Follow Up</h4>  
                                        <hr class="hr-row">
                                        <div class="row follow-up-div">
                                          <div class="col-md-6 col-xs-6 follow-up-div-left">
                                            <div class="stack-follow-up text-center">
                                              <a href="#"><p class="follow-up-text">Today's Follow Up</p></a>
                                              <a href="#"><h1><span class="follow-up-icon follow-up-icon-first"><i class="fas fa-calendar-alt"></i></span> 5/10</h1></a>
                                            </div>
                                          </div>
                                          <div class="col-md-6 col-xs-6 follow-up-div-right">
                                            <div class="stack-follow-up text-center">
                                              <a href="#"><p class="follow-up-text">Support</p></a>
                                              <a href="#"><h1><span class="follow-up-icon follow-up-icon-second"><i class="far fa-life-ring"></i></span> 5/10</h1></a>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="clearfix"></div>
                                      </div>                                    
                                    </div>
                                    <!-- follow up -->
                                    
                                  </div>
                                  <div class="col-md-12">
                                    <!-- Target -->
                                    <div class="col-md-6">
                                      <div class="boxes-main target-main">
                                        <h4 class="dashboard-title target-main-title">Target</h4> 
                                        <hr class="hr-row">
                                        <div class="row target-div">
                                          <div class="col-md-6 col-sm-6 col-xs-12 follow-up-div-left">
                                            <div class="stack-target text-center">
                                              <a href="#"><p class="target-text">Total Units</p></a>
                                              <a href="#"><h1 class="targetcount">3<span class="target-main-count">/10</span></h1></a>
                                            </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 follow-up-div-left">
                                            <div class="stack-target text-center">
                                              <a href="#"><p class="target-text">Total Volume</p></a>
                                              <a href="#"><h1 class="targetcount">$96<span class="target-main-count">/100</span></h1></a>
                                            </div>
                                          </div>
                                        </div> 
                                      </div>
                                    </div>
                                    <!-- Target -->
                                    <!-- Website -->
                                    <div class="col-md-6">
                                      <div class="boxes-main website-main">
                                        <h4 class="dashboard-title website-main-title">Website</h4> 
                                        <hr class="hr-row">
                                        <div class="row website-div">
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="stack-website">
                                              <a href="#"><h1 class="website-progress-count">63%</h1></a>
                                              <div class="progress-info">
                                                <div class="progress">
                                                  <span style="width: 63%;" class="progress-bar progress-bar-success green-sharp"></span>
                                                </div>
                                              </div>
                                              <a href="#"><p class="website-text">Total Unit</p></a>
                                            </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="stack-website">
                                              <a href="#"><h1 class="website-progress-count">50%</h1></a>
                                              <div class="progress-info">
                                                <div class="progress">
                                                  <span style="width: 50%;" class="progress-bar progress-bar-success progress-bar-second"></span>
                                                </div>
                                              </div>
                                              <a href="#"><p class="website-text">Total Volume</p></a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>                                        
                                    <!-- website -->
                                  </div>
                                </div>
                                <!-- My Task Ends here -->
                                
                        
                            <!-- end website -->

                                                

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

                <script src="<?php echo base_url(); ?>/assets/project/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>

                <script src="<?php echo base_url(); ?>/assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

                <script src="<?php echo base_url(); ?>/assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js" type="text/javascript"></script>

                <!-- END OPTIONAL SCRIPTS -->







            </div>

        </body>

    </html>
