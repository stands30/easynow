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
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/inventory/css/inventory-custom.css<?php echo $global_asset_version; ?>">
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
                      <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change Inventory List Date Range" data-daterangevaluestart="" data-daterangevalueend="">
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
            <div class="portlet light bordered portlet-custom">
              <div class="portlet-title">
                  <div class="caption font-dark">
                      <!-- <i class="icon-settings font-dark"></i> -->
                      <span class="list-title-caption caption-subject bold "><i class="fas fa-warehouse"></i><?php  echo $title; ?></span>
                        <?php if($add_access) { ?>
                          <!-- <div class="btn-group">
                             <a id="sample_editable_3_new" href="#" class="btn green"> Order Out <i class="fa fa-plus"></i> </a>
                          </div> -->
                          <div class="btn-group">
                             <a id="sample_editable_3_new" href="<?php echo base_url('inventory-out-dispatch'); ?>" class="btn green"> Dispatch Out <i class="fa fa-plus"></i> </a>
                          </div>
                          <div class="btn-group">
                             <a id="sample_editable_2_new" href="<?php echo base_url('inventory-out'); ?>" class="btn green">  Out <i class="fa fa-plus"></i> </a>
                          </div>
                          <div class="btn-group">                          
                            <a id="sample_editable_3_new" href="inventory-add-purchase" class="btn green"> Purchase Order In<i class="fa fa-plus"></i></a>
                          </div>
                          <div class="btn-group">
                            <a id="sample_editable_1_new" href="<?php echo base_url('inventory-add'); ?>" class="btn green">  In <i class="fa fa-plus"></i> </a>
                          </div>
                           
                    <?php } ?>
                  </div>
                  <div class="tools"> </div>
              </div>
              <div class="portlet-body">
                <div class="portlet-container col-md-6">
                   <div class="form-group col-md-5 no-left-padding">
                      <!-- <label class="drp-title">Location</label> -->
                    <div class="input-icon">
                      <i class="fas fa-map-marked-alt list-level"></i>
                      <select name="piv_location" id="piv_location" class="form-control location-select2">
                      </select>
                    </div>
                  </div>
                  <div class="btn-group">
                  <button type="button" name="button" class="form-control btn btn_save btn-add-new btn green" onclick="getProductList()" id="getList">Search</button>
                  </div>
                </div>
                
                  <table class="table table-striped table-bordered table-hover table-quot table-list" id="tblproductlist">
                      <thead>
                          <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Average Cost</th>
                            <th>Total Stock</th>
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
           <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>      
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>  

          <!-- OPTIONAL SCRIPTS -->
          <!-- END OPTIONAL SCRIPTS -->
         <script type="text/javascript">
                $(document).ready(function(){
                  getProductList();
                  $('#piv_location').select2({
                  placeholder: "Please Select Location",
                  ajax: {
                    url:baseUrl+'inventory/getGenPrmforDropdown/piv_location',
                    dataType: 'json',
                  }
                });
                });
                function getProductList()
                {
                  var piv_location          = $('#piv_location').val();
                  var customDataTableElement = '.table-list';
                  $('#tblproductlist').DataTable().destroy();
                  var customDataTableElement = '#tblproductlist';
                  var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
                  var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
                  var customDataTableUrl     =  baseUrl + 'inventory-getlist?table_data_count='+customDataTableCount+'&piv_location='+piv_location;
                  var customDataTableColumns = [
                      {   'data'  : 'prd_name' ,
                        'render': function(data, type, row, meta)
                        {
                          nexlog(' unit : '+row.prd_unit_name);
                            var prd_name = (row.prd_unit_name != null) ? row.prd_name+' - '+row.prd_unit_name:row.prd_name;
                            var link = prd_name;
                          nexlog('prd_name : '+prd_name+' link : '+link+' row.private_access : '+row.private_access);
                            if(row.private_access == 0)
                              {
                                return link;
                              }
                            <?php if($detail_access) { ?>
                                link = `<a href="`+baseUrl+`inventory-details-`+row.prd_encrypted_id+`" title="View Detail" >
                                                                 `+prd_name+`</a>&nbsp; `;
                            <?php }?>
                          return link;
                        }
                      },

                    {   'data'  : 'prd_category_name',
                         'render': function(data, type, row, meta)
                         {
                          var link = row.prd_category_name;
                          return link;
                        }
                      },

                      {   'data'  : 'avg_cost',
                        'render': function(data, type, row, meta)
                         {
                          var link=row.avg_cost;
                          if(row.avg_cost != '')
                          {
                            link = indiancurrency(parseFloat(row.avg_cost).toFixed(2));
                          }
                          return link;
                        }
                      },
                      {   'data'  : 'total_stock' },



                      {   'data'  : 'prd_id' ,
                        'render': function(data, type, row, meta)
                        {
                          var link = '';
                          <?php if($detail_access) { ?>
                            link += '<a href="'+baseUrl+'inventory-details-'+row.prd_encrypted_id+'" title="View Inventory Details " class="datatable-links"><i class="fa fa-list" aria-hidden="true"></i></a>&nbsp;';
                          <?php }?>
                         
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
            </script>
        </div>
    </body>
  </html>
