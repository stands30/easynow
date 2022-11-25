<!DOCTYPE html>
    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
        <head>
            <link rel="shortcut icon" href="favicon.ico" />
            <?php $this->load->view('common/header_styles'); ?>         
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL PLUGINS -->
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> 
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-add-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <style type="text/css">
                .profile_pic {
                    margin-left: -16px !important;
                    margin-top: 0px !important;
                }
                .profile_pic_label {
                    margin-top: 20px !important;
                }
                
            </style>
       
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
             <link href="<?php echo base_url(); ?>assets/module/people/css/people-add-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />        
        </head>
        <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
            <?php $this->load->view('common/header'); ?> 
            <div class="clearfix"> </div>
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
                                        <h3 class="page-title text-center mt-20">Update People Details</h3>
                                        <span class="sp_line color-primary"></span>
                                    </div>
                                    <!-- -----MAIN CONTENTS START HERE----- -->
                                        <form role="form" class="form_add" id="peopleEditForm">
                                            <!-- ************** Hidden Field Starts here *************** -->
                                            <input type="hidden" id="ppl_id" name="ppl_id" value="<?php echo $people->ppl_id; ?>">
                                            <input type="hidden" id="ppl_email_id" name="ppl_email_id" value="<?php echo $people->ppl_email_id; ?>">
                                            <input type="hidden" id="ppl_mob_id" name="ppl_mob_id" value="<?php echo $people->ppl_mob_id; ?>">
                                            <!-- ************** Hidden Field Ends here *************** -->
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8 col-offset-2">
                                                    <div class="row row-custom">
                                                        <div class="col-md-3">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" id="ppl_met_on" name="ppl_met_on" required="" data-msg="Please Select Met on Date" value="<?php echo datePickerDisplayDate($people->ppl_met_on) ?>">
                                                                    <label class="control-label">Met On </label>
                                                                    <i class="fa fa-calendar-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon"> 
                                                                    <i class="fa fa-user"></i>     
                                                                    <select name="ppl_title_id" id="ppl_title_id" class="form-control people-title" >
                                                                        <?php if($people->ppl_title_id != '0') { ?> 
                                                                        <option value="<?php echo $people->ppl_title_id; ?>" selected><?php echo $people->ppl_title_name; ?></option>
                                                                    <?php } ?>
                                                                    <option class="blank_option"></option>
                                                                    </select>
                                                                     
                                                                <label class="">Title</label>
                                                                    <span class="custom-error"></span>
                                                                </div>  
                                                            </div>
                                                        </div> 

                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">     
                                                                    <input type="text" name="ppl_name" id="ppl_name"  class="form-control" required="" data-msg="Please Enter Full Name" value="<?php if(!empty($people->ppl_name)){ echo $people->ppl_name; } ?>">
                                                                    <label for="ppl_name">Name <span class="asterix-error"><em>*</em></span></label>
                                                                    <i class="fa fa-user"></i>     
                                                                </div> 
                                                                <span class="custom-error"></span>   
                                                            </div>
                                                        </div>
                                                          
                                                                                                                
                                                            
                                                    </div>
                                                    <div class="row row-custom">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">
                                                                     <input type="text" name="ppl_email" id="ppl_email"  class="form-control"  data-msg="Please enter Email" value="<?php if(!empty($people->ppl_email)){ echo $people->ppl_email; } ?>">
                                                                    <label>Email </label>
                                                                    <i class="fa fa-envelope"></i>
                                                                </div>
                                                                <span class="custom-error"></span>
                                                            </div>
                                                        </div> 

                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">
                                                                    
                                                                    <input type="number" name="ppl_mobile" id="ppl_mobile"  class="form-control"  data-msg="Please Enter Mobile" value="<?php if(!empty($people->ppl_mob)){ echo $people->ppl_mob; } ?>">
                                                                    <label>Mobile </label>
                                                                    <i class="fa fa-mobile"></i>
                                                                </div>  
                                                                <span class="custom-error"></span> 
                                                            </div>
                                                        </div>  
                                                                                                                 
                                                            
                                                    </div>
                                                    <div class="row row-custom">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">
                                                                    <input type="text" class="form-control" id="ppl_dob" name="ppl_dob" value="<?php echo datePickerDisplayDate($people->ppl_dob) ?>">
                                                                    <label class="control-label">DOB</label>
                                                                    <i class="fa fa-calendar-alt"></i>
                                                                </div>    
                                                                <span class="custom-error"></span>  
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">
                                                                     <select name="ppl_tgs_id" id="ppl_tgs_id" class="form-control tags-select2" multiple="">
                                                                        <option selected="" value="" class="temp_option">Select</option>

                                                                        <?php echo GetTagData($people->ppl_tgs_id,'select2');  ?>
                                                                    </select>
                                                                    <i class="fas fa-tags "></i>
                                                                <label class="control-label1">Tags</label>
                                                                </div>
                                                                <span class="custom-error"></span>
                                                            </div>
                                                           <!--  <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">
                                                                    <select name="ppl_tgs_id" id="ppl_tgs_id" class="form-control tags-select2 custom-select2" autocomplete="off"> <option selected="" value="" class="temp_option">Select</option>
                                                                        <?php echo GetTagData($people->ppl_tgs_id,'select2');  ?>
                                                                    </select>
                                                                    <i class="fas fa-tags "></i>
                                                                    <label class="">Tags</label>
                                                                    <span class="help-block custom-error"></span>
                                                                </div>                                                                
                                                            </div> -->
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row row-custom">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                               
                                                                    <label>Gender</label>
                                                                    
                                                                    <div class="md-radio-inline">
                                                                    <?php echo getGenPrmResult('radio','ppl_gender','ppl_gender',$people->ppl_gender,'result'); ?>
                                                                    </div>
                                                            </div> 
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="profile_pic_label">Upload Profile Pic</label><br />
                                                            <div class=" form-group fileinput fileinput-new file-margin profile_pic" data-provides="fileinput" style="">
                                                                <div class="col-md-6 col-custom">
                                                                    <div id="image_preview" >
                                                                        <?php $imagefullPath= base_url().PEOPLE_PROFILE_IMAGE.$people->ppl_profile_image;
                                                                        $imageName = $people->ppl_profile_image;
                                                                        if($imageName != '')
                                                                        { ?>
                                                                        <span class="pip" ><img class="imageThumb" src="<?php echo $imagefullPath; ?>" style="width: 220px;" /></span>
                                                                        <?php }
                                                                   ?>
                                                                    </div>
                                                                    <span class="btn default btn-file">
                                                                        <input type="file" name="..." id="ppl_profile_image" name="ppl_profile_image" class="profile-image" > 
                                                                    </span>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row row-custom">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">                                                                    
                                                                    <textarea class="form-control" rows="2" id="ppl_address" name="ppl_address"><?php if(!empty($people->ppl_address)){ echo $people->ppl_address; } ?></textarea>
                                                                    <label>Address </label>
                                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                </div>
                                                                <span class="custom-error"></span>
                                                            </div> 
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                              <div class="input-icon">
                                                                <input type="text" id="ppl_location" name="ppl_location" class="form-control color-primary-light" placeholder="" value="<?php if(!empty($people->ppl_location)){ echo $people->ppl_location; } ?>">
                                                                <input type="hidden" id="ppl_google_lat" name="ppl_google_lat" value="<?php if(!empty($people->ppl_google_lat)){ echo $people->ppl_google_lat; } ?>"/>
                                                                <input type="hidden" id="ppl_google_long" name="ppl_google_long" value="<?php if(!empty($people->ppl_google_long)){ echo $people->ppl_google_long; } ?>"/>
                                                                <label for="ppl_location">Location
                                                                </label>
                                                                <i class="fas fa-map-marked-alt"></i>
                                                              </div>
                                                              <div class="help-block"></div>  
                                                            </div>
                                                        </div> 
                                                            
                                                    </div>
                                                    <div class="row row-custom">

                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">
                                                                    
                                                                    <textarea class="form-control" rows="2" id="ppl_remark" name="ppl_remark"><?php if(!empty($people->ppl_remark)){ echo $people->ppl_remark; } ?></textarea>
                                                                    <label>Remark</label>
                                                                    <i class="fa fa-comments"></i>                                                                    
                                                                </div>
                                                                <span class="custom-error"></span>
                                                            </div>
                                                        </div> 

                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">  
                                                                <label class="drp-title">Managed By</label>
                                                                <div class="input-icon">
                                                                    <i class="fas fa-user-tie list-level"></i>
                                                                    <select name="ppl_managed_by" id="ppl_managed_by" class="form-control ppl_managed_by custom-select2">
                                                                    <?php if($people->ppl_managed_by != '0') { ?> 
                                                                        <option value="<?php echo $people->ppl_managed_by; ?>" selected><?php echo $people->ppl_managed_by_name; ?></option>
                                                                    <?php } ?>
                                                                        <option class="blank_option"></option>
                                                                    </select>                                                              
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <div class="row row-custom">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label ">
                                                                <div class="input-icon">
                                                                    <input type="url" name="ppl_social_fb" id="ppl_social_fb" class="form-control edited  color-primary-light" value="<?php if(isset($people->ppl_social_fb)) echo $people->ppl_social_fb; ?>">
                                                                    <label for="ppl_social_fb">Facebook </label>
                                                                    <span class="help-block custom-error"></span>
                                                                    <i class="fab fa-facebook-f"></i>
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">
                                                                    <input type="url" name="ppl_social_linkedin" id="ppl_social_linkedin"  class="form-control  color-primary-light" value="<?php if(isset($people->ppl_social_linkedin)) echo $people->ppl_social_linkedin; ?>">
                                                                    <label for="ppl_social_linkedin">LinkedIn
                                                                    </label>
                                                                    
                                                                    <i class="fab fa-linkedin"></i>
                                                                </div>
                                                                <div class="help-block custom-error"></div>  
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row row-custom">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="input-icon">
                                                                    <input type="url" name="ppl_social_instagram" id="ppl_social_instagram"  class="form-control  color-primary-light" value="<?php if(isset($people->ppl_social_instagram)) echo $people->ppl_social_instagram; ?>">
                                                                    <label for="ppl_social_instagram">Instagram</label>
                                                                
                                                                    <i class="fab fa-instagram"></i>
                                                                </div>
                                                                <div class="help-block custom-error"></div>  
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                              <div class="input-icon">
                                                                <input type="url" name="ppl_social_twitter" id="ppl_social_twitter"  class="form-control  color-primary-light" value="<?php if(isset($people->ppl_social_twitter)) echo $people->ppl_social_twitter; ?>">
                                                                <label for="ppl_social_twitter">Twitter</label>
                                                                <i class="fab fa-twitter"></i>
                                                              </div>
                                                              <div class="help-block custom-error"></div>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="row row-custom">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                              <div class="input-icon">
                                                                <input type="url" name="ppl_social_youtube" id="ppl_social_youtube"  class="form-control  color-primary-light" value="<?php if(isset($people->ppl_social_fb)) echo $people->ppl_social_fb; ?>">
                                                                <label for="ppl_social_youtube">Youtube
                                                                </label>
                                                                
                                                                <i class="fab fa-youtube"></i>
                                                              </div>
                                                              <div class="help-block custom-error"></div>  
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                              <div class="input-icon">
                                                                <input type="url" name="ppl_website" id="ppl_website"  class="form-control  color-primary-light" value="<?php if(isset($people->ppl_website)) echo $people->ppl_website; ?>">
                                                                <label for="ppl_website">Website
                                                                </label>
                                                                
                                                                <i class="fas fa-globe"></i>
                                                              </div>
                                                              <div class="help-block custom-error"></div>  
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-md-2"></div>
                                            </div>
                                          </div>
                                        <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_EDIT)); ?>                                            
                                        </form>
                                    </div>
                                    <!-- -----MAIN CONTENTS END HERE----- -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <div class="js-scripts">
                <?php $this->load->view('common/footer_scripts'); ?> 
                <!-- OPTIONAL SCRIPTS -->
                <script src="<?php echo base_url(); ?>assets/module/people/js/people-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/module/people/js/people-edit.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBF5LAdqTeQau6aWexOieRr98vnicuvut8"></script>
                 <script type="text/javascript">
                    
                    $(document).ready(function(){
                        $('.temp_option').remove();

                        $('.btn_save_new').on('click', function(){
                            $('.no-redirect').prop('checked', true);
                            $('.btn_save').click();
                        })
                        initPeopleGoogleLocation();
                    })

                    $('.date-picker').datepicker({
                      autoClose:true,
                       }).on('changeDate', function(e){
                          $(this).addClass('edited');
                          $(this).datepicker("hide");
                    });


                    function initPeopleGoogleLocation()
                    {
                        var autocomplete;
                        var input = document.getElementById('ppl_location');
                        autocomplete = new google.maps.places.Autocomplete(input);

                        autocomplete.addListener('place_changed', function() {
                           var place = autocomplete.getPlace();
                          $('#ppl_google_lat').val(place.geometry.location.lat());
                          $('#ppl_google_long').val(place.geometry.location.lng());
                        });
                    }

                  </script>
            </div>
          
        </body>

    </html>
