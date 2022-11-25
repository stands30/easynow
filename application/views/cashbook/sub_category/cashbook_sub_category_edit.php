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
    
   <link href="<?php echo base_url(); ?>assets/module/cashbook/sub_category/css/sub-category-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center mt-20">Edit New category
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" class="col-md-push-2 col-md-8 form_add" id="sub_category_edit">
                  <input type="hidden" name="csc_id" id="csc_id" value="<?php echo $cashbook_sub_category['csc_id'] ?>">
                   <div class="row">
                       <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                       <label class="drp-title">Category</label> 
                       <div class="input-icon">
                        <i class="fas fa-th-list"></i>
                          <select name="csc_cbc_id" id="csc_cbc_id" class="form-control category-select2 custom-select2" >
                             <option value="<?php echo $cashbook_sub_category['csc_cbc_id'] ?>" selected="selected"><?php echo $cashbook_sub_category['csc_cbc_name'] ?></option>
                          </select>
                          <label class="custom-label">Please Select Category</label>
                       </div>
                      </div>
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                         <label class="drp-title">&nbsp;</label> 
                        <div class="input-icon">
                          <input type="text" name="csc_name" id="csc_name" value="<?php echo $cashbook_sub_category['csc_name'] ?>" class="form-control color-primary-light" required>
                          <label>Sub Category Name  
                            <span class="asterix-error">
                              <em>*
                              </em>
                            </span>
                          </label>  
                          <i class="fas fa-list-ol list-level"></i>
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
        <script src="<?php echo base_url(); ?>assets/module/cashbook/sub_category/js/sub-category-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/cashbook/sub_category/validation/sub-category.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
  </body>
</html>
