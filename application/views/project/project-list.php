<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
    <head>
    <?php $this->load->view('common/header_styles'); ?>
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <?php $this->load->view('common/header'); ?>
        <div class="clearfix"> </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php $this->load->view('common/sidebar'); ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->^
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
                                <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change Project List Date Range" data-daterangevaluestart="" data-daterangevalueend="">
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
                            <!-- -----MAIN CONTENTS START HERE----- -->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="list-title-caption caption-subject bold "><i class="far fa-folder"></i><?php  echo $title; ?></span>
                                <div id="btn-box" class="btn-group">
                                    <?php if ($add_access) { ?>
                                    <a id="sample_editable_1_new" href="<?php echo base_url('project-add'); ?>" class="btn green">
                                        Add New <i class="fa fa-plus"></i>
                                    <?php } ?>
                                    </a>
                                </div>
                               
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-quot table-list " id="project-list">
                                <thead>
                                    <tr>
                                        <th>Project Title</th>
                                        <th>Company</th>
                                        <th>Managed By </th>
                                        <th>Status  </th>
                                        <th>Work Order</th>
                                        <th>Site Location</th>
                                        <th>Created On </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>

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
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js" type="text/javascript"></script> 
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <!-- OPTIONAL SCRIPTS -->
            <!-- END OPTIONAL SCRIPTS -->
        
        </div>
        <script type="text/javascript">
              $(document).ready(function(){
                projectlist();
                
              });
              function projectlist()
              {
                $('#project-list').DataTable().destroy();
                var customDataTableElement = '#project-list';
                var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                var customDataTableUrl     =  baseUrl + 'project/project_getlist?table_data_count='+customDataTableCount;
                var prj_id_i = 0;
                var customDataTableColumns = [
                {
                  'data'  : 'prj_id' ,
                  'render': function(data, type, row, meta)
                  {
                    var link = row.prj_title;
                    <?php if($detail_access) { ?>
                    link = '<a href="'+baseUrl+'project-details-'+row.prj_id_encrypt+'" title="Project Detail">'+row.prj_title+'</a>&nbsp';
                    <?php } ?>
                    return link;
                  }
                },
                {
                  'data'  : 'prj_cmp_id' ,
                  'render': function(data, type, row, meta)
                  {
                    var link = row.cmp_value;
                    <?php if($detail_access) { ?>
                    link = '<a href="'+baseUrl+'company-details-'+row.prj_cmp_id_encrypt+'" title="Company Detail">'+row.cmp_value+'</a>&nbsp';
                    <?php } ?>
                    return link;
                  }
                },
                {
                  'data'  : 'manage_by_value' }
                ,
                {
                  'data'  : 'prj_project_status_value' }
                ,
                {
                  'data'  : 'prj_work_ord' }
                ,
                {
                  'data'  : 'prj_site_loc' }
                ,
                {
                  'data'  : 'crdt_dt' }
                ,
                {
                  'data'  : 'prj_id' ,
                  'render': function(data, type, row, meta)
                  {
                    var link = '';
                         if(row.private_access == 0){
                          return "<?php echo FORM_INACCESS_MESSAGE; ?>"; 
                          }                          
                    <?php if($edit_access) { ?>
                    link += '<a href="'+baseUrl+'project-edit-'+row.prj_id_encrypt+'" title="Edit Project" class="datatable-links edit"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp';
                  <?php } ?>
                    <?php if($delete_access) { ?>
                    link += '<a onclick="deleteProject('+row.prj_id+')" title="Delete Project" class="datatable-links delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                    <?php }?>
                    return link;
                  }
                }
                ];
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
              }
              function deleteProject(prj_id)
              {
                swal({
                  title: "Are you sure?",
                  text: "You will not be able to recover this Project!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, cancel please!",
                  closeOnConfirm: false,
                  closeOnCancel: false
                }
                ,
                function(isConfirm) {
                if (isConfirm) 
                {
                  data={
                    prj_id:prj_id,
                    field_value:2,
                    field:'prj_status'
                  }
                  ,
                  $.ajax({
                    type:"POST",
                    dataType:"JSON",
                    data:data,
                    url:baseUrl+"project/updateProjectCustomData",
                    success:function(response)
                    {
                      swal("Success", "Successfully Project Deleted", "success");
                      projectlist();
                      
                    }
                  });
                }
                else {
                  swal("Cancelled", "Your imaginary file is safe", "error");
                }
              });
            }
        </script>
    </body>
</html>
