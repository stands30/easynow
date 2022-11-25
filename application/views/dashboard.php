<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>

    <head>
        
        <?php $this->load->view('common/header_styles'); ?> 
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-main.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <?php $this->load->view('common/header'); ?> 
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
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- END PAGE HEADER-->
                    <div class="portlet">
                        <div class="row">
                            <!-- END PAGE HEADER-->
                            <div class="container-fluid">
                                <div class="row widget-row">                                    
                                    <!-- <div class="col-md-12"> -->
                                        <div class="col-md-6">
                                            <div class="mt-widget-4">
                                                <div class="mt-img-container">
                                                    <img src="<?php echo base_url(); ?>assets/project/images/dashboard-images/main/37.jpg">
                                                </div>
                                                <div class="mt-container widget-overlay bg-dark-opacity">
                                                    <div class="mt-head-title">
                                                        <h4>The best preparation for tomorrow is doing your best today</h4>
                                                    </div>
                                                    <div class="mt-footer-button">
                                                        <a href="<?php echo base_url('dashboard-my-day'); ?>" class="btn btn-circle btn-sm btn-my-day">My Day</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <!-- </div> -->
                                </div>
                              <!--   <div class="row">
                                    <div class="col-md-12">                                                         
                                        <a href="<?php echo base_url('dashboard-my-day'); ?>" class="btn green btn-add-new">My Day</a>
                                    </div>
                                </div> -->
                                <!-- -----MAIN CONTENTS START HERE----- -->
                                <div class="row widget-row">

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="<?php echo base_url(); ?>">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">

                                                    <small class="text-center mb-5 people-title">Today's Follow up</small>
                                                    <div class="special special-people">
                                                        <span><?php echo $today_follow_up->flp_count; ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="<?php echo $today_follow_up->flp_count; ?>"><?php echo number_format($today_follow_up->flp_count); ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="<?php echo base_url(); ?>">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">

                                                    <small class="text-center mb-5 people-title">Sales Pipeline</small>
                                                    <div class="special special-people">
                                                        <span><?php echo $sales->led_count ?></span>
                                                    </div>
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="<?php echo $sales->led_amt ?>"><?php echo number_format($sales->led_amt); ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                    <?php 
                                    foreach ($lead_status as $leadStatuskey ) { ?>
                                      <?php if($leadStatuskey->lead_status_count > 0){
                                        switch ($leadStatuskey->gnp_value) {
                                        case LEAD_STATUS_HOT:
                                              $lead_encrypt_status = $this->nextasy_url_encrypt->encrypt_openssl($leadStatuskey->gnp_value);
                                              $url = base_url('lead-status-list-'.$lead_encrypt_status);
                                          break;
                                        case LEAD_STATUS_CHILLED:
                                              $lead_encrypt_status = $this->nextasy_url_encrypt->encrypt_openssl($leadStatuskey->gnp_value);
                                              $url = base_url('lead-status-list-'.$lead_encrypt_status);
                                          break;
                                        default:
                                            $url = base_url();
                                          break;
                                      }}else
                                      {
                                        $url = base_url();

                                      }
                                      ?>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a href="<?php echo $url ?>">
                                            <div class="dashboard-stat2 boxes-main people-list">
                                                <div class="display">

                                                    <small class="text-center mb-5 people-title"><?php echo $leadStatuskey->lead_status ?></small>
                                                    <!-- <div class="special">
                                                        <span>25</span>
                                                    </div> -->
                                                    <div class="icon people-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        
                                                    </div>
                                                    <div class="number">
                                                        
                                                        <h3 class="font-green-sharp">
                                                            <span data-counter="counterup" data-value="<?php echo $leadStatuskey->lead_status_count ?>"><?php echo $leadStatuskey->lead_status_count ?></span>                                                         
                                                        </h3>
                                                        
                                                    </div>
                                                    
                                                </div>                                               
                                            </div>
                                        </a>
                                    </div>
                                   <?php }
                                     ?>
                                    
                                </div>

                                <!-- -----MAIN CONTENTS END HERE----- -->

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

            <script type="text/javascript">
                var baseUrl = '<?php echo base_url(); ?>';
                var assetCtr = baseUrl + 'asset/';

                $('.nav-item').removeClass('active');
                $('#nav_dashboard').addClass('active'); 

            </script>

        </div>
    </body>
</html>