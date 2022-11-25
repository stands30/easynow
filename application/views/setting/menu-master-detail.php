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
                <aside class="profile-info col-md-12">
                  <section class="panel">
                    <div class="panel-body bio-graph-info">
                      <div class="text-center invoice-btn col-lg-offset-10">
                      </div>
                      <header class="panel-heading color-primary">
                        <div class="detail-box">
                          <div>
                            <span class="panel-title">
                              <?php echo $title; ?>
                            </span>&nbsp;&nbsp;
                            <a class="btn btn-edit" href="<?php echo base_url('menu-master-edit-'.$mnu_encrypt_id) ?>">
                              <i class="fa fa-edit">
                              </i>
                              <span class="btn-text"> Edit
                              </span>
                            </a>
                          </div>
                          <div class="created-title">
                            <span class="created">Created By: <?php echo $mnu_details->crdt_by ?>
                            </span>
                            <br>
                            <span class="sp-date">Created On: <?php echo $mnu_details->mnu_crdt_dt ?>
                            </span>
                          </div>
                        </div>
                      </header>
                      <div class="table-responsive">
                        <table class="table" style="border:2px solid;border-style: ridge;    border-top: none;">
                          <tbody>
                            <tr>
                              <td>Name
                              </td>
                              <td><?php echo $mnu_details->mnu_name ?>
                              </td>
                              <td>link
                              </td>
                              <td><a href="<?php echo base_url($mnu_details->mnu_link) ?>"><?php echo $mnu_details->mnu_link ?></a>
                              </td>
                            </tr>
                            <tr>
                              <td>Icon
                              </td>
                              <td><?php echo $mnu_details->mnu_icon ?> &nbsp;<i class="fa fa-<?php echo $mnu_details->mnu_icon ?>"></i>
                              </td>
                              <td>Order
                              </td>
                              <td><?php echo $mnu_details->mnu_order ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Status
                              </td>
                              <td colspan="3"><?php echo $mnu_details->mnu_status_name ?>
                              </td>

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
