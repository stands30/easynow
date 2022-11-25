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
                <div class="text-center title_wrap">
                  <input type="hidden" name="emp_id" id="emp_id" class="form-control form_c" value="<?php if(isset($teamdata->emp_id)) echo $teamdata->emp_id; ?>" >
                  <h3 class="page-title text-center mt-20">Edit Product</h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form role="form" id="product_edit" class="col-md-push-2 col-md-8 form_edit">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="prd_name" id="prd_name" class="form-control form_c" value="<?php if(isset($productdata->prd_name)) echo $productdata->prd_name; ?>">
                            <input type="hidden" name="prd_id" id="prd_id" value="<?php if(isset($productdata->prd_id)) echo $productdata->prd_id; ?>">
                            <label>Product Name<span class="asterix-error"><em>*</em></span></label>
                            <i class="fa fa-cart-plus"></i>
                        </div>
                          <div class="help-block"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="prd_code" id="prd_code" value="" class="form-control  color-primary-light">
                          <label for="prd_code">Product Code</label>
                         <i class="fas fa-qrcode color-dark-blue list-level"></i>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group  form-md-line-input form-md-floating-label">  
                        <label class="drp-title">Product Category</label>
                        <div class="input-icon">
                          <i class="fas fa-project-diagram list-level"></i>
                            <select name="prd_category" id="prd_category" class="form-control prd_category custom-select2">
                            <option>Please Select Product Category</option>
                              <option>Category 1</option>
                              <option>Category 2</option>
                              <option>Category 3</option>
                            </select>
                            <div class="help-block"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="number" name="prd_price" id="prd_price" value="<?php if(isset($productdata->prd_price)) echo $productdata->prd_price; ?>" class="form-control form_c">
                          <label>Cost</label>  
                          <i class="fas fa-coins list-level"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="prd_hsn_code" id="prd_hsn_code" value="<?php if(isset($productdata->prd_hsn_code)) echo $productdata->prd_hsn_code; ?>" class="form-control form_c">
                            <label>Hsn Code</label> 
                            <i class="fas fa-address-card list-level"></i>
                          </div>
                          <div class="help-block"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon"> 
                            <input type="text" name="prd_gst" id="prd_gst" value="<?php if(isset($productdata->prd_gst)) echo $productdata->prd_gst; ?>" class="form-control form_c">
                            <label>GST</label>  
                            <i class="fas fa-id-card list-level"></i>
                          </div>
                          <div class="help-block"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">  
                         <label class="drp-title">Size</label>
                        <div class="input-icon">
                          <i class="fas fa-weight-hanging color-pink list-level"></i>
                            <select name="prd_size" id="prd_size" class="form-control prd_size custom-select2">
                            <option>Please Select Size</option>
                              <option>XL</option>
                              <option>L</option>
                              <option>XS</option>
                            </select>
                            <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">  
                         <label class="drp-title">Unit</label>
                        <div class="input-icon">
                          <i class="fas fa-ruler-combined color-pink list-level"></i>
                            <select name="prd_unit" id="prd_unit" class="form-control prd_unit custom-select2">
                            <option>Please Select Unit</option>
                              <option>inches</option>
                              <option>cms</option>
                              <option>meter</option>
                            </select>
                            <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <textarea name="value_desc" id="value_desc" class="form-control color-primary-light" rows="2  " ></textarea> 
                          <label>Description</label>
                          <i class="fa fa-comments" aria-hidden="true"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                    </div>
                  </div>
                  <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_EDIT)); ?>
                </form>
            </div>
          </div>
          <!-- END CONTAINER -->
          <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?>
            <!-- OPTIONAL SCRIPTS -->        
           
            <script src="<?php echo base_url(); ?>assets/module/product/js/form-validation/product_edit.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
