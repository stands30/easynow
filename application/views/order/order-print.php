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
     padding: 8px 10px!important;
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
    .td-content > td
    {
      text-align: center !important;
    }
    .tr-content > th
    {
      width: 40px;
      text-align: center !important;
    }
    .tbl-head tr.td-content th{
      text-align: center!important;
    }
    .shipping-to{
      font-size: 18px;
      font-weight: 800;
      line-height: 25px;
      margin-top: 0px;
    }
    /*.remark-custom-details{
      padding-left: 287px;
    }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .remark-custom-details{
          padding-left: 100px;
        }
    }*/
    .table-billing-add tr td{
      border-top: none!important;
      padding-bottom: 0px!important;
    }
    .order-no-details h2{
      margin-top: 10px;
      margin-bottom: 6px;
      font-size: 20px;
      font-weight: 600;
    }
    .order-no-details p,
    .company-heading{
      margin: 10px 0px;
    }
    h3.declaration-content{
      margin-top: 0px;
      font-size: 20px;
      font-weight: 600;
    }
    .tearm-condition{
      margin: 0px;
    }
  </style>
  <head>
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
                  <div class="row">
                    <div class="col-md-12">
                      <p>Shipped To:</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <h1 class="shipping-to"><?php echo isset($order->ord_shipping_people_value)? $order->ord_shipping_people_value:''; ?></h1>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <h1 class="shipping-to"><?php echo isset($order->ord_shipping_addr)? $order->ord_shipping_addr:''; ?></h1>
                    </div>
                  </div>

                  <hr style="border-top: 1px solid #e7ecf1; margin: 5px 0 10px 0;">
                  <div class="col-md-12 order-no-details">
                    <h2 class="">Order ID : <?php echo isset($order->ord_code)? $order->ord_code:''; ?></h2>
                    <p>Thank you for buying from <?php echo isset($order->ord_billing_cmp_value)? $order->ord_billing_cmp_value:''; ?>.</p>
                  </div>

                  <div class="col-md-12" style="border: 1px solid #e7ecf1;margin-bottom: 20px;">
                    <table class="table table-billing-add" style=" margin-bottom: 0px;">
                      <tbody>
                        <tr>
                          <td width="50%" style="border-bottom:none;"><b>Billing address:</b></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="50%"><?php echo isset($order->ord_billing_people_value)? $order->ord_billing_people_value:''; ?></td>
                          <td><b>Order Date:</b></td>
                          <td><?php echo isset($order->ord_date_format)? $order->ord_date_format:''; ?></td>
                        </tr>
                        <tr>
                          <td width="50%" rowspan="2">
                            <?php echo isset($order->ord_billing_addr)? $order->ord_billing_addr:''; ?>
                          </td>
                          <td><b>Seller Name:</b></td>
                          <td><?php echo isset($order->ord_cmp_id_value)? $order->ord_cmp_id_value:''; ?></td>
                        </tr>
                        <tr>
                          <td><b>Buyer Name:</b></td>
                          <td><?php echo isset($order->ord_shipping_people_value)? $order->ord_shipping_people_value:''; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-md-12" style="border: 1px solid #e7ecf1;margin-bottom: 20px;">
                    <table class="table table-billing-add" style=" margin-bottom: 0px;">
                      <tbody>
                        <tr>
                          <td width="50%" style=""><b><?php echo isset($order->ord_billing_cmp_value)? $order->ord_billing_cmp_value:''; ?> Address:</b></td>
                        </tr>
                        <tr>
                          <td width="50%" style=""><?php echo isset($order->ord_billing_cmp_address)? $order->ord_billing_cmp_address:''; ?></td>
                        </tr>
                      </tbody>
                    </table>
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
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <table class="table table-bordered table-hover">
                      <thead class="tbl-head">
                        <tr class="td-content">
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
                                if( $tax_computation == 1 && $order->ord_product_tax == '1')
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
                          <tr class="td-content">
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
                               <?php
                           if($order->ord_product_tax == '1' && $tax_computation == 1 )
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
                      <tfoot >
                       <!--  <tr class="td-content">
                          <td colspan="3"></td>
                            <?php if($order->ord_product_tax != '1') { ?>
                              <td class="text-right">Amt</td>
                              <td class="text-right"><b><?php echo isset($order->ord_amt) ? number_format($order->ord_amt,2):''; ?></b></td>
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
                    <?php } ?>
                              <td class="text-right">Sub-Total</td>
                              <td class="text-right"><b><?php echo isset($order->ord_sub_total) ? number_format($order->ord_sub_total,2):''; ?></b></td>
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
                              <td class="text-right">CGST <?php echo isset($cgst) ? '('.$cgst.'%)':''; ?></td>
                              <td class="text-right"><b><?php echo isset($cgst_amt) ? $cgst_amt:''; ?></b></td>
                             <tr>    
                              <td class="text-right">SGST <?php echo isset($sgst) ? '('.$sgst.'%)':''; ?></td>
                              <td class="text-right"><b><?php echo isset($sgst_amt) ? $sgst_amt:''; ?></b></td>
                        <?php }else{ ?>
                            <td class="text-right">IGST <?php echo isset($order->ord_tax_percent) ? '('.$order->ord_tax_percent.'%)':''; ?></td>
                            <td class="text-right"><b><?php echo isset($order->ord_tax) ? $order->ord_tax:''; ?></b></td>
                        <?php }
                         }
                          if($tax_computation == 1 && $order->ord_product_tax == '1')
                        {
                         ?>
                            <td class="text-right">Tax </td>
                            <td class="text-right"><b><?php echo isset($order->ord_tax) ? number_format($order->ord_tax,2):''; ?></b></td>
                         <?php } ?>
                           
                            <td class="text-right">Total</td>
                            <td class="text-right"><b><?php echo isset($order->ord_total_format) ? $order->ord_total_format:'' ?></b></td>
                                            
                        </tr> -->

                      </tfoot>
                    </table>
                  </div>
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
                                                  <td class="text-center">IGST <?php echo isset($order->ord_tax_percent) ? '('.$order->ord_tax_percent.'%)':''; ?></td>
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
                                         
                                                                </table>
                                                            </div>
                                                       </div>
                                                   </div>
                <div class="col-md-12" style="border: 1px solid #e7ecf1;margin-bottom: 20px;">
                  <strong><p class="company-heading">Thanks for buying on <?php echo isset($order->ord_billing_cmp_value)? $order->ord_billing_cmp_value:''; ?>.</p></strong>
                </div>

                <div class="col-md-12 no-side-padding">
                  <h3 class="declaration-content">Declaration Letter To Whomsoever It May Concern</h3>
                </div>
                
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <table class="table table-bordered table-hover">
                      <thead class="tbl-head">
                        <tr class="td-content">
                          <th>Quantity</th>
                          <th>Product Detail</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($ord_product as $ord_product_key ) { ?>
                        <tr class="td-content">
                         <td><?php echo isset($ord_product_key->orp_qty) ? $ord_product_key->orp_qty:'' ?></td>
                        <td><?php echo isset($ord_product_key->orp_prd_id_value) ? $ord_product_key->orp_prd_id_value:'' ?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12 order-no-details">
                  <h2 class="">Order ID :  <?php echo isset($order->ord_code)? $order->ord_code:''; ?></h2>
                  <p><?php echo isset($order->ord_shipping_people_value)? $order->ord_shipping_people_value:''; ?></p>
                  <p><?php echo isset($order->ord_shipping_addr)? $order->ord_shipping_addr:''; ?></p>
                </div>
                
                <div class="col-md-12" style="background-color: #F5F5F5!important;padding-top: 15px; padding-bottom: 15px;">
                  <p class="tearm-condition">I hereby confirm that said above goods are being purchased for my internal or personal purpose and not for re-sale. Ifurther understand and agree to <?php echo isset($order->ord_billing_cmp_value)? $order->ord_billing_cmp_value:''; ?> Terms and Conditions of Sale available at <?php echo isset($order->ord_billing_cmp_website)? $order->ord_billing_cmp_website:''; ?> or upon request</p>
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
