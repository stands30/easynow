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
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    
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
          <div class="portlet portlet-fluid-background portlet-fluid-small">
            <!-- <div class="row"> -->

              <form role="form" id="gen_prm_edit">
              <div class="container-fluid">
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center mt-20">General Parameter Edit
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <div class="col-md-8 col-md-offset-2 form_add">

                  <div class="col-md-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                          <input type="hidden" name="gnp_id" id="gnp_id" value="<?php echo $genPrmDetail->gnp_id ?>">
                          <input type="hidden" name="gpn_title"  id="gpn_title" value="<?php echo $gpn_title  ?>" class="form-control" placeholder="Value" >
                          <input type="hidden" name="gpn_id"  id="gpn_id" value="<?php echo $gpn_id  ?>" class="form-control" placeholder="Value" >
                            <input type="text" name="gnp_name" value="<?php echo $genPrmDetail->gnp_name ?>" id="gnp_name" class="form-control" required="">
                          <label>Name
                            <span class="asterix-error">
                              <em>*
                              </em>
                            </span>
                          </label>  
                          <i class="fas fa-user"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="gnp_group"  id="gnp_group" value="<?php echo $genPrmDetail->gnp_group ?>" class="form-control"  required="" disabled>
                        <label>Group
                          <span class="asterix-error">
                            <em>*
                            </em>
                          </span>
                        </label>  
                         <i class="fas fa-users"></i> 
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                       <label class="drp-title">&nbsp;</label>
                      <div class="input-icon">
                        <input type="number" name="gnp_order" value="<?php echo $genPrmDetail->gnp_order ?>" id="gnp_order" class="form-control" required="">
                        <label>Order
                          <span class="asterix-error">
                            <em>*
                            </em>
                          </span>
                        </label>  
                        <i class="fas fa-list-ol list-level"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <label class="drp-title">Status <span class="asterix-error"><em>*</em></span></label>

                      <div class="input-icon">
                        <i class="fa fa-info-circle"></i> 
                           <?php if($genPrmDetail->gnp_status == ACTIVE_STATUS)
                      {
                        $selectedActive = 'selected';
                        $selectedInactive = '';
                      }else
                      {
                        $selectedActive = '';
                        $selectedInactive = 'selected';
                      } ?>
                       <select name="gnp_status" value="" id="gnp_status" class="form-control custom-select2" tabindex="-1" aria-hidden="true" required="">
                          <option value="1" <?php echo $selectedActive ?>>Active</option>
                          <option value="2" <?php echo $selectedInactive ?>>Inactive</option>
                        </select>
                        <label class="custom-label">Please Select Status</label>
                      </div>
                        
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                          <textarea class="form-control" rows="2" name="gnp_description" value="" id="gnp_description"><?php echo $genPrmDetail->gnp_description ?></textarea>
                          <label>Description</label>  
                          <i class="far fa-credit-card list-level"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                </div>
              </div>
              <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_EDIT)); ?>
              </form>

          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
       
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>        
        <script src="<?php echo base_url(); ?>assets/module/gen-prm/js/form-validation/gen_prm.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
      </div>
  </body>
  


</html>
