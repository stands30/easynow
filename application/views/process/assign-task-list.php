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
    <link href="<?php echo base_url(); ?>assets/process/css/process-customs.css" rel="stylesheet" type="text/css" />
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
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <!-- END PAGE HEADER-->
          <!-- -----MAIN CONTENTS START HERE----- -->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <!-- <i class="icon-settings font-dark"></i> -->
                <span class="caption-subject bold uppercase">Assign Task List
                </span> &nbsp;
              <!--   <div class="btn-group">
                  <a id="sample_editable_1_new" href="<?php echo base_url('master-task-add'); ?>" class="btn green"> Add New
                    <i class="fa fa-plus">
                    </i>
                  </a>
                </div> -->
              </div>
              <div class="tools"> 
              </div>
            </div>
            <div class="portlet-body">
              <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                  <tr>
                    <th><i class="fas fa-th-list list-level"></i>Title
                    </th>
                    <th><i class="fas fa-building list-level"></i>Department
                    </th>                                       
                    <th><i class="fas fa-user list-level"></i>User
                    </th>
                    <th>Order</th>
                    <th><i class="fas fa-calendar-alt list-level"></i>Due Month</th>
                    <th><i class="fas fa-calendar-alt list-level"></i>Due Days</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                   <td>New Process Module</td>
                   <td>IT</td>
                    <td> John Carlino 
                    </td>
                    <td>101
                    </td>
                    <td>5</td>
                    <td>3</td>
                   <!--  <td>
                      <a href="<?php echo base_url('master-task-detail'); ?>" title="View Detail">
                            <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-list" aria-hidden="true"></i>
                      </a>
                      <a href="#" title="Edit Details ">
                            <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                     
                    </td> -->
                  </tr>
                  <tr>
                    <td>New Process Module</td>
                    <td>IT</td>
                    <td> John Carlino 
                    </td>
                    <td>101
                    </td>
                    <td>5</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td>New Process Module</td>
                    <td>IT</td>
                    <td> John Carlino 
                    </td>
                    <td>101
                    </td>
                    <td>5</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td>New Process Module</td>
                    <td>IT</td>
                    <td> John Carlino 
                    </td>
                    <td>101
                    </td>
                    <td>5</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td>New Process Module</td>
                    <td>IT</td>
                    <td> John Carlino 
                    </td>
                    <td>101
                    </td>
                    <td>5</td>
                    <td>3</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- -----MAIN CONTENTS END HERE----- -->
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?> 
      <!-- OPTIONAL SCRIPTS -->
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">
      </script>
    </div>

  </body>
</html>
