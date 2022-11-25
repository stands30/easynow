
    <!DOCTYPE html>



    <html lang="en">

        <meta charset="utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <meta content="" name="description" />

        <meta content="" name="author" />



        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>



        <head>
            <?php $this->load->view('common/header_styles'); ?>
 <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
            <!-- END OPTIONAL LAYOUT STYLES -->
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
           <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/module/tags/css/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- END OPTIONAL LAYOUT STYLES -->
            <style type="text/css">
              .select2{
                width: 100% !important;
              }
              .enable-login-div
              {
                display: inline-flex;
              }
              .asterix-error
              {
                color:red;
              }
              .errormesssage
               {
                   color:#f11414;
               }
            </style>
        </head>



        <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

            <?php $this->load->view('common/header'); ?>

            <!-- OPTIONAL LAYOUT STYLES -->

            <div class="clearfix"> </div>

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

                                            <span class="caption-subject bold">People tags : <?php echo $tgs_name ?></span>
                                            <div class="btn-group">



                                           </div>

                                        </div>

                                        <div class="tools"> </div>

                                    </div>

                                <div class="portlet-body">
                                  <div class="form-group col-md-4">
                                    <select name="ppl_tgs_id" id="ppl_tgs_id" class="form-control tags-select2" multiple="" >
                                      <option value="<?php echo $tgs_id ?>" selected ><?php echo $tgs_name ?></option>
                                    </select>
                                  </div>

                                  <div class="btn-group">
                                    <button type="button" name="button" class="form-control btn btn_save btn-add-new" onclick="pplTagsList()" id="getList">Search</button>
                                  </div>
                                    <table class="table table-striped table-bordered table-hover table-list" id="pplTagsList">

                                        <thead>

                                            <tr>

                                              <th><i class="fa fa-user list-level"></i>Name</th>
                                              <th><i class="fas fa-envelope list-level"></i>Email</th>
                                              <th><i class="fas fa-mobile-alt list-level"></i>Mobile</th>
                                              <th><i class="fas fa-calendar-alt list-level"> Met on</th>
                                              <th><i class="fas fa-cog list-level"></i>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <!-- <tr>

                                                <td>1</td>

                                                <td> Customised Software </td>

                                                <td> 30,000 </td>

                                                <td> Under Review </td>

                                                <td> <a class="" href="#" data-toggle="modal" data-target="#estimateAddModal">Edit</a> </td>

                                            </tr> -->



                                        </tbody>

                                    </table>

                                </div>

                            </div>

                                <!-- MAIN CONTENTS END HERE- -->

                    </div>

                    <!-- END CONTENT BODY -->

                </div>



                <!-- END CONTENT -->


            <!-- END CONTAINER -->

            <div class="js-scripts">

      <?php $this->load->view('common/footer_scripts'); ?>
  <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript">
      </script>

      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/module/tags/js/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- <script src="<?php //echo base_url(); ?>assets/module/tags/js/form-validation/people-tag.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> -->
      <!-- OPTIONAL SCRIPTS -->
      <!-- <script src="<?php //echo base_url();?>assets/setting/js/setting-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> -->
      <!-- END OPTIONAL SCRIPTS -->

      <script type="text/javascript">
      $(document).ready(function(){
        pplTagsList();
      })
      function pplTagsList()
      {
         var tgs_id = $("#ppl_tgs_id").val();
         var customDataTableElement = '#pplTagsList';
         $(customDataTableElement).DataTable().destroy();
         var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
         var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
         var customDataTableUrl     =  baseUrl + 'tag-type-getlist-people?table_data_count='+customDataTableCount+'&tgs_id='+tgs_id;
         var customDataTableColumns = [
         {   'data'  : 'ppl_name',
           'render': function(data, type, row, meta)
           {
             var link = row.ppl_name;

             if(row.private_access == 0)
               return link;

             <?php if($detail_access) { ?>
                 link = `<a href="`+baseUrl+`people-details-`+row.ppl_id_encrypt+`" title="View Detail">
                         `+row.ppl_name+`</a>&nbsp;  `;
             <?php }?>
           return link;
           }
         },
         {   'data'  : 'ppl_email' },
         {   'data'  : 'ppl_mob' },
         {   'data'  : 'ppl_met_on_dt' },
         {   'data'  : 'ppl_name' ,
           'render': function(data, type, row, meta)
           {


             var link = '';

             if(row.private_access == 0)
               return "<?php echo FORM_INACCESS_MESSAGE; ?>";

             <?php if($edit_access) { ?>
               link += `<a href="`+baseUrl+`people-edit-`+row.ppl_id_encrypt+`" title="Edit People ">
                       <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
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

        <!-- Modal -->

</html>
<!-- <a onclick="deleteUser('`+row.tgs_id+`')" title="Delete Details ">
<i class="fa fa-trash" aria-hidden="true"></i></a> -->
