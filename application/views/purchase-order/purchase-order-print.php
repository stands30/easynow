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
    .td-content > td
    {
      text-align: center;
    }
    .tr-content > th
    {
      width: 40px;text-align: center;
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
                  <div class="col-md-6 col-lg-6 col-xs-6">
                    <?php 
                    $cmp_logo = base_url().getLogo();;
                    if(isset($purchase_order->por_billing_cmp_logo) && $purchase_order->por_billing_cmp_logo !=''){
                      $cmp_logo =base_url().COMPANY_LOGO.$purchase_order->por_billing_cmp_logo;
                    } ?>
                    <div class="print-logo" style="">
                      <img class="logo-image" src="<?php echo $cmp_logo; ?>" style="">
                    </div>
                    <address>
                      <div style="margin-bottom: 8px;">
                        <strong class="uppercase" ><?php echo isset($purchase_order->por_billing_cmp_value) ? $purchase_order->por_billing_cmp_value:'' ?></strong>
                      </div>
                      <div style="margin-bottom: 5px;">
                         <?php echo isset($purchase_order->por_billing_cmp_address) ? $purchase_order->por_billing_cmp_address:'' ?>
                      </div>
                     <div>
                        GSTIN - <b> <?php echo isset($purchase_order->por_billing_cmp_gst_no) ? $purchase_order->por_billing_cmp_gst_no:'' ?></b>
                     </div>
                    </address>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xs-6 add-inv-wrap">
                    <h1>PURCHASE ORDER</h1>
                    <span style="color:#939393!important"><b><?php echo isset($purchase_order->por_code) ? $purchase_order->por_code:'' ?></b></span><br><br>
                    <div style="margin-bottom: 10px;">
                      <span>Amount <b> &nbsp;<i class="fas fa-rupee-sign"></i><?php echo isset($purchase_order->por_total_format) ? $purchase_order->por_total_format:'' ?></b></span>
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
                          <td style="width: 10%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> Vendor <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="width: 50%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong>  <?php echo isset($purchase_order->por_vdr_id_value) ? $purchase_order->por_vdr_id_value:'' ?> </strong> </td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 18%;"> Purchase No. <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 30%;"><strong><?php echo isset($purchase_order->por_code) ? $purchase_order->por_code:'' ?></strong> </td>
                        </tr>
                        <tr>
                          <td style="width: 10%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">Delivery Address <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="width: 50%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> <strong>
                            <?php if(isset($purchase_order->por_address) && $purchase_order->por_address != PURCHASE_ORDER_ADDRESS_OTHER)
                           { 
                            echo $purchase_order->por_address_value;
                           } 
                           else 
                           {
                            echo isset($purchase_order->por_other_address) ? $purchase_order->por_other_address:''; 
                           }
                           ?></strong></td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 18%;"> Purchase Date <span class="pull-right" style="padding-right: 10px;">:</span></td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 30%;"><strong><?php echo isset($purchase_order->por_date_format) ? $purchase_order->por_date_format:'' ?></strong> </td>
                        </tr>
                        <tr>
                          <td style="width: 10%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">GSTIN <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="width: 50%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> <strong><?php echo isset($purchase_order->por_vdr_id_cmp_gst_no) ? $purchase_order->por_vdr_id_cmp_gst_no:'' ?></strong>
                          </td>                          
                        
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                 <?php $tax = false;
                 if(isset($purchase_order->por_billing_cmp_state) && isset($purchase_order->por_vdr_cmp_state) && $purchase_order->por_billing_cmp_state != '0' && $purchase_order->por_vdr_cmp_state != '0' ) 
                       {
                         if($purchase_order->por_billing_cmp_state == $purchase_order->por_vdr_cmp_state)
                         {
                            $tax = true;
                         }

                       }
                 ?>
                <hr style="border-top: 1px solid #00607e; margin: 5px 0 10px 0;">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <table class="table table-bordered table-hover">
                      <thead class="tbl-head">
                          <tr class="tr-content">
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
                          <tr class="td-content">
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
                </div>
                <hr style="border-top: 1px solid #ccc; margin: 5px 0 10px 0;">
                

                <div class="row">
                  <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="col-md-8 col-lg-8 col-xs-12 receipt-wrap bill-details pull-right" style="margin-bottom: 15px;">
                      <div class="row">
                        <!-- <div class="col-md-1 col-lg-6 col-xs-0 inner-left"></div> -->
                        <div class="col-md-1 col-lg-6 col-xs-5 inner-left"></div>
                        <div class="col-md-7 col-lg-3 col-xs-4 inner-left">
                        <!-- <div class="col-md-7 col-lg-3 col-xs-7 inner-left"> -->

                       <?php if($product_tax != '1' ||  $tax_computation == '1') {  ?>
                          <p>Sub - Total <span class="pull-right" style="padding-right: 20px;">:</span> </p>
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
                                    <td class="text-right">CGST <?php echo isset($cgst) ? '('.$cgst.'%)':''; ?><span class="pull-right" style="padding-right: 20px;">:</span></td>
                                   </tr>
                                   <br>
                                   <tr>    
                                    <td class="text-right">SGST <?php echo isset($sgst) ? '('.$sgst.'%)':''; ?><span class="pull-right" style="padding-right: 20px;">:</span></td>
                                   </tr>
                              <?php }else{ ?>
                                 <tr>    
                                  <td class="text-right">IGST <?php echo isset($purchase_order->por_gst_percent) ? '('.$purchase_order->por_gst_percent.'%)':''; ?> <span class="pull-right" style="padding-right: 20px;">:</span></td>
                                 </tr>
                              <?php }
                               }
                                if($tax_computation == 1 && $purchase_order->por_prod_tax == '1')
                              {
                               ?>
                                                 <tr>    
                                                  <td class="text-right">Tax <span class="pull-right" style="padding-right: 20px;">:</span></td>
                                                 </tr>
                                               <?php } ?>
                          <p>Total Amount <span class="pull-right" style="padding-right: 20px;">:</span> </p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xs-3 inner-right">
                        <!-- <div class="col-md-4 col-lg-3 col-xs-5 inner-right"> -->
                       <?php if($product_tax != '1' ||  $tax_computation == '1') {  ?>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($purchase_order->por_sub_total_format) ? $purchase_order->por_sub_total_format:'' ?> </b></p>
                          <?php }
                          if($tax_computation == '1' && $purchase_order->por_prod_tax != '1') {
                            $tax_percent =  isset($purchase_order->por_gst_percent) ? $purchase_order->por_gst_percent:'';
                            if($tax_percent != ''  && $tax == true)
                                { ?>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($cgst_amt) ? $cgst_amt:''; ?></b></p>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($sgst_amt) ? $sgst_amt:''; ?></b></p>
                           <?php }else{ ?>
                            <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($purchase_order->por_gst) ?number_format($purchase_order->por_gst,2) :''; ?></b></p>
                             <?php }
                               }
                                if($tax_computation == 1 && $purchase_order->por_prod_tax == '1')
                              {
                               ?>
                               <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($purchase_order->por_gst) ? number_format($purchase_order->por_gst,2):''; ?></b></p>
                                <?php } ?>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo isset($purchase_order->por_total_format) ? $purchase_order->por_total_format:'' ?> </b></p>
                        </div>
                      </div>
                    </div>

                    <div style="background-color: #F5F5F5;padding-top: 10px;padding-bottom: 10px;" class="col-md-12 col-lg-12 col-xs-12 receipt-wrap">
                      <p><b>Terms & Condition:</b></p>
                      <p style="    margin-bottom: 10px;"><?php echo isset($purchase_order->por_remark) ? $purchase_order->por_remark:'' ?></p>
                      <p style="margin-top: 20px"><b>Remark :</b> </p>
                      <p style="    margin-bottom: 10px;"><?php echo isset($purchase_order->por_terms) ? $purchase_order->por_terms:'' ?></p>
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
