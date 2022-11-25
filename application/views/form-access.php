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
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/module/setting/css/setting-customs.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/module/form-access/css/form-access-custom.css" rel="stylesheet" type="text/css" />
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
        <div class="page-content">
          <div class="page-bar" id="breadcrumbs-list">
            <?php echo $breadcrumb; ?>
          </div>
          <div class="portlet light bordered">
            <div class="row">
              <div class="container-fluid container-wrap">
                  <div class="row">
                      <div class="col-md-12">
                          <div class=" light bordered" style="padding-bottom: 2px;">
                              <div class="portlet-title" style="border-bottom: none;margin-bottom: 0px;">
                                <div class="col-md-12 top-row-wrap form-list-access">
                                  <div class="col-md-2 col-sm-12 col-xs-12 caption font-orange font-caption name-title" style="margin-top: 8px;">
                                      <i class="fas fa-user"></i>
                                      <span class="caption-subject bold uppercase span-quotation"><i class="fa fas-user"></i> Employee</span>
                                  </div>
                                  <div class="col-md-4 col-sm-7 col-xs-9 padd-right">
                                    <div class="form-group " style="margin-bottom: 0px;">
                                      <select id="employee_select" class="form-control select2 drp-circle" tabindex="-1" aria-hidden="true">
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-1 col-sm-5 col-xs-3 padd-left">
                                    <a id="sample_editable_1_new" href="#" onclick="getAccessDetail()" class="ml-10 btn green btn-go"> GO
                                    </a>
                                  </div>
                                </div>                              
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="bs-example">
                    <form id="form_access" method="POST">
                      <div class="panel-group panel-form-accordion hidden" id="accordion">

                      </div>
                    </form>
                </div>
              </div>

              </div>
              </form>
          </div>
        </div>
      </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>               
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/module/form-access/js/form-access.js" type="text/javascript" ></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
      </div>
  </body>
     

    <script type="text/javascript">

      $('#addNew').on('click',function()
      {
        $('#smallForm').css('display','block');
      })

      $(document).ready(function()
      {
        getModules();

        $('.access-color-chk').on('change', function()
        {
          var access_parent = $(this).closest('.form-access-row');

          if($(this).is(':checked'))
            $(access_parent).find('.child-access-chk, .all-access-chk').removeProp("disabled");
          else
            $(access_parent).find('.child-access-chk, .all-access-chk').prop("disabled", true);

          updateAccess(this);
        })

        $('.all-access-chk').on('change', function()
        {
          var access_parent = $(this).closest('.form-access-row');

          if($(this).is(':checked'))
            $(access_parent).find('.child-access-chk').prop("checked", true).trigger('change');
          else
            $(access_parent).find('.child-access-chk').removeProp("checked").trigger('change');

          updateAccess(this);
        })

        $('.child-access-chk').on('change', function()
        {
          updateAccess(this);
        })

        $('.access-color-chk').on('change', function()
        {
          updateAccess(this);
        })

        $('#employee_select').select2({
          placeholder: "Please Select Employee *",
          ajax: {
            url: baseUrl + 'Form_access/getEmployeeforDropdown',
            dataType: 'json',
          }
        });
      })

    </script>
</html>
