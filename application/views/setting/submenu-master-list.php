<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <meta content="" name="description" />

        <meta content="" name="author" />

        <title>
            <?php echo $title.' | '.TITLE_POSTFIX; ?>
        </title>
 <!-- OPTIONAL LAYOUT STYLES -->
             <!-- END OPTIONAL LAYOUT STYLES -->
             <?php $this->load->view('common/header_styles'); ?>
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />


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

                                    <span class="caption-subject bold">Sub Menu Master List</span> &nbsp;

                                    <div class="btn-group">

                                        <a id="sample_editable_1_new" href="<?php echo base_url('submenu-master-add'); ?>" class="btn green"> Add New

                                                    <i class="fa fa-plus"></i>

                                                </a>

                                    </div>

                                </div>

                                <div class="tools"> </div>

                            </div>

                            <div class="portlet-body">

                                <table class="table table-striped table-bordered table-hover" id="sub_mnu_list">

                                    <thead>

                                        <tr>
                                            <th>Menu</th>

                                            <th>Sub menu name</th>

                                            <th>Name</th>

                                            <th>Link</th>

                                            <th>Icon</th>

                                            <th>Order</th>

                                            <th>Status</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>



                                    </tbody>

                                </table>

                            </div>

                        </div>

                        <!-- -----MAIN CONTENTS END HERE----- -->

                    </div>

                    <!-- END CONTENT BODY -->

                </div>

                <!-- END CONTENT -->

        </div>

        <!-- END CONTAINER -->

        <div class="js-scripts">

            <?php $this->load->view('common/footer_scripts'); ?>

                <!-- OPTIONAL SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $cacheversion; ?>" type="text/javascript">
            </script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js<?php echo $cacheversion; ?>" type="text/javascript">
            </script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js<?php echo $cacheversion; ?>" type="text/javascript">
            </script>
                <!-- END OPTIONAL SCRIPTS -->

        <script type="text/javascript">
            $(document).ready(function(){
              getSubMnuParamList();
            })

            function getSubMnuParamList()
            {
              $('#sub_mnu_list').DataTable().destroy();
              $('#sub_mnu_list').dataTable({

                 // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                 "language": {
                     "aria": {
                         "sortAscending": ": activate to sort column ascending",
                         "sortDescending": ": activate to sort column descending"
                     },
                     "emptyTable": "No data available in table",
                     "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                     "infoEmpty": "No entries found",
                     "infoFiltered": "(filtered1 from _MAX_ total entries)",
                     "lengthMenu": "_MENU_ entries",
                     "search": "Search:",
                     "zeroRecords": "No matching records found"
                 },

                 // Or you can use remote translation file
                 //"language": {
                 //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
                 //},
                 'ajax'      : baseUrl + 'submnu-getlist',
                 'columns'   : [
                   {   'data'  : 'mnu_name'  ,
                     'render': function(data, type, row, meta)
                     {
                        return `
                           <a title="Details"  href="`+baseUrl+`submenu-master-detail-`+row.sbm_encrypt_id+`" >`+row.mnu_name+`</a>
                        `;
                     }
                   },
                   {   'data'  : 'submnu_name' },
                   {   'data'  : 'sbm_name' },
                   {   'data'  : 'sbm_link' ,
                     'render': function(data, type, row, meta)
                     {
                        return `
                           <a title="Details"  href="`+baseUrl+row.sbm_link+`" >`+row.sbm_link+`</a>
                        `;
                     }
                   },
                   {   'data'  : 'sbm_icon' ,
                     'render': function(data, type, row, meta)
                     {
                        return row.sbm_icon + `
                           &nbsp <i class="fa fa-`+row.sbm_icon+`"></i>
                        `;
                     }
                   },
                   {   'data'  : 'sbm_order' },
                   {   'data'  : 'sbm_status_name' },
                   {   'data'  : 'sbm_encrypt_id' ,
                     'render': function(data, type, row, meta)
                     {
                       if(type === 'display'){
                         link = `
                             <a href="`+baseUrl+`submenu-master-edit-`+row.sbm_encrypt_id+`" title="Edit Details ">
                             <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
                           `;
                       }
                       return link;
                     }
                   }
                 ],
                 buttons: [
                  { extend: 'print', className: 'btn dark btn-outline' },
                  { extend: 'copy', className: 'btn red btn-outline' },
                  { extend: 'excel', className: 'btn yellow btn-outline ' },
                  { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                ],
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
             });
           }
        </script>

        </div>

</body>

</html>
