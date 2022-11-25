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
    <!-- <link href="<?php echo base_url(); ?>assets/module/company/css/company-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
       <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
          <!-- -----MAIN CONTENTS START HERE----- -->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <!-- <i class="icon-settings font-dark"></i> -->

                <span class="caption-subject bold">Company tags : <?php echo $tgs_name ?></span>
                <div class="btn-group">
               </div>
              </div>
              <div class="tools">
              </div>

            </div>
            <div class="portlet-body">
                <div class="form-group col-md-4">
                  <select name="ppl_tgs_id" id="ppl_tgs_id" class="form-control tags-select2" multiple="" >
                    <option value="<?php echo $tgs_id ?>" selected ><?php echo $tgs_name ?></option>
                  </select>
                </div>

                <div class="btn-group">
                  <button type="button" name="button" class="form-control btn btn_save btn-add-new" onclick="getCompanyList()" id="getList">Search</button>
                </div>
              <table id="tblcompanylist" class="table table-bordered table-list">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Website</th>
                    <th>Industry</th>
                    <th>Address</th>
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
      <!-- OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">

      $(document).ready(function(){
        // console.log(tgs_id);
        getCompanyList();
      })

        function getCompanyList()
        {
           var tgs_id = $("#ppl_tgs_id").val();
           var customDataTableElement = '#tblcompanylist';
           $(customDataTableElement).DataTable().destroy();
           var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
           var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
           var customDataTableUrl     =  baseUrl + 'tag-type-getlist-company?table_data_count='+customDataTableCount+'&tgs_id='+tgs_id;
           var customDataTableColumns = [
              {   'data'  : 'cmp_name',
                'render': function(data, type, row, meta)
                {


                  var link = row.cmp_name;

                  if(row.private_access == 0)
                    return link;

                  <?php if($detail_access) { ?>
                      link = `<a href="`+baseUrl+`company-details-`+row.cmp_id_encrypt+`" title="View Detail">
                              `+row.cmp_name+`</a>&nbsp;
                      `;
                  <?php }?>
                return link;
                }
              },
              {   'data'  : 'cmp_website' },
              {   'data'  : 'cmp_industry_name' },
              {   'data'  : 'cmp_address' },
              {   'data'  : 'cmp_id' ,
                'render': function(data, type, row, meta)
                {


                  var link = ``;

                  if(row.private_access == 0)
                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                  <?php if($edit_access) { ?>
                    link += `<a href="`+baseUrl+`company-edit-`+row.cmp_id_encrypt+`" title="Edit Company ">
                            <i class="fa fa-edit" aria-hidden="true"></i></a>
                    `;
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
        $('.tags-select2').select2({
            tags: true,
            width:'resolve',
            placeholder:"Enter Tags",
            multiple: true,
              ajax: {
                url: baseUrl+'people/getTagsforDropdown',
                dataType: 'json',
              }
            });
      </script>
    </div>
  </body>
</html>
