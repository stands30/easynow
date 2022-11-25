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
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
       <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/module/people/css/people-activity-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
            <div class="page-content page-content-detail  ">
                <!-- BEGIN PAGE HEADER-->
                <!-- BEGIN PAGE BAR -->
                <div class="page-bar" id="breadcrumbs-list">
                          <div class="row">
                            <div class="col-md-4 col-sm-3 mob-breadcrumb">
                              <?php echo $breadcrumb; ?>
                            </div>
                            <div class="col-md-5 col-sm-8 mob-date mob-date-custom">
                              <div class="breadcrumb-date">
                                <div class="page-toolbar">
                                  <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider date-range-picker-div" data-container="body" data-placement="bottom" data-original-title="Change Activity Details Date Range" data-daterangevaluestart="" data-daterangevalueend="">
                                      <span class="thin uppercase"></span>&nbsp;
                                      <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                  </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-month-srt date-range-picker-div  date-list-picker" data-daterangevaluestart="<?php echo date('Y').'-01-01' ?>" data-daterangevalueend="<?php echo date('Y').'-12-31'; ?>" ><?php echo date('Y') ?></a>
                                <a href="#" class="btn btn-primary btn-month-srt date-range-picker-div date-list-picker" data-daterangevaluestart="<?php echo date('Y-m').'-01'; ?>" data-daterangevalueend="<?php echo date('Y-m-d'); ?>" ><?php echo date('M') ?></a>
                                <a href="#" class="btn btn-primary btn-month-srt date-range-picker-div date-list-picker" data-daterangevaluestart="" data-daterangevalueend="" >All Time</a>
                              </div>
                            </div>

                          </div>
                          
                        </div>
                <!-- END PAGE BAR -->
                <!-- END PAGE HEADER-->
                <div class="portlet">
                  <div class="row">
                    <!-- END PAGE HEADER-->
                    <div class="container-fluid">
                      <!-- -----MAIN CONTENTS START HERE----- -->
                      <?php
                        $cmpData['cmp_id'] = $companydata->cmp_id;
                        $cmpencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_id);
                        $this->load->view('company/company_sidebar',$cmpData);
                        ?>
                       <div class="col-lg-10 detail-view-list">
                          <div class="portlet light table-bordered portlet-activity">
                            <div class="activity-header">
                              <div class="activity-title">Activity</div>
                              <div class="activity-action">
                                <div class="activity-group">
                                  <div class="form-group input-group-custom">
                                    <label class="input-custom-label">Managed By</label>
                                    <select class="form-control select2 manange_by">
                                      <option value="0">Please select a People</option>
                                      <option value="1">Pooja</option>
                                      <option value="2">Ankush</option>
                                      <option value="3">Pranali</option>
                                      <option value="4">Stanley</option>
                                    </select>
                                  </div>
                                  <div class="form-group input-group-custom">
                                    <label class="input-custom-label">Event</label>
                                    <select class="form-control select2 event">
                                      <option>Please select a Event</option>                                      
                                      <option>Social Media Marketing</option>
                                      <option>Logo Design</option>
                                    </select>
                                  </div>
                                  <div class="input-group input-group-custom">
                                    <a href="#" class="btn btn-secondary btn grey btn-reload">Reset <i class="fas fa-redo-alt"></i></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="portlet-body activity-portlet-body">
                               <!-- <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0" > -->
                                 <div class="activity-list">
                                   <a href="#">
                                     <div class="activity-details">
                                        <span class="activity-inital">
                                          <span>PB</span>
                                        </span>
                                        <div class="activity-inner">
                                          <div class="activity-data">
                                            <span class="activity-bold">Pooja</span> logged in easynow
                                          </div>
                                          <div class="activity-bottom">
                                            <i class="fa fa-clock"></i> 1 Hr
                                          </div>
                                        </div>
                                     </div>
                                   </a>
                                 </div>

                                 <div class="activity-list activity-list-people">
                                   <a href="#">
                                     <div class="activity-details">
                                        <span class="activity-inital">
                                          <span>PB</span>
                                        </span>
                                        <div class="activity-inner">
                                          <div class="activity-data">
                                            <span class="activity-bold">Pooja</span> added new <span class="activity-bold">People</span>
                                          </div>
                                          <div class="activity-bottom">
                                            <i class="fa fa-clock"></i> 1 Hr
                                          </div>
                                        </div>
                                     </div>
                                   </a>
                                 </div>

                               <!-- </div> -->
                            </div>
                          </div>
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
        <!-- END OPTIONAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script> 
         <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script type="text/javascript">
          $(document).ready(function(){
              $('.manange_by').select2({
                placeholder: "Please Select Title",
                ajax: {
                  url:  baseUrl + 'people/getGenPrmforDropdown/' + 'ppl_title',
                  dataType: 'json',
                }
              });
              // $('.manange_by').select2();
              $('.event').select2();
              // alert('in js');
              //  getDataTableList('start_date,end_date);
              // getOutstandingBalanceData('start_date,end_date);
              // higlightSelectedDate();
          });
          $('.date-range-picker-div').click(function(){
            updateDateFilter($(this),function(start_date,end_date){
               // getDataTableList(start_date,end_date);
               //  getOutstandingBalanceData(start_date,end_date);
            });
          });
          $('#daterangepicker-custom-range').on('apply.daterangepicker', function(ev, picker) {
            updateDateFilter($('#daterangepicker-custom-range'),function(start_date,end_date){
               // getDataTableList(start_date,end_date);
               //  getOutstandingBalanceData(start_date,end_date);
            });
          });
        </script>
    </div>
  </body>
</html>
