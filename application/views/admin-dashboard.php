<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <title>Admin Dashboard | Easy Now</title>

    <head>
        <?php $this->load->view('common/header_styles'); ?> 
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />  
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />   
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/owlcarousel/css/owl.carousel.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />        
        <link href="<?php echo base_url(); ?>assets/project/css/style.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />        
        <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-admin.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
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
                    <div class="portlet">
                        <div class="row">
                            <!-- END PAGE HEADER-->
                            <div class="container-fluid">
                                <div class="row widget-row">
                                    <div class="col-md-4">
                                        <a href="<?php echo base_url('my-day'); ?>">
                                            <div class="bg-img dash-item">
                                                <img src="<?php echo base_url();?>assets/project/images/dashboard-images/main/my-day_1.jpg" class="img-responsive item-dash-img" style="width: 100%">
                                                <div class="img-text">
                                                    <h2 class="bg-title">My Day</h2>
                                                    <h4>The best preparation for tomorrow is doing your best today</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="<?php echo base_url('sales-dashboard') ?>">
                                            <div class="bg-img dash-item">
                                                <img src="<?php echo base_url();?>assets/project/images/dashboard-images/main/sales-overview_1.jpg" class="img-responsive item-dash-img" style="width: 100%">
                                                <div class="img-text">
                                                    <h2 class="bg-title">Sales Overview</h2>
                                                    <h4>Planning</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="<?php echo base_url('my-team-dashboard') ?>">
                                            <div class="bg-img dash-item">
                                                <img src="<?php echo base_url();?>assets/project/images/dashboard-images/main/my-work_1.jpg" class="img-responsive item-dash-img" style="width: 100%">
                                                <div class="img-text">
                                                    <h2 class="bg-title">My Team</h2>
                                                    <h4>Planning</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row widget-row">
                                    <div class="col-md-7">
                                      <div class="portlet light bordered mb-30">
                                        <div class="portlet-title">
                                          <div class="caption font-dark">
                                            <!-- <i class="icon-settings font-dark"></i> -->
                                            <span class="caption-subject uppercase bold">Sales Funnel</span> &nbsp;
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

                                    <div class="col-md-5">
                                      <!-- BEGIN PORTLET-->
                                      <div class="portlet light bordered mb-30">
                                          <div class="portlet-title">
                                              <div class="caption">
                                                  <i class="icon-bubble font-hide hide"></i>
                                                  <span class="caption-subject font-hide bold uppercase">Notice Board</span>
                                              </div>
                                          </div>
                                          <div class="portlet-body" id="chats">
                                              <div class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible1="1">
                                                  <ul class="chats">
                                                      <li class="out">
                                                          <img class="avatar" alt="" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>avatar2.jpg" />
                                                          <div class="message">
                                                              <span class="arrow"> </span>
                                                              <a href="javascript:;" class="name"> Lisa Wong </a>
                                                              <span class="datetime custom-datetime"> <i class="far fa-clock"></i> Today </span>
                                                              <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                              <span class="datetime trash-view pt-10 mt-10"><a href="#" class="trash-container"><i class="fas fa-trash"></i></a></span>
                                                          </div>
                                                          
                                                      </li>
                                                      <li class="in">
                                                          <img class="avatar" alt="" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>avatar2.jpg" />
                                                          <div class="message">
                                                              <span class="arrow"> </span>
                                                              <a href="javascript:;" class="name"> Lisa Wong </a>
                                                              <span class="datetime custom-datetime"> <i class="far fa-clock"></i> Today </span>
                                                              <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                              <span class="body">
                                                                <a href="http://nextasy.in" target="_blank">http://nextasy.in</a>
                                                              </span>
                                                              <span class="datetime trash-view pt-10 mt-10"><a href="#" class="trash-container"><i class="fas fa-trash"></i></a></span>
                                                          </div>
                                                          
                                                      </li>
                                                      <li class="out">
                                                          <img class="avatar" alt="" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>avatar1.jpg" />
                                                          <div class="message">
                                                              <span class="arrow"> </span>
                                                              <a href="javascript:;" class="name"> Bob Nilson </a>
                                                              <span class="datetime custom-datetime"> <i class="far fa-clock"></i> Today </span>
                                                              <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                              <span class="body">
                                                                <div class="notice-img-container">
                                                                  <a href="#">
                                                                    <img src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery2.jpg"   class="img-responsive notice-img">
                                                                  </a>
                                                                </div>
                                                              </span>
                                                              <span class="datetime trash-view pt-10 mt-10"><a href="#" class="trash-container"><i class="fas fa-trash"></i></a></span>

                                                          </div>
                                                          
                                                      </li>
                                                      <li class="in">
                                                          <img class="avatar" alt="" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>avatar1.jpg" />
                                                          <div class="message">
                                                              <span class="arrow"> </span>
                                                              <a href="javascript:;" class="name"> Bob Nilson </a>
                                                              <span class="datetime custom-datetime"> <i class="far fa-clock"></i> Today </span>
                                                              <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                              <span class="body">
                                                                <div class="video-container">
                                                                  <iframe src="https://www.youtube.com/embed/BnZCqtKw0MQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                                                </div>
                                                              </span>
                                                              <span class="datetime trash-view pt-10 mt-10"><a href="#" class="trash-container"><i class="fas fa-trash"></i></a></span>
                                                          </div>
                                                          
                                                      </li>
                                                      <li class="out">
                                                          <img class="avatar" alt="" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>avatar3.jpg" />
                                                          <div class="message">
                                                              <span class="arrow"> </span>
                                                              <a href="javascript:;" class="name"> Richard Doe </a>
                                                              <span class="datetime custom-datetime"> <i class="far fa-clock"></i> Today </span>
                                                              <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                              <span class="datetime trash-view pt-10 mt-10"><a href="#" class="trash-container"><i class="fas fa-trash"></i></a></span>
                                                          </div>
                                                          
                                                      </li>
                                                      <li class="in">
                                                          <img class="avatar" alt="" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>avatar3.jpg" />
                                                          <div class="message">
                                                              <span class="arrow"> </span>
                                                              <a href="javascript:;" class="name"> Richard Doe </a>
                                                              <span class="datetime custom-datetime"> <i class="far fa-clock"></i> Today </span>
                                                              <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                              <span class="datetime trash-view pt-10 mt-10"><a href="#" class="trash-container"><i class="fas fa-trash"></i></a></span>
                                                          </div>
                                                          
                                                      </li>
                                                      <li class="out">
                                                          <img class="avatar" alt="" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>avatar1.jpg" />
                                                          <div class="message">
                                                              <span class="arrow"> </span>
                                                              <a href="javascript:;" class="name"> Bob Nilson </a>
                                                              <span class="datetime custom-datetime"> <i class="far fa-clock"></i> Today </span>
                                                              <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                              <span class="datetime trash-view pt-10 mt-10"><a href="#" class="trash-container"><i class="fas fa-trash"></i></a></span>
                                                          </div>
                                                          
                                                      </li>
                                                      <li class="in">
                                                          <img class="avatar" alt="" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>avatar3.jpg" />
                                                          <div class="message">
                                                              <span class="arrow"> </span>
                                                              <a href="javascript:;" class="name"> Richard Doe </a>
                                                              <span class="datetime custom-datetime"> <i class="far fa-clock"></i> Yesterday </span>
                                                              <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                              <span class="datetime trash-view pt-10 mt-10"><a href="#" class="trash-container"><i class="fas fa-trash"></i></a></span>
                                                          </div>
                                                          
                                                      </li>
                                                      <li class="out">
                                                          <img class="avatar" alt="" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>avatar1.jpg" />
                                                          <div class="message">
                                                              <span class="arrow"> </span>
                                                              <a href="javascript:;" class="name"> Bob Nilson </a>
                                                              <span class="datetime custom-datetime"><i class="far fa-clock"></i> Yesterday </span>
                                                              <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet. </span>
                                                              <span class="datetime trash-view pt-10 mt-10"><a href="#" class="trash-container"><i class="fas fa-trash"></i></a></span>
                                                          </div>
                                                          
                                                      </li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- END PORTLET-->
                                  </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row widget-row">
                                  <div class="col-md-4">
                                      <!-- BEGIN PORTLET-->
                                      <div class="portlet light bordered mb-30">
                                          <div class="portlet-title portlet-sub">
                                              <div class="caption">
                                                  <i class="icon-bubble font-hide hide"></i>
                                                  <span class="caption-subject font-hide bold uppercase">Pending Follow-Up</span>
                                              </div>
                                          </div>
                                          <div class="portlet-body portlet-followup" id="chats">
                                              <div class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible1="1">
                                                <ul class="follow-up-list">
