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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/order/css/order-custom.css<?php echo $global_asset_version; ?>">
    
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
                  <form role="form" id="custom_module_form" class="col-md-12 form_edit">
                    <div class="row">
                      <!-- Hidden fields -->
                      <div class="form-hidden-area">
                        <input type="text" name="ord_id" id="ord_id" class="hidden-field ord_id module_id">
                        <input type="text" name="ord_tax_percent" id="ord_tax_percent" class="hidden-field gst_percent" value="<?php echo $tax_percent; ?>">
                        <input type="text" name="ord_product_tax" id="ord_product_tax" class="hidden-field product_tax" value="<?php echo $product_tax; ?>">
                        <input type="text" name="delete_form_prod_id" class="hidden-field delete_form_prod_id" >
                        <input type="text" name="ord_billing_cmp_state" id="ord_billing_cmp_state" class="hidden-field billing_cmp_state" >
                        <input type="text" name="ord_cmp_state" id="ord_cmp_state" class="hidden-field cli_cmp_state" value="">
                        <input type="text" name="ord_total_old_value" id="ord_total_old_value" class="hidden-field ord_total_old_value" value="">
                      </div>
                      <!-- Hidden fields -->
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Billing Company <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                              <i class="fas fa-handshake icon-client list-level"></i>
                              <select type="select" name="ord_billing_cmp" id="ord_billing_cmp" class="form-control billing_cmp" data-msg="Please Select Company">
                                <option>Please Select Company</option>
                                <option class="blank_option"></option> 
                              </select>                                                
                          </div>
                          <span class="custom-error"></span>                                                                   
                        </div> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Lead </label>
                          <div class="input-icon">
                              <i class="fas fa-chalkboard-teacher icon-lead list-level"></i>
                              <select type="select" name="ord_led_id" id="ord_led_id" class="form-control cmp_id" data-msg="Please Select Lead">
                                <option>Please Select Lead</option>
                                <option class="blank_option"></option> 
                              </select>                                                
                          </div>
                          <span class="custom-error"></span>                                                                   
                        </div> 
                      </div>
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Client <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                              <i class="fas fa-handshake icon-client list-level"></i>
                              <select type="select" name="ord_cmp_id" id="ord_cmp_id" class="form-control cmp_id" data-msg="Please Select Client">
                                <option>Please Select Client</option>
                                <option class="blank_option"></option> 
                              </select>                                                
                          </div>
                          <span class="custom-error"></span>                                                                   
                        </div> 
                      </div>
                      <?php 
                      $date_class= '';
                      $ord_id = isset($order->ord_id) ? $order->ord_id:'';
                      if($ord_id != '')
                      {
                      $date_class= 'col-md-push-3';
                      }
                       if($ord_id == '')
                      {?>
                      <div class="col-md-3">
                        
                          <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label mb-0">
                            <div class="input-icon input-outsanding-icon">
                                <label class="drp-title ml-0">Outstanding</label>
                                <br>
                              <a href="" class="ots-link data-show" title="Check Outstanding Details">
                                  <i class="fas fa-rupee-sign list-level"></i><span class="ots_amt"></span>
                              </a>
                            </div>
                          </div>
                        
                      </div>
                    <?php } ?>
                      <div class="<?php echo $date_class; ?> col-md-3">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <label class="drp-title">Date</label>
                          <div class="input-icon">
                            <input type="text" class="form-control ord_date date date-picker" required="" id="ord_date"  name="ord_date" data-msg="Please Select Date">
                            <i class="fa fa-calendar-alt"></i>
                          </div>   
                          <span class="custom-error"></span>                                                             
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Order Type <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                              <i class="fas fa-file-medical"></i>
                              <select type="select" name="ord_type" id="ord_type" class="form-control ord_type" data-msg="Please Select Order Type" data-gen-grp="ord_type">
                                <option>Please Select Order Type</option>
                                <option class="blank_option"></option> 
                              </select>                                                
                          </div>
                          <span class="custom-error"></span>                                                                   
                        </div> 
                      </div>

                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="ord_code" id="ord_code" value="" class="form-control  color-primary-light" data-msg="Please enter Order No">
                            <label for="ord_code">Order No</label>
                            <i class="fas fa-boxes list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                     
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="ord_reference_no" id="ord_reference_no" value="" class="form-control  color-primary-light" data-msg="Please enter Reference No">
                            <label for="ord_reference_no"> Reference No</label>
                            <i class="fas fa-id-card list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Order Category <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                              <i class="fas fa-layer-group"></i>
                              <select type="select" name="ord_category" id="ord_category" class="form-control ord_category" data-msg="Please Select Order Category" data-gen-grp="ord_category">
                                <option>Please Select Order Category</option>
                                <option class="blank_option"></option> 
                              </select>                                                
                          </div>
                          <span class="custom-error"></span>                                                                   
                        </div> 
                      </div>
                      
                      
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="ord_title" id="ord_title" value="" class="form-control  color-primary-light" data-msg="Please Enter Title">
                            <label for="ord_title">Title</label>
                            <i class="fas fa-th-list list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>

                      <?php $tax_display_none = '';
                          if($tax_computation != '1') { 
                            $tax_display_none = 'element-hide'; }?> 
                          <div class="col-md-3">
                            <div class="form-group form-md-line-input form-md-floating-label <?php echo $tax_display_none; ?>">
                              <?php  //$tax_checked = 'checked="checked"';
                               // if(isset($quotation->qtn_tax_computation) && $quotation->qtn_tax_computation != '1') {  $tax_checked= ''; } 
                               ?>
                               <div class="md-checkbox input-label-text">
                                <input type="checkbox" id="ord_tax_computation" name="ord_tax_computation" class="md-check prod_tax_computation" value="<?php echo ACTIVE_STATUS; ?>"  >
                                <label for="ord_tax_computation">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span>Tax Computation</label>
                            </div>
                                                            
                            </div>
                          </div>


                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon input-textarea-text">
                            <textarea type="textarea" class="form-control billing_addr" id="ord_billing_addr" name="ord_billing_addr" rows="2"  placeholder="" data-msg="Please Enter Billing Address"></textarea> 
                          <label>Billing Address</label>  
                          <i class="fas fa-map-marker list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" class="form-control billing_gst " name="ord_billing_gst" id="ord_billing_gst" value="" placeholder="" data-msg="Please Enter Billing GST Number">
                            <label>GST Number</label>  
                            <i class="fas fa-id-card list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">People</label>
                          <div class="input-icon">
                            <i class="fa fa-user"></i>                          
                            <select type="select" class="form-control billing_people " id="ord_billing_people" name="ord_billing_people" data-msg="Please Select Billing People">
                              <option>Please Select People</option>
                              <option class="blank_option"></option> 
                            </select>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                    </div>

                    <div class="row ">
                      <div class="col-md-12">
                         <div class="md-checkbox">
                             <input type="checkbox" id="clone_check" name="clone_check" class="md-check"  onclick="return cloneBillingAddressToShippingAddress()" value="<?php echo ACTIVE_STATUS; ?>">
                              <label for="clone_check">
                                  <span></span>
                                  <span class="check"></span>
                                  <span class="box"></span>Billing Address Same as Shipping Address </label>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-textarea-text">
                            <textarea  class="form-control shipping_addr"  id="ord_shipping_addr" name="ord_shipping_addr" rows="2" placeholder="" data-msg="Please Enter Shipping Address"></textarea> 
                          <label>Shipping Address</label>  
                           <i class="fas fa-map-marker list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" class="form-control shipping_gst"  name="ord_shipping_gst" id="ord_shipping_gst" value="" placeholder="" data-msg="Please Enter Shipping GST No">
                            <label>GST Number</label> 
                            <i class="fas fa-id-card list-level"></i> 
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">People</label>
                          <div class="input-icon">
                            <i class="fa fa-user"></i>                          
                            <select type="select" class="form-control  shipping_people" id="ord_shipping_people" name="ord_shipping_people" data-msg="Please Select Shipping People">
                              <option>Please Select People</option>
                              <option class="blank_option"></option>
                            </select>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row no-side-padding">
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
                                <div class="row product_repeater_item"  data-repeater-item="product_repeater_item" >
                                    <!-- Hidden fields -->
	                                <div class="form-hidden-area">
	                                  <input type="text" name="orp_id" class="hidden-field prod_unique_id">
	                                  <input type="text" name="orp_tax_percent" class="hidden-field prod_gst_percent">
	                                </div>
	                                <!-- Hidden fields -->
                                  <div class="col-md-12 no-side-padding">
                                  	  <div class="col-md-6">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                        <label class="drp-title reapeter-drp-title">Product <span class="asterix-error"><em>*</em></span></label>
                                          <div class="input-icon">    
                                              <select name="orp_prd_id" class="form-control form-repeater-data prod_id" data-msg="Please Select Product">
                                                <option>Please Select Product</option>
                                              </select>                                                
                                          </div> 
                                          <span class="custom-error"></span>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="input-icon input-label-text">
                                          <textarea name="orp_desc"   class="form-control repeater-textarea color-primary-light prod_desc" rows="1" data-msg="Please Enter Description"></textarea>                     
                                          <label class="repeater-label">Description <span class="asterix-error"><em>*</em></span></label>
                                        </div>
                                        <span class="custom-error"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 no-side-padding">
                                  

                                    <?php if($product_size == '1') { ?>
                                     <div class="col-md-3">
                                       <div class="form-group form-md-line-input form-md-floating-label">  
                                          <label class="drp-title">Size <span class="asterix-error"><em>*</em></span></label>
                                          <div class="input-icon">
                                              <select name="orp_prv_id"  class="form-control prod_variant custom-select2" data-msg="Please Select Size">
                                              <option>Select Size</option>
                                              </select>
                                          </div>
                                          <span class="custom-error"></span>
                                      </div>
                                    </div>
                                  <?php } ?>
                                    <div class="col-md-3">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon input-label-text">
                                            <input type="text" name="orp_rate" value="" class="form-control repeater-text  color-primary-light prod_rate" required="">
                                            <label  class="repeater-label" for="orp_rate">Rate <span class="asterix-error"><em>*</em></span></label>
                                           
                                          </div>
                                          <span class="custom-error"></span>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon input-label-text">
                                            <input type="text" name="orp_qty" id="orp_qty" value="" class="form-control repeater-text  color-primary-light prod_qty" data-msg="Please Enter Quantity">
                                            <label  class="repeater-label" for="orp_qty">Quantity <span class="asterix-error"><em>*</em></span></label>
                                           <!-- <i class="fas fa-balance-scale list-level"></i> -->
                                          </div>
                                          <span class="custom-error"></span>
                                      </div>
                                    </div>
                                    <?php if($product_tax == '1') { ?>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Amount</label>
                                          <br>
                                          <span class="prod_amt_span bold">0.00</span>
                                          <input type="text" name="orp_prd_amt" class="hidden-field prod_amt">
                                        </div>
                                      </div>
                                    </div>
                                <?php } ?>
                                  </div>

                                  <div class="col-md-12 no-side-padding">
                                   

                                    <?php if($product_tax == '1') { ?>
                                    <div class="col-md-2">
                                        <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                          <label class="drp-title drp-title-repeater ">Discount Type</label>
                                          <div class="input-icon">
                                              <!-- <i class="fas fa-ruler-combined color-pink list-level"></i> -->
                                            <select class="form-control prod_disc_type" name="orp_disc_type" data-msg="Please Select Discount Type" data-gen-grp="finance_disc_type">
                                              <option value="0" selected="">Please Select</option>
                                            </select>
                                          </div>
                                           <span class="custom-error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon input-label-text">
                                            <input type="text" name="orp_disc"  value="" class="form-control repeater-text  color-primary-light prod_disc" data-msg="Please Enter Discount">
                                            <label  class="repeater-label" for="ord_dis">Discount</label>
                                          </div>
                                          <span class="custom-error"></span>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Discounted Amt</label>
                                          <br>
                                          <span class="prod_disc_amt_span bold">0.00</span>
                                          <input type="text" name="orp_disc_amt" class="hidden-field prod_disc_amt">
                                        </div>                
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Sub Total</label>
                                          <br>
                                           <span class="prod_sub_total_span bold">0.00</span>
                                          <input type="text" name="orp_sub_total"  class="content-hidden-field  prod_sub_total">
                                        </div>                    
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Tax</label>
                                          <br>
                                          <span class="prod_tax_span bold">0.00</span> <span class="prod_tax_percent_span"> (0%)</span>
                                          <input type="text" name="orp_tax"  class="content-hidden-field  prod_tax" >
                                        </div>                     
                                      </div>
                                    </div>
                                  <?php } ?>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Total</label>
                                          <br>
                                         <span class="prod_total_span bold">0.00</span>
                                          <input type="text" name="orp_total" class="content-hidden-field  prod_total" >
                                        </div>                    
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 no-side-padding">
                                    <div class="col-md-6 cross delete-repeater delete-repeater-custom">
                                      <a id="btn-del" href="javascript:;" data-repeater-delete="" class="bold"> Delete <i class="fa fa-trash"></i></a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row btn-row">
                              <div class="col-md-2 ">
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
                 <?php if($product_tax != '1') { ?>
                    <div class="row row-qout">
                      <div class="col-md-8"></div>
                      <div class=" col-md-2 col-xs-6 label-qout">
                        <label class="control-label amt-disc">Amount</label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right">
                         <span class=" cal-value form_amt_span"><?php echo isset($order->ord_amt_format) ? $order->ord_amt_format:'0.00'; ?></span>
                      </div>
                    </div>
                    <div class="row row-qout">
                      <div class="col-md-4"></div>
                      <div class=" col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label rep-float-label fixed-labels">
                          <label class="drp-title">Discount Type</label>
                          <div class="input-icon">
                            <select type="select" class="form-control prod_disc_type" name="ord_disc_type" id="ord_disc_type" type="select" tabindex="-1" aria-hidden="true" data-msg="Please select discount type" data-gen-grp="finance_disc_type">
                              <option class="blank_option"></option>
                            </select>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label rep-float-label fixed-labels">
                          <div class="input-icon input-label-text">
                              <input type="text" placeholder="" class="form-control repeater-text prod_disc numeric-decimal-format" name="ord_disc" id="ord_disc">
                            <label class="control-label amt-disc">Discount</label>
                          </div> 
                          <span class="custom-error"></span>                                      
                        </div>
                      </div>
                      <div class=" col-md-2 col-xs-6 label-qout pt-28">
                        <label class="control-label amt-disc">Disc Amt </label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right pt-28">
                         <span class=" cal-value form_disc_amt_span"><?php echo isset($order->ord_disc_amt_format) ? $order->ord_disc_amt_format:'0.00'; ?></span>
                      </div>

                    </div>
                  <?php } ?>
                    <div class="row row-qout">
                      <div class="col-md-8"></div>
                      <div class=" col-md-2 col-xs-6 label-qout">
                        <label class="control-label amt-disc">Sub Total</label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right">
                         <span class=" cal-value form_sub_total_span"><?php echo isset($order->ord_sub_total_format) ? $order->ord_sub_total_format:'0.00'; ?></span>
                      </div>
                    </div>

                    <div class="row row-qout">
                      <div class="col-md-8"></div>
                      <div class=" col-md-2 col-xs-6 label-qout">
                        <label class="control-label amt-disc form_gst_percent_span">Tax <?php echo ($product_tax != '1') ? '('.$tax_percent.' %)':''; ?></label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right">
                         <span class=" cal-value form_gst_span"><?php echo isset($order->ord_tax_format) ? $order->ord_tax_format:'0.00'; ?></span>
                      </div>
                    </div>

                    <div class="row row-qout ">
                      <div class="col-md-8"></div>
                      <div class=" col-md-2 col-xs-6 label-qout">
                        <label class="control-label amt-disc">Total</label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right">
                          <span class="bold cal-value form_total_span"><?php echo isset($order->ord_total_format) ? $order->ord_total_format:'0.00'; ?></span>
                      </div>
                    </div>
                    <div class="form-hidden-area">
                      <input type="text" name="ord_amt" id="ord_amt" class="content-hidden-field  form_amt">
                      <input type="text" name="ord_disc_amt" id="ord_disc_amt" class="content-hidden-field  form_disc_amt">
                      <input type="text" name="ord_sub_total" id="ord_sub_total" class="content-hidden-field  form_sub_total">
                      <input type="text" name="ord_tax" id="ord_tax" class="content-hidden-field  form_gst">
                      <input type="text" name="ord_total" id="ord_total" class="content-hidden-field  form_total ">
                    </div> 

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="ord_payment_due_days" id="ord_payment_due_days" value="" class="form-control  color-primary-light" data-msg="Please Enter Payment Due Days">
                            <label for="ord_payment_due_days">Payment Due Days</label>
                            <i class="far fa-calendar-check list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="ord_dispatch_due_days" id="ord_dispatch_due_days" value="" class="form-control  color-primary-light" data-msg="Dispatch Due Days">
                            <label for="ord_dispatch_due_days">Dispatch Due Days</label>
                            <i class="far fa-calendar-check list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <textarea class="form-control" id="ord_remark" name="ord_remark" rows="2" placeholder="" data-msg="Please Enter Remark"></textarea>       
                              <label>Remark</label> 
                              <i class="fa fa-comment list-level"></i>
                            </div>
                            <span class="custom-error"></span>
                          </div>
                      </div>
                    </div>
                    <div class="row mb-40">
                      <div class="col-md-12">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <textarea type="textarea" class="form-control" id="ord_terms" name="ord_terms" rows="2"  placeholder="" data-msg="Please Enter Terms & Condition"></textarea>              
                              <label>Terms & Condition </label>
                              <i class="fa fa-comments list-level"></i> 
                            </div>
                            <span class="custom-error"></span>
                          </div>
                      </div>  
                    </div>   
                </div>
              </div>
               <?php $view_type = isset($order->ord_id) ? '':VIEW_TYPE_ADD;  ?>
              <?php $this->load->view('common/footer-buttons',array('view_type' => $view_type)); ?>   
              </form>
          </div>
        </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url();?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script type="text/javascript">
           var disc_type_rs         = '<?php echo QUOTATION_DISC_TYPE_RS; ?>';
           var disc_type_percentage = '<?php echo QUOTATION_DISC_TYPE_PERCENTAGE; ?>';
           var product_repeater_item     = <?php echo isset($ord_product) ? json_encode($ord_product):'[]'; ?>;
          $(document).ready(function(){
           var order_obj = <?php echo isset($order) ? json_encode($order):'{}'; ?>;
           displayFieldData('#custom_module_form',order_obj);
           var ots_amt     = <?php echo isset($ots_amt) ? json_encode($ots_amt):'""'; ?>;
           var ots_link     = <?php echo isset($ots_link) ? json_encode($ots_link):'""'; ?>;
           $('.ots_amt').html(ots_amt);
           $('.ots-link').attr('href',ots_link);
         });
          
        </script>
        <script src="<?php echo base_url(); ?>assets/module/order/order_form.js" type="text/javascript"></script>
        <script type="text/javascript">
          $("#ord_date").datepicker({ 
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

        </script>
        <!-- OPTIONAL SCRIPTS -->
      </div>
</body>
</html>
