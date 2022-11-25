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
                                    <button class="btn green">
                                        <i class="fa fa-arrow-left"></i>
                                        <!-- Previous  -->
                                    </button>
                                </a>
                                <a href="#" class="next">
                                    <button class="btn green">
                                        <!-- Next --><i class="fa fa-arrow-right"></i>
                                    </button>
                                </a>
                            </div>
                        </div>

                        <!-- -----MAIN CONTENTS START HERE----- -->

                        <div class="row">

                            <aside class="profile-info col-lg-12">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info panel-body-detail-view">

                                        <header class="panel-heading color-primary panelHeading">
                                            <div class="row detail-box">
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <span class="detail-list-heading">Milestone Details</span><br>
                                                    <div class="row inner-row">
                                                        <span class="panel-title">
                                                            Title Name
                                                        </span>&nbsp;&nbsp;
                                                        <a class="btn-edit" href="#">
                                                            <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                        </a>
                                                        <input type="hidden" value="#" / >
                                                        <br>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4 col-xs-12 created-title">

                                                    <span class="created">Created By: Nick Dave
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: 23-08-2017
                                                    </span>
                                                    <br>

                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom table-detail-custom table-style">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-user list-level"></i>Name</td>
                                                        <td>Milestone Details</td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>Date</td>
                                                        <td>22/3/2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-users list-level"></i>Team</td>
                                                        <td>Pooja</td>
                                                        <td><i class="fas fa-info-circle list-level"></i>Status</td>
                                                        <td>Pending</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-project-diagram list-level"></i>Project</td>
                                                        <td>Easy Now</td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>Task</td>
                                                        <td>My Task</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-address-card list-level"></i>Description</td>
                                                        <td colspan="3">Genral Parameter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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


        <div class="js-scripts">

            <?php $this->load->view('common/footer_scripts'); ?>


                <!-- OPTIONAL SCRIPTS -->

                <!-- END OPTIONAL SCRIPTS -->

        </div>

</body>

</html>
