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
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?>
    <?php
      $global_asset_version = global_asset_version();
     ?>
    <!-- OPTIONAL LAYOUT STYLES -->
    <link href="<?php echo base_url(); ?>assets/module/lead/css/lead-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- END OPTIONAL LAYOUT STYLES -->
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
        <div class="page-content">
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <div class="page-bar" id="breadcrumbs-list">
            <?php echo $breadcrumb; ?>
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <!-- END PAGE HEADER-->
          <!-- -MAIN CONTENTS START HERE -->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <!-- <i class="icon-settings font-dark"></i> -->
                <span class="caption-subject bold">Lead List
                </span> &nbsp;
                <input type="hidden" name="led_lead_status" id="led_lead_status" value="<?php echo $led_lead_status ?>">
              </div>
              <div class="tools">
              </div>
            </div>
            <div class="portlet-body">
              <table id="tblleadlist" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Lead Title</th>
                    <th>Name</th>
                    <th>Refered By</th>
                    <th>Managed By</th>
                    <th>Status</th>
                    <th>Stage</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!-- MAIN CONTENTS END HERE-->
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
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      </script>
      <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">

        $(document).ready(function(){
          var led_lead_status = $("#led_lead_status").val();
          getLeadList(led_lead_status);
        })

        function getLeadList(led_lead_status)
        {
          leadDataTable = $('#tblleadlist').DataTable({
            'ajax'      : baseUrl + 'leadstatus-getlist-'+led_lead_status,
            'columns'   : [
              {   'data'  : 'led_title' ,
                'render': function(data, type, row, meta)
                {
                  if(type === 'display'){
                    link = '<a href="'+baseUrl+'lead-details-'+row.led_id_encrypt+'" >' + data + '</a>';
                  }
                  return link;
                }
              },
              {   'data'  : 'led_ppl_name' ,
                'render': function(data, type, row, meta)
                {
                  if(type === 'display'){
                    link = '<a href="people-details-'+row.led_ppl_id_encrypt+'" >' + data + '</a>';
                  }
                  return link;
                }
              },
              {   'data'  : 'led_ref_by_name' },
              {   'data'  : 'led_managed_by_name' },
              {   'data'  : 'led_lead_status_name' },
              {   'data'  : 'led_lead_stage_name' },
              {   'data'  : 'led_id' ,
                'render': function(data, type, row, meta)
                {
                  if(type === 'display'){
                    link = `<a href="`+baseUrl+`lead-edit-`+row.led_id_encrypt+`" title="Edit Details ">
                            <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
                            <a onclick="deleteLead('`+row.led_id_encrypt+`')" title="Delete Details ">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>`;
                  }
                  return link;
                }
              }
            ],
            buttons: [
                { extend: 'print', className: 'btn dark btn-outline' },
                // { extend: 'pdf', className: 'btn green btn-outline' },
                // { extend: 'csv', className: 'btn purple btn-outline ', text: 'Excel' },
                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
            ],
            "order": [
                [0, 'asc']
            ],
            "lengthMenu": [
                [100,200,-1],
                [100,200,"All"] // change per page values here
            ],
            "pageLength": 100,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
          });
        }

        function deleteLead(leadid)
        {
          if(!confirm('Do you really want to delete this entry'))
          {
            return;
          }

          $.ajax(
          {
            type: "POST",
            url: baseUrl + "lead-delete-"+leadid,
            success: function(response)
            {
              response = JSON.parse(response);

              if (response.success == true)
              {
                swal({
                  title: "Done",
                  text: response.message,
                  type: "success",
                  icon: "success",
                  button: true,
                }).then(()=>{
                  window.location.href = response.linkn;
                });
              }
              else
              {
                swal({
                  title: "Opps",
                  text: "Something Went wrong",
                  type: "error",
                  icon: "error",
                  button: true,
                });
              }
            }
          });
        }
      </script>
    </div>
  </body>
</html>
