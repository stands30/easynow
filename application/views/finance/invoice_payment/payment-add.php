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
     
     .select2-container--bootstrap .select2-selection--single {
    height: 33px;
  }
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
                    <h3 class="page-title text-center mt-20">Add New Payment</h3>
                    <span class="sp_line color-primary"></span>
                  </div>
                   <!-- <div class="col-md-4 text-right">
                        <div class="form-group">
                          <label>Closing Balance 0.00</label>
                        </div>
                      </div> -->
                  <form role="form" id="payment_add" class="col-md-12 form_add">
                    <div class="row">
                      <div class="col-md-2 pull-right">
                        <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label mb-0">
                          <div class="input-icon">
                            <label class="drp-title ml-0">Closing Balance</label><br>
                            <label class="data-show"><i class="fas fa-rupee-sign currency-symbol list-level" aria-hidden="true"></i><span class="closing_balance"><?php echo isset($closing_bal) ? number_format($closing_bal,2):0; ?></span></label>
                            <input type="text" name="" class="hidden-field-form content-hidden-field" value="<?php echo isset($closing_bal) ? $closing_bal:0;?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Account<span class="asterix-error"><em>*</em></span></label>
                          <div class="input-icon">
                                <i class="far fa-credit-card list-level"></i>                                           
                                <select class="form-control select2" id="ipt_cmp_id" name="ipt_cmp_id" data-placeholder="Please Select Account">
                                <option class="blank_option"></option>
                              </select>
                              <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Payment By</label>
                          <div class="input-icon">
                                <i class="fa fa-user icon-people"></i>                                           
                                <select class="form-control select2" id="ipt_ppl_id" name="ipt_ppl_id" data-placeholder="Please Select Person">
                                <option class="blank_option"></option>
                              </select>
                              <div class="help-block"></div>
                          </div>
                         
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <label class="drp-title">Received By</label>
                          <div class="input-icon">
                                <i class="fa fa-user icon-people"></i>                                           
                                <select class="form-control select2" id="ipt_managed_by" name="ipt_managed_by" data-placeholder="Please Select Received By">
                                  <?php 
                                  $session_id   = $this->session->userdata(PEOPLE_SESSION_ID);
                                  $session_name = $this->session->userdata(PEOPLE_SESSION_NAME);
                                  if($session_id !='')
                                  { ?>
                                    <option value="<?php echo $session_id; ?>"><?php echo $session_name; ?></option>
                                  <?php }
                                   ?>
                                  
                                <option class="blank_option"></option>
                              </select>
                              <div class="help-block"></div>
                          </div>
                         
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" class="form-control date date-picker" id="ipt_date"  name="ipt_date"   value="<?php echo isset($ipt_date) ? $ipt_date:''; ?>" >
                            <label class="control-label">Payment Date<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-calendar-alt"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      

                    </div>

                    <div class="row cheque-list">

                      <div class="col-md-4">
                        <div class="form-group form-md-line-input form-md-floating-label form-md-line-input-custom">
                          <label class="drp-title">Payment Mode</label>
                          <div class="input-icon">
                              <i class="fas fa-file-invoice-dollar color-dark-blue"></i>                              
                              <select class="form-control select2" id="ipt_mode" name="ipt_mode" data-gen-grp="finance_payment_mode" data-placeholder="Please Select Payment Mode" required="">
                                <option class="blank_option"></option>
                              </select>
                              <div class="help-block"></div>
                          </div>
                         
                        </div>
                      </div>
                      

                      <div class="col-md-4 cheque-details">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="ipt_bank" value="" id="ipt_bank" class="form-control color-primary-light"  >
                            <label for="ipt_bank">Bank Name</label>
                            <i class="fas fa-university list-level"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 cheque-details">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="ipt_branch" value="" id="ipt_branch" class="form-control color-primary-light"  >
                            <label for="ipt_branch">Branch Name</label>
                            <i class="fas fa-university list-level"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                    <!-- </div>
                    <div class="row "> -->
                      <div class="col-md-4 cheque-details">
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" class="form-control date date-picker" id="ipt_chq_date"  name="ipt_chq_date"   value="" readonly="">
                            <label >Cheque Date</label>
                            <i class="fas fa-calendar-alt"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 payment-no">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="ipt_payment_no" value="" id="ipt_payment_no" class="form-control color-primary-light"  >
                            <label for="ipt_payment_no">Cheque No/UTR No</label>
                            <i class="fas fa-th-list"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                    <div class="col-md-2" >
                        <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label">
                          <div class="input-icon input-label-text">
                            <label class="drp-title ml-0">On Account</label><br>
                            <label class="data-show"><i class="fas fa-rupee-sign currency-symbol list-level" aria-hidden="true"></i><span class="ipt_on_acc_span"><?php echo isset($on_acc) ? $on_acc:0; ?></span></label>
                            <input type="text" name="ipt_on_acc" id="ipt_on_acc" class="hidden-field-form content-hidden-field" value="<?php echo isset($on_acc) ? $on_acc:0; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="number" name="ipt_amt" value="" id="ipt_amt" class="form-control color-primary-light" required="" >
                            <label for="ipt_amt">Amt Paid</label>
                            <!-- <label for="ipt_amt">Amount</label> -->
                            <i class="fas fa-rupee-sign currency-symbol list-level" aria-hidden="true"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="number" name="ipt_disc" value="" id="ipt_disc" class="form-control color-primary-light"  >
                            <label for="ipt_disc">Adjustment</label>
                            <i class="fas fa-rupee-sign currency-symbol list-level" aria-hidden="true"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label">
                          <div class="input-icon">

                            
                            <label class="drp-title ml-0">Sub Total</label><br>
                            <label class="data-show"><i class="fas fa-rupee-sign currency-symbol list-level" aria-hidden="true"></i><span class="ipt_sub_total_span">0.00</span></label>
                            <input type="text" name="ipt_sub_total" id="ipt_sub_total" class="hidden-field-form content-hidden-field">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="number" name="ipt_tds_percent" value="" id="ipt_tds_percent" class="form-control color-primary-light"  >
                            <label for="ipt_tds_percent">TDS %</label>
                            <i class="fas fa-percentage"></i>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label">
                          <div class="input-icon">
                            <label class="drp-title ml-0">TDS Amount</label><br>
                            <label class="data-show"><i class="fas fa-rupee-sign currency-symbol list-level" aria-hidden="true"></i><span class="ipt_tds_amt_span">0.00</span></label>
                            <input type="text" name="ipt_tds_amt" id="ipt_tds_amt" class="hidden-field-form content-hidden-field">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label">
                          <div class="input-icon">
                            <label class="drp-title ml-0">Total Amount</label><br>
                            <label class="data-show"><i class="fas fa-rupee-sign currency-symbol list-level" aria-hidden="true"></i> <span class="ipt_total_span">0.00</span></label>
                            <input type="text" name="ipt_total" id="ipt_total" class="hidden-field-form content-hidden-field">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="drp-title ml-0">Check Invoice <span class="grand_total" data-total=""></span></label>
                         <div class="md-checkbox-inline invoice_checkbox">
                         
                        </div>
                      </div>

                     
                    </div>

                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group form-md-line-input form-md-floating-label custom-fixed-label">
                          <div class="input-icon">
                            <label class="drp-title ml-0">Balance</label><br>
                            <label class="data-show"><i class="fas fa-rupee-sign currency-symbol list-level" aria-hidden="true"></i><span class="ipt_balance_span">0.00</span></label>
                            <input type="text" name="ipt_balance" id="ipt_balance" class="hidden-field-form content-hidden-field">
                          </div>
                        </div>
                      </div>
                       <div class="col-md-push-4 col-md-6"> 
                        <div class="form-group  form-md-line-input form-md-floating-label">
                          <div class="input-icon input-line-custom">
                            <textarea class="form-control color-primary-light" rows="2" id="ipt_remark" name="ipt_remark"></textarea>
                              <label for="ipt_remark">Remark</label>
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
      <!-- <script src="<?php echo base_url();?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> -->
      <script type="text/javascript">
          var inv_code = '<?php echo isset($inv_code) ? $inv_code:''; ?>';
        
      </script>
        <script src="<?php echo base_url();?>assets/module/finance/invoice_payment/invoice_payment_form.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script type="text/javascript">
         $('.out_payment_date, select, input').on('change', function() {
            if($(this).val() != '')
                $(this).addClass('edited');
            else
                $(this).removeClass('edited');
        });

          $('.out_cheque_date, select, input').on('change', function() {
            if($(this).val() != '')
                $(this).addClass('edited');
            else
                $(this).removeClass('edited');
        })
         $(document).ready(function(){
          // changeCurrencySymbol();
          $(".date-picker").datepicker({ 
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
          var cmp_id = '<?php echo isset($cmp_id) ? $cmp_id:'0'; ?>';
          var cmp_name = '<?php echo isset($cmp_name) ? $cmp_name:'Please Select'; ?>';
          var cmp_dropdown = '<option value="'+cmp_id+'" selected>'+cmp_name+'</option>';
          var ppl_id = '<?php echo isset($cpl_ppl_id) ? $cpl_ppl_id:'0'; ?>';
          var ppl_name = '<?php echo isset($cpl_ppl_name) ? $cpl_ppl_name:'Please Select'; ?>';
          var ppl_select2 = '<option value="'+ppl_id+'" selected>'+ppl_name+ "</option>";
          $('#ipt_cmp_id').html(cmp_dropdown).trigger('change');
          $('#ipt_ppl_id').html(ppl_select2).trigger('change');
          var inv_total = '<?php echo isset($inv_total) ? $inv_total:''; ?>';
          if(inv_total != '')
          {
            $('#ipt_amt').val(inv_total).addClass('edited');
            calAmount();
          }

         });
        
          $('#ipt_mode').change(function(){
            check_payment_mode();
          });
          function check_payment_mode()
          {
            var ipt_mode =  $('#ipt_mode').val();
             var ipt_mode_cheque = '<?php echo INVOICE_PAYMENT_MODE_CHEQUE; ?>';
             var ipt_mode_utr = '<?php echo INVOICE_PAYMENT_MODE_UTR; ?>';
                    console.log(' ipt_mode : '+ipt_mode);
            switch(ipt_mode)
            {
              case ipt_mode_cheque:
                   /* $('.cheque-details').css('display','block');
                    $('.payment-no').css('display','block');*/
                    $('.cheque-details').removeClass('hidden');
                    $('.payment-no').removeClass('hidden');
                    break;
              case ipt_mode_utr:
                    /*$('.payment-no').css('display','block');
                    $('.cheque-details').css('display','none');*/
                    $('.payment-no').removeClass('hidden');
                    $('.cheque-details').addClass('hidden');
                    console.log(' ipt_mode_utr mode');
                    break;
              default:
                    /*$('.cheque-details').css('display','none');
                    $('.payment-no').css('display','none');*/
                    $('.cheque-details, .payment-no').addClass('hidden');
                    console.log(' default mode');
                    break;
            }
          }


          // function changeCurrencySymbol()
          //  {
          //     var currency='usd';
          //     console.log(currency);
          //     switch(currency)
          //     {
          //       case 1:
          //         currency='inr';
          //         break;
          //       case 2:
          //         currency='usd';
                  
          //         $('.currency-symbol').removeClass('fas fa-rupee-sign');
          //         $('.currency-symbol').addClass('fas fa-dollar-sign');
          //         break;
          //       default:
          //         currency='inr';
          //         break;
          //     }
          //  }
      </script>
    
    </div>

    
  </body>
</html>
