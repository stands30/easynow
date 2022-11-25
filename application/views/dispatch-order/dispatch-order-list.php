<!DOCTYPE html>
  <html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
    <head>
    <?php $this->load->view('common/header_styles');?>
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                      <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change Order List Date Range" data-daterangevaluestart="" data-daterangevalueend="">
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
                      <span class="list-title-caption caption-subject bold "><i class="fas fa-truck-loading"></i><?php  echo $title; ?></span>
                      <div class="btn-group">
                        <?php if ($add_access) { ?>
                        <a id="sample_editable_1_new" href="<?php echo base_url('dispatch-order-add'); ?>" class="btn green"> Add Dispatch Order<i class="fa fa-plus"></i></a>
                       <?php } ?>
                      </div>
                      
                  </div>
                  <div class="tools"> </div>
              </div>
              <div class="portlet-body">
                <ul class="nav nav-tabs list-view-tab">
                   <?php $i=0;
                    foreach ($dor_status_group as $dor_status_group_key ) {
                    $active_status='';
                    if($i == 0)
                    {
                      $active_status='active';
                    } 
                    $i++; ?>
                    <li class="custom-tab-header <?php echo $active_status; ?>">
                      <a href="#dor_status_tab_<?php echo $dor_status_group_key->f1; ?>" data-toggle="tab" ><?php echo $dor_status_group_key->f2; ?> <span id="dor_status_count_<?php echo $dor_status_group_key->f1; ?>" class="countBtn"></span></a>
                    </li>
                  <?php } ?>    
                  
                </ul>
                <div class="tab-content">
                   <?php 
                  $selected=0;
                  foreach ($dor_status_group as $dor_status_group_key ) 
                  { 
                    $selected_active_status ='';
                    if($selected == 0)
                    {
                      $selected_active_status='active';
                    }
                  ?>
                  <div class="tab-pane <?php echo $selected_active_status; ?>" id="dor_status_tab_<?php echo $dor_status_group_key->f1; ?>">
                     <div class="portlet">
                    <div class="portlet-body">
                      <table class="table table-striped table-bordered table-hover table-quot table-list " id="dor_status_table_<?php echo $dor_status_group_key->f1; ?>">
                        <thead>
                            <tr>
                              <th>Dispatch Order No</th>  
                              <th>Customer Name </th>
                              <th>Dispatch Date</th>
                              <th>Amount </th>
                              <th>LR No. </th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                  <?php $selected++;  } ?>

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
          <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>      
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <!-- OPTIONAL SCRIPTS -->
          <!-- END OPTIONAL SCRIPTS -->
                <script type="text/javascript">
                      $(document).ready(function(){
                        getCustomList();
                        $('.list-view-tab').on('click', function(){
                          setTimeout(function(){
                            var table_id = $('.list-view-tab li.active').find('.countBtn')[0].id;
                            table_id = table_id.substr(-1,table_id.length+1);
                            table_name = 'dor_status_table_';
                            $('#'+table_name+table_id).DataTable().draw();
                            $('#'+table_name+'all').DataTable().draw();
                          },200)
                        });
                    });
                     function getCustomList()
                    {
                       var tableNameArr = <?php  echo json_encode($dor_status_group); ?>;

                        for(var i = 0; i < tableNameArr.length; i++)
                        {
                          nexlog(tableNameArr[i])
                            var customDataTableElement = '#dor_status_table_' + tableNameArr[i].f1;
                            $(customDataTableElement).DataTable().destroy();
                            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                            var customDataTableUrl     = baseUrl + 'dispatch-order-getlist?table_data_count='+customDataTableCount+'&dor_dispatch_status='+tableNameArr[i].f1;
                            var customDataTableColumns = [
                                {   'data'  : 'dor_code' ,
                                    'render' : function(data,type,row,meta)
                                    {
                                      var link = row.dor_code;
                                      <?php if($detail_access) { ?>
                                        link = '<a href="'+baseUrl+'dispatch-order-details-'+row.dor_encrypted_id+'"  title="View Dispatch Order Details" data-toggle="tooltip" >'+row.dor_code+'</a>&nbsp;';
                                      <?php } ?>
                                      return link;
                                    }
                                },
                                {   'data'  : 'dor_cmp_id_value',
                                'render': function(data, type, row, meta)
                                {
                                    var link = row.dor_vendor;
                                      link = '<a href="'+baseUrl+'company-details-'+row.dor_cmp_encrypted_id+'" title="View Detail">'+row.dor_cmp_id_value+'</a>&nbsp;';
                                  return link;
                                }
                                },
                                {   'data'  : 'dor_date_format' },
                                {   'data'  : 'dor_total_format'  },
                                {   'data'  : 'dor_lr_no'  },
                                {   'data'  : 'dor_dispatch_status_value'  },
                                {   'data'  : 'dor_id' ,
                                'render': function(data, type, row, meta)
                                {
                                  var link = '';
                                  if(row.private_access == 0)
                                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";
                                  if (row.dor_dispatch_status != '<?php echo DISPATCH_ORDER_DISPATCH_STATUS_DISPATCH ?>') { 
                                  <?php if($edit_access) { ?>
                                     link += '<a href="'+baseUrl+'dispatch-order-edit-'+row.dor_encrypted_id+'" title="Edit Details " class="datatable-links edit"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;';
                                  <?php }?>
                                  }
                                  <?php if($delete_access) { ?>
                                    link += '<a href="javascript:;" title="Delete Dispatch Order" data-toggle="tooltip" class="datatable-links delete"  data-module_id='+row.dor_id+' data-module_code='+row.dor_code+'  onclick=deleteModule(this)><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;';
                                  <?php }
                                  if($print_access) {?>
                                    link += '<a href="'+baseUrl+'dispatch-order-print-'+row.dor_encrypted_id+'" title="Print Dispatch Order" data-toggle="tooltip" class="datatable-links"><i  class="fa fa-print" aria-hidden="true"></i></a>&nbsp;';
                                 <?php } ?>
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
                   getTablCount('#dor_status_table_' + tableNameArr[i].f1, '#dor_status_count_' + tableNameArr[i].f1);
                        }
                        
                    }
                  function deleteModule(thisElement)
                 {
                   var module_id   = $(thisElement).attr('data-module_id');
                   var module_code = $(thisElement).attr('data-module_code');
                   var total_stock = $(thisElement).attr('data-total_stock');
                   if(total_stock > 0)
                   {
                       swal(
                          {
                              title: "Opps",
                              text: "Please delete Inventory First ",
                              type: "error",
                              icon: "error",
                              button: true,
                          });
                      return false;
                   }
                   swal({
                          title: "Are you sure?",
                          text: "You will not be able to recover this Dispatch Order : "+module_code,
                          type: "warning",
                          buttons: true,
                          dangerMode: true,
                          confirmButtonClass: "btn-danger",
                          confirmButtonText: "Yes, delete it!",
                          cancelButtonText: "No, cancel plx!",
                          closeOnConfirm: false,
                          closeOnCancel: false
                            }).then((isConfirm) => {
                              if (isConfirm) 
                              {
                                   dataString =
                                  {
                                      dor_id:module_id,
                                      dor_code:module_code+'-deleted',
                                      dor_status:2                    
                                    }
                                   $.ajax({
                                          type: "POST",
                                          url: baseUrl + 'dispatchOrder/updateCustomData',
                                          data: dataString,
                                          dataType: "json",
                                          success: function(response)
                                          {
                                              if (response.success == true)
                                              {
                                                  message="Dispatch Order Deleted successfully";
                                                  
                                                  swal(
                                                  {
                                                      title: "Done",
                                                      text: message,
                                                      type: "success",
                                                      icon: "success",
                                                      button: true,
                                                  });
                                                  getCustomList();
                                              }
                                              else
                                              {
                                                  $('.btn_save').button('reset');
                                                  swal(
                                                  {
                                                      title: "Opps",
                                                      text: "Something Went wrong",
                                                      type: "error",
                                                      icon: "error",
                                                      button: true,
                                                  });
                                              }
                                          }
                                      });
                              }else {
                                swal("Cancelled", "Dispatch Order is safe :)", "error");
                              }
                          });

                 }
                  
        
                </script>
        </div>
    </body>
  </html>
