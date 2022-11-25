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
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?> 
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
     <link href="<?php echo base_url(); ?>assets/module/cashbook/css/cashbook-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
   
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
          <div class="breadcrumb-button">
              <a href="<?php echo base_url('cashbook-detail-'.$cashbook_details['prev_encrypt']) ?>" class=" previous" title="">
                  <button id="newlead" class="btn green">
                      <i class="fa fa-arrow-left"></i>
                      <!-- Previous  -->
                  </button>
              </a>
              <a href="<?php echo base_url('cashbook-detail-'.$cashbook_details['next_encrypt']) ?>" class="next">
                  <button id="newlead" class="btn green">
                      <!-- Next --><i class="fa fa-arrow-right"></i>  
                  </button>
              </a>
          </div>

        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->
        <div class="portlet">
          <div class="row">
            <!-- END PAGE HEADER-->
            <div class="container-fluid">
              <!-- -----MAIN CONTENTS START HERE----- -->
              <aside class="profile-info col-md-12">
                <section class="panel">                                      
                    <header class="panel-heading panel-heading-expense color-primary">
                      <div class="row detail-box">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <span class="detail-list-heading">Cashbook Details</span><br>
                          <span class="panel-title">
                          <?php echo $title; ?>
                          </span>&nbsp;&nbsp;
                          <a class="btn-edit" href="<?php echo base_url($type.'-edit-'.$this->nextasy_url_encrypt->encrypt_openssl($cashbook_details['csb_id'])); ?>">
                          <i class="fa fa-edit">
                          </i>
                          <span class="btn-text"> Edit
                          </span>
                          </a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                          <span class="created">Created By: Nick Dave
                          </span>
                          <br>
                          <span class="sp-date">Created On: <?php echo date("d-m-Y",strtotime($cashbook_details['csb_crdt_dt'])); ?>
                          </span>
                        </div>
                      </div>
                    </header>
                    <div class="table-responsive">
                      <table class="table table-detail-custom table-style">
                        <tbody>
                          <tr>
                            <td><i class="fas fa-calendar-alt list-level"></i>Date 
                            </td>
                            <td>  <?php echo date("d-m-Y",strtotime($cashbook_details['csb_date'])); ?>
                            </td>
                            <td><i class="fas fa-info-circle list-level"></i>Approval Status
                            </td>
                            <td><?php echo $cashbook_details['csb_approve_name']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-user list-level"></i>Person 
                            </td>
                            <td> <?php echo $cashbook_details['csb_ppl_name']; ?>
                            </td>
                            <td><i class="far fa-money-bill-alt list-level"></i>Account
                            </td>
                            <td><?php echo $cashbook_details['csb_acc_name']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-th-list list-level"></i>Particular   
                            </td>
                            <td><?php echo $cashbook_details['csb_particular']; ?>
                            </td>
                            <td><i class="fas fa-rupee-sign list-level"></i>Amount
                            </td>
                            <td><?php echo $cashbook_details['csb_amount']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-th-list list-level"></i>Category  
                            </td>
                            <td><?php echo $cashbook_details['csb_cbc_name']; ?>
                            </td>
                            <td><i class="fas fa-list-ol list-level"></i>Sub Category
                            </td>
                            <td><?php echo $cashbook_details['csb_csc_name']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td><i class="fa fa-comments list-level"></i>Remark
                            </td>
                            <td colspan="3"><?php echo $cashbook_details['csb_remark']; ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </section>
              </aside>
              <!-- -----MAIN CONTENTS END HERE----- -->
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
     
       
         <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>

      <!-- END OPTIONAL SCRIPTS -->
    </div>
  </body>
  
</html>

