<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title>My Team Dashboard | Easy Now</title>

    <head>
        <?php $this->load->view('common/header_styles'); ?> 
        <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-my-team.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                                <div class="col-md-4">
                                  <div class="team-block">
                                    <div class="team-image-block">
                                      <div class="team-box">
                                        <img class="avatar" src="<?php echo base_url(); ?>assets/project/images/dashboard-images/main/female-avatar.png">
                                      </div>
                                    </div>                                    
                                    <div class="team-body">
                                      <div class="d-flex align-items-center">
                                          <!-- <img class="avatar" src="<?php echo base_url(); ?>assets/module/dashboard/images/avatar3.jpg"> -->
                                          <div class="team-details ml-3">
                                            <div class="team-name text-center">
                                              <a href="<?php echo base_url('team-dashboard') ?>">Pranali Gavkar</a> <br><span>HR</span>
                                            </div>
                                            <ul class="team-list">
                                              <li>
                                                <div class="team-task">
                                                  
                                                <span class="team-task-tiltle">People</span>
                                                <span class="team-count">
                                                  <a href="#">50</a>
                                                </span>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="team-task">
                                                  
                                                <span class="team-task-tiltle">Sales</span>
                                                <span class="team-count">
                                                  <a href="#">50</a>
                                                </span>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="team-task">
                                                  
                                                <span class="team-task-tiltle">Task</span>
                                                <span class="team-count">
                                                  <a href="#">50</a>
                                                </span>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="team-task">
                                                  
                                                <span class="team-task-tiltle">Follow Up</span>
                                                <span class="team-count">
                                                  <a href="#">50</a>
                                                </span>
                                                </div>
                                              </li>
                                            </ul>
                                          </div>
                                      </div>
                                    </div>
                                  </div>                                  
                                </div>
                                
                                <div class="col-md-4">
                                  <div class="team-block">
                                    <div class="team-image-block">
                                      <div class="team-box">
                                        <img class="avatar" src="<?php echo base_url(); ?>assets/project/images/dashboard-images/main/ankush.jpg">
                                      </div>
                                    </div>
                                    <div class="team-body">
                                      <div class="d-flex align-items-center">
                                          <!-- <img class="avatar" src="<?php echo base_url(); ?>assets/module/dashboard/images/avatar3.jpg"> -->
                                          <div class="team-details ml-3">
                                            <div class="team-name text-center">
                                              <a href="<?php echo base_url('team-dashboard') ?>">Ankush Gautam</a> <br><span>Senior Software developer</span>
                                            </div>
                                            <ul class="team-list">
                                              <li>
                                                <div class="team-task">
                                                  
                                                <span class="team-task-tiltle">People</span>
                                                <span class="team-count">
                                                  <a href="#">50</a>
                                                </span>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="team-task">
                                                  
                                                <span class="team-task-tiltle">Sales</span>
                                                <span class="team-count">
                                                  <a href="#">50</a>
                                                </span>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="team-task">
                                                  
                                                <span class="team-task-tiltle">Task</span>
                                                <span class="team-count">
                                                  <a href="#">50</a>
                                                </span>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="team-task">
                                                  
                                                <span class="team-task-tiltle">Follow Up</span>
                                                <span class="team-count">
                                                  <a href="#">50</a>
                                                </span>
                                                </div>
                                              </li>
                                            </ul>
                                          </div>
                                      </div>
                                    </div>
                                  </div>                                  
                                </div>

                                
                              </div>

                              <div class="clearfix"></div>
                                
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
            
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/jquery.matchHeight.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script type="text/javascript">
              $(function() {
                    $('.team-task-tiltle').matchHeight();
                    $('.team-image-block').matchHeight();

                });
            </script>
           
        </div>
    </body>
</html>