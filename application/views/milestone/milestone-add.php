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
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />   
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
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
                  <h3 class="page-title text-center">Add Milestone
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                  <form role="form" id="product_add" class="col-md-push-2 col-md-8 form_add">
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <input type="text" name="prd_hsn_code" id="prd_hsn_code" class="form-control form_c">  
                              <label>Name</label>
                              <i class="fas fa-th-list list-level"></i>
                            </div>                            
                            <div class="help-block"></div>
                        </div>
                      </div>
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          
                          <input type="text" class="form-control date date-picker" data-date-format="dd/mm/yyyy" id="evt_date"  name="evt_date"   value="">
                          <label class="control-label">Date</label>
                          <i class="fas fa-calendar"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="form-group form-group form-md-line-input form-md-floating-label">
                          <!-- <label>Modules</label> -->
                          <div class="input-icon">
                              <select class="form-control select2"> 
                              <option value="0">Select Team</option> 
                              <option value="1">Pooja</option>
                              <option value="2">Stanley</option>
                              <option value="3">Ankush</option>
                              <option value="4">Pranali</option>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="form-group form-group form-md-line-input form-md-floating-label">
                        <!-- <label>Modules</label> -->
                        <div class="input-icon">
                            <select class="form-control select2">
                            <option value="0">Select Status</option>  
                            <option value="1">Pending</option>
                            <option value="2">Issued</option> 
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="form-group form-group form-md-line-input form-md-floating-label">
                        <!-- <label>Modules</label> -->
                        <div class="input-icon">
                            <select class="form-control select2">
                            <option value="0">Select Project</option>  
                            <option value="1">Easy Now</option>
                            <option value="2">samrat</option>
                            <option value="3">Pcos</option> 
                          </select>
                        </div>
                      </div>
                    </div>
                     <div class="col-md-6 ">
                      <div class="form-group form-group form-md-line-input form-md-floating-label">
                        <!-- <label>Modules</label> -->
                        <div class="input-icon">
                            <select class="form-control select2">
                            <option value="0">Select Task</option>  
                            <option value="1">Today's Due Progress</option>
                            <option value="2">My Task Progress</option> 
                            <option value="3">My Support Progress</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Description<span class="asterix-error"><em>*</em></span></label>
                              <textarea name="summernote" id="summernote_1" data-msg="PLease enter description" required></textarea>
                              <div class="help-block"></div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <footer class="foo_bar">
                  <div class="foo_btn">
                      <button class="btn btn_save">Save&nbsp;<i class="fa fa-check"></i></button>
                      <button class="btn btn_can">Cancel&nbsp;<i class="fa fa-times"></i></button>
                  </div>
              </footer>
              </form>
          </div>
        </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/product/js/form-validation/product_add.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js" type="text/javascript"></script>
      </div>

       <script type="text/javascript">
         $('.date-picker').datepicker({
          autoClose:true,
           }).on('changeDate', function(e){
              $(this).addClass('edited');
              $(this).datepicker("hide");
        });

       </script>

</body>
</html>
