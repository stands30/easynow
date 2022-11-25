<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
<head>

<?php $this->load->view('common/header_styles'); ?>
<!-- OPTIONAL LAYOUT STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url(); ?>assets/project/global/plugins/autocomplete/easy-autocomplete.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css<?php echo $global_asset_version; ?>">
<link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/module/people/css/people-add-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

<!-- END PAGE LEVEL PLUGINS -->
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
<div class="text-center title_wrap mt-20">
<h3 class="page-title text-center">Add New People</h3>
<span class="sp_line color-primary"></span>
</div>
<!-- -----MAIN CONTENTS START HERE----- -->
<form role="form" class="form_add add-form-view" id="peopleAddForm">
<?php if(!empty($peopleType))
{
$peopleTypeF1KeyArray = array_column($peopleType, 'f1');
}
else
{
$peopleTypeF1KeyArray='';
}
$peopleTypeF1Key = implode(",",$peopleTypeF1KeyArray);
?>
<!-- ***************** Hidden Fields ****************** -->
<div id="form_errors"></div>
<input type="hidden" name="peopleTypeF1Key" id="peopleTypeF1Key" value="<?php echo $peopleTypeF1Key; ?>">
<input type="hidden" name="peopleTypeConstants" id="peopleTypeConstants"
data-company="<?php echo PEOPLE_TYPE_COMPANY; ?>"
data-lead="<?php echo PEOPLE_TYPE_LEAD; ?>"
data-candidate="<?php echo PEOPLE_TYPE_CANDIDATE; ?>"
data-event="<?php echo PEOPLE_TYPE_EVENT; ?>"
data-vendor="<?php echo PEOPLE_TYPE_VENDOR; ?>"
data-client="<?php echo PEOPLE_TYPE_CLIENT; ?>"
data-additional="<?php echo PEOPLE_ADDITIONAL_DETAILS; ?>"
data-team="<?php echo PEOPLE_TYPE_TEAM; ?>" >
<input type="hidden" name="peopleLoginConstants" id="peopleLoginConstants"
data-team="<?php echo PEOPLE_LOGIN_TEAM; ?>"
data-company="<?php echo PEOPLE_LOGIN_COMPANY; ?>"
data-client="<?php echo PEOPLE_LOGIN_CLIENT; ?>"
data-vendor="<?php echo PEOPLE_LOGIN_VENDOR; ?>">
<!-- ***************** Hidden Fields ****************** -->

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 col-offset-2">
<div class="row row-custom">
    <div class="col-md-3">
        <div class="form-group form-md-line-input form-md-floating-label">
             <label class="drp-title">Met On</label>
            <div class="input-icon">
                 <input type="text" class="form-control " id="ppl_met_on" name="ppl_met_on" required="" data-msg="Please Select Met on Date" value="">
             
              
                <i class="fa fa-calendar-alt"></i>
              
            </div>                                                                
            
        </div>
    </div>
        <div class="col-md-3">
          <div class="form-group form-md-line-input form-md-floating-label">
            <label class="drp-title">Title</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <select name="ppl_title_id" id="ppl_title_id" class="form-control people-title" data-minimum-results-for-search="Infinity">
                  <option value='1'>Mr.</option>
                </select>
                <span class="help-block custom-error"></span>
            </div>                                                                   
          </div> 
        </div>                                                          
        <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
                 <label class="drp-title">&nbsp;</label>
                <div class="input-icon">     
                 <i class="fa fa-user"></i>                                         
                    <input type="text" name="ppl_name" id="ppl_name" value="" class="form-control" required="" data-msg="Please Enter Full Name" autocomplete="off">
                    <label>Name <span class="asterix-error"><em>*</em></span></label>
                    <span class="help-block custom-error"></span>
                </div>                                                                    
            </div>
        </div> 
</div>

<div class="row row-custom">
    <div class="col-md-6">
        <div class="form-group form-md-line-input form-md-floating-label">
            <div class="input-icon">                                                                       
                <input type="email" name="ppl_email" id="ppl_email" value="" class="form-control" data-msg="Please enter valid Email ID" autocomplete="off">
                <label>Email </label>
                <i class="fa fa-envelope"></i>
                <span class="help-block custom-error"></span>
            </div>                                                                    
        </div>  
    </div>  

    <div class="col-md-6">
       <div class="form-group form-md-line-input form-md-floating-label">
            <div class="input-icon">
                <input type="text" name="ppl_mobile" id="ppl_mobile" value="" class="form-control"  data-msg="Please Enter valid Mobile Number" autocomplete="off" onkeydown="return validateMobile(event)">
                <label>Mobile </label>
                <i class="fas fa-mobile"></i>
                <span class="help-block custom-error"></span>
            </div>                                                                   
        </div> 
    </div>
</div>
<div class="row row-custom">
    <div class="col-md-6">
        <div class="form-group form-md-line-input form-md-floating-label">
            <label class="drp-title">Company</label>
            <div class="input-icon">
                <i class="fa fa-industry icon-company"></i>
                <input type="hidden" name="cpl_cmp_id" id="cpl_cmp_id" />
                <input type="text" name="cpl_cmp_text" id="cpl_cmp_text" class="form-control input-sm form_c" data-msg="Please enter Company" data-requiredattribute="yes">
                <span class="help-block custom-error"></span>
            </div>
        </div> 
    </div>

    <div class="col-md-6">
        <div class="form-group form-md-line-input form-md-floating-label">  
           <label class="drp-title">Designation</label>
          <div class="input-icon">
            <i class="fas fa-id-card-alt"></i>
              <select name="cpl_designation" id="cpl_designation" class="form-control cpl_designation custom-select2">
               <option value=""></option>
               <option class="blank_option"></option>
            </select>                                                              
              <div class="help-block"></div>
          </div>
        </div>
    </div>
    
