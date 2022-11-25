    
    <!DOCTYPE html>

    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>

        <head>
            
            <?php $this->load->view('common/header_styles'); ?> 
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/webui-popover/jquery.webui-popover.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/css/style.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <style type="text/css">
                
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
                        <div class="page-bar page-breadcrumb" id="breadcrumbs-list">
                            <div class="row">
                              <div class="col-md-6 col-sm-6 mob-breadcrumb">
                                <?php echo $breadcrumb; ?>
                              </div>
                              <div class="col-md-6 col-sm-6 mob-date text-right">
                                <div class="breadcrumb-date">
                                
                                  <div class="page-toolbar">
                                    <div id="daterangepicker-custom-range" class="pull-right tooltips btn btn-sm btn-range-divider" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range" data-daterangevaluestart="" data-daterangevalueend="">
                                        <span class="thin uppercase"></span>&nbsp;
                                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                    </div>
                                  </div>
                                  <a href="#" class="btn btn-primary btn-month-srt">2019</a>
                                  <a href="#" class="btn btn-primary btn-month-srt">April</a>
                                  <a href="#" class="btn btn-primary btn-month-srt">Today</a>
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
                                        
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-20">
                                            <h3>People &nbsp; 
                                                <div class="btn-group">
                                                    <a id="sample_editable_1_new" href="<?php echo base_url('people-add'); ?>" class="btn green btn-add-new"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                               </div>
                                            </h3>
                                        </div>

                                        <form action="<?php echo site_url('people/importPeopleExcel');?>" method="post" enctype="multipart/form-data">
                                            <div id="form_errors" class="alert alert-dismissable hidden"></div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-2"> <label>Excel File: <a href="<?php echo base_url().PEOPLE_EXCEL_DOCS_PATH ?>people_excel.xlsx" download="people_excel.xlsx" title="Lead Add Excel"><i class="fa fa-download" aria-hidden="true" style="font-size: 20px;color:black;margin-left: 10px " title="Lead Add Excel"></i>
                                                  </a></label> </div>
                                                    <div class="col-md-4"> <input type="file" class="form-control" id="userfile" name="userfile" /></div>
                                                    <div class="col-md-3"><input type="submit" value="upload" name="upload" onclick="disableExcelSubmit(this)" class="btn blue"/></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row">

                                        <?php 
                                            $keys = array_keys($dashboard_detail); 
                                            $dont_show_arr = array('Candidate');
                                            $show_top_count = array('Clients', 'Lead', 'Event_Participants', 'Connects');

                                            for($i = 0; $i < count($keys); $i++)
                                            {
                                                if(in_array($keys[$i], $dont_show_arr))
                                                    continue;
                                        ?>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-20">
                                            <a href="<?php echo base_url($dashboard_detail[$keys[$i]]->link); ?>" class="people-dasboard-list">
                                                <div class="dashboard-stat2 boxes-main people-list">
                                                    <div class="display">
                                                        <small class="text-center mb-5 people-title"><?php echo str_replace('_', ' ', $keys[$i]); ?></small>
<?php
                                                        if(in_array($keys[$i], $show_top_count)){
?>                                                        
                                                            <div class="special special-people">
                                                                <span><?php echo $dashboard_detail[$keys[$i]]->distnt; ?></span>
                                                            </div>
<?php
                                                        }
?>
                                                        <div class="icon people-icon">
                                                            <i class="fa fa-users" aria-hidden="true"></i>
                                                            
                                                        </div>
                                                        <div class="number">
                                                            
                                                            <h3 class="font-green-sharp">
                                                                <span data-counter="counterup" data-value="7800"><?php echo number_format($dashboard_detail[$keys[$i]]->total); ?></span>
                                                            </h3>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    <a href="#" class="pop-up-details" href="#" data-msg="<?php if(isset($dashboard_detail[$keys[$i]]->info)) echo $dashboard_detail[$keys[$i]]->info; ?>">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>                                              
                                                </div>
                                            </a>
                                        </div>

                                        <?php 
                                            }
                                        ?>


                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-20">
                                            <div href="#" class="people-dasboard-list">
                                                <div class="dashboard-stat2 boxes-main people-list">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                                <p data-counter="counterup" class="social-tags"><a href="javascript:;">#socialmediamarketer</a> <a href="javascript:;">#MLM</a> <a href="javascript:;">#directsales</a> <a href="javascript:;">#networkmarketing</a> <a href="javascript:;">#leadership</a> <a href="javascript:;">#success</a> <a href="javascript:;">#mompreneur</a> <a href="javascript:;">#podcast</a> <a href="javascript:;">#smallbusiness</a> <a href="javascript:;">#blogger</a> <a href="javascript:;">#workfromhomelife</a> <a href="javascript:;">#mombiz</a> <a href="javascript:;">#onlinebusiness</a></p>
                                                            </h3>
                                                        </div>
                                                        
                                                    </div>                                               
                                                </div>
                                            </div>
                                        </div>
                                        

                                    </div>

                                    <!-- <div class="row">
                                        
                                    </div> -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-20">
                                            <h3>Organization &nbsp; 
                                                <div class="btn-group">
                                                    <a id="sample_editable_1_new" href="<?php echo base_url('company-add'); ?>" class="btn green btn-add-new"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                               </div>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <?php 
                                            $company_keys = array_keys($company_dashboard_detail); 
                                            $dont_show_arr = array();
                                            $show_company_top_count = array();

                                            for($i = 0; $i < count($company_keys); $i++)
                                            {
                                                if(in_array($company_keys[$i], $dont_show_arr))
                                                    continue;
                                        ?>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-20">
                                            <a href="<?php echo base_url($company_dashboard_detail[$company_keys[$i]]->link); ?>" class="people-dasboard-list">
                                                <div class="dashboard-stat2 boxes-main people-list">
                                                    <div class="display">

                                                        <small class="text-center mb-5 people-title"><?php echo str_replace('_', ' ', $company_keys[$i]); ?></small>
<?php
                                                        if(in_array($company_keys[$i], $show_company_top_count)) {
?>                                                        
                                                            <div class="special special-people">
                                                                <span><?php echo $company_dashboard_detail[$company_keys[$i]]->distnt; ?></span>
                                                            </div>
<?php
                                                        }
?>
                                                        <div class="icon people-icon">
                                                            <i class="fa fa-users" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="number">
                                                            
                                                            <h3 class="font-green-sharp">
                                                                <span data-counter="counterup" data-value="7800"><?php echo number_format($company_dashboard_detail[$company_keys[$i]]->total); ?></span>                                                         
                                                            </h3>
                                                            
                                                        </div>
                                                        
                                                    </div>  

                                                    <a href="#" class="pop-up-details" href="#" data-msg="<?php if(isset($company_dashboard_detail[$company_keys[$i]]->info)) echo $company_dashboard_detail[$company_keys[$i]]->info; ?>">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                                                                 
                                                </div>
                                            </a>
                                        </div>

                                        <?php 
                                            }
                                        ?>

                                        <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-20">
                                            <div href="#" class="people-dasboard-list">
                                                <div class="dashboard-stat2 boxes-main people-list">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                                <p data-counter="counterup" class="social-tags"><a href="javascript:;">#socialmediamarketer</a> <a href="javascript:;">#MLM</a> <a href="javascript:;">#directsales</a> <a href="javascript:;">#networkmarketing</a></p>
                                                            </h3>
                                                        </div>
                                                        
                                                    </div>                                               
                                                </div>
                                            </div>
                                        </div> -->

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
                <!-- END OPTIONAL SCRIPTS -->
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/webui-popover/jquery.webui-popover.min.js<?php echo $global_asset_version; ?>"></script>
                 <script src="<?php echo base_url(); ?>assets/project/global/plugins/moment.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                 <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
                 <script src="<?php echo base_url(); ?>assets/project/global/scripts/dashboard-daterange-picker.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script type="text/javascript">
                    var baseUrl = '<?php echo base_url(); ?>';
                    var assetCtr = baseUrl + 'asset/';
                </script>
                <script type="text/javascript">

                    var description_msg = '<p>People includes all the stakeholders in company.</p><p>It gives overall idea about customer, team & connects</p>';

                    $('.pop-up-details').each(function()
                    {
                        $(this).webuiPopover({
                            //content:description_msg ,
                            cache: false,
                            content: $(this).attr('data-msg') ,
                            trigger:'hover',
                            placement:'auto'
                        });
                    })
                </script>
            </div>
        </body>
    </html>