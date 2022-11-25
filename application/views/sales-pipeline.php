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
    <!-- OPTIONAL LAYOUT STYLES -->
    <link href="<?php echo base_url(); ?>assets/module/pipeline/css/pipeline-stage.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END OPTIONAL LAYOUT STYLES -->  
    <style type="text/css">
      .ui-draggable, .ui-droppable {
        background-position: top;
      }


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
          <!-- END PAGE HEADER-->
          <!-- -----MAIN CONTENTS START HERE----- -->
          <style type="text/css">
            

            

          </style>
         
          <div class="portlet light bordered main-table-block">
             <div class="dataline">
              <table class="table-scrollable" style="margin: 0px !important;">
              <thead>
                   <!-- heading stage start here -->
                  <tr>
                    <td>
                      <div class="stages ready">
                        <ul>
                          <li>
                            <div class="row">
                              <div class="col-md-12 lead-start ">
                                <span class="lead-title">Pay Indentified</span>
                                <div class="pipeline-lead-amt">
                                  <i class="fas fa-rupee-sign "></i>5,20,00,000
                                    <span class="pipeline-count">1</span>    
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="row">
                              <div class="col-md-12 lead-start ">
                                <span class="lead-title">Payment</span>
                                <div class="pipeline-lead-amt">
                                  <i class="fas fa-rupee-sign "></i>60,000
                                    <span class="pipeline-count">3</span>    
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="row">
                              <div class="col-md-12 lead-start ">
                                <span class="lead-title">Delivered</span>
                                <div class="pipeline-lead-amt">
                                  <i class="fas fa-rupee-sign "></i>20,000
                                    <span class="pipeline-count">1</span>    
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="row">
                              <div class="col-md-12 lead-start ">
                                <span class="lead-title">Pay Date</span>
                                <div class="pipeline-lead-amt">
                                  <i class="fas fa-rupee-sign "></i>20,000
                                    <span class="pipeline-count">1</span>    
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="row">
                              <div class="col-md-12 lead-start ">
                                <span class="lead-title">Pay On Hold</span>
                                    
                                <div class="pipeline-lead-amt">
                                  <i class="fas fa-rupee-sign "></i>0
                                  <span class="pipeline-count">0</span>
                                </div>
                              </div>
                            </div>                            
                          </li>

                        </ul>
                      </div>
                    </td>
                  </tr>
                  <!-- heading stage end here -->
              </thead>
               <tbody>
                 <tr class="block-view">
                    <td>
                      <div class="deal-block hasScrollbar draggable-div" >
                        <div class="deal-block-table " >
                            <ul class="stage-table column">
                              <li class="deal-block-tile status-open portlet pipe-list">
                                <div class="portlet-header">
                                  <div class="front ">
                                    <div class="pipe-container">
                                      <div class="pipe-avatar">
                                        <img src="<?php echo base_url(); ?>assets/module/pipeline/images/user.svg" style="width: 100%">
                                      </div>
                                      <div class="pipe-card">
                                        <a href="#" class="sales-lead">
                                          <span>PCOS</span>
                                        </a>

                                        <div class="deal-details">
                                          <span class="deal-amt"><i class="fas fa-rupee-sign "></i> 5,00,20,000</span>
                                          <span class="deal-separator">.</span>
                                          <span class="deal-name">Deal 1</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                 <!-- <div class="data-block ">
                                  <a href="#" class="front portlet-header">
                                    <div class="portlet-header">
                                        <strong>
                                          <img src="<?php echo base_url(); ?>assets/module/pipeline/images/profile-icon.png">
                                           PCOS
                                        </strong>
                                    </div>
                                    <div class="portlet-header">
                                        <small class="">
                                            <span class="deal-amt deal-item"><i class="fas fa-rupee-sign flat-grey"></i> 50,20,00,000 </span>
                                            <span class="deal-name deal-item">New Website </span>
                                            
                                        </small>
                                    </div>
                                  </a>
                                </div> -->
                              </li>
                            </ul>
                           <!-- <ul class="stage-table column">
                              <li class="deal-block-tile status-open portlet">
                                 <div class="data-block ">
                                  <a href="#" class="front portlet-header">
                                    <div class="portlet-header">
                                        <strong>
                                          <img src="<?php echo base_url(); ?>assets/module/pipeline/images/profile-icon.png">
                                           PCOS
                                        </strong>
                                    </div>
                                    <div class="portlet-header">
                                        <small class="">
                                            <span class="deal-amt deal-item"><i class="fas fa-rupee-sign flat-grey"></i> 50,20,00,000 </span>
                                            <span class="deal-name deal-item">New Website </span>
                                            
                                        </small>
                                    </div>
                                  </a>
                                </div>
                              </li>
                            </ul> -->
                             <ul class="stage-table column">
                              <li class="deal-block-tile status-open portlet pipe-list">
                                <div class="portlet-header">
                                  <div class="front ">
                                    <div class="pipe-container">
                                      <div class="pipe-avatar">
                                        <img src="<?php echo base_url(); ?>assets/module/pipeline/images/user.svg" style="width: 100%">
                                      </div>
                                      <div class="pipe-card">
                                        <a href="#" class="sales-lead">
                                          <span>Midas</span>
                                        </a>

                                        <div class="deal-details">
                                          <span class="deal-amt"><i class="fas fa-rupee-sign "></i> 20,000</span>
                                          <span class="deal-separator">.</span>
                                          <span class="deal-name">Deal 1</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              <li class="deal-block-tile status-open portlet pipe-list">
                                <div class="portlet-header">
                                  <div class="front ">
                                    <div class="pipe-container">
                                      <div class="pipe-avatar">
                                        <img src="<?php echo base_url(); ?>assets/module/pipeline/images/user.svg" style="width: 100%">
                                      </div>
                                      <div class="pipe-card">
                                        <a href="#" class="sales-lead">
                                          <span>Lucid</span>
                                        </a>

                                        <div class="deal-details">
                                          <span class="deal-amt"><i class="fas fa-rupee-sign "></i> 20,000</span>
                                          <span class="deal-separator">.</span>
                                          <span class="deal-name">Deal 1</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                              </li>
                              <li class="deal-block-tile status-open portlet pipe-list">
                                <div class="portlet-header">
                                  <div class="front ">
                                    <div class="pipe-container">
                                      <div class="pipe-avatar">
                                        <img src="<?php echo base_url(); ?>assets/module/pipeline/images/user.svg" style="width: 100%">
                                      </div>
                                      <div class="pipe-card">
                                        <a href="#" class="sales-lead">
                                          <span>Dream Project</span>
                                        </a>

                                        <div class="deal-details">
                                          <span class="deal-amt"><i class="fas fa-rupee-sign "></i> 20,000</span>
                                          <span class="deal-separator">.</span>
                                          <span class="deal-name">Deal 1</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                             <ul class="stage-table column">
                              <li class="deal-block-tile status-open portlet pipe-list">
                                <div class="portlet-header">
                                  <div class="front ">
                                    <div class="pipe-container">
                                      <div class="pipe-avatar">
                                        <img src="<?php echo base_url(); ?>assets/module/pipeline/images/user.svg" style="width: 100%">
                                      </div>
                                      <div class="pipe-card">
                                        <a href="#" class="sales-lead">
                                          <span>NGO</span>
                                        </a>

                                        <div class="deal-details">
                                          <span class="deal-amt"><i class="fas fa-rupee-sign "></i> 20,000</span>
                                          <span class="deal-separator">.</span>
                                          <span class="deal-name">Deal 1</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                             <ul class="stage-table column">
                              <li class="deal-block-tile status-open portlet pipe-list">
                                <div class="portlet-header">
                                  <div class="front ">
                                    <div class="pipe-container">
                                      <div class="pipe-avatar">
                                        <img src="<?php echo base_url(); ?>assets/module/pipeline/images/user.svg" style="width: 100%">
                                      </div>
                                      <div class="pipe-card">
                                        <a href="#" class="sales-lead">
                                          <span>SSB Metals</span>
                                        </a>

                                        <div class="deal-details">
                                          <span class="deal-amt"><i class="fas fa-rupee-sign "></i> 20,000</span>
                                          <span class="deal-separator">.</span>
                                          <span class="deal-name">Deal 1</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                             <ul class="stage-table column">
                              <!-- <li class="deal-block-tile status-open portlet">
                                 <div class="data-block portlet">
                                  <a href="#" class="front">
                                    <div class="portlet-header">
                                        <strong>
                                          <img src="<?php echo base_url(); ?>assets/module/pipeline/images/profile-icon.png">
                                           Customer 5
                                        </strong>
                                    </div>
                                    <div class="portlet-content">
                                        <small>
                                            <span><i class="fas fa-rupee-sign"></i> 20,000 |</span>
                                            deal1
                                            
                                        </small>
                                    </div>
                                  </a>
                                </div>
                              </li> -->
                            </ul>
                        </div>
                      </div>
                    </td>
                  </tr>
               </tbody>
              </table>             
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
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js" type="text/javascript"></script>  
      <!-- <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.min.js" type="text/javascript">
      </script>  -->
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/jquery.matchHeight.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
      <!-- <script src="<?php echo base_url(); ?>/assets/pages/scripts/portlet-draggable.min.js" type="text/javascript"></script> -->
      <!-- END OPTIONAL SCRIPTS -->

      <script src="<?php echo base_url(); ?>assets/project/global/scripts/jquery.matchHeight.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script type="text/javascript">
          $(function() {
              $('.deal-item').matchHeight();
          });
            /*$(".sortable_portlets").sortable({
                connectWith: ".portlet",
                items: ".portlet", 
                opacity: 0.8,
                handle : '.portlet-title',
                coneHelperSize: true,
                placeholder: 'portlet-sortable-placeholder',
                forcePlaceholderSize: true,
                tolerance: "pointer",
                helper: "clone",
                tolerance: "pointer",
                forcePlaceholderSize: !0,
                helper: "clone",
                cancel: ".portlet-sortable-empty, .portlet-fullscreen", // cancel dragging if portlet is in fullscreen mode
                revert: 250, // animation in milliseconds
                update: function(b, c) {
                    if (c.item.prev().hasClass("portlet-sortable-empty")) {
                        c.item.prev().before(c.item);
                    }                    
                }
            });*/
    //         $( ".column" ).sortable({
    //   connectWith: ".column",
    //   handle: ".data-block ",
    //   cancel: ".portlet-toggle",
    //   placeholder: "portlet-placeholder ui-corner-all"
    // });
 
    // $( ".portlet" )
    //   .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
    //   .find( ".data-block " )
    //     .addClass( "ui-widget-header ui-corner-all" )
    //     .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
 
    // $( ".portlet-toggle" ).on( "click", function() {
    //   var icon = $( this );
    //   icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
    //   icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
    // });
        $( ".column" ).sortable({
          connectWith: ".column",
          handle: ".portlet-header",
          cancel: ".portlet-toggle",
          placeholder: "portlet-placeholder ui-corner-all"
        });
     
        $( ".portlet" )
          .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
          .find( ".portlet-header" )
            .addClass( "ui-widget-header ui-corner-all" )
            .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
     
        $( ".portlet-toggle" ).on( "click", function() {
          var icon = $( this );
          icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
          icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
        });

        $(function() {
            $('.deal-item').matchHeight();
        });
      </script>
    </div>
  </body>
</html>
