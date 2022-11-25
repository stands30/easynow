<!--  -->
    <!DOCTYPE html>

    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>

        <head>
            <link rel="shortcut icon" href="favicon.ico" />
            <?php $this->load->view('common/header_styles'); ?>
            <!-- OPTIONAL LAYOUT STYLES -->
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- END OPTIONAL LAYOUT STYLES -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL PLUGINS -->
        </head>

        <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
            <?php $this->load->view('common/header'); ?>
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
                            <?php 
                            echo $breadcrumb; 
                            echo getPrevNextBtn('people-client-detail', $ppl_id); ?>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->
                        <div class="portlet">
                            <div class="row">
                                <!-- END PAGE HEADER-->
                                <div class="container-fluid">

                                    <!-- -----MAIN CONTENTS START HERE----- -->
                                    <?php $this->load->view('people/people_sidebar'); ?>
                                     <div class="col-lg-10 detail-view-list">
                                         <div class="portlet light table-bordered">
                                            <div class="portlet-title">
                                                <div class="caption font-dark">
                                                    <!-- <i class="icon-settings font-dark"></i> -->
                                                    <span class="caption-subject bold">Client List</span> &nbsp;
                                                    <div class="btn-group">
                                                           <!--  <a id="sample_editable_1_new" href="<?php echo base_url('people-add'); ?>" class="btn green"> Add New
                                                                <i class="fa fa-plus"></i>
                                                            </a> -->
                                                     <input type="hidden" id="ppl_id" name="ppl_id" value="<?php echo $ppl_id; ?>">
                                                   </div>
                                                </div>
                                                <div class="tools"> </div>
                                            </div>
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover table-list people-list" id="tblclientlist">
                                                      <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>People Email</th>
                                                            <th>People Mobile</th>
                                                            <th>People Designation</th>
                                                            <th>People Met On</th>
                                                            <th>Website</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>

                                                      </tbody>
                                              </table>
                                            </div>
                                         </div>
                                      </div>

                                    <!-- -----MAIN CONTENTS END HERE----- -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <div class="js-scripts">

                <?php $this->load->view('common/footer_scripts'); ?>

                <!-- OPTIONAL SCRIPTS -->
                <script src="<?php echo base_url(); ?>assets/module/people/js/people-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- END OPTIONAL SCRIPTS -->
                   <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <script type="text/javascript">
                     $(document).ready(function(){
          getclientlist();
        });

         function getclientlist()
        {
            var ppl_id = $('#ppl_id').val();
            var customDataTableElement = '#tblclientlist';
            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
            var customDataTableUrl     =  baseUrl + 'people-client-getlist-'+ppl_id+'?table_data_count='+customDataTableCount;
            var customDataTableColumns = [

                              {   'data'  : 'cmp_name' ,
                                'render': function(data, type, row, meta)
                                {
                                  if(type === 'display'){
                                    link = `<a href="`+baseUrl+`client-details-`+row.cmp_id_encrypt+`" title="View Detail">`+row.cmp_name+`</a>&nbsp
                                    `;
                                  }
                                  return link;
                                }
                              },
                              {   'data'  : 'cpl_email' },
                              {   'data'  : 'cpl_mob' },
                              {   'data'  : 'cpl_designation' },
                              {   'data'  : 'ppl_met_on' },
                              {   'data'  : 'cmp_website',
                                'render': function(data, type, row, meta)
                                {
                                  if(type === 'display'){
                                    link = `<a href="`+row.cmp_website+`" title="View Detail">`+row.cmp_website+`</a>&nbsp
                                    `;
                                  }
                                  return link;
                                } }
                            ];

            customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
        }
                </script>
            </div>
        </body>
    </html>
