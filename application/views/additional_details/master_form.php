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
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/datatables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/additional_details/add_detail_custom.css">

    <!-- END PAGE LEVEL PLUGINS -->
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
              <!-- START PAGE CONTENT-->
              <div class="container-fluid" id="">
                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Additional Details Master</h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form class="col-md-push-2 col-md-8 form_edit" id="master_form">
                  <div id="form_errors"></div>
                  <input type="hidden" name="adt_type_constants" id="adt_type_constants" data-dropdown='<?php echo ADDITIONAL_DETAIL_TYPE_DROPDOWN; ?>' data-dropdown_multiple='<?php echo ADDITIONAL_DETAIL_TYPE_DROPDOWN_MULTIPLE; ?>'>
                  <input type="hidden" id="adm_id" name="adm_id" value="<?php if(!empty($admData->adm_id)){ echo  $admData->adm_id; } ?>">
                  <div class="row">
                    <div class="col-md-6 form-group form-md-line-input form-md-floating-label">  
                      <label class="drp-title">Category</label>                    
                      <div class="input-icon">
                        <i class="fas fa-th-list list-level"></i>
                        <select class="adm-category-select2 form-control input-small custom-select2" id="adm_adc_id" name="adm_adc_id" required="" data-msg="Please Select Category" autocomplete="off">
                        <option value="<?php if(!empty($admData->adm_adc_id)){ echo  $admData->adm_adc_id; } ?>" selected="selected"><?php if(!empty($admData->adm_adc_name)){ echo  $admData->adm_adc_name; } ?></option>
                        </select>
                        <label class="custom-label">Please Select Category</label>  
                      </div>
                      
                      <span class="custom-error"></span>
                    </div>
                    <div class="col-md-6 form-group form-md-line-input form-md-floating-label">    
                        <label class="drp-title">&nbsp;</label>                   
                          <div class="input-icon">
                              <input type="text" name="adm_name" id="adm_name" class="form-control" required="" data-msg="Please Enter Name"  value="<?php if(!empty($admData->adm_name)){ echo  $admData->adm_name; } ?>">
                            <span class="custom-error"></span>
                            <label class="control-label">Label <span class="asterix-error"><em>*</em></span></label>
                            <i class="fas fa-user"></i>  
                          </div>                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group  form-md-line-input form-md-floating-label"> 
                    <label class="drp-title">Field</label> 
                      <div class="input-icon">
                        <i class="fas fa-align-justify"></i>
                         <select class="adm-type-select2 form-control input-small custom-select2" id="adm_type" name="adm_type" required="" data-msg="Please Select Type" autocomplete="off">
                          <option value="<?php if(!empty($admData->adm_type)){ echo  $admData->adm_type; } ?>" selected="selected"><?php if(!empty($admData->adm_type_name)){ echo  $admData->adm_type_name; } ?></option>
                        </select>
                        <label class="custom-label">Please Select Field</label>  
                      </div>
                    </div>
                    <div class="col-md-6 form-group form-md-line-input form-md-floating-label">  
                     <label class="drp-title">&nbsp;</label>                     
                      <div class="input-icon">
                        <input type="text" name="adm_placeholder" id="adm_placeholder" class="form-control" value="<?php if(!empty($admData->adm_placeholder)){ echo  $admData->adm_placeholder; } ?>">
                      <span class="custom-error"></span>
                      <label class="control-label">Placeholder</label>
                      <i class="fas fa-address-book list-level"></i>
                      </div>
                      
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-md-6 form-group form-md-line-input form-md-floating-label adt_group" style="display: none">
                      <label class="drp-title">Group</label>
                      <div class="input-icon">
                        <i class="fa fa-users"></i>
                        <select class="adm-group-select2 form-control input-small custom-select2" id="adm_group" name="adm_group" autocomplete="off">
                          <option value="<?php if(!empty($admData->adm_group)){ echo  $admData->adm_group; } ?>" selected="selected"><?php if(!empty($admData->adm_group_name)){ echo  $admData->adm_group_name; } ?></option>
                        </select>
                        <label class="custom-label">Please Select Group</label>
                      <span class="custom-error"></span>  
                      </div>
                    </div>

                    <div class="col-md-6 form-group form-md-line-input form-md-floating-label">  
                     <label class="drp-title">&nbsp;</label>                     
                      <div class="input-icon">
                        <input type="number" name="adm_order" id="adm_order" class="form-control" value="<?php if(!empty($admData->adm_order)){ echo  $admData->adm_order; } ?>">
                      <span class="custom-error"></span>
                      <label class="control-label">Order</label>
                      <i class="fas fa-address-book list-level"></i>
                      </div>                      
                    </div>

                  </div>
                </div>
                </div>
                  <footer class="foo_bar">
                    <div class="foo_btn">
                      <button type="submit" class="btn btn_save">Save&nbsp;<i class="fa fa-check"></i></button>
                      <button type="button" class="btn btn_processing" style="display: none;"><i class='fa fa-spinner'></i> Saving...</button>
                      <button class="btn btn_can">Cancel&nbsp;<i class="fa fa-times"></i></button>
                    </div>
                  </footer>
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->


        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

          <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/project/js/jquery.alphanum.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/module/additional_details/master_form.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>
        <script type="text/javascript">

          $(document).ready(function(){

            var base_url = '<?php echo base_url(); ?>';

            $('#adm_adc_id').on('change', function(){
              $.ajax({
                url: base_url + 'additional_details/getNextOrder/'+$(this).val(),
                type: 'POST',
                success: function(data){
                  $('#adm_order').val(data);
                  $('#adm_order').addClass('edited');
                }
              })
            })
          })

          $('.adm-group-select2').alphanum();
          $('#adm_placeholder').alphanum();
        </script>
      </div>

  </body>
</html>
