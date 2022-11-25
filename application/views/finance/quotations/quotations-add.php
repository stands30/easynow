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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />  
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/finance/quotation/css/quotation-customs.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
          <div class="portlet portlet-fluid-background">
            <div class="row">
              <div class="container-fluid">
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center mt-20"><?php echo $title; ?>
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" class="add-title  col-md-12 form_add" id="quotation_form">
                  <!-- hidden fields -->
                  <div class="form-hidden-area">
                    <input type="text" class="hidden-field-form hidden-input-field" name="qtn_id" id="qtn_id" value="<?php  echo isset($quotation->qtn_id) ? $quotation->qtn_id:'';?>">
                    <input type="text" class="hidden-field-form hidden-input-field" name="qtn_billing_cmp_state" id="qtn_billing_cmp_state" value="">
                    <input type="text" class="hidden-field-form hidden-input-field" name="qtn_cmp_state" id="qtn_cmp_state" value="0">
                    <input type="text" class="hidden-field-form hidden-input-field" name="qtn_tax_percent" id="qtn_tax_percent" value="<?php echo $finance_tax; ?>">
                    <input type="text" class="hidden-field-form hidden-input-field" name="qtn_product_tax" id="qtn_product_tax" value="<?php echo $finance_product_tax; ?>">
                  </div>
                  <!-- hidden fields -->
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                        <i class="fas fa-th-list list-level"></i>                        
                          <input type="text" class="form-control" name="qtn_code" id="qtn_code" value="<?php if(isset($qtn_code)) echo $qtn_code; ?>"  placeholder="" required="" data-msg="Please enter quotation number">
                        <label>Quotation Number</label>  
                        </div>
                          <span class="custom-error"></span>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Billing Company <span class="asterix-error"><em>*</em></span></label>                        
                        <div class="input-icon">
                          <select class="form-control " id="qtn_billing_cmp" name="qtn_billing_cmp" required="" data-msg="Please select Billing Company">
                            <option class="blank_option"></option>
                          </select>
                          <i class="fas fa-industry list-level"></i>
                        </div>
                          <span class="custom-error"></span>
                      </div>
                    </div>
                    <div class="col-md-push-3 col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label edited">
                          <div class="input-icon input-label-text">
                            <input type="text" class="form-control date date-picker " id="qtn_date" name="qtn_date" placeholder=""  required="" value="<?php echo isset($qtn_date) ? $qtn_date:''; ?>" data-msg="Please select date" readonly="">
                                <i class="fa fa-calendar"></i>
                         <label>Date <span class="asterix-error"><em>*</em></span></label>
                          </div> 
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <?php 
                  $quot_title_class = 'col-md-6';
                  $quot_currency_class = 'col-md-3';
                  $quot_account_class = 'col-md-3';
                  $quot_lead_class = 'col-md-3';
                  $quot_shipping_class = 'col-md-3';
                    if($quot_currency == '1' && $quot_shipping != '1')
                    {
                        $quot_title_class = 'col-md-9';
                        $quot_currency_class = 'col-md-3';
                    }
                    else if($quot_currency != '1' && $quot_shipping == '1')
                    {
                      
                        $quot_shipping_class = 'col-md-6';
                    }
                   

                  ?>
                  <div class="row">
                    <div class="<?php echo $quot_title_class; ?>">
                      <div class="form-group form-md-line-input form-md-floating-label" style="margin-bottom: 10px;">
                        <div class="input-icon input-label-text">
                          <input type="text" class="form-control" name="qtn_title" id="qtn_title" value="<?php  echo isset($quotation->qtn_title) ? $quotation->qtn_title:'';?>" placeholder="" required="" data-msg="Please enter title">
                          <label>Title <span class="asterix-error"><em>*</em></span></label>  
                        <i class="fas fa-th-list list-level"></i>
                        </div>
                          <span class="custom-error"></span>
                       </div>
                    </div>
                    <?php if($quot_currency == '1') { ?> 
                    <div class="<?php echo $quot_currency_class; ?>">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Currency</label>                        
                        <div class="input-icon">
                          <i class="far fa-money-bill-alt icon-lead"></i>
                          <select class="form-control " id="qtn_currency" name="qtn_currency" data-gen-grp="finance_currency">
                            <option class="blank_option"></option>
                            <option value="<?php  echo isset($quotation->qtn_currency) ? $quotation->qtn_currency:'';?>" selected="selected"><?php  echo isset($quotation->qtn_currency_name) ? $quotation->qtn_currency_name:'';?></option>
                          </select>
                        <!-- <label>Currency Type</label>   -->
                        </div>
                        <span class="custom-error"></span>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($quot_shipping == '1') { ?> 
                    <div class="<?php echo $quot_shipping_class; ?>">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Shipping</label>                        
                        <div class="input-icon">
                          <i class="fab fa-telegram-plane icon-lead"></i>  
                          <select class="form-control " id="qtn_shipping" name="qtn_shipping" data-gen-grp="finance_shipping"> 
                            <option class="blank_option"></option>
                            <option value="<?php  echo isset($quotation->qtn_shipping) ? $quotation->qtn_shipping:'';?>" selected="selected"><?php  echo isset($quotation->qtn_shipping_name) ? $quotation->qtn_shipping_name:'';?></option>
                          </select>
                        </div>
                        <span class="custom-error"></span>
                          <!-- <label>Shipping Through</label> -->
                      </div>
                    </div>
                    <?php } ?>
                  <!-- </div> -->
                  <!-- <div class="row"> -->
                    <div class="<?php echo $quot_lead_class; ?>">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Lead</label>
                        <div class="input-icon">
                          <i class="fa fa-user"></i>                          
                          <select class="form-control " id="qtn_led_id" name="qtn_led_id">
                          <option class="blank_option"></option> 
                          <?php if(isset($quotation->qtn_led_id)) { ?> 
                          <option value="<?php  echo isset($quotation->qtn_led_id) ? $quotation->qtn_led_id:'';?>" selected="selected"><?php  echo isset($quotation->lead_name) ? $quotation->lead_name:'';?></option>
                          <?php } ?>
                          </select>
                        </div>
                        <span class="custom-error"></span>
                      </div>
                    </div>
                    <div class="<?php echo $quot_account_class; ?>">
                      <div class="form-group form-md-line-input form-md-floating-label" style="margin-bottom: 10px;">
                        <label class="drp-title">Account</label>                        
                        <div class="input-icon">
                          <i class="fas fa-user-tie icon-lead"></i>                            
                          <select class="form-control " id="qtn_cmp_id" name="qtn_cmp_id" required="" data-msg="Please select Account"> 
                            <option class="blank_option"></option>
                          </select>
                        </div>
                          <span class="custom-error"></span>
                      </div>
                    </div>
                    <?php $tax_display_none = '';
                    if($quot_tax_computation != '1') { 
                      $tax_display_none = 'computation-hidden'; }?> 
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label <?php echo $tax_display_none ?>">
                        <?php  $tax_checked = 'checked="checked"';
                         if(isset($quotation->qtn_tax_computation) && $quotation->qtn_tax_computation != '1') {  $tax_checked= ''; } ?>
                          <div class="md-checkbox input-label-text">
                              <input type="checkbox" id="qtn_tax_computation" class="md-check " value="<?php echo ACTIVE_STATUS; ?>" <?php echo $tax_checked; ?> >
                              <label for="qtn_tax_computation">
                                  <span></span>
                                  <span class="check"></span>
                                  <span class="box"></span>Tax Computation</label>
                          </div>
                         <!-- $tax_display_none = 'hidden-field-form'; -->
                        <!-- <div class="input-icon">
                          <input type="checkbox" checked class="make-switch" data-on-text="Yes" data-off-text="No" data-size="small"><br>
                        <label class="control-label">Tax Computation</label><br>  
                        </div> -->
                        
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group  form-md-line-input form-md-floating-label">
                        <div class="input-icon input-textarea-text">
                          <textarea type="text" class="form-control" id="qtn_billing_addr" name="qtn_billing_addr" rows="2"  placeholder=""><?php  echo isset($quotation->qtn_billing_addr) ? $quotation->qtn_billing_addr:'';?></textarea> 
                        <label>Billing Address</label>  
                        <i class="fas fa-map-marker list-level"></i>
                          <span class="custom-error"></span>
                        </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group  form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="text" class="form-control " name="qtn_billing_gst" id="qtn_billing_gst" value="<?php  echo isset($quotation->qtn_billing_gst) ? $quotation->qtn_billing_gst:'';?>" placeholder="">
                          <label>GST Number</label>  
                          <i class="fas fa-id-card list-level"></i>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">People</label>
                        <div class="input-icon">
                          <i class="fa fa-user"></i>                          
                          <select class="form-control " id="qtn_billing_people" name="qtn_billing_people">
                            <option class="blank_option"></option> 
                            <option value="<?php  echo isset($quotation->qtn_billing_people) ? $quotation->qtn_billing_people:'';?>" selected="selected"><?php  echo isset($quotation->qtn_billing_people_name) ? $quotation->qtn_billing_people_name:'';?></option>
                          </select>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php if($quot_shipping_address == '1') {
                  $addr_clone_checked = '';
                      if(isset($quotation->qtn_billing_addr) && isset($quotation->qtn_shipping_addr) && isset($quotation->qtn_billing_gst) && isset($quotation->qtn_shipping_gst) && isset($quotation->qtn_billing_people) && isset($quotation->qtn_shipping_people))
                      {
                        if($quotation->qtn_billing_addr == $quotation->qtn_shipping_addr && $quotation->qtn_billing_gst == $quotation->qtn_shipping_gst && $quotation->qtn_billing_people == $quotation->qtn_shipping_people) {  $addr_clone_checked= 'checked="checked"'; }
                      }
                           ?> 
                  <div class="row ">
                    <div class="col-md-12">
                      <div class="md-checkbox">
                        <input type="checkbox" id="clone_check" class="md-check" <?php echo $addr_clone_checked; ?> onclick="return cloneBillingAddressToShippingAddress()">
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
                          <textarea type="text" class="form-control" id="qtn_shipping_addr" name="qtn_shipping_addr" rows="2" placeholder=""><?php  echo isset($quotation->qtn_shipping_addr) ? $quotation->qtn_shipping_addr:'';?></textarea> 
                          <label>Shipping Address</label>  
                          <i class="fas fa-map-marker list-level"></i>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group  form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="text" class="form-control" name="qtn_shipping_gst" id="qtn_shipping_gst" value="<?php  echo isset($quotation->qtn_shipping_gst) ? $quotation->qtn_shipping_gst:'';?>" placeholder="">
                          <label>GST Number</label> 
                          <i class="fas fa-id-card list-level"></i>
                          <span class="custom-error"></span> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">People</label>
                        <div class="input-icon">
                          <i class="fa fa-user"></i>                          
                          <select class="form-control " id="qtn_shipping_people" name="qtn_shipping_people">
                            <option class="blank_option"></option>
                            <option value="<?php  echo isset($quotation->qtn_shipping_people) ? $quotation->qtn_shipping_people:'';?>" selected="selected"><?php  echo isset($quotation->qtn_shipping_people_name) ? $quotation->qtn_shipping_people_name:'';?></option>
                          </select>
                          <span class="custom-error"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                    <?php } ?>
                  <div class="row">
                    <input type="text" name="delete_qtp_id" id="delete_qtp_id" class="hidden-field-form hidden-input-field">
                      <div class=" repeater-div ">
                        <div class="row">
                           <div class="col-md-12">
                             <span class="sub-list-title">Add Products</span>
                           </div>
                        </div>
                        <div class="row row-repeater repeater">
                          <div class="mt-repeater">
                            <div data-repeater-list="quotation_product">
                              <div class="row quot_product_div" data-repeater-item="quotation_product_item" >
                                <!-- Hidden fields -->
                                <div class="form-hidden-area">
                                  <input type="text" name="qtp_id" class="hidden-field qtp_id">
                                  <input type="text" name="qtp_prd_gst" class="hidden-field qtp_prd_gst">
                                </div>
                                <!-- Hidden fields -->
                                 <div class="col-md-12  no-side-padding">
                                    <div class="col-md-6 no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                      <label class="drp-title drp-title-repeater">Product<span class="asterix-error"><em>*</em></span></label>                             
                                      <div class="input-icon">
                                         <select class="form-control repeater-custom-select qtp_product" name="qtp_prd_id"  tabindex="-1" aria-hidden="true" required="" data-msg="Please select product">
                                          <option class="blank_option"></option>
                                        </select>
                                      <!-- <label>Product</label> --> 
                                      </div>
                                      <span class="custom-error"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-6 no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                      <div class="input-icon input-label-text">
                                        <textarea type="text" class="form-control repeater-textarea qtp_desc"  name="qtp_desc" rows="1" placeholder=""></textarea> 
                                        <label class="repeater-label">Product Description</label>  
                                      </div>
                                      <span class="custom-error"></span>
                                     </div>
                                  </div>
                                 </div>
                                 <?php 
                                 $prod_adtn_field_class = 'col-md-3';
                                 if($finance_product_size == '1' && $finance_product_unit == '1')
                                 {
                                   $prod_adtn_field_class = 'col-md-2';
                                 }
                                 elseif($finance_product_size == '1')
                                 {
                                   $prod_adtn_field_class = 'col-md-3';
                                 }
                                 else if($finance_product_unit == '1')
                                 {
                                    $prod_adtn_field_class = 'col-md-3';
                                 }
                                  ?>
                                 <div class="col-md-12 no-side-padding">
                                  <?php if($finance_product_size == '1'){ ?>
                                  <div class="col-md-3 no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                      <label class="drp-title drp-title-repeater">Size</label>                             
                                      <div class="input-icon">
                                         <select class="form-control repeater-custom-select qtp_size" name="qtp_size"  tabindex="-1" aria-hidden="true"  data-msg="Please select size">
                                            <option value="0" selected="">Please Select</option>
                                          <option class="blank_option"></option>
                                        </select>
                                      </div>
                                      <span class="custom-error"></span>
                                    </div>
                                  </div>
                                  <?php }
                                  if($finance_product_unit == '1'){ ?>
                                  <div class="col-md-3 no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                      <label class="drp-title drp-title-repeater">Unit</label>                             
                                      <div class="input-icon">
                                         <select class="form-control repeater-custom-select qtp_unit" name="qtp_unit"  tabindex="-1" aria-hidden="true"  data-msg="Please select unit">
                                            <option value="0" selected="">Please Select</option>
                                          <option class="blank_option"></option>
                                        </select>
                                      </div>
                                      <span class="custom-error"></span>
                                    </div>
                                  </div>
                                <?php } ?>
                                  <div class="<?php echo $prod_adtn_field_class; ?> no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                      <div class="input-icon input-label-text">
                                        <input type="text" pattern="[0-9]+" class="form-control repeater-text qtp_rate numeric-decimal-format" placeholder="" name="qtp_rate"  required="" data-msg="Please enter rate">
                                      <label class="repeater-label">Rate<span class="asterix-error"><em>*</em></span></label>  
                                      </div>
                                      <span class="custom-error"></span>
                                    </div>
                                  </div>
                                  <div class="<?php echo $prod_adtn_field_class; ?> no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                      <div class="input-icon input-label-text">
                                         <input type="text" pattern="[0-9]+" class="form-control repeater-text qtp_qty numeric-format" placeholder=" " name="qtp_qty" value="1" required="" data-msg="Please enter qty">
                                      <label class="repeater-label"> Quantity<span class="asterix-error"><em>*</em></span></label> 
                                      </div>
                                      <span class="custom-error"></span>
                                    </div>
                                  </div>
                             <?php if($finance_product_tax == '1'){ ?> 
                                  <div class="<?php echo $prod_adtn_field_class; ?> no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                      <div class="input-icon">
                                        <label class="drp-title pl-0 ml-0">Amount</label>
                                        <br>
                                        <span class="qtp_prd_amt_span bold">0.00</span>
                                      </div>                 
                                        <input type="text" class="hidden-field qtp_prd_amt" name="qtp_prd_amt">
                                      <!--   <span class="text-danger"></span> -->
                                    </div>
                                  </div>
                                 
                                </div>
                                <div class="col-md-12 no-side-padding">
                                  <div class="col-md-2 no-side-mobile-padding">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                        <label class="drp-title drp-title-repeater ">Discount Type</label>
                                        <div class="input-icon">
                                          <select class="form-control qtn_disc_type" name="qtp_disc_type" tabindex="-1" aria-hidden="true" data-minimum-results-for-search="Infinity">
                                            <option value="0" selected="">Please Select</option>
                                            <option class="blank_option"></option>
                                          </select>
                                          <span class="custom-error"></span>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-2 no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label rep-float-label">
                                      <div class="input-icon input-label-text">
                                          <input type="text" pattern="" placeholder="" class="form-control repeater-text qtp_disc numeric-decimal-format" name="qtp_disc" value="">
                                          <label class="repeater-label">Discount</label>
                                          <span class="custom-error"></span>
                                      </div>                                       
                                    </div>
                                  </div>
                                  <div class="col-md-2 no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                      <div class="input-icon">
                                        <label class="drp-title pl-0 ml-0">Discounted Amt</label>
                                        <br>
                                        <span class="qtp_disc_amt_span bold">0.00</span>
                                      </div>                    
                                        <input type="text" name="qtp_disc_amt" class="qtp_disc_amt hidden-field">
                                        <span class="text-danger"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-2 no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                      <div class="input-icon">
                                        <label class="drp-title pl-0 ml-0">Sub Total</label>
                                        <br>
                                        <span class="qtp_sub_total_span bold">0.00</span>
                                      </div>                    
                                        <input type="text" name="qtp_sub_total" class="qtp_sub_total hidden-field">
                                    </div>
                                  </div>
                                  <div class="col-md-2 no-side-mobile-padding">
                                    <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                      <div class="input-icon">
                                        <label class="drp-title pl-0 ml-0">Tax</label>
                                        <br>
                                        <span class="qtp_tax_span bold">0.00</span> <span class="qtp_tax_percent_span"> (0%)</span>
                                      </div>                     
                                      <input type="text" name="qtp_tax" class="qtp_tax hidden-field">
                                    </div>
                                  </div>
                             <?php } ?>
                                  <div class="col-md-2 no-side-mobile-padding">
                                      <div class="form-group form-md-line-input form-md-floating-label rep-float-label rep-fixed-label">
                                        <div class="input-icon">
                                          <label class="drp-title pl-0 ml-0">Total</label>
                                          <br>
                                          <span class="qtp_total_span bold">0.00</span>
                                        </div>                              
                                          <input type="text" name="qtp_total" class="qtp_total hidden-field">
                                      </div>
                                  </div>
                                </div> 
                                <div class="col-md-12 no-side-padding">
                                  <div class="col-md-2 cross pull-right ">
                                    <a id="btn-del" href="javascript:;" data-repeater-delete="" class="bold qtp_delete"> Delete <i class="fa fa-trash"></i></a>
                                  </div>
                                </div>
                                
                                
                               
                                
                              </div>
                            </div>
                          </div>
                          <div class="row btn-row">
                            <div class="col-md-2 no-side-mobile-padding">
                              <div class="form-group ">
                                <!-- <label class="control-label" style="display: block;"></label> -->
                                <a href="javascript:;" class="bold" data-repeater-create="">
                                Add More&nbsp;<i class="fa fa-plus "></i> </a>                           
                            </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                             <?php if($finance_product_tax != '1'){ ?> 
                        <div class="row row-qout">
                            <div class="col-md-8"></div>
                            <div class=" col-md-2 col-xs-6 label-qout">
                              <label class="control-label amt-disc mb-0">Amount</label>
                            </div>
                            <div class="col-md-2 col-xs-6 span-qout">
                              <span class=" cal-value qtn_amt_span mb-0 "><?php  echo isset($quotation->qtn_amt) ? number_format($quotation->qtn_amt,2):'0.00';?></span>
                              <input type="text" name="qtn_amt" id="qtn_amt" class="hidden-field-form qtn_amt" value="<?php  echo isset($quotation->qtn_amt) ? $quotation->qtn_amt:'';?>">
                            </div>
                        </div>
                       <div class="row row-qout">
                          <div class="col-md-4"></div>
                         <div class="col-md-2">
                            <div class="form-group form-md-line-input form-md-floating-label rep-float-label fixed-labels">
                              <label class="drp-title">Discount Type</label>
                              <div class="input-icon">
                                <select class="form-control qtn_disc_type" name="qtn_disc_type" id="qtn_disc_type" tabindex="-1" aria-hidden="true" data-minimum-results-for-search="Infinity">
                                  <option value="0" selected="">Please Select</option>
                                  <option value="<?php  echo isset($quotation->qtn_disc_type) ? $quotation->qtn_disc_type:'';?>" selected="selected"><?php  echo isset($quotation->qtn_disc_type_name) ? $quotation->qtn_disc_type_name:'';?></option>
                                  <option class="blank_option"></option>
                                </select>
                                <span class="custom-error"></span>
                              </div>
                            </div>
                          </div>
                           <div class="col-md-2">
                              <div class="form-group form-md-line-input form-md-floating-label rep-float-label fixed-labels">
                                <div class="input-icon input-label-text">
                                    <input type="text" placeholder="" class="form-control repeater-text qtn_disc numeric-decimal-format" name="qtn_disc" id="qtn_disc" value="<?php  echo isset($quotation->qtn_disc) ? $quotation->qtn_disc:'';?>">
                                  <label class="control-label amt-disc">Discount</label>
                                  <span class="custom-error"></span>
                                </div>                                       
                              </div>
                            </div>
                          <div class=" col-md-2 col-xs-6 label-qout pt-28">
                            <label class="control-label amt-disc">Disc Amt</label>
                          </div>
                          <div class="col-md-2 col-xs-6 pt-28 span-qout">
                            <span class=" cal-value qtn_disc_amt_span"><?php  echo isset($quotation->qtn_disc_amt) ? number_format($quotation->qtn_disc_amt,2):'0.00';?></span>
                              <input type="text" name="qtn_disc_amt" id="qtn_disc_amt" class="hidden-field-form qtn_disc_amt" value="<?php  echo isset($quotation->qtn_disc_amt) ? $quotation->qtn_disc_amt:'';?>">
                              <span class="custom-error"></span>
                          </div>
                       </div>
                     <?php } ?>
                       <div class="row row-qout">
                            <div class="col-md-8"></div>
                            <div class=" col-md-2 col-xs-6 label-qout">
                              <label class="control-label amt-disc">Sub Total</label>
                            </div>
                            <div class="col-md-2 col-xs-6 span-qout">
                              <span class=" cal-value qtn_sub_total_span"><?php  echo isset($quotation->qtn_sub_total) ? number_format($quotation->qtn_sub_total,2):'0.00';?></span>
                               <input type="text" name="qtn_sub_total" id="qtn_sub_total" class="hidden-field-form hidden-input-field qtn_sub_total" value="<?php  echo isset($quotation->qtn_sub_total) ? $quotation->qtn_sub_total:'0.00';?>">
                               <span class="custom-error"></span>
                            </div>
                        </div>
                        <div class="row row-qout">
                            <div class="col-md-8"></div>
                            <div class=" col-md-2 col-xs-6 label-qout">
                              <label class="control-label amt-disc">Tax <?php  if($finance_product_tax != '1'){ echo '('.$finance_tax.' %)';} ?></label>
                            </div>
                            <div class="col-md-2 col-xs-6 span-qout">
                              <span class=" cal-value qtn_tax_span"><?php  echo isset($quotation->qtn_tax) ? number_format($quotation->qtn_tax,2):'0.00';?></span>
                               <input type="text" name="qtn_tax" id="qtn_tax" class="hidden-field-form hidden-input-field qtn_tax" value="<?php  echo isset($quotation->qtn_tax) ? $quotation->qtn_tax:'0.00';?>">
                            </div>
                        </div>
                        <div class="row row-qout">
                            <div class="col-md-8"></div>
                            <div class=" col-md-2 col-xs-6 label-qout">
                              <label class="control-label amt-disc">Total</label>
                            </div>
                            <div class="col-md-2 col-xs-6 span-qout">
                              <span class="bold cal-value qtn_total_span"><?php  echo isset($quotation->qtn_total) ? number_format($quotation->qtn_total,2):'0.00';?></span>
                               <input type="text" name="qtn_total" id="qtn_total" class="hidden-field-form hidden-input-field qtn_total" value="<?php  echo isset($quotation->qtn_total) ? $quotation->qtn_total:'0.00';?>">
                               <input type="text" name="qtn_total_old_value" id="qtn_total_old_value" class="hidden-field-form hidden-input-field qtn_total_old_value" value="<?php  echo isset($quotation->qtn_total) ? $quotation->qtn_total:'0.00';?>">
                            </div>
                        </div>
                      </div>
                  
                  <!-- below -->
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <input type="text" name="qtn_reference" class="form-control" id="qtn_reference" placeholder="" value="<?php  echo isset($quotation->qtn_reference) ? $quotation->qtn_reference:'';?>">        
                              <label>Reference</label> 
                              <i class="fas fa-id-card-alt"></i>
                              <span class="custom-error"></span>
                            </div>
                          </div>
                      </div>
                     
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="drp-title drp-label-title">Payment Terms </label>
                       <textarea type="text" class="form-control" id="qtn_payment_terms" name="qtn_payment_terms" rows="2"  placeholder=""><?php  echo isset($quotation->qtn_payment_terms) ? $quotation->qtn_payment_terms:'';?></textarea>    
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <textarea type="text" class="form-control" id="qtn_internal_remark" name="qtn_internal_remark" rows="2" placeholder=""><?php  echo isset($quotation->qtn_internal_remark) ? $quotation->qtn_internal_remark:'';?></textarea>       
                            <label>Internal Remark</label> 
                            <i class="fa fa-comment list-level"></i>
                            <span class="custom-error"></span>
                          </div>
                        </div>
                      </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <textarea type="text" class="form-control" id="qtn_external_remark" name="qtn_external_remark" rows="2"  placeholder=""><?php  echo isset($quotation->qtn_external_remark) ? $quotation->qtn_external_remark:'';?></textarea>              
                            <label>External Remark (Note) </label>
                            <i class="fa fa-comments list-level"></i>
                            <span class="custom-error"></span> 
                          </div>
                        </div>
                    </div>  
                  </div> 
                 </div>
               </div>
                <?php 
                $view_type = isset($quotation->qtn_id) ? '':VIEW_TYPE_ADD;
                $this->load->view('common/footer-buttons',array('view_type' => $view_type)); ?>   
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>            
    </div>
        
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?> 
        <!-- OPTIONAL SCRIPTS -->
         <script src="<?php echo base_url();?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo $global_asset_version ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version ?>" type="text/javascript">
        </script>
         <script src="<?php echo base_url();?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-bootstrap-switch.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script type="text/javascript">
          var quotation_product = <?php if(isset($quotation_product)) { echo json_encode($quotation_product); } else { echo '""'; } ?>;
           
         </script>
         <script src="<?php echo base_url(); ?>assets/module/finance/quotation/js/quotation-form.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
        <script type="text/javascript">
          var qtn_id = $('#qtn_id').val();
          var blng_cmp_id = '<?php echo isset($qtn_billing_cmp) ? $qtn_billing_cmp:''; ?>';
          var blng_cmp_name = '<?php echo isset($qtn_billing_cmp_name) ? $qtn_billing_cmp_name:''; ?>';
          var blng_cmp_state = '<?php echo isset($qtn_billing_cmp_state) ? $qtn_billing_cmp_state:''; ?>';
          var qtn_billing_cmp_payment_terms = '<?php echo isset($qtn_billing_cmp_payment_terms) ? json_encode($qtn_billing_cmp_payment_terms):''; ?>';
          var blng_cmp = '<option value='+blng_cmp_id+'>'+blng_cmp_name+'</option>';
          $('#qtn_billing_cmp').html(blng_cmp).trigger('change');
          $('#qtn_billing_cmp_state').val(blng_cmp_state);
                   qtn_billing_cmp_payment_terms = qtn_billing_cmp_payment_terms.substring(1, qtn_billing_cmp_payment_terms.length-1);
          $('#qtn_payment_terms').val(qtn_billing_cmp_payment_terms).addClass('edited');
           if(qtn_id  != '')
          {
            var qtn_cmp_id = '<?php echo isset($quotation->qtn_cmp_id) ? $quotation->qtn_cmp_id:''; ?>';
            var qtn_cmp_name = '<?php echo isset($quotation->qtn_company) ? $quotation->qtn_company:''; ?>';  
            if(qtn_cmp_name != '')
            {
            var qtn_cmp = '<option value='+qtn_cmp_id+'>'+qtn_cmp_name+'</option>';
            }
            var qtn_cmp_state = '<?php echo isset($quotation->qtn_cmp_state) ? $quotation->qtn_cmp_state:''; ?>';
            $('#qtn_cmp_id').html(qtn_cmp).change();
            $('#qtn_cmp_state').val(qtn_cmp_state);
           
          }
          else
          {
         
             var led_id = '<?php echo isset($led_id) ? $led_id:''; ?>';
            var led_title = '<?php echo isset($led_title) ? $led_title:''; ?>';
            var qtn_led_id = '<option value='+led_id+'>'+led_title+'</option>';
            if(led_id != '')
            {
              $('#qtn_led_id').html(qtn_led_id).trigger('change');
              $('#qtn_led_id').change();
              var cmp_id = '<?php echo isset($led_cmp) ? $led_cmp:''; ?>';
              if(cmp_id != '')
              {
                var cmp_name=ppl_id=ppl_name=led_cmp_address=led_cmp_gst_no=led_company=led_ppl_id='';
                var cmp_name = '<?php echo isset($led_cmp_name) ? $led_cmp_name:''; ?>';
                var ppl_id = '<?php echo isset($led_ppl_id) ? $led_ppl_id:''; ?>';
                var ppl_name = '<?php echo isset($led_ppl_name) ? $led_ppl_name:''; ?>';
                var led_cmp_state = '<?php echo isset($led_cmp_state) ? $led_cmp_state:''; ?>';
                var led_cmp_payment_terms = '<?php echo isset($led_cmp_payment_terms) ? json_encode($led_cmp_payment_terms):''; ?>';
                var led_cmp_address = '<?php echo isset($led_cmp_address) ? json_encode($led_cmp_address):''; ?>';
                var led_cmp_gst_no = '<?php echo isset($led_cmp_gst_no) ? $led_cmp_gst_no:''; ?>';
                var led_company = '<option value='+cmp_id+' selected="">'+cmp_name+'</option>';
                var led_ppl = '<option value='+ppl_id+' selected="">'+ppl_name+'</option>';
                $('#qtn_cmp_id').html(led_company).trigger('change');
                $('#qtn_billing_people').html(led_ppl).trigger('change');
                if(led_cmp_address !='')
                {
                   led_cmp_address = led_cmp_address.substring(1, led_cmp_address.length-1);
                   led_cmp_payment_terms = led_cmp_payment_terms.substring(1, led_cmp_payment_terms.length-1);
                  $('#qtn_billing_addr').val(led_cmp_address);
                }
                $('#qtn_billing_gst').val(led_cmp_gst_no);
                $('#qtn_title').val(led_title);
                $('#qtn_cmp_state').val(led_cmp_state);
                $('#qtn_payment_terms').val(led_cmp_payment_terms);
              }
              
              setTimeout(function(){
                
            },1000);
            }
          }
         
            var disc_type_rs = '<?php echo QUOTATION_DISC_TYPE_RS; ?>';
            var disc_type_percentage = '<?php echo QUOTATION_DISC_TYPE_PERCENTAGE; ?>';
            // $('#qtn_date').datepicker('setDate', 'today');
            // $('#qtn_date').datepicker('setDate', new Date());
            /*$('#qtn_date').datepicker({
              autoClose: true,
            }).on('changeDate', function(e) {
            });*/
            $("#qtn_date").datepicker({ 
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
            $('#qtn_payment_terms').summernote({
              height:300,
              // focus:true,
           });
          });
        </script>
       
      </div>
   
  </body>
</html>
