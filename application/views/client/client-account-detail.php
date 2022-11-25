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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/lead/css/lead-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/easy-pie-chart/jquery.easypiechart.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/client/css/client-dashboard.css">
    <link href="<?php echo base_url(); ?>assets/module/client/css/client-custom.css" rel="stylesheet" type="text/css" />     
    <!-- END OPTIONAL LAYOUT STYLES -->
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
                <a href="#" class=" previous" title="">
                    <button id="newlead" class="btn green">
                        <i class="fa fa-arrow-left"></i>
                        <!-- Previous  -->
                    </button>
                </a>
                <a href="#" class="next">
                    <button id="newlead" class="btn green">
                        <!-- Next --><i class="fa fa-arrow-right"></i>
                    </button>
                </a>
            </div>
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <!-- MAIN CONTENTS START HERE -->
                <aside class="profile-info col-md-12">
                  <section class="panel">
                    <div class="panel-body bio-graph-info panel-body-detail-view">                    
                      <header class="panel-heading panel-heading-lead color-primary">
                        <div class="row detail-box">                      
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <span class="detail-list-heading">Client Details</span><br>
                              
                            <span class="panel-title">
                              Pooja
                            </span>&nbsp;&nbsp;
                            <a class="btn btn-edit" href="#" title="Click Here To Edit Details">
                              <i class="fa fa-edit">
                              </i>
                              <span class="btn-text"> Edit
                              </span>
                            </a>                           
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12 created-title">                          
                            <span class="created">Created By: Nick
                            </span>
                            <br>
                            <span class="sp-date">Created On: 04 Oct,2018
                            </span>
                          </div>
                        </div>
                      </header>
                      <div class="table-responsive">
                        <table class="table table-detail-custom table-style">
                          <tbody>
                            
                            <tr>
                               <td><i class="fa fa-mobile list-level"></i>Mobile</td>
                              <td>9637578568</td>      
                              <td><i class="fa fa-envelope list-level"></i>Email</td>
                              <td>pooja.b@nextasy.in</td>                             
                            </tr>
                            <tr>                                                
                              <td><i class="fas fa-id-card-alt list-level"></i>Designation</td>
                              <td>Client</td>  
                              <td><i class="fa fa-calendar list-level"></i>Met On</td>
                              <td>28/09/2018</td>                
                            </tr>                            
                          </tbody>
                        </table>
                      </div>


                    </div>
                  </section>
                </aside>
                <!-- -----MAIN CONTENTS END HERE----- -->
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line tabbable-line-lead">
                      <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#client-overview" data-toggle="tab">Overview</a>
                        </li>
                        <li>
                            <a href="#client-detail" data-toggle="tab">Details</a>
                        </li>
                        <li>
                            <a href="#client-meeting" data-toggle="tab">Meeting</a>
                        </li>
                         <li>
                            <a href="#client-task" data-toggle="tab"> Task </a>
                        </li>  
                        <li>
                            <a href="#client-follow-up" data-toggle="tab"> Follow Up </a>
                        </li>
                        <li>
                            <a href="#client-transcation" data-toggle="tab">Transcation</a>
                        </li>                   
                      </ul>
                      
                    </div>
                     <div class="portlet-body">
                       <div class="tab-content">
                        <div class="tab-pane active" id="client-overview">
                          <div class="row">
                            <div class="container-fluid">                            
                              <div class="row">
                                <div class="col-md-4 col-sm-6">
                                  <div class="boxes-main client-main-list">
                                   <div class="client-meeting-title">
                                     <a href="#" class="meeting-tilte">
                                       <h3>Meeting</h3>                         
                                     </a>   
                                     <hr class="hr-row hr-custom">
                                     <div class="row">
                                       <div class="col-md-6 col-sm-6 col-xs-12 meeting-sepration">
                                        <div class="col-md-12 col-xs-12 side-padding">
                                          <div class="meeting-list">                      
                                           <a href="#"><h3>Planned</h3></a>
                                          </div>
                                          <div class="meeting-count meeting-count-first">
                                            <a href="#">
                                              <h1>32<span class="meeting-with">/100</span> </h1>
                                            </a>
                                          </div>
                                        </div>
                                        
                                          <div class="meeting-icon">
                                            <span><i class="flaticon-calendar"></i></span>
                                            <!-- <i class="flaticon-workflow"></i> -->
                                          </div>
                                        
                                        
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <div class="col-md-12 col-xs-12 side-padding">
                                            <div class="meeting-list">                      
                                             <a href="#"><h3>Completed</h3></a>
                                            </div>
                                            <div class="meeting-count meeting-count-second">
                                              <a href="#">
                                                <h1>32<span class="meeting-with">/100</span> </h1>
                                              </a>
                                            </div>
                                          </div>
                                            <div class="meeting-icon">
                                              <span><i class="flaticon-task-complete"></i></span>
                                              <!-- <i class="flaticon-networking"></i> -->
                                            </div>
                                       </div>  

                                     </div>                                      
                                   </div>

                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                  <div class="boxes-main client-main-list">
                                     <a href="#" class="meeting-tilte">
                                       <h3>Reference Given</h3>                         
                                     </a>   
                                     <hr class="hr-row hr-task hr-custom">
                                     <div class="row">
                                       <div class="col-md-6 col-xs-6">
                                         <div class="refe-main">
                                           <a href="#"><h3>Direct Business</h3></a>
                                         </div>
                                         <div class="refe-count">
                                           <a href="#">
                                             <h1>
                                              <div class="refer-icon refer-icon-first">
                                                <i class="flaticon-workflow"></i>
                                              </div>
                                              <div class="refer-list-count">
                                                <span>25</span>
                                              </div>                                 
                                             </h1>
                                           </a>
                                         </div>
                                       </div>
                                       <div class="col-md-6 col-xs-6">
                                         <div class="refe-main">
                                           <a href="#"><h3>Indirect Business</h3></a>
                                         </div>
                                         <div class="refe-count">
                                           <a href="#">
                                            <h1>
                                              <div class="refer-icon refer-icon-second">
                                                <i class="flaticon-networking"></i>
                                              </div>
                                              <div class="refer-list-count">
                                                <span>5</span>
                                              </div>                                 
                                             </h1>
                                             
                                           </a>
                                         </div>
                                       </div>
                                     </div>
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-6 task-lead">
                                  <div class="boxes-main client-main-list">
                                     <a href="#" class="meeting-tilte">
                                       <h3>Task</h3>                         
                                     </a>   
                                     <hr class="hr-row hr-custom">
                                     <div class="row">
                                       <div class="col-md-6 col-xs-6 no-padding">
                                          <div class="task-chart">
                                            <div class="chart-open chart-main" data-percent="50"><span>50</span>%</div>
                                             <div class="task-title task-open-tiles">
                                               <h3>Open</h3>
                                             </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-6 no-padding">
                                          <div class="task-chart">
                                            <div class="chart-closed chart-main" data-percent="30"><span>30</span>%</div>
                                            <div class="task-title task-closed-tiles">
                                              <h3>Closed</h3>
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
                        <div class="tab-pane" id="client-detail">
                          <div class="row">
                            <div class="container-fluid">                            
                              <div class="row">
                                <div class="container-fluid">
                                  <div class="col-md-12">
                                    <div class="main-title">
                                      <h5 class="bold page-tab-title">Detail</h5>
                                    </div>
                                  </div>
                                </div>
                              </div>                   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="client-meeting">
                          <div class="row">
                            <div class="container-fluid">                            
                              <div class="row">
                                <div class="container-fluid">
                                  <div class="col-md-12">
                                    <div class="main-title">
                                      <h5 class="bold page-tab-title">Meeting</h5>
                                    </div>
                                  </div>
                                </div>
                              </div>                   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="client-task">
                          <div class="row">
                            <div class="container-fluid">                            
                              <div class="row">
                                <div class="container-fluid">
                                  <div class="col-md-12">
                                    <div class="portlet light bordered">              
                                      <div class="portlet-body">
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-list">
                                            <thead>
                                              <tr>
                                                <th>Title</th>
                                                <th>Client</th>
                                                <th>Assigned Date</th>
                                                <th>Status</th>
                                                <th>Assigned To</th>
                                                <th>Assigned By</th>
                                                <th>Priority</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>Task</td>
                                                <td>Nextasy</td>
                                                <td>18-09-2018 08:51 AM</td>
                                                <td>Review</td>
                                                <td>Vinay Pagare</td>
                                                <td>Vinay Pagare</td>
                                                <td>Critical</td>
                                              </tr>
                                            </tbody>
                                          </table>  
                                        </div>                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>                   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="client-follow-up">
                          <div class="row">
                            <div class="container-fluid">
                              <div class="col-md-12">
                                  <div class="portlet light bordered">                                    
                                    <div class="portlet-body">
                                      <ul class="nav nav-tabs">
                                          <li class="active">
                                              <a href="#tab_today" data-toggle="tab" aria-expanded="true"> Today <span id = "tblFollowupListToday0" class="countBtn">2</span> </a>
                                          </li>
                                          <li class="">
                                              <a href="#tab_pending" data-toggle="tab" aria-expanded="false"> Due <span id="tblFollowupListPending1" class="countBtn">3</span></a>
                                          </li>
                                          <li class="">
                                              <a href="#tab_today_completed" data-toggle="tab" aria-expanded="false">  Today (Completed) <span id="tblFollowupListCompleted2" class="countBtn">3</span></a>
                                          </li>
                                          <li class="">
                                              <a href="#tab_upcoming" data-toggle="tab" aria-expanded="false"> Upcoming <span id="tblFollowupListUpcoming3" class="countBtn">5</span></a>
                                          </li>
                                          <li class="">
                                              <a href="#tab_all" data-toggle="tab" aria-expanded="false">All <span id="tblFollowupListAll4" class="countBtn">6</span> </a>
                                          </li>
                                      </ul>
                                      <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_today">
                                          <table class="table table-striped table-bordered table-hover" id="tblFollowupListToday" style="width:100%;">
                                            <thead>
                                              <tr>
                                                <th> Date Time </th>
                                                <th> Followup Type </th>
                                                <th> Remark </th>
                                                <th> Status </th>
                                                <th> Created On </th>
                                                <th> Created By </th>
                                                <th> Action </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th>20/09/2018 09:25 AM</th>
                                                <th>SMS</th>
                                                <th>Rem 1</th>
                                                <th>Rework</th>
                                                <th>2018-09-20</th>
                                                <th>Vinay Pagare</th>
                                                <th>
                                                  <a href="#" data-toggle="modal" data-target="#followModal"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                  <a href="#"><i class="fa fa-trash"></i></a>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab_pending">
                                          <table class="table table-striped table-bordered table-hover" id="tblFollowupListPending" style="width:100%;">
                                            <thead>
                                              <tr>
                                                <th> Date Time </th>
                                                <th> Followup Type </th>
                                                <th> Remark </th>
                                                <th> Status </th>
                                                <th> Created On </th>
                                                <th> Created By </th>
                                                <th> Action </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th>20/09/2018 09:25 AM</th>
                                                <th>SMS</th>
                                                <th>Rem 1</th>
                                                <th>Rework</th>
                                                <th>2018-09-20</th>
                                                <th>Vinay Pagare</th>
                                                <th>
                                                  <a href="#" data-toggle="modal" data-target="#followModal"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                  <a href="#"><i class="fa fa-trash"></i></a>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab_today_completed">
                                          <table class="table table-striped table-bordered table-hover" id="tblFollowupListCompleted" style="width:100%;">
                                            <thead>
                                              <tr>
                                                <th> Date Time </th>
                                                <th> Followup Type </th>
                                                <th> Remark </th>
                                                <th> Status </th>
                                                <th> Created On </th>
                                                <th> Created By </th>
                                                <th> Action </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th>20/09/2018 09:25 AM</th>
                                                <th>SMS</th>
                                                <th>Rem 1</th>
                                                <th>Rework</th>
                                                <th>2018-09-20</th>
                                                <th>Vinay Pagare</th>
                                                <th>
                                                  <a href="#" data-toggle="modal" data-target="#followModal"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                  <a href="#"><i class="fa fa-trash"></i></a>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab_upcoming">
                                          <table class="table table-striped table-bordered table-hover" id="tblFollowupListUpcoming" style="width:100%;">
                                            <thead>
                                              <tr>
                                                <th> Date Time </th>
                                                <th> Followup Type </th>
                                                <th> Remark </th>
                                                <th> Status </th>
                                                <th> Created On </th>
                                                <th> Created By </th>
                                                <th> Action </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th>20/09/2018 09:25 AM</th>
                                                <th>SMS</th>
                                                <th>Rem 1</th>
                                                <th>Rework</th>
                                                <th>2018-09-20</th>
                                                <th>Vinay Pagare</th>
                                                <th>
                                                  <a href="#" data-toggle="modal" data-target="#followModal"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                  <a href="#"><i class="fa fa-trash"></i></a>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab_all">
                                          <table class="table table-striped table-bordered table-hover" id="tblFollowupListAll" style="width:100%;">
                                            <thead>
                                              <tr>
                                                <th> Date Time </th>
                                                <th> Followup Type </th>
                                                <th> Remark </th>
                                                <th> Status </th>
                                                <th> Created On </th>
                                                <th> Created By </th>
                                                <th> Action </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th>20/09/2018 09:25 AM</th>
                                                <th>SMS</th>
                                                <th>Rem 1</th>
                                                <th>Rework</th>
                                                <th>2018-09-20</th>
                                                <th>Vinay Pagare</th>
                                                <th>
                                                  <a href="#" data-toggle="modal" data-target="#followModal"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                  <a href="#"><i class="fa fa-trash"></i></a>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                      <div class="clearfix margin-bottom-20"> </div>
                                    </div>
                                  </div>
                              </div>
                            </div>           
                          </div>
                        </div>
                        <div class="tab-pane" id="client-transcation">
                          <div class="row">
                            <div class="container-fluid">                            
                              <div class="row">
                                <div class="container-fluid">
                                  <div class="col-md-12">
                                    <div class="main-title">
                                      <h5 class="bold page-tab-title">Transcation</h5>
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

         

          </div>
          
          
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- Modal -->
  
    <div class="modal fade" id="followModal" tabindex="-1" role="dialog" aria-labelledby="followModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            
          </div>
          <div class="modal-body">
            <button type="button" class="close followup-lead-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
            <div class="text-center">
              <h3 class="modal-title text-center">Follow Up Transaction Form
              </h3>
              <span class="sp_line color-primary">
              </span>
            </div>
            <form method="POST" action="" class="follow-modal-form" id="follow_up_form">
              <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                <input type="hidden" name="lfp_id" id="lfp_id" value="" />
                <input type="hidden" name="old_lfp_id" id="renew_old_lfp_id" value="" />
                <input type="hidden" name="old_lfp_type" id="renew_old_lfp_type" value="" />
                <input type="hidden" name="lfp_led_id" id="lfp_led_id" value="<?php if(isset($leaddata->led_id)) echo $leaddata->led_id; ?>" />
               <!--  <label class="control-label">Next Date
                  <span class="asterix-error">
                      <em>*
                      </em>
                  </span>
                </label> -->
                  <div class="input-icon">
                    <input type="text" size="16" readonly="" class="form-control color-primary-light" name="lfp_next_date" id="lfp_next_date">
                    <label class="control-label">Next Date<span class="asterix-error"><em>*</em></span></label>
                       <i class="fas fa-calendar"></i>
                  </div>
                 
                   <div class="help-block"></div>
              </div>
              <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                  
                  <select class="form-control" name="lfp_followup_status" id="lfp_followup_status">
                    <?php echo getGenPrmResult('dropdown','lfp_followup_status','lfp_followup_status','','result'); ?>
                  </select>
                  <label>Status
                  </label>
                     <div class="help-block"></div>
                </div>
              </div>
              
              <div class="clearfix"></div>
              <div class="col-md-12">
                <div class="form-group form-md-line-input form-md-floating-label">
                
                <select  class="form-control" name="lfp_type" id="lfp_type" onchange="updateLFPOptn()">
                  
                  <?php echo getGenPrmResult('dropdown','lfp_type','lfp_type','','result'); ?>
                </select>
                <label>Follow Type
                </label>
                   <div class="help-block"></div>
                </div>
              </div>
              <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                  <div class="input-icon">
                  <textarea class="form-control color-primary-light" rows="2" name="lfp_instruction" id="lfp_instruction" disabled="disabled"></textarea>
                  <label>Follow Up Instruction</label>
                  <i class="fas fa-info-circle"></i>
                   <div class="help-block"></div>
                </div>
              </div>
             <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                  <div class="input-icon">
                       
                <textarea class="form-control color-primary-light" rows="2" name="lfp_type_remark" id="lfp_type_remark"></textarea>
                 <label>Remarks
                        </label>
                        <i class="fa fa-comments"></i>
                   <div class="help-block"></div>
              </div>
            </div>
            <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                  <div class="input-icon">               
                <textarea class="form-control color-primary-light" rows="2" name="lfp_remark" id="lfp_remark"></textarea>
                 <label>Additional Remarks
                </label>
                <i class="fa fa-comments"></i>
                   <div class="help-block"></div>
              </div>
            </div>
              </div>
              <div class="clearfix"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
              </button>
              <input type="submit" class="btn btn-primary" value="Save changes">
              </input>
          </div>
        </form>
      </div>
    </div>
    
  <div class="js-scripts">
    <?php $this->load->view('common/footer_scripts'); ?>
    <!-- OPTIONAL SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>      
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <!-- END PAGE LEVEL PLUGINS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/lead/js/lead-list.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>   <!-- END OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/easy-pie-chart/jquery.easypiechart.js" type="text/javascript"></script>
      <script type="text/javascript">
        $(function() {
            $('.chart-open').easyPieChart({              
              barColor: '#ef1e25',             
              trackColor: '#f2f2f2',              
              scaleColor: 'transparent',              
              lineCap: 'round',              
              lineWidth: 3,              
              size: 110,              
              animate: 1000,            
              onStart: $.noop,              
              onStop: $.noop
            });

             $('.chart-closed').easyPieChart({              
              barColor: '#32c5d2',             
              trackColor: '#f2f2f2',              
              scaleColor: 'transparent',              
              lineCap: 'round',              
              lineWidth: 3,              
              size: 110,              
              animate: 1000,            
              onStart: $.noop,              
              onStop: $.noop
            });
            
          });

      </script>  

      <script type="text/javascript">

  $(document).ready(function(){
     getFollowupList();
     getLeadOverview('<?php echo $leaddata->led_id; ?>');
     getLeadTaskList('<?php echo $leaddata->led_id; ?>');
  })

  function getFollowupList()
  {
    var followUpTblUrlArray = {
      'tblFollowupListToday'      : {'table_function_name' : 'lead-followup-getlist-today','table_function_count':<?php echo $leadfollowUpTypeToday->table_data_count; ?>,'table_function_server':<?php echo $leadfollowUpTypeToday->table_server_status; ?>},
      'tblFollowupListPending'      : {'table_function_name' : 'lead-followup-getlist-pending','table_function_count':<?php echo $leadfollowUpTypePending->table_data_count; ?>,'table_function_server':<?php echo $leadfollowUpTypePending->table_server_status; ?>},
      'tblFollowupListCompleted'      : {'table_function_name' : 'lead-followup-getlist-completed','table_function_count':<?php echo $leadfollowUpTypeCompleted->table_data_count; ?>,'table_function_server':<?php echo $leadfollowUpTypeCompleted->table_server_status; ?>},
      'tblFollowupListUpcoming'      : {'table_function_name' : 'lead-followup-getlist-upcoming','table_function_count':<?php echo $leadfollowUpTypeUpcoming->table_data_count; ?>,'table_function_server':<?php echo $leadfollowUpTypeUpcoming->table_server_status; ?>},
      'tblFollowupListAll'      : {'table_function_name' : 'lead-followup-getlist-all','table_function_count':<?php echo $leadfollowUpTypeAll->table_data_count; ?>,'table_function_server':<?php echo $leadfollowUpTypeAll->table_server_status; ?> },
    };

    var tableNameArr = Object.keys(followUpTblUrlArray);
    for(var i = 0; i < tableNameArr.length; i++)
    {
      $('#'+tableNameArr[i].table_function_name).DataTable().destroy();
      var customDataTableElement = '#'+tableNameArr[i];
      var customDataTableCount   = followUpTblUrlArray[tableNameArr[i]].table_function_count; 
      var customDataTableServer  = followUpTblUrlArray[tableNameArr[i]].table_function_server;
      var customDataTableUrl     =  baseUrl + followUpTblUrlArray[tableNameArr[i]].table_function_name + '-<?php echo $leaddata->led_id; ?>?table_data_count='+customDataTableCount;
      var customDataTableColumns = [
          {   'data'  : 'lfp_next_date_format' },
          {   'data'  : 'followup_type' },
          {   'data'  : 'lfp_remark' },
          {   'data'  : 'followup_status' },
          {   'data'  : 'lfp_crdt_dt' },
          {   'data'  : 'lfp_crdt_by' },
          {   'data'  : 'lfp_id' ,
            'render': function(data, type, row, meta)
            {
                link = '&nbsp;&nbsp;<a onclick="leadfollowup_getdetail(`'+row.lfp_id+'`)" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>&nbsp;&nbsp;<a onclick="deleteFollowup(`'+row.lfp_id+'`)" title="Delete Details "><i class="fa fa-trash" aria-hidden="true"></i></a>';
              // <a href="#"><i class="fa fa-calendar" style="cursor: pointer;" onclick="leadfollowup_renewal(`'+row.lfp_id+'`)"></i></a>
              return link;
            }
          }
        ];

        $('#'+tableNameArr[i]+i).append(customDataTableCount);
        customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);

    }
  
  }

  function getLeadOverview(lead_id)
  {
    $.ajax(
    {
      type: "POST",
      url: baseUrl + "followup-overview-"+lead_id,
      dataType: "json",
      success: function(response)
      {
        if(response.upcoming)
        {
          $('#ufu_id').val(response.upcoming.lfp_id);
          $('#UFU_lead_name').html(response.upcoming.lead_name);
          $('#UFU_date').html(response.upcoming.lfp_next_date_format);
          $('#UFU_type').html(response.upcoming.followup_type);
          $('#UFU_status').html(response.upcoming.followup_status);
          $('#UFU_remark').html(response.upcoming.lfp_remark);
        }
        else
          $('#UFU_remark').html('No Follow Up');

        if(response.last)
        {
          $('#lfu_id').val(response.last.lfp_id);
          $('#LFU_lead_name').html(response.last.lead_name);
          $('#LFU_date').html(response.last.lfp_next_date_format);
          $('#LFU_type').html(response.last.followup_type);
          $('#LFU_status').html(response.last.followup_status);
          $('#LFU_remark').html(response.last.lfp_remark);
        }
        else
          $('#LFU_remark').html('No Follow Up');
      }
    });
  }

  function leadfollowup_getdetail_ufu()
  {
    leadfollowup_getdetail($('#ufu_id').val());
  } 

  function deleteFollowup_ufu()
  {
    deleteFollowup($('#ufu_id').val());
  }

  function leadfollowup_getdetail_lfu()
  {
    leadfollowup_getdetail($('#lfu_id').val());
  } 

  function deleteFollowup_lfu()
  {
    deleteFollowup($('#lfu_id').val());
  }

  function leadfollowup_getdetail(follow_up_id)
  {
    $.ajax(
    {
      type: "POST",
      url: baseUrl + "lead-followupbyid-"+follow_up_id,
      dataType: "json",
      success: function(response)
      {
        $('#lfp_id').val(response.lfp_id);

        $('#lfp_led_id').val(response.lfp_led_id);
        $('#lfp_type').val(response.lfp_type);
        $('#lfp_next_date').val(response.lfp_next_date);
        $('#lfp_followup_status').val(response.lfp_followup_status);
        $('#lfp_instruction').val(response.lfp_instruction);
        $('#lfp_type_remark').val(response.lfp_type_remark);
        $('#lfp_remark').val(response.lfp_remark);

        updateLFPOptn();
        $('#followModal').modal('show');
        $('#followModal .modal-title').html('Update Follow Up');
      }
    });
  }

  function leadfollowup_renewal(follow_up_id)
  {
    $.ajax(
    {
      type: "POST",
      url: baseUrl + "lead-followupbyid-"+follow_up_id,
      dataType: "json",
      success: function(response)
      {
        $('#lfp_id').val('');
        $('#renew_old_lfp_id').val(response.lfp_id);
        $('#renew_old_lfp_type').val(response.lfp_type);

        $('#lfp_led_id').val(response.lfp_led_id);
        $('#lfp_type').val(response.lfp_type);
        $('#lfp_next_date').val(response.lfp_next_date).trigger('change');

        //$('#lfp_instruction').val('');
        $('#lfp_type_remark').val('');
        $('#lfp_remark').val('');

        //check if required ----------------
        //$('#lfp_followup_status').val(response.lfp_followup_status);
        //$('#lfp_instruction').val(response.lfp_instruction);
        //$('#lfp_type_remark').val(response.lfp_type_remark);
        //$('#lfp_remark').val(response.lfp_remark);


        updateLFPOptn();
        $('#followModal').modal('show');
        $('#followModal .modal-title').html('Reschedule Follow Up');
      }
    });
  }

  function updateLFPOptn()
  {
    if($('#lfp_type').val() == <?php echo LEAD_FOLLOWUP_OTHERS; ?>)
    {
      $('#lfp_instruction').html('');
      $($('#lfp_instruction')[0].parentElement).addClass('hidden');
      $($('#lfp_type_remark')[0].parentElement).removeClass('hidden');
    }
    else
    {
      getLFPOptionInstruction();
      $($('#lfp_type_remark')[0].parentElement).addClass('hidden');
      $($('#lfp_instruction')[0].parentElement).removeClass('hidden');
    }
  }

  function getLFPOptionInstruction()
  {
    $.ajax(
    {
        type: "POST",
        url: baseUrl + "lead/lfp_optn_inst/"+$('#lfp_type').val(),
        dataType: "json",
        success: function(response)
        {
          $('#lfp_instruction').html(response);
        }
    });
  }

  function addFollowUp()
  {
    $('#followModal').modal('show');
  }

  function deleteFollowup(followupid)
  {
    if(!confirm('Do you really want to delete this entry'))
    {
      return;
    }

    $.ajax(
    {
      type: "POST",
      url: baseUrl + "followup-delete-"+followupid,
      success: function(response)
      {
        response = JSON.parse(response);

        if (response.success == true)
        {
          swal({
            title: "Done",
            text: response.message,
            type: "success",
            icon: "success",
            button: true,
          }).then(()=>{
            getFollowupList();
          });
        }
        else
        {
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

  function getLeadTaskList(lead_id)
  {
    var customDataTableElement = '#tblleadtasklist';
    var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
    var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
    var customDataTableUrl     =  baseUrl + 'lead/lead_task_getlist?table_data_count='+customDataTableCount+'&lead_id='+lead_id;
    var customDataTableColumns = [
      {   'data'  : 'tsk_title' ,
        'render': function(data, type, row, meta)
        {
          link = '<a href="task-detail-'+row.tsk_id_encrypt+'" >' + data + '</a>';
          return link;
        }
      },
      {   'data'  : 'tsk_client_id_name' },
      {   'data'  : 'tsk_datetime_format' },
      {   'data'  : 'tsk_progress_status_name'} ,
      {   'data'  : 'tsk_user_ass_to_name'} ,
      {   'data'  : 'tsk_user_ass_by_name'} ,
      {   'data'  : 'tsk_priority_name' }
    ];

    customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);

  }

</script>  
  </div>

  <!-- Modal -->


</body>
</html>
