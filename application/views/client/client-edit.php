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
   
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
   
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
                  <h3 class="page-title text-center mt-20">Edit Client
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" id="client_edit" class="col-md-push-2 col-md-8 form_add">
                  <input type="hidden" name="cmp_id" id="cmp_id" value="<?php if(isset($clientdata->cmp_id)) echo $clientdata->cmp_id; ?>" class="form-control color-primary-light" placeholder="Client Name">
                  <input type="hidden" name="cmp_code" id="cmp_code" value="<?php if(isset($clientdata->cmp_code)) echo $clientdata->cmp_code; ?>" class="form-control color-primary-light" placeholder="Client Name">

                  <div class="col-md-12 no-side-padding">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="cmp_name" id="cmp_name" value="<?php if(isset($clientdata->cmp_name)) echo $clientdata->cmp_name; ?>" class="form-control color-primary-light" placeholder="Client Name">
                            <label>Client Name<span class="asterix-error">
                          <em>*
                          </em>
                        </span>
                      </label>
                      <i class="fas fa-user"></i>  
                      </div>                      
                      <div class="help-block"></div>
                    </div>
                    <div class="form-group col-md-6  form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="cmp_website" id="cmp_website" value="<?php if(isset($clientdata->cmp_website)) echo $clientdata->cmp_website; ?>" class="form-control color-primary-light">
                      <label>Client Website</label>
                      <i class="fas fa-globe"></i>  
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 no-side-padding">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
			                 <label class="drp-title">State</label>
                      <div class="input-icon">
                         <i class="fa fa-industry "></i>    
                        <select name="cmp_stm_id" id="cmp_stm_id" class="form-control cmp_stm_id custom-select2 ">
                        <?php if(!empty($clientdata->cmp_stm_id) && isset($clientdata->cmp_stm_id)){?>
                          <option value="<?php echo $clientdata->cmp_stm_id ?>"><?php echo $clientdata->cmp_stm_name ?></option>
                        <?php } ?>
                        <option></option>
                      </select>
                      <label class="custom-label">Client State</label>  
                      </div>
                    </div>
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label class="drp-title">Industry</label>
                      <div class="input-icon">
		                   <i class="fa fa-industry"></i> 
                        <select name="cmp_industry" id="cmp_industry" class="form-control cmp_industry custom-select2">
                        <?php if(!empty($clientdata->cmp_industry) && isset($clientdata->cmp_industry)){?>
                          <option value="<?php echo $clientdata->cmp_industry ?>"><?php echo $clientdata->cmp_industry_name ?></option>
                        <?php } ?>
                        <option></option>
                      </select>
                      <label class="custom-label">Please Select Industry</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 no-side-padding">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label class="drp-title">Client Type</label>
                      <div class="input-icon">
 		                      <i class="fas fa-building list-level"></i>
                        <select name="cmp_type" id="cmp_type" class="form-control cmp_type custom-select2">
                        <?php if(!empty($clientdata->cmp_type) && isset($clientdata->cmp_type)){?>
                          <option value="<?php echo $clientdata->cmp_type ?>"><?php echo $clientdata->cmp_type_name ?></option>
                        <?php } ?>
                        <option></option>
                      </select>
                       <label class="custom-label">Please Select Client Type</label>
                      </div>
                    </div>
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label class="drp-title">Client Annual Revenue</label>
                      <div class="input-icon">
                        <select name="cmp_anl_rev" id="cmp_anl_rev" class="form-control cmp_anl_rev custom-select2">
                        <?php if(!empty($clientdata->cmp_anl_rev) && isset($clientdata->cmp_anl_rev)){?>
                          <option value="<?php echo $clientdata->cmp_anl_rev ?>"><?php echo $clientdata->cmp_annual_rev ?></option>
                        <?php } ?>
                        <option></option>
                      </select>
                      <label class="custom-label">Select Annual Revenue</label> 
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 no-side-padding">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label></label>
                      <div class="input-icon">
                        <input type="text" name="cmp_gst_no" id="cmp_gst_no" value="<?php if(isset($clientdata->cmp_gst_no)) echo $clientdata->cmp_gst_no; ?>" class="form-control color-primary-light">
                      <label>Client GST No</label>
                      <i class="fas fa-id-card"></i>
                      </div>
                    </div>
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label></label>
                      <div class="input-icon">
                        <input type="text" name="cmp_pan" id="cmp_pan" value="<?php if(isset($clientdata->cmp_pan)) echo $clientdata->cmp_pan; ?>" class="form-control color-primary-light">
                        <label>Pan No</label>
                        <i class="fas fa-id-card"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 no-side-padding">
                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label></label>
                      <div class="input-icon">
                        <input type="number" name="cmp_pay_due" id="cmp_pay_due" value="<?php if(isset($clientdata->cmp_pay_due)) echo $clientdata->cmp_pay_due; ?>" class="form-control color-primary-light" placeholder="Payment Due">
                        <label>Payment Due</label>
                        <i class="fas fa-rupee-sign"></i>
                      </div>
                    </div><br>

                    <div class=" form-group col-md-6">
                      <label>Client Logo
                        <a href="#" data-toggle="tooltip" title="" class="data-tooltip-user" data-original-title="You can add multiple images with .png .jpg &amp; .jpeg file format"><span><i class="fa fa-info-circle"></i></span></a>
                      </label>
                      <?php if(isset($clientdata->cmp_logo)) echo $clientdata->cmp_logo; ?>
                      <div class="fileinput fileinput-new file-margin" data-provides="fileinput" style="margin-top:0px; ">
                        <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
                          <div id="image_preview" ></div>
                            <span class="btn default btn-file">
                              <input type="file" name="..." id="cmp_logo" name="cmp_logo" class="profile-image input-tag-view">
                              <div class="help-block"></div>
                            </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 no-side-padding">

                   <!-- <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label class="drp-title">Tags</label>
                      <div class="input-icon">
                         <i class="fa fa-tags"></i>
                        <select name="cmp_tgs_id" id="cmp_tgs_id" class="form-control cmp_tgs_id custom-select2" multiple="">
                          <?php //if(isset($clientdata->cmp_tgs_id)) echo GetTagData($clientdata->cmp_tgs_id,'select2');  ?>
                          <option></option>
                        </select>
                        <label class="custom-label">Please Select Tags</label> 
                      </div>
                    </div> -->

                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label class="drp-title">Tags</label>
                      <div class="input-icon">
                        <i class="fa fa-users"></i>
                        <select name="cmp_tgs_id" id="cmp_tgs_id" class="form-control cmp_tgs_id custom-select2-multiple" >
                            <?php if(isset($companydata->cmp_tgs_id)) echo GetTagData($companydata->cmp_tgs_id,'select2');  ?>
                            <option></option>
                        </select>    
                        <label class="custom-label" for="cmp_tgs_id">Please Select Tags</label>                    
                        <div class="help-block"></div>
                      </div>
                    </div>

                    <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                      <label>&nbsp;</label>
                      <div class="input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" name="cmp_employee" id="cmp_employee" class="form-control color-primary-light" value="<?php if(isset($companydata->cmp_employee)) echo $companydata->cmp_employee; ?>">
                      <label>Employees</label> 
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                    <label></label>
                    <div class="input-icon">
                      <textarea name="cmp_payment_terms" id="cmp_payment_terms" value="" class="form-control color-primary-light" rows="2"><?php if(isset($clientdata->cmp_payment_terms)) echo $clientdata->cmp_payment_terms; ?></textarea>
                      <label>Payment Terms</label>  
                      <i class="far fa-credit-card"></i>
                    </div>
                  </div>
                  <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                    <label></label>
                    <div class="input-icon">
                      <textarea name="cmp_address" id="cmp_address" class="form-control color-primary-light" rows="2"><?php if(isset($clientdata->cmp_address)) echo $clientdata->cmp_address; ?></textarea>
                      <label>Client Address</label>
                      <i class="fas fa-map-marker list-level"></i>
                    </div>
                  </div>
                </div>
              </div>
              <footer class="foo_bar">
                <div class="foo_btn">
                  <button type="submit" class="btn btn_save" data-loading-text="<i class='fa fa-spinner'></i> Saving...">Save&nbsp;
                    <i class="fa fa-check">
                    </i>
                  </button>
                  <button type="button" class="btn btn_can">Cancel&nbsp;
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/client/js/form-validation/client_edit.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script type="text/javascript">
          $(document).ready(function(){

          })
          // ******** Preview Image Starts here *********//
          $('.profile-image').change(function(e){
             preview_image(e);
          });
          function preview_image(event)
          {
            var total_file= $('.profile-image')[0].files.length;
            $('#image_preview').html('');
            for(var i=0;i<total_file;i++)
            {
              $('#image_preview').append("<span class=\"pip\">" + "<img class=\"imageThumb\" src=\"" +  URL.createObjectURL(event.target.files[i]) + "\" width=\"50%\" height=\"50%\" />" +"</span>");
            }
          }
          // ******** Preview Image Ends here*********//
        </script>

        <!-- <script src="<?php //echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script> -->
        <!-- END OPTIONAL SCRIPTS -->
      </div>
  </body>
</html>