<?php
                                                if (count($lead_pending_followup) > 0) {
                                                 foreach ($lead_pending_followup as $pending_followup) 
                                                {
?>
                                                  <li>
                                                    <span class="manage-block">
                                                       <a href="#" class="follow-lead"><?php echo $pending_followup->lfp_name; ?></a>
                                                        <span class="follow-date"><?php echo $pending_followup->lfp_next_date_format; ?></span>
                                                    <span class="manage-block">
                                                      <a href="#" class="follow-lead follow-manageby"><?php echo $pending_followup->lfp_crdt_by; ?></a>
                                                    <span class="follow-date follow-up-manage-by"><?php echo $pending_followup->followup_module_type; ?></span>
                                                    </span>
                                                    <span class="lead-body">
                                                      <?php echo $pending_followup->lfp_remark; ?>
                                                    </span>
                                                    <div class="clearfix"></div>
                                                    <span class="datetime follow-up-button">
                                                        <a onclick="updateFollowupStatus('<?php echo $pending_followup->lfp_id; ?>', 'done')" class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a onclick="updateFollowupStatus('<?php echo $pending_followup->lfp_id; ?>', 'reschedule');" class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                        <a onclick="leadfollowup_getdetail('<?php echo $pending_followup->lfp_id; ?>');" class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                  </li>
<?php
                                                 }
                                              } else {
?>                                                
                                                <li>
                                                    <span class="manage-block">
                                                      <span class="no-follow-up">No Pending Follow Up</span>
                                                    </span>
                                                  </li> 
<?php
                                              }
