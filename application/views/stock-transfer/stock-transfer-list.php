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
                      <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change Subscription List Date Range" data-daterangevaluestart="" data-daterangevalueend="">
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
                      <span class="list-title-caption caption-subject bold "><i class="fas fa-exchange-alt"></i><?php  echo $title; ?></span>
                      <div class="btn-group">
                        <?php if ($add_access) { ?>
                      <a id="sample_editable_1_new" href="<?php echo base_url('stock-transfer-add'); ?>" class="btn green"> Add Stock Transfer <i class="fa fa-plus"></i> </a>
                    <?php } ?>
                      </div>
                  </div>
                  <div class="tools"> </div>
              </div>
              <div class="portlet-body">
                  <table class="table table-striped table-bordered table-hover table-quot table-list" id="moduleList">
                      <thead>
                          <tr>
                            <th>Code</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Stock</th>
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
                  getCustomModuleList();
                });
                function getCustomModuleList()
                {
                  $('#moduleList').DataTable().destroy();
                  var customDataTableElement = '#moduleList';
                  var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                  var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                  var customDataTableUrl     =  baseUrl + 'stock-transfer-getlist?table_data_count='+customDataTableCount;
                  var customDataTableColumns = [
                      {   'data'  : 'stf_code' ,
                          'render':function(data,type,row,meta)
                          {
                            return '<a href="'+baseUrl+'stock-transfer-details-'+row.stf_encrypted_id+'" title="View Inventory Details ">'+row.stf_code+'</a>&nbsp;';
                          }
                      },

                       {   'data'  : 'stf_location_from_value',
                      },

                      {   'data'  : 'stf_location_to_value',
                      },
                      {   'data'  : 'total_stock' },



                      {   'data'  : 'stf_id' ,
                        'render': function(data, type, row, meta)
                        {
                          var link = '';
                          
                          
                          <?php if($detail_access) { ?>
                            link += '<a href="'+baseUrl+'stock-transfer-details-'+row.stf_encrypted_id+'" title="View Inventory Details " class="datatable-links"><i class="fa fa-list" aria-hidden="true"></i></a>&nbsp;';
                          <?php }?>
                          if(row.private_access == 1){
                           <?php if($delete_access) { ?>
                            link += ' <a class="btn btn-edit header-btn" href="javascript:;" onclick="return deleteModule(this);" data-title="Delete Stock Transfered details" data-toggle="tooltip" data-module_id='+row.stf_id+' data-module_code='+row.stf_code+'><span class="btn-text datatable-links delete"><i class="fas fa-trash status-fa-icons"></i></span></a>';
                          <?php }?>
                        }
                         
                          return link;
                        }
                      }
                    ];
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
                }
                function deleteModule(thisElement)
                 {
                   var module_id   = $(thisElement).attr('data-module_id');
                   var module_code = $(thisElement).attr('data-module_code');
                   swal({
                          title: "Are you sure?",
                          text: "You will not be able to recover this Stock Transfered : "+module_code,
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
                                     stf_id:module_id,
                                     stf_code:module_code+'-deleted',
                                      stf_status:2                    
                                    }
                                   $.ajax({
                                          type: "POST",
                                          url: baseUrl + 'stockTransfer/updateCustomData',
                                          data: dataString,
                                          dataType: "json",
                                          success: function(response)
                                          {
                                              if (response.success == true)
                                              {
                                                  message=" Stock Transfer Deleted successfully";
                                                  
                                                  swal(
                                                  {
                                                      title: "Done",
                                                      text: message,
                                                      type: "success",
                                                      icon: "success",
                                                      button: true,
                                                  });
                                                    getCustomModuleList();
                                                  
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
                                swal("Cancelled", "Stock Transfered is safe :)", "error");
                              }
                          });

                 }
            </script>
        </div>
    </body>
  </html>
