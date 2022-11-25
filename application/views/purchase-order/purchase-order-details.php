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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/purchase-order/purchase-order-custom.css<?php echo $global_asset_version; ?>">
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- END OPTIONAL LAYOUT STYLES -->
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
                                $prev_encrypted_id = isset($purchase_order->prev_purchase_order) ? base_url('purchase-order-details-'.$this->nextasy_url_encrypt->encrypt_openssl($purchase_order->prev_purchase_order)):'#';
                                $next_encrypted_id = isset($purchase_order->next_purchase_order) ? base_url('purchase-order-details-'.$this->nextasy_url_encrypt->encrypt_openssl($purchase_order->next_purchase_order)):'#';
                              ?>
                               <!-- Previous  -->
                              <a href="<?php echo $prev_encrypted_id; ?>" class=" previous" title="">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-left"></i>                                    
                                  </button>
                                  
                              </a>
                              <!-- Next -->
                              <a href="<?php echo $next_encrypted_id; ?>" class="next">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-right"></i>
                                  </button>
                                  
                              </a>
                            </div>
                        </div>
                        <!-- -----MAIN CONTENTS START HERE----- -->
                        <div class="row">
                            <aside class="profile-info col-lg-12">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                        <header class="panel-heading color-primary panelHeading">
                                            <div class="row detail-box">
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                  <input type="hidden" name="por_id" id="por_id" value="<?php echo isset($purchase_order->por_id) ? $purchase_order->por_id:'' ?>">
                                                    <span class="detail-list-heading">Purchase Order Details</span><br>
                                                    <div class="row inner-row">
                                                        <span class="panel-title">
                                                                <?php 
                                                                $por_name =  isset($purchase_order->por_subject) ? $purchase_order->por_subject:'';
                                                                $por_name.= isset($purchase_order->por_code) ? ' - '.$purchase_order->por_code:'';
                                                                echo $por_name; ?>
                                                                 
                                                        </span>&nbsp;&nbsp;
                                                      <?php 
                                                      $status_value =  isset($purchase_order->por_received_status) ? $purchase_order->por_received_status:'';
                                                       
                                                         if(!property_exists($purchase_order, 'private_access') || (property_exists($purchase_order, 'private_access') && $purchase_order->private_access == 1)) {  if($edit_access) { 
                                                          if ($status_value != PURCHASE_ORDER_RECEIVED_STATUS_RECEIVED) { ?>
                                                        <a class="btn-edit" href="<?php echo base_url('purchase-order-edit-').$por_encrypted_id; ?>">
                                                            <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                        </a> 
                                                       <?php } } } if($print_access) { ?>
                                                        <a class="btn btn-edit header-btn" href="<?php echo base_url('purchase-order-print-'.$por_encrypted_id) ?>" target="_blank">
                                                            <i class="fa fa-print"></i><span class="btn-text"> Print</span>
                                                        </a>
                                                      <?php }

                                                            $module_id = isset($purchase_order->por_id) ? $purchase_order->por_id:'';
                                                            $module_code = isset($purchase_order->por_code) ? $purchase_order->por_code:''; 
                                                            $total_stock = isset($purchase_order->total_stock) ? $purchase_order->total_stock:''; 
                                                            if(!property_exists($purchase_order, 'private_access') || (property_exists($purchase_order, 'private_access') && $purchase_order->private_access == 1)) {
                                                              if($delete_access) { ?>
                                                            <a class="btn btn-edit header-btn" href="javascript:;" onclick="return deleteModule(this);" data-title="Delete Purchase Order" data-toggle="tooltip" data-module_id='<?php echo  $module_id; ?>' data-module_code='<?php echo  $module_code; ?>' data-total_stock='<?php echo  $total_stock; ?>'>
                                                              <span class="btn-text"><i class="fas fa-trash status-fa-icons"></i> Delete</span>
                                                            </a>
                                                          <?php } }  ?>

                                                          <?php if ($status_value != PURCHASE_ORDER_RECEIVED_STATUS_RECEIVED) {
                                                              $cmp_id_encrypted = isset($purchase_order->por_vdr_id) ? $this->nextasy_url_encrypt->encrypt_openssl($purchase_order->por_vdr_id):'';
                                                              $cmp_name_encrypted = isset($purchase_order->por_vdr_id_value) ? $this->nextasy_url_encrypt->encrypt_openssl($purchase_order->por_vdr_id_value):'';
                                                              $por_name_encrypted = isset($por_name) ? $this->nextasy_url_encrypt->encrypt_openssl($por_name):'';
                                                             ?>
                                                           <a id="sample_editable_1_new" href="<?php echo base_url('inventory-add-purchase').'?cmp_id='.$cmp_id_encrypted.'&cmp_name='.$cmp_name_encrypted.'&por_id='.$por_encrypted_id.'&por_name='.$por_name_encrypted.''; ?>" class="btn green btn-green-details">Inventory  In <i class="fa fa-plus"></i> </a>
                                                           <?php } ?>  
                                                          <div class="status-received">
                                                            <a class="inv-status-span btn-detail-header btn-highlight btn-draft" href="javascript:;"><?php echo isset($purchase_order->por_received_status_value) ? $purchase_order->por_received_status_value:''; ?></a>
                                                          </div>

                                                          <div class="btn-group">
                                                            
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                    <span class="created">Created By: <?php echo $purchase_order->por_crdt_by_name ?>
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: <?php echo $purchase_order->por_crdt_dt_format; ?>
                                                    </span>
                                                    <br>
                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom table-detail-custom table-style" >
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-handshake icon-client list-level"></i>Billing Company</td>
                                                        <td><a href="<?php echo isset($purchase_order->por_billing_cmp) ? base_url('company-details-').$this->nextasy_url_encrypt->encrypt_openssl($purchase_order->por_billing_cmp):'javascript:;' ?>"><?php echo isset($purchase_order->por_billing_cmp_value) ? $purchase_order->por_billing_cmp_value:'' ?></a></td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>Date</td>
                                                        <td> <?php echo isset($purchase_order->por_date_format) ? $purchase_order->por_date_format:'' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-handshake icon-client list-level"></i>Vendor</td>
                                                        <td><a href="<?php echo isset($purchase_order->por_vdr_id) ? base_url('company-details-').$this->nextasy_url_encrypt->encrypt_openssl($purchase_order->por_vdr_id):'javascript:;' ?>"><?php echo isset($purchase_order->por_vdr_id_value) ? $purchase_order->por_vdr_id_value:'' ?></a></td>
                                                        <td><i class="fas fa-id-card list-level"></i>Reference No</td>
                                                        <td><?php echo isset($purchase_order->por_reference) ? $purchase_order->por_reference:'' ?></td> 
                                                    </tr>
                                                     <tr>
                                                        <td><i class="fas fa-id-card list-level"></i>Status</td>
                                                        <td >
                                                           <a href="javascript:;" id="por_apprvl_status" class="por_apprvl_status module-status-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Status" data-original-title="Select Status" data-custom_select2_id="<?php echo isset($purchase_order->por_apprvl_status) ? $purchase_order->por_apprvl_status:''; ?>" data-custom_select2_name="<?php echo isset($purchase_order->por_apprvl_status_value) ? $purchase_order->por_apprvl_status_value:''; ?>"  data-custom-gnp-grp='por_apprvl_status' data-gnp-grp="por_apprvl_status"><?php echo isset($purchase_order->por_apprvl_status_value) ? $purchase_order->por_apprvl_status_value:''; ?></a>
                                                        </td>
                                                        <td><i class="fas fa-id-card list-level"></i>Approved By</td>
                                                        <td><span class="module_apprved_by"><?php echo isset($purchase_order->por_apprvl_by_details) ? $purchase_order->por_apprvl_by_details:''; ?></span></td>
                                                    </tr>
                                                    <tr>
                                                      <td><i class="fas fa-map-marker list-level" aria-hidden="true"></i>Delivery Address</td>
                                                      <td colspan="3">
                                                        <?php if(isset($purchase_order->por_address) && $purchase_order->por_address != PURCHASE_ORDER_ADDRESS_OTHER)
                                                           { 
                                                            echo $purchase_order->por_address_value;
                                                           } 
                                                           else 
                                                           {
                                                            echo isset($purchase_order->por_other_address) ? $purchase_order->por_other_address:''; 
                                                           }
                                                           ?>
                                                      </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </aside>
                            <aside class="profile-info col-md-12 mb-20">
                                  <section>
                                    <div>
                                      <header class="">
                                        <div class="detail-box mb-10">
                                          <div>
                                            <span class="panel-title">Product list</span> 
                                          </div>
                                        </div>
                                      </header>
                                       <?php $tax = false;
                                         if(isset($purchase_order->por_billing_cmp_state) && isset($purchase_order->por_vdr_cmp_state) && $purchase_order->por_billing_cmp_state != '0' && $purchase_order->por_vdr_cmp_state != '0' ) 
                                               {
                                                 if($purchase_order->por_billing_cmp_state == $purchase_order->por_vdr_cmp_state)
                                                 {
                                                    $tax = true;
                                                 }

                                               }
                                         ?>
                                      <div class="flip-scroll table-div">
                                        <table class="table table-bordered table-striped table-condensed flip-content custom-flip-content">
                                          <thead class="flip-content">
                                            <tr>
                                              <th>Sr. No.</th>
                                              <th>Product</th>
                                              <th>Description</th>
                                          <?php if($product_size == '1') { ?>
                                              <th>Variant</th>
                                            <?php } ?>
                                              <th>Rate</th>
                                              <th>Total Qty</th>
                                              <th>Received Qty</th>
                                              <?php if($product_tax == '1') { ?>
                                              <th>Sub-Total</th>
                                               <?php 
                                                if( $tax_computation == 1 && $purchase_order->por_prod_tax == '1')
                                                { 
                                                  if($tax == true){ ?>
                                                  <th>CGST</th>
                                                  <th>SGST</th>
                                                  <?php }
                                                  else
                                                   { ?>
                                                  <th>IGST</th>
                                                <?php } 
                                                } 
                                              }
                                              ?>                                               
                                              <th>Total</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $i=1;
                                             $cgst =0;
                                             $cgst_amt=0;
                                             $sgst =0;
                                             $sgst_amt=0;
                                             foreach ($por_product as $por_product_key ) { ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo isset($por_product_key->pop_prd_id_value) ? $por_product_key->pop_prd_id_value:'' ?></td>
                                                <td><?php echo isset($por_product_key->pop_prd_desc) ? $por_product_key->pop_prd_desc:'' ?></td>
                                           <?php if($product_size == '1') { ?>
                                                <td><?php echo isset($por_product_key->pop_prv_id_value) ? $por_product_key->pop_prv_id_value:'' ?></td>
                                              <?php } ?>
                                                <td><?php echo isset($por_product_key->pop_price_format) ? $por_product_key->pop_price_format:'' ?></td>
                                                <td><?php echo isset($por_product_key->pop_qty) ? $por_product_key->pop_qty:'' ?></td>
                                                <td><?php echo isset($por_product_key->pop_received_qty) ? $por_product_key->pop_received_qty:'' ?></td>
                                              <?php if($product_tax == '1') { ?>
                                                <td><?php echo isset($por_product_key->pop_sub_total_format) ? $por_product_key->pop_sub_total_format:'' ?>
                                                </td>
                                              <?php
                                                 if($purchase_order->por_prod_tax == '1' && $tax_computation == 1 )
                                                 {
                                                  if($tax == true){ 
                                                    $cgst = number_format($por_product_key->pop_gst_percent/2,2);
                                                    $cgst_amt = number_format($por_product_key->pop_gst/2,2);
                                                    $sgst = number_format($por_product_key->pop_gst_percent/2,2);
                                                    $sgst_amt = number_format($por_product_key->pop_gst/2,2);
                                                    ?>
                                                <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                                   echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                                   <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                                   echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                                 <?php }
                                                 else{ ?>
                                                <td><?php echo isset($por_product_key->pop_gst_format) ? $por_product_key->pop_gst_format:'';
                                                   echo isset($por_product_key->pop_gst_percent) ? ' ('.$por_product_key->pop_gst_percent.'%)':''; ?></td>
                                                 <?php }
                                                 } } 
                                               ?>
                                                <td><?php echo isset($por_product_key->pop_total_format) ? $por_product_key->pop_total_format:'' ?></td>
                                              </tr>
                                            <?php $i++; } ?>
                                          </tbody>
                                        </table>
                                      </div>
                                      <div class="table-responsive deatil-table total-table-list">
                                        <table class="table table-bordered  flip-content custom-flip-content">
                                          <tbody>

                                              <?php if($product_tax != '1' ||  $tax_computation == '1') {  ?>
                                            <tr>    
                                                <td class="text-right">Sub-Total</td>
                                                <td class="text-right"><b><?php echo isset($purchase_order->por_sub_total_format) ? $purchase_order->por_sub_total_format:'' ?></b></td>
                                            </tr>

                                          <?php }  
                                               if($tax_computation == '1' && $purchase_order->por_prod_tax != '1')
                                              {
                                                $tax_percent =  isset($purchase_order->por_gst_percent) ? $purchase_order->por_gst_percent:'';
                                                if($tax_percent != ''  && $tax == true)
                                                {
                                                      $cgst = number_format($purchase_order->por_gst_percent/2,2);
                                                      $cgst_amt = number_format($purchase_order->por_gst/2,2);
                                                      $sgst = number_format($purchase_order->por_gst_percent/2,2);
                                                      $sgst_amt = number_format($purchase_order->por_gst/2,2);
                                               ?>
                                                   <tr>    
                                                    <td class="text-right">CGST <?php echo isset($cgst) ? '('.$cgst.'%)':''; ?></td>
                                                    <td class="text-right"><b><?php echo isset($cgst_amt) ? $cgst_amt:''; ?></b></td>
                                                   </tr>
                                                   <tr>    
                                                    <td class="text-right">SGST <?php echo isset($sgst) ? '('.$sgst.'%)':''; ?></td>
                                                    <td class="text-right"><b><?php echo isset($sgst_amt) ? $sgst_amt:''; ?></b></td>
                                                   </tr>
                                              <?php }else{ ?>
                                                 <tr>    
                                                  <td class="text-right">IGST <?php echo isset($purchase_order->por_gst_percent) ? '('.$purchase_order->por_gst_percent.'%)':''; ?></td>
                                                  <td class="text-right"><b><?php echo isset($purchase_order->por_gst) ?number_format($purchase_order->por_gst,2) :''; ?></b></td>
                                                 </tr>
                                              <?php }
                                               }
                                                if($tax_computation == 1 && $purchase_order->por_prod_tax == '1')
                                              {
                                               ?>
                                                 <tr>    
                                                  <td class="text-right">Tax </td>
                                                  <td class="text-right"><b><?php echo isset($purchase_order->por_gst) ? number_format($purchase_order->por_gst,2):''; ?></b></td>
                                                 </tr>
                                               <?php } ?>


                                            <tr>    
                                                <td class="text-right">Total</td>
                                                <td class="text-right"><b><?php echo isset($purchase_order->por_total_format) ? $purchase_order->por_total_format:'' ?></b></td>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </section>
                                  <div class="clearfix"></div>
                                </aside>
                                <!-- Details and tab start here -->
                                <aside class="profile-info col-md-12">
                                  <section class="panel panel-tab">
                                    <div class="portlet light bordered tabbed-detail tabbed-panel tabbed-custom-panel">
                                      <div class="portlet-title tabbable-line tabbable-line-lead">
                                        <ul class="nav nav-tabs list-view-tab">
                                            <li class="active">
                                                <a href="#portlet_details" data-toggle="tab"> Details </a>
                                            </li>
                                            <li>
                                                <a href="#portlet_act" data-toggle="tab"> Activities </a>
                                            </li>
                                            <li>
                                                <a href="#portlet_inv" data-toggle="tab"> Inventory </a>
                                            </li>
                                        </ul>
                                      </div>
                                      <div class="portlet-body">
                                        <div class="tab-content">
                                          <div class="tab-pane tab-section active" id="portlet_details">
                                            <section class="panel" style="border-top: none;">
                                              <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view tabbed-pannel">
                                                <div class="table-responsive">
                                                <table class="table table-detail-custom table-stylm table-style-tab" style="margin-bottom: 0px;">
                                                  <tbody>
                                                    <tr>
                                                      <td><i class="fa fa-comment list-level"></i> Remarks</td>
                                                    </tr>
                                                    <tr>                                                     
                                                        <td class="text-details"><a href="javascript:;" class="purchase_order_remark remark-editable" data-type="textarea" data-pk="1" data-placement="top" data-placeholder="Enter Remark" data-original-title="Enter Remark" data-gnp-grp="por_remark"><?php if(isset($purchase_order->por_remark)) echo $purchase_order->por_remark; ?> 
                                                    </a></td>
                                                    </tr>
                                                    <tr>
                                                      <td><i class="fa fa-comments list-level"></i>Terms & Condition</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-details">
                                                        <a href="javascript:;" class="purchase_order_terms&condition termsandcondition-editable" data-type="textarea" data-pk="1" data-placement="top" data-placeholder="Enter Terms & Condition" data-original-title="Enter Terms & Condition" data-gnp-grp="por_terms"><?php if(isset($purchase_order->por_terms)) echo $purchase_order->por_terms; ?>
                                                    </td>
                                                    </tr>
                                                  </tbody>
                                                </table>   
                                                </div>
                                              </div>
                                            </section>
                                          </div>
                                          <div class="tab-pane tab-section" id="portlet_act">
                                            <div class="row">
                                              <div class="container-fluid">
                                               <div class="col-md-12 no-side-padding">
                                                   <div class="portlet light bordered portlet-activity">
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
                                                                  <a href="javascript:;" class="btn-check-reload pull-right" data-toggle="tooltip" data-original-title="Reload" onclick="getActivity(true)">
                                                                    <i class="fas fa-sync-alt"></i>
                                                                  </a>

                                                                  <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                                                     <label class="mt-checkbox mt-checkbox-outline">
                                                                          <input type="checkbox" data-filter="filter_all" onchange="filter_activity(this)" class="filter-check filter_all_checkbox" checked="" /> All
                                                                          <span></span>
                                                                      </label>
                                                                    <?php 
                                                                    foreach ($activity_filter as $activity_filter_key) { ?>
                                                                       <label class="mt-checkbox mt-checkbox-outline">
                                                                          <input type="checkbox" data-filter="filter_<?php echo $activity_filter_key->f1; ?>" onchange="filter_activity(this)" class="filter-check"/> <?php echo $activity_filter_key->f2; ?>
                                                                          <span></span>
                                                                      </label>
                                                                    <?php } ?>
                                                                     
                                                                    
                                                                  </div>

                                                                 

                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="portlet-body" tabindex="-1">
                                                          <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0" >
                                                            <div class="recent-activity-log">
                                                              <div class="activity-list">
                                                                <div class="activity-item">
                                                                 
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
                                          <div class="tab-pane " id="portlet_inv">
                                            <div class="row">
                                              <div class="container-fluid no-side-mobile-padding">
                                                <div class="col-md-12 no-side-padding">
                                                  <section>
                                                    <div class="portlet light table-bordered bordered">
                                                      <div class="portlet-title">
                                                          <div class="caption font-dark">
                                                              <span class="list-title-caption caption-subject bold ">Inventory In</span>
                                                              
                                                          </div>
                                                          <div class="tools"> </div>
                                                      </div>
                                                      <div class="portlet-body">
                                                          <table class="table table-striped table-bordered table-quot table-list table-outstanding" id="inventoryListIn">
                                                              <thead>
                                                                  <tr>
                                                                        <th>Location</th>
                                                                        <th>Product</th>
                                                                        <th>Variant</th>
                                                                        <th>Date</th>
                                                                        <th>Quantity</th>
                                                                        <th>Cost</th>
                                                                        <th>Received By</th>
                                                                        <th>Remark</th>
                                                                        <th>Action</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                               
                                                              
                                                              </tbody>
                                                          </table>
                                                      </div>
                                                    </div>
                                                  </section>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                  </section>
                                </aside>
                                <!-- Details and tab ends here -->

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
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
            </script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
               <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> 
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script type="text/javascript">
              $(document).ready(function(){
                        getCustomTableList();
                        getActivity();
                        $('.list-view-tab').on('click', function(){
                          setTimeout(function(){
                            $('#inventoryListIn').DataTable().draw();
                          },200)
                        });

                    });
                var primary_key     = 'por_id';
                 var updateUrl       = baseUrl + 'purchaseOrder/updateCustomData';

                var editableElement = '.remark-editable';
                customTextEditable(editableElement, primary_key, updateUrl);

                var editableElement = '.termsandcondition-editable';
                customTextEditable(editableElement, primary_key, updateUrl);
                
                 var editableElement = '#por_apprvl_status';
                 var select2Class    = 'module_status_editable';
                 var dropdownUrl     = 'purchaseOrder/getGenPrmforDropdown/';
                 newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl,'statusUpdate');
                   function statusUpdate(response,newValue,custom_update)
             {
                var module_stats_apprved = '<?php echo PURCHASE_ORDER_STATUS_APPROVED; ?>';
                var module_stats_cancelled = '<?php echo PURCHASE_ORDER_STATUS_CANCELLED; ?>';
                var approved_by= '';
               nexlog('newValue :'+newValue);
               nexlog('response >> ');
               nexlog(response);
               nexlog('response <<');
                var module_data = JSON.parse(response).response;
                switch(newValue)
                {
                  case module_stats_apprved:
                           nexlog('module_status : approved >> ');
                           nexlog('approved_by : '+module_data.por_apprvl_by_name);
                           $('.module_apprved_by').html(module_data.por_apprvl_by_name+' on '+module_data.por_apprvl_date);
                           // $('.module-status-approved').css('display', 'none');
                           // $('.module-status-reject').css('display', 'none');
                           // $('.module-status-span').html(module_data.module_apprvl_status_name.gnp_name);
                           nexlog('module_status : approved >> ');
                           break;
                  case module_stats_cancelled:
                           nexlog('module_status : rejected >> ');
                           // $('.module-status-approved').css('display', 'none');
                           // $('.module-status-reject').css('display', 'none');
                           // $('.module-status-span').html(module_data.module_apprvl_status_name.gnp_name);
                           // $('.module_apprved_by').html('');
                           nexlog('module_status : rejected << ');
                           break; 
                  default:
                           nexlog('module_status : default >> ');
                          /* $('.module-status-approved').css('display', 'inline-block');
                           $('.module-status-reject').css('display', 'inline-block');*/
                           // $('.module-status-span').html('');
                           // $('.module_apprved_by').html('');
                           nexlog('module_status : default << ');
                           break;            
                }
                nexlog(' custom_update : '+custom_update);
                nexlog(module_data.module_apprvl_status_name);
                   if(module_data.module_apprvl_status_name != ' undefined')
                   {
                      $('module-status-editable').attr('data-custom_select2_id',newValue);            
                      $('module-status-editable').attr('data-custom_select2_name',module_data.module_apprvl_status_name.gnp_name);            
                      $('module-status-editable').html(module_data.module_apprvl_status_name.gnp_name);            
                      // $('.module-status-editable').html(module_data.module_apprvl_status_name.gnp_name);            
                   }
                   getActivity();
                return true;
             }
               function deleteModule(thisElement)
                 {
                   var module_id   = $(thisElement).attr('data-module_id');
                   var module_code = $(thisElement).attr('data-module_code');
                   var total_stock = $(thisElement).attr('data-total_stock');
                   if(total_stock > 0)
                   {
                       swal(
                          {
                              title: "Opps",
                              text: "Please delete Inventory First ",
                              type: "error",
                              icon: "error",
                              button: true,
                          });
                      return false;
                   }
                   swal({
                          title: "Are you sure?",
                          text: "You will not be able to recover this Purchase Order : "+module_code,
                          type: "warning",
                          buttons: true,
                          dangerMode: true,
                          confirmButtonClass: "btn-danger",
                          confirmButtonText: "Yes, delete it!",
                          cancelButtonText: "No, cancel plx!",
                          closeOnConfirm: false,
                          closeOnCancel: false
                            }).then((isConfirm) => {
                              if (isConfirm) 
                              {
                                   dataString =
                                  {
                                      por_id:module_id,
                                      por_code:module_code+'-deleted',
                                      por_status:2                    
                                    }
                                   $.ajax({
                                          type: "POST",
                                          url: baseUrl + 'purchaseOrder/updateCustomData',
                                          data: dataString,
                                          dataType: "json",
                                          success: function(response)
                                          {
                                              if (response.success == true)
                                              {
                                                  message="Purchase Order Deleted successfully";
                                                  
                                                  swal(
                                                  {
                                                      title: "Done",
                                                      text: message,
                                                      type: "success",
                                                      icon: "success",
                                                      button: true,
                                                  });
                                                    window.location.href=baseUrl+'purchase-order-list';
                                                  
                                              }
                                              else
                                              {
                                                  $('.btn_save').button('reset');
                                                  swal(
                                                  {
                                                      title: "Opps",
                                                      text: "Something Went wrong",
                                                      type: "error",
                                                      icon: "error",
                                                      button: true,
                                                  });
                                              }
                                          }
                                      });
                              }else {
                                swal("Cancelled", "Purchase Order is safe :)", "error");
                              }
                          });

                 }
                     $('.filter_all_checkbox').click(function(){
                console.log(this.checked);
                  $('.filter-check').trigger('click');
                if(this.checked == true)
                {
                  $('.filter-check').attr('checked','checked');
                }
                else if(this.checked == false)
                {
                  $('.filter-check').removeAttr('checked');
                }
               });
          function filter_activity(thisElement){
           
             $('.timeline-items').addClass('hidden');
             $('.filter_all').addClass('hidden');
             $('.filter-check:checked').each(function(){
                if($(this).prop('checked') == true)
                {
                 var visible_filter = $(this).data('filter');
                 /* if(visible_filter != 'filter_all')
                  {
                    $('.filter_all_checkbox').removeAttr('checked');
                  }*/
                 
                  $('.'+visible_filter).removeClass('hidden');
                }
              });

          }
          function getActivity(filter_all)
             {
              
               dataString =
                  {
                      por_id:$('#por_id').val(),
                  }
                   $.ajax({
                          type: "POST",
                          url: baseUrl + 'purchaseOrder/getActivity',
                          data: dataString,
                          dataType: "json",
                          

                          success: function(response)
                          {
                            var activity = '';
                            // nexlog(response);
                            
                            for (var i =0; i< response.length; i++)
                            {
                               activity +=  '<div class="activity-item"> <div class="activity-content filter_all '+response[i].field_filter+'">'+
                                              
                                              '<span class="activity-main-text">'+
                                                  '<a class="activity-user" href="'+baseUrl+'people-details-'+response[i].ppl_encrypted_id+'">'
                                                    +response[i].field_changed_by+
                                                  '</a> '
                                                  +response[i].field_changed_desc+
                                              '</span>'+
                                              '<span class="activity-time"> '+getTimeDiff(response[i].created_dt)+'</span>'+
                                            '</div> </div>';
                            }
                            nexlog(activity);
                            
                            $('.activity-list').html(activity);

                              
                          }

                          
                      });
              }
                function getCustomTableList()
           {
               var multiTableArray = {
                  'inventoryListIn': {
                    'table_function_name': 'purchase-order-getinventorylist',
                    'table_function_count': <?php echo isset($leadfollowUpTypeToday->table_data_count) ? $leadfollowUpTypeToday->table_data_count:0; ?>,
                    'table_function_server': <?php echo isset($leadfollowUpTypeToday->table_server_status) ? $leadfollowUpTypeToday->table_server_status:'false'; ?>
                  },
                  /*'inventoryListOut': {
                    'table_function_name': 'inventory-detail-list-'+<?php echo PRODUCT_INVENTORY_TYPE_OUT; ?>,
                    'table_function_count': <?php echo isset($leadfollowUpTypeToday->table_data_count) ? $leadfollowUpTypeToday->table_data_count:0; ?>,
                    'table_function_server': <?php echo isset($leadfollowUpTypeToday->table_server_status) ? $leadfollowUpTypeToday->table_server_status:'false'; ?>
                  },*/
                }
                var tableNameArr = Object.keys(multiTableArray);
                for(var i = 0; i < tableNameArr.length; i++) {
                  $('#'+tableNameArr[i]).DataTable().destroy();
                  var customDataTableElement = '#' + tableNameArr[i];
                  var customDataTableCount = multiTableArray[tableNameArr[i]].table_function_count;
                  var customDataTableServer = multiTableArray[tableNameArr[i]].table_function_server;
                  var customDataTableUrl = baseUrl + multiTableArray[tableNameArr[i]].table_function_name+'?por_id='+<?php echo $purchase_order->por_id; ?>+'&table_data_count=' + customDataTableCount;
                  var size_visible = <?php echo ( $product_size == 1) ? 'true':'false'; ?>;
                  var columnDefs= [
                      {
                          "targets": [ 2 ],
                          "visible": size_visible,
                          "searchable": size_visible
                      },
                     
                  ];
                  var customDataTableColumns = [

                    {
                      'data': 'piv_location_value'
                    },
                     {
                      'data': 'piv_prd_id_value',
                      'render': function(data, type, row, meta) {
                       var link = '<a href="'+baseUrl+'product-details-'+row.piv_prd_encrypted_id+'" title="view Product Details"> '+row.piv_prd_id_value+'</a>&nbsp;&nbsp;';
                       return link;
                       }
                     },
                    {
                      'data': 'piv_prv_id_value'
                    },
                    {
                      'data': 'piv_date_format'
                    },
                    {
                      'data': 'piv_qty'
                    },
                    {
                      'data': 'piv_price_format'
                    },
                   
                       {
                      'data': 'piv_managed_by_name',
                      'render': function(data, type, row, meta) {
                       var link = '<a href="'+baseUrl+'people-details-'+row.piv_managed_by_encrypted_id+'" title="view Product Details"> '+row.piv_managed_by_name+'</a>&nbsp;&nbsp;';
                       return link;
                       }
                     },
                      {
                      'data': 'piv_remark'
                    },
                    {
                      'data': 'piv_id',
                      'render': function(data, type, row, meta) {
                        var link='';
                        if(row.private_access == 0)
                            return "<?php echo FORM_INACCESS_MESSAGE; ?>";
                         <?php if($delete_access) { ?>
                        link = ' <a class="btn btn-edit header-btn " href="javascript:;" onclick="return deleteModule(this);" data-title="Delete Stock Transfered details" data-toggle="tooltip" data-module_id='+row.piv_id+' data-module_code="" data-piv_inv_type="'+row.piv_inv_type+'" data-piv_type="'+row.piv_type+'" data-piv_type_id="'+row.piv_type_id+'"><span class="btn-text"><i class="fas fa-trash status-fa-icons"></i></span></a>';
                      <?php } ?>
                        // <a href="#"><i class="fa fa-calendar" style="cursor: pointer;" onclick="leadfollowup_renewal(`'+row.lfp_id+'`)"></i></a>
                        return link;
                      }
                    }
                  ];
                  $('#'+tableNameArr[i]+i).append(customDataTableCount);
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
                            },
                            columnDefs:columnDefs
                          });
                  // getTablCount('#' + tableNameArr[i], '#' + tableNameArr[i] + i);
                }
           }
              function getTablCount(tableName, countElement) {
              $(tableName).on('draw.dt', function() {
                var count = $(tableName).parent().parent().find(tableName + '_info').html().split(' ')[5];
                /*console.log($(tableName).parent().parent().find(tableName+'_info').html().split(' ')[5]);
                console.log(count);
                console.log(countElement);*/
                $(countElement).html('(' + (count ? count : 0) + ')');
              });
            }
                 function deleteModule(thisElement)
                 {
                   var module_id    = $(thisElement).attr('data-module_id');
                   var module_code  = $(thisElement).attr('data-module_code');
                   var piv_inv_type = $(thisElement).attr('data-piv_inv_type');
                   var piv_type     = $(thisElement).attr('data-piv_type');
                   var piv_type_id  = $(thisElement).attr('data-piv_type_id');
                   var inventory_in  = <?php echo PRODUCT_INVENTORY_TYPE_IN; ?>;
                   var inventory_out  = <?php echo PRODUCT_INVENTORY_TYPE_OUT; ?>;
                   var stock_transfer_in  = <?php echo PRODUCT_INVENTORY_IN_TYPE_STOCK_TRANSFER; ?>;
                   var stock_transfer_out  = <?php echo PRODUCT_INVENTORY_OUT_TYPE_STOCK_TRANSFER; ?>;
                   var stock_transfer     = false;
                   if(piv_inv_type == inventory_in)
                   {
                     if(piv_type == stock_transfer_in)
                     {
                       stock_transfer = true;
                     }
                   }
                   if(piv_inv_type == inventory_out)
                   {
                     if(piv_type == stock_transfer_out)
                     {
                       stock_transfer = true;
                     }
                   }

                   if(stock_transfer)
                   {
                      swal(
                          {
                              title: "Opps",
                              text: "Please delete Stock Transfer First ",
                              type: "error",
                              icon: "error",
                              button: true,
                          });
                      return false;
                   }
                   swal({
                          title: "Are you sure?",
                          text: "You will not be able to recover this Inventory : "+module_code,
                          type: "warning",
                          buttons: true,
                          dangerMode: true,
                          confirmButtonClass: "btn-danger",
                          confirmButtonText: "Yes, delete it!",
                          cancelButtonText: "No, cancel plx!",
                          closeOnConfirm: false,
                          closeOnCancel: false
                            }).then((isConfirm) => {
                              if (isConfirm) 
                              {
                                   dataString =
                                  {
                                     piv_id:module_id,
                                     piv_code:module_code+'-deleted',
                                     piv_status:2 ,
                                     piv_inv_type:piv_inv_type,                   
                                     piv_type:piv_type,                   
                                     piv_type_id:piv_type_id                   
                                    }
                                   $.ajax({
                                          type: "POST",
                                          url: baseUrl + 'inventory/updateCustomData',
                                          data: dataString,
                                          dataType: "json",
                                          success: function(response)
                                          {
                                              if (response.success == true)
                                              {
                                                  message=" Inventory Deleted successfully";
                                                  
                                                  swal(
                                                  {
                                                      title: "Done",
                                                      text: message,
                                                      type: "success",
                                                      icon: "success",
                                                      button: true,
                                                  });
                                                 
                                                    getCustomTableList();
                                                  
                                              }
                                              else
                                              {
                                                  $('.btn_save').button('reset');
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
                              }else {
                                swal("Cancelled", "Inventory is safe :)", "error");
                              }
                          });

                 }
            </script>
        </div>
</body>
</html>
