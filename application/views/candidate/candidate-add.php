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
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
	<style type="text/css">
      .select2{
        width: 100% !important;
      }
      .enable-login-div
      {
        display: inline-flex;
      }
      .asterix-error
      {
        color:red;
      }
      .errormesssage
       {
           color:#f11414;
       }
    </style>
    
   
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
              <!-- START PAGE CONTENT-->
              <div class="container-fluid">

                <div class="text-center title_wrap">
                  <h3 class="page-title text-center">Add Candidate
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                      <form role="form" id="candidate_add" class="col-md-push-2 col-md-8 form_edit">
                          <div class="row">
                              <div class="form-group col-md-6">
                                <label>People Name 
                                  <span class="asterix-error">
                                    <em>*
                                    </em>
                                  </span>
                                </label>
                                <select name="cdt_ppl_id" id="cdt_ppl_id" class="form-control" autocomplete="off">
                                  <?php if(isset($ppl_id) && isset($ppl_name)) { ?>
                                  <option value="<?php echo $ppl_id; ?>"><?php echo $ppl_name; ?></option>
                                <?php } ?>
                                </select>
                                  <div class="help-block"></div>
                              </div>

                                <div class="form-group col-md-6">
                                  <label>Role<span class="asterix-error">
                                    <em>*
                                    </em>
                                  </span></label>
                                  <select id="cdt_role" name="cdt_role" class="form-control select2" tabindex="-1" aria-hidden="true" autocomplete="off">
                                  </select><div class="help-block"></div>
                                </div>

                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>Total Experience<span class="asterix-error">
                                      <em>*
                                      </em></label>
                                    <input type="text" name="cdt_total_exp" id="cdt_total_exp" class="form-control form_c" placeholder="Total Exp" value=""> <div class="help-block"></div>
                                </div>
                              </div>
                              <div class="form-group col-md-6">
                                  <label>Relevant Experience<span class="asterix-error">
                                    <em>*
                                    </em></label>
                                  <input type="text" name="cdt_relative_exp" id="cdt_relative_exp" class="form-control form_c" placeholder="Relative Exp" value="" >  <div class="help-block"></div>
                              </div>
                          </div>
                          <div class="row">

                              <div class="form-group col-md-6">
                                  <label>Notice Period<span class="asterix-error">
                                    <em>*
                                    </em></label>
                                  <input type="text" name="cdt_notice_period" id="cdt_notice_period" class="form-control form_c " placeholder="Notice Period" value="" ><div class="help-block"></div>
                              </div>
                              <div class="form-group col-md-6">
                                  <label>Expected CTC</label>
                                  <input type="text" name="cdt_exp_ctc" id="cdt_exp_ctc" class="form-control form_c" placeholder="Exp CTC" value="" >
                              </div>

                          </div>
                          <div class="row">

                              <div class="form-group col-md-6">
                                  <label>Current CTC<span class="asterix-error">
                                    <em>*
                                    </em></label>
                                  <input type="text" name="cdt_cur_ctc" id="cdt_cur_ctc" class="form-control form_c" placeholder="Curr CTC" value="" ><div class="help-block"></div>
                              </div>


                                <div class="form-group col-md-6">
                                  <label>Skills</label>
                                  <textarea class="form-control form_c" name="cdt_skills" id="cdt_skills" placeholder="Skills" rows="3"></textarea><div class="help-block"></div>
                                </div>

                          </div>
                          <div class="row">
                                <div class="form-group col-md-6">
                                  <label>Remark</label>
                                  <textarea class="form-control form_c" name="cdt_remark" id="cdt_remark" placeholder="Remark" rows="3"></textarea><div class="help-block"></div>
                                </div>
                          </div>
                      </div>
                    </div>
                    <footer class="foo_bar">
                        <!-- <div class="foo_btn">
                          <button type="submit" class="btn btn_save">Save&nbsp;
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
                </div>
              </form>
          </div>
        </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?> 
        <script type="text/javascript">
          
          $(document).ready(function(){
            $('.select_class').select2();
          })
        </script>
        <!-- OPTIONAL SCRIPTS -->
       
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $cacheversion; ?>" type="text/javascript">
        </script>
       
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/candidate/js/form-validation/candidate_add.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
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
