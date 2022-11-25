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
  <style type="text/css">
    div.collapse {
 overflow:visible;
 position:static;
}
  </style>
  <head>
    <?php $this->load->view('common/header_styles'); ?>
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />  
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/lead/css/lead-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />   
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?> " rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/module/lead/css/lead-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/module/lead/css/lead-customs-details.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <style type="text/css">
       .custom-error
       {
            opacity: 1 !important;
       }
       .lead-won-status
       {
        cursor: default!important;
        border: 1px solid #45c945 !important;
       }

       .lead-won-status span {        
        color: #45c945 !important;
        font-weight: bold;
       }

       .lead-lost-status
       {
        cursor: default!important;
        border: 1px solid #ff3829 !important;
       }

       .lead-lost-status span {       
        color: #ff3829 !important;  
        font-weight: bold;
       }

       @media only screen and (max-width: 599px) {
          .editable-container
         {
          position: sticky;
         }
        }
      
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
            <?php echo $breadcrumb; ?>
            <div class="breadcrumb-button">
                <a href="<?php echo base_url('lead-details-'.$leaddata->prev_encrypt) ?>" class=" previous" title="">
                    <button id="newlead" class="btn green">
                        <i class="fa fa-arrow-left"></i>
                        <!-- Previous  -->
                    </button>
                </a>
                <a href="<?php echo base_url('lead-details-'.$leaddata->next_encrypt) ?>" class="next">
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
                <!-- MAIN CONTENTS START HERE -->
                <aside class="profile-info col-md-12">
                  <section class="panel">
                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                     <!--  <div>
                         <span class="detail-list-heading">Lead Details</span> 
                      </div>
                      <div class="clearfix"></div> -->
                      <header class="panel-heading panel-heading-lead color-primary">
                        <div class="row detail-box">
                          <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <span class="detail-list-heading">Lead Details</span><br>
                              <input type="hidden" name="led_id" id="led_id" value="<?php if(isset($leaddata->led_id)) echo $leaddata->led_id; ?>" />
                              <input type="hidden" name="led_pipeline" id="led_pipeline" value="<?php if(isset($leaddata->led_pipeline)) echo $leaddata->led_pipeline; ?>" />
                            <span class="panel-title">
                              <?php if(isset($leaddata->led_title)) echo $leaddata->led_title; ?>
                            </span>&nbsp;&nbsp;
                            <a class="btn btn-edit" href="<?php echo base_url('lead-edit-'.$leaddata->led_id_encrypt);?>" title="Click Here To Edit Details">
                              <i class="fa fa-edit">
                              </i>
                              <span class="btn-text"> Edit
                              </span>
                            </a>
                            <a class="btn btn-edit" onclick="deleteLead('<?php echo $leaddata->led_id_encrypt; ?>')" title="Click Here To Edit Details">
                              <i class="fa fa-trash">
                              </i>
                              <span class="btn-text"> Delete
                              </span>
                            </a>
                            <a class="btn btn-edit btn-follow" onclick="addFollowUp()" title="Click Here To Add Follow Up">
                              <span class="btn-text">
                                <i class="fa fa-book" aria-hidden="true">
                                </i>&nbsp;Follow Up
                              </span>
                            </a>
                            
                            <a class="btn btn-edit" href="<?php echo base_url('quotation-add?lead='.$leaddata->led_id_encrypt); ?>">
                              <i class="fas fa-plus"></i>
                              <span class="btn-text"> Quotation
                              </span>
                            </a>
                            <?php $led_qtn_count = isset($leaddata->qtn_count) ? $leaddata->qtn_count:0; 
                            if($led_qtn_count > 0 ){ ?>
                             <a class="btn btn-edit" href="<?php echo base_url('quotation-list?lead='.$leaddata->led_id_encrypt); ?>">
                              <i class="fas fa-eye"></i>
                              <span class="btn-text"> View Quotation 
                              </span>
                            </a>
                          <?php } ?>
                            <a class="btn btn-edit" href="<?php echo base_url('order-add?lead='.$leaddata->led_id_encrypt); ?>">
                              <i class="fas fa-plus"></i>
                              <span class="btn-text"> Order
                              </span>
                            </a>
                               <a class="btn btn-edit btn-won-lost lead-status-won" onclick="return updateLeadStatus(<?php echo LEAD_STATUS_WON; ?>)" title="Won">
                              <span class="btn-text"> Won
                              </span>
                            </a>
                           
                            <a class="btn btn-edit btn-won-lost lead-status-lost" title="Lost" href="#" data-toggle="modal" data-target="#lostModal">
                              <span class="btn-text"> Lost
                              </span>
                            </a>
                            
                            <a id="lead_Status_won" class="btn btn-edit btn-won-lost lead-won-status hidden" href="#">
                              <span class="btn-text"> Won
                              </span>
                            </a>

                            <a id="lead_Status_lost" class="btn btn-edit btn-won-lost lead-lost-status hidden" href="#">
                              <span class="btn-text"> Lost
                              </span>
                            </a>
                            
                           <?php if($leaddata->lead_mobile != ''){ ?>
                            <a href="tel:<?php echo $leaddata->lead_mobile; ?>" class="people-contact btn btn-edit btn-follow btn-lead-details" data-toggle="tooltip"  data-original-title="<?php echo $leaddata->lead_mobile; ?>"><i class="fa fa-mobile" aria-hidden="true"></i></a>
                            
                           <?php }?>
                           <?php if($leaddata->lead_email != ''){ ?>
                             <a href="mailto:<?php echo $leaddata->lead_email; ?>" class="people-contact btn btn-edit btn-follow btn-lead-details" data-toggle="tooltip"  data-original-title="<?php echo $leaddata->lead_email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                           <?php }?>
                           <?php if($leaddata->lead_mobile != ''){ ?>
                            <a class="people-contact btn btn-edit btn-follow" href="https://wa.me/91<?php echo $leaddata->lead_mobile; ?>" data-toggle="tooltip"  data-original-title="<?php echo $leaddata->lead_mobile; ?>">
                              <img class="fa-whatsapp-img-sidebar" style="width: 20px;" src="<?php echo base_url(); ?>assets/project/images/whatapp.png" />
                              <span class="btn-text"></span>
                            </a>
                           <?php }?>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12 created-title">
                          <!-- <div class="col-md-6 col-sm-6 col-xs-12 created-title"> -->
                            <span class="created">Created By: <?php echo $leaddata->led_crdt_by ?>
                            </span>
                            <br>
                            <span class="sp-date">Created On: <?php echo display_date($leaddata->led_crdt_dt) ?>
                            </span>
                          </div>
                        </div>
                      </header>
                      <div class="table-responsive">
                        <table class="table table-detail-custom table-style">
                          <tbody>
                            <tr>
                              <td><i class="fa fa-user"></i> &nbsp;People
                              </td>
                              <td><a id="lead_name" href="<?php echo base_url('people-details-'.$leaddata->led_ppl_id_encrypt); ?>"><?php if(isset($leaddata->led_ppl_name)) echo $leaddata->led_ppl_name; ?></a>
                                <!-- <a href="javascript:;" id="lead_name_link" data-type="text" data-pk="1" data-placement="top" data-placeholder="Please enter username" data-original-title="Please enter username"><i class="fa fa-edit"></i></a> -->
                              </td>
                               <td><i class="fa fa-building"></i> &nbsp;Company
                              </td>
                              <td>
                                <?php $cmp_id= '';
                                 if(isset($leaddata->led_cmp_id) && $leaddata->led_cmp_id != '')
                                {
                                  $cmp_id = $this->nextasy_url_encrypt->encrypt_openssl($leaddata->led_cmp_id);
                                } ?>
                                <a href="<?php echo base_url('company-details-'.$cmp_id) ?>"><?php if(isset($leaddata->led_cmp_id)) echo $leaddata->led_cmp_name; ?></a>
                              </td>
                                                          
                            </tr>
                            <tr>
                              <td><i class="fas fa-rupee-sign"></i> &nbsp;Amount
                              </td>
                              <td>Rs. <a href="javascript:;" id="led_amount" class="led_amount1 led-amount-editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Please enter title" data-original-title="enter title"   data-custom-gnp-grp='led_amount' data-gnp-grp=""><?php if(isset($leaddata->led_amount)) echo $leaddata->led_amount; ?></a>
                              </td> 
                              <td><i class="fa fa-sun"></i> &nbsp;Temp
                                </td>
                                <td>
                                  <a href="javascript:;" id="" class="led_temp lead-custom-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Temp" data-original-title="Select Temp" data-custom_select2_id="<?php echo $leaddata->led_temp; ?>" data-custom_select2_name="<?php echo $leaddata->led_temp_name; ?>" data-gnp-grp="led_temp"><?php if(isset($leaddata->led_temp_name)) echo $leaddata->led_temp_name; ?> </a>
                                </td>
                            
                                               
                            </tr>
                            <tr>
                              <td><i class="fas fa-database"></i> Source</td>
                              <!-- <td>
                                <a href="javascript:;" id="" class="led_src lead-custom-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Source" data-original-title="Select Source" data-custom_select2_id="<?php echo $leaddata->led_temp; ?>" data-custom_select2_name="<?php echo $leaddata->led_src_name; ?>"  data-gnp-grp="led_src"><?php if(isset($leaddata->led_src_name)) echo $leaddata->led_src_name; ?> </a>
                              </td> -->


                              <td><?php if(isset($leaddata->led_src_name)) echo '<a href="lead-list-'.$this->nextasy_url_encrypt->encrypt_openssl(LEAD_FILTER_SOURCE).'-'.$this->nextasy_url_encrypt->encrypt_openssl($leaddata->led_src).'" target="_blank">'.$leaddata->led_src_name.'</a></td>'; ?></td>



                              <td><i class="fa fa-user"></i> Referred By</td>
                              <?php $led_ref_by = '';
                                  if($leaddata->led_ref_by != '')
                                    {
                                      $led_ref_by = $this->nextasy_url_encrypt->encrypt_openssl($leaddata->led_ref_by); 
                                    } ?>
                              <td><a href="<?php echo base_url('people-details-').$led_ref_by ?>"><?php echo $leaddata->led_ref_by_name; ?></a></td>
                            </tr>
                            <tr>
                              <td><i class="fa fa-user"></i> &nbsp;Lead Type
                              </td>
                              <td>
                                 <a href="javascript:;" id="" class="led_type lead-custom-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Type" data-original-title="Select Type" data-custom_select2_id="<?php echo $leaddata->led_type; ?>" data-custom_select2_name="<?php echo $leaddata->lead_type_name; ?>" data-gnp-grp="led_type"><?php if(isset($leaddata->lead_type_name)) echo $leaddata->lead_type_name; ?> </a>
                              </td>
                              <td><i class="fa fa-user"></i> &nbsp;Campaign
                              </td>
                              <td><a href="<?php echo base_url('campaign-details');?>"><?php echo $leaddata->campaign_name; ?></a></td>
                              
                            </tr>
                            <tr>                              
                              
                              <td><i class="fa fa-user"></i> &nbsp;Managed By
                              </td>
                              <td>
                              <?php $managed_by = '';
                                  if($leaddata->led_ref_by != '')
                                    {
                                      $managed_by = $this->nextasy_url_encrypt->encrypt_openssl($leaddata->led_managed_by); 
                                    } ?>
                                    <a href="<?php echo base_url('people-details-').$managed_by; ?>"><?php echo $leaddata->led_managed_by_name; ?></a>
                              </td>
                              <td><i class="fa fa-cubes"></i> &nbsp;Stage
                              </td>
                              <td>
                                <a href="javascript:;" id="" class="led_lead_stage lead-custom-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Stage" data-original-title="Select Stage" data-custom_select2_id="<?php if(isset($leaddata->led_lead_stage)) echo $leaddata->led_lead_stage; ?>" data-custom_select2_name="<?php if(isset($leaddata->led_lead_stage_name)) echo $leaddata->led_lead_stage_name; ?>"  data-gnp-grp="led_lead_stage"><?php if(isset($leaddata->led_lead_stage_name)) echo $leaddata->led_lead_stage_name; ?> </a>
                              </td>
                            </tr>
                            <tr>
                              <td><i class="fas fa-info-circle"></i> &nbsp;Status
                              </td>
                              <td colspan="3">
                                <a href="javascript:;" id="led_status" class="led_status lead-custom-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Status" data-original-title="Select Status" data-custom_select2_id="<?php if(isset($leaddata->led_lead_status)) echo $leaddata->led_lead_status; ?>" data-custom_select2_name="<?php if(isset($leaddata->led_lead_status_name)) echo $leaddata->led_lead_status_name; ?>"  data-gnp-grp="led_lead_status"><?php if(isset($leaddata->led_lead_status_name)) echo $leaddata->led_lead_status_name; ?>  </a>
                              </td>  
                            </tr>
                            <tr>
                              <td><i class="fa fa-comments"></i> Remark</td>
                              <td colspan="3">  
                               <a href="javascript:;" id="" class="led_remark" data-type="textarea" data-pk="1" data-placement="top" data-placeholder="Enter remark" data-original-title="Enter Remark" data-gnp-grp="led_remark"><?php if(isset($leaddata->led_remark)) echo $leaddata->led_remark; ?>  </a>
                             </td>
                            </tr>
                            <tr class="led_loss_div <?php ($leaddata->led_loss_reason_name?'':'hidden')?>">
                              <td>Reason</td>
                              <td class="led_loss_div_reason"><?php if(isset($leaddata->led_loss_reason_name)) echo $leaddata->led_loss_reason_name; ?></td>
                              <td>Loss Remark</td>
                              <td class="led_loss_div_remark"><?php if(isset($leaddata->led_loss_remark)) echo $leaddata->led_loss_remark; ?></td>
                            </tr>
                            <!-- <tr>                              
                             
                              <td><i class="fa fa-cart-plus"></i> &nbsp;Product
                              </td>
                              <td><?php if(isset($leaddata->led_prd_name_all)) echo $leaddata->led_prd_name_all; ?>
                              </td> 
                            </tr> -->
                            
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                </aside>
                <!-- -----MAIN CONTENTS END HERE----- -->
              </div>
            </div>
            <div class="modal fade" id="lostModal" tabindex="-1" role="dialog" aria-labelledby="lostModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    
                  </div>
                   <form id="lead_loss_form">
                     <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;
                      </span>
                    </button>
                    <div class="text-center">
                      <h3 class="modal-title text-center">Lost</h3>
                      
                    </div>
                    <div class="form-group col-md-12 form-md-line-input form-md-floating-label">  
                         <label class="drp-title">Reason</label>
                        <div class="input-icon">
                          <i class="fas fa-info-circle list-level"></i>
                            <select name="led_loss_reason" id="led_loss_reason" class="form-control led_loss_reason custom-select2" required="" data-msg="Please Select Reason">
                              <option class="blank_option"></option>
                              <?php if(isset($leaddata->led_loss_reason)) { ?> 
                                <option value="<?php echo $leaddata->led_loss_reason; ?>" selected=""><?php echo $leaddata->led_loss_reason_name; ?></option>
                              <?php } ?>
                            </select>
                            <span class="help-block custom-error"></span>
                        </div>
                    </div>
                    <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <textarea class="form-control color-primary-light" rows="2" name="led_loss_remark" id="led_loss_remark" ><?php if(isset($leaddata->led_loss_remark)) echo $leaddata->led_loss_remark; ?></textarea>
                        <label for="led_loss_remark">Remarks</label>
                         <i class="fa fa-comments"></i>
                        <span class="help-block custom-error"></span>
                      </div>
                    </div>
                  
                  
                  
                </div>
                <div class="clearfix"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn grey" data-dismiss="modal">Close
                </button>
                <input type="submit" class="btn btn-primary btn green" value="Save changes">
                
            </div>
                   </form>
                
                </div>
              </div>
            </div>
            <!-- tab div start -->
            <div class="row">
               <div class="col-md-12">
                <div class="col-md-12">
                   <div class="portlet light bordered tabbed-detail">
                      <div class="portlet-title tabbable-line tabbable-line-lead">
                          
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#portlet_tab1" data-toggle="tab"> Overview </a>
                                </li>
                                <li>
                                    <a href="#portlet_tab2" data-toggle="tab"> Details </a>
                                </li>
                                <li>
                                    <a href="#portlet_tab3" data-toggle="tab"> Follow Up </a>
                                </li>
                                <li>
                                    <a href="#portlet_tab4" data-toggle="tab"> Task </a>
                                </li>
                                <li>
                                    <a href="#portlet_tab5" data-toggle="tab"> Activities </a>
                                </li>
                            </ul>
                      </div>
                      <div class="portlet-body">
                          <div class="tab-content tabbable-dashbord-content">
                            <!-- Tab for overview -->
                              <div class="tab-pane active" id="portlet_tab1">
                                <div class="row">
                                  <div class="container-fluid">
                                   <!--  <h4 class="page-title ">Task</h4><br> -->
                                   <!-- Follow up list (upcoming and last) -->
                                    <div class="row">
                                        <div class="col-md-6 hidden" id="lfp_up_data">
                                          <div class="portlet light last-follow box-rad">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <i class="icon-bar-chart font-dark hide"></i>
                                                    <img src="<?php echo base_url(); ?>assets/project/images/upcoming4.png" class="img-circle follow-img-title">
                                                    <span class="caption-subject font-dark bold uppercase">Upcoming</span>
                                                    <span class="caption-helper"></span>
                                                </div>
                                                <div class="actions">
                                                    <div class="btn-group">
                                                        <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a onclick="updateFollowupStatus_done_ufu()" href="#"> Done </a>
                                                            </li>          
                                                            <li>
                                                                <a onclick="leadfollowup_getdetail_ufu()" href="#">Reschedule</a>
                                                            </li>
                                                            <li>
                                                                <a onclick="updateFollowupStatus_ufu()" href="#">Edit</a>
                                                            </li>
                                                            <li>
                                                                <a onclick="deleteFollowup_ufu()" href="#">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                    <div class="general-item-list">
                                                        <div class="item">
                                                            <div class="item-head">
                                                                <div class="item-details">
                                                                  <input type="hidden" id="ufu_id">
                                                                     <img src="<?php echo base_url(); ?>assets/project/images/prson_no_img.png" class="img-circle follow-img">
                                                                    <a href="" class="item-name primary-link" id="ufu_lead_name"></a>
                                                                    <span class="item-label" id="ufu_managed_by"></span> - 
                                                                    <span class="item-label" id="ufu_date"></span>
                                                                </div>
                                                                <span class="item-status">
                                                                  <i class="fas fa-info-circle"></i> <span id="ufu_status"></span>
                                                                </span>
                                                            </div>
                                                            <div class="item-body" id="ufu_remark">
                                                            </div>
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                     <!--  <div class="col-md-10 col-md-push-1 col-sm-12"> -->
                                        <div class="col-md-6 hidden" id="lfp_last_data">
                                          <div class="portlet light last-follow box-rad">
                                              <div class="portlet-title">
                                                  <div class="caption caption-md">
                                                      <i class="icon-bar-chart font-dark hide"></i>
                                                      <img src="<?php echo base_url(); ?>assets/project/images/follow-new.jpg" class="img-circle follow-img-title">
                                                      <span class="caption-subject font-dark bold uppercase">Last Follow Up</span>
                                                      <span class="caption-helper"></span>
                                                  </div>
                                                  <div class="actions">
                                                      <div class="btn-group">
                                                          <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                              <i class="fa fa-angle-down"></i>
                                                          </a>
                                                          <ul class="dropdown-menu pull-right">
                                                              <li>
                                                                  <a onclick="updateFollowupStatus_done_lfu()"href="#"> Done </a>
                                                              </li>          
                                                              <li>
                                                                  <a onclick="leadfollowup_getdetail_lfu()" href="#">Reschedule</a>
                                                              </li>
                                                              <li>
                                                                  <a onclick="updateFollowupStatus_lfu()"href="#">Edit</a>
                                                              </li>
                                                              <li>
                                                                  <a onclick="deleteFollowup_lfu()" href="#">Delete</a>
                                                              </li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="portlet-body">
                                                  <div data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                      <div class="general-item-list">
                                                          <div class="item">
                                                              <div class="item-head">
                                                                  <div class="item-details">
                                                                    <input type="hidden" id="lfu_id">
                                                                       <img src="<?php echo base_url(); ?>assets/project/images/prson_no_img.png" class="img-circle follow-img">
                                                                      <a href="" class="item-name primary-link" id="lfu_lead_name"></a>
                                                                      <span class="item-label" id="lfu_managed_by"></span> - 
                                                                      <span class="item-label" id="lfu_date"></span>
                                                                  </div>
                                                                  <span class="item-status">
                                                                    <i class="fas fa-info-circle"></i> <span id="lfu_status"></span>
                                                                  </span>
                                                              </div>
                                                              <div class="item-body" id="lfu_remark">
                                                              </div>
                                                          </div>
                                                           
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                                                               
                                     <!-- Follow up list (upcoming and last) -->
                                    <!-- no follow up list (upcoming and last) -->
                                    
                                        <div class="col-md-6" id="lfp_up_hidden">
                                          <div class="portlet light last-follow box-rad">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <i class="icon-bar-chart font-dark hide"></i>
                                                    <img src="<?php echo base_url(); ?>assets/project/images/upcoming4.png" class="img-circle follow-img-title">
                                                    <span class="caption-subject font-dark bold uppercase">Upcoming</span>
                                                    <span class="caption-helper"></span>
                                                </div>
                                                
                                            </div>
                                            <div class="portlet-body">
                                                <div data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                    <div class="general-item-list">
                                                        <div class="item">
                                                            <div class="item-body">
                                                              No Follow Up
                                                            </div>
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                     <!--  <div class="col-md-10 col-md-push-1 col-sm-12"> -->
                                        <div class="col-md-6" id="lfp_last_hidden">
                                          <div class="portlet light last-follow box-rad">
                                              <div class="portlet-title">
                                                  <div class="caption caption-md">
                                                      <i class="icon-bar-chart font-dark hide"></i>
                                                      <img src="<?php echo base_url(); ?>assets/project/images/follow-new.jpg" class="img-circle follow-img-title">
                                                      <span class="caption-subject font-dark bold uppercase">Last Follow Up</span>
                                                      <span class="caption-helper"></span>
                                                  </div>
                                              </div>
                                              <div class="portlet-body">
                                                  <div data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                      <div class="general-item-list">
                                                          <div class="item">
                                                              <div class="item-body">
                                                                No Follow Up
                                                              </div>
                                                          </div>
                                                           
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- no follow up list (upcoming and last) -->

                                    <div class="row">
                                      <div class="col-md-3 no-side-padding">
                                      <div class="col-md-12 follow-up-title">
                                        <h4 class="page-title ">Follow Ups</h4>
                                      </div>
                                         <div class="col-md-12">
                                       <div class="boxes-main task-bck">

                                         <!-- <div class="module-box">
                                           <div class="module-text" >
                                             <div class="module-box-title module-box-title-first">
                                               <a href="#">Pending</a>
                                             </div>
                                           
                                           </div>
                                         </div> -->
                                     
                                         <div class="module-amount">
                                           <a href="#">5</a>
                                         </div>
                                         
                                         <div class="module-link">
                                           <a href="#" class="dashboard-link">View Report</a>
                                         </div>
                                       </div>
                                      </div>
                                      
                                    </div>

                                    <div class="col-md-3 no-side-padding">
                                      <div class="col-md-12 follow-up-title">
                                        <h4 class="page-title ">Task</h4>
                                      </div>
                                         <div class="col-md-12">
                                       <div class="boxes-main task-bck">

                                         <!-- <div class="module-box">
                                           <div class="module-text" >
                                             <div class="module-box-title module-box-title-first">
                                               <a href="#">Pending</a>
                                             </div>
                                           
                                           </div>
                                         </div> -->
                                     
                                         <div class="module-amount">
                                           <a href="#"><?php echo $pending_task; ?></a>
                                         </div>
                                         
                                         <div class="module-link">
                                           <a href="#" class="dashboard-link">View Report</a>
                                         </div>
                                       </div>
                                      </div>
                                      
                                    </div>

                                    <div class="col-md-3 no-side-padding">
                                      <div class="col-md-12 follow-up-title">
                                        <h4 class="page-title ">Quotation </h4>
                                      </div>
                                         <div class="col-md-12">
                                       <div class="boxes-main task-bck">

                                         <!-- <div class="module-box">
                                           <div class="module-text" >
                                             <div class="module-box-title module-box-title-first">
                                               <a href="#">Pending</a>
                                             </div>
                                           
                                           </div>
                                         </div> -->
                                     
                                         <div class="module-amount">
                                           <a href="#">5</a>
                                         </div>
                                         
                                         <div class="module-link">
                                           <a href="#" class="dashboard-link">View Report</a>
                                         </div>
                                       </div>
                                      </div>
                                      
                                    </div>

                                    <div class="col-md-3 no-side-padding">
                                      <div class="col-md-12 follow-up-title">
                                        <h4 class="page-title ">Invoice </h4>
                                      </div>
                                         <div class="col-md-12">
                                       <div class="boxes-main task-bck">

                                         <!-- <div class="module-box">
                                           <div class="module-text" >
                                             <div class="module-box-title module-box-title-first">
                                               <a href="#">Pending</a>
                                             </div>
                                           
                                           </div>
                                         </div> -->
                                     
                                         <div class="module-amount">
                                           <a href="#">5</a>
                                         </div>
                                         
                                         <div class="module-link">
                                           <a href="#" class="dashboard-link">View Report</a>
                                         </div>
                                       </div>
                                      </div>
                                      
                                    </div>
                                    </div>

                                    

                                    

                                  </div>
                                </div>
                              
                              </div>
                            <!-- Tab for overview -->
                              <div class="tab-pane" id="portlet_tab2">
                                <div class="row">
                                  <div class="container-fluid">
                                    <div class="col-md-12">
                                      <section class="panel panel-tab">
                                        <div class="panel-body bio-graph-info panel-body-detail-view panel-body-tab-view panel-detail-view">
                                          <div class="table-responsive table-responsive-custom">
                                            <table class="table table-detail-custom table-style table-style-top">
                                              <tbody>
                                                <tr>
                                                  <td><i class="fa fa-user"></i> &nbsp;Referred By
                                                  </td>
                                                  <td colspan="3"><a href="<?php echo base_url('people-details-').$led_ref_by ?>"><?php echo $leaddata->led_ref_by_name; ?></a>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td><i class="fas fa-file"></i> &nbsp;Source
                                                  </td>
                                                  <td ><a href="javascript:;" id="" class="led_src lead-custom-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Source" data-original-title="Select Source" data-custom_select2_id="<?php echo $leaddata->led_temp; ?>" data-custom_select2_name="<?php echo $leaddata->led_src_name; ?>"  data-gnp-grp="led_src"><?php if(isset($leaddata->led_src_name)) echo $leaddata->led_src_name; ?> </a>
                                                  </td>
                                                  <!-- <td><i class="fa fa-cart-plus"></i> &nbsp;Product
                                                  </td>
                                                  <td><?php if(isset($leaddata->led_prd_name_all)) echo $leaddata->led_prd_name_all; ?>
                                                  </td>  -->                             
                                                </tr>
                                                <tr>
                                                  <td><i class="fa fa-comments"></i> &nbsp;Remark
                                                  </td>
                                                  <td colspan="3"><a href="javascript:;" id="led_remark" class="led_remark" data-type="textarea" data-pk="1" data-placement="top" data-placeholder="Enter remark" data-original-title="Enter Remark" data-gnp-grp="led_remark"><?php if(isset($leaddata->led_remark)) echo $leaddata->led_remark; ?>  </a>
                                                  </td>                               
                                                </tr>                                                          
                                              </tbody>
                                            </table>
                                          </div>  
                                          <div class="main-title">
                                              <h5 class="bold page-tab-title">Contact Details</h5>
                                            </div>
                                          <div class="table-responsive table-responsive-custom">
                                            
                                           <!--   <h4 class="page-title page-tab-title">Contact Details</h4> -->
                                              <table class="table table-detail-custom table-style table-style-top">
                                              <tbody>
                                                <tr>
                                                  <td><i class="fas fa-mobile-alt"></i> &nbsp;Mobile
                                                  </td>
                                                  <td><a href="tel:<?php if(isset($leaddata->lead_mobile)) echo $leaddata->lead_mobile ?>"><?php if(isset($leaddata->lead_mobile)) echo $leaddata->lead_mobile ?></a>
                                                  </td>
                                                  <td><i class="fas fa-envelope"></i> &nbsp;Email ID
                                                  </td>
                                                  <td><a href="mailto:<?php if(isset($leaddata->lead_email)) echo $leaddata->lead_email ?>"><?php if(isset($leaddata->lead_email)) echo $leaddata->lead_email ?></a>
                                                  </td>
                                                </tr>
                                               
                                                
                                              </tbody>
                                            </table>
                                          </div>  
                                          <div class="main-title">
                                              <h5 class="bold page-tab-title">Company Details</h5>
                                            </div>
                                          <div class="table-responsive table-responsive-custom">
                                            
                                           <!--   <h4 class="page-title page-tab-title">Contact Details</h4> -->
                                              <table class="table table-detail-custom table-style table-style-top">
                                              <tbody>
                                                <tr>
                                                  <td> <i class="fa fa-industry"></i> Company Name
                                                  </td>
                                                  <td><?php if(isset($company_details->cmp_name)) echo $company_details->cmp_name ?>
                                                  </td>
                                                  <td><i class="fas fa-globe"></i> Website
                                                  </td>
                                                  <td><a href="<?php if(isset($company_details->cmp_website)) echo $company_details->cmp_website ?>"><?php if(isset($company_details->cmp_website)) echo $company_details->cmp_website ?></a>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td><i class="fas fa-map-marker-alt"></i> State</td>
                                                  <td>Maharashtra</td>
                                                  <td><i class="fa fa-industry"></i> Industry</td>
                                                 <td><?php if(isset($company_details->cmp_industry_name)) echo $company_details->cmp_industry_name ?></td>
                                                </tr>
                                               <tr>
                                                 
                                                 <td><i class="fa fa-industry"></i> Company Type</td>
                                                 <td><?php if(isset($company_details->cmp_type_name)) echo $company_details->cmp_type_name ?></td>
                                                 <td><i class="fas fa-rupee-sign"></i> Annual revenue</td>
                                                 <td><?php if(isset($company_details->cmp_anl_rev)) echo number_format($company_details->cmp_anl_rev) ?></td>
                                               </tr>
                                               <tr>
                                                 <td><i class="fas fa-id-card"></i> GST No</td>
                                                 <td><?php if(isset($company_details->cmp_gst_no)) echo $company_details->cmp_gst_no ?></td>
                                                 <td><i class="fas fa-address-card"></i> Pan No</td>
                                                 <td><?php if(isset($company_details->cmp_pan)) echo $company_details->cmp_pan ?></td>
                                               </tr>
                                               
                                               <tr>
                                                 
                                                 <td><i class="fas fa-user"></i> Employees</td>
                                                 <td><?php if(isset($company_details->cmp_employee)) echo $company_details->cmp_employee ?></td>
                                                 
                                                    <td><i class="fas fa-user"></i> Managed By</td>
                                                    <td>Pooja</td>
                                                  
                                               </tr>
                                               <tr>
                                                  <td><i class="fas fa-user"></i> Type</td>
                                                  <td colspan="3">Company</td>
                                                 
                                               </tr>
                                               <tr>
                                                 <td><i class="fas fa-map-marker-alt"></i> Address</td>
                                                 <td colspan="3"><?php if(isset($company_details->cmp_address)) echo $company_details->cmp_address ?></td>
                                               </tr>

                                                <tr>
                                                <td><i class="fas fa-image"></i> Logo</td>
                                                  <td colspan="3">  
                                                    
                                                  </td>
                                                </tr>
                                               
                                               <tr>
                                                 <td><i class="fas fa-tags"></i> Tags</td>
                                                 <td><?php if(isset($company_details->cmp_tgs_id)) echo GetTagData($company_details->cmp_tgs_id, 'prod-span') ?></td>
                                                 
                                               </tr>
                                               
                                               <tr>
                                                 <td><i class="far fa-credit-card"></i> Payment Terms</td>
                                                 <td colspan="3"><?php if(isset($company_details->cmp_payment_terms)) echo $company_details->cmp_payment_terms ?></td>
                                               </tr>
                                               <tr>
                                                 <td><i class="far fa-credit-card"></i> Remark</td>
                                                 <td colspan="3"></td>
                                               </tr>
                                               <tr>
                                                  <td><i class="fas fa-share-alt"></i> Social Media</td>
                                                  <td colspan="3">
                                                    <a class=" table-div-btn btn-profile social-profile" href="#" data-toggle="tooltip"  data-original-title="Facebook" target="_blank">
                                                      <img class="fa-whatsapp-img-title social-logo" src="<?php echo base_url(); ?>assets/project/images/facebook.png"  />
                                                      
                                                    </a>
                                                    <a class=" table-div-btn btn-profile social-profile" href="#" data-toggle="tooltip"  data-original-title="Instagram" target="_blank">
                                                      <img class="fa-whatsapp-img-title social-logo social-small-logo"  src="<?php echo base_url(); ?>assets/project/images/instagram.png"  />
                                                      
                                                    </a>
                                                    <a class=" table-div-btn btn-profile social-profile" href="#" data-toggle="tooltip"  data-original-title="LinkedIn" target="_blank"> 
                                                      <img class="fa-whatsapp-img-title social-logo" src="<?php echo base_url(); ?>assets/project/images/linkedin.png"  />
                                                      
                                                    </a>
                                                    <a class=" table-div-btn btn-profile social-profile" href="#" data-toggle="tooltip"  data-original-title="Twitter" target="_blank">
                                                      <img class="fa-whatsapp-img-title social-logo social-small-logo"  src="<?php echo base_url(); ?>assets/project/images/twitter.png"  />
                                                      
                                                    </a>
                                                    <a class=" table-div-btn btn-profile social-profile" href="#" data-toggle="tooltip"  data-original-title="Youtube" target="_blank">
                                                      <img class="fa-whatsapp-img-title social-logo social-ex-small-logo"  src="<?php echo base_url(); ?>assets/project/images/youtube.png"  />
                                                      
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
                              </div>
                              <div class="tab-pane" id="portlet_tab3">
                                  
                                <div class="row">
                                  <div class="container-fluid">
                                    <div class="col-md-12 no-side-padding">
                                        <div class="portlet light bordered">
                                          
                                          <div class="portlet-body">

                                            <ul class="nav nav-tabs follow-up-task">
                                                <li class="active">
                                                    <a href="#tab_today" data-toggle="tab" aria-expanded="true"> Today <span id = "tblFollowupListToday0" class="countBtn"></span> </a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_pending" data-toggle="tab" aria-expanded="false"> Due <span id="tblFollowupListPending1" class="countBtn"></span></a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_today_completed" data-toggle="tab" aria-expanded="false">  Today (Completed) <span id="tblFollowupListCompleted2" class="countBtn"></span></a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_upcoming" data-toggle="tab" aria-expanded="false"> Upcoming <span id="tblFollowupListUpcoming3" class="countBtn"></span></a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_all" data-toggle="tab" aria-expanded="false">All <span id="tblFollowupListAll4" class="countBtn"></span> </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                              <div class="tab-pane fade active in" id="tab_today">
                                                <table class="table table-striped table-bordered table-hover" id="tblFollowupListToday" style="width:100%;">
                                                  <thead>
                                                    <tr>
                                                      <th> Date Time </th>
                                                      <th> Type </th>
                                                      <th> Followup Remark </th>
                                                      <th> Status </th>
                                                      <th> Created On </th>
                                                      <th> Created By </th>
                                                      <th> Action </th>
                                                    </tr>
                                                  </thead>
                                                </table>
                                              </div>
                                              <div class="tab-pane fade" id="tab_pending">
                                                <table class="table table-striped table-bordered table-hover" id="tblFollowupListPending" style="width:100%;">
                                                  <thead>
                                                    <tr>
                                                      <th> Date Time </th>
                                                      <th> Type </th>
                                                      <th> Followup Remark </th>
                                                      <th> Status </th>
                                                      <th> Created On </th>
                                                      <th> Created By </th>
                                                      <th> Action </th>
                                                    </tr>
                                                  </thead>
                                                </table>
                                              </div>
                                              <div class="tab-pane fade" id="tab_today_completed">
                                                <table class="table table-striped table-bordered table-hover" id="tblFollowupListCompleted" style="width:100%;">
                                                  <thead>
                                                    <tr>
                                                      <th> Date Time </th>
                                                      <th> Type </th>
                                                      <th> Followup Remark </th>
                                                      <th> Status </th>
                                                      <th> Created On </th>
                                                      <th> Created By </th>
                                                      <th> Action </th>
                                                    </tr>
                                                  </thead>
                                                </table>
                                              </div>
                                              <div class="tab-pane fade" id="tab_upcoming">
                                                <table class="table table-striped table-bordered table-hover" id="tblFollowupListUpcoming" style="width:100%;">
                                                  <thead>
                                                    <tr>
                                                      <th> Date Time </th>
                                                      <th> Type </th>
                                                      <th> Followup Remark </th>
                                                      <th> Status </th>
                                                      <th> Created On </th>
                                                      <th> Created By </th>
                                                      <th> Action </th>
                                                    </tr>
                                                  </thead>
                                                </table>
                                              </div>
                                              <div class="tab-pane fade" id="tab_all">
                                                <table class="table table-striped table-bordered table-hover" id="tblFollowupListAll" style="width:100%;">
                                                  <thead>
                                                    <tr>
                                                      <th> Date Time </th>
                                                      <th> Type </th>
                                                      <th> Followup Remark </th>
                                                      <th> Status </th>
                                                      <th> Created On </th>
                                                      <th> Created By </th>
                                                      <th> Action </th>
                                                    </tr>
                                                  </thead>
                                                </table>
                                              </div>
                                            </div>
                                            <div class="clearfix margin-bottom-20"> </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>           
                                </div>
                              </div>
                              <div class="tab-pane" id="portlet_tab4">
                                  
                                <div class="row">
                                  <div class="container-fluid">
                                   <div class="col-md-12 no-side-padding">
                                         <div class="portlet light bordered">
                                         
                                          <div class="portlet-body">
                                            <table class="table table-bordered table-list" id="tblleadtasklist">
                                              <thead>
                                                <tr>
                                                  <th>Title</th>
                                                  <th>Client</th>
                                                  <th>Assigned Date</th>
                                                  <th>Status</th>
                                                  <th>Assigned To</th>
                                                  <th>Assigned By</th>
                                                  <th>Priority</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>
                                            </table>                                                 
                                          </div>
                                        </div>
                                    </div>
                                  </div>           
                                </div>
                              </div>

                              <div class="tab-pane" id="portlet_tab5">
                                  
                                <div class="row">
                                  <div class="container-fluid">
                                   <div class="col-md-12 no-side-padding">
                                       <div class="portlet light bordered portlet-container portlet-activity">
                                          <div class="portlet-title">
                                              <div class="caption">
                                                  <i class="icon-share font-dark hide"></i>
                                                  <span class="caption-subject bold uppercase">Recent Activities</span>
                                              </div>
                                              <div class="actions">
                                                  <div class="btn-group">
                                                      <a class="btn green btn-add-new" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter By
                                                          <i class="fa fa-angle-down"></i>
                                                      </a>


                                                      <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                                          <label class="mt-checkbox mt-checkbox-outline">
                                                              <input type="checkbox" data-filter="activity_lead" onchange="filter_activity()" class="filter-check"/> Lead
                                                              <span></span>
                                                          </label>
                                                          <label class="mt-checkbox mt-checkbox-outline">
                                                              <input type="checkbox" data-filter="activity_amount" onchange="filter_activity()"  class="filter-check" /> Amount 
                                                              <span></span>
                                                          </label>
                                                          <label class="mt-checkbox mt-checkbox-outline">
                                                              <input type="checkbox" data-filter="activity_status" onchange="filter_activity()" class="filter-check" /> Status
                                                              <span></span>
                                                          </label>
                                                          <label class="mt-checkbox mt-checkbox-outline">
                                                              <input type="checkbox" data-filter="activity_stage" onchange="filter_activity()" class="filter-check" /> Stage
                                                              <span></span>
                                                          </label>
                                                          <label class="mt-checkbox mt-checkbox-outline">
                                                              <input type="checkbox" data-filter="activity_pipeline" onchange="filter_activity()" class="filter-check" /> Pipeline
                                                              <span></span>
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="portlet-body">
                                              <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                                                  <ul class="feeds recent-activity-feeds">
                                                      <li class="actvity-list activity_lead">
                                                          <div class="col1">
                                                              <div class="cont">
                                                                  <div class="cont-col2 task-lead">
                                                                      <div class="desc">
                                                                        <a href="#" class="recent-lead">Pooja</a> created new lead
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col2">
                                                              <div class="date"> Just now </div>
                                                          </div>
                                                      </li>
                                                      <li class="actvity-list activity_amount">
                                                          <div class="col1">
                                                              <div class="cont">
                                                                  <div class="cont-col2  task-amount">
                                                                        <img src="<?php echo base_url(); ?>assets/module/lead/svg/increased-revenue.svg" style="width: 25px;">
                                                                      <div class="desc">
                                                                        <span><a href="#" class="recent-lead">Pooja</a> Increased the deal amount from <span class="span-amt">10,000</span> to <span class="span-amt won">12,000</span> </span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col2">
                                                              <div class="date"> 20 mins </div>
                                                          </div>
                                                      </li>
                                                      <li class="actvity-list activity_amount">
                                                          <div class="col1">
                                                              <div class="cont">
                                                                  <div class="cont-col2  task-amount">
                                                                        <!-- <img src="<?php echo base_url(); ?>assets/module/lead/svg/business-down-bars-graphic.svg" style="width: 25px;"> -->
                                                                        <!-- <img src="<?php echo base_url(); ?>assets/module/lead/svg/dollar.svg" style="width: 25px;"> -->
                                                                      <i class="fas fa-info"></i>
                                                                      <div class="desc">
                                                                        <span><a href="#" class="recent-lead">Pooja</a> Decreased the deal amount from <span class="span-amt">10,000</span> to <span class="span-amt lose">8,000</span> </span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col2">
                                                              <div class="date"> 24 mins </div>
                                                          </div>
                                                      </li>
                                                      <li class="actvity-list activity_status">
                                                          <div class="col1">
                                                              <div class="cont">
                                                                  <div class="cont-col2  task-status">
                                                                      <div class="desc">
                                                                        <span>
                                                                          <a href="#" class="recent-lead">Pooja</a> changed the status from pending to on hold.  
                                                                        </span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col2">
                                                              <div class="date"> 30 mins </div>
                                                          </div>
                                                      </li>
                                                      <li class="actvity-list activity_status">
                                                          <div class="col1">
                                                              <div class="cont">
                                                                  <div class="cont-col2  task-status deal">
                                                                        <img src="<?php echo base_url(); ?>assets/module/lead/svg/won.svg" style="width: 25px;">
                                                                      <div class="desc">
                                                                        <span>
                                                                          <a href="#" class="recent-lead">Pooja</a> Won the Deal 
                                                                        </span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col2">
                                                              <div class="date"> 1 hours </div>
                                                          </div>
                                                      </li>
                                                      <li class="actvity-list activity_status">
                                                          <div class="col1">
                                                              <div class="cont">
                                                                  <div class="cont-col2  task-status deal">
                                                                        <img src="<?php echo base_url(); ?>assets/module/lead/svg/lose.svg" style="width: 25px;">
                                                                      <div class="desc">
                                                                        <span>
                                                                          <a href="#" class="recent-lead">Pooja</a> Lost the Deal 
                                                                        </span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col2">
                                                              <div class="date"> 2 hours </div>
                                                          </div>
                                                      </li>
                                                      <li class="actvity-list activity_status">
                                                          <div class="col1">
                                                              <div class="cont">
                                                                  <div class="cont-col2  task-status">
                                                                      <div class="desc">
                                                                        <span>
                                                                          <a href="#" class="recent-lead">Pooja</a> changed the status from lost to pending.  
                                                                        </span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col2">
                                                              <div class="date"> 1 days ago </div>
                                                          </div>
                                                      </li>

                                                      <li class="actvity-list activity_stage">
                                                          <div class="col1">
                                                              <div class="cont">
                                                                  <div class="cont-col2  task-stage">
                                                                      <div class="desc">
                                                                        <span>
                                                                          <a href="#" class="recent-lead">Pooja</a> changed stage to lead in to qualification.  
                                                                        </span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col2">
                                                              <div class="date"> 2 days ago </div>
                                                          </div>
                                                      </li>
                                                      <li class="actvity-list activity_pipeline">
                                                          <div class="col1">
                                                              <div class="cont">
                                                                  <div class="cont-col2  task-pipeline">
                                                                      <div class="desc">
                                                                        <span>
                                                                          <a href="#" class="recent-lead">Pooja</a> changed pipeline to Product to Services.  
                                                                        </span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="col2">
                                                              <div class="date"> 3 days ago </div>
                                                          </div>
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
                    </div>
                </div>
              </div>
            </div>
            <!-- tab div end -->
          </div>
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- Modal -->
    <div class="modal fade" id="followModal" role="dialog" aria-labelledby="followModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="text-center">
                <h3 class="modal-title text-center">Follow Up Transaction Form</h3>
                <span class="sp_line color-primary"></span>
              </div>
              <form method="POST" action="" class="follow-modal-form" id="follow_up_form">
                <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                  <input type="hidden" name="lfp_id" id="lfp_id" value="" />
                  <input type="hidden" name="old_lfp_id" id="renew_old_lfp_id" value="" />
                  <input type="hidden" name="old_lfp_type" id="renew_old_lfp_type" value="" />
                  <input type="hidden" name="lfp_module_type" id="lfp_module_type" value="<?php echo FOLLOWUP_MODULE_TYPE_LEAD; ?>" />
                  <input type="hidden" name="lfp_module_type_id" id="lfp_module_type_id" value="<?php if(isset($leaddata->led_id)) echo $leaddata->led_id; ?>" />
                    <div class="input-icon">
                      <input type="text" size="16" readonly="" class="form-control color-primary-light" name="lfp_next_date" id="lfp_next_date">
                      <label class="control-label">Date<span class="asterix-error"><em>*</em></span></label>
                       <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="help-block"></div>
                </div>
                <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                  <div class="input-icon">
                    <select class="form-control" name="lfp_next_time" id="lfp_next_time">
                      <option></option>
                    </select>
                    <label class="control-label">Time</label>
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                  <div class="help-block"></div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-md-line-input form-md-floating-label ">
                    <div class="input-icon">
                      <i class="fa fa-envelope"></i>
                      <select  class="form-control edited  custom-select2" name="lfp_type" id="lfp_type" onchange="updateLFPOptn()">
                        <option value="">Select Type</option>
                        <?php echo getGenPrmResult('dropdown','lfp_type','lfp_type','','result'); ?>
                      </select>
                      <label>Follow Type</label>
                    </div>
                    <div class="help-block"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-md-line-input form-md-floating-label">
                    <div class="input-icon">
                      <i class="fas fa-info-circle list-level"></i>
                      <select class="form-control" name="lfp_followup_status" id="lfp_followup_status">
                      <?php echo getGenPrmResult('dropdown','lfp_followup_status','lfp_followup_status','1','result'); ?></select>
                        <label>Status</label>
                    </div>
                    <div class="help-block"></div>
                  </div>
                </div>
                <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                  <div class="input-icon">                    
                    <textarea class="form-control color-primary-light  custom-select2" rows="2" name="lfp_instruction" id="lfp_instruction" disabled="disabled"></textarea>
                    <label for="lfp_instruction">Instruction</label>
                    <i class="fas fa-info-circle"></i>
                    <div class="help-block"></div>
                  </div>                 
                </div>
                <div class="form-group col-md-12 hidden form-md-line-input form-md-floating-label">
                  <div class="input-icon">
                    <textarea class="form-control color-primary-light" rows="2" name="lfp_type_remark" id="lfp_type_remark"></textarea>
                    <label for="lfp_type_remark">Instruction </label>
                    <i class="fa fa-comments"></i>
                    <div class="help-block"></div>
                  </div>
                </div>
                <div class="form-group col-md-12 form-md-line-input form-md-floating-label">
                  <div class="input-icon">
                    <textarea class="form-control color-primary-light" rows="2" name="lfp_remark" id="lfp_remark"></textarea>
                    <label for="lfp_remark">Remarks</label>
                     <i class="fa fa-comments"></i>
                    <div class="help-block"></div>
                  </div>
                </div>
                <div class="form-group col-md-6 form-md-line-input form-md-floating-label ">
                  <label class="drp-title">Managed By</label>
                  <div class="input-icon">
                    <i class="fas fa-user-tie list-level"></i>
                    <select  class="form-control edited  custom-select2" name="lfp_managed_by" id="lfp_managed_by">
                          <option value="<?php echo $this->session->userdata(PEOPLE_SESSION_ID); ?>"><?php echo $this->session->userdata(PEOPLE_SESSION_NAME); ?></option>
                    </select>
                  </div>
                  <div class="help-block"></div>
                </div>                            
                <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                  <div class="input-icon input-label-text">
                    <div class="md-checkbox">
                      <input type="checkbox" id="lfp_sendmail" class="md-check">
                      <label for="lfp_sendmail">
                      <span></span>
                      <span class="check"></span>
                      <span class="box"></span>Send Email</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn grey" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary btn green" value="Save changes" />
              </div>
          </form>
        </div>
      </div>
    
    
  <div class="js-scripts">
    <?php $this->load->view('common/footer_scripts'); ?>
    <!-- OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-date-time-pickers.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/lead/js/lead-list.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/scripts/jquery.matchHeight.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
  </div>
  <!-- Modal -->
<div class="modal fade" id="sopmodal" tabindex="-1" role="dialog" aria-labelledby="sopmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <h3 class="modal-title text-center">Standard of Procedure</h3>
            <span class="sp_line color-primary"></span>
        </div>
        <p>As per our rule we follow our standard of procedure to maintain the policies of the company.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function filter_activity(){
    if ($('.filter-check:checked').length>0) {
      $('.actvity-list').addClass('hidden');
      $('.filter-check:checked').each(function(){
        var visible_filter = $(this).data('filter');
        $('.'+visible_filter).removeClass('hidden');
        // console.log();
      });
    }
    else{
      $('.actvity-list').removeClass('hidden');
    }
  }
</script>
<script type="text/javascript">
  var won = <?php echo LEAD_STATUS_WON; ?>;
  var lost = <?php echo LEAD_STATUS_LOST; ?>;
  $(document).ready(function() {
    getFollowupList();
    $('#lfp_followup_status').select2();
    $('#lfp_type').select2();
    $('#lfp_next_time').select2();
    /*$('#lfp_follow_by').select2({
      tags: true,
      placeholder: "Please Select People",
      ajax: {
        url: baseUrl + 'followup/getPeopleDropdown/',
        dataType: 'json',
      }
    });*/
    $('#led_loss_reason').select2({
      tags: true,
      placeholder: "Please Select Reason",
      ajax: {
        url: baseUrl + 'people/getGenPrmforDropdown/led_loss_reason',
        dataType: 'json',
      }
    });
    $('#lfp_next_time').timeList({
      minutediff: 5,
      default: '09:00'
    });
    $('#lfp_next_time').addClass('edited');
    updateLeadStatus(<?php echo $leaddata->led_lead_status; ?>, true);

    var primary_key = 'led_id';
    var editableElement = '.led-amount-editable';
    var updateUrl =  baseUrl + 'lead/updateLeadCustomData';
    customTextEditable(editableElement, primary_key, updateUrl);
  });

  function getFollowupList() {
    getLeadOverview('<?php echo $leaddata->led_id; ?>');
    getLeadTaskList('<?php echo $leaddata->led_id; ?>');
    var followUpTblUrlArray = {
      'tblFollowupListToday': {
        'table_function_name': 'lead-followup-getlist-today',
        'table_function_count': <?php echo $leadfollowUpTypeToday->table_data_count; ?>,
        'table_function_server': <?php echo $leadfollowUpTypeToday->table_server_status; ?>
      },
      'tblFollowupListPending': {
        'table_function_name': 'lead-followup-getlist-pending',
        'table_function_count': <?php echo $leadfollowUpTypePending->table_data_count; ?>,
        'table_function_server': <?php echo $leadfollowUpTypePending->table_server_status; ?>
      },
      'tblFollowupListCompleted': {
        'table_function_name': 'lead-followup-getlist-completed',
        'table_function_count': <?php echo $leadfollowUpTypeCompleted->table_data_count; ?>,
        'table_function_server': <?php echo $leadfollowUpTypeCompleted->table_server_status; ?>
      },
      'tblFollowupListUpcoming': {
        'table_function_name': 'lead-followup-getlist-upcoming',
        'table_function_count': <?php echo $leadfollowUpTypeUpcoming->table_data_count; ?>,
        'table_function_server': <?php echo $leadfollowUpTypeUpcoming->table_server_status; ?>
      },
      'tblFollowupListAll': {
        'table_function_name': 'lead-followup-getlist-all',
        'table_function_count': <?php echo $leadfollowUpTypeAll->table_data_count; ?>,
        'table_function_server': <?php echo $leadfollowUpTypeAll->table_server_status; ?>
      },
    };
    var tableNameArr = Object.keys(followUpTblUrlArray);
    for(var i = 0; i < tableNameArr.length; i++) {
      $('#' + tableNameArr[i]).DataTable().destroy();
      var customDataTableElement = '#' + tableNameArr[i];
      var customDataTableCount = followUpTblUrlArray[tableNameArr[i]].table_function_count;
      var customDataTableServer = followUpTblUrlArray[tableNameArr[i]].table_function_server;
      var customDataTableUrl = baseUrl + followUpTblUrlArray[tableNameArr[i]].table_function_name + '-<?php echo $leaddata->led_id; ?>?table_data_count=' + customDataTableCount;
      var customDataTableColumns = [{
          'data': 'lfp_next_date_format'
        },
        {
          'data': 'followup_type'
        },
        {
          'data': 'lfp_remark'
        },
        {
          'data': 'followup_status'
        },
        {
          'data': 'lfp_crdt_dt'
        },
        {
          'data': 'lfp_crdt_by'
        },
        {
          'data': 'lfp_id',
          'render': function(data, type, row, meta) {
            link = '<a onclick="updateFollowupStatus(`' + row.lfp_id + '`,`done`)" title="Done"><i class="fa fa-check" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
            '<a onclick="updateFollowupStatus(`' + row.lfp_id + '`,`reschedule`);" title="Reschedule Follow Up "><i class="fa fa-calendar" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
            '<a onclick="leadfollowup_getdetail(`' + row.lfp_id + '`,``);" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;'+
            '<a onclick="deleteFollowup(`' + row.lfp_id + '`)" title="Delete Details "><i class="fa fa-trash" aria-hidden="true"></i></a>';
            // <a href="#"><i class="fa fa-calendar" style="cursor: pointer;" onclick="leadfollowup_renewal(`'+row.lfp_id+'`)"></i></a>
            return link;
          }
        }
      ];
      $('#' + tableNameArr[i] + i).append(customDataTableCount);
      customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
      getTablCount('#' + tableNameArr[i], '#' + tableNameArr[i] + i);
    }

  }

  function getLeadOverview(lead_id) {
    $.ajax({
      type: "POST",
      url: baseUrl + "followup-overview-" + lead_id,
      dataType: "json",
      success: function(response) {
        if(response.upcoming) {
          $('#lfp_up_data').removeClass('hidden');
          $('#lfp_up_hidden').addClass('hidden');
          $('#ufu_id').val(response.upcoming.lfp_id);
          $('#ufu_lead_name').html(response.upcoming.lead_name);
          $('#ufu_date').html(response.upcoming.lfp_next_date);
          $('#ufu_managed_by').html('<b>'+response.upcoming.managed_by+'</b>');
          $('#ufu_status').html(response.upcoming.lfp_followup_status);
          $('#ufu_remark').html(response.upcoming.lfp_remark);
        } else {
          $('#lfp_up_data').addClass('hidden');
          $('#lfp_up_hidden').removeClass('hidden');
          $('#ufu_id').val('');
          $('#ufu_lead_name').html('');
          $('#ufu_date').html('');
          $('#ufu_status').html('');
          $('#ufu_managed_by').html('');
          $('#ufu_remark').html('No Follow Up');
        }
        if(response.last) {

          $('#lfp_last_data').removeClass('hidden');
          $('#lfp_last_hidden').addClass('hidden');

          $('#lfu_id').val(response.last.lfp_id);
          $('#lfu_lead_name').html(response.last.lead_name);
          $('#lfu_date').html(response.last.lfp_next_date);
          $('#lfu_managed_by').html('<b>'+response.last.managed_by+'</b>');
          $('#lfu_status').html(response.last.lfp_followup_status);
          $('#lfu_remark').html(response.last.lfp_remark);
        } else {
          $('#lfp_last_data').addClass('hidden');
          $('#lfp_last_hidden').removeClass('hidden');
          $('#lfu_id').val('');
          $('#lfu_lead_name').html('');
          $('#lfu_date').html('');
          $('#lfu_status').html('');
          $('#lfu_managed_by').html('');
          $('#lfu_remark').html('No Follow Up');
        }
      }
    });
  }
  function leadfollowup_getdetail_ufu() {
    updateFollowupStatus($('#ufu_id').val(),'reschedule');
  }

  function updateFollowupStatus_done_ufu() {
    updateFollowupStatus($('#ufu_id').val(),'done');
  }

  function updateFollowupStatus_ufu() {
    leadfollowup_getdetail($('#ufu_id').val());
  }

  function deleteFollowup_ufu() {
    deleteFollowup($('#ufu_id').val());
  }

  function leadfollowup_getdetail_lfu() {
    //leadfollowup_getdetail($('#lfu_id').val());
    updateFollowupStatus($('#lfu_id').val(),'reschedule');
  }

  function updateFollowupStatus_done_lfu() {
    updateFollowupStatus($('#lfu_id').val(),'done');
  }

  function updateFollowupStatus_lfu() {
    leadfollowup_getdetail($('#lfu_id').val());
  }

  function deleteFollowup_lfu() {
    deleteFollowup($('#lfu_id').val());
  }
  // function getTablCount(tableName, countElement) {
  //   $(tableName).on('draw.dt', function() {
  //     var count = $(tableName).parent().parent().find(tableName + '_info').html().split(' ')[5];
  //     $(countElement).html('(' + (count ? count : 0) + ')');
  //   });
  // }
  function updateFollowupStatus(follow_up_id, type)
  {
    var url, text;
    
    if(type == "done")
    {
      url = baseUrl + "lead/updateFollowupStatus/" + follow_up_id + '/' + <?php echo LEAD_FOLLOWUP_STATUS_DONE; ?>;
      text  = 'Done';
    }
    else if(type == "reschedule")
    {
      url = baseUrl + "lead/updateFollowupStatus/" + follow_up_id + '/' + <?php echo LEAD_FOLLOWUP_STATUS_RESCHEDULE; ?>;
      text  = 'Reschedule';
    }

    cswal({
      text    : 'Do you want to update this follow up as '+text+'?', 
      title   : text, 
      type    : 'confirm', 
      onyes   : function(){
        $.ajax({
          type: "POST",
          url: url,
          dataType: "json",
          success: function(response) {
              leadfollowup_renewal(follow_up_id);
              getFollowupList();
          }
        })
      }, 
      oncancel : function(){
          /*leadfollowup_renewal(follow_up_id);
          getFollowupList();*/
      }
    });
  }


  function clearFollowupModalData()
  {
    $('#lfp_id').val('');
    $('#lfp_type').val('').trigger('change');
    $('#lfp_type').addClass('edited');
    //console.log((response.lfp_next_date_format).split(' ')[1])
    $('#lfp_next_date').val('');
    $('#lfp_next_time').val('');
    $('#lfp_followup_status').val('');
    $('#lfp_instruction').val('');
    $('#lfp_type_remark').val('');
    $('#lfp_remark').val('');
  }

  function leadfollowup_getdetail(follow_up_id, type = '') {
    clearFollowupModalData();
    $.ajax({
      type: "POST",
      url: baseUrl + "lead-followupbyid-" + follow_up_id,
      dataType: "json",
      success: function(response) {
        $('#lfp_id').val(response.lfp_id);
        $('#lfp_type').val(response.lfp_type).trigger('change');
        $('#lfp_type').addClass('edited');

        if(type == 'reschedule')
        {
          $('#lfp_followup_status').val('<?php echo LEAD_FOLLOWUP_STATUS_PENDING; ?>').trigger('change');
          $('#lfp_next_date').removeAttr('disabled');
          $('#lfp_next_time').removeAttr('disabled');
          $('#lfp_remark').val(response.lfp_remark).addClass('edited');
          $('#lfp_next_date').val(now('date'));
          $('#lfp_next_time').val(now('time')).trigger('change');
        }
        else
        {
          $('#lfp_followup_status').val(response.lfp_followup_status).trigger('change');
          $('#lfp_next_date').attr('disabled',true);
          $('#lfp_next_time').attr('disabled',true);
          $('#lfp_remark').val('').addClass('edited');
          $('#lfp_next_date').val((response.lfp_next_date_format).split(' ')[0]);
          $('#lfp_next_time').val(((response.lfp_next_date_format).split(' ')[1])).trigger('change');
        }

        //console.log((response.lfp_next_date_format).split(' ')[1])
        //$('#lfp_next_date').val((response.lfp_next_date_format).split(' ')[0]);
        $('#lfp_instruction').val(response.lfp_instruction);
        $('#lfp_type_remark').val(response.lfp_type_remark);

        //$('#lfp_module_type_id').html('<option value="'+response.lfp_module_type_id+'">'+response.lfp_module_type_id_name+'</option>');
        //$('#lfp_follow_by').html('<option value="' + response.lfp_follow_by + '">' + response.lfp_follow_by_name + '</option>');
        $('#lfp_managed_by').html('<option value="' + response.lfp_managed_by + '">' + response.lfp_managed_by_name + '</option>');

        updateLFPOptn();
        $('#followModal').modal('show');
        $('#followModal .modal-title').html(response.lfp_module_type_id_name);
      }
    });
  }

  function leadfollowup_renewal(follow_up_id) {
    $.ajax({
      type: "POST",
      url: baseUrl + "lead-followupbyid-" + follow_up_id,
      dataType: "json",
      success: function(response) {
        $('#lfp_id').val('');

        $('#lfp_followup_status').val(response.lfp_followup_status).trigger('change');
        $('#lfp_remark').val(response.lfp_remark).addClass('edited');
      
        $('#lfp_next_date').removeAttr('disabled');
        $('#lfp_next_time').removeAttr('disabled');

        //$('#renew_old_lfp_id').val(response.lfp_id);
        $('#renew_old_lfp_id').val('');
        $('#renew_old_lfp_type').val(response.lfp_type);
        $('#lfp_module_type_id').val(response.lfp_module_type_id);
        //$('#lfp_type').val(response.lfp_type).trigger('change');
        $('#lfp_type').html('<option value="'+response.lfp_type+'">'+response.lfp_followup_type+'</option>');
        $('#lfp_next_date').addClass('edited');
        $('#lfp_type_remark').val('');
        
        /*$('#lfp_next_date').val((response.lfp_next_date_format).split(' ')[0]);
        $('#lfp_next_time').val(((response.lfp_next_date_format).split(' ')[1])).trigger('change');*/

        $('#lfp_next_date').val(now('date'));
        $('#lfp_next_time').val(now('time')).trigger('change');
        //$('#lfp_follow_by').val(response.lfp_follow_by).trigger('change');
        //$('#lfp_instruction').val('');
        //check if required ----------------
        //$('#lfp_followup_status').val(response.lfp_followup_status);
        //$('#lfp_instruction').val(response.lfp_instruction);
        //$('#lfp_type_remark').val(response.lfp_type_remark);
        //$('#lfp_remark').val(response.lfp_remark);
        updateLFPOptn();
        $('#followModal').modal('show');
        $('#followModal .modal-title').html(response.lfp_module_type_id_name);
      }
    });
  }

  function updateLFPOptn() {
    if($('#lfp_type').val() == <?php echo LEAD_FOLLOWUP_OTHERS; ?>) {
      $('#lfp_instruction').html('');
      $($('#lfp_instruction')[0].parentElement).addClass('hidden');
      $($('#lfp_type_remark')[0].parentElement).removeClass('hidden');
      $('#lfp_instruction').removeClass('edited');
    } else {
      getLFPOptionInstruction();
      $($('#lfp_type_remark')[0].parentElement).addClass('hidden');
      $($('#lfp_instruction')[0].parentElement).removeClass('hidden');
      $('#lfp_instruction').addClass('edited');
    }
  }

  function getLFPOptionInstruction() {
    $.ajax({
      type: "POST",
      url: baseUrl + "lead/lfp_optn_inst/" + $('#lfp_type').val(),
      dataType: "json",
      success: function(response) {
        $('#lfp_instruction').html(response);
      }
    });
  }

  function addFollowUp() {
    $('#followModal').modal('show');
  }

  function deleteFollowup(followupid) {
    cswal({
      text : 'Do you want to delete this follow up?', 
      title   : 'Done', 
      type    : 'delete', 
      onyes : function(){
        $.ajax({
          type: "POST",
          url: baseUrl + "followup-delete-" + followupid,
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
            getFollowupList();
          }
        });
      }
    });

    /*if(!followupid)
      return;
    if(!confirm('Do you really want to delete this entry')) {
      return;
    }*/
  }

  function getLeadTaskList(lead_id) {
    $('#tblleadtasklist').DataTable().destroy();
    var customDataTableElement = '#tblleadtasklist';
    var customDataTableCount = '<?php echo $dataTableData->table_data_count; ?>';
    var customDataTableServer = <?php echo $dataTableData->table_server_status; ?>;
    var customDataTableUrl = baseUrl + 'lead/lead_task_getlist?table_data_count=' + customDataTableCount + '&lead_id=' + lead_id;
    var customDataTableColumns = [{
        'data': 'tsk_title',
        'render': function(data, type, row, meta) {
          link = '<a href="task-detail-' + row.tsk_id_encrypt + '" >' + data + '</a>';
          return link;
        }
      },
      {
        'data': 'tsk_client_id_name'
      },
      {
        'data': 'tsk_datetime_format'
      },
      {
        'data': 'tsk_progress_status_name'
      },
      {
        'data': 'tsk_user_ass_to_name'
      },
      {
        'data': 'tsk_user_ass_by_name'
      },
      {
        'data': 'tsk_priority_name'
      }
    ];
    customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
    /*$('#lead_name_link').editable({
      type: 'POST',
      params: function(params)
      {
        return {
          led_id : $('#led_id').val(),
          led_name : params.value
        }
      },
      url: baseUrl+"lead/updateLeadData",
      title: 'Enter Name',
      validate: function(value) {
        if($.trim(value) == '') {
            return 'Please enter Lead name';
        }
      },
      success : function( data ) {
        setTimeout(function(){
          $('#lead_name').html($('#lead_name_link').html())
          $('#lead_name_link').html('<i class="fa fa-edit"></i>');
        },10)
      }
    });*/
  }
  $('.lead-custom-editable').editable({
    type: 'POST',
    pk: '12',
    sourceCache: false,
    params: function(params) {
      var peopleData = new Array();
      // console.log(params);
      params.field = $(this).attr('data-gnp-grp');
      params.led_id = $('#led_id').val();
      params.field_value = params.value;
      // params.value+'';
      return params;
    },
    url: baseUrl + 'lead/updateLeadCustomData',
    // title: 'Select Managed By',
    // emptytext: 'No Managed By',
    validate: function(value) {
      if($.trim(value) == '') {
        return 'Please Select a option ';
      }

    },
    success: function(response, newValue) {
      /*console.log(response);
      swal(
            {
                title: "Done",
                text: response.message,
                type: "success",
                icon: "success",
                button: true,
            },function(){
            });
              location.reload();*/

      var select2CustomData = $('.led_temp_select2').select2('data');
      $(this).attr('data-custom_select2_id', select2CustomData[0].id);
      $(this).attr('data-custom_select2_name', select2CustomData[0].text);
      $(this).html(select2CustomData[0].text);
      console.log(select2CustomData[0].text);
      setTimeout(function() {
        console.log($(this).html(select2CustomData[0].text));
      }, 100);
      var gnp_group = $(this).attr('data-gnp-grp');
      if(gnp_group == 'led_lead_status') {
        updateLeadStatus(newValue, true);
        if(newValue == 4) {
          $('#lostModal').modal('show');

        }

      }
      if(gnp_group == 'led_src') {
        $('.led_src').attr('data-custom_select2_id', select2CustomData[0].id);
        $('.led_src').attr('data-custom_select2_name', select2CustomData[0].text);
        $('.led_src').html(select2CustomData[0].text);

      }


      // var selectedVal = '<option value="'select2CustomData[0]+'" selected>'+select2CustomData[1]+'</option>';
      // $('.led_temp_select2').html(selectedVal);
    },
    //MUST be there - it won't work otherwise.
    tpl: '<select class="led_temp_select2" ></select>',
    // tpl: console.log($(this).attr('class')),
    select2: {
      width: '150px',
      //tricking the code to think its in tags mode (it isn't)
      tags: true,
      // maximumSelectionSize: 1,
      // maximumSelectionLength: 1,
      //this is the actual function that triggers to send back the correct text.
      formatSelection: function(item) {
        //test is a global holding variable set during the ajax call of my results json.
        //the item passed here is the ID of selected item. However you have to minus one due zero index array.

        for(var i = 0; i < test.results.length; i++) {
          if(isNaN(item)) {
            return false;
          }
          if(test.results[i].id == item)
            return test.results[i].text;
        }
        //return 4;
        //return test.results[parseInt(item)-1].text;
      },
      insertTag: function(data, tag) {
        // Insert the tag at the end of the results
        // data.push(tag);
        return false;
      },
      ajax: {
        url: function() {
          var gnp_group = '';
          gnp_group = $(this).parents('td').find('.lead-custom-editable').data('gnp-grp');
          var custom_url = 'people/getGenPrmforDropdown/' + gnp_group;
          if(gnp_group == 'led_lead_stage') {
            var led_pipeline = $('#led_pipeline').val();
            custom_url = 'lead/getLeadStageDropdown/' + led_pipeline;
          }
          return baseUrl + custom_url;
        },
        /*url:function (params) {
          console.log(params);
          console.log($(this).parent('.form-group'));
            // ('.lead-custom-editable'));
          var prd_id = $(this).attr('data');
        return  baseUrl + "order/getProductVariants/" + prd_id;
         },*/
        dataType: "json",
        type: 'GET',
        processResults: function(item) {
          //Test is a global holding variable for reference later when formatting the selection.
          //it gets modified everytime the dropdown is modified. aka super convenient.

          test = item;
          return item;
        },

      },

    },
  }).click(function() {
    // $(this).append('');
    selectCustomDatainSelect2(this, '.led_temp_select2');

  });

  function selectCustomDatainSelect2(selectorElement, select2Selector) {
    var customDataId = customDataValue = '';
    customDataId = $(selectorElement).attr('data-custom_select2_id');
    customDataValue = $(selectorElement).attr('data-custom_select2_name');
    selectedVal = '<option value="' + customDataId + '" selected>' + customDataValue + '</option>';
    setTimeout(function() {
      $(select2Selector).html(selectedVal).trigger('change')
    }, 100);
    return true;

  }

  function updateLeadStatus(status, updateStatus) {
    console.log(status);
    var leadData = {};
    if(status == lost) {
      console.log('lost');
      $('.lead-status-won').css('display', 'none');
      $('.lead-status-lost').css('display', 'none');
      $('.led_loss_div').css('display', '');
      leadData.led_loss_reason = $('#led_loss_reason').val();

      leadData.led_loss_reason_text = $('#led_loss_reason').select2('data')[0].text;
      leadData.led_loss_remark = $('#led_loss_remark').val();
      $('#led_status').attr('data-custom_select2_id', status);
      $('#led_status').attr('data-custom_select2_name', 'Lost');
      $('#led_status').html('Lost');
      $('#lead_Status_won').addClass('hidden');
      $('#lead_Status_lost').removeClass('hidden');
      $('.led_loss_div').removeClass('hidden');
    } else if(status == won) {
      console.log('won');
      $('.lead-status-won').css('display', 'none');
      $('.lead-status-lost').css('display', 'none');
      $('.led_loss_div').css('display', 'none');
      $('#led_status').attr('data-custom_select2_id', status);
      $('#led_status').attr('data-custom_select2_name', 'Won');
      $('#led_status').html('Won');
      $('#lead_Status_won').removeClass('hidden');
      $('#lead_Status_lost').addClass('hidden');
    } else {
      console.log('else')
      $('#lead_Status_won').addClass('hidden');
      $('#lead_Status_lost').addClass('hidden');
      $('.lead-status-lost').css('display', 'inline-block');
      $('.lead-status-won').css('display', 'inline-block');
      $('.led_loss_div').css('display', 'none');
    }

    leadData.led_lead_status = status;
    if(!updateStatus) {
      updateLeadData(leadData);
    }
  }

  function updateLeadData(leadData) {
    if(leadData == '') {
      return;
    }

    var lost_reason;
    
    if(leadData.hasOwnProperty('led_loss_remark'))
    {
      lost_reason = leadData.led_loss_reason_text;
      delete leadData.led_loss_reason_text;
    }

    leadData.led_id = $('#led_id').val();
    $.ajax({
      type: "POST",
      url: baseUrl + 'lead/updateLeadCustomData',
      data: leadData,
      dataType: "JSON",
      success: function(response) {
        $('#lostModal').modal('hide');
        if(response.success == true) {
          swal({
            title: "Done",
            text: response.message,
            type: "success",
            icon: "success",
            button: true,
          });

          if(leadData.hasOwnProperty('led_loss_remark'))
          {
            $('.led_loss_div_remark').html(leadData.led_loss_remark);
            $('.led_loss_div_reason').html(lost_reason);
          }
        } else {
          swal({
            title: "Opps",
            text: "Something Went wrong",
            type: "error",
            icon: "error",
            button: true,
          });
          $('#lostModal').modal('show');
        }
        sweetAlert.close();
      }
    });
  }
  $('#lead_loss_form').validate({
    errorPlacement: function(error, element) {
      console.log('element : >>');
      console.log($(element).parent('div').find('.custom-error').html(error));
      console.log('element : <<');
    },
    submitHandler: function(form) {
      console.log(' reached here');
      updateLeadStatus(lost);
    }
  });
  $('.led_remark').editable({
    type: 'POST',
    pk: '12',
    params: function(params) {
      // console.log(params);
      params.field = $(this).attr('data-gnp-grp');
      params.led_id = $('#led_id').val();
      params.field_value = params.value;
      return params;
    },
    tpl: '<textarea class="led_remark_editable"></textarea>',
    url: baseUrl + 'lead/updateLeadCustomData',
    title: 'Enter Remark',
    emptytext: 'No Remark available',
    validate: function(value) {
      if($.trim(value) == '') {
        return 'Please enter Remark';
      }
    },
    success: function(response, newValue) {

      $('.led_remark').html(newValue);
      $('.led_remark_editable').val(newValue);

    },
  }).click(function() {
    var led_remark_text = $('.led_remark').html();
    $('.led_remark_editable').val(led_remark_text);

  });

  function deleteLead(leadid)
  {
    cswal({
      text : 'Do you want to delete this follow up?', 
      title   : 'Done', 
      type    : 'delete', 
      onyes : function(){
        $.ajax({
          type: "POST",
          url: baseUrl + "lead-delete-"+leadid,
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
  // $(function() {
  //     $('.last-follow').matchHeight();
  // });
</script>
</body>
</html>
