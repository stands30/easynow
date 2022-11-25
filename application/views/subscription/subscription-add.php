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
                  <h3 class="page-title text-center">Add New Subscription
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                  <form role="form" id="sub_add" class="col-md-push-2 col-md-8 form_edit">
                    <div class="row">
                      <div class="col-md-6">

                        <input type="hidden" name="sub_phone" id="sub_phone" />
                        <input type="hidden" name="sub_email" id="sub_email" />

                        <div class="form-group form-md-line-input form-md-floating-label">  
                          <label class="drp-title">Customer</label>
                          <div class="input-icon">
                            <i class="fas fa-user list-level"></i>
                              <select name="sub_people" id="sub_people" class="form-control sub_people custom-select2">
                              <option>Please Select Customer</option>
                            </select>
                              <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">  
                          <label class="drp-title">Company</label>
                          <div class="input-icon">
                            <i class="fas fa-building list-level"></i>
                              <select name="sub_company" id="sub_company" class="form-control sub_company custom-select2">
                              <option>Please Select Company</option>
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
                            <input type="text" name="sub_domain" id="sub_domain" class="form-control  color-primary-light">
                            <label for="sub_domain">Domain</label>
                            <i class="fas fa-globe list-level"></i>
                          </div>
                          <div class="help-block"></div>  
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="sub_unique" id="sub_unique" class="form-control color-primary-light" readonly="" value="<?php echo $this->home_model->generateRandomStringNum(4); ?>">
                            <label for="sub_unique">Unique</label>
                            <i class="fas fa-list-ul list-level"></i>
                          </div>
                          <div class="help-block"></div>  
                        </div>
                      </div>
                    </div>
                    <div class="row mb-40">
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="sub_database" id="sub_database" class="form-control  color-primary-light" readonly="">
                            <label for="sub_database">Database</label>
                            <i class="fas fa-database list-level"></i>
                          </div>
                          <div class="help-block"></div>  
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group form-md-line-input form-md-floating-label">  
                            <label class="drp-title">Status</label>
                            <div class="input-icon">
                              <i class="fas fa-info-circle list-level"></i>
                                <select name="sub_status" id="sub_status" class="form-control sub_status custom-select2">
                                <option>Please Select Status</option>
                              </select>
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
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>

        <script type="text/javascript">
          var auto_deployment_url = '<?php echo base_url("autodeploy-addclient"); ?>';
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/subscription/js/subscription-add.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

        <script type="text/javascript">
          
          $(document).ready(function(){
            $('#sub_domain').on('keyup', function(){
              $('#sub_database').val($(this).val())
            })
          })

        </script>

        <!-- OPTIONAL SCRIPTS -->
      </div>
</body>
</html>
