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
      

      <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

     <link href="<?php echo base_url(); ?>assets/module/cashbook/css/cashbook-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

      <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />

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
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center">Edit <?php echo $expense['csb_particular'] ?> - Expense
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" class="col-md-push-2 col-md-8 form_add" id="expense_edit">

                  <input type="hidden" name="csb_id" id="csb_id" value="<?php echo $expense['csb_id'] ?>">
                  <input type="hidden" name="csb_type" id="csb_type" value="<?php echo $expense['csb_type'] ?>">

                  <div class="row">
                      <div class="form-group col-md-6">
                        <label>Date
                          <span class="asterix-error">
                            <em>*
                            </em>
                          </span>
                        </label>
                         <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                              <input type="text" class="form-control" id="csb_date" name="csb_date" placeholder="Select Date" value="<?php echo $expense['csb_date'] ?>">
                              <span class="input-group-btn">
                                  <button class="btn default btn_color" type="button">
                                      <i class="fa fa-calendar"></i>
                                  </button>
                              </span>
                          </div>
                          <div class="help-block">
                          </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Approval Status
                          <span class="asterix-error">
                            <em>*
                            </em>
                          </span>
                        </label>
                          <select name="csb_approve" id="csb_approve" class="form-control approval-select2" autocomplete="off">
                            <option value="<?php echo $expense['csb_approve'] ?>" selected="selected"> <?php echo $expense['csb_approve_name'] ?> </option>
                         </select>
                         <div class="help-block">
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Particular
                          <span class="asterix-error">
                            <em>*
                            </em>
                          </span>
                        </label>
                        <input type="text" name="csb_particular" id="csb_particular" value="<?php echo $expense['csb_particular'] ?>" class="form-control color-primary-light" placeholder="Enter Particulars" required>
                        <div class="help-block">
                          </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Amount
                          <span class="asterix-error">
                            <em>*
                            </em>
                          </span>
                        </label> 
                        <input type="number" name="csb_amount" id="csb_amount" value="<?php echo $expense['csb_amount'] ?>" class="form-control color-primary-light" placeholder="Enter Amount" required>
                        <div class="help-block">
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label> Category 
                           <span class="asterix-error">
                            <em>*
                            </em>
                          </span>
                           </label>
                            <select name="csb_cbc_id" id="csb_cbc_id" class="form-control category-select2" onchange="getSubCategoryDetails(this.value);" required autocomplete="off">
                               <option value="<?php echo $expense['csb_cbc_id'] ?>" selected="selected"> <?php echo $expense['csb_cbc_name'] ?> </option>
                           </select>
                           <div class="help-block">
                          </div>
                        </div>
                       
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Sub Category  
                           
                        </label>
                           <select name="csb_csc_id" id="csb_csc_id" class="form-control sub-category-select2" autocomplete="off">
                             <option value="<?php echo $expense['csb_csc_id'] ?>" selected="selected"> <?php echo $expense['csb_csc_name'] ?> </option>
                            </select>
                            <div class="help-block">
                          </div>
                        </div>
                          
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Person 
                             <span class="asterix-error">
                              <em>*
                              </em>
                            </span>
                           </label>
                           <select name="csb_ppl_id" id="csb_ppl_id" class="form-control people-select2" required autocomplete="off">
                            <option value="<?php echo $expense['csb_ppl_id'] ?>" selected="selected"> <?php echo $expense['csb_ppl_name'] ?> </option>
                            </select>
                            <div class="help-block">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Account  
                           <span class="asterix-error">
                            <em>*
                            </em>
                          </span>
                        </label>
                          <select name="csb_acc_id" id="csb_acc_id" class="form-control account-select2" required autocomplete="off">
                             <option value="<?php echo $expense['csb_acc_id'] ?>" selected="selected"> <?php echo $expense['csb_acc_name'] ?> </option>
                            </select>
                            <div class="help-block">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Remark </label>
                        <textarea id="csb_remark" name="csb_remark" class="form-control color-primary-light" rows="3" placeholder="Remark"><?php echo $expense['csb_remark'] ?></textarea>
                      </div>
                    </div>
                  </div>   
              </div>
              <footer class="foo_bar">
                <div class="foo_btn">
                  <button type="submit" class="btn btn_save">Save &nbsp;
                    <i class="fa fa-check">
                    </i>
                  </button>
                  <button type="button" class="btn btn_can">Cancel &nbsp;
                    <i class="fa fa-times">
                    </i>
                  </button>
                </div>
              </footer>
              </form>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?> 
        <!-- OPTIONAL SCRIPTS -->
        
        <!-- END PAGE LEVEL PLUGINS -->

         <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <!-- END PAGE LEVEL PLUGINS -->
          <!-- BEGIN PAGE LEVEL PLUGINS -->
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
          <!-- END PAGE LEVEL PLUGINS -->
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      
        <script src="<?php echo base_url(); ?>assets/module/cashbook/js/cashbook-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/cashbook/expense/validation/expense.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
  </body>
</html>
