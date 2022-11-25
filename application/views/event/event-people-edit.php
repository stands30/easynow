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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
   
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
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Edit Event People
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form  role="form" id="event_ppl_edit" class="col-md-push-2 col-md-8 form_add">
                  <!-- <input type="hidden" name="bpl_bnk_id" id="bpl_bnk_id" value="<?php //echo $bnk_id ?>"> -->
                  <input type="hidden" name="epl_id" id="epl_id" value="<?php echo $eventPplDetail->epl_id ?>">
                  <div class="row">
                      <div class="form-group col-md-6 form-md-line-input form-md-floating-label"> 
                        <label class="drp-title">Event</label>
                        <div class="input-icon">
                          <i class="far fa-calendar list-level"></i>
                          <select name="epl_evt_id" id="epl_evt_id"  class="form-control event_name" required>
                            <option value="<?php echo $eventPplDetail->epl_evt_id ?>"><?php echo $eventPplDetail->evt_name ?></option>
                          </select>
                          <div class="help-block"></div>
                        </div>
                     </div>

                       <!-- <input type="hidden" name="epl_id" id="epl_id" value=""> -->
                         <div class="form-group col-md-6 form-md-line-input form-md-floating-label">  
                             <label class="drp-title">People</label>
                             <div class="input-icon">
                              <i class="fa fa-user icon-people"></i>
                              <select class="form-control event_people" id="epl_ppl_id" name="epl_ppl_id" required>
                                <option value="<?php echo $eventPplDetail->epl_ppl_id ?>"><?php echo $eventPplDetail->ppl_name ?></option>
                              </select>
                              <div class="help-block"></div>
                             </div>
                             
                         </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                          <div class="input-icon input-line-custom">
                            <textarea name="epl_remark" rows="3" class="form-control" id="epl_remark"><?php echo $eventPplDetail->epl_remark ?></textarea>
                            <label for="epl_remark">Remark</label>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <div class="help-block"></div>
                          </div>

                        </div>
                      </div>



                  </div>
              </div>
              <footer class="foo_bar">
                <!-- <div class="foo_btn">
                  <button type="submit" class="btn btn_save" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving...">Save&nbsp;
                    <i class="fa fa-check">
                    </i>
                  </button>
                  <button type="button" class="btn btn_can">Cancel&nbsp;
                    <i class="fa fa-times">
                    </i>
                  </button>
                </div> -->

                <div class="foo_btn">
                  <button type="button" class="btn btn_can">Cancel&nbsp;<i class="fa fa-times"></i></button>
                  <input type="checkbox" class="no-redirect hidden" />
                  <button type="button" class="btn btn_primary btn_save_new btn-save">Save & New &nbsp;<i class="fa fa-check"></i></button>
                  <button type="submit" class="btn btn_save">Save&nbsp;<i class="fa fa-check"></i></button>
                  <button type="button" class="btn btn_processing" style="display: none;"><i class='fa fa-spinner'></i> Saving...</i></button>
                </div>

              </footer>
              </form>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/additional-methods.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/event/js/form-validation/event_people.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
        
          <script type="text/javascript">
            $(document).ready(function(){
              $('.btn_save_new').on('click', function(){
                $('.no-redirect').prop('checked', true);
                $('.btn_save').click();
              })
            })
          </script>
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </body>
    </html>
