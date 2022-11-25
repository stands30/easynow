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
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
        <!-- OPTIONAL LAYOUT STYLES -->
        <!-- END OPTIONAL LAYOUT STYLES -->
        <div class="clearfix"> </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php $this->load->view('common/sidebar'); ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content page-content-detail">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar" id="breadcrumbs-list">
                        <?php echo $breadcrumb; ?>
                        <div class="breadcrumb-button">
                              <?php
                                $prev_prj_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($prj_data->prev_project);
                                $next_prj_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($prj_data->next_project);
                              ?>
                               <!-- Previous  -->
                              <a href="<?php echo base_url('project-details-'.$prev_prj_encrypted_id); ?>" class=" previous">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-left"></i>                                    
                                  </button>
                                  
                              </a>
                              <!-- Next -->
                              <a href="<?php echo base_url('project-details-'.$next_prj_encrypted_id); ?>" class="next">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-right"></i>
                                  </button>
                                  
                              </a>
                          </div>
                    </div>
                    <input type="hidden" id="prj_id" name="prj_id" value="<?php if(isset($prj_data->prj_id)) echo $prj_data->prj_id; ?>">
                    <!-- -----MAIN CONTENTS START HERE----- -->
                    <div class="row">
                        <aside class="profile-info col-lg-12">
                            <section class="panel">
                                <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                    <header class="panel-heading color-primary panelHeading">
                                        <div class="row detail-box">
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <span class="detail-list-heading">Project Details</span><br>
                                                <div class="row inner-row">
                                                    <span class="panel-title">
                                                        <?php if(isset($prj_data->prj_title)) echo $prj_data->prj_title; ?>

                                                    </span>&nbsp;&nbsp;
                                                   <?php if(!property_exists($prj_data, 'private_access') || (property_exists($prj_data, 'private_access') && $prj_data->private_access == 1)) {
                                                    if($edit_access) { ?>
                                                    <a class="btn-edit" href="<?php echo base_url('project-edit-'.$prj_data->prj_encrypted_id) ?>"> 
                                                        <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                    </a>
                                                    <?php } if ($delete_access) { ?>
                                                    <a class="btn-edit" data-gnp-grp="prj_status" onclick="deleteProject(<?php if(isset($prj_data->prj_id)) echo $prj_data->prj_id; ?>)">
                                                        <i class="fas fa-trash status-fa-icons"></i><span class="btn-text"> Delete</span>
                                                    </a>
                                                <?php }  } ?>
                                                    <!-- <a href="#" class="detail-status-tag flat-green">Initiated</a> -->
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                <span class="created">Created By: <?php if(isset($prj_data->prj_created_by)) echo $prj_data->prj_created_by; ?> 
                                                </span>
                                                <br>
                                                <span class="sp-date">Created On: <?php if(isset($prj_data->created_on)) echo $prj_data->created_on; ?>
                                                </span>
                                                <br>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="table-responsive">
                                        <table class="table custom table-detail-custom table-style">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fa fa-industry icon-company list-level"></i> Company</td>

                                                    <td><a href="javascript:;" id="prj_cmp_id" class="prj_cmp_id company-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Company Name" data-original-title="Select Company Name" data-custom_select2_id="<?php if(isset($prj_data->prj_cmp_id)) echo $prj_data->prj_cmp_id; ?>" data-custom_select2_name="<?php if(isset($prj_data->prj_cmp_id_value)) echo $prj_data->prj_cmp_id_value; ?>"  data-gnp-grp="prj_cmp_id"><?php if(isset($prj_data->prj_cmp_id)) echo $prj_data->prj_cmp_id_value; ?> </a></td>
                                                    <td><i class="fas fa-user list-level"></i> Managed By </td>
                                                    <td><a href="javascript:;" id="prj_manage_by" class="prj_manage_by manage-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Managed By" data-original-title="Select Managed By" data-custom_select2_id="<?php if(isset($prj_data->prj_manage_by)) echo $prj_data->prj_manage_by; ?>" data-custom_select2_name="<?php if(isset($prj_data->prj_manage_by_value)) echo $prj_data->prj_manage_by_value; ?>"  data-gnp-grp="prj_manage_by"><?php if(isset($prj_data->prj_manage_by)) echo $prj_data->prj_manage_by_value; ?> </a>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-info-circle list-level"></i> Status</td>
                                                    <td><a href="javascript:;" id="prj_project_status" class="prj_project_status status-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Status" data-original-title="Select Status" data-custom_select2_id="<?php if(isset($prj_data->prj_project_status)) echo $prj_data->prj_project_status; ?>" data-custom_select2_name="<?php if(isset($prj_data->prj_project_status_value)) echo $prj_data->prj_project_status_value; ?>"  data-gnp-grp="prj_project_status"><?php if(isset($prj_data->prj_project_status)) echo $prj_data->prj_project_status_value; ?> </a>
                                                    </td>
                                                    <td><i class="fas fa-chart-pie list-level"></i>Work Order</td>
                                                    <td><a href="javascript:;" class="prj_work_ord work-order-editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Enter Work Order" data-original-title="Enter Work Order" data-gnp-grp="prj_work_ord"><?php if(isset($prj_data->prj_work_ord)) echo $prj_data->prj_work_ord; ?> 
                                                    </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-map-marked-alt list-level"></i> Site Location</td>
                                                     <td><a href="javascript:;" class="prj_site_loc location-editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Enter Site Location" data-original-title="Enter Site Location" data-gnp-grp="prj_site_loc"><?php if(isset($prj_data->prj_site_loc)) echo $prj_data->prj_site_loc; ?> 
                                                    </a>
                                                    </td>
                                                    <td><i class="fa fa-map-marker list-level"></i> Site Address</td>
                                                     <td><a href="javascript:;" class="prj_site_add address-editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Enter Site Address" data-original-title="Enter Site Address" data-gnp-grp="prj_site_add"><?php if(isset($prj_data->prj_site_add)) echo $prj_data->prj_site_add; ?> 
                                                    </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </aside>

                        <aside class="profile-info col-lg-12 mb-40">
                            <section class="panel">
                                <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                    <header class="panel-heading panel-heading-lead color-primary">
                                        <div class="row detail-box">
                                            <div class="col-md-12">
                                                <span class="panel-title">Description</span>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="col-md-12 summernote-decription">
                                         <p><?php if(isset($prj_data->prj_desc)) echo $prj_data->prj_desc; ?></p>
                                    </div>
                                </div>
                            </section>
                        </aside>

                    </div>
                    <!-- -----MAIN CONTENTS END HERE----- -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?>
                <!-- OPTIONAL SCRIPTS -->
                <!-- END OPTIONAL SCRIPTS -->
        </div>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/module/common.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function()
                {
                  var primary_key     = 'prj_id';
                  var updateUrl       = baseUrl + 'project/updateProjectCustomData';
                  
                  var editableElement = '.company-editable';
                  var select2Class    = 'company_select2';
                  var dropdownUrl     = 'project/getCompanyDropdown/';
                  newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

                  var editableElement = '.manage-editable';
                  var select2Class    = 'manage_select2';
                  var dropdownUrl     = 'project/getPeopleDropdown?managed_by=1';
                  newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

                  var editableElement = '.status-editable';
                  var select2Class    = 'status_select2';
                  var dropdownUrl     = 'project/getDropdown/';
                  newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

                  var editableElement = '.work-order-editable';
                  customTextEditable(editableElement, primary_key, updateUrl);

                  var editableElement = '.location-editable';
                  customTextEditable(editableElement, primary_key, updateUrl);

                  var editableElement = '.address-editable';
                  customTextEditable(editableElement, primary_key, updateUrl);
                });
                function deleteProject(prj_id)
                    {
                       swal({
                              title: "Are you sure?",
                              text: "You will not be able to recover this Project!",
                              type: "warning",
                              showCancelButton: true,
                              confirmButtonClass: "btn-danger",
                              confirmButtonText: "Yes, delete it!",
                              cancelButtonText: "No, cancel please!",
                              closeOnConfirm: false,
                              closeOnCancel: false
                            },
                            function(isConfirm) {
                              if (isConfirm) 
                              {
                                data={
                                    prj_id:prj_id,
                                    field_value:2,
                                    field:'prj_status'
                                },
                               $.ajax({
                                    type:"POST",
                                    dataType:"JSON",
                                    data:data,
                                    url:baseUrl+"project/updateProjectCustomData",
                                    success:function(response)
                                    {
                                      swal({
                                        title: "Success",
                                        text: "Successfully Project Deleted",
                                        type: "success"
                                      },
                                      function(){
                                      window.location='project-list'
                                      });
                                    }
                                });
                              } else {
                                swal("Cancelled", "Your imaginary file is safe", "error");
                              }
                            });
                    }
        </script>
</body>
</html>
