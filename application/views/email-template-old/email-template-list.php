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
    <!-- OPTIONAL LAYOUT STYLES -->
    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
     <!-- daterange picker -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
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
                <span class="list-title-caption caption-subject bold "><?php  echo $title; ?></span>
                <div class="btn-group">
                  <?php if($add_access) { ?>
                  <a id="sample_editable_1_new" href="<?php echo base_url('email-template-add'); ?>" class="btn green btn-add-new"> Add New
                    <i class="fa fa-plus">
                    </i>
                  </a>
                <?php } ?>
                </div>
              </div>
              <div class="tools">
              </div>

            </div>


            <div class="portlet-body">
              <table class="table table-bordered table-list" id="emailTempList">
                <thead>
                  <th><i class="fas fa-th-list list-level"></i>Title</th>
                  <th><i class="fas fa-user list-level"></i>Sender Name</th>
                  <th><i class="far fa-credit-card list-level"></i>Subject</th>
                  <th><i class="fas fa-envelope list-level"></i>CC</th>
                  <th><i class="fas fa-envelope list-level"></i>Reply To</th>
                  <th><i class="fas fa-cog list-level"></i>Action</th>
                </thead>
                <tbody>
                  <!-- <tr>
                    <td><a href="<?php echo base_url('email-template-detail'); ?>">New Test Email</a></td>
                    <td>Pooja</td>
                    <td>Creating new email template</td>
                    <td>Ankush</td>
                    <td>Stanley</td>
                    <td>
                      <a href="#" title="Edit Details"><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>
                    </td>
                  </tr> -->

                </tbody>
              </table>
            </div>

          </div>
          <!-- -MAIN CONTENTS END HERE -->
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
      <!-- OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <!-- Daterange Picker -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">

        $(document).ready(function(){
          getEmailTempList();
        })

        function getEmailTempList()
        {
          var customDataTableElement = '#emailTempList';
          var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
          var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
          var customDataTableUrl     =  baseUrl + 'emailTemp-getlist?table_data_count='+customDataTableCount;
          var customDataTableColumns = [
              {   'data'  : 'emt_title' ,
                'render': function(data, type, row, meta)
                {
                    

                  var link = row.emt_title;

                  if(row.private_access == 0)
                    return link;

                  <?php if($detail_access) { ?>
                      link = `<a href="`+baseUrl+`email-template-detail-`+row.emt_id_encrypt+`" title="View Detail">
                              `+row.emt_title+`</a>&nbsp;`;
                  <?php }?>
                return link;
                }
              },
              {   'data'  : 'emt_sender' },
              {   'data'  : 'emt_subject' },
              {   'data'  : 'emt_cc' },
              {   'data'  : 'emt_reply_to' },
              {   'data'  : 'emt_id' ,
                'render': function(data, type, row, meta)
                {
                  var link = '';

                  if(row.private_access == 0)
                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                  <?php if($edit_access) { ?>
                    link += '<a href="`+baseUrl+`email-template-edit-'+row.emt_id_encrypt+'" title="Edit Email Template " ><i class="fa fa-edit" aria-hidden="true"></i></a>';

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
