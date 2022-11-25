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
        <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-customs.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/module/task/css/task-dashboard.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />         
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
                          <!-- first row -->
                          <div class="row">
                            <!--first  -->
                              <div class="col-md-3 col-sm-6">
                               <div class="due-boxes-main">
                                 <!--Hedaer -->
                                 <div class="module-box">
                                   <div class="module-text" >
                                     <!-- Main title-->
                                     <div class="module-box-title module-box-title-first">
                                       <a href="#">Today's Due</a>
                                     </div>
                                     <!-- sub tilte -->
                                   </div>
                                   <!--display arrow  -->
                                 </div>
                                 <!-- Header ends-->
                                 <!-- amount start  here-->
                                 <div class="icn">
                                   <!-- <i class="fas fa-calendar-alt"></i> -->
                                   <!-- <i class="far fa-calendar-check"></i> -->
                                   <img src="<?php echo base_url(); ?>assets/project/images/dashboard-icons/calendar.svg" style="width: 30px;">
                                 </div>
                                 <div class="module-amount due-rate">
                                   <a href="#">5<!-- <span class="rate-differ">/10</span> --></a>
                                 </div>
                               </div>
                              </div>
                              <!--first end  -->
                              <!--second  -->
                              <div class="col-md-3 col-sm-6">
                                <div class="mytask-boxes-main">
                                 <!--Hedaer -->
                                  <div class="module-box">
                                   <div class="module-text" >
                                     <!-- Main title-->
                                     <div class="module-box-title module-box-title-first">
                                       <a href="#">My Task </a>
                                     </div>
                                     <!-- sub tilte -->
                                   </div>
                                   <!--display arrow  -->
                                  </div>
                                 <!-- Header ends-->
                                 <!-- amount start  here-->
                                  <div class="icn-mytask">
                                     <!-- <i class="fas fa-calendar-alt"></i> -->
                                     <img src="<?php echo base_url(); ?>assets/project/images/dashboard-icons/clipboard.svg" style="width: 30px;">
                                  </div>

                                  <div class="module-amount mytask-rate">
                                     <a href="#">6<!-- <span class="rate-differ">/10</span> --></a>
                                  </div>
                               </div>

                              </div>
                              <!--second end -->
                              <!--third  -->
                              <div class="col-md-3 col-sm-6">
                                <div class="mysupport-boxes-main">
                                   <!--Hedaer -->
                                  <div class="module-box">
                                    <div class="module-text" >
                                       <!-- Main title-->
                                       <div class="module-box-title module-box-title-first">
                                         <a href="#">My Support</a>
                                       </div>
                                       <!-- sub tilte -->
                                    </div>
                                    <!--display arrow  -->
                                  </div>
                                  <!-- Header ends-->
                                  <!-- amount start  here-->
                                  <div class="icn-mysupport">
                                    <!-- <i class="fas fa-desktop"></i> -->
                                    <!-- <i class="far fa-life-ring"></i> -->
                                    <img src="<?php echo base_url(); ?>assets/project/images/dashboard-icons/headphones.svg" style="width: 30px;">
                                  </div>
                                  <div class="module-amount mytask-rate">
                                    <a href="#">7</a>
                                  </div>
                                 </div>

                              </div>
                             <!--third ends -->
                             <!--fourth  -->
                              <div class="col-md-3 col-sm-6">
                                <div class="myreview-boxes-main">
                                   <!--Hedaer -->
                                   <div class="module-box">
                                     <div class="module-text" >
                                       <!-- Main title-->
                                       <div class="module-box-title module-box-title-first">
                                         <a href="#">My Reviews</a>
                                       </div>
                                       <!-- sub tilte -->
                                     </div>
                                     <!--display arrow  -->
                                   </div>
                                   <!-- Header ends-->
                                   <!-- amount start  here-->
                                   <div class="icn-myreview">
                                     <!-- <i class="far fa-eye"></i> -->
                                     <img src="<?php echo base_url(); ?>assets/project/images/dashboard-icons/review.svg" style="width: 30px;">
                                   </div>
                                   <div class="module-amount mytask-rate">
                                     <a href="#">8<!-- <span class="rate-differ">/10</span> --></a>
                                   </div>
                                </div>
                              </div>
                             <!--fourth ends -->

                           </div>
                           <!-- first row ends-->
                           
                          <div class="row">
                             <div class="col-md-3 col-sm-6">
                              <div class="boxes-main status-main">
                                <div class="status-left">
                                  <div class="status-module">
                                    <a href="<?php echo base_url('task-list'); ?>"><p>All Task</p></a>
                                    <a href="<?php echo base_url('task-list'); ?>"><h2><?php if(isset($dashboardData['total'])) echo $dashboardData['total']; ?></h2></a>
                                  </div>
                                </div>
                                <div class="status-right">
                                  <div class="status-icon status-icon-third">
                                    <!-- <i class="fas fa-list"></i> -->
                                    <i class="fas fa-check"></i>
                                  </div>
                                </div>                                
                                <!-- </div>                                 -->
                              </div>
                            </div>

                            <div class="col-md-3 col-sm-6">                              
                              <div class="boxes-main status-main">                                
                                <div class="status-left">
                                  <div class="status-module">
                                    <a href=""><p>Assigned By Me</p></a>
                                    <a href=""><h2><?php if(isset($dashboardData['mytask'])) echo $dashboardData['mytask']; ?></h2></a>
                                  </div>
                                </div>
                                <div class="status-right">
                                  <div class="status-icon status-icon-first">
                                    <i class="fa fa-user fa-flat-white"></i>
                                  </div>
                                </div>

                                <!-- </div>                                 -->
                              </div>
                            </div>

                             <div class="col-md-3 col-sm-6">
                              <div class="boxes-main status-main">
                                <div class="status-left">
                                  <div class="status-module">
                                    <a href=""><p>My Team</p></a>
                                    <a href=""><h2>30</h2></a>
                                  </div>
                                </div>
                                <div class="status-right">
                                  <div class="status-icon status-icon-second">
                                    <i class="fa fa-users fa-flat-white"></i>
                                  </div>
                                </div>                                
                                <!-- </div>                                 -->
                              </div>
                            </div>

                            
                             <div class="col-md-3 col-sm-6">
                              <div class="boxes-main status-main">
                                <div class="status-left">
                                  <div class="status-module">
                                    <a href=""><p>My Comments</p></a>
                                    <a href=""><h2>5</h2></a>
                                  </div>
                                </div>
                                <div class="status-right">
                                  <div class="status-icon status-icon-fourth">
                                    <!-- <i class="fas fa-search"></i> -->
                                    <i class="fas fa-comments fa-flat-white"></i>
                                  </div>
                                </div>                                
                                <!-- </div>                                 -->
                              </div>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-6 priority-start">
                                <div class="col-md-12 boxes-main priority-main">
                                  <h4 class="dashboard-title priority-title font-dark">Priority</h4>      
                                <hr class="hr-row-priority"> 

                                 <div class="col-md-3 priority-separtor text-center">
                                  <p class="priority-status priority-critical">Critical</p>
                                  <p class="priority-count priority-critical"><img src="<?php echo base_url(); ?>assets/project/images/dashboard-icons/priority/critical.png"><?php if(isset($dashboardData['priority']->critical)) echo $dashboardData['priority']->critical; ?></p>
                                </div>
                                <div class="col-md-3 priority-separtor text-center">
                                  <p class="priority-status priority-high">High</p>                                  
                                    <p class="priority-count priority-high"><img src="<?php echo base_url(); ?>assets/project/images/dashboard-icons/priority/high-importance.png"><?php if(isset($dashboardData['priority']->high)) echo $dashboardData['priority']->high; ?></p>
                                                        
                                                                                                    
                                </div>
                                <div class="col-md-3 priority-separtor text-center">
                                  <p class="priority-status priority-medium">Medium</p>
                                  <p class="priority-count priority-medium"><img src="<?php echo base_url(); ?>assets/project/images/dashboard-icons/priority/medium-priority.png"><?php if(isset($dashboardData['priority']->medium)) echo $dashboardData['priority']->medium; ?></p>
                                </div>
                                <div class="col-md-3 priority-separtor-last text-center">
                                  <p class="priority-status priority-low">Low</p>
                                  <p class="priority-count priority-low"><img src="<?php echo base_url(); ?>assets/project/images/dashboard-icons/priority/low-priority.png"><?php if(isset($dashboardData['priority']->low)) echo $dashboardData['priority']->low; ?></p>
                                </div>
                               
                                </div>                                                              
                              </div>

                              <div class="col-md-6 priority-end">
                                <div class="col-md-12 boxes-main priority-main">
                                  <h4 class="dashboard-title priority-title font-dark">Status</h4>      
                                <hr class="hr-row-priority"> 
                                <div class="col-md-12">
                                  <div id="myfirstchart"></div>
                                </div>
                                                          
                            </div>
                          </div>
                          <!-- Third  row status -->
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



            <!-- OPTIONAL SCRIPTS -->
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/project/global/plugins/raphael/raphael-min.js<?php echo $global_asset_version ?>"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/project/global/plugins/morris/0.5.1/morris.min.js<?php echo $global_asset_version ?>"></script>

            <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
            <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->

            <!-- END OPTIONAL SCRIPTS -->

            <script type="text/javascript">
              new Morris.Donut({
                element: 'myfirstchart',
                resize: true,
                data: [
                  {
                    label: "Open", 
                    value: <?php if(isset($dashboardData['status']->open)) echo $dashboardData['status']->open; ?>,
                    labelColor:"red"
                  },{
                    label: "Closed", 
                    value: <?php if(isset($dashboardData['status']->closed)) echo $dashboardData['status']->closed; ?>,
                    labelColor:"yellow"
                  },{
                    label: "Review", 
                    value: <?php if(isset($dashboardData['status']->reviewed)) echo $dashboardData['status']->reviewed; ?>,
                    labelColor:"blue"
                  },{
                    label: "Released", 
                    value: <?php if(isset($dashboardData['status']->released)) echo $dashboardData['status']->released; ?>,
                    labelColor:"green"
                  }
                ]
              });      
            </script>

        </div>

    </body>

    </html>
