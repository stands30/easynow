
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
            <!-- OPTIONAL LAYOUT STYLES -->
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- END OPTIONAL LAYOUT STYLES -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL PLUGINS -->
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
                    <div class="page-content page-content-detail">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php 
                            echo $breadcrumb; 
                            echo getPrevNextBtn('people-event-detail', $ppl_id); ?>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->
                        <div class="portlet">
                            <div class="row">
                                <!-- END PAGE HEADER-->
                                <div class="container-fluid">

                                    <!-- -----MAIN CONTENTS START HERE----- -->
                                        <?php $this->load->view('people/people_sidebar'); ?>
                                       <aside class="profile-info col-lg-10 detail-view-list">
                                         <section class="">
                                            <div class="portlet light bordered table-bordered">
                                              <div class="portlet-title">
                                                  <div class="caption font-dark">
                                                      <!-- <i class="icon-settings font-dark"></i> -->
                                                      <span class="list-title-caption caption-subject bold "><i class="fas fa-location-arrow icon-event"></i><?php  echo $title; ?></span>
                                                      <div class="btn-group">
                                                              <a id="" href="<?php echo base_url('event-people-add-'.$ppl_encrypted_id.'-'.$ppl_encrypted_name.'-people'); ?>" class="btn green"> Add New
                                                                  <i class="fa fa-plus"></i>
                                                              </a>
                                                     <input type="hidden" id="ppl_id" name="ppl_id" value="<?php echo $ppl_id; ?>">
                                                     </div>
                                                  </div>
                                                  <div class="tools"> </div>
                                              </div>
                                              <div class="portlet-body">
                                                  <table class="table table-striped table-bordered table-hover table-list people-list" id="tbleventlist">
                                                    <thead>
                                                      <tr>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Created By</th>
                                                        <th>Created Date</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                </table>
                                              </div>
                                           </div>
                                         </section>
                                      </aside>

                                    <!-- -----MAIN CONTENTS END HERE----- -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <div class="js-scripts">

                <?php $this->load->view('common/footer_scripts'); ?>

                <!-- OPTIONAL SCRIPTS -->
                <script src="<?php echo base_url(); ?>assets/module/people/js/people-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- END OPTIONAL SCRIPTS -->
                   <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                 <script type="text/javascript">

        $(document).ready(function(){
          getEventList();
        });

         function getEventList()
        {
            var ppl_id = $('#ppl_id').val();
            var customDataTableElement = '#tbleventlist';
            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
            var customDataTableUrl     =  baseUrl + 'people-event-getlist-'+ppl_id+'?table_data_count='+customDataTableCount;
            var customDataTableColumns = [
                {   'data'  : 'event_name' ,
                  'render': function(data, type, row, meta)
                  {
                      link = `<a href="`+baseUrl+`event-details-`+row.evt_encrypted_id+`" title="View Detail">`+row.event_name+`</a>&nbsp
                      `;
                    return link;
                  }
                },
                {   'data'  : 'event_date' },
                {   'data'  : 'event_crtd_by' },
                {   'data'  : 'epl_crdt_dt' },
                {   'data'  : 'evt_encrypted_id' ,
                 'render': function(data, type, row, meta)
                 {
                  var link = '';

                  <?php //if($edit_access) { ?>
                    link += `<a href="`+baseUrl+`event-edit-`+row.evt_encrypted_id+`" title="Edit Events" class="datatable-links edit">
                         <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;`;
                  <?php //}?>

                  <?php //if($delete_access) { ?>
                    link += `<a onclick="deleteEvent('`+row.evt_id+`')" title="Delete Events" class="datatable-links delete">
                         <i class="fa fa-trash" aria-hidden="true"></i></a>`;
                  <?php //}?>

                  return link;
                 }
               }
            ];

            customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
        }

        function deleteEvent(evt_id)
        {
          var type = '1';
          swal({
             title:"Delete",
             text:"Are you sure",
             type: "error",
             icon:"error",
             button: true,
          })

          setTimeout(function(){
            $.ajax({
              type: "POST",
              url: "Event/deleteEvent",
              data:{evt_id:evt_id,type:type},
              dataType:"json",
              success:function(response)
              {
                  location.reload();
              }
            });
          }, 1000);

        }
      </script>
            </div>
        </body>
    </html>
