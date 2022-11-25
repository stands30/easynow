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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                          <div class="row">
                            <div class="col-md-4 col-sm-4 mob-breadcrumb">
                              <?php echo $breadcrumb; ?>
                            </div>
                              <?php
                                $prev_piv_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($product->prev_product_inventory);
                                $next_piv_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($product->next_product_inventory);
                              ?>
                             <div class="col-md-8 col-sm-8 mob-date mob-date-custom date-filter pull-right">
                                <div class="breadcrumb-date">
                                  <div class="page-toolbar page-toolbar-custom">
                                    <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider date-range-picker-div" data-container="body" data-placement="bottom" data-original-title="change Inventory Detail date range" data-daterangevaluestart="" data-daterangevalueend="">
                                        <span class="thin uppercase"></span>&nbsp;
                                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                    </div>
                                  </div>
                                  <!-- <div class="page-toolbar page-custom-toolbar"> -->
                                    <a href="#" class="pull-right btn btn-primary btn-month-srt date-range-picker-div date-list-picker" data-daterangevaluestart="" data-daterangevalueend="" >All Time</a>
                                    <a href="#" class="pull-right btn btn-primary btn-month-srt date-range-picker-div date-list-picker" data-daterangevaluestart="<?php echo date('Y-m').'-01'; ?>" data-daterangevalueend="<?php echo date('Y-m-d'); ?>" ><?php echo date('M') ?></a>
                                    <a href="#" class="pull-right btn btn-primary btn-month-srt date-range-picker-div  date-list-picker" data-daterangevaluestart="<?php echo date('Y').'-01-01' ?>" data-daterangevalueend="<?php echo date('Y').'-12-31'; ?>" ><?php echo date('Y') ?></a>
                                  <!-- </div> -->
                                </div>
                              </div>
                            <div class="breadcrumb-button breadcrumb-button-custom">
                                <a href="<?php echo base_url('inventory-details-'.$prev_piv_encrypted_id).'?location=&variant='; ?>" class=" previous" title="">
                                    <button id="newlead" class="btn green">
                                        <i class="fa fa-arrow-left"></i>
                                    </button>
                                </a>
                                <a href="<?php echo base_url('inventory-details-'.$next_piv_encrypted_id).'?location=&variant='; ?>" class="next">
                                    <button id="newlead" class="btn green">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </a>
                            </div>
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
                                                    <span class="detail-list-heading">Inventory Details</span><br>
                                                    <div class="row inner-row">
                                                        <span class="panel-title prd_name">
                                                           <?php 
                                                           $prd_name =isset($product->prd_name) ? $product->prd_name:'';
                                                           $prd_name.=isset($product->prd_unit_name) ? ' - '.$product->prd_unit_name:'';
                                                           $prd_encrypted_name = $this->nextasy_url_encrypt->encrypt_openssl($prd_name);
                                                            ?>
                                                           <?php echo $prd_name; ?>
                                                        </span>&nbsp;&nbsp;
                                                         <?php if($add_access) { ?>
                                                          
                                                           <a id="sample_editable_2_new" href="<?php echo base_url('inventory-add').'?product_id='.$prd_encrypted_id.'&product_name='.$prd_encrypted_name; ?>" class="btn green">  In <i class="fa fa-plus"></i> </a>
                                                            <a id="sample_editable_2_new" href="<?php echo base_url('inventory-out').'?product_id='.$prd_encrypted_id.'&product_name='.$prd_encrypted_name; ?>" class="btn green">  Out <i class="fa fa-plus"></i> </a>
                                                            <?php } ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                    <span class="created">
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">
                                                    </span>
                                                    <br>
                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom table-detail-custom table-style" >
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-cubes list-level"></i> Total Stock</td>
                                                         <td class="total_stock" colspan="3">
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                       <td><i class="fas fa-coins list-level"></i>Average Purchase Cost </td>
                                                          <td class="avg_cost_purchase"> 
                                                        </td> 
                                                         <td><i class="fas fa-coins list-level"></i>Average Selling Cost </td>
                                                          <td class="avg_cost_selling"> 
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </aside>
                            <aside class="profile-info col-md-12">
                              <div class="row">
                                <div class="col-md-12">
                                    <h1 class="title-dash">Location</h1>
                                    <a href="#" class="btn btn-secondary btn grey btn-reload inventory_filter_reset">Reset <i class="fas fa-redo-alt"></i></a>
                                </div>
                                
                              </div>
                              <div class="row mb-20 location_div">
                                
                              </div>
                            </aside>
                            <?php if($product_size ==  '1') { ?>
                            <aside class="profile-info col-md-12">
                              <div class="row">
                                <div class="col-md-12">
                                  <h1 class="title-dash">Variant</h1>
                                  <!-- <a href="#" class="btn btn-secondary btn grey btn-reload">Reset <i class="fas fa-redo-alt"></i></a> -->
                                </div>
                              </div>
                              <div class="row mb-20 variant_div">
                                 
                              </div>
                            </aside>
                          <?php } ?>
                            <aside class="profile-info col-md-12">
                                  <section class="panel panel-tab">
                                    <div class="portlet light bordered tabbed-detail tabbed-panel tabbed-custom-panel">
                                      <div class="portlet-title tabbable-line tabbable-line-lead">
                                        <ul class="nav nav-tabs list-view-tab">
                                            <li class="active">
                                                <a href="#portlet_in" data-toggle="tab"> In <span id = "inventoryListIn0" class="countBtn"></span></a>
                                            </li>
                                            <li>
                                                <a href="#portlet_out" data-toggle="tab"> Out <span id = "inventoryListOut1" class="countBtn"></span></a>
                                            </li>
                                        </ul>
                                      </div>
                                      <div class="portlet-body">
                                        <div class="tab-content">
                                          <div class="tab-pane active" id="portlet_in">
                                            <div class="row">
                                              <div class="container-fluid no-side-mobile-padding">
                                                <div class="col-md-12 no-side-padding">
                                                  <section>
                                                    <div class="portlet light table-bordered bordered">
                                                      <div class="portlet-title">
                                                          <div class="caption font-dark">
                                                              <span class="list-title-caption caption-subject bold ">Inventory In</span>
                                                              
                                                          </div>
                                                          <div class="tools"> </div>
                                                      </div>
                                                      <div class="portlet-body">
                                                          <table class="table table-striped table-bordered table-quot table-list table-outstanding" id="inventoryListIn">
                                                              <thead>
                                                                  <tr>
                                                                    <th>Reference</th>
                                                                    <th>Location</th>
                                                                    <th>Variant</th>
                                                                    <th>Date</th>
                                                                    <th>Quantity</th>
                                                                    <th>Cost</th>
                                                                    <th>Received By</th>
                                                                    <th>Remark</th>
                                                                    <th>Action</th>
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
                                          <div class="tab-pane" id="portlet_out">
                                            <div class="row">
                                              <div class="container-fluid">
                                               <div class="col-md-12 no-side-padding">
                                                   <section>
                                                       <div class="portlet light table-bordered bordered">
                                                      <div class="portlet-title">
                                                          <div class="caption font-dark">
                                                              <span class="list-title-caption caption-subject bold ">Inventory Out</span>
                                                          </div>
                                                          <div class="tools"> </div>
                                                      </div>
                                                      <div class="portlet-body">
                                                          <table class="table table-striped table-bordered table-quot table-list table-outstanding" id="inventoryListOut">
                                                               <thead>
                                                                  <tr>
                                                                    <th>Reference</th>
                                                                    <th>Location</th>
                                                                    <th>Variant</th>
                                                                    <th>Date</th>
                                                                    <th>Quantity</th>
                                                                    <th>Cost</th>
                                                                    <th>Received By</th>
                                                                    <th>Remark</th>
                                                                    <th>Action</th>
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

                                    </div>
                                  </section>
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
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

          <script type="text/javascript">
            $(document).ready(function()
            {
              // $('.list-view-tab').on('click', function(){
              //   setTimeout(function(){
              //     var table_id = $('.list-view-tab li.active').find('.countBtn')[0].id;
              //     table_id = table_id.substr(-1,table_id.length+1);
              //     table_name = 'inventory-detail-list-';
              //     $('#'+table_name+table_id).DataTable().draw();
              //     $('#'+table_name+'all').DataTable().draw();
              //   },200)
              // });

              getCustomTableList('<?php echo $start_date; ?>','<?php echo $end_date; ?>');
              getProductInventoryData('<?php echo $start_date; ?>','<?php echo $end_date; ?>');
              highlightFilter();
              higlightSelectedDate();
                $('.inventory_filter').click(function(){
                  updateInventoryFilter(this);
                });
            });
            // date filter 
            $('.date-range-picker-div').click(function(){
                   updateDateFilter($(this),function(start_date,end_date){
                            getProductInventoryData(start_date,end_date)
                            getCustomTableList(start_date,end_date);

                        });
                });
                $('#daterangepicker-custom-range').on('apply.daterangepicker', function(ev, picker) {
             
                        updateDateFilter($('#daterangepicker-custom-range'),function(start_date,end_date){
                            getProductInventoryData(start_date,end_date)
                            getCustomTableList(start_date,end_date);

                        });
              });
            // date filter 
            // highligh selected inventory filter
             function highlightFilter()
             {
                var location_pram_value = getUrlParameterValueByParam('location');
                var variant_param_value = getUrlParameterValueByParam('variant');
                var location_pram_array = new Array();
                var variant_param_array = new Array();
                nexlog(location_pram_value);
                if(location_pram_value != null)
                {
                   location_pram_array =location_pram_value.split(',');
                }
                 if(variant_param_value != null)
                {
                   variant_param_array =variant_param_value.split(',');
                }
                $('.inventory_location_filter').each(function(){
                  var location_value = '"'+$(this).attr('data-filter_value')+'"';
                  nexlog(' location :'+location_pram_array.indexOf(location_value));
                    if( location_pram_array.indexOf(location_value) > '-1') {
                          $(this).addClass('selected');
                        }
                  var start_date = getUrlParameterValueByParam('start_date');
                  var end_date   = getUrlParameterValueByParam('end_date');
                    getProductVariantData(start_date,end_date);
                   });
                  $('.inventory_variant_filter').each(function(){
                       var variant_value = '"'+$(this).attr('data-filter_value')+'"';
                        if(  variant_param_array.indexOf(variant_value) > '-1') {
                                // it's there
                              $(this).addClass('selected');
                            }
                       });
                }
            // highligh selected inventory filter
                // Inventory reset option
                $('.inventory_filter_reset').click(function(){
                  var start_date = getUrlParameterValueByParam('start_date');
                  var end_date   = getUrlParameterValueByParam('end_date');
                   removeParam('location');
                   removeParam('variant');
                  $('.inventory_filter').removeClass('selected');
                   getCustomTableList(start_date,end_date);
                   highlightFilter();
                });
                // Inventory reset option
                // onclick update inventory filter selection
                 function updateInventoryFilter(thisElement)
                 {
                      var current_filter_type = $(thisElement).attr('data-filter_type');
                     
                    nexlog($(thisElement).hasClass('selected'));
                    if($(thisElement).hasClass('selected'))
                    {
                      $(thisElement).removeClass('selected');
                    }
                    else
                    {
                      $(thisElement).addClass('selected');
                    }
                     var start_date = getUrlParameterValueByParam('start_date');
                     var end_date   = getUrlParameterValueByParam('end_date');
                         getCustomTableList(start_date,end_date);
                          if(current_filter_type == 'location')
                      {
                       getProductVariantData(start_date,end_date);
                      }
                 }
                // onclick update inventory filter selection
                // data to be displayed
                  function getCustomTableList(start_date,end_date)
           {
            var inventory_type_in = <?php echo PRODUCT_INVENTORY_TYPE_IN; ?>;
            var inventory_type_out = <?php echo PRODUCT_INVENTORY_TYPE_OUT; ?>;
            var inventory_type_direct_in = <?php echo PRODUCT_INVENTORY_IN_TYPE_DIRECT_IN; ?>;
            var inventory_type_direct_out = <?php echo PRODUCT_INVENTORY_OUT_TYPE_DIRECT_OUT; ?>;
            var location_value = '';
             $('.inventory_location_filter.selected').each(function(){
              location_value += '"'+$(this).attr('data-filter_value')+'",';
             });
            var variant_value  = '';
             $('.inventory_variant_filter.selected').each(function(){
              variant_value += '"'+$(this).attr('data-filter_value')+'",';
             });
              var key_array = new Array({ 'key':'location','value':location_value},{ 'key':'variant','value':variant_value});
               updateQueryStringParameter(key_array);
                   // highlightFilter();
               var multiTableArray = {
                  'inventoryListIn': {
                    'table_function_name': 'inventory-detail-list-'+<?php echo PRODUCT_INVENTORY_TYPE_IN; ?>,
                    'table_function_count': <?php echo isset($leadfollowUpTypeToday->table_data_count) ? $leadfollowUpTypeToday->table_data_count:0; ?>,
                    'table_function_server': <?php echo isset($leadfollowUpTypeToday->table_server_status) ? $leadfollowUpTypeToday->table_server_status:'false'; ?>
                  },
                  'inventoryListOut': {
                    'table_function_name': 'inventory-detail-list-'+<?php echo PRODUCT_INVENTORY_TYPE_OUT; ?>,
                    'table_function_count': <?php echo isset($leadfollowUpTypeToday->table_data_count) ? $leadfollowUpTypeToday->table_data_count:0; ?>,
                    'table_function_server': <?php echo isset($leadfollowUpTypeToday->table_server_status) ? $leadfollowUpTypeToday->table_server_status:'false'; ?>
                  },
                }
                var tableNameArr = Object.keys(multiTableArray);
                for(var i = 0; i < tableNameArr.length; i++) {
                  $('#'+tableNameArr[i]).DataTable().destroy();
                  var customDataTableElement = '#' + tableNameArr[i];
                  var customDataTableCount = multiTableArray[tableNameArr[i]].table_function_count;
                  var customDataTableServer = multiTableArray[tableNameArr[i]].table_function_server;
                  var customDataTableUrl = baseUrl + multiTableArray[tableNameArr[i]].table_function_name+'?product='+<?php echo $product->prd_id; ?>+'&table_data_count=' + customDataTableCount+'&location='+location_value+'&variant='+variant_value+'&start_date='+start_date+'&end_date='+end_date;
                  var size_visible = <?php echo ( $product_size == 1) ? 'true':'false'; ?>;
                  var columnDefs= [
                      {
                          "targets": [ 2 ],
                          "visible": size_visible,
                          "searchable": size_visible
                      },
                     
                  ];
                  var customDataTableColumns = [
                    {
                      'data': 'piv_id',
                       'render': function(data, type, row, meta)
                        {
                          var link = row.reference_code;
                          var link_flag = true;
                          if(row.piv_inv_type == inventory_type_in && row.piv_type == inventory_type_direct_in)
                          {
                              link_flag = false;
                          }
                           if(row.piv_inv_type == inventory_type_out && row.piv_type == inventory_type_direct_out)
                          {
                              link_flag = false;
                          }
                          if(link_flag)
                          {
                            link = '<a href="'+baseUrl+row.reference_route+row.piv_type_encrypted_id+'" target="_blank" >'+row.reference_code+'</a>&nbsp';
                          }
                          return link;
                        }
                    },
                    {
                      'data': 'piv_location_value'
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
                      'data': 'piv_price'
                    },
                    {
                      'data': 'piv_managed_by_name'
                    },
                    {
                      'data': 'piv_remark'
                    },
                    {
                      'data': 'piv_id',
                      'render': function(data, type, row, meta) {
                        var link='';
                        if(row.private_access == 0)
                            return "<?php echo FORM_INACCESS_MESSAGE; ?>";
                         <?php if($delete_access) { ?>
                        link = ' <a class="btn btn-edit header-btn datatable-links delete" href="javascript:;" onclick="return deleteModule(this);" data-title="Delete Stock Transfered details" data-toggle="tooltip" data-module_id='+row.piv_id+' data-module_code="'+row.reference_code+'" data-piv_inv_type="'+row.piv_inv_type+'" data-piv_type="'+row.piv_type+'" data-piv_type_id="'+row.piv_type_id+'"><span class="btn-text"><i class="fas fa-trash status-fa-icons"></i></span></a>';
                      <?php } ?>
                        // <a href="#"><i class="fa fa-calendar" style="cursor: pointer;" onclick="leadfollowup_renewal(`'+row.lfp_id+'`)"></i></a>
                        return link;
                      }
                    }
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
                  getTablCount('#' + tableNameArr[i], '#' + tableNameArr[i] + i);
                }
           }
            //   function getTablCount(tableName, countElement) {
            //   $(tableName).on('draw.dt', function() {
            //     var count = $(tableName).parent().parent().find(tableName + '_info').html().split(' ')[5];
            //     console.log($(tableName).parent().parent().find(tableName+'_info').html().split(' ')[5]);
            //     console.log(count);
            //     console.log(countElement);
            //     $(countElement).html('(' + (count ? count : 0) + ')');
            //   });
            // }
             function getProductInventoryData(start_date,end_date)
                 {
                  
                   var prd_id     = <?php echo isset($product->prd_id) ? $product->prd_id:''; ?>;
                      var location_value= '';
                   $('.inventory_location_filter.selected').each(function(){
                      location_value += '"'+$(this).attr('data-filter_value')+'",';
                     });
                       dataString =
                      {
                         start_date:start_date,
                         end_date:end_date,
                         prd_id:prd_id,             
                         location_value:location_value                 
                        }
                       $.ajax({
                              type: "POST",
                              url: baseUrl + 'inventory/getProductInventoryData',
                              data: dataString,
                              dataType: "json",
                              success: function(response)
                              {
                                nexlog(response);
                                     var product = response.product;
                                     var total_stock   =  (product.total_stock != null) ? product.total_stock:0; 
                                     var avg_cost_purchase     =  (product.avg_cost_purchase != null) ? indiancurrency(parseFloat(product.avg_cost_purchase).toFixed(2)):0;
                                     var avg_cost_selling     =  (product.avg_cost_selling != null) ? indiancurrency(parseFloat(product.avg_cost_selling).toFixed(2)):0;
                                     // var prd_name       =  (product.prd_name != null) ? product.prd_name:0;
                                     // prd_name+=(product.prd_unit_name != null) ? ' - '+product.prd_unit_name:'';
                                     var location      =  response.product_location;
                                     var variant      =  response.product_variant;
                                     $('.total_stock').html(total_stock);
                                     $('.avg_cost_purchase').html(avg_cost_purchase);
                                     $('.avg_cost_selling').html(avg_cost_selling);
                                     // $('.prd_name').html(prd_name);
                                     var variant_div = '';
                                     var location_div = '';
                                     var location_pram_value = getUrlParameterValueByParam('location');
                                      var variant_param_value = getUrlParameterValueByParam('variant');
                                      var location_pram_array = new Array();
                                      var variant_param_array = new Array();
                                       if(location_pram_value != null)
                                      {
                                         location_pram_array =location_pram_value.split(',');
                                      }
                                       if(variant_param_value != null)
                                      {
                                         variant_param_array =variant_param_value.split(',');
                                      }
                                       
                                           
                                     for (var i = 0; i< location.length; i++) 
                                     {
                                      
                                     var location_selected = '';
                                     if( location_pram_array.indexOf('"'+location[i].gnp_name+'"') > '-1') {
                                            location_selected= ' selected';
                                          }
                                         location_div += 
                                               '<div class="col-lg-2 col-md-3 col-sm-3">'+
                                                  ' <a  data-filter_type="location" data-filter_value="'+location[i].gnp_name+'" class="content-start inventory_filter inventory_location_filter   '+location_selected+'" onclick="updateInventoryFilter(this)">'+
                                                    '<div class="dash-content text-center">'+
                                                      '<div class="dash-title">'+location[i].gnp_name+'</div>'+
                                                      '<div class="dash-count">'+location[i].stock_qty+'</div>'+
                                                    '</div>'+
                                                  '</a>'+
                                                '</div>';
                                     }
                                     for (var i = 0; i < variant.length; i++) 
                                     {
                                      
                                     var variant_selected = '';
                                     if( variant_param_array.indexOf('"'+variant[i].prv_variant_name+'"') > '-1') {
                                            variant_selected= ' selected';
                                          }
                                         variant_div += 
                                               '<div class="col-lg-2 col-md-3 col-sm-3">'+
                                                  ' <a  data-filter_type="variant" data-filter_value="'+variant[i].prv_variant_name+'" class="content-start inventory_filter inventory_variant_filter '+variant_selected+'" onclick="updateInventoryFilter(this)">'+
                                                    '<div class="dash-content text-center">'+
                                                      '<div class="dash-title">'+variant[i].prv_variant_name+'</div>'+
                                                      '<div class="dash-count">'+variant[i].stock_qty+'</div>'+
                                                    '</div>'+
                                                  '</a>'+
                                                '</div>';
                                     }
                                     $('.location_div').html(location_div);
                                     $('.variant_div').html(variant_div);
                                     $('.inventory_filter').off('click');
                                     $('.inventory_filter').on('click');
                                      // highlightFilter();
                                    

                             }
                          });

                 }
                 // data to be displayed
                     function deleteModule(thisElement)
                 {
                   var module_id    = $(thisElement).attr('data-module_id');
                   var module_code  = $(thisElement).attr('data-module_code');
                   var piv_inv_type = $(thisElement).attr('data-piv_inv_type');
                   var piv_type     = $(thisElement).attr('data-piv_type');
                   var piv_type_id  = $(thisElement).attr('data-piv_type_id');
                   var inventory_in  = <?php echo PRODUCT_INVENTORY_TYPE_IN; ?>;
                   var inventory_out  = <?php echo PRODUCT_INVENTORY_TYPE_OUT; ?>;
                   var stock_transfer_in  = <?php echo PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER; ?>;
                   var stock_transfer_out  = <?php echo PRODUCT_INVENTORY_OUT_TYPE_STOCK_TRANSFER; ?>;
                   var stock_transfer     = false;
                   if(piv_inv_type == inventory_in)
                   {
                     if(piv_type == stock_transfer_in)
                     {
                       stock_transfer = true;
                     }
                   }
                   if(piv_inv_type == inventory_out)
                   {
                     if(piv_type == stock_transfer_out)
                     {
                       stock_transfer = true;
                     }
                   }

                   if(stock_transfer)
                   {
                      swal(
                          {
                              title: "Opps",
                              text: "Please delete Stock Transfer First ",
                              type: "error",
                              icon: "error",
                              button: true,
                          });
                      return false;
                   }
                   swal({
                          title: "Are you sure?",
                          text: "You will not be able to recover this Inventory : "+module_code,
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
                                     piv_id:module_id,
                                     piv_code:module_code+'-deleted',
                                     piv_status:2 ,
                                     piv_inv_type:piv_inv_type,                   
                                     piv_type:piv_type,                   
                                     piv_type_id:piv_type_id                   
                                    }
                                   $.ajax({
                                          type: "POST",
                                          url: baseUrl + 'inventory/updateCustomData',
                                          data: dataString,
                                          dataType: "json",
                                          success: function(response)
                                          {
                                              if (response.success == true)
                                              {
                                                  message=" Inventory Deleted successfully";
                                                  
                                                  swal(
                                                  {
                                                      title: "Done",
                                                      text: message,
                                                      type: "success",
                                                      icon: "success",
                                                      button: true,
                                                  });
                                                   var start_date = getUrlParameterValueByParam('start_date');
                                                   var end_date = getUrlParameterValueByParam('end_date');
                                                    getProductInventoryData(start_date,end_date)
                                                    getCustomTableList(start_date,end_date);
                                                  
                                              }
                                              else
                                              {
                                                  $('.btn_save').button('reset');
                                                  swal(
                                                  {
                                                      title: "Opps",
                                                      text: response.message,
                                                      type: "error",
                                                      icon: "error",
                                                      button: true,
                                                  });
                                              }
                                          }
                                      });
                              }else {
                                swal("Cancelled", "Inventory is safe :)", "error");
                              }
                          });

                 }
                 function getProductVariantData(start_date,end_date)
                 {

                  
                   var prd_id     = <?php echo isset($product->prd_id) ? $product->prd_id:''; ?>;
                     var location_value= '';
                   $('.inventory_location_filter.selected').each(function(){
                      location_value += '"'+$(this).attr('data-filter_value')+'",';
                     });
                       dataString =
                      {
                         start_date:start_date,
                         end_date:end_date,
                         prd_id:prd_id,
                         location_value:location_value                 
                        }
                       $.ajax({
                              type: "POST",
                              url: baseUrl + 'inventory/getProductVariantData',
                              data: dataString,
                              dataType: "json",
                              success: function(response)
                              {
                                nexlog(response);
                                     var variant      =  response.product_variant;
                                     var variant_div = '';
                                      var variant_param_value = getUrlParameterValueByParam('variant');
                                      var variant_param_array = new Array();
                                       
                                       if(variant_param_value != null)
                                      {
                                         variant_param_array =variant_param_value.split(',');
                                      }
                                       
                                           
                                     
                                     for (var i = 0; i < variant.length; i++) 
                                     {
                                      
                                     var variant_selected = '';
                                     if( variant_param_array.indexOf('"'+variant[i].prv_variant_name+'"') > '-1') {
                                            variant_selected= ' selected';
                                          }
                                         variant_div += 
                                               '<div class="col-lg-2 col-md-3 col-sm-3">'+
                                                  ' <a  data-filter_type="variant" data-filter_value="'+variant[i].prv_variant_name+'" class="content-start inventory_filter inventory_variant_filter '+variant_selected+'" onclick="updateInventoryFilter(this)">'+
                                                    '<div class="dash-content text-center">'+
                                                      '<div class="dash-title">'+variant[i].prv_variant_name+'</div>'+
                                                      '<div class="dash-count">'+variant[i].stock_qty+'</div>'+
                                                    '</div>'+
                                                  '</a>'+
                                                '</div>';
                                     }
                                     $('.variant_div').html(variant_div);
                                      // highlightFilter();
                                    

                             }
                          });

                 
                 }
          </script>

        </div>
</body>
</html>
