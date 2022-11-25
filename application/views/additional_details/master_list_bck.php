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
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />


    <!-- END PAGE LEVEL PLUGINS -->

    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

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

                            <button id="" class="btn green btn-add-new add_new_record_datatable"> Add New
                                <i class="fa fa-plus"></i>
                            </button>

                          </div>

                        </div>

                        <div class="tools"> </div>

                      </div>

                     <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover additional-category-list" id="" >
                                         <thead>
                                            <tr>
                                                <th> Field </th>
                                                <th> Label </th>
                                                <th> Placeholder </th>
                                                <th> Group </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <form class="datatable-custom-form">
                                          </form>
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


        <script src="<?php echo base_url();?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/datatables.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/module/gen-prm/js/form-validation/gen_prm.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- <script src="<?php //echo base_url(); ?>assets/pages/scripts/form-repeater.js<?php //echo $global_asset_version; ?>" type="text/javascript"></script>
 -->
        <!-- END PAGE LEVEL PLUGINS -->

      </div>
  </div>

  </body>
  <script type="text/javascript">
         $(document).ready(function(){
             getCategoryList();
              console.log(customDataTable);
        
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
                {   'data'  : 'adm_field'},
                {   'data'  : 'adm_label'},
                {   'data'  : 'adm_placeholder'},
                {   'data'  : 'adm_group'},
                {   'data'  : 'adm_group' ,
                    'render': function(data, type, row, meta)
                    {
                      /*  return '<a href="'+baseUrl+'people-edit-'+row.adc_id+'" title="Edit Details "><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;'*/
                      return 'Edit';
                    }
                }
            ];

             var common_dataTableObj = {
        responsive: false,
        "order": [],
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered to 1 from _END_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search:",
            "zeroRecords": "No matching records found"
        },
        "lengthMenu": [
            [100,200,400,-1],
            [100,200,400,"All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 100,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
        
    }    
      var btn_obj = [];

      if(customDataTableButtons)
      {
        btn_obj = [
              { extend: 'print', className: 'btn dark btn-outline' },
              { extend: 'copy', className: 'btn red btn-outline' },
              { extend: 'excel', className: 'btn yellow btn-outline ' },
              { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
          ];
      }

    common_dataTableObj = $.extend({}, common_dataTableObj, {
      buttons: btn_obj
      });

      if(customDataTableServer)
      {
      common_dataTableObj = $.extend({}, common_dataTableObj, {
        searchDelay: delay,
        "serverSide": true,
        });
      } 

      var dataTableObj = $.extend({}, {
        'ajax'      : customDataTableUrl,
        'columns'   : customDataTableColumns
      },
      common_dataTableObj
        );

      /*if(optParam)
      {
      dataTableObj = $.extend({}, dataTableObj, optParam);
      }*/
        customDataTable = $(customDataTableElement);
        customDataTable.dataTable(dataTableObj);
        }
         function restoreRow(customDataTable, nRow) {
            var aData = customDataTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                customDataTable.fnUpdate(aData[i], nRow, i, false);
            }

            customDataTable.fnDraw();
        }

        function editRow(customDataTable, nRow) {
          console.log('edit row');
            var aData = customDataTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<select class="adm-field-select2 form-control input-small"  data-custom_required="true"></select><span class="custom_error"><span>';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData['adm_label'] + '"  data-custom_required="true"><span class="custom_error"><span>';
            jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData['adm_placeholder'] + '"><span class="custom_error"><span>';
            jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData['adm_group'] + '"><span class="custom_error"><span>';
            jqTds[4].innerHTML = '<button type="submit" class="datatable-button-save btn btn-save" onclick=" updateData(this)"  name="form_save">Save&nbsp;<i class="fa fa-check"></i></button>';
        }
        function checkEmpty(value)
        {
            newValue = value;
          if(value == '')
          {
            newValue = 'blank';
          }
          return newValue
        }
        function saveRow(customDataTable, nRow) {
          console.log('reached in save row');
            var jqInputs = $('.form-control', nRow);
            console.log(jqInputs);
            console.log(jqInputs[0]);
              var formData = new FormData();
            for(var i=0;i< jqInputs.length;i++)
            {
              console.log('jqInputs : '+i);
              var requiredCheck = $(jqInputs[i]).data('custom_required');
              if(requiredCheck )
              {
                // console.log($(jqInputs[i]).css('color','red'));
                console.log($(jqInputs[1]).find('span'));
                // console.log($(jqInputs[i]).next('.error').html('This field is required'));
                    return; 
              }
              formData.append('datatableinput_'+i,jqInputs[i].value);
              customDataTable.fnUpdate(jqInputs[i].value, nRow, i, false);
            }
            console.log(formData);
            /*customDataTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            customDataTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            customDataTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            customDataTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            customDataTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);*/
            customDataTable.fnDraw();
        }

        function cancelEditRow(customDataTable, nRow) {
            var jqInputs = $('input', nRow);
            customDataTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            customDataTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            customDataTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            customDataTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            customDataTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
            customDataTable.fnDraw();
        }
        var nEditing = null;
        var nNew = false;
         $('.add_new_record_datatable').click(function (e) {
            var aiNew = customDataTable.fnAddData([{"adm_field":'',"adm_label":'',"adm_placeholder":'',"adm_group":'',"adm_group":''}]);
            var nRow = customDataTable.fnGetNodes(aiNew[0]);
            editRow(customDataTable, nRow);
            nEditing = nRow;
            nNew = true;
            intializeSelect2();
         });

            

         
          function updateData(thisField)
          {
            console.log(thisField);
            // e.preventDefault();
            nNew = false;
            
            /* Get the row as a parent of the link that was clicked on */
            console.log($(thisField).parents('tr'));
            var rowName = this.name;
            console.log(rowName);
            if(rowName="form_save")
            {
              console.log('form_save');
              console.log($('input[name="'+rowName+'"]'));
             
                saveRow(customDataTable, nEditing);
                nEditing = null;
            }
           
        
          }
          function intializeSelect2()
          {
            $('.adm-field-select2').select2({
            ajax: {
              url: baseUrl+'additional_details/getGenPrmforDropdown/additional_detail_fields',
              dataType: 'json',
            }
          });
          }
           $('.datatable-custom-form').validate({
                submitHandler:function(form)
                {
                  console.log('form success');
                }
              });
      </script>
</html>
