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
    <link href="<?php echo base_url();?>assets/project/global/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url();?>assets/module/process/css/process-customs.css" rel="stylesheet" type="text/css" />
    <!-- END OPTIONAL LAYOUT STYLES -->  
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
                              <div class="col-md-9 col-sm-6 col-xs-12">
                                <div class="row inner-row">
                                  <span class="panel-title">
                                    New Template Creation
                                  </span>&nbsp;&nbsp;
                              <a class="btn btn-edit" href="#">
                                <i class="fa fa-edit">
                                </i>
                                <span class="btn-text"> Edit
                                </span>
                              </a>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-6 col-xs-12">
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
                              <td>Process</td>
                              <td><a href="javascript:;" id="taskProcess" data-type="select" data-pk="1" data-value="" data-original-title="Process"> </a></td>
                              <td>Department</td>
                              <td><a href="javascript:;" id="taskDepartment" data-type="select" data-pk="1" data-value="" data-original-title="Department"> </a></td>
                            </tr>
                            <tr>
                              <td>Order</td>
                              <td>101</td>
                              <td>User</td>                        
                              <td><a href="javascript:;" id="taskUser" data-type="select" data-pk="1" data-value="" data-original-title="User"> </a></td>
                            </tr>
                            <tr>
                              <td>Duration</td>
                              <td>2 hrs</td>  
                              <td>Initiated On</td> 
                              <td>22-Aug-2018 10:57:AM (Today)</td> 
                            </tr>
                            <tr>
                              <td>Deadline</td>
                              <td>22-Aug-2018 12:57:PM (Today)</td>
                              <td>Completed On</td>
                              <td>22-Aug-2018 12:57:PM (Today)</td>
                            </tr>
                            <tr>
                              <td>Dependency</td>
                              <td>Yes</td>
                              <td>Dependency Task</td>
                              <td><a href="javascript:;" id="taskDependecyTask" data-type="select" data-pk="1" data-value="" data-original-title="Dependency Task"> </a></td>
                            </tr>
                            
                                                  
                          
                          </tbody>
                        </table>
                      </div>



                      <!-- <div class="table-responsive">
                        <table class="table custom" style="border:2px solid;border-style: ridge;    border-top: none;">
                          <tbody>
                           
                            <tr>
                              <td>Description
                              </td>
                              <td >
                                Kindly check the content as mailed and discussed.

