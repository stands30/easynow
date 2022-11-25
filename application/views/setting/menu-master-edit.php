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
  <style type="text/css">
    .select2{
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
     }
  </style>
  <head>
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?>
    <!-- OPTIONAL LAYOUT STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/setting/css/setting-customs.css" rel="stylesheet" type="text/css" />

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
          <div class="portlet">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center">Edit Menu Master
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" class="col-md-push-2 col-md-8 form_add" id="mnu_edit">
                  <div class="form-group col-md-6">
                    <label>Name<span class="asterix-error"><em>*</em></span>
                    </label>
                    <input type="hidden" name="mnu_id" id="mnu_id" value="<?php echo $mnu_details->mnu_id ?>">
                    <input type="text" name="mnu_name" id="mnu_name" value="<?php echo $mnu_details->mnu_name ?>" class="form-control color-primary-light" placeholder="Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Link<span class="asterix-error"><em>*</em></span>
                    </label>
                    <input type="text" name="mnu_link" id="mnu_link" value="<?php echo $mnu_details->mnu_link ?>" class="form-control color-primary-light" placeholder="Link" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Icon<span class="asterix-error"><em>*</em></span>
                    </label>
                    <input type="text" name="mnu_icon" id="mnu_icon" value="<?php echo $mnu_details->mnu_icon ?>" class="form-control color-primary-light" placeholder="Icon" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Order<span class="asterix-error"><em>*</em></span>
                    </label>
                    <input type="text" name="mnu_order" id="mnu_order" value="<?php echo $mnu_details->mnu_order ?>" class="form-control color-primary-light" placeholder="Order" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Status<span class="asterix-error"><em>*</em></span>
                    </label>
                    <select name="mnu_status" id="mnu_status" class="form-control mnu_status" required>
                      <option value="<?php echo $mnu_details->mnu_status ?>"><?php echo $mnu_details->mnu_status_name ?></option>
                      <!-- <option value="1">Active
                      </option>
                      <option value="2">Inactive
                      </option> -->
                    </select>
                    </div>
                  </div>
              </div>
              <footer class="foo_bar">
                <div class="foo_btn">
                  <button type="submit" class="btn btn_save">Save&nbsp;
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
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
       <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/setting/js/menu_master.js" type="text/javascript">
         </script>

      </div>
  </body>
</html>
