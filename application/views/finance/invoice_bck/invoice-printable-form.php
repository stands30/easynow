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
  </style>
  <head>
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?> 
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url().'assets/css/style.css'; ?>" rel="stylesheet" type="text/css" media="print"/>
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
                    <img class="logo-image" src="<?php echo base_url().'assets/project/images/new-logo.png'; ?>" style="width: 60%;margin-bottom: 10px;">
                    <address>
                      <strong class="uppercase">Easynow</strong><br>
                      52/6, Shri Ganesh Krupa, New Link Rd,<br> Opp Bharat
                      Petrol Pump, Kandivali West, Mumbai 67<br>
                      GSTIN - <b>27BGSPP1771J1ZQ</b>
                    </address>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xs-6 add-inv-wrap">
                    <h1>INVOICE</h1>
                    <span><b>#INV0059</b></span><br><br>
                  </div>
                </header>
                <div class="clearfix"></div>
                <hr style="border-top: 1px solid #00607e; margin: 5px 0 10px 0;">
                <div class="row invoice-cust-add" style="margin-bottom: 10px;">
                  <div class="col-lg-6 col-md-6 col-xs-6" style="text-align: left;">
                    <table class="table " style=" margin-bottom: 0px;">
                      <tbody>
                        <tr style="">
                          <td style="width: 30%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> Bill To : </td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong>Manit Singh </strong> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-6" style="text-align: left;">
                    <table class="table " style=" margin-bottom: 0px;">
                      <tbody>
                        <tr style="">
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 45%;"> Quotation No. : </td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong>Quot18722</strong> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-6" style="text-align: left;">
                    <table class="table " style=" margin-bottom: 0px;">
                      <tbody>
                        <tr style="">
                          <td style="width: 30%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">Address : </td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> <strong>Bandra(w), Mumbai - 400050</strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-6">
                    <table class="table " style=" margin-bottom: 0px;">
                      <tbody>
                        <tr style="">
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 45%;"> Quotation Date :</td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"><strong>28/07/2018</strong> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-6" style="text-align: left;">
                    <table class="table " style=" margin-bottom: 0px;">
                      <tbody>
                        <tr style="">
                          <td style="width: 30%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">GSTIN : </td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> <strong> 27BGSPP1771J1ZQ</strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-6">
                    <table class="table " style=" margin-bottom: 0px;">
                      <tbody>
                        <tr style="">
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;width: 45%;">Shipping Through : </td>
                          <td style="border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;"> <strong>Amazon Shopping Center</strong></td>
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
                        <tr>
                          <th style="width: 40px;text-align: center;">#</th>
                          <th style="width: 90px;text-align: center;">Item</th>
                          <th style="width: 80px;text-align: center;">HSN/SAC</th>
                          <th style="width: 40px;text-align: center;">Qty</th>
                          <th style="width: 70px;text-align: center;">Rate</th>
                          <th style="width: 80px;text-align: center;">Discount</th>
                          <th style="width: 80px;text-align: center;">Total</th>
                          <th style="width: 80px;text-align: center;">CGST</th>
                          <th style="width: 80px;text-align: center;">SGST</th>
                          <th style="width: 90px;text-align: center;">Final Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="text-align: center;">1</td>
                          <td style="text-align: center;">Customized Software</td>
                          <td style="text-align: center;">85238020</td>
                          <td style="text-align: center;">1</td>
                          <td style="text-align: center;"><b><i class="fa fa-inr"></i></b>&nbsp;16,575</td>
                          <td style="text-align: center;"><b>--</b></td>
                          <td style="text-align: center;"><b><i class="fa fa-inr"></i></b>&nbsp;16,575</td>
                          <td style="text-align: center;">1,492(9%)</td>
                          <td style="text-align: center;">1,492(9%)</td>
                          <td style="text-align: center;"><b><i class="fa fa-inr"></i></b>&nbsp;19,558.50</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr style="border-top: 1px solid #ccc; margin: 5px 0 10px 0;">
                <div class="row">
                  <div class="col-md-12 col-lg-12 col-xs-12">
                    <div style="background-color: #F5F5F5;" class="col-md-7 col-lg-7 col-xs-7 receipt-wrap">
                      <p><b>Payment is due on receipt.</b></p>
                      <p>Payment should be made by bank transfer to the following <br> account:</p>
                      <p><b>Note :</b> This is an invoice for a printable form of invoice module. This is an invoice for a printable form of invoice module.</p>
                      <p>Easynow</p>
                      <p>Current Account</p>
                      <p><b>Bank Name</b> : ICICI Bank</p>
                      <p><b>Account Number</b> : 120905500290</p>
                      <p><b>IFSC code</b> : ICIC0001209</p>
                      <p>Mahavir Nagar Branch</p>
                    </div>
                    <div class="col-md-5 col-lg-5 col-xs-5 receipt-wrap bill-details">
                      <div class="row">
                        <div class="col-md-6 col-lg-6 col-xs-6 inner-left">
                          <p>Sub - Total: </p>
                          <p>CGST: </p>
                          <p>SGST: </p>
                          <p>Total: </p>
                          <p>Paid: </p>
                          <p>Final Payable: </p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-6 inner-right">
                          <p><b><i class="fa fa-inr"></i>&nbsp;16,575.00</b></p>
                          <p><b>1,491.75</b></p>
                          <p><b>1,491.75</b></p>
                          <p><b><i class="fa fa-inr"></i>&nbsp;19,558.50</b></p>
                          <p><b><i class="fa fa-inr"></i>&nbsp;19,558.50</b></p>
                          <p><b><i class="fa fa-inr"></i>&nbsp;0.00</b></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 print-wrap">
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
