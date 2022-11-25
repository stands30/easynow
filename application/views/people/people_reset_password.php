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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $cacheVersion; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $cacheVersion; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $cacheVersion; ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
      /*.select2{
        width: 100% !important;
      }
      .enable-login-div
      {
        display: inline-flex;
      }
      .asterix-error
      {
        color:red;
      }
      .errormesssage
       {
        color:#f11414;
       }*/
    </style>
  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
      <?php
      $session_id = $this->session->userdata(PEOPLE_SESSION_ID);
      $session_id = empty($session_id); 
      if(!$session_id) {?>
      <?php $this->load->view('common/sidebar'); ?>
    <?php } ?>
      <!-- BEGIN CONTENT -->
      <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <div class="page-bar" id="breadcrumbs-list">
            <?php if(!$session_id) {?>
            <?php echo $breadcrumb; ?>
          <?php } ?>
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet portlet-fluid-background portlet-fluid-small">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Reset Password</h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form  role="form" id="reset_password" class="col-md-push-2 col-md-8 form_add">
                  <input type="hidden" name="ppl_id" id="ppl_id" value="<?php echo $ppl_id ?>">
                  <?php if($check == '1') {  ?>
                 <div class="row">
                   <div class="col-md-6">
                     <!-- <input type="hidden" name="epl_id" id="epl_id" value=""> -->
                       <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="password" name="ppl_pass" id="ppl_pass" class="form-control" value="">
                            <label>Password<span class="asterix-error"><em>*  </em> </span></label>
                            <i class="fas fa-unlock"></i>
                           <div class="help-block"></div>
                          </div>
                       </div>
                   </div>
                     <div class="col-md-6">
                       <!-- <input type="hidden" name="epl_id" id="epl_id" value=""> -->
                         <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                             <input type="password" name="ppl_confirm_pass" id="ppl_confirm_pass" class="form-control" value="">
                             <label>Confirm Password<span class="asterix-error"><em>*  </em> </span></label>
                              <i class="fas fa-unlock"></i>
                             <div class="help-block"></div>
                          </div>
                         </div>
                     </div>
                 </div>
                  </div>
              </div>
              <footer class="foo_bar">
                <div class="foo_btn">
                  <button type="submit" class="btn btn_save" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving...">Save&nbsp;
                    <i class="fa fa-check">
                    </i>
                  </button>
                  <button type="button" class="btn btn_can">Cancel&nbsp;
                    <i class="fa fa-times">
                    </i>
                  </button>
                </div>
              </footer>
              </form>
            <?php } else if($check == '0'){?>
              <div class="row">
                  <h2><?php echo $msg ?></h2>
              </div>
               </div>
           </div>
           <footer class="foo_bar">
           </footer>
         <?php } ?>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $cacheVersion; ?>" type="text/javascript">
        </script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $cacheVersion; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/additional-methods.min.js<?php echo $cacheVersion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $cacheVersion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/people/js/reset-password.js<?php echo $cacheVersion; ?>" type="text/javascript"></script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </body>
    </html>
