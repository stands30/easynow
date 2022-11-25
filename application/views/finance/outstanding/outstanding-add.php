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
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
   
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    
    <!-- END PAGE LEVEL PLUGINS -->
   <style type="text/css">
     
     
   </style>
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
          <div class="portlet portlet-fluid-background portlet-outstanding">
            <div class="row">
                <div class="container-fluid container-wrap">
                  <div class="text-center title_wrap">
                    <h3 class="page-title text-center mt-20">Add New Outstanding</h3>
                    <span class="sp_line color-primary"></span>
                  </div>
                   <!-- <div class="col-md-4 text-right">
                        <div class="form-group">
                          <label>Closing Balance 0.00</label>
                        </div>
                      </div> -->

                  <!-- <form role="form" id="outstanding_add" class="col-md-push-1 col-md-10 form_add"> -->
                  <form role="form" id="outstanding_add" class="col-md-12 form_add">
                    <div class="row">
                      <div class="col-md-2 pull-right">
                        <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label mb-0">
                          <div class="input-icon">
                            <label class="drp-title ml-0">Closing Balance</label><br>
                            <label class="data-show"><i class="fas fa-rupee-sign list-level" aria-hidden="true"></i> 0.00</label>
                          </div>
                        </div>
                      </div>

                     
                    </div>
                    <!-- <div class="row">
                      <div class="col-md-4 pull-right">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" class="form-control date date-picker" id="out_payment_date"  name="out_payment_date"   value="">
                            <label class="control-label">Payment Date<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-calendar-alt"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                    </div> -->

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Account<span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                            <i class="far fa-credit-card list-level"></i>                                           
                            <select class="form-control select2" id="ots_account" name="ots_account" data-placeholder="Please Select Account">
                              <option>Please Select Account</option>
                              <option>Charms Classic Deco</option>
                              <option>Dr. Patkar</option>
                            </select>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Payment By</label>
                          <div class="input-icon">
                            <i class="fa fa-user icon-people"></i>                                           
                            <select class="form-control select2" id="ots_pay_by" name="ots_pay_by" data-placeholder="Please Select Person">
                              <option>Please Select Person</option>
                              <option>Sanjay Pawar</option>
                              <option>Ajay Lagad</option>
                            </select>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" class="form-control date date-picker" id="out_payment_date"  name="out_payment_date"   value="">
                            <label class="control-label">Payment Date<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-calendar-alt"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      

                    </div>

                    <div class="row cheque-list">

                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Payment Mode<span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                                <i class="fas fa-file-invoice-dollar color-dark-blue"></i>                                           
                                <select class="form-control select2" id="ots_pay_mode" name="ots_pay_mode" data-placeholder="Please Select Account">
                                  <option>Please Select Payment Mode</option>
                                  <option>Cash</option>
                                  <option>Cheque</option>
                                  <option>Debit Card</option>
                                  <option>Credit Card</option>
                                  <option>Online Banking</option>
                              </select>
                              <div class="help-block"></div>
                          </div>
                         
                        </div>
                      </div>
                      

                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="ots_bank_name" value="" id="ots_bank_name" class="form-control color-primary-light"  >
                            <label for="ots_bank_name">Bank Name<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-university list-level"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="ots_bank_branch" value="" id="ots_bank_branch" class="form-control color-primary-light"  >
                            <label for="ots_bank_branch">Branch Name<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-university list-level"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      

                    </div>

                    <div class="row">
                      

                      <div class="col-md-4">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" class="form-control date date-picker" id="out_cheque_date"  name="out_cheque_date"   value="">
                            <label class="control-label">Cheque Date<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-calendar-alt"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="ots_check_no" value="" id="ots_check_no" class="form-control color-primary-light"  >
                            <label for="ots_check_no">Cheque No/UTR No<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-th-list"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <!-- <div class="row utr-list">

                     <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="ots_utr_no" value="" id="ots_utr_no" class="form-control color-primary-light"  >
                            <label for="ots_utr_no">UTR No<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-th-list"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      

                      

                    </div> -->

                    

                    <div class="row">
                      

                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="number" name="ots_amt" value="" id="ots_amt" class="form-control color-primary-light"  >
                            <label for="ots_amt">Amount</label>
                            <i class="fas fa-rupee-sign list-level" aria-hidden="true"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="number" name="ots_discount" value="" id="ots_discount" class="form-control color-primary-light"  >
                            <label for="ots_discount">Discount</label>
                            <i class="fas fa-rupee-sign list-level" aria-hidden="true"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label">
                          <div class="input-icon">

                            
                            <label class="drp-title ml-0">Sub Total</label><br>
                            <label class="data-show"><i class="fas fa-rupee-sign list-level" aria-hidden="true"></i> 0.00</label>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="number" name="ots_tds" value="" id="ots_tds" class="form-control color-primary-light"  >
                            <label for="ots_tds">TDS</label>
                            <i class="fas fa-percentage"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label">
                          <div class="input-icon">
                            <label class="drp-title ml-0">TDS Amount</label><br>
                            <label class="data-show"><i class="fas fa-rupee-sign list-level" aria-hidden="true"></i> 0.00</label>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label">
                          <div class="input-icon">
                            <label class="drp-title ml-0">Total Amount</label><br>
                            <label class="data-show"><i class="fas fa-rupee-sign list-level" aria-hidden="true"></i> 0.00</label>
                          </div>
                        </div>
                      </div>

                    </div>

                    
                    

                    <div class="row">
                      <div class="col-md-12">
                        <label class="drp-title ml-0">Check Invoice<span class="asterix-error"><em>*</em></span></label>
                         <div class="md-checkbox-inline">
                          <label class="mt-checkbox mt-checkbox-custom"> Inv1001 (<b> <i class="fas fa-rupee-sign color-black" aria-hidden="true"></i> 101</b>)
                            <input type="checkbox" class="invoice-001" value="1" name="test" />
                            <span></span>
                          </label>
                          <label class="mt-checkbox mt-checkbox-custom"> Inv1002 (<b> <i class="fas fa-rupee-sign color-black" aria-hidden="true"></i> 101</b>)
                            <input type="checkbox" class="invoice-002"  value="1" name="test" />
                            <span></span>
                          </label>
                          <label class="mt-checkbox mt-checkbox-custom"> Inv1003 (<b> <i class="fas fa-rupee-sign color-black" aria-hidden="true"></i> 101</b>)
                            <input type="checkbox" class="invoice-003" value="1" name="test" />
                            <span></span>
                          </label>
                        </div>
                      </div>

                     
                    </div>

                    <div class="row">

                       <div class="col-md-push-6 col-md-6"> 
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon input-line-custom">
                            <textarea class="form-control color-primary-light" rows="2" id="out_remarks" name="out_remarks"></textarea>
                              <label for="out_remarks">Remark</label>
                              <i class="fa fa-comments" aria-hidden="true"></i>
                              <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                    <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_ADD)); ?>   

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
      <script src="<?php echo base_url();?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>       
      <script src="<?php echo base_url();?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/project/project-scripts/components-select2.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      

    </div>

    
  </body>
</html>
