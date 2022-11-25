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
        
         <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/inputs-ext/address/address.css" rel="stylesheet" type="text/css" />
       <link href="<?php echo base_url(); ?>assets/module/ticket/css/ticket.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
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
                            <div class="breadcrumb-button">

                                <a href="#" class=" previous" title="">
                                    <button id="newlead" class="btn green">
                                        <i class="fa fa-arrow-left"></i>
                                        <!-- Previous  -->
                                    </button>
                                </a>
                                <a href="#" class="next">
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
                                    <div class="panel-body bio-graph-info">

                                        <header class="panel-heading color-primary panelHeading">
                                            <div class="row detail-box">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row inner-row">
                                                        <span class="panel-title">
                                                            <?php if(isset($ticket_data->tck_no)) echo $ticket_data->tck_no; ?>
                                                        </span>&nbsp;&nbsp;
                                                        <a class="btn-edit" href="<?php echo base_url('ticket-edit-'.$ticket_data->tck_id_encrypt);?>">
                                                            <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                        </a>
                                                        <input id="tck_id" type="hidden" value="<?php echo $ticket_data->tck_id_encrypt;?>" / >
                                                        <br>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 created-title">

                                                    <span class="created">Created By: <?php if(isset($ticket_data->tck_crdt_by_name)) echo $ticket_data->tck_crdt_by_name; ?>
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: <?php if(isset($ticket_data->tck_crdt_dt_format)) echo $ticket_data->tck_crdt_dt_format; ?>
                                                    </span>
                                                    <br>
                                                    
                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom" style="border:2px solid;border-style: ridge;    border-top: none;">
                                                <tbody>
                                                
                                                    <tr>
                                                        <td>Ticket ID</td>
                                                        <td><?php if(isset($ticket_data->tck_no)) echo $ticket_data->tck_no; ?></td>
                                                        <td>Status</td>
                                                        <td>
                                                            <?php if(isset($ticket_data->tck_progress_status_name)) echo $ticket_data->tck_progress_status_name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Assigned By</td>
                                                        <td>
                                                            <?php if(isset($ticket_data->tck_user_ass_by_name)) echo $ticket_data->tck_user_ass_by_name; ?></td>
                                                        <td>Assigned To</td>
                                                        <td>
                                                            <?php if(isset($ticket_data->tck_user_ass_to_name)) echo $ticket_data->tck_user_ass_to_name; ?>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Created On</td>
                                                        <td><?php if(isset($ticket_data->tck_crdt_dt_format)) echo $ticket_data->tck_crdt_dt_format; ?></td>
                                                        <td>Updated On</td>
                                                        <td><?php if(isset($ticket_data->tck_updt_dt_format)) echo $ticket_data->tck_updt_dt_format; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Project</td>
                                                        <td><?php if(isset($ticket_data->tck_user_ass_to_name)) echo $ticket_data->tck_user_ass_to_name; ?></td>
                                                        <td>Priority</td>
                                                        <td><span class="project-tag">High</span></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Type</td>
                                                        <td>New Feature</td>
                                                        <td>Due Date</td>
                                                        <td></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </aside>
                            <aside class="profile-info col-lg-12 mb-40">
                                <section class="panel">
                                    <div class="col-md-12">
                                        <label class="bold">Description
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <p><?php if(isset($ticket_data->tck_desc)) echo $ticket_data->tck_desc; ?></p>
                                    </div>
                                </section>
                            </aside>
                            <aside class="profile-info col-lg-12">
                                <section class="panel">
                                    <div class="col-md-12">
                                        <label class="bold">Attachment <a data-toggle="modal" href="#attachment" class="attachments">+</a>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <br />

<?php 
                                    foreach ($ticket_att_data as $attachment) {
?>
                                        <label class="col-md-12">
                                            <a href="<?php echo TICKET_DOC.$attachment->tka_name;?>" target="_blank">
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
                                      <input type="file" id="tck_document" name="tck_document" class="profile-image btn-file-view"> 
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
             <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery.mockjax.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/form-editable.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo ci_asset_versn(); ?>" type="text/javascript"></script>
                <!-- OPTIONAL SCRIPTS -->

                <!-- END OPTIONAL SCRIPTS -->

               
                <script type="text/javascript">
                    $('#ticketStatus').editable({
                    prepend: "Open",
                    inputclass: 'form-control',
                    source: [{
                        value: 1,
                        text: 'Devlopment'
                    }, {
                        value: 2,
                        text: 'Rework'
                    },{
                        value: 3,
                        text: 'Planning'
                    }],

                    display: function(value, sourceData) {
                        var colors = {
                                "": "gray",
                                1: "green",
                                2: "blue"
                            },
                            elem = $.grep(sourceData, function(o) {
                                return o.value == value;
                            });

                        if (elem.length) {
                            $(this).text(elem[0].text).css("color", colors[value]);
                        } else {
                            $(this).empty();
                        }
                    }
                });
                </script>
                <script type="text/javascript">
                    $('#assignTo').editable({
                    prepend: "Siddhi",
                    inputclass: 'form-control',
                    source: [{
                        value: 1,
                        text: 'Vinita'
                    }, {
                        value: 2,
                        text: 'Om'
                    },{
                        value: 3,
                        text: 'Rohan'
                    }],

                    display: function(value, sourceData) {
                        var colors = {
                                "": "gray",
                                1: "green",
                                2: "blue"
                            },
                            elem = $.grep(sourceData, function(o) {
                                return o.value == value;
                            });

                        if (elem.length) {
                            $(this).text(elem[0].text).css("color", colors[value]);
                        } else {
                            $(this).empty();
                        }
                    }
                });
                </script>

                <script type="text/javascript">
                    
                    function uploadAttachment()
                    {
                        var formData = new FormData();

                        formData.append("tck_id", document.getElementById('tck_id').value);

                        var file = document.getElementById('tck_document');

                        if(file.files.length != '0') 
                        {
                            for (var i = 0; i < file.files.length; i++) 
                            {   
                                formData.append("tck_document[]", document.getElementById('tck_document').files[i]);
                            }
                        }
                        else
                            return;

                        $.ajax(
                        {
                            type: "POST",
                            url: baseUrl + "ticket/ticket_att_upload",
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
        </div>

</body>

</html>