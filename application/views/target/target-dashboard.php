
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

            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/module/target/css/target-dashboard.css" rel="stylesheet" type="text/css" />
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
                        <div class="portlet">
                            <div class="row">
                                <!-- END PAGE HEADER-->
                                <div class="container-fluid">
                                    <!-- -----MAIN CONTENTS START HERE----- -->
                                        
                               <!--  <div class="row mb-20">
                                    <div class="col-md-12">
                                        <div class="portlet-title">
                                            <div class="caption font-dark">
                                               <span class="caption-subject bold">                                                    
                                                </span> &nbsp;
                                                <div class="btn-group">
                                                        <a id="sample_editable_1_new" href="<?php echo base_url('people-add'); ?>" class="btn green btn-add-new"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                               </div>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                    </div>
                                </div> -->
                                   
                              <!--   <div class="container">
                                      <h2>Dropdowns</h2>
                                      <p>The .dropdown class is used to indicate a dropdown menu.</p>
                                      <p>Use the .dropdown-menu class to actually build the dropdown menu.</p>
                                      <p>To open the dropdown menu, use a button or a link with a class of .dropdown-toggle and data-toggle="dropdown".</p>                                          
                                      <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                          Dropdown button
                                        </button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">Link 1</a>
                                          <a class="dropdown-item" href="#">Link 2</a>
                                          <a class="dropdown-item" href="#">Link 3</a>
                                        </div>
                                      </div>
                                    </div> -->
                                    

                                   <!--  <div class="container">
                                                        
                                        <div class="col-md-12">
                                            <div class=" dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                                Choose Target
                                                <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#">Target 1</a></li>
                                                      <li><a href="#">Target 2</a></li>
                                                      <li><a href="#">Target 3</a></li>
                                                    </ul>
                                              </div>
                                                <div class="col-md-3 text-center ">
                                                  <h3 class="page-title text-center mt-20">Target Dashboard
                                                  </h3>
                                                  <span class="sp_line color-primary">
                                                  </span>
                                                </div>
                                        </div>                                            
                                            
                                    </div><br> -->

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                             <div class=" dropdown">
                                                <button class="btn btn-primary dropdown-toggle tar-drp" type="button" data-toggle="dropdown">
                                                Choose Target
                                                <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#">Target 1</a></li>
                                                      <li><a href="#">Target 2</a></li>
                                                      <li><a href="#">Target 3</a></li>
                                                    </ul>
                                              </div><br>
                                        </div>
                                    </div>
                                    <div class="col-md-12"> 
                                        <div class=" col-md-6">
                                            <div class="boxes-main client-main-list">
                                               <div class="client-meeting-title div-height">
                                                 <a href="#" class="meeting-tilte main-head">
                                                   <h3>Number Of Leads</h3>                         
                                                 </a>   
                                                 <hr class="hr-row hr-custom">
                                                <div class="row">
                                                   <div class="col-md-6 col-sm-6 col-xs-12 meeting-sepration">
                                                        <div class="leadicon">
                                                                         <i class="fas fa-chalkboard-teacher"></i>
                                                                    </div>
                                                        <div class="col-md-12 col-xs-12 side-padding top-num">

                                                          <div class="meeting-list lead-num">                      
                                                           <a href="#"><h3>Actual Number</h3></a>
                                                          </div>
                                                          <div class="meeting-count meeting-count-first num-font">
                                                            <a href="#">
                                                              <h1>32 </h1>
                                                            </a>
                                                          </div>
                                                        </div>                                       
                                                   </div>
                                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="target-icon">
                                                            <i class="fas fa-bullseye"></i>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12 side-padding top-num">
                                                            <div class="meeting-list lead-num title-div ">                      
                                                             <a href="#"><h3>Target Number</h3></a>
                                                            </div>
                                                            <div class="meeting-count meeting-count-second num-font vol-num-color">
                                                              <a href="#">
                                                                <h1>42 </h1>
                                                              </a>
                                                            </div>                                            
                                                         </div>
                                                   </div> 
                                                </div>                                      
                                               </div>

                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="boxes-main client-main-list">
                                               <div class="client-meeting-title div-height">
                                                 <a href="#" class="meeting-tilte main-head">
                                                   <h3>Volume</h3>                         
                                                 </a>   
                                                 <hr class="hr-row hr-custom">
                                                 <div class="row">
                                                   <div class="col-md-6 col-sm-6 col-xs-12 meeting-sepration">
                                                    <div class="leadicon">
                                                                     <i class="fas fa-chalkboard-teacher"></i>
                                                                </div>
                                                    <div class="col-md-12 col-xs-12 side-padding top-num">

                                                      <div class="meeting-list lead-num">                      
                                                       <a href="#"><h3>Actual Number</h3></a>
                                                      </div>
                                                      <div class="meeting-count meeting-count-first num-font">
                                                        <a href="#">
                                                          <h1>32 </h1>
                                                        </a>
                                                      </div>
                                                    </div>
                                                    
                                                    
                                                      
                                                    
                                                   </div>
                                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="target-icon">
                                                                    <i class="fas fa-bullseye"></i>
                                                                </div>
                                                      <div class="col-md-12 col-xs-12 side-padding top-num">
                                                        <div class="meeting-list lead-num title-div">                      
                                                         <a href="#"><h3>Target Number</h3></a>
                                                        </div>
                                                        <div class="meeting-count meeting-count-second num-font vol-num-color">
                                                          <a href="#">
                                                            <h1>42 </h1>
                                                          </a>
                                                        </div>
                                                        
                                                      </div>
                                                        
                                                   </div>  

                                                 </div>                                      
                                               </div>

                                            </div>
                                        </div>


                                    </div>

                                <!-- <div class="col-md-12 flip-scroll table-div">
                                    <header>
                                        <div class="detail-box">
                                            <div>
                                                <span class="panel-title">
                                            User Table
                                            </span>&nbsp;&nbsp;

                                            </div>

                                        </div>
                                    </header><br>
                                    

                                    <table class="table table-bordered">
                                      <thead class="tab-color">
                                        <tr>
                                          <th scope="">User</th>
                                          <th scope="">Type</th>
                                          <th scope="">Planned</th>
                                          <th scope="">Achieved</th>
                                           <th scope=""> <i class="fa fa-cog fa-lg fa-spin"></i> Progress</th>
                                          <th scope="">Days Left</th>
                                          <th scope="">Run Rate</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td scope="">Vinay</td>
                                          <td>123</td>
                                          <td>pending</td>
                                          <td>yes</td>
                                          <td>pending</td>
                                          <td>22</td>
                                          <td>21</td>
                                        </tr>
                                        <tr>
                                          <td scope="">Vinay</td>
                                          <td>123</td>
                                          <td>pending</td>
                                          <td>yes</td>
                                          <td>pending</td>
                                          <td>22</td>
                                          <td>21</td>
                                        </tr>
                                        <tr>
                                          <td scope="">Vinay</td>
                                          <td>123</td>
                                          <td>pending</td>
                                          <td>yes</td>
                                          <td>pending</td>
                                          <td>22</td>
                                          <td>21</td>
                                        </tr>
                                        
                                      </tbody>
                                    </table>


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
                <script src="<?php echo base_url(); ?>assets/module/people/js/people-customs.js" type="text/javascript"></script>
                <!-- END OPTIONAL SCRIPTS -->

                <script type="text/javascript">
                    var baseUrl = '<?php echo base_url(); ?>';
                    var assetCtr = baseUrl + 'asset/';
                </script>

            </div>
        </body>
    </html>