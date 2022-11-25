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
    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />   
    <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
              <div class="page-content page-content-detail">
                  <!-- BEGIN PAGE HEADER-->
                  <!-- BEGIN PAGE BAR -->
                  <div class="page-bar" id="breadcrumbs-list">
                      <?php echo $breadcrumb; ?>
                      <div class="breadcrumb-button">
                          <a href="<?php echo base_url('team-details-'.$teamdata->prev_encrypt) ?>" class=" previous" title="">
                              <button id="newlead" class="btn green">
                                  <i class="fa fa-arrow-left"></i>
                                  <!-- Previous  -->
                              </button>
                          </a>
                          <a href="<?php echo base_url('team-details-'.$teamdata->next_encrypt) ?>" class="next">
                              <button id="newlead" class="btn green">
                                  <!-- Next --><i class="fa fa-arrow-right"></i>
                              </button>
                          </a>
                      </div>
                  </div>
                  <!-- END PAGE BAR -->
                  <!-- END PAGE HEADER-->
                  <div class="portlet">
                      <div class="row">
                          <!-- END PAGE HEADER-->
                          <div class="container-fluid">
                              <!-- -----MAIN CONTENTS START HERE----- -->
                            <?php 
                            $empData['emp_id'] = $teamdata->emp_id;
                            $empencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($teamdata->emp_id);
                            $this->load->view('team/team_sidebar',$empData); 
                            ?>
                                <aside class="profile-info col-lg-10 detail-view-list">
                                   <section class="panel">
                                      <!-- <label>make drop down editable for People Name,Department,Reporting To</label> -->
                                      <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                         <div class="text-center invoice-btn col-lg-offset-10">
                                         </div>
                                         <header class="panel-heading color-primary panelHeading">
                                          <div class="row detail-box">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <div class="row inner-row">
                                                <input type="hidden" name="emp_id" id="emp_id" value="<?php if(isset($teamdata->emp_id)) echo $teamdata->emp_id; ?>" />
                                                <span class="panel-title"><?php echo $title; ?></span>&nbsp;&nbsp;
                                                  <a class="btn-edit" href="<?php echo base_url('team-edit-'.$teamdata->emp_id_encrypt) ?>">
                                                   <i class="fa fa-edit">
                                                  </i>
                                                  <span class="btn-text"> Edit
                                                  </span>
                                                </a>
                                              </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 created-title">
                                              <span class="created">Created By: <?php if(isset($teamdata->emp_crdt_by_name))echo $teamdata->emp_crdt_by_name; ?>
                                              </span>
                                              <br>
                                              <span class="sp-date">Created On: <?php if(isset($teamdata->emp_crdt_dt)) echo display_date($teamdata->emp_crdt_dt); ?>
                                              </span>
                                            </div>
                                          </div>
                                        </header>
                                         <div class="table-responsive">
                                            <table class="table table-detail-custom table-style">
                                               <tbody>
                                                  <tr>
                                                     <td><i class="fa fa-users"></i> Name</td>
                                                     <td><?php if(isset($teamdata->emp_name)) echo $teamdata->emp_name; ?></td>
                                                     <td><i class="fas fa-building"></i> Department</td>
                                                     <td>
                                                        <a href="javascript:;" id="emp_dept" class="emp_dept team-dept-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Department" data-original-title="Select Department" data-custom_select2_id="<?php echo $teamdata->emp_dept; ?>" data-custom_select2_name="<?php echo $teamdata->emp_dept_name; ?>"  data-gnp-grp="emp_dept"><?php if(isset($teamdata->emp_dept_name)) echo $teamdata->emp_dept_name; ?> </a>
                                                     </td>
                                                  </tr>
                                                  <tr>
                                                     <td><i class="fas fa-address-card"></i> Employee Code</td>
                                                     <td><?php if(isset($teamdata->emp_code)) echo $teamdata->emp_code; ?></td>
                                                     <td><i class="fas fa-id-card-alt"></i> Designation</td>
                                                     <td><?php if(isset($teamdata->emp_designation)) echo $teamdata->emp_designation; ?></td>
                                                  </tr>
                                                  <tr>
                                                     <td><i class="fas fa-address-card"></i> Reporting To</td>
                                                     <td >
                                                        <a href="javascript:;" id="emp_reporting_to" class="emp_reporting_to team-reporting-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Reporting To" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $teamdata->emp_reporting_to; ?>" data-custom_select2_name="<?php echo $teamdata->emp_reporting_to_name; ?>"  data-gnp-grp="emp_reporting_to"><?php if(isset($teamdata->emp_reporting_to_name)) echo $teamdata->emp_reporting_to_name; ?> </a>
                                                      </td>
                                                      <td><i class="fas fa-user"></i> Billing Company</td>
                                                      <td>
                                                          <a href="javascript:;" id="emp_cmp_id" class="emp_cmp_id team-company-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Billing Company" data-original-title="Select Billing Company" data-custom_select2_id="<?php if(isset($teamdata->emp_cmp_id)) echo $teamdata->emp_cmp_id; ?>" data-custom_select2_name="<?php if(isset($teamdata->emp_cmp_id_name)) echo $teamdata->emp_cmp_id_name; ?>"  data-gnp-grp="emp_cmp_id"><?php if(isset($teamdata->emp_cmp_id_name)) echo $teamdata->emp_cmp_id_name; ?></a></td>
                                                  </tr>
                                               </tbody>
                                            </table>
                                         </div>
                                      </div>
                                   </section>
                                </aside>
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
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          
          <!-- OPTIONAL SCRIPTS -->
         
          <!-- END OPTIONAL SCRIPTS -->
          <script type="text/javascript">
            $(document).ready(function()
            {
              var primary_key     = 'emp_id';
              var updateUrl       = baseUrl + 'team/updateTeamCustomData';
              var editableElement = '.team-dept-editable';
              var select2Class    = 'team_dept_select2';
              var dropdownUrl     = 'team/getDepartmentforDropdown/';
              newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
              
              var editableElement = '.team-reporting-editable';
              var select2Class    = 'team_reporting_select2';
              var dropdownUrl     = 'team/getTeamDropdown/';
              newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
              var editableElement = '.team-company-editable';
              var select2Class    = 'team_company_select2';
              var dropdownUrl     = 'team/getCompanyDropdown?emp_ppl='+<?php echo $teamdata->emp_ppl_id; ?>+'&';
              newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
            })
          </script>
      </div>
  </body>
</html>