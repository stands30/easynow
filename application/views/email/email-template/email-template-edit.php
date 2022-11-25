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
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?>    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/email-template/css/email-template-custom.css<?php echo $global_asset_version ?>">   
  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
    <div class="clearfix"></div>
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
                  <h3 class="page-title text-center">Edit Email Template
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" id="email_temp_edit" class="col-md-push-1 col-md-10 form_add">
                  <div class="row">
                     

                    <div class="col-md-12">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                            <input type="hidden" name="emt_id" id="emt_id" value="<?php if(isset($emailTemp_data->emt_id) and !empty($emailTemp_data->emt_id)) echo $emailTemp_data->emt_id ?>">
                            <input type="text" name="emt_title" id="emt_title" value="<?php if(isset($emailTemp_data->emt_title) and !empty($emailTemp_data->emt_title)) echo $emailTemp_data->emt_title ?>" class="form-control" data-msg="PLease enter title" required placeholder="Title">
                            <label>Title<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-th-list"></i>
                            <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                   <!--  <div class="col-md-6">
                      <div class="form-group ">
                        <div class="input-icon">                            
                            <input type="text" name="emt_sender" id="emt_sender" class="form-control" value="<?php if(isset($emailTemp_data->emt_sender) and !empty($emailTemp_data->emt_sender)) echo $emailTemp_data->emt_sender ?>" data-msg="PLease enter sender name" required placeholder="Sender Name">
                            <label>Sender Name<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-user"></i>
                            <div class="help-block"></div>
                        </div>                      
                      </div>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                            <input type="text" name="emt_subject" id="emt_subject" class="form-control" value="<?php if(isset($emailTemp_data->emt_subject) and !empty($emailTemp_data->emt_subject)) echo $emailTemp_data->emt_subject ?>" data-msg="PLease enter subject" required placeholder="Subject">
                            <label>Subject<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-envelope-square"></i>
                        </div>
                      </div>
                    </div>
                  </div>
<!-- 
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">                            
                            <input type="email" name="emt_cc" id="emt_cc" value="<?php if(isset($emailTemp_data->emt_cc) and !empty($emailTemp_data->emt_cc)) echo $emailTemp_data->emt_cc ?>" class="form-control" placeholder="CC">
                            <label>CC</label>
                            <i class="fas fa-envelope"></i>
                            <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">                          
                          <input type="email" name="emt_reply_to" id="emt_reply_to" class="form-control" value="<?php if(isset($emailTemp_data->emt_reply_to) and !empty($emailTemp_data->emt_reply_to)) echo $emailTemp_data->emt_reply_to ?>" placeholder="Reply To">
                          <label>Reply To</label>
                          <i class="fas fa-envelope"></i>
                          <div class="help-block"></div>
                        </div>                       
                      </div>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="drp-title drp-label-title">Description<span class="asterix-error"><em>*</em></span></label>
                          <textarea name="summernote" id="summernote_1" data-msg="PLease enter description" required><?php if(isset($emailTemp_data->emt_description) and !empty($emailTemp_data->emt_description)) echo $emailTemp_data->emt_description ?></textarea>
                          <div class="help-block"></div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="drp-title drp-label-title">Attachments</label>
                        <a href="#" data-toggle="tooltip" title="You can add multiple images with .png .jpg & .jpeg file format" class="data-tooltip-user"><span><i class="fa fa-info-circle"></i></span></a>
                        <div class="image-preview" style="padding-left: 0px;">
                          <div id="image_preview" ></div>
                            <span class="btn default btn-file btn-file-view">
                              <input type="file" name="emt_document" id="emt_document" class="profile-image btn-file-view" multiple >
                            </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <footer class="foo_bar">
                <div class="foo_btn">
                  <button type="submit" class="btn btn_save" data-loading-text="<i class='fa fa-spinner'></i> Saving...">Save&nbsp;
                    <i class="fa fa-check">
                    </i>
                  </button>
                  <button type="button" class="btn btn_can">Cancel&nbsp;
                    <i class="fa fa-times">
                    </i>
                  </button>
                </div>
              </footer>
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
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/module/email-template/js/form-validation/email-temp-edit.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
  </body>
</html>
