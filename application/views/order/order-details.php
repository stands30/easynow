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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/order/css/order-custom.css<?php echo $global_asset_version; ?>">
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
                                $prev_encrypted_id = isset($order->prev_order) ? base_url('order-details-'.$this->nextasy_url_encrypt->encrypt_openssl($order->prev_order)):'#';
                                $next_encrypted_id = isset($order->next_order) ? base_url('order-details-'.$this->nextasy_url_encrypt->encrypt_openssl($order->next_order)):'#';
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
                                    <input type="hidden" name="ord_id" id="ord_id" value="<?php echo isset($order->ord_id)? $order->ord_id:''; ?>">
                                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                        <header class="panel-heading color-primary panelHeading">
                                            <div class="row detail-box">
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <span class="detail-list-heading">Order Details</span><br>
                                                    <div class="row inner-row">
                                                        <span class="panel-title">
                                                                <?php echo isset($order->ord_title)? $order->ord_title:''; ?> - <?php echo isset($order->ord_code)? $order->ord_code:''; ?>
                                                        </span>&nbsp;&nbsp;
                                                        <?php if(!property_exists($order, 'private_access') || (property_exists($order, 'private_access') && $order->private_access == 1)) {
                                                    if($edit_access) { ?>
                                                        <a class="btn-edit" href="<?php echo base_url('order-edit-'.$ord_encrypted_id); ?>">
                                                            <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                        </a> 
                                                        <?php }  
                                                         $module_id = isset($order->ord_id) ? $order->ord_id:'';
                                                            $module_code = isset($order->ord_code) ? $order->ord_code:''; 
                                                            if($delete_access) { ?>                                                  
                                                       <a class="btn btn-edit header-btn" href="javascript:;" onclick="return deleteModule(this);" data-title="Delete Order" data-toggle="tooltip" data-module_id='<?php echo  $module_id; ?>' data-module_code='<?php echo  $module_code; ?>' >
                                                              <span class="btn-text"><i class="fas fa-trash status-fa-icons"></i> Delete</span>
                                                            </a>
                                                        <?php } } ?>
                                                      <!--   <a class="btn-edit" href="#">
                                                            <i class="fas fa-truck-loading"></i><span class="btn-text"> Dispatch Order</span>
                                                        </a> -->
                                                        <span class="order-tags status-processing"><?php echo isset($order->ord_dispatch_status_value)? $order->ord_dispatch_status_value:''; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                    <span class="created">Created By: <?php echo isset($order->ord_crdt_by_name)? $order->ord_crdt_by_name:''; ?>
                                                    </span>
                                                    <br>
                                                    <span class="sp-date">Created On: <?php echo isset($order->ord_crdt_dt_format)? $order->ord_crdt_dt_format:''; ?>
                                                    </span>
                                                    <br>
                                                </div>
                                            </div>
                                        </header>
                                        <div class="table-responsive">
                                            <table class="table custom table-detail-custom table-style" >
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-handshake icon-client list-level"></i>Billing Company </td>
                                                        <td><a href="<?php echo isset($order->ord_billing_cmp) ? base_url('company-details-').$this->nextasy_url_encrypt->encrypt_openssl($order->ord_billing_cmp):'javascript:;' ?>"><?php echo isset($order->ord_billing_cmp_value) ? $order->ord_billing_cmp_value:'' ?></a>
                                                        </td> 
                                                        <td><i class="fas fa-chalkboard-teacher icon-lead list-level"></i> Lead</td> 
                                                        <td><a href="<?php echo isset($order->ord_led_id) ? base_url('company-details-').$this->nextasy_url_encrypt->encrypt_openssl($order->ord_led_id):'javascript:;' ?>"><?php echo isset($order->ord_led_id_value) ? $order->ord_led_id_value:''; ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <!-- <td><i class="fas fa-boxes list-level"></i>Order No</td>
                                                        <td>
                                                            <?php echo isset($order->ord_code) ? $order->ord_code:''; ?>
                                                        </td> -->
                                                        <td><i class="fas fa-handshake icon-client list-level"></i>Client</td>
                                                        <td><a href="<?php echo isset($order->ord_cmp_id) ? base_url('company-details-').$this->nextasy_url_encrypt->encrypt_openssl($order->ord_cmp_id):'javascript:;' ?>"><?php echo isset($order->ord_cmp_id_value) ? $order->ord_cmp_id_value:''; ?></a>
                                                        </td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>Date</td>
                                                        <td>    <?php echo isset($order->ord_date_format) ? $order->ord_date_format:''; ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        
                                                        <td><i class="fas fa-id-card list-level"></i>Reference No</td>
                                                        <td><?php echo isset($order->ord_reference_no) ? $order->ord_reference_no:''; ?></td> 
                                                        <td><i class="fas fa-file-medical list-level"></i> Order Type</td>
                                                        <td><a href="javascript:;" id="order_type" class="ord_type " data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Order Type" data-original-title="Select Order Type" data-custom_select2_id="<?php echo isset($order->ord_type) ? $order->ord_type:''; ?>" data-custom_select2_name="<?php echo isset($order->ord_type_value) ? $order->ord_type_value:''; ?>"  data-custom-gnp-grp='ord_type' data-gnp-grp="ord_type"><?php echo isset($order->ord_type_value) ? $order->ord_type_value:''; ?>
                                                        </a>
                                                    </td> 
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td><i class="fas fa-layer-group list-level"></i> Order Category </td>
                                                        <td><a href="javascript:;" id="order_category" class="ord_category " data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Order Category" data-original-title="Select Order Category" data-custom_select2_id="<?php echo isset($order->ord_category) ? $order->ord_category:''; ?>" data-custom_select2_name="<?php echo isset($order->ord_category_value) ? $order->ord_category_value:''; ?>"  data-custom-gnp-grp='ord_category' data-gnp-grp="ord_category"><?php echo isset($order->ord_category_value) ? $order->ord_category_value:''; ?>
                                                            </a>
                                                        </td> 
                                                        <td><i class="fas fa-cart-plus list-level"></i> Order Status</td>
                                                        <td><a href="javascript:;" id="ord_order_status" class="ord_order_status " data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Order Status" data-original-title="Select Order Status" data-custom_select2_id="<?php echo isset($order->ord_order_status) ? $order->ord_order_status:''; ?>" data-custom_select2_name="<?php echo isset($order->ord_order_status_value) ? $order->ord_order_status_value:''; ?>"  data-custom-gnp-grp='ord_order_status' data-gnp-grp="ord_order_status"><?php echo isset($order->ord_order_status_value) ? $order->ord_order_status_value:''; ?>
                                                            </a>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-user list-level"></i> Payment Due Days</td>
                                                        <td><span class="ord_payment_due_days"></span></td>
                                                        <td><i class="fas fa-user list-level"></i> Dispatch Due Days</td>
                                                        <td><span class="ord_dispatch_due_days"></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </aside>
                            <aside class="profile-info col-md-12 mb-20">
                                <section class="panel panel-tab">
                                    <div class="portlet light bordered tabbed-detail tabbed-panel tabbed-custom-panel">
                                        <div class="portlet-title tabbable-line tabbable-line-lead">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#portlet_ord_decs" data-toggle="tab"> Order Description</a>
                                                </li>
                                                <li>
                                                    <a href="#portlet_ord_mgnt" data-toggle="tab"> Order Management </a>
                                                </li>
                                                <li>
                                                    <a href="#portlet_act" data-toggle="tab"> Activity </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="portlet_ord_decs">
                                                    <header class="">
                                                        <div class="detail-box mb-10">
                                                          <div>
                                                              <span class="panel-title">Product list</span> 
                                                          </div>
                                                        </div>
                                                    </header>
                                                    <?php $tax = false;
                                                     if(isset($order->ord_billing_cmp_state) && isset($order->ord_cmp_state) && $order->ord_billing_cmp_state != '0' && $order->ord_cmp_state != '0' ) 
                                                           {
                                                             if($order->ord_billing_cmp_state == $order->ord_cmp_state)
                                                             {
                                                                $tax = true;
                                                             }
                                                           }
                                                     ?>
                                                    <div class="flip-scroll table-div">
                                                <table class="table table-bordered table-striped table-condensed flip-content custom-flip-content">
                                                    <thead class="flip-content">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Description</th>
                                                            <?php if($product_size == '1') { ?>
                                                            <th>Variant</th>
                                                            <?php } ?>
                                                            <th>Rate</th>
                                                            <th>Quantity</th>
                                                        <?php if($product_tax == '1') { ?>
                                                            <th>Amount</th>
                                                            <th>Discount</th>
                                                              <th>Sub-Total</th>
                                                               <?php 
                                                                if( $tax_computation == 1 )
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
                                                         foreach ($ord_product as $ord_product_key ) { ?>
                                                        <tr>
                                                            <td><?php echo isset($ord_product_key->orp_prd_id_value) ? $ord_product_key->orp_prd_id_value:'' ?></td>
                                                            <td><?php echo isset($ord_product_key->orp_desc) ? $ord_product_key->orp_desc:'' ?></td>
                                                               <?php if($product_size == '1') { ?>
                                                            <td><?php echo isset($ord_product_key->orp_prv_id_value) ? $ord_product_key->orp_prv_id_value:'' ?></td>
                                                                <?php } ?>
                                                            <td><?php echo isset($ord_product_key->orp_rate) ? $ord_product_key->orp_rate:'' ?></td>
                                                            <td><?php echo isset($ord_product_key->orp_qty) ? $ord_product_key->orp_qty:'' ?></td>
                                                        <?php if($product_tax == '1') { ?>
                                                            <td><?php echo isset($ord_product_key->orp_prd_amt) ? $ord_product_key->orp_prd_amt:'' ?></td>
                                                            <td><?php echo isset($ord_product_key->orp_disc_amt) ? $ord_product_key->orp_disc_amt:'' ?> (<?php echo isset($ord_product_key->orp_disc_type_value) ? $ord_product_key->orp_disc_type_value:'' ?>)</td>
                                                            <td><?php echo isset($ord_product_key->orp_sub_total) ? $ord_product_key->orp_sub_total:'' ?></td>
                                                             <?php echo 'tax_computation '.$tax_computation;
                                                         if(  $tax_computation == 1 )
                                                         {
                                                          if($tax == true){ 
                                                            $cgst = number_format($ord_product_key->orp_tax_percent/2,2);
                                                            $cgst_amt = number_format($ord_product_key->orp_tax/2,2);
                                                            $sgst = number_format($ord_product_key->orp_tax_percent/2,2);
                                                            $sgst_amt = number_format($ord_product_key->orp_tax/2,2);
                                                            ?>
                                                            <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                                           echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                                           <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                                           echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                                         <?php }
                                                         else{ ?>
                                                            <td><?php echo isset($ord_product_key->orp_tax) ? $ord_product_key->orp_tax:'';
                                                            echo isset($ord_product_key->orp_tax_percent) ? ' ('.$ord_product_key->orp_tax_percent.'%)':''; ?></td>
                                                            <?php }
                                                            } 
                                                        }
                                                            ?>
                                                            <td><?php echo isset($ord_product_key->orp_total) ? $ord_product_key->orp_total:'' ?></td>
                                                        </tr>
                                                         <?php $i++; } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                                   
                                                   <div class="row">
                                                       <div class="col-md-12">
                                                           <div class="table-responsive deatil-table total-table-list">
                                                                <table class="table table-bordered  flip-content custom-flip-content">
                                                                   <tbody>
                                          
                                                 <?php if($order->ord_product_tax != '1') { ?>
                                                <tr>    
                                                    <td class="text-right">Amt</td>
                                                    <td class="text-right"><b><?php echo isset($order->ord_amt) ? number_format($order->ord_amt,2):''; ?></b></td>
                                                </tr>
                                                <tr>    
                                                    <td class="text-right">Discount  <?php 
                                                    $discount = ($order->ord_disc != null && $order->ord_disc_type != null && $order->ord_disc_type!=QUOTATION_DISC_TYPE_RS) ? $order->ord_disc:'';
                                                    if($discount != QUOTATION_DISC_TYPE_PERCENTAGE)
                                                    {
                                                     echo isset($order->ord_disc_type_name) ? '('.$discount.$order->ord_disc_type_name.')':''; 
                                                    } ?></td>
                                                    <td class="text-right"><b>
                                                        <?php  echo isset($order->ord_disc_amt) ? number_format($order->ord_disc_amt,2):'';
                                                     ?>
                                                    </b></td>
                                                </tr>
                                          <?php } ?>
                                                  <tr>    
                                                    <td class="text-right">Sub-Total</td>
                                                    <td class="text-right"><b><?php echo isset($order->ord_sub_total) ? number_format($order->ord_sub_total,2):''; ?></b></td>
                                                </tr>
                                                <?php 
                                               if($tax_computation == 1 && $order->ord_product_tax != '1')
                                              {
                                                $tax_percent =  isset($order->ord_tax_percent) ? $order->ord_tax_percent:'';
                                                if($tax_percent != ''  && $tax == false)
                                                {
                                                      $cgst = number_format($order->ord_tax_percent/2,2);
                                                      $cgst_amt = number_format($order->ord_tax/2,2);
                                                      $sgst = number_format($order->ord_tax_percent/2,2);
                                                      $sgst_amt = number_format($order->ord_tax/2,2);
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
                                                  <td class="text-right">IGST <?php echo isset($order->ord_tax_percent) ? '('.$order->ord_tax_percent.'%)':''; ?></td>
                                                  <td class="text-right"><b><?php echo isset($order->ord_tax) ? $order->ord_tax:''; ?></b></td>
                                                 </tr>
                                              <?php }
                                               }
                                                if($tax_computation == 1 && $order->ord_product_tax == '1')
                                              {
                                               ?>
                                                 <tr>    
                                                  <td class="text-right">Tax </td>
                                                  <td class="text-right"><b><?php echo isset($order->ord_tax) ? number_format($order->ord_tax,2):''; ?></b></td>
                                                 </tr>
                                               <?php } ?>
                                            <tr>    
                                                <td class="text-right">Total</td>
                                                <td class="text-right"><b><?php echo isset($order->ord_total_format) ? $order->ord_total_format:'' ?></b></td>
                                            </tr>
                                            
                                          </tbody>
                                          <input type="hidden" name="ocr_id" id="ocr_id" value="<?php echo isset($ord_courier->ocr_id) ? $ord_courier->ocr_id:'' ?>">
                                                                </table>
                                                            </div>
                                                       </div>
                                                   </div>
                                                </div>
                                                <div class="tab-pane " id="portlet_ord_mgnt">
                                                    <div class="row">
                                                        <div class="container-fluid">
                                                            <div class="col-md-12 no-side-mobile-padding">
                                                                <section>
                                                                    <div class="col-md-12 no-side-padding">
                                                                        <div class="btn-group btn-custom-block">
                                                                            <a href="<?php echo base_url('order-print-').$ord_encrypted_id ?>" class="btn green"> Print Package Slip</a>
                                                                            <a href="<?php echo base_url('invoice-add') ?>" class="btn green"> Convert To Invoice</a>
                                                                            <a href="<?php echo base_url('invoice-details-M2NFN2VEa2JtMzhiTWVxeC9pdC82Zz09') ?>" class="btn green">View Invoice</a>
                                                                             <?php if (isset($ord_courier->ocr_id)=='') { ?>
                                                                            
                                                                            <a href="#" id="shipping" class="btn green" data-toggle="modal" data-target="#shipping-edit">Confirm / Edit Shipment</a>
                                                                        <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="container-fluid">
                                                        <div class="col-md-12 no-side-mobile-padding">
                                                            <section>
                                                                  <div class="col-md-6 col-sm-6 padding-left-details">
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
                                                                                                  <td><?php echo isset($order->ord_billing_addr) ? $order->ord_billing_addr:'' ?></td>
                                                                                              </tr>
                                                                                              <tr>
                                                                                                  <td>GST Number</td>
                                                                                                  <td><?php echo isset($order->ord_billing_gst) ? $order->ord_billing_gst:'' ?></td>
                                                                                              </tr>
                                                                                              <tr>
                                                                                                  <td>People</td>
                                                                                                  <td><?php echo isset($order->ord_crdt_by_name) ? $order->ord_crdt_by_name:'' ?></td>
                                                                                              </tr>
                                                                                          </tbody>
                                                                                      </table>
                                                                                  </div>
                                                                          </div>
                                                                      </section>
                                                                  </div>
                                                                  <div class="col-md-6 col-sm-6 padding-right-details">
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
                                                                                              <td><?php echo isset($order->ord_shipping_addr) ? $order->ord_shipping_addr:'' ?></td>
                                                                                              </tr>
                                                                                              <tr>
                                                                                                <td>GST Number</td>
                                                                                                <td><?php echo isset($order->ord_shipping_gst) ? $order->ord_shipping_gst:'' ?></td>
                                                                                              </tr>
                                                                                              <tr>
                                                                                                <td>People</td>
                                                                                                <td><?php echo isset($order->ord_crdt_by_name) ? $order->ord_crdt_by_name:'' ?></td>
                                                                                              </tr>                            
                                                                                          </tbody>
                                                                                      </table>
                                                                                  </div>
                                                                          </div>
                                                                      </section>
                                                                  </div> 
                                                            </section>
                                                            <div class="clearfix"></div>
                                                            <section>
                                                                <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view courier-details mb-20">
                                                                    <div class="table-responsive">
                                                                        <table class="table custom table-detail-custom table-style" >
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="4"><i class="fa fa-comment list-level"></i> Remarks</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4" class="order-sub-details">
                                                                                        <?php echo isset($order->ord_remark) ? $order->ord_remark:'' ?>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4"><i class="fa fa-comments list-level"></i> Terms & Condition </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4" class="order-sub-details">
                                                                                        <?php echo isset($order->ord_terms) ? $order->ord_terms:'' ?>
                                                                                    </td>

                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            <section>
                                                                <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view courier-details">
                                                                    <div class="table-responsive">
                                                                        <table class="table custom table-detail-custom table-style" >
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><i class="fas fa-calendar-alt list-level"></i>Courier Date </td>
                                                                                    <td id="ocr_date_view"></td>
                                                                                    <td><i class="fas fa-boxes list-level list-level"></i>Courier Name </td>
                                                                                    <td id="ocr_name_view"> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    
                                                                                    <td><i class="fas fa-globe list-level"></i> Courier Website </td>
                                                                                    <td id="ocr_website_view"></td> 
                                                                                    <td><i class="fas fa-cubes list-level"></i> AWB No</td>
                                                                                    <td id="ocr_awb_no_view"></td> 
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
                                                <div class="tab-pane" id="portlet_act">
                                                    <div class="row">
                                                       <div class="container-fluid">
                                                           <div class="col-md-12 no-side-padding">
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
                                            </div>
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
        <!-- Modal Start here -->
        <div class="modal fade" id="shipping-edit" role="dialog" aria-labelledby="shipping-edit" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                
              </div>
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
                <div class="text-center">
                  <h3 class="modal-title text-center">Add Delivery Details </h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form  class="follow-modal-form" id="shipping-edit">
                    
                     
                  <div class="form-group col-md-6 form-md-line-input form-md-floating-label">
                        <label class="">Courier Date<span class="asterix-error"><em>*</em></span></label>
                      <div class="input-icon">
                        <input type="text" size="16" class="form-control color-primary-light" required="" name="ocr_date" id="ocr_date" data-msg="Please select date">
                         <i class="fas fa-calendar-alt"></i> 
                     </div>
                     <span class="errormesssage "></span>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="ocr_name" id="ocr_name" value="" class="form-control  color-primary-light" data-msg="Please Enter Courier Name">
                        <label for="courier_name">Courier Name</label>
                        <i class="fas fa-boxes list-level list-level"></i>
                        <span class="errormesssage "></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="ocr_website" id="ocr_website" value="http://" class="form-control  color-primary-light" data-msg="Please Enter Courier Website">
                        <label for="courier_website">Courier Website</label>
                        <i class="fas fa-globe list-level"></i>
                      </div>
                      <span class="custom-error"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="ocr_awb_no" id="ocr_awb_no" value="" class="form-control  color-primary-light" data-msg="Please Enter AWB No" required="">
                        <label for="awb_no">AWB No.</label>
                        <i class="fas fa-cubes list-level"></i>
                      </div>
                      <span class="errormesssage"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                      <div class="input-icon">
                        <input type="text" name="ocr_cnf_awb_no" id="ocr_cnf_awb_no" value="" class="form-control  color-primary-light" data-msg="Please Enter Confirm AWB No">

                        <label for="cnf_awb_no">Confirm AWB No.</label>
                        <i class="fas fa-cubes list-level"></i>
                      </div>
                      <span id="message"></span>
                      <span class="errormesssage"></span>
                    </div>
                  </div>
                  <div class="clearfix"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn grey" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-secondary btn grey">Remove Shipment</button> -->
                <input type="submit" name="submit" id="submit" class="btn btn-primary btn green" value="Submit" />
              </div>
            </form>
          </div>
        </div>
        <!-- Modal Ends here -->
        <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?>
            <!-- OPTIONAL SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
            </script>
            <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/module/common.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                 displayCourier();
                   getActivity();
                   var ord_payment_due_days = '<?php echo isset($order->ord_payment_due_days) ? $order->ord_payment_due_days:''; ?>';
                   var ord_dispatch_due_days = '<?php echo isset($order->ord_dispatch_due_days) ? $order->ord_dispatch_due_days:''; ?>';
                   if(ord_date !='0000-00-00' && ord_payment_due_days !='')
                   {
                    var ord_date = new Date('<?php echo isset($order->ord_date) ? $order->ord_date:''; ?>');
                    ord_payment_due_days =  ord_date.addDays(ord_payment_due_days);
                    nexlog(ord_payment_due_days);
                    $('.ord_payment_due_days').html(ord_payment_due_days);
                   }
                    if(ord_date !='0000-00-00' && ord_dispatch_due_days !='')
                   {
                    var ord_date = new Date('<?php echo isset($order->ord_date) ? $order->ord_date:''; ?>');
                    ord_dispatch_due_days =  ord_date.addDays(ord_dispatch_due_days);
                    $('.ord_dispatch_due_days').html(ord_dispatch_due_days);
                   }

                var primary_key     = 'ord_id';
                var updateUrl       = baseUrl + 'order/updateCustomData';

                 var editableElement = '#order_type';
                 var select2Class    = 'order_type-editable';
                 var dropdownUrl     = 'order/getGenPrmforDropdown/';
                 newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                 var editableElement = '#order_category';
                 var select2Class    = 'order_category-editable';
                 var dropdownUrl     = 'order/getGenPrmforDropdown/';
                 newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
                 var editableElement = '#ord_order_status';
                 var select2Class    = 'ord_order_status-editable';
                 var dropdownUrl     = 'order/getGenPrmforDropdown/';
                 newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl,'getActivity');

                 
                 
                    $("#ocr_date").datepicker({ 
                          rtl: App.isRTL(),
                          orientation: "auto bottom",
                          autoclose: true,
                          format: 'yyyy-mm-dd',
                        }).on('changeDate', function(ev) {
                        $(this).valid();  // triggers the validation test
                          $(this).addClass('edited');
                        // '$(this)' refers to '$("#datepicker")'
                       });
                        $('#ocr_date').datepicker().datepicker('setDate', 'today');
                    

                });
            $("#shipping-edit").validate({
                errorClass: "errormesssage",
             
                submitHandler: function(form) {
                  try
                  {
                    if ($('#ocr_awb_no').val()==$('#ocr_cnf_awb_no').val()) {
                        $('#submit').button('loading');
                    $.ajax({
                      type: "POST",
                      url: baseUrl + "order/shipping_save",
                      data : {
                        ocr_date: $('#ocr_date').val(),
                        ocr_ord_id: $('#ord_id').val(),
                        ocr_name: $('#ocr_name').val(),
                        ocr_website: $('#ocr_website').val(),
                        ocr_awb_no: $('#ocr_awb_no').val()
                      },
                      dataType:"json",  
                      cache: false,           
                      success:function(response) {
                        $('#shipping-edit').modal('hide');
                         displayCourier();
                         $('#shipping').css({ 'display': 'none'});
                         responsemsg(response);
                      }
                    });
                    }
                  }catch(e){
                    console.log(e);
                  }
                },
                   errorPlacement: function(error, element)
                    {
                      var group_div = $(element).closest('div.form-group')[0];
                      var placement = $(group_div).find('.errormesssage');
                      $(placement).append(error)
                    }
              });
            function deleteModule(thisElement)
                 {
                   var module_id   = $(thisElement).attr('data-module_id');
                   var module_code = $(thisElement).attr('data-module_code');
                   swal({
                          title: "Are you sure?",
                          text: "You will not be able to recover this  Order : "+module_code,
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
                                      ord_id:module_id,
                                      ord_code:module_code,
                                      ord_status:2                    
                                    }
                                   $.ajax({
                                          type: "POST",
                                          url: baseUrl + 'order/updateCustomData',
                                          data: dataString,
                                          dataType: "json",
                                          success: function(response)
                                          {
                                              if (response.success == true)
                                              {
                                                  message=" Order Deleted successfully";
                                                  
                                                  swal(
                                                  {
                                                      title: "Done",
                                                      text: message,
                                                      type: "success",
                                                      icon: "success",
                                                      button: true,
                                                  });
                                                    window.location.href=baseUrl+'order-list';
                                                  
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
                                swal("Cancelled", "Order is safe:", "error");
                              }
                          });
                 }
                  $('#ocr_cnf_awb_no').on('keyup', function () {
                  if ($('#ocr_awb_no').val() == $('#ocr_cnf_awb_no').val()) {
                    $('#message').html('AWB No. Matched ').css('color', 'green');
                  } else 
                    $('#message').html('AWB No. does not match').css('color', 'red');
                });
                function displayCourier(){
                  $.ajax({
                    type: 'get',
                    url: '<?php echo base_url() ?>order/getOrderCourierData/'+$('#ord_id').val(),
                    dataType: 'json',
                    success: function(data){
                        if(data != null)
                        {
                            var ocr_date_view_anchor='<a href="javascript:;" class="courier_date-editable" data-format="yyyy-m-dd" data-viewformat="dd M, yyyy" data-type="date" data-pk="1" data-placement="top" data-placeholder="Select date" data-original-title="Select Date" data-gnp-grp="ocr_date">'+data['courier_date']+' </a>'; 
                            var ocr_name_view_anchor='<a href="javascript:;" class="courier_name-editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Enter Name" data-original-title="Enter Name" data-gnp-grp="ocr_name">'+data['ocr_name']+' </a>';
                            var ocr_website_view_anchor='<a href="javascript:;" class="courier_website-editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Enter Website Name" data-original-title="Enter Website Name" data-gnp-grp="ocr_website">'+data['ocr_website']+' </a>';
                            var ocr_awb_no_view_anchor='<a href="javascript:;" class="courier_awb-editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Enter AWB Number" data-original-title="Enter AWB Number" data-gnp-grp="ocr_awb_no">'+data['ocr_awb_no']+' </a>';
                         $("#ocr_date_view").html(ocr_date_view_anchor);
                         $("#ocr_name_view").html(ocr_name_view_anchor);
                         $("#ocr_website_view").html(ocr_website_view_anchor);
                         $("#ocr_awb_no_view").html(ocr_awb_no_view_anchor);
                         $("#ocr_ord_id").val(data['ocr_id']);
                         var primary_key  = 'ocr_id';
                        var updateUrl       = baseUrl + 'order/updateCustomData';

                        var editableElement = '.courier_date-editable';
                        customTextEditable(editableElement, primary_key, updateUrl);

                        var editableElement = '.courier_name-editable';
                        customTextEditable(editableElement, primary_key, updateUrl);

                        var editableElement = '.courier_website-editable';
                        customTextEditable(editableElement, primary_key, updateUrl);
                        
                        var editableElement = '.courier_awb-editable';
                        customTextEditable(editableElement, primary_key, updateUrl);

                        }
                   
                    },
                    error: function(){
                      alert('Could not get Data from Database');
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
                      ord_id:$('#ord_id').val(),
                  }
                   $.ajax({
                          type: "POST",
                          url: baseUrl + 'order/getActivity',
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
                
                </script>
        </div>
</body>
</html>
