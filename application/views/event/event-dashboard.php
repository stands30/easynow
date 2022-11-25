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
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?> 
    <link href="<?php echo base_url(); ?>assets/event/assets/css/event-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo base_url('event-list'); ?>">
                      <div class="visual">
                        <i class="fa fa-comments">
                        </i>
                      </div>
                      <div class="details">
                        <div class="number">
                          <span data-counter="counterup" data-value="1349">1349
                          </span>
                        </div>
                        <div class="desc"> People 
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo base_url('event-list'); ?>">
                      <div class="visual">
                        <i class="fa fa-bar-chart-o">
                        </i>
                      </div>
                      <div class="details">
                        <div class="number">
                          <span data-counter="counterup" data-value="12,5">125
                          </span> 
                        </div>
                        <div class="desc"> Company 
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo base_url('event-list'); ?>">
                      <div class="visual">
                        <i class="fa fa-shopping-cart">
                        </i>
                      </div>
                      <div class="details">
                        <div class="number">
                          <span data-counter="counterup" data-value="549">549
                          </span>
                        </div>
                        <div class="desc"> Company 
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo base_url('event-list'); ?>">
                      <div class="visual">
                        <i class="fa fa-globe">
                        </i>
                      </div>
                      <div class="details">
                        <div class="number">
                          <span data-counter="counterup" data-value="625">625
                          </span>
                        </div>
                        <div class="desc"> Candidate 
                        </div>
                      </div>
                    </a>
                  </div>
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
