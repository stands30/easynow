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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
    <div class="clearfix">
    </div>
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
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <!-- MAIN CONTENTS START HERE -->
                <?php
                $evtData['evt_id'] = $eventdata->evt_id;
                $evt_id = $eventdata->evt_id;
                $evt_name = $eventdata->evt_name;
                $evtencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($eventdata->evt_id);
                $evtencryptedName = $this->nextasy_url_encrypt->encrypt_openssl($eventdata->evt_name);
                $this->load->view('event/event-sidebar',$evtData);
                ?>

                <aside class="profile-info col-lg-10 detail-view-list">
                  <section class="panel">
                      <div class="portlet light bordered">
                      <div class="portlet-title">
                        <div class="caption font-dark">
                          <!-- <i class="icon-settings font-dark"></i> -->
                          <span class="caption-subject bold">Event People List
                          </span> &nbsp;
                          <div class="btn-group">
                            <a role="button"  href="<?php echo base_url('event-people-add-'.$evtencryptedId.'-'.$evtencryptedName.'-event'); ?>" title="Add event people" class="btn green btn-add-new  openmodel"  >
                              <i  class="fa fa-plus"  title="Add"></i>Add</a>
                          </div>
                        </div>
                        <div class="tools">
                        </div>
                      </div>
                      <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-list" id="eventList">
                          <thead>
                            <tr>
                              <th>People Name
                              </th>
                              <th> Remark
                              </th>
                              <th>  Created By
                              </th>
                              <th> Created Date
                              </th>
                              <th>Actions
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                </aside>
                <!-- MAIN CONTENTS END HERE -->
              </div>
            </div>
          </div>
          <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
      </div>

      <!-- Add Event event add -->


      <!-- Add Event event edit -->

      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      </div>
        <script type="text/javascript">

          $(document).ready(function(){
            var evt_id = '<?php echo $evtencryptedId ?>';
            getEventPeolpeList(evt_id);
          })

          function getEventPeolpeList(evt_id)
          {
            var customDataTableElement = '#eventList';
            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
            var customDataTableUrl     =  baseUrl +'eventppl-getlist-'+evt_id+'?table_data_count='+customDataTableCount;
            var customDataTableColumns = [
                 {   'data'  : 'ppl_name' ,
                   'render': function(data, type, row, meta)
                   {
                       link = `
                               <a href="`+baseUrl+`people-details-`+row.ppl_encrypt_id+`" title="People Detail">
                               `+data+`</a>
                             `;
                     return link;
                   }
                 },
                 {   'data'  : 'epl_remark' },
                 {   'data'  : 'crtd_by' ,
                   'render': function(data, type, row, meta)
                   {
                       link = `
                               <a href="`+baseUrl+`people-details-`+row.crdt_by_encrypt_id+`" title="Created By Detail">
                               `+data+`</a>
                             `;
                     return link;
                   }
                 },
                 {   'data'  : 'epl_crdt_date' },
                 {   'data'  : 'epl_encrypt_id' ,
                   'render': function(data, type, row, meta)
                   {
                       link = `
                               <a href="`+baseUrl+`event-people-edit-`+row.epl_encrypt_id+`" title="Edit Event People" class="datatable-links edit">
                               <i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
                               <a onclick="deleteUser('`+row.epl_id+`')" title="Delete Event People" class="datatable-links delete">
                               <i class="fa fa-trash" aria-hidden="true"></i></a>
                             `;
                     return link;
                   }
                 }
               ];

            customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);

          }

        </script>
        <!-- <script type="text/javascript">
        $(document).on("click",".openmodel" , function() {
         var cpl_id   = $(this).data('cpl_id');
         var cpl_designation   = $(this).data('cpl_designation');
         var cpl_ppl_id  = $(this).data('cpl_ppl_id');
         var cpl_ppl_name  = $(this).data('cpl_ppl_name');

         $("#cpl_designation_edit").val(cpl_designation);
         // $("#epm_type_edit").val(epm_type);
         $("#cpl_id").val(cpl_id);
         var select2Val = '<option value="'+cpl_ppl_id+'">'+cpl_ppl_name+'</option>';
         $('#cpl_ppl_id_edit').html(select2Val).trigger('change');

        });
        </script> -->
        <script type="text/javascript">

        function deleteUser(evt_id)
        {
          var type = '2';
          swal({
             title:"Delete",
             text:"Are you sure",
             type: "error",
             icon:"error",
             button: true,
          }).then(()=>{
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
                }
             );

        }
        </script>
      </body>
    </html>
