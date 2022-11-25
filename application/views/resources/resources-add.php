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

    <link href="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
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
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center mt-20">Add New Resources</h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" id="resource_add" class="col-md-push-2 col-md-8 form_add">
                  <div class="row">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                      <label class="drp-title">Resources Type</label>
                      <div class="input-icon">
                        <i class="fas fa-user-tie list-level"></i>
                          <select name="resources_type" id="resources_type" class="form-control resources_type custom-select2">
                          <option>Please Select Resources Type</option>
                          <option>Marketing Tool</option>
                          <option>Book </option>
                          <option>Quote</option>
                        </select>
                        <div class="help-block"></div>
                      </div>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="resources_title" value="" id="resources_title" class="form-control color-primary-light"  >
                        <label for="resources_title">Title</label>
                        <i class="fas fa-th-list"></i>
                        <div class="help-block"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                            <label class="drp-title drp-label-title">Description</label>
                            <textarea name="summernote" id="summernote_1"></textarea>
                          <div class="help-block"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="resources_author" value="" id="resources_author" class="form-control color-primary-light"  >
                        <label for="resources_author">Author</label>
                        <i class="fa fa-user icon-people"></i>
                        <div class="help-block"></div>
                      </div>
                    </div>

                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="resources_order" value="" id="resources_order" class="form-control color-primary-light"  >
                        <label for="resources_order">Order</label>
                        <i class="fas fa-list-ol list-level"></i>
                        <div class="help-block"></div>
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon input-label-text">
                        <input type="text" name="resources_buynow" value="" id="resources_buynow" class="form-control color-primary-light"  >
                        <label for="resources_buynow">Buy Now Link</label>
                        <i class="fas fa-globe"></i>
                        <div class="help-block"></div>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label fileinput fileinput-new" data-provides="fileinput" style="">
                          <label class="drp-title drp-label-title">Image</label>
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

                  <div class="row">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                      <label class="drp-title">Tags</label>
                      <div class="input-icon">
                        <i class="fas fa-tags "></i>
                          <select name="resources_category" id="resources_category" class="form-control resources_category custom-select2" >
                          <option>Please Select Tags</option>
                          <option>Marketing</option>
                          <option>IT </option>
                          <option>Finance</option>
                        </select>
                        <div class="help-block"></div>
                      </div>
                    </div> 

                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon input-label-text">
                        <input type="text" name="resources_slug" value="" id="resources_slug" class="form-control color-primary-light"  >
                        <label for="resources_slug">Slug</label>
                        <i class="fas fa-database"></i>
                        <div class="help-block"></div>
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
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>        
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
        <!-- END OPTIONAL SCRIPTS -->
       
    
      </div>
  </body>
</html>
