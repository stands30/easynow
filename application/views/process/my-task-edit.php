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
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS -->
  
    <link href="<?php echo base_url(); ?>assets/module/process/css/process-customs.css" rel="stylesheet" type="text/css" />
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
        
           <div class="portlet">
              <div class="row">
                <!-- END PAGE HEADER-->
                <div class="container-fluid">
                  <!-- -----MAIN CONTENTS START HERE----- -->
                  <aside class="profile-info col-md-12">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <div class="text-center invoice-btn col-lg-offset-10">
                        </div>
                        <header class="panel-heading color-primary">
                          <div class="row detail-box">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row inner-row">
                                  <span class="profile-info">
                                      My Task 
                                    </span><br>
                                  <span class="panel-title">
                                New Website Templates
                              </span>&nbsp;&nbsp;
                              
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row inner-row">
                                  <div class="created-title">
                              <span class="created">Created By: Nick Dave
                              </span>
                              <br>
                              <span class="sp-date">Created On: 27-03-2018
                              </span>
                            </div>
                                </div>
                              </div>
                                                                                     
                          </div>
                        </header>
                        <div class="table-responsive">
                          <table class="table custom table-style">
                            <tbody>
                              <tr>
                                <td>Process
                                </td>
                                <td>New Changes
                                </td>
                                <td>Department
                                </td>
                                <td>I.T
                                </td>
                              </tr>
                              <tr>
                                <td>Order</td>
                                <td>101</td>
                                <td >Status</td>
                                <td>Open</td>                                                                  
                              </tr>
                               <tr>
                                <td>Dependency</td>
                                <td>Yes</td>
                                <td>Dependency Task</td>
                                <td>Creating Menu Bar Navigation</td>                                                                  
                              </tr>
                              <tr>
                                <td>Duration</td>
                                <td>2 Hrs</td>
                                <td>Initiated On</td>
                                <td>22-Aug-2018 10:57:AM (Today)</td>                                 
                              </tr>
                              <!-- <tr>
                                <td>Department
                                </td>
                                <td>I.T
                                </td>
                                <td>Initiated On
                                </td>
                                <td>12:00:00 PM
                                </td>
                              </tr> -->
                              <!-- <tr>
                                <td>Duration
                                </td>
                                <td >
                                  2 Hrs
                                </td>
                                <td>Deadline
                                </td>
                                <td>02:00:00 PM
                                </td>                               
                              </tr> -->
                              <tr>
                                <td>Deadline</td>
                                <td>22-Aug-2018 12:57:PM (Today)</td> 
                                <td>Completed On</td>
                                <td>22-Aug-2018 12:57:PM (Today)</td>                                                                                          
                              </tr>
                           
                             
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label class="bold">Description</label>
                        <div class="col-md-12">
                          <p>Kindly check the content as mailed and discussed. One photo and some description needs to be checked.</p>
                        </div>
                      </div>
                      
                       <div class="col-md-12">
                          <label class="bold">Response</label>
                          <div>
                            <div name="summernote" id="summernote_1"> </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="bold">Attachment <a data-toggle="modal" href="#attachment" class="attachments">+</a></label>
                          
                        </div>
                        <!-- Modal Start here -->
                        <div class="modal fade modal-attachments" id="attachment" tabindex="-1" role="basic" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <div class="text-center">
                                  <h3 class="modal-title text-center">Add Attachment</h3>
                                  <span class="sp_line color-primary text-center"></span>
                                </div>
                                                    
                            </div>
                            <div class="modal-body modal-body-attachments">
                              <div class="col-md-6 form-group fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 30px;">
                                  <div class="image-preview" style="padding-left: 0px;">
                                    <div id="image_preview" ></div>
                                      <span class="btn default btn-file btn-file-view">
                                      <input type="file" id="ppl_profile_image" name="ppl_profile_image" class="profile-image btn-file-view"> 
                                      </span>
                                      <span class="custom-error"></span>
                                  </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn green">Save changes</button>
                             </div>
                            </div>
                                            <!-- /.modal-content -->
                          </div>
                                        <!-- /.modal-dialog -->
                        </div>
                       <!-- Modal Ends here -->
                    </section>
                  </aside>
                  <!-- -----MAIN CONTENTS END HERE----- -->
                </div>
              </div>
            </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
         <script src="<?php echo base_url();?>assets/project/global/plugins/moment.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
        </script>       
        <script src="<?php echo base_url();?>assets/project/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project-scripts/components-select2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/process/js/process-customs.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js" type="text/javascript"></script>
        <script type="text/javascript">
          
        </script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
    </div>
      </body>
    </html>
