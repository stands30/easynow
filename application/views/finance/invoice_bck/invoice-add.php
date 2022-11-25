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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/finance/invoice/css/invoice-custom.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
     
    </style>
    <!-- END OPTIONAL styles -->
   
  </head>  
   <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?> 
    <div class="clearfix"> 
    </div>
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
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
         
          <div class="portlet portlet-fluid-background">
            <div class="row">
              <div class="container-fluid">
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center mt-20">Add New Invoice
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <form role="form" class="add-title  col-md-12 form_add" id="_add">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                        <i class="fas fa-th-list list-level"></i>                          
                          <input type="text" class="form-control" name="" value="" disabled="" placeholder="">
                        <label>Invoice Number</label>  
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 pull-right date-right">
                      <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <input type="text" class="form-control date date-picker" placeholder="">
                                <i class="fa fa-calendar"></i>
                         <label>Date</label>
                          </div> 
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="text" class="form-control" name="" value="" placeholder="">
                        <label>Title</label>  
                        <i class="fas fa-th-list list-level"></i>
                        </div>
                        
                       </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Currency</label>                                                
                        <div class="input-icon">
                          <i class="far fa-money-bill-alt icon-lead"></i>
                          <select class="form-control select2">
                          <option value="1">INR</option>
                          <option value="2">USD</option>
                        </select>
                        <!-- <label>Currency Type</label>   -->
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Shipping</label>                        
                        <div class="input-icon">
                          <i class="fab fa-telegram-plane icon-lead"></i>
                          <select class="form-control select2">  
                            <option value="1">Amazon</option>
                            <option value="2">Blue Dart</option>
                          </select>
                        </div>
                          <!-- <label>Shipping Through</label> -->
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">Account</label>                        
                        <div class="input-icon">
                          <i class="fas fa-user-tie icon-lead"></i>                            
                          <select class="form-control select2">  
                            <option value="1">Dr Patkar</option>
                            <option value="2">TFPC</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                        <i class="fas fa-th-list list-level"></i>                          
                          <input type="text" class="form-control" name="" value="" disabled="" placeholder="">
                        <label>Invoice Number</label>  
                        </div>
                      </div>
                    </div> -->

                   
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        
                          <div class="md-checkbox input-label-text">
                              <input type="checkbox" id="checkbox1" class="md-check">
                              <label for="checkbox1">
                                  <span></span>
                                  <span class="check"></span>
                                  <span class="box"></span>Tax Computation</label>
                          </div>
                      </div>
                    </div>
                  </div>
                  

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group  form-md-line-input form-md-floating-label">
                        <div class="input-icon input-textarea-text">
                          <textarea type="text" class="form-control" id="" name="" rows="2" value="" placeholder=""></textarea> 
                        <label>Biling Address</label>  
                        <i class="fas fa-map-marker list-level"></i>
                        </div>
                       </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group  form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="text" class="form-control" name="" value="" placeholder="">
                        <label>GST Number</label>  
                        <i class="fas fa-id-card list-level"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">People</label>
                        <div class="input-icon">
                          <i class="fa fa-user"></i>                          
                          <select class="form-control select2">  
                            <option value="1">Please select people</option>
                            <option value="2">Vinay</option>
                            <option>Pooja</option>
                            <option>Pranali</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="md-checkbox">
                          <input type="checkbox" id="checkbox2" class="md-check">
                          <label for="checkbox2">
                              <span></span>
                              <span class="check"></span>
                              <span class="box"></span>Billing Address Same as Shipping Address </label>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon input-textarea-text">
                          <textarea type="text" class="form-control" id="" name="" rows="2" value="" placeholder=""></textarea> 
                        <label>Shipping Address</label>  
                         <i class="fas fa-map-marker list-level"></i>
                        </div>
                        
                       </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group  form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="text" class="form-control" name="" value="" placeholder="">
                        <label>GST Number</label> 
                        <i class="fas fa-id-card list-level"></i> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="drp-title">People</label>
                        <div class="input-icon">
                          <i class="fa fa-user"></i>                          
                          <select class="form-control select2">  
                            <option value="1">Please select people</option>
                            <option value="2">Vinay</option>
                            <option>Pooja</option>
                            <option>Pranali</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                      <div class=" repeater-div ">
                        <div class="row">
                           <div class="col-md-12">
                             <span class="sub-list-title">Add Items</span>
                           </div>
                        </div>
                        <div class="row row-repeater repeater">
                          <div class="mt-repeater">
                            <div data-repeater-list="purordlist">
                              <div class="row" data-repeater-item="">
                                <div class="col-md-12 no-side-padding">
                                  <div class="col-md-3">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                      <label class="drp-title drp-title-repeater">Product</label>                             
                                      <div class="input-icon">
                                         <select class="form-control repeater-custom-select select2" name="quo_product" id="quo_product" tabindex="-1" aria-hidden="true">
                                          <option>Please Select Product</option>
                                          <option>Car</option>
                                          <option>A.C</option>
                                        </select>
                                      <!-- <label>Product</label> --> 
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                      <div class="input-icon input-label-text">
                                        <textarea type="text" class="form-control repeater-textarea" id="" name="" rows="1" value="" placeholder=""></textarea> 
                                        <label class="repeater-label">Product Description</label>  
                                       
                                      </div>
                                      
                                     </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                      <div class="input-icon input-label-text">
                                        <input type="number" pattern="[0-9]+" class="form-control repeater-text" placeholder="" id="" name="" value="">
                                      <label class="repeater-label">Rate<span class="asterix-error"><em>*</em></span></label>  
                                      </div>
                                      
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                      <div class="input-icon input-label-text">
                                         <input type="number" pattern="[0-9]+" class="form-control repeater-text" placeholder=" " id="" name="" value="">
                                      <label class="repeater-label"> Quantity<span class="asterix-error"><em>*</em></span></label> 
                                      </div>
                                    </div>
                                  </div>
                                </div>


                                <div class="col-md-12 no-side-padding">
                                  <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">
                                        <label class="drp-title drp-title-repeater">Discount Type</label>
                                        <div class="input-icon">
                                          <select class="form-control select2" tabindex="-1" aria-hidden="true">
                                              <option value="1">INR</option>
                                              <option value="2">USD</option>
                                          </select>
                                          <!-- <label>Discount Type<span class="asterix-error"><em>*</em></span></label>  -->
                                        </div>
                                         
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                      <div class="input-icon input-label-text">
                                          <input type="number" pattern="[0-9.]+" placeholder="" class="form-control repeater-text" id="" name="" value="">                                        
                                        <label class="repeater-label">Discount<span class="asterix-error"><em>*</em></span></label>
                                      </div>                                       
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">                    
                                        <label>Discounted Amt<span class="asterix-error"><em>*</em></span></label>
                                        <p class="repeter-main-label"><i class="fa fa-rupee"></i> 0.00</p>
                                      <!--   <span class="text-danger"></span> -->
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">                    
                                        <label>Sub Total<span class="asterix-error"><em>*</em></span></label>
                                        <p class="repeter-main-label"><i class="fa fa-rupee"></i> 0.00</p>
                                      <!--   <span class="text-danger"></span> -->
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">                     
                                        <label>Tax<span class="asterix-error"><em></em></span></label>
                                        <p class="repeter-main-label"><i class="fa fa-rupee"></i> 0.00</p>              
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                      <div class="form-group form-md-line-input form-md-floating-label">                              
                                          <label>Amount<span class="asterix-error"><em></em></span></label>
                                          <p class="repeter-main-label"><i class="fa fa-rupee"></i> 0.00</p>            
                                      </div>
                                  </div>

                                </div>
                                <div class="col-md-12 no-side-padding">
                                  <div class="col-md-2 cross mb-20">
                                    <a id="btn-del" href="javascript:;" data-repeater-delete="" class="bold"> Delete <i class="fa fa-trash"></i></a>
                                  </div>
                                </div>
                                
                                
                               
                                

                              </div>
                            </div>
                          </div>
                          <div class="col-md-2 btn-row">
                            <div class="form-group ">
                                <!-- <label class="control-label" style="display: block;"></label> -->
                                <a href="javascript:;" class="bold" data-repeater-create="">
                                Add More&nbsp;<i class="fa fa-plus "></i> </a>                           
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-offset-7 col-md-5">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label amt-disc bold">Tax</label><br>
                              <span><i class="fa fa-rupee"></i> 0.00</span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label amt-disc bold">Total Amount</label><br>
                              <span> <i class="fa fa-rupee"></i> 0.00</span>
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
                  </div>
                  <!-- below -->
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <input type="text" name="" class="form-control" id="" placeholder="">        
                              <label>Reference</label> 
                              <i class="fas fa-id-card-alt"></i>
                            </div>
                          </div>
                      </div>
                       <div class="col-md-6">
                          <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                              <textarea type="text" class="form-control" id="" name="" rows="1" value="" placeholder=""></textarea>                                                           
                              <label>Payment Terms</label> 
                              <i class="fas fa-money-bill-alt list-level"></i>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <textarea type="text" class="form-control" id="" name="" rows="2" value="" placeholder=""></textarea>       
                            <label>Internal Remark</label> 
                            <i class="fa fa-comment list-level"></i>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <div class="input-icon">
                            <textarea type="text" class="form-control" id="" name="" rows="2" value="" placeholder=""></textarea>              
                            <label>External Remark</label>
                            <i class="fa fa-comments list-level"></i> 
                          </div>
                        </div>
                    </div>  
                  </div>
                  
                 </div>
               </div>
                <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_ADD)); ?>   
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>            
    </div>
        
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?> 
        <!-- OPTIONAL SCRIPTS -->
         <script src="<?php echo base_url();?>assets/project/global/plugins/moment.min.js" type="text/javascript"></script>       
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>        
         <script src="<?php echo base_url();?>assets/project/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/form-repeater.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url();?>assets/project/project-scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
       
      </div>
   
  </body>
</html>


