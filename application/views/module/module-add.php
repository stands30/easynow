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
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />   
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
                  <h3 class="page-title text-center">Add Module
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                  <form role="form" id="product_add" class="col-md-push-2 col-md-8 form_add">
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <input type="text" name="prd_hsn_code" id="prd_hsn_code" class="form-control form_c">  
                              <label>Title</label>
                              <i class="fas fa-th-list list-level"></i>
                            </div>                            
                            <div class="help-block"></div>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                      <div class="form-group form-group form-md-line-input form-md-floating-label">
                        <!-- <label>Modules</label> -->
                        <div class="input-icon">
                            <select class="form-control select2">  
                            <option value="1">Daily Planning</option>
                            <option value="2">Genral Parameter</option>
                            <option value="1">People</option>
                            <option value="2">Tag</option>
                          </select>
                        </div>
                          
                      </div>
                    </div>
                    </div>
                </div>
              </div>
              <footer class="foo_bar">
                  <div class="foo_btn">
                      <button class="btn btn_save">Save&nbsp;<i class="fa fa-check"></i></button>
                      <button class="btn btn_can">Cancel&nbsp;<i class="fa fa-times"></i></button>
                  </div>
              </footer>
              </form>
          </div>
        </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/product/js/form-validation/product_add.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
      </div>


</body>
</html>
