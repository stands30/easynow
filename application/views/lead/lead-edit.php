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
    <link href="<?php echo base_url(); ?>assets/module/lead/css/lead-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
              <div class="container-fluid">
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center mt-20">Edit Leads</h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form role="form" class="col-md-push-2 col-md-8 form_add" id="lead_edit">
                  <input type="hidden" name="led_pipeline" id="led_pipeline" value="<?php if(isset($leaddata->led_pipeline)) echo $leaddata->led_pipeline ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                         <label class="drp-title">People</label>
                        <div class="input-icon">
                          <i class="fas fa-user" ></i>
                          <input type="hidden" name="led_id" id="led_id" value="<?php if(isset($leaddata->led_id)) echo $leaddata->led_id ?>" class="form-control color-primary-light" placeholder="Amount">
                            <input type="hidden" name="led_code" id="led_code" value="<?php if(isset($leaddata->led_code)) echo $leaddata->led_code ?>" class="form-control color-primary-light" placeholder="Amount">
                            <select name="led_ppl_id" id="led_ppl_id" class="form-control" disabled="">
                              <option value="<?php if(isset($leaddata->led_ppl_id)) echo $leaddata->led_ppl_id?>" selected="selected"><?php if(isset($leaddata->led_ppl_name)) echo $leaddata->led_ppl_name ?></option>
                            </select>
                        <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Company</label>
                        <div class="input-icon">
                            <i class="fa fa-cubes"></i>
                            <select name="led_cmp_id" id="led_cmp_id" class="form-control edited select_class">
                        <?php if(isset($leaddata->led_cmp_id) and !empty($leaddata->led_cmp_id)){ ?>
                            <option value="<?php  echo $leaddata->led_cmp_id ?>" selected="selected"><?php echo $leaddata->led_cmp_name ?></option>
                          <?php } ?>
                            <option class="blank_option"></option>
                      </select> 
                        <div class="help-block"></div>   
                        </div>
                       
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label ">
                        <div class="input-icon">
                          <input type="text" id="led_title" name="led_title" class="form-control " value="<?php echo $leaddata->led_title; ?> ">
                          <label for="led_title">Lead Description<span class="asterix-error"><em>*</em></span></label>
                          <i class="fas fa-th-list"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                           <input type="text" name="led_amount" id="led_amount" value="<?php if(isset($leaddata->led_amount)) echo $leaddata->led_amount ?>" class="form-control color-primary-light" placeholder="Amount">
                            <label class="custom-label">Lead Amount<span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-rupee-sign"></i>
                          <div class="help-block"></div>
                        </div>                     
                      </div>
                    </div>
                  </div>
                  <div class="row">                  
                    <div class="col-md-6">
                       <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Temp</label>
                        <div class="input-icon">
                           <i class="fa fa-sun" ></i>  
                          <select name="led_temp" id="led_temp" class="form-control select_class custom-select2">
                          <?php if(isset($leaddata->led_temp)){ ?>
                            <option value="<?php  echo $leaddata->led_temp ?>" selected="selected"><?php echo $leaddata->led_temp_name ?></option>
                          <?php } ?>
                        </select>
                          <div class="help-block"></div>
                        </div>                        
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Source</label>
                        <div class="input-icon">
                           <i class="fas fa-database"></i>
                           <select name="led_src" id="led_src" class="form-control select_class custom-select2">
                            <option></option>
                            <?php if(isset($leaddata->led_src) and !empty($leaddata->led_src)){ ?>
                              <option value="<?php  echo $leaddata->led_src ?>" selected="selected"><?php echo $leaddata->led_src_name ?></option>
                            <?php } ?>
                          </select>
                            <div class="help-block"></div>
                        </div>                     
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Referred By</label>
                        <div class="input-icon">
                          <i class="fa fa-user"></i>
                           <select name="led_ref_by" id="led_ref_by" class="form-control custom-select2">
                          <option></option>
                          <?php if(isset($leaddata->led_ref_by) and !empty($leaddata->led_ref_by)){ ?>
                            <option value="<?php  echo $leaddata->led_ref_by ?>" selected="selected"><?php echo $leaddata->led_ref_by_name ?></option>
                          <?php } ?>
                        </select>
                        <div class="help-block"></div>
                        </div>                       
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <label class="drp-title">Type</label>
                            <div class="input-icon">
                                <i class="fas fa-th-list"></i>
                                <select name="led_type" id="led_type" class="form-control form_c led_type custom-select2"
                                data-msg="Please Select Type" data-requiredattribute="yes
                                " autocomplete="off" data-gen-grp='led_type'>
                                 <?php if(isset($leaddata->led_type) && $leaddata->led_type != '')
                                {?> 
                                  <option value="<?php echo $leaddata->led_type; ?>" selected="selected"><?php echo $leaddata->lead_type_name; ?></option>
                                <?php } ?>
                              <option class="blank_option"></option>
                                </select>
                                <span class="help-block custom-error"></span>
                            </div>                                                                        
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <label class="drp-title">Campaign</label>
                            <div class="input-icon">
                                <i class="fas fa-user-tie list-level"></i>                           
                                <select name="led_campaign" id="led_campaign" class="form-control form_c led_campaign custom-select2" data-msg="Please Select Campaign" data-requiredattribute="yes
                                " autocomplete="off">
                                <?php if(isset($leaddata->led_campaign) && $leaddata->led_campaign != '')
                                {?> 
                                  <option value="<?php echo $leaddata->led_campaign; ?>" selected="selected"><?php echo $leaddata->campaign_name; ?></option>
                                <?php } ?>
                              <option class="blank_option"></option>
                                </select>
                                <label class="custom-label">Please Select Campaign </label>
                                <span class="help-block custom-error"></span>
                            </div>                     
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group form-md-line-input form-md-floating-label">
                         <label class="drp-title">Managed by</label>
                        <div class="input-icon">
                          <i class="fas fa-user-tie list-level"></i>
                            <select name="led_managed_by" id="led_managed_by" class="form-control custom-select2">
                            <?php if(isset($leaddata->led_managed_by) and !empty($leaddata->led_managed_by)){ ?>
                              <option value="<?php  echo $leaddata->led_managed_by ?>" selected="selected"><?php echo $leaddata->led_managed_by_name ?></option>
                            <?php } ?>
                          </select>                           
                            <div class="help-block"></div>
                        </div>                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                         <label class="drp-title">Stage</label>
                        <div class="input-icon">
                          <i class="fa fa-cubes"></i>
                           <select name="led_lead_stage" id="led_lead_stage" class="form-control select_class custom-select2">
                          <?php if(isset($leaddata->led_lead_stage) and !empty($leaddata->led_lead_stage)){ ?>
                            <option value="<?php  echo $leaddata->led_src ?>" selected="selected"><?php echo $leaddata->led_lead_stage_name ?></option>
                          <?php } else { ?>
                            <option></option>
                          <?php } ?>
                        </select>
                          <div class="help-block"></div>
                        </div>                       
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Status</label>
                          <div class="input-icon">
                            <i class="fas fa-info-circle "></i>
                            <select name="led_lead_status" id="led_lead_status" class="form-control select_class custom-select2">
                            <?php if(isset($leaddata->led_lead_status) and !empty($leaddata->led_lead_status)){ ?>
                              <option value="<?php  echo $leaddata->led_lead_status ?>" selected="selected"><?php echo $leaddata->led_lead_status_name ?></option>
                            <?php } ?>
                          </select>
                            <div class="help-block"></div>
                          </div>                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group form-md-line-input form-md-floating-label col-md-12">
                      <div class="input-icon">
                        <textarea id="led_remark" name="led_remark" class="form-control color-primary-light" rows="2" ><?php if(isset($leaddata->led_remark)) echo $leaddata->led_remark ?></textarea>
                        <label>Remark</label>
                         <i class="fa fa-comments" aria-hidden="true"></i>
                        <div class="help-block"></div>
                      </div>                      
                    </div>
                  </div>
                  

                  
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
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       
        <script src="<?php echo base_url(); ?>assets/module/lead/js/lead-edit.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script type="text/javascript">
            $(document).ready(function(){
              $('.btn_save_new').on('click', function(){
                $('.no-redirect').prop('checked', true);
                $('.btn_save').click();
              })
            })
          </script>
       
      </div>
  </body>
</html>
