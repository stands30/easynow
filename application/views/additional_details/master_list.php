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
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/datatables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

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
              <!-- START PAGE CONTENT-->
              <div class="container-fluid container-wrap" id="gentable">

                    <div class="portlet light bordered" >

                      <div class="portlet-title">

                        <div class="caption font-dark">

                          <span class="caption-subject bold ">Additional Master list</span> &nbsp;

                          <div class="btn-group">
                            <?php if($add_access) { ?>
                            <a id="" class="btn green btn-add-new add_new_record_datatable" href="<?php echo base_url('additional-detail-master-add'); ?>"> Add New
                                <i class="fa fa-plus"></i>
                            </a>
                          <?php } ?>
                          </div>

                        </div>

                        <div class="tools"> </div>

                      </div>

                     <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover additional-category-list" id="" >
                                         <thead>
                                            <tr>
                                                <th><i class="fas fa-bars list-level"></i> Category </th>
                                                <th><i class="fas fa-address-card list-level"></i> Type </th>
                                                <th><i class="fas fa-address-book list-level"></i> Name </th>
                                                <th><i class="fas fa-map list-level"></i> Placeholder </th>
                                                <th><i class="fas fa-list-ol list-level"></i> Order </th>
                                                <th><i class="fas fa-users list-level"></i> Group </th>
                                                <th><i class="fas fa-cog list-level"></i> Action </th>
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

    </div>

      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->



        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/datatables.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>


        <!-- END PAGE LEVEL PLUGINS -->

      </div>
  </div>

  <script type="text/javascript">

      $(document).ready(function(){
        getCategoryList();
        // console.log(customDataTable)
      });

      var customDataTable = '';
      var customDataTableButtons = true;

      function getCategoryList()
      {
        var customDataTableElement = '.additional-category-list';
        $(customDataTableElement).DataTable().destroy();
        var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
        var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
        var customDataTableUrl     = baseUrl + 'getadtMasterList?table_data_count='+customDataTableCount;
        var customDataTableColumns = [
          { 'data'  : 'adm_adc_name'},
          { 'data'  : 'adm_type_name'},
          { 'data'  : 'adm_name'},
          { 'data'  : 'adm_placeholder'},
          { 'data'  : 'adm_order'},
          { 'data'  : 'adm_group_name'},
          { 'data'  : 'adm_id' ,
            'render': function(data, type, row, meta)
            {


                var link = '';

                if(row.private_access == 0)
                  return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                <?php if($edit_access) { ?>
                  link += '<a href="'+baseUrl+'additional-detail-master-edit-'+row.adm_id_encrypted+'" title="Edit Details "><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;';


                <?php }?>

                <?php if($delete_access) { ?>
                  link += '<a onclick="deleteMaster(`'+row.adm_id_encrypted+'`)" title="Delete Details "><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;';
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

      function deleteMaster(evt_encrypt_id)
      {
        var type = '1';
        swal({
           title:"Delete",
           text:"Are you sure",
           type: "error",
           icon:"error",
           button: true,
        }).then(()=>{
          $.ajax({
            type: "POST",
            url: "additional_details/deleteMaster",
            data:{evt_encrypt_id:evt_encrypt_id},
            dataType:"json",
            success:function(response)
            {
                location.reload();
            }
          });
        });
      }
         </script>
  </body>
</html>
