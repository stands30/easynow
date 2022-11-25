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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />       
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/inventory/css/inventory-custom.css<?php echo $global_asset_version; ?>">

    <!-- END OPTIONAL LAYOUT STYLES -->
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
                    <div class="page-content page-content-detail">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                          <div class="breadcrumb-button">
                             <?php
                                $prev_encrypted_id = isset($stock_transfer->prev_stock_transfer) ? base_url('stock-transfer-details-'.$this->nextasy_url_encrypt->encrypt_openssl($stock_transfer->prev_stock_transfer)):'#';
                                $next_encrypted_id = isset($stock_transfer->next_stock_transfer) ? base_url('stock-transfer-details-'.$this->nextasy_url_encrypt->encrypt_openssl($stock_transfer->next_stock_transfer)):'#';
                              ?>
                               <!-- Previous  -->
                              <a href="<?php echo $prev_encrypted_id; ?>" class=" previous" title="">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-left"></i>                                    
                                  </button>
                                  
                              </a>
                              <!-- Next -->
                              <a href="<?php echo $next_encrypted_id; ?>" class="next">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-right"></i>
                                  </button>
                                  
                              </a>
                            </div>
                        </div>
                        <!-- -----MAIN CONTENTS START HERE----- -->
                        <div class="row">
                            <aside class="profile-info col-lg-12">
                                <section class="panel">
                                    <!-- <label>make drop down editable for Vendor</label> -->
                                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                        <header class="panel-heading color-primary panelHeading">
                                            <div class="row detail-box">
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <span class="detail-list-heading">Stock Transfer Details</span><br>
                                                    <div class="row inner-row">
                                                        <span class="panel-title">
                                                           <?php echo isset($stock_transfer->stf_code) ? $stock_transfer->stf_code:''; ?>
                                                        </span>&nbsp;&nbsp;
                                                      <?php
                                                            $module_id = isset($stock_transfer->stf_id) ? $stock_transfer->stf_id:'';
                                                            $module_code = isset($stock_transfer->stf_code) ? $stock_transfer->stf_code:'';  ?>
                                                            <?php  if(!property_exists($stock_transfer, 'private_access') || (property_exists($stock_transfer, 'private_access') && $stock_transfer->private_access == 1)) { if ($delete_access) { ?>
                                                            <a class="btn btn-edit header-btn" href="javascript:;" onclick="return deleteModule(this);" data-title="Delete Stock Transfered details" data-toggle="tooltip" data-module_id='<?php echo  $module_id; ?>' data-module_code='<?php echo  $module_code; ?>'>
                                                              <span class="btn-text"><i class="fas fa-trash status-fa-icons"></i>Delete</span>
                                                            </a>
                                                          <?php } }?>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                    <span class="created">Created By: <?php echo $stock_transfer->stf_created_by_name ?>
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: <?php echo $stock_transfer->stf_created_on; ?>
                                                    </span>
                                                    <br>
                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom table-detail-custom table-style" >
                                                <tbody>
                                                  <tr>
                                                        <td><i class="fas fa-cubes list-level"></i> Stock</td>
                                                         <td colspan="3"> <?php echo isset($stock_transfer->total_stock) ? $stock_transfer->total_stock:''; ?>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-map-marked-alt list-level"></i> Location From</td>
                                                         <td> <?php echo isset($stock_transfer->stf_location_from_value) ? $stock_transfer->stf_location_from_value:''; ?>
                                                        </td> 
                                                        <td><i class="fas fa-map-marked-alt list-level"></i> Location To</td>
                                                       <td> <?php echo isset($stock_transfer->stf_location_to_value) ? $stock_transfer->stf_location_to_value:''; ?> 
                                                    </tr>
                                                     <tr>
                                                        <td><i class="fas fa-calendar-alt list-level"></i> Date</td>
                                                         <td> <?php echo isset($stock_transfer->stf_date_format) ? $stock_transfer->stf_date_format:''; ?>
                                                        </td> 
                                                        <td><i class="fas fa-user list-level"></i> Managed By</td>
                                                       <td> <?php echo isset($stock_transfer->stf_managed_by_name) ? $stock_transfer->stf_managed_by_name:''; ?> 
                                                    </tr>
                                                     <tr>
                                                        <td><i class="fa fa-comment list-level"></i> Remark</td>
                                                         <td colspan="3"> <?php echo isset($stock_transfer->stf_remark) ? $stock_transfer->stf_remark:''; ?>
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </aside>
                            <aside class="profile-info col-lg-12">
                             <div class="portlet-body">
                                <div class="tab-content">
                                  <div class="tab-pane active" id="portlet_in">
                                    <div class="row">
                                      <div class="container-fluid no-side-mobile-padding">
                                        <div class="col-md-12 no-side-padding">
                                          <section>
                                            <div class="portlet light table-bordered bordered stock-inventory">
                                              <div class="portlet-title">
                                                  <div class="caption font-dark">
                                                      <span class="list-title-caption caption-subject bold ">Inventory </span>
                                                      
                                                  </div>
                                                  <div class="tools"> </div>
                                              </div>
                                              <div class="portlet-body">
                                                  <table class="table table-striped table-bordered table-quot table-list table-outstanding" id="inventoryListIn">
                                                      <thead>
                                                          <tr>
                                                                <th><i class="fas fa-map-marked-alt list-level"></i>Type</th>
                                                                <th><i class="fas fa-map-marked-alt list-level"></i>Location</th>
                                                                <th><i class="fas fa-weight-hanging color-pink list-level"></i>Product</th>
                                                                <th><i class="fas fa-weight-hanging color-pink list-level"></i>Size</th>
                                                                <th><i class="fas fa-calendar-alt list-level"></i> Date</th>
                                                                <th><i class="fas fa-calendar-alt list-level"></i> Qty</th>
                                                                <th><i class="fas fa-user list-level"></i>Received By</th>
                                                                <th><i class="fas fa-comment list-level"></i>Remark</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                       
                                                      
                                                      </tbody>
                                                  </table>
                                              </div>
                                            </div>
                                          </section>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </aside>

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
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
            </script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url();?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url();?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url();?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

          <script type="text/javascript">
            $(document).ready(function(){
              getCustomTableList();
            });
           function getCustomTableList()
           {
            var location_value = '';
             $('.inventory_location_filter.selected').each(function(){
              location_value += $(this).attr('data-filter_value')+',';
             });
            var variant_value  = '';
             $('.inventory_variant_filter.selected').each(function(){
              variant_value += $(this).attr('data-filter_value')+',';
             });
               var multiTableArray = {
                  'inventoryListIn': {
                    'table_function_name': 'stock-transfer-getinventorylist',
                    'table_function_count': <?php echo isset($leadfollowUpTypeToday->table_data_count) ? $leadfollowUpTypeToday->table_data_count:0; ?>,
                    'table_function_server': <?php echo isset($leadfollowUpTypeToday->table_server_status) ? $leadfollowUpTypeToday->table_server_status:'false'; ?>
                  },
                  /*'inventoryListOut': {
                    'table_function_name': 'inventory-detail-list-'+<?php echo PRODUCT_INVENTORY_TYPE_OUT; ?>,
                    'table_function_count': <?php echo isset($leadfollowUpTypeToday->table_data_count) ? $leadfollowUpTypeToday->table_data_count:0; ?>,
                    'table_function_server': <?php echo isset($leadfollowUpTypeToday->table_server_status) ? $leadfollowUpTypeToday->table_server_status:'false'; ?>
                  },*/
                }
                var tableNameArr = Object.keys(multiTableArray);
                for(var i = 0; i < tableNameArr.length; i++) {
                  $('#'+tableNameArr[i]).DataTable().destroy();
                  var customDataTableElement = '#' + tableNameArr[i];
                  var customDataTableCount = multiTableArray[tableNameArr[i]].table_function_count;
                  var customDataTableServer = multiTableArray[tableNameArr[i]].table_function_server;
                  var customDataTableUrl = baseUrl + multiTableArray[tableNameArr[i]].table_function_name+'?stf_id='+<?php echo $stock_transfer->stf_id; ?>+'&table_data_count=' + customDataTableCount;
                  var size_visible = <?php echo ( $product_size == 1) ? 'true':'false' ?>;
                  var columnDefs= [
                      {
                          "targets": [ 3 ],
                          "visible": size_visible,
                          "searchable": size_visible
                      },
                     
                  ];
                  var customDataTableColumns = [
                    {
                      'data': 'reference_type'
                    },
                    {
                      'data': 'piv_location_value'
                    },
                     {
                      'data': 'piv_prd_id_value',
                      'render': function(data, type, row, meta) {
                       var link = '<a href="'+baseUrl+'product-details-'+row.piv_prd_encrypted_id+'" title="view Product Details"> '+row.piv_prd_id_value+'</a>&nbsp;&nbsp;';
                       return link;
                       }
                     },
                    {
                      'data': 'piv_prv_id_value'
                    },
                    {
                      'data': 'piv_date_format'
                    },
                    {
                      'data': 'piv_qty'
                    },
                    
                       {
                      'data': 'piv_managed_by_name',
                      'render': function(data, type, row, meta) {
                       var link = '<a href="'+baseUrl+'people-details-'+row.piv_managed_by_encrypted_id+'" title="view Product Details"> '+row.piv_managed_by_name+'</a>&nbsp;&nbsp;';
                       return link;
                       }
                     },
                     {
                      'data': 'piv_remark'
                     }
                      
                   /* {
                      'data': 'piv_location',
                      'render': function(data, type, row, meta) {
                        link = '<a onclick="updateFollowupStatus(`' + row.piv_id + '`,`done`)" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
                        '<a onclick="updateFollowupStatus(`' + row.piv_id + '`,`reschedule`);" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
                        '<a onclick="leadfollowup_getdetail(`' + row.piv_id + '`,``);" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
                        '<a onclick="deleteFollowup(`' + row.piv_id + '`)" title="Delete Details "><i class="fa fa-trash" aria-hidden="true"></i></a>';
                        // <a href="#"><i class="fa fa-calendar" style="cursor: pointer;" onclick="leadfollowup_renewal(`'+row.lfp_id+'`)"></i></a>
                        return link;
                      }
                    }*/
                  ];
                  $('#'+tableNameArr[i]+i).append(customDataTableCount);
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
                            },
                            columnDefs:columnDefs
                          });
                  // getTablCount('#' + tableNameArr[i], '#' + tableNameArr[i] + i);
                }
           }
              function getTablCount(tableName, countElement) {
              $(tableName).on('draw.dt', function() {
                var count = $(tableName).parent().parent().find(tableName + '_info').html().split(' ')[5];
                /*console.log($(tableName).parent().parent().find(tableName+'_info').html().split(' ')[5]);
                console.log(count);
                console.log(countElement);*/
                $(countElement).html('(' + (count ? count : 0) + ')');
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
                                                    window.location.href=baseUrl+'stock-transfer-list';
                                                  
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
