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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />   
    <!-- END OPTIONAL LAYOUT STYLES -->  
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
          <!-- END PAGE HEADER-->
          <!-- MAIN CONTENTS START HERE -->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <!-- <i class="icon-settings font-dark"></i> -->
                <span class="caption-subject bold">Client List
                </span> &nbsp;
                <div class="btn-group">
                  <a id="sample_editable_1_new" href="#" class="btn green"> Add New
                    <i class="fa fa-plus">
                    </i>
                  </a>
                </div>
              </div>
              <div class="tools">
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-responsive">
                 <table id="tblleadlist" class="table table-bordered table-list">
                  <thead>
                    <tr>                      
                      <th><i class="fas fa-user list-level"></i>Name</th>
                      <th><i class="fa fa-envelope list-level"></i>Email</th>
                      <th><i class="fa fa-mobile list-level"></i>Mobile</th>
                      <th><i class="fas fa-id-card-alt list-level"></i>Designation</th>                    
                      <th><i class="fa fa-calendar list-level"></i>Met On</th>
                      <th><i class="fas fa-cog list-level"></i>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="<?php echo base_url('client-account-detail'); ?>">Pooja</a></td>
                      <td>pooja.b@nextasy.in</td>
                      <td>9637578568</td>
                      <td>Designer</td>
                      <td></td>
                      <td>
                        <a href="#">
                          <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" title="Edit Details"></i>
                        </a>                      
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
             
            </div>
          </div>
          <!-- -----MAIN CONTENTS END HERE----- -->
        </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    
  </div>
    <!-- END CONTAINER -->
    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
      <!-- OPTIONAL SCRIPTS -->
           <!-- BEGIN PAGE LEVEL PLUGINS -->
             <!-- END OPTIONAL SCRIPTS -->
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo global_asset_version(); ?>" type="text/javascript">
          </script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js<?php echo global_asset_version(); ?>" type="text/javascript">
          </script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js<?php echo global_asset_version(); ?>" type="text/javascript">
          </script>
          <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.min.js<?php echo global_asset_version(); ?>" type="text/javascript">
          </script>
      <!-- END OPTIONAL SCRIPTS -->
     
    </div>
  </body>
</html>
