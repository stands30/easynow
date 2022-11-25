
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
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css" rel="stylesheet" type="text/css" />
            <!-- END OPTIONAL LAYOUT STYLES -->  
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

                                    <!-- -----MAIN CONTENTS START HERE----- -->
                                      <?php $this->load->view('people/people_sidebar'); ?>
                                      <aside class="profile-info col-lg-9">
                                         <section class="panel">
                                            <div class="panel-body bio-graph-info">
                                               <div class="text-center invoice-btn col-lg-offset-10">
                                               </div>
                                               <header class="panel-heading color-primary">
                                                  <div class="detail-box">
                                                      <span class="panel-title"><?php echo $title; ?></span>&nbsp;&nbsp;
                                                      <a class="btn-edit" href="">
                                                      <i class="fa fa-edit"></i><span class="btn-text"> Edit</span></a>
                                                  
                                                      <span class="created">Created By: Manit Singh</span><br><span class="sp-date">Created On: 27-03-2018</span>
                                                  </div>
                                               </header>
                                               <div class="table-responsive">
                                                  <table class="table" style="border:2px solid;border-style: ridge">
                                                     <tbody>
                                                        <tr>
                                                           <td>Id</td>
                                                           <td>1</td>
                                                           <td>Type</td>
                                                           <td>Type1</td>
                                                        </tr>
                                                        <tr>
                                                           <td>Value</td>
                                                           <td>Average</td>
                                                           <td>Isactive</td>
                                                           <td>Yes</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Remark</td>
                                                          <td colspan="3">Excellent</td>
                                                        </tr>
                                                     </tbody>
                                                  </table>
                                               </div>
                                            </div>
                                         </section>
                                      </aside>

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
                <script src="<?php echo base_url(); ?>assets/module/people/js/people-customs.js" type="text/javascript"></script>
                <!-- END OPTIONAL SCRIPTS -->
            </div>
        </body>
    </html>