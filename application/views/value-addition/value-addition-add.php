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
              <div class="container-fluid">

                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Add Value Addition
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                  <form role="form" id="value_add" class="col-md-push-2 col-md-8 form_edit">
                    <div class="row">
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon input-label-text">
                        <input type="text" name="value_name" id="value_name" value="" class="form-control  color-primary-light">
                        <label for="value_name">Value Addition Name
                          <span class="asterix-error">
                            <em>*
                            </em>
                          </span>
                        </label>
                       <i class="fa fa-cart-plus"></i>
                      </div>
                    </div>
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                       <label class="drp-title">Type</label>
                      <div class="input-icon">
                        <i class="fas fa-address-card list-level"></i>
                          <select name="value_type" id="value_type" class="form-control value_type custom-select2">
                          <option>Please Select Type</option>
                          <option>Presentation</option>
                          <option>Workshop</option>
                          <option>Learning</option>
                        </select>
                        <!-- <label for="event_managed_by" class="custom-label">Please Select Managed by<span class="asterix-error"><em>*</em></span></label> -->
                          <div class="help-block"></div>
                      </div>
                    </div>

                      
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="value_link" id="value_link" value="http://" class="form-control  color-primary-light">
                          <label for="value_link">Link
                          </label>
                          <i class="fas fa-globe"></i>
                        </div>
                        <div class="help-block"></div>  
                      </div>
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <textarea name="value_desc" id="value_desc" class="form-control color-primary-light" rows="2  " ></textarea>                     
                          <label>Description</label>
                          <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                      </div>
                     
                    </div>

                    <div class="col-md-12">
                      <div class=" repeater-div">                       
                        <div class="row row-repeater repeater">
                          <div class="mt-repeater">
                            <div data-repeater-list="productrmlist">
                              <div class="row" data-repeater-item="">
                                <div class="col-md-6 mt-20">
                                  <div class="form-group">
                                    <label class="drp-title repeater-title">Image</label>
                                    <div class=" form-group fileinput fileinput-new file-margin profile_pic" data-provides="fileinput" style="">
                                        <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
                                            <div id="image_preview" ></div>
                                            <span class="btn default btn-file">
                                            <input type="file" id="ppl_profile_image" name="ppl_profile_image" class="profile-image">
                                        </div>
                                    </div> 
                                  </div>
                                </div>
                                
                                <div class="col-md-2 cross delete-repeater">
                                  <a id="btn-del" href="javascript:;" data-repeater-delete="" class="bold"> Delete <i class="fa fa-trash"></i></a>
                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="col-md-2 btn-row mt-20">
                            <div class="form-group ">
                                <!-- <label class="control-label" style="display: block;"></label> -->
                                <a href="javascript:;" class="bold" data-repeater-create="">
                                Add More&nbsp;<i class="fa fa-plus "></i> </a>                           
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
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/form-repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      </div>


</body>
</html>
