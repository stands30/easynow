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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- daterange picker -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
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
            <form  id="gen_prm_group" method="post">
            <div class="row">
                <div class="form-group col-md-2">
                  <h4 ><b>Parameter </b></h4>
                </div>
              <div class="form-group col-md-6">
                <select class="gen_prm_group form-control" name="gpn_id" id="gpn_id">
                  <?php if(!empty($gnp_id) && !empty($gnp_title)){ ?>
                    <option value="<?php echo $gnp_id ?>" selected><?php echo $gnp_title ?></option>
                  <?php } ?>
                </select>
                <input type="hidden" name="gnp_group" id="gnp_group"  value="<?php if(isset($gnp_group) && !empty($gnp_group)) echo $gnp_group ?>">
              </div>
              <div class="form-group col-md-4">
                <div class="btn-group ">
                  <button type="button" name="button" class="form-control btn btn_save btn-add-new btn green" onclick="getGenList()" id="getList">Go</button>
                </div>
              </div>
             </div>
            </form>
          <div class="portlet">
            <div class="row">
              <!-- END PAGE HEADER-->
              <!-- START PAGE CONTENT-->
              <div class="container-fluid container-wrap" id="genTable">
                    <div class="portlet light bordered" >
                      <div class="portlet-title">
                        <div class="caption font-dark">
                          <span class="list-title-caption caption-subject bold "><i class="fa fa-th-list sub-icon-color icon-setting"></i><?php  echo $title; ?></span>
                          <div class="btn-group btn-list-group">
                            <?php if($add_access) { ?>
                            <button id="sample_editable_1_new" onclick="goToAdd()" class="btn green btn-add-new hidden"> Add New
                                <i class="fa fa-plus"></i>
                            </button>
                          <?php } ?>
                          </div>
                        </div>
                        <div class="tools"> </div>
                      </div>
                     <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dataTable" id="gen_prm" >
                           <thead>
                              <tr role="row">
                                 <th>Default</th>
                                 <th>Name</th>
                                 <th>Group</th>
                                 <th>Order</th>
                                 <th>Status </th>
                                 <th>Action </th>
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
        <script src="<?php echo base_url();?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- Daterange Picker -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/gen-prm/js/form-validation/gen_prm.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>


        <!-- END PAGE LEVEL PLUGINS -->
      </div>
  </div>
  </body>
  <script type="text/javascript">
    $(document).ready(function(){
      var gen_groups = $("#gpn_id").select2('val');
      getGenPrmList();
      // console.log(typeof(gen_groups));
      //$("#genTable").hide();
      if(typeof(gen_groups) !== 'object')
      {
        getGenPrmList(gen_groups);
        var gnp_group     = $("#gnp_group").val();
        var gpn_id        = $("#gpn_id").select2('data')[0]['id'];
        var gpn_title     = $("#gpn_id").select2('data')[0]['text'];
        $("#gnp_group").val(gnp_group);
        $("#gpn_id").val(gpn_id);
        $("#gpn_title").val(gpn_title);
        $("#genTable").show();
      }
      
      handleAddButton();
    });
  </script>
     <script type="text/javascript">
     function getGenList()
     {
       var gen_groups = $("#gpn_id").select2("val");
       
       if(typeof(gen_groups) === 'object')
       {
          swal({
            title:"Info",
            text:"Please Select Parameter Group",
            type: "info",
            icon: "info",
            button: true,
          });
       }
       else
       { 
          getGenPrmList(gen_groups);
          handleAddButton();
       }
     }

     function handleAddButton()
     {
        var gen_groups = $("#gpn_id").select2("val");
        if(gen_groups > 0)
          $('#sample_editable_1_new').removeClass('hidden');
        else
          $('#sample_editable_1_new').addClass('hidden');
     }

      function getGenPrmList(gnp_groups = 0)
      {
        var customDataTableElement = '#gen_prm';
        var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
        var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
        var customDataTableUrl     =  baseUrl + 'gen-getlist-'+ gnp_groups+'?table_data_count='+customDataTableCount;
        var customDataTableColumns = [
          {   'data'  : 'gnp_encrypt_id' ,
            'render': function(data, type, row, meta)
            {
              var selected = '';
               if(row.gnp_default == 1)
               {
                     selected = " checked='checked'";
               }
              return '<input type="radio" name="'+row.gnp_group+'" value="'+row.gnp_value+'" onchange="updateDefaultvalue(this)" '+selected+'/>';
            }
          },
          {   'data'  : 'gnp_name' },
          // {   'data'  : 'gnp_value' },
          {   'data'  : 'gpn_title' },
          {   'data'  : 'gnp_order' ,
            'render': function(data, type, row, meta)
            {
              return '<span class="'+(row.gnp_order == 1?'tr_divider':'')+'">'+row.gnp_order+'</span>';
            }
          },
          {   'data'  : 'gnp_status'},
          {   'data'  : 'gnp_encrypt_id' ,
            'render': function(data, type, row, meta)
            {
              var link = '';
              if(row.private_access == 0)
                return "<?php echo FORM_INACCESS_MESSAGE; ?>";
              <?php if($edit_access) { ?>
                link += '<a href="#" onclick = "goToEdit('+row.gnp_encrypt_id+')" title="Edit General Parameter " class="datatable-links edit"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;';
              <?php }?>
              <?php if($delete_access) { ?>
                link += '<a onclick="deleteUser('+row.gnp_id+')" title="Delete General Parameter " class="datatable-links delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
              <?php }?>
              return link;
            }
          }
        ];
        $(customDataTableElement).DataTable().destroy();
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

        setTimeout(function(){ // if divider required
          //$('.tr_divider').parent().parent().css('border','solid 1px #000!important');
        },2000);
      }
      function deleteUser(gnp_id)
      {
        swal({
          title:"Delete",
          text:"Are you sure",
          type: "error",
          icon:"error",
          button: true,
        }).then((confirm) => {
          if(confirm)
          {
            $.ajax({
              type: "POST",
              url: "genParameter/deleteGenParam",
              data:{gnp_id:gnp_id},
              dataType:"json",
              success:function(response)
              {
               var gen_groups = $("#gpn_id").select2("val");
               getGenPrmList(gen_groups);
              }
            });
          }
        });
     }
      function goToAdd()
      {
        var gpn_id     = $("#gpn_id").val();
        if(!gpn_id)
        {
          alert('Please Select Group Name');
          return;
        }
        window.location.href = 'general-parameter-add-'+ gpn_id;
      }
      function goToEdit(gpn_id)
      {
        window.location.href = 'general-parameter-edit-'+gpn_id;
      }
      function updateDefaultvalue(_this)
      {
        $.ajax({
          type: "POST",
          url: "genParameter/updateDefaultvalue",
          data:{
            group_name  : _this.name,
            value       : _this.value
          },
          dataType:"json",
          success:function(response)
          {
            
          }
        });
      }
      </script>
</html>
  