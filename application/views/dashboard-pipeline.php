<!DOCTYPE html>
    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <title>Dashboard</title>

        <head>
            <?php $this->load->view('common/header_styles'); ?>
            <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-pipeline-custom.css" rel="stylesheet" type="text/css" /> <!-- BEGIN PAGE LEVEL PLUGINS -->
            <style media="screen">
            
            </style>
        </head>

        <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
            <?php $this->load->view('common/header'); ?>
            <div class="clearfix"> </div>
            <!-- BEGIN CONTAINER -->
            <div class="page-container" >
                <?php $this->load->view('common/sidebar'); ?>
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper" >
                    <!-- BEGIN CONTENT BODY -->
                    <div class="">
                    <div class="page-content color">

                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->
                        <div class="portlet">
                            <div class="row">
                              <div class="container-fluid">
                                <div class="col-md-12">
                                  <ul class="nav nav-tabs" style="margin-bottom:0px;">
                                    <li class="active">
                                        <a href="#tab_people" data-toggle="tab" aria-expanded="true"> People </a>
                                    </li>
                                    <li class="">
                                        <a href="#tab_company" data-toggle="tab" aria-expanded="false">Company</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                  <div class="tab-pane fade active in" id="tab_people">
                                    <div class="col-md-12 tab-paper">
                                      <div class="col-md-12 no-side-padding text-left">
                                        <h3 class="pipeline-title">People</h3>
                                      </div>
                                      <div class="col-md-12 pipline-module">
                                        <div class="pipeline-main-box">
                                          <ul class="pipeline-main-start">

                                            <li>
                                              <div class="stage-block">
                                                <div class="stage-heading">
                                                  <a href="#" class="">Lead In</a>
                                                </div>
                                                <div class="stage-count">
                                                  <p>100% probability</p>
                                                </div>
                                              </div>

                                            </li>

                                            <li>
                                              <div class="stage-block">
                                                <div class="stage-heading">
                                                  <a href="#" class="">Needs Define</a>
                                                </div>
                                                <div class="stage-count">
                                                  <p>100% probability</p>
                                                </div>
                                              </div>

                                            </li>
                                            <li>
                                              <div class="stage-block">
                                                <div class="stage-heading">
                                                  <a href="#" class="">Contact Made</a>
                                                </div>
                                                <div class="stage-count">
                                                  <p>100% probability</p>
                                                </div>
                                              </div>

                                            </li>
                                            <li>
                                              <div class="stage-block">
                                                <div class="stage-heading">
                                                  <a href="#" class="">Top Profile</a>
                                                </div>
                                                <div class="stage-count">
                                                  <p>100% probability</p>
                                                </div>
                                              </div>

                                            </li>
                                            <li>
                                              <div class="stage-block">
                                                <div class="stage-heading">
                                                  <a href="#" class="">Negotiations Started</a>
                                                </div>
                                                <div class="stage-count">
                                                  <p>100% probability</p>
                                                </div>
                                              </div>

                                            </li>

                                          </ul>

                                        </div>
                                      </div>


                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="tab_company">
                                    <div class="col-md-12 tab-paper">
                                      <div class="col-md-12 no-side-padding text-left">
                                        <h3 class="pipeline-title">Company</h3>
                                      </div>
                                      <div class="col-md-12 pipline-module">
                                        <div class="pipeline-main-box">
                                          <ul class="pipeline-main-start">
                                            <li>
                                              <div class="stage-block">
                                                <div class="stage-heading">
                                                  <a href="#" class="">Top Profile</a>
                                                </div>
                                                <div class="stage-count">
                                                  <p>100% probability</p>
                                                </div>
                                              </div>

                                            </li>
                                            <li>
                                              <div class="stage-block">
                                                <div class="stage-heading">
                                                  <a href="#" class="">Contact Made</a>
                                                </div>
                                                <div class="stage-count">
                                                  <p>100% probability</p>
                                                </div>
                                              </div>

                                            </li>
                                            <li>
                                              <div class="stage-block">
                                                <div class="stage-heading">
                                                  <a href="#" class="">Lead In</a>
                                                </div>
                                                <div class="stage-count">
                                                  <p>100% probability</p>
                                                </div>
                                              </div>

                                            </li>

                                            <li>
                                              <div class="stage-block">
                                                <div class="stage-heading">
                                                  <a href="#" class="">Needs Define</a>
                                                </div>
                                                <div class="stage-count">
                                                  <p>100% probability</p>
                                                </div>
                                              </div>

                                            </li>

                                            <li>
                                              <div class="stage-block">
                                                <div class="stage-heading">
                                                  <a href="#" class="">Negotiations Started</a>
                                                </div>
                                                <div class="stage-count">
                                                  <p>100% probability</p>
                                                </div>
                                              </div>

                                            </li>

                                          </ul>

                                        </div>
                                      </div>


                                    </div>
                                  </div>






                                 </div>
                              </div>
                            </div>
                        </div>

                      </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <div class="js-scripts">

                <?php $this->load->view('common/footer_scripts'); ?>

                <!-- OPTIONAL SCRIPTS -->
                <script src="<?php echo base_url(); ?>/assets/project/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>/assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>/assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js" type="text/javascript"></script>
                <!-- END OPTIONAL SCRIPTS -->



            </div>
        </body>
    </html>
