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
                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Add New Leads</h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form role="form" class="col-md-push-2 col-md-8 form_add" id="lead_add">
                  <div class="row">
                    <input type="hidden" name="led_pipeline" id="led_pipeline" value="1">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">People</label>
                        <div class="input-icon">
                            <i class="fas fa-user" ></i>
                            <select name="led_ppl_id" id="led_ppl_id" class="form-control custom-select2">
                            <option value="<?php if(isset($ppl_id)) echo $ppl_id?>" selected="selected"><?php if(isset($ppl_name)) echo $ppl_name ?></option>
                            <option></option>
                          </select>  

                         <label class="custom-label">Please Select People</label>
                        </div>
                          <div class="help-block"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">  
                         <label class="drp-title">Company</label>
                        <div class="input-icon">
                          <i class="fa fa-cubes"></i>
                            <select name="led_cmp_id" id="led_cmp_id" class="form-control led_cmp_id custom-select2">
                            <option></option>
                          </select>
                           <label for="led_cmp_id" class="custom-label">Please Select Company</label>
                            <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label ">
                        <div class="input-icon">
                          <input type="text" id="led_title" name="led_title" class="form-control color-primary-light" autocomplete="off">
                          <label for="led_title">Lead Description
                          <span class="asterix-error">
                            <em>*
                            </em>
                          </span></label>
                          <i class="fas fa-th-list"></i>
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="led_amount" id="led_amount" value="" class="form-control color-primary-light">
                        <label for="led_amount">Lead Amount<span class="asterix-error"><em>*</em></span></label>
                        <i class="fas fa-rupee-sign"></i>
                        <div class="help-block"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Temp</label>
                        <div class="input-icon">
                          <i class="fa fa-sun" ></i>  
                          <select name="led_temp" id="led_temp" data-gen-grp="led_temp" class="form-control  custom-select2 " data-minimum-results-for-search="Infinity">
                          <!-- <?php echo getGenPrmResult('dropdown','led_temp','led_temp','','result'); ?> -->
                            <option></option>
                          </select>
                          <label class="custom-label">Please Select Temp<span class="asterix-error"><em>*</em></span></label>
                          <div class="help-block"></div>  
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Source</label>
                        <div class="input-icon">
                          <i class="fas fa-database"></i>
                          <select name="led_src" id="led_src" class="form-control select_class custom-select2 custom-select2" data-gen-grp="led_src" data-minimum-results-for-search="Infinity">
                            <option></option>
                          </select>
                          <label class="custom-label" >Please Select Source<span class="asterix-error"><em>*</em></span></label>
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
                          </select>
                          <label for="led_ref_by" class="custom-label">Please Select Referred By</label>
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
                            " autocomplete="off" data-gen-grp='led_type' data-minimum-results-for-search="Infinity">
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
                            <select name="led_managed_by" id="led_managed_by" class="form-control led_managed_by custom-select2">
                            <option value="<?php echo $this->session->userdata(PEOPLE_SESSION_ID)?>"><?php echo $this->session->userdata(PEOPLE_SESSION_NAME)  ?></option>
                            <option></option>
                          </select>
                          <label for="led_managed_by" class="custom-label">Please Select Managed by<span class="asterix-error"><em>*</em></span></label>
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
                            <select name="led_lead_stage" id="led_lead_stage" class="form-control led_lead_stage custom-select2" data-gen-grp='led_lead_stage' data-minimum-results-for-search="Infinity">
                               <option value="1" selected="">Lead in</option>
                          </select>
                           <label for="led_lead_stage" class="custom-label">Please Select Stage</label>
                            <div class="help-block"></div>
                        </div>
                      </div>
                    </div>
                   <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                         <label class="drp-title">Status</label>
                        <div class="input-icon">
                          <i class="fas fa-info-circle "></i>
                          <select name="led_lead_status" id="led_lead_status" data-gen-grp="led_lead_status" class="form-control select_class custom-select2" data-minimum-results-for-search="Infinity">                          
                          <option></option>
                        </select>
                         <label class="custom-label">Please Select Status<span class="asterix-error"><em>*</em></span></label>
                          <div class="help-block"></div>  
                        </div>
                      </div>
                   </div>
                </div>
                <div class="row">
                  <div class="form-group form-md-line-input form-md-floating-label col-md-12">
                    <div class="input-icon">
                      <textarea id="led_remark" name="led_remark" class="form-control color-primary-light" rows="3"></textarea>
                      <label for="led_remark">Remark</label>
                      <i class="fa fa-comments" aria-hidden="true"></i>
                      <div class="help-block"></div>
                    </div>
                  </div>
                </div>

                </div>
              </div>
              <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_ADD)); ?>   
              </form>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/module/lead/js/lead-add.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- END OPTIONAL SCRIPTS -->
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
