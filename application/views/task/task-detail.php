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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                    <div class="page-content page-content-detail">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                            <div class="breadcrumb-button">
                                <a href="<?php echo base_url('task-detail-'.$task_data->prev_task_encrypt) ?>" class=" previous" title="">
                                    <button id="newlead" class="btn green">
                                        <i class="fa fa-arrow-left"></i>
                                        <!-- Previous  -->
                                    </button>
                                </a>
                                <a href="<?php echo base_url('task-detail-'.$task_data->next_task_encrypt) ?>" class="next">
                                    <button id="newlead" class="btn green">
                                        <!-- Next --><i class="fa fa-arrow-right"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!-- -----MAIN CONTENTS START HERE----- -->
                        <div class="row">
                            <aside class="profile-info col-lg-12">

                                <section class="panel">
                                    <!-- <label>make drop down editable for Assigned To,Supporter,Reviewer,Status,Task Type,Priority, People,Lead,Account</label> -->
                                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                        <header class="panel-heading color-primary panelHeading">
                                            <div class="row detail-box">
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <span class="detail-list-heading">Task Details</span><br>
                                                    <div class="row inner-row">
                                                        <span class="panel-title">
                                                            <?php if(isset($task_data->tsk_title)) echo $task_data->tsk_title; ?>
                                                        </span>&nbsp;&nbsp;
                                                        <?php if($edit_access) { ?>
                                                        <a class="btn-edit" href="<?php echo base_url('task-edit-'.$task_data->tsk_id_encrypt);?>">
                                                            <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                        </a>
                                                      <?php } ?>
                                                        <?php if($delete_access) { ?>
                                                        <a class="btn-edit" onclick="deleteTasks('<?php echo $task_data->tsk_id_encrypt; ?>')">
                                                            <i class="fa fa-trash"></i><span class="btn-text"> Delete</span>
                                                        </a>
                                                      <?php } ?>
                                                        <input id="tsk_id_encrypt" type="hidden" value="<?php echo $task_data->tsk_id_encrypt;?>" / >
                                                        <input id="tsk_id" type="hidden" value="<?php echo $task_data->tsk_id;?>" / >
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                    <span class="created">Created By: <?php if(isset($task_data->tsk_crdt_by_name)) echo $task_data->tsk_crdt_by_name; ?>
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: <?php if(isset($task_data->tsk_crdt_dt_format)) echo display_date($task_data->tsk_crdt_dt); ?>
                                                    </span>
                                                    <br>
                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom table-detail-custom table-style" >
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-user list-level"></i>Assigned To</td>
                                                        <td>
                                                            <a href="javascript:;" id="tsk_user_ass_to" class="tsk_user_ass_to task-userassigned-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Select Assigned To" data-original-title="Select Assigned To" data-custom_select2_id="<?php echo $task_data->tsk_user_ass_to; ?>" data-custom_select2_name="<?php echo $task_data->tsk_user_ass_to_name; ?>"  data-gnp-grp="tsk_user_ass_to"><?php if(isset($task_data->tsk_user_ass_to_name)) echo $task_data->tsk_user_ass_to_name; ?> </a>
                                                        </td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>Due Date</td>
                                                        <td><?php if(isset($task_data->tsk_due_dt_format)) echo display_date($task_data->tsk_due_dt); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-user list-level"></i>Supporter</td>
                                                        <td>
                                                            <a href="javascript:;" id="tsk_supporter" class="tsk_supporter task-supported-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Select Supporter Name" data-original-title="Select Supporter Name" data-custom_select2_id="<?php echo $task_data->tsk_supporter; ?>" data-custom_select2_name="<?php echo $task_data->tsk_supporter_name; ?>"  data-gnp-grp="tsk_supporter"><?php if(isset($task_data->tsk_supporter_name)) echo $task_data->tsk_supporter_name; ?> </a>
                                                        </td>
                                                        <td><i class="fas fa-user list-level"></i>Reviewer</td>
                                                        <td>
                                                            <a href="javascript:;" id="tsk_reviewer" class="tsk_reviewer task-reviewer-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Reviewer Name" data-original-title="Select Reviewer Name" data-custom_select2_id="<?php echo $task_data->tsk_reviewer; ?>" data-custom_select2_name="<?php echo $task_data->tsk_reviewer_name; ?>"  data-gnp-grp="tsk_reviewer"><?php if(isset($task_data->tsk_reviewer_name)) echo $task_data->tsk_reviewer_name; ?> </a>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-info-circle list-level"></i>Status</td>
                                                        <td>
                                                            <a href="javascript:;" id="tsk_progress_status" class="tsk_progress_status task-progress-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Reviewer Name" data-original-title="Select Reviewer Name" data-custom_select2_id="<?php echo $task_data->tsk_progress_status; ?>" data-custom_select2_name="<?php echo $task_data->tsk_progress_status_name; ?>"  data-gnp-grp="tsk_progress_status"><?php if(isset($task_data->tsk_progress_status_name)) echo $task_data->tsk_progress_status_name; ?> </a>
                                                        </td> 
                                                        <td><i class="fas fa-address-card list-level"></i>Task Type</td>
                                                        <td>
                                                            <a href="javascript:;" id="tsk_type" class="tsk_type task-type-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Reviewer Name" data-original-title="Select Reviewer Name" data-custom_select2_id="<?php echo $task_data->tsk_type; ?>" data-custom_select2_name="<?php echo $task_data->tsk_type_name; ?>"  data-gnp-grp="tsk_type"><?php if(isset($task_data->tsk_type_name)) echo $task_data->tsk_type_name; ?> </a>
                                                            </td>                                               
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-flag list-level"></i>Priority</td>
                                                        <td>
                                                            <a href="javascript:;" id="tsk_priority" class="tsk_priority task-priority-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Reviewer Name" data-original-title="Select Reviewer Name" data-custom_select2_id="<?php echo $task_data->tsk_priority; ?>" data-custom_select2_name="<?php echo $task_data->tsk_priority_name; ?>"  data-gnp-grp="tsk_priority"><?php if(isset($task_data->tsk_priority_name)) echo $task_data->tsk_priority_name; ?> </a>
                                                            </td>
                                                        <td><i class="fas fa-user list-level"></i>Related People</td>
                                                        <td>
                                                            <a href="javascript:;" id="tsk_related_ppl" class="tsk_related_ppl task-related-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Related People" data-original-title="Select Related People" data-custom_select2_id="<?php echo $task_data->tsk_related_ppl; ?>" data-custom_select2_name="<?php echo $task_data->tsk_related_ppl_name; ?>"  data-gnp-grp="tsk_related_ppl"><?php if(isset($task_data->tsk_related_ppl_name)) echo $task_data->tsk_related_ppl_name; ?> </a>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-user list-level"></i>Related Lead</td>
                                                        <td>
                                                            <a href="javascript:;" id="tsk_led_id" class="tsk_led_id task-lead-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Related Lead Name" data-original-title="Related Lead Name" data-custom_select2_id="<?php echo $task_data->tsk_led_id; ?>" data-custom_select2_name="<?php echo $task_data->tsk_lead_name; ?>"  data-gnp-grp="tsk_led_id"><?php if(isset($task_data->tsk_lead_name)) echo $task_data->tsk_lead_name; ?> </a>
                                                                
                                                            </td>
                                                        <td><i class="fas fa-user-tie list-level"></i>Related Account</td>
                                                        <td>
                                                            <a href="javascript:;" id="tsk_related_cmp" class="tsk_related_cmp task-related_company-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Related Company" data-original-title="Select Related Company" data-custom_select2_id="<?php echo $task_data->tsk_related_cmp; ?>" data-custom_select2_name="<?php echo $task_data->tsk_related_cmp_name; ?>"  data-gnp-grp="tsk_related_cmp"><?php if(isset($task_data->tsk_related_cmp_name)) echo $task_data->tsk_related_cmp_name; ?> </a>
                                                        </td>
                                                    </tr>
                                                    <!-- <tr>
                                                       <td><i class="fas fa-calendar-alt list-level"></i>Updated On</td>
                                                        <td colspan="3"><?php if(isset($task_data->tsk_updt_dt_format)) echo $task_data->tsk_updt_dt_format; ?></td>
                                                    </tr> -->

                                                    
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
                                             <p><?php if(isset($task_data->tsk_desc)) echo $task_data->tsk_desc; ?></p>
                                        </div>
                                    </div>
                                </section>
                                
                            </aside>

                            <!-- <aside class="profile-info col-lg-12 mb-40">
                                <section class="">
                                    <div class="col-md-12">
                                        <label class="bold">Description
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <p><?php if(isset($task_data->tsk_desc)) echo $task_data->tsk_desc; ?></p>
                                    </div>
                                </section>
                            </aside> -->
                            <aside class="profile-info col-lg-12">
                                <section class="">
                                    <div class="col-md-12">
                                        <label class="bold">Attachment <a data-toggle="modal" href="#attachment" class="attachments">+</a>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <br />
