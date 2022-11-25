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
            <link href="<?php echo base_url();?>assets/project/global/plugins/datatables/datatables.min. ="stylesheet" type="text/css" />
            <link href="<?php echo base_url();?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap. rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min. rel="stylesheet" type="text/css" />
            <!-- OPTIONAL LAYOUT STYLES -->
         
            <!-- END OPTIONAL LAYOUT STYLES -->  
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

                                        <span class="caption-subject bold uppercase">Invoice List</span> &nbsp;

                                        <div id="btn-box" class="btn-group">

                                            <a id="sample_editable_1_new" href="<?php echo base_url('invoice-add'); ?>" class="btn green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </a>

                                       </div>

                                    </div>

                                    <div class="tools"> </div>

                                </div>

                                <div class="portlet-body">

                                    <table class="table table-striped table-bordered table-hover table-custom table-quot" id="sample_1">

                                        <thead>

                                            <tr>
                                                <th><i class="fas fa-user list-level"></i>Customer Name </th>

                                                <th><i class="fas fa-th-list list-level"></i> Title</th>                                                

                                                <th><i class="fas fa-list-ol list-level"></i>Quotation No.</th>

                                                <th><i class="fas fa-calendar-alt list-level"></i> Quotation Date</th>

                                                <th><i class="fas fa-rupee-sign list-level"></i> Amount </th>

                                                <th><i class="fas fa-calendar-alt list-level"></i> Approval Date</th>

                                                <th><i class="fas fa-calendar-alt list-level"></i> Created On </th>

                                                <th><i class="fas fa-info-circle list-level"></i> Approval Status </th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <tr>
                                                <td><a href="<?php echo base_url().'invoice-details'; ?>"> Manit Singh</a></td>

                                                <td> Marketing Quotation</td>

                                                <td> Nex1010 </td>

                                                <td> 12/07/2018 </td>

                                                <td> 5000 </td>

                                                <td> 15/07/2018 </td>

                                                <td> 15/07/2018 </td>

                                                <td><a target = "_blank" href="<?php echo base_url().'invoice-printable-form'; ?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true" title="Approved"></i>&nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true" title="Not Approved"></i></td>

                                            </tr>

                                            <tr>
                                                <td><a href="<?php echo base_url().'invoice-details'; ?>"> Manit Singh</a></td>

                                                <td> Marketing Quotation</td>

                                                <td> Nex1010 </td>

                                                <td> 12/07/2018 </td>

                                                <td> 5000 </td>

                                                <td> 15/07/2018 </td>

                                                <td> 15/07/2018 </td>

                                                <td><a target = "_blank" href="<?php echo base_url().'invoice-printable-form'; ?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true" title="Approved"></i>&nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true" title="Not Approved"></i></td>

                                            </tr>

                                            <tr>
                                                <td><a href="<?php echo base_url().'invoice-details'; ?>"> Manit Singh</a></td>

                                                <td> Marketing Quotation</td>

                                                <td> Nex1010 </td>

                                                <td> 12/07/2018 </td>

                                                <td> 5000 </td>

                                                <td> 15/07/2018 </td>

                                                <td> 15/07/2018 </td>

                                                <td><a target = "_blank" href="<?php echo base_url().'invoice-printable-form'; ?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true" title="Approved"></i>&nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true" title="Not Approved"></i></td>

                                            </tr>

                                            <tr>
                                                <td><a href="<?php echo base_url().'invoice-details'; ?>"> Manit Singh</a></td>

                                                <td> Marketing Quotation</td>

                                                <td> Nex1010 </td>

                                                <td> 12/07/2018 </td>

                                                <td> 5000 </td>

                                                <td> 15/07/2018 </td>

                                                <td> 15/07/2018 </td>

                                                <td><a target = "_blank" href="<?php echo base_url().'invoice-printable-form'; ?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true" title="Approved"></i>&nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true" title="Not Approved"></i></td>

                                            </tr>

                                            <tr>
                                                <td><a href="<?php echo base_url().'invoice-details'; ?>"> Manit Singh</a></td>

                                                <td> Marketing Quotation</td>

                                                <td> Nex1010 </td>

                                                <td> 12/07/2018 </td>

                                                <td> 5000 </td>

                                                <td> 15/07/2018 </td>

                                                <td> 15/07/2018 </td>

                                                <td><a target = "_blank" href="<?php echo base_url().'invoice-printable-form'; ?>"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true" title="Approved"></i>&nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true" title="Not Approved"></i></td>

                                            </tr>

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
                <script src="<?php echo base_url();?>assets/project/global/scripts/datatable.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/project/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/project/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
      <!-- OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url();?>assets/module/finance/js/finance-customs.js" type="text/javascript"></script>
      <!-- OPTIONAL SCRIPTS -->
      <!-- END OPTIONAL SCRIPTS -->
       <script type="text/javascript">
        var table = $('.people-list');
 var oTable = table.dataTable({

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
            'ajax'      : baseUrl + 'getpeoplelist',
            'columns'   : [
              {   'data'  : 'ppl_name' },
              {   'data'  : 'ppl_email' },
              {   'data'  : 'ppl_mob' },
              {   'data'  : 'ppl_area' },
              {   'data'  : 'ppl_met_on_dt' },
              {   'data'  : 'ppl_id' ,
                'render': function(data, type, row, meta)
                {
                  if(type === 'display'){
                    link = `<a href="`+baseUrl+`people-details-`+row.ppl_id+`" title="View Detail">
                            <i style="font-size: 18px; color:#115370;" class="fa fa-book" aria-hidden="true"></i></a>&nbsp;
                            <a href="`+baseUrl+`people-edit-`+row.ppl_id+`" title="Edit Details ">
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
                { extend: 'pdf', className: 'btn green btn-outline' },
                { extend: 'excel', className: 'btn yellow btn-outline ' },
                { extend: 'csv', className: 'btn purple btn-outline ' },
                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,

            //"ordering": false, disable column ordering 
            //"paging": false, disable pagination

            "order": [
                
            ],
            
            "lengthMenu": [
                [100,200,-1],
                [100,200,"All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 100,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        });

      </script>

            </div>

        </body>

    </html>