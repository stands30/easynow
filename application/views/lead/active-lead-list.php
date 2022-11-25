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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/lead/css/lead-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
      .active_lead_count {
        padding: 15px 15px;display: inline-block;
      }
    </style>
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
            <?php echo $breadcrumb; ?>
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <!-- END PAGE HEADER-->
          <!-- MAIN CONTENTS START HERE -->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark"> 
                <span class="list-title-caption caption-subject bold "><?php  echo $title; ?></span>
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
              <ul class="nav nav-tabs">
                <?php $i=0;
                  foreach ($lead_stage_array as $lead_stage_array_key ) {
                  $active_status='';
                  if($i == 0)
                  {
                    $active_status='active';
                  } 
                  $i++; ?>
                  <li class="custom-tab-header <?php echo $active_status; ?>">
                    <a href="#lead_stage_tab_<?php echo $lead_stage_array_key->f1; ?>" data-toggle="tab" ><?php echo $lead_stage_array_key->f2; ?> <span id="lead_stage_count_<?php echo $lead_stage_array_key->f1; ?>" class="countBtn"></span></a>
                  </li>
                <?php } ?>                                  
              </ul>
              <div class="tab-content">
                  <?php 
                  $selected=0;
                  foreach ($lead_stage_array as $lead_stage_array_key ) 
                  { 
                    $selected_active_status ='';
                    if($selected == 0)
                    {
                      $selected_active_status='active';
                    }
                  ?>
                    <div class="tab-pane <?php echo $selected_active_status; ?>" id="lead_stage_tab_<?php echo $lead_stage_array_key->f1; ?>">
                      <div class="portlet">
                        <div class="portlet-title">
                          <!-- <span class="active_lead_count"><b>Total: </b><span id="active_lead_count_total_<?php echo $lead_stage_array_key->f1; ?>">0</span></span>
                          <span class="active_lead_count"><b>On Hold: </b><span id="active_lead_count_onhold_<?php echo $lead_stage_array_key->f1; ?>">0</span></span> -->
                          <span class="active_lead_count"><b>Total: </b><span id="active_lead_count_pending_<?php echo $lead_stage_array_key->f1; ?>">0</span></span>
                        </div>
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-quot table-list " id="lead_stage_table_<?php echo $lead_stage_array_key->f1; ?>">
                              <thead>
                                 <tr>
                                  <th><i class="fas fa-th-list list-level"></i>Lead Title</th>
                                  <th><i class="fas fa-user list-level"></i>People Name</th>
                                  <th><i class="fas fa-building list-level"></i>Company</th>
                                  <th><i class="fas fa-rupee-sign list-level"></i>Amount</th>
                                  <th><i class="fas fa-user-tie list-level"></i>Managed By</th>
                                  <th id="lead_stage_th" class="hidden"><i class="fa fa-cubes list-level"></i>Stage</th>
                                  <th><i class="fa fa-calendar list-level"></i>Next Followup</th>
                                  <th><i class="fa fa-calendar list-level"></i>Created On</th>
                                  <th><i class="fas fa-cog list-level"></i>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                          </div>
                         </div>
                      </div>
                    <?php $selected++;  } ?>
                    
                </div>                               
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
                <input type="hidden" name="lfp_led_id" id="lfp_led_id" value="" />
              
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
              <input type="submit" class="btn btn-primary btn green" value="Save changes">
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
             <!-- END OPTIONAL SCRIPTS -->
          <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">

        var LEAD_STATUS_PENDING = <?php echo LEAD_STATUS_PENDING; ?>;
        var LEAD_STATUS_ON_HOLD = <?php echo LEAD_STATUS_ON_HOLD; ?>;

        $(document).ready(function() {
          // getList();
          getActiveLeadList();
        });

        function getActiveLeadList()
        {
          var tableNameArr = <?php  echo json_encode($lead_stage_array); ?>;

          for(var i = 0; i < tableNameArr.length; i++)
          {
            var lead_type = tableNameArr[i].f1;

            $('#lead_stage_table_' + lead_type).DataTable().destroy();
            var customDataTableElement = '#lead_stage_table_' + lead_type;
            var customDataTableUrl = baseUrl + 'lead-active-getlist?led_stage=' + lead_type + '&table_data_count=' + 100;

            // var customDataTableCount   = followUpTblUrlArray[lead_type].table_function_count;
            // var customDataTableServer  = followUpTblUrlArray[lead_type].table_function_server;

            var led_title = {
              'data': 'led_title',
              'render': function(data, type, row, meta) {
                link = '<a href="' + baseUrl + 'lead-details-' + row.led_id_encrypt + '" >' + data + '</a>';
                return link;
              }
            };

            var led_ppl_name = {
              'data': 'led_ppl_name',
              'render': function(data, type, row, meta) {
                link = '<a href="people-details-' + row.led_ppl_id_encrypt + '" >' + data + '</a>';
                return link;
              }
            };

            var led_cmp_id = {
              'data': 'led_cmp_id',
              'render': function(data, type, row, meta) {
                link = '<a href="company-details-' + row.led_cmp_id_encrypt + '" >' + row.led_cmp_name + '</a>';
                return link;
              }
            };

            var led_amount = {
              'data': 'led_amount',
              'render': function(data, type, row, meta) {

                if(LEAD_STATUS_PENDING == row.led_lead_status)
                {
                  if($('.'+row.led_lead_stage+'_'+LEAD_STATUS_PENDING).length == 0)
                    return '<span class="hidden '+row.led_lead_stage+'_'+LEAD_STATUS_PENDING+'">'+row.led_amount+'</span>'+number_format(row.led_amount);
                  else
                    return '<span class="hidden '+row.led_lead_stage+'_all">'+row.led_amount+'</span>'+number_format(row.led_amount);
                }

                if(LEAD_STATUS_ON_HOLD == row.led_lead_status)
                {
                  if($('.'+row.led_lead_stage+'_'+LEAD_STATUS_ON_HOLD).length == 0)
                    return '<span class="hidden '+row.led_lead_stage+'_'+LEAD_STATUS_ON_HOLD+'">'+row.led_amount+'</span>'+number_format(row.led_amount);
                  else
                    return '<span class="hidden '+row.led_lead_stage+'_all">'+row.led_amount+'</span>'+number_format(row.led_amount);
                }
              }
            };

            var led_managed_by_name = {
              'data': 'led_managed_by_name',
              'render': function(data, type, row, meta) {
                link = '<a href="people-details-' + row.led_ppl_mng_id_encrypt + '" >' + data + '</a>';
                return link;
              }
            };

            var led_lead_stage_name = {
              'data' : 'led_lead_stage_name'
            };

            var next_followup_date = {
              'data' : 'next_followup_date'
            };

            var led_crdt_dt_format = {
              'data' : 'led_crdt_dt_format'
            };

            var led_id =  {   'data'  : 'led_id' ,
              'render': function(data, type, row, meta)
              {
                link = `
                  <a href="` + baseUrl + `lead-details-` + row.led_id_encrypt + `" ><i style="font-size: 14px; color:#2ab4c0;" class="fa fa-book" aria-hidden="true"></i></a>&nbsp;
                  <a href="`+baseUrl+`lead-edit-`+row.led_id_encrypt+`" title="Edit Details "><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
                  <a onclick="deleteLead('`+row.led_id_encrypt+`')" title="Delete Details "><i class="fa fa-trash" aria-hidden="true"></i></a>
                `;

                var newfollowup = `<a class="" onclick="addFollowUp(`+row.led_id+`)"><i class="fa fa-calendar" aria-hidden="true"></i></a>&nbsp;`;
                return link;
              }
            };

            var customDataTableColumns = [];

            if(lead_type == 'all')
            {
              $('#lead_stage_table_'+lead_type+' #lead_stage_th').removeClass('hidden');
              customDataTableColumns = [led_title, led_ppl_name, led_cmp_id, led_amount, led_managed_by_name, led_lead_stage_name, next_followup_date, led_crdt_dt_format, led_id];
            }
            else
              customDataTableColumns = [led_title, led_ppl_name, led_cmp_id, led_amount, led_managed_by_name, next_followup_date, led_crdt_dt_format, led_id];

            // $('#'+tableNameArr[i]+i).append(customDataTableCount);

            customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true);
            getTablCount('#lead_stage_table_' + lead_type, '#lead_stage_count_' + lead_type);
          }

          setTimeout(function()
          {
            var lead_stage = [<?php echo LEAD_STAGE_LEAD_IN; ?>,<?php echo LEAD_STAGE_CONTACTED; ?>,<?php echo LEAD_STAGE_QUALIFIED; ?>,<?php echo LEAD_STAGE_PROPOSAL_MADE; ?>,<?php echo LEAD_STAGE_NEGOTIATION; ?>];

            var active_lead_count_pending_all = 0; 
            var active_lead_count_onhold_all = 0; 

            for(var i = 0; i < lead_stage.length; i++)
            {
              var lead_stage_type = lead_stage[i];
              var lead_type = tableNameArr[i].f1;
              var active_lead_count_pending = 0; 
              var active_lead_count_onhold = 0; 

              $('.'+lead_stage_type+'_'+LEAD_STATUS_PENDING).each(function(){
                active_lead_count_pending = active_lead_count_pending + parseFloat($(this).html());
              })
              active_lead_count_pending_all = active_lead_count_pending_all + active_lead_count_pending;

              $('.'+lead_stage_type+'_'+LEAD_STATUS_ON_HOLD).each(function(){
                active_lead_count_onhold = active_lead_count_onhold + parseFloat($(this).html());
              })
              active_lead_count_onhold_all = active_lead_count_onhold_all + active_lead_count_onhold;

              $('#active_lead_count_pending_' + lead_type).html(number_format(active_lead_count_pending));
              $('#active_lead_count_onhold_' + lead_type).html(number_format(active_lead_count_onhold));
              $('#active_lead_count_total_' + lead_type).html(number_format((active_lead_count_onhold + active_lead_count_pending)));
            }

            $('#active_lead_count_pending_all').html(number_format(active_lead_count_pending_all));
            $('#active_lead_count_onhold_all').html(number_format(active_lead_count_onhold_all));
            $('#active_lead_count_total_all').html(number_format((active_lead_count_onhold_all + active_lead_count_pending_all)));

          }, 2000);
        }

        function getTablCount(tableName, countElement) {
          $(tableName).on('draw.dt', function() {
            var count = $(tableName).parent().parent().find(tableName + '_info').html().split(' ')[5];
            /*console.log($(tableName).parent().parent().find(tableName+'_info').html().split(' ')[5]);
            console.log(count);
            console.log(countElement);*/
            console.log(countElement);
            $(countElement).html('' + (count ? count : 0) + '');
          });
        }

        function leadfollowup_getdetail(follow_up_id) {
          $.ajax({
            type: "POST",
            url: baseUrl + "lead-followupbyid-" + follow_up_id,
            dataType: "json",
            success: function(response) {
              $('#lfp_id').val(response.lfp_id);

              $('#lfp_led_id').val(response.lfp_led_id);
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

        function leadfollowup_renewal(follow_up_id) {
          $.ajax({
            type: "POST",
            url: baseUrl + "lead-followupbyid-" + follow_up_id,
            dataType: "json",
            success: function(response) {
              $('#lfp_id').val('');
              $('#renew_old_lfp_id').val(response.lfp_id);
              $('#renew_old_lfp_type').val(response.lfp_type);

              $('#lfp_led_id').val(response.lfp_led_id);
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

        function updateLFPOptn() {
          if($('#lfp_type').val() == <?php echo LEAD_FOLLOWUP_OTHERS; ?>) {
            $('#lfp_instruction').html('');
            $($('#lfp_instruction')[0].parentElement).addClass('hidden');
            $($('#lfp_type_remark')[0].parentElement).removeClass('hidden');
          } else {
            getLFPOptionInstruction();
            $($('#lfp_type_remark')[0].parentElement).addClass('hidden');
            $($('#lfp_instruction')[0].parentElement).removeClass('hidden');
          }
        }

        function getLFPOptionInstruction() {
          $.ajax({
            type: "POST",
            url: baseUrl + "lead/lfp_optn_inst/" + $('#lfp_type').val(),
            dataType: "json",
            success: function(response) {
              $('#lfp_instruction').html(response);
              $('#lfp_instruction').addClass('edited');
            }
          });
        }

        function addFollowUp(led_id) {
          $('#followModal').modal('show');
          $('#lfp_led_id').val(led_id);
        }

        function deleteLead(leadid) {
          if(!confirm('Do you really want to delete this entry')) {
            return;
          }

          $.ajax({
            type: "POST",
            url: baseUrl + "lead-delete-" + leadid,
            success: function(response) {
              response = JSON.parse(response);

              if(response.success == true) {
                swal({
                  title: "Done",
                  text: response.message,
                  type: "success",
                  icon: "success",
                  button: true,
                }).then(() => {
                  window.location.href = response.linkn;
                });
              } else {
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
