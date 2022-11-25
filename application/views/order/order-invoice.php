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
    /*.remark-custom-details{
      padding-left: 287px;
    }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .remark-custom-details{
          padding-left: 100px;
        }
    }*/
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
                      $cmp_logo = base_url().getLogo();
                    ?>
                    <div class="print-logo" style="">
                      <img class="logo-image" src="<?php echo $cmp_logo; ?>" style="">
                    </div>
                    <address>
                      <div style="margin-bottom: 8px;">
                        <strong class="uppercase" >EasyNow</strong>
                      </div>
                      <div style="margin-bottom: 5px;">
                         6/52, First Floor, Shree Ganesh Krupa CHS pp Bharat Petrol Pump, Link Rd, Kandivali West
                      </div>
                     <div>
                        GSTIN - <b>  27BGSPP1771J1ZQ</b>
                     </div>
                    </address>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xs-6 add-inv-wrap">
                    <h1>ORDER</h1>
                    <span style="color:#939393!important"># <b>Order ID</b> <br>ORD15378</span><br><br>
                    <div style="margin-bottom: 10px;">
                      <span>Amount <b> &nbsp;<i class="fas fa-rupee-sign"></i> 2580 </b></span>
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
                          <td style="padding-right:10px!important; width: 15%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">  Order ID <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="padding-right:10px!important; width: 25%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong>ORD15378</strong> </td>
                          <td style="padding-right:10px!important; width: 15%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> Order Date <span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="padding-right:10px!important; width: 25%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong>2019-06-01</strong> </td>
                        </tr>
                        <tr style="">
                          <td style="padding-right:10px!important; width: 15%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">Billed to<span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="padding-right:10px!important; width: 25%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong>Amazon Bom-1  </strong> </td>
                          <td style="padding-right:10px!important; width: 15%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">Shipped to<span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="padding-right:10px!important; width: 25%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong>EasyNow  </strong> </td>
                        </tr>
                        <tr style="">
                          <td style="padding-right:10px!important; width: 15%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">Billing Address<span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="padding-right:10px!important; width: 25%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong>Amazon Seller Services Private Limited Prathamesh Complex, Building No. H, Opp. Vatika Restaurant Mumbai - Nasik Highway No. 3, Bhiwandi By-pass Road Bhiwandi, Maharashtra 421302 </strong> </td>
                          <td style="padding-right:10px!important; width: 15%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">Shipping Address<span class="pull-right" style="padding-right: 10px;">:</span> </td>
                          <td style="padding-right:10px!important; width: 25%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong>6/52, First Floor, Shree Ganesh Krupa CHS pp Bharat Petrol Pump, Link Rd, Kandivali West </strong> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr style="border-top: 1px solid #00607e; margin: 5px 0 10px 0;">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <table class="table table-bordered table-hover">
                      <thead class="tbl-head">
                        <tr class="td-content">
                          <th> Sr. No.</th>
                          <th style="width: 90px;text-align: center;">Product</th>
                          <th>Description</th>
                          <th style="width: 90px;text-align: center;">Size</th>
                          <th style="width: 80px;text-align: center;">Qty</th>
                          <th>Amount</th>
                          <th>Discount</th>
                          <th>Sub-Total</th>
                          <th>Tax</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="td-content">
                          <td>1</td>
                          <td>Cabel</td>
                          <td>Cabel with 0.5mm</td>
                          <td>0.5mm</td>
                          <td>1</td>
                          <td>1200.00</td>
                          <td>0.00</td>
                          <td>1200.00</td>
                          <td>0.00</td>
                          <td>1200.00</td>
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
                        <!-- <div class="col-md-1 col-lg-6 col-xs-0 inner-left"></div> -->
                        <div class="col-md-1 col-lg-6 col-xs-5 inner-left"></div>
                        <div class="col-md-7 col-lg-3 col-xs-4 inner-left">
                        <!-- <div class="col-md-7 col-lg-3 col-xs-7 inner-left"> -->
                          <p>Amount <span class="pull-right" style="padding-right: 20px;">:</span> </p>
                          <p>Discount (Rs) <span class="pull-right" style="padding-right: 20px;">:</span> </p>
                          <p>Sub - Total <span class="pull-right" style="padding-right: 20px;">:</span> </p>
                          <p>Tax <span class="pull-right" style="padding-right: 20px;">:</span> </p>
                          <p>Total Amount <span class="pull-right" style="padding-right: 20px;">:</span> </p>
                        </div>
                         <div class="col-md-4 col-lg-3 col-xs-3 inner-right">
                        <!-- <div class="col-md-4 col-lg-3 col-xs-5 inner-right"> -->
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;1200.00 </b></p>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;0.00</b></p>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;1200.00</b></p>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;0.00</b></p>
                          <p><b><i class="fas fa-rupee-sign"></i>&nbsp;1200.00</b></p>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      
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
