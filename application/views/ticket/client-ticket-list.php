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
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/module/ticket/css/ticket.css" rel="stylesheet" type="text/css" />
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

    <?php $this->load->view('common/header'); ?>

        <!-- OPTIONAL LAYOUT STYLES -->

        <!-- END OPTIONAL LAYOUT STYLES -->

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

                        <!-- MAIN CONTENTS START HERE -->

                        <div class="row">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">

                                        <span class="caption-subject bold">Tickets</span>
                                    </div>
                                    <div class="btn-group btn-top">
                                        <a href="<?php echo base_url().'ticket-add'; ?>">
                                            <button id="newticket" class="btn green">
                                                Add New <i class="fa fa-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tabbable-custom">
                                        <ul class="nav nav-tabs tabs-ticket">
                                            <li class="active">
                                                <a href="#tab_5_1" data-toggle="tab" aria-expanded="true"><span class="desktop"> My Tickets </span><span class="mobile"><i class="fa fa-tasks fa-2x"></i>My</span></a>
                                            </li>
                                            <li class="">
                                                <a href="#tab_5_3" data-toggle="tab" aria-expanded="false"><span class="desktop"> Assign Tickets By Me</span><span class="mobile"><i class="fa fa-user fa-2x"></i>Me</span></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_5_1">
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover table-custom" id="tblticketlist">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th> No. </th> -->
                                                                <th> Title </th>
                                                                <th> Client Vendor </th>
                                                                <th> Assigned Date </th>
                                                                <th> Status </th>
                                                                <th> Priority </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab_5_3">
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover table-custom" id="tblticketbymelist">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th> No. </th> -->
                                                                <th> Title </th>
                                                                <th> Client Vendor </th>
                                                                <th> Assigned Date </th>
                                                                <th> Status </th>
                                                                <th> Priority </th>
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

                        <!-- -----MAIN CONTENTS END HERE----- -->

                    </div>

                    <!-- END CONTENT BODY -->

                </div>

                <!-- END CONTENT -->

        </div>

        <!-- END CONTAINER -->

        <div class="js-scripts">

            <?php $this->load->view('common/footer_scripts'); ?>
                <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>

                <script type="text/javascript">
                    
                    $(document).ready(function(){
                      getTicketList();          
                      getTicketByMeList();          
                    })

                    function getTicketList()
                    {
                      ticketDataTable = $('#tblticketlist').DataTable({
                        'ajax'      : baseUrl + 'ticket-getlist',
                        'columns'   : [
                          /*{   'data'  : 'tck_no' ,
                            'render': function(data, type, row, meta)
                            {
                              if(type === 'display'){
                                link = '<a href="ticket-detail-'+row.tck_id_encrypt+'" >' + data + '</a>';
                              }
                              return link;
                            }
                          },*/
                          {   'data'  : 'tck_title' ,
                            'render': function(data, type, row, meta)
                            {
                              if(type === 'display'){
                                link = '<a href="ticket-detail-'+row.tck_id_encrypt+'" >' + data + '</a>';
                              }
                              return link;
                            }
                          },
                          {   'data'  : 'tck_client_id_name' },
                          {   'data'  : 'tck_datetime_format' },
                          {   'data'  : 'tck_progress_status_name'} ,
                          {   'data'  : 'tck_priority_name' }
                        ],
                        buttons: [
                            { extend: 'print', className: 'btn dark btn-outline' },
                            { extend: 'pdf', className: 'btn green btn-outline' },
                            { extend: 'csv', className: 'btn purple btn-outline ', text: 'Excel' },
                            { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                        ],
                        "order": [
                            [0, 'asc']
                        ],
                        "lengthMenu": [
                            [100,200,-1],
                            [100,200,"All"] // change per page values here
                        ],
                        "pageLength": 100,

                        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                      });
                    }

                    function getTicketByMeList()
                    {
                      ticketbymeDataTable = $('#tblticketbymelist').DataTable({
                        'ajax'      : baseUrl + 'ticket-getlistbyme',
                        'columns'   : [
                          /*{   'data'  : 'tck_no' ,
                            'render': function(data, type, row, meta)
                            {
                              if(type === 'display'){
                                link = '<a href="ticket-detail-'+row.tck_id_encrypt+'" >' + data + '</a>';
                              }
                              return link;
                            }
                          },*/
                          {   'data'  : 'tck_title' ,
                            'render': function(data, type, row, meta)
                            {
                              if(type === 'display'){
                                link = '<a href="ticket-detail-'+row.tck_id_encrypt+'" >' + data + '</a>';
                              }
                              return link;
                            }
                          },
                          {   'data'  : 'tck_client_id_name' },
                          {   'data'  : 'tck_datetime_format' },
                          {   'data'  : 'tck_progress_status_name'} ,
                          {   'data'  : 'tck_priority_name' }
                        ],
                        buttons: [
                            { extend: 'print', className: 'btn dark btn-outline' },
                            { extend: 'pdf', className: 'btn green btn-outline' },
                            { extend: 'csv', className: 'btn purple btn-outline ', text: 'Excel' },
                            { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                        ],
                        "order": [
                            [0, 'asc']
                        ],
                        "lengthMenu": [
                            [100,200,-1],
                            [100,200,"All"] // change per page values here
                        ],
                        "pageLength": 100,

                        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                      });
                    }

                </script>

                <!-- OPTIONAL SCRIPTS -->

                <!-- END OPTIONAL SCRIPTS -->

        </div>

    </body>

</html>
