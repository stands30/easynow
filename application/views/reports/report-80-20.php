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
        <link href="<?php echo base_url(); ?>assets/module/reports/css/report-80-20.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
         <!-- BEGIN PAGE LEVEL PLUGINS -->
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
                     <!--  <div class="row">
                        <div class="col-md-6">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                
                                <span class="caption-subject  bold">Customer Sales 80/20
                                </span> &nbsp;
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>     -->                 
                      <div class="row">
                        
                        
                        <div class="col-md-6">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Customer Sales 80/20
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body dashboard-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <span class="uppercase dashbord-sub-title">
                                    Top
                                  </span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('top-customer-report-80-20'); ?>">
                                    <div class="content-section">
                                      <h4>12</h4>
                                      <h2 class="">20 % Customer</h2>
                                        <i class="fa fa-user icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('top-customer-report-80-20'); ?>">
                                    <div class="content-section content-section-last">
                                      <h4>26,32,050</h4>
                                      <h2>80 % Amount</h2> 
                                        <i class="fas fa-rupee-sign icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>
                                
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <hr>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <span class="uppercase dashbord-sub-title">
                                    Bottom
                                  </span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('bottom-customer-report-80-20'); ?>">
                                    <div class="content-section">
                                      <h4>58</h4>
                                      <h2 class="">80 % Customer</h2>
                                        <i class="fa fa-user icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('bottom-customer-report-80-20'); ?>">
                                    <div class="content-section content-section-last">
                                      <h4>7,88,000</h4>
                                      <h2>20 % Amount</h2> 
                                        <i class="fas fa-rupee-sign icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>

                                </div>
                              </div>
                            </div>
                        </div>

                          <div class="col-md-6">
                            <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Product Sales 80/20
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body dashboard-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <span class="uppercase dashbord-sub-title">
                                    Top
                                  </span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('top-product-report-80-20'); ?>">
                                    <div class="content-section">
                                      <h4>3</h4>
                                      <h2 class="">20 % Product</h2>
                                        <i class="fa fa-cart-plus icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('top-product-report-80-20'); ?>">
                                    <div class="content-section content-section-last">
                                      <h4>28,80,000</h4>
                                      <h2>80 % Amount</h2> 
                                        <i class="fas fa-rupee-sign icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>
                                
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <hr>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <span class="uppercase dashbord-sub-title">
                                    Bottom
                                  </span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('bottom-product-report-80-20'); ?>">
                                    <div class="content-section">
                                      <h4>13</h4>
                                      <h2 class="">80 % Product</h2>
                                        <i class="fa fa-cart-plus icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('bottom-product-report-80-20'); ?>">
                                    <div class="content-section content-section-last">
                                      <h4>6,00,480</h4>
                                      <h2>20 % Amount</h2> 
                                        <i class="fas fa-rupee-sign icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>

                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                        <div class="row">
                        
                        
                        <div class="col-md-6">
                          <div class="portlet light bordered">
                            <div class="portlet-title">
                              <div class="caption font-dark">
                                <!-- <i class="icon-settings font-dark"></i> -->
                                <span class="caption-subject  bold">Team Sales 80/20
                                </span> &nbsp;
                              </div>
                            </div>
                            <div class="portlet-body dashboard-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <span class="uppercase dashbord-sub-title">
                                    Top
                                  </span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('team-report-80-20'); ?>">
                                    <div class="content-section">
                                      <h4>1</h4>
                                      <h2 class="">20 % Team</h2>
                                        <i class="fa fa-users icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('team-report-80-20'); ?>">
                                    <div class="content-section content-section-last">
                                      <h4>30,70,280</h4>
                                      <h2>80 % Amount</h2> 
                                        <i class="fas fa-rupee-sign icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>
                                
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <hr>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <span class="uppercase dashbord-sub-title">
                                    Bottom
                                  </span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('team-report-80-20'); ?>">
                                    <div class="content-section">
                                      <h4>3</h4>
                                      <h2 class="">80 % Team</h2>
                                        <i class="fa fa-users icon-customer-dashboard"></i>
                                    </div>
                                  </a>
                                </div>
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('team-report-80-20'); ?>">
                                    <div class="content-section content-section-last">
                                      <h4>5,78,419</h4>
                                      <h2>20 % Amount</h2> 
                                        <i class="fas fa-rupee-sign icon-customer-dashboard"></i>
                                    </div>
                                  </a>
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
        </div>

    </body>

    </html>
