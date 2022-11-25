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
    .div-hide{
       display: none;
    }
  </style>
  <head>
    
    <?php $this->load->view('common/header_styles'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- OPTIONAL LAYOUT STYLES -->
    
    <link href="<?php echo base_url(); ?>assets/module/process/css/process-customs.css" rel="stylesheet" type="text/css" />
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
              <div class="container-fluid main-form">
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center">Add New Master Task
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
               
                <div class="col-md-10 col-md-offset-1 form_add">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                         <label>Process <span class="asterix-error"><em>*</em> </label>
                          <a href="#" data-toggle="tooltip" title="Process" class="data-tooltip-user">
                            <span><i class="fa fa-info-circle"></i></span>
                          </a>
                      <select name="clocation" class="form-control select2">
                        <option value="1">New changes
                        </option>
                        <option value="2">Development
                        </option>
                        <option value="3">Updates
                        </option>
                      </select>
                      </div>                   
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Title <span class="asterix-error"><em>*</em></label>
                        <input type="text" name="ttitle" value="" class="form-control" placeholder="Title"> 
                      </div>
                    </div>
                  </div>
                  <div class="row">                    
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Department</label>
                        <select name="tdepartment" class="form-control select2">
                          <option value="1">IT</option>
                          <option value="2">HR</option>
                          <option value="3">Management</option>
                         </select>                            
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-group">
                        <label>Order <span class="asterix-error"><em>*</em></label>
                        <input type="text" name="torder" value="" class="form-control" placeholder="Order"> 
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>User</label>
                        <select name="tuser" class="form-control select2">
                          <option value="1">Ankush</option>
                          <option value="2">Yakub</option>
                          <option value="3">Stanley</option>
                        </select>
                      </div>
                    </div>
                 
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Due Days </label> 
                        <a href="#" data-toggle="tooltip" title="Please enter no of days to complete the task" class="data-tooltip-user">
                            <span><i class="fa fa-info-circle"></i></span>
                          </a>
                        <input type="number" name="dueDate" value="" class="form-control" placeholder="Due Days"> 
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Due Hours</label>
                        <a href="#" data-toggle="tooltip" title="Please enter no of hours to complete the task" class="data-tooltip-user">
                          <span><i class="fa fa-info-circle"></i></span>
                        </a>
                        <input type="time" name="hrs" value="" class="form-control" placeholder="Due Hours"> 
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Parent Task </label>
                       <select name="tuser" class="form-control select2">
                          <option value="1">Task1</option>
                          <option value="2">Task2</option>
                          <option value="3">Task3</option>
                        </select>
                      </div>
                    </div>
                    
                   
                    
                   
                                      
                     
                  </div> 
                  <div class="row">
                     
                    <div class="col-md-4">
                       <div class="form-group">
                        <label>Dependency</label>
                        <div class="mt-radio-inline">
                          <label class="mt-radio">
                            <input type="radio" id='watch-me' name="optionsRadios" id="optionsRadios4" value="option1" onclick="show2();"> Yes
                            <span></span>
                          </label>
                          <label class="mt-radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2" onclick="show1();"> No
                            <span></span>
                           </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                     <div id="show-me" class="form-group" style="display:none">
                       <label>Dependency Task</label>
                        <select name="tuser" class="form-control select2">
                          <option value="1">Task1</option>
                          <option value="2">Task2</option>
                          <option value="3">Task3</option>
                        </select>
                     </div>
                    </div>
                  </div>  
                  <div class="row">
                    
                    
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                      <label>Description</label>
                      <div>
                        <div name="summernote" id="summernote_1"> </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  
                    <div class="col-md-6">
                      <div class="form-group fileinput fileinput-new" data-provides="fileinput" style="">
                          <label>Attachments</label><a href="#" data-toggle="tooltip" title="You can add multiple images with .png .jpg & .jpeg file format" class="data-tooltip-user"><span><i class="fa fa-info-circle"></i></span></a>
                          <div class="image-preview" style="padding-left: 0px;">
                            <div id="image_preview" ></div>
                              <span class="btn default btn-file btn-file-view">
                                <input type="file" id="ppl_profile_image" multiple="" name="ppl_profile_image" class="profile-image btn-file-view"> 
                              </span>
                              <span class="custom-error"></span>
                          </div>
                      </div>
                      <span class="asterix-error">
                        (Max Size 5 MB)
                      </span>
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
         
           <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
          <script src="<?php echo base_url();?>assets/project/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
        </script>
         <script src="<?php echo base_url();?>assets/project/project-scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        
        <script src="<?php echo base_url(); ?>assets/module/process/js/process-customs.js" type="text/javascript"></script>
        <script type="text/javascript">
           $('.profile-image').change(function(e){
               preview_image(e);
            });
            function preview_image(event) 
            {
                var total_file= $('.profile-image')[0].files.length;
                 $('#image_preview').html('');
                for(var i=0;i<total_file;i++)
                {
                    $('#image_preview').append("<span class=\"pip\">" + "<img class=\"imageThumb\" src=\"" +  URL.createObjectURL(event.target.files[i]) + "\" width=\"50%\" height=\"50%\" />" +"</span>");
                }
            }
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('input[name=optionsRadios]').click(function () {
                if (this.id == "watch-me") {
                    $("#show-me").show('slow');
                } else {
                    $("#show-me").hide('slow');
                }
            });
          });
         
        </script>
         <script>
          $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip(); 
             
          });
        </script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </body>
    </html>
