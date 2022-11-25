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
            <!-- END PAGE LEVEL PLUGINS -->
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
                        <div class="portlet">
                            <div class="row">
                                <!-- END PAGE HEADER-->
                               <div class="container-fluid">
                                   <div class="portlet light table-bordered">
                                      <div class="portlet-title">
                                          <div class="caption font-dark">
                                              <!-- <i class="icon-settings font-dark"></i> -->
                                              <span class="caption-subject bold"><?php echo $this->session->userdata(PEOPLE_SESSION_NAME)."<span class='lowercase'>'s</span> "; ?>Company Profile</span> &nbsp;
                                              <div class="btn-group">
                                                <?php if($edit_access) { ?>
                                                      <a href="<?php echo base_url('company-profile-update-'.$ppl_encrypted_id); ?>" class="btn btn_edit ">
                                                          <i class="fa fa-edit"></i>
                                                      </a>
                                                <?php } ?>
                                             </div>
                                          </div>
                                          <div class="tools"> </div>
                                      </div>
                                      <div class="portlet-body">
                                          <?php if(isset($company_profile->cpf_subject) && $company_profile->cpf_subject != ''){ ?>
                                            <b>Subject :<?php echo $company_profile->cpf_subject; } ?></b>
                                        <div>
                                          <br>
                                          <?php if(isset($company_profile->cpf_desc) && $company_profile->cpf_desc != ''){ echo $company_profile->cpf_desc; } ?>
                                        </div>
                                      </div>
                               </div>
                               <?php if(!empty($company_profile_attach)) { ?> 
                                  <div class="portlet light table-bordered">
                                      <div class="portlet-title">
                                          <div class="caption font-dark">
                                              <!-- <i class="icon-settings font-dark"></i> -->
                                              <span class="caption-subject bold uppercase">Attachments</span> &nbsp;
                                          </div>
                                          <div class="tools"> </div>
                                      </div>
                                      <div class="portlet-body">
                                        <div>

                                          <div class="row">
                                            <?php 
                                            foreach ($company_profile_attach as $company_profile_attachkey) { ?>
                                               
                                            <div class="col-md-12">
                                              <a target="_blank" href="<?php echo base_url().COMPANY_PROFILE_PATH.$company_profile_attachkey->doc_name; ?>">
                                                <?php echo $company_profile_attachkey->doc_name; ?></a>
                                                <?php if($delete_access) { ?>
                                                <a class="deleteAttach" data-doc_id="<?php echo $company_profile_attachkey->doc_id; ?>" data-doc_name="<?php echo $company_profile_attachkey->doc_name; ?>"><i class="fa fa-trash"></i></a>
                                              <?php } ?>
                                            </div>
                                             <?php } ?>
                                          </div>
                                        </div>
                                      </div>
                                 </div>

                               <?php } ?>
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
                <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url();?>assets/project/sweetalert/dist/sweetalert-dev.js"></script>
                <script type="text/javascript">
                  $('.deleteAttach').click(function(){
                    var doc_id = $(this).data('doc_id');
                    var doc_name = $(this).data('doc_name');
                    var deleteFlag = false;
               swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
              },
                      function(willDelete){
                          if(willDelete)
                          {
                               dataString={
                                    doc_id:doc_id,
                                    doc_name:doc_name
                                  },
                                  $.ajax({
                                    type:"POST",
                                    data:dataString,
                                    url:baseUrl+"people/deleteDoc",
                                    dataType:"JSON",
                                    success:function(response)
                                    {
                                      if(response.success == true)
                                      {
                                         

                                           swal(
                                              {
                                                  title: "Done",
                                                  text: response.message,
                                                  type: "success",
                                                  icon: "success",
                                                  button: true,
                                              });
                                           setTimeout(function(){
                                            location.reload();
                                          }, 1000);
                                      }
                                      else
                                      {
                                        {
                                        swal(response.message);
                                        }
                                      }
                                    }
                                  });
                          }
                      });
                  // console.log(deleteFlag);
                     if(deleteFlag)
                     {
                       
                     }
                  });
                </script>
            </div>
        </body>
    </html>
