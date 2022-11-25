<!-- <!DOCTYPE html> -->
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
     <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
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
          <!-- END PAGE HEADER-->
          <!-- -----MAIN CONTENTS START HERE----- -->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="btn-group">
                <a href="<?php echo base_url(); ?>company-people-add" title="Add company people" class="btn green btn-add-new">
                  <i class="fa fa-plus" title="Add"></i>Add</a>
              </div>
              <div class="tools"></div>
            </div>
            <div class="portlet-body">
              <table id="tblcompanylist" class="table table-bordered table-list">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Industry</th>
                    <th>Type</th>
                    <th>Team</th>
                    <th>Action</th>
                  </tr>
                </thead>
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
      <script type="text/javascript">

        $(document).ready(function(){
          getPeopleCompList();
        });

        function getPeopleCompList()
        {
            var customDataTableElement = '#tblcompanylist';
            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
            var customDataTableUrl     =  baseUrl + 'people-company-getlist?table_data_count='+customDataTableCount;
            var customDataTableColumns = [
              {   'data'  : 'cmp_name' ,
                'render': function(data, type, row, meta)
                {
                    link = `<a href="`+baseUrl+`company-details-`+row.cmp_id_encrypt+`" title="View Detail">`+row.cmp_name+`</a>&nbsp
                    `;
                  return link;
                }
              },
              {   'data'  : 'cmp_industry_name' },
              {   'data'  : 'cmp_type_name' },
              {   'data'  : 'cmp_employee' },
              {   'data'  : 'cmp_id' ,
                'render': function(data, type, row, meta)
                {
                  var link = ``;

                  if(row.private_access == 0)
                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                  <?php if($edit_access) { ?>
                    link += `
                      <a href="`+baseUrl+`company-edit-`+row.cmp_id_encrypt+`" title="Edit Company">
                      <i  class="fa fa-edit" aria-hidden="true" title="Edit Company People"></i></a>`;

                  <?php }?>

                  <?php if($delete_access) { ?>
                    link += ' <a onclick="deletePeopleCompany(\''+row.cmp_id_encrypt+'\',\''+row.ppl_id_encrypt+'\')" title="Delete Company"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                  <?php }?>

                  return link;
                }
              }
            ];

            customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
        }

      </script>
    </div>
  </body>
</html>
