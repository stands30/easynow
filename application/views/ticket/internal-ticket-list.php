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

                        <!-- -----MAIN CONTENTS START HERE----- -->

                        <div class="row">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">

                                        <span class="caption-subject bold">Tickets</span>
                                    </div>
                                    <div class="btn-group btn-top">
                                        <a href="<?php echo base_url().'internal-ticket-add'; ?>">
                                            <button id="newlead" class="btn green">
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
                                                    <table class="table table-striped table-bordered table-hover table-custom" id="sample_1">

                                                        <thead>

                                                            <tr>
                                                                <th>No.</th>
                                                                <th> Title</th>                                                            
                                                                <th> Assigned Date </th>

                                                                <th> Status </th>

                                                                <th> Priority </th>
                                                                <th>Ticket Type</th>
                                                            </tr>

                                                        </thead>

                                                        <tbody>

                                                            <tr>
                                                                <td><a href="<?php echo base_url().'internal-ticket-detail'; ?>"> T101263 </a></td>

                                                                <td> Layout design of people's module</td>
                                                                <td> 06-Jun-2018 12:13:PM </td>

                                                                

                                                                

                                                                <td> Open </td>

                                                                <td> <span class="label label-sm label-danger"> High </span> </td>
                                                                <td> New Feature </td>
                                                            </tr>

                                                            <tr>
                                                                <td><a href="<?php echo base_url().'internal-ticket-detail'; ?>"> T101263 </a></td>

                                                                <td> Layout design of people's module</td>
                                                                <td> 06-Jun-2018 12:13:PM </td>

                                                                

                                                                

                                                                <td> Open </td>

                                                                <td> <span class="label label-sm label-danger"> High </span> </td>
                                                                <td> New Feature </td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="<?php echo base_url().'internal-ticket-detail'; ?>"> T101263 </a></td>

                                                                <td> Layout design of people's module</td>
                                                                <td> 06-Jun-2018 12:13:PM </td>

                                                                

                                                                

                                                                <td> Open </td>

                                                                <td> <span class="label label-sm label-danger"> High </span> </td>
                                                                <td> New Feature </td>
                                                            </tr>

                                                            <tr>
                                                                <td><a href="<?php echo base_url().'internal-ticket-detail'; ?>"> T101263 </a></td>

                                                                <td> Layout design of people's module</td>
                                                                <td> 06-Jun-2018 12:13:PM </td>

                                                                

                                                                

                                                                <td> Open </td>

                                                                <td> <span class="label label-sm label-danger"> High </span> </td>
                                                                <td> New Feature </td>
                                                            </tr>

                                                            <tr>
                                                                <td><a href="<?php echo base_url().'internal-ticket-detail'; ?>"> T101263 </a></td>

                                                                <td> Layout design of people's module</td>
                                                                <td> 06-Jun-2018 12:13:PM </td>

                                                                

                                                                

                                                                <td> Open </td>

                                                                <td> <span class="label label-sm label-danger"> High </span> </td>
                                                                <td> New Feature </td>
                                                            </tr>

                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab_5_3">
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover table-custom" id="sample_1">

                                                        <thead>

                                                            <tr>
                                                                <th>No.</th>
                                                                <th> Title</th>                                                            
                                                                <th> Assigned Date </th>

                                                                <th> Status </th>

                                                                <th> Priority </th>
                                                                <th>Ticket Type</th>
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

                <!-- OPTIONAL SCRIPTS -->

                <!-- END OPTIONAL SCRIPTS -->

        </div>

</body>

</html>