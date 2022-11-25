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
 <link href="<?php echo base_url(); ?>assets/module/finance/invoice/css/invoice-custom.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url();?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
  <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
   
  <style type="text/css">
    .td-content
    {
      text-align: center;
    }
    .status-fa-icons
    {
       font-size: 16px;
    }
    .custom-display-none
    {
      display: none;
    }
    
  </style>
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
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar" id="breadcrumbs-list">
                        <?php echo $breadcrumb; ?>
                         <div class="breadcrumb-button">
                             <?php
                                $prev_inv_encrypted_id = isset($invoice->prev_invoice) ? base_url('invoice-details-'.$this->nextasy_url_encrypt->encrypt_openssl($invoice->prev_invoice)):'#';
                                $next_inv_encrypted_id = isset($invoice->next_invoice) ? base_url('invoice-details-'.$this->nextasy_url_encrypt->encrypt_openssl($invoice->next_invoice)):'#';
                              ?>
                               <!-- Previous  -->
                              <a href="<?php echo $prev_inv_encrypted_id; ?>" class=" previous" title="">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-left"></i>                                    
                                  </button>
                                  
                              </a>
                              <!-- Next -->
                              <a href="<?php echo $next_inv_encrypted_id; ?>" class="next">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-right"></i>
                                  </button>
                                  
                              </a>
                         </div>
                    </div>

                    <!-- -----MAIN CONTENTS START HERE----- -->

                   <div class="portlet">
                        <div class="row">
                            <div class="container-fluid">
                                 <aside class="profile-info col-md-12">
                                    <section class="panel">
                                      <div class="panel-body bio-graph-info panel-body-detail-view">
                                        <header class="panel-heading panel-heading-lead color-primary">
                                            <div class="row detail-box">
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                <!-- <div class="col-md-8 col-sm-8 col-xs-12"> -->
                                                    <span class="detail-list-heading">Invoice Details</span>
                                                     <br>
                                                        <div class="col-md-12 no-side-padding inner-row">
                                                            <span class="panel-title">
                                                             <?php  echo isset($invoice->inv_title) ? $invoice->inv_title.' - ':''; echo isset($invoice->inv_code) ? $invoice->inv_code:''; ?>
                                                            </span>
                                                            <?php 
                                                            $payment_status =  isset($invoice->inv_payment_status) ? $invoice->inv_payment_status:'';  ?>
                                                            <div class="header-button-list">
                                                              <?php  if(!property_exists($invoice, 'private_access') || (property_exists($invoice, 'private_access') && $invoice->private_access == 1)) {  if ($edit_access) {
                                                                if ($payment_status!=INVOICE_PAYMENT_STATUS_PAID) { ?>

                                                            <a class="btn btn-edit header-btn" href="<?php echo base_url('invoice-edit-'.$inv_decrypted_id); ?>">
                                                                <i class="fa fa-edit">
                                                                  </i>
                                                                        <span class="btn-text"> Edit
                                                                  </span>
                                                              </a>
                                                            <?php } } }
                                                             if ($print_access) { ?>
                                                            <a class="btn btn-edit header-btn" href="<?php echo base_url('invoice-print-'.$inv_decrypted_id); ?>">
                                                                <i class="fa fa-print">
                                                                  </i>
                                                                        <span class="btn-text"> Print
                                                                  </span>
                                                              </a>
                                                            <?php }  if(!property_exists($invoice, 'private_access') || (property_exists($invoice, 'private_access') && $invoice->private_access == 1)) { if ($edit_access) {
                                                              $status_name='';
                                                              $inv_status='';
                                                            $inv_apprvl_status = isset($invoice->inv_apprvl_status) ? $invoice->inv_apprvl_status:''; 
                                                              if($inv_apprvl_status != INVOICE_APPROVAL_STATUS_APPROVED && $inv_apprvl_status != INVOICE_APPROVAL_STATUS_REJECTED){
                                                                $inv_status = 'custom-display-none';
                                                              }else{
                                                              $status_name =  isset($invoice->inv_apprvl_status_name) ? $invoice->inv_apprvl_status_name:'';
                                                            } ?>
                                                                <a class="btn btn-edit header-btn inv-status-approved <?php echo $inv_status; ?>" href="javascript:;" onclick="return updateinvoiceStatus(<?php echo INVOICE_APPROVAL_STATUS_APPROVED; ?>);" data-title="Approve" data-toggle="tooltip">
                                                                <span class="btn-text"> <i class="fas fa-thumbs-up status-fa-icons"></i></span>
                                                              </a>
                                                              <a class="btn btn-edit header-btn inv-status-reject <?php echo $inv_status; ?>" href="javascript:;" onclick="return updateinvoiceStatus(<?php echo INVOICE_APPROVAL_STATUS_REJECTED; ?>);" data-title="Reject" data-toggle="tooltip">
                                                                <span class="btn-text"><i class="fas fa-thumbs-down status-fa-icons"></i></span>
                                                              </a>
                                                          
                                                              <!-- <a class="inv-status-span" href="#"><?php echo $status_name; ?></a> -->
                                                              <!-- Draft -->
                                                              <a class="inv-status-span btn-detail-header btn-highlight btn-draft" href="javascript:;"><?php echo isset($invoice->inv_apprvl_status_name) ? $invoice->inv_apprvl_status_name:''; ?></a>
                                                                  <?php } ?>
                                                              <?php
                                                              $inv_id = isset($invoice->inv_id) ? $invoice->inv_id:'';
                                                              $inv_code = isset($invoice->inv_code) ? $invoice->inv_code:''; 
                                                              $inv_payment_status_desc = isset($invoice->inv_payment_status_desc) ? $invoice->inv_payment_status_desc:''; ?>
                                                               <?php if ($delete_access) { ?>
                                                              <a class="btn btn-edit header-btn" href="javascript:;" onclick="return deleteinvoice(this);" data-title="Reject" data-toggle="tooltip" data-inv_id='<?php echo  $inv_id; ?>' data-inv_code='<?php echo  $inv_code; ?>'>
                                                                <span class="btn-text"><i class="fas fa-trash status-fa-icons"></i> Delete</span>
                                                              </a>
                                                            <?php }  } ?>
                                                        
                                                            <!-- paid and pending -->
                                                            <a class="inv-status-span btn-detail-header btn-highlight <?php echo $invoice->inv_payment_status_desc; ?>" href="javascript:;"><?php echo isset($invoice->inv_payment_status_name) ? $invoice->inv_payment_status_name:''; ?></a>
                                                            <?php 
                                                            $cmp_encrypted_id = isset($invoice->inv_cmp_id) ? $this->nextasy_url_encrypt->encrypt_openssl($invoice->inv_cmp_id):'';
                                                            
                                                            if($payment_status != INVOICE_PAYMENT_STATUS_PAID) {
                                                             ?>
                                                              <a class="btn btn-edit header-btn " href="<?php echo base_url('payment-add-'.$cmp_encrypted_id).'?inv_code='.$invoice->inv_code.'&inv_total='.$invoice->inv_total; ?>">
                                                                <span class="btn-text"><i class="fas fa-plus"></i> Pay Now</span>
                                                              </a>
                                                            <?php }  ?>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 created-title">
                                                  <span class="created">Created By: <?php echo isset($invoice->inv_crdt_by_name) ? $invoice->inv_crdt_by_name:''; ?>
                                                  </span>
                                                  <br>
                                                  <span class="sp-date">Created On: <?php echo isset($invoice->inv_crdt_dt_format) ? display_date($invoice->inv_crdt_dt):''; ?>
                                                  </span>
                                                </div>
                                            </div>
                                        </header>
                                        <input type="hidden" name="inv_id" id="inv_id" value="<?php echo isset($invoice->inv_id) ? $invoice->inv_id:''; ?>">
                                        <?php  $tax_computation = isset($invoice->inv_tax_computation) ? $invoice->inv_tax_computation:''; ?>
                                        <div class="table-responsive" >
                                            <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-th-list list-level"></i>Title</td>
                                                        <td><a href="javascript:;" id="inv_title" class="inv_title1 inv-title-editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Please Enter Title" data-original-title="Enter Title"   data-custom-gnp-grp='inv_title' data-gnp-grp=""><?php echo isset($invoice->inv_title) ? $invoice->inv_title:''; ?></a>
                                                        </td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>Date</td>
                                                        <td><?php echo isset($invoice->inv_date_format) ? display_date($invoice->inv_date):''; ?></td>
                                                        
                                                       
                                                    </tr>
                                                <?php if($invoice_currency == '1' || $invoice_shipping == '1') { 
                                                    if($invoice_shipping !=1){
                                                      $col_currency = 3 ; 
                                                    }
                                                    else{
                                                      $col_currency = 0 ; 
                                                    }
                                                  ?> 
                                                    <tr>
                                                    <?php if($invoice_currency == '1') { ?> 
                                                        <td><i class="fas fa-rupee-sign list-level"></i>Currency</td>
                                                        <td colspan="<?php echo $col_currency; ?>"> <a href="javascript:;" id="inv_currency" class="inv_currency1 inv-currency-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Currency" data-original-title="Select Currency" data-custom_select2_id="<?php echo isset($invoice->inv_currency) ? $invoice->inv_currency:''; ?>" data-custom_select2_name="<?php echo isset($invoice->inv_currency_name) ? $invoice->inv_currency_name:''; ?>"  data-custom-gnp-grp='inv_currency' data-gnp-grp="finance_currency"><?php echo isset($invoice->inv_currency_name) ? $invoice->inv_currency_name:''; ?></a>
                                                            </td>
                                                    <?php } 
                                                     if($invoice_shipping == '1') { ?> 
                                                         <td><i class="fas fa-map-marker list-level"></i>Shipping</td>
                                                        <td><a href="javascript:;" id="inv_shipping" class="inv_shipping1 inv-shipping-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Shipping" data-original-title="Select Shipping" data-custom_select2_id="<?php echo isset($invoice->inv_shipping) ? $invoice->inv_shipping:''; ?>" data-custom_select2_name="<?php echo isset($invoice->inv_shipping_name) ? $invoice->inv_shipping_name:''; ?>"  data-custom-gnp-grp='inv_shipping' data-gnp-grp="finance_shipping"><?php echo isset($invoice->inv_shipping_name) ? $invoice->inv_shipping_name:''; ?></a></td>
                                                        
                                                    <?php } ?>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr>
                                                       
                                                        <td><i class="fas fa-user list-level"></i>Account</td>
                                                        <td colspan="3">
                                                            <?php $cmp_encrypted_id = isset($invoice->inv_cmp_id) ? $this->nextasy_url_encrypt->encrypt_openssl($invoice->inv_cmp_id):'';
                                                            if($cmp_encrypted_id != ''){ ?>
                                                                 <a href="<?php echo base_url('company-details-'.$cmp_encrypted_id); ?>"><?php echo isset($invoice->inv_company) ? $invoice->inv_company:''; ?></a>
                                                            <?php } ?>
                                                           </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-info-circle list-level"></i>Status</td>
                                                        <td>
                                                            <a href="javascript:;" id="inv_status" class="inv_status inv-status-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Status" data-original-title="Select Status" data-custom_select2_id="<?php echo isset($invoice->inv_apprvl_status) ? $invoice->inv_apprvl_status:''; ?>" data-custom_select2_name="<?php echo isset($invoice->inv_apprvl_status_name) ? $invoice->inv_apprvl_status_name:''; ?>"  data-custom-gnp-grp='inv_apprvl_status' data-gnp-grp="invoice_status"><?php echo isset($invoice->inv_apprvl_status_name) ? $invoice->inv_apprvl_status_name:''; ?></a>
                                                        </td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>Due Date</td>
                                                        <td><?php echo isset($invoice->inv_due_date_format) ? $invoice->inv_due_date_format:''; ?></td>
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
                                                      <span class="panel-title">
                                                  Product list
                                                  </span> 

                                                  </div>

                                              </div>
                                          </header>
                                         <?php $tax = true;
                                         if(isset($invoice->inv_billing_cmp_state) && isset($invoice->inv_cmp_state) && $invoice->inv_billing_cmp_state != '0' && $invoice->inv_cmp_state != '0' ) 
                                               {
                                                 if($invoice->inv_billing_cmp_state == $invoice->inv_cmp_state)
                                                 {
                                                    $tax = false;
                                                 }

                                               }
                                         ?>

                                            <div class="flip-scroll table-div">
                                                <table class="table table-bordered table-striped table-condensed flip-content custom-flip-content">
                                                    <thead class="flip-content">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Product Description</th>
                                                             <?php if($finance_product_size == '1') { ?>
                                                             <th>Size</th>
                                                          <?php } 
                                                          if($finance_product_unit == '1') { ?>
                                                            <th>Unit</th>
                                                          <?php } ?>
                                                            <th>Rate</th>
                                                            <th>Qty</th>
                                                          <?php if($invoice->inv_product_tax == '1') { ?>
                                                            <th>Amt</th>
                                                            <th>Discount</th>
                                                            <th>Sub Total</th>
                                                          <?php } ?>
                                                            <?php
                                                            if($tax_computation == 1 && $invoice->inv_product_tax == '1')
                                                            {
                                                             if($tax == false){ ?>
                                                            <th>CGST</th>
                                                            <th>SGST</th>
                                                            <?php }
                                                            else
                                                             { ?>
                                                            <th>IGST</th>
                                                            <?php } 
                                                          }
                                                          ?>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php 
                                                       $cgst =0;
                                                        $cgst_amt=0;
                                                        $sgst =0;
                                                       $sgst_amt=0;
                                                       $subTotal = 0;
                                                       $discount=0;
                                                       foreach ($invoice_product as $invoice_product_key) { ?>
                                                        <tr>
                                                            <td><?php echo isset($invoice_product_key->prd_name) ? $invoice_product_key->prd_name:''; ?></td>
                                                            <td><?php echo isset($invoice_product_key->inp_desc) ? $invoice_product_key->inp_desc:''; ?></td>
                                                             <?php if($finance_product_size == '1') { ?>
                                                                <td><?php echo isset($invoice_product_key->inp_size_name) ? $invoice_product_key->inp_size_name:''; ?></td>
                                                              <?php }
                                                               if($finance_product_unit == '1') { ?>
                                                                <td><?php echo isset($invoice_product_key->inp_unit_name) ? $invoice_product_key->inp_unit_name:''; ?></td>
                                                              <?php } ?>
                                                            <td><?php echo isset($invoice_product_key->inp_rate) ? number_format($invoice_product_key->inp_rate,2):''; ?></td>
                                                            <td><?php echo isset($invoice_product_key->inp_qty) ? $invoice_product_key->inp_qty:''; ?></td>
                                                            <?php if($invoice->inv_product_tax == '1') { ?>
                                                            <td><?php echo isset($invoice_product_key->inp_prd_amt) ? number_format($invoice_product_key->inp_prd_amt,2):''; ?></td>
                                                            <td>
                                                            <?php echo isset($invoice_product_key->inp_disc_amt) ? number_format($invoice_product_key->inp_disc_amt,2):''; ?>
                                                              (<?php $discount= ($invoice_product_key->inp_disc != null && $invoice_product_key->inp_disc_type != null && $invoice_product_key->inp_disc_type!=INVOICE_DISC_TYPE_RS) ? $invoice_product_key->inp_disc:'';
                                                            echo $discount;
                                                            echo isset($invoice_product_key->inp_disc_type_name) ? ' '.$invoice_product_key->inp_disc_type_name:''; ?>)
                                                            </td>
                                                             <td><?php echo isset($invoice_product_key->inp_sub_total) ? $invoice_product_key->inp_sub_total_format:''; ?></td>
                                                             <?php 
                                                           }
                                                              if($tax_computation == 1 && $invoice->inv_product_tax == '1')
                                                            {
                                                              if($tax == false){ 
                                                                $cgst = number_format($invoice_product_key->inp_prd_gst/2,2);
                                                                $cgst_amt = number_format($invoice_product_key->inp_tax/2,2);
                                                                $sgst = number_format($invoice_product_key->inp_prd_gst/2,2);
                                                                $sgst_amt = number_format($invoice_product_key->inp_tax/2,2);
                                                                ?>
                                                            <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                                               echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                                               <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                                               echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                                             <?php }else{ ?>
                                                            <td><?php echo isset($invoice_product_key->inp_tax_format) ? $invoice_product_key->inp_tax_format:'';
                                                               echo isset($invoice_product_key->inp_prd_gst) ? ' ('.$invoice_product_key->inp_prd_gst.'%)':''; ?></td>
                                                             <?php }
                                                             } ?>
                                                            <td><?php echo isset($invoice_product_key->inp_total_format) ? $invoice_product_key->inp_total_format:''; ?></td>
                                                           
                                                        </tr>
                                                        <?php  
                                $subTotal+=isset($invoice_product_key->inp_sub_total) ? $invoice_product_key->inp_sub_total:'0.00';   
                                                         } ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                            <div class="table-responsive deatil-table total-table-list">
                                          
                                             <table class="table table-bordered  flip-content custom-flip-content">
                                                <tbody>
                                                  <?php if($invoice->inv_product_tax != '1') { ?>
                                                    <tr>    
                                                        <td class="text-right">Amt</td>
                                                        <td class="text-right"><b><?php echo isset($invoice->inv_amt) ? number_format($invoice->inv_amt,2):''; ?></b></td>
                                                    </tr>
                                                    <tr>    
                                                        <td class="text-right">Discount  <?php 
                                                        $discount =  ($invoice->inv_disc != null && $invoice->inv_disc_type != null && $invoice->inv_disc_type!=INVOICE_DISC_TYPE_RS) ? $invoice->inv_disc:'';
                                                        if($discount != INVOICE_DISC_TYPE_PERCENTAGE)
                                                        {
                                                         echo isset($invoice->inv_disc_type_name) ? '('.$discount.$invoice->inv_disc_type_name.')':''; 
                                                        } ?></td>
                                                        <td class="text-right"><b>
                                                            <?php  echo isset($invoice->inv_disc_amt) ? number_format($invoice->inv_disc_amt,2):'';
                                                         ?>
                                                        </b></td>
                                                    </tr>
                                                  <?php } ?>
                                                    <tr>    
                                                        <td class="text-right">Sub-Total</td>
                                                        <td class="text-right"><b><?php echo isset($invoice->inv_sub_total) ? number_format($invoice->inv_sub_total,2):''; ?></b></td>
                                                    </tr>
                                                  <?php if($invoice->inv_product_tax != '1' && $tax_computation == 1) 
                                                  {
                                                  
                                                    $tax_percent =  isset($invoice->inv_tax_percent) ? $invoice->inv_tax_percent:'';
                                                    if($tax_percent != '' && $tax == false)
                                                    {
                                                          $cgst = number_format($invoice->inv_tax_percent/2,2);
                                                          $cgst_amt = number_format($invoice->inv_tax/2,2);
                                                          $sgst = number_format($invoice->inv_tax_percent/2,2);
                                                          $sgst_amt = number_format($invoice->inv_tax/2,2);
                                                       ?>
                                                        <tr>    
                                                        <td class="text-right">CGST <?php echo isset($cgst) ? '('.$cgst.'%)':''; ?></td>
                                                        <td class="text-right"><b><?php echo isset($cgst_amt) ? $cgst_amt:''; ?></b></td>
                                                       </tr>
                                                       <tr>    
                                                        <td class="text-right">SGST <?php echo isset($sgst) ? '('.$sgst.'%)':''; ?></td>
                                                        <td class="text-right"><b><?php echo isset($sgst_amt) ? $sgst_amt:''; ?></b></td>
                                                       </tr>
                                                    <?php }else if($tax == false){ ?>
                                                         <tr>    
                                                        <td class="text-right">IGST <?php echo isset($invoice->inv_tax_percent) ? '('.$invoice->inv_tax_percent.'%)':''; ?></td>
                                                        <td class="text-right"><b><?php echo isset($invoice->inv_tax) ? $invoice->inv_tax:''; ?></b></td>
                                                       </tr>
                                                    <?php } 
                                                  }
                                                  if($invoice->inv_product_tax == '1' && $tax_computation == 1)
                                                    { ?>
                                                       <tr>    
                                                        <td class="text-right">Tax </td>
                                                        <td class="text-right"><b><?php echo isset($invoice->inv_tax) ? number_format($invoice->inv_tax,2):''; ?></b></td>
                                                       </tr>
                                                <?php } ?>
                                                     
                                                    <tr>
                                                        <td class="text-right">Total </td>
                                                        <td class="text-right"><b> <?php echo isset($invoice->inv_total_format) ? $invoice->inv_total_format:''; ?></b></td>
                                                    </tr>    
                                                    
                                                </tbody>
                                               

                                            </table>
                                            </div>


                                        </div>
                                    </section>
                                    <div class="clearfix"></div>

                                </aside>
                               

                                

                                <aside class="profile-info col-md-12">
                                  <section class="panel panel-tab">
                                    <div class="portlet light bordered tabbed-detail tabbed-panel tabbed-custom-panel">
                                      <div class="portlet-title tabbable-line tabbable-line-lead">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#portlet_details" data-toggle="tab"> Details </a>
                                            </li>
                                            <li class="">
                                                <a href="#portlet_add" data-toggle="tab"> Address </a>
                                            </li>
                                            <li class="">
                                                <a href="#portlet_payment" data-toggle="tab"> Payment </a>
                                            </li>
                                            <li>
                                                <a href="#portlet_act" data-toggle="tab"> Activities </a>
                                            </li>
                                        </ul>
                                      </div>
                                      <div class="portlet-body">
                                        <div class="tab-content">
                                           <div class="tab-pane active" id="portlet_details">
                                            <section class="panel" style="border-top: none;">
                                              <div class="panel-body bio-graph-info panel-body-detail-view">

                                                <div class="table-responsive">
                                                    <table class="table table-detail-custom table-stylm table-style-tab" style="margin-bottom: 0px;">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td><i class="fas fa-id-card-alt list-level"></i>Reference</td>
                                                                <td colspan="3"><?php echo isset($invoice->inv_reference) ? $invoice->inv_reference:''; ?></td>
                                                            </tr>
                                                             <tr>
                                                              <td colspan="5"><i class="fas fa-money-bill-alt list-level"></i>Payment Terms</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-details" colspan="5"><?php echo isset($invoice->inv_payment_terms) ? $invoice->inv_payment_terms:''; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><i class="fa fa-comment list-level"></i>Internal Remark</td>
                                                                <td><?php echo isset($invoice->inv_internal_remark) ? $invoice->inv_internal_remark:''; ?></td>
                                                                <td><i class="fa fa-comments list-level"></i>External Remark (Note)</td>
                                                                <td><?php echo isset($invoice->inv_external_remark) ? $invoice->inv_external_remark:''; ?></td>
                                                                
                                                            </tr>

                                                            
                                                        </tbody>
                                                    </table>   
                                                </div>
                                              </div>
                                            </section>
                                          </div>
                                          <div class="tab-pane " id="portlet_add">
                                            <div class="row">
                                              <div class="container-fluid">
                                                <div class="col-md-12 no-side-mobile-padding">
                                                  <section>
                                                      <?php 
                                                      $billing_class = 'col-md-6 col-sm-6';
                                                      if($invoice_shipping_address != '1') {
                                                          $billing_class = 'col-md-12';
                                                      } ?>

                                                      <div class="<?php echo $billing_class; ?> padding-left-details">
                                                          <header class="">
                                                              <div class="detail-box mb-10">
                                                                  <div>
                                                                      <span class="panel-title">Billing</span>
                                                                  </div>

                                                              </div>
                                                          </header>
                                                          <section class="panel panel-list">
                                                              <div class="panel-body bio-graph-info panel-body-detail-view"> 
                                                                      <div class="table-responsive" >
                                                                          <table class="table table-detail-custom table-stylm table-item" style="margin-bottom: 0px">
                                                                              <tbody>                                                                
                                                                                  <tr>
                                                                                      <td>Address</td>
                                                                                      <td><?php echo isset($invoice->inv_billing_addr) ? $invoice->inv_billing_addr:''; ?> </td>
                                                                                      
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>GST Number</td>
                                                                                      <td><?php echo isset($invoice->inv_billing_gst) ? $invoice->inv_billing_gst:''; ?></td>
                                                                                      
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>People</td>
                                                                                      <td><?php echo isset($invoice->inv_billing_people_name) ? $invoice->inv_billing_people_name:''; ?></td>
                                                                                  </tr>
                                                                                  
                                                                              </tbody>
                                                                          </table>
                                                                      </div>
                                                              </div>
                                                          </section>
                                                      </div>
                                                      <?php if($invoice_shipping_address == '1') { ?>
                                                      <div class="col-md-6 col-sm-6 padding-right-details">
                                                          <header class="">
                                                              <div class="detail-box mb-10">
                                                                  <div>
                                                                      <span class="panel-title">Shipping</span>
                                                                  </div>

                                                              </div>
                                                          </header>
                                                          <section class="panel panel-list">
                                                              <div class="panel-body bio-graph-info panel-body-detail-view"> 
                                                                      <div class="table-responsive" >
                                                                          <table class="table table-detail-custom table-stylm table-item" style="margin-bottom: 0px">
                                                                              <tbody>                                                                
                                                                              <tr>
                                                                                  <td> Address</td>
                                                                                  <td><?php echo isset($invoice->inv_shipping_addr) ? $invoice->inv_shipping_addr:''; ?> </td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td>GST Number</td>
                                                                                  <td><?php echo isset($invoice->inv_shipping_gst) ? $invoice->inv_shipping_gst:''; ?></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td>People</td>
                                                                                  <td><?php echo isset($invoice->inv_shipping_people_name) ? $invoice->inv_shipping_people_name:''; ?></td>
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

                                          <div class="tab-pane" id="portlet_payment">
                                            <div class="row">
                                              <div class="container-fluid no-side-mobile-padding">
                                                <div class="col-md-12 no-side-padding">
                                                  <section>
                                                    <div class="portlet light table-bordered">
                                                      <div class="portlet-title">
                                                          <div class="caption font-dark">
                                                              <span class="list-title-caption caption-subject bold ">Payment Details</span>
                                                              
                                                          </div>
                                                      </div>
                                                      <div class="portlet-body">
                                                         <table class="panel table table-detail-custom table-stylm table-style-tab" >
                                                            <tbody>
                                                              <tr>  
                                                                <td>Status</td>
                                                                <td><a class="inv-status-span btn-detail-header btn-highlight" href="#"><?php echo isset($invoice->inv_payment_status_name) ? $invoice->inv_payment_status_name:''; ?></a></td>
                                                                <td> Code</td>
                                                                <td > <a href="<?php  echo isset($inv_payment->ipt_code) ? base_url('payment-details-').$this->nextasy_url_encrypt->encrypt_openssl($inv_payment->ipt_id):''; ?>"> <?php  echo isset($inv_payment->ipt_code) ? $inv_payment->ipt_code:''; ?></a></td>
                                                              </tr>
                                                              <tr>
                                                                <td><i class="fa fa-user icon-people list-level"></i>Payment By</td>
                                                                <td>
                                                                  <?php $ppl_encrypted_id = isset($inv_payment->ipt_ppl_id) ? $this->nextasy_url_encrypt->encrypt_openssl($inv_payment->ipt_ppl_id):'#'; ?>
                                                                  <a href="<?php echo base_url('people-details-').$ppl_encrypted_id ?>">
                                                               <?php echo isset($inv_payment->ppl_name) ? $inv_payment->ppl_name:''; ?></a></td>
                                                               <td><i class="fa fa-user icon-people list-level"></i>Managed By</td>
                                                                <td>
                                                                  <?php $managed_by_encrypted_id = isset($inv_payment->ipt_managed_by) ? $this->nextasy_url_encrypt->encrypt_openssl($inv_payment->ipt_managed_by):'#'; ?>
                                                                  <a href="<?php echo base_url('people-details-').$managed_by_encrypted_id ?>"><?php echo isset($inv_payment->ipt_managed_by_name) ? $inv_payment->ipt_managed_by_name:''; ?></a></td>
                                                              </tr>

                                                              <tr>
                                                                <td><i class="fas fa-file-invoice-dollar color-dark-blue list-level"></i>Payment Mode</td>
                                                                <td><?php echo isset($inv_payment->ipt_mode_name) ? $inv_payment->ipt_mode_name:''; ?></td>

                                                                <td><i class="fas fa-calendar-alt list-level"></i>Payment Date </td>
                                                                <td><?php echo isset($inv_payment->ipt_date_format) ? $inv_payment->ipt_date_format:''; ?></td>

                                                                
                                                                
                                                              </tr>

                                                              <tr>
                                                                <td><i class="fas fa-university list-level"></i>Bank Name </td>
                                                                <td><?php echo isset($inv_payment->ipt_bank) ? $inv_payment->ipt_bank:''; ?></td>
                                                                <td><i class="fas fa-university list-level"></i>Branch Name </td>
                                                                <td><?php echo isset($inv_payment->ipt_branch) ? $inv_payment->ipt_branch:''; ?></td>
                                                              </tr>

                                                              <tr>
                                                                <td><i class="fas fa-calendar-alt list-level"></i>Cheque Date </td>
                                                                <td><?php echo isset($inv_payment->ipt_chq_date_format) ? $inv_payment->ipt_chq_date_format:''; ?></td>

                                                                <td><i class="fas fa-th-list list-level"></i>Cheque No/UTR No </td>
                                                                <td><?php echo isset($inv_payment->ipt_payment_no) ? $inv_payment->ipt_payment_no:''; ?></td>
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

                            </div>
                            <!-- Modal Start here -->
                            <div class="modal fade modal-attachments" id="attachment" tabindex="-1" role="basic" aria-hidden="true">
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
                                        <div id="image_preview" ></div>
                                          <span class="btn default btn-file btn-file-view btn-file-modal" style="width: 100%">
                                          <input type="file" id="ppl_profile_image" name="ppl_profile_image" class="profile-image btn-file-view"> 
                                          </span>
                                          <span class="custom-error"></span>
                                      </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn green">Save changes</button>
                                 </div>
                                </div>
                                                <!-- /.modal-content -->
                              </div>
                                            <!-- /.modal-dialog -->
                            </div>
                            <!-- Modal Ends here -->
                        </div>
                    </div>
                    <!-- -----MAIN CONTENTS END HERE----- -->
                </div>
                <!-- END CONTENT BODY -->
            </div>

            <!-- END CONTENT -->

    </div>

    <!-- END CONTAINER -->

    <!-- start add more attachment model -->
   
    <!-- End add more attachment model -->

    <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url(); ?>assets/project/global/scripts/jquery.matchHeight.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/project/pages/scripts/table-datatables-buttons.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script type="text/javascript">
             $(document).ready(function()
            {
                $('.table-item ').matchHeight();
                 var primary_key     = 'inv_id';
                 var updateUrl       = baseUrl + 'invoice/updateCustomData';
                
                 var editableElement = '.inv-currency-editable';
                 var select2Class    = 'inv_currency_select2';
                 var dropdownUrl     = 'invoice/getGenPrmforDropdown/';
                newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

                 var editableElement = '.inv-shipping-editable';
                 var select2Class    = 'inv_shipping_select2';
                 var dropdownUrl     = 'invoice/getGenPrmforDropdown/';
                newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

                 var editableElement = '.inv-status-editable';
                 var select2Class    = 'inv_status_select2';
                 var dropdownUrl     = 'invoice/getGenPrmforDropdown/';
                newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl,'statusUpdate');

                 var editableElement = '.inv-title-editable';
                customTextEditable(editableElement, primary_key, updateUrl);
                getActivity();
             });

             function statusUpdate(response,newValue,custom_update)
             {
                var inv_stats_apprved = '<?php echo INVOICE_APPROVAL_STATUS_APPROVED ?>';
                var inv_stats_reject = '<?php echo INVOICE_APPROVAL_STATUS_REJECTED ?>';
                var approved_by= '';
               nexlog('newValue :'+newValue);
               nexlog('response >> ');
               nexlog(response);
               nexlog('response <<');
                var inv_data = JSON.parse(response).response;
                /*switch(newValue)
                {
                  case inv_stats_apprved:
                           nexlog('inv_status : approved >> ');
                           nexlog('approved_by : '+inv_data.inv_apprvl_by);
                           $('.inv_apprved_by').html(inv_data.inv_apprvl_by+' on '+inv_data.inv_apprvl_date);
                           $('.inv-status-approved').css('display', 'none');
                           $('.inv-status-reject').css('display', 'none');
                           $('.inv-status-span').html(inv_data.inv_apprvl_status_name.gnp_name);
                           nexlog('inv_status : approved >> ');
                           break;
                  case inv_stats_reject:
                           nexlog('inv_status : rejected >> ');
                           $('.inv-status-approved').css('display', 'none');
                           $('.inv-status-reject').css('display', 'none');
                           $('.inv-status-span').html(inv_data.inv_apprvl_status_name.gnp_name);
                           $('.inv_apprved_by').html('');
                           nexlog('inv_status : rejected << ');
                           break; 
                  default:
                           nexlog('inv_status : default >> ');
                           $('.inv-status-approved').css('display', 'inline-block');
                           $('.inv-status-reject').css('display', 'inline-block');
                           $('.inv-status-span').html('');
                           $('.inv_apprved_by').html('');
                           nexlog('inv_status : default << ');
                           break;            
                }*/
                nexlog(' custom_update : '+custom_update);
                nexlog(inv_data.inv_apprvl_status_name);
                   if(inv_data.inv_apprvl_status_name != ' undefined')
                   {
                      $('#inv_status').attr('data-custom_select2_id',newValue);            
                      $('#inv_status').attr('data-custom_select2_name',inv_data.inv_apprvl_status_name.gnp_name);            
                      $('.inv-status-span').html(inv_data.inv_apprvl_status_name.gnp_name);            
                   }
                   getActivity();
                return true;
             }
             function updateinvoiceStatus(apprvl_status)
             {
                var inv_stats_apprved = '<?php echo INVOICE_APPROVAL_STATUS_APPROVED ?>';
               
             
                dataString =
                {
                    field:'inv_apprvl_status',
                    field_value:apprvl_status,
                    inv_id:$('#inv_id').val(),
                    old_value:$('#inv_status').attr('data-custom_select2_id') 
                }
                 $.ajax({
                        type: "POST",
                        url: baseUrl + 'invoice/updateCustomData',
                        data: dataString,
                        dataType: "json",
                        success: function(response)
                        {
                            if (response.success == true)
                            {
                                message="invoice Rejected successfully";
                                statusUpdate(JSON.stringify(response),''+apprvl_status+'',true);
                                if(apprvl_status == inv_stats_apprved)
                                {
                                    message="invoice Approved successfully";
                                }
                                swal(
                                {
                                    title: "Done",
                                    text: message,
                                    type: "success",
                                    icon: "success",
                                    button: true,
                                });
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
             }
             function deleteinvoice(thisElement)
             {
               var inv_id = $(thisElement).attr('data-inv_id');
               var inv_code = $(thisElement).attr('data-inv_code');
               swal({
                      title: "Are you sure?",
                      text: "You will not be able to recover this invoice : "+inv_code,
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Yes, delete it!",
                      cancelButtonText: "No, cancel plx!",
                      closeOnConfirm: false,
                      closeOnCancel: false
                        },
                        function(isConfirm) {
                          if (isConfirm) 
                          {
                               dataString =
                              {
                                  inv_id:inv_id,
                                  inv_code:inv_code+'-deleted',
                                  inv_status:2                    
                                }
                               $.ajax({
                                      type: "POST",
                                      url: baseUrl + 'invoice/updateCustomData',
                                      data: dataString,
                                      dataType: "json",
                                      success: function(response)
                                      {
                                          if (response.success == true)
                                          {
                                              message="invoice Deleted successfully";
                                              
                                              swal(
                                              {
                                                  title: "Done",
                                                  text: message,
                                                  type: "success",
                                                  icon: "success",
                                                  button: true,
                                              });
                                              window.location.href=baseUrl+'invoice-list';
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
                            swal("Cancelled", "invoice is safe :)", "error");
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
          function getActivity()
             {
               dataString =
                  {
                      inv_id:$('#inv_id').val(),
                  }
                   $.ajax({
                          type: "POST",
                          url: baseUrl + 'invoice/getActivity',
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

            <!-- OPTIONAL SCRIPTS -->
          
            <!-- END OPTIONAL SCRIPTS -->

    </div>

</body>

</html>
