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

            <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-customs.css" rel="stylesheet" type="text/css" /> <!-- BEGIN PAGE LEVEL PLUGINS -->

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
                            <div class="col-md-0">
                             <!--  <button>click</button><br> -->
                             
                              <a id="sample_editable_1_new" href="<?php echo base_url('dashboard-my-day'); ?>" class="btn green btn-add-new">My Day</a>
                            </div><br>

                            <div class="row">

                              <div class="container-fluid">

                                <div class="row">

                                  <!--first  -->

                                   <div class="col-md-3 col-sm-6">

                                     <div class="boxes-main">

                                       <!--Hedaer -->

                                       <div class="module-box">

                                         <div class="module-text" >

                                           <!-- Main title-->

                                           <div class="module-box-title module-box-title-first">

                                             <a href="#">Total Amount Closed </a>

                                           </div>

                                           <!-- sub tilte -->

                                           <div class="module-sub-box">

                                             <a href="#">Currrent FY</a>

                                           </div>

                                         </div>

                                         <!--display arrow  -->



                                       </div>

                                       <!-- Header ends-->

                                       <!-- amount start  here-->

                                       <div class="module-amount">

                                         <a href="#">$236,4565</a>

                                       </div>

                                          <!-- amount ends  here-->

                                          <!-- footer link start here -->

                                       <div class="module-link">

                                         <a href="#" class="dashboard-link">View Report</a>

                                       </div>

                                     </div>

                                   </div>

                                   <!--first  -->

                                   <!--second  -->

                                   <div class="col-md-3 col-sm-6">

                                     <div class="boxes-main">

                                       <!--Hedaer -->

                                       <div class="module-box">

                                         <div class="module-text" >

                                           <!-- Main title-->

                                           <div class="module-box-title module-box-title-second">

                                             <a href="#">Track Updated Details</a>

                                           </div>



                                         </div>

                                         <!--display arrow  -->



                                       </div>

                                       <!-- Header ends-->

                                       <!-- middle section start here -->

                                       <div class="module-middle">

                                         <div class="module-middle-icon">

                                           <div class="middle-icon">

                                             <span class="middle-chart"><i class="fas fa-chart-bar"></i></span>

                                           </div>



                                         </div>

                                         <div class="module-middle-text module-middle-text-first">

                                           <a href="#">9.4</a>

                                         </div>

                                       </div>

                                        <!-- middle section start here -->

                                          <!-- footer link start here -->

                                       <div class="module-link">

                                         <a href="#" class="dashboard-link">View Detail Report</a>

                                       </div>

                                     </div>

                                   </div>

                                   <!--second  -->

                                   <!--third  -->

                                   <div class="col-md-3 col-sm-6">

                                     <div class="boxes-main">

                                       <!--Hedaer -->

                                       <div class="module-box">

                                         <div class="module-text" >

                                           <!-- Main title-->

                                           <div class="module-box-title">

                                             <a href="#">Average Deal Size</a>

                                           </div>

                                           <!-- sub tilte -->

                                           <div class="module-sub-box">

                                             <a href="#">Deal</a>

                                           </div>

                                         </div>

                                         <!--display arrow  -->



                                       </div>

                                       <!-- Header ends-->

                                       <!-- middle section start here -->

                                       <div class="main-middle">

                                         <a href="#">4.5</a>

                                       </div>

                                        <!-- middle section start here -->

                                          <!-- footer link start here -->

                                          <div class="footer-sub-box">

                                            <a href="#">Closed Average Deal</a>

                                          </div>

                                       <div class="module-link">

                                         <a href="#" class="dashboard-link">View Report</a>

                                       </div>

                                     </div>

                                   </div>

                                   <!--third  -->

                                   <!--four  -->

                                   <div class="col-md-3 col-sm-6">

                                     <div class="boxes-main">

                                       <!--Hedaer -->

                                       <div class="module-box">

                                         <div class="module-text" >

                                           <!-- Main title-->

                                           <div class="module-box-title module-box-title-fourth">

                                             <a href="#">Visitors Track</a>

                                           </div>



                                         </div>

                                         <!--display arrow  -->



                                       </div>

                                       <!-- Header ends-->

                                       <!-- middle section start here -->

                                       <div class="module-middle">

                                         <div class="module-middle-icon">

                                           <div class="middle-icon-chart">

                                             <span class="middle-chart"><i class="fa fa-user"></i></span>

                                           </div>



                                         </div>

                                         <div class="module-middle-text module-middle-text-second">

                                           <a href="#">1,600</a>

                                         </div>

                                       </div>

                                        <!-- middle section start here -->

                                          <!-- footer link start here -->

                                       <div class="module-link">

                                         <a href="#" class="dashboard-link"module-box-title>View Detail Report</a>

                                       </div>

                                     </div>

                                   </div>

                                   <!-- four -->













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
