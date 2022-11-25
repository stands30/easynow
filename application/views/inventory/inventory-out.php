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
                  <h3 class="page-title text-center"><?php echo $title; ?></h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                  <form role="form" id="inventory_module_form" class="col-md-12 form_edit">
                     <!-- Hidden fields -->
                    <div class="form-hidden-area">
                      <input type="text" name="piv_inv_type" id="piv_inv_type" class="hidden-field piv_inv_type" value="">
                      <input type="text" name="piv_type" id="piv_type" class="hidden-field piv_type" value="">
                    </div>
                    <!-- Hidden fields -->
                    <div class="row">
                      
                      
                      <div class="col-md-3">
                         <div class="form-group  form-md-line-input form-md-floating-label">
                          <label class="drp-title">Location  <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                              <i class="fas fa-map-marked-alt list-level"></i>
                              <select name="piv_location" id="piv_location" class="form-control piv_location" data-gen-grp="piv_location" required="">
                                <option class="blank_option"></option>
                              </select>                                                
                          </div>
                          <span class="custom-error"></span>                                                                      
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="piv_code" id="piv_code" value="" class="form-control  color-primary-light piv_code" required="">
                            <label for="piv_code"><?php echo $code_title; ?> <span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-file-invoice-dollar color-dark-blue list-level"></i>
                          </div>
                          <span class="custom-error"></span>   
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <label class="drp-title">Date</label>
                          <div class="input-icon">
                            <input type="text" id="piv_date" name="piv_date" class="form-control inv_date date date-picker" required="" data-msg="Please Select Date">
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
                                          <label class="drp-title reapeter-drp-title">Variant <span class="asterix-error"><em>*</em></span></label>
                                          <div class="input-icon">    
                                              <select name="piv_prv_id"  class="form-control form-repeater-data prod_variant"  required="" data-msg="Please Select Variant">
                                                <option> Select Variant</option>                                    
                                              </select>                                                
                                          </div> 
                                          <span class="custom-error"></span>   
                                        </div>
                                      </div>
                                    <?php } ?>
                                    <div class="col-md-2">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <div class="input-icon input-label-text">
                                              <input type="text" name="piv_price"  value="" class="form-control repeater-text  color-primary-light prod_price numeric-decimal-format" >
                                              <label  class="repeater-label" for="piv_price">Cost <span class="asterix-error"><em>*</em></span></label>
                                            </div>
                                            <span class="custom-error"></span>   
                                        </div>
                                      </div>
                                      <div class="col-md-2">
                                        <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                          <div class="input-icon">
                                            <label class="drp-title pl-0 ml-0">Total</label>
                                            <br>
                                            <span class="piv_pending_span bold" data-piv_total="">0.00</span>

                                          </div> 
                                          <span class="custom-error"></span>                      
                                        </div>
                                      </div>

                                      <div class="col-md-2">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <div class="input-icon input-label-text">
                                              <input type="text" name="piv_qty"  value="" class="form-control repeater-text  color-primary-ligh prod_qty numeric-format" required="">
                                              <label  class="repeater-label" for="piv_qty">Qty</label>
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
                          <label class="drp-title reapeter-drp-title">Received By</label>
                          <div class="input-icon">    
                              <select type="select" name="piv_managed_by" id="piv_managed_by" class="form-control form-repeater-data  managed_by" data-msg="Please Select Received By">
                                <option class="blank_option"></option>
                              </select>        
                              <i class="fa fa-user list-level"></i>                                        
                          </div>
                          <span class="custom-error"></span>    
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
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/inventory/inventory_out_form.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
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
                var inventory_module_data = <?php echo isset($inventory_data) ? json_encode($inventory_data):'{}'; ?>;
              displayFieldData('#inventory_module_form',inventory_module_data);
            var piv_prd_id           = '<?php echo isset($piv_prd_id) ? $piv_prd_id:'' ?>';
            var piv_prd_id_value     = '<?php echo isset($piv_prd_id_value) ? $piv_prd_id_value:'' ?>';
            var piv_price            = '<?php echo isset($piv_price) ? $piv_price:'' ?>';
            var unblocked_stock      = '<?php echo isset($unblocked_stock) ? $unblocked_stock:'' ?>';
            var total_stock          = '<?php echo isset($total_stock) ? $total_stock:'' ?>';
            var prd_option           = " <option value='"+piv_prd_id+"' selected=''>"+piv_prd_id_value+"</option>";
            if(piv_prd_id !='' && piv_prd_id_value !='')
            {
              $('.prod_id').html(prd_option);
              $('.prod_price').val(piv_price).addClass('edited');
              $('.piv_pending_span').html(total_stock+' / '+total_stock);
              $('.piv_pending_span').attr('data-piv_total',total_stock);
             
            }
              });
          </script>
      </div>
</body>
</html>
