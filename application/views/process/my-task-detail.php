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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    
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
            <div class="breadcrumb-button">

                                <a href="#" class=" previous" title="">
                                    <button id="newlead" class="btn green">
                                        <i class="fa fa-arrow-left"></i>
                                        <!-- Previous  -->
                                    </button>
                                </a>
                                <a href="#" class="next">
                                    <button id="newlead" class="btn green">
                                        <!-- Next --><i class="fa fa-arrow-right"></i>
                                    </button>
                                </a>
                            </div>
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
                                  <span class="detail-list-heading">
                                    My Task Details
                                  </span><br>
                                  <span class="panel-title">
                                New Website Templates
                              </span>&nbsp;&nbsp;
                              <a class="btn btn-edit" href="<?php echo base_url('my-task-edit'); ?>">
                                <i class="fa fa-edit">
                                </i>
                                <span class="btn-text"> Edit
                                </span>
                              </a>
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
                                <td><a href="javascript:;" id="taskProcess" data-type="select" data-pk="1" data-value="" data-original-title="Process"> </a>
                                </td>
                                <td>Department
                                </td>
                                <td><a href="javascript:;" id="taskDepartment" data-type="select" data-pk="1" data-value="" data-original-title="Department"> </a>
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
                                <td><a href="javascript:;" id="taskDependecyTask" data-type="select" data-pk="1" data-value="" data-original-title="Dependency Task"> </a></td>                                                                  
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
                          <div class="col-md-12">
                            <p>All the changes are done</p>
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
                              <button type="button" class="btn btn-secondary btn grey" data-dismiss="modal">Close</button>
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
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery.mockjax.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/process/js/process-customs.js" type="text/javascript"></script>
        
        <script type="text/javascript">
          $('#taskProcess').editable({
        prepend: "New Changes",
        inputclass: 'form-control',
        source: [{
           value: 1,
           text: 'Old Updation'
        }, {
          value: 2,
          text: 'Rework'
        },{
           value: 3,
          text: 'Planning'
        }],
        display: function(value, sourceData) {
          var colors = {
            "": "gray",
            1: "green",
            2: "blue"
          },
          elem = $.grep(sourceData, function(o) {
            return o.value == value;
          });
          if (elem.length) {
             $(this).text(elem[0].text).css("color", colors[value]);
          } else {
             $(this).empty();
          }
        }
      });
      $('#taskDepartment').editable({
        prepend: "Front-End Team",
        inputclass: 'form-control',
        source: [{
           value: 1,
           text: 'Back-End Team'
        }, {
          value: 2,
          text: 'HR Team'
        },{
           value: 3,
          text: 'Account Team'
        },{
           value: 4,
          text: 'Sales Team'
        }],
        display: function(value, sourceData) {
          var colors = {
            "": "gray",
            1: "green",
            2: "blue"
          },
          elem = $.grep(sourceData, function(o) {
            return o.value == value;
          });
          if (elem.length) {
             $(this).text(elem[0].text).css("color", colors[value]);
          } else {
             $(this).empty();
          }
        }
      });      
      $('#taskDependecyTask').editable({
        prepend: "Creating Menu Bar Navigation",
        inputclass: 'form-control',
        source: [{
           value: 1,
           text: 'Colour Changes'
        }, {
          value: 2,
          text: 'Adding Content'
        },{
           value: 3,
          text: 'Mobile Responsive'
        }],
        display: function(value, sourceData) {
          var colors = {
            "": "gray",
            1: "green",
            2: "blue"
          },
          elem = $.grep(sourceData, function(o) {
            return o.value == value;
          });
          if (elem.length) {
             $(this).text(elem[0].text).css("color", colors[value]);
          } else {
             $(this).empty();
          }
        }
      });
        </script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
    </div>
      </body>
    </html>
