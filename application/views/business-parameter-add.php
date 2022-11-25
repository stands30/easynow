

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
             <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $cache_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.css<?php echo $cache_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $cache_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $cache_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $cache_version; ?>" rel="stylesheet" type="text/css" />
           <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $cache_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/module/bsn-prm/css/sweetalert.css<?php echo $cache_version; ?>" rel="stylesheet" type="text/css" />
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

                                        <span class="caption-subject bold uppercase">Business Parameter</span>

                                        <div class="btn-group">

                                            <a role="button" id="sample_editable_1_new" href="#" class="btn green btn-success" data-toggle="modal" data-target="#estimateAddModal"> Add New

                                                <i class="fa fa-plus"></i>

                                            </a>

                                       </div>

                                    </div>

                                    <div class="tools"> </div>

                                </div>

                                <div class="portlet-body">

                                    <table class="table table-striped table-bordered table-hover" id="bsnPrmList">

                                        <thead>

                                            <tr>


                                             <th> Name  </th>
                                             <th> Value </th>
                                             <th> Status </th>
                                             <th> Action </th>

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

                <div class="modal fade purchase-modal" id="estimateAddModal" tabindex="-1" role="dialog" aria-labelledby="estimateAddModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-placement" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title " id="exampleModalLongTitle">Add Business Parameter</h4>
                        <span class="sp_line color-primary"></span>
                        <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" id="bsn_add">

                          <div class="col-md-12">

                                  <div class="row">
                                      <div class="form-group col-md-6">

                                              <label>Name<span style="color:red">*</span></label>
                                              <input type="text" name="bpm_name" id="bpm_name" required class="form-control" placeholder="">

                                      </div>
                                      <div class="col-md-6 form-group">

                                              <label>Value<span style="color:red">*</span></label>
                                              <input type="text" name="bpm_value" id="bpm_value" class="form-control" placeholder="" required>

                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6 form-group form-md-line-input form-md-floating-label">
                                         <label class="drp-title">Status</label>
                                        <div class="input-icon">
                                           <i class="fa fa-info-circle"></i> 
                                            <select id="bpm_status" class="form-control bpn_sts_add custom-select2" tabindex="-1" aria-hidden="true" required autocomplete="off">
                                              <option value='1'>Active</option>
                                              <option value='2'>InActive</option>
                                            </select>
                                            <label class="custom-label">Please Select Status</label>
                                        </div>
                                      </div>
                                  </div>
                          </div>
                      </div>
                      <div class="modal-footer">

                        <div class="form-group">
                            <input type="button" name="" class="btn btn-can" value="Cancel" data-dismiss="modal">&nbsp;
                            <input type="submit" name="" value="Add" class="btn btn-success">
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- END CONTENT -->

                <!-- <div class="modal fade purchase-modal" id="estimateAddModal" tabindex="-1" role="dialog" aria-labelledby="estimateAddModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title" id="exampleModalLongTitle">Add Business Parameter</h4>
                        <span class="sp_line color-primary text-center"></span>
                        <button type="button" class="close" data-dismiss="modal" id="close_add" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body modal-product-add">
                        <div class="row">
                            <form  id="bsn_add">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name<span style="color:red">*</span></label>
                                            <input type="text" name="bpm_name" id="bpm_name" required class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Value<span style="color:red">*</span></label>
                                            <input type="text" name="bpm_value" id="bpm_value" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Status<span style="color:red">*</span></label>
                                          <select id="bpm_status" class="form-control bpn_sts_add" tabindex="-1" aria-hidden="true" required>
                                            <option value='1'>Active</option>
                                            <option value='2'>InActive</option>
                                          </select>
                                        </div>
                                    </div>
                                </div>

                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="form-group">
                          <button type="button" class="btn" data-dismiss="modal">Cancel&nbsp;
                              <i class="fa fa-times"></i>
                          </button>
                            <button type="submit" class="btn btn_save btn-success">Save&nbsp;
                                <i class="fa fa-check"></i>
                            </button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->

                <!-- End Add model -->

                <div class="modal fade purchase-modal" id="estimateEditModal" tabindex="-1" role="dialog" aria-labelledby="estimateEditModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title" id="exampleModalLongTitle">Add Business Parameter</h4>
                        <span class="sp_line color-primary text-center"></span>
                        <button type="button" class="close" data-dismiss="modal" id="close_edit" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body modal-product-add">
                        <div class="row">
                            <form  id="bsn_edit">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <input type="hidden" name="bpm_id" id="bpm_id" value="">
                                            <label>Name<span style="color:red">*</span></label>
                                            <input type="text" name="bpm_name_e" id="bpm_name_e" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Value<span style="color:red">*</span></label>
                                            <input type="text" name="bpm_value_e" id="bpm_value_e" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 ">
                                       
                                        <div class="form-group form-group form-md-line-input form-md-floating-label">
                                          <label class="drp-title">Status</label>
                                          <div class="input-icon">
                                            <i class="fa fa-info-circle"></i> 
                                              <select id="bpm_status_e" name="bpm_status_e" class="form-control bpn_sts_edit custom-select2" tabindex="-1" aria-hidden="true" autocomplete="off">
                                                <option></option>
                                            <!-- <option value='1'>Active</option>
                                            <option value='2'>InActive</option> -->
                                          </select>  
                                           <label class="custom-label">Please Select Status</label>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                          

                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn" data-dismiss="modal">Cancel&nbsp;
                                <i class="fa fa-times"></i>
                            </button>
                            <button type="submit" class="btn btn_save btn-success">Save&nbsp;
                                <i class="fa fa-check"></i>
                            </button>
                            </form>
                      </div>
                    </div>
                  </div>
                </div>

            </div>

            <!-- END CONTAINER -->

            <div class="js-scripts">

      <?php $this->load->view('common/footer_scripts'); ?>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $cache_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js<?php echo $cache_version; ?>" type="text/javascript">

      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $cache_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $cache_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/module/bsn-prm/js/sweetalert.min.js<?php echo $cache_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/bsn-prm/js/form-validation/bsn_prm.js<?php echo $cache_version; ?>" type="text/javascript"></script>
      <!-- OPTIONAL SCRIPTS -->
      <!-- <script src="<?php echo base_url();?>assets/setting/js/setting-customs.js<?php echo $cache_version; ?>" type="text/javascript"></script> -->
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">
      $(document).on("click",".openmodel" , function() {
       var bpm_id   = $(this).data('bpm_id');
       var bpm_name   = $(this).data('bpm_name');
       var bpm_status  = $(this).data('bpm_status');
       var bpm_value  = $(this).data('bpm_value');
       var status = '';

       $("#bpm_value_e").val(bpm_value);
       $("#bpm_name_e").val(bpm_name);
       $("#bpm_id").val(bpm_id);
       if(bpm_status == 1)
       {
         console.log('here');
         status = 'Active';
       }
       else if(bpm_status == 2)
       {
         status = 'InActive';

       }
       var select2Val = '<option value="'+bpm_status+'">'+status+'</option>';
       $('#bpm_status_e').html(select2Val).trigger('change');

      });
      </script>
      <script type="text/javascript">
      $(document).ready(function(){
        getBusParamList();
      })

      function getBusParamList()
      {
        $('#bsnPrmList').DataTable().destroy();
        $('#bsnPrmList').dataTable({

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
           'ajax'      : baseUrl + 'bsn-getlist',
           'columns'   : [
             {   'data'  : 'bpm_name' },
             {   'data'  : 'bpm_value' },
             {   'data'  : 'bpm_status_name' },
             {   'data'  : 'bpm_id' ,
               'render': function(data, type, row, meta)
               {
                 if(type === 'display'){
                   link = `
                           <a  title="Edit Details "  href="#" data-toggle="modal" class="openmodel" data-target="#estimateEditModal" data-bpm_id = "`+row.bpm_id+`" data-bpm_name = "`+row.bpm_name+`" data-bpm_status = "`+row.bpm_status+`" data-bpm_value = "`+row.bpm_value+`" >
                           <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
                           <a onclick="deleteUser('`+row.bpm_id+`')" title="Delete Details ">
                           <i class="fa fa-trash" aria-hidden="true"></i></a>
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
               // { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
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

      }

      function deleteUser(bpm_id)
      {

        swal({
           title:"Delete",
           text:"Are you sure",
           type: "error",
           icon:"error",
           button: true,
        },function(){
            $.ajax({
                type: "POST",
                url: "businessParam/deleteBsnParam",
                data:{bpm_id:bpm_id},
                dataType:"json",
                success:function(response)
                {
                    getBusParamList();
                }
                });
              }
           );

      }
      </script>

            </div>

        </body>

        <!-- Modal -->

</html>
<!-- <a onclick="deleteUser('`+row.bpm_id+`')" title="Delete Details ">
<i class="fa fa-trash" aria-hidden="true"></i></a> -->
