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
                    <div class="page-content page-content-detail">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                            <div class="breadcrumb-button">
                                <a href="#" class="previous" title="Previous">
                                    <span class="btn green">
                                      <i class="fa fa-arrow-left"></i>
                                    </span>
                                  </a>
                                  <a href="#" class="next" title="Next">
                                    <span class="btn green">
                                      <i class="fa fa-arrow-right"></i>
                                    </span>
                                  </a>
                            </div>
                        </div>

                        <!-- -----MAIN CONTENTS START HERE----- -->

                       <div class="portlet">
                            <div class="row">
                                <div class="container-fluid">
                                     <aside class="profile-info col-md-12">
                                        <section class="panel">
                                             
                                          <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                            <header class="panel-heading panel-heading-lead color-primary">
                                                <div class="row detail-box">
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <span class="detail-list-heading"><?php echo $title; ?> 
                                                        <a class="btn-edit" href="#">
                                                                  <i class="fa fa-edit">
                                                                  </i>
                                                                  <span class="btn-text"> Edit
                                                                  </span>
                                                                </a>
                                                            </span>
                                                         
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
                                                            <td><i class="fas fa-bullseye list-level"></i>Mission</td>
                                                            <td colspan="3">Better health and wellbeing for all Indians, now and for future generations.</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-eye list-level"></i>Vision</td>
                                                            <td colspan="3">To create a better everyday life for the many people.</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                     

                                        </section>
                                        

                                    </aside>

                                    <aside>
                                        <section>
                                                <div class="col-md-12">
                                                 
                                                <div class="flip-scroll table-div">
                                                    <table class="table table-bordered table-striped table-condensed flip-content table-role panel-body">
                                                        <thead class="flip-content">
                                                            <tr>
                                                                <th><i class="fas fa-hand-holding-heart icon-client list-level"></i> Values </th>
                                                                <th><i class="fa fa-list list-level"></i> Order</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td>Honesty is always the best policy and that trust has to be earned</td>
                                                                <td>1</td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Honesty is always the best policy and that trust has to be earned</td>
                                                                <td>1</td>
                                                                
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
                <!-- OPTIONAL SCRIPTS -->
              
                <!-- END OPTIONAL SCRIPTS -->

        </div>

</body>

</html>