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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/ticket/css/ticket.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />

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
              <!-- START PAGE CONTENT-->
              <div class="container-fluid container-wrap">
                  <div class="row">
                      <div class="col-md-12">
                         <div class="text-center title_wrap">
                            <h3 class="page-title text-center">Edit Ticket</h3>
                            <span class="sp_line color-primary"></span>
                        </div>
                        <form id="ticket_edit" method="post" class="horizontal-form">
                        <div class="portlet light bg-inverse col-md-push-1 col-md-10" style="background-color: white">

                           <div class="portlet-body form">

                              <div class="form-body">
                                <div class="row">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Title <span class="asterix-error"><em>*</em></span></label>
                                        <input type="hidden" class="form-control" id="tck_id" required="" name="tck_id" value="<?php if(isset($ticket_data->tck_id)) echo $ticket_data->tck_id; ?>">
                                        <input type="text" class="form-control" id="tck_title" required="" name="tck_title" aria-required="true" value="<?php if(isset($ticket_data->tck_title)) echo $ticket_data->tck_title; ?>">
                                        <div class="help-block"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                         <label class="control-label">Description</label>
                                          <div class="">
                                            <textarea name="summernote" id="summernote_1" name="tck_desc" required ><?php if(isset($ticket_data->tck_desc)) echo $ticket_data->tck_desc; ?></textarea>
                                          </div>
                                          <div class="help-block"></div>
                                      </div>

                                    </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">Priority<span class="asterix-error" ><em>*</em></span></label>
                                        <select class="form-control select2" id="tck_priority" name="tck_priority" required>
                                          <option value="<?php if(isset($ticket_data->tck_priority)) echo $ticket_data->tck_priority; ?>" selected>
                                            <?php if(isset($ticket_data->tck_priority_name)) echo $ticket_data->tck_priority_name; ?>
                                          </option>
                                        </select>
                                      </div>
                                      <div class="help-block"></div>
                                    </div>
                                     <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">Status<span class="asterix-error" ><em>*</em></span></label>
                                        <select class="form-control select2" id="tck_progress_status" name="tck_progress_status" required>
                                          <option value="<?php if(isset($ticket_data->tck_progress_status)) echo $ticket_data->tck_progress_status; ?>" selected>
                                            <?php if(isset($ticket_data->tck_progress_status_name)) echo $ticket_data->tck_progress_status_name; ?>
                                          </option>
                                        </select>
                                      </div>
                                      <div class="help-block"></div>
                                    </div>

                                  </div>
                                  <div class="row">

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">Assign To<span class="asterix-error" ><em>*</em></span></label>
                                        <select class="form-control select2" id="tck_user_ass_to" name="tck_user_ass_to" required>
                                          <option value="<?php if(isset($ticket_data->tck_user_ass_to)) echo $ticket_data->tck_user_ass_to; ?>" selected>
                                            <?php if(isset($ticket_data->tck_user_ass_to_name)) echo $ticket_data->tck_user_ass_to_name; ?>
                                          </option>
                                        </select>
                                      </div>
                                      <div class="help-block"></div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">Ticket Type<span class="asterix-error" ><em>*</em></span></label>
                                        <select class="form-control select2" id="tck_type" name="tck_type" required>
                                          <option value="<?php if(isset($ticket_data->tck_type)) echo $ticket_data->tck_type; ?>" selected>
                                            <?php if(isset($ticket_data->tck_type_name)) echo $ticket_data->tck_type_name; ?>
                                          </option>
                                        </select>
                                      </div>
                                      <div class="help-block"></div>
                                    </div>
                                  </div>
                                  <div class="row">

                                     <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">Client<span class="asterix-error"><em>*</em></span></label>
                                        <select class="form-control select2" id="tck_client_id" name="tck_client_id" required>
                                          <option value="<?php if(isset($ticket_data->tck_client_id)) echo $ticket_data->tck_client_id; ?>" selected>
                                            <?php if(isset($ticket_data->tck_client_id_name)) echo $ticket_data->tck_client_id_name; ?>
                                          </option>
                                        </select>
                                      </div>
                                      <div class="help-block"></div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">Due Date</label>
                                          <input type="text" class="form-control date date-picker" id="tck_due_dt" name="tck_due_dt" placeholder="Due Date" value="<?php if(isset($ticket_data->tck_due_dt)) echo $ticket_data->tck_due_dt; ?>">
                                      </div>
                                      <div class="help-block"></div>
                                    </div>

                                  </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                         <div class="form-group fileinput fileinput-new" data-provides="fileinput" style="">
                                          <label class="control-label">Document</label>
                                            <div class="image-preview" style="padding-left: 0px;">
                                              <div id="image_preview" ></div>
                                                <span class="btn default btn-file btn-file-view">
                                                  <input type="file" id="tck_document" name="tck_document" class="profile-image btn-file-view" multiple >
                                                </span>
                                            </div>
                                          </div>
                                      </div>

                                    </div>


                                </div>
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

              </div>

              </form>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
       <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js" type="text/javascript">
        </script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
        </script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url();?>assets/project/project-scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js" type="text/javascript"></script>
       
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo ci_asset_versn(); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/module/ticket/js/ticket-customs.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/ticket/js/ticket-edit.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo ci_asset_versn(); ?>" type="text/javascript"></script>
      </div>
  </body>

</html>
