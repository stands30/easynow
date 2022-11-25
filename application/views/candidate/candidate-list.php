

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
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
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



                                  <div class="portlet light bordered">

                                <div class="portlet-title">

                                    <div class="caption font-dark">

                                        <!-- <i class="icon-settings font-dark"></i> -->

                                        <span class="caption-subject bold">Candidate List</span> &nbsp;

                                        <div id="btn-box" class="btn-group">

                                            <a id="sample_editable_1_new" href="<?php echo base_url('candidate-add'); ?>" class="btn green"> Add Candidate
                                                <i class="fa fa-plus"></i>
                                            </a>

                                       </div>

                                    </div>

                                    <div class="tools"> </div>

                                </div>

                                <div class="portlet-body">

                                    <table class="table table-bordered table-list" id="tblcandidatelist">

                                        <thead>

                                            <tr>
                                                <th>Name</th>

                                                <th>Role</th>

                                                <th>Total Exp</th>

                                                <th>Relative Exp</th>

                                                <th>Notice Period</th>

                                                <th>Exp CTC</th>

                                                <th>Curr CTC</th>

                                                <th>Skills</th>

                                                <th>Remark</th>

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
              <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
      </script>
      <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $cacheversion; ?>" type="text/javascript"></script>


                <!-- OPTIONAL SCRIPTS -->

                <!-- END OPTIONAL SCRIPTS -->
            <script type="text/javascript">

                $(document).ready(function(){
                  getCandidateList();
                })


                 function getCandidateList()
                {
                  candidateDataTable = $('#tblcandidatelist').DataTable({
                    'ajax'      : baseUrl + 'candidate-getlist',
                            'columns'   : [
                              {   'data'  : 'cdt_ppl_name' ,
                                'render': function(data, type, row, meta)
                                {
                                  if(type === 'display'){
                                    link = `<a href="`+baseUrl+`people-details-`+row.cdt_ppl_encrypt+`" title="View Detail">
                                            `+row.cdt_ppl_name+`</a>&nbsp;
                                    `;
                                  }
                                  return link;
                                }
                              },
                              {   'data'  : 'cdt_role_name' ,
                                'render': function(data, type, row, meta)
                                {
                                  if(type === 'display'){
                                    link = `<a href="`+baseUrl+`candidate-details-`+row.cdt_id_encrypt+`" title="View Detail">
                                            `+row.cdt_role_name+`</a>&nbsp;
                                    `;
                                  }
                                  return link;
                                }
                              },
                              {   'data'  : 'cdt_total_exp' },
                              {   'data'  : 'cdt_relative_exp' },
                              {   'data'  : 'cdt_notice_period' },
                              {   'data'  : 'cdt_exp_ctc' },
                              {   'data'  : 'cdt_cur_ctc' },
                              {   'data'  : 'cdt_skills' },
                              {   'data'  : 'cdt_remark' },
                              {   'data'  : 'cdt_id' ,
                                'render': function(data, type, row, meta)
                                {
                                  if(type === 'display'){
                                    link = `<a href="`+baseUrl+`candidate-edit-`+row.cdt_id_encrypt+`" title="Edit Candidate ">
                                            <i class="fa fa-edit" aria-hidden="true"></i></a>
                                    `;
                                  }
                                  return link;
                                }
                              }
                            ],
                    buttons: [
                        { extend: 'print', className: 'btn dark btn-outline' },
                        // { extend: 'pdf', className: 'btn green btn-outline' },
                        // { extend: 'csv', className: 'btn purple btn-outline ', text: 'Excel' },
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


            </div>

        </body>

    </html>
