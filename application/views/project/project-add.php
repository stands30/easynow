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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />  
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

   <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" /> 
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
                  <h3 class="page-title text-center"><?php echo $title; ?></h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form role="form" id="project_save" class="col-md-push-2 col-md-8 form_add">
                  <input type="hidden" name="prj_id" id="prj_id" value="<?php if(isset($prj_data->prj_id)) echo $prj_data->prj_id; ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="prj_title" id="prj_title" class="form-control" data-msg="Please Enter Project Title" required="">  
                            <label for="prj_title">Title <span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-th-list list-level"></i>
                            <div class="help-block errormesssage"></div>
                          </div>                            
                          
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Company</label>
                        <div class="input-icon">
                          <i class="fa fa-industry icon-company list-level"></i>
                            <select class="form-control select2" id="prj_cmp_id" name="prj_cmp_id" data-msg="Please Select Company" type="select">
                           <option></option>
                          </select>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="prj_work_ord" id="prj_work_ord" class="form-control" data-msg="Please Enter Job Work">  
                            <label for="prj_work_ord">Work Order</label>
                            <i class="fas fa-chart-pie list-level"></i>
                            <div class="help-block"></div>
                          </div>                            
                          
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="prj_site_loc" id="prj_site_loc" class="form-control" data-msg="Please Enter Site Location">  
                            <label for="prj_site_location">Site Location</label>
                            <i class="fas fa-map-marked-alt list-level"></i>
                            <div class="help-block"></div>
                          </div>                            
                      </div>
                    </div>
                  </div>

                   <div class="row">
                     <div class="col-md-12">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <textarea type="textbox" class="form-control" id="prj_site_add" name="prj_site_add" rows="2" placeholder="" data-msg="Please Enter Site Address"></textarea>
                            <label>Site Address</label> 
                            <i class="fa fa-map-marker list-level"></i>
                            <div class="help-block"></div>
                          </div>
                          
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="drp-title drp-label-title">Description<span class="asterix-error"><em>*</em></span></label>
                          <textarea name="prj_desc" id="prj_desc" type="summernote" data-msg="PLease enter description" required></textarea>
                          <div class="help-block"></div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="col-md-6">
                      <div class="form-group form-group form-md-line-input form-md-floating-label">
                       <label class="drp-title">Managed By <span class="asterix-error"><em>*</em></span></label>
                        <div class="input-icon">
                          <i class="fa fa-user icon-people list-level"></i>
                            <select class="form-control select2" id="prj_manage_by" required="" name="prj_manage_by" data-msg="Please Select Managed By" type="select" >
                            <option></option> 
                          </select>
                          <div class="help-block"></div>
                        </div>
                        
                      </div> 
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group form-group form-md-line-input form-md-floating-label">
                       <label class="drp-title">Status <span class="asterix-error"><em>*</em></span></label>
                        <div class="input-icon">
                          <i class="fa fa-info-circle"></i>
                            <select class="form-control  select2" required="" id="prj_project_status" name="prj_project_status"  data-msg="Please Select Status" type="select" data-gen-grp="prj_project_status">
                            <option></option>
                          </select>
                        </div>
                        <div class="help-block"></div>
                      </div> 
                    </div>
                  </div>
                 
                  </div>
                  </div>
                   <?php $view_type = isset($prj_data->prj_id) ? '':VIEW_TYPE_ADD;  ?>
                  <?php $this->load->view('common/footer-buttons',array('view_type' => $view_type)); ?>  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
      <!-- OPTIONAL SCRIPTS -->
       <script src="<?php echo base_url();?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>assets/module/project/js/project.js" type="text/javascript"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          if ($('#prj_id').val()=='') {
            $('#prj_project_status').getDefaultvalue();
          }
          $('#prj_desc').summernote({
            height:300,
         });
              var prj_data = <?php echo isset($prj_data) ? json_encode($prj_data):''; ?>;
              displayFieldData('#project_save',prj_data);
        });
      </script>

    </div>
  </body>
</html>
