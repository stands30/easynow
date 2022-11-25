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
    
    <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo base_url(); ?>assets/module/company/css/company-dashboard.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />   
     </style>
  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?> 
    <div class="clearfix"> 
    </div>
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
                <!-- -----MAIN CONTENTS START HERE----- -->
                <div class="row">                  
                  <div class="col-md-12">
                    <div class="boxes-main company-main-list">
                      <div class="row company-list">
                        <div class="col-md-2 col-sm-4 div-team">
                          <div class="total-team">
                            <a href="#">
                              <p class="team-title">Total Team</p>
                            </a>
                            <a href="#">
                              <h1 class="team-count team-total-value"><span class="team-icon"><i class="flaticon-collaboration"></i></span> 230</h1>
                             <!--  <i class="flaticon-check"></i>
                              <i class="flaticon-envelope"></i>
                              <i class="flaticon-left-arrow"></i>
                              
                              
                              
                              
                              <i class="flaticon-organization"></i> -->
                              
                            </a> 

                          </div>                          
                        </div>

                        <div class="col-md-2 col-sm-4 div-business">
                          <div class="total-team">
                            <a href="#">
                              <p class="team-title">Total Business</p>
                            </a>
                             <a href="#">
                              <h1 class="team-count team-bussiness-value"><span class="team-icon"><i class="flaticon-briefcase"></i></span> 1</h1>
                            </a>
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-4 div-paid">
                          <div class="total-team">
                            <a href="#">
                              <p class="team-title">Paid</p>
                            </a>
                             <a href="#">
                              <h1 class="team-count team-paid-value"><span class="team-icon"><i class="flaticon-purse"></i></span>2000</h1>
                            </a>
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-4 div-due">
                          <div class="total-team">
                            <a href="#">
                              <p class="team-title">Due</p>
                            </a>
                             <a href="#">
                              <h1 class="team-count team-due-value"><span class="team-icon"><i class="flaticon-indian-rupee"></i></span>20</h1>
                            </a>
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-4">
                          <div class="total-team">
                            <a href="#">
                              <p class="team-title">Outstanding</p>
                            </a>
                             <a href="#">
                              <h1 class="team-count team-outstanding-value"><span class="team-icon"><i class="flaticon-file"></i></span>20</h1>
                            </a>
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-4">
                          <div class="total-team">
                            <a href="#">
                              <p class="team-title">In Pipeline</p>
                            </a>
                             <a href="#">
                              <h1 class="team-count team-pipeline-value"><span class="team-icon"><i class="flaticon-analysis"></i></span>20</h1>
                            </a>
                          </div>
                        </div>
                      </div>                      
                    </div>                                      
                  </div> 
                  <div class="col-md-4 col-sm-6">
                    <div class="boxes-main company-main-list">
                      <div class="row company-ticket-list">
                        <div class="col-md-6 col-sm-6 ticket-main">
                          <span class="ticket-list ticket-list-open">
                            <i class="flaticon-open-folder-with-document"></i>
                          </span>   
                          <div class="ticket-count">
                            <a href="#"><h1>23</h1></a>
                          </div>                      
                          <div class="ticket-details">
                            <a href="#"><h3>Open Tickets</h3></a>
                          </div>                          
                        </div> 
                        <div class="col-md-6 col-sm-6 ticket-main">
                          <span class="ticket-list ticket-list-close">
                            <i class="flaticon-closed-container"></i>
                          </span>
                          <div class="ticket-count">
                            <a href="#"><h1>5</h1></a>
                          </div>                      
                          <div class="ticket-details">
                            <a href="#"><h3>Closed Tickets</h3></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                       <!--  <div class="col-md-6 ticket-main">
                          <span class="ticket-list ticket-list-close">
                            <i class="flaticon-closed-container"></i>
                          </span>
                          <div class="ticket-count">
                            <a href="#"><h1>5</h1></a>
                          </div>                      
                          <div class="ticket-details">
                            <a href="#"><h3>Closed Tickets</h3></a>
                          </div>
                        </div>  -->
<!-- 
                      </div>                      
                    </div>
                  </div> -->
                 <!--  <div class="col-md-6">
                    <div class="boxes-main company-main-list">
                      <div class="row company-list">
                        <div class="col-md-6 ticket-main">
                          <span class="ticket-list ticket-list-open">
                            <i class="flaticon-open-folder-with-document"></i>
                          </span>   
                          <div class="ticket-count">
                            <a href="#"><h1>23</h1></a>
                          </div>                      
                          <div class="ticket-details">
                            <a href="#"><h3>Open Tickets</h3></a>
                          </div>
                          
                        </div> 
                        <div class="col-md-6 ticket-main">
                          <span class="ticket-list ticket-list-close">
                            <i class="flaticon-closed-container"></i>
                          </span>
                          <div class="ticket-count">
                            <a href="#"><h1>5</h1></a>
                          </div>                      
                          <div class="ticket-details">
                            <a href="#"><h3>Closed Tickets</h3></a>
                          </div>
                        </div> 

                      </div>                      
                    </div>
                  </div> -->
                   

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
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>   
      <!-- END OPTIONAL SCRIPTS -->
      <script type="text/javascript">
        var baseUrl = '<?php echo base_url(); ?>';
        var assetCtr = baseUrl + 'asset/';
      </script>
    </div>
  </body>
</html>
