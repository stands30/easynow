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
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center mt-20">Add New Declaration</h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" id="declaration_add" class="col-md-push-2 col-md-8 form_add">
                  
                  <div class="row">
                     <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <textarea class="form-control color-primary-light" rows="2" id="dec_mission" name="dec_mission"></textarea>
                          <label for="dec_mission">Mission</label>
                          <i class="fas fa-bullseye list-level"></i>
                          <div class="help-block"></div>
                      </div>
                    </div>
                    
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <textarea class="form-control color-primary-light" rows="2" id="dec_vision" name="dec_vision"></textarea>
                          <label for="dec_vision">Vision</label>
                          <i class="fas fa-eye list-level"></i>
                          <div class="help-block"></div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                      <div class=" repeater-div">                       
                        <div class="row row-repeater repeater">
                          <div class="mt-repeater">
                            <div data-repeater-list="productrmlist">
                              <div class="row" data-repeater-item="">
                                <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                                  <div class="input-icon ">
                                    <textarea class="form-control color-primary-light" rows="2" id="dec_values" name="dec_values"></textarea>
                                      <label for="dec_values">Values</label>
                                      <i class="fas fa-hand-holding-heart icon-client list-level"></i>
                                      <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="form-group col-md-4 form-md-line-input form-md-floating-label">
                                  <div class="input-icon input-text-area">
                                    <input type="text" name="dec_order" value="" id="dec_order" class="form-control color-primary-light"  >
                                    <label for="dec_order">Order</label>
                                    <i class="fa fa-list list-level"></i>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                
                                <div class="col-md-2 cross delete-repeater dec-delete">
                                  <a id="btn-del" href="javascript:;" data-repeater-delete="" class="bold"> Delete <i class="fa fa-trash"></i></a>
                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="col-md-2 btn-row">
                            <div class="form-group ">
                                <a href="javascript:;" class="bold" data-repeater-create="">
                                Add More <i class="fa fa-plus "></i> </a>                           
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
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/form-repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      </div>
  </body>
</html>
