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
    .add-inv-wrap{
      text-align: right;
    }
    .table td:nth-child(odd){
      background-color: transparent !important;
    }
    .receipt-wrap p{
      margin-top: 2px;
      margin-bottom: 2px;
    }
    .print-wrap{
      text-align: right;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
     padding: 8px 0px 8px 0 !important;
    }
    .tbl-head {
      background: #1f1c1c!important; 
      color: white!important;
      -webkit-print-color-adjust: exact; 
    }
    .bill-details{
      padding-left: 30px !important;
      padding-right: 15px !important;
    }
    .inner-left{
      text-align: justify;
    }
    .inner-right{
      text-align: right;
    }
    .td-content
    {
      text-align: center;
    }
  </style>
  <head>
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?> 
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/css/style.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" media="print" />    
    <!-- END OPTIONAL LAYOUT STYLES -->  
  </head>
  <body>
    <!-- BEGIN CONTAINER -->
      <!-- BEGIN CONTENT -->
        <!-- BEGIN CONTENT BODY -->
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet light" style="margin-bottom: 0px;">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <!-- MAIN CONTENTS START HERE  -->
                <header>
                  <div class="col-md-6 col-lg-6 col-xs-6">
                     <?php  $tax_computation = isset($invoice->inv_tax_computation) ? $invoice->inv_tax_computation:''; ?>
                    <?php 
                    $cmp_logo = base_url().getLogo();;
                    if(isset($invoice->inv_billing_cmp_logo) && $invoice->inv_billing_cmp_logo !=''){
                      $cmp_logo =base_url().COMPANY_LOGO.$invoice->inv_billing_cmp_logo;
                    } ?>
                    <div class="print-logo">
                      <img class="logo-image" src="<?php echo $cmp_logo; ?>" style="">
                    </div>
                    <address>
                      <div style="margin-bottom: 8px;">
                        <strong class="uppercase" > <?php echo isset($invoice->inv_billing_cmp_name) ? $invoice->inv_billing_cmp_name:''; ?></strong>
                      </div>
                      <div style="margin-bottom: 5px;">
                        <?php echo isset($invoice->inv_blng_cmp_address) ? $invoice->inv_blng_cmp_address:''; ?>
                      </div>
                     <div>
                        GSTIN - <b> <?php echo isset($invoice->inv_blng_cmp_gst_no) ? $invoice->inv_blng_cmp_gst_no:''; ?></b>
                     </div>
                    </address>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xs-6 add-inv-wrap">
                    <h1>INVOICE</h1>
                    <span style="color:#939393!important"><b>#<?php echo isset($invoice->inv_code) ? $invoice->inv_code:''; ?> </b></span><br><br>
                    
                    <div style="margin-bottom: 10px;">
                    <span>Amount <b> &nbsp;<i class="fas fa-rupee-sign"></i> <?php echo isset($invoice->inv_total_format) ? $invoice->inv_total_format:''; ?></b></span>
                      
                    </div>
                  </div>
                </header>
                <div class="clearfix"></div>
                <hr style="border-top: 1px solid #00607e; margin: 5px 0 10px 0;">
                <div class="row invoice-cust-add" style="margin-bottom: 10px;">
                  <div class="col-lg-12 col-md-12 col-xs-12" style="text-align: left;">
                    <table class="table " style=" margin-bottom: 0px;">
                      <tbody>
                        <tr style="">
                          <td style="width: 10%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> Bill To <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="width: 50%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong><?php echo isset($invoice->inv_company) ? $invoice->inv_company:''; ?> </strong> </td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 18%;"> Invoice No. <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 30%;"><strong><?php echo isset($invoice->inv_code) ? $invoice->inv_code:''; ?> </strong> </td>
                        </tr>
                        <tr>
                          <td style="width: 10%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">Address <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="width: 50%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> <strong><?php echo isset($invoice->inv_billing_addr) ? $invoice->inv_billing_addr:''; ?> </strong></td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 18%;"> Invoice Date <span class="pull-right" style="padding-right: 10px;">:</span></td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 30%;"><strong><?php echo isset($invoice->inv_date_format) ? $invoice->inv_date_format:''; ?> </strong> </td>
                        </tr>
                        <tr>
                          <td style="width: 10%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">GSTIN <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="width: 50%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> <strong> <?php echo isset($invoice->inv_billing_gst) ? $invoice->inv_billing_gst:''; ?> </strong></td>
                          <?php  if($invoice_shipping == '1') {  ?>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 18%;">Shipping Through <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 30%;"> <strong><?php echo isset($invoice->inv_shipping_name) ? $invoice->inv_shipping_name:''; ?> </strong></td>
                        <?php } ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr style="border-top: 1px solid #00607e; margin: 5px 0 10px 0;">
                 <?php $tax = true;
                 if(isset($invoice->inv_billing_cmp_state) && isset($invoice->inv_cmp_state) && $invoice->inv_billing_cmp_state != '0' && $invoice->inv_cmp_state != '0' ) 
                       {
                         if($invoice->inv_billing_cmp_state == $invoice->inv_cmp_state)
                         {
                            $tax = false;
                         }

                       }
                 ?>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <table class="table table-bordered table-hover">
                      <thead class="tbl-head">
                        <tr>
                          <th style="width: 40px;text-align: center;">#</th>
                          <th style="width: 90px;text-align: center;">Item</th>
                             <?php if($finance_product_size == '1') { ?>
                                 <th style="width: 90px;text-align: center;">Size</th>
                              <?php } 
                              if($finance_product_unit == '1') { ?>
                                <th style="width: 90px;text-align: center;">Unit</th>
                              <?php } ?>
                          <th style="width: 80px;text-align: center;">Rate</th>
                          <th style="width: 40px;text-align: center;">Qty</th>
                          <?php if($invoice->inv_product_tax == '1') { ?>
                            <th style="width: 40px;text-align: center;">Amt</th>
                            <th style="width: 40px;text-align: center;">Discount</th>
                            <th style="width: 40px;text-align: center;">Sub Total</th>
                          <?php } ?>
                          <?php
                            if($tax_computation == 1 && $invoice->inv_product_tax == '1')
                            {
                             if($tax == false){ ?>
                            <th style="width: 40px;text-align: center;">CGST</th>
                            <th style="width: 40px;text-align: center;">SGST</th>
                            <?php }
                            else
                             { ?>
                            <th style="width: 40px;text-align: center;">IGST</th>
                            <?php } 
                          }
                          ?>
                          <th style="width: 90px;text-align: center;">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                           $cgst      = 0;
                            $cgst_amt = 0;
                            $sgst     = 0;
                            $sgst_amt = 0;
                            $i        = 1;
                            $subTotal = 0;
                           foreach ($invoice_product as $invoice_product_key) { ?>
                            <tr>
                               <td class="td-content"><?php echo $i; ?></td>
                                <td class="td-content"><?php echo isset($invoice_product_key->inp_desc) ? $invoice_product_key->inp_desc:''; ?></td>
                                  <?php if($finance_product_size == '1') { ?>
                                  <td class="td-content"><?php echo isset($invoice_product_key->inp_size_name) ? $invoice_product_key->inp_size_name:''; ?></td>
                                <?php }
                                 if($finance_product_unit == '1') { ?>
                                  <td class="td-content"><?php echo isset($invoice_product_key->inp_unit_name) ? $invoice_product_key->inp_unit_name:''; ?></td>
                                <?php } ?>
                                <td class="td-content"><?php echo isset($invoice_product_key->inp_rate) ? number_format($invoice_product_key->inp_rate,2):''; ?></td>
                                <td class="td-content"><?php echo isset($invoice_product_key->inp_qty) ? $invoice_product_key->inp_qty:''; ?></td>
                                 <?php if($invoice->inv_product_tax == '1') { ?>
                                <td class="td-content"><?php echo isset($invoice_product_key->inp_prd_amt) ? number_format($invoice_product_key->inp_prd_amt,2):''; ?></td>
                                <td class="td-content">
                                <?php echo isset($invoice_product_key->inp_disc_amt) ? number_format($invoice_product_key->inp_disc_amt,2):''; ?>
                                  (<?php $discount= ($invoice_product_key->inp_disc != null && $invoice_product_key->inp_disc_type != null && $invoice_product_key->inp_disc_type!=INVOICE_DISC_TYPE_RS) ? $invoice_product_key->inp_disc:'';
                                echo $discount;
                                echo isset($invoice_product_key->inp_disc_type_name) ? ' '.$invoice_product_key->inp_disc_type_name:''; ?>)
                                </td>
                                 <td class="td-content"><?php echo isset($invoice_product_key->inp_sub_total) ? $invoice_product_key->inp_sub_total_format:''; ?></td>
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
                                <td class="td-content"><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                   echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                   <td class="td-content"><?php echo isset($cgst_amt) ? $cgst_amt:'';
                                   echo isset($cgst) ? ' ('.$cgst.'%)':''; ?></td>
                                 <?php }else{ ?>
                                <td class="td-content"><?php echo isset($invoice_product_key->inp_tax_format) ? $invoice_product_key->inp_tax_format:'';
                                   echo isset($invoice_product_key->inp_prd_gst) ? ' ('.$invoice_product_key->inp_prd_gst.'%)':''; ?></td>
                                 <?php }
                                 } ?>
                                <td class="td-content"><?php echo isset($invoice_product_key->inp_total_format) ? $invoice_product_key->inp_total_format:''; ?></td>
                               
                            </tr>
                            <?php
                            $subTotal+=isset($invoice_product_key->inp_sub_total) ? $invoice_product_key->inp_sub_total:'0.00'; $i++;  } ?>


                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr style="border-top: 1px solid #ccc; margin: 5px 0 10px 0;">
                <div class="row">
                  <div class="col-md-12 col-lg-12 col-xs-12">
                    
                     <div class="col-md-8 col-lg-8 col-xs-12 receipt-wrap bill-details pull-right" style="margin-bottom: 15px;">
                      <div class="row">
                        <div class="col-md-1 col-lg-6 col-xs-0 inner-left"></div>
                        <div class="col-md-7 col-lg-3 col-xs-7 inner-left " >
                          <?php if($invoice->inv_product_tax != '1') 
                          { ?>
                              <p>Amount <span class="pull-right" style="padding-right: 20px;">:</span> </p>
                              <p>Discount <?php 
                              $discount =  ($invoice->inv_disc != null && $invoice->inv_disc_type != null && $invoice->inv_disc_type!=INVOICE_DISC_TYPE_RS) ? $invoice->inv_disc:'';
                              if($discount != QUOTATION_DISC_TYPE_PERCENTAGE)
                              {
                               echo isset($invoice->inv_disc_type_name) ? '('.$discount.$invoice->inv_disc_type_name.')':''; 
                              } ?><span class="pull-right" style="padding-right: 20px;">:</span> </p>
                        <?php } ?>
                          <p>Sub - Total <span class="pull-right" style="padding-right: 20px;">:</span> </p>
                         <?php 
                          if($tax_computation == 1  && $invoice->inv_product_tax != '1')
                          {
                            $tax_percent =  isset($invoice->inv_tax_percent) ? $invoice->inv_tax_percent:'';
                            if($tax_percent != '')
                            {
                              if($tax == false)
                              { 
                                  $cgst = number_format($invoice->inv_tax_percent/2,2);
                                  $cgst_amt = number_format($invoice->inv_tax/2,2);
                                  $sgst = number_format($invoice->inv_tax_percent/2,2);
                                  $sgst_amt = number_format($invoice->inv_tax/2,2);
                              }
                            }
                            if($tax == false)
                              { ?>
                                 <p>CGST <?php echo isset($cgst) ? '('.$cgst.' %)':''; ?><span class="pull-right" style="padding-right: 20px;">:</span> </p>
                                 <p>SGST <?php echo isset($cgst) ? '('.$sgst.' %)':''; ?><span class="pull-right" style="padding-right: 20px;">:</span> </p>
                            <?php }else{ ?>
                                 <p>IGST<span class="pull-right" style="padding-right: 20px;">:</span> </p>
                            <?php }
                            }
                             if($tax_computation == 1 && $invoice->inv_product_tax == '1')
                            {
                             ?>
                              <p>Tax <span class="pull-right" style="padding-right: 20px;">:</span> </p>
                             <?php } ?>
                          <p>Total <span class="pull-right" style="padding-right: 20px;">:</span> </p>
                          <!-- <p>Paid: </p> -->
                          <!-- <p>Final Payable: </p> -->
                        </div>
                        <div class="col-md-4 col-lg-3 col-xs-5 inner-right">
                           <?php if( $invoice->inv_product_tax != '1') 
                          { ?>
                             <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($invoice->inv_amt) ? number_format($invoice->inv_amt,2):''; ?> </b></p>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;  <?php  echo isset($invoice->inv_disc_amt) ? number_format($invoice->inv_disc_amt,2):'';?></b></p>
                        <?php } ?>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($invoice->inv_sub_total) ? number_format($invoice->inv_sub_total,2):''; ?> </b></p>
                          <?php   if($tax == false && $tax_computation == 1 && $invoice->inv_product_tax != '1')
                              { ?>
                          
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($cgst_amt) ? $cgst_amt:''; ?> </b></p>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($sgst_amt) ? $sgst_amt:''; ?> </b></p>
                            <?php }else if($tax == true && $tax_computation == 1 && $invoice->inv_product_tax != '1'){ ?> 
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($invoice->inv_tax) ? number_format($invoice->inv_tax,2):''; ?> </b></p>
                            <?php } 
                          if($tax_computation == 1 &&  $invoice->inv_product_tax == '1'){ ?>
                            <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($invoice->inv_tax) ? number_format($invoice->inv_tax,2):''; ?> </b></p>
                          <?php } ?>
                           <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($invoice->inv_total_format) ? $invoice->inv_total_format:''; ?> </b></p>
                        </div>
                      </div>
                    </div>

                      <div style="background-color: #F5F5F5;padding-top: 10px;padding-bottom: 10px;" class="col-md-12 col-lg-12 col-xs-12 receipt-wrap">
                        <p><b>Payment Terms :</b></p>
                        <p style="    margin-bottom: 10px;"><?php echo isset($invoice->inv_payment_terms) ? $invoice->inv_payment_terms:''; ?></p>
                        <p style="margin-top: 20px"><b>Note :</b> </p>
                        <p style="    margin-bottom: 10px;"><?php echo isset($invoice->inv_external_remark) ? $invoice->inv_external_remark:''; ?></p>
                      </div>

                  </div>

                 

                </div>
                <div class="row">
                  <div class="col-xs-12 mt-40 print-wrap">
                    <a class="btn green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
                  </div>
                </div>
              </div>
              <!-- MAIN CONTENTS END HERE --> 
              </div>
            </div>
          <!-- END CONTENT BODY -->
        <!-- END CONTENT -->
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?> 
        <!-- OPTIONAL SCRIPTS -->
        <!-- END OPTIONAL SCRIPTS -->
      </div>
      </body>
    </html>
