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
    <!-- OPTIONAL LAYOUT STYLES -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                <div class="text-center title_wrap">
                  <input type="hidden" name="emp_id" id="emp_id" class="form-control form_c" value="<?php if(isset($teamdata->emp_id)) echo $teamdata->emp_id; ?>" >  
                  <h3 class="page-title text-center mt-20">Edit Team</h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form role="form" id="team_edit" class="col-md-push-2 col-md-8 form_edit">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <i class="fa fa-user"></i>
                          <select name="emp_ppl_id" id="emp_ppl_id" class="form-control">
                            <option value="<?php if(isset($teamdata->emp_ppl_id)) echo $teamdata->emp_ppl_id; ?>"><?php if(isset($teamdata->emp_name)) echo $teamdata->emp_name; ?></option>
                          </select>
                          <label>People Name <span class="asterix-error"><em>*</em></span></label>
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label"> 
                        <div class="input-icon">
                          <i class="fas fa-building list-level"></i>
                          <select name="emp_dept" id="emp_dept" class="form-control custom-select2">
                            <option value="<?php if(isset($teamdata->emp_dept)) echo $teamdata->emp_dept; ?>"><?php if(isset($teamdata->emp_dept_name)) echo $teamdata->emp_dept_name; ?></option>
                          </select>
                          <label>Department<span class="asterix-error"><em>*</em></span></label>
                          <div class="help-block"></div>  
                        </div>                                                                       
                      </div>
                    </div>
                        
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="emp_code" id="emp_code" class="form-control form_c" placeholder="Employee Code" value="<?php if(isset($teamdata->emp_code)) echo $teamdata->emp_code; ?>"> 
                          <label for="emp_code">Employee Code</label>
                           <i class="fas fa-address-card"></i>
                        </div>                            
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">                             
                          <input type="text" name="emp_designation" id="emp_designation" class="form-control form_c" placeholder="Designation" value="<?php if(isset($teamdata->emp_designation)) echo $teamdata->emp_designation; ?>">
                          <label>Designation</label>
                          <i class="fas fa-id-card-alt"></i>
                        </div>                           
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Reporting To</label>
                        <div class="input-icon">
                          <i class="fas fa-users"></i>
                          <select name="emp_reporting_to" id="emp_reporting_to" class="form-control custom-select2">
                            <option value="<?php if(isset($teamdata->emp_reporting_to)) echo $teamdata->emp_reporting_to; ?>"><?php if(isset($teamdata->emp_reporting_to_name)) echo $teamdata->emp_reporting_to_name; ?></option>
                            <option></option>
                          </select>
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Billing Company</label>
                        <div class="input-icon">
                          <i class="fas fa-building list-level"></i>
                          <select name="emp_cmp_id" id="emp_cmp_id" class="form-control custom-select2">
                            <option></option>
                              <option value="<?php if(isset($teamdata->emp_cmp_id)) echo $teamdata->emp_cmp_id; ?>" selected=""><?php if(isset($teamdata->emp_cmp_id_name)) echo $teamdata->emp_cmp_id_name; ?></option>
                          </select>
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_EDIT)); ?>
              </form>
          </div>
        </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?> 
        <!-- OPTIONAL SCRIPTS -->      
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/module/team/js/form-validation/team_edit.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      </div>
</body>
</html>
