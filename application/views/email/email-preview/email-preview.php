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
                            
                            <div class="inbox-content">
                              <div class="inbox-header inbox-view-header">
                                <h1 class="pull-left preview-subject">Tripfeber Meeting 12 March, 2019
                                    <!-- <a href="javascript:;"> Inbox </a> -->
                                </h1>
                            </div>
                            <div class="inbox-view-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="" style="display: flex;">
                                          <div class="" style="width: 55px">
                                            <img src="<?php echo base_url('assets/project/images/prson_no_img.png') ?>" class="inbox-author" style="width: 38px;"> 
                                          </div>
                                          <div class="" style="">
                                            <span class="sbold">Petronas IT </span>
                                            <span>
                                              <span aria-hidden="true"><</span>
                                                support@go.com
                                              <span aria-hidden="true">></span> 
                                              <br>
                                            </span> to
                                            <span class=""> me 
                                              <span aria-hidden="true"><</span>
                                                pooja.b@nextasy.in
                                              <span aria-hidden="true">></span> 
                                            </span> <!-- on 08:20PM 29 JAN 2013 -->
                                          </div>
                                          
                                        </div>
                                    </div>
                                    <div class="col-md-6 inbox-info-btn">
                                        <div class="btn-group">
                                            <a href="#" class="preview-reply pull-right" data-toggle="tooltip" data-original-title="Reply">
                                              <i class="fa fa-reply"></i>
                                            </a>
                                            <a href="#" class="preview-star preview-started-list pull-right">
                                              <i class="fa fa-star"></i>
                                            </a>
                                            <span class="preview-date pull-right">Mar 12, 2019, 6:14 PM (2 days ago)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="inbox-view">
                                <p>
                                    <strong>Lorem ipsum</strong> dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                    ut aliquip ex ea commodo consequat. </p>
                                <p> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et
                                    <a href="javascript:;"> iusto odio dignissim </a> qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi
                                    non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. </p>
                                <p> Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. </p>
                                <p> Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem
                                    modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. </p>
                            </div>
                            <hr>
                            <div class="inbox-attached">
                                <div class="margin-bottom-15">
                                    <a href="javascript:;">Download all attachments </a>
                                </div>
                                <div class="margin-bottom-15">
                                  <div class="preview-attachment">
                                    <ul>
                                      <li>
                                        <div class="show-image">
                                            <img src="<?php echo base_url('assets/project/images/dashboard-images/main/33.jpg') ?>" />
                                            <span class="overlay-title"><strong>images1.jpg</strong></span>
                                            <a href="#" class="overlay-button" title="Download">
                                              <i class="fas fa-download "></i>
                                            </a>
                                        </div>
                                      </li>
                                      <li>
                                        <div class="show-image">
                                            <img src="<?php echo base_url('assets/project/images/dashboard-images/main/37.jpg') ?>" />
                                            <span class="overlay-title"><strong>images2.jpg</strong></span>
                                            <a href="#" class="overlay-button" title="Download">
                                              <i class="fas fa-download "></i>
                                            </a>
                                        </div>
                                      </li>
                                      

                                      <li>
                                        <div class="show-image">
                                            <img src="<?php echo base_url('assets/project/images/dashboard-images/main/sales.jpg') ?>" />
                                            <span class="overlay-title"><strong>images3.jpg</strong></span>
                                            <a href="#" class="overlay-button" title="Download">
                                              <i class="fas fa-download "></i>
                                            </a>
                                        </div>
                                      </li>


                                    </ul>
                                  </div>
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
      <script type="text/javascript">
        $(".fa.fa-star").click(function(){
            $(this).toggleClass("inbox-started")
        });
      </script>
      
    </div>
  </body>
</html>
