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
                <div class="page-content-wrapper">
                    <div class="page-content page-content-detail">
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                        </div>
                       <div class="portlet">
                            <div class="row">
                                <div class="container-fluid">
                                     <aside class="profile-info col-md-12">
                                        <section class="panel">
                                             <label>make drop down editable for Type</label>
                                          <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                            <header class="panel-heading panel-heading-lead color-primary">
                                                <div class="row detail-box">
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <span class="detail-list-heading"><?php echo $title; ?></span>
                                                         <br>
                                                            <div class="col-md-12 no-side-padding inner-row">
                                                                <span class="panel-title">
                                                                    Sales Process
                                                                </span>
                                                                <a class="btn-edit" href="#">
                                                                    <i class="fa fa-edit"></i><span class="btn-text"> Edit</span>
                                                                </a>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 created-title">
                                                        <span class="created">Created By: Vinay Pagare
                                                        </span>
                                                        <br>
                                                        <span class="sp-date">Created On: 03-Nov-2018
                                                        </span>
                                                    </div>
                                                </div>
                                            </header>
                                            <div class="table-responsive" >
                                                <table class="table table-detail-custom table-stylm" style="margin-bottom: 0px">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fas fa-address-card list-level"></i>Type</td>
                                                            <td>Workshop</td>
                                                            <td><i class="fas fa-globe list-level"></i>Link</td>
                                                            <td><a href="http://easynow.pro/" target="_blank">http://easynow.pro/</a></td>
                                                        </tr>                                                           
                                                        <tr>
                                                            <td><i class="fa fa-comments list-level"></i> Description</td>
                                                            <td colspan="3">Sales Training Workshops. ... Selling skills are critical to everyone involved in the sales process</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>                                     
                                        </section>                                        
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?>
        </div>

</body>

</html>