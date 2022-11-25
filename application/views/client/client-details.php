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
    <!-- <link href="<?php echo base_url(); ?>assets/client/assets/css/client-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> -->
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
            <div class="breadcrumb-button">
                <a href="<?php echo base_url('client-details-'.$clientdata->prev_encrypt) ?>" class=" previous" title="">
                    <button id="newlead" class="btn green">
                        <i class="fa fa-arrow-left"></i>
                        <!-- Previous  -->
                    </button>
                </a>
                <a href="<?php echo base_url('client-details-'.$clientdata->next_encrypt) ?>" class="next">
                    <button id="newlead" class="btn green">
                        <!-- Next --><i class="fa fa-arrow-right"></i>
                    </button>
                </a>
            </div>
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
                    <div class="panel-body bio-graph-info panel-body-detail-view">
                      <div class="text-center invoice-btn col-lg-offset-10">
                      </div>
                      <header class="panel-heading panel-heading-header color-primary">
                        <div class="row detail-box">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <span class="panel-title">
                              <?php echo $clientdata->cmp_name; ?>
                            </span>&nbsp;&nbsp;
                            <a class="btn-edit" href="<?php echo base_url('client-edit-'.$clientdata->cmp_id_encrypt) ?>">
                              <i class="fa fa-edit">
                              </i>
                              <span class="btn-text"> Edit
                              </span>
                            </a>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 created-title">
                            <span class="created">Created By: <?php echo $clientdata->cmp_crdt_by ?>
                            </span>
                            <br>
                            <span class="sp-date">Created On: <?php echo display_date($clientdata->cmp_crdt_dt) ?>
                            </span>
                          </div>
                        </div>
                      </header>
                      <div class="">
                        <table class="table table-detail-custom table-style">
                           <tbody>
                            <!-- <tr>
                               <td rowspan="2">
                                <img height="130" width="130" src="
                                <?php
                                  if(isset($clientdata->cmp_logo) && $clientdata->cmp_logo != '')
                                    echo base_url().'assets/module/company/img/'.$clientdata->cmp_logo;
                                  else
                                    echo base_url().'assets/project/images/nologo.png';
                                  ?>" />
                              </td>
                            </tr> -->
                            <tr>
                              <td><i class="fas fa-globe"></i> Website</td>
                              <td><?php if(isset($clientdata->cmp_website)) echo $clientdata->cmp_website; ?></td>
                              <td><i class="fas fa-industry"></i> Industry</td>
                              <td colspan="3"><?php if(isset($clientdata->cmp_industry_name)) echo $clientdata->cmp_industry_name; ?></td>
                            </tr>
                             <tr>
                              <td><i class="fas fa-industry"></i> Type</td>
                              <td><?php if(isset($clientdata->cmp_type_name)) echo $clientdata->cmp_type_name; ?></td>
                              <td><i class="fas fa-rupee-sign"></i> Annual revenue</td>
                              <td colspan="3"><?php if(isset($clientdata->cmp_annual_rev)) echo $clientdata->cmp_annual_rev; ?></td>
                            </tr>
                            <tr>
                              <td><i class="fas fa-id-card"></i> GST No</td>
                              <td ><?php if(isset($clientdata->cmp_gst_no)) echo $clientdata->cmp_gst_no; ?></td>
                              <td><i class="fas fa-address-card"></i> Pan No</td>
                              <td colspan="3"><?php if(isset($clientdata->cmp_pan)) echo $clientdata->cmp_pan; ?></td>
                            </tr>
                            <tr>
                              <td><i class="fas fa-tags"></i> Tags</td>
                              <td colspan="5"><?php if(isset($clientdata->cmp_tgs_id)) echo getTags($clientdata->cmp_tgs_id,'company'); ?></td>
                            </tr>
                            <tr>
                              <td><i class="fas fa-map-marker-alt"></i> Address</td>
                              <td colspan="5"><?php if(isset($clientdata->cmp_address)) echo $clientdata->cmp_address; ?></td>
                            </tr>
                            <tr>
                              <td><i class="far fa-credit-card"></i> Payment Terms</td>
                              <td><?php if(isset($clientdata->cmp_payment_terms)) echo $clientdata->cmp_payment_terms; ?></td>
                              <td><i class="fas fa-user"></i> Employees</td>
                              <td><?php if(isset($clientdata->cmp_employee)) echo $clientdata->cmp_employee; ?></td>
                            </tr>
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
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js<?php echo global_asset_version(); ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.min.js<?php echo global_asset_version(); ?>" type="text/javascript">
      </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/client/js/form-validation/client_people.js<?php echo global_asset_version(); ?>" type="text/javascript"></script> -->
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>

      </div>
        <script type="text/javascript">

          $(document).ready(function(){
            getcmpList();
          })

          function getcmpList()
          {
            cmpDataTable = $('#client_people_tbl').DataTable({
              'ajax'      : baseUrl + 'client-people-list-<?php echo $this->nextasy_url_encrypt->encrypt_openssl($clientdata->cmp_id); ?>',
              'columns'   : [
                {   'data'  : 'cpl_ppl_name' ,
                  'render': function(data, type, row, meta)
                  {
                    if(type === 'display'){
                      link = `<a href="`+baseUrl+`people-details-`+row.cpl_ppl_id_encrypt+`"> `+data+`</a>
                      `;
                    }
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
                    if(type === 'display')
                    {
                      link = `
                        <a href="`+baseUrl+`client-people-edit-`+row.cpl_id_encrypt+`-`+row.cpl_cmp_id_encrypt+`" title="View Detail">
                        <i  class="fa fa-edit" aria-hidden="true" title="Edit Client"></i></a>`;
                        // <a onclick="return deleteUser('`+row.cpl_ppl_id+`')">
                        //  <i  class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
                    }
                    return link;
                  }
                }
              ]
            });
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
          }.)then(()=>{
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
