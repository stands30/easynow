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
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <!-- END PAGE LEVEL PLUGINS -->    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
          <div class="portlet">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <!-- -----MAIN CONTENTS START HERE----- -->
                <?php
                $cmpData['cmp_id'] = $clientdata->cmp_id;
                $cmpencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($clientdata->cmp_id);
                $this->load->view('client/client_sidebar',$cmpData);
                ?>

                <aside class="profile-info col-lg-10 detail-view-list">
                  <section class="panel">

                    <div class="">
                     <div class="portlet light bordered">
                          <div class="portlet-title">
                            <div class="caption font-dark">
                              <!-- <i class="icon-settings font-dark"></i> -->
                              <span class="caption-subject bold">Client People List
                              </span> &nbsp;
                              <div class="btn-group">
                                <a  href="<?php echo base_url('client-people-add-'.$clientdata->cmp_id_encrypt.'-'.$clientdata->cmp_name_encrypt) ?>" title="Add client people" class="btn green btn-add-new">
                                  <i  class="fa fa-plus"  title="Add"></i>Add</a>
                              </div>
                            </div>
                            <div class="tools">
                            </div>
                          </div>
                          <div class="portlet-body">
                            <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover table-list" id="client_people_tbl">
                                <thead>
                                  <tr>
                                    <th>Name </th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Designation</th>
                                    <th>Met On</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody></tbody>
                              </table>
                            </div>

                          </div>
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

      <!-- Add Event people add -->


      <!-- Add Event people edit -->

      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
             <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>      
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

      </div>
        <script type="text/javascript">

          $(document).ready(function(){
            getcmpList();
          })

          function getcmpList()
          {
            var customDataTableElement = '#client_people_tbl';
            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
            var customDataTableUrl     =  baseUrl + 'client-people-list-<?php echo $this->nextasy_url_encrypt->encrypt_openssl($clientdata->cmp_id); ?>?table_data_count='+customDataTableCount;
            var customDataTableColumns = [
                {   'data'  : 'cpl_ppl_name' ,
                  'render': function(data, type, row, meta)
                  {
                      link = `<a href="`+baseUrl+`people-details-`+row.cpl_ppl_id_encrypt+`"> `+data+`</a>
                      `;
                    return link;
                  }
                },
                {   'data'  : 'cpl_ppl_email' },
                {   'data'  : 'cpl_ppl_mobile' },
                {   'data'  : 'cpl_designation' },
                {   'data'  : 'cpl_met_on' },
                {   'data'  : 'led_id' ,
                  'render': function(data, type, row, meta)
                  {
                      link = `
                        <a href="`+baseUrl+`client-people-edit-`+row.cpl_id_encrypt+`-`+row.cpl_cmp_id_encrypt+`" title="View Detail">
                        <i  class="fa fa-edit" aria-hidden="true" title="Edit Client People"></i></a>`;
                        // <a onclick="return deleteUser('`+row.cpl_ppl_id+`')">
                        //  <i  class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
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