</div>


<div class="row row-custom">
    <div class="col-md-6">
        <div class="form-group">
            <label class="input-label-text">Gender</label>
            <div class="md-radio-inline">
                <?php echo getGenPrmResult('radio','ppl_gender','ppl_gender',1,'result'); ?>
            </div>
            <span class="help-block custom-error"></span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group form-md-line-input form-md-floating-label">  
           <label class="drp-title">Managed By</label>
          <div class="input-icon">
            <i class="fas fa-user-tie list-level"></i>
              <select name="ppl_managed_by" id="ppl_managed_by" class="form-control ppl_managed_by custom-select2">
               <option value="<?php echo $this->session->userdata(PEOPLE_SESSION_ID)?>"><?php echo $this->session->userdata(PEOPLE_SESSION_NAME)  ?></option>
               <option class="blank_option"></option>
            </select>                                                              
              <div class="help-block"></div>
          </div>
        </div>
    </div>
</div>



<div class="content">
    <div class="view_more">
    <div class="row row-custom">
        <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
                
                <div class="input-icon">
                    <input type="text" class="form-control " id="ppl_dob" name="ppl_dob" autocomplete="off">                                                                    
                    <label class="control-label">DOB</label>
                    <i class="fa fa-calendar-alt"></i>
                    <span class="help-block custom-error"></span>
                </div>                                                                
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
              <div class="input-icon">
                <input type="text" id="ppl_location" name="ppl_location" class="form-control color-primary-light" placeholder="" >
                <input type="hidden" id="ppl_google_lat" name="ppl_google_lat" />
                <input type="hidden" id="ppl_google_long" name="ppl_google_long" />
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
                    <textarea class="form-control" rows="2" id="ppl_address" name="ppl_address" autocomplete="off"></textarea>
                    <label>Address</label>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span class="help-block custom-error"></span>
                </div>                                                                    
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
                <div class="input-icon">                                                                        
                    <textarea class="form-control" rows="2" id="ppl_remark" name="ppl_remark" autocomplete="off"></textarea>
                    <label>Remark</label>
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <span class="help-block custom-error"></span>
                </div>                                                                    
            </div>    
        </div>
    </div>
    <div class="row row-custom">
        <!-- <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
               <div class="input-icon input-label-text">
                    <input type="checkbox" class="make-switch" data-size="small" name="send_mail" value="1">&nbsp;Send Mail&nbsp;&nbsp;
                </div>
                <span class="help-block custom-error"></span>
            </div>
        </div> -->

        <div class=" col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
                 <label class="drp-title">Tags</label>
                <div class="input-icon">
                    <i class="fas fa-tags "></i>
                    <select name="ppl_tgs_id" id="ppl_tgs_id" class="form-control tags-select2 custom-select2" autocomplete="off">
                   <option class="blank_option"></option>
                    </select>
                    <span class="help-block custom-error"></span>
                </div>                                                                
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group input-label-text">
                <label>Upload Profile Pic</label><br />
                <div class=" form-group col-md-6 fileinput fileinput-new file-margin profile_pic" data-provides="fileinput" style="">
                    <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
                        <div id="image_preview" ></div>
                        <span class="btn default btn-file">
                            <input type="file" id="ppl_profile_image" name="ppl_profile_image" class="profile-image">
                        </span>
                    </div>
                </div> 
            </div> 
        </div>

       
        
        
    </div>
    <div class="row row-custom">
        <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
              <div class="input-icon">
                <input type="url" name="ppl_social_fb" id="ppl_social_fb"  class="form-control  color-primary-light" data-msg="Please enter correct facebook url">
                <label for="ppl_social_fb">Facebook
                </label>
                <i class="fab fa-facebook-f"></i>
              </div>
              <div class="help-block"></div>  
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
              <div class="input-icon">
                <input type="url" name="ppl_social_linkedin" id="ppl_social_linkedin"  class="form-control  color-primary-light"data-msg="Please enter correct linked in url">
                <label for="ppl_social_linkedin">LinkedIn
                </label>
                
                <i class="fab fa-linkedin"></i>
              </div>
              <div class="help-block"></div>  
            </div>
        </div>
    </div>

    <div class="row row-custom">
        <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
              <div class="input-icon">
                <input type="url" name="ppl_social_instagram" id="ppl_social_instagram"  class="form-control  color-primary-light" data-msg="Please enter correct Instagram url">
                <label for="ppl_social_instagram">Instagram
                </label>
                
                <i class="fab fa-instagram"></i>
              </div>
              <div class="help-block"></div>  
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
              <div class="input-icon">
                <input type="url" name="ppl_social_twitter" id="ppl_social_twitter"  class="form-control  color-primary-light" data-msg="Please enter correct twitter url">
                <label for="ppl_social_twitter">Twitter
                </label>
                
                <i class="fab fa-twitter"></i>
              </div>
              <div class="help-block"></div>  
            </div>
        </div>
    </div>
    <div class="row row-custom">
        <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
              <div class="input-icon">
                <input type="url" name="ppl_social_youtube" id="ppl_social_youtube"  class="form-control  color-primary-light" data-msg="Please enter correct youtube url">
                <label for="ppl_social_youtube">Youtube
                </label>
                
                <i class="fab fa-youtube"></i>
              </div>
              <div class="help-block"></div>  
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group form-md-line-input form-md-floating-label">
              <div class="input-icon">
                <input type="url" name="ppl_website" id="ppl_website"  class="form-control  color-primary-light" data-msg="Please enter correct website url">
                <label for="ppl_website">Website
                </label>
                
                <i class="fas fa-globe"></i>
              </div>
              <div class="help-block"></div>  
            </div>
        </div>

        
    </div>
