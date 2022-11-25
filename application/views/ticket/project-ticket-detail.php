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
                                                        <span class="panel-title">Asset Management</span>&nbsp;&nbsp;
                                                        <a class="btn btn-edit" href="">
                                                            <i class="fa fa-edit">
                                                        </i>
                                                            <span class="btn-text"> Edit
                                                        </span>
                                                        </a>
                                                         <span class="btn client-visible-tag">Visible To Client</span>
                                                        <br>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 created-title">

                                                    <span class="created">Created By: Manit Singh
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: 27-03-2018
                                                    </span>
                                                   
                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom" style="border:2px solid;border-style: ridge;    border-top: none;">
                                                <tbody>                                                  
                                                    <tr>
                                                        <td>Ticket ID</td>
                                                        <td>T101293</td>
                                                        <td>Status</td>
                                                        <td>
                                                             <a href="javascript:;" id="ticketStatus" data-type="select" data-pk="1" data-value="" data-original-title="Status"> </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Assigned By</td>
                                                        <td>Ankita</td>
                                                        <td>Assigned To</td>
                                                        <td>
                                                            <a href="javascript:;" id="assignTo" data-type="select" data-pk="1" data-value="" data-original-title="Assigned Ticket To"> </a>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Created On</td>
                                                        <td>23-Jul-2018 02:58:PM (Yesterday)</td>
                                                        <td>Updated On</td>
                                                        <td>24-Jul-2018 08:23:AM (Yesterday )</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Project</td>
                                                        <td>Dream Project</td>
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
                                        <p>Asset Management fields mentioned in image below</p>
                                    </div>
                                </section>
                            </aside>
                            <aside class="profile-info col-lg-12">
                                <section class="panel">
                                    <div class="col-md-12">
                                        <label class="bold">Attachment <a data-toggle="modal" href="#attachment" class="attachments">+</a>
                                        </label>
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
                                      <input type="file" id="ppl_profile_image" name="ppl_profile_image" class="profile-image btn-file-view"> 
                                      </span>
                                <span class="custom-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green">Save changes</button>
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
        </div>

</body>

</html>