
    <!DOCTYPE html>

    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>

        <head>
            <link rel="shortcut icon" href="favicon.ico" />
            <?php $this->load->view('common/header_styles'); ?>
            <!-- OPTIONAL LAYOUT STYLES -->
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- END OPTIONAL LAYOUT STYLES -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                            echo getPrevNextBtn('people-lead-detail', $ppl_id); ?>
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
                                                      <span class="caption-subject bold"><i class="fas fa-chalkboard-teacher icon-lead"></i>Lead List</span> &nbsp;
                                                      <div class="btn-group">
                                                              <a id="sample_editable_1_new" href="<?php echo base_url('lead-add-'.$ppl_encrypted_id.'-'.$ppl_encrypted_name); ?>" class="btn green"> Add New
                                                                  <i class="fa fa-plus"></i>
                                                              </a>
                                                              <input type="hidden" id="ppl_id" name="ppl_id" value="<?php echo $ppl_id; ?>">
                                                     </div>
                                                  </div>
                                                  <div class="tools"> </div>
                                              </div>
                                              <div class="portlet-body">
                                                  <table class="table table-striped table-bordered table-hover table-list table-list people-list" id="tblleadlist">
                                                        <thead>
                                                          <tr>
                                                            <th>Title</th>
                                                            <th>Referred By</th>
                                                            <th>Managed By</th>
                                                            <th>Status</th>
                                                            <th>Type</th>
                                                            <th>Campaign</th>
                                                            <th>Stage</th>
                                                            <th>Action</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
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
                <!-- END PAGE LEVEL PLUGINS -->
                     <script type="text/javascript">

        $(document).ready(function(){
          getLeadList();
        });

         function getLeadList()
        {
            var ppl_id = $('#ppl_id').val();
            var customDataTableElement = '#tblleadlist';
            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
            var customDataTableUrl     =  baseUrl + 'people-lead-getdetail-'+ppl_id+'?table_data_count='+customDataTableCount;
            var customDataTableColumns = [
              {   'data'  : 'led_title' ,
                'render': function(data, type, row, meta)
                {
                    link = `<a href="`+baseUrl+`lead-details-`+row.led_encrypt_id+`" title="View Detail">`+data+`</a>
                    `;
                  return link;
                }
              },
              {   'data'  : 'led_ref_by_name' },
              {   'data'  : 'led_managed_by_name' },
              {   'data'  : 'led_lead_status_name' },
              {   'data'  : 'lead_type_name' },
              {   'data'  : 'campaign_name' },
              {   'data'  : 'led_lead_stage_name' },
              {   'data'  : 'led_id' ,
                'render': function(data, type, row, meta)
                {
                    link = `
                            <a href="`+baseUrl+`lead-edit-`+row.led_encrypt_id+`" title="Edit Details " class="datatable-links edit">
                            <i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
                    `;
                  return link;
                }
              }
            ];

            customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
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
