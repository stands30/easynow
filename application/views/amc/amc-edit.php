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
    <link href="<?php echo base_url();?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />      
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
                  <h3 class="page-title text-center mt-20">Edit AMC</h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" id="amc_edit" class="col-md-push-2 col-md-8 form_add">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input ">  
                        <label class="drp-title">People</label>
                        <div class="input-icon">
                          <i class="fa fa-user icon-people list-level"></i>
                          <input type="hidden" name="amc_id" id="amc_id" value="<?php echo $amcdata->amc_id ?>">
                            <select name="amc_ppl_id" id="amc_ppl_id" required data-msg="Please select people" class="form-control amc_ppl_id custom-select2">
                              <?php if(isset($amcdata->amc_ppl_id) and !empty($amcdata->amc_ppl_id)) ?>
                                <option value="<?php echo $amcdata->amc_ppl_id ?>"><?php echo $amcdata->amc_ppl_name ?></option>
                            </select>
                            <div class="help-block"></div>
                        </div>
                      </div>  
                    </div>  
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input ">  
                        <label class="drp-title">Company</label>
                        <div class="input-icon">
                          <i class="fa fa-industry icon-company list-level"></i>
                            <select name="amc_cmp_id" id="amc_cmp_id" required data-msg="Please select company" class="form-control amc_cmp_id">
                              <?php if(isset($amcdata->amc_cmp_id) and !empty($amcdata->amc_cmp_id)) ?>
                                <option value="<?php echo $amcdata->amc_cmp_id ?>"><?php echo $amcdata->amc_cmp_name ?></option>
                            </select>
                            <div class="help-block"></div>
                        </div>
                      </div>  
                    </div> 
                     
                  </div>

                  <div class="row">
                    <div class="col-md-6">                   
                      <div class="form-group form-md-line-input ">  
                         <label class="drp-title">Product</label>
                        <div class="input-icon">
                          <i class="fa fa-cart-plus icon-product list-level"></i>
                            <select name="amc_prd_id" id="amc_prd_id" required data-msg="Please select product" class="form-control amc_prd_id custom-select2">
                            <?php if(isset($amcdata->amc_prd_id) and !empty($amcdata->amc_prd_id)) ?>
                                <option value="<?php echo $amcdata->amc_prd_id ?>"><?php echo $amcdata->amc_prd_name ?></option>
                          </select>
                         
                            <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">                   
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                        
                          <input type="number" min="0" class="form-control" required data-msg="Please enter quantity" id="amc_qty"  name="amc_qty"   value="<?php if(isset($amcdata->amc_qty)) echo $amcdata->amc_qty; ?>">
                          <label class="control-label">Quantity</label>
                          <i class="fas fa-weight-hanging list-level"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="text" id="amc_start_date" name="amc_start_date" required data-msg="Please enter start date" class="form-control start-date" value="<?php if(isset($amcdata->amc_start_dt_edit)) echo $amcdata->amc_start_dt_edit; ?>">
                             <i class="fa fa-calendar list-level"></i>
                            <label>Start Date</label>
                          <div class="help-block"></div>
                        </div> 
                      </div>
                    </div>
                    <div class="col-md-6">                   
                      <div class="form-group form-md-line-input ">  
                         <label class="drp-title">AMC Invoice</label>
                        <div class="input-icon">
                          <i class="fas fa-list-ol list-level"></i>
                            <select name="amc_inv_id" id="amc_inv_id" required data-msg="Please select amc invoice" class="form-control amc_inv_id custom-select2">
                                <?php if(isset($amcdata->amc_inv_id) and !empty($amcdata->amc_inv_id)) ?>
                                <option value="<?php echo $amcdata->amc_inv_id ?>"><?php echo $amcdata->amc_inv_name ?></option>
                          </select>
                         
                            <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                    
                      
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                        
                          <input type="text" class="form-control" id="amc_duration" onchange=" return getRenewalDate()" onkeyup="return getRenewalDate()" required data-msg="Please enter duration" name="amc_duration"   value="<?php if(isset($amcdata->amc_duration)) echo $amcdata->amc_duration; ?>">
                          <label class="control-label">Duration</label>
                          <i class="fa fa-calendar list-level"></i>
                          <div class="help-block"></div>
                        </div>
                      

                    </div>
                  </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-radios">
                        <div class="md-radio-inline input-label-text">
                            <div class="md-radio">
                                <input type="radio" id="radio1" name="amc_duration_rad" class="md-radiobtn" onchange=" return getRenewalDate()" onkeyup="return getRenewalDate()"  value="<?php echo AMC_DURATION_YEARS ?>">
                                <label for="radio1">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Years </label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" id="radio2" name="amc_duration_rad" class="md-radiobtn" onchange=" return getRenewalDate()" onkeyup="return getRenewalDate()" value="<?php echo AMC_DURATION_MONTHS ?>">
                                <label for="radio2">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Months </label>
                            </div>
                            
                            <div class="md-radio">
                                <input type="radio" id="radio3" name="amc_duration_rad" class="md-radiobtn" onchange=" return getRenewalDate()" onkeyup="return getRenewalDate()" value="<?php echo AMC_DURATION_DAYS ?>">
                                <label for="radio3">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Days </label>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" id="amc_renewal_date" name="amc_renewal_date" class="form-control amc_renewal_date end-date" value="<?php if(isset($amcdata->amc_renewal_dt_edit)) echo $amcdata->amc_renewal_dt_edit; ?>">
                               <i class="fa fa-calendar list-level"></i>
                              <label>Renewal Date</label>
                              <div class="help-block"></div>
                          </div> 
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" class="form-control" id="amc_remind"  name="amc_remind"   value="<?php if(isset($amcdata->amc_remind)) echo $amcdata->amc_remind; ?>">
                          <label class="control-label">Remind Before (Days)</label>
                          <i class="fa fa-calendar list-level"></i>
                          <div class="help-block"></div>
                        </div>
                      </div> 
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input">  
                         <label class="drp-title">Status</label>
                        <div class="input-icon">
                          <i class="fas fa-info-circle list-level"></i>
                            <select name="amc_type_status" id="amc_type_status" required data-msg="Please select status" class="form-control amc_type_status custom-select2">
                              <?php if(isset($amcdata->amc_type_status) and !empty($amcdata->amc_type_status)) ?>
                                <option value="<?php echo $amcdata->amc_type_status ?>"><?php echo $amcdata->amc_type_status_name ?></option>
                          </select>
                         
                            <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="text" class="form-control" id="amc_renewal_amount"  name="amc_renewal_amount"   value="<?php if(isset($amcdata->amc_renewal_amount)) echo $amcdata->amc_renewal_amount; ?>">
                          <label class="control-label">Renewal Amount</label>
                          <i class="fas fa-rupee-sign"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon input-line-custom">
                          <textarea class="form-control color-primary-light" rows="2" id="amc_remark" name="amc_remark"><?php if(isset($amcdata->amc_remark)) echo $amcdata->amc_remark; ?></textarea>
                            <label for="amc_remark">Remark</label>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <div class="help-block"></div>
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
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
       </script>
       <script src="<?php echo base_url(); ?>assets/module/amc/js/form-validation/amc.js<?php echo $global_asset_version; ?>" type="text/javascript">
       </script>

       <script type="text/javascript">
           $('.start-date').datepicker({
              todayHighlight: true,
              autoclose: true
          });

            $('.end-date').datepicker({
              todayHighlight: true,
              autoclose: true
          });
          $('.start-date, select, input').on('change', function() {
              if($(this).val() != '')
                  $(this).addClass('edited');
              else
                  $(this).removeClass('edited');
          });
           $('.end-date, select, input').on('change', function() {
              if($(this).val() != '')
                  $(this).addClass('edited');
              else
                  $(this).removeClass('edited');
          })

           var amc_duration_rad = '<?php if(isset($amcdata->amc_duration_rad) and !empty($amcdata->amc_duration_rad)) echo $amcdata->amc_duration_rad ?>';
           if(amc_duration_rad != '')
           {
             $("#radio"+amc_duration_rad).attr('checked',true);
           }


           function getRenewalDate()
           {
            var duration = $('#amc_duration').val();
            var amc_start_date = $('#amc_start_date').val();
            var duration_rad = document.querySelector('input[name="amc_duration_rad"]:checked').value;
            if(duration != '' && duration_rad !='' && amc_start_date !='')
            {
              var formData = new FormData();


              formData.append('duration',duration);
              formData.append('amc_start_date',amc_start_date);
              formData.append('duration_rad',duration_rad);
              $.ajax(
                    {
                        type: "POST",
                        url: baseUrl + "amc/getRenewalDate",
                        data: formData,
                        dataType: "json",
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false,
                        success: function(response)
                        {
                          $('.amc_renewal_date').val(response.renewal_date);
                        }
                    });
            }
           }
       </script>

      </div>
  </body>
</html>
