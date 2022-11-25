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
    <!-- <link href="<?php echo base_url(); ?>assets/banks/assets/css/banks-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                  <h3 class="page-title text-center">Add New Company People
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form  role="form" id="cmp_ppl_add" class="col-md-push-2 col-md-8 form_add">
                  <!-- <input type="hidden" name="bpl_bnk_id" id="bpl_bnk_id" value="<?php //echo $bnk_id ?>"> -->
                  <div class="form-group col-md-6">
                       <label>Client</label>
                        <select name="cpl_cmp_id" id="cpl_cmp_id"  class="form-control client_name" required>
                          <?php if(isset($cmp_id) && isset($cmp_name)) { ?>
                          <option value="<?php echo $cmp_id; ?>"><?php echo $cmp_name; ?></option>
                        <?php } ?>
                         </select>
                         <div class="help-block">
                         </div>
                 </div>

                   <!-- <input type="hidden" name="epl_id" id="epl_id" value=""> -->
                     <div class="form-group col-md-6">
                         <label>People
                           <span class="asterix-error">
                             <em>*
                             </em>
                           </span>
                         </label>
                         <select class="form-control client_people" id="cpl_ppl_id" name="cpl_ppl_id" required>
                         </select>
                         <div class="help-block">
                         </div>
                     </div>

                    <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">  
                           <label class="drp-title">Designation</label>
                          <div class="input-icon">
                            <i class="fas fa-id-card-alt"></i>
                              <select name="cpl_designation" id="cpl_designation" class="form-control cpl_designation custom-select2">
                               <option value=""></option>
                               <option class="blank_option"></option>
                            </select>                                                              
                              <div class="help-block"></div>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
              <footer class="foo_bar">
                <!-- <div class="foo_btn">
                  <button type="submit" class="btn btn_save" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving...">Save&nbsp;
                    <i class="fa fa-check">
                    </i>
                  </button>
                  <button type="button" class="btn btn_can">Cancel&nbsp;
                    <i class="fa fa-times">
                    </i></a>
                  </button>
                </div> -->

                <div class="foo_btn">
                  <button type="button" class="btn btn_can">Cancel&nbsp;<i class="fa fa-times"></i></button>
                  <input type="checkbox" class="no-redirect hidden" />
                  <button type="button" class="btn btn_primary btn_save_new btn-save">Save & New &nbsp;<i class="fa fa-check"></i></button>
                  <button type="submit" class="btn btn_save">Save&nbsp;<i class="fa fa-check"></i></button>
                  <button type="button" class="btn btn_processing" style="display: none;"><i class='fa fa-spinner'></i> Saving...</i></button>
              </div>
              </footer>
              </form>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/additional-methods.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/client/js/form-validation/client_people.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        
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
