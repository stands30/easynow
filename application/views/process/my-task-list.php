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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <!-- OPTIONAL LAYOUT STYLES -->
    <link href="<?php echo base_url(); ?>assets/module/process/css/process-customs.css" rel="stylesheet" type="text/css" />
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
          <div class="row">
            <div class="portlet light bordered">
              <div class="portlet-title">
                <div class="caption font-dark">
                  <span class="caption-subject bold uppercase">My Task</span>
                </div>
               <!--  <div class="btn-group btn-top">
                  <a href="<?php echo base_url().'ticket-add'; ?>" class="btn green">
                    Add New <i class="fa fa-plus"></i>
                  </a>
                </div> -->
                                  
              </div>
               <div class="portlet box">
                <div class="portlet-body">
                  <div class="tabbable-custom ">
                    <ul class="nav nav-tabs ">
                      <li class="active">
                        <a href="#ongoing" data-toggle="tab"> Ongoing <span class="tab-counter">10</span></a>
                      </li>
                      <li>
                        <a href="#due" data-toggle="tab"> Due <span class="tab-counter">12</span></a>
                      </li>
                      <li>
                        <a href="#completed" data-toggle="tab"> Completed <span class="tab-counter">30</span></a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="ongoing">
                        <div class="portlet light bordered">
                          <div class="portlet-title">
                            <div class="caption font-dark">
                              <!-- <i class="icon-settings font-dark"></i> -->
                              <span class="caption-subject bold uppercase">Ongoing Task List
                              </span> &nbsp;
                      
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
                                  <th><i class="fas fa-clock list-level"></i>Initiated On
                                  </th>
                                  <th><i class="fas fa-clock list-level"></i>Duration</th>
                                  <th><i class="fas fa-clock list-level"></i>Deadline</th>
                                  
                                  <th><i class="fas fa-cog list-level"></i> Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                  <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>                                          
                                  <td> 
                                  <!-- <i class="fa fa-edit" aria-hidden="true"></i></a>
                            <a onclick="deleteProduct('4')" title="Delete Product ">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>   -->                                
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td>      
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                  <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>                                   
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td>  
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                 <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td>  
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                  <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td>  
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                  <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td>  
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="due">
                        <div class="portlet light bordered">
                          <div class="portlet-title">
                            <div class="caption font-dark">
                              <!-- <i class="icon-settings font-dark"></i> -->
                              <span class="caption-subject bold uppercase">Due Task List
                              </span> &nbsp;
                      
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
                                  <th><i class="fas fa-clock list-level"></i>Initiated On
                                  </th>
                                  <th><i class="fas fa-clock list-level"></i>Duration</th>
                                  <th><i class="fas fa-clock list-level"></i>Deadline</th>
                                  <th><i class="fas fa-clock list-level"></i>Completed On</th>
                                  <th><i class="fas fa-cog list-level"></i>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                 <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  <td>14:00:00 PM</td>  
                                  <td>
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td>               
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  <td>14:00:00 PM</td>  
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td> 
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                  <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  <td>14:00:00 PM</td> 
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td>  
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                 <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  <td>14:00:00 PM</td>  
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td> 
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                 <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  <td>14:00:00 PM</td>  
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td> 
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>                         
                      </div>
                      <div class="tab-pane" id="completed">
                       <div class="portlet light bordered">
                        <div class="portlet-title">
                          <div class="caption font-dark">
                            <!-- <i class="icon-settings font-dark"></i> -->
                            <span class="caption-subject bold uppercase">Completed Task List
                            </span> &nbsp;
                    
                          </div>
                          <div class="tools"> 
                          </div>
                        </div>
                        <div class="portlet-body">
                          <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                              <tr>
                                  <th><i class="fas fa-th-list list-level"></i>Title</th>
                                  <th><i class="fas fa-building list-level"></i>Department</th>
                                  <th><i class="fas fa-clock list-level"></i>Initiated On</th>
                                  <th><i class="fas fa-clock list-level"></i>Duration</th>
                                  <th><i class="fas fa-clock list-level"></i>Deadline</th>
                                  <th><i class="fas fa-clock list-level"></i>Completed On</th>
                                  <th><i class="fas fa-cog list-level"></i> Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                 <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  <td>14:00:00 PM</td>    
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td>             
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                  <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  <td>14:00:00 PM</td>  
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td> 
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                 <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  <td>14:00:00 PM</td>  
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td> 
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                  <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  <td>14:00:00 PM</td>  
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td> 
                                </tr>
                                <tr>
                                 <td><a href="<?php echo base_url('my-task-detail'); ?>">New Process Module</a></td>
                                 <td>IT</td>
                                   <td>12:00:00 PM
                                  </td>
                                 <td>2 hrs
                                  </td>
                                  <td>14:00:00 PM</td>
                                  <td>14:00:00 PM</td>  
                                  <td>                                    
                                    <a href="<?php echo base_url('my-task-detail'); ?>" title="View Detail">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo base_url('my-task-edit'); ?>" title="Edit Details ">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Delete Details">
                                          <i style="font-size: 20px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                  </td> 
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
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
     
      <!-- OPTIONAL SCRIPTS -->
      <!-- END OPTIONAL SCRIPTS -->
       <script type="text/javascript">
        var table = $('.people-list');
 var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},
            'ajax'      : baseUrl + 'getpeoplelist',
            'columns'   : [
              {   'data'  : 'ppl_name' },
              {   'data'  : 'ppl_email' },
              {   'data'  : 'ppl_mob' },
              {   'data'  : 'ppl_area' },
              {   'data'  : 'ppl_met_on_dt' },
              {   'data'  : 'ppl_id' ,
                'render': function(data, type, row, meta)
                {
                  if(type === 'display'){
                    link = `<a href="`+baseUrl+`people-details-`+row.ppl_id+`" title="View Detail">
                            <i style="font-size: 18px; color:#115370;" class="fa fa-book" aria-hidden="true"></i></a>&nbsp;
                            <a href="`+baseUrl+`people-edit-`+row.ppl_id+`" title="Edit Details ">
                            <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
                          `;
                  }
                  return link;
                }
              }
            
            ],

            buttons: [
                { extend: 'print', className: 'btn dark btn-outline' },
                { extend: 'copy', className: 'btn red btn-outline' },
                { extend: 'pdf', className: 'btn green btn-outline' },
                { extend: 'excel', className: 'btn yellow btn-outline ' },
                { extend: 'csv', className: 'btn purple btn-outline ' },
                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,

            //"ordering": false, disable column ordering 
            //"paging": false, disable pagination

            "order": [
                
            ],
            
            "lengthMenu": [
                [100,200,-1],
                [100,200,"All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 100,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        });
                </script>
    </div>

  </body>
</html>
