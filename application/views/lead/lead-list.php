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
    <!-- OPTIONAL LAYOUT STYLES -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <!-- daterange picker -->
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/lead/css/lead-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
    <div class="clearfix">
    </div>
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
                    <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change Lead List Date Range" data-daterangevaluestart="" data-daterangevalueend="">
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
          <!-- MAIN CONTENTS START HERE -->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <!-- <i class="icon-settings font-dark"></i> -->
                <span class="list-title-caption caption-subject bold "><i class="fas fa-chalkboard-teacher icon-lead"></i><?php  echo $title; ?></span>
                <div class="btn-group">
                  <a id="sample_editable_1_new" href="<?php echo base_url('lead-add'); ?>" class="btn green"> Add New
                    <i class="fa fa-plus">
                    </i>
                  </a>
                </div>
              </div>
              <div class="tools">
              </div>
            </div>
            <div class="portlet-body">
              <table id="tblleadlist" class="table table-bordered table-list">
                <thead>
                  <tr>
                    <th>Lead Name</th>
                    <th>People Name</th>
                    <th>Amount</th>
                    <th>Managed By</th>
                    <th>Stage</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!-- -----MAIN CONTENTS END HERE----- -->
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <div class="modal fade" id="followModal" tabindex="-1" role="dialog" aria-labelledby="followModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close followup-lead-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <h3 class="modal-title text-center">Follow Up Transaction Form
              </h3>
              <span class="sp_line color-primary">
              </span>
            </div>
            <form method="POST" action="" class="follow-modal-form" id="follow_up_form">
              <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                <input type="hidden" name="lfp_id" id="lfp_id" value="" />
                <input type="hidden" name="old_lfp_id" id="renew_old_lfp_id" value="" />
                <input type="hidden" name="old_lfp_type" id="renew_old_lfp_type" value="" />
                <input type="hidden" name="lfp_module_type_id" id="lfp_module_type_id" value="" />
              
                <div class="input-icon">
                    <input type="text" size="16" readonly="" class="form-control" name="lfp_next_date" id="lfp_next_date">
                      <label class="control-label">Next Date<span class="asterix-error"><em>*</em></span></label>
                       <i class="fa fa-calendar"></i>    
                       <div class="help-block"></div>                
                </div>
                   
              </div>
              <div class="col-md-6">
                 <div class="form-group form-md-line-input form-md-floating-label">
                  <select class="form-control" name="lfp_followup_status" id="lfp_followup_status">
                    <?php echo getGenPrmResult('dropdown','lfp_followup_status','lfp_followup_status','','result'); ?>
                  </select>
                  <label>Status</label>
                  <div class="help-block"></div>
                </div>
              </div>
              <div class="clearfix"></div>

              <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                <select  class="form-control" name="lfp_type" id="lfp_type" onchange="updateLFPOptn()">
                  <option value="">Select Type</option>
                  <?php echo getGenPrmResult('dropdown','lfp_type','lfp_type','','result'); ?>
                </select>
                <div class="help-block"></div>                  
              </div>

              <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                <div class="input-icon">                  
                  <textarea class="form-control color-primary-light" rows="2" name="lfp_instruction" id="lfp_instruction" disabled="disabled"></textarea>
                  <label>Follow Up Instruction</label>
                  <i class="fas fa-info-circle"></i>
                  <div class="help-block"></div>
                </div>                
              </div>
              
              <div class="form-group col-md-12 hidden form-md-line-input form-md-floating-label">
                <div class="input-icon">                   
                  <textarea class="form-control color-primary-light" rows="3" placeholder="Remarks" name="lfp_type_remark" id="lfp_type_remark"></textarea>
                  <label>Remarks</label>
                  <i class="fa fa-comments"></i>
                  <div class="help-block"></div>
                </div>               
              </div>
              <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                <div class="input-icon">                  
                  <textarea class="form-control color-primary-light" rows="2" name="lfp_remark" id="lfp_remark"></textarea>
                  <label>Additional Remarks</label>
                  <i class="fa fa-comments"></i>
                   <div class="help-block"></div>
                </div>                
              </div>
              </div>
              <div class="clearfix"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
              </button>
              <input type="submit" class="btn btn-primary" value="Save changes">
              </input>
          </div>
        </form>
      </div>
    </div>
  </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
      <!-- OPTIONAL SCRIPTS -->
           <!-- BEGIN PAGE LEVEL PLUGINS -->
           <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>         
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <!-- END PAGE LEVEL PLUGINS -->          
          <script src="<?php echo base_url(); ?>assets/module/lead/js/lead-add-list.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">

        $(document).ready(function(){
          getLeadList();
          // getDataTableList();
          // getOutstandingBalanceData();
        });

        $('.date-range-picker-div').click(function(){
                       
        });
        $('#daterangepicker-custom-range').on('apply.daterangepicker', function(ev, picker) {
     
                
        });        

        function getLeadList()
        {
            var filter_type   = '<?php echo $filter_type; ?>';
            var filter_value  = '<?php echo $filter_value; ?>';

            var customDataTableElement = '#tblleadlist';
            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
            //var customDataTableUrl     =  baseUrl + 'lead-getlist?table_data_count='+customDataTableCount;

            var customDataTableUrl     =  baseUrl + 'lead-getlist'+(filter_type?'-'+filter_type+'-'+filter_value:'')+'?table_data_count='+customDataTableCount;

            /*var customDataTableColumns = [
              {   'data'  : 'led_title' ,
                'render': function(data, type, row, meta)
                {
                    link = '<a href="'+baseUrl+'lead-details-'+row.led_id_encrypt+'" >' + data + '</a>';
                  return link;
                }
              },
              {   'data'  : 'led_ppl_name' ,
                'render': function(data, type, row, meta)
                {
                    link = '<a href="people-details-'+row.led_ppl_id_encrypt+'" >' + data + '</a>';
                  return link;
                }
              },
              {   'data'  : 'led_cmp_id' ,
                'render': function(data, type, row, meta)
                {
                    link = '<a href="company-details-'+row.led_cmp_id_encrypt+'" >' + row.led_cmp_name + '</a>';
                  return link;
                }
              },
              {   'data'  : 'led_amount' ,
                'render': function(data, type, row, meta)
                {
                  return number_format(row.led_amount);
                  //return row.led_amount;
                }
              },
              {   'data'  : 'led_managed_by_name' ,
                'render': function(data, type, row, meta)
                {
                    link = '<a href="people-details-'+row.led_ppl_mng_id_encrypt+'" >' + data + '</a>';
                  return link;
                }
              },
              {   'data'  : 'led_lead_status_name' },
              {   'data'  : 'led_lead_stage_name' },
              {   'data'  : 'next_followup_date' },
              {   'data'  : 'led_crdt_dt' },
              {   'data'  : 'led_id' ,
                'render': function(data, type, row, meta)
                {
                  link = `<a href="`+baseUrl+`lead-edit-`+row.led_id_encrypt+`" title="Edit Details ">
                    <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
                    
                    <a class="  "  onclick="addFollowUp(`+row.led_id+`)">
                    <i class="fa fa-calendar" aria-hidden="true"></i></a>&nbsp;

                    <a onclick="deleteLead('`+row.led_id_encrypt+`')" title="Delete Details ">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>
                    `;
                  return link;
                }
              }
            ];*/

            var customDataTableColumns = [
              {   'data'  : 'led_title' ,
                'render': function(data, type, row, meta)
                {
                    link = '<a href="'+baseUrl+'lead-details-'+row.led_id_encrypt+'" >' + data + '</a>';
                  return link;
                }
              },
              {   'data'  : 'led_ppl_name' ,
                'render': function(data, type, row, meta)
                {
                    link = '<a href="people-details-'+row.led_ppl_id_encrypt+'" >' + data + '</a>';
                  return link;
                }
              },
              
              {   'data'  : 'led_amount' ,
                'render': function(data, type, row, meta)
                {
                  return number_format(row.led_amount);
                  //return row.led_amount;
                }
              },
              {   'data'  : 'led_managed_by_name' ,
                'render': function(data, type, row, meta)
                {
                    link = '<a href="people-details-'+row.led_ppl_mng_id_encrypt+'" >' + data + '</a>';
                  return link;
                }
              },
              {   'data'  : 'led_lead_stage_name' },
              {   'data'  : 'led_lead_status_name' },
              {   'data'  : 'led_id' ,
                'render': function(data, type, row, meta)
                {
                  link = `<a href="`+baseUrl+`lead-edit-`+row.led_id_encrypt+`" title="Edit Details " class="datatable-links edit">
                    <i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
                    
                    <a  onclick="addFollowUp(`+row.led_id+`)" class="datatable-links">
                    <i class="fa fa-calendar" aria-hidden="true"></i></a>&nbsp;

                    <a onclick="deleteLead('`+row.led_id_encrypt+`')" title="Delete Details " class="datatable-links delete">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>
                    `;
                  return link;
                }
              }
            ];

            customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
        
        }

        function leadfollowup_getdetail(follow_up_id)
        {
          $.ajax(
          {
            type: "POST",
            url: baseUrl + "lead-followupbyid-"+follow_up_id,
            dataType: "json",
            success: function(response)
            {
              $('#lfp_id').val(response.lfp_id);

              $('#lfp_module_type_id').val(response.lfp_module_type_id);
              $('#lfp_type').val(response.lfp_type);
              $('#lfp_next_date').val(response.lfp_next_date);
              $('#lfp_followup_status').val(response.lfp_followup_status);
              $('#lfp_instruction').val(response.lfp_instruction);
              $('#lfp_type_remark').val(response.lfp_type_remark);
              $('#lfp_remark').val(response.lfp_remark);

              updateLFPOptn();
              $('#followModal').modal('show');
              $('#followModal .modal-title').html('Update Follow Up');
            }
          });
        }

        function leadfollowup_renewal(follow_up_id)
        {
          $.ajax(
          {
            type: "POST",
            url: baseUrl + "lead-followupbyid-"+follow_up_id,
            dataType: "json",
            success: function(response)
            {
              $('#lfp_id').val('');
              $('#renew_old_lfp_id').val(response.lfp_id);
              $('#renew_old_lfp_type').val(response.lfp_type);

              $('#lfp_module_type_id').val(response.lfp_module_type_id);
              $('#lfp_type').val(response.lfp_type);
              $('#lfp_next_date').val(response.lfp_next_date).trigger('change');

              //$('#lfp_instruction').val('');
              $('#lfp_type_remark').val('');
              $('#lfp_remark').val('');

              //check if required ----------------
              //$('#lfp_followup_status').val(response.lfp_followup_status);
              //$('#lfp_instruction').val(response.lfp_instruction);
              //$('#lfp_type_remark').val(response.lfp_type_remark);
              //$('#lfp_remark').val(response.lfp_remark);


              updateLFPOptn();
              $('#followModal').modal('show');
              $('#followModal .modal-title').html('Reschedule Follow Up');
            }
          });
        }

        function updateLFPOptn()
        {
          if($('#lfp_type').val() == <?php echo LEAD_FOLLOWUP_OTHERS; ?>)
          {
            $('#lfp_instruction').html('');
            $($('#lfp_instruction')[0].parentElement).addClass('hidden');
            $($('#lfp_type_remark')[0].parentElement).removeClass('hidden');
          }
          else
          {
            getLFPOptionInstruction();
            $($('#lfp_type_remark')[0].parentElement).addClass('hidden');
            $($('#lfp_instruction')[0].parentElement).removeClass('hidden');
          }
        }

        function getLFPOptionInstruction()
        {
          $.ajax(
          {
              type: "POST",
              url: baseUrl + "lead/lfp_optn_inst/"+$('#lfp_type').val(),
              dataType: "json",
              success: function(response)
              {
                $('#lfp_instruction').html(response);
                $('#lfp_instruction').addClass('edited');
              }
          });
        }

        function addFollowUp(led_id)
        {
          $('#followModal').modal('show');
          $('#lfp_module_type_id').val(led_id);
        }

        function deleteLead(leadid)
        {
          cswal({
            text : 'Do you want to delete this follow up?', 
            title   : 'Done', 
            type    : 'delete', 
            onyes : function(){
              $.ajax({
                type: "POST",
                url: baseUrl + "lead-delete-"+leadid,
                success: function(response) {
                  response = JSON.parse(response);
                  if(response.success == true) {
                    swal({
                      title: "Done",
                      text: response.message,
                      type: "success",
                      icon: "success",
                      button: true,
                    })
                  } else {
                    swal({
                      title: "Opps",
                      text: "Something Went wrong",
                      type: "error",
                      icon: "error",
                      button: true,
                    });
                  }
                  location.reload();
                }
              });
            }
          });
        }
      </script>
    </div>
  </body>
</html>