<?php
                                    foreach ($task_att_data as $attachment) {
?>
                                        <label class="col-md-12 no-side-padding">
                                            <a href="<?php echo TASK_DOC.$attachment->tka_name;?>" target="_blank">
                                                <i class="fa fa-paperclip"></i> &nbsp;<?php echo $attachment->tka_name;?>
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
                                      <input type="file" id="tsk_document" name="tsk_document" class="profile-image btn-file-view">
                                      </span>
                                <span class="custom-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="uploadAttachment()" class="btn green">Upload Document</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Modal Ends here -->
        <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?>
            <!-- OPTIONAL SCRIPTS -->
           
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
            </script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
           
                <script type="text/javascript">

                    $(document).ready(function(){
                        initEditable();
                    })

                    function initEditable()
                    {
                        var primary_key     = 'tsk_id';
                        var updateUrl       = baseUrl + 'task/updateTaskCustomData';
                        
                        var editableElement = '.task-userassigned-editable';
                        var select2Class    = 'task_userassigned_select2';
                        var dropdownUrl     = 'task/getEmployeeforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.task-supported-editable';
                        var select2Class    = 'task_supported_select2';
                        var dropdownUrl     = 'task/getEmployeeforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.task-reviewer-editable';
                        var select2Class    = 'task_reviewer_select2';
                        var dropdownUrl     = 'task/getEmployeeforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.task-progress-editable';
                        var select2Class    = 'task_progress_select2';
                        var dropdownUrl     = 'task/getGenPrmforDropdown/tsk_progress_status/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.task-type-editable';
                        var select2Class    = 'task_type_select2';
                        var dropdownUrl     = 'task/getGenPrmforDropdown/tsk_type/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.task-priority-editable';
                        var select2Class    = 'task_priority_select2';
                        var dropdownUrl     = 'task/getGenPrmforDropdown/tsk_priority/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.task-lead-editable';
                        var select2Class    = 'task_lead_select2';
                        var dropdownUrl     = 'task/getLeadforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                        
                        var editableElement = '.task-related-editable';
                        var select2Class    = 'task_related_select2';
                        var dropdownUrl     = 'task/getPeopleforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);     
                        
                        var editableElement = '.task-related_company-editable';
                        var select2Class    = 'task_related_company_select2';
                        var dropdownUrl     = 'task/getAccountforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);                    }
                    
                    function toggleDetailView()
                    {
                        $('.toggle_tr').toggleClass('hidden');
                    }
                    function uploadAttachment()
                    {
                        var formData = new FormData();
                        formData.append("tsk_id", document.getElementById('tsk_id_encrypt').value);
                        var file = document.getElementById('tsk_document');
                        if(file.files.length != '0')
                        {
                            for (var i = 0; i < file.files.length; i++)
                            {
                                formData.append("tsk_document[]", document.getElementById('tsk_document').files[i]);
                            }
                        }
                        else
                            return;
                        $.ajax(
                        {
                            type: "POST",
                            url: baseUrl + "task/task_att_upload",
                            data: formData,
                            dataType: "json",
                            contentType: false, // The content type used when sending data to the server.
                            cache: false, // To unable request pages to be cached
                            processData: false,
                            success: function(response)
                            {
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

                    function deleteTasks(leadid)
                    {
                      cswal({
                        text : 'Do you want to delete this Task?', 
                        title   : 'Done', 
                        type    : 'delete', 
                        onyes : function(){
                          $.ajax({
                            type: "POST",
                            url: baseUrl + "task-delete-"+leadid,
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
        </div>
</body>
</html>
