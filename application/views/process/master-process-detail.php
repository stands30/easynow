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
   
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url();?>assets/project/global/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/process/css/process-customs.css" rel="stylesheet" type="text/css" />
     <style type="text/css">
    /*.page-content-wrapper .page-content{
      min-height: 710px;
    }*/
  </style>
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
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row inner-row">
                                   <span class="detail-list-heading">
                                      Master Process Details
                                    </span><br>
                                  <span class="panel-title">
                               New Process Module
                              </span>&nbsp;&nbsp;
                              <a class="btn btn-edit" href="#">
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
                        <table class="table custom" style="border:2px solid;border-style: ridge;    border-top: none;">
                          <tbody>
                          
                            <tr>
                              <td>Description
                              </td>
                              <td >
                                Kindly check the content as mailed and discussed.One photo and some description needs to be checked.

                              </td>
                             
                            </tr>
                           <!--  <tr>
                              <td>Attachments
                              </td>
                              <td >
                                <ul> 
                                  <li>
                                    
                                    <div class="col-md-7 attachments-file">
                                      <a href="#">file.png</a>
                                    </div>
                                    
                                    <div class="col-md-5 attachments-btn">
                                      <a href="#" class="btn-attachment-block btn-view"><i class="fa fa-eye"></i>view</a>
                                      <a href="#" class="btn-attachment-block btn-view"><i class="fa fa-trash-o"></i>delete</a>
                                    </div>
                                    
                                  </li>
                                  <li>
                                    
                                    <div class="col-md-7 attachments-file">
                                      <a href="#">file.jpg</a>
                                    </div>
                                    
                                    <div class="col-md-5 attachments-btn">
                                      <a href="#" class="btn-attachment-block btn-view"><i class="fa fa-eye"></i>view</a>
                                      <a href="#" class="btn-attachment-block btn-view"><i class="fa fa-trash-o"></i>delete</a>
                                    </div>
                                    
                                  </li>
                                  
                                </ul>

                              </td>
                             
                            </tr>
                          -->
                          
                          </tbody>
                        </table>
                      </div>
                       
                        <label class="bold">Attachment <a data-toggle="modal" href="#attachment" class="attachments">+</a></label>                                                  
                    </div>
                     

                        <!-- Modal Start here (for attachments) -->
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
                                 <label>Attachments</label>&nbsp;<a href="#" data-toggle="tooltip" title="You can add multiple images with .png .jpg & .jpeg file format" class="data-tooltip-user"><span><i class="fa fa-info-circle"></i></span></a>
                                  <div class="image-preview" style="padding-left: 0px;">
                                    <div id="image_preview" ></div>
                                      <span class="btn default btn-file btn-file-view">
                                      <input type="file" id="ppl_profile_image" name="ppl_profile_image" class="profile-image btn-file-view"> 
                                      </span>
                                      <span class="custom-error"></span>
                                  </div>
                              </div>
                            </div>
                            <div class="clearfix"></div>
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
                       <!-- Jtree start here -->
                       <div class="col-md-12">
                          <div class="portlet main-portlet-tree">
                              <div class="portlet-title portlet-tree">
                                  <div class="caption">
                                    New Process Module  
                                  </div>
                                <div class="tools tools-jstree" style="padding-right: 10px;">
                                  <a href="javascript:;" class="collapse"> </a>
                                           
                                </div>
                              </div>
                              <div class="portlet-body">
                                <div id="tree_3" class="tree-demo"> </div>                                    
                             </div>
                          </div>
                       </div> 
                       <!-- Jtree ends here -->
                       <!-- Task list start here -->
                       <div class="col-md-12">
                        <div class="portlet">
                                <!-- <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Scrollable Accordions </div>
                                    
                                </div> -->
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
                                      
                                    </div>
                                </div>
                            </div> 
                       </div>
                       <!-- Task list ends here -->
                  </section>
                </aside>
                <!-- -----MAIN CONTENTS END HERE----- -->
              </div>
            </div>
          </div>
          
        </div>
        <!-- END CONTENT BODY -->
         <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/project/global/plugins/jstree/dist/jstree.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/pages/scripts/ui-tree.min.js" type="text/javascript"></script>
        <!-- Tooltip Script -->
         <script>
          $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip(); 
          });
        </script>
        <!-- Tooltip Script -->
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
   
  </body>
</html>
