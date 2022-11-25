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
   
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- END OPTIONAL LAYOUT STYLES -->
  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-custom-datatable">
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
                <span class="list-title-caption caption-subject bold "><i class="fa fa-industry icon-company list-level"></i><?php  echo $title; ?></span>
                <div class="btn-group btn-group-right">
                  <?php if($add_access) {?>
                  <a id="sample_editable_1_new" href="<?php echo base_url('company-add'); ?>" class="btn green btn-add-new"> Add New
                    <i class="fa fa-plus">
                    </i>
                  </a>
                <?php } ?>
                </div>
              </div>
              <div class="tools">
              </div>
            </div>
            <div class="portlet-body table-both-scroll">
              <table id="tblcompanylist" class="table table-bordered table-list order-column">
              <!-- <table id="tblcompanylist" class="table table-bordered table-list table-header-fixed"> -->
                <thead>
                  <tr>
                    <!-- <th><i class="fas fa-building list-level"></i>Company Name</th>
                    <th><i class="fas fa-globe list-level"></i>Website</th>
                    <th><i class="fas fa-industry list-level"></i>State</th>
                    <th><i class="fas fa-industry list-level"></i>Type</th>
                    <th><i class="fas fa-industry list-level"></i>Employees</th>
                    <th><i class="fas fa-industry list-level"></i>Created Date</th>
                    <th><i class="fas fa-cog list-level"></i>Action</th> -->
                    <th>Company Name</th>
                    <th>Website</th>
                    <th>State</th>
                    <th>Type</th>
                    <th>Employees</th>
                    <th>Created Date</th>
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
       <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- Daterange Picker -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">

        $(document).ready(function(){
          getCompanyList();
          // getDataTableList();
          // getOutstandingBalanceData();
        });
         $('.date-range-picker-div').click(function(){
             
          });
          $('#daterangepicker-custom-range').on('apply.daterangepicker', function(ev, picker) {
       
                  
          });


        function getCompanyList()
        {
          var filter_type   = '<?php echo $filter_type; ?>';
          var filter_value  = '<?php echo $filter_value; ?>';

          var customDataTableElement = '#tblcompanylist';
          var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
          var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
          var customDataTableUrl     =  baseUrl + 'company-getlist'+(filter_type?'-'+filter_type+'-'+filter_value:'')+'?table_data_count='+customDataTableCount;
          var customDataTableColumns = [
              {   'data'  : 'cmp_name' ,
                'render': function(data, type, row, meta)
                {
                  var link = row.cmp_name;

                  if(row.private_access == 0)
                    return link;

                  <?php if($detail_access) { ?>
                      link ='<a href="'+baseUrl+'company-details-'+row.cmp_id_encrypt+'" title="View Detail">'+row.cmp_name+'</a>&nbsp;';
                  <?php }?>
                return link;

                }
              },
              {   'data'  : 'cmp_website' ,
                'render': function(data, type, row, meta)
                {
                  var weblink = sanitizeURL(row.cmp_website);
                  return '<a href="http://'+weblink.url+'" target="_blank" title="">'+(weblink.text!='http://'?weblink.text:'')+'</a>&nbsp;';
                }
              },
              {   'data'  : 'cmp_state_name' },
              {   'data'  : 'cmp_type_name' },
              {   'data'  : 'cmp_employee' },
              {   'data'  : 'cmp_crdt_dt' },
              {   'data'  : 'cmp_id' ,
                'render': function(data, type, row, meta)
                {
                  var link = '';

                  if(row.private_access == 0)
                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                  <?php if($edit_access) { ?>
                    link += '<a href="'+baseUrl+'company-edit-'+row.cmp_id_encrypt+'" title="Edit Company " class="datatable-links edit"><i class="fa fa-edit" aria-hidden="true"></i></a> ';

                  <?php }?>

                  <?php if($delete_access) { ?>
                    link += ' <a onclick="deleteCompany(\''+row.cmp_id_encrypt+'\')" title="Delete Company " class="datatable-links delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';

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

        function deleteCompany(cmp_id)
        {
          cswal({
            text : 'Do you want to delete this Company?', 
            title   : 'Done', 
            type    : 'delete', 
            onyes : function(){
              $.ajax({
                type: "POST",
                url: baseUrl + "company/company_delete/"+cmp_id,
                success: function(response) {
                  response = JSON.parse(response);
                  if(response.success == true) {
                    swal({
                      title: "Done",
                      text: response.message,
                      type: "success",
                      icon: "success",
                      button: true,
                    })
                  } else {
                    swal({
                      title: "Opps",
                      text: "Something Went wrong",
                      type: "error",
                      icon: "error",
                      button: true,
                    });
                  }
                  location.reload();
                }
              });
            }
          });
        }

      </script>
    </div>
  </body>
</html>
