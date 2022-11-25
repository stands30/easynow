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
                        </div>

                        <!-- -----MAIN CONTENTS START HERE----- -->

                       <div class="portlet">
                            <div class="row">
                                <div class="container-fluid">
                                     <aside class="profile-info col-md-12">
                                        <section class="panel">
                                             <label>make drop down editable for Type,Status,Value Addition</label>
                                          <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                            <header class="panel-heading panel-heading-lead color-primary">
                                                <div class="row detail-box">
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <span class="detail-list-heading"><?php echo $title; ?></span>
                                                         <br>
                                                            <div class="col-md-12 no-side-padding inner-row">
                                                                <span class="panel-title">
                                                                    CRM
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
                                                            <td><i class="fas fa-handshake icon-client list-level"></i> Type</td>
                                                            <td>Webinar</td>
                                                            <td><i class="fas fa-info-circle list-level"></i> Status</td>
                                                            <td>Start</td>
                                                            
                                                           
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-calendar-alt list-level"></i>Start Date</td>
                                                            <td>24/01/2019</td>
                                                            <td><i class="fas fa-calendar-alt list-level"></i>End Date</td>
                                                            <td>26/01/2019</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-rupee-sign list-level"></i>Budgeted Cost</td>
                                                            <td>5000</td>
                                                            <td><i class="fas fa-rupee-sign list-level"></i>Expected Revenue</td>
                                                            <td>4500</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-rupee-sign list-level"></i>Actual Cost</td>
                                                            <td>5000</td>
                                                            <td><i class="fas fa-user-tie list-level"></i>Value Addition</td>
                                                            <td>Link</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-comments list-level"></i>Description</td>
                                                            <td colspan="3">An advertising campaign is a series of advertisement messages that share a single idea and theme which make up an integrated marketing communication.</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-comments list-level"></i>Core Message</td>
                                                            <td colspan="3">An advertising campaign is a series of advertisement messages that share a single idea and theme which make up an integrated marketing communication.</td>
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