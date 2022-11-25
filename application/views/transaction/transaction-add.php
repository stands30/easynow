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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
          <div class="portlet portlet-fluid-background">
            <div class="row">
              <!-- END PAGE HEADER-->
              <!-- START PAGE CONTENT-->
              <div class="container-fluid">

                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Add New Transaction</h3>
                  <span class="sp_line color-primary"></span>
                </div>
                  <form role="form" id="tran_plan" class="col-md-push-2 col-md-8 form_edit">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">  
                          <label class="drp-title">Plan</label>
                          <div class="input-icon">
                            <i class="fas fa-clipboard-list list-level"></i>
                              <select name="sub_people" id="sub_people" class="form-control sub_people custom-select2">
                              <option>Please Select Plan</option>
                              <option>Fundamental</option>
                              <option>Empower</option>
                              <option>Superpower</option>
                            </select>
                              <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon input-label-text">
                            <input type="text" name="user" id="user" class="form-control  color-primary-light">
                            <label for="user">Number of User</label>
                            <i class="fas fa-user list-level"></i>
                          </div>
                          <div class="help-block"></div>  
                        </div>
                      </div>
                    </div>
                    <div class="row mb-40">
                      <div class="col-md-6">
                         <div class="form-group form-md-radios">
                          <label class="radio-label-text">Subscription Plan</label>
                           <div class="md-radio-inline">
                             <div class="md-radio">
                                <input type="radio" id="radio6" name="radio2" class="md-radiobtn">
                                <label for="radio6">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Monthly </label>
                              </div>
                              <div class="md-radio">
                                <input type="radio" id="radio7" name="radio2" class="md-radiobtn" checked>
                                <label for="radio7">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Annually </label>
                              </div>
                           </div>
                         </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">  
                          <label class="drp-title">Duration</label>
                          <div class="input-icon">
                            <i class="far fa-calendar-alt list-level"></i>
                              <select name="sub_status" id="sub_status" class="form-control sub_status custom-select2">
                                <option>1 </option>
                                <option>2 </option>
                                <option>3 </option>
                                <option>4 </option>
                                <option>5 </option>
                                <option>6 </option>
                                <option>7 </option>
                                <option>8 </option>
                                <option>9 </option>
                                <option>10 </option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                              </select>
                              <div class="help-block"></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group form-md-line-input form-md-floating-label">  
                          <label class="drp-title">Currency</label>
                          <div class="input-icon">
                            <i class="far fa-money-bill-alt icon-lead list-level"></i>
                              <select name="sub_status" id="sub_status" class="form-control sub_status custom-select2">
                                <option>INR </option>
                                <option>USD </option>
                                <option>EUR </option>
                              </select>
                              <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
              </div>
              <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_ADD)); ?>   
              
              </form>
          </div>
        </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>  
        <!-- OPTIONAL SCRIPTS -->
      </div>
</body>
</html>
