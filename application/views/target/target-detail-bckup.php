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
        <div class="page-content">
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <div class="page-bar" id="breadcrumbs-list">
            <?php echo $breadcrumb; ?>
            <div class="breadcrumb-button">
                <a href="<?php echo base_url('target-detail-'.$targetEdit->prev_encrypt) ?>" class=" previous" title="">
                    <button id="newlead" class="btn green">
                        <i class="fa fa-arrow-left"></i>
                        <!-- Previous  -->
                    </button>
                </a>
                <a href="<?php echo base_url('target-detail-'.$targetEdit->next_encrypt) ?>" class="next">
                    <button id="newlead" class="btn green">
                        <!-- Next --><i class="fa fa-arrow-right"></i>
                    </button>
                </a>
            </div>
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <!-- -----MAIN CONTENTS START HERE----- -->
                <aside class="profile-info col-md-12">
                  <section class="panel">
                    <div class="panel-body bio-graph-info panel-body-detail-view">
                      <div class="text-center invoice-btn col-lg-offset-10">
                      </div>
                      <header class="panel-heading color-primary panelHeading">
                        <div class="row detail-box">
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <span class="detail-list-heading">Target Details</span><br>
                            <span class="panel-title">
                              <?php if(isset($targetEdit->tgt_title)) echo $targetEdit->tgt_title ?>
                              <?php $tgt_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($targetEdit->tgt_id); ?>
                            </span>&nbsp;&nbsp;
                            <a class="btn btn-edit" href="<?php echo base_url('target-edit-'.$tgt_encrypted_id) ?>">
                              <i class="fa fa-edit">
                              </i>
                              <span class="btn-text"> Edit
                              </span>
                            </a>
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                            <span class="created">Created By: <?php if(isset($targetEdit->tgt_crdt_by_name)) echo $targetEdit->tgt_crdt_by_name ?>
                            </span>
                            <br>
                            <span class="sp-date">Created On: <?php if(isset($targetEdit->tgt_crdt_dt)) echo display_date($targetEdit->tgt_crdt_dt); ?>
                            </span>
                          </div>
                        </div>
                      </header>
                      <div class="table-responsive">
                        <table class="table custom" style="border:2px solid;border-style: ridge;    border-top: none;">
                          <tbody>
                            <?php  ?>
                            <tr style="border" style="border-bottom: 1px solid #222">
                              <td><i class="fas fa-bullseye"></i> Title
                              </td>
                              <td><?php if(isset($targetEdit->tgt_title)) echo $targetEdit->tgt_title ?>
                              </td>
                              <td><i class="fas fa-calendar-alt"></i> Durability
                              </td>
                              <td><?php if(isset($targetEdit->tgt_durability_name)) echo $targetEdit->tgt_durability_name ?>
                              </td>
                            </tr>
                            <tr>
                              <td><i class="fas fa-list-ol"></i> Quantity
                              </td>
                              <td><?php if(isset($targetEdit->tgt_qty)) echo $targetEdit->tgt_qty ?>
                              </td>
                              <td><i class="fas fa-cube"></i> Volume
                              </td>
                              <td><?php if(isset($targetEdit->tgt_volume)) echo $targetEdit->tgt_volume ?>
                              </td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                      <div class="main-title">
                        <h5 class="bold">Target User</h5 >
                      </div>
                      <div class="flip-scroll">
                        <table class="table table-bordered table-striped table-condensed flip-content"  style="border:2px solid;border-style: ridge;">
                          <thead class="flip-content">
                            <tr>
                              <th><i class="fas fa-user"></i> User
                              </th>
                              <th> <i class="fas fa-id-card"></i> title
                              </th>
                              <th><i class="fas fa-calendar-alt"></i> Durability
                              </th>
                              <th><i class="fas fa-list-ol"> Quantity
                              </th>
                              <th><i class="fas fa-cube list-level"> Volume
                              </th>
                              <th><i class="fas fa-calendar-alt list-level"></i>From Date
                              </th>
                              <th><i class="fas fa-calendar-alt list-level"></i>To Date
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(isset($target_type1) and !empty($target_type1)){ ?>
                              <?php foreach($target_type1 as $t1Key){ ?>
                            <tr>
                                  <td><?php echo $t1Key->sbt_type_name ?>
                                  </td>
                                  <td><?php echo $t1Key->sbt_title ?>
                                  </td>
                                  <td><?php echo $t1Key->sbt_durability_name ?>
                                  </td>
                                  <td><?php echo $t1Key->sbt_qty ?>
                                  </td>
                                  <td><?php echo $t1Key->sbt_volume ?>
                                  </td>
                                  <td><?php echo $t1Key->sbt_from_dt ?>
                                  </td>
                                  <td><?php echo $t1Key->sbt_to_dt ?>
                                  </td>
                            </tr>
                          <?php }} ?>
                          </tbody>
                        </table>
                      </div>

                      <div class="main-title">
                        <h5 class="bold">Target Stage</h5 >
                      </div>
                      <div class="flip-scroll">
                        <table class="table table-bordered table-striped table-condensed flip-content"  style="border:2px solid;border-style: ridge;">
                          <thead class="flip-content">
                            <tr>
                              <th><i class="fas fa-user"></i> User
                              </th>
                              <th> <i class="fas fa-id-card"></i> title
                              </th>
                              <th><i class="fas fa-calendar-alt"></i> Durability
                              </th>
                              <th><i class="fas fa-list-ol"> Quantity
                              </th>
                              <th><i class="fas fa-cube list-level"> Volume
                              </th>
                              <th><i class="fas fa-calendar-alt list-level"></i>From Date
                              </th>
                              <th><i class="fas fa-calendar-alt list-level"></i>To Date
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(isset($target_type2) and !empty($target_type2)){ ?>
                              <?php foreach($target_type2 as $t2Key){ ?>
                            <tr>
                                  <td><?php echo $t2Key->sbt_type_name ?>
                                  </td>
                                  <td><?php echo $t2Key->sbt_title ?>
                                  </td>
                                  <td><?php echo $t2Key->sbt_durability_name ?>
                                  </td>
                                  <td><?php echo $t2Key->sbt_qty ?>
                                  </td>
                                  <td><?php echo $t2Key->sbt_volume ?>
                                  </td>
                                  <td><?php echo $t2Key->sbt_from_dt ?>
                                  </td>
                                  <td><?php echo $t2Key->sbt_to_dt ?>
                                  </td>
                            </tr>
                          <?php }} ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="main-title">
                        <h5 class="bold">Target Product</h5 >
                      </div>
                      <div class="flip-scroll">
                        <table class="table table-bordered table-striped table-condensed flip-content"  style="border:2px solid;border-style: ridge;">
                          <thead class="flip-content">
                            <tr>
                              <th><i class="fas fa-user"></i> User
                              </th>
                              <th> <i class="fas fa-id-card"></i> title
                              </th>
                              <th><i class="fas fa-calendar-alt"></i> Durability
                              </th>
                              <th><i class="fas fa-list-ol"> Quantity
                              </th>
                              <th><i class="fas fa-cube list-level"> Volume
                              </th>
                              <th><i class="fas fa-calendar-alt list-level"></i>From Date
                              </th>
                              <th><i class="fas fa-calendar-alt list-level"></i>To Date
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(isset($target_type3) and !empty($target_type3)){ ?>
                              <?php foreach($target_type3 as $t3Key){ ?>
                            <tr>
                                  <td><?php echo $t3Key->sbt_type_name ?>
                                  </td>
                                  <td><?php echo $t3Key->sbt_title ?>
                                  </td>
                                  <td><?php echo $t3Key->sbt_durability_name ?>
                                  </td>
                                  <td><?php echo $t3Key->sbt_qty ?>
                                  </td>
                                  <td><?php echo $t3Key->sbt_volume ?>
                                  </td>
                                  <td><?php echo $t3Key->sbt_from_dt ?>
                                  </td>
                                  <td><?php echo $t3Key->sbt_to_dt ?>
                                  </td>
                            </tr>
                          <?php }} ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="main-title">
                        <h5 class="bold">Target Source</h5 >
                      </div>
                      <div class="flip-scroll">
                        <table class="table table-bordered table-striped table-condensed flip-content"  style="border:2px solid;border-style: ridge;">
                          <thead class="flip-content">
                            <tr>
                              <th><i class="fas fa-user"></i> User
                              </th>
                              <th> <i class="fas fa-id-card"></i> title
                              </th>
                              <th><i class="fas fa-calendar-alt"></i> Durability
                              </th>
                              <th><i class="fas fa-list-ol"> Quantity
                              </th>
                              <th><i class="fas fa-cube list-level"> Volume
                              </th>
                              <th><i class="fas fa-calendar-alt list-level"></i>From Date
                              </th>
                              <th><i class="fas fa-calendar-alt list-level"></i>To Date
                              </th>
                            </tr>
                          </thead>
                          <!-- <?php foreach ($variable as $key => $value) {
                            // code...
                          } ?> -->
                          <tbody>
                            <?php if(isset($target_type4) and !empty($target_type4)){ ?>
                              <?php foreach($target_type4 as $t4Key){ ?>
                            <tr>
                                  <td><?php echo $t4Key->sbt_type_name ?>
                                  </td>
                                  <td><?php echo $t4Key->sbt_title ?>
                                  </td>
                                  <td><?php echo $t4Key->sbt_durability_name ?>
                                  </td>
                                  <td><?php echo $t4Key->sbt_qty ?>
                                  </td>
                                  <td><?php echo $t4Key->sbt_volume ?>
                                  </td>
                                  <td><?php echo $t4Key->sbt_from_dt ?>
                                  </td>
                                  <td><?php echo $t4Key->sbt_to_dt ?>
                                  </td>
                            </tr>
                          <?php }} ?>
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
