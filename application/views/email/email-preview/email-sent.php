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
    <?php $this->load->view('email/common/email_styles'); ?>
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $cacheversion; ?>" rel="stylesheet" type="text/css" />
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

          <div class="portlet portlet-fluid-background email-background">
            <div class="inbox">
                <div class="col-md-12 no-side-padding inbox-row">
                    <?php $this->load->view('email/common/email_sidebar'); ?>
                    <div class="col-md-10 half-side-padding">
                        <div class="inbox-body">
                            <div class="inbox-header">
                                <h1 class="pull-left page-title">Sent</h1>
                                <div class="form-group form-compose pull-right">
                                  <input type="text" placeholder="Search" name="email-search" class="form-control form-control-search">
                                  <button class="btn-search-mail" title="Search">
                                    <i class="fas fa-search"></i>
                                  </button>
                                </div>
                                
                            </div>
                            <div class="inbox-content">
                                <table class="table table-striped table-advance table-hover table-email-sent" id="email-sent">
                                    <thead>
                                        <tr>
                                            <th colspan="3">
                                                <a href="#" class="sub-check-box hidden" data-toggle="tooltip" data-original-title="Deselect">
                                                    <i class="fas fa-minus-square" style="font-size: 21px;padding-left: 6px;color: #777;"></i>
                                                </a>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline main-checkbox">
                                                    <input type="checkbox" class="mail-group-checkbox" />
                                                    <span></span>
                                                </label>
                                                <a href="#" class="email-refresh before-list" data-toggle="tooltip" data-original-title="Refresh"><i class="fas fa-sync-alt"></i></a>
                                                <div class="btn-group input-actions before-list">
                                                    <a class="btn btn-sm blue green btn-outline dropdown-toggle sbold email-actions" href="javascript:;" data-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    <!--  Actions
                                                        <i class="fa fa-angle-down"></i> -->
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fas fa-pencil-alt"></i> Mark as Read </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-ban"></i> Spam </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fas fa-trash"></i> Delete </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <a href="#" id="draft-delete" class="draft-delete sent-delete after-list hidden" data-toggle="tooltip" data-original-title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <div class="btn-group input-actions hidden after-list">
                                                    <a class="btn btn-sm blue green btn-outline dropdown-toggle sbold email-actions" href="javascript:;" data-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    <!--  Actions
                                                        <i class="fa fa-angle-down"></i> -->
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-draft-list">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fas fa-envelope list-level"></i> Mark as Unread </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fas fa-tasks list-level"></i> Add to Task </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-star list-level"></i> Add Star </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </th>
                                            <th class="pagination-control" colspan="3">
                                                <span class="pagination-info"> 1-30 of 789 </span>
                                                <a class="btn btn-sm blue green btn-outline page-view" data-toggle="tooltip" data-original-title="Newer">
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                                <a class="btn btn-sm blue green btn-outline page-view" data-toggle="tooltip" data-original-title="Older">
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="unread" data-messageid="1">
                                             <a href="<?php base_url('email-preview') ?>"></a>
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs">Petronas IT </td>
                                            <td class="view-message "> New server for datacenter needed </td>
                                            <td class="view-message inbox-small-cells">
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="view-message text-right"> 16:30 PM </td>
                                        </tr>
                                        <tr class="unread" data-messageid="2">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> Daniel Wong </td>
                                            <td class="view-message"> Please help us on customization of new secure server </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 15 </td>
                                        </tr>
                                        <tr data-messageid="3">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> John Doe </td>
                                            <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 15 </td>
                                        </tr>
                                        <tr data-messageid="4">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> Facebook </td>
                                            <td class="view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 14 </td>
                                        </tr>
                                        <tr data-messageid="5">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star inbox-started"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> John Doe </td>
                                            <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 15 </td>
                                        </tr>
                                        <tr data-messageid="6">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star inbox-started"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> Facebook </td>
                                            <td class="view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                            <td class="view-message inbox-small-cells">
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="view-message text-right"> March 14 </td>
                                        </tr>
                                        <tr data-messageid="7">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star inbox-started"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> John Doe </td>
                                            <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                            <td class="view-message inbox-small-cells">
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="view-message text-right"> March 15 </td>
                                        </tr>
                                        <tr data-messageid="8">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> Facebook </td>
                                            <td class="view-message view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 14 </td>
                                        </tr>
                                        <tr data-messageid="9">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> John Doe </td>
                                            <td class="view-message view-message"> Lorem ipsum dolor sit amet </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 15 </td>
                                        </tr>
                                        <tr data-messageid="10">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> Facebook </td>
                                            <td class="view-message view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 14 </td>
                                        </tr>
                                        <tr data-messageid="11">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star inbox-started"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> John Doe </td>
                                            <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 15 </td>
                                        </tr>
                                        <tr data-messageid="12">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star inbox-started"></i>
                                            </td>
                                            <td class="hidden-xs"> Facebook </td>
                                            <td class="view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                            <td class="view-message inbox-small-cells">
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="view-message text-right"> March 14 </td>
                                        </tr>
                                        <tr data-messageid="13">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> John Doe </td>
                                            <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                            <td class="view-message inbox-small-cells">
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="view-message text-right"> March 15 </td>
                                        </tr>
                                        <tr data-messageid="14">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="hidden-xs"> Facebook </td>
                                            <td class="view-message view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 14 </td>
                                        </tr>
                                        <tr data-messageid="15">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> John Doe </td>
                                            <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 15 </td>
                                        </tr>
                                        <tr data-messageid="16">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> Facebook </td>
                                            <td class="view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 14 </td>
                                        </tr>
                                        <tr data-messageid="17">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star inbox-started"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> John Doe </td>
                                            <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                            <td class="view-message inbox-small-cells"> </td>
                                            <td class="view-message text-right"> March 15 </td>
                                        </tr>
                                        <tr data-messageid="18">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> Facebook </td>
                                            <td class="view-message view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                            <td class="view-message inbox-small-cells">
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="view-message text-right"> March 14 </td>
                                        </tr>
                                        <tr data-messageid="19">
                                            <td class="inbox-small-cells">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="mail-checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="inbox-small-cells inbox-started-list">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td class="view-message hidden-xs"> John Doe </td>
                                            <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                            <td class="view-message inbox-small-cells">
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="view-message text-right"> March 15 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                         
                        </div>
                    </div>
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

      <?php $this->load->view('email/common/footer_scripts'); ?>

        <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $cacheversion; ?>" type="text/javascript"></script>
      

      <script type="text/javascript">
        $(".mail-group-checkbox").click(function () {
            $(".mail-checkbox").prop('checked', $(this).prop('checked'));
        });

        $(".sub-check-box").click(function () {


            $(".mail-checkbox").removeAttr('checked', $(this).removeAttr('checked'));
            $(".sub-check-box").addClass("hidden");
            $(".main-checkbox").removeClass("hidden");
            $(".before-list").removeClass("hidden");
            $(".after-list").addClass("hidden");
        });


        $('.mail-group-checkbox').click(function() { 
            if ($(this).is(':checked')) {
                
                $(".after-list").removeClass("hidden");
                $(".before-list").addClass("hidden");

            } else {
                
                $(".before-list").removeClass("hidden");
                $(".after-list").addClass("hidden");
            }
        })

        $('.mail-checkbox').click(function() { 

            if ($(this).is(':checked')) {
                $(".after-list").removeClass("hidden");
                $(".before-list").addClass("hidden");
                $(".sub-check-box").removeClass("hidden");
                $(".main-checkbox").addClass("hidden");
            } else {
                
                $(".before-list").removeClass("hidden");
                $(".after-list").addClass("hidden");
                $(".sub-check-box").addClass("hidden");
                $(".main-checkbox").removeClass("hidden");
            }   
        })


        $(".fa.fa-star").click(function(){
            $(this).toggleClass("inbox-started")
        });

        
         $('.inbox-content').on('click', '.view-message', function () {
                loadEmailDetails($(this));
            });

         function loadEmailDetails(){
            console.log("please load the view here");
            window.location.href = "email-preview";
         }

         
      </script>

      
    </div>
  </body>
</html>
