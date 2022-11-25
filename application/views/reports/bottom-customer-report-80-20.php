    <!DOCTYPE html>
    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
        <head>
        <?php
        $global_asset_version = global_asset_version();
         $this->load->view('common/header_styles');
         ?>
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <!-- <i class="icon-settings font-dark"></i> -->
                                        <span class="caption-subject bold">Customer Sales</span> &nbsp;
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-quot table-list" id="module-list">
                                        <thead>
                                            <tr>
                                                <th> Customer </th>
                                                <th> Sales </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>Agro Star Industries</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,25,110</b></a></td>                                                               
                                            </tr>
                                            <tr>
                                                <td>Charms Classic Deco</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,24,905</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>Dentopedia</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,24,809</b></a></td>               
                                            </tr>
                                            
                                             <tr>
                                                <td>Dr Vaidya Eye Care Hospital</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,24,647</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>Digital Samurai</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,24,620</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>GAK Exchange CRM</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,24,509</b></a></td>                                              
                                            </tr>
                                            <tr>
                                                <td>Handyman CRM</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,22,601</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Kenarc</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,22,578</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>Laxmi Garments</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,19,456</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>Pain & Palliative Care</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,16,784</b></a></td>
                                            </tr>



                                            <tr>
                                                <td>Sai International</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,08,506</b></a></td>                                                               
                                            </tr>
                                            <tr>
                                                <td>Shubham CRM</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,01,465</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>Nikita Moulds Pvt Ltd</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>98,346</b></a></td>               
                                            </tr>
                                            
                                             <tr>
                                                <td>SteelTouch</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>92,468</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>World of Braces</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>90,346</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Pushpak</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>90,015</b></a></td>                                              
                                            </tr>
                                            <tr>
                                                <td>GMC Website</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>78,349</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Tiffin Services (F&M)</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>63,946</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>Dent-align</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>50,924</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>Video Edit Hub</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>49,981</b></a></td>
                                            </tr>


                                            <tr>
                                                <td>Advance Printer</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>37,924</b></a></td>                                                               
                                            </tr>
                                            <tr>
                                                <td>Deep Consultancy</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>24,805</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>Carvision   </td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>18,354</b></a></td>               
                                            </tr>
                                            
                                             <tr>
                                                <td>Motivate F S</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>8,904</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>Niketan CRM</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>5,940</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Parth Realtors</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>3,980</b></a></td>                                              
                                            </tr>
                                            <tr>
                                                <td>Prince Polo crm</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>2,987</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Oral CRM</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>2,580</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>Times Website</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,591</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>UKS Resort Website</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,567</b></a></td>
                                            </tr>


                                            <tr>
                                                <td>Rydeiteazy</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,532</b></a></td>                                                               
                                            </tr>
                                            <tr>
                                                <td>Realtors planet</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,498</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>Refresh   </td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,426</b></a></td>               
                                            </tr>
                                            
                                             <tr>
                                                <td>Midas Construction Website</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,368</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>Property Mantra</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,290</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>AIFF Website</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,190</b></a></td>                                              
                                            </tr>
                                            <tr>
                                                <td>Akruti SpeceCreator</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>1,109</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Bahujan VIkas Aghadi</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>987</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>BVA</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>916</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>BNI Social</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>894</b></a></td>
                                            </tr>


                                            <tr>
                                                <td>Dhruv enterprises</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>834</b></a></td>                                                               
                                            </tr>
                                            <tr>
                                                <td>DrBiz CRM</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>800</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>DrPachore   </td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>750</b></a></td>               
                                            </tr>
                                            
                                             <tr>
                                                <td>Focus Auto Serve</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>720</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>Enchanted Store Website</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>639</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>ElectroTrash</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>620</b></a></td>                                              
                                            </tr>
                                            <tr>
                                                <td>F&M Blogging Site</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>590</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Jai Sai Diamond App</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>590</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>How I Met Your Pet</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>560</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>IBM.. Indian Business Mitra</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>486</b></a></td>
                                            </tr>



                                             <tr>
                                                <td>SSB Metal</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>459</b></a></td>               
                                            </tr>
                                            
                                             <tr>
                                                <td>Stalwart Website</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>436</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>The Fire Protection Company CRM</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>420</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Tarangan Discon 2018 Reg. App.</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>409</b></a></td>                                              
                                            </tr>
                                            <tr>
                                                <td>Samudre</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>395</b></a></td>
                                            </tr>
                                            <tr>
                                                <td>Siddhagiri Website</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>387</b></a></td>
                                            </tr>
                                             <tr>
                                                <td>Pre Launch Project</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>320</b></a></td>             
                                            </tr>
                                            <tr>
                                                <td>Printzone</td>
                                                <td><a href="<?php echo base_url('customer-invoice-report-80-20'); ?>" class="table-highlighted-link"><b>300</b></a></td>
                                            </tr>
                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                <!-- -----MAIN CONTENTS END HERE----- -->
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <div class="js-scripts">
                <?php $this->load->view('common/footer_scripts'); ?>
           <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
      </script>
      <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- OPTIONAL SCRIPTS -->
                <!-- END OPTIONAL SCRIPTS -->
            <script type="text/javascript">
                    $(document).ready(function(){
                        // getList();
                        $('#module-list').dataTable({
                            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                            "language": {
                                "aria": {
                                    "sortAscending": ": activate to sort column ascending",
                                    "sortDescending": ": activate to sort column descending"
                                },
                                "emptyTable": "No data available in table",
                                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                                "infoEmpty": "No entries found",
                                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                                "lengthMenu": "_MENU_ entries",
                                "search": "Search:",
                                "zeroRecords": "No matching records found"
                            },

                            // Or you can use remote translation file
                            //"language": {
                            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
                            //},
                            

                            buttons: [
                                { extend: 'print', className: 'btn dark btn-outline' },
                                { extend: 'copy', className: 'btn red btn-outline' },
                                // { extend: 'pdf', className: 'btn green btn-outline' },
                                { extend: 'excel', className: 'btn yellow btn-outline ' },
                                // { extend: 'csv', className: 'btn purple btn-outline ' },
                                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                            ],

                            // setup responsive extension: http://datatables.net/extensions/responsive/
                            responsive: false,

                            //"ordering": false, disable column ordering
                            //"paging": false, disable pagination
                            "order": [

                            ],

                            "lengthMenu": [
                                [100,200,-1],
                                [100,200,"All"] // change per page values here
                            ],
                            // set the initial value
                            "pageLength": 100,

                            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

                            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/project/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
                            // So when dropdowns used the scrollable div should be removed.
                            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
                        });
                    });

                  
        
                </script>
            </div>
        </body>
    </html>
