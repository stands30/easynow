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
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- OPTIONAL LAYOUT STYLES -->
    
    <link href="<?php echo base_url(); ?>assets/process/css/process-customs.css" rel="stylesheet" type="text/css" />
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
          <div class="portlet">
            <div class="row">
              <!-- END PAGE HEADER-->
              <form role="form" id="task-add">
              <div class="container-fluid">
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center">Add New Master Task
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
               
                <div class="col-md-12 form_add">

                  <div class="form-group col-md-4">
                    <label>Process
                    </label>
                    <select name="clocation" class="form-control">
                      <option value="1">New changes
                      </option>
                      <option value="2">Development
                      </option>
                      <option value="3">Updates
                      </option>
                    </select>
                  </div>

                  <div class="col-md-12 mb-60">
                  <div class="repeater repeater-block-disbursement repeater-div">
                    <div class="col-md-12">
                          <div class="portlet light bg-inverse portlet-body">
                             <div class="portlet-title">
                                <div class="caption font-dark">
                                  <span class="caption-subject bold uppercase">
                                    Sub Task
                                  </span>
                                </div>
                            </div>
                          </div>
                         
                        </div>
                    <div data-repeater-list="group-b" >
                      <div data-repeater-item>
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Title </label>
                             <input type="text" name="ttitle" value="" class="form-control" placeholder="Quantity"> 
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Department</label>
                             <select name="tdepartment" class="form-control">
                                <option value="1">IT
                                </option>
                                <option value="2">HR
                                </option>
                                <option value="3">Management
                                </option>
                              </select>
                              <!-- <input type="text" name="tdurablityrep" value="" class="form-control" placeholder="Durability"> -->
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>User</label>
                              <select name="tuser" class="form-control">
                                <option value="1">Ankush
                                </option>
                                <option value="2">Yakub
                                </option>
                                <option value="3">Stanley
                                </option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Order </label>
                              <input type="text" name="torder" value="" class="form-control" placeholder="Volume"> 
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Description </label>
                               <textarea class="form-control" rows="3" id="desc_task" name="desc_task" placeholder="Description"></textarea>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Due Month </label>
                                <input type="text" name="dueMonth" value="" class="form-control"> 
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Due Days </label>
                                <input type="text" name="dueDays" value="" class="form-control" > 
                          </div>
                        </div>
                         <div class="col-md-3 form-group fileinput fileinput-new mt-20" data-provides="fileinput" style="">
                           <!--  <label>Browse                      
                          </label> -->
                            <div class="image-preview" style="padding-left: 0px;">
                              <div id="image_preview" ></div>
                                <span class="btn default btn-file btn-file-view">
                                  <input type="file" id="ppl_profile_image" name="ppl_profile_image" class="profile-image btn-file-view"> 
                                </span>
                                <span class="custom-error"></span>
                            </div>
                        </div>
                       <!--  <div class="col-md-2">
                          <div class="form-group">
                            <label>Due Days </label>
                                <input type="text" name="dueDays" value="" class="form-control" > 
                          </div>
                        </div> -->
                     
                        <div class="col-md-1 mt-1">
                          <a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-20"><i class="fa fa-close"></i></a>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <a href="javascript:;" data-repeater-create="" class="btn btn-info mt-repeater-add btn green mb-20">      Add More&nbsp;                    <i class="fa fa-plus"></i>
                      </a>
                    </div>
                  </div> 
                </div>
                <div class="col-md-4 form-group fileinput fileinput-new mt-20" data-provides="fileinput" style="">  
                   <label>Browse</label>             
                  <div class="image-preview" style="padding-left: 0px;">
                    <div id="image_preview" ></div>
                      <span class="btn default btn-file btn-file-view">
                        <input type="file" id="ppl_profile_image" name="ppl_profile_image" class="profile-image btn-file-view"> 
                      </span>
                      <span class="custom-error"></span>
                  </div>
                </div>

                </div>
                <div>                  
                </div>               
              </div>
              <footer class="foo_bar">
                <div class="foo_btn">
                  <button type="submit" class="btn btn_save">Save&nbsp;
                    <i class="fa fa-check">
                    </i>
                  </button>
                  <button type="button" class="btn btn_can" onclick="goBack()">Cancel&nbsp;
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
       
        <!-- BEGIN PAGE LEVEL PLUGINS -->
         <script src="<?php echo base_url();?>assets/global/plugins/moment.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
        </script>       
        <script src="<?php echo base_url();?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project-scripts/components-select2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/pages/scripts/form-repeater.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        
        <script src="<?php echo base_url(); ?>assets/process/js/process-customs.js" type="text/javascript"></script>
        <script type="text/javascript">
          
        </script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </body>
    </html>
