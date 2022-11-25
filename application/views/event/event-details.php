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
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

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
        <div class="page-content page-content-detail">
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <div class="page-bar" id="breadcrumbs-list">
            <?php echo $breadcrumb; ?>
            <div class="breadcrumb-button">
                <a href="<?php echo base_url('event-details-'.$eventDetail->prev_encrypt) ?>" class=" previous" title="">
                    <button id="newlead" class="btn green">
                        <i class="fa fa-arrow-left"></i>
                        <!-- Previous  -->
                    </button>
                </a>
                <a href="<?php echo base_url('event-details-'.$eventDetail->next_encrypt) ?>" class="next">
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

                <?php
                $evtData['evt_id'] = $eventDetail->evt_id;
                $evtencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($eventDetail->evt_id);
                $this->load->view('event/event-sidebar',$evtData);
                ?>

                <!-- -MAIN CONTENTS START HERE- -->
                <aside class="profile-info col-lg-10 detail-view-list">
                  <section class="panel">
                    <!-- <label>make drop down editable for Managed by</label> -->

                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view panel-event-details">
                      <div class="text-center invoice-btn col-lg-offset-10">
                      </div>
                      <header class="panel-heading color-primary">
                        <?php $evt_id = $this->nextasy_url_encrypt->encrypt_openssl($eventDetail->evt_id); ?>
                        <?php $evt_name = $this->nextasy_url_encrypt->encrypt_openssl($eventDetail->evt_name); ?>
                        <div class="row detail-box">
                          <input type="hidden" name="evt_id" id="evt_id" value="<?php echo $eventDetail->evt_id; ?>" />
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <span class="panel-title">
                              Event
                            </span>&nbsp;&nbsp;
                            <?php if($edit_access) { ?>
                            <a class="btn-edit" href="<?php echo base_url('event-edit-'.$evt_id) ?>">
                              <i class="fa fa-edit">
                              </i>
                              <span class="btn-text"> Edit
                              </span>
                            </a>
                          <?php } ?>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 created-title">
                            <span class="created">Created By: <?php echo $eventDetail->evt_crdt_by ?>
                            </span>
                            <br>
                            <span class="sp-date">Created On: <?php echo display_date($eventDetail->evt_crdt_dt) ?>
                            </span>
                          </div>
                        </div>
                      </header>
                      <div class="table-responsive">     
                        <table class="table table-detail-custom table-style">
                          <tbody>
                            <tr>
                              <td><i class="far fa-calendar list-level"></i> Name</td>
                              <td ><?php echo $eventDetail->evt_name ?>
                              </td>
                              <td><i class="fas fa-calendar-alt list-level"></i> Date </td>
                              <td><?php echo DisplayDate($eventDetail->evt_date);  ?></td>
                              <td><i class="fas fa-user-tie list-level"></i> Managed By</td>
                              <td >

                                <a href="javascript:;" id="evt_managed_by" class="evt_managed_by event-managedby-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Reporting To" data-original-title="Select Managed By" data-custom_select2_id="<?php echo $eventDetail->evt_managed_by; ?>" data-custom_select2_name="<?php echo $eventDetail->evt_managed_by_name; ?>"  data-gnp-grp="evt_managed_by"><?php if(isset($eventDetail->evt_managed_by_name)) echo $eventDetail->evt_managed_by_name; ?> </a>
                              </td>
                            </tr>
                           
                            <tr>
                             
                              <td><i class="fa fa-comments list-level"></i> Remark
                              </td>
                              <td colspan="5"><?php echo $eventDetail->evt_desc; ?></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                </aside>
                <!-- -MAIN CONTENTS END HERE -->
              </div>
            </div>
          </div>
        <!-- END CONTENT BODY -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
  </div>
  <!-- Add Event people add -->

    <div class="js-scripts">
      <?php $this->load->view('common/footer_scripts'); ?>
      <!-- OPTIONAL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>
      <!-- END PAGE LEVEL PLUGINS -->
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
      
      <script src="<?php echo base_url(); ?>assets/module/event/js/form-validation/event_people.js<?php echo $ci_asset_versn; ?>" type="text/javascript"></script>

      <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

      <!-- END OPTIONAL SCRIPTS -->
    <script type="text/javascript">

      $(document).ready(function()
      {
        var primary_key     = 'evt_id';
        var updateUrl       = baseUrl + 'event/updateEventCustomData';
        
        var editableElement = '.event-managedby-editable';
        var select2Class    = 'event_managedby_select2';
        var dropdownUrl     = 'event/getEmployeeforDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
      })

      function deleteUser(evt_id)
      {
        var type = '2';
        swal({
           title:"Delete",
           text:"Are you sure",
           type: "error",
           icon:"error",
           button: true,
        }).then(()=>{
            $.ajax({
                type: "POST",
                url: "Event/deleteEvent",
                data:{evt_id:evt_id,type:type},
                dataType:"json",
                success:function(response)
                {
                  location.reload();
                }
                });
              }
           );
      }
      </script>
    </div>
  </body>
  
</html>
