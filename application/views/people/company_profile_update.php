<!--  -->
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
            <!-- OPTIONAL LAYOUT STYLES -->
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- END OPTIONAL LAYOUT STYLES -->
          <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- Summernote start here -->
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <!-- Summernote ends here -->
            <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                          <form id="companyProfileUpdate">
                                <div class="portlet portlet-fluid-background">
                                    <div class="row">
                                      <div id="form_errors"></div>
                                        <!-- END PAGE HEADER-->
                                       <div class="container-fluid">
                                            <div class="text-center title_wrap">
                                                <h3 class="page-title text-center mt-20">Update Form</h3>
                                                <span class="sp_line color-primary"></span>
                                            </div>
                                       </div>
                                       <input type="hidden" id="cpf_id" name="cpf_id" value="<?php if(isset($company_profile->cpf_id) && $company_profile->cpf_id != ''){ echo $company_profile->cpf_id; } ?>">
                                       <input type="hidden" id="cpf_ppl_id" name="cpf_ppl_id" value="<?php if(isset($company_profile->cpf_ppl_id) && $company_profile->cpf_ppl_id != ''){ echo $company_profile->cpf_ppl_id; }else{ echo $ppl_id;} ?>">
                                        <div class="col-md-10 col-md-offset-1 form_add">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="form-group form-md-line-input form-md-floating-label">
                                                <div class="input-icon">
                                                  <input type="text" class="form-control" name="cpf_subject" id="cpf_subject" value="<?php if(isset($company_profile->cpf_subject) && $company_profile->cpf_subject != ''){ echo $company_profile->cpf_subject; } ?>" required="">
                                                  <label class="control-label">Subject <span class="asterix-error"><em>*</em></span>  </label>
                                                </div>                                     
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <!-- Input type start here -->
                                              <div class="col-md-12">
                                                  <div class="form-group form-md-line-input form-md-floating-label">
                                                      <label>Description <span class="asterix-error"><em>*</em></span>                      
                                                      </label>
                                                     <textarea name="summernote" id="summernote_1" required=""><?php if(isset($company_profile->cpf_desc) && $company_profile->cpf_desc != ''){ echo $company_profile->cpf_desc; } ?></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                          <!-- file upload start here -->
                                          <div class="col-md-6">
                                            <div class="form-group fileinput fileinput-new" data-provides="fileinput" style="">
                                                <label>Attachments 
                                                  <a href="#" data-toggle="tooltip" title="" class="data-tooltip-user" data-original-title="You can add multiple images with .png .jpg &amp; .jpeg file format"><span><i class="fa fa-info-circle"></i></span></a>
                                                </label>                          
                                                <div class="image-preview" style="padding-left: 0px;margin-top: 0px;">
                                                  <div id="image_preview" class=""></div>
                                                    <span class="btn default btn-file btn-file-view">
                                                      <input type="file" name="cpl_doc[]" id="cpl_doc" class="component-image btn-file-view" multiple=""> 
                                                      <span class="error"></span>
                                                    </span>
                                                </div>
                                            </div>
                                          </div>
                                          <!-- file upload ends here -->
                                        </div> 
                                        </div>
                                    </div>
                                </div>
                                 <footer class="foo_bar">
                                    <!-- <div class="foo_btn">
                                     <button type="submit" class="btn btn_save">Save&nbsp;<i class="fa fa-check"></i></button>
                                    <button type="submit" class="btn btn_processing" style="display: none;"><i class='fa fa-spinner'></i> Saving...</i></button>
                                    <button type="button" class="btn btn_can">Cancel&nbsp;<i class="fa fa-times"></i></button>
                                    </div> -->


                                    <div class="foo_btn">
                                        <button type="button" class="btn btn_can">Cancel&nbsp;<i class="fa fa-times"></i></button>
                                        <input type="checkbox" class="no-redirect hidden" />
                                        <button type="button" class="btn btn_primary btn_save_new btn-save">Save & New &nbsp;<i class="fa fa-check"></i></button>
                                        <button type="submit" class="btn btn_save">Save&nbsp;<i class="fa fa-check"></i></button>
                                        <button type="button" class="btn btn_processing" style="display: none;"><i class='fa fa-spinner'></i> Saving...</i></button>
                                    </div>
                            
                          </form>
                          </footer>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <div class="js-scripts">
                <?php $this->load->view('common/footer_scripts'); ?>
        <!-- Summer note js start here -->
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- Summernote js ends here -->
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/module/people/js/company-profile.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

                <script type="text/javascript">
                  $(document).ready(function(){
                    $('.btn_save_new').on('click', function(){
                        $('.no-redirect').prop('checked', true);
                        $('.btn_save').click();
                    })
                  })

                 $('.component-image').change(function(e){
                     preview_image(e);
                  });
                  function preview_image(event) 
                  {
                      var total_file= $('.component-image')[0].files.length;
                       $('#image_preview').html('');
                      for(var i=0;i<total_file;i++)
                      {
                          var sizeInMB = ( event.target.files[i].size / (1024*1024)).toFixed(2);
                          $('#image_preview').append("<span class=\"\">" + "<a>" +event.target.files[i].name+"</a>  - " +sizeInMB+" Mb &nbsp;&nbsp;&nbsp;</span>");
                      }
                  }
                </script>
            </div>
        </body>
    </html>
