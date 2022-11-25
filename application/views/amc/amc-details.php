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
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
        <!-- OPTIONAL LAYOUT STYLES -->
        <div class="clearfix"> </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php $this->load->view('common/sidebar'); ?>
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> 
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content page-content-detail">
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
                                             <!-- <label>Duration (years/months/days) according to the radio button condition , MAKE STATUS EDITABLE</label> -->
                                          <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                            <header class="panel-heading panel-heading-lead color-primary">
                                                <div class="row detail-box">
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <span class="detail-list-heading">AMC Details</span>
                                                         <br>
                                                            <div class="col-md-12 no-side-padding inner-row">
                                                                <span class="panel-title">
                                                                    <?php if(isset($amcdata->amc_prd_name)) echo $amcdata->amc_prd_name; ?> on <?php if(isset($amcdata->amc_renewal_dt_detail)) echo $amcdata->amc_renewal_dt_detail; ?> for <?php if(isset($amcdata->amc_ppl_name)) echo $amcdata->amc_ppl_name; ?> 
                                                                </span>
<?php
                                                                if($edit_access)
                                                                {
?>
                                                                <a class="btn-edit" href="<?php echo base_url('amc-edit-'.$amcdata->amc_id_encrypt) ?>">
                                                                  <i class="fa fa-edit">
                                                                  </i>
                                                                  <span class="btn-text"> 
                                                                    Edit
                                                                  </span>
                                                                </a>
<?php
                                                                }

                                                                if($delete_access)
                                                                {
?>
                                                                <a class="btn-edit" onclick="deleteAmc('<?php echo $amcdata->amc_id_encrypt; ?>')">
                                                                  <i class="fa fa-trash">
                                                                  </i>
                                                                  <span class="btn-text"> 
                                                                    Delete
                                                                  </span>
                                                                </a>
<?php
                                                                }                                                                
?>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                            <span class="created">Created By: <?php if(isset($amcdata->amc_crdt_by_name)) echo $amcdata->amc_crdt_by_name; ?>
                                            </span>
                                            <br>
                                            <span class="sp-date">Created On: <?php if(isset($amcdata->amc_crdt_on_format)) echo display_date($amcdata->amc_crdt_dt); ?>
                                            </span>
                                          </div>
                                                </div>
                                            </header>
                                            <div class="table-responsive" >
                                                <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fa fa-user icon-people list-level"></i>People</td>
                                                            <td><?php if(isset($amcdata->amc_ppl_name)) echo $amcdata->amc_ppl_name; ?></td>
                                                            <td><i class="fa fa-industry icon-company list-level"></i> Company</td>
                                                            <td><?php if(isset($amcdata->amc_cmp_name)) echo $amcdata->amc_cmp_name; ?></td>
                                                            
                                                        </tr>
                                                         <tr>
                                                            <td><i class="fa fa-cart-plus icon-product list-level"></i> Product</td>
                                                            <td><?php if(isset($amcdata->amc_prd_name)) echo $amcdata->amc_prd_name; ?></td>
                                                            <td><i class="fas fa-weight-hanging list-level"></i> Quantity</td>
                                                            <td><?php if(isset($amcdata->amc_qty)) echo $amcdata->amc_qty; ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-calendar list-level"></i>Start Date</td>
                                                            <td><?php if(isset($amcdata->amc_start_dt_detail)) echo $amcdata->amc_start_dt_detail; ?></td>
                                                            
                                                            <td><i class="fa fa-calendar list-level"></i>Duration</td>
                                                            <td><?php if(isset($amcdata->amc_duration)) echo $amcdata->amc_duration; ?> <?php if(isset($amcdata->amc_duration_rad_name)) echo $amcdata->amc_duration_rad_name; ?></td>   
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td><i class="fa fa-calendar list-level"></i>Renewal Date</td>
                                                            <td><?php if(isset($amcdata->amc_renewal_dt_detail)) echo $amcdata->amc_renewal_dt_detail; ?></td>
                                                            <td><i class="fa fa-calendar list-level"></i>Remind Before</td>
                                                            <td><?php if(isset($amcdata->amc_remind)) echo $amcdata->amc_remind; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-list-ol list-level"></i>AMC Invoice</td>
                                                            <td><?php if(isset($amcdata->amc_inv_name)) echo $amcdata->amc_inv_name; ?></td>
                                                            <td><i class="fas fa-info-circle list-level"></i>Status</td>
                                                            <td>
                                                                
                                                                <a href="javascript:;" id="amc_type_status" class="amc_type_status amc-status-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Status" data-original-title="Select Status" data-custom_select2_id="<?php echo $amcdata->amc_type_status; ?>" data-custom_select2_name="<?php echo $amcdata->amc_type_status_name; ?>"  data-gnp-grp="amc_type_status" data-custom-gnp-grp="amc_type_status" ><?php if(isset($amcdata->amc_type_status_name)) echo $amcdata->amc_type_status_name; ?> </a>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-rupee-sign list-level"></i>Renewal Amount</td>
                                                            <td colspan="3"><?php if(isset($amcdata->amc_renewal_amount)) echo $amcdata->amc_renewal_amount; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-comments list-level"></i>Remark</td>
                                                            <td colspan="3"><?php if(isset($amcdata->amc_remark)) echo $amcdata->amc_remark; ?></td>
                                                        </tr>
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                     

                                        </section>
                                        

                                    </aside>
                                </div>
                               
                                
                              
                   <!-- Modal Start here -->
                        
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
            <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
             <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- OPTIONAL SCRIPTS -->
              
                <!-- END OPTIONAL SCRIPTS -->
                <script type="text/javascript">
                    $(document).ready(function()
                      {
                        var primary_key     = 'mtg_id';
                        var updateUrl       = baseUrl + 'amc/updateAmcCustomData';
                        
                        
                        
                        var editableElement = '.amc-status-editable';
                        var select2Class    = 'meeting_status_select2';
                        var dropdownUrl     = 'meeting/getGenPrmforDropdown/';
                        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

                        // getcmpList();
                      })

                      function deleteAmc(amc_id)
                      {
                        cswal({
                          text : 'Do you want to delete this Entry?', 
                          title   : 'Done', 
                          type    : 'delete', 
                          onyes : function(){
                            $.ajax({
                              type: "POST",
                              url:baseUrl+'amc/deleteAmc',
                              data: {amc_id:amc_id},
                              success: function(response) {
                                response = JSON.parse(response);
                                if(response.success == true) {
                                  swal({
                                    title: "Done",
                                    text: response.message,
                                    type: "success",
                                    icon: "success",
                                    button: true,
                                  })
                                } else {
                                  swal({
                                    title: "Opps",
                                    text: "Something Went wrong",
                                    type: "error",
                                    icon: "error",
                                    button: true,
                                  });
                                }
                                
                                location.href = response.linkn;
                              }
                            });
                          }
                        });
                      }
                </script>
        </div>

</body>

</html>