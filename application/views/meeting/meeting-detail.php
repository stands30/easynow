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
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> 
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                    <div class="page-content page-content-detail">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                            <div class="breadcrumb-button">
                                <a href="<?php echo base_url('meeting-details-'.$meetingdata->prev_encrypt) ?>" class=" previous" title="">
                                    <button id="newmeeting" class="btn green">
                                        <i class="fa fa-arrow-left"></i>
                                        <!-- Previous  -->
                                    </button>
                                </a>
                                <a href="<?php echo base_url('meeting-details-'.$meetingdata->next_encrypt) ?>" class="next">
                                    <button id="newmeeting" class="btn green">
                                        <!-- Next --><i class="fa fa-arrow-right"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!-- -----MAIN CONTENTS START HERE----- -->
                        <div class="row">
                            <aside class="profile-info col-lg-12">
                                <section class="panel">
                                    <!-- <label>make drop down editable for Host People,Meeting With(multiple),Status,People
,Lead,Task,Account</label> -->                                          

                                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                        <header class="panel-heading color-primary panelHeading">
                                            <div class="row detail-box">
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <span class="detail-list-heading">Meeting Details</span><br>
                                                    <div class="row inner-row">
                                                        <span class="panel-title">
                                                            New Project
                                                        </span>&nbsp;&nbsp;
                                                        <?php if($meetingdata->private_access==1) {
                                                         if($edit_access) {?>
                                                        <a class="btn-edit" href="<?php echo base_url('meeting-edit-'.$meetingdata->mtg_id_encrypt);?>">
                                                            <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                        </a>
                                                      <?php } ?>
                                                        <?php if($delete_access) {?>
                                                        <a class="btn-edit" onclick="deleteMeeting('<?php echo $meetingdata->mtg_id_encrypt; ?>')">
                                                            <i class="fa fa-trash"></i><span class="btn-text"> Delete</span>
                                                        </a>
                                                      <?php } } ?>
                                                        <!-- <input type="hidden" value="<?php //if(isset($meetingdata->mtg_id_encrypt)) echo $meetingdata->mtg_id_encrypt; ?>" name="mtg_id" id="mtg_id" / > -->
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                    <span class="created">Created By: <?php if(isset($meetingdata->mtg_crdt_by)) echo $meetingdata->mtg_crdt_by; ?>
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: <?php if(isset($meetingdata->mtg_crdt_dt_format)) echo display_date($meetingdata->mtg_crdt_dt); ?>
                                                    </span>
                                                    <br>
                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom table-detail-custom table-style">
                                                <tbody>
                                                    <input type="hidden" id="mtg_id" name="" value="<?php echo $meetingdata->mtg_id; ?>">
                                                    <tr>
                                                       
                                                        <td><i class="fas fa-th-list list-level"></i>Title</td>
                                                        <td><?php if(isset($meetingdata->mtg_title)) echo $meetingdata->mtg_title; ?></td>                                                        
                                                        <td><i class="fas fa-info-circle list-level"></i>Status</td>
                                                        <td>
                                                            
                                                            <a href="javascript:;" id="mtg_status" class="mtg_status meeting-status-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select State" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $meetingdata->mtg_status; ?>" data-custom_select2_name="<?php echo $meetingdata->mtg_status_name; ?>"  data-gnp-grp="mtg_status" data-custom-gnp-grp="mtg_status" ><?php if(isset($meetingdata->mtg_status_name)) echo $meetingdata->mtg_status_name; ?> </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>From</td>
                                                        <td><?php if(isset($meetingdata->mtg_from_dt_time_format)) echo $meetingdata->mtg_from_dt_time_format; ?></td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>To</td>
                                                        <td><?php if(isset($meetingdata->mtg_to_dt_time_format)) echo $meetingdata->mtg_to_dt_time_format; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-user-tie list-level"></i>Host People</td>
                                                        <td>

                                                        <a href="javascript:;" id="mtg_host" class="mtg_host meeting-host-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select State" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $meetingdata->mtg_host; ?>" data-custom_select2_name="<?php echo $meetingdata->mtg_host_name; ?>"  data-gnp-grp="all" data-custom-gnp-grp="mtg_host" ><?php if(isset($meetingdata->mtg_host_name)) echo $meetingdata->mtg_host_name; ?> </a>
                                                    </td>
                                                        <td><i class="fas fa-user list-level"></i>Meeting With</td>
                                                        <td><?php if(isset($meetingdata->mtg_people)) echo getPeopleLink($meetingdata->mtg_people); ?></td>
                                                        
                                                    </tr>                                                   
                                                   <!--  <tr>
                                                        <td><i class="fas fa-info-circle list-level"></i>Status</td>
                                                        <td>Yes</td>
                                                        
                                                    </tr> -->
                                                    <tr>
                                                        <td><i class="fas fa-user-tie list-level"></i>Related People</td>
                                                        <td><?php if(isset($meetingdata->mtg_rlt_ppl) and !empty($meetingdata->mtg_rlt_ppl)) echo getPeopleLink($meetingdata->mtg_rlt_ppl); ?></td>
                                                        <td><i class="fas fa-user-tie list-level"></i>Related Lead</td>
                                                        <td>

                                                        <a href="javascript:;" id="mtg_lead" class="mtg_lead meeting-lead-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select State" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $meetingdata->mtg_lead; ?>" data-custom_select2_name="<?php echo $meetingdata->mtg_led_name; ?>" data-custom-gnp-grp="mtg_lead" ><?php if(isset($meetingdata->mtg_led_name)) echo $meetingdata->mtg_led_name; ?> </a>
                                                    </td>
                                                       
                                                    </tr>
                                                    <tr>
                                                         <td><i class="fas fa-thumbtack list-level"></i>Related Task</td>
                                                        <td>

                                                        <a href="javascript:;" id="mtg_task" class="mtg_task meeting-task-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select State" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $meetingdata->mtg_task; ?>" data-custom_select2_name="<?php echo $meetingdata->mtg_tsk_name; ?>" data-custom-gnp-grp="mtg_task" ><?php if(isset($meetingdata->mtg_tsk_name)) echo $meetingdata->mtg_tsk_name; ?></a></td>
                                                        <!-- <td><i class="fa fa-cart-plus list-level"></i>Product</td>
                                                        <td>
                                                            <?php //if(isset($meetingdata->mtg_prod)) echo GetTagData($meetingdata->mtg_prod,'prod-span'); ?></td> -->
                                                        <td><i class="fas fa-industry list-level"></i>Related Account</td>
                                                        <td>

                                                        <a href="javascript:;" id="mtg_act" class="mtg_act meeting-account-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select State" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $meetingdata->mtg_act; ?>" data-custom_select2_name="<?php echo $meetingdata->mtg_act_name; ?>" data-custom-gnp-grp="mtg_act" ><?php if(isset($meetingdata->mtg_act_name)) echo $meetingdata->mtg_act_name; ?></a>
                                                    </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </aside>

                            <aside class="profile-info col-lg-12 mb-40">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                        <header class="panel-heading panel-heading-lead color-primary">
                                            <div class="row detail-box">
                                                <div class="col-md-12">
                                                    <span class="panel-title">Description</span>
                                                </div>
                                            </div>
                                        </header>
                                        <div class="col-md-12 summernote-decription">
                                             <p><?php if(isset($meetingdata->mtg_description)) echo $meetingdata->mtg_description; ?></p>
                                        </div>
                                    </div>
                                </section>
                                
                            </aside>

                            
                            <aside class="profile-info col-lg-12 no-side-padding">
                                <section class="">
                                    <div class="col-md-12">
                                        <label class="bold">Attachment
                                          <?php if($add_access) {?>
                                          <a data-toggle="modal" href="#attachment" class="attachments">+</a>
                                        <?php } ?>
                                        </label>
                                    </div>
                                    <div class="col-md-12 no-side-padding">
                                        <br />