One photo and some description needs to be checked.

                              </td>
                             
                            </tr>
                                                  
                          
                          </tbody>
                        </table>
                      </div> -->
                      
                     <!--  <div class="portlet main-portlet-tree">
                          <div class="portlet-title portlet-tree">
                              <div class="caption">
                               Master Task Tile
                              </div>
                            <div class="tools tools-jstree" style="padding-right: 10px;">
                              <a href="javascript:;" class="collapse"> </a>
                                       
                            </div>
                          </div>
                          <div class="portlet-body">
                            <div id="tree_3" class="tree-demo"> </div>                                    
                         </div>
                      </div> -->
                        
                       <!--  <div class="portlet">
                               
                                <div class="portlet-body">
                                    <div class="panel-group accordion scrollable" id="accordion2">
                                        <div class="panel panel-default">
                                            <div class="panel-heading accordion-heading" style="background-color: #36c6d3 !important;">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_1">Title </a>
                                                   
                                                </h4>
                                            </div>
                                            <div id="collapse_2_1" class="panel-collapse in">
                                                <div class="panel-body main-panel">
                                                  <div class="table-responsive">
                                                        <table class="table custom" style="border:none">
                                                          <tbody>
                                   
                                                           <tr>
                                                              <td>Process</td>
                                                              <td>New</td>
                                                              <td>Department</td>
                                                              <td>I.T</td>
                                                              
                                                          </tr>
                                                          <tr>
                                                              <td>User</td>
                                                              <td>Anil</td>
                                                              <td>Duration</td>
                                                              <td>2 hrs</td>
                                                              
                                                          </tr>
                                                          <tr>
                                                              <td>Order</td>
                                                              <td colspan="3">1011</td>
                                                             
                                                              
                                                          </tr>
                                  
                                                           </tbody>
                                                        </table>
                                                   </div>                                                                                                     
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background-color: #36c6d3 !important;">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_2"> Title</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_2_2" class="panel-collapse collapse">
                                                <div class="panel-body main-panel">
                                                   <div class="table-responsive">
                                                        <table class="table custom" style="border:none">
                                                          <tbody>
                                   
                                                           <tr>
                                                              <td>Process</td>
                                                              <td>New</td>
                                                              <td>Department</td>
                                                              <td>I.T</td>
                                                              
                                                          </tr>
                                                          <tr>
                                                              <td>User</td>
                                                              <td>Anil</td>
                                                              <td>Duration</td>
                                                              <td>2 hrs</td>
                                                              
                                                          </tr>
                                                          <tr>
                                                              <td>Order</td>
                                                              <td colspan="3">1011</td>
                                                             
                                                              
                                                          </tr>
                                  
                                                           </tbody>
                                                        </table>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background-color: #36c6d3 !important;">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_3"> Title </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_2_3" class="panel-collapse collapse">
                                                <div class="panel-body main-panel">
                                                    <div class="table-responsive">
                                                        <table class="table custom" style="border:none">
                                                          <tbody>
                                   
                                                           <tr>
                                                              <td>Process</td>
                                                              <td>New</td>
                                                              <td>Department</td>
                                                              <td>I.T</td>
                                                              
                                                          </tr>
                                                          <tr>
                                                              <td>User</td>
                                                              <td>Anil</td>
                                                              <td>Duration</td>
                                                              <td>2 hrs</td>
                                                              
                                                          </tr>
                                                          <tr>
                                                              <td>Order</td>
                                                              <td colspan="3">1011</td>
                                                             
                                                              
                                                          </tr>
                                  
                                                           </tbody>
                                                        </table>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background-color: #36c6d3 !important;">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_4"> Title</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_2_4" class="panel-collapse collapse">
                                                <div class="panel-body main-panel">
                                                   <div class="table-responsive">
                                                        <table class="table custom" style="border:none">
                                                          <tbody>
                                   
                                                           <tr>
                                                              <td>Process</td>
                                                              <td>New</td>
                                                              <td>Department</td>
                                                              <td>I.T</td>
                                                              
                                                          </tr>
                                                          <tr>
                                                              <td>User</td>
                                                              <td>Anil</td>
                                                              <td>Duration</td>
                                                              <td>2 hrs</td>
                                                              
                                                          </tr>
                                                          <tr>
                                                              <td>Order</td>
                                                              <td colspan="3">1011</td>
                                                             
                                                              
                                                          </tr>
                                  
                                                           </tbody>
                                                        </table>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  -->
                     
                     
                     <!--  <header class="panel-heading color-primary">
                        <div class="detail-box">
                          
                            <span class="panel-title">
                             Login Details
                            </span>&nbsp;&nbsp;
                            <a class="btn btn-edit" href="">
                              <i class="fa fa-edit">
                              </i>
                              <span class="btn-text"> Edit
                              </span>
                            </a>
                           
                          
                          <div class="created-title">
                            <span class="created">Created By: Nick Dave
                            </span>
                            <br>
                            <span class="sp-date">Created On: 27-03-2018
                            </span>
                          </div>
                        </div>
                      </header>
                      <div class="table-responsive">
                        <table class="table" style="border:2px solid;border-style: ridge;    border-top: none;">
                          <tbody>
                            <tr>
                              <td>Department
                              </td>
                              <td>IT
                              </td>
                              <td>User
                              </td>
                              <td>Anil
                              </td>
                            </tr>
                            <tr>
                              <td>Due Month
                              </td>
                              <td>4
                              </td>
                              <td>Due Day
                              </td>
                              <td>5
                              </td>
                            </tr>
                           
                          </tbody>
                        </table>
                      </div>
                      
                    </div>
                   
                  </section>
                </aside>
                <!-- -----MAIN CONTENTS END HERE----- -->
              </div>
            </div>
          </div>
          
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
      
     
  <div class="js-scripts">
    <?php $this->load->view('common/footer_scripts'); ?> 
    <!-- OPTIONAL SCRIPTS -->
    <script src="<?php echo base_url();?>assets/project/global/plugins/jstree/dist/jstree.min.js" type="text/javascript"></script>
     <script src="<?php echo base_url();?>assets/project/pages/scripts/ui-tree.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery.mockjax.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
    <!-- END OPTIONAL SCRIPTS -->
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
      $('#taskUser').editable({
        prepend: "Anil",
        inputclass: 'form-control',
        source: [{
           value: 1,
           text: 'Mandar'
        }, {
          value: 2,
          text: 'Parth'
        },{
           value: 3,
          text: 'Siddhesh'
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
  </div>
  
</body>

</html>
