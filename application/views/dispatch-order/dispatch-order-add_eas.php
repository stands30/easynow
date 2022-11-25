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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/dispatch-order/dispatch-order-custom.css<?php echo $global_asset_version; ?>">
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
                     <!-- Hidden fields -->
                      <div class="form-hidden-area">
                        <input type="text" name="dor_id" id="dor_id" class="hidden-field dor_id">
                        <input type="text" name="dor_tax_percent" id="dor_tax_percent" class="hidden-field gst_percent" value="<?php echo $tax_percent; ?>">
                        <input type="text" name="dor_product_tax" id="dor_product_tax" class="hidden-field product_tax" value="<?php echo $product_tax; ?>">
                        <input type="text" name="delete_form_prod_id" class="hidden-field delete_form_prod_id" >
                        <input type="text" name="dor_billing_cmp_state" id="dor_billing_cmp_state" class="hidden-field billing_cmp_state" >
                        <input type="text" name="dor_cmp_state" id="dor_cmp_state" class="hidden-field cli_cmp_state" value="">
                        <input type="text" name="dor_total_old_value" id="dor_total_old_value" class="hidden-field dor_total_old_value" value="">
                      </div>
                      <!-- Hidden fields -->
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Billing Company <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                              <i class="fas fa-building list-level"></i>
                              <select type="select" name="dor_billing_cmp" id="dor_billing_cmp" class="form-control billing_cmp" data-msg="Please Select Billing Company" required="">
                                <option class="blank_option"></option>
                              </select>                                                
                          </div>  
                          <span class="custom-error"></span>                                                                 
                        </div> 
                      </div>
                      
                      
                      
                      <div class="col-md-push-6 col-md-3">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <label class="drp-title">Date</label>
                          <div class="input-icon">
                            <input type="text" class="form-control dis_ord_date date date-picker" id="dor_date" name="dor_date" required="" data-msg="Please Select Date">
                            <i class="fa fa-calendar-alt"></i>
                          </div> 
                          <span class="custom-error"></span>                                                               
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Customer <span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                              <i class="fas fa-user list-level"></i>
                              <select name="dor_cmp_id" id="dor_cmp_id" class="form-control cmp_id" type="select">
                                <option class="blank_option"></option>
                              </select>                                                
                          </div> 
                          <span class="custom-error"></span>                                                                  
                        </div> 
                      </div>
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="dor_code" id="dor_code" value="" class="form-control  color-primary-light" required="" data-msg="Please Enter Code">
                            <label for="dor_code">Dispatch Order No</label>
                            <i class="fas fa-truck-loading list-level"></i>
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
                           // if(isset($dispatch_order->dor_tax_computation) && $dispatch_order->dor_tax_computation != '1') {  $tax_checked= ''; } 
                           ?>
                            <div class="md-checkbox input-label-text">
                                <input type="checkbox" id="dor_tax_computation" name="dor_tax_computation" class="md-check prod_tax_computation" value="<?php echo ACTIVE_STATUS; ?>"  >
                                <label for="dor_tax_computation">
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
                            <textarea type="textarea" class="form-control billing_addr" id="dor_billing_addr" name="dor_billing_addr" rows="2"  placeholder=""></textarea> 
                            <label for="dor_billing_addr">Billing Address</label>  
                            <i class="fas fa-map-marker list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" class="form-control billing_gst" name="dor_billing_gst" id="dor_billing_gst" value="" placeholder="">
                            <label for="dor_billing_gst">GST Number</label>  
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
                            <select class="form-control billing_people" id="dor_billing_people" name="dor_billing_people" type="select">
                                <option class="blank_option"></option>
                            </select>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>

                    </div>
                     <?php
                      if($shipping == '1') {
                
                           ?> 
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
                            <textarea  class="form-control shipping_addr" id="dor_shipping_addr" name="dor_shipping_addr" rows="2" placeholder=""></textarea> 
                            <label>Shipping Address</label>  
                           <i class="fas fa-map-marker list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                         </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" class="form-control shipping_gst" name="dor_shipping_gst" id="dor_shipping_gst" placeholder="">
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
                            <select class="form-control shipping_people " id="dor_shipping_people" name="dor_shipping_people" type="select">
                                <option class="blank_option"></option>
                            </select>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="row no-side-padding mb-20">
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
                                  <input type="text" name="dop_id" class="hidden-field prod_unique_id">
                                  <input type="text" name="dop_tax_percent" class="hidden-field prod_gst_percent">
                                </div>
                                <!-- Hidden fields -->
                                  <div class="col-md-12 no-side-padding">
                                    <div class="col-md-6">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                        <label class="drp-title reapeter-drp-title">Product <span class="asterix-error"><em>*</em></span></label>
                                        <div class="input-icon">    
                                            <select name="dop_prd_id"   class="form-control form-repeater-data prod_id" required="">
                                             <option class="blank_option"></option>                                      
                                            </select>                                                
                                        </div>
                                        <span class="custom-error"></span> 
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="input-icon input-label-text">
                                          <textarea name="dop_desc"  class="form-control repeater-textarea color-primary-light prod_desc " rows="1" required=""></textarea>                     
                                          <label class="repeater-label">Description <span class="asterix-error"><em>*</em></span></label>
                                        </div>
                                        <span class="custom-error"></span>
                                      </div>
                                    </div>
                                    
                                  </div>

                                    <?php if($product_size == '1') { ?>
                                  <div class="col-md-12 no-side-padding">
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">  
                                         <label class="drp-title">Variant <span class="asterix-error"><em>*</em></span></label>
                                        <div class="input-icon">
                                            <select name="dop_prv_id"   class="form-control prod_variant custom-select2"required="" data-msg="Please Select Variant">
                                             <option class="blank_option"></option>                                      
                                            </select>
                                        </div>
                                        <span class="custom-error"></span>
                                      </div>
                                    </div>
                                  <?php } ?>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon input-label-text">
                                            <input type="text" name="dop_rate" value="" class="form-control repeater-text  color-primary-light prod_rate numeric-decimal-format" required="">
                                            <label  class="repeater-label" for="dop_rate">Rate <span class="asterix-error"><em>*</em></span></label>
                                           
                                          </div>
                                          <span class="custom-error"></span>
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon input-label-text">
                                            <input type="text" name="dop_qty"  value="" class="form-control repeater-text  color-primary-light prod_qty numeric-format" required="">
                                            <label  class="repeater-label" for="dop_qty">Quantity <span class="asterix-error"><em>*</em></span></label>
                                           
                                          </div>
                                          <span class="custom-error"></span>
                                      </div>
                                    </div>
                                    

                                    <?php if($product_tax == '1') { ?>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label ">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Sub Total</label>
                                          <br>
                                          <span class="prod_sub_total_span bold">0.00</span>
                                          <input type="text" name="dop_sub_total"  class="content-hidden-field  prod_sub_total">


                                        </div>                    
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label ">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Tax</label>
                                          <br>
                                          <span class="prod_tax_span bold">0.00</span> <span class="prod_tax_percent_span"> (0%)</span>
                                          <input type="text" name="dop_tax"  class="content-hidden-field  prod_tax" >
                                        </div>                     
                                      </div>
                                    </div>
                                  <?php } ?>
                                    <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label ">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Total</label>
                                          <br>
                                          <span class="prod_total_span bold">0.00</span>
                                          <input type="text" name="dop_total" class="content-hidden-field  prod_total" >
                                        </div>                    
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
                      <!--</div>-->
                      
                    </div>
                    <div class="row row-qout">
                      <div class="col-md-8"></div>
                      <div class=" col-md-2 col-xs-6 label-qout">
                        <label class="control-label amt-disc">Sub Total</label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right">
                         <span class=" cal-value form_sub_total_span"><?php echo isset($dispatch_order->dor_sub_total_format) ? $dispatch_order->dor_sub_total_format:'0.00'; ?></span>
                      </div>
                    </div>

                    <div class="row row-qout">
                      <div class="col-md-8"></div>
                      <div class=" col-md-2 col-xs-6 label-qout">
                        <label class="control-label amt-disc form_gst_percent_span">Tax <?php echo ($product_tax != '1') ? '('.$tax_percent.' %)':''; ?></label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right">
                         <span class=" cal-value form_gst_span"><?php echo isset($dispatch_order->dor_gst_format) ? $dispatch_order->dor_gst_format:'0.00'; ?></span>
                      </div>
                    </div>

                    <div class="row row-qout ">
                      <div class="col-md-8"></div>
                      <div class=" col-md-2 col-xs-6 label-qout">
                        <label class="control-label amt-disc">Total</label>
                      </div>
                      <div class="col-md-2 col-xs-6 text-right">
                          <span class="bold cal-value form_total_span"><?php echo isset($dispatch_order->dor_total_format) ? $dispatch_order->dor_total_format:'0.00'; ?></span>
                      </div>
                    </div>
                    <div class="form-hidden-area">
                      <input type="text" name="dor_sub_total" id="dor_sub_total" class="content-hidden-field  form_sub_total">
                      <input type="text" name="dor_tax" id="dor_tax" class="content-hidden-field  form_gst">
                      <input type="text" name="dor_total" id="dor_total" class="content-hidden-field  form_total ">
                    </div> 
                 <?php if($dor_transport == '1') { ?>
                    <div class="row">
                       <div class="col-md-12">
                         <span class="sub-list-title repeater-list-title">Transport Details</span>
                       </div>
                    </div>
                    <div class="row repeter-design">
                      <div class="col-md-12 bg-div">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group form-md-radios custom-radio-div">
                            <label class="radio-title">Mode of transport</label>
                            <div class="md-radio-inline">
                              <?php echo getGenPrmResult('radio','dor_transport_mode','dor_transport_mode',1,'result'); ?>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon input-label-text">
                              <input type="text" name="dor_transport_name" id="dor_transport_name" value="" class="form-control  color-primary-light">
                              <label for="dor_transport_name">Transporter Name </label>
                              <!-- <i class="fas fa-boxes list-level"></i> -->
                              <i class="fas fa-truck-loading list-level"></i>
                            </div>
                            <span class="custom-error"></span>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon input-label-text">
                              <input type="text" name="dor_transport_approx_distance" id="dor_transport_approx_distance" value="" class="form-control  color-primary-light">
                              <label for="dor_transport_approx_distance">Approximate distance </label>
                              <i class="fas fa-street-view list-level"></i>
                            </div>
                            <span class="custom-error"></span>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <input type="text" name="dor_transport_id" id="dor_transport_id" value="" class="form-control  color-primary-light">
                              <label for="dor_transport_id">Transporter ID</label>
                              <i class="far fa-id-card list-level"></i>
                            </div>
                            <span class="custom-error"></span>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <input type="text" name="dor_transport_doc_no" id="dor_transport_doc_no" value="" class="form-control  color-primary-light">
                              <label for="dor_transport_doc_no">Transporter Doc No </label>
                              <i class="fas fa-file-alt list-level"></i>
                            </div>
                            <span class="custom-error"></span>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <input type="text" name="dor_transport_vehicle_no" id="dor_transport_vehicle_no" value="" class="form-control  color-primary-light">
                              <label for="dor_transport_vehicle_no">Vehicle Number </label>
                              <i class="fas fa-truck list-level"></i>
                            </div>
                            <span class="custom-error"></span>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group  form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <input type="text" class="form-control date date-picker" id="dor_transport_date" name="dor_transport_date"  data-msg="Please Select Date">
                              <label>Transport Date</label>
                              <i class="fa fa-calendar-alt"></i>
                            </div> 
                            <span class="custom-error"></span>                                                               
                          </div>
                        </div>

                      </div>
                    </div>
                    </div>
                  <?php } ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="dor_lr_no" id="dor_lr_no" value="" class="form-control  color-primary-light">
                            <label for="dis_ord_lr_no">LR No.</label>
                            <i class="fas fa-boxes list-level"></i>
                          </div>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <textarea type="text" class="form-control" id="dor_remark" name="dor_remark" rows="2" placeholder=""></textarea>       
                              <label>Remark</label> 
                              <i class="fa fa-comment list-level"></i>
                            </div>
                            <span class="custom-error"></span>
                          </div>
                      </div>
                    </div> 
                    <div class="row mb-50">
                      <!-- <div class="col-md-6 mb-40">
                        <div class="form-group">
                          <label class="drp-title repeater-title"><i class="fas fa-paperclip list-level"></i>Documents</label>
                            <div class=" form-group fileinput fileinput-new file-margin profile_pic" data-provides="fileinput" style="">
                                <div class="col-md-12 no-side-padding">
                                    <div id="image_preview" ></div>
                                    <span class="btn default btn-file">
                                    <input type="file" id="dor_document" name="dor_document[]" multiple="" class="profile-image">
                                </div>
                            </div> 
                        </div>
                      </div>  -->
                       <div class="col-md-6">
                          <div class="form-group fileinput fileinput-new" data-provides="fileinput" style="">
                              <label>Attachments 
                                <a href="#" data-toggle="tooltip" title="" class="data-tooltip-user" data-original-title="You can add multiple images with .png .jpg &amp; .jpeg file format"><span><i class="fa fa-info-circle"></i></span></a>
                              </label>                          
                              <div class="image-preview" style="padding-left: 0px;margin-top: 0px;">
                                <div id="image_preview" class=""></div>
                                  <span class="btn default btn-file btn-file-view">
                                    <input type="file" name="dor_document[]" id="dor_document" class="component-image btn-file-view" multiple=""> 
                                    <span class="error"></span>
                                  </span>
                              </div>
                          </div>
                        </div> 
                    </div>


                </div>
              </div>
               <?php $view_type = isset($dispatch_order->por_id) ? '':VIEW_TYPE_ADD;  ?>
              <?php $this->load->view('common/footer-buttons',array('view_type' => $view_type)); ?>   
              </form>
          </div>
        </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>      
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script type="text/javascript">
            var product_repeater_item     = <?php echo isset($dor_product) ? json_encode($dor_product):'[]'; ?>;
          $(document).ready(function(){
              var dispatch_order_data = <?php echo isset($dispatch_order) ? json_encode($dispatch_order):'{}'; ?>;
              
            displayFieldData('#custom_module_form',dispatch_order_data);
          });
        </script>
         <script src="<?php echo base_url(); ?>assets/module/dispatch-order/dispatch-order-form.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script type="text/javascript">
          $("#dor_date").datepicker({ 
           rtl: App.isRTL(),
              orientation: "auto bottom",
              autoclose: true,
              format: 'yyyy-mm-dd',
            }).on('changeDate', function(ev) {
              console.log('in here');
            $(this).valid();  // triggers the validation test
              $(this).addClass('edited');
          });

          $("#dor_transport_date").datepicker({ 
           rtl: App.isRTL(),
              orientation: "auto bottom",
              autoclose: true,
              format: 'yyyy-mm-dd',
            }).on('changeDate', function(ev) {
              console.log('in here');
            $(this).valid();  // triggers the validation test
            $(this).addClass('edited');
          });
             $('.component-image').change(function(e){
                     preview_image(e);
                  });
                  function preview_image(event) 
                  {
                      var total_file= $('.component-image')[0].files.length;
                       $('#image_preview').html('');
                      for(var i=0;i<total_file;i++)
                      {
                          var sizeInMB = ( event.target.files[i].size / (1024*1024)).toFixed(2);
                          $('#image_preview').append("<span class=\"\">" + "<a>" +event.target.files[i].name+"</a>  - " +sizeInMB+" Mb &nbsp;&nbsp;&nbsp;</span>");
                      }
                  }
         </script>
        <!-- OPTIONAL SCRIPTS -->
      </div>
</body>
</html>
