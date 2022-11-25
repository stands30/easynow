

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
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
           <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/module/tags/css/sweetalert.css" rel="stylesheet" type="text/css" />
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

                                    <!-- MAIN CONTENTS START HERE -->

                                  <div class="portlet light bordered">

                                    <div class="portlet-title">

                                        <div class="caption font-dark">

                                            <!-- <i class="icon-settings font-dark"></i> -->

                                            <span class="caption-subject bold">People tags</span>

                                            <div class="btn-group">

                                                <a role="button" id="sample_editable_1_new" href="#" class="btn green btn-success" data-toggle="modal" data-target="#estimateAddModal"> Add New

                                                    <i class="fa fa-plus"></i>

                                                </a>

                                           </div>

                                        </div>

                                        <div class="tools">  </div>

                                    </div>

                                <div class="portlet-body">
                                  

                                    <table class="table table-striped table-bordered table-hover" id="pplTagsList">

                                        <thead>

                                            <tr>

                                             <th> Name  </th>
                                             <th> No. People</th>
                                             <th> No. Company</th>
                                             <th> No. Client</th>
                                             <th> Created date </th>
                                             <th> Created By </th>
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

                <div class="modal fade purchase-modal" id="estimateAddModal" tabindex="-1" role="dialog" aria-labelledby="estimateAddModal"  data-refresh='true'>
                  <div class="modal-dialog modal-dialog-centered modal-placement" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Add Tags</h4>
                        <button type="button" class="close" data-dismiss="modal" id="close_add" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" id="tags_add">

                          <div class="row">

                                  <div class="row">
                                      <div class="form-group col-md-6">
                                          <label>Tag<span style="color:red">*</span></label>
                                          <input type="text" name="tgs_name" id="tgs_name" required class="form-control" placeholder="">
                                      </div>
                                      <div class="col-md-6 form-group">
                                            <label>Status<span style="color:red">*</span></label>
                                            <select id="tgs_status" class="form-control bpn_sts_add" tabindex="-1" aria-hidden="true" required>

                                            </select>
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



                <div class="modal fade purchase-modal" id="estimateEditModal" tabindex="-1" role="dialog" aria-labelledby="estimateEditModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title" id="exampleModalLongTitle">Add Tags</h4>
                        <span class="sp_line color-primary text-center"></span>
                        <button type="button" class="close" data-dismiss="modal" id="close_edit" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body modal-product-add">
                        <div class="row">
                            <form  id="tags_edit">
                                <div class="row">
                                  <input type="hidden" name="tgs_id" id="tgs_id" value="">
                                    <div class="col-md-6">
                                      <div class="form-group col-md-6">
                                          <label>Tag<span style="color:red">*</span></label>
                                          <input type="text" name="tgs_name_e" id="tgs_name_e" required class="form-control" placeholder="">
                                      </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                          <label>Status<span style="color:red">*</span></label>
                                          <select id="tgs_status_e" class="form-control bpn_sts_add" tabindex="-1" aria-hidden="true" required>

                                          </select>
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
       <!-- OPTIONAL SCRIPTS -->
      </script>
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript">
      </script>

      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/module/tags/js/sweetalert.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/tags/js/form-validation/people-tag.js" type="text/javascript"></script>
      <!-- OPTIONAL SCRIPTS -->
      <!-- <script src="<?php //echo base_url();?>assets/setting/js/setting-customs.js" type="text/javascript"></script> -->
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">
      $(document).on("click",".openmodel" , function() {
       var tgs_id     = $(this).data('tgs_id');
       var tgs_name   = $(this).data('tgs_name');
       var tgs_status = $(this).data('tgs_status');
       var status = '';
       $("#tgs_name_e").val(tgs_name);
       $("#tgs_id").val(tgs_id);
       if(tgs_status == 1)
       {
         console.log('here');
         status = 'Active';
       }
       else if(tgs_status == 2)
       {
         status = 'In Active';
       }
       var select2Val = '<option value="'+tgs_status+'">'+status+'</option>';
       $('#tgs_status_e').html(select2Val).trigger('change');

      });
      </script>
      <script type="text/javascript">
      $(document).ready(function(){
        pplTagsList();
      })

      function pplTagsList(tags = '')
      {
        var url = '';
        url     = baseUrl + 'tag-getlist';

              $('#pplTagsList').DataTable().destroy();
              var customDataTableElement = '#pplTagsList';
              var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
              var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
              var customDataTableUrl     =  url+'?table_data_count='+customDataTableCount;
              var customDataTableColumns = [
                {   'data'  : 'tgs_name' },
                {   'data'  : 'tgs_encrypt_id' ,
                  'render': function(data, type, row, meta)
                  {
                      link = `
                              <a  title="Edit Details "  href="`+baseUrl+`tag-people-list-`+row.tgs_encrypt_id+`-`+row.tgs_encrypt_name+`"  >`+row.tgs_ppl_count+`
                              </a>&nbsp;

                            `;
                    return link;
                  }
                },
                {   'data'  : 'tgs_encrypt_id' ,
                  'render': function(data, type, row, meta)
                  {
                      link = `
                              <a  title="Edit Details "  href="`+baseUrl+`tag-company-list-`+row.tgs_encrypt_id+`-`+row.tgs_encrypt_name+`"  >`+row.tgs_cmp_count+`
                              </a>&nbsp;

                            `;
                    return link;
                  }
                },
                {   'data'  : 'tgs_encrypt_id' ,
                  'render': function(data, type, row, meta)
                  {
                      link = `
                              <a  title="Edit Details "  href="`+baseUrl+`tag-company-list-`+row.tgs_encrypt_id+`-`+row.tgs_encrypt_name+`"  >`+row.tgs_cli_count+`
                              </a>&nbsp;

                            `;
                    return link;
                  }
                },
                {   'data'  : 'tgs_crdt_dt' },
                {   'data'  : 'crtd_by' },
                {   'data'  : 'tgs_id' ,
                  'render': function(data, type, row, meta)
                  {
                      link = `
                              <a  title="Edit Details "  href="#" data-toggle="modal" class="openmodel" data-target="#estimateEditModal" data-tgs_id = "`+row.tgs_id+`" data-tgs_name = "`+row.tgs_name+`" data-tgs_status = "`+row.tgs_status+`" >
                              <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
                              <a onclick="deleteUser('`+row.tgs_id+`')" title="Delete Tags ">
                              <i class="fa fa-trash" aria-hidden="true"></i></a>
                            `;
                    return link;
                  }
                }
              ];

              customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);



      }

      function deleteUser(tgs_id)
      {

        swal({
           title:"Delete",
           text:"Are you sure",
           type: "error",
           icon:"error",
           button: true,
        }).then(()=>{
            $.ajax({
                type: "POST",
                url: "peopletag/deleteTags",
                data:{tgs_id:tgs_id},
                dataType:"json",
                success:function(response)
                {
                    pplTagsList();
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
<!-- <a onclick="deleteUser('`+row.tgs_id+`')" title="Delete Details ">
<i class="fa fa-trash" aria-hidden="true"></i></a> -->
