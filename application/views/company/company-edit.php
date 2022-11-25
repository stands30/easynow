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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/project/global/plugins/bootstrap-summernote/summernote.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo base_url();?>assets/module/company/css/company-custom.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                  <h3 class="page-title text-center mt-20">Edit Company
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" id="company_edit" class="col-md-push-2 col-md-8 form_add">
                  <input type="hidden" name="cmp_id" id="cmp_id" value="<?php if(isset($companydata->cmp_id)) echo $companydata->cmp_id; ?>" class="form-control color-primary-light" placeholder="Company Name">
                  <input type="hidden" name="cmp_code" id="cmp_code" value="<?php if(isset($companydata->cmp_code)) echo $companydata->cmp_code; ?>" class="form-control color-primary-light" placeholder="Company Name">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">                    
                        <div class="input-icon">
                          <i class="fa fa-industry icon-company"></i>
                            <input type="text" name="cmp_name" id="cmp_name" value="<?php if(isset($companydata->cmp_name)) echo $companydata->cmp_name; ?>" class="form-control color-primary-light">                      
                            <label>Company Name<span class="asterix-error"><em>*</em></span></label>
                          <div class="help-block"></div>                    
                        </div>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
<?php
                          $url = sanitizeURL($companydata->cmp_website);
?>                          
                          <input type="text" name="cmp_website" id="cmp_website" value="<?php if(isset($url->text)) echo $url->text; ?>" class="form-control color-primary-light">
                          <label>Company Website  </label>
                          <i class="fas fa-globe"></i>  
                          <div class="help-block"></div>                       
                        </div>  
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                         <label class="drp-title">State</label>
                          <div class="input-icon">
                            <i class="fas fa-map-marked-alt"></i> 
                            <select name="cmp_stm_id" id="cmp_stm_id" class="form-control cmp_stm_id  custom-select2">
                            <?php if(!empty($companydata->cmp_stm_id) && isset($companydata->cmp_stm_id)){?>
                              <option value="<?php echo $companydata->cmp_stm_id ?>"><?php echo $companydata->cmp_stm_name; ?></option>
                            <?php }else{ ?> 
                              <option></option>
                            <?php } ?>
                          </select>
                          <label class="custom-label">Company State</label>  
                          <div class="help-block"></div>
                          </div>                      
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Industry</label>
                        <div class="input-icon">
                           <i class="fa fa-industry"></i>               
                            <select name="cmp_industry" id="cmp_industry" class="form-control cmp_industry custom-select2">
                            <?php if(!empty($companydata->cmp_industry) && isset($companydata->cmp_industry)){?>
                              <option value="<?php echo $companydata->cmp_industry ?>"><?php echo $companydata->cmp_industry_name ?></option>
                            <?php } ?>
                            <option></option>
                          </select>
                          <label class="custom-label">Please Select Industry</label>
                        </div>    
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Company Type</label>
                        <div class="input-icon">
                          <i class="fas fa-building list-level"></i>
                        <select name="cmp_type" id="cmp_type" class="form-control cmp_type custom-select2">
                          <?php if(!empty($companydata->cmp_type) && isset($companydata->cmp_type)){?>
                            <option value="<?php echo $companydata->cmp_type ?>"><?php echo $companydata->cmp_type_name ?></option>
                          <?php } ?>
                          <option></option>
                        </select>  
                        <label class="custom-label">Please Select Company Type</label>   
                        </div>
                        
                        <div class="help-block"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Annual Revenue</label>
                        <div class="input-icon">
                           <i class="fas fa-chart-pie"></i>
                          <select name="cmp_anl_rev" id="cmp_anl_rev" class="form-control cmp_anl_rev custom-select2">
                          <?php if(!empty($companydata->cmp_anl_rev) && isset($companydata->cmp_anl_rev)){?>
                            <option value="<?php echo $companydata->cmp_anl_rev ?>"><?php echo $companydata->cmp_anl_rev_name ?></option>
                          <?php } ?>
                          <option></option>
                        </select>  
                        <label class="custom-label">Please Select Annual Revenue</label>   
                        </div>
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <textarea name="cmp_address" id="cmp_address" class="form-control color-primary-light" rows="2"><?php if(isset($companydata->cmp_address)) echo $companydata->cmp_address; ?></textarea>
                          <label>Company Address</label> 
                          <i class="fas fa-map-marker list-level"></i> 
                        </div>
                        
                        <div class="help-block"></div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" id="cmp_location" name="cmp_location" class="form-control color-primary-light" value="<?php echo $companydata->cmp_location; ?>" placeholder="" />
                          <input type="hidden" id="cmp_google_lat" name="cmp_google_lat" value="<?php echo $companydata->cmp_google_lat; ?>" />
                          <input type="hidden" id="cmp_google_long" name="cmp_google_long" value="<?php echo $companydata->cmp_google_long; ?>" />
                          <label for="cmp_employee">Location</label>
                         <i class="fas fa-user-tie "></i>
                        </div>
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    
                    <div class="col-md-6">
                       <div class="form-group form-md-line-input form-md-floating-label">
                        <label>&nbsp;</label>
                        <div class="input-icon">
                          <i class="fas fa-user"></i>
                          <input type="number" name="cmp_employee" id="cmp_employee" class="form-control color-primary-light" value="<?php if(isset($companydata->cmp_employee)) echo $companydata->cmp_employee; ?>">
                          <label for="cmp_employee">No. of Employees</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group  form-md-line-input form-md-floating-label">
                        <label class="drp-title">Tags</label>
                        <div class="input-icon">
                          <i class="fa fa-users"></i>
                          <select name="cmp_tgs_id" id="cmp_tgs_id" class="form-control cmp_tgs_id custom-select2-multiple" multiple="">
                            <option value="0" selected="" class="blank_option"></option>
                              <?php if(isset($companydata->cmp_tgs_id)) echo GetTagData($companydata->cmp_tgs_id,'select2');  ?>
                          </select>    
                          <label class="custom-label" for="cmp_tgs_id">Please Select Tags</label>                    
                          <div class="help-block"></div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title"> Managed By</label>
                        <div class="input-icon">
                          <i class="fas fa-chart-pie"></i>
                          <select name="cmp_managed_by" id="cmp_managed_by" class="form-control cmp_managed_by">
                            <option value="<?php if(isset($companydata->cmp_managed_by)) echo $companydata->cmp_managed_by; ?>"><?php if(isset($companydata->cmp_managed_by_name)) echo $companydata->cmp_managed_by_name; ?></option>
                          </select>           
                          <div class="help-block"></div>
                          </div>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input">
                        <div class="md-radio-inline input-radio-custom">
                            <div class="md-radio">
                                <input type="radio" id="radio_company" <?php if(isset($companydata->cmp_type_id) && $companydata->cmp_type_id == COMPANY_TYPE_COMPANY) echo 'checked="checked"'; ?> name="radio_company_account" value="<?php echo COMPANY_TYPE_COMPANY; ?>" class="md-radiobtn radio_company_account">
                                <label for="radio_company">
                                  <span></span>
                                  <span class="check"></span>
                                  <span class="box"></span> Company 
                                </label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" id="radio_account" <?php if(isset($companydata->cmp_type_id) && $companydata->cmp_type_id == COMPANY_TYPE_ACCOUNT) echo 'checked="checked"'; ?> name="radio_company_account" value="<?php echo COMPANY_TYPE_ACCOUNT; ?>" class="md-radiobtn radio_company_account">
                                <label for="radio_account">
                                  <span></span>
                                  <span class="check"></span>
                                  <span class="box"></span> Account 
                                </label>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class=" col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <textarea name="cmp_remark" id="cmp_remark" value="<?php if(isset($companydata->cmp_remark)) echo $companydata->cmp_remark; ?>" class="form-control color-primary-light" rows="2"></textarea>                     
                          <label>Remark</label>
                          <i class="far fa-credit-card"></i>
                        </div>
                      </div>
                    </div>
                  </div>                 
                  <div class="row">
                    <div class="col-md-6">
                       <div class="form-group  form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="url" name="cmp_facebook" id="cmp_facebook" value="<?php if(isset($companydata->cmp_facebook)) echo $companydata->cmp_facebook; ?>" class="form-control  color-primary-light">
                          <label for="cmp_facebook">Facebook
                          </label>
                          <i class="fab fa-facebook-f"></i>
                        </div>
                        <div class="help-block"></div>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="url" name="cmp_linkedin" id="cmp_linkedin" value="<?php if(isset($companydata->cmp_linkedin)) echo $companydata->cmp_linkedin; ?>" class="form-control  color-primary-light">
                          <label for="cmp_linkedin">LinkedIn
                          </label>
                          <i class="fab fa-linkedin"></i>
                        </div>
                        <div class="help-block"></div>  
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="url" name="cmp_instagram" id="cmp_instagram" value="<?php if(isset($companydata->cmp_instagram)) echo $companydata->cmp_instagram; ?>" class="form-control  color-primary-light">
                          <label for="cmp_instagram">Instagram
                          </label>
                          <i class="fab fa-instagram"></i>
                        </div>
                        <div class="help-block"></div>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="url" name="cmp_twitter" id="cmp_twitter" value="<?php if(isset($companydata->cmp_twitter)) echo $companydata->cmp_twitter; ?>" class="form-control  color-primary-light">
                          <label for="cmp_twitter">Twitter
                          </label>
                          <i class="fab fa-twitter"></i>
                        </div>
                        <div class="help-block"></div>  
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="url" name="cmp_youtube" id="cmp_youtube" value="<?php if(isset($companydata->cmp_youtube)) echo $companydata->cmp_youtube; ?>" class="form-control  color-primary-light">
                          <label for="cmp_youtube">Youtube
                          </label>
                          <i class="fab fa-youtube"></i>
                        </div>
                        <div class="help-block"></div>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class=" form-group form-md-line-input form-md-floating-label">                    
                        <label class="drp-title">Company Logo
                          <a href="#" data-toggle="tooltip" title="" class="data-tooltip-user" data-original-title="You can add multiple images with .png .jpg &amp; .jpeg file format"><span><i class="fa fa-info-circle"></i></span></a>
                        </label>

                        <div class="fileinput fileinput-new file-margin" data-provides="fileinput" style="margin-top:0px; ">
                          <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
                            <div id="image_preview" ></div>

                              <?php $imagefullPath= base_url().COMPANY_LOGO.$companydata->cmp_logo;
                              $imageName = $companydata->cmp_logo;
                              if($imageName != '')
                              { ?>
                              <span class="pip" ><img class="imageThumb" src="<?php echo $imagefullPath; ?>" style="height: 150px;" /></span>
                              <?php }
                              ?>
                              <span class="btn default btn-file">
                                <input type="file" name="..." id="cmp_logo" name="cmp_logo" class="profile-image input-tag-view">
                                <div class="help-block"></div>
                              </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="<?php if(isset($companydata->cmp_type_id) && $companydata->cmp_type_id == COMPANY_TYPE_COMPANY) echo 'hidden'; ?>" id="account_div">
                    <div class="row">
                      <!-- <label>If account radio button is checked then only show the below fields</label> -->
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" name="cmp_gst_no" id="cmp_gst_no" value="<?php if(isset($companydata->cmp_gst_no)) echo $companydata->cmp_gst_no; ?>" class="form-control color-primary-light">
                            <label>GST No</label>
                            <i class="fas fa-id-card"></i>
                          </div>                      
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                              <input type="text" name="cmp_pan" id="cmp_pan" value="<?php if(isset($companydata->cmp_pan)) echo $companydata->cmp_pan; ?>" class="form-control color-primary-light">
                            <label>Pan No</label>
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>
                    <div class="row">                      
                      <div class="col-md-12">
                        <label class="drp-title drp-label-title">Payment Terms </label>
                         <textarea name="cmp_payment_terms" id="cmp_payment_terms" value="" class="form-control color-primary-light" rows="2"><?php if(isset($companydata->cmp_payment_terms)) echo $companydata->cmp_payment_terms; ?></textarea>
                        
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
        <!-- OPTIONAL SCRIPTS -->
       
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js<?php echo $global_asset_version ?>" type="text/javascript"></script>
        
        <script src="<?php echo base_url(); ?>assets/module/company/js/form-validation/company_edit.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBF5LAdqTeQau6aWexOieRr98vnicuvut8"></script>
        
        <script type="text/javascript">
          $(document).ready(function(){
            // ******** Preview Image Starts here *********//
            $('.profile-image').change(function(e){
               preview_image(e);
            });
             $('.blank_option').remove();
             $('.radio_company_account').on('change',function(){
              if($(this).val() == "<?php echo COMPANY_TYPE_ACCOUNT; ?>")
               $('#account_div').removeClass('hidden');
              else
               $('#account_div').addClass('hidden');
              })

            $('#cmp_website').on('keypress keyup', function(){
              if($(this).val().length < 8)
                $(this).val('http://')
            })

            initCompanyGoogleLocation();

            $('#cmp_payment_terms').summernote({
                height:300,
             });
          })

          function initCompanyGoogleLocation()
          {
              var autocomplete;
              var input = document.getElementById('cmp_location');
              autocomplete = new google.maps.places.Autocomplete(input);

              autocomplete.addListener('place_changed', function() {
                 var place = autocomplete.getPlace();
                $('#cmp_google_lat').val(place.geometry.location.lat());
                $('#cmp_google_long').val(place.geometry.location.lng());
              });
          }
            
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
