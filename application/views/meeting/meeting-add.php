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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />   
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/meeting/css/meeting-custom.css<?php echo $global_asset_version ?>">
    <!-- END PAGE LEVEL PLUGINS -->
    <link src="<?php echo base_url(); ?>assets/project/date-pair/jquery.timepicker.css<?php echo $global_asset_version ?>"  rel="stylesheet" type="text/css">
    <link src="<?php echo base_url(); ?>assets/project/date-pair/bootstrap-datepicker.css<?php echo $global_asset_version ?>" rel="stylesheet"  type="text/css">
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/project/date-pair/jquery.timepicker.css<?php echo $global_asset_version ?>">
    <style type="text/css">
      .select2-selection.select2-selection--multiple{
          padding-left: 22px;
      }
      /*.select2-container--bootstrap .select2-selection--multiple .select2-selection__choice:first-child{
          margin: 5px 0 0 35px !important;
      }*/
      .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice{
          margin: 5px 0 0 10px !important;
      }
    </style>
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
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet portlet-fluid-background">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Add New Meeting
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" id="meeting_add" class="col-md-push-1 col-md-10 form_add">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">                          
                          <input type="text" class="form-control" name="mtg_title" id="mtg_title">
                          <label>Title<span class="asterix-error"><em>*</em></span></label>
                          <i class="fas fa-th-list"></i>
                          <div class="help-block"></div>                       
                        </div>
                      </div>                      
                    </div>
                    
                  </div>
                  <div class="row" id="meetingDate">
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" class="form-control date start" name="mtg_fr_dt" id="mtg_fr_dt" />
                           <label>From Date<span class="asterix-error"><em>*</em></span></label>
                           <i class="fas fa-calendar-alt"></i>
                           <div class="help-block"></div>      
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" class="form-control time start" name="mtg_fr_time" id="mtg_fr_time"/>
                          <label>From Time<span class="asterix-error"><em>*</em></span></label>
                           <i class="fas fa-clock"></i>
                           <div class="help-block"></div>    
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" class="form-control time end" name="mtg_to_time" id="mtg_to_time" />
                           <label>To Time<span class="asterix-error"><em>*</em></span></label>
                           <i class="fas fa-clock"></i>
                           <div class="help-block"></div>    
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" class="form-control date end" name="mtg_to_dt" id="mtg_to_dt" />
                          <label>To Date<span class="asterix-error"><em>*</em></span></label>
                           <i class="fas fa-calendar-alt"></i>
                           <div class="help-block"></div>    
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input">
                        <label class="drp-title">Host People</label>
                        <div class="input-icon">
                          <i class="fas fa-chalkboard-teacher icon-lead"></i>
                            <select class="form-control" name="mtg_host" id="mtg_host">
                              <option></option>
                              <!-- <option value="<?php //if(isset($meetingdata->mtg_host)) echo $meetingdata->mtg_host?>" selected="selected"><?php //if(isset($meetingdata->mtg_host_name)) echo $meetingdata->mtg_host_name ?></option> -->
                          </select>
                          <div class="help-block"></div>   
                          <!-- <label class="custom-label">Please Select Host People</label> -->
                        </div> 
                      </div>                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input ">  
                        <label class="drp-title">Meeting With</label>
                          <div class="input-icon">
                            <i class="fa fa-user"></i>
                            <select class="form-control " name="mtg_people" id="mtg_people">
                              <option class="blank_option"></option>
                            </select>
                            <div class="help-block"></div>   
                          </div>
                      </div>                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="drp-title drp-label-title">Description</label>
                        <div class="">
                          <textarea name="summernote" id="summernote_1"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title drp-label-title">Attachments</label>
                         <a href="#" data-toggle="tooltip" title="You can add multiple images with .png .jpg & .jpeg file format" class="data-tooltip-user"><span><i class="fa fa-info-circle"></i></span></a>
                        <div class="image-preview" style="padding-left: 0px;">
                          <div id="image_preview" ></div>
                            <span class="btn default btn-file btn-file-view">
                              <input type="file" name="mtg_document" id="mtg_document" class="profile-image btn-file-view" multiple >
                            </span>
                        </div>
                      </div>
                      
                    </div>  

                    <div class="col-md-6">
                      <div class="form-group form-md-line-input "> 
                         <label class="drp-title">Status </label>
                        <div class="input-icon">
                          <i class="fas fa-info-circle list-level"></i>
                           <select class="form-control" name="mtg_status" id="mtg_status">
                            <option class="blank_option"></option>
                          </select>
                          
                        </div>      
                      </div>                      
                    </div>

                  </div>
                  <div class="row">
                     <div class="col-md-12">
                       <span class="sub-list-title">Related</span>
                     </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input "> 
                          <label class="drp-title">People</label>
                          <div class="input-icon">
                            <i class="fa fa-user"></i>
                            <select class="form-control" name="mtg_rlt_ppl" id="mtg_rlt_ppl">
                
                          </select>
                          <!-- <label class="custom-label">Please Select People</label>   -->
                          </div>              
                        </div>                      
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input ">
                          <label class="drp-title">Lead</label>
                          <div class="input-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <select class="form-control" name="mtg_lead" id="mtg_lead">
                            <option class="blank_option"></option>
                          </select>
                          
                          </div>
                        </div>                      
                      </div>
                      
                    </div>
                    <div class="row">                      
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input ">
                        <label class="drp-title">Task</label>
                          <div class="input-icon">
                            <i class="fas fa-clipboard icon-module"></i>
                              <select class="form-control" name="mtg_task" id="mtg_task">
                            <option class="blank_option"></option>
                          </select>
                          
                          </div>        
                        </div>                      
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input ">  
                            <label class="drp-title">Account</label>
                            <div class="input-icon">
                              <i class="fa fa-industry icon-company"></i>
                                  <select class="form-control" name="mtg_act" id="mtg_act">
                                   
                                    </select>
                                <!-- <label class="custom-label">Please Select Account</label>   -->
                            </div>                       
                        </div>                       
                      </div>
                    </div>

                   
                 
                   
                </div>
              </div>
              <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_ADD)); ?>   
              </form>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
       
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script> -->
       
      <script src="<?php echo base_url(); ?>assets/project/date-pair/bootstrap-datepicker.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/date-pair/jquery.timepicker.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/date-pair/datepair.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/date-pair/jquery.datepair.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
          </script>
         <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.min.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
         <script type="text/javascript" src="<?php echo base_url(); ?>assets/module/meeting/js/meeting-add.js<?php echo $global_asset_version ?>"></script>
         <script>
                    // initialize input widgets first
          $('#meetingDate .time').timepicker({
              'showDuration': true,
              'scrollDefault': 'now',
              'timeFormat': 'g:i A'
          }).on('changeTime', function(e){
            
          $('#meetingDate .time').addClass('edited');
          // $('.time').timepicker("hide");
          });;

          $('#meetingDate .date').datepicker({
            'format': 'm/d/yyyy',
            'autoclose': true
          }).on('changeDate', function(e){
              $('.date').addClass('edited');
              $('.date').datepicker("hide");
            });;

          // initialize datepair
          var meetingDateEl = document.getElementById('meetingDate');
          var datepair = new Datepair(meetingDateEl);
      </script>

        <!-- END OPTIONAL SCRIPTS -->
      </div>
  </body>
</html>
