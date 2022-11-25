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
    <link href="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                  <h3 class="page-title text-center mt-20">Add New Event</h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form role="form" id="event_add" class="col-md-push-2 col-md-8 form_add">
                  <div class="row">
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="evt_name" value="" id="evt_name" class="form-control color-primary-light"  >
                          <label for="evt_name">Event Name<span class="asterix-error"><em>*</em></span></label>
                          <i class="fas fa-location-arrow"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" class="form-control" id="evt_date"  name="evt_date"   value="">
                          <label class="control-label">Event Date</label>
                          <i class="fas fa-calendar-alt"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon input-line-custom">
                        <textarea class="form-control color-primary-light" rows="2" id="evt_desc" name="evt_desc"></textarea>
                          <label for="evt_desc">Event Description</label>
                          <i class="fa fa-comments" aria-hidden="true"></i>
                          <div class="help-block"></div>
                      </div>
                    </div>
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                       <label class="drp-title">Managed By</label>
                        <div class="input-icon">
                          <i class="fas fa-user-tie list-level"></i>
                            <select name="evt_managed_by" id="evt_managed_by" class="form-control evt_managed_by custom-select2">
                              <option>Please Select Managed by</option>
                            </select>
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
        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>        
        <script src="<?php echo base_url(); ?>assets/module/event/js/form-validation/event_add.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.min.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/additional-methods.min.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
       <script type="text/javascript">
          $('#evt_date').datepicker({
            dateFormat:'dd-mm-yy',
            autoClose:true,
            onSelect: function(dateText, inst){
              $(this).addClass('edited');
              $(this).datepicker("hide");
            }
          })
       </script>
    
      </div>
  </body>
</html>
