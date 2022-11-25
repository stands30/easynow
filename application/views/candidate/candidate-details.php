
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

          <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
            

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

                                  <?php 
                                  $cdtData['cdt_id'] = $candidatedata->cdt_id;
                                  $cdtencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($candidatedata->cdt_id);
                                  $this->load->view('candidate/candidate_sidebar',$cdtData); 
                                  ?>

                                    <!-- -----MAIN CONTENTS START HERE----- -->
                                      <aside class="profile-info col-lg-10">
                                         <section class="panel">
                                            <div class="panel-body bio-graph-info">
                                               <div class="text-center invoice-btn col-lg-offset-10">
                                               </div>
                                               <header class="panel-heading color-primary panelHeading">
                                                <div class="row detail-box">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row inner-row">
                                                      <span class="panel-title"><?php echo $candidatedata->cdt_name; ?></span>&nbsp;&nbsp;
                                                        <a class="btn btn-edit" href="<?php echo base_url('candidate-edit-'.$candidatedata->cdt_id_encrypt) ?>">
                                                        <i class="fa fa-edit">
                                                        </i>
                                                        <span class="btn-text"> Edit
                                                        </span>
                                                      </a>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12 created-title">
                                                    <span class="created">Created By: <?php if(isset($candidatedata->cdt_crdt_by_name))echo $candidatedata->cdt_crdt_by_name; ?>
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: <?php if(isset($candidatedata->cdt_crdt_on_format)) echo display_date($candidatedata->cdt_crdt_on_format); ?>
                                                    </span>
                                                  </div>
                                                </div>
                                              </header>
                                               <div class="table-responsive">
                                                  <table class="table table-detail-custom table-style">
                                                     <tbody>
                                                        <tr>
                                                           <td>Role</td>
                                                           <td><?php if(isset($candidatedata->cdt_role_name))echo $candidatedata->cdt_role_name; ?></td>
                                                           <td>Total Exp</td>
                                                           <td><?php if(isset($candidatedata->cdt_total_exp))echo $candidatedata->cdt_total_exp; ?> years</td>
                                                        </tr>
                                                        <tr>
                                                           <td>Relative Exp</td>
                                                           <td><?php if(isset($candidatedata->cdt_relative_exp))echo $candidatedata->cdt_relative_exp; ?> years</td>
                                                           <td>Notice Period</td>
                                                           <td><?php if(isset($candidatedata->cdt_notice_period))echo $candidatedata->cdt_notice_period; ?></td>
                                                        </tr>
                                                        <tr>
                                                           <td>Exp CTC</td>
                                                           <td><i class="fa fa-inr"></i> <?php if(isset($candidatedata->cdt_exp_ctc))echo $candidatedata->cdt_exp_ctc; ?></td>
                                                           <td>Curr CTC</td>
                                                           <td><i class="fa fa-inr"></i> <?php if(isset($candidatedata->cdt_cur_ctc))echo $candidatedata->cdt_cur_ctc; ?></td>
                                                        </tr>
                                                        <tr>
                                                           <td>Skills</td>
                                                           <td><?php if(isset($candidatedata->cdt_skills))echo $candidatedata->cdt_skills; ?></td>
                                                           <td>Remark</td>
                                                           <td><?php if(isset($candidatedata->cdt_remark))echo $candidatedata->cdt_remark; ?></td>
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
                
                <!-- END OPTIONAL SCRIPTS -->

            </div>
        </body>

    </html>