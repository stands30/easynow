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
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/email-template/css/email-template-custom.css<?php echo $global_asset_version ?>">
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
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
                              <input id="emt_id" type="hidden" value="<?php echo $emailTemp_data->emt_id_encrypt;?>" / >
                                <a href="<?php echo base_url('email-template-detail-'.$emailTemp_data->prev) ?>" class=" previous" title="">
                                    <button id="newlead" class="btn green">
                                        <i class="fa fa-arrow-left"></i>
                                        <!-- Previous  -->
                                    </button>
                                </a>
                                <a href="<?php echo base_url('email-template-detail-'.$emailTemp_data->next) ?>" class="next">
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
                                    <div class="panel-body bio-graph-info panel-body-detail-view ">
                                        <header class="panel-heading color-primary panelHeading">
                                            <div class="row detail-box">
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <span class="detail-list-heading">Email Template Details</span><br>
                                                    <div class="row inner-row">
                                                        <span class="panel-title">
                                                            <?php if(isset($emailTemp_data->emt_title) and !empty($emailTemp_data->emt_title)) echo $emailTemp_data->emt_title ?>
                                                        </span>&nbsp;&nbsp;
                                                        <?php if($edit_access) { ?>
                                                        <a class="btn-edit" href="<?php echo base_url('email-template-edit-'.$emailTemp_data->emt_id_encrypt) ?>">
                                                            <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                        </a>
                                                      <?php } ?>
                                                        <input type="hidden" value="#" / >
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                    <span class="created">Created By: <?php if(isset($emailTemp_data->emt_crdt_by_name) and !empty($emailTemp_data->emt_crdt_by_name)) echo $emailTemp_data->emt_crdt_by_name ?>
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: <?php if(isset($emailTemp_data->emt_crdt_dt_format) and !empty($emailTemp_data->emt_crdt_dt_format)) echo $emailTemp_data->emt_crdt_dt_format ?>
                                                    </span>
                                                    <br>
                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom table-detail-custom table-style">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-th-list list-level"></i>Title</td>
                                                        <td><?php if(isset($emailTemp_data->emt_title) and !empty($emailTemp_data->emt_title)) echo $emailTemp_data->emt_title ?></td>
                                                        <td><i class="fas fa-user list-level"></i>Sender Name</td>
                                                        <td><?php if(isset($emailTemp_data->emt_sender) and !empty($emailTemp_data->emt_sender)) echo $emailTemp_data->emt_sender ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="far fa-credit-card list-level"></i>Subject</td>
                                                        <td colspan="3"><?php if(isset($emailTemp_data->emt_subject) and !empty($emailTemp_data->emt_subject)) echo $emailTemp_data->emt_subject ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-envelope list-level"></i>CC</td>
                                                        <td><?php if(isset($emailTemp_data->emt_cc) and !empty($emailTemp_data->emt_cc)) echo $emailTemp_data->emt_cc ?></td>
                                                        <td><i class="fas fa-envelope list-level"></i>Reply To</td>
                                                        <td><?php if(isset($emailTemp_data->emt_reply_to) and !empty($emailTemp_data->emt_reply_to)) echo $emailTemp_data->emt_reply_to ?></td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </aside>
                            <aside class="profile-info col-lg-12 mb-40">
                                <section class="">
                                    <div class="col-md-12">
                                        <label class="bold">Description
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <p><?php if(isset($emailTemp_data->emt_description) and !empty($emailTemp_data->emt_description)) echo $emailTemp_data->emt_description ?></p>
                                    </div>
                                </section>
                            </aside>
                            <aside class="profile-info col-lg-12">
                                <section class="">
                                    <div class="col-md-12">
                                        <label class="bold">Attachment
                                          <?php if($add_access) { ?>
                                          <a data-toggle="modal" href="#attachment" class="attachments">+</a>
                                        <?php } ?>
                                        </label>
                      <?php
                                                          foreach ($emailTemp_att_data as $attachment) {
                      ?>
                                                              <label class="col-md-12">
                                                                  <a href="<?php echo EMAIL_DOC.$attachment->eta_name;?>" target="_blank">
                                                                      <i class="fa fa-paperclip"></i> &nbsp;<?php echo $attachment->eta_name;?>
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
                        
                        <div class="text-center">
                            
                            <h3 class="modal-title text-center">Add Attachment</h3>
                            <span class="sp_line color-primary text-center"></span>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body modal-body-attachments">
                        <div class="col-md-6 form-group fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 30px;">
                            <div class="image-preview" style="padding-left: 0px;">
                                <div id="image_preview"></div>
                                <span class="btn default btn-file btn-file-view">
                                      <input type="file" id="emt_document" name="emt_document" class="profile-image btn-file-view">
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
            <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
        
        </div>
        <script type="text/javascript">
            function uploadAttachment()
            {
                var formData = new FormData();
                formData.append("emt_id", document.getElementById('emt_id').value);
                var file = document.getElementById('emt_document');
                if(file.files.length != '0')
                {
                    for (var i = 0; i < file.files.length; i++)
                    {
                        formData.append("emt_document[]", document.getElementById('emt_document').files[i]);
                    }
                }
                else
                    return;
                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "emailTemplate/emt_att_upload",
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
        </script>
</body>
</html>
