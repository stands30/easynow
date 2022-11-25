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
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/module/widget/css/widget-custom.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
      .greeting-context h1{
        font-family: 'Pacifico', cursive;
      }
    </style>
    <!-- OPTIONAL LAYOUT STYLES -->
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
          <!-- END PAGE HEADER-->
          <!-- -----MAIN CONTENTS START HERE----- -->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <!-- <i class="icon-settings font-dark"></i> -->
                <span class="caption-subject bold uppercase">Widgets</span>
              </div>
            </div>
            
          </div>

        

          <!-- Full width image modal -->
          <div id="widgetModal" class="modal modal-widgets fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <button type="button" class=" image-modal" data-dismiss="modal">&times;</button>
                <img src="<?php echo base_url(); ?>assets/module/widget/images/friends.jpg" class="modal-widget-image">
              </div>

            </div>
          </div>

          <div id="widgetModal" class="modal modal-widgets fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <button type="button" class=" image-modal" data-dismiss="modal">&times;</button>
                <img src="<?php echo base_url(); ?>assets/module/widget/images/friends.jpg" class="modal-widget-image">
              </div>

            </div>
          </div>

          <div id="widgetGreeting" class="modal modal-greeting fade" role="dialog">
            <div class="vertical-alignment-helper">
              <div class="modal-dialog vertical-align-center">
                <!-- Modal content-->
                <div class="modal-content greeting-modal-content">

                  <button type="button" class="image-greeting-modal" data-dismiss="modal">&times;</button>
                  <div class="greeting-container">
                    
                   <!--  <div class="greeting-image-div">
                      <img src="<?php echo base_url(); ?>assets/module/widget/images/bird.png" class="img-responsive ">
                    </div> -->
                    <div class="greeting-context">
                      <p class="custom-start text-center">Wish You a Very</p>
                      <h1>Happy Birthday</h1>
                      <!-- <hr> -->
                    </div>
                  </div>

                </div>

              </div>
            </div>
            
          </div>
          <!-- Full width image modal -->
          <!-- MAIN CONTENTS END HERE -->
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>      
      <!-- OPTIONAL SCRIPTS -->
      <script type="text/javascript">
        $(window).load(function(){   
          var o = $(this).attr("data-easein");     
          $('#widgetGreeting').modal('show');
          // $('#widgetModal').modal('show');
        }); 
      </script>
    </div>
  </body>
</html>
