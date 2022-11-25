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
    <!-- OPTIONAL LAYOUT STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
           <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/target/css/target-custom.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->


    <!-- END PAGE LEVEL PLUGINS -->
    <style type="text/css">
     
     
    </style>
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
              <!-- END PAGE HEADER-->
              <form role="form" id="target-edit">
              <div class="container-fluid">
                <div class="text-center title_wrap">
                  <h3 class="page-title text-center mt-20">Edit Target
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                <div class="col-md-12 form_add">
                  <div class="form-group col-md-3">
                    <label>Title
                      <span class="asterix-error">
                        <em>*
                        </em>
                      </span>
                    </label>
                    <input type="hidden" name="tgt_id" id="tgt_id" value="<?php if(isset($targetEdit->tgt_id)) echo $targetEdit->tgt_id ?>">
                   <input type="text" name="tgt_title" id="tgt_title" value="<?php if(isset($targetEdit->tgt_title)) echo $targetEdit->tgt_title ?>" class="form-control" placeholder="Title" required="">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Duration
                      <span class="asterix-error">
                        <em>*
                        </em>
                      </span>
                    </label>
                    <select name="tgt_durability" id="tgt_durability" class="form-control durabilty_1 target-durability" tabindex="-1" aria-hidden="true">
                        <?php if(isset($targetEdit->tgt_durability) and !empty($targetEdit->tgt_durability)){?>
                          <option value="<?php echo $targetEdit->tgt_durability ?>"><?php echo $targetEdit->tgt_durability_name ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Quantity
                      <span class="asterix-error">
                        <em>*
                        </em>
                      </span>
                    </label>
                   <input type="text" name="tgt_qty" id="tgt_qty" value="<?php if(isset($targetEdit->tgt_qty)) echo $targetEdit->tgt_qty ?>" class="form-control" placeholder="Quantity" required="">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Volume
                      <span class="asterix-error">
                        <em>*
                        </em>
                      </span>
                    </label>
                   <input type="text" name="tgt_volume" id="tgt_volume" value="<?php if(isset($targetEdit->tgt_volume)) echo $targetEdit->tgt_volume ?>" class="form-control" placeholder="Volume" required="">
                  </div>
                  <div class="form-group col-md-3">
                    <label class="control-label">From</label>
                    <input type="text" class="form-control datepicker" id="tgt_from_dt" name="tgt_from_dt" placeholder="From Date" value="<?php if(isset($targetEdit->tgt_from_dt)) echo $targetEdit->tgt_from_dt ?>">
                    <span class="custom-error"></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label class="control-label">To</label>
                    <input type="text" class="form-control datepicker" id="tgt_to_dt" name="tgt_to_dt" placeholder="To Date" value="<?php if(isset($targetEdit->tgt_to_dt)) echo $targetEdit->tgt_to_dt ?>">
                    <span class="custom-error"></span>
                  </div>
                </div>
                <div>

                </div>
                <div class="col-md-12 mb-60">
                  <div class="repeater repeater-block-disbursement repeater-div repeater1">
                    <div data-repeater-list="target_type1" >
                      <div data-repeater-item>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>User </label>
                             <select name="sbt_type_id" id="sbt_type_id" class="form-control target_type1 target-type" data-sbt_type="<?php echo TARGET_TYPE_USER ?>" tabindex="-1" aria-hidden="true">

                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" name="sbt_id" id="sbt_id" value="">
                              <input type="text" name="sbt_title" id="sbt_title" value="" class="form-control" placeholder="Title">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Duration</label>
                            <select name="sbt_durability" id="sbt_durability" class="form-control durabilty_2 target-durability"  tabindex="-1" aria-hidden="true">
                              <?php echo getGenPrmResult('dropdown','tgt_durability','tgt_durability','1','result'); ?>
                            </select>
                              <!-- <input type="text" name="tdurablityrep" value="" class="form-control" placeholder="Durability"> -->
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Quantity</label>
                              <input type="text" name="sbt_qty" id="sbt_qty" value="" class="form-control" placeholder="Quantity">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Volume </label>
                              <input type="text" name="sbt_volume" id="sbt_volume" value="" class="form-control" placeholder="Volume">
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                              <label class="control-label">From Date</label>
                               
                                  <input type="text" class="form-control datepicker"  name="sbt_from_dt" placeholder="From Date">

                              <span class="custom-error"></span>
                          </div>
                          <div class="form-group col-md-3">
                                <label class="control-label">To Date</label>
                                 
                                    <input type="text" class="form-control datepicker"  name="sbt_to_dt" placeholder="To Date">
                                <span class="custom-error"></span>
                          </div>


                        <div class="col-md-2 mt-35">
                        <a href="javascript:;" data-repeater-delete="" class="repeater-delete mt-20"> Delete <i class="fa fa-trash"></i></a>
                        
                       </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <a href="javascript:;" data-repeater-create="" class=" mt-repeater-add  mb-20">      Add More&nbsp;                    <i class="fa fa-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 mb-60">
                  <div class="repeater repeater-block-disbursement repeater-div repeater2">
                    <div data-repeater-list="target_type2" >
                      <div class="row">

                      </div>
                      <div data-repeater-item>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Stage </label>
                              <select name="sbt_type_id" id="sbt_type_id" class="form-control target_type2 target-type" data-sbt_type="<?php echo TARGET_TYPE_STAGE ?>" tabindex="-1" aria-hidden="true">

                              </select>

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" name="sbt_id" id="sbt_id" value="">
                              <input type="text" name="sbt_title" id="sbt_title" value="" class="form-control" placeholder="Title">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Duration</label>
                            <select name="sbt_durability" id="sbt_durability" class="form-control durabilty_3 target-durability"  tabindex="-1" aria-hidden="true">
                              <?php echo getGenPrmResult('dropdown','tgt_durability','tgt_durability','1','result'); ?>
                            </select>
                              <!-- <input type="text" name="tdurablityrep" value="" class="form-control" placeholder="Durability"> -->
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Quantity</label>
                              <input type="text" name="sbt_qty" id="sbt_qty" value="" class="form-control" placeholder="Quantity">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Volume </label>
                              <input type="text" name="sbt_volume" id="sbt_volume" value="" class="form-control" placeholder="Volume">
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                              <label class="control-label">From Date</label>
                               
                                  <input type="text" class="form-control datepicker"  name="sbt_from_dt" placeholder="From Date">

                              <span class="custom-error"></span>
                          </div>
                          <div class="form-group col-md-3">
                                <label class="control-label">To Date</label>
                                 
                                    <input type="text" class="form-control datepicker"  name="sbt_to_dt" placeholder="To Date">
                                <span class="custom-error"></span>
                          </div>


                        <div class="col-md-2 mt-35">
                        <a href="javascript:;" data-repeater-delete="" class="repeater-delete mt-20"> Delete <i class="fa fa-trash"></i></a>
                        
                       </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <a href="javascript:;" data-repeater-create="" class=" mt-repeater-add mb-20">      Add More&nbsp;                    <i class="fa fa-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>
                 <div class="col-md-12 mb-60">
                  <div class="repeater repeater-block-disbursement repeater-div repeater3">
                    <div data-repeater-list="target_type3" >
                      <div data-repeater-item>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Product </label>
                               <select name="sbt_type_id" id="sbt_type_id" class="form-control target_type3 target-type" data-sbt_type="<?php echo TARGET_TYPE_PRODUCT ?>">

                              </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Title</label>
                            <input type="hidden" name="sbt_id" id="sbt_id" value="">
                              <input type="text" name="sbt_title" id="sbt_title" value="" class="form-control" placeholder="Title">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Duration</label>
                            <select name="sbt_durability" id="sbt_durability" class="form-control durabilty_4 target-durability"  tabindex="-1" aria-hidden="true">
                              <?php echo getGenPrmResult('dropdown','tgt_durability','tgt_durability','1','result'); ?>
                            </select>
                              <!-- <input type="text" name="tdurablityrep" value="" class="form-control" placeholder="Durability"> -->
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Quantity</label>
                              <input type="text" name="sbt_qty" id="sbt_qty" value="" class="form-control" placeholder="Quantity">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Volume </label>
                              <input type="text" name="sbt_volume" id="sbt_volume" value="" class="form-control" placeholder="Volume">
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                              <label class="control-label">From Date</label>
                               
                                  <input type="text" class="form-control datepicker"  name="sbt_from_dt" placeholder="From Date">

                              <span class="custom-error"></span>
                          </div>
                          <div class="form-group col-md-3">
                                <label class="control-label">To Date</label>
                                 
                                    <input type="text" class="form-control datepicker"  name="sbt_to_dt" placeholder="To Date">
                                <span class="custom-error"></span>
                          </div>


                        <div class="col-md-2 mt-35">
                        <a href="javascript:;" data-repeater-delete="" class="repeater-delete mt-20"> Delete <i class="fa fa-trash"></i></a>
                        
                       </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <a href="javascript:;" data-repeater-create="" class=" mt-repeater-add  mb-20">      Add More&nbsp;                    <i class="fa fa-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 mb-60">
                 <div class="repeater repeater-block-disbursement repeater-div repeater-div-last repeater4">
                   <div data-repeater-list="target_type4" >
                     <div data-repeater-item>
                       <div class="col-md-3">
                         <div class="form-group">
                           <label>Source </label>
                              <select name="sbt_type_id" id="sbt_type_id" class="form-control target-type" data-sbt_type="<?php echo TARGET_TYPE_SOURCE ?>">
                             </select>
                         </div>
                       </div>
                       <div class="col-md-3">
                         <div class="form-group">
                           <label>Title</label>
                           <input type="hidden" name="sbt_id" id="sbt_id" value="">
                             <input type="text" name="sbt_title" id="sbt_title" value="" class="form-control" placeholder="Title">
                         </div>
                       </div>
                       <div class="col-md-2">
                         <div class="form-group">
                           <label>Duration</label>
                           <select name="sbt_durability" id="sbt_durability" class="form-control durabilty_5 target-durability"  tabindex="-1" aria-hidden="true">
                             <?php echo getGenPrmResult('dropdown','tgt_durability','tgt_durability','1','result'); ?>
                           </select>
                             <!-- <input type="text" name="tdurablityrep" value="" class="form-control" placeholder="Durability"> -->
                         </div>
                       </div>
                       <div class="col-md-2">
                         <div class="form-group">
                           <label>Quantity</label>
                             <input type="text" name="sbt_qty" id="sbt_qty" value="" class="form-control" placeholder="Quantity">
                         </div>
                       </div>
                       <div class="col-md-2">
                         <div class="form-group">
                           <label>Volume </label>
                             <input type="text" name="sbt_volume" id="sbt_volume" value="" class="form-control" placeholder="Volume">
                         </div>
                       </div>
                       <div class="form-group col-md-3">
                             <label class="control-label">From Date</label>
                                 <input type="text" class="form-control datepicker"  name="sbt_from_dt" placeholder="From Date">

                             <span class="custom-error"></span>
                         </div>
                         <div class="form-group col-md-3">
                               <label class="control-label">To Date</label>
                                   <input type="text" class="form-control datepicker"  name="sbt_to_dt" placeholder="To Date">
                               <span class="custom-error"></span>
                         </div>

                       <div class="col-md-2 mt-35">
                        <a href="javascript:;" data-repeater-delete="" class="repeater-delete mt-20"> Delete <i class="fa fa-trash"></i></a>
                        
                       </div>
                       <div class="clearfix"></div>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <a href="javascript:;" data-repeater-create="" class="mt-repeater-add  mb-20">  Add More&nbsp;  <i class="fa fa-plus"></i>
                     </a>
                   </div>
                 </div>
               </div>

              </div>
              <footer class="foo_bar">
                <div class="foo_btn">
                  <button type="submit" class="btn btn_save">Save&nbsp;
                    <i class="fa fa-check">
                    </i>
                  </button>
                  <button type="button" class="btn btn_can">Cancel&nbsp;
                    <i class="fa fa-times">
                    </i>
                  </button>
                </div>
              </footer>
              </form>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script type="text/javascript">
       
        var target_type_count = $('.target-type').length;
        var target_type1_val =  <?php echo TARGET_TYPE_USER ?>;
        var target_type2_val =  <?php echo TARGET_TYPE_STAGE ?>;
        var target_type3_val =  <?php echo TARGET_TYPE_PRODUCT ?>;
        var target_type4_val =  <?php echo TARGET_TYPE_SOURCE ?>;

         var target_type1 = '<?php print_r($target_type1)?>';
         var target_type2 = '<?php print_r($target_type2)?>';
         var target_type3 = '<?php print_r($target_type3)?>';
         var target_type4 = '<?php print_r($target_type4)?>';
         var target_type1 = JSON.parse(target_type1);
         var target_type2 = JSON.parse(target_type2);
         var target_type3 = JSON.parse(target_type3);
         var target_type4 = JSON.parse(target_type4);

        </script>
        <!-- OPTIONAL SCRIPTS -->
        <!-- OPTIONAL SCRIPTS -->
        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/people/js/people-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-repeater/jquery.repeater.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/target/js/target-edit.js<?php echo $ci_asset_versn; ?>" type="text/javascript">

        </script>
        <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script type="text/javascript">
          $(function() {
            $( "#sbt_to_dt, #sbt_from_dt" ).datepicker({
              dateFormat : 'dd-mm-yy',
              changeMonth : true,
              changeYear : true
            });
          });
        </script>
      </div>
      </body>
    </html>
