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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/task/css/task.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
              <!-- START PAGE CONTENT-->
              <div class="container-fluid container-wrap">
                <div class="row">
                  <div class="text-center title_wrap mt-20">
                    <h3 class="page-title text-center">Add New Task</h3>
                    <span class="sp_line color-primary"></span>
                  </div>
                  <div class="col-md-12">
                    <form id="task_add" method="post" class="horizontal-form form_add col-md-push-1 col-md-10">
                      <div class="portlet">
                        <div class="portlet-body form">
                          <div class="form-body">
                            <div class="row">
                              <div class="row">

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon">
                                      <input type="text" class="form-control" id="tsk_title" required="" name="tsk_title" aria-required="true">
                                      <label>Title <span class="asterix-error"><em>*</em></span></label>
                                      <i class="fas fa-th-list"></i>
                                      <div class="help-block"></div>
                                    </div>                                          
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon">                                            
                                      <input type="text" readonly="" class="form-control" id="tsk_due_dt" name="tsk_due_dt" placeholder="Due Date" value="">
                                      <label class="control-label">Due Date</label>
                                      <i class="fas fa-calendar-alt"></i>                                       
                                      <div class="help-block"></div>
                                   </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="drp-title drp-label-title">Description</label>
                                    <textarea name="summernote" id="summernote_1"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">
                                    <label class="drp-title">Assigned To</label>
                                    <div class="input-icon"> 
                                      <i class="fa fa-user"></i>                                           
                                      <select class="form-control select2ppl" id="tsk_user_ass_to" name="tsk_user_ass_to" data-placeholder="Please Select People">
                                        <option></option>
                                      </select>
                                      <div class="help-block"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">
                                    <label class="drp-title">Supporter</label>
                                    <div class="input-icon">
                                      <i class="fas fa-user-tie"></i>                                           
                                      <select class="form-control select2ppl custom-select2" id="tsk_supporter" name="tsk_supporter" data-placeholder="Please Select Supporter">
                                        <option></option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="help-block"></div>
                                </div>                                    
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">
                                    <label class="drp-title">Reviewer</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user"></i>
                                      <select class="form-control select2ppl custom-select2" id="tsk_reviewer" name="tsk_reviewer" data-placeholder="Please Select Reviewer">
                                        <option></option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="help-block"></div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">
                                    <label class="drp-title">Status</label>
                                    <div class="input-icon">
                                       <i class="fa fa-info-circle"></i>
                                        <select class="form-control select2" id="tsk_progress_status" name="tsk_progress_status" >
                                       <?php echo getGenPrmResult('dropdown','tsk_progress_status','tsk_progress_status','1','result'); ?>
                                          <option></option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="help-block"></div>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                      <label class="drp-title">Task Type</label>
                                      <div class="input-icon">
                                        <i class="fas fa-clipboard"></i>
                                        <select class="form-control select2" id="tsk_type" name="tsk_type" >
                                        <?php echo getGenPrmResult('dropdown','tsk_type','tsk_type','1','result'); ?>
                                          <option></option>
                                        </select>
                                      </div>                                            
                                    </div>
                                    <div class="help-block"></div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                      <label class="drp-title">Priority</label>
                                      <div class="input-icon">
                                        <i class="fas fa-flag list-level"></i>
                                        <select class="form-control select2" id="tsk_priority" name="tsk_priority" >
                                          <?php echo getGenPrmResult('dropdown','tsk_priority','tsk_priority','1','result'); ?>
                                          <option></option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                     <div class="form-group form-md-line-input form-md-floating-label fileinput fileinput-new" data-provides="fileinput" style="">
                                        <label class="drp-title drp-label-title">Document</label>
                                        <!-- <label class="control-label">Document</label> -->
                                        <a href="#" data-toggle="tooltip" title="You can add multiple images with .png .jpg & .jpeg file format" class="data-tooltip-user"><span><i class="fa fa-info-circle"></i></span></a>
                                        <div class="image-preview" style="padding-left: 0px;">
                                          <div id="image_preview" ></div>
                                            <span class="btn default btn-file btn-file-view">
                                              <input type="file" id="tsk_document" name="tsk_document" class="profile-image btn-file-view" multiple >
                                            </span>
                                        </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="row ">
                                   <div class="col-md-12">
                                     <span class="sub-list-title">Related</span>
                                   </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                   <div class="form-group form-md-line-input form-md-floating-label">
                                    <label class="drp-title">People</label>
                                      <div class="input-icon">
                                          <i class="fa fa-user"></i>
                                          <select class="form-control select2 custom-select2" id="tsk_related_ppl" name="tsk_related_ppl" data-placeholder="">
                                            <option class="blank_option"></option>
                                          </select>
                                          <label class="custom-label">Select People</label>
                                      </div>                                          
                                   </div>
                                   <div class="help-block"></div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                       <label class="drp-title">Lead</label>
                                      <div class="input-icon">
                                         <i class="fas fa-user-tie"></i>
                                          <select class="form-control select2ppl" id="tsk_led_id" name="tsk_led_id" >
                                            <option></option>
                                          </select>
                                      </div>
                                      <div class="help-block"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group form-md-line-input form-md-floating-label">    
                                    <label class="drp-title">Account</label>
                                        <div class="input-icon">
                                            <i class="fa fa-industry icon-company"></i>
                                              <select class="form-control select2 custom-select2" name="tsk_related_cmp" id="tsk_related_cmp">
                                                <option></option>
                                              </select>
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
                <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_ADD)); ?>
                </form>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
      <!-- OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      
  <!-- END PAGE LEVEL PLUGINS -->
      <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/task/js/task-customs.js<?php echo $ci_asset_version ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/task/js/task-add.js<?php echo $ci_asset_version ?>" type="text/javascript"></script>
      
      <!-- <script type="text/javascript">
        $('#summernote_1').summernote({

          placeholder: 'start typing'
        });
      </script> -->

    </div>
  </body>
</html>
