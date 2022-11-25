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
    <!-- OPTIONAL LAYOUT STYLES -->
    <link href="<?php echo base_url() .'assets/css/style.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() .'assets/finance/css/daterangepicker.min.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() .'assets/finance/css/select2.min.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() .'assets/finance/css/select2-bootstrap.min.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
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
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <!-- END PAGE HEADER-->
          <!-- -----MAIN CONTENTS START HERE----- -->
          <div class="portlet portlet-wrap">
            <div class="row">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="portlet light">
                      <form action="" method="POST">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Date</label>
                              <div class="input-group" id="defaultrange_modal">
                                  <input type="text" class="form-control">
                                  <span class="input-group-btn">
                                      <button class="btn default date-range-toggle" type="button">
                                          <i class="fa fa-calendar"></i>
                                      </button>
                                  </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Account Name</label>
                              <select id="single1" class="form-control select2" tabindex="-1" aria-hidden="true" autocomplete="off">
                                  <option value=''>None</option>
                                  <optgroup label="Alaskan">
                                      <option value="AK">Alaska</option>
                                      <option value="HI" disabled="disabled">Hawaii</option>
                                  </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Category</label>
                              <select id="single1" class="form-control select2" tabindex="-1" aria-hidden="true" autocomplete="off">
                                  <option value=''>None</option>
                                  <optgroup label="Alaskan">
                                      <option value="AK">Alaska</option>
                                      <option value="HI" disabled="disabled">Hawaii</option>
                                  </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Sub Category</label>
                              <select id="single1" class="form-control select2" tabindex="-1" aria-hidden="true" autocomplete="off">
                                  <option value=''>None</option>
                                  <optgroup label="Alaskan">
                                      <option value="AK">Alaska</option>
                                      <option value="HI" disabled="disabled">Hawaii</option>
                                  </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="portlet light">
                      <div class="row widget-row">
                        <div class="col-md-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Expense</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green icon-bulb"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">7,644</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Income</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">1,293</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Transactions</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815">815</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                      </div>
                      <div class="row widget-row">
                        <div class="col-md-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Net</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">5,071</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                          <div class="col-md-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">5,071</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                          </div>
                          <div class="col-md-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Expense</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">5,071</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                          </div>
                        </div>
                    </div>
                    <div class="portlet light portlet-fit">
                      <div class="portlet-title">
                        <div class="caption font-dark">
                          <i class="icon-settings font-dark"></i>
                          <span class="caption-subject bold uppercase">Transaction List
                          </span> &nbsp;
                        </div>
                        <div class="tools"> 
                        </div>
                      </div>
                      <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                          <thead>
                              <tr role="row">
                                  <th>Invoice </th>
                                  <th> Invoice Age  </th>
                                  <th> Invoice Date  </th>
                                  <th> Receipt No </th>
                              </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td class="sorting_1"><a href="#">Inv101012</a></td>
                                <td>12 Years</td>
                                <td>12/07/2018</td>
                                <td> P187731 </td>
                            </tr>
                            <tr>
                                <td class="sorting_1"><a href="#">Inv101012</a></td>
                                <td>12 Years</td>
                                <td>12/07/2018</td>
                                <td> P187731 </td>
                            </tr>
                            <tr>
                                <td class="sorting_1"><a href="#">Inv101012</a></td>
                                <td>12 Years</td>
                                <td>12/07/2018</td>
                                <td> P187731 </td>
                            </tr>
                            <tr>
                                <td class="sorting_1"><a href="#">Inv101012</a></td>
                                <td>12 Years</td>
                                <td>12/07/2018</td>
                                <td> P187731 </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
    
      <!-- END OPTIONAL SCRIPTS -->
    </div>
  </body>
</html>
