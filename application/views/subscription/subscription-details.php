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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/subscription/subscription-custom.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css">
    <style type="text/css">
        #trans_detail_list_wrapper .dataTables_wrapper .dt-buttons{
            display: none!important;
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
                <div class="page-content-wrapper">
                    <div class="page-content page-content-detail">
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                        </div>
                       <div class="portlet">
                            <div class="row">
                                <div class="container-fluid">
                                     <aside class="profile-info col-md-12">
                                        <section class="panel">
                                          <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                            <header class="panel-heading panel-heading-lead color-primary">
                                                <div class="row detail-box">
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <span class="detail-list-heading">Subscription Details</span>
                                                         <br>
                                                            <div class="col-md-12 no-side-padding inner-row">
                                                                <span class="panel-title">
                                                                    <?php echo (isset($scr_details->cmp_name) ? $scr_details->cmp_name : ''); ?> - <?php echo (isset($scr_details->src_uniquekey) ? $scr_details->src_uniquekey : ''); ?>
                                                                </span>
                                                                <a class="btn-edit" href="#">
                                                                    <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                                </a>
                                                                <?php 
                                                                $encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($scr_details->scr_id);
                                                                 ?>
                                                                
                                                                <a class="btn-edit" href="<?php echo base_url('transaction-add').'?scr_id=' ?>">
                                                                    <i class="fa fa-plus"></i><span class="btn-text"> Add Transaction</span>
                                                                  </a>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                        <span class="created">Created By: <?php echo (isset($scr_details->scr_crdt_by_name) ? $scr_details->scr_crdt_by_name : ''); ?>
                                                        </span>
                                                        <br>
                                                        <span class="sp-date">Created On: <?php echo (isset($scr_details->scr_crdt_dt_format) ? $scr_details->scr_crdt_dt_format : ''); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </header>
                                            <div class="table-responsive" >
                                                <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fas fa-address-card list-level"></i>Customer</td>
                                                            <td><a href="<?php echo base_url('people-details-'.(isset($scr_details->scr_encrypt_client_id) ? $scr_details->scr_encrypt_client_id : '')); ?>"><?php echo (isset($scr_details->cus_name) ? $scr_details->cus_name : ''); ?></a></td>
                                                            <td><i class="fas fa-building list-level"></i> Company</td>
                                                            <td><a href="<?php echo base_url('company-details-'.(isset($scr_details->scr_encrypt_account_id) ? $scr_details->scr_encrypt_account_id : '')); ?>"><?php echo (isset($scr_details->cmp_name) ? $scr_details->cmp_name : ''); ?></a></td>
                                                        </tr>                                                           
                                                        <tr>
                                                            <td><i class="fas fa-globe list-level"></i>Domain</td>
                                                            <td><a href="http://<?php echo (isset($scr_details->scr_domain) ? $scr_details->scr_domain : ''); ?>.easynow.app" target="_blank">http://<?php echo (isset($scr_details->scr_domain) ? $scr_details->scr_domain : ''); ?>.easynow.app</a></td>
                                                            <td><i class="fas fa-list-ul list-level"></i> Unique</td>
                                                            <td>S0001</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-database list-level"></i> Database</td>
                                                            <td><?php echo (isset($scr_details->scr_database) ? $scr_details->scr_database : ''); ?></td>
                                                            <td><i class="fas fa-info-circle list-level"></i> Status</td>
                                                            <td>
                                                                <a href="javascript:;" id="scr_status" class="subscription-status-editable" data-type="select2" data-pk="<?php echo $scr_details->scr_id; ?>" data-placement="top" data-placeholder="Please Select Status" data-original-title="Select Status" data-custom_select2_id="<?php echo $scr_details->scr_status; ?>" data-custom_select2_name="<?php echo $scr_details->scr_status_name; ?>"  data-gnp-grp="scr_status"><?php if(isset($scr_details->scr_status_name)) echo $scr_details->scr_status_name; ?> </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>                                     
                                        </section>                                        
                                    </aside>

                                    <aside class="profile-info col-md-12 mb-20 ">
                                        <section class="profile-sub">
                                            <div class="portlet light table-bordered bordered">
                                                <header class="">
                                                    <div class="detail-box mb-10">
                                                      <div>
                                                        <span class="panel-title">Transaction Details</span> 
                                                      </div>
                                                    </div>
                                                </header>

                                                <table class="table table-striped table-bordered table-list table-list-detail-custom" id="trans_detail_list">
                                                    <thead>
                                                        <tr>
                                                            <th>Subscription Id</th>
                                                            <th>Plan</th>
                                                            <th>User</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

<?php
                                                        foreach ($scr_trn_details as $scr_trn) 
                                                        {
?>
                                                            <tr>
                                                                <td><a href="#"><?php echo (isset($scr_trn->str_code) ? $scr_trn->str_code : ''); ?></a></td>
                                                                <td><?php echo (isset($scr_trn->str_pln_name) ? $scr_trn->str_pln_name : ''); ?></td>
                                                                <td><?php echo (isset($scr_trn->str_users) ? $scr_trn->str_users : ''); ?></td>
                                                                <td><?php echo (isset($scr_trn->str_start_date) ? $scr_trn->str_start_date : ''); ?></td>
                                                                <td><?php echo (isset($scr_trn->str_end_date) ? $scr_trn->str_end_date : ''); ?></td>
                                                                <td><?php echo (isset($scr_trn->str_price) ? $scr_trn->str_price : ''); ?></td>
                                                            </tr>
<?php
                                                        }
?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </aside>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

            <script type="text/javascript">
                $(document).ready(function()
                {
                    var primary_key     = 'scr_id';
                    var updateUrl       = baseUrl + 'subscription/updateSubscriptionCustomData';
                    
                    var editableElement = '.subscription-status-editable';
                    var select2Class    = 'scr_status';
                    var dropdownUrl     = 'subscription/getStatusforDropdown/';
                    newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                    // getList();
                        $('.page-content-white').addClass('page-custom-datatable');
                        $('.btn-group').addClass('btn-group-right');
                        $('.btn.green').addClass('btn-add-new');

                        $('#trans_detail_list').dataTable({
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
                            

                            buttons: [
                                { extend: 'print', className: 'btn dark btn-outline' },
                                { extend: 'copy', className: 'btn red btn-outline' },
                                // { extend: 'pdf', className: 'btn green btn-outline' },
                                { extend: 'excel', className: 'btn yellow btn-outline ' },
                                // { extend: 'csv', className: 'btn purple btn-outline ' },
                                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                            ],

                            // setup responsive extension: http://datatables.net/extensions/responsive/
                            responsive: false,

                            //"ordering": false, disable column ordering
                            //"paging": false, disable pagination
                            "order": [

                            ],

                            "scrollY": true,
                            "scrollX": true,

                            "lengthMenu": [
                                [100,200,-1],
                                [100,200,"All"] // change per page values here
                            ],
                            // set the initial value
                            "pageLength": 100,
                            "dom": "<'row'<'col-lg-5 col-md-6 col-sm-12'><'col-lg-7 col-md-6 col-sm-12'fB>r><'table-scrollable't><'row'<'col-md-7 col-sm-12'il><'col-md-5 col-sm-12'p>>", // horizobtal scrollable datatable


                            // "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

                            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/project/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
                            // So when dropdowns used the scrollable div should be removed.
                            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
                        });

                   
                });
            </script>
        </div>

</body>

</html>