    <!DOCTYPE html>
    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
        <head>
            <link rel="shortcut icon" href="favicon.ico" />
            <?php $this->load->view('common/header_styles'); ?>
            <link href="<?php echo base_url(); ?>assets/people/css/people-customs.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
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
                                      <aside class="profile-info col-lg-12">
                                         <section class="panel">
                                            <div class="panel-body bio-graph-info">
                                               <div class="text-center invoice-btn col-lg-offset-10">
                                               </div>
                                               <header class="panel-heading color-primary panelHeading">
                                                <div class="row detail-box">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row inner-row">
                                                      <span class="panel-title"><?php echo $title; ?></span>&nbsp;&nbsp;
                                                      <a class="btn btn-edit" href="">
                                                        <i class="fa fa-edit">
                                                        </i>
                                                        <span class="btn-text"> Edit
                                                        </span>
                                                      </a>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12 created-title">
                                                    <span class="created">Created By: Manit Singh
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: 27-03-2018
                                                    </span>
                                                  </div>
                                                </div>
                                              </header>
                                               <div class="table-responsive">
                                                  <table class="table" style="border:2px solid;border-style: ridge;    border-top: none;">
                                                     <tbody>
                                                        <tr>
                                                           <td>Role</td>
                                                           <td>Web Developer</td>
                                                           <td>Total Exp</td>
                                                           <td>2 years</td>
                                                        </tr>
                                                        <tr>
                                                           <td>Relative Exp</td>
                                                           <td>1.7 years</td>
                                                           <td>Notice Period</td>
                                                           <td>04/08/2018</td>
                                                        </tr>
                                                        <tr>
                                                           <td>Exp CTC</td>
                                                           <td>18000</td>
                                                           <td>Curr CTC</td>
                                                           <td>12000</td>
                                                        </tr>
                                                        <tr>
                                                           <td>Skills</td>
                                                           <td>HTML5, CSS3, JS/jQuery, PHP/Mysql, Codeigniter</td>
                                                           <td>Remark</td>
                                                           <td>Ecellent</td>
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
                <script src="<?php echo base_url(); ?>assets/people/js/people-customs.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
                <!-- END OPTIONAL SCRIPTS -->
            </div>
        </body>
    </html>
