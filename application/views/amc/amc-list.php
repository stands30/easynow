    <!DOCTYPE html>
    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
        <head>
        <?php
        $global_asset_version = global_asset_version();
         $this->load->view('common/header_styles');
         ?>
         <style type="text/css">
           .portlet.light .dataTables_wrapper .dt-buttons{
            margin-top: -58px;
           }
         </style>
         
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/module/lead/css/lead-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <!-- daterange picker -->
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
          .portlet-title-count{
            border-bottom: none!important;
          }
        </style>
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
                                <!-- -----MAIN CONTENTS START HERE----- -->
                                <div class="portlet light bordered">
                                  <div class="portlet-title">
                                      <div class="caption font-dark">
                                        <!-- <i class="icon-settings font-dark"></i> -->
                                        <span class="list-title-caption caption-subject bold "><i class="fas fa-sliders-h color-light-blue"></i><?php  echo $title; ?></span>
                                        <div  id="btn-box" class="btn-group">
                                          
                                            <a id="sample_editable_1_new" href="<?php echo base_url('amc-add'); ?>" class="btn green"> Add AMC
                                                <i class="fa fa-plus"></i>
                                            </a>
                                          
                                       </div>
                                    </div>
                                      <div class="tools"> </div>
                                  </div>
                                  <div class="portlet-body">
                                      <ul class="nav nav-tabs">
                                              <li class="custom-tab-header active">
                                                  <a href="#tab_upcoming_amc" data-toggle="tab" aria-expanded="true"> Upcoming  </a>
                                              </li>
                                              <li class="custom-tab-header ">
                                                  <a href="#tab_due_amc" data-toggle="tab" aria-expanded="false"> Due </a>
                                              </li>
                                              <li class="custom-tab-header ">
                                                  <a href="#tab_future_amc" data-toggle="tab" aria-expanded="false"> Future </a>
                                              </li>
                                              <li class="custom-tab-header ">
                                                  <a href="#tab_all_amc" data-toggle="tab" aria-expanded="false"> All </a>
                                              </li>
                                          </ul>
                                          <div class="tab-content">
                                              <div class="tab-pane active" id="tab_upcoming_amc">
                                                <div class="portlet">
                                                 <div class="portlet-container portlet-title portlet-title-count">
                                                    <span class="active_lead_count amc-count-list pb-10" ><b>Sum : </b> <span id="amcUpcomingSum0"></span> </span>
                                                    <span class="active_lead_count amc-count-list pb-10"><b>Count : </b> <span id="amcUpcoming0"></span></span>
                                                  </div>
                                                  <div class="portlet-body">
                                                    
                                                    <table class="table table-striped table-bordered table-hover table-quot table-list" id="amcUpcoming">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Company</th>
                                                                <th>Renewal Date</th>
                                                                <th>Renewal Amount</th>
                                                                <th>Remind</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody>
                                                          
                                                        </tbody>
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="tab-pane" id="tab_due_amc">
                                                <div class="portlet">
                                                  <div class="portlet-container portlet-title portlet-title-count">
                                                    <span class="active_lead_count amc-count-list pb-10" ><b>Sum : </b> <span id="amcDueSum1"></span> </span>
                                                    <span class="active_lead_count amc-count-list pb-10"><b>Count : </b><span id="amcDue1"></span> </span>
                                                  </div>
                                                  <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover table-quot table-list" id="amcDue">
                                                            <thead>
                                                                <tr>
                                                                  <th>Product</th>
                                                                  <th>Company</th>
                                                                  <th>Renewal Date</th>
                                                                  <th>Renewal Amount</th>
                                                                  <th>Remind</th>
                                                                  <th>Action</th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                              <!-- <tr>
                                                                  <td><a href="<?php echo base_url('amc-details'); ?>">INV001</a></td>
                                                                  <td><a href="#">Ankush</a></td>
                                                                  <td><a href="#">ITI</a></td>
                                                                  <td><a href="#">Easy Now</a></td> 
                                                                  <td>1</td>                                             
                                                                  <td>24th January 2019</td>
                                                                  <td>24th January 2020</td>    
                                                                  <td>8,000.00</td>                                             
                                                                  <td>20th January 2020</td> 
                                                                  <td>
                                                                    <a href="#" title="Edit">
                                                                      <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a href="#" title="Delete ">
                                                                      <i class="fa fa-trash"></i>
                                                                    </a>
                                                                  </td>
                                                                </tr> -->
                                                            </tbody>
                                                        </table>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="tab-pane" id="tab_future_amc">
                                                <div class="portlet">
                                                  <div class="portlet-container portlet-title portlet-title-count">
                                                    <span class="active_lead_count amc-count-list pb-10" ><b>Sum : </b> <span id="amcFutureSum2"></span> </span>
                                                    <span class="active_lead_count amc-count-list pb-10"><b>Count : </b> <span id="amcFuture2"></span></span>
                                                  </div>
                                                  <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover table-quot table-list" id="amcFuture">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Company</th>
                                                                    <th>Renewal Date</th>
                                                                    <th>Renewal Amount</th>
                                                                    <th>Remind</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                              <!-- <tr>
                                                                  <td><a href="<?php echo base_url('amc-details'); ?>">INV001</a></td>
                                                                  <td><a href="#">Ankush</a></td>
                                                                  <td><a href="#">ITI</a></td>
                                                                  <td><a href="#">Easy Now</a></td> 
                                                                  <td>1</td>                                             
                                                                  <td>24th January 2019</td>
                                                                  <td>24th January 2020</td>    
                                                                  <td>8,000.00</td>                                             
                                                                  <td>20th January 2020</td> 
                                                                  <td>
                                                                    <a href="#" title="Edit">
                                                                      <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a href="#" title="Delete ">
                                                                      <i class="fa fa-trash"></i>
                                                                    </a>
                                                                  </td>
                                                                </tr> -->
                                                            </tbody>
                                                        </table>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="tab-pane tab-amc-all" id="tab_all_amc">
                                                <div class="portlet">
                                                  <div class="portlet-container portlet-title portlet-title-count">
                                                    <span class="active_lead_count amc-count-list pb-10"><b>Sum : </b> <span id="amcAllSum3"></span> </span>
                                                    <span class="active_lead_count amc-count-list pb-10"><b>Count : </b> <span id="amcAll3"></span> </span>
                                                  </div>
                                                  <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover table-quot table-list" id="amcAll">
                                                            <thead>
                                                                <tr>
                                                                  <th>Product</th>
                                                                  <th>Company</th>
                                                                  <th>Renewal Date</th>
                                                                  <th>Renewal Amount</th>
                                                                  <th>Remind</th>
                                                                  <th>Action</th>
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
            <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>   
            <!-- Daterange Picker -->
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- OPTIONAL SCRIPTS -->
                <!-- END OPTIONAL SCRIPTS -->
            <script type="text/javascript">
                    $(document).ready(function(){
                      getAmcList();
                        // getList();
                        });
                        
                        function getAmcList()
                      {

                          var amcTblUrlArray = {
                            'amcUpcoming'      : {'table_function_name' : 'amc-getlist-Upcoming','table_function_count':<?php echo $amcUpcoming->table_data_count; ?>,'table_function_server':<?php echo $amcUpcoming->table_server_status; ?>},
                            'amcDue'      : {'table_function_name' : 'amc-getlist-Due','table_function_count':<?php echo $amcDue->table_data_count; ?>,'table_function_server':<?php echo $amcDue->table_server_status; ?>},
                            'amcFuture'      : {'table_function_name' : 'amc-getlist-Future','table_function_count':<?php echo $amcFuture->table_data_count; ?>,'table_function_server':<?php echo $amcFuture->table_server_status; ?>},
                            'amcAll'      : {'table_function_name' : 'amc-getlist-All','table_function_count':<?php echo $amcAll->table_data_count; ?>,'table_function_server':<?php echo $amcAll->table_server_status; ?>},
                          };

                          var tableNameArr = Object.keys(amcTblUrlArray);
                          var Renewal_sum = 0;
                          for(var i = 0; i < tableNameArr.length; i++)
                          {

                            var customDataTableElement = '#'+tableNameArr[i];
                            $(customDataTableElement).DataTable().destroy();
                            var customDataTableCount   = amcTblUrlArray[tableNameArr[i]].table_function_count; 
                            var customDataTableServer  = amcTblUrlArray[tableNameArr[i]].table_function_server;
                            var customDataTableUrl     =  baseUrl + amcTblUrlArray[tableNameArr[i]].table_function_name + '?table_data_count='+customDataTableCount;
                            var customDataTableColumns = [
                            {   'data'  : 'amc_prd_name' ,
                                'render': function(data, type, row, meta)
                                {
                                  var link = row.amc_prd_name;

                                  if(row.private_access == 0)
                                    return link;

                                  <?php if($detail_access) { ?>
                                      link ='<a href="'+baseUrl+'amc-details-'+row.amc_id_encrypt+'" title="View Detail">'+row.amc_prd_name+'</a>&nbsp;';
                                  <?php }?>
                                return link;

                                }
                              },
                             
                              
                              // {   'data'  : 'amc_ppl_name' ,
                              //   'render': function(data, type, row, meta)
                              //   {
                              //     var link = row.amc_ppl_name;

                              //     if(row.private_access == 0)
                              //       return link;

                              //     <?php if($detail_access) { ?>
                              //         link ='<a href="'+baseUrl+'ppl-details-'+row.amc_ppl_id_encrypt+'" title="View Detail">'+row.amc_ppl_name+'</a>&nbsp;';
                              //     <?php }?>
                              //   return link;

                              //   }
                              // },
                              {   'data'  : 'amc_cmp_name' ,
                                'render': function(data, type, row, meta)
                                {
                                  var link = row.amc_cmp_name;

                                  if(row.private_access == 0)
                                    return link;

                                  <?php if($detail_access) { ?>
                                      link ='<a href="'+baseUrl+'company-details-'+row.amc_cmp_id_encrypt+'" title="View Detail">'+row.amc_cmp_name+'</a>&nbsp;';
                                  <?php }?>
                                return link;

                                }
                              },
                              
                              // {   'data'  : 'amc_start_dt_edit' },
                              {   'data'  : 'amc_renewal_dt_edit'},
                              {
                                'data': 'amc_renewal_amount',
                                'render': function(data, type, row, meta) {

                                 
                                    
                                      return '<span class="hidden '+row.amc_type+' ">'+row.amc_renewal_amount+'</span>'+row.amc_renewal_amount;
                                 // return number_format(row.led_amount);
                                  //return row.led_amount;
                                }
                              },
                              {   'data'  : 'amc_remind'},
                              {   'data'  : 'amc_id' ,
                                'render': function(data, type, row, meta)
                                {
                                  var link = '';

                                  if(row.private_access == 0)
                                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                                  <?php if($edit_access) { ?>
                                    link += '<a href="'+baseUrl+'amc-edit-'+row.amc_id_encrypt+'" title="Edit AMC " class="datatable-links edit"><i class="fa fa-edit" aria-hidden="true"></i></a> '; 
                                  <?php }?>

                                  <?php if($delete_access) { ?>
                                    link += ' <a onclick="deleteAmc(\''+row.amc_id_encrypt+'\')" title="Delete AMC " class="datatable-links delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                  <?php }?>

                                  return link;
                                }
                              }
                            ];
                            // console.log(Renewal_sum);
                             // $('#'+tableNameArr[i]+i).append(customDataTableCount);
                              customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                              getTablCount('#'+tableNameArr[i],'#'+tableNameArr[i]+i);

                          }

                          setTimeout(function()
                            {
                              var amc_types = ['Upcoming','Due','Future','All'];

                               

                              for(var i = 0; i < amc_types.length; i++)
                              {
                                console.log(amc_types[i]);
                                // var lead_stage_type = lead_stage[i];
                                // var lead_type = tableNameArr[i].f1;
                                // var active_lead_count_pending = 0; 
                                var amc_total_renewal  = 0; 
                                // console.log(i);
                                $('.'+amc_types[i]).each(function(){
                                  console.log($(this).html());
                                  amc_total_renewal = amc_total_renewal + parseFloat($(this).html());
                                })
                                console.log('#amc' +amc_types[i]+'Sum'+i)
                                $('#amc' +amc_types[i]+'Sum'+i).html(number_format(amc_total_renewal));
                              }

                            

                            }, 2000);
                       }
                      function getTablCount(tableName,countElement)
                      {
                         $(tableName).on('draw.dt', function () {
                             var count = $(tableName).parent().parent().find(tableName+'_info').html().split(' ')[5];
                              // console.log($(tableName).parent().parent().find(tableName+'_info').html().split(' ')[5]);
                              // console.log(count);
                              // console.log(countElement);
                              $(countElement).html((count?count:0));
                         });
                      }

                      function deleteAmc(amc_id)
                      {
                        cswal({
                          text : 'Do you want to delete this Entry?', 
                          title   : 'Done', 
                          type    : 'delete', 
                          onyes : function(){
                            $.ajax({
                              type: "POST",
                              url:baseUrl+'amc/deleteAmc',
                              data: {amc_id:amc_id},
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
                                getAmcList();
                                // location.href = response.linkn;
                              }
                            });
                          }
                        });
                      }

                </script>
            </div>
        </body>
    </html>


