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
                        <div class="page-bar my-day-page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->                      
                        <div class="portlet">                          
                            <div class="row">
                              <div class="container-fluid">
                                <!-- My Task start here -->
                               <div class="row">
                                <div class="custom-date mb-20">
                                  <div class="contianer-date">
                                    <?php 
                                    $prev_date = date('Y-m-d',strtotime($myday_date." - 1 day"));
                                    $next_date = date('Y-m-d',strtotime($myday_date." + 1 day"));
                                     ?>
                                    <!-- Previous  -->
                                    <a href="<?php echo base_url('my-day-'.$prev_date); ?>" class="next-prev prev" title="Previous">
                                      <i class="fa fa-arrow-left"></i>                                    
                                    </a>
                                    <span class="today-date"><?php echo $myday_date; ?></span>
                                    <!-- Next -->
                                    <a href="<?php echo base_url('my-day-'.$next_date); ?>" class="next-prev next" title="Next">
                                      <i class="fa fa-arrow-right"></i>
                                    </a>
                                  </div>
                                </div>
                               </div>

                                <div class="row">
                                  <div class="col-md-12">                                    
                                    <!-- follow up -->
                                    <div class="col-md-6">
                                      <div class="boxes-main website-main">
                                        <h4 class="dashboard-title website-main-title">Follow Up</h4> 
                                        <hr class="hr-row">
                                        <div class="row website-div">
                                          <div class="col-md-6 col-sm-6 col-xs-12 stack-website-first">
                                            <div class="stack-website">
                                              <a href="#"><p class="website-text">Due</p></a>
                                              <a href="#"><h1 class="website-progress-count"><?php if(isset($follow_up_due->flp_count)) echo $follow_up_due->flp_count; ?></h1></a>
                                              <i class="fas fa-calendar-alt span-follow-up follow-up-pending"></i>
                                              
                                            </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="stack-website">
                                              <a href="#"><p class="website-text">Completed</p></a>
                                              <a href="#"><h1 class="website-progress-count"><?php if(isset($follow_up_completed->flp_count)) echo $follow_up_completed->flp_count; ?></h1></a>
                                              <i class="fas fa-calendar-check span-follow-up follow-up-check"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>  
                                    <!-- follow up -->
                                    <!-- Task -->
                                    <div class="col-md-6">
                                      <div class="boxes-main website-main">
                                        <h4 class="dashboard-title website-main-title">Task</h4> 
                                        <hr class="hr-row">
                                        <div class="row website-div">
                                          <div class="col-md-6 col-sm-6 col-xs-12 stack-website-first">
                                            <div class="stack-website">
                                              <a href="#"><p class="website-text">Pending</p></a>
                                              <a href="#"><h1 class="website-progress-count"><?php if(isset($task_pending->task_count)) echo $task_pending->task_count; ?></h1></a>
                                              <!-- <i class="fas fa-calendar-alt span-follow-up follow-up-pending"></i> -->
                                              <i class="fas fa-list-ul span-follow-up task-pending"></i>
                                            </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="stack-website">
                                              <a href="#"><p class="website-text">Completed</p></a>
                                              <a href="#"><h1 class="website-progress-count"><?php if(isset($task_completed->task_count)) echo $task_completed->task_count; ?></h1></a>
                                              <!-- <i class="fas fa-calendar-check span-follow-up follow-up-check"></i> -->
                                              <i class="fas fa-tasks span-follow-up task-completed"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- task -->
                                  </div>

                                  <div class="col-md-12">
                                    

                                    <div class="col-sm-6 col-md-3">
                                      <div class="card mb-20">
                                        <div class="card-body">
                                          <div class="d-flex align-items-center">
                                            <div class="icon-span">
                                              <i class="fa fa-user"></i>
                                            </div>
                                            <div class="ml-3">
                                              <div class="tilte-my-list">New People</div>
                                              <div class="title-card-number"><?php if(isset($new_people->ppl_count)) echo $new_people->ppl_count; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3 ">
                                      <div class="card mb-20">
                                        <div class="card-body">
                                          <div class="d-flex align-items-center">
                                            <div class="icon-span">
                                              <i class="fas fa-chalkboard-teacher icon-lead"></i>
                                            </div>
                                            <div class="ml-3">
                                              <div class="tilte-my-list">New Leads</div>
                                              <div class="title-card-number"><?php if(isset($new_lead->led_count)) echo $new_lead->led_count; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                      <div class="card mb-20">
                                        <div class="card-body">
                                          <div class="d-flex align-items-center">
                                            <div class="icon-span">
                                              <i class="far fa-life-ring icon-support"></i>
                                            </div>
                                            <div class="ml-3">
                                              <div class="tilte-my-list">Support</div>
                                              <div class="title-card-number"><?php if(isset($task_pending->task_count)) echo $task_pending->task_count; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3 ">
                                      <div class="card mb-20">
                                        <div class="card-body">
                                          <div class="d-flex align-items-center">
                                            <div class="icon-span">
                                              <i class="fas fa-search icon-review"></i>
                                              <!-- <i class="fas fa-file-invoice-dollar icon-review"></i> -->
                                            </div>
                                            <div class="ml-3">
                                              <div class="tilte-my-list">Review</div>
                                              <div class="title-card-number"><?php if(isset($task_completed->task_count)) echo $task_completed->task_count; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-md-12">

                                    <div class="col-sm-6 col-md-3">
                                      <div class="card mb-20">
                                        <div class="card-body">
                                          <div class="d-flex align-items-center">
                                            <div class="icon-span">
                                              <i class="fa fa-industry icon-company"></i>
                                            </div>
                                            <div class="ml-3">
                                              <div class="tilte-my-list">New Accounts</div>
                                              <div class="title-card-number"><?php if(isset($new_account->cmp_count)) echo $new_account->cmp_count; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- <div class="col-sm-6 col-md-3 ">
                                      <div class="card mb-20">
                                        <div class="card-body">
                                          <div class="d-flex align-items-center">
                                            <div class="icon-span">
                                              <i class="fas fa-file-invoice-dollar icon-review"></i>
                                            </div>
                                            <div class="ml-3">
                                              <div class="tilte-my-list">New Quotations</div>
                                              <div class="title-card-number">30</div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div> -->

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