?>  

                                                </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- END PORTLET-->
                                  </div>

                                  <div class="col-md-4">
                                      <!-- BEGIN PORTLET-->
                                      <div class="portlet light bordered mb-30">
                                          <div class="portlet-title portlet-sub">
                                              <div class="caption">
                                                  <i class="icon-bubble font-hide hide"></i>
                                                  <span class="caption-subject font-hide bold uppercase">Today's Follow-Up</span>
                                              </div>
                                          </div>
                                          <div class="portlet-body portlet-followup" id="chats">
                                              <div class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible1="1">
                                                <ul class="follow-up-list">
<?php
                                                if (count($lead_today_followup) > 0) {
                                                 foreach ($lead_today_followup as $today_followup) 
                                                {
?>
                                                  <li>
                                                    <span class="manage-block">
                                                       <a href="#" class="follow-lead"><?php echo $today_followup->lfp_name; ?></a>
                                                        <span class="follow-date"><?php echo $today_followup->lfp_next_date_format; ?></span>
                                                    </span>
                                                        
                                                    <span class="manage-block">
                                                      <a href="#" class="follow-lead follow-manageby"><?php echo $today_followup->lfp_crdt_by; ?></a>
                                                    <span class="follow-date follow-up-manage-by"><?php echo $today_followup->followup_module_type; ?></span>
                                                    </span>
                                                    <span class="lead-body">
                                                      <?php echo $today_followup->lfp_remark; ?>
                                                    </span>
                                                    <div class="clearfix"></div>
                                                    <span class="datetime follow-up-button">
                                                        <a onclick="updateFollowupStatus('<?php echo $today_followup->lfp_id; ?>', 'done')" class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a onclick="updateFollowupStatus('<?php echo $today_followup->lfp_id; ?>', 'reschedule');" class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                        <a onclick="leadfollowup_getdetail('<?php echo $today_followup->lfp_id; ?>');" class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                  </li>
<?php
                                                 }
                                              } else{
?>
                                                <li>
                                                    <span class="manage-block">
                                                      <span class="no-follow-up">No Follow Up For Today</span>
                                                    </span>
                                                  </li> 
<?php
                                               }
