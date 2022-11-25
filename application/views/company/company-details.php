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
    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
    <?php $this->load->view('common/header_styles'); ?>
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/company/css/account-custom.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
      
    </style>
    <!-- END OPTIONAL LAYOUT STYLES -->
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
        <div class="page-content page-content-detail">
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <div class="page-bar" id="breadcrumbs-list">
            <div class="row">
              <div class="col-md-4 col-sm-4 mob-breadcrumb">
                <?php echo $breadcrumb; ?>
              </div>
              <div class="col-md-8 col-sm-8 mob-date mob-date-custom date-filter pull-right">
                <div class="breadcrumb-date">
                  <div class="page-toolbar page-toolbar-custom">
                    <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider date-range-picker-div" data-container="body" data-placement="bottom" data-original-title="change Outstanding Detail date range" data-daterangevaluestart="" data-daterangevalueend="">
                        <span class="thin uppercase"></span>&nbsp;
                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                    </div>
                  </div>
                  <!-- <div class="page-toolbar page-custom-toolbar"> -->
                    <a href="#" class="pull-right btn btn-primary btn-month-srt date-range-picker-div date-list-picker" data-daterangevaluestart="" data-daterangevalueend="" >All Time</a>
                    <a href="#" class="pull-right btn btn-primary btn-month-srt date-range-picker-div date-list-picker" data-daterangevaluestart="<?php echo date('Y-m').'-01'; ?>" data-daterangevalueend="<?php echo date('Y-m-d'); ?>" ><?php echo date('M') ?></a>
                    <a href="#" class="pull-right btn btn-primary btn-month-srt date-range-picker-div  date-list-picker" data-daterangevaluestart="<?php echo date('Y').'-01-01' ?>" data-daterangevalueend="<?php echo date('Y').'-12-31'; ?>" ><?php echo date('Y') ?></a>
                  <!-- </div> -->
                </div>
              </div>
              <div class="breadcrumb-button breadcrumb-button-custom">
                <a href="<?php echo base_url('company-details-'.$companydata->prev_encrypt) ?>" class=" previous" title="">
                    <button id="newlead" class="btn green">
                        <i class="fa fa-arrow-left"></i>
                        <!-- Previous  -->
                    </button>
                </a>
                <a href="<?php echo base_url('company-details-'.$companydata->next_encrypt) ?>" class="next">
                    <button id="newlead" class="btn green">
                        <!-- Next --><i class="fa fa-arrow-right"></i>
                    </button>
                </a>
              </div>
            </div>
          </div>
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet">
            <div class="row">

              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <?php
               $cmpData['cmp_id'] = $companydata->cmp_id;
               $cmpencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_id);
                // $this->load->view('company/company_sidebar',$cmpData);
                ?> 

                <input id="cmp_id" type="hidden" name="cmp_id" value="<?php echo $companydata->cmp_id; ?>" />
                <aside class="profile-info col-lg-12 detail-view-list">
                  <section class="panel">
                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                     <div class="row">
                       <div class="col-lg-2 col-md-3">
                          <div class="company-logo-details">
                            <?php 
                              if($companydata->cmp_logo)
                                $imagefullPath = base_url().COMPANY_LOGO.$companydata->cmp_logo; 
                              else
                                $imagefullPath = base_url().COMPANY_LOGO.'no-image.jpg'; 
                            ?>

                            <img src="<?php echo $imagefullPath; ?>" class="img-responsive company-image-list" alt=""> 
                          </div>
                       </div>
                       <div class="col-lg-10 col-md-9 details-container">
                         <div class="col-md-12 no-side-padding mobile-side-padding">
                           <span class="detail-list-heading">Company Details</span><br>
                         <span class="panel-title"><?php echo  $companydata->cmp_name; ?></span>
                         </div>
                         <div class="col-md-6 no-side-padding mobile-side-padding">
                           <address>Onkar, Shiv colony, Panchshil Colony, Thergaon, Pimpri-Chinchwad</address>
                         </div>
                         <div class="col-md-3 no-side-padding mobile-side-padding">
                           <span class="sub-list-details">GST - 12345678902</span>
                         </div>
                          <div class="col-md-3 no-side-padding mobile-side-padding">
                            <span class="sub-list-details">Created By: Vinay Pagare (Admin)</span>
                          </div>
                         
                         <div class="clearfix"></div>
                         <div class="col-md-3 no-side-padding mobile-side-padding">
                           <a href="http://www.raksofttech.com/" class="company-website-link" target="_blank">http://www.raksofttech.com/</a>
                         </div>
                         
                        
                         <div class="col-md-3 no-side-padding mobile-side-padding">
                           <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_facebook) && $companydata->cmp_facebook == '') echo 'social-disabled'; ?>" href="<?php  if(isset($companydata->cmp_facebook)) echo $companydata->cmp_facebook ?>" data-toggle="tooltip"  data-original-title="Facebook" target="_blank">
                                  <img class="fa-whatsapp-img-title social-logo " src="<?php echo base_url(); ?>assets/project/images/facebook.png" style="    width: 22px!important;" />
                                  <span class="btn-text"></span>
                                </a>
                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_instagram)  && $companydata->cmp_instagram == '') echo 'social-disabled'; ?>" href="<?php  if(isset($companydata->cmp_instagram)) echo $companydata->cmp_instagram ?>" data-toggle="tooltip"  data-original-title="Instagram" target="_blank">
                                  <img class="fa-whatsapp-img-title social-logo social-small-logo social-logo-details"  src="<?php echo base_url(); ?>assets/project/images/instagram.png" />
                                  <span class="btn-text"></span>
                                </a>
                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_linkedin)  && $companydata->cmp_linkedin == '') echo 'social-disabled'; ?>" href="<?php if(isset($companydata->cmp_linkedin)) echo $companydata->cmp_linkedin; ?>" data-toggle="tooltip"  data-original-title="LinkedIn" target="_blank"> 
                                  <img class="fa-whatsapp-img-title social-logo social-list-details" style="width: 15px!important;" src="<?php echo base_url(); ?>assets/project/images/linkedin.png" />
                                  <span class="btn-text"></span>
                                </a>
                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_twitter)  && $companydata->cmp_twitter == '') echo 'social-disabled'; ?>" href="<?php if(isset($companydata->cmp_twitter)) echo $companydata->cmp_twitter; ?>" data-toggle="tooltip"  data-original-title="Twitter" target="_blank">
                                  <img class="fa-whatsapp-img-title social-logo social-small-logo social-logo-details"  src="<?php echo base_url(); ?>assets/project/images/twitter.png" />
                                  <span class="btn-text"></span>
                                </a>
                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_youtube)  && $companydata->cmp_youtube == '') echo 'social-disabled'; ?>" href="<?php if(isset($companydata->cmp_youtube)) echo $companydata->cmp_youtube; ?>" data-toggle="tooltip"  data-original-title="Youtube" target="_blank">
                                  <img class="fa-whatsapp-img-title social-logo social-ex-smal-logo"  src="<?php echo base_url(); ?>assets/project/images/youtube.png" />
                                  <span class="btn-text"></span>
                                </a>
                         </div>
                          <div class="col-md-3 no-side-padding mobile-side-padding">
                            <!-- <span class="details-outline">Company</span> -->
                            <span class="header-managed-by"><span>Managed By - </span><a href="javascript:;" id="cmp_managed_by" class="cmp_managed_by company-managedby-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Managed By" data-original-title="Select Managed By" data-custom_select2_id="<?php echo $companydata->cmp_managed_by; ?>" data-custom_select2_name="<?php echo $companydata->cmp_managed_by_name; ?>"  data-gnp-grp="cmp_managed_by"><?php if(isset($companydata->cmp_managed_by_name)) echo $companydata->cmp_managed_by_name; ?> </a></span>
                          </div>
                          <div class="col-md-3 no-side-padding mobile-side-padding">
                             <span class="sub-list-details">Created On: 11th Mar, 2019</span>
                          </div>
                         <div class="clearfix"></div>
                         <div class="details-content mobile-side-padding">
                            <a class="btn btn-edit" href="" data-toggle="tooltip"  data-original-title="Edit">
                               <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                            </a>
                            <a class="btn btn-edit" href="" data-toggle="tooltip"  data-original-title="Delete">
                              <i class="fa fa-trash"> </i> <span class="btn-text"> Delete</span>
                            </a>
                            <a class="btn btn-edit" href="" data-toggle="tooltip"  data-original-title="Add People">
                              <i class="fas fa-plus"></i><span class="btn-text"> People</span>
                            </a>
                            <a class="btn btn-edit" href="" data-toggle="tooltip"  data-original-title="Add Lead">
                              <i class="fas fa-plus"></i><span class="btn-text"> Lead</span>
                            </a>
                            <a class="btn btn-edit" href="" data-toggle="tooltip"  data-original-title="Add Quotation">
                              <i class="fas fa-plus"></i><span class="btn-text"> Quotation</span>
                            </a>
                            <a class="btn btn-edit" href="" data-toggle="tooltip"  data-original-title="Add Invoice">
                              <i class="fas fa-plus"></i><span class="btn-text"> Invoice</span>
                            </a>
                            <a class="btn btn-edit" href="" data-toggle="tooltip"  data-original-title="Add Task">
                              <i class="fas fa-plus"></i><span class="btn-text"> Task</span>
                            </a>
                         </div>
                       </div>
                     </div>
                    </div>
                  </section>
                </aside>
                <aside class="profile-info col-lg-12 detail-view-list">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="portlet light bordered tabbed-detail">
                        <div class="portlet-title tabbable-line tabbable-line-lead">
                          <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#portlet_overview" data-toggle="tab"> Overview </a>
                            </li>
                            <li>
                                <a href="#portlet_details" data-toggle="tab"> Details </a>
                            </li>
                            <li>
                                <a href="#portlet_operation" data-toggle="tab"> Operation </a>
                            </li>
                            <li>
                                <a href="#portlet_sales" data-toggle="tab"> Sales </a>
                            </li>
                            <li>
                                <a href="#portlet_finance" data-toggle="tab"> Finance </a>
                            </li>
                             <li>
                                <a href="#portlet_company_people" data-toggle="tab"> Company People </a>
                            </li>
                            <li>
                                <a href="#portlet_activity" data-toggle="tab"> Activities </a>
                            </li>
                          </ul>
                        </div>
                        <div class="portlet-body">
                          <div class="tab-content tabbable-dashbord-content">
                            <div class="tab-pane active" id="portlet_overview">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="company-tab-background">
                                    <div class="row">
                                      <div class="col-md-8 no-side-padding">
                                        <!-- item 1 -->
                                        <div class="col-md-6 col-sm-6">
                                          <a href="<?php echo base_url('invoice-list') ?>" class="container-links">
                                            <div class="container-item-payments pull-up">
                                              <div class="container-content">
                                                <div class="container-body">
                                                  <div class="media d-flex">
                                                    <div class="media-body text-left">
                                                     <h6 class="media-desc">Total Business</h6>
                                                     <h3 class="media-count">59,00,000</h3>
                                                     <span class="media-view-more">View Details <i class="fas fa-arrow-right"></i></span>
                                                    </div>
                                                    <div>
                                                      <i class="fas fa-coins color-yellow list-level float-right"></i>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </a>
                                        </div>
                                        <!-- item 2 -->
                                        <div class="col-md-6 col-sm-6">
                                          <a href="<?php echo base_url('outstanding-list') ?>" class="container-links">
                                            <div class="container-item-payments pull-up">
                                              <div class="container-content">
                                                <div class="container-body">
                                                  <div class="media d-flex">
                                                    <div class="media-body text-left">
                                                     <h6 class="media-desc">Closing Balance</h6>
                                                     <h3 class="media-count">10,00,000</h3>
                                                     <span class="media-view-more">View Details <i class="fas fa-arrow-right"></i></span>
                                                    </div>
                                                    <div>
                                                      <i class="fas fa-money-check-alt color-red list-level float-right"></i>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </a>
                                        </div>
                                        <!-- item 3 -->
                                        <div class="col-md-6 col-sm-6">
                                          <a href="<?php echo base_url('payment-list') ?>" class="container-links">
                                            <div class="container-item-payments pull-up">
                                              <div class="container-content">
                                                <div class="container-body">
                                                  <div class="media d-flex">
                                                    <div class="media-body text-left">
                                                     <h6 class="media-desc">Paid Amount</h6>
                                                     <h3 class="media-count">10,00,000</h3>
                                                     <span class="media-view-more">View Details <i class="fas fa-arrow-right"></i></span>
                                                    </div>
                                                    <div>
                                                      <img src="<?php echo base_url() ?>assets/project/svg/outstanding.svg" class="paid-icon" style="width: 38px">
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </a>
                                        </div>
                                        <!-- item 4 -->
                                        <div class="col-md-6 col-sm-6">
                                          <a href="<?php echo base_url('outstanding-list') ?>" class="container-links">
                                            <div class="container-item-payments pull-up">
                                              <div class="container-content">
                                                <div class="container-body">
                                                  <div class="media d-flex">
                                                    <div class="media-body text-left">
                                                     <h6 class="media-desc">On Account</h6>
                                                     <h3 class="media-count">10,00,000</h3>
                                                     <span class="media-view-more">View Details <i class="fas fa-arrow-right"></i></span>
                                                    </div>
                                                    <div>
                                                      <i class="fas fa-address-card color-dark-green list-level float-right"></i>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </a>
                                        </div>
                                        <div class="clearfix"></div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="card card-table">
                                          <div class="card-header">
                                            <h4 class="card-title">Company People</h4>
                                            <span class="card-action"><a href="#">Show all</a></span>
                                          </div>
                                          <div class="card-content">
                                            <div class="table-responsive">
                                              <table class="table table-company-people">
                                                <thead>
                                                  <tr>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Mobile</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td><a href="#" class="link-details">Pranali</a></td>
                                                    <td>HR</td>
                                                    <td><a href="#" class="link-details">+91 9876543210</a></td>
                                                  </tr>
                                                  <tr>
                                                    <td><a href="#" class="link-details">Stanley</a></td>
                                                    <td>Developer</td>
                                                    <td><a href="#" class="link-details">+91 9876543210</a></td>
                                                  </tr>
                                                  <tr>
                                                    <td><a href="#" class="link-details">Ankush</a></td>
                                                    <td>Developer</td>
                                                    <td><a href="#" class="link-details">+91 9876543210</a></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 mb-20">
                                  <div class="card">
                                    <div class="portlet light bordered mb-30 portlet-list">
                                          <div class="portlet-title portlet-sub portlet-container">
                                              <div class="caption caption-details caption-scroller">
                                                  <i class="icon-bubble font-hide hide"></i>
                                                  <span class="caption-subject font-hide bold">Follow-Up</span>
                                                  <div class="scoller-continer pull-right">
                                                    <a href="#" class="scoller-show-all">Show All</a>
                                                  </div>
                                              </div>
                                          </div>
                                          <br>
                                          <div class="portlet-body portlet-followup" id="chats">
                                              <div class="scroller" style="height: 250px;" data-always-visible="1" data-rail-visible1="1">
                                                <ul class="follow-up-list">
                                                  <li>
                                                    <span class="manage-block">
                                                       <a href="#" class="follow-lead">Mr. Mehul Lunia</a>
                                                        <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                        <span class="manage-block">
                                                          <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                        <span class="follow-date follow-up-manage-by">Lead</span>
                                                        </span>
                                                        <span class="lead-body">
                                                          get update regarding project status
                                                        </span>
                                                      </span>
                                                    <div class="clearfix"></div>
                                                    <span class="datetime follow-up-button">
                                                        <a class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                        <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                  </li>

                                                  <li>
                                                    <span class="manage-block">
                                                       <a href="#" class="follow-lead">Mr. Mehul Lunia</a>
                                                        <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                        <span class="manage-block">
                                                          <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                        <span class="follow-date follow-up-manage-by">Lead</span>
                                                        </span>
                                                        <span class="lead-body">
                                                          get update regarding project status
                                                        </span>
                                                      </span>
                                                    <div class="clearfix"></div>
                                                    <span class="datetime follow-up-button">
                                                        <a class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                        <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                  </li>

                                                  <li>
                                                    <span class="manage-block">
                                                       <a href="#" class="follow-lead">Mr. Mehul Lunia</a>
                                                        <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                        <span class="manage-block">
                                                          <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                        <span class="follow-date follow-up-manage-by">Lead</span>
                                                        </span>
                                                        <span class="lead-body">
                                                          get update regarding project status
                                                        </span>
                                                      </span>
                                                    <div class="clearfix"></div>
                                                    <span class="datetime follow-up-button">
                                                        <a class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                        <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                  </li>

                                                  <li>
                                                    <span class="manage-block">
                                                       <a href="#" class="follow-lead">Mr. Mehul Lunia</a>
                                                        <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                        <span class="manage-block">
                                                          <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                        <span class="follow-date follow-up-manage-by">Lead</span>
                                                        </span>
                                                        <span class="lead-body">
                                                          get update regarding project status
                                                        </span>
                                                      </span>
                                                    <div class="clearfix"></div>
                                                    <span class="datetime follow-up-button">
                                                        <a class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                        <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                  </li>
                                                </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="col-md-4 mb-20">
                                  <div class="card">
                                    <div class="portlet light bordered mb-30 portlet-list">
                                      <div class="portlet-title portlet-sub portlet-container">
                                          <div class="caption caption-details caption-scroller">
                                              <i class="icon-bubble font-hide hide"></i>
                                              <span class="caption-subject font-hide bold">Task</span>
                                              <div class="scoller-continer pull-right">
                                                <a href="#" class="scoller-show-all">Show All</a>
                                              </div>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="portlet-body portlet-followup" id="chats">
                                          <div class="scroller" style="height: 250px;" data-always-visible="1" data-rail-visible1="1">
                                            <ul class="follow-up-list">
                                              <li>
                                                <span class="manage-block">
                                                   <a href="#" class="follow-lead" title="Creating Database">Creating Database</a>
                                                   <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                </span>
                                                <span class="manage-block">
                                                  <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                  <span class="follow-date follow-up-manage-by task-status completed">Completed</span>
                                                  <span class="lead-body task-desc-body">
                                                    creating database for people
                                                  </span>
                                                </span>
                                                <div class="clearfix"></div>
                                                <span class="datetime follow-up-button">
                                                  <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                </span>
                                              </li>

                                              <li>
                                                <span class="manage-block">
                                                   <a href="#" class="follow-lead" title="Creating New module for EasyNow">Creating New...</a>
                                                   <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                </span>
                                                <span class="manage-block">
                                                  <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                  <span class="follow-date follow-up-manage-by task-status on-hold">On Hold</span>
                                                  <span class="lead-body task-desc-body">
                                                    creating database for people
                                                  </span>
                                                </span>
                                                <div class="clearfix"></div>
                                                <span class="datetime follow-up-button">
                                                  <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                </span>
                                              </li>

                                              <li>
                                                <span class="manage-block">
                                                   <a href="#" class="follow-lead" title="Creating Database">Creating Database</a>
                                                   <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                </span>
                                                <span class="manage-block">
                                                  <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                  <span class="follow-date follow-up-manage-by task-status review">Review</span>
                                                  <span class="lead-body task-desc-body">
                                                    creating database for people
                                                  </span>
                                                </span>
                                                <div class="clearfix"></div>
                                                <span class="datetime follow-up-button">
                                                  <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                </span>
                                              </li>
                                              <li>
                                                <span class="manage-block">
                                                   <a href="#" class="follow-lead" title="Creating Database">Creating Database</a>
                                                   <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                </span>
                                                <span class="manage-block">
                                                  <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                  <span class="follow-date follow-up-manage-by task-status pending">Pending</span>
                                                  <span class="lead-body task-desc-body">
                                                    creating database for people
                                                  </span>
                                                </span>
                                                <div class="clearfix"></div>
                                                <span class="datetime follow-up-button">
                                                  <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                </span>
                                              </li>
                                            </ul>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4 mb-20">
                                  <div class="card">
                                    <div class="portlet light bordered mb-30 portlet-list">
                                          <div class="portlet-title portlet-sub portlet-container">
                                              <div class="caption caption-details caption-scroller">
                                                  <i class="icon-bubble font-hide hide"></i>
                                                  <span class="caption-subject font-hide bold">Meeting</span>
                                                  <div class="scoller-continer pull-right">
                                                    <a href="#" class="scoller-show-all">Show All</a>
                                                  </div>
                                              </div>
                                          </div>
                                          <br>
                                          <div class="portlet-body portlet-followup" id="chats">
                                              <div class="scroller" style="height: 250px;" data-always-visible="1" data-rail-visible1="1">
                                                <ul class="follow-up-list">
                                                  <li>
                                                    <span class="manage-block">
                                                      <a href="#" class="follow-lead" title="Supplier Meeting">Supplier Meeting </a>
                                                      <span class="manage-block">
                                                        <a href="#" class="follow-lead follow-manageby meeting-host">Vinay Pagare (Admin)</a>
                                                        <span class="follow-date follow-up-manage-by meeting-status available">Available</span>
                                                        <div class="meeting-with">
                                                          <a href="#">Stanley</a>
                                                          <a href="#">Ankusk</a>
                                                          <a href="#">Pooja</a>
                                                          <a href="#">Pranali</a>
                                                        </div>
                                                        <div class="meeting-date-container">
                                                          <span class="follow-date follow-date-left">
                                                            11th Feb, 2019 11:00 AM - 11th Feb, 2019 01:00 PM
                                                          </span>
                                                        </div>
                                                      </span>
                                                      <div class="clearfix"></div>
                                                      <span class="datetime follow-up-button">
                                                        <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                    </span>
                                                  </li>

                                                  <li>
                                                    <span class="manage-block">
                                                      <a href="#" class="follow-lead" title="The Differentiators: Intention, Format and Participation Profile">The Differentiators: Intention, Format...</a>
                                                      <span class="manage-block">
                                                        <a href="#" class="follow-lead follow-manageby meeting-host">Vinay Pagare (Admin)</a>
                                                        <span class="follow-date follow-up-manage-by meeting-status busy">Busy</span>
                                                        <div class="meeting-with">
                                                          <a href="#">Stanley</a>
                                                        </div>
                                                        <div class="meeting-date-container">
                                                          <span class="follow-date follow-date-left">
                                                            11th Feb, 2019 11:00 AM - 11th Feb, 2019 01:00 PM
                                                          </span>
                                                        </div>
                                                      </span>
                                                      <div class="clearfix"></div>
                                                      <span class="datetime follow-up-button">
                                                        <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                    </span>
                                                  </li>
                                                  <li>
                                                    <span class="manage-block">
                                                      <a href="#" class="follow-lead">Supplier Meeting </a>
                                                      <span class="manage-block">
                                                        <a href="#" class="follow-lead follow-manageby meeting-host">Vinay Pagare (Admin)</a>
                                                        <span class="follow-date follow-up-manage-by meeting-status available">Available</span>
                                                        <div class="meeting-with">
                                                          <a href="#">Stanley</a>
                                                          <a href="#">Ankusk</a>
                                                          <a href="#">Pooja</a>
                                                          <a href="#">Pranali</a>
                                                        </div>
                                                        <div class="meeting-date-container">
                                                          <span class="follow-date follow-date-left">
                                                            11th Feb, 2019 11:00 AM - 11th Feb, 2019 01:00 PM
                                                          </span>
                                                        </div>
                                                      </span>
                                                      <div class="clearfix"></div>
                                                      <span class="datetime follow-up-button">
                                                        <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                    </span>
                                                  </li>
                                                  <li>
                                                    <span class="manage-block">
                                                      <a href="#" class="follow-lead">Supplier Meeting </a>
                                                      <span class="manage-block">
                                                        <a href="#" class="follow-lead follow-manageby meeting-host">Vinay Pagare (Admin)</a>
                                                        <span class="follow-date follow-up-manage-by meeting-status busy">Busy</span>
                                                        <div class="meeting-with">
                                                          <a href="#">Stanley</a>
                                                        </div>
                                                        <div class="meeting-date-container">
                                                          <span class="follow-date follow-date-left">
                                                            11th Feb, 2019 11:00 AM - 11th Feb, 2019 01:00 PM
                                                          </span>
                                                        </div>
                                                      </span>
                                                      <div class="clearfix"></div>
                                                      <span class="datetime follow-up-button">
                                                        <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                    </span>
                                                  </li>
                                                  <li>
                                                    <span class="manage-block">
                                                      <a href="#" class="follow-lead">Supplier Meeting </a>
                                                      <span class="manage-block">
                                                        <a href="#" class="follow-lead follow-manageby meeting-host">Vinay Pagare (Admin)</a>
                                                        <span class="follow-date follow-up-manage-by meeting-status available">Available</span>
                                                        <div class="meeting-with">
                                                          <a href="#">Stanley</a>
                                                          <a href="#">Ankusk</a>
                                                          <a href="#">Pooja</a>
                                                          <a href="#">Pranali</a>
                                                        </div>
                                                        <div class="meeting-date-container">
                                                          <span class="follow-date follow-date-left">
                                                            11th Feb, 2019 11:00 AM - 11th Feb, 2019 01:00 PM
                                                          </span>
                                                        </div>
                                                      </span>
                                                      <div class="clearfix"></div>
                                                      <span class="datetime follow-up-button">
                                                        <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                      </span>
                                                    </span>
                                                  </li>
                                                </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <!-- item 1 -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                  <a href="<?php echo base_url('lead-list') ?>" class="container-links">
                                    <div class="container-item-payments container-item-overview pull-up">
                                      <div class="container-content">
                                        <div class="container-body overview-body">
                                          <div class="media d-flex">
                                            <div>
                                              <i class="fas fa-chalkboard-teacher flat-pink float-left"></i>
                                            </div>
                                            <div class="media-body media-control text-left">
                                             <h3 class="media-count">59,00,000</h3>
                                             <h6 class="media-desc">Leads</h6>
                                            </div>
                                          </div>
                                        </div>
                                        <span class="overview-counter">03</span>
                                      </div>
                                    </div>
                                  </a>
                                </div>
                                <!-- item 2 -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                  <a href="<?php echo base_url('quotation-list') ?>" class="container-links">
                                    <div class="container-item-payments container-item-overview pull-up">
                                      <div class="container-content">
                                        <div class="container-body overview-body">
                                          <div class="media d-flex">
                                            <div>
                                              <i class="fas fa-file-invoice flat-yellow list-level float-left"></i>
                                            </div>
                                            <div class="media-body media-control text-left">
                                             <h3 class="media-count">70,80,000</h3>
                                             <h6 class="media-desc">Quotation</h6>
                                            </div>
                                          </div>
                                        </div>
                                        <span class="overview-counter">08</span>
                                      </div>
                                    </div>
                                  </a>
                                </div>
                                <!-- item 3 -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                  <a href="<?php echo base_url('invoice-list') ?>" class="container-links">
                                    <div class="container-item-payments container-item-overview pull-up">
                                      <div class="container-content">
                                        <div class="container-body overview-body">
                                          <div class="media d-flex">
                                            <div>
                                              <i class="fas fa-file-invoice-dollar flat-purple float-left"></i>
                                            </div>
                                            <div class="media-body media-control text-left">
                                             <h3 class="media-count">20,50,800</h3>
                                             <h6 class="media-desc">Invoice</h6>
                                            </div>
                                          </div>
                                        </div>
                                        <span class="overview-counter">20</span>
                                      </div>
                                    </div>
                                  </a>
                                </div>

                                <!-- item 4 -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                  <a href="<?php echo base_url('payment-list') ?>" class="container-links">
                                    <div class="container-item-payments container-item-overview pull-up">
                                      <div class="container-content">
                                        <div class="container-body overview-body">
                                          <div class="media d-flex">
                                            <div>
                                              <i class="fas fa-wallet flat-green float-left"></i>
                                            </div>
                                            <div class="media-body media-control text-left">
                                             <h3 class="media-count">20,50,800</h3>
                                             <h6 class="media-desc">Payment</h6>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <span class="overview-counter">10</span>
                                    </div>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="portlet_details">
                              <div class="row">
                                <div class="col-md-12">
                                  <section class="panel">
                                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view panel-company-details">
                                      <div class="">
                                        <table class="table table-detail-custom table-style">
                                           <tbody>
                                            <!-- <tr>
                                               <td rowspan="2">
                                                <img height="130" width="130" src="
                                                <?php
                                                  if(isset($companydata->cmp_logo) && $companydata->cmp_logo != '')
                                                    echo base_url().'assets/module/company/img/'.$companydata->cmp_logo;
                                                  else
                                                    echo base_url().'assets/project/images/nologo.png';
                                                  ?>" />
                                              </td> 
                                            </tr> -->
                                            <tr>
                                              <td><i class="fas fa-globe"></i> Website</td>
                                              <td>
                                                <?php 
                                                  if(isset($companydata->cmp_website)) 
                                                  {
                                                    $website = sanitizeURL($companydata->cmp_website);
                                                    echo '<a href="http://'.$website->url.'" target="_blank">'.$website->text.'</a></td>'; 
                                                  }
                                                ?>
                                              </td>
                                              <!-- <td><i class="fas fa-map-marker-alt"></i> State</td>
                                              <td>
                                                <a href="javascript:;" id="cmp_stm_id" class="cmp_stm_id company-state-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select State" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $companydata->cmp_stm_id; ?>" data-custom_select2_name="<?php echo $companydata->cmp_stm_name; ?>"  data-gnp-grp="cmp_stm_id"><?php if(isset($companydata->cmp_stm_name)) echo $companydata->cmp_stm_name; ?> </a>
                                              </td> -->
                                              <td><i class="fas fa-map-marker-alt"></i> State</td>
                                              <td><?php if(isset($companydata->cmp_stm_name)) echo '<a href="company-list-'.$this->nextasy_url_encrypt->encrypt_openssl(COMPANY_FILTER_STATE).'-'.$this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_stm_id).'" target="_blank">'.$companydata->cmp_stm_name.'</a></td>'; ?></td>
                                            </tr>
                                            <tr>
                                              <td><i class="fas fa-industry"></i> Industry</td>

                                              <td><?php if(isset($companydata->cmp_industry)) echo '<a href="company-list-'.$this->nextasy_url_encrypt->encrypt_openssl(COMPANY_FILTER_INDUSTRY).'-'.$this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_industry).'" target="_blank">'.$companydata->cmp_industry_name.'</a></td>'; ?></td>
                                              <!-- <td>
                                                <a href="javascript:;" id="cmp_industry" class="cmp_industry company-industry-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Industry" data-original-title="Select Industry" data-custom_select2_id="<?php echo $companydata->cmp_industry; ?>" data-custom_select2_name="<?php echo $companydata->cmp_industry_name; ?>"  data-gnp-grp="cmp_industry"><?php if(isset($companydata->cmp_industry)) echo $companydata->cmp_industry_name; ?> </a>
                                                  
                                                </td> -->
                                              <td><i class="fas fa-industry"></i> Company Type</td>
                                              
                                              <td><?php if(isset($companydata->cmp_type_name)) echo '<a href="company-list-'.$this->nextasy_url_encrypt->encrypt_openssl(COMPANY_FILTER_TYPE).'-'.$this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_type).'" target="_blank">'.$companydata->cmp_type_name.'</a></td>'; ?></td>
                                            </tr>
                                            <tr>
                                              
                                              <td><i class="fas fa-rupee-sign"></i> Annual revenue</td>
                                              <td><?php if(isset($companydata->cmp_anl_rev)) echo '<a href="company-list-'.$this->nextasy_url_encrypt->encrypt_openssl(COMPANY_FILTER_REVENUE).'-'.$this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_anl_rev).'" target="_blank">'.$companydata->cmp_anl_rev_name.'</a></td>'; ?></td>
                                              <!-- <td>
                                                <a href="javascript:;" id="cmp_anl_rev" class="cmp_anl_rev company-revenue-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Revenue" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $companydata->cmp_anl_rev; ?>" data-custom_select2_name="<?php echo $companydata->cmp_anl_rev_name; ?>"  data-gnp-grp="cmp_anl_rev"><?php if(isset($companydata->cmp_anl_rev)) echo $companydata->cmp_anl_rev_name; ?> </a>
                                              </td> -->
                                               <td><i class="fas fa-user"></i> No. Of Employees</td>
                                              <td><?php if(isset($companydata->cmp_employee)) echo $companydata->cmp_employee; ?></td>
                                            </tr>
                                            <tr>
                                              <td><i class="fas fa-id-card"></i> GST No</td>
                                              <td ><?php if(isset($companydata->cmp_gst_no)) echo $companydata->cmp_gst_no; ?></td>
                                              <td><i class="fas fa-address-card"></i> Pan No</td>
                                              <td><?php if(isset($companydata->cmp_pan)) echo $companydata->cmp_pan; ?></td>
                                              
                                            </tr>
                                            <tr>
                                              <td><i class="fas fa-user"></i> Managed By</td>
                                              <td>
                                                <a href="javascript:;" id="cmp_managed_by" class="cmp_managed_by company-managedby-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Managed By" data-original-title="Select Managed By" data-custom_select2_id="<?php echo $companydata->cmp_managed_by; ?>" data-custom_select2_name="<?php echo $companydata->cmp_managed_by_name; ?>"  data-gnp-grp="cmp_managed_by"><?php if(isset($companydata->cmp_managed_by_name)) echo $companydata->cmp_managed_by_name; ?> </a>
                                              </td>
                                              <td><i class="fas fa-user"></i> Type</td>
                                              <td>

                                                <a href="javascript:;" id="cmp_type_id" class="cmp_type_id company-company-type-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Company Type" data-original-title="Select Type" data-custom_select2_id="<?php echo $companydata->cmp_type_id; ?>" data-custom_select2_name="<?php echo $companydata->cmp_type_id_name; ?>"  data-gnp-grp="cmp_type_id"><?php if(isset($companydata->cmp_type_id_name)) echo $companydata->cmp_type_id_name; ?> </a>
                                              </td>
                                              
                                            </tr>
                                            
                                            <tr>
                                              <td><i class="fas fa-map-marker-alt"></i> Address</td>
                                              <td colspan="3"><?php if(isset($companydata->cmp_address)) echo $companydata->cmp_address; ?></td>
                                            </tr>
                                            <tr>
                                              
                                             
                                              <td><i class="fas fa-image"></i> Logo</td>
                                              <td colspan="3">  
                                                <div class="gly-image col-md-4" style="">
                                                  <div class="cbp-caption-defaultWrap ">

                                                    <?php 
                                                      if($companydata->cmp_logo)
                                                        $imagefullPath = base_url().COMPANY_LOGO.$companydata->cmp_logo; 
                                                      else
                                                        $imagefullPath = base_url().COMPANY_LOGO.'no-image.jpg'; 
                                                    ?>

                                                      <img src="<?php echo $imagefullPath; ?>" class="img-responsive"  style="max-width: 100%;max-width: 100%;" alt=""> 
                                                  </div>
                                                  <div class="del-overlay">
                                                        <div class="col-xs-12 ">
                                                          <div class=" icon-overlay">
                                                              
                                                          <a class="btn del-icon text-center delete-image" data-image_name="<?php echo $companydata->cmp_logo; ?>" data-image_id="<?php echo $companydata->cmp_id; ?>"><i class="fa fa-trash"></i></a>
                                                          </div>
                                                        </div>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>
                                            
                                            <tr>
                                              <td><i class="fas fa-tags"></i> Tags</td>
                                              <td colspan="3"><?php if(isset($companydata->cmp_tgs_id)) echo getTags($companydata->cmp_tgs_id,'company'); ?></td>
                                              
                                            </tr>
                                            
                                           <tr>
                                             <td><i class="far fa-credit-card"></i> Payment Terms</td>
                                              <td colspan="3"><?php if(isset($companydata->cmp_payment_terms)) echo $companydata->cmp_payment_terms; ?></td>
                                           </tr>
                                            <tr>
                                              <td><i class="far fa-credit-card"></i> Remarks</td>
                                              <td colspan="3"><?php if(isset($companydata->cmp_remark)) echo $companydata->cmp_remark; ?></td>
                                            </tr>
                                            <tr>
                                              <td><i class="fas fa-share-alt"></i> Social Media</td>
                                              <td colspan="3">
                                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_facebook) && $companydata->cmp_facebook == '') echo 'social-disabled'; ?>" href="<?php  if(isset($companydata->cmp_facebook)) echo $companydata->cmp_facebook ?>" data-toggle="tooltip"  data-original-title="Facebook" target="_blank">
                                                  <img class="fa-whatsapp-img-title social-logo " src="<?php echo base_url(); ?>assets/project/images/facebook.png" style="    width: 30px!important;" />
                                                  <span class="btn-text"></span>
                                                </a>
                                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_instagram)  && $companydata->cmp_instagram == '') echo 'social-disabled'; ?>" href="<?php  if(isset($companydata->cmp_instagram)) echo $companydata->cmp_instagram ?>" data-toggle="tooltip"  data-original-title="Instagram" target="_blank">
                                                  <img class="fa-whatsapp-img-title social-logo social-small-logo"  src="<?php echo base_url(); ?>assets/project/images/instagram.png" />
                                                  <span class="btn-text"></span>
                                                </a>
                                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_linkedin)  && $companydata->cmp_linkedin == '') echo 'social-disabled'; ?>" href="<?php if(isset($companydata->cmp_linkedin)) echo $companydata->cmp_linkedin; ?>" data-toggle="tooltip"  data-original-title="LinkedIn" target="_blank"> 
                                                  <img class="fa-whatsapp-img-title social-logo" style="width: 15px;" src="<?php echo base_url(); ?>assets/project/images/linkedin.png" />
                                                  <span class="btn-text"></span>
                                                </a>
                                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_twitter)  && $companydata->cmp_twitter == '') echo 'social-disabled'; ?>" href="<?php if(isset($companydata->cmp_twitter)) echo $companydata->cmp_twitter; ?>" data-toggle="tooltip"  data-original-title="Twitter" target="_blank">
                                                  <img class="fa-whatsapp-img-title social-logo social-small-logo"  src="<?php echo base_url(); ?>assets/project/images/twitter.png" />
                                                  <span class="btn-text"></span>
                                                </a>
                                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_youtube)  && $companydata->cmp_youtube == '') echo 'social-disabled'; ?>" href="<?php if(isset($companydata->cmp_youtube)) echo $companydata->cmp_youtube; ?>" data-toggle="tooltip"  data-original-title="Youtube" target="_blank">
                                                  <img class="fa-whatsapp-img-title social-logo social-ex-smal-logo"  src="<?php echo base_url(); ?>assets/project/images/youtube.png" />
                                                  <span class="btn-text"></span>
                                                </a>
                                              </td>
                                            </tr>
                                            
                                           </tbody>
                                        </table>
                                      </div>

                                    </div>
                                  </section>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="portlet_operation">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-12 ">
                                      <div class="task-custom-table">
                                        <div class="portlet-title">
                                          <div class="caption font-dark tab-list-title">
                                              <span class="list-title-caption caption-subject bold ">Task List</span>
                                          </div>
                                          <div class="tools"> </div>
                                      </div>
                                      <div class="portlet-body">
                                        <div class="tabbable-custom">
                                            <ul class="nav nav-tabs tabs-task">
                                                <li class="active">
                                                    <a href="#tab_completed" data-toggle="tab" aria-expanded="false">Completed</a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_pending" data-toggle="tab" aria-expanded="true">Pending</a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_on_hold" data-toggle="tab" aria-expanded="false">On Hold</a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_review" data-toggle="tab" aria-expanded="false">Review</a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_all" data-toggle="tab" aria-expanded="false">All Tasks</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content tab-content-list">
                                                <div class="tab-pane active" id="tab_completed">
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover table-list  dataTable no-footer" id="tblcompletedtasklist" style="margin: 0px 0!important;">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th> No. </th> -->
                                                                    <th>Title </th>
                                                                    <th>Client </th>
                                                                    <th>Due Date </th>
                                                                    <th>Assigned Date </th>
                                                                    <th>Assigned To </th>
                                                                    <th>Assigned By </th>
                                                                    <th>Status </th>
                                                                    <th>Priority </th>
                                                                    <th>Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td><a href="#">Team Formation</a></td>
                                                                <td><a href="#">Midas</a></td>
                                                                <td>13-Apr-2019</td>
                                                                <td>09-04-2019 02:34 PM</td>
                                                                <td>Pooja Bamane</td>
                                                                <td>Vinay Pagare (Admin)</td>
                                                                <td>Completed</td>
                                                                <td>High</td>
                                                                <td>
                                                                  <a href="#" title="Edit" class="datatable-links edit">
                                                                    <i class="fa fa-edit"></i>
                                                                  </a>
                                                                  <a href="#" title="Delete " class="datatable-links delete">
                                                                    <i class="fa fa-trash"></i>
                                                                  </a>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab_pending">
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover table-list  dataTable no-footer" id="tblpendingtasklist" style="margin: 0px 0!important;">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th> No. </th> -->
                                                                    <th>Title </th>
                                                                    <th>Client </th>
                                                                    <th>Due Date </th>
                                                                    <th>Assigned Date </th>
                                                                    <th>Assigned To </th>
                                                                    <th>Assigned By </th>
                                                                    <th>Status </th>
                                                                    <th>Priority </th>
                                                                    <th>Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td><a href="#">Team Formation</a></td>
                                                                <td><a href="#">Midas</a></td>
                                                                <td>13-Apr-2019</td>
                                                                <td>09-04-2019 02:34 PM</td>
                                                                <td>Pooja Bamane</td>
                                                                <td>Vinay Pagare (Admin)</td>
                                                                <td>Pending</td>
                                                                <td>High</td>
                                                                <td>
                                                                  <a href="#" title="Edit" class="datatable-links edit">
                                                                    <i class="fa fa-edit"></i>
                                                                  </a>
                                                                  <a href="#" title="Delete " class="datatable-links delete">
                                                                    <i class="fa fa-trash"></i>
                                                                  </a>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab_on_hold">
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover table-list  dataTable no-footer" id="tblonholdtasklist" style="margin: 0px 0!important;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title </th>
                                                                    <th>Client </th>
                                                                    <th>Due Date </th>
                                                                    <th>Assigned Date </th>
                                                                    <th>Assigned To </th>
                                                                    <th>Assigned By </th>
                                                                    <th>Status </th>
                                                                    <th>Priority </th>
                                                                    <th>Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td><a href="#">Team Formation</a></td>
                                                                <td><a href="#">Midas</a></td>
                                                                <td>13-Apr-2019</td>
                                                                <td>09-04-2019 02:34 PM</td>
                                                                <td>Pooja Bamane</td>
                                                                <td>Vinay Pagare (Admin)</td>
                                                                <td>On Hold</td>
                                                                <td>High</td>
                                                                <td>
                                                                  <a href="#" title="Edit" class="datatable-links edit">
                                                                    <i class="fa fa-edit"></i>
                                                                  </a>
                                                                  <a href="#" title="Delete " class="datatable-links delete">
                                                                    <i class="fa fa-trash"></i>
                                                                  </a>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab_review">
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover table-list  dataTable no-footer" id="tblreviewtasklist" style="margin: 0px 0!important;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title </th>
                                                                    <th>Client </th>
                                                                    <th>Due Date </th>
                                                                    <th>Assigned Date </th>
                                                                    <th>Assigned To </th>
                                                                    <th>Assigned By </th>
                                                                    <th>Status </th>
                                                                    <th>Priority </th>
                                                                    <th>Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td><a href="#">Team Formation</a></td>
                                                                <td><a href="#">Midas</a></td>
                                                                <td>13-Apr-2019</td>
                                                                <td>09-04-2019 02:34 PM</td>
                                                                <td>Pooja Bamane</td>
                                                                <td>Vinay Pagare (Admin)</td>
                                                                <td>Review</td>
                                                                <td>High</td>
                                                                <td>
                                                                  <a href="#" title="Edit" class="datatable-links edit">
                                                                    <i class="fa fa-edit"></i>
                                                                  </a>
                                                                  <a href="#" title="Delete " class="datatable-links delete">
                                                                    <i class="fa fa-trash"></i>
                                                                  </a>
                                                                </td> 
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab_all">
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover table-list  dataTable no-footer" id="tblalltasklist" style="margin: 0px 0!important;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title </th>
                                                                    <th>Client </th>
                                                                    <th>Due Date </th>
                                                                    <th>Assigned Date </th>
                                                                    <th>Assigned To </th>
                                                                    <th>Assigned By </th>
                                                                    <th>Status </th>
                                                                    <th>Priority </th>
                                                                    <th>Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td><a href="#">Team Formation</a></td>
                                                                <td><a href="#">Midas</a></td>
                                                                <td>13-Apr-2019</td>
                                                                <td>09-04-2019 02:34 PM</td>
                                                                <td>Pooja Bamane</td>
                                                                <td>Vinay Pagare (Admin)</td>
                                                                <td>Review</td>
                                                                <td>High</td>
                                                                <td>
                                                                  <a href="#" title="Edit" class="datatable-links edit">
                                                                    <i class="fa fa-edit"></i>
                                                                  </a>
                                                                  <a href="#" title="Delete " class="datatable-links delete">
                                                                    <i class="fa fa-trash"></i>
                                                                  </a>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="card">
                                        <div class="portlet light bordered mb-30 portlet-list">
                                              <div class="portlet-title portlet-sub portlet-container">
                                                  <div class="caption caption-details">
                                                      <i class="icon-bubble font-hide hide"></i>
                                                      <span class="caption-subject font-hide bold">Meeting</span>
                                                  </div>
                                              </div>
                                              <br>
                                              <div class="portlet-body portlet-followup" id="chats">
                                                  <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible1="1">
                                                    <ul class="follow-up-list">
                                                      <li>
                                                        <span class="manage-block">
                                                          <a href="#" class="follow-lead" title="Supplier Meeting">Supplier Meeting </a>
                                                          <span class="manage-block">
                                                            <a href="#" class="follow-lead follow-manageby meeting-host">Vinay Pagare (Admin)</a>
                                                            <span class="follow-date follow-up-manage-by meeting-status available">Available</span>
                                                            <div class="meeting-with">
                                                              <a href="#">Stanley</a>
                                                              <a href="#">Ankusk</a>
                                                              <a href="#">Pooja</a>
                                                              <a href="#">Pranali</a>
                                                            </div>
                                                            <div class="meeting-date-container">
                                                              <span class="follow-date follow-date-left">
                                                                11th Feb, 2019 11:00 AM - 11th Feb, 2019 01:00 PM
                                                              </span>
                                                            </div>
                                                          </span>
                                                          <div class="clearfix"></div>
                                                          <span class="datetime follow-up-button">
                                                            <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                          </span>
                                                        </span>
                                                      </li>

                                                      <li>
                                                        <span class="manage-block">
                                                          <a href="#" class="follow-lead" title="The Differentiators: Intention, Format and Participation Profile">The Differentiators: Intention, Format and Participation...</a>
                                                          <span class="manage-block">
                                                            <a href="#" class="follow-lead follow-manageby meeting-host">Vinay Pagare (Admin)</a>
                                                            <span class="follow-date follow-up-manage-by meeting-status busy">Busy</span>
                                                            <div class="meeting-with">
                                                              <a href="#">Stanley</a>
                                                            </div>
                                                            <div class="meeting-date-container">
                                                              <span class="follow-date follow-date-left">
                                                                11th Feb, 2019 11:00 AM - 11th Feb, 2019 01:00 PM
                                                              </span>
                                                            </div>
                                                          </span>
                                                          <div class="clearfix"></div>
                                                          <span class="datetime follow-up-button">
                                                            <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                          </span>
                                                        </span>
                                                      </li>
                                                      <li>
                                                        <span class="manage-block">
                                                          <a href="#" class="follow-lead" title="Supplier Meeting">Supplier Meeting </a>
                                                          <span class="manage-block">
                                                            <a href="#" class="follow-lead follow-manageby meeting-host">Vinay Pagare (Admin)</a>
                                                            <span class="follow-date follow-up-manage-by meeting-status available">Available</span>
                                                            <div class="meeting-with">
                                                              <a href="#">Stanley</a>
                                                              <a href="#">Ankusk</a>
                                                              <a href="#">Pooja</a>
                                                              <a href="#">Pranali</a>
                                                            </div>
                                                            <div class="meeting-date-container">
                                                              <span class="follow-date follow-date-left">
                                                                11th Feb, 2019 11:00 AM - 11th Feb, 2019 01:00 PM
                                                              </span>
                                                            </div>
                                                          </span>
                                                          <div class="clearfix"></div>
                                                          <span class="datetime follow-up-button">
                                                            <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                          </span>
                                                        </span>
                                                      </li>
                                                      <li>
                                                        <span class="manage-block">
                                                          <a href="#" class="follow-lead" title="Supplier Meeting">Supplier Meeting </a>
                                                          <span class="manage-block">
                                                            <a href="#" class="follow-lead follow-manageby meeting-host">Vinay Pagare (Admin)</a>
                                                            <span class="follow-date follow-up-manage-by meeting-status busy">Busy</span>
                                                            <div class="meeting-with">
                                                              <a href="#">Stanley</a>
                                                            </div>
                                                            <div class="meeting-date-container">
                                                              <span class="follow-date follow-date-left">
                                                                11th Feb, 2019 11:00 AM - 11th Feb, 2019 01:00 PM
                                                              </span>
                                                            </div>
                                                          </span>
                                                          <div class="clearfix"></div>
                                                          <span class="datetime follow-up-button">
                                                            <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                          </span>
                                                        </span>
                                                      </li>
                                                      <li>
                                                        <span class="manage-block">
                                                          <a href="#" class="follow-lead" title="Supplier Meeting">Supplier Meeting </a>
                                                          <span class="manage-block">
                                                            <a href="#" class="follow-lead follow-manageby meeting-host">Vinay Pagare (Admin)</a>
                                                            <span class="follow-date follow-up-manage-by meeting-status available">Available</span>
                                                            <div class="meeting-with">
                                                              <a href="#">Stanley</a>
                                                              <a href="#">Ankusk</a>
                                                              <a href="#">Pooja</a>
                                                              <a href="#">Pranali</a>
                                                            </div>
                                                            <div class="meeting-date-container">
                                                              <span class="follow-date follow-date-left">
                                                                11th Feb, 2019 11:00 AM - 11th Feb, 2019 01:00 PM
                                                              </span>
                                                            </div>
                                                          </span>
                                                          <div class="clearfix"></div>
                                                          <span class="datetime follow-up-button">
                                                            <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                          </span>
                                                        </span>
                                                      </li>
                                                    </ul>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="card">
                                        <div class="portlet light bordered mb-30 portlet-list">
                                              <div class="portlet-title portlet-sub portlet-container">
                                                  <div class="caption caption-details">
                                                      <i class="icon-bubble font-hide hide"></i>
                                                      <span class="caption-subject font-hide bold">Follow-Up</span>
                                                  </div>
                                              </div>
                                              <br>
                                              <div class="portlet-body portlet-followup" id="chats">
                                                  <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible1="1">
                                                    <ul class="follow-up-list">
                                                      <li>
                                                        <span class="manage-block">
                                                           <a href="#" class="follow-lead">Mr. Mehul Lunia</a>
                                                            <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                            <span class="manage-block">
                                                              <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                            <span class="follow-date follow-up-manage-by">Lead</span>
                                                            </span>
                                                            <span class="lead-body">
                                                              get update regarding project status
                                                            </span>
                                                          </span>
                                                        <div class="clearfix"></div>
                                                        <span class="datetime follow-up-button">
                                                            <a class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                            <a class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                            <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                          </span>
                                                      </li>

                                                      <li>
                                                        <span class="manage-block">
                                                           <a href="#" class="follow-lead">Mr. Mehul Lunia</a>
                                                            <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                            <span class="manage-block">
                                                              <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                            <span class="follow-date follow-up-manage-by">Lead</span>
                                                            </span>
                                                            <span class="lead-body">
                                                              get update regarding project status
                                                            </span>
                                                          </span>
                                                        <div class="clearfix"></div>
                                                        <span class="datetime follow-up-button">
                                                            <a class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                            <a class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                            <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                          </span>
                                                      </li>

                                                      <li>
                                                        <span class="manage-block">
                                                           <a href="#" class="follow-lead">Mr. Mehul Lunia</a>
                                                            <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                            <span class="manage-block">
                                                              <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                            <span class="follow-date follow-up-manage-by">Lead</span>
                                                            </span>
                                                            <span class="lead-body">
                                                              get update regarding project status
                                                            </span>
                                                          </span>
                                                        <div class="clearfix"></div>
                                                        <span class="datetime follow-up-button">
                                                            <a class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                            <a class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                            <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                          </span>
                                                      </li>

                                                      <li>
                                                        <span class="manage-block">
                                                           <a href="#" class="follow-lead">Mr. Mehul Lunia</a>
                                                            <span class="follow-date">11th Feb, 2019 10:50 AM</span>
                                                            <span class="manage-block">
                                                              <a href="#" class="follow-lead follow-manageby">Vinay Pagare (Admin)</a>
                                                            <span class="follow-date follow-up-manage-by">Lead</span>
                                                            </span>
                                                            <span class="lead-body">
                                                              get update regarding project status
                                                            </span>
                                                          </span>
                                                        <div class="clearfix"></div>
                                                        <span class="datetime follow-up-button">
                                                            <a class="" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                            <a class="" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                                            <a class="" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                          </span>
                                                      </li>
                                                    </ul>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="portlet_sales">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <h1 class="module-title">Follow-up</h1>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <!-- itemm 1 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <img src="<?php echo base_url() ?>assets/project/svg/calender-today.svg" style="width: 22px;">
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">Today</div>
                                                <div class="sales-follow-count">05</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>
                                    <!-- item 2 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <img src="<?php echo base_url() ?>assets/project/svg/calender-pending.svg" style="width: 22px;">
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">Due</div>
                                                <div class="sales-follow-count">20</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>
                                    <!-- item 3 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <img src="<?php echo base_url() ?>assets/project/svg/calender-week.svg" style="width: 22px;">
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">Upcoming</div>
                                                <div class="sales-follow-count">20</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>
                                    <!-- item 4 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <i class="fas fa-calendar-alt flat-green"></i>
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">All</div>
                                                <div class="sales-follow-count">20</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>
                                  </div>

                                  <div class="row mt-20">
                                    <div class="col-md-12">
                                      <h1 class="module-title">Lead</h1>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <!-- itemm 1 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <img src="<?php echo base_url() ?>assets/project/svg/pending-lead.svg" style="width: 22px;">
                                                <!-- <i class="fas fa-history"></i> -->
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">Pending</div>
                                                <div class="sales-follow-count">20</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>
                                    <!-- item 2 -->
                                     <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <i class="fas fa-spinner flat-green"></i>
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">On Going</div>
                                                <div class="sales-follow-count">05</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>

                                    <!-- item 3 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <i class="fas fa-thumbs-down flat-red"></i>
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">Rejected</div>
                                                <div class="sales-follow-count">05</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>
                                    
                                    <!-- item 4 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <i class="fas fa-history flat-purple"></i>
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">All</div>
                                                <div class="sales-follow-count">05</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>

                                  </div>
                                  

                                  <div class="row">
                                    <div class="col-md-12">
                                      <h1 class="module-title">Quotation</h1>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <!-- itemm 1 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <!-- <i class="fas fa-users icon-campaign"></i> -->
                                                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="file-edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-file-edit fa-w-12" width="22px"><path fill="#5867dd" d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zm-22.6 22.7c2.1 2.1 3.5 4.6 4.2 7.4H256V32.5c2.8.7 5.3 2.1 7.4 4.2l83.9 83.9zM336 480H48c-8.8 0-16-7.2-16-16V48c0-8.8 7.2-16 16-16h176v104c0 13.3 10.7 24 24 24h104v304c0 8.8-7.2 16-16 16zM219.2 247.2l29.6 29.6c1.8 1.8 1.8 4.6 0 6.4L136.4 395.6l-30.1 4.3c-5.9.8-11-4.2-10.2-10.2l4.3-30.1 112.4-112.4c1.8-1.8 4.6-1.8 6.4 0zm64.4 1.2l-16.4 16.4c-1.8 1.8-4.6 1.8-6.4 0l-29.6-29.6c-1.8-1.8-1.8-4.6 0-6.4l16.4-16.4c5.9-5.9 15.4-5.9 21.2 0l14.8 14.8c5.9 5.8 5.9 15.3 0 21.2z" class=""></path></svg>
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">Draft</div>
                                                <div class="sales-follow-count">05</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>
                                    <!-- item 2 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <!-- <i class="fas fa-users icon-campaign"></i> -->
                                                <i class="far fa-envelope flat-yellow"></i>
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">Submitted</div>
                                                <div class="sales-follow-count">05</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>

                                    <!-- item 3 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <i class="far fa-check-circle flat-green"></i>
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">Approved</div>
                                                <div class="sales-follow-count">05</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>
                                    <!-- item 4 -->
                                    <div class="col-md-3 col-sm-6">
                                      <a href="#" class="dashboard-container">
                                        <div class="dashboard-wrapper">
                                          <div class="dashboard-body">
                                            <div class="d-flex align-items-center">
                                              <div class="icon-span">
                                                <i class="fas fa-mail-bulk flat-pink"></i>
                                              </div>
                                              <div class="ml-3">
                                                <div class="sales-follow-title">All</div>
                                                <div class="sales-follow-count">05</div>
                                              </div>
                                            </div>
                                            <span class="sales-counter">20</span>
                                          </div>
                                        </div>
                                      </a>
                                    </div>

                                  </div>

                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="portlet_finance">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="col-md-9">
                                    <div class="row">
                                      <div class="">
                                        <div class="col-md-12 finance-wrapper">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <h1 class="finance-title">Invoice</h1>
                                            </div>
                                            <div class="col-md-4">
                                              
                                                <div class="invoice-content-wrapper">
                                                  <span class="icon-start">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="file-exclamation" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-file-exclamation fa-w-12" width="32px"><path fill="#fc4e4efa" d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zm-22.6 22.7c2.1 2.1 3.5 4.6 4.2 7.4H256V32.5c2.8.7 5.3 2.1 7.4 4.2l83.9 83.9zM336 480H48c-8.8 0-16-7.2-16-16V48c0-8.8 7.2-16 16-16h176v104c0 13.3 10.7 24 24 24h104v304c0 8.8-7.2 16-16 16zM180.7 192h22.6c6.9 0 12.4 5.8 12 12.7l-6.7 120c-.4 6.4-5.6 11.3-12 11.3h-9.3c-6.4 0-11.6-5-12-11.3l-6.7-120c-.3-6.9 5.2-12.7 12.1-12.7zM220 384c0 15.5-12.5 28-28 28s-28-12.5-28-28 12.5-28 28-28 28 12.5 28 28z" class=""></path></svg>
                                                  </span>
                                                  <div class="finance-media">
                                                    <!-- <p class="module-sub-count">20</p> -->
                                                    <p class="finance-title-text">Pending</p>
                                                    <h4>8,000</h4>
                                                  </div>
                                                </div> 
                                              
                                            </div>
                                            <div class="col-md-4">
                                              
                                                <div class="invoice-content-wrapper">
                                                  <span class="icon-start">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="file-check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-file-check fa-w-12" width="32px"><path fill="#1dc9b7" d="M369.941 97.941l-83.882-83.882A48 48 0 0 0 252.118 0H48C21.49 0 0 21.49 0 48v416c0 26.51 21.49 48 48 48h288c26.51 0 48-21.49 48-48V131.882a48 48 0 0 0-14.059-33.941zm-22.627 22.628a15.89 15.89 0 0 1 4.195 7.431H256V32.491a15.88 15.88 0 0 1 7.431 4.195l83.883 83.883zM336 480H48c-8.837 0-16-7.163-16-16V48c0-8.837 7.163-16 16-16h176v104c0 13.255 10.745 24 24 24h104v304c0 8.837-7.163 16-16 16zm-34.467-210.949l-134.791 133.71c-4.7 4.663-12.288 4.642-16.963-.046l-67.358-67.552c-4.683-4.697-4.672-12.301.024-16.985l8.505-8.48c4.697-4.683 12.301-4.672 16.984.024l50.442 50.587 117.782-116.837c4.709-4.671 12.313-4.641 16.985.068l8.458 8.527c4.672 4.709 4.641 12.313-.068 16.984z" class=""></path></svg>
                                                  </span>
                                                  <div class="finance-media">
                                                    <!-- <p class="module-sub-count">20</p> -->
                                                    <p class="finance-title-text">Paid</p>
                                                    <h4>8,000</h4>
                                                  </div>
                                                </div> 
                                              
                                            </div>
                                            <div class="col-md-4">
                                              
                                                <div class="invoice-content-wrapper invoice-content-last-wrapper">
                                                  <span class="icon-start">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14" width="32px"><path fill="#ffb822" d="M433.941 65.941l-51.882-51.882A48 48 0 0 0 348.118 0H176c-26.51 0-48 21.49-48 48v48H48c-26.51 0-48 21.49-48 48v320c0 26.51 21.49 48 48 48h224c26.51 0 48-21.49 48-48v-48h80c26.51 0 48-21.49 48-48V99.882a48 48 0 0 0-14.059-33.941zM352 32.491a15.88 15.88 0 0 1 7.431 4.195l51.882 51.883A15.885 15.885 0 0 1 415.508 96H352V32.491zM288 464c0 8.822-7.178 16-16 16H48c-8.822 0-16-7.178-16-16V144c0-8.822 7.178-16 16-16h80v240c0 26.51 21.49 48 48 48h112v48zm128-96c0 8.822-7.178 16-16 16H176c-8.822 0-16-7.178-16-16V48c0-8.822 7.178-16 16-16h144v72c0 13.2 10.8 24 24 24h72v240z" class=""></path></svg>
                                                  </span>
                                                  <div class="finance-media">
                                                    <!-- <p class="module-sub-count">20</p> -->
                                                    <p class="finance-title-text">All</p>
                                                    <h4>8,000</h4>
                                                  </div>
                                                </div> 
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="">
                                        <div class="col-md-12 finance-wrapper">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <h1 class="finance-title">Payment</h1>
                                            </div>
                                            <div class="col-md-4">
                                              
                                                <div class="invoice-content-wrapper">
                                                  <span class="icon-start">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-exclamation-square fa-w-14" width="32px"><path fill="#fc4e4efa" d="M219.5 320h9c6.4 0 11.7-5.1 12-11.5l7-168c.3-6.8-5.2-12.5-12-12.5h-23c-6.8 0-12.3 5.7-12 12.5l7 168c.3 6.4 5.6 11.5 12 11.5zM400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm16 400c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V80c0-8.8 7.2-16 16-16h352c8.8 0 16 7.2 16 16zm-192-92c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28z" class=""></path></svg>
                                                  </span>
                                                  <div class="finance-media">
                                                    <!-- <p class="module-sub-count">20</p> -->
                                                    <p class="finance-title-text">Pending</p>
                                                    <h4>8,000</h4>
                                                  </div>
                                                </div> 
                                              
                                            </div>
                                            <div class="col-md-4">
                                              
                                                <div class="invoice-content-wrapper">
                                                  <span class="icon-start">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="vote-yea" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-vote-yea fa-w-20" width="32px"><path fill="#1dc9b7" d="M608 320h-64v64h22.4c5.3 0 9.6 3.6 9.6 8v16c0 4.4-4.3 8-9.6 8H73.6c-5.3 0-9.6-3.6-9.6-8v-16c0-4.4 4.3-8 9.6-8H96v-64H32c-17.7 0-32 14.3-32 32v96c0 17.7 14.3 32 32 32h576c17.7 0 32-14.3 32-32v-96c0-17.7-14.3-32-32-32zm-96 64V64.3c0-17.9-14.5-32.3-32.3-32.3H160.4C142.5 32 128 46.5 128 64.3V384h384zM211.2 202l25.5-25.3c4.2-4.2 11-4.2 15.2.1l41.3 41.6 95.2-94.4c4.2-4.2 11-4.2 15.2.1l25.3 25.5c4.2 4.2 4.2 11-.1 15.2L300.5 292c-4.2 4.2-11 4.2-15.2-.1l-74.1-74.7c-4.3-4.2-4.2-11 0-15.2z" class=""></path></svg>
                                                  </span>
                                                  <div class="finance-media">
                                                    <!-- <p class="module-sub-count">20</p> -->
                                                    <p class="finance-title-text">Paid</p>
                                                    <h4>8,000</h4>
                                                  </div>
                                                </div> 
                                              
                                            </div>
                                            <div class="col-md-4">
                                              
                                                <div class="invoice-content-wrapper invoice-content-last-wrapper">
                                                  <span class="icon-start">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="receipt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-receipt fa-w-14" width="32px"><path fill="#ff9c22" d="M344 240H104c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h240c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm0 96H104c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h240c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM418.1 0c-5.8 0-11.8 1.8-17.3 5.7L357.3 37 318.7 9.2c-8.4-6-18.2-9.1-28.1-9.1-9.8 0-19.6 3-28 9.1L224 37 185.4 9.2C177 3.2 167.1.1 157.3.1s-19.6 3-28 9.1L90.7 37 47.2 5.7C41.8 1.8 35.8 0 29.9 0 14.4.1 0 12.3 0 29.9v452.3C0 499.5 14.3 512 29.9 512c5.8 0 11.8-1.8 17.3-5.7L90.7 475l38.6 27.8c8.4 6 18.2 9.1 28.1 9.1 9.8 0 19.6-3 28-9.1L224 475l38.6 27.8c8.4 6 18.3 9.1 28.1 9.1s19.6-3 28-9.1l38.6-27.8 43.5 31.3c5.4 3.9 11.4 5.7 17.3 5.7 15.5 0 29.8-12.2 29.8-29.8V29.9C448 12.5 433.7 0 418.1 0zM416 477.8L376 449l-18.7-13.5-18.7 13.5-38.6 27.8c-2.8 2-6 3-9.3 3-3.4 0-6.6-1.1-9.4-3.1L242.7 449 224 435.5 205.3 449l-38.6 27.8c-2.8 2-6 3-9.4 3-3.4 0-6.6-1.1-9.4-3.1L109.3 449l-18.7-13.5L72 449l-40 29.4V34.2L72 63l18.7 13.5L109.4 63 148 35.2c2.8-2 6-3 9.3-3 3.4 0 6.6 1.1 9.4 3.1L205.3 63 224 76.5 242.7 63l38.6-27.8c2.8-2 6-3 9.4-3 3.4 0 6.6 1.1 9.4 3.1L338.7 63l18.7 13.5L376 63l40-28.8v443.6zM344 144H104c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h240c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8z" class=""></path></svg>
                                                  </span>
                                                  <div class="finance-media">
                                                    <!-- <p class="module-sub-count">20</p> -->
                                                    <p class="finance-title-text">All</p>
                                                    <h4>8,000</h4>
                                                  </div>
                                                </div> 
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="">
                                        <div class="col-md-12 finance-wrapper">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <h1 class="finance-title">Outstanding</h1>
                                            </div>
                                            <div class="col-md-4">
                                              
                                                <div class="invoice-content-wrapper">
                                                  <span class="icon-start">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="file-invoice-dollar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-file-invoice-dollar fa-w-12" width="32px"><path fill="#ff9c22" d="M219.09 327.42l-45-13.5c-5.16-1.55-8.77-6.78-8.77-12.73 0-7.27 5.3-13.19 11.8-13.19h28.11c4.56 0 8.96 1.29 12.82 3.72 3.24 2.03 7.36 1.91 10.13-.73l11.75-11.21c3.53-3.37 3.33-9.21-.57-12.14-9.1-6.83-20.08-10.77-31.37-11.35V232c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v24.12c-23.62.63-42.67 20.55-42.67 45.07 0 19.97 12.98 37.81 31.58 43.39l45 13.5c5.16 1.55 8.77 6.78 8.77 12.73 0 7.27-5.3 13.19-11.8 13.19h-28.11c-4.56 0-8.96-1.29-12.82-3.72-3.24-2.03-7.36-1.91-10.13.73l-11.75 11.21c-3.53 3.37-3.33 9.21.57 12.14 9.1 6.83 20.08 10.77 31.37 11.35V440c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-24.12c23.62-.63 42.67-20.54 42.67-45.07 0-19.97-12.98-37.81-31.58-43.39zM72 96h112c4.42 0 8-3.58 8-8V72c0-4.42-3.58-8-8-8H72c-4.42 0-8 3.58-8 8v16c0 4.42 3.58 8 8 8zm120 56v-16c0-4.42-3.58-8-8-8H72c-4.42 0-8 3.58-8 8v16c0 4.42 3.58 8 8 8h112c4.42 0 8-3.58 8-8zm177.9-54.02L286.02 14.1c-9-9-21.2-14.1-33.89-14.1H47.99C21.5.1 0 21.6 0 48.09v415.92C0 490.5 21.5 512 47.99 512h288.02c26.49 0 47.99-21.5 47.99-47.99V131.97c0-12.69-5.1-24.99-14.1-33.99zM256.03 32.59c2.8.7 5.3 2.1 7.4 4.2l83.88 83.88c2.1 2.1 3.5 4.6 4.2 7.4h-95.48V32.59zm95.98 431.42c0 8.8-7.2 16-16 16H47.99c-8.8 0-16-7.2-16-16V48.09c0-8.8 7.2-16.09 16-16.09h176.04v104.07c0 13.3 10.7 23.93 24 23.93h103.98v304.01z" class=""></path></svg>
                                                  </span>
                                                  <div class="finance-media">
                                                    <!-- <p class="module-sub-count">20</p> -->
                                                    <p class="finance-title-text">Pending Bills</p>
                                                    <h4>8,000</h4>
                                                  </div>
                                                </div> 
                                              
                                            </div>
                                            <div class="col-md-4">
                                              
                                                <div class="invoice-content-wrapper">
                                                  <span class="icon-start">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="address-card" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-address-card fa-w-18" width="32px"><path fill="#5867dd" d="M512 32H64C28.7 32 0 60.7 0 96v320c0 35.3 28.7 64 64 64h448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64zm32 384c0 17.6-14.4 32-32 32H64c-17.6 0-32-14.4-32-32V96c0-17.6 14.4-32 32-32h448c17.6 0 32 14.4 32 32v320zm-72-128H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm0-64H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm0-64H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM208 288c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm46.8 144c-19.5 0-24.4 7-46.8 7s-27.3-7-46.8-7c-21.2 0-41.8 9.4-53.8 27.4C100.2 342.1 96 355 96 368.9V392c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-23.1c0-7 2.1-13.8 6-19.6 5.6-8.3 15.8-13.2 27.3-13.2 12.4 0 20.8 7 46.8 7 25.9 0 34.3-7 46.8-7 11.5 0 21.7 5 27.3 13.2 3.9 5.8 6 12.6 6 19.6V392c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-23.1c0-13.9-4.2-26.8-11.4-37.5-12.3-18-32.9-27.4-54-27.4z" class=""></path></svg>
                                                  </span>
                                                  <div class="finance-media">
                                                    <!-- <p class="module-sub-count">20</p> -->
                                                    <p class="finance-title-text">Outstanding Amount</p>
                                                    <h4>8,000</h4>
                                                  </div>
                                                </div> 
                                              
                                            </div>
                                            <div class="col-md-4">
                                              
                                                <div class="invoice-content-wrapper invoice-content-last-wrapper">
                                                  <span class="icon-start">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="clipboard-list-check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-clipboard-list-check fa-w-12" width="32px"><path fill="#fc4e4efa" d="M336 64h-88.6c.4-2.6.6-5.3.6-8 0-30.9-25.1-56-56-56s-56 25.1-56 56c0 2.7.2 5.4.6 8H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM192 32c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm160 432c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16h48v20c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12V96h48c8.8 0 16 7.2 16 16v352zM112 328c-13.3 0-24 10.7-24 24s10.7 24 24 24 24-10.7 24-24-10.7-24-24-24zm168 8H168c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm-153.8-65.6l64.2-63.6c2.1-2.1 2.1-5.5 0-7.6l-12.6-12.7c-2.1-2.1-5.5-2.1-7.6 0l-47.6 47.2-20.6-20.9c-2.1-2.1-5.5-2.1-7.6 0l-12.7 12.6c-2.1 2.1-2.1 5.5 0 7.6l37.1 37.4c1.9 2.1 5.3 2.1 7.4 0zM280 240h-77.6l-32.3 32H280c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8z" class=""></path></svg>
                                                  </span>
                                                  <div class="finance-media">
                                                    <!-- <p class="module-sub-count">20</p> -->
                                                    <p class="finance-title-text">Due Amount</p>
                                                    <h4>8,000</h4>
                                                  </div>
                                                </div> 
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="row">
                                      <div class="col-md-12 col-sm-6">
                                        <a href="#">
                                          <div class="group-wrapper">
                                            <div class="group-body group-body-aqua">
                                              <p>GST Amount</p>
                                              <h1>50,00,000</h1>
                                            </div>
                                            
                                          </div>
                                        </a>
                                      </div>
                                      <div class="col-md-12 col-sm-6">
                                        <a href="#">
                                          <div class="group-wrapper">
                                            <div class="group-body group-body-black">
                                              <p>TDS Amount</p>
                                              <h1>50,00,000</h1>
                                            </div>
                                          </div>
                                        </a>
                                      </div>
                                  </div>

                                  </div>

                                  
                                </div>
                              </div>
                            </div>

                            
                            <div class="tab-pane" id="portlet_company_people">
                              <div class="row">
                                <div class="col-md-12">
                                  <section class="panel">
                                    <div class="">
                                     <div class="portlet light bordered">
                                          <div class="portlet-title portlet-compay-people">
                                            <div class="caption font-dark">
                                              <!-- <i class="icon-settings font-dark"></i> -->
                                              <span class="list-title-caption caption-subject bold ">Company People List</span>
                                              <div class="btn-group">
                                                <?php if($add_access){ ?>
                                                <a  href="<?php echo base_url('company-people-add-'.$companydata->cmp_id_encrypt.'-'.$companydata->cmp_name_encrypt.'-company') ?>" title="Add company people" class="btn green btn-add-new">
                                                  <i  class="fa fa-plus"  title="Add"></i> Add</a>
                                              </div>

                                              <div class="btn-group">
                                                <a  href="<?php echo base_url('company-add') ?>" title="Add company" class="btn green btn-add-new">
                                                  <i  class="fa fa-plus"  title="Add"></i> Company </a>
                                                <?php } ?>
                                              </div>

                                            </div>
                                            <div class="tools">
                                            </div>
                                          </div>
                                          <div class="portlet-body">
                                            <div class="table-responsive">
                                              <table class="table table-striped table-bordered table-hover table-list" id="company_people_tbl">
                                                <thead>
                                                  <tr>
                                                    <th>Name </th>
                                                    <th>Email</th>
                                                    <th>Mobile No</th>
                                                    <th>Designation</th>
                                                    <th>Met On</th>
                                                    <th>Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody></tbody>
                                              </table>
                                            </div>

                                          </div>
                                       </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </div>

                            <div class="tab-pane" id="portlet_activity">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="portlet light bordered portlet-container portlet-activity">
                                    <div class="portlet-title">
                                      <div class="caption">
                                          <i class="icon-share font-dark hide"></i>
                                          <span class="caption-subject bold">Recent Activities</span>
                                      </div>
                                      <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green btn-add-new pull-right" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter By
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <a href="javascript:;" class="btn-check-reload pull-right" data-toggle="tooltip" data-original-title="Reload">
                                              <i class="fas fa-sync-alt"></i>
                                            </a>

                                            <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                               <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" checked="" /> All
                                                    <span></span>
                                                </label>
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" /> People
                                                    <span></span>
                                                </label>
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" /> Quotation
                                                    <span></span>
                                                </label>
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" /> Invoice
                                                    <span></span>
                                                </label>
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" /> Follow-up
                                                    <span></span>
                                                </label>
                                                 <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" data-filter="filter_all" class="filter-check filter_all_checkbox" /> Lead
                                                    <span></span>
                                                </label>
                                              
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="portlet-body" tabindex="-1">
                                      <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0" >
                                        <div class="recent-activity-log">
                                          <div class="activity-list">
                                            <div class="activity-item">
                                              <div class="activity-content filter_all">
                                                <span class="activity-main-text">
                                                  <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Approval status</span> from <span class="activity-start-status">Rejected</span> to <span class="activity-end-status">Draft</span>
                                                </span>
                                                <span class="activity-time"> 2 months ago</span>
                                              </div>
                                            </div>

                                            <div class="activity-item">
                                              <div class="activity-content filter_all">
                                                <span class="activity-main-text">
                                                  <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Approval status</span> from <span class="activity-start-status">Rejected</span> to <span class="activity-end-status">Draft</span>
                                                </span>
                                                <span class="activity-time"> 2 months ago</span>
                                              </div>
                                            </div>

                                            <div class="activity-item">
                                              <div class="activity-content filter_all">
                                                <span class="activity-main-text">
                                                  <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Approval status</span> from <span class="activity-start-status">Rejected</span> to <span class="activity-end-status">Draft</span>
                                                </span>
                                                <span class="activity-time"> 2 months ago</span>
                                              </div>
                                            </div>


                                            <div class="activity-item">
                                              <div class="activity-content filter_all">
                                                <span class="activity-main-text">
                                                  <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Approval status</span> from <span class="activity-start-status">Rejected</span> to <span class="activity-end-status">Draft</span>
                                                </span>
                                                <span class="activity-time"> 2 months ago</span>
                                              </div>
                                            </div>

                                            <div class="activity-item">
                                              <div class="activity-content filter_all">
                                                <span class="activity-main-text">
                                                  <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Approval status</span> from <span class="activity-start-status">Rejected</span> to <span class="activity-end-status">Draft</span>
                                                </span>
                                                <span class="activity-time"> 2 months ago</span>
                                              </div>
                                            </div>

                                            <div class="activity-item">
                                              <div class="activity-content filter_all">
                                                <span class="activity-main-text">
                                                  <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Approval status</span> from <span class="activity-start-status">Rejected</span> to <span class="activity-end-status">Draft</span>
                                                </span>
                                                <span class="activity-time"> 2 months ago</span>
                                              </div>
                                            </div>

                                            <div class="activity-item">
                                              <div class="activity-content filter_all">
                                                <span class="activity-main-text">
                                                  <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Approval status</span> from <span class="activity-start-status">Rejected</span> to <span class="activity-end-status">Draft</span>
                                                </span>
                                                <span class="activity-time"> 2 months ago</span>
                                              </div>
                                            </div>


                                            <div class="activity-item">
                                              <div class="activity-content filter_all">
                                                <span class="activity-main-text">
                                                  <a href="#" class="activity-user">Suraj</a> changed <span class="activity-status">Approval status</span> from <span class="activity-start-status">Rejected</span> to <span class="activity-end-status">Draft</span>
                                                </span>
                                                <span class="activity-time"> 2 months ago</span>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </aside>
                <!-- MAIN CONTENTS END HERE -->
              </div>
            </div>
          </div>
          <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
      </div>

      <!-- Add Event people add -->


      <!-- Add Event people edit -->

      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      </div>
        <script type="text/javascript">

      $(document).ready(function()
      {
        var primary_key     = 'cmp_id';
        var updateUrl       = baseUrl + 'company/updateCompanyCustomData';
        
        var editableElement = '.company-managedby-editable';
        var select2Class    = 'company_managedby_select2';
        var dropdownUrl     = 'company/getEmployeeforDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
        
        var editableElement = '.company-state-editable';
        var select2Class    = 'company_state_select2';
        var dropdownUrl     = 'company/getStateDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
        
        var editableElement = '.company-industry-editable';
        var select2Class    = 'company_industry_select2';
        var dropdownUrl     = 'company/getIndustryDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
        
        var editableElement = '.company-revenue-editable';
        var select2Class    = 'company_revenue_select2';
        var dropdownUrl     = 'company/getCompanyAnnualDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
        
        var editableElement = '.company-type-editable';
        var select2Class    = 'company_type_select2';
        var dropdownUrl     = 'company/getCompanyTypeDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
        
        var editableElement = '.company-company-type-editable';
        var select2Class    = 'company_cmp_type_select2';
        var dropdownUrl     = 'company/getCmpTypeDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

        getcmpList();
       



      });
      $('.date-range-picker-div').click(function(){
        updateDateFilter($(this),function(start_date,end_date){
          // getDataTableList(start_date,end_date);
          // getOutstandingBalanceData(start_date,end_date);
        });
      });
      $('#daterangepicker-custom-range').on('apply.daterangepicker', function(ev, picker) {
        updateDateFilter($('#daterangepicker-custom-range'),function(start_date,end_date){
          // getDataTableList(start_date,end_date);
          // getOutstandingBalanceData(start_date,end_date);
        });
      });

      function getcmpList()
      {
        cmpDataTable = $('#company_people_tbl').DataTable({
          'ajax'      : baseUrl + 'company-people-list-<?php echo $this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_id); ?>',
          'columns'   : [
            {   'data'  : 'cpl_ppl_name' ,
              'render': function(data, type, row, meta)
              {

                var link = row.cpl_ppl_name;

                if(row.private_access == 0)
                  return link;

                <?php if($detail_access) { ?>
                    link =`<a href="`+baseUrl+`people-details-`+row.cpl_ppl_id_encrypt+`"> `+data+`</a>
                    `;
                <?php }?>
              return link;
              }
            },
            {   'data'  : 'cpl_ppl_email' },
            {   'data'  : 'cpl_ppl_mobile' },
            {   'data'  : 'cpl_designation' },
            {   'data'  : 'cpl_met_on' },
            {   'data'  : 'led_id' ,
              'render': function(data, type, row, meta)
              {
                // <a onclick="return deleteUser('`+row.cpl_ppl_id+`')">
                //  <i  class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>

                var link = ``;

                if(row.private_access == 0)
                  return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                <?php if($edit_access) { ?>
                  link += `
                    <a href="`+baseUrl+`company-people-edit-`+row.cpl_id_encrypt+`-`+row.cpl_cmp_id_encrypt+`" title="View Detail">
                    <i  class="fa fa-edit" aria-hidden="true" title="Edit Company"></i></a>`;

                <?php }?>

                return link;
              }
            }
          ]
        });
      }

    </script>

    <script type="text/javascript">
      $(document).ready(function(){
       
      });
      function deleteUser(evt_id)
      {
        var type = '2';
        swal({
           title:"Delete",
           text:"Are you sure",
           type: "error",
           icon:"error",
           button: true,
        }).then(()=>{
        $.ajax({
          type: "POST",
          url: "Event/deleteEvent",
          data:{evt_id:evt_id,type:type},
          dataType:"json",
          success:function(response)
          {
            location.reload();
          }
          });
        });
      }

	    $('.delete-image').click(function()
      {
        var cmp_logo  = $(this).data('image_name');
        var cmp_id = $(this).data('image_id');
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Logo",
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
              cmp_logo:cmp_logo,
              cmp_id:cmp_id
            },
            console.log(data);
            $.ajax({
                  type:"POST",
                  dataType:"JSON",
                  data:data,
                  url:baseUrl+'company/deleteCompLogo',
                  success:function(response)
                  {
                      if (response.success == true)
                      {
                           swal(
                          {
                              title: "Done",
                              text: response.message,
                              type: "success",
                              icon: "success",
                              button: true,
                          })
                          setTimeout(function(){
                            location.reload();
                          }, 1000);
                      }
                      else
                      {
                          swal(
                          {
                              title: "Opps",
                              text: response.message,
                              type: "error",
                              icon: "error",
                              button: true,
                          });
                      }
                  }
              });
            } else {
              swal("Cancelled", "Logo is safe :)", "error");
            }
          });
        });

        function deleteCompany(cmp_id)
        {
          cswal({
            text : 'Do you want to delete this Company?', 
            title   : 'Done', 
            type    : 'delete', 
            onyes : function(){
              $.ajax({
                type: "POST",
                url: baseUrl + "company/company_delete/"+cmp_id,
                success: function(response) {
                  response = JSON.parse(response);
                  if(response.success == true) {
                    swal({
                      title: "Done",
                      text: response.message,
                      type: "success",
                      icon: "success",
                      button: true,
                    })
                  } else {
                    swal({
                      title: "Opps",
                      text: "Something Went wrong",
                      type: "error",
                      icon: "error",
                      button: true,
                    });
                  }
                  location.href = response.linkn;
                }
              });
            }
          });
        }

        function getcmpList()
          {
            var customDataTableElement = '#company_people_tbl';
            $(customDataTableElement).DataTable().destroy();
            var customDataTableCount   = '<?php echo $peopleDataTableData->table_data_count; ?>';
            var customDataTableServer  =  <?php echo $peopleDataTableData->table_server_status; ?>;
            var customDataTableUrl     =  baseUrl + 'company-people-list-<?php echo $this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_id); ?>?table_data_count='+customDataTableCount;
            var customDataTableColumns = [
                {   'data'  : 'cpl_ppl_name' ,
                  'render': function(data, type, row, meta)
                  {
                    var link = row.cpl_ppl_name;

                    if(row.private_access == 0)
                      return link;

                    <?php if($detail_access) { ?>
                        link = `<a href="`+baseUrl+`people-details-`+row.cpl_ppl_id_encrypt+`"> `+data+`</a>`;
                    <?php }?>
                  return link;
                  }
                },
                {   'data'  : 'cpl_ppl_email' },
                {   'data'  : 'cpl_ppl_mobile' },
                {   'data'  : 'cpl_designation' },
                {   'data'  : 'cpl_met_on' },
                {   'data'  : 'led_id' ,
                  'render': function(data, type, row, meta)
                  {
                      
                        // <a onclick="return deleteUser('`+row.cpl_ppl_id+`')">
                        //  <i  class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>


                    var link = ``;

                    if(row.private_access == 0)
                      return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                    <?php if($edit_access) { ?>
                      link += `
                        <a href="`+baseUrl+`company-people-edit-`+row.cpl_id_encrypt+`-`+row.cpl_cmp_id_encrypt+`" title="View Detail" >
                        <i  class="fa fa-edit" aria-hidden="true" title="Edit Company People"></i></a>`;

                    <?php }?>

                    <?php if($delete_access) { ?>
                      link += ' <a onclick="deletePeopleCompany(\''+row.cpl_id_encrypt+'\')" title="Delete Company" ><i class="fa fa-trash" aria-hidden="true"></i></a>';

                    <?php }?>

                    return link;
                  }
                }
              ];

            // customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
            customDatatablex({
              element: customDataTableElement,
              url: customDataTableUrl,
              columns: customDataTableColumns,
              buttons : true,
              serverSide : customDataTableServer,
              delay : 1000,
              optParam : {
                <?php
                  if($export_access)
                    echo 'exportAccess : true,';
                  if($print_access)
                    echo 'printAccess : true,';
                ?>
              }
            });
          }


        $(document).ready(function(){
          getcmpList();

          // getList();
          $('#tblcompletedtasklist').dataTable({
              "language": {
                  "aria": {
                      "sortAscending": ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  },
                  "emptyTable": "No data available in table",
                  "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                  "infoEmpty": "No entries found",
                  "infoFiltered": "(filtered1 from _MAX_ total entries)",
                  "lengthMenu": "_MENU_ entries",
                  "search": "Search:",
                  "zeroRecords": "No matching records found"
              },
              buttons: [
                  { extend: 'print', className: 'btn dark btn-outline' },
                  { extend: 'copy', className: 'btn red btn-outline' },
                  // { extend: 'pdf', className: 'btn green btn-outline' },
                  { extend: 'excel', className: 'btn yellow btn-outline ' },
                  // { extend: 'csv', className: 'btn purple btn-outline ' },
                  { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
              ],

              responsive: false,
              "order": [

              ],

              "lengthMenu": [
                  [100,200,-1],
                  [100,200,"All"] // change per page values here
              ],
              // set the initial value
              "pageLength": 100,

              "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
          });

           $('#tblpendingtasklist').dataTable({
              "language": {
                  "aria": {
                      "sortAscending": ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  },
                  "emptyTable": "No data available in table",
                  "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                  "infoEmpty": "No entries found",
                  "infoFiltered": "(filtered1 from _MAX_ total entries)",
                  "lengthMenu": "_MENU_ entries",
                  "search": "Search:",
                  "zeroRecords": "No matching records found"
              },
              buttons: [
                  { extend: 'print', className: 'btn dark btn-outline' },
                  { extend: 'copy', className: 'btn red btn-outline' },
                  // { extend: 'pdf', className: 'btn green btn-outline' },
                  { extend: 'excel', className: 'btn yellow btn-outline ' },
                  // { extend: 'csv', className: 'btn purple btn-outline ' },
                  { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
              ],

              responsive: false,
              "order": [

              ],

              "lengthMenu": [
                  [100,200,-1],
                  [100,200,"All"] // change per page values here
              ],
              // set the initial value
              "pageLength": 100,

              "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
          });

          $('#tblonholdtasklist').dataTable({
              "language": {
                  "aria": {
                      "sortAscending": ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  },
                  "emptyTable": "No data available in table",
                  "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                  "infoEmpty": "No entries found",
                  "infoFiltered": "(filtered1 from _MAX_ total entries)",
                  "lengthMenu": "_MENU_ entries",
                  "search": "Search:",
                  "zeroRecords": "No matching records found"
              },
              buttons: [
                  { extend: 'print', className: 'btn dark btn-outline' },
                  { extend: 'copy', className: 'btn red btn-outline' },
                  // { extend: 'pdf', className: 'btn green btn-outline' },
                  { extend: 'excel', className: 'btn yellow btn-outline ' },
                  // { extend: 'csv', className: 'btn purple btn-outline ' },
                  { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
              ],

              responsive: false,
              "order": [

              ],

              "lengthMenu": [
                  [100,200,-1],
                  [100,200,"All"] // change per page values here
              ],
              // set the initial value
              "pageLength": 100,

              "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
          });

          $('#tblreviewtasklist').dataTable({
              "language": {
                  "aria": {
                      "sortAscending": ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  },
                  "emptyTable": "No data available in table",
                  "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                  "infoEmpty": "No entries found",
                  "infoFiltered": "(filtered1 from _MAX_ total entries)",
                  "lengthMenu": "_MENU_ entries",
                  "search": "Search:",
                  "zeroRecords": "No matching records found"
              },
              buttons: [
                  { extend: 'print', className: 'btn dark btn-outline' },
                  { extend: 'copy', className: 'btn red btn-outline' },
                  // { extend: 'pdf', className: 'btn green btn-outline' },
                  { extend: 'excel', className: 'btn yellow btn-outline ' },
                  // { extend: 'csv', className: 'btn purple btn-outline ' },
                  { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
              ],

              responsive: false,
              "order": [

              ],

              "lengthMenu": [
                  [100,200,-1],
                  [100,200,"All"] // change per page values here
              ],
              // set the initial value
              "pageLength": 100,

              "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
          });

          $('#tblalltasklist').dataTable({
              "language": {
                  "aria": {
                      "sortAscending": ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  },
                  "emptyTable": "No data available in table",
                  "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                  "infoEmpty": "No entries found",
                  "infoFiltered": "(filtered1 from _MAX_ total entries)",
                  "lengthMenu": "_MENU_ entries",
                  "search": "Search:",
                  "zeroRecords": "No matching records found"
              },
              buttons: [
                  { extend: 'print', className: 'btn dark btn-outline' },
                  { extend: 'copy', className: 'btn red btn-outline' },
                  // { extend: 'pdf', className: 'btn green btn-outline' },
                  { extend: 'excel', className: 'btn yellow btn-outline ' },
                  // { extend: 'csv', className: 'btn purple btn-outline ' },
                  { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
              ],

              responsive: false,
              "order": [

              ],

              "lengthMenu": [
                  [100,200,-1],
                  [100,200,"All"] // change per page values here
              ],
              // set the initial value
              "pageLength": 100,

              "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
          });


          
        });
        </script>
      </body>
    </html>
