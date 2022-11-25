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
  <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/module/task/css/task.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
  <!-- daterange picker -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
      .table-custom{
          margin: 0px 0!important;
      }
  </style>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
  <?php $this->load->view('common/header'); ?>
      <!-- OPTIONAL LAYOUT STYLES -->
      <!-- END OPTIONAL LAYOUT STYLES -->
      <div class="clearfix"> </div>
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
                        <div class="row">
                          <div class="col-md-6 col-sm-6 mob-breadcrumb">
                            <?php echo $breadcrumb; ?>
                          </div>
                          <div class="col-md-6 col-sm-6 mob-date text-right">
                            <div class="breadcrumb-date">
                            
                              <div class="page-toolbar">
                                <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change Company List Date Range" data-daterangevaluestart="" data-daterangevalueend="">
                                    <span class="thin uppercase"></span>&nbsp;
                                    <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                </div>
                              </div>
                              <a href="#" class="btn btn-primary btn-month-srt">2019</a>
                              <a href="#" class="btn btn-primary btn-month-srt">April</a>
                              <a href="#" class="btn btn-primary btn-month-srt">Today</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END PAGE BAR -->
                      <!-- END PAGE HEADER-->
                      <!-- END PAGE HEADER-->
                      <!-- MAIN CONTENTS START HERE -->
                      
                          <div class="portlet light bordered">
                              <div class="portlet-title">
                                  <div class="caption font-dark">
                                      <span class="list-title-caption caption-subject bold "><i class="fas fa-calendar-alt icon-follow-up"></i> <?php  echo $title; ?></span>
                                      <div class="btn-group btn-top">
                                    <?php if($add_access) { ?>
                                      <a href="<?php echo base_url().'task-add'; ?>">
                                          <button id="newtask" class="btn green">
                                              Add New <i class="fa fa-plus"></i>
                                          </button>
                                      </a>
                                    <?php } ?>
                                  </div>
                                  </div>
                                  
                                  <div class="tools"> </div>
                              </div>
                              <div class="portlet-body">
                                  <div class="tabbable-custom">
                                      <ul class="nav nav-tabs tabs-task list-view-tab">
                                          <li class="active">
                                              <a href="#tab_today" data-toggle="tab" aria-expanded="true"><span class="desktop"> Today </span><span class="mobile"><i class="fa fa-tasks fa-2x"></i>Today</span></a>
                                          </li>
                                          <li class="">
                                              <a href="#tab_mytask" data-toggle="tab" aria-expanded="false"><span class="desktop"> My Tasks</span><span class="mobile"><i class="fa fa-user fa-2x"></i> My Tasks </span></a>
                                          </li>
                                          <li class="">
                                              <a href="#tab_mysuport" data-toggle="tab" aria-expanded="false"><span class="desktop"> My Support </span><span class="mobile"><i class="fa fa-user fa-2x"></i>My Support </span></a>
                                          </li>
                                          <li class="">
                                              <a href="#tab_myreview" data-toggle="tab" aria-expanded="false"><span class="desktop"> My Review </span><span class="mobile"><i class="fa fa-user fa-2x"></i> My Review </span></a>
                                          </li>
                                          <li class="">
                                              <a href="#tab_all" data-toggle="tab" aria-expanded="false"><span class="desktop"> All Tasks </span><span class="mobile"><i class="fa fa-user fa-2x"></i> All Tasks </span></a>
                                          </li>
                                      </ul>
                                      <div class="tab-content tab-content-list">
                                          <div class="tab-pane active" id="tab_today">
                                              <div class="portlet-body">
                                                  <table class="table table-striped table-bordered table-list  dataTable no-footer" id="tbltodaytasklist" style="margin: 0px 0!important;">
                                                      <thead>
                                                          <tr>
                                                              <!-- <th> No. </th> -->
                                                              <th>Title </th>
                                                              <th>Client </th>
                                                              <th>Due Date </th>
                                                              <th>Assigned Date </th>
                                                              <th>Assigned To </th>
                                                              <th>Assigned By </th>
                                                              <th>Status </th>
                                                              <th>Priority </th>
                                                              <th>Action </th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                          <div class="tab-pane" id="tab_mytask">
                                              <div class="portlet-body">
                                                  <table class="table table-striped table-bordered table-list  dataTable no-footer" id="tblmytasklist" style="margin: 0px 0!important;">
                                                      <thead>
                                                          <tr>
                                                            <th>Title </th>
                                                            <th>Client </th>
                                                            <th>Due Date </th>
                                                            <th>Assigned Date </th>
                                                            <th>Assigned To </th>
                                                            <th>Assigned By </th>
                                                            <th>Status </th>
                                                            <th>Priority </th>
                                                            <th>Action </th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                          <div class="tab-pane" id="tab_mysuport">
                                              <div class="portlet-body">
                                                  <table class="table table-striped table-bordered table-list  dataTable no-footer" id="tblmysupporttasklist" style="margin: 0px 0!important;">
                                                      <thead>
                                                          <tr>
                                                            <th>Title </th>
                                                            <th>Client </th>
                                                            <th>Due Date </th>
                                                            <th>Assigned Date </th>
                                                            <th>Assigned To </th>
                                                            <th>Assigned By </th>
                                                            <th>Status </th>
                                                            <th>Priority </th>
                                                            <th>Action </th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                          <div class="tab-pane" id="tab_myreview">
                                              <div class="portlet-body">
                                                  <table class="table table-striped table-bordered table-list  dataTable no-footer" id="tblmyreviewtasklist" style="margin: 0px 0!important;">
                                                      <thead>
                                                          <tr>
                                                            <th>Title </th>
                                                            <th>Client </th>
                                                            <th>Due Date </th>
                                                            <th>Assigned Date </th>
                                                            <th>Assigned To </th>
                                                            <th>Assigned By </th>
                                                            <th>Status </th>
                                                            <th>Priority </th>
                                                            <th>Action </th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                          <div class="tab-pane" id="tab_all">
                                              <div class="portlet-body">
                                                  <table class="table table-striped table-bordered table-list  dataTable no-footer" id="tblalltasklist" style="margin: 0px 0!important;">
                                                      <thead>
                                                          <tr>
                                                            <th>Title </th>
                                                            <th>Client </th>
                                                            <th>Due Date </th>
                                                            <th>Assigned Date </th>
                                                            <th>Assigned To </th>
                                                            <th>Assigned By </th>
                                                            <th>Status </th>
                                                            <th>Priority </th>
                                                            <th>Action </th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      
                      <!-- MAIN CONTENTS END HERE -->
                  </div>
                  <!-- END CONTENT BODY -->
              </div>
              <!-- END CONTENT -->
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-buttons.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <!-- Daterange Picker -->
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function()
                {
                  getTaskList(
                    '#tbltodaytasklist', 
                    '<?php echo $dataTableData['today']->table_data_count; ?>', 
                    '<?php echo $dataTableData['today']->table_server_status; ?>',
                    'today',
                     

                  );
                  
                  getTaskList(
                    '#tblmytasklist', 
                    '<?php echo $dataTableData['mytask']->table_data_count; ?>', 
                    '<?php echo $dataTableData['mytask']->table_server_status; ?>',
                    'mytask'
                  );
                  
                  getTaskList(
                    '#tblmysupporttasklist', 
                    '<?php echo $dataTableData['mysupport']->table_data_count; ?>', 
                    '<?php echo $dataTableData['mysupport']->table_server_status; ?>',
                    'mysupport' 
                  );
                  getTaskList(
                    '#tblmyreviewtasklist', 
                    '<?php echo $dataTableData['myreview']->table_data_count; ?>', 
                    '<?php echo $dataTableData['myreview']->table_server_status; ?>',
                    'myreview' 
                  );
                  getTaskList(
                    '#tblalltasklist', 
                    '<?php echo $dataTableData['all']->table_data_count; ?>', 
                    '<?php echo $dataTableData['all']->table_server_status; ?>',
                    'all'
                  );

                  
                  // $('.list-view-tab').on('click', function(){
                  // setTimeout(function(){
                  //   $('#tblmytasklist').DataTable().draw();
                  // },200)

                });
                $('.date-range-picker-div').click(function(){
             
                });
                $('#daterangepicker-custom-range').on('apply.daterangepicker', function(ev, picker) {
             
                        
                });
                var customDataTableColumns = [
                    {   'data'  : 'tsk_title' ,
                      'render': function(data, type, row, meta)
                      {
                        var link = row.tsk_title;
                        if(row.private_access == 0)
                          return link;
                          <?php if($detail_access) { ?>
                        link = '<a href="task-detail-'+row.tsk_id_encrypt+'" >' + data + '</a>';
                        <?php } ?>
                        return link;
                      }
                    },
                    {   'data'  : 'tsk_client_id_name' },
                    {   'data'  : 'tsk_due_dt_format' },
                    {   'data'  : 'tsk_datetime_format' },
                    {   'data'  : 'tsk_user_ass_to_name' },
                    {   'data'  : 'tsk_user_ass_by_name' },
                    {   'data'  : 'tsk_progress_status_name'} ,
                    {   'data'  : 'tsk_priority_name' },
                    {   'data'  : 'tsk_id'  ,
                      'render': function(data, type, row, meta)
                      {
                        var link = '';
                        link += '<a href="'+baseUrl+'task-edit-'+row.tsk_id_encrypt+'" title="Edit Events" class="datatable-links edit"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp';
                        link += '<a onclick="deleteTasks(\''+row.tsk_id_encrypt+'\')" title="Delete Tasks" class="datatable-links delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                        return link;
                      }
                    }
                ];
                function getTaskList(customDataTableElement, customDataTableCount, customDataTableServer, status)
                {
                  var customDataTableUrl     =  baseUrl + 'task-getlist?table_data_count='+customDataTableCount+'&status='+status;
                  console.log(customDataTableUrl);
                  // customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                  customDatatablex({
                    element: customDataTableElement,
                    url: customDataTableUrl,
                    columns: customDataTableColumns,
                    buttons : true,
                    serverSide : customDataTableServer,
                    delay : 1000,
                    optParam : {
                      <?php
                        if($export_access)
                          echo 'exportAccess : true,';
                        if($print_access)
                          echo 'printAccess : true,';
                      ?>
                    }
                  });
                  // $(customDataTableElement).on('draw.dt', function ()
                  // {
                  //   var count = $(customDataTableElement).parent().parent().find(customDataTableElement+'_info').html().split(' ')[5];
                  //   $(customDataTableElement+'_count').html('('+(count?count:0)+')');
                  // });
                }

                function deleteTasks(leadid)
                {
                  cswal({
                    text : 'Do you want to delete this Task?', 
                    title   : 'Done', 
                    type    : 'delete', 
                    onyes : function(){
                      $.ajax({
                        type: "POST",
                        url: baseUrl + "task-delete-"+leadid,
                        success: function(response) {
                          response = JSON.parse(response);
                          if(response.success == true) {
                            swal({
                              title: "Done",
                              text: response.message,
                              type: "success",
                              icon: "success",
                              button: true,
                            })
                          } else {
                            swal({
                              title: "Opps",
                              text: "Something Went wrong",
                              type: "error",
                              icon: "error",
                              button: true,
                            });
                          }
                          location.href = response.linkn;
                        }
                      });
                    }
                  });
                }
            </script>
            <!-- OPTIONAL SCRIPTS -->
            <!-- END OPTIONAL SCRIPTS -->
      </div>
  </body>
</html>
