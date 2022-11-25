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
     <link href="<?php echo base_url() ?>assets/project/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
          <div class="portlet portlet-fluid-background portlet-fluid-small">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center mt-20">Edit Gallery Set
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" class="col-md-push-2 col-md-8 form_add" id="gallery_edit">
                  <div class="row">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label class="drp-title">Gallery Type</label>
                        <div class="input-icon">
                           <i class="fas fa-image"></i>
                          <select  class="form-control gallery_type custom-select2" name="gls_type" id="gls_type" >
                          <option value="<?php echo $galleryEdit->gls_type ?>" selected="selected"><?php echo $galleryEdit->gls_types ?></option>
                          <option></option>
                        </select>
                         <label class="custom-label">Select Gallery Type</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                         <label class="drp-title">&nbsp;</label>
                        <div class="input-icon">
                          <input type="text" name="gls_name" id="gls_name" class="form-control form_c " value="<?php echo $galleryEdit->gls_name ?>">
                          <input type="hidden" name="gls_id" id="gls_id" value="<?php echo $galleryEdit->gls_id ?>" >
                          <label>Gallery Name
                            <span class="asterix-error">
                             <em>*
                              </em>
                            </span>
                          </label>
                          <i class="fas fa-address-card list-level"></i>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="gls_order_by" id="gls_order_by" class="form-control form_c" onkeypress="return validateQty(event);" value="<?php echo $galleryEdit->gls_order_by ?>">
                          <label>Order By</label>
                          <i class="fas fa-list-ol list-level"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="   control-label">Image (list) </label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                      <img  src="<?php echo base_url().GALLERY_SET_IMAGE_PATH.$galleryEdit->gls_image ?>" alt="" /> </div>
                                      <input type="hidden" name="old_img" id="old_img" value="<?php  echo $galleryEdit->gls_image?>">
                                        <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                    <!-- <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div> -->
                                        <span class="btn red  btn-file">
                                            <span class="fileinput-new"> Select image </span>
                                            <span class="fileinput-exists"> Change </span>
                                            <input type="file" accept="image" name="img" id="img" > </span>
                                        <a href="javascript:;" class="btn blue fileinput-exists" data-dismiss="fileinput"> Remove </a>

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
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo base_url() ?>assets/project/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/project/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/gallery-set/js/form-validation/gallery_set_edit.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
        <script type="text/javascript">
      		var base_url = '<?php echo base_url(); ?>';
        	function validateQty(event)
        	{
        		var key = window.event ? event.keyCode : event.which;
        		if (event.keyCode == 8 || event.keyCode == 46
        		 || event.keyCode == 37 || event.keyCode == 39) {
        				return true;
        		}

        		else if ( (key != 46 || $(this).val().indexOf('.') != -1) && key < 48 || key > 57  ) {
        				return false;
        		}
        		else return true;
        	}

         
      	</script>
        <!-- <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script> -->
        <!-- END OPTIONAL SCRIPTS -->
      </div>
  </body>
</html>
