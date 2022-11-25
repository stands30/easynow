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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/module/error/css/custom-error.css" />    
    <style type="text/css">
      
    </style>
    <!-- OPTIONAL LAYOUT STYLES -->
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
          <!-- END PAGE HEADER-->
          <!-- -----MAIN CONTENTS START HERE----- -->
          <div class="portlet light bordered portlet-error">
            <div class="center-item">
              <h5 class="error-number"><span class="number-bold">404</span> </h5>
              <h4><span class="not-found-title">Oops! page not found</span></h4>
              <p class="error-msg">The Page you are looking for seems to be missing.</p>
              <a href="<?php echo base_url('dashboard') ?>" class="btn green btn-back">Return To Dashbord</a>
            </div>
            <!-- <div class="portlet-title">
              <div class="caption font-dark">
                
                <span class="caption-subject bold uppercase">Access Forbidden</span> &nbsp;
              </div>
              <div class="tools">
              </div>
            </div>
            <div class="portlet-body ">
              <p> Access to this resource is denied. Please contact your system administrator. </p>
            </div> -->
          </div>
          <!-- MAIN CONTENTS END HERE -->
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
      <!-- OPTIONAL SCRIPTS -->

    </div>
  </body>
</html>
