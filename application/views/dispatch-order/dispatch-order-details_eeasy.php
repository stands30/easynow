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
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/dispatch-order/dispatch-order-custom.css<?php echo $global_asset_version; ?>">
  <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
  <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<?php $this->load->view('common/header'); ?>
    <!-- OPTIONAL LAYOUT STYLES -->
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
                          <!-- Previous  -->
                             <?php
                                $prev_encrypted_id = isset($dispatch_order->prev_dispatch_order) ? base_url('dispatch-order-details-'.$this->nextasy_url_encrypt->encrypt_openssl($dispatch_order->prev_dispatch_order)):'#';
                                $next_encrypted_id = isset($dispatch_order->next_dispatch_order) ? base_url('dispatch-order-details-'.$this->nextasy_url_encrypt->encrypt_openssl($dispatch_order->next_dispatch_order)):'#';
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
                     <input type="hidden" id="dor_id" name="dor_id" value="<?php if(isset($dispatch_order->dor_id)) echo $dispatch_order->dor_id; ?>">
                   <div class="portlet">
                        <div class="row">
                            <div class="container-fluid">
                                <!-- Details start here -->
                                <aside class="profile-info col-md-12">
                                  <section class="panel">
                                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                      <header class="panel-heading panel-heading-lead color-primary">
                                          <div class="row detail-box">
                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                              <!-- <div class="col-md-8 col-sm-8 col-xs-12"> -->
                                                  <span class="detail-list-heading">Dispatch Order Details</span>
                                                   <br>
                                                  <div class="col-md-12 no-side-padding inner-row">
                                                      <span class="panel-title">

                                                      <?php 
                                                        $dor_name =  isset($dispatch_order->dor_cmp_id_value) ? $dispatch_order->dor_cmp_id_value:'';
                                                        $dor_name.= isset($dispatch_order->dor_code) ? ' - '.$dispatch_order->dor_code:'';
                                                        echo $dor_name; ?>
                                                      </span>
                                                      <?php $dispatch_status = isset($dispatch_order->dor_dispatch_status) ? $dispatch_order->dor_dispatch_status:''; ?>
                                                      <?php  if(!property_exists($dispatch_order, 'private_access') || (property_exists($dispatch_order, 'private_access') && $dispatch_order->private_access == 1)) { if ($edit_access) {  if ($dispatch_status != DISPATCH_ORDER_DISPATCH_STATUS_DISPATCH) { ?>
                                                      <a class="btn btn-edit header-btn dispatch-status-edit" href="<?php echo base_url('dispatch-order-edit-'.$dor_encrypted_id); ?>">
                                                        <i class="fa fa-edit"></i>
                                                        <span class="btn-text"> Edit</span>
                                                      </a>
                                                    <?php } } } ?>
                                                    <?php if ($print_access) { ?>
                                                      <a class="btn btn-edit header-btn" href="<?php echo base_url('dispatch-order-print-'.$dor_encrypted_id); ?>" target="_blank">
                                                        <i class="fa fa-print"></i>
                                                        <span class="btn-text"> Print</span>
                                                      </a>
                                                    <?php } if(!property_exists($dispatch_order, 'private_access') || (property_exists($dispatch_order, 'private_access') && $dispatch_order->private_access == 1)) { if ($delete_access) { ?>
                                                            <a class="btn btn-edit header-btn" href="javascript:;" onclick="return deleteModule(this);" data-title="Delete Dispatch Order" data-toggle="tooltip" data-module_id='<?php echo  $module_id; ?>' data-module_code='<?php echo  $module_code; ?>' >
                                                              <span class="btn-text"><i class="fas fa-trash status-fa-icons"></i>Delete</span>
                                                            </a>
                                                          <?php } } 
                                                         ?>
                                                          <?php
                                                            $module_id = isset($dispatch_order->dor_id) ? $dispatch_order->dor_id:'';
                                                            $module_code = isset($dispatch_order->dor_code) ? $dispatch_order->dor_code:'';
                                                            $cmp_id_encrypted = isset($dispatch_order->dor_cmp_id) ? $this->nextasy_url_encrypt->encrypt_openssl($dispatch_order->dor_cmp_id):''; 
                                                            $cmp_id_value_encrypted = isset($dispatch_order->dor_cmp_id_value) ? $this->nextasy_url_encrypt->encrypt_openssl($dispatch_order->dor_cmp_id_value):'';
                                                            $dor_name_encrypted = isset($dor_name) ? $this->nextasy_url_encrypt->encrypt_openssl($dor_name):'';
                                                             ?>
                                                     <?php  if(!property_exists($dispatch_order, 'private_access') || (property_exists($dispatch_order, 'private_access') && $dispatch_order->private_access == 1)) 
                                                       {
                                                         if ($edit_access) 
                                                            {  
                                                           if ($dispatch_status != DISPATCH_ORDER_DISPATCH_STATUS_DISPATCH)
                                                                 { ?>
                                                          <a id="sample_editable_3_new" href="<?php echo base_url('inventory-out-dispatch').'?cmp_id='.$cmp_id_encrypted .'&cmp_name='.$cmp_id_value_encrypted.'&dor_id='.$dor_encrypted_id.'&dor_name='.$dor_name_encrypted.''; ?>" class="btn green"> Dispatch Out <i class="fa fa-plus"></i> </a>
                                                        <?php }
                                                            }
                                                        } ?>
                                                  </div>
                                              </div>
                                              <div class="col-md-3 col-sm-3 col-xs-12 created-title">
                                                <span class="created">Created By: <?php echo checkValueIsset($dispatch_order->dor_crdt_by_name); ?></span>
                                                <br>
                                                <span class="sp-date">Created On: <?php echo checkValueIsset($dispatch_order->dor_crdt_dt_format); ?></span>
                                              </div>
                                          </div>
                                      </header>
                                      <div class="table-responsive" >
                                        <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                          <tbody>
                                            <tr>
                                              <td><i class="fas fa-user list-level"></i>Customer</td>
                                              <td><a href="<?php echo isset($dispatch_order->dor_cmp_id) ? base_url('company-details-').$this->nextasy_url_encrypt->encrypt_openssl($dispatch_order->dor_cmp_id):'javascript:;' ?>"><?php echo checkValueIsset($dispatch_order->dor_cmp_id_value); ?></a></td>
                                              <td><i class="fas fa-calendar-alt list-level"></i>Dispatch Date</td>
                                              <td><?php echo checkValueIsset($dispatch_order->dor_date_format); ?></td>
                                            </tr>
                                            <tr>
                                              <td><i class="fas fa-handshake icon-client list-level"></i>Approval Status</td>
                                              <td >

                                                <a href="javascript:;" id="dor_apprvl_status" name="dor_apprvl_status" class="dor_apprvl_status dispatch-apprvl-status-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Dispatch Status" data-original-title="Select Dispatch Status" data-custom_select2_id="<?php if(isset($dispatch_order->dor_apprvl_status)) echo $dispatch_order->dor_apprvl_status; ?>" data-custom_select2_name="<?php if(isset($dispatch_order->dor_apprvl_status_value)) echo $dispatch_order->dor_apprvl_status_value; ?>"  data-gnp-grp="dor_apprvl_status"><?php if(isset($dispatch_order->dor_apprvl_status)) echo $dispatch_order->dor_apprvl_status_value; ?> </a>
                                              </td>
                                              <td><i class="fas fa-handshake icon-client list-level"></i>Billing Company</td>
                                              <td ><a href="<?php echo isset($dispatch_order->dor_billing_cmp) ? base_url('company-details-').$this->nextasy_url_encrypt->encrypt_openssl($dispatch_order->dor_billing_cmp):'javascript:;' ?>"><?php echo isset($dispatch_order->dor_billing_cmp_value) ? $dispatch_order->dor_billing_cmp_value:'' ?></a></td>
                                            </tr>
                                             <tr>
                                              <td><i class="fas fa-handshake icon-client list-level"></i>Dispatch Status</td>
                                              <td class="dor_dispatch_status">

                                                <?php  
                                                if ($dispatch_order->dor_dispatch_status_value !='Dispatched') { ?>
                                                <a href="javascript:;" id="dor_dispatch_status" name="dor_dispatch_status" class="dor_dispatch_status dispatch-status-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Dispatch Status" data-original-title="Select Dispatch Status" data-custom_select2_id="<?php if(isset($dispatch_order->dor_dispatch_status)) echo $dispatch_order->dor_dispatch_status; ?>" data-custom_select2_name="<?php if(isset($dispatch_order->dor_dispatch_status_value)) echo $dispatch_order->dor_dispatch_status_value; ?>"  data-gnp-grp="dor_dispatch_status"><?php if(isset($dispatch_order->dor_dispatch_status)) echo $dispatch_order->dor_dispatch_status_value; ?> </a>
                                              <?php }
                                              else{ 
                                                if(isset($dispatch_order->dor_dispatch_status)) echo $dispatch_order->dor_dispatch_status_value; 
                                              }
                                              ?>
                                              </td>
                                              <td><i class="fas fa-handshake icon-client list-level"></i>Dispatch By</td>
                                              <td ><span class="dor_dispatch_status_by"><?php echo isset($dispatch_order->dor_dispatched_by) ? $dispatch_order->dor_dispatched_by:''; ?></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </section>
                                </aside>
                                <!-- Details start here -->
                                <!-- Product list Start here -->
                                 <?php $tax = false;
                                 if(isset($dispatch_order->dor_billing_cmp_state) && isset($dispatch_order->dor_cmp_state) && $dispatch_order->dor_billing_cmp_state != '0' && $dispatch_order->dor_cmp_state != '0' ) 
                                       {
                                         if($dispatch_order->dor_billing_cmp_state == $dispatch_order->dor_cmp_state)
                                         {
                                            $tax = true;
                                         }

                                       }
                                 ?>
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
                                              <th>Quantity</th>
                                               <?php if($product_tax == '1') { ?>
                                              <th>Sub-Total</th>
                                                <?php 
                                                if( $tax_computation == 1 && $dispatch_order->dor_product_tax == '1')
                                                { 
                                                  if($tax == true){ ?>
                                                  <th>CGST</th>
                                                  <th>SGST</th>
                                                  <?php }
                                                  else
                                                   { ?>
                                                  <th>IGST</th>
                                                <?php } 
                                                } }
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
                                             foreach ($dor_product as $dor_product_key ) { ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo isset($dor_product_key->dop_prd_id_value) ? $dor_product_key->dop_prd_id_value:'' ?></td>
                                                <td><?php echo isset($dor_product_key->dop_desc) ? $dor_product_key->dop_desc:'' ?></td>
                                           <?php if($product_size == '1') { ?>
                                                <td><?php echo isset($dor_product_key->dop_prv_id_value) ? $dor_product_key->dop_prv_id_value:'' ?></td>
                                              <?php } ?>
                                                <td><?php echo isset($dor_product_key->dop_rate_format) ? $dor_product_key->dop_rate_format:'' ?></td>
                                                <td><?php echo isset($dor_product_key->dop_qty) ? $dor_product_key->dop_qty:'' ?></td>

                                                  <?php if($product_tax == '1') { ?>
                                                <td><?php echo isset($dor_product_key->dop_sub_total_format) ? $dor_product_key->dop_sub_total_format:'' ?>
                                                </td>
                                              <?php
                                                 if($dispatch_order->dor_product_tax == '1' && $tax_computation == 1 )
                                                 {
                                                  if($tax == true){ 
                                                    $cgst = number_format($dor_product_key->dop_tax_percent/2,2);
                                                    $cgst_amt = number_format($dor_product_key->dop_tax/2,2);
                                                    $sgst = number_format($dor_product_key->dop_tax_percent/2,2);
                                                    $sgst_amt = number_format($dor_product_key->dop_tax/2,2);
                                                    ?>
                                                <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                                   echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                                   <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                                   echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                                 <?php }
                                                 else{ ?>
                                                <td><?php echo isset($dor_product_key->dop_tax_format) ? $dor_product_key->dop_tax_format:'';
                                                   echo isset($dor_product_key->dop_tax_percent) ? ' ('.$dor_product_key->dop_tax_percent.'%)':''; ?></td>
                                                 <?php }
                                                 } }
                                               ?>
                                                <td><?php echo isset($dor_product_key->dop_total_format) ? $dor_product_key->dop_total_format:'' ?></td>
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
                                                <td class="text-right"><b><?php echo isset($dispatch_order->dor_sub_total_format) ? $dispatch_order->dor_sub_total_format:'' ?></b></td>
                                            </tr>
                                           <?php }  
                                               if($tax_computation == '1' && $dispatch_order->dor_product_tax != '1')
                                              {
                                                $tax_percent =  isset($dispatch_order->dor_tax_percent) ? $dispatch_order->dor_tax_percent:'';
                                                if($tax_percent != ''  && $tax == true)
                                                {
                                                      $cgst = number_format($dispatch_order->dor_tax_percent/2,2);
                                                      $cgst_amt = number_format($dispatch_order->dor_tax/2,2);
                                                      $sgst = number_format($dispatch_order->dor_tax_percent/2,2);
                                                      $sgst_amt = number_format($dispatch_order->dor_tax/2,2);
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
                                                  <td class="text-right">IGST <?php echo isset($dispatch_order->dor_tax_percent) ? '('.$dispatch_order->dor_tax_percent.'%)':''; ?></td>
                                                  <td class="text-right"><b><?php echo isset($dispatch_order->dor_tax) ?number_format($dispatch_order->dor_tax,2) :''; ?></b></td>
                                                 </tr>
                                              <?php }
                                               }
                                                if($tax_computation == 1 && $dispatch_order->dor_product_tax == '1')
                                              {
                                               ?>
                                                 <tr>    
                                                  <td class="text-right">Tax </td>
                                                  <td class="text-right"><b><?php echo isset($dispatch_order->dor_tax) ? number_format($dispatch_order->dor_tax,2):''; ?></b></td>
                                                 </tr>
                                               <?php } ?>
                                            <tr>    
                                                <td class="text-right">Total</td>
                                                <td class="text-right"><b><?php echo isset($dispatch_order->dor_total_format) ? $dispatch_order->dor_total_format:'' ?></b></td>
                                            </tr>
                                            
                                          </tbody>
                                        </table>


                                      </div>
                                    </div>
                                  </section>
                                  <div class="clearfix"></div>
                                </aside>
                                <!-- Product list end here -->
                                <!-- Details and tab start here -->
                                <aside class="profile-info col-md-12">
                                  <section class="panel panel-tab">
                                    <div class="portlet light bordered tabbed-detail tabbed-panel tabbed-custom-panel">
                                      <div class="portlet-title tabbable-line tabbable-line-lead">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#portlet_details" data-toggle="tab"> Details </a>
                                            </li>
                                            <li>
                                                <a href="#portlet_add" data-toggle="tab"> Address </a>
                                            </li>
                                            <li>
                                                <a href="#portlet_documents" data-toggle="tab"> Documents </a>
                                            </li>
                                             <li>
                                                <a href="#portlet_act" data-toggle="tab"> Activity </a>
                                            </li>

                                        </ul>
                                      </div>
                                      <div class="portlet-body">
                                        <div class="tab-content">
                                          <div class="tab-pane active" id="portlet_details">
                                            <section class="panel" style="border-top: none;">
                                              <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view tabbed-pannel">
                                                <div class="table-responsive">
                                                <table class="table table-detail-custom table-detail-custom-long table-stylm table-style-tab" style="margin-bottom: 0px;">
                                                  <tbody>
                                                    <tr>
                                                      <td><i class="fas fa-boxes list-level"></i> LR No.</td>
                                                      <td ><?php echo checkValueIsset($dispatch_order->dor_lr_no); ?></td>
                                                      <td><i class="fa fa-comment list-level"></i> Remark</td>
                                                      <td >
                                                        <a href="javascript:;" class="dispatch_order_remark remark-editable" data-type="textarea" data-pk="1" data-placement="top" data-placeholder="Enter Remark" data-original-title="Enter Remark" data-gnp-grp="dor_remark"><?php if(isset($dispatch_order->dor_remark)) echo $dispatch_order->dor_remark; ?></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                </div>

                                              </div>
                                            </section>
                                            <?php if($dor_transport == '1') { ?> 
                                            <section class="panel" style="border-top: none;">
                                              <header class="">
                                                <div class="detail-box mb-10">
                                                  <div>
                                                    <span class="panel-title">Transport Details</span> 
                                                  </div>
                                                </div>
                                              </header>
                                              <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view tabbed-pannel">
                                                <div class="table-responsive">
                                                  <table class="table table-detail-custom table-detail-custom-long table-stylm table-style-tab" style="margin-bottom: 0px;">
                                                    <tbody>
                                                      <tr>
                                                        <td><i class="fas fa-boxes list-level"></i> Mode Of Transport</td>
                                                        <td><?php echo isset($dispatch_order->dor_transport_mode_value) ? $dispatch_order->dor_transport_mode_value:''; ?></td>
                                                        <td><i class="fas fa-truck-loading list-level"></i> Transporter Name </td>
                                                        <td><?php echo isset($dispatch_order->dor_transport_name) ? $dispatch_order->dor_transport_name:''; ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td><i class="fas fa-street-view list-level"></i> Approximate Distance</td>
                                                         <td><?php echo isset($dispatch_order->dor_transport_approx_distance) ? $dispatch_order->dor_transport_approx_distance:''; ?></td>
                                                        <td><i class="far fa-id-card list-level"></i> Transporter ID</td>
                                                        <td><?php echo isset($dispatch_order->dor_transport_id) ? $dispatch_order->dor_transport_id:''; ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td><i class="fa fa-calendar-alt list-level"></i> Transport Date</td>
                                                        <td><?php echo isset($dispatch_order->dor_transport_date_format) ? $dispatch_order->dor_transport_date_format:''; ?></td>
                                                        <td><i class="fas fa-truck list-level"></i>Vehicle Number </td>
                                                        <td><?php echo isset($dispatch_order->dor_transport_vehicle_no) ? $dispatch_order->dor_transport_vehicle_no:''; ?></td>
                                                      </tr>

                                                      <tr>
                                                        
                                                        <td><i class="fas fa-file-alt list-level"></i> Transporter Doc No </td>
                                                        <td colspan="3"><?php echo isset($dispatch_order->dor_transport_doc_no) ? $dispatch_order->dor_transport_doc_no:''; ?></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                            </section>
                                          <?php } ?>

                                          </div>
                                          <div class="tab-pane"  id="portlet_add">
                                            <div class="row">
                                              <div class="container-fluid">
                                                <div class="col-md-12 no-side-padding">
                                                  <section>
                                                      <div class="col-md-6 padding-left-details">
                                                          <header class="">
                                                              <div class="detail-box mb-10">
                                                                  <div>
                                                                      <span class="panel-title">Billing</span>
                                                                  </div>

                                                              </div>
                                                          </header>
                                                          <section class="panel panel-list">
                                                              <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view tabbed-pannel"> 
                                                                <div class="table-responsive" >
                                                                    <table class="table table-detail-custom table-stylm table-item" style="margin-bottom: 0px">
                                                                        <tbody>
                                                                          <tr>
                                                                              <td>Address</td>
                                                                           <td><?php echo checkValueIsset($dispatch_order->dor_billing_addr); ?></td>
                                                                              
                                                                          </tr>
                                                                          <tr>
                                                                              <td>GST Number</td>
                                                                               <td><?php echo checkValueIsset($dispatch_order->dor_billing_gst); ?></td>
                                                                              
                                                                          </tr>
                                                                          <tr>
                                                                              <td>People</td>
                                                                               <td><?php echo checkValueIsset($dispatch_order->dor_billing_people_value); ?></td>
                                                                          </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                              </div>
                                                          </section>
                                                      </div>
                                                       <?php
                                                  if($shipping == '1') {
                                            
                                                       ?> 
                                                      <div class="col-md-6 padding-right-details">
                                                          <header class="">
                                                            <div class="detail-box mb-10">
                                                              <div>
                                                                  <span class="panel-title">Shipping</span>
                                                              </div>
                                                            </div>
                                                          </header>
                                                          <section class="panel panel-list">
                                                            <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view tabbed-pannel"> 
                                                              <div class="table-responsive" >
                                                                <table class="table table-detail-custom table-stylm table-item" style="margin-bottom: 0px">
                                                                  <tbody>                                                   
                                                                    <tr>
                                                                        <td>Address</td>
                                                                         <td><?php echo checkValueIsset($dispatch_order->dor_shipping_addr); ?></td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>GST Number</td>
                                                                         <td><?php echo checkValueIsset($dispatch_order->dor_shipping_gst); ?></td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td>People</td>
                                                                        <td><?php echo checkValueIsset($dispatch_order->dor_shipping_people_value); ?></td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                            </div>
                                                          </section>
                                                      </div> 
                                                      <?php } ?>
                                                  </section>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="tab-pane"  id="portlet_documents">
                                            <div class="row">
                                              <div class="container-fluid">
                                                <div class="col-md-12 no-side-padding">
                                                  <section>
                                                    <div class="col-md-12">
                                                       <?php if(!empty($document_attach)) { ?> 
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
                                                                  foreach ($document_attach as $document_attachkey) { ?>
                                                                     
                                                                  <div class="col-md-12">
                                                                    <a target="_blank" href="<?php echo base_url().DISPATCH_ORDER_DOCUMENT_PATH .$document_attachkey->doc_name; ?>" download>
                                                                      <?php echo $document_attachkey->doc_name; ?></a>
                                                                       <?php if ($delete_access) { ?>
                                                                      <a class="deleteAttach" data-doc_id="<?php echo $document_attachkey->doc_id; ?>" style="padding-left: 15px" data-doc_name="<?php echo $document_attachkey->doc_name; ?>"><i class="fa fa-trash"></i></a>
                                                                    <?php } ?>
                                                                  </div>
                                                                   <?php } ?>
                                                                </div>
                                                              </div>
                                                            </div>
                                                       </div>

                                                     <?php } ?>
                                                    </div>
                                                  </section>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="tab-pane" id="portlet_act">
                                            <div class="row">
                                              <div class="container-fluid">
                                               <div class="col-md-12 no-side-padding">
                                                   <div class="portlet light bordered portlet-container portlet-activity portlet-activity">
                                                      <div class="portlet-title">
                                                          <div class="caption">
                                                              <i class="icon-share font-dark hide"></i>
                                                              <span class="caption-subject bold uppercase">Recent Activities</span>
                                                          </div>
                                                          <div class="actions">
                                                              <div class="btn-group">
                                                                  <a class="btn green btn-add-new  pull-right" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter By
                                                                      <i class="fa fa-angle-down"></i>
                                                                  </a>
                                                                  <a href="javascript:;" class="btn-check-reload pull-right" data-toggle="tooltip" data-original-title="Reload" onclick="getActivity(true)">
                                                                    <i class="fas fa-sync-alt"></i>
                                                                  </a>

                                                                  <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                                                     <label class="mt-checkbox mt-checkbox-outline">
                                                                          <input type="checkbox" data-filter="filter_all" onchange="filter_activity(this)" class="filter-check filter_all_checkbox"  /> All
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
                                                      <div class="portlet-body">
                                                          <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
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
                                          
                                        </div>
                                      </div>

                                    </div>
                                  </section>
                                </aside>
                                <!-- Details and tab ends here -->

                                <!-- Document Attachments start here -->
                                <!-- <aside class="profile-info col-lg-12 no-side-padding mb-40">
                                  <section class="">
                                    <div class="col-md-12">
                                      <label class="bold">Attachment
                                        <a data-toggle="modal" href="#attachment" class="attachments">+</a>
                                      </label>
                                    </div>
                                    <div class="col-md-12 no-side-padding"></div>
                                  </section>
                                </aside> -->
                                <!-- Document Attachments end here -->
                            </div>
                            
                        </div>
                    </div>
                    <!-- -----MAIN CONTENTS END HERE----- -->
                </div>
                <!-- END CONTENT BODY -->
            </div>

            <!-- END CONTENT -->

    </div>

    <!-- END CONTAINER -->

    <!-- Modal Start here -->
        <!-- <div class="modal fade modal-attachments" id="attachment" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <div class="text-center">
                            
                            <h3 class="modal-title text-center">Add Attachment</h3>
                            <span class="sp_line color-primary text-center"></span>
                        </div>
                    </div>
                    <div class="modal-body modal-body-attachments">
                        <div class="col-md-6 form-group fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 30px;">
                            <div class="image-preview" style="padding-left: 0px;">
                                <div id="image_preview"></div>
                                <span class="btn default btn-file btn-file-view">
                                      <input type="file" id="mtg_document" name="mtg_document" class="profile-image btn-file-view">
                                      </span>
                                <span class="custom-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-20">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green" onclick="uploadAttachment()">Upload Document</button>
                    </div>
                </div>
                
            </div>
        </div> -->
        <!-- Modal Ends here -->

    <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url(); ?>assets/project/global/scripts/jquery.matchHeight.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
         </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
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
                            url:baseUrl+"dispatchOrder/deleteDocument",
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
        <script type="text/javascript">
             $(document).ready(function()
            {
                 var primary_key     = 'dor_id';
                 var updateUrl       = baseUrl + 'dispatchOrder/updateCustomData';

                var editableElement = '.remark-editable';
                customTextEditable(editableElement, primary_key, updateUrl);
                
                 var editableElement = '.dispatch-apprvl-status-editable';
                 var select2Class    = 'dispatch_apprvl_status_select2';
                 var dropdownUrl     = 'dispatchOrder/getGenPrmforDropdown/';
                 newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

                 var editableElement = '.dispatch-status-editable';
                 var select2Class    = 'dispatch_status_select2';
                 var dropdownUrl     = 'dispatchOrder/getGenPrmforDropdown/';
                 newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl,'statusUpdate');
                getActivity();
                
             });
             function statusUpdate(response,newValue,custom_update)
             {
                var dispatch_order_pending = '<?php echo DISPATCH_ORDER_DISPATCH_STATUS_PENDING ?>';
                var dispatch_order_dispatch = '<?php echo DISPATCH_ORDER_DISPATCH_STATUS_DISPATCH ?>';
                var approved_by= '';
               nexlog('newValue :'+newValue);
               nexlog('response >> ');
               nexlog(response);
               nexlog('response <<');
                var dispatch_data = JSON.parse(response).response;

                switch(newValue)
                {
                  case dispatch_order_dispatch:
                           nexlog('dispatch_status : approved >> ');
                           nexlog('approved_by : '+dispatch_data.dor_dispatch_by_name);
                           $('.dor_dispatch_status_by').html(dispatch_data.dor_dispatch_by_name+' on '+dispatch_data.dor_dispatch_date);
                           $('.dispatch-status-edit').css('display', 'none');
                           $('.dor_dispatch_status').html(dispatch_data.dispatch_status_group.gnp_name);
                           nexlog('dispatch_status : approved >> ');
                           break;
                  case dispatch_order_pending:
                           nexlog('dispatch_status : pending >> ');
                           $('.dispatch-status-edit').css('display', 'inline-block');
                           $('.dor_dispatch_status_by').html('');
                           $('.dor_dispatch_status').html(dispatch_data.dispatch_status_group.gnp_name);
                           nexlog('dispatch_status : pending << ');
                           break; 
                  default:
                           nexlog('dispatch_status : default >> ');
                           $('.dor-status-approved').css('display', 'inline-block');
                           $('.dor-status-pending').css('display', 'inline-block');
                           $('.dor-status-span').html('');
                           $('.dor_apprved_by').html('');
                           nexlog('dispatch_status : default << ');
                           break;            
                }
                nexlog(' custom_update : '+custom_update);
                nexlog(dispatch_data.dispatch_status_group);
              
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
                          text: "You will not be able to recover this Dispatch Order : "+module_code,
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
                                      dor_id:module_id,
                                      dor_code:module_code+'-deleted',
                                      dor_status:2                    
                                    }
                                   $.ajax({
                                          type: "POST",
                                          url: baseUrl + 'dispatchOrder/updateCustomData',
                                          data: dataString,
                                          dataType: "json",
                                          success: function(response)
                                          {
                                              if (response.success == true)
                                              {
                                                  message="Dispatch Order Deleted successfully";
                                                  
                                                  swal(
                                                  {
                                                      title: "Done",
                                                      text: message,
                                                      type: "success",
                                                      icon: "success",
                                                      button: true,
                                                  });
                                                  window.location.href=baseUrl+"dispatch-order-list";
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
                                swal("Cancelled", "Dispatch Order is safe :)", "error");
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
                      dor_id:$('#dor_id').val(),
                  }
                   $.ajax({
                          type: "POST",
                          url: baseUrl + 'dispatchOrder/getActivity',
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
                            // nexlog(activity);
                            
                            $('.activity-list').html(activity);

                              
                          }
                      });
              }
              
        </script>

            <!-- OPTIONAL SCRIPTS -->
          
            <!-- END OPTIONAL SCRIPTS -->

    </div>

</body>

</html>
