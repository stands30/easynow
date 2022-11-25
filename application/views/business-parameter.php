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
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- daterange picker -->
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
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
                          <div class="row">
                            <div class="col-md-6 col-sm-6 mob-breadcrumb">
                              <?php echo $breadcrumb; ?>
                            </div>
                            <div class="col-md-6 col-sm-6 mob-date text-right">
                              <div class="breadcrumb-date">
                              
                                <div class="page-toolbar">
                                  <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change Company List Date Range" data-daterangevaluestart="" data-daterangevalueend="">
                                      <span class="thin uppercase"></span>&nbsp;
                                      <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                  </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-month-srt">2019</a>
                                <a href="#" class="btn btn-primary btn-month-srt">April</a>
                                <a href="#" class="btn btn-primary btn-month-srt">Today</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->
                                <!-- END PAGE HEADER-->
                                    <!-- -----MAIN CONTENTS START HERE----- -->
                                  <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <!-- <i class="icon-settings font-dark"></i> -->
                                        <!-- <span class="caption-subject bold">Business Parameter</span> -->
                                        <span class="list-title-caption caption-subject bold "><i class="fa fa-briefcase sub-icon-color icon-setting"></i><?php  echo $title; ?></span>
                                        <div class="btn-group">
                                          <?php if($add_access) { ?>
                                            <a role="button" id="sample_editable_1_new" href="#" class="btn green btn-success" data-toggle="modal" data-target="#estimateAddModal"> Add New
                                                <i class="fa fa-plus"></i>
                                            </a>
                                          <?php } ?>
                                       </div>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered" id="bsnPrmList">
                                        <thead>
                                              <tr>
                                               <th>Name  </th>
                                               <th>Value </th>
                                               <th>Description </th>
                                               <th>Status </th>
                                               <th>Action </th>
                                              </tr>
                                        </thead>
                                        <tbody>
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
                      <div class="modal-header text-center"></div>
                      <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" id="close_add" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="text-center">
                          <h4 class="modal-title text-center" id="exampleModalLongTitle" style="font-size: 24px">Add Business Parameter</h4>
                          <span class="sp_line color-primary"></span>
                        </div>
                        <form method="POST" enctype="multipart/form-data" id="bsn_add">
                          <div class="col-md-12">
                                  <div class="row">
                                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                                        <div class="input-icon">
                                          <input type="text" name="bpm_name" id="bpm_name" required data-msg="Please enter name" class="form-control" placeholder="">  
                                          <i class="fas fa-briefcase list-level"></i>
                                          <label>Name<span style="color:red">*</span></label>
                                          <div class="help-block"></div>
                                        </div>                                              
                                      </div>
                                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">                                                
                                              <div class="input-icon">
                                                <input type="text" name="bpm_value" id="bpm_value" class="form-control" placeholder="" required data-msg="Please enter value">  
                                                <i class="fas fa-chart-line list-level"></i>
                                                <label>Value<span style="color:red">*</span></label>
                                                
                                              </div>                                              
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                                        
                                            <label class="drp-title">Status</label>
                                            <div class="input-icon">
                                              <i class="fa fa-info-circle"></i> 
                                              <select id="bpm_status" class="form-control bpn_sts_add custom-select2" tabindex="-1" aria-hidden="true" required data-msg="Please select status" autocomplete="off">
                                                <option></option>
                                              <!-- <option value='1'>Active</option>
                                              <option value='2'>InActive</option> -->
                                            </select>
                                            <!-- <label class="custom-label">Please Select Status</label> -->
                                            </div>
                                      </div>
                                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label"> 
                                        
                                            <div class="input-icon input-label-text">
                                              <i class="fa fa-info-circle"></i> 
                                              <textarea class="form-control" id="bpm_desc" name="bpm_desc"></textarea>
                                              <label>Description</label>
                                              
                                              
                                            </div>
                                      </div>
                                  </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <div class="form-group">
                            <input type="button" name="" class="btn grey btn-secondary" value="Cancel" data-dismiss="modal">&nbsp;
                            <input type="submit" name="" value="Save" class="btn green">
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END CONTENT -->
                <!-- End Add model -->
                <div class="modal fade purchase-modal" id="estimateEditModal" tabindex="-1" role="dialog" aria-labelledby="estimateEditModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        
                      </div>
                      <div class="modal-body modal-product-add">
                        <button type="button" class="close" data-dismiss="modal" id="close_edit" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                       <div class="text-center">
                          <h4 class="modal-title" id="exampleModalLongTitle" style="font-size: 24px">Edit Business Parameter</h4>
                        <span class="sp_line color-primary text-center"></span>
                       </div>
                        <div class="row">
                            <form  id="bsn_edit">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input form-md-floating-label"> 
                                          <div class="input-icon">
                                             <i class="fas fa-briefcase list-level"></i>
                                            <input type="hidden" name="bpm_id" id="bpm_id" value="">            
                                            <input type="text" name="bpm_name_e" id="bpm_name_e" class="form-control edited" >  
                                            <label>Name</label>
                                            
                                          </div>                                          
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input form-md-floating-label"> 
                                          <div class="input-icon">  
                                            <i class="fas fa-chart-line list-level"></i>                                          
                                            <input type="text" name="bpm_value_e" id="bpm_value_e" class="form-control edited" placeholder="">
                                            <label>Value</label>
                                            
                                          </div>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group form-md-line-input form-md-floating-label"> 
                                        
                                              <label class="drp-title">Status</label>
                                            <div class="input-icon">
                                              <i class="fa fa-info-circle"></i> 
                                              <select id="bpm_status_e" class="form-control bpn_sts_edit custom-select2" tabindex="-1" aria-hidden="true" required autocomplete="off">
                                              <option value='1'>Active</option>
                                              <option value='2'>InActive</option>
                                            </select>
                                             <!-- <label class="custom-label">Please Select Status</label> -->
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                          <div class="input-icon input-label-text">
                                            <i class="fa fa-info-circle"></i> 
                                            <textarea class="form-control" id="bpm_desc_e" name="bpm_desc_e"></textarea>
                                            <label>Description</label>
                                          </div>
                                        </div>
                                      </div>
                                      
                                  </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="form-group">
                          <input type="button" name="" class="btn btn-can btn grey btn-secondary" value="Cancel" data-dismiss="modal">&nbsp;
                          <input type="submit" name="" value="Update" class="btn btn-success btn green">
                            </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- END CONTAINER -->
            <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
       <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/bsn-prm/js/form-validation/bsn_prm.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
      <!-- Daterange Picker -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

      <!-- OPTIONAL SCRIPTS -->
      <!-- <script src="<?php echo base_url();?>assets/setting/js/setting-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> -->
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">
      $(document).on("click",".openmodel" , function() {
       var bpm_id   = $(this).data('bpm_id');
       var bpm_name   = $(this).data('bpm_name');
       var bpm_status  = $(this).data('bpm_status');
       var bpm_value  = $(this).data('bpm_value');
       var bpm_desc  = $(this).data('bpm_desc');
       var status = '';
       $("#bpm_value_e").val(bpm_value);
       $("#bpm_desc_e").html(bpm_desc);
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
        $('#bpm_desc_e').addClass('edited');
        
      })
      function getBusParamList()
      {
        $('#bsnPrmList').DataTable().destroy();
        var customDataTableElement = '#bsnPrmList';
        var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
        var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
        var customDataTableUrl     =  baseUrl + 'bsn-getlist?table_data_count='+customDataTableCount;
        var customDataTableColumns = [
          {   'data'  : 'bpm_name' },
          {   'data'  : 'bpm_value' },
          {   'data'  : 'bpm_desc' },
          {   'data'  : 'bpm_status_name' },
          {   'data'  : 'bpm_id' ,
            'render': function(data, type, row, meta)
            {
              
              var link = '';
              if(row.private_access == 0)
                return "<?php echo FORM_INACCESS_MESSAGE; ?>";
              <?php if($edit_access) { ?>
                link += '<a  title="Edit Details "  href="#" data-toggle="modal" class="openmodel datatable-links edit" data-target="#estimateEditModal" data-bpm_id = "'+row.bpm_id+'" data-bpm_name = "'+row.bpm_name+'" data-bpm_status = "'+row.bpm_status+'" data-bpm_value = "'+row.bpm_value+'" data-bpm_desc = "'+row.bpm_desc+'"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;';
              <?php }?>
              <?php if($delete_access) { ?>
                link += '<a onclick="deleteUser('+row.bpm_id+')" title="Delete Details " class="datatable-links delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
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
      function deleteUser(bpm_id)
          {
             swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                  },
                  function(isConfirm) {
                    if (isConfirm) 
                    {
                      data={
                          bpm_id:bpm_id
                      },
                     $.ajax({
                          type:"POST",
                          dataType:"JSON",
                          data:data,
                          url:baseUrl+"businessParam/deleteBsnParam",
                          success:function(response)
                          {
                            responsemsg(response, function(){
                              getBusParamList();
                            })
                            
                          }
                      });
                    } else {
                      swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                  });
          }
      </script>
            </div>
        </body>
        <!-- Modal -->
</html>
<!-- <a onclick="deleteUser('`+row.bpm_id+`')" title="Delete Details ">
<i class="fa fa-trash" aria-hidden="true"></i></a> -->
