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
 <link href="<?php echo base_url(); ?>assets/module/finance/quotation/css/quotation-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
  <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>assets/project/css/activity-custom.less<?php echo $global_asset_version; ?>">

   <!-- <link href="<?php echo base_url(); ?>assets/module/dashboard/css/dashboard-admin.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> -->
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
                                $prev_qtn_encrypted_id = isset($quotation->prev_quotation) ? base_url('quotation-details-'.$this->nextasy_url_encrypt->encrypt_openssl($quotation->prev_quotation)):'#';
                                $next_qtn_encrypted_id = isset($quotation->next_quotation) ? base_url('quotation-details-'.$this->nextasy_url_encrypt->encrypt_openssl($quotation->next_quotation)):'#';
                              ?>
                               <!-- Previous  -->
                              <a href="<?php echo $prev_qtn_encrypted_id; ?>" class=" previous" title="">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-left"></i>                                    
                                  </button>
                                  
                              </a>
                              <!-- Next -->
                              <a href="<?php echo $next_qtn_encrypted_id; ?>" class="next">
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
                                                    <span class="detail-list-heading">Quotation Details</span>
                                                     <br>
                                                        <div class="col-md-12 no-side-padding inner-row">
                                                            <span class="panel-title">
                                                             <?php  echo isset($quotation->qtn_title) ? $quotation->qtn_title.' - ':''; echo isset($quotation->qtn_code) ? $quotation->qtn_code:''; ?>
                                                            </span>
                                                            <div class="header-button-list">
                                                             <?php  if(!property_exists($quotation, 'private_access') || (property_exists($quotation, 'private_access') && $quotation->private_access == 1)) { ?>

                                                              <?php  if ($edit_access) { ?>
                                                              <a class="btn btn-edit header-btn" href="<?php echo base_url('quotation-edit-'.$qtn_decrypted_id); ?>">
                                                                  <i class="fa fa-edit">
                                                                    </i>
                                                                          <span class="btn-text"> Edit
                                                                    </span>
                                                                </a>
                                                              <?php } }
                                                               if ($print_access) { ?>
                                                              <a class="btn btn-edit header-btn" href="<?php echo base_url('quotation-print-'.$qtn_decrypted_id); ?>">
                                                                  <i class="fa fa-print">
                                                                    </i>
                                                                          <span class="btn-text"> Print
                                                                    </span>
                                                                </a>
                                                              <?php }  if(!property_exists($quotation, 'private_access') || (property_exists($quotation, 'private_access') && $quotation->private_access == 1)) { if ($edit_access) {
                                                                $status_name='';
                                                                $qtn_status='';
                                                              $qtn_apprvl_status = isset($quotation->qtn_apprvl_status) ? $quotation->qtn_apprvl_status:''; 
                                                              $qtn_apprvl_status_name_desc = isset($quotation->qtn_apprvl_status_name_desc) ? $quotation->qtn_apprvl_status_name_desc:'';
                                                                if($qtn_apprvl_status == QUOTATION_APPROVAL_STATUS_APPROVED ||  $qtn_apprvl_status == QUOTATION_APPROVAL_STATUS_REJECTED){
                                                                  $qtn_status = 'custom-display-none';
                                                                }else{
                                                                $status_name =  isset($quotation->qtn_apprvl_status_name) ? $quotation->qtn_apprvl_status_name:'';
                                                              }
                                                              ?>
                                                                  <a class="btn btn-edit header-btn qtn-status-approved <?php echo $qtn_status; ?>" href="javascript:;" onclick="return updateQuotationStatus(<?php echo QUOTATION_APPROVAL_STATUS_APPROVED; ?>);" data-title="Approve" data-toggle="tooltip">
                                                                  <span class="btn-text"> <i class="fas fa-thumbs-up status-fa-icons"></i></span>
                                                                </a>
                                                                <a class="btn btn-edit header-btn qtn-status-reject <?php echo $qtn_status; ?>" href="javascript:;" onclick="return updateQuotationStatus(<?php echo QUOTATION_APPROVAL_STATUS_REJECTED; ?>);" data-title="Reject" data-toggle="tooltip">
                                                                  <span class="btn-text"><i class="fas fa-thumbs-down status-fa-icons"></i></span>
                                                                </a>
                                                            
                                                                <!-- <a class="qtn-status-span" href="#"><?php echo $status_name; ?></a> -->
                                                                <a class="qtn-status-span btn-detail-header btn-highlight <?php echo $qtn_apprvl_status_name_desc; ?>" href="#"><?php echo isset($quotation->qtn_apprvl_status_name) ? $quotation->qtn_apprvl_status_name:''; ?></a>
                                                                <?php
                                                                $qtn_id = isset($quotation->qtn_id) ? $quotation->qtn_id:'';
                                                                $qtn_code = isset($quotation->qtn_code) ? $quotation->qtn_code:'';  ?>
                                                              <?php } ?>
                                                                  <?php if($delete_access) { ?>
                                                                <a class="btn btn-edit header-btn" href="javascript:;" onclick="return deleteQuotation(this);" data-title="Reject" data-toggle="tooltip" data-qtn_id='<?php echo  $qtn_id; ?>' data-qtn_code='<?php echo  $qtn_code; ?>'>
                                                                  <span class="btn-text"><i class="fas fa-trash status-fa-icons"></i></span>
                                                                </a>
                                                              <?php } } ?>
                                                            </div>
                                                             <!--  <a class="btn btn-edit header-btn" href="">
                                                                <span class="btn-text"> Convert To quotation</span>
                                                              </a> -->
                                                        </div>
                                                    
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 created-title">
                                                  <span class="created">Created By: <?php echo isset($quotation->qtn_crdt_by_name) ? $quotation->qtn_crdt_by_name:''; ?>
                                                  </span>
                                                  <br>
                                                  <span class="sp-date">Created On: <?php echo isset($quotation->qtn_crdt_dt_format) ? display_date($quotation->qtn_crdt_dt):''; ?>
                                                  </span>
                                                </div>
                                            </div>
                                        </header>
                                        <input type="hidden" name="qtn_id" id="qtn_id" value="<?php echo isset($quotation->qtn_id) ? $quotation->qtn_id:''; ?>">
                                         <?php  $tax_computation = isset($quotation->qtn_tax_computation) ? $quotation->qtn_tax_computation:''; ?>
                                        <div class="table-responsive" >
                                            <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-th-list list-level"></i>Title</td>
                                                        <td><a href="javascript:;" id="qtn_title" class="qtn_title1 qtn-title-editable" data-type="text" data-pk="1" data-placement="top" data-placeholder="Please Enter Title" data-original-title="Enter Title"   data-custom-gnp-grp='qtn_title' data-gnp-grp=""><?php echo isset($quotation->qtn_title) ? $quotation->qtn_title:''; ?></a>
                                                        </td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>Date</td>
                                                        <td><?php echo isset($quotation->qtn_date_format) ? display_date($quotation->qtn_date):''; ?></td>
                                                        
                                                       
                                                    </tr>
                                                <?php if($quot_currency == '1' || $quot_shipping == '1') { 
                                                  if($quot_shipping !=1){
                                                    $col_currency = 3 ; 
                                                  }
                                                  else{
                                                    $col_currency = 0 ; 
                                                  }
                                                  

                                                  ?>  
                                                    <tr>
                                                    <?php if($quot_currency == '1') { ?> 
                                                        <td><i class="fas fa-rupee-sign list-level"></i>Currency </td>
                                                        <td colspan="<?php echo $col_currency; ?>"> <a href="javascript:;" id="qtn_currency" class="qtn_currency1 qtn-currency-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Currency" data-original-title="Select Currency" data-custom_select2_id="<?php echo isset($quotation->qtn_currency) ? $quotation->qtn_currency:''; ?>" data-custom_select2_name="<?php echo isset($quotation->qtn_currency_name) ? $quotation->qtn_currency_name:''; ?>"  data-custom-gnp-grp='qtn_currency' data-gnp-grp="finance_currency"><?php echo isset($quotation->qtn_currency_name) ? $quotation->qtn_currency_name:''; ?>
                                                          

                                                        </a>
                                                            </td>
                                                    <?php } 
                                                     if($quot_shipping == '1') { ?> 
                                                         <td><i class="fas fa-map-marker list-level"></i>Shipping</td>
                                                        <td><a href="javascript:;" id="qtn_shipping" class="qtn_shipping1 qtn-shipping-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select shipping" data-original-title="Select Shipping" data-custom_select2_id="<?php echo isset($quotation->qtn_shipping) ? $quotation->qtn_shipping:''; ?>" data-custom_select2_name="<?php echo isset($quotation->qtn_shipping_name) ? $quotation->qtn_shipping_name:''; ?>"  data-custom-gnp-grp='qtn_shipping' data-gnp-grp="finance_shipping"><?php echo isset($quotation->qtn_shipping_name) ? $quotation->qtn_shipping_name:''; ?></a></td>
                                                        
                                                    <?php } ?>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr>
                                                       
                                                        <td><i class="fas fa-user list-level"></i>Account</td>
                                                        <td >
                                                            <?php $cmp_encrypted_id = isset($quotation->qtn_cmp_id) ? $this->nextasy_url_encrypt->encrypt_openssl($quotation->qtn_cmp_id):'';
                                                            if($cmp_encrypted_id != ''){ ?>
                                                                 <a href="<?php echo base_url('company-details-'.$cmp_encrypted_id); ?>"><?php echo isset($quotation->qtn_company) ? $quotation->qtn_company:''; ?></a>
                                                            <?php } ?>
                                                           </td>
                                                            <td><i class="fas fa-user list-level"></i>Lead</td>
                                                        <td >
                                                            <?php $led_encrypted_id = isset($quotation->qtn_led_id) ? $this->nextasy_url_encrypt->encrypt_openssl($quotation->qtn_led_id):'';
                                                            if($led_encrypted_id != ''){ ?>
                                                                 <a href="<?php echo base_url('lead-details-'.$led_encrypted_id); ?>"><?php echo isset($quotation->lead_name) ? $quotation->lead_name:''; ?></a>
                                                            <?php } ?>
                                                           </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-info-circle list-level"></i>Approval Status</td>
                                                        <td>
                                                            <a href="javascript:;" id="qtn_status" class="qtn_status qtn-status-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Status" data-original-title="Select Status" data-custom_select2_id="<?php echo isset($quotation->qtn_apprvl_status) ? $quotation->qtn_apprvl_status:''; ?>" data-custom_select2_name="<?php echo isset($quotation->qtn_apprvl_status_name) ? $quotation->qtn_apprvl_status_name:''; ?>"  data-custom-gnp-grp='qtn_apprvl_status' data-gnp-grp="qtn_approval_status"><?php echo isset($quotation->qtn_apprvl_status_name) ? $quotation->qtn_apprvl_status_name:''; ?></a>
                                                        </td>
                                                        <td><i class="fas fa-calendar-alt list-level"></i>Approval By</td>
                                                        <td><span class="qtn_apprved_by"><?php echo isset($quotation->qtn_approval_by) ? $quotation->qtn_approval_by:''; ?></span></td>
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
                                         if(isset($quotation->qtn_billing_cmp_state) && isset($quotation->qtn_cmp_state) && $quotation->qtn_billing_cmp_state != '0' && $quotation->qtn_cmp_state != '0' ) 
                                               {
                                                 if($quotation->qtn_billing_cmp_state == $quotation->qtn_cmp_state)
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
                                                            <th>Description</th>
                                                            <?php if($finance_product_size == '1') { ?>
                                                             <th>Size</th>
                                                          <?php } 
                                                          if($finance_product_unit == '1') { ?>
                                                            <th>Unit</th>
                                                          <?php }?>
                                                            <th>Rate</th>
                                                            <th>Qty</th>
                                                          <?php if($quotation->qtn_product_tax == '1') 
                                                            { ?>

                                                            <th>Amt</th>
                                                            <th>Discount</th>
                                                            <th>Sub Total</th>
                                                          <?php } ?>
                                                            <?php 
                                                          if( $tax_computation == 1 && $quotation->qtn_product_tax == '1')
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
                                                       foreach ($quotation_product as $quotation_product_key) { ?>
                                                        <tr>
                                                            <td><?php echo isset($quotation_product_key->prd_name) ? $quotation_product_key->prd_name:''; ?></td>
                                                            <td><?php echo isset($quotation_product_key->qtp_desc) ? $quotation_product_key->qtp_desc:''; ?></td>
                                                             <?php if($finance_product_size == '1') { ?>
                                                                <td><?php echo isset($quotation_product_key->qtp_size_name) ? $quotation_product_key->qtp_size_name:''; ?></td>
                                                              <?php }
                                                               if($finance_product_unit == '1') { ?>
                                                                <td><?php echo isset($quotation_product_key->qtp_unit_name) ? $quotation_product_key->qtp_unit_name:''; ?></td>
                                                              <?php } ?>
                                                            <td><?php echo isset($quotation_product_key->qtp_rate) ? number_format($quotation_product_key->qtp_rate,2):''; ?></td>
                                                            <td><?php echo isset($quotation_product_key->qtp_qty) ? $quotation_product_key->qtp_qty:''; ?></td>
                                                            <?php if($quotation->qtn_product_tax == '1') { ?>
                                                            <td><?php echo isset($quotation_product_key->qtp_prd_amt) ? number_format($quotation_product_key->qtp_prd_amt,2):''; ?></td>
                                                            <td>
                                                            <?php echo isset($quotation_product_key->qtp_disc_amt) ? number_format($quotation_product_key->qtp_disc_amt,2):''; ?>
                                                              (<?php $discount= ($quotation_product_key->qtp_disc != null && $quotation_product_key->qtp_disc_type != null && $quotation_product_key->qtp_disc_type!=QUOTATION_DISC_TYPE_RS) ? $quotation_product_key->qtp_disc:'';
                                                            echo $discount;
                                                            echo isset($quotation_product_key->qtp_disc_type_name) ? ' '.$quotation_product_key->qtp_disc_type_name:''; ?>)
                                                            </td>
                                                             <td><?php echo isset($quotation_product_key->qtp_sub_total) ? $quotation_product_key->qtp_sub_total_format:''; ?></td>
                                                          <?php } ?>
                                                             <?php
                                                             if($quotation->qtn_product_tax == '1' && $tax_computation == 1 )
                                                             {
                                                              if($tax == false){ 
                                                                $cgst = number_format($quotation_product_key->qtp_prd_gst/2,2);
                                                                $cgst_amt = number_format($quotation_product_key->qtp_tax/2,2);
                                                                $sgst = number_format($quotation_product_key->qtp_prd_gst/2,2);
                                                                $sgst_amt = number_format($quotation_product_key->qtp_tax/2,2);
                                                                ?>
                                                            <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                                               echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                                               <td><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                                               echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                                             <?php }else{ ?>
                                                            <td><?php echo isset($quotation_product_key->qtp_tax_format) ? $quotation_product_key->qtp_tax_format:'';
                                                               echo isset($quotation_product_key->qtp_prd_gst) ? ' ('.$quotation_product_key->qtp_prd_gst.'%)':''; ?></td>
                                                             <?php }
                                                             } 
                                                           ?>
                                                            <td><?php echo isset($quotation_product_key->qtp_total_format) ? $quotation_product_key->qtp_total_format:''; ?></td>
                                                           
                                                        </tr>
                                                        <?php  
                                $subTotal+=isset($quotation_product_key->qtp_sub_total) ? $quotation_product_key->qtp_sub_total:'0.00';   
                                                         } ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                            <div class="table-responsive deatil-table total-table-list">
                                          
                                            <table class="table table-bordered  flip-content custom-flip-content">
                                              <tbody>
                                         <?php if($quotation->qtn_product_tax != '1') { ?>
                                                <tr>    
                                                    <td class="text-right">Amt</td>
                                                    <td class="text-right"><b><?php echo isset($quotation->qtn_amt) ? number_format($quotation->qtn_amt,2):''; ?></b></td>
                                                </tr>
                                                <tr>    
                                                    <td class="text-right">Discount  <?php 
                                                    $discount = ($quotation->qtn_disc != null && $quotation->qtn_disc_type != null && $quotation->qtn_disc_type!=QUOTATION_DISC_TYPE_RS) ? $quotation->qtn_disc:'';
                                                    if($discount != QUOTATION_DISC_TYPE_PERCENTAGE)
                                                    {
                                                     echo isset($quotation->qtn_disc_type_name) ? '('.$discount.$quotation->qtn_disc_type_name.')':''; 
                                                    } ?></td>
                                                    <td class="text-right"><b>
                                                        <?php  echo isset($quotation->qtn_disc_amt) ? number_format($quotation->qtn_disc_amt,2):'';
                                                     ?>
                                                    </b></td>
                                                </tr>
                                          <?php } ?>
                                                  <tr>    
                                                    <td class="text-right">Sub-Total</td>
                                                    <td class="text-right"><b><?php echo isset($quotation->qtn_sub_total) ? number_format($quotation->qtn_sub_total,2):''; ?></b></td>
                                                </tr>
                                                <?php 
                                               if($tax_computation == 1 && $quotation->qtn_product_tax != '1')
                                              {
                                                $tax_percent =  isset($quotation->qtn_tax_percent) ? $quotation->qtn_tax_percent:'';
                                                if($tax_percent != ''  && $tax == false)
                                                {
                                                      $cgst = number_format($quotation->qtn_tax_percent/2,2);
                                                      $cgst_amt = number_format($quotation->qtn_tax/2,2);
                                                      $sgst = number_format($quotation->qtn_tax_percent/2,2);
                                                      $sgst_amt = number_format($quotation->qtn_tax/2,2);
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
                                                  <td class="text-right">IGST <?php echo isset($quotation->qtn_tax_percent) ? '('.$quotation->qtn_tax_percent.'%)':''; ?></td>
                                                  <td class="text-right"><b><?php echo isset($quotation->qtn_tax) ? $quotation->qtn_tax:''; ?></b></td>
                                                 </tr>
                                              <?php }
                                               }
                                                if($tax_computation == 1 && $quotation->qtn_product_tax == '1')
                                              {
                                               ?>
                                                 <tr>    
                                                  <td class="text-right">Tax </td>
                                                  <td class="text-right"><b><?php echo isset($quotation->qtn_tax) ? number_format($quotation->qtn_tax,2):''; ?></b></td>
                                                 </tr>
                                               <?php } ?>
                                               
                                                   <tr>
                                                    <td class="text-right">Total </td>
                                                    <td class="text-right"><b> <?php echo isset($quotation->qtn_total_format) ? $quotation->qtn_total_format:''; ?></b></td>
                                                </tr>    
                                                
                                              </tbody>
                                            </table>
                                            </div>


                                        </div>
                                    </section>
                                    <div class="clearfix"></div>
                                    <section>
                                        <div class="panel-body bio-graph-info panel-body-detail-view panel-sub-quo">
                                          
                                        </div>
                                    </section>

                                </aside>

                                
                               

                                

                                <aside class="profile-info col-md-12">
                                  <section class="panel panel-tab">
                                    <div class="portlet light bordered tabbed-detail tabbed-panel tabbed-custom-panel ">
                                      <div class="portlet-title tabbable-line tabbable-line-lead">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#portlet_details" data-toggle="tab"> Details </a>
                                            </li>
                                            </li>
                                            <li>
                                                <a href="#portlet_add" data-toggle="tab"> Address </a>
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
                                                            <td colspan="3"><?php echo isset($quotation->qtn_reference) ? $quotation->qtn_reference:''; ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td colspan="5"><i class="fas fa-money-bill-alt list-level"></i>Payment Terms</td>
                                                        </tr>
                                                        <tr>
                                                          <td class="text-details" colspan="5"><?php echo isset($quotation->qtn_payment_terms) ? $quotation->qtn_payment_terms:''; ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td><i class="fa fa-comment list-level"></i>Internal Remark</td>
                                                          <td><?php echo isset($quotation->qtn_internal_remark) ? $quotation->qtn_internal_remark:''; ?></td>
                                                          <td><i class="fa fa-comments list-level"></i>External Remark (Note)</td>
                                                          <td><?php echo isset($quotation->qtn_external_remark) ? $quotation->qtn_external_remark:''; ?></td>
                                                        </tr>

                                                        <!-- <tr>
                                                          <td><i class="fas fa-money-bill-alt list-level"></i>Payment Terms</td>
                                                          <td colspan="3"><?php echo isset($quotation->qtn_payment_terms) ? $quotation->qtn_payment_terms:''; ?></td>
                                                        </tr> -->
                                                        

                                                        
                                                    </tbody>
                                                </table>   
                                                </div>
                                              </div>
                                            </section>
                                          </div>
                                          <div class="tab-pane"  id="portlet_add">
                                            <div class="row">
                                              <div class="container-fluid">
                                                <div class="col-md-12 no-side-mobile-padding">
                                                  <section>
                                                      <?php 
                                                      $billing_class = 'col-md-6 col-sm-6';
                                                      if($quot_shipping_address != '1') {
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
                                                                                      <td><?php echo isset($quotation->qtn_billing_addr) ? $quotation->qtn_billing_addr:''; ?> </td>
                                                                                      
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>GST Number</td>
                                                                                      <td><?php echo isset($quotation->qtn_billing_gst) ? $quotation->qtn_billing_gst:''; ?></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>People</td>
                                                                                      <td><?php echo isset($quotation->qtn_billing_people_name) ? $quotation->qtn_billing_people_name:''; ?></td>
                                                                                  </tr>
                                                                              </tbody>
                                                                          </table>
                                                                      </div>
                                                              </div>
                                                          </section>
                                                      </div>
                                                      <?php if($quot_shipping_address == '1') { ?>
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
                                                                                  <td><?php echo isset($quotation->qtn_shipping_addr) ? $quotation->qtn_shipping_addr:''; ?> </td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td>GST Number</td>
                                                                                  <td><?php echo isset($quotation->qtn_shipping_gst) ? $quotation->qtn_shipping_gst:''; ?></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td>People</td>
                                                                                  <td><?php echo isset($quotation->qtn_shipping_people_name) ? $quotation->qtn_shipping_people_name:''; ?></td>
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
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
         </script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>  
        <script type="text/javascript">
             $(document).ready(function()
            {
                $('.table-item ').matchHeight();
                 var primary_key     = 'qtn_id';
                 var updateUrl       = baseUrl + 'quotation/updateQuotationCustomData';
                
                 var editableElement = '.qtn-currency-editable';
                 var select2Class    = 'qtn_currency_select2';
                 var dropdownUrl     = 'quotation/getGenPrmforDropdown/';
                newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

                 var editableElement = '.qtn-shipping-editable';
                 var select2Class    = 'qtn_shipping_select2';
                 var dropdownUrl     = 'quotation/getGenPrmforDropdown/';
                newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

                 var editableElement = '.qtn-status-editable';
                 var select2Class    = 'qtn_status_select2';
                 var dropdownUrl     = 'quotation/getGenPrmforDropdown/';
                newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl,'statusUpdate');

                 var editableElement = '.qtn-title-editable';
                customTextEditable(editableElement, primary_key, updateUrl);
                getActivity();
             });



             function statusUpdate(response,newValue,custom_update)
             {
                var qtn_stats_apprved = '<?php echo QUOTATION_APPROVAL_STATUS_APPROVED ?>';
                var qtn_stats_reject = '<?php echo QUOTATION_APPROVAL_STATUS_REJECTED ?>';
                var approved_by= '';
               nexlog('newValue :'+newValue);
               nexlog('response >> ');
               nexlog(response);
               nexlog('response <<');
                var qtn_data = JSON.parse(response).response;
                switch(newValue)
                {
                  case qtn_stats_apprved:
                           nexlog('qtn_status : approved >> ');
                           nexlog('approved_by : '+qtn_data.qtn_apprvl_by);
                           $('.qtn_apprved_by').html(qtn_data.qtn_apprvl_by+' on '+qtn_data.qtn_apprvl_date);
                           $('.qtn-status-approved').css('display', 'none');
                           $('.qtn-status-reject').css('display', 'none');
                           $('.qtn-status-span').html(qtn_data.qtn_apprvl_status_name.gnp_name);
                           nexlog('qtn_status : approved >> ');
                           break;
                  case qtn_stats_reject:
                           nexlog('qtn_status : rejected >> ');
                           $('.qtn-status-approved').css('display', 'none');
                           $('.qtn-status-reject').css('display', 'none');
                           $('.qtn-status-span').html(qtn_data.qtn_apprvl_status_name.gnp_name);
                           $('.qtn_apprved_by').html('');
                           nexlog('qtn_status : rejected << ');
                           break; 
                  default:
                           nexlog('qtn_status : default >> ');
                           $('.qtn-status-approved').css('display', 'inline-block');
                           $('.qtn-status-reject').css('display', 'inline-block');
                           $('.qtn-status-span').html('');
                           $('.qtn_apprved_by').html('');
                           nexlog('qtn_status : default << ');
                           break;            
                }
                nexlog(' custom_update : '+custom_update);
                nexlog(qtn_data.qtn_apprvl_status_name);
                   if(qtn_data.qtn_apprvl_status_name != ' undefined')
                   {
                      $('#qtn_status').attr('data-custom_select2_id',newValue);            
                      $('#qtn_status').attr('data-custom_select2_name',qtn_data.qtn_apprvl_status_name.gnp_name);            
                      $('#qtn_status').html(qtn_data.qtn_apprvl_status_name.gnp_name);            
                      $('.qtn-status-span').html(qtn_data.qtn_apprvl_status_name.gnp_name);            
                   }
                   getActivity();
                return true;
             }
             function updateQuotationStatus(apprvl_status)
             {
                var qtn_stats_apprved = '<?php echo QUOTATION_APPROVAL_STATUS_APPROVED ?>';
               
             
                dataString =
                {
                    field:'qtn_apprvl_status',
                    field_value:apprvl_status,
                    qtn_id:$('#qtn_id').val(),
                    old_value:$('#qtn_status').attr('data-custom_select2_id') 
                }
                 $.ajax({
                        type: "POST",
                        url: baseUrl + 'quotation/updateQuotationCustomData',
                        data: dataString,
                        dataType: "json",
                        success: function(response)
                        {
                            if (response.success == true)
                            {
                                message="Quotation Rejected successfully";
                                statusUpdate(JSON.stringify(response),''+apprvl_status+'',true);
                                if(apprvl_status == qtn_stats_apprved)
                                {
                                    message="Quotation Approved successfully";
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
             function deleteQuotation(thisElement)
             {
                   var qtn_id = $(thisElement).attr('data-qtn_id');
                   var qtn_code = $(thisElement).attr('data-qtn_code');
               swal({
                      title: "Are you sure?",
                      text: "You will not be able to recover this Quotation : "+qtn_code,
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
                                  qtn_id:qtn_id,
                                  qtn_code:qtn_code+'-deleted',
                                  qtn_status:2                    
                                }
                               $.ajax({
                                      type: "POST",
                                      url: baseUrl + 'quotation/updateQuotationCustomData',
                                      data: dataString,
                                      dataType: "json",
                                      success: function(response)
                                      {
                                          if (response.success == true)
                                          {
                                              message="Quotation Deleted successfully";
                                              
                                              swal(
                                              {
                                                  title: "Done",
                                                  text: message,
                                                  type: "success",
                                                  icon: "success",
                                                  button: true,
                                              });
                                              window.location.href=baseUrl+'quotation-list';
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
                            swal("Cancelled", "Quotation is safe :)", "error");
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
                      qtn_id:$('#qtn_id').val(),
                  }
                   $.ajax({
                          type: "POST",
                          url: baseUrl + 'quotation/getActivity',
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
