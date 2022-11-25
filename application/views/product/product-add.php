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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/product/css/product-custom.css<?php echo $global_asset_version ?>">
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
                  <h3 class="page-title text-center"><?php echo $title; ?>
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                  <form role="form" id="product_add" class="col-md-push-1 col-md-10 form_edit mb-50">
                    <!-- hidden fields -->
                  <div class="form-hidden-area">
                    <input type="text" class="hidden-field-form hidden-input-field content-hidden-field" name="prd_id" id="prd_id" value="<?php  echo isset($product->prd_id) ? $product->prd_id:'';?>">
                  </div>
                  <!-- hidden fields -->
                    <div class="row">
                      <div class="form-group col-md-4 form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="text" name="prd_name" id="prd_name" value="<?php if(isset($product->prd_name)) echo $product->prd_name; ?>" class="form-control  color-primary-light">
                          <label for="prd_name">Product Name<span class="asterix-error"><em>*</em></span></label>
                         <i class="fa fa-cart-plus list-level"></i>
                         <div class="help-block"></div>
                        </div>
                      </div>
                      <div class="form-group col-md-4 form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="text" name="prd_code" id="prd_code" value="<?php if(isset($product->prd_code)) echo $product->prd_code; ?>" class="form-control  color-primary-light">
                          <label for="prd_code">Product Code</label>
                         <i class="fas fa-qrcode color-dark-blue list-level"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                       <div class="form-group col-md-4 form-md-line-input form-md-floating-label">  
                         <label class="drp-title">Product Category<span class="asterix-error"><em>*</em></span></label>
                        <div class="input-icon">
                          <i class="fas fa-project-diagram list-level"></i>
                            <select name="prd_category" id="prd_category" class="form-control prd_category custom-select2" required="" data-gen-grp="prd_category">
                              <?php if(isset($product->prd_category))
                              { ?> 
                                <option value="<?php  echo isset($product->prd_category) ? $product->prd_category:''; ?>" selected=""><?php  echo isset($product->prd_category_name) ? $product->prd_category_name:''; ?></option>
                              <?php } ?>
                            <option class="blank_option"></option>
                            </select>
                            <div class="help-block"></div>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                    <?php if($product_unit == '1') { ?> 
                      <div class="form-group col-md-4 form-md-line-input form-md-floating-label">  
                         <label class="drp-title">Unit</label>
                        <div class="input-icon">
                          <i class="fas fa-ruler-combined color-pink list-level"></i>
                            <select name="prd_unit" id="prd_unit" class="form-control prd_unit custom-select2" data-gen-grp="<?php echo PRODUCT_UNIT; ?>">
                             <?php if(isset($product->prd_unit))
                              { ?> 
                                <option value="<?php  echo isset($product->prd_unit) ? $product->prd_unit:''; ?>" selected=""><?php  echo isset($product->prd_unit_name) ? $product->prd_unit_name:''; ?></option>
                              <?php } ?>
                            <option class="blank_option"></option>
                            </select>
                            <div class="help-block"></div>
                        </div>
                      </div>
                    <?php } ?>
                      <div class="form-group col-md-4 form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="prd_hsn_code" id="prd_hsn_code" value="<?php  echo isset($product->prd_hsn_code) ? $product->prd_hsn_code:''; ?>" class="form-control  color-primary-light">
                            <label for="prd_hsn_code">HSN</label>
                            <i class="fas fa-address-card list-level"></i>
                            <div class="help-block"></div>
                          </div>
                      </div>
                      <div class="form-group col-md-4 form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="prd_gst" id="prd_gst" value="<?php  echo isset($product->prd_gst) ? $product->prd_gst:''; ?>" class="form-control  color-primary-light">
                            <label for="prd_gst">Tax</label>
                            <i class="fas fa-id-card list-level"></i>
                            <div class="help-block"></div>
                          </div>
                      </div>
                    </div>
                    <div class="row no-side-padding">
                    <input type="text" name="delete_prv_id" id="delete_prv_id" class="hidden-field-form hidden-input-field content-hidden-field">
                      <div class="col-md-12">
                        <div class="row row-repeater repeater <?php echo ($product_size == '1') ? 'repeter-design':''; ?> ">
                         
                           <div class="col-md-12 <?php echo ($product_size == '1') ? 'repeter-bg':''; ?>">
                            <div class="mt-repeater">
                              <div data-repeater-list="product_variant">
                                <div class="row" data-repeater-item="product_list_item" >
                                  <!-- Hidden fields -->
                                    <div class="form-hidden-area">
                                      <input type="text" name="prv_id" class="hidden-field prv_id content-hidden-field">
                                    </div>
                                    <!-- Hidden fields -->
                                  <div class="col-md-12 no-side-padding">
                               <?php
                               $prd_size_col = 'col-md-4';
                                if($product_size == '1') {
                                $prd_size_col = 'col-md-3'; ?> 
                                     <div class="col-md-3">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="input-icon input-label-text">
                                          <input type="text" name="prv_sku"  value="" class="form-control  color-primary-light sku " required="">
                                          <label for="prv_sku" >SKU <span class="asterix-error"><em>*</em></span></label>
                                          <!-- <i class="fas fa-coins list-level"></i> -->
                                          <i class="fas fa-barcode list-level"></i>
                                          <span id="sku_result"></span>
                                          <div class="help-block"></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                        <label class="drp-title reapeter-drp-title">Variant <span class="asterix-error"><em>*</em></span></label>
                                         <div class="input-icon">
                                          <i class="fas fa-weight-hanging color-pink list-level"></i>
                                            <select name="prv_variant_id" class="form-control custom-select2 prv_variant_id" required="" data-gen-grp="<?php echo PRODUCT_SIZE; ?>" data-msg="Please Select Variant" >
                                            <option>Please Select Variant</option>
                                            </select>
                                            <div class="help-block"></div>
                                          </div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                    <div class="<?php echo $prd_size_col; ?>">
                                      <div class="form-group form-md-line-input form-md-floating-label repeter-floating-label">
                                        <div class="input-icon input-label-text repeater-input-block">
                                          <input type="text" name="prv_price"  value="" class="form-control  color-primary-light numeric-decimal-format" required="">
                                          <label for="prv_price" >Cost <span class="asterix-error"><em>*</em></span></label>
                                          <i class="fas fa-coins list-level"></i>
                                          <div class="help-block"></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="<?php echo $prd_size_col; ?>">
                                      <div class="form-group form-md-line-input form-md-floating-label repeter-floating-label">
                                        <div class="input-icon input-label-text repeater-input-block">
                                          <input type="text" name="prv_barcode"  value="" class="form-control  color-primary-light">
                                          <label for="prv_barcode" >Barcode</label>
                                          <i class="fas fa-qrcode color-dark-blue list-level"></i>
                                          <div class="help-block"></div>
                                        </div>
                                      </div>
                                    </div>
                           <?php if($product_size == '1') { ?> 
                                    <div class="col-md-2 cross delete-repeater delete-repeater-custom product-delete-repeater">
                                      <a id="btn-del" href="javascript:;" data-repeater-delete="" class="bold"> Delete <i class="fa fa-trash"></i></a>
                                    </div>
                                  <?php } ?>
                                  </div>

                                </div>
                              </div>
                            </div>
                           <?php if($product_size == '1') { ?> 
                            <div class="row btn-row">
                              <div class="col-md-12 ">
                                <div class="form-group rep-add-more">
                                    <a href="javascript:;" class="bold " data-repeater-create="">
                                    Add More&nbsp;<i class="fa fa-plus "></i> </a>                           
                                </div>
                              </div>
                            </div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <textarea name="prd_desc" id="prd_desc" class="form-control color-primary-light" rows="2  " ><?php  echo isset($product->prd_desc) ? $product->prd_desc:''; ?></textarea>                     
                          <label>Description</label>
                          <i class="fa fa-comments" aria-hidden="true"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div>

                </div>
              </div>
              <?php $view_type = isset($product->prd_id) ? '':VIEW_TYPE_ADD;  ?>
              <?php $this->load->view('common/footer-buttons',array('view_type' => $view_type)); ?>   
              </form>
          </div>
        </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url();?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script type="text/javascript">
              var product_variant = <?php echo isset($product_variant) ? json_encode($product_variant):'""'; ?>;
            </script>
        <script src="<?php echo base_url(); ?>assets/module/product/js/form-validation/product_add.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        
      </div>

</body>
</html>