?>  
                                                  
                                                </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- END PORTLET-->
                                  </div>

                                  <div class="col-md-4">
                                      <!-- BEGIN PORTLET-->
                                      <div class="portlet light bordered mb-30">
                                          <div class="portlet-title portlet-sub">
                                              <div class="caption">
                                                  <i class="icon-bubble font-hide hide"></i>
                                                  <span class="caption-subject font-hide bold uppercase">Upcoming Follow-Up</span>
                                              </div>
                                          </div>
                                          <div class="portlet-body portlet-followup" id="chats">
                                              <div class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible1="1">
                                                <ul class="follow-up-list">
<?php
                                                if (count($lead_upcoming_followup) > 0) {
                                                 foreach ($lead_upcoming_followup as $upcoming_followup) 
                                                {
?>                                                  
                                                  <li>
                                                    <span class="manage-block">
                                                       <a href="#" class="follow-lead" title="<?php echo $upcoming_followup->lfp_name; ?>"><?php echo $upcoming_followup->lfp_name; ?></a>
                                                        <span class="follow-date"><?php echo $upcoming_followup->lfp_next_date_format; ?></span>
                                                         
                                                    <div class="clearfix"></div>
                                                    <span class="manage-block">
                                                      <a href="#" class="follow-lead follow-manageby"><?php echo $upcoming_followup->lfp_crdt_by; ?></a>
                                                    <span class="follow-date follow-up-manage-by"> <?php echo $upcoming_followup->followup_module_type; ?></span>
                                                    </span>
                                                    <span class="lead-body">
                                                      <?php echo $upcoming_followup->lfp_remark; ?>
                                                    </span>
                                                    <div class="clearfix"></div>
                                                    <span class="datetime follow-up-button">
                                                        <a onclick="updateFollowupStatus('<?php echo $upcoming_followup->lfp_id; ?>', 'done')" class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a onclick="updateFollowupStatus('<?php echo $upcoming_followup->lfp_id; ?>', 'reschedule');" class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                        <a onclick="leadfollowup_getdetail('<?php echo $upcoming_followup->lfp_id; ?>');" class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                  </li>

<?php
                                                 }
                                              } else{
?>
                                                <li>
                                                    <span class="manage-block">
                                                      <span class="no-follow-up">No Upcoming Follow Up</span>
                                                    </span>
                                                  </li> 
<?php
                                               }
?>  

                                                </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- END PORTLET-->
                                  </div>

                                  

                                  

                                </div>

<?php
                                $task_count = $this->dashboard_model->getTaskDetailCount();
