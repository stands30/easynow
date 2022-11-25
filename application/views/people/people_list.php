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
    <!-- BEGIN PAGE LEVEL PLUGINS -->
          <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
          <!-- daterange picker -->
          <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        </head>
        <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
            <?php $this->load->view('common/header'); ?>
            <!-- OPTIONAL LAYOUT STYLES -->
        <!-- END PAGE LEVEL PLUGINS -->
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
                                    <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change People List Date Range" data-daterangevaluestart="" data-daterangevalueend="">
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
                              <div class="portlet light bordered portlet-people">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <!-- <i class="icon-settings font-dark"></i> -->
                                        <!-- <span class="caption-subject bold">People List</span> &nbsp; -->
                                        <span class="list-title-caption caption-subject bold "><i class="fa fa-user icon-people"></i><?php  echo $title; ?></span>
                                        <div class="btn-group">
                                          <?php if($add_access) { ?>
                                            <a id="sample_editable_1_new" href="<?php echo base_url('people-add'); ?>" class="btn green btn-add-new"> Add New
                                                <i class="fa fa-plus"></i>
                                            </a>
                                          <?php } ?>
                                       </div>   
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <!-- <div class="portlet-container col-md-6">
                                      <div class="form-group col-md-4 no-left-padding">
                                        <select name="ppl_tgs_id" id="ppl_tgs_id" class="form-control tags-select2" multiple="" >
                                        </select>
                                      </div>
                                      <div class="btn-group">
                                        <button type="button" name="button" class="form-control btn btn_save btn-add-new btn green" onclick="getPeopleList()" id="getList">Search</button>
                                      </div>
                                    </div> -->
                                    <table class="table table-striped table-bordered people-list table-list" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Company</th>
                                                <th>Designation</th>
                                                <th>Managed By</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
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
                 <!-- OPTIONAL SCRIPTS -->
      
                <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
               
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                 <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
                 <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <script type="text/javascript">
                    $(document).ready(function(){
                        getPeopleList();
                        // getDataTableList();
                        // getOutstandingBalanceData();

                    });
                    $('.date-range-picker-div').click(function(){
                       
                    });
                    $('#daterangepicker-custom-range').on('apply.daterangepicker', function(ev, picker) {
                 
                            
                    });

                    function getPeopleList()
                    {
                        var peopleFilter = '<?php if(isset($peopleFilter)) echo $peopleFilter; ?>';
                        var peopleTags             = ($('.tags-select2').val() ? $('.tags-select2').val() : 'null');
                        var customDataTableElement = '.people-list';
                        $(customDataTableElement).DataTable().destroy();
                        var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                        var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                        var customDataTableUrl     = baseUrl + 'getpeoplelist?table_data_count='+customDataTableCount+'&people_tags='+peopleTags+(peopleFilter?'&people_filter='+peopleFilter:'');
                        var customDataTableColumns = [
                            {   'data'  : 'ppl_name',
                                'render': function(data, type, row, meta)
                                {
                                    var link = row.ppl_name;
                                    if(row.private_access == 0)
                                      return link;
                                    
                                    <?php if($detail_access) { ?>
                                        link = '<a href="'+baseUrl+'people-details-'+row.ppl_encrypted_id+'" title="View Detail">'+row.ppl_name+'</a>&nbsp;';
                                    <?php }?>
                                  return link;
                                }
                            },
                            {   'data'  : 'ppl_email' },
                            {   'data'  : 'ppl_mob' },
                            {   'data'  : 'cmp_name' },
                            {   'data'  : 'cpl_designation_name' },
                            {   'data'  : 'ppl_managed_name' },
                            {   'data'  : 'ppl_crdt_date' },
                            {   'data'  : 'ppl_id' ,
                                'render': function(data, type, row, meta)
                                {
                                  var link = '';
                                  if(row.private_access == 0)
                                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";
                                  <?php if($edit_access) { ?>
                                    link += '<a href="'+baseUrl+'people-edit-'+row.ppl_encrypted_id+'" title="Edit Details " class="datatable-links edit"> <i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;';
                                  <?php }?>
                                  <?php if($delete_access) { ?>
                                    link += '<a title="delete People" onclick="deletePeople('+row.ppl_id+')" class="datatable-links delete"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;';
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
                        //customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                    }
                    $('.tags-select2').select2({
                      tags: true,
                      width:'resolve',
                      placeholder:"Enter Tags",
                      multiple: true,
                      ajax: {
                        url: baseUrl+'people/getTagsforDropdown',
                        dataType: 'json',
                      },
                      insertTag: function(data, tag) {
                        return false;
                      }
                    });

                    
                    function deletePeople(ppl_id)
                    {
                       swal({
                              title: "Are you sure?",
                              text: "You will not be able to recover this imaginary file!",
                              type: "warning",
                              showCancelButton: true,
                              confirmButtonClass: "btn-danger",
                              confirmButtonText: "Yes, delete it!",
                              cancelButtonText: "No, cancel plx!",
                              closeOnConfirm: false,
                              closeOnCancel: false
                            },
                            function(isConfirm) {
                              if (isConfirm) 
                              {
                                data={
                                    ppl_id:ppl_id
                                },
                               $.ajax({
                                    type:"POST",
                                    dataType:"JSON",
                                    data:data,
                                    url:baseUrl+'people/deletePeople',
                                    success:function(response)
                                    {
                                      responsemsg(response, function(){
                                        getPeopleList();
                                      })
                                      /*if (response.success == true)
                                      {
                                           swal(
                                          {
                                              title: "Done",
                                              text: response.message,
                                              type: "success",
                                              icon: "success",
                                              button: true,
                                          },function(){
                                           getPeopleList();
                                          });
                                      }
                                      else
                                      {
                                          swal(
                                          {
                                              title: "Opps",
                                              text: response.message,
                                              type: "error",
                                              icon: "error",
                                              button: true,
                                          });
                                      }*/
                                    }
                                });
                              } else {
                                swal("Cancelled", "Your imaginary file is safe :)", "error");
                              }
                            });
                    }
                </script>
            </div>
        </body>
    </html>
