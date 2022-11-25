<!DOCTYPE html>
    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
        <head>
            <link rel="shortcut icon" href="favicon.ico" />
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
            <link href="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
       
        <style type="text/css">
          .repeater-title {
            margin-bottom:10px;
          }
        </style>
        </head>
        <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
            <?php $this->load->view('common/header'); ?> 
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
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->
                        <div class="portlet portlet-fluid-background">
                            <div class="row">
                                <!-- END PAGE HEADER-->
                                <div class="container-fluid">
                                    <div class="text-center title_wrap">
                                        <h3 class="page-title text-center mt-20">Additional Details Edit</h3>
                                        <span class="sp_line color-primary"></span>
                                    </div>
                                    <!-- -----MAIN CONTENTS START HERE----- -->
                                        <form role="form" class="form_add" id="peopleEditForm">

                                            <?php
                                            if(isset($people_additional_detail['details']))
                                                $people_detail = $people_additional_detail['details'][0];
                                            ?>
                                            <!-- ************** Hidden Field Starts here *************** -->
                                            <input type="hidden" id="ppl_id" name="ppl_id" value="<?php echo $people_detail->ppl_id; ?>">
                                            <!-- ************** Hidden Field Ends here *************** -->
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8 col-offset-2">
                                                    <div class="row"> 
                                                        <?php 
                                                        foreach ($people_additional_detail['category'] as $detailCategory) {
                                                            echo '<span class="col-md-12 bold repeater-title" style="margin-bottom:10px"> &nbsp;&nbsp;&nbsp;'.$detailCategory->adc_category.'</span>';
                                                            foreach ($people_additional_detail['details'] as $peopleDetail) {
                                                                if($peopleDetail->adc_id == $detailCategory->adc_id) {

                                                                    $element = '';

                                                                    switch ($peopleDetail->adm_type) 
                                                                    {
                                                                        case ADDITIONAL_DETAIL_TYPE_TEXTBOX:
                                                                        $element =  '<input id="adm_'.$peopleDetail->adm_id.'" type="text" class="add_det form-control form_c" value="'.$peopleDetail->adt_value_name.'" data-adt_id="'.$peopleDetail->adt_id.'" />';
                                                                            break;

                                                                        case ADDITIONAL_DETAIL_TYPE_TEXTAREA:             
                                                                        $element = '<textarea id="adm_'.$peopleDetail->adm_id.'" class="add_det form-control form_c" data-adt_id="'.$peopleDetail->adt_id.'" >'.$peopleDetail->adt_value_name.'</textarea>';
                                                                        break;
                                                                        case ADDITIONAL_DETAIL_TYPE_DROPDOWN:             
                                                                        $element = '<select id="adm_'.$peopleDetail->adm_id.'" data-gnp_prm="'.$peopleDetail->gpn_group.'" class="add_det add_det_select form-control form_c" data-adt_id="'.$peopleDetail->adt_id.'" ><option selected value="'.$peopleDetail->adt_value.'">'.$peopleDetail->adt_value_name.'</option></select>';
                                                                        break;
                                                                        case ADDITIONAL_DETAIL_TYPE_DROPDOWN_MULTIPLE:    
                                                                        $adt_value_arr = explode(',', $peopleDetail->adt_value);
                                                                        $adt_value_name_arr = explode(',', $peopleDetail->adt_value_name);
                                                                        $options = '';

                                                                        for($i = 0; $i < count($adt_value_arr); $i++) {
                                                                            $options .= '<option selected value="'.$adt_value_arr[$i].'">'.$adt_value_name_arr[$i].'</option>';
                                                                        }

                                                                        $element = '<select id="adm_'.$peopleDetail->adm_id.'" data-gnp_prm="'.$peopleDetail->gpn_group.'" multiple class="det_add_mul add_det add_det_select form-control form_c" data-adt_id="'.$peopleDetail->adt_id.'" >'.$options.'</select>';
                                                                        break;
                                                                        case ADDITIONAL_DETAIL_TYPE_NUMBER:               
                                                                        $element = '<input id="adm_'.$peopleDetail->adm_id.'" type="number" class="add_det form-control form_c" value="'.$peopleDetail->adt_value_name.'" data-adt_id="'.$peopleDetail->adt_id.'" />';
                                                                        break;
                                                                        case ADDITIONAL_DETAIL_TYPE_EMAIL:                
                                                                        $element = '<input id="adm_'.$peopleDetail->adm_id.'" type="email" class="add_det form-control form_c" value="'.$peopleDetail->adt_value_name.'" data-adt_id="'.$peopleDetail->adt_id.'" />';
                                                                        break;
                                                                        case ADDITIONAL_DETAIL_TYPE_URL:                  
                                                                        $element = '<input id="adm_'.$peopleDetail->adm_id.'" type="text" class="add_det form-control form_c" value="'.$peopleDetail->adt_value_name.'" data-adt_id="'.$peopleDetail->adt_id.'" />';
                                                                        break;
                                                                    }

                                                        ?>

                                                            <div class="col-md-6">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <div class="input-icon">
                                                                        <?php echo $element; ?>
                                                                        <label><?php if($peopleDetail->adm_name) echo $peopleDetail->adm_name; ?> </label>
                                                                        <i class="fas fa-id-card-alt"></i>
                                                                        <span class="help-block custom-error"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                              <?php } 
                                                                 } 
                                                               } 
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                          
                                            <footer class="foo_bar">
                                                <div class="foo_btn">
                                                    <button type="button" class="btn btn_can">Cancel&nbsp;<i class="fa fa-times"></i></button>
                                                    <button type="button" class="btn btn_save" data-loading-text="<i class='fa fa-spinner'" onclick="saveAdditionalDetails()">Save &nbsp;<i class="fa fa-check"></i></button>
                                                </div>


                                                <!-- <div class="foo_btn">
                                                    <button type="button" class="btn btn_can">Cancel&nbsp;<i class="fa fa-times"></i></button>
                                                    <input type="checkbox" class="no-redirect hidden" />
                                                    <button type="button" class="btn btn_primary btn_save_new btn-save">Save & New &nbsp;<i class="fa fa-check"></i></button>
                                                    <button type="submit" class="btn btn_save">Save&nbsp;<i class="fa fa-check"></i></button>
                                                    <button type="button" class="btn btn_processing" style="display: none;"><i class='fa fa-spinner'></i> Saving...</i></button>
                                                </div> -->
                                            </footer>
                                        </form>
                                    </div>
                                    <!-- -----MAIN CONTENTS END HERE----- -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <div class="js-scripts">
                <?php $this->load->view('common/footer_scripts'); ?> 
                <!-- OPTIONAL SCRIPTS -->
                <script src="<?php echo base_url(); ?>assets/module/people/js/people-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url();?>assets/project/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
                <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- END OPTIONAL SCRIPTS -->
                 <script type="text/javascript">

                var select2url = baseUrl + 'people/getGenPrmforDropdown/';

                $('.date-picker').datepicker({
                  autoClose:true,
                   }).on('changeDate', function(e){
                      $(this).addClass('edited');
                      $(this).datepicker("hide");
                });

                  $(document).ready(function(){

                    $('.date-picker').datepicker({
                      autoClose:true,
                       }).on('changeDate', function(e){
                          $(this).addClass('edited');
                          $(this).datepicker("hide");
                    });

                    for(var i = 0; i < $('.add_det_select').length; i++)
                    {
                      setSelectOption('#'+$('.add_det_select')[i].id);
                    }

                    for(var i = 0; i < $('.det_add_mul').length; i++)
                    {
                      if($('#'+$('.det_add_mul')[i].id).val().length == 1 && $('#'+$('.det_add_mul')[i].id).val()[0] == '')
                        $('#'+$('.det_add_mul')[i].id + ' option')[i].remove();
                    }
                    
                    $('.btn_save_new').on('click', function(){
                        $('.no-redirect').prop('checked', true);
                        $('.btn_save').click();
                    })

                  })

                  function setSelectOption(select_id)
                  {
                    $(select_id).select2({
                      //placeholder:"Please Select",
                      ajax: {
                        url: select2url+$(select_id).data('gnp_prm'),
                        dataType: 'json',
                      }
                    });
                  }

                  function saveAdditionalDetails()
                  {
                    var obj = [];

                    for(var i = 0; i < $('.add_det').length; i++)
                    {
                      var detail = {};
                      detail.adt_ppl_id = $('#ppl_id').val();
                      detail.adt_id     = $('.add_det')[i].dataset.adt_id;

                      var valx = $('.add_det')[i].value;
                      
                      if($('.add_det')[i].type == 'select-multiple' && $($('.add_det')[i]).val())
                        valx = $($('.add_det')[i]).select2("val").join(',');

                      detail.adt_value  = valx;

                      obj.push(detail);
                    }

                    $.ajax({
                      type: "POST",
                      data:{obj},
                      url:baseUrl+'people/saveAdditionalDetails',
                      success:function(response)
                      {
                        response = JSON.parse(response);
                        if(response.success == true)
                          {
                              swal(
                              {
                                  title: "Done",
                                  text: response.message,
                                  type: "success",
                                  icon: "success",
                                  // button: true,
                              });
                                  setTimeout(function(){
                                  location.reload();
                                }, 1000) 
                          }
                          else
                          {
                            var message = 'Oops Something went wrong';
                            swal({
                              title: "Opps",
                                text: message,
                              type: "error",
                              icon: "error",
                              button: true,
                            });
                        }
                      }
                    });
                  }  
                  </script>
            </div>
          
        </body>

    </html>