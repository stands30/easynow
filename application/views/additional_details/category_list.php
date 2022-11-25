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
   


    <!-- END PAGE LEVEL PLUGINS -->

    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
      .check {
        color: green;
      }
      .cancel {
        color: red;
      }
    </style>

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

                          <span class="caption-subject bold">Additional Category list</span> &nbsp;

                          <div class="btn-group">
                            <?php if($add_access) { ?>
                              <button id="sample_editable_1_new" class="btn green"> Add New
                                  <i class="fa fa-plus"></i>
                              </button>
                            <?php } ?>
                          </div>

                        </div>

                        <div class="tools"> </div>

                      </div>

                     <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover additional-category-list" id="sample_editable_1" >
                            <thead>
                                <tr>
                                    <th><i class="fas fa-clipboard list-level"></i> Category </th>
                                    <th><i class="fas fa-order list-level"></i> Order </th>
                                    <th><i class="fas fa-cog list-level"></i> Action </th>
                                </tr>
                            </thead>                                      
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


        <script src="<?php echo base_url();?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/datatables.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->

      



        <!-- END PAGE LEVEL PLUGINS -->

      </div>
  </div>

  </body>
  <script type="text/javascript">

        $(document).ready(function(){
          getCategoryList();
        });

        var oTable;

        var table = $('#sample_editable_1');
        var tableWrapper = $("#sample_editable_1_wrapper");

        var nEditing = null;
        var nNew = false;

        function getCategoryList()
        {
            var customDataTableElement = '.additional-category-list';
            $(customDataTableElement).DataTable().destroy();
            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
            var customDataTableUrl     = baseUrl + 'getadtCatList?table_data_count='+customDataTableCount;
            var customDataTableColumns = [
                {   'data'  : 'adc_category'},
                {   'data'  : 'adc_order'},
                {   'data'  : 'adc_id_encrypt' ,
                    'render': function(data, type, row, meta)
                    {
                      /*  return '<a href="'+baseUrl+'people-edit-'+row.adc_id+'" title="Edit Details "><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;'*/
                      // return ;

                      var link = '';

                      if(row.private_access == 0)
                        return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                      <?php if($edit_access) { ?>
                        link += '<a class="edit" href=""><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';


                      <?php }?>

                      <?php if($delete_access) { ?>
                        link += '<a class="delete" data-id="' + row['adc_id_encrypt'] + '"><i class="fa fa-trash"></i></a>';
                      <?php }?>

                      return link;
                    }
                }
            ];

            // oTable = customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);

          oTable =  customDatatablex({
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
    
      var TableDatatablesEditable = function () {

      var handleTable = function () {

          function restoreRow(oTable, nRow) 
          {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            oTable.fnUpdate(aData['adc_category'], nRow, 0, false);
            oTable.fnUpdate(aData['adc_order'], nRow, 1, false);
            oTable.fnUpdate(aData['adc_id_encrypt'], nRow, 2, false);

            oTable.fnDraw();
          }

          function editRow(oTable, nRow) {
              var aData = oTable.fnGetData(nRow);
              var jqTds = $('>td', nRow);
              jqTds[0].innerHTML = '<input type="text" class="form-control input-xs" data-id="'+ aData['adc_id_encrypt'] +'" value="' + aData['adc_category'] + '">';
              jqTds[1].innerHTML = '<input type="text" class="form-control input-xs" value="' + aData['adc_order'] + '">';
              jqTds[2].innerHTML = '<a class="edit check" ><i class="fa fa-check"></i></a>&nbsp;&nbsp;&nbsp;<a class="cancel" href=""><i class="fa fa-times"></i></a>';
          }

          function saveRow(oTable, nRow) {
              var jqInputs = $('input', nRow);
              //var aData = oTable.fnGetData(nRow);

              saveCategory(jqInputs[0], jqInputs[1]);

              oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
              oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
              oTable.fnUpdate('', nRow, 2, false);
              oTable.fnDraw();
          }

          function cancelEditRow(oTable, nRow) {
              var jqInputs = $('input', nRow);
              oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
              oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
              oTable.fnUpdate('<a class="edit check" href=""><i class="fa fa-edit"></i></a>', nRow, 2, false);
              oTable.fnDraw();
          }

          $('#sample_editable_1_new').click(function (e) {
              e.preventDefault();

              if (nNew && nEditing) {
                  if (confirm("Previose row not saved. Do you want to save it ?")) {
                      saveRow(oTable, nEditing); // save
                      $(nEditing).find("td:first").html("Untitled");
                      nEditing = null;
                      nNew = false;

                  } else {
                      oTable.fnDeleteRow(nEditing); // cancel
                      nEditing = null;
                      nNew = false;
                      
                      return;
                  }
              }

              var aiNew = oTable.fnAddData({'adc_category':'','adc_order':''});
              var nRow = oTable.fnGetNodes(aiNew[0]);
              editRow(oTable, nRow);
              nEditing = nRow;
              nNew = true;
          });

          table.on('click', '.delete', function (e) {
              e.preventDefault();

              if (confirm("Are you sure to delete this row ?") == false) {
                  return;
              }

              var nRow = $(this).parents('tr')[0];

              var id = $(nRow).find('.delete').data('id')

              deleteCategory(id);

              oTable.fnDeleteRow(nRow);
              //alert("Deleted! Do not forget to do some ajax to sync with backend :)");
          });

          table.on('click', '.cancel', function (e) {

              e.preventDefault();
              if (nNew) {
                  oTable.fnDeleteRow(nEditing);
                  nEditing = null;
                  nNew = false;
              } else {
                  restoreRow(oTable, nEditing);
                  nEditing = null;
              }
          });

          table.on('click', '.edit', function (e) {
              e.preventDefault();
              nNew = false;
              
              /* Get the row as a parent of the link that was clicked on */
              var nRow = $(this).parents('tr')[0];

              if (nEditing !== null && nEditing != nRow) {
                  /* Currently editing - but not this row - restore the old before continuing to edit mode */
                  restoreRow(oTable, nEditing);
                  editRow(oTable, nRow);
                  nEditing = nRow;
              } else if (nEditing == nRow && this.innerHTML == '<i class="fa fa-check"></i>') {
                  /* Editing this row and want to save it */
                  saveRow(oTable, nEditing);
                  nEditing = null;
                  //alert("Updated! Do not forget to do some ajax to sync with backend :)");
              } else {
                  /* No edit in progress - let's start one */
                  editRow(oTable, nRow);
                  nEditing = nRow;
              }
          });
      }

      return {

          //main function to initiate the module
          init: function () {
              handleTable();
          }

      };

    }();

    jQuery(document).ready(function() {
      TableDatatablesEditable.init();
    });

    function saveCategory(id_input, order_input)
    {
      var id  = $(id_input).data('id');
      var order  = order_input.value;
      var val = id_input.value;

      $.ajax(
      {
          type: "POST",
          url: baseUrl + "additional_details/saveAdtCategory",
          data: {
            adc_id        : id,
            adc_category  : val,
            adc_order     : order
          },
          success: function(response)
          {
            response = JSON.parse(response);
              if (response.success == true)
              {
                  swal(
                  {
                      title: "Done",
                      text: response.message,
                      type: "success",
                      icon: "success",
                      button: true,
                  }).then(()=>
                  {
                      oTable.DataTable().destroy();
                      getCategoryList();
                  });
              }
              else
              {
                  swal(
                  {
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

    function deleteCategory(id)
    {
      $.ajax(
      {
          type: "POST",
          url: baseUrl + "additional_details/deleteAdtCategory",
          data: {
            adc_id:id
          },
          success: function(response)
          {
            response = JSON.parse(response);
              if (response.success == true)
              {
                  swal(
                  {
                      title: "Done",
                      text: response.message,
                      type: "success",
                      icon: "success",
                      button: true,
                  }).then(()=>
                  {
                      oTable.DataTable().destroy();
                      getCategoryList();
                  });
              }
              else
              {
                  swal(
                  {
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
</html>
