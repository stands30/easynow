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
    <link rel="shortcut icon" href="favicon.ico" />
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
              <div class="container-fluid">
                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Edit Company People
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form  role="form" id="cmp_ppl_edit" class="col-md-push-2 col-md-8 form_add">
                  <input type="hidden" name="cpl_id" id="cpl_id" value="<?php echo $companyPplDetail->cpl_id ?>">


                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label class="drp-title">Company</label>
                      <div class="input-icon">
                         <i class="fa fa-building"></i>               
                          <select name="cpl_cmp_id" id="cpl_cmp_id" class="form-control company_name custom-select2">
                            <option value="<?php echo $companyPplDetail->cpl_cmp_id; ?>"><?php echo $companyPplDetail->cmp_name; ?></option>
                        </select>
                      </div>    
                    </div>

                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label class="drp-title">People</label>
                      <div class="input-icon">
                         <i class="fa fa-users"></i>                
                          <select name="cpl_ppl_id" id="cpl_ppl_id" class="form-control company_people custom-select2">
                          <option value="<?php echo $companyPplDetail->cpl_ppl_id; ?>"><?php echo $companyPplDetail->ppl_name; ?></option>
                        </select>
                      </div>    
                    </div>

                     <div class="form-group col-md-6 form-md-line-input form-md-floating-label  col-md-6">
                      <div class="input-icon">
                         <i class="fa fa-id-card-alt"></i>    
                         <input type="text" class="form-control " name="cpl_designation" id="cpl_designation" value="<?php echo $companyPplDetail->cpl_designation; ?>">
                      <label>Designation  </label>
                      </div>  

                      <div class="help-block"></div>                       
                    </div>
                    
                  </div>
              </div>
                <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_EDIT)); ?>
              </form>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/additional-methods.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/company/js/form-validation/company_people.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       
          <script type="text/javascript">
            $(document).ready(function(){
              $('.btn_save_new').on('click', function(){
                $('.no-redirect').prop('checked', true);
                $('.btn_save').click();
              })
            })
          </script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </body>
    </html>
