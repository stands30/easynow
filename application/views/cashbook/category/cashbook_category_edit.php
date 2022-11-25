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
    
   <link href="<?php echo base_url(); ?>assets/module/cashbook/category/css/category-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />

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
                  <h3 class="page-title text-center">Edit New category
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" class="col-md-push-2 col-md-8 form_add" id="category_edit">
                  <input type="hidden" name="cbc_id" id="cbc_id" value="<?php echo $cashbook_category['cbc_id'] ?>">
                   <div class="row">
                       <div class="form-group col-md-6 form-md-line-input form-md-floating-label ">
                          <!-- <label>Cashbook Type
                              <span class="asterix-error">
                                <em>*
                                </em>
                            </span>
                          </label> -->
                          <select name="cbc_type" id="cbc_type" class="form-control type-select2"  autocomplete="off">
                             <option value="<?php echo $cashbook_category['cbc_type'] ?>" selected="selected"><?php echo $cashbook_category['cbc_types'] ?></option>
                          </select>
                         
                          <div class="help-block">
                         </div>
                      </div>
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="cbc_name" id="cbc_name" value="<?php echo $cashbook_category['cbc_name'] ?>" class="form-control color-primary-light" required>
                            <label>Category Name  
                            <span class="asterix-error">
                              <em>*
                              </em>
                            </span>
                          </label>
                          <i class="fas fa-list-ul list-level"></i>
                        </div>
                        <div class="help-block">
                       </div>
                      </div>
                    </div>
                  </div>   
              </div>
              <footer class="foo_bar">
                <div class="foo_btn">
                  <button type="submit" class="btn btn_save">Save&nbsp;
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
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/module/cashbook/category/js/category-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/cashbook/category/validation/category.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
  </body>
</html>
