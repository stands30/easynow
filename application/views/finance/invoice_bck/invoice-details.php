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
    <link href="<?php echo base_url(); ?>assets/module/finance/invoice/css/invoice-custom.css" rel="stylesheet" type="text/css" />
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
                        </div>

                        <!-- -----MAIN CONTENTS START HERE----- -->

                        <div class="portlet">
                            <div class="row">
                                <div class="container-fluid">
                                     <aside class="profile-info col-md-12">
                                        <section class="panel">
                                            <label>make drop down editable for Currency,Shipping,Account,Billing People, shipping People</label>
                                          <div class="panel-body bio-graph-info panel-body-detail-view">
                                            <header class="panel-heading panel-heading-lead color-primary">
                                                <div class="row detail-box">
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <span class="detail-list-heading"><?php echo $title; ?></span>&nbsp;&nbsp;
                                                        <div class="col-md-12 no-side-padding inner-row">
                                                                <span class="panel-title">
                                                                    Marketing Invoice - IO12345
                                                                </span>
                                                                <a class="btn btn-edit header-btn" href="">
                                                                    <i class="fa fa-print">
                                                                      </i>
                                                                            <span class="btn-text"> Print
                                                                      </span>
                                                                  </a>
                                                                  
                                                            </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                            <span class="created">Created By: Manit Singh
                                            </span>
                                            <br>
                                            <span class="sp-date">Created On: 27-03-2018
                                            </span>
                                          </div>
                                                </div>
                                            </header>
                                            <div class="table-responsive" >
                                                <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fas fa-calendar-alt list-level"></i>Date</td>
                                                            <td>26-06-2018</td>
                                                            <td><i class="fas fa-th-list list-level"></i>Title</td>
                                                            <td> Marketing Invoice</td>
                                                            
                                                           
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-th-list list-level"></i> Invoice No</td>
                                                            <td>IO12345</td>
                                                            <td><i class="fas fa-rupee-sign list-level"></i>Currency</td>
                                                            <td>INR</td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-map-marker list-level"></i>Shipping</td>
                                                            <td>Amazon</td>
                                                            <td><i class="fas fa-user list-level"></i>Account</td>
                                                            <td><a href="#">Raj Enterprise</a></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                           
                                                            <td><i class="fas fa-percent"></i> Tax Computation</td>
                                                            <td colspan="3"> Yes</td>
                                                             
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                     

                                        </section>

                                        <section>
                                            <div class="col-md-6 padding-left-details">
                                                <header class="">
                                                    <div class="detail-box mb-10">
                                                        <div>
                                                            <span class="panel-title">Billing</span>
                                                        </div>

                                                    </div>
                                                </header>
                                                <section class="panel">
                                                    <div class="panel-body bio-graph-info panel-body-detail-view"> 
                                                            <div class="table-responsive" >
                                                                <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                                                    <tbody>                                                                
                                                                        <tr>
                                                                            <td>Billing Address</td>
                                                                            <td>6/52, First Floor, Shree Ganesh Krupa CHS Opp Bharat Petrol Pump, Boraspada Road, New Link Rd, Kandivali West, </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>GST Number</td>
                                                                            <td>12345</td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>People</td>
                                                                            <td>Pooja</td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                    </div>
                                                </section>
                                            </div>
                                            <div class="col-md-6 padding-right-details">
                                                <header class="">
                                                    <div class="detail-box mb-10">
                                                        <div>
                                                            <span class="panel-title">Shipping</span>
                                                        </div>

                                                    </div>
                                                </header>
                                                <section class="panel">
                                                    <div class="panel-body bio-graph-info panel-body-detail-view"> 
                                                            <div class="table-responsive" >
                                                                <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                                                    <tbody>                                                                
                                                                    <tr>
                                                                        <td>Shipping Address</td>
                                                                        <td>6/52, First Floor, Shree Ganesh Krupa CHS Opp Bharat Petrol Pump, Boraspada Road, New Link Rd, Kandivali West, </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>GST Number</td>
                                                                        <td>12345</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>People</td>
                                                                        <td>Pooja</td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                    </div>
                                                </section>
                                            </div> 

                                        </section>

                                        <section>
                                            <div>
                                                 <header class="">
                                                    <div class="detail-box mb-10">
                                                        <div>
                                                            <span class="panel-title">
                                                        Product list
                                                        </span>&nbsp;&nbsp;

                                                        </div>

                                                    </div>
                                                </header>
                                                <div class="flip-scroll table-div">
                                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                                        <thead class="flip-content">
                                                            <tr>
                                                                <th> Sr/No. </th>
                                                                <th>Product</th>
                                                                <th>Product Description</th>
                                                                <th>Rate</th>
                                                                <th>Qty</th>
                                                                <th>Discount Type</th>
                                                                <th>Discount</th>
                                                                <th>Discounted Amt</th>
                                                                <th>Sub Total</th>
                                                                <th>Tax</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>150mm NB C Class</td>
                                                                <td>5000</td>
                                                                <td> 20</td>
                                                                <td> Offer </td>
                                                                <td> 2000</td>
                                                                <td> 1890 </td>
                                                                <td> 3400 </td>
                                                                <td> 7000 </td>
                                                                <td> 17000 </td>
                                                                <td> 17000 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>150mm NB C Class</td>
                                                                <td>5000</td>
                                                                <td> 20</td>
                                                                <td> Offer </td>
                                                                <td> 2000</td>
                                                                <td> 1890 </td>
                                                                <td> 3400 </td>
                                                                <td> 7000 </td>
                                                                <td> 17000 </td>
                                                                <td> 17000 </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </div>
                                                <div class="table-responsive deatil-table total-table-list">
                                              
                                                 <table class="table table-bordered  flip-content">
                                                    <tbody>
                                                        <tr>
                                                            <td class="row-table">Sub - Total
                                                            <td><b><i class="fa fa-inr"></i>&nbsp;16,575.00</b></td></td>
                                                        </tr>
                                                        <tr>    
                                                            <td>Tax</td>
                                                            <td><b>1,491.75</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td><b><i class="fa fa-inr"></i>&nbsp;19,558.50</b></td>
                                                        </tr>    
                                                        
                                                    </tbody>
                                                   

                                                </table>
                                                </div>


                                            </div>
                                        </section>
                                        <div class="clearfix"></div>
                                        <section>
                                            <div class="panel-body bio-graph-info panel-body-detail-view">
                                                <div class="table-responsive">
                                                    <table class="table table-detail-custom" style="margin-bottom: 0px;">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td><i class="fas fa-id-card-alt list-level"></i>Reference</td>
                                                                <td>Nextasy</td>
                                                                <td><i class="fas fa-money-bill-alt list-level"></i>Payment Terms</td>
                                                                <td>Direct Payment</td>
                                                            </tr>
                                                            <tr>
                                                                <td><i class="fa fa-comment list-level"></i>Internal Remark</td>
                                                                <td>Excellent</td>
                                                                <td><i class="fa fa-comments list-level"></i>External Remark</td>
                                                                <td>Very Good</td>
                                                                
                                                            </tr>

                                                            
                                                        </tbody>
                                                    </table>   
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                                 <div class="deatil-view-attachment">
                                                  <label>Attachment <a data-toggle="modal" href="#attachment" class="attachments">+</a>
                                                    
                                                  </label>
                                                  
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
                <!-- OPTIONAL SCRIPTS -->
              
                <!-- END OPTIONAL SCRIPTS -->

        </div>

</body>

</html>