?>                                
                                <div class="clearfix"></div>
                                <div class="row widget-row mb-30">
                                    <div class="col-sm-6 col-md-3 ">
                                      <div class="card card-sub mb-4">
                                        <div class="card-body">
                                          <div class="d-flex align-items-center">
                                            <div class="icon-span">
                                              <i class="fas fa-users icon-campaign"></i>
                                            </div>
                                            <div class="ml-3">
                                              <div class="tilte-my-list">My Task</div>
                                              <div class="title-card-number"><?php echo $task_count->my_task; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                      <div class="card card-sub mb-4">
                                        <div class="card-body">
                                          <div class="d-flex align-items-center">
                                            <div class="icon-span">
                                              <i class="fas fa-handshake icon-event"></i>
                                            </div>
                                            <div class="ml-3">
                                              <div class="tilte-my-list">My Meetings</div>
                                              <div class="title-card-number"><?php echo $task_count->my_meeting; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                      <div class="card card-sub mb-4">
                                        <div class="card-body">
                                          <div class="d-flex align-items-center">
                                            <div class="icon-span">
                                              <i class="far fa-life-ring icon-support"></i>
                                            </div>
                                            <div class="ml-3">
                                              <div class="tilte-my-list">My Support</div>
                                              <div class="title-card-number"><?php echo $task_count->my_support; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3 ">
                                      <div class="card card-sub mb-4">
                                        <div class="card-body">
                                          <div class="d-flex align-items-center">
                                            <div class="icon-span">
                                              <i class="fas fa-search icon-review"></i>
                                              <!-- <i class="fas fa-file-invoice-dollar icon-review"></i> -->
                                            </div>
                                            <div class="ml-3">
                                              <div class="tilte-my-list">My Review</div>
                                              <div class="title-card-number"><?php echo $task_count->my_review; ?></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                                <div class="row widget-row">
                                    <div class="col-md-12">
                                      <div class="portlet light bordered">
                                        <div class="portlet-title gallery-title">
                                          <div class="caption font-dark">
                                            <span class="caption-subject uppercase bold">Vision Board
                                            </span> &nbsp;
                                          </div>
                                        </div>
                                        <div class="portlet-body dashboard-body">
                                          <div class="row widget-row">
                                            <div class="carousel-wrap">
                                              <div class="owl-carousel">
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery1.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery2.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery3.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery4.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery5.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery1.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery2.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery3.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery4.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery5.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery1.jpg">
                                                </div>
                                                <div class="item item-container">
                                                  <img class="item-gallery-img" src="<?php echo base_url().DASHBOARD_IMAGE_PATH; ?>gallery2.jpg">
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

        <div class="modal fade" id="followModal" role="dialog" aria-labelledby="followModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                
              </div>
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
                <div class="text-center">
                  <h3 class="modal-title text-center"></h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form method="POST" action="" class="follow-modal-form" id="follow_up_form">

                  <input type="hidden" name="lfp_id" id="lfp_id" value="" />
                  <input type="hidden" name="old_lfp_id" id="renew_old_lfp_id" value="" />
                  <input type="hidden" name="old_lfp_type" id="renew_old_lfp_type" value="" />
                  <input type="hidden" name="lfp_module_type" id="lfp_module_type" value="<?php echo FOLLOWUP_MODULE_TYPE_LEAD; ?>" />
                  <input type="hidden" name="lfp_module_type_id" id="lfp_module_type_id" value="" />

                  <!-- <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                      <div class="input-icon">
                        <i class="fas fa-user-tie list-level"></i>
                          <select name="lfp_module_type_id" id="lfp_module_type_id" class="form-control lfp_module_type_id custom-select2">
                            <option>Please Select Lead</option>
                          </select>
                          <label class="">Lead</label>
                          <div class="help-block"></div>
                      </div>
                  </div> -->

                  <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" size="16" readonly="" class="form-control color-primary-light" name="lfp_next_date" id="lfp_next_date">
                        <label class="control-label">Date<span class="asterix-error"><em>*</em></span></label>
                         <i class="fas fa-calendar-alt"></i>
                     </div>
                       <div class="help-block"></div>
                  </div>

                  <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <select class="form-control" name="lfp_next_time" id="lfp_next_time">
                          <option></option>
                        </select>
                        <label class="control-label">Time</label>
                         <i class="fas fa-calendar-alt"></i>
                     </div>
                       <div class="help-block"></div>
                  </div>  

                   <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <i class="fa fa-envelope"></i>
                    <select  class="form-control edited  custom-select2" name="lfp_type" id="lfp_type" onchange="updateLFPOptn()">
                      <option value="">Select Type</option>
                      <?php echo getGenPrmResult('dropdown','lfp_type','lfp_type','','result'); ?>
                    </select>
                     <label>Follow Type</label>
                    </div>
                       <div class="help-block"></div>
                  </div>

                  <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <i class="fas fa-info-circle list-level"></i>
                      <select class="form-control" name="lfp_followup_status" id="lfp_followup_status">
                      <?php echo getGenPrmResult('dropdown','lfp_followup_status','lfp_followup_status','1','result'); ?></select>
                        <label>Status</label>
                      </div>
                       <div class="help-block"></div>
                  </div>
                  <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                       <div class="form-control color-primary-light" rows="2" name="lfp_instruction" id="lfp_instruction" disabled="disabled"></div>
                     <!-- <label for="lfp_instruction" class="custom-label drp-title">Follow Up Instruction</label> -->
                     <label for="lfp_instruction">Instruction</label>
                     <i class="fas fa-info-circle"></i>
                       <div class="help-block"></div>
                    </div>                 
                  </div>
                  <div class="form-group col-md-12 hidden form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <textarea class="form-control color-primary-light" rows="2" name="lfp_type_remark" id="lfp_type_remark"></textarea>
                      <label for="lfp_type_remark">Instruction </label>
                      <i class="fa fa-comments"></i>
                      <div class="help-block"></div>
                    </div>
                  </div>
                    <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <textarea class="form-control color-primary-light" rows="2" name="lfp_remark" id="lfp_remark"></textarea>
                        <label for="lfp_remark">Remarks</label>
                         <i class="fa fa-comments"></i>
                        <div class="help-block"></div>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>

                <div class="modal-footer">
                   <div class="form-group col-md-4 form-md-line-input form-md-floating-label ">
                    <div class="input-icon">
                      <i class="fas fa-user-tie list-level"></i>
                    <select  class="form-control edited  custom-select2" name="lfp_managed_by" id="lfp_managed_by">
                          <option value="<?php echo $this->session->userdata(PEOPLE_SESSION_ID); ?>"><?php echo $this->session->userdata(PEOPLE_SESSION_NAME); ?></option>
                    </select>
                     <label style="text-align:left;">Managed By</label>
                    </div>
                       <div class="help-block"></div>
                  </div>   

                  <div class="form-group col-md-3 form-md-line-input form-md-floating-label">
                    <div class="md-checkbox">
                      <input type="checkbox" id="checkbox1" class="md-check">
                      <label for="checkbox1">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span>Send Email
                      </label>
                    </div>
                  </div>

                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn grey" onclick="location.reload();" data-dismiss="modal">Close
                  </button>
                  <input type="submit" class="btn btn-primary btn green" value="Save changes">
                  </input>
              </div>
            </form>
          </div>
        </div>
        

        <!-- END CONTAINER -->
        <div class="js-scripts">

            <?php $this->load->view('common/footer_scripts'); ?>             
            <!-- OPTIONAL SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

            <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <!-- END OPTIONAL SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/amcharts/amchartsnew/core.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/amcharts/amchartsnew/charts.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/amcharts/amchartsnew/animated.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/owlcarousel/js/owl.carousel.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>                        
            <!-- <script src="<?php echo base_url(); ?>assets/project/global/scripts/jquery.matchHeight.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> -->
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/module/dashboard/js/dashboard.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script type="text/javascript">

              $(document).ready(function()
              {
                $('#lfp_followup_status').select2();
                $('#lfp_type').select2();
                $('#lfp_next_time').select2();
                $('#lfp_next_time').timeList({
                  minutediff  : 5
                });
                $('#lfp_next_time').addClass('edited');
                matchProductHeight();
                setSalesFunnel();
                moduleList();
              });

              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                navText: [
                  "<i class='fa fa-caret-left'></i>",
                  "<i class='fa fa-caret-right'></i>"
                ],
                autoplay: false,
                autoplayHoverPause: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 2
                  },
                  800: {
                    items: 3
                  },
                  1000: {
                    items: 3
                  }
                }
              });

              function setSalesFunnel()
              {
                am4core.useTheme(am4themes_animated);

                var chart = am4core.create("stage-qty", am4charts.SlicedChart);
                chart.hiddenState.properties.opacity = 0;
                // this makes initial fade in effect

                chart.data = <?php echo json_encode($sales_funnel); ?>

                console.log(chart.data)

                var series = chart.series.push(new am4charts.FunnelSeries());
                series.colors.step = 2;
                series.dataFields.value = "value";
                series.dataFields.category = "lsg_name_value";
                series.alignLabels = true;
                
                chart.legend = new am4charts.Legend();
                // chart.legend.position = "left";
                chart.legend.position = "bottom";
                chart.legend.valign = "bottom";
              }

              function matchProductHeight()
              {
                  var thumbnail_height = 1000;

                  $('.item-container').each(function(){
                      thumbnail_height = ($(this).height() < thumbnail_height)?$(this).height():thumbnail_height;
                  })
                  
                  $('.item-container').css('height',thumbnail_height);
                  
              }

              function moduleList()
              {
                $('#module-list').dataTable({
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
                  buttons: [
                    { extend: 'print', className: 'btn dark btn-outline' },
                    { extend: 'copy', className: 'btn red btn-outline' },
                    // { extend: 'pdf', className: 'btn green btn-outline' },
                    { extend: 'excel', className: 'btn yellow btn-outline ' },
                    // { extend: 'csv', className: 'btn purple btn-outline ' },
                    { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                  ],
                  responsive: false,
                    "order": [
                  ],
                  "lengthMenu": [
                    [100,200,-1],
                    [100,200,"All"] // change per page values here
                  ],
                  "pageLength": 100,
                  "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                });
              }

              function getTablCount(tableName, countElement) {
                $(tableName).on('draw.dt', function() {
                  var count = $(tableName).parent().parent().find(tableName + '_info').html().split(' ')[5];
                  $(countElement).html('(' + (count ? count : 0) + ')');
                });
              }

              function updateFollowupStatus(follow_up_id, type)
              {
                var url, text;

                if(type == "done")
                {
                  url = baseUrl + "lead/updateFollowupStatus/" + follow_up_id + '/' + <?php echo LEAD_FOLLOWUP_STATUS_DONE; ?>;
                  text  = 'Done';
                }
                else if(type == "reschedule")
                {
                  url = baseUrl + "lead/updateFollowupStatus/" + follow_up_id + '/' + <?php echo LEAD_FOLLOWUP_STATUS_RESCHEDULE; ?>;
                  text  = 'Reschedule';
                }

                cswal({
                  text : 'Do you want to update this follow up as '+text+'?', 
                  title   : 'Done', 
                  type    : 'confirm', 
                  onyes : function(){
                    $.ajax({
                      type: "POST",
                      url: url,
                      dataType: "json",
                      success: function(response) {
                        if(type=="done")
                          leadfollowup_renewal(follow_up_id);
                        else if(type=="reschedule")
                          leadfollowup_getdetail(follow_up_id, type);
                      }
                    })
                  }, 
                  oncancel : function(){
                    /*if(type=="done")
                      leadfollowup_renewal(follow_up_id);
                    else if(type=="reschedule")
                      leadfollowup_getdetail(follow_up_id, type);*/
                  }
                });
              }

              function clearFollowupModalData()
              {
                $('#lfp_id').val('');
                $('#lfp_type').val('').trigger('change');
                $('#lfp_type').addClass('edited');
                $('#lfp_module_type_id').val('');
                //console.log((response.lfp_next_date_format).split(' ')[1])
                $('#lfp_next_date').val('');
                $('#lfp_next_time').val('');
                $('#lfp_followup_status').val('');
                $('#lfp_instruction').val('');
                $('#lfp_type_remark').val('');
                $('#lfp_remark').val('');
              }

              function leadfollowup_getdetail(follow_up_id, type = '') {
                clearFollowupModalData();
                $.ajax({
                  type: "POST",
                  url: baseUrl + "lead-followupbyid-" + follow_up_id,
                  dataType: "json",
                  success: function(response) {

                    if(type == 'reschedule')
                    {
                      $('#lfp_followup_status').val('<?php echo LEAD_FOLLOWUP_STATUS_PENDING; ?>').trigger('change');
                      $('#lfp_next_date').removeAttr('disabled');
                      $('#lfp_next_time').removeAttr('disabled');
                      $('#lfp_remark').val(response.lfp_remark).addClass('edited');
                      $('#lfp_next_date').val(now('date'));
                      $('#lfp_next_time').val(now('time')).trigger('change');
                    }
                    else
                    {
                      $('#lfp_followup_status').val(response.lfp_followup_status).trigger('change');
                      $('#lfp_next_date').attr('disabled',true);
                      $('#lfp_next_time').attr('disabled',true);
                      $('#lfp_remark').val('').addClass('edited');
                      $('#lfp_next_date').val((response.lfp_next_date_format).split(' ')[0]);
                      $('#lfp_next_time').val(((response.lfp_next_date_format).split(' ')[1])).trigger('change');
                    }

                    $('#lfp_id').val(response.lfp_id);
                    $('#lfp_type').val(response.lfp_type).trigger('change');
                    $('#lfp_type').addClass('edited');
                    $('#lfp_module_type_id').val(response.lfp_module_type_id);

                    $('#lfp_instruction').val(response.lfp_instruction);
                    $('#lfp_type_remark').val(response.lfp_type_remark);

                    $('#lfp_managed_by').html('<option value="' + response.lfp_managed_by + '">' + response.lfp_managed_by_name + '</option>');

                    updateLFPOptn();
                    $('#followModal').modal('show');
                    $('#followModal .modal-title').html(response.lfp_module_type_id_name);
                  }
                });
              }

              function leadfollowup_renewal(follow_up_id) {
                $.ajax({
                  type: "POST",
                  url: baseUrl + "lead-followupbyid-" + follow_up_id,
                  dataType: "json",
                  success: function(response) {
                    $('#lfp_id').val('');
                    $('#lfp_next_date').removeAttr('disabled');
                    $('#lfp_next_time').removeAttr('disabled');
                    $('#renew_old_lfp_id').val(response.lfp_id);
                    $('#renew_old_lfp_type').val(response.lfp_type);
                    $('#lfp_module_type_id').val(response.lfp_module_type_id);
                    $('#lfp_type').val(response.lfp_type).trigger('change');
                    /*$('#lfp_next_date').val((response.lfp_next_date_format).split(' ')[0]);
                    $('#lfp_next_time').val(((response.lfp_next_date_format).split(' ')[1])).trigger('change');*/
                    $('#lfp_next_date').val(now('date'));
                    $('#lfp_next_time').val(now('time')).trigger('change');
                    $('#lfp_type_remark').val('');
                    $('#lfp_remark').val('');
                    updateLFPOptn();
                    $('#followModal').modal('show');
                    $('#followModal .modal-title').html(response.lfp_module_type_id_name);
                  }
                });
              }

              function updateLFPOptn() {
                if($('#lfp_type').val() == <?php echo LEAD_FOLLOWUP_OTHERS; ?>) {
                  $('#lfp_instruction').html('');
                  $($('#lfp_instruction')[0].parentElement).addClass('hidden');
                  $($('#lfp_type_remark')[0].parentElement).removeClass('hidden');
                  $('#lfp_instruction').removeClass('edited');
                } else {
                  getLFPOptionInstruction();
                  $($('#lfp_type_remark')[0].parentElement).addClass('hidden');
                  $($('#lfp_instruction')[0].parentElement).removeClass('hidden');
                  $('#lfp_instruction').addClass('edited');
                }
              }

              function getLFPOptionInstruction() {
                $.ajax({
                  type: "POST",
                  url: baseUrl + "lead/lfp_optn_inst/" + $('#lfp_type').val(),
                  dataType: "json",
                  success: function(response) {
                    $('#lfp_instruction').html(response);
                  }
                });
              }

              function addFollowUp() {
                $('#followModal').modal('show');
              }

              function deleteFollowup(followupid) {
                cswal({
                  text : 'Do you want to delete this follow up?', 
                  title   : 'Done', 
                  type    : 'delete', 
                  onyes : function(){
                    $.ajax({
                      type: "POST",
                      url: baseUrl + "followup-delete-" + followupid,
                      success: function(response) {
                        response = JSON.parse(response);
                        if(response.success == true) {
                          swal({
                            title: "Done",
                            text: response.message,
                            type: "success",
                            icon: "success",
                            button: true,
                          }).then(() => {
                            getFollowupList();
                          });
                        } else {
                          swal({
                            title: "Opps",
                            text: "Something Went wrong",
                            type: "error",
                            icon: "error",
                            button: true,
                          });
                        }
                      }
                    });
                  }
                });
              }

            </script>
        </div>
    </body>
</html>