</div>
</div>

<div class="row row-custom">
    <div class="col-md-12">
        <a href="javascript:;" class="people-add-more"></a>
    </div>
</div>

  
</div>
<div class="col-md-2"></div>
</div>


<div class="portlet-body tabs_forms">
<div class="tabbable-line">
<ul class="nav nav-tabs">
<?php
        if(!empty($peopleType))
        {
            foreach ($peopleType as $peopleTypeKey )
            {
                $activeClass = '';
                if($peopleTypeKey['f1'] == PEOPLE_TYPE_COMPANY)
                {
                    $activeClass = 'active';
                }
?>
                <li class=" line line-xs line-dark <?php echo $activeClass; ?>">
                    <a href="#peopleTypeTab<?php echo $peopleTypeKey['f1']; ?>" data-toggle="tab" aria-expanded="true"><?php echo $peopleTypeKey['f2']; ?></a>
                </li>
<?php
            }
        }
?>
        <!-- <li class=" line line-xs line-dark ">
         <a href="#peopleTypeTabLogin" class="enable-login-tab" data-toggle="tab" aria-expanded="true">Login</a>
        </li> -->
</ul>
<div class="tab-content tab_mod" style="padding-bottom: 40px;">
    <?php if(!empty($peopleType))
        {
            if(in_array(PEOPLE_TYPE_COMPANY,$peopleTypeF1KeyArray))
            { ?>

    <div class="tab-pane active" id="peopleTypeTab<?php echo PEOPLE_TYPE_COMPANY; ?>">
        <div class="row">
            <div class="col-md-6">
              <div class="form-group form-md-line-input">
                <div class="md-radio-inline input-radio-custom">
                    <div class="md-radio">
                        <input type="radio" id="radio_company" name="radio_company_account" value="<?php echo COMPANY_TYPE_COMPANY; ?>" class="md-radiobtn radio_company_account" checked>
                        <label for="radio_company">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Company </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio_account" name="radio_company_account" value="<?php echo COMPANY_TYPE_ACCOUNT; ?>" class="md-radiobtn radio_company_account">
                        <label for="radio_account">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Account </label>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-md-line-input form-md-floating-label">
                <div class="input-icon">
                  <input type="text" name="cmp_website" id="cmp_website" value="http://" class="form-control  color-primary-light">
                  <label for="cmp_website">Company Website
                  </label>
                  <i class="fas fa-globe"></i>
                </div>
                <div class="help-block"></div>  
              </div>
            </div>
          </div>
          <div class="row">        
            <div class="col-md-6">
              <div class="form-group form-md-line-input form-md-floating-label">
                <label class="drp-title">State</label>
                <div class="input-icon">   
                <i class="fas fa-map-marked-alt"></i>                                         
                  <select name="cmp_stm_id" id="cmp_stm_id" class="form-control cmp_stm_id  custom-select2 ">
                     <option ></option>
                  </select>  
                  <label class="custom-label">Please Select State<!-- <span class="asterix-error"><em>*</em></span --></label>
                  <span class="help-block custom-error"></span> 
                </div>                      
              </div>
            </div>                
            <div class="col-md-6">
              <div class="form-group form-md-line-input form-md-floating-label">
                <label class="drp-title">Industry</label>
                <div class="input-icon">
                  <i class="fa fa-industry "></i>             
                  <select name="cmp_industry" id="cmp_industry" class="form-control cmp_industry custom-select2 ">
                     <option ></option>
                  </select>
                  <label class="custom-label">Please Select Industry</label>
                  <span class="help-block custom-error"></span>
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
                  <option></option>
                </select>           
                <label class="custom-label">Please Select Annual Revenue</label>               
                </div>
                <div class="help-block"></div>
              </div>
            </div>                
            
          </div>
          
        <div class="row">   
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                  <div class="input-icon">
                    <textarea name="cmp_address" id="cmp_address" class="form-control color-primary-light" rows="2" ></textarea>
                    <i class="fas fa-map-marker list-level"></i>
                  <label>Company Address</label>
                  </div>
                  <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                  <div class="input-icon">
                    <input type="text" id="cmp_location" name="cmp_location" class="form-control color-primary-light" placeholder="" >
                    <input type="hidden" id="cmp_google_lat" name="cmp_google_lat" />
                    <input type="hidden" id="cmp_google_long" name="cmp_google_long" />
                    <label for="cmp_loc">Location</label>
                   <i class="fas fa-map-marked-alt"></i>
                  </div>
                <div class="help-block"></div>
                </div>
            </div>
        </div>

        <div class="company-content">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group form-md-line-input form-md-floating-label">
                <label class="drp-title">Tags</label>
                <div class="input-icon">
                    <i class="fa fa-users"></i>
                    <select name="cmp_tgs_id" id="cmp_tgs_id" class="form-control cmp_tgs_id custom-select2">
                      <option class="blank_option"></option>
                    </select>    
                    <label class="custom-label" for="cmp_tgs_id">Please Select Tags</label>                    
                </div>
                <div class="help-block"></div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                  <div class="input-icon input-label-text">
                    <input type="number" name="cmp_employee" id="cmp_employee" value="" class="form-control  color-primary-light">
                    <label for="cmp_employee">No. of Employees</label>
                    <i class="fas fa-user-tie "></i>
                  </div>
                <div class="help-block"></div>
                </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-md-6">
               <div class="form-group form-md-line-input form-md-floating-label">
                <div class="input-icon">
                  <textarea name="cmp_remark" id="cmp_remark" class="form-control color-primary-light" rows="2"></textarea>                     
                  <label>Remark</label>
                  <i class="far fa-credit-card"></i>
                </div>
                <div class="help-block"></div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group form-md-line-input form-md-floating-label">
                <label class="drp-title"> Managed By</label>
                <div class="input-icon">
                  <i class="fas fa-chart-pie"></i>
                  <select name="cmp_managed_by" id="cmp_managed_by" class="form-control cmp_managed_by">
                    <option>Please Select Managed By</option>
                  </select>           
                  </div>
                  <div class="help-block"></div>
              </div>
            </div>

          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group form-md-line-input form-md-floating-label">
                <div class="input-icon">
                  <input type="url" name="cmp_facebook" id="cmp_facebook" class="form-control  color-primary-light">
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
                  <input type="url" name="cmp_linkedin" id="cmp_linkedin" class="form-control  color-primary-light">
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
                  <input type="url" name="cmp_instagram" id="cmp_instagram" class="form-control  color-primary-light">
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
                  <input type="url" name="cmp_twitter" id="cmp_twitter" class="form-control  color-primary-light">
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
                  <input type="url" name="cmp_youtube" id="cmp_youtube" class="form-control  color-primary-light" autocomplete="off">
                  <label for="cmp_youtube">Youtube
                  </label>
                  <i class="fab fa-youtube"></i>
                </div>
                <div class="help-block"></div>  
              </div>
            </div>
          </div>
        </div>

        <div class="row row-custom">
            <div class="col-md-12">
                <a href="javascript:;" class="company-add-more"></a>
            </div>
        </div>

            <div class="hidden" id="account_div">
              <div class="row">
                <!-- <label class="col-md-12">If account radio button is checked then only show the below fields</label> -->
                <div class="col-md-6">
                  <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <input type="text" name="cmp_gst_no" id="cmp_gst_no" value="" class="form-control  color-primary-light">
                      <label for="cmp_gst_no">GST No</label>
                      <i class="fas fa-id-card"></i>
                    </div>
                    <div class="help-block"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <input type="text" name="cmp_pan" id="cmp_pan" value="" class="form-control  color-primary-light">
                      <label for="cmp_pan">Pan No</label>
                      <i class="fas fa-id-card"></i>
                    </div>
                    <div class="help-block"></div>
                  </div>
                </div>                    
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-md-line-input form-md-floating-label">
                    <label class="drp-title">Company Logo
                      <a href="#" data-toggle="tooltip" title="" class="data-tooltip-user" data-original-title="You can add multiple images with .png .jpg &amp; .jpeg file format"><span><i class="fa fa-info-circle"></i></span></a>
                    </label>
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
                <div class="col-md-6">
                  <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <textarea name="cmp_payment_terms" id="cmp_payment_terms" class="form-control color-primary-light" rows="2  " ></textarea>                     
                    <label>Payment Terms</label>
                    <i class="far fa-credit-card"></i>
                    </div>
                    <div class="help-block"></div>
                  </div>
                </div>
                
              </div>
            </div>
        </div>
    <?php }
     if(in_array(PEOPLE_TYPE_LEAD,$peopleTypeF1KeyArray))
    { ?>
    <div class="tab-pane" id="peopleTypeTab<?php echo PEOPLE_TYPE_LEAD; ?>">
        <div class="row">
            <input type="hidden" name="led_pipeline" id="led_pipeline" value="1">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                   <label class="">&nbsp;</label>
                    <div class="input-icon">
                        <input type="text" id="led_title" name="led_title" class="form-control form_c" autocomplete="off" data-requiredattribute="yes" >
                        <label class="">Description<span class="asterix-error "><em>*</em></span></label>
                        <i class="fas fa-th-list"></i>
                        <span class="help-block custom-error"></span>
                    </div>                                      
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                     <label class="drp-title">&nbsp;</label>
                    <div class="input-icon">
                        <input type="number" name="led_amount" id="led_amount" class="form-control form_c custom-select2" data-msg="Please enter Amount" data-requiredattribute="yes" autocomplete="off">
                        <label class="custom-label">Amount <span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <i class="fas fa-rupee-sign"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <label class="drp-title">Temp</label>  
                    <div class="input-icon"> 
                        <i class="fas fa-sun"></i>                         
                        <select name="led_temp" id="led_temp" class="form-control form_c led_temp custom-select2"
                        data-msg="Please Select Temp" autocomplete="off" data-gen-grp="led_temp">
                       <option></option>
                        </select>
                        <label class="custom-label">Please Select Temp</label>
                        <span class="help-block custom-error"></span>
                    </div>                                             
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <label class="drp-title">Source<span class="asterix-error custom-asterix"><em>*</em></span></label>
                    <div class="input-icon">  
                        <i class="fas fa-database"></i>                          
                        <select name="led_src" id="led_src" class="form-control form_c led_src custom-select2"  data-msg="" data-requiredattribute="yes" autocomplete="off" data-gen-grp="led_src">
                       <option></option>
                     
                        </select>
                           <label class="custom-label">Please Select Source</label>
                        <span class="help-block custom-error"></span>
                    </div>                                                                        
                </div>
            </div>

        </div>
        <div class="row">
           <!--  <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <label class="drp-title">Product<span class="asterix-error custom-asterix"><em>*</em></span></label>
                    <div class="input-icon">
                        <i class="fa fa-cart-plus icon-product"></i>
                        <select name="led_prod" id="led_prod" class="form-control form_c led-product custom-select2"
                        data-msg="Please Select Product" data-requiredattribute="yes
                        " autocomplete="off" >
                    <option class="blank_option"></option>
                        </select>
                        <span class="help-block custom-error"></span>
                    </div>                                                                        
                </div>
            </div> -->
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <label class="drp-title">Referred By</label> 
                    <div class="input-icon">                      
                    <i class="fa fa-user"></i>      
                        <select name="led_ref_by" id="led_ref_by" class="form-control form_c led_ref_by custom-select2"
                    data-msg="Please Select Refferd By" autocomplete="off">
                       <option></option>
                        </select>
                        <label class="custom-label">Please Select Referred By</label>
                        <span class="help-block custom-error"></span>
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
                        <select name="led_campaign" id="led_campaign" class="form-control form_c led_campaign custom-select2" data-msg="Please Select Campaign" data-requiredattribute="no
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
                    <label class="drp-title">Managed By</label>
                    <div class="input-icon">
                        <i class="fas fa-user-tie list-level"></i>                           
                        <select name="led_managed_by" id="led_managed_by" class="form-control form_c led_managed_by custom-select2" data-msg="Please Select Managed By" data-requiredattribute="yes
                        " autocomplete="off">
                        <option value="<?php echo $this->session->userdata(PEOPLE_SESSION_ID)?>"><?php echo $this->session->userdata(PEOPLE_SESSION_NAME)  ?></option>
                        </select>
                        <label class="custom-label">Please Select Managed By<span class="asterix-error custom-asterix"><em>*</em></span> </label>
                        <span class="help-block custom-error"></span>
                    </div>                     
                </div>
            </div>
        </div>
        <div class="row">
           
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label " >
                     <label class="drp-title">Stage</label>
                    <div class="input-icon">
                        <i class="fa fa-cubes"></i>
                        <select name="led_lead_stage" id="led_lead_stage" class="form-control form_c led_lead_stage custom-select2" data-msg="Please Select Stage" data-requiredattribute="yes
                        " autocomplete="off" data-gen-grp='led_lead_stage'>
                       <option value="1" selected="">Lead in</option>
                        </select>
                        <label class="custom-label">Please Select Stage<span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <span class="help-block custom-error"></span>
                    </div>                
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <label class="drp-title">Status</label>
                    <div class="input-icon">  
                        <i class="fas fa-info-circle list-level"></i>                   
                        <select name="led_lead_status" id="led_lead_status" class="form-control form_c led_lead_status custom-select2"
                        data-msg="Please Select Status" data-requiredattribute="yes
                        " autocomplete="off" data-gen-grp="led_lead_status">
                       <option></option>
                        </select>
                        <label class="custom-label">Please Select Status<span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <span class="help-block custom-error"></span>
                    </div>                   
                </div>
            </div> 
        </div>
        <div class="row">
         
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">

                    <div class="input-icon">
                        <textarea class="form-control form_c" name="led_remark" id="led_remark" rows="3 " autocomplete="off"></textarea>
                        <label>Remarks</label>
                        <i class="fa fa-comments"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                                                                                            
                </div>
            </div>
        </div>
    </div>
    <?php }
     if(in_array(PEOPLE_TYPE_CANDIDATE,$peopleTypeF1KeyArray))
    { ?>
    <div class="tab-pane" id="peopleTypeTab<?php echo PEOPLE_TYPE_CANDIDATE; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                     <label class="drp-title">Role</label>
                    <div class="input-icon">                    
                       <i class="fas fa-chalkboard-teacher "></i>   
                        <select name="cdt_role" id="cdt_role" class="form-control form_c cdt_role custom-select2" data-msg="Please Select Role" autocomplete="off">
                       <option></option>
                        </select>
                        <label class="custom-label"> Please Select Role</label>
                       <!--  <label>Role <span class="asterix-error custom-asterix"><em>*</em></span></label> -->
                        <span class="help-block custom-error"></span>
                    </div>                 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                     <label class="drp-title">&nbsp;</label>
                    <div class="input-icon">                       
                        <input type="text" name="cdt_total_exp" id="cdt_total_exp" class="form-control form_c"data-msg="Please enter Total Experience" autocomplete="off">
                        <span class="help-block custom-error"></span>
                        <label>Total Experience <span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <i class="fas fa-star"></i>
                        <span class="help-block custom-error"></span>
                    </div>                  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                     <label class="drp-title">&nbsp;</label>
                    <div class="input-icon">         
                                                      
                        <input type="text" name="cdt_relative_exp" id="cdt_relative_exp" class="form-control form_c" data-msg="Please enter Relative Experience" autocomplete="off">
                        <label>Relevant Experience <span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <i class="fas fa-star"></i>
                        <span class="help-block custom-error"></span>
                    </div>                  
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <label class="drp-title">&nbsp;</label>
                    <div class="input-icon">
                        
                        <input type="text" name="cdt_notice_period" id="cdt_notice_period" class="form-control form_c " data-msg="Please enter Notice Period" autocomplete="off">
                        <label>Notice Period</label>
                        <i class="fas fa-address-book"></i>
                        <span class="help-block custom-error"></span>
                    </div>            
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                        
                        <input type="text" name="cdt_exp_ctc" id="cdt_exp_ctc" class="form-control form_c" data-msg="Please enter Expected CTC" autocomplete="off">
                        <label>Expected CTC</label>
                        <i class="fas fa-money-bill-alt"></i>
                        <span class="help-block custom-error"></span>
                    </div>                  
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">                                                                             
                        <input type="text" name="cdt_cur_ctc" id="cdt_cur_ctc" class="form-control form_c" data-msg="Please enter Current CTC" autocomplete="off">
                        <label>Current CTC <span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <i class="fas fa-money-bill-alt"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">                      
                        <textarea class="form-control form_c" name="cdt_skills" id="cdt_skills" rows="2" autocomplete="off"></textarea>
                        <label>Skills <span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <i class="fas fa-clipboard"></i>
                        <span class="help-block custom-error"></span>
                    </div>                   
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                        <textarea class="form-control form_c" name="cdt_remark" id="cdt_remark" rows="2" autocomplete="off"></textarea>
                        <label>Remarks</label>
                        <i class="fa fa-comments"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
     <?php }
     if(in_array(PEOPLE_TYPE_EVENT,$peopleTypeF1KeyArray))
    { ?>
    <div class="tab-pane" id="peopleTypeTab<?php echo PEOPLE_TYPE_EVENT; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label extra-div-space">
                    <label class="drp-title">Event</label>
                    <div class="input-icon">
                        <i class="fas fa-calendar-alt icon-meeting"></i>
                        <select name="epl_evt_id" id="epl_evt_id" class="form-control form_c people-event custom-select2" autocomplete="off">
                       <option class="blank_option"></option>
                        </select>
                        <!-- <label class="custom-label">Please Select Event</label> -->
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                     <label class="drp-title">&nbsp;</label>
                    <div class="input-icon">
                        
                        <textarea class="form-control form_c" name="epl_remark" id="epl_remark" rows="2" autocomplete="off"></textarea>
                        <label>Remarks</label>
                        <i class="fa fa-comments"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php }
     if(in_array(PEOPLE_TYPE_VENDOR,$peopleTypeF1KeyArray))
    { ?>
    <div class="tab-pane" id="peopleTypeTab<?php echo PEOPLE_TYPE_VENDOR; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                     <label class="drp-title">Vendor</label>
                    <div class="input-icon">
                        <i class="fa fa-industry icon-company"></i>
                        <select name="vdr_cmp_id" id="vdr_cmp_id" class="form-control form_c vendor-company custom-select2" autocomplete="off">
                       <option class="blank_option"></option>
                        </select>
                        <label class="custom-label">Please Select Vendor</label>
                        <span class="help-block custom-error"></span>
                    </div>                   
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                      <label class="drp-title">&nbsp;</label>
                    <div class="input-icon">
                        
                        <input type="text" name="vdr_cmp_gst_no" id="vdr_cmp_gst_no" class="form-control form_c vendor-gst" autocomplete="off">
                        <label>GST No</label>
                        <i class="fas fa-id-card"></i>
                        <span class="help-block custom-error"></span>
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
                        <select  name="vdr_cmp_state" id="vdr_cmp_state" class="form-control form_c vendor-state cmp_state custom-select2" placeholder="State" autocomplete="off">
                            
                       <option></option>
                        </select>
                        <label class="custom-label">Please Select State</label>
                        <span class="help-block custom-error"></span>
                    </div>                                                                       
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <label class="drp-title">&nbsp;</label>
                    <div class="input-icon">
                        <input type="text" name="vdr_cpl_designation" id="vdr_cpl_designation" class="form-control form_c" data-msg="Please Enter Vendor's Designation" autocomplete="off">
                        <label>Designation <span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <i class="fas fa-id-card-alt"></i>
                        <span class="help-block custom-error"></span>
                    </div>                                                                        
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                        
                        <textarea class="form-control form_c vendor-payment-terms" name="vdr_cmp_payment_terms" id="vdr_cmp_payment_terms" rows="2"></textarea>
                        <label>Payment Terms</label>
                        <i class="fas fa-info"></i>
                        <span class="help-block custom-error"></span>
                    </div>                                                                        
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                         
                    <textarea class="form-control form_c" name="vdr_cpl_remark" id="vdr_cpl_remark" rows="2"></textarea>
                    <label>Remarks</label>
                    <i class="fa fa-comments"></i>
                    <span class="help-block custom-error"></span>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>
     <?php }
     if(in_array(PEOPLE_TYPE_CLIENT,$peopleTypeF1KeyArray))
    { ?>
    <div class="tab-pane" id="peopleTypeTab<?php echo PEOPLE_TYPE_CLIENT; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                     <label class="drp-title">Client</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <select name="cli_cmp_id" id="cli_cmp_id" class="form-control form_c client-company custom-select2" autocomplete="off">
                       <option class="blank_option"></option>
                        </select>
                        <label class="custom-label">Please Select Client</label>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                     <label class="drp-title">&nbsp;</label>
                    <div class="input-icon">
                        
                        <input type="text" name="cli_cmp_gst_no" id="cli_cmp_gst_no" class="form-control form_c client-gstno" autocomplete="off">
                        <label>GST No</label>
                        <i class="fas fa-id-card"></i>
                        <span class="help-block custom-error"></span>
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
                        <select name="cli_cmp_state" id="cli_cmp_state" class="form-control form_c client-state cmp_state custom-select2" placeholder="State" autocomplete="off">
                            <option></option>
                        </select>
                        <label class="custom-label">Please Select State</label>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <label class="drp-title">&nbsp;</label>
                    <div class="input-icon">
                        <input type="text" name="cli_cpl_designation" id="cli_cpl_designation" class="form-control form_c" data-msg="Please Enter Client's Designation" autocomplete="off">
                        <label>Designation <span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <i class="fas fa-id-card-alt"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                        <textarea class="form-control form_c client-payment-terms" name="cli_cmp_payment_terms" id="cli_cmp_payment_terms" rows="2" ></textarea>
                        <label>Payment Terms</label>
                        <i class="fas fa-info"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                        <textarea class="form-control form_c" name="cli_cpl_remark" id="cli_cpl_remark"  rows="2"></textarea>
                        <label>Remarks</label>
                        <i class="fa fa-comments"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php }
     if(in_array(PEOPLE_TYPE_TEAM,$peopleTypeF1KeyArray))
    { ?>
    <div class="tab-pane " id="peopleTypeTab<?php echo PEOPLE_TYPE_TEAM; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <label class="drp-title">Department<span class="asterix-error custom-asterix"><em>*</em></span></label>
                    <div class="input-icon">
                        <i class="fas fa-building list-level"></i>
                        <select name="department" class="form-control form_c team-dept custom-select2" id="emp_dept" name="emp_dept" autocomplete="off">
                       <option></option>
                        </select>
                        <label class="custom-label">Please Select Department</label>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                     <label class="drp-title">&nbsp;</label>
                    <div class="input-icon">
                        <input type="text" name="emp_code" id="emp_code" class="form-control form_c" autocomplete="off">
                        <label>Employee Code </label>
                        <i class="fas fa-address-card"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                        
                        <input type="text" name="emp_designation" id="emp_designation" class="form-control form_c" autocomplete="off">
                        <label>Designation </label>
                        <i class="fas fa-id-card-alt"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                        <select name="emp_reporting_to" id="emp_reporting_to" class="form-control custom-select2">
                            <option></option>
                          </select>
                        <label>Reporting To </label>
                        <i class="fas fa-building list-level"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php } 
    if(in_array(PEOPLE_ADDITIONAL_DETAILS,$peopleTypeF1KeyArray))
    { ?>

    <div class="tab-pane" id="peopleTypeTab<?php echo PEOPLE_ADDITIONAL_DETAILS; ?>">
      <div class="col-md-12  ">      
        <div class="row  bottom-box">

    <?php 
    foreach ($peopleAdditionalDetails['category'] as $detailCategory) {

        echo '<div class="col-md-12 title-box font-diff repeater-div"><div>&nbsp;</div>
             <span class="col-md-12 bold repeater-title font-diff "> '.$detailCategory->adc_category.'</span>';

        
        foreach ($peopleAdditionalDetails['details'] as $peopleDetail) {

            if($peopleDetail->adc_id == $detailCategory->adc_id) 
            {

                $element = '';

                switch ($peopleDetail->adm_type) 
                {
                    case ADDITIONAL_DETAIL_TYPE_TEXTBOX:
                    $element =  '<input id="adm_'.$peopleDetail->adm_id.'" type="text" class="add_det form-control form_c" />';
                      break;
                    case ADDITIONAL_DETAIL_TYPE_TEXTAREA:             
                    $element = '<textarea id="adm_'.$peopleDetail->adm_id.'" class="add_det form-control form_c"></textarea>';
                    break;
                    case ADDITIONAL_DETAIL_TYPE_DROPDOWN:             
                    $element = '<select id="adm_'.$peopleDetail->adm_id.'" data-gnp_prm="'.$peopleDetail->gpn_group.'" class="add_det add_det_select additional-div form-control form_c" autocomplete="off"><option></option></select>';
                    break;
                    case ADDITIONAL_DETAIL_TYPE_DROPDOWN_MULTIPLE:    
                    $element = '<select id="adm_'.$peopleDetail->adm_id.'" data-gnp_prm="'.$peopleDetail->gpn_group.'" multiple class="additional-div add_det add_det_select custom-select2-multiple form-control form_c" autocomplete="off"><option value="" selected></option></select>'; 
                    break;
                    case ADDITIONAL_DETAIL_TYPE_NUMBER:               
                    $element = '<input id="adm_'.$peopleDetail->adm_id.'" type="number" class="add_det form-control form_c"  />';
                    break;
                    case ADDITIONAL_DETAIL_TYPE_EMAIL:                
                    $element = '<input id="adm_'.$peopleDetail->adm_id.'" type="email" class="add_det form-control form_c" />';
                    break;
                    case ADDITIONAL_DETAIL_TYPE_URL:                  
                    $element = '<input id="adm_'.$peopleDetail->adm_id.'" type="text" class="add_det form-control form_c" />';
                    break;
                }

                echo '<div class="col-md-6"><div class="form-group form-md-line-input form-md-floating-label"><div class="input-icon">'.$element.'<label>'.$peopleDetail->adm_name.'</label><i class="fas fa-id-card-alt"></i><span class="help-block custom-error"></span></div></div>
                </div>';

            }

        }
        echo '
        <br>
            </div>';
    }
    ?>
        </div>
      </div>
    </div>

    <?php } }?>


    <!-- <div class="tab-pane " id="peopleTypeTabLogin">
        <div class="row">
            <div class="col-md-12">
                <label class="bold">Login Access By</label>
            </div>
            <div class="col-md-12 login-div">
                <?php echo getGenPrmResult('switch-checkbox','people_login_type','people_login_type','1,2','result'); ?>
            </div>
        </div>
         <div class="row enable-login-div">
            <div class="col-md-12">
                <label id="login_dept_lbl" class="bold">Department</label>
            </div>

            <div class="col-md-12">
                <?php echo getGenPrmResult('switch-checkbox','people_login_dept','people_login_dept',false,'result'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                        <input type="text" name="ppl_username" id="ppl_username" class="form-control form_c" autocomplete="on">
                         <label for="ppl_username">Username <span class="asterix-error"></span></label>
                         <i class="fa fa-user"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                        <input type="password" name="ppl_password" id="ppl_password" class="form-control form_c" autocomplete="off">
                        <label for="ppl_password">Password <span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <i class="fas fa-lock"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                        <input type="password" name="ppl_cnfm_password" id="ppl_cnfm_password" class="form-control form_c" autocomplete="off">
                        <label for="ppl_cnfm_password">Confirm Password <span class="asterix-error custom-asterix"><em>*</em></span></label>
                        <i class="fas fa-lock"></i>
                        <span class="help-block custom-error"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>  --> 
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_ADD)); ?>        
</form>
<?php //$this->load->view('people/tabsmodal'); ?>
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
<script src="<?php echo base_url();?>assets/project/global/plugins/autocomplete/jquery.easy-autocomplete.js<?php echo $global_asset_version; ?>" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>assets/module/people/js/people-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>        
<script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>                
<script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js<?php echo $global_asset_version; ?>" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>assets/module/people/js/people-add.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBF5LAdqTeQau6aWexOieRr98vnicuvut8"></script>


