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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
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
                <span class="list-title-caption caption-subject bold "><i class="fas fa-calendar-alt icon-follow-up"></i><?php  echo $title; ?></span>  
                <div class="btn-group">
                  <a id="sample_editable_1_new" href="#" class="btn green" data-toggle="modal" data-target="#followModal"> Add FollowUp
                  <i class="fa fa-plus"></i>
                </a>
                </div>              
              </div>
              
              <div class="tools"></div>
            </div>
            <div class="portlet-body">
              <div class="tabbable-custom">
                <ul class="nav nav-tabs list-view-tab">
                    <li class="active">
                        <a href="#tab_today" data-toggle="tab" aria-expanded="true"> Today <span id = "tblFollowupListToday0" class="countBtn"></span> </a>
                    </li>
                    <li class="">
                        <a href="#tab_pending" data-toggle="tab" aria-expanded="false"> Due <span id="tblFollowupListPending1" class="countBtn"></span></a>
                    </li>
                    <li class="">
                        <a href="#tab_today_completed" data-toggle="tab" aria-expanded="false">  Today (Completed) <span id="tblFollowupListCompleted2" class="countBtn"></span></a>
                    </li>
                    <li class="">
                        <a href="#tab_upcoming" data-toggle="tab" aria-expanded="false"> Upcoming <span id="tblFollowupListUpcoming3" class="countBtn"></span></a>
                    </li>
                    <li class="">
                        <a href="#tab_all" data-toggle="tab" aria-expanded="false">All <span id="tblFollowupListAll4" class="countBtn"></span> </a>
                    </li>
                </ul>
                <div class="tab-content tab-content-list">
                  <div class="tab-pane fade active in" id="tab_today" style="margin-top: 10px;">
                      <div class="portlet-body">
                        <table class="table table-striped table-bordered table-list" id="tblFollowupListToday" style="width:100%;">
                          <thead>
                            <tr>
                              <th>People Name </th>
                              <th>Date Time </th>
                              <th>Followup Remark </th>
                              <th>Status </th>
                              <th>Created On </th>
                              <th>Created By </th>
                              <th>Action </th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="tab_pending" style="margin-top: 10px;">
                    
                      
                      <div class="portlet-body">
                        <table class="table table-striped table-bordered table-list" id="tblFollowupListPending" style="width:100%;">
                          <thead>
                            <tr>
                              <th>People Name </th>
                              <th>Date Time </th>
                              <th>Followup Remark </th>
                              <th>Status </th>
                              <th>Created On </th>
                              <th>Created By </th>
                              <th>Action </th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    
                  </div>
                  <div class="tab-pane fade" id="tab_today_completed" style="margin-top: 10px;">
                    
                      
                      <div class="portlet-body">
                        <table class="table table-striped table-bordered table-list" id="tblFollowupListCompleted" style="width:100%;">
                          <thead>
                            <tr>
                              <th>People Name </th>
                              <th>Date Time </th>
                              <th>Followup Remark </th>
                              <th>Status </th>
                              <th>Created On </th>
                              <th>Created By </th>
                              <th>Action </th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    
                  </div>
                  <div class="tab-pane fade" id="tab_upcoming" style="margin-top: 10px;">
                    
                      <div class="portlet-body">
                        <table class="table table-striped table-bordered table-list" id="tblFollowupListUpcoming" style="width:100%;">
                          <thead>
                            <tr>
                              <th>People Name </th>
                              <th>Date Time </th>
                              <th>Followup Remark </th>
                              <th>Status </th>
                              <th>Created On </th>
                              <th>Created By </th>
                              <th>Action </th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    
                  </div>
                  <div class="tab-pane fade" id="tab_all" style="margin-top: 10px;">
                    
                  
                      <div class="portlet-body">
                        <table class="table table-striped table-bordered table-list" id="tblFollowupListAll" style="width:100%;">
                          <thead>
                            <tr>
                              <th>People Name </th>
                              <th>Date Time </th>
                              <th>Followup Remark </th>
                              <th>Status </th>
                              <th>Created On </th>
                              <th>Created By </th>
                              <th>Action </th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
              <div class="clearfix margin-bottom-20"> </div>
            </div>
          </div>
          <!-- -----MAIN CONTENTS END HERE----- -->
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <div class="modal fade" id="followModal" role="dialog" aria-labelledby="followModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;
                </span>
              </button>
              <div class="text-center">
                <h3 class="modal-title text-center">Follow Up Transaction Form</h3>
                <span class="sp_line color-primary"></span>
              </div>
              <form method="POST" action="" class="follow-modal-form" id="follow_up_form">
                <input type="hidden" name="lfp_id" id="lfp_id" value="" />
                <input type="hidden" name="old_lfp_id" id="renew_old_lfp_id" value="" />
                <input type="hidden" name="old_lfp_type" id="renew_old_lfp_type" value="" />
                <input type="hidden" name="lfp_module_type" id="lfp_module_type" value="<?php echo FOLLOWUP_MODULE_TYPE_LEAD; ?>" />
                <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                    <div class="input-icon">
                      <i class="fas fa-user-tie list-level"></i>
                        <select name="lfp_module_type_id" id="lfp_module_type_id" class="form-control lfp_module_type_id custom-select2">
                          <option>Please Select Lead</option>
                        </select>
                        <label class="">Lead</label>
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="form-group col-md-3 form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <input type="text" size="16" readonly="" class="form-control color-primary-light" name="lfp_next_date" id="lfp_next_date">
                      <label class="control-label">Date<span class="asterix-error"><em>*</em></span></label>
                       <i class="fas fa-calendar-alt"></i>
                   </div>
                     <div class="help-block"></div>
                </div>
                <div class="form-group col-md-3 form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <select class="form-control" name="lfp_next_time" id="lfp_next_time">
                        <option></option>
                      </select>
                      <label class="control-label">Time</label>
                       <i class="fas fa-calendar-alt"></i>
                   </div>
                     <div class="help-block"></div>
                </div>
                <div class="col-md-6">
                   <div class="form-group form-md-line-input form-md-floating-label ">
                    <div class="input-icon">
                      <i class="fas fa-user-tie list-level"></i>
                    <select  class="form-control edited  custom-select2" name="lfp_managed_by" id="lfp_managed_by">
                          <option value="<?php echo $this->session->userdata(PEOPLE_SESSION_ID); ?>"><?php echo $this->session->userdata(PEOPLE_SESSION_NAME); ?></option>
                    </select>
                     <label>Managed By</label>
                    </div>
                       <div class="help-block"></div>
                  </div>
                </div>  
                <div class="col-md-6">
                  <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <i class="fas fa-info-circle list-level"></i>
                      <select class="form-control" name="lfp_followup_status" id="lfp_followup_status">
                      <?php echo getGenPrmResult('dropdown','lfp_followup_status','lfp_followup_status','1','result'); ?></select>
                        <label>Status</label>
                      </div>
                       <div class="help-block"></div>
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group form-md-line-input form-md-floating-label ">
                    <div class="input-icon">
                      <i class="fa fa-envelope"></i>
                    <select  class="form-control edited  custom-select2" name="lfp_type" id="lfp_type" onchange="updateLFPOptn()">
                      <option value="">Select Type</option>
                      <?php echo getGenPrmResult('dropdown','lfp_type','lfp_type','','result'); ?>
                    </select>
                     <label>Follow Type</label>
                    </div>
                       <div class="help-block"></div>
                  </div>
                </div>
                <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                    <div class="md-checkbox">
                        <input type="checkbox" id="checkbox1" class="md-check">
                        <label for="checkbox1">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span>Send Email</label>
                    </div>
                </div>
                <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                  <div class="input-icon">
                     <textarea class="form-control color-primary-light custom-select2" rows="2" name="lfp_instruction" id="lfp_instruction" disabled="disabled"></textarea>
                   <label for="lfp_instruction">Instruction</label>
                   <i class="fas fa-info-circle"></i>
                     <div class="help-block"></div>
                  </div>                 
                </div>
                <div class="form-group col-md-12 hidden form-md-line-input form-md-floating-label">
                  <div class="input-icon">
                    <textarea class="form-control color-primary-light" rows="2" name="lfp_type_remark" id="lfp_type_remark"></textarea>
                    <label for="lfp_type_remark">Instruction </label>
                    <i class="fa fa-comments"></i>
                    <div class="help-block"></div>
                  </div>
                </div>
                <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <textarea class="form-control color-primary-light" rows="2" name="lfp_remark" id="lfp_remark"></textarea>
                      <label for="lfp_remark">Remarks</label>
                       <i class="fa fa-comments"></i>
                      <div class="help-block"></div>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn grey" data-dismiss="modal">Close
                </button>
                <input type="submit" class="btn btn-primary btn green" value="Save changes">
                </input>
            </div>
          </form>
        </div>
      </div>


    </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->

    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
      <!-- OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>      
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       <!-- END OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
     <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
     <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
     <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> 
      <script src="<?php echo base_url(); ?>assets/module/followup/js/followup-list.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- Daterange Picker -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">

        $(document).ready(function(){
          getFollowupList();
          
          $('#lfp_followup_status').select2();
          $('#lfp_type').select2();
          $('#lfp_next_time').select2();

          /*$('#lfp_follow_by').select2({
            tags: true,
            placeholder:"Please Select People",
            ajax: 
            {
              url: baseUrl +'followup/getPeopleDropdown/',
              dataType: 'json',
            }
          });*/

          $('#lfp_next_time').timeList({
            minutediff  : 5
          });
          $('#lfp_next_time').addClass('edited');
          //$('#lfp_next_time').select2();
        });
         $('.date-range-picker-div').click(function(){
           
        });
        $('#daterangepicker-custom-range').on('apply.daterangepicker', function(ev, picker) {
     
                
        });

        function updateLFPOptn()
        {
          if($('#lfp_type').val() == <?php echo LEAD_FOLLOWUP_OTHERS; ?>)
          {
            $('#lfp_instruction').html('');
            $($('#lfp_instruction')[0].parentElement).addClass('hidden');
            $($('#lfp_type_remark')[0].parentElement).removeClass('hidden');
            $('#lfp_instruction').removeClass('edited');
          }
          else
          {
            getLFPOptionInstruction();
            $($('#lfp_type_remark')[0].parentElement).addClass('hidden');
            $($('#lfp_instruction')[0].parentElement).removeClass('hidden');
            $('#lfp_instruction').addClass('edited');
          }
        }

        function getLFPOptionInstruction()
        {
          $.ajax(
          {
              type: "POST",
              url: baseUrl + "followup/lfp_optn_inst/"+$('#lfp_type').val(),
              dataType: "json",
              success: function(response)
              {
                $('#lfp_instruction').html(response);
              }
          });
        }

        function followup_update(follow_up_id, type)
        {
          var url, text;
          
          if(type == "done")
          {
            url = baseUrl + "followup/updateFollowupStatus/" + follow_up_id + '/' + <?php echo LEAD_FOLLOWUP_STATUS_DONE; ?>;
            text  = 'Done';
          }
          else if(type == "reschedule")
          {
            url = baseUrl + "followup/updateFollowupStatus/" + follow_up_id + '/' + <?php echo LEAD_FOLLOWUP_STATUS_RESCHEDULE; ?>;
            text  = 'Reschedule';
          }

          cswal({
            text : 'Do you want to update this follow up as '+text+'?', 
            title   : text, 
            type    : 'confirm', 
            onyes : function(){
              $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                success: function(response) {
                    followup_renewal(follow_up_id);
                }
              })
            }, 
            oncancel : function(){
                //followup_renewal(follow_up_id);
            }
          });
        }

        function followup_getdetail(follow_up_id)
        {
          $.ajax(
          {
            type: "POST",
            url: baseUrl + "followup-detailbyid-"+follow_up_id,
            dataType: "json",
            success: function(response)
            {
              $('#lfp_id').val(response.lfp_id);
              $('#lfp_type').val(response.lfp_type);
              $('#lfp_next_date').val((response.lfp_next_date_format).split(' ')[0]);
              $('#lfp_next_time').val((response.lfp_next_date_format).split(' ')[1]).trigger('change');
              //$('#lfp_next_time').select2('val',(response.lfp_next_date_format).split(' ')[1]);
              $('#lfp_followup_status').val(response.lfp_followup_status);
              $('#lfp_managed_by').html('<option value="'+response.lfp_managed_by+'">'+response.lfp_managed_by_name+'</option>');
              $('#lfp_module_type_id').html('<option value="'+response.lfp_module_type_id+'">'+response.lfp_module_type_id_name+'</option>');
              $('#lfp_instruction').val(response.lfp_instruction);
              $('#lfp_type_remark').val(response.lfp_type_remark);
              $('#lfp_remark').val(response.lfp_remark).addClass('edited');
              updateLFPOptn();
              $('#followModal').modal('show');
              $('#followModal .modal-title').html('Update Follow Up');
            }
          });
        }

        function followup_renewal(follow_up_id)
        {
          $.ajax(
          {
            type: "POST",
            url: baseUrl + "followup-detailbyid-"+follow_up_id,
            dataType: "json",
            success: function(response)
            {
              $('#lfp_id').val('');
              //$('#renew_old_lfp_id').val(response.lfp_id);
              $('#renew_old_lfp_id').val('');
              $('#renew_old_lfp_type').val(response.lfp_type);
              //$('#lfp_type').val(response.lfp_type);
              $('#lfp_next_date').val((response.lfp_next_date_format).split(' ')[0]);
              $('#lfp_next_time').val((response.lfp_next_date_format).split(' ')[1]).trigger('change');
              //$('#lfp_follow_by').html('<option value="'+response.lfp_follow_by+'">'+response.lfp_follow_by_name+'</option>');
              $('#lfp_module_type_id').html('<option value="'+response.lfp_module_type_id+'">'+response.lfp_module_type_id_name+'</option>');
              $('#lfp_type').html('<option value="'+response.lfp_type+'">'+response.lfp_followup_type+'</option>');
              $('#lfp_next_date').addClass('edited');

              //$('#lfp_instruction').val('');
              $('#lfp_type_remark').val('');
              $('#lfp_remark').val('').addClass('edited');;

              updateLFPOptn();
              $('#followModal').modal('show');
              $('#followModal .modal-title').html('Reschedule Follow Up');
            }
          });
        }

        function getFollowupList()
        {

            var followUpTblUrlArray = {
              'tblFollowupListToday'      : {'table_function_name' : 'followup-getlist-today','table_function_count':<?php echo $leadfollowUpTypeToday->table_data_count; ?>,'table_function_server':<?php echo $leadfollowUpTypeToday->table_server_status; ?>},
              'tblFollowupListPending'      : {'table_function_name' : 'followup-getlist-pending','table_function_count':<?php echo $leadfollowUpTypePending->table_data_count; ?>,'table_function_server':<?php echo $leadfollowUpTypePending->table_server_status; ?>},
              'tblFollowupListCompleted'      : {'table_function_name' : 'followup-getlist-completed','table_function_count':<?php echo $leadfollowUpTypeCompleted->table_data_count; ?>,'table_function_server':<?php echo $leadfollowUpTypeCompleted->table_server_status; ?>},
              'tblFollowupListUpcoming'      : {'table_function_name' : 'followup-getlist-upcoming','table_function_count':<?php echo $leadfollowUpTypeUpcoming->table_data_count; ?>,'table_function_server':<?php echo $leadfollowUpTypeUpcoming->table_server_status; ?>},
              'tblFollowupListAll'      : {'table_function_name' : 'followup-getlist-all','table_function_count':<?php echo $leadfollowUpTypeAll->table_data_count; ?>,'table_function_server':<?php echo $leadfollowUpTypeAll->table_server_status; ?> },
            };

            var tableNameArr = Object.keys(followUpTblUrlArray);
            for(var i = 0; i < tableNameArr.length; i++)
            {
              var customDataTableElement = '#'+tableNameArr[i];
              $(customDataTableElement).DataTable().destroy();
              var customDataTableCount   = followUpTblUrlArray[tableNameArr[i]].table_function_count; 
              var customDataTableServer  = followUpTblUrlArray[tableNameArr[i]].table_function_server;
              var customDataTableUrl     =  baseUrl + followUpTblUrlArray[tableNameArr[i]].table_function_name + '?table_data_count='+customDataTableCount;
              var customDataTableColumns = [
                {   'data'  : 'lead_name' ,
                  'render': function(data, type, row, meta)
                  {
                      link = '<a href="<?php echo base_url(); ?>people-details">'+data+'</a>';
                    return link;
                  }
                },
                {   'data'  : 'lfp_next_date_format' },
                {   'data'  : 'lfp_remark' },
                {   'data'  : 'followup_status' },
                {   'data'  : 'lfp_crdt_dt' },
                {   'data'  : 'lfp_crdt_by' },
                {   'data'  : 'lfp_id' ,
                  'render': function(data, type, row, meta)
                  {
                      /*link = '&nbsp;&nbsp;<a onclick="followup_update(`'+row.lfp_id+'`)" title="Reschedule Follow Up"><i class="fa fa-calendar" aria-hidden="true"></i></a>&nbsp;&nbsp;<a onclick="deleteFollowup(`'+row.lfp_id+'`)" title="Delete Follow Up "><i class="fa fa-trash" aria-hidden="true"></i></a>';*/
                    // <a href="#"><i class="fa fa-calendar" style="cursor: pointer;" onclick="followup_renewal(`'+row.lfp_id+'`)"></i>

                var link = '';

                if(row.private_access == 0)
                  return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                    <?php if($edit_access) { ?>
                      link += '<a onclick="followup_update(`' + row.lfp_id + '`,`done`)" title="Done" class="datatable-links"><i class="fa fa-check" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
                          '<a onclick="followup_update(`' + row.lfp_id + '`,`reschedule`);" title="Reschedule Follow Up " class="datatable-links"><i class="fa fa-calendar" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
                          '<a onclick="followup_renewal(`' + row.lfp_id + '`);" title="Edit" class="datatable-links edit"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;';
                    <?php }?>

                    <?php if($delete_access) { ?>
                      link += '<a onclick="deleteFollowup(`' + row.lfp_id + '`)" title="Delete Details " class="datatable-links delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                    <?php }?>

                    return link;
                  }
                }
              ];

               // $('#'+tableNameArr[i]+i).append(customDataTableCount);
                customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                getTablCount('#'+tableNameArr[i],'#'+tableNameArr[i]+i);

            }
          
     
         }
        // function getTablCount(tableName,countElement)
        // {
        //    $(tableName).on('draw.dt', function () {
        //        var count = $(tableName).parent().parent().find(tableName+'_info').html().split(' ')[5];
        //         $(countElement).html((count?count:0));
        //    });
        // }
        function deleteFollowup(followupid)
        {
          if(!confirm('Do you really want to delete this entry'))
          {
            return;
          }

          $.ajax(
          {
            type: "POST",
            url: baseUrl + "followup-delete-"+followupid,
            success: function(response)
            {
              response = JSON.parse(response);

              if (response.success == true)
              {
                swal({
                  title: "Done",
                  text: response.message,
                  type: "success",
                  icon: "success",
                  button: true,
                });
                setTimeout(function(){
                  getFollowupList();
                },1000);
              }
              else
              {
                swal({
                  title: "Opps",
                  text: "Something Went wrong",
                  type: "error",
                  icon: "error",
                  button: true,
                });
              }
            }
          });
        }

      </script>
    </div>
  </body>
</html>
