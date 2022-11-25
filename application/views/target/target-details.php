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
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/module/target/css/target-custom.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- END OPTIONAL LAYOUT STYLES -->
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
        <div class="page-content page-content-detail">
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <div class="page-bar" id="breadcrumbs-list">
            <?php echo $breadcrumb; ?>
            <div class="breadcrumb-button">
              <a href="#" class=" previous" title="">
                  <button class="btn green">
                      <i class="fa fa-arrow-left"></i>
                      <!-- Previous  -->
                  </button>
              </a>
              <a href="#" class="next">
                  <button class="btn green">
                      <!-- Next --><i class="fa fa-arrow-right"></i>
                  </button>
              </a>
            </div>
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet">
            <div class="row">
               <aside class="profile-info col-lg-12">
                            <section class="panel">
                                <!-- <label>make drop down editable for Managed By, Status</label> -->
                                <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                    <header class="panel-heading color-primary panelHeading">
                                        <div class="row detail-box">
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <span class="detail-list-heading">Target Details</span><br>
                                                <div class="row inner-row">
                                                    <span class="panel-title">
                                                        Target For 30 leads
                                                    </span>&nbsp;&nbsp;
                                                    <a class="btn-edit" href="#"> 
                                                        <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                    </a>
                                                    <a class="btn-edit" href="#">
                                                        <i class="fas fa-trash status-fa-icons"></i><span class="btn-text"> Delete</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                <span class="created">Created By: Nick Dave
                                                </span>
                                                <br>
                                                <span class="sp-date">Created On: 03rd May, 2019
                                                </span>
                                                <br>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="table-responsive">
                                        <table class="table custom table-detail-custom table-style">
                                            <tbody>
                                              <tr>
                                                <td colspan="4" class="module-title">Pre-Requisite</td>
                                              </tr>
                                              <tr>
                                                <td><i class="fas fa-bullseye list-level"></i> Target Title</td>
                                                <td>Target For 30 leads</td>
                                                <td><i class="fas fa-user-tie list-level"></i> Target Responsible </td>
                                                <td><a href="#">Rohan</a></td>
                                              </tr>
                                              <tr>
                                                <td><i class="fas fa-id-card list-level"></i> Target Amount </td>
                                                <td>50,000.00</td>
                                                <td><i class="fas fa-id-card list-level"></i> Target Count</td>
                                                <td>50</td>
                                              </tr>
                                              <tr>
                                                <td><i class="fa fa-comment list-level"></i> Description</td>
                                                <td colspan="3">Target For 30 leads</td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" class="module-title">Who <!-- <span class="detail-sub-title">-Target For</span> --></td>
                                              </tr>
                                              <tr>
                                                <td><i class="fas fa-bullseye list-level list-level"></i> Target Reference</td>
                                                <td>Team</td>
                                                <td><i class="fas fa-user-tie list-level"></i> Team Members </td>
                                                <td>
                                                  <a href="#">Aditya</a>
                                                  <a href="#">Akshara </a>
                                                  <a href="#">Adrika  </a>
                                                  <a href="#">Mishka </a>
                                                  <a href="#">Advika </a>
                                                  <a href="#">Nakul </a>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td><i class="fa fa-industry icon-company list-level"></i> Organization</td>
                                                <td>Fruit Bowl</td>
                                                <td><i class="fas fa-user-tie list-level"></i> Organization Team Members</td>
                                                <td>
                                                  <a href="#">Aditya</a>
                                                  <a href="#">Akshara </a>
                                                  <a href="#">Adrika  </a>
                                                  <a href="#">Mishka </a>
                                                  <a href="#">Advika </a>
                                                  <a href="#">Nakul </a>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td><i class="fa fa-user list-level"></i> People</td>
                                                <td colspan="3"><a href="#">Nakul</a></td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" class="module-title">When <!-- <span class="detail-sub-title">-Target Interval</span> --></td>
                                              </tr>
                                              <tr>
                                                <td><i class="fas fa-bullseye list-level"></i> Target Duration</td>
                                                <td colspan="3">2019(for year) / March (for month) / Quarter 1 (for quarterly) / 03rd May, 2019 - 03rd July, 2019 (for custom) </td>
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </aside>
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