<script type="text/javascript">

    var COMPANY_TYPE_COMPANY = '<?php echo COMPANY_TYPE_COMPANY; ?>';
    var COMPANY_TYPE_ACCOUNT = '<?php echo COMPANY_TYPE_ACCOUNT; ?>';

    $(document).ready(function()
    {
        $('#cpl_cmp_text').ezautocomplete({
            id  : '#cpl_cmp_id',
            url : baseUrl + 'people/getCompanyforDropdown/'
        })

        $('#cpl_cmp_text').on('change', function() {
            setTimeout(function(){
                getCompDataById($('#cpl_cmp_id').val());
            },500)
        })

        $('#ppl_met_on').val(now('date'));

        $('#ppl_dob, select, input').on('change', function() {
            if($(this).val() != '')
                $(this).addClass('edited');
            else
                $(this).removeClass('edited');
        })  

        $('.radio_company_account').on('change', function() {
            if($(this).val() == "<?php echo COMPANY_TYPE_ACCOUNT; ?>")
                $('#account_div').removeClass('hidden');
            else
                $('#account_div').addClass('hidden');
        })

        
    })

</script>

<script type="text/javascript">
    

    var viewLessForm     = 'Show Less Details <span> <i class="fa fa-angle-up"></i></span>';
    var viewMoreForm     = 'Add More Details <span> <i class="fa fa-angle-down"></i></span>';
    var content         = '.content';
    var addMoreBtnClass = $('.people-add-more');

    $(document).ready(function(){
        toggleOnAddForm();
        $(".people-add-more").click(function()
          {
            moreForm();
          });
    });

    function toggleOnAddForm()
    {
        $(content).css('display', 'none');
        addMoreBtnClass.html(viewMoreForm);
      // var desktop = true;

      // if (isMobile())                       
      //   desktop = false;

      // $(navStack).css('display', 'none');
      //   addMoreBtnClass.html(viewLessForm);

      // if(desktop)
      // {
      //   $(navStack).css('display', 'block');
      //   addMoreBtnClass.html(viewLessForm);
      // }
    }

    function moreForm()
    {

      if($(content).css('display') == 'none' )
      {
        
        addMoreBtnClass.html(viewLessForm)
        $(content).slideDown();
      }
      else
      {
         addMoreBtnClass.html(viewMoreForm)
        $(content).slideUp();
        
      }
    }
</script>

    <script type="text/javascript">
        var viewLessCompnay     = 'Show Less Company Details <span> <i class="fa fa-angle-up"></i></span>';
        var viewMoreCompany     = 'Add More Company Details <span> <i class="fa fa-angle-down"></i></span>';
        var contentCompany         = '.company-content';
        var addMoreBtnCompany = $('.company-add-more');

        $(document).ready(function(){
            toggleOnCompany();
            $(".company-add-more").click(function()
            {
                moreCompany();
            });

            initPeopleGoogleLocation();
            initCompanyGoogleLocation();
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

        function toggleOnCompany()
        {
            $(contentCompany).css('display', 'none');
            addMoreBtnCompany.html(viewMoreCompany);
        }

        function moreCompany()
        {
          if($(contentCompany).css('display') == 'none' )
          {
            addMoreBtnCompany.html(viewLessCompnay)
            $(contentCompany).slideDown();
          }
          else
          {
             addMoreBtnCompany.html(viewMoreCompany)
            $(contentCompany).slideUp();
            
          }
        }
    </script>


</div>

</body>

</html>
