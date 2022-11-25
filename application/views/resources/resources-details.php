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
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
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
                                             <label>make drop down editable for Resources Type,Tags</label>
                                          <div class="panel-body bio-graph-info panel-body-detail-view">
                                            <header class="panel-heading panel-heading-lead color-primary">
                                                <div class="row detail-box">
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <span class="detail-list-heading"><?php echo $title; ?></span>
                                                         <br>
                                                            <div class="col-md-12 no-side-padding inner-row">
                                                                <span class="panel-title">
                                                                    Pipeline
                                                                </span>
                                                                <a class="btn-edit" href="#">
                                                                  <i class="fa fa-edit">
                                                                  </i>
                                                                  <span class="btn-text"> Edit
                                                                  </span>
                                                                </a>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                            <span class="created">Created By: Jayesh
                                            </span>
                                            <br>
                                            <span class="sp-date">Created On: 27-03-2018
                                            </span>
                                          </div>
                                                </div>
                                            </header>
                                            <div class="table-responsive" >
                                                <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fas fa-user-tie list-level"></i> Resources Type</td>
                                                            <td>Book</td>
                                                            <td><i class="fa fa-user icon-people list-level"></i> Author</td>
                                                            <td>Vinay Pagare</td>
                                                            
                                                           
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-list-ol list-level "></i>Order</td>
                                                            <td>1</td>
                                                            <td> <i class="fas fa-globe list-level"></i>Buy Now Link</td>
                                                            <td><a href="#" target="_blank">Pipeline</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-tags list-level"></i>Tags</td>
                                                            <td>Finance</td>
                                                            <td><i class="fas fa-database list-level"></i>Slug</td>
                                                            <td>4500</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><i class="fas fa-image list-level"></i>Image</td>
                                                            <td colspan="3">
                                                                <img src="<?php echo base_url();?>assets/project/images/dashboard-images/main/sales-overview_1.jpg" style="height: 60px;width: auto;">
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                     

                                        </section>
                                        

                                    </aside>

                                    <aside class="profile-info col-lg-12 mb-40">
                                        <section class="row">
                                            <div class="col-md-12">
                                                <label class="bold">Description
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <p>The sales prospecting system that generates leads on Linkedin without cold calling, buying expensive traffic or advertising</p>
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
                <!-- OPTIONAL SCRIPTS -->
              
                <!-- END OPTIONAL SCRIPTS -->

        </div>

</body>

</html>