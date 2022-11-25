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
                  <h3 class="page-title text-center mt-20"><?php if(isset($title)) echo $title; ?></h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" id="campaign_add" class="col-md-push-2 col-md-8 form_add">
                  <div class="row">
                      <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="cpn_name" value="" id="cpn_name" class="form-control color-primary-light"  >
                          <label for="campaign_name">Campaign Name</label>
                          <i class="fas fa-handshake icon-client list-level"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                      
                  </div>
                  <div class="row">
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                         <label class="drp-title">Type</label>
                        <div class="input-icon">
                          <i class="fas fa-handshake icon-client list-level"></i>
                            <select name="cpn_type" id="cpn_type" class="form-control cpn_type custom-select2">
                            <option></option>
                          </select>
                         
                            <div class="help-block"></div>
                        </div>
                      </div>                        
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                         <label class="drp-title">Status</label>
                        <div class="input-icon">
                          <i class="fas fa-info-circle list-level"></i>
                            <select name="cpn_campaign_status" id="cpn_campaign_status" class="form-control cpn_campaign_status custom-select2">
                           <option></option>
                          </select>
                         
                            <div class="help-block"></div>
                        </div>
                      </div> 
                       
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" class="form-control start-date" placeholder="">
                               <i class="fa fa-calendar"></i>
                              <label>Start Date</label>
                          </div> 
                      </div>
                    

                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" class="form-control end-date" placeholder="">
                               <i class="fa fa-calendar"></i>
                              <label>End Date</label>
                          </div> 
                      </div>
                  </div>
                  <div class="row">  
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          
                          <input type="text" class="form-control" id="campaign_budget_cost"  name="campaign_budget_cost"   value="">
                          <label class="control-label">Budgeted Cost</label>
                          <i class="fas fa-rupee-sign"></i>
                          <div class="help-block"></div>
                        </div>
                      </div> 

                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          
                          <input type="text" class="form-control" id="campaign_expected_revenue"  name="campaign_expected_revenue"   value="">
                          <label class="control-label">Expected Revenue</label>
                          <i class="fas fa-rupee-sign"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                      
                      
                       

                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          
                          <input type="text" class="form-control" id="campaign_actual_cost"  name="campaign_actual_cost"   value="">
                          <label class="control-label">Actual Cost</label>
                          <i class="fas fa-rupee-sign"></i>
                          <div class="help-block"></div>
                        </div>
                      </div> 
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                       <label class="drp-title">Value Addition</label>
                      <div class="input-icon">
                        <i class="fas fa-user-tie list-level"></i>
                          <select name="campaign_value" id="campaign_value" class="form-control campaign_value custom-select2">
                          <option>Please Select Value Addition</option>
                          <option>Link</option>
                          <option>Image</option>
                        </select>
                       
                          <div class="help-block"></div>
                      </div>
                    </div>  
                   
                                      
                    
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon input-line-custom">
                        <textarea class="form-control color-primary-light" rows="2" id="cam_desc" name="cam_desc"></textarea>
                          <label for="cam_desc">Description</label>
                          <i class="fa fa-comments" aria-hidden="true"></i>
                          <div class="help-block"></div>
                      </div>
                    </div>
                    
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon input-line-custom">
                        <textarea class="form-control color-primary-light" rows="2" id="cam_core_message" name="cam_core_message"></textarea>
                          <label for="cam_core_message">Core Message</label>
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
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
       </script>

       <script type="text/javascript">
           $('.start-date').datepicker({
              
              todayHighlight: true
          });

            $('.end-date').datepicker({
              
              todayHighlight: true
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


       </script>

      </div>
  </body>
</html>
