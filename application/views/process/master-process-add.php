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
    <!-- OPTIONAL LAYOUT STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
   
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS -->
  
    <link href="<?php echo base_url(); ?>assets/module/process/css/process-customs.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <style type="text/css">
      
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
          <div class="portlet">
            <div class="row">
              <!-- END PAGE HEADER-->
              <form role="form" id="process-add">
              <div class="container-fluid">
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center">Add New Master Process
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <div class="col-md-10 col-md-offset-1 form_add">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="input" value="" class="form-control" placeholder="" required="">
                          <label>Input <span class="asterix-error"><em>*</em></span>                      
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                        <label>Description <span class="asterix-error"><em>*</em></span>
                        </label>
                        <div>
                          <div name="summernote" id="summernote_1"> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group fileinput fileinput-new" data-provides="fileinput" style="">
                          <label>Attachments</label><a href="#" data-toggle="tooltip" title="You can add multiple images with .png .jpg & .jpeg file format" class="data-tooltip-user"><span><i class="fa fa-info-circle"></i></span></a>
                          <div class="image-preview" style="padding-left: 0px;">
                            <div id="image_preview" ></div>
                              <span class="btn default btn-file btn-file-view">
                                <input type="file" id="ppl_profile_image" multiple="" name="ppl_profile_image" class="profile-image btn-file-view"> 
                              </span>
                              <span class="custom-error"></span>
                          </div>
                      </div>
                      <span class="asterix-error">
                        (Max Size 5 MB)
                      </span>
                    </div>
                  </div>
                  
                   
                </div>
                <div>                  
                </div>               
              </div>
              <footer class="foo_bar">
                <div class="foo_btn">
                  <button type="submit" class="btn btn_save">Save&nbsp;
                    <i class="fa fa-check">
                    </i>
                  </button>
                  <button type="button" class="btn btn_can" onclick="goBack()">Cancel&nbsp;
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
       <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js" type="text/javascript"></script>
        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
        </script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </body>
    </html>
