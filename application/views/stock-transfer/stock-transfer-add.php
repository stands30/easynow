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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/inventory/css/inventory-custom.css<?php echo $global_asset_version; ?>">
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- END PAGE LEVEL PLUGINS -->
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
                  <h3 class="page-title text-center">Add New Stock Transfer</h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                  <form role="form" id="module_form" class="col-md-12 form_edit">
                    <!-- Hidden fields -->
                    <div class="form-hidden-area">
                    </div>
                    <!-- Hidden fields -->
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <label class="drp-title">From Location  <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                              <i class="fas fa-map-marked-alt list-level"></i>
                              <select name="location_from" id="location_from" class="form-control piv_location" data-gen-grp="piv_location" required="">
                                <option>Please Select Location</option>
                              </select>                                                
                          </div>
                          <span class="custom-error"></span>                                                                      
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <label class="drp-title"> To Location  <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                              <i class="fas fa-map-marked-alt list-level"></i>
                              <select name="location_to" id="location_to" class="form-control piv_location" data-gen-grp="piv_location" required="">
                                <option>Please Select Location</option>
                              </select>                                                
                          </div>
                          <span class="custom-error"></span>                                                                      
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="piv_code" id="piv_code" value="" class="form-control  color-primary-light piv_code" required="">
                            <label for="piv_code">Code <span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-file-invoice-dollar color-dark-blue list-level"></i>
                          </div>
                          <span class="custom-error"></span>   
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Date <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                            <input type="text" class="form-control piv_date date date-picker" required="" data-msg="Please Select Date" id="piv_date" name="piv_date" required="">
                            <i class="fa fa-calendar-alt"></i>
                          </div> 
                          <span class="custom-error"></span>                                                                  
                        </div>
                      </div>
                      
                    </div>

                    <div class="row no-side-padding ">
                      <div class="col-md-12">
                        <div class=" repeater-div">
                          <div class="row">
                             <div class="col-md-12">
                               <span class="sub-list-title repeater-list-title">Add Products</span>
                             </div>
                          </div>
                          <div class="row row-repeater repeater repeter-design">
                            <div class="col-md-12 repeter-bg">
                               <div class="mt-repeater">
                                <div data-repeater-list="product_repeater_item">
                                  <div class="row product_repeater_item" data-repeater-item="product_repeater_item" >
                                    <!-- Hidden Fields -->
                                    <input type="text" name="piv_type_prd_id" class="piv_type_prd_id custom-hidden-fields">
                                    <!-- Hidden Fields -->
                                    <div class="col-md-12 no-side-padding">
                                      <div class="col-md-3">
                                        <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                          <label class="drp-title reapeter-drp-title">Product</label>
                                          <div class="input-icon">    
                                              <select name="piv_prd_id" class="form-control form-repeater-data prod_id"  required="" >
                                                <option>Please Select Product</option>                                   
                                              </select>                                                
                                          </div>
                                          <span class="custom-error"></span>    
                                        </div>
                                      </div>
                                      <?php if($product_size == '1') { ?>
                                       <div class="col-md-3">
                                        <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                          <label class="drp-title reapeter-drp-title">Size</label>
                                          <div class="input-icon">    
                                              <select name="piv_prv_id"  class="form-control form-repeater-data prod_variant"  required="" >
                                                <option> Select Size</option>                                    
                                              </select>                                                
                                          </div> 
                                          <span class="custom-error"></span>   
                                        </div>
                                      </div>
                                    <?php } ?>
                                      <div class="col-md-2">
                                        <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                          <div class="input-icon">
                                            <label class="drp-title pl-0 ml-0">Total Quantity</label>
                                            <br>
                                            <span class="piv_total_span bold"  data-piv_total="">0.00</span>
                                          </div>  
                                          <span class="custom-error"></span>                     
                                        </div>
                                      </div>
                                      <div class="col-md-2">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <div class="input-icon input-label-text">
                                              <input type="text" name="piv_qty"  value="" class="form-control repeater-text  color-primary-ligh prod_qty" required="">
                                              <label  class="repeater-label" for="piv_qty">Received</label>
                                             <!-- <i class="fas fa-balance-scale list-level"></i> -->
                                            </div>
                                            <span class="custom-error"></span>   
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12 no-side-padding">
                                      <div class="col-md-2 cross delete-repeater delete-repeater-custom">
                                        <a id="btn-del" href="javascript:;" data-repeater-delete="" class="bold"> Delete <i class="fa fa-trash"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row btn-row">
                                <div class="col-md-2">
                                  <div class="form-group ">
                                      <a href="javascript:;" class="bold" data-repeater-create="">
                                      Add More&nbsp;<i class="fa fa-plus "></i> </a>                           
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-40">
                      <div class="col-md-6">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <textarea name="piv_remark" id="piv_remark" class="form-control color-primary-light" rows="3" ></textarea>                     
                            <label>Remark</label>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                          </div>
                          <span class="custom-error"></span>   
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                          <label class="drp-title reapeter-drp-title">Managed By</label>
                          <div class="input-icon">    
                              <select type='select' name="piv_managed_by" id="piv_managed_by" class="form-control form-repeater-data managed_by" >
                                <option>Please Select Managed By</option>
                              </select>                                                
                          </div> 
                          <span class="custom-error"></span>   
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
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/form-repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/stockTransfer/stockTransfer_form.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- OPTIONAL SCRIPTS -->
        <script type="text/javascript">
          $("#piv_date").datepicker({ 
             rtl: App.isRTL(),
              orientation: "auto bottom",
              autoclose: true,
              format: 'yyyy-mm-dd',
            }).on('changeDate', function(ev) {
              console.log('in here');
            $(this).valid();  // triggers the validation test
              $(this).addClass('edited');
            // '$(this)' refers to '$("#datepicker")'
        });
              
            $(document).ready(function(){
              var stockTransfer_data = <?php echo isset($stockTransfer_data) ? json_encode($stockTransfer_data):'{}'; ?>;
            displayFieldData('#module_form',stockTransfer_data);
            });
        </script>
      </div>
</body>
</html>