<?php
                                    foreach ($meeting_att_data as $attachment) {
?>
                                        <label class="col-md-12">
                                            <a href="<?php echo MEETING_DOC.$attachment->mta_name;?>" target="_blank" class="attachment-list">
                                                <i class="fa fa-paperclip"></i> &nbsp;<?php echo $attachment->mta_name;?>
                                            </a>
                                        </label>
<?php
                                    }
?>
                                    </div>
                                 
                                </section>
                            </aside>
                        </div>
                        <!-- -----MAIN CONTENTS END HERE----- -->
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- Modal Start here -->
        <div class="modal fade modal-attachments" id="attachment" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <div class="text-center">
                            
                            <h3 class="modal-title text-center">Add Attachment</h3>
                            <span class="sp_line color-primary text-center"></span>
                        </div>
                    </div>
                    <div class="modal-body modal-body-attachments">
                        <div class="col-md-6 form-group fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 30px;">
                            <div class="image-preview" style="padding-left: 0px;">
                                <div id="image_preview"></div>
                                <span class="btn default btn-file btn-file-view">
                                      <input type="file" id="mtg_document" name="mtg_document" class="profile-image btn-file-view">
                                      </span>
                                <span class="custom-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-20">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green" onclick="uploadAttachment()">Upload Document</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Modal Ends here -->
        <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>

      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        
                <!-- OPTIONAL SCRIPTS -->
                <!-- END OPTIONAL SCRIPTS -->
        </div>
                <script type="text/javascript">
                    $(document).ready(function()
                      {
                        var primary_key     = 'mtg_id';
                        var updateUrl       = baseUrl + 'meeting/updateMeetingCustomData';
                        
                        var editableElement = '.meeting-lead-editable';
                        var select2Class    = 'meeting_lead_select2';
                        var dropdownUrl     = 'meeting/getLeadforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.meeting-host-editable';
                        var select2Class    = 'meeting_host_select2';
                        var dropdownUrl     = 'meeting/getPeopleforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.meeting-task-editable';
                        var select2Class    = 'meeting_task_select2';
                        var dropdownUrl     = 'meeting/getTaskForDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.meeting-account-editable';
                        var select2Class    = 'meeting_account_select2';
                        var dropdownUrl     = 'meeting/getAccountforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.meeting-status-editable';
                        var select2Class    = 'meeting_status_select2';
                        var dropdownUrl     = 'meeting/getGenPrmforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

                        // getcmpList();
                      })
                    function toggleDetailView()
                    {
                        $('.toggle_tr').toggleClass('hidden');
                    }
                    function uploadAttachment()
                    {
                        var formData = new FormData();
                        formData.append("mtg_id", document.getElementById('mtg_id').value);
                        var file = document.getElementById('mtg_document');
                        if(file.files.length != '0')
                        {
                            for (var i = 0; i < file.files.length; i++)
                            {
                                formData.append("mtg_document[]", document.getElementById('mtg_document').files[i]);
                            }
                        }
                        else
                            return;
                        $.ajax(
                        {
                            type: "POST",
                            url: baseUrl + "meeting/meeting_att_upload",
                            data: formData,
                            dataType: "json",
                            contentType: false, // The content type used when sending data to the server.
                            cache: false, // To unable request pages to be cached
                            processData: false,
                            success: function(response)
                            {
                                $('#attachment').modal('hide');
                                if (response.success == true)
                                {
                                    swal(
                                    {
                                        title: "Done",
                                        text: response.message,
                                        type: "success",
                                        icon: "success",
                                        button: true,
                                    }).then(()=>
                                    {
                                        window.location.href = response.linkn;
                                    });
                                }
                                else
                                {
                                    $('.btn_save').button('reset');
                                    swal(
                                    {
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
                    
                    function deleteMeeting(mtg_id)
                    {
                      cswal({
                        text : 'Do you want to delete this Entry?', 
                        title   : 'Done', 
                        type    : 'delete', 
                        onyes : function(){
                          $.ajax({
                            type: "POST",
                            url: baseUrl + "meeting-delete-"+mtg_id,
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
                              location.href = response.linkn;
                            }
                          });
                        }
                      });
                    }
                </script>
</body>
</html>
