<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login |  <?php echo TITLE_POSTFIX; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <?php $this->load->view('common/header_styles'); ?>
        
        <link href="<?php echo base_url().'assets/project/project-css/login-5.min.css'.$global_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'assets/project/login/login-custom.css'.$global_version; ?>" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" />
        <style type="text/css">
            .user-login-5 .login-container>.login-content>.login-form .form-control{
                margin-bottom: 0px; 
            }   
            .btn-submit-login{
                font-size: 13px;
            }
            .carousel-inner>.item.active, .carousel-inner>.item.next.left, .carousel-inner>.item.prev.right{
                height: 100vh;
            }
            .carousel-inner>.item>a>img, .carousel-inner>.item>img{
                height: 100%;
                width: 100%;
                /*object-fit: contain;*/
                object-fit: cover;

            }
            @media (max-width: 991px) {
                #login_form{
                    margin-top: 0px;
                }
                .login-page-title{
                    margin-top: 0px;
                }
                .user-login-5 .login-container>.login-content{
                    padding: 0 30px;
                }
                .btn-submit-login{
                    position: absolute;
                    /*top: 0px;*/top: -14px;
                }
                .login-connect{
                    padding-top: 30px;
                }
                .login-connect .forgot-password{
                    float: right;margin-right: 0px;
                }
                .no-side-mobile-padding{
                    padding-left: 0px;
                    padding-right: 0px;
                }
                .carousel-inner>.item.active, .carousel-inner>.item.next.left, .carousel-inner>.item.prev.right{
                    height: auto;
                }
            }
        </style>
    </head>
    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div id="load">
            <div id="contents">
                <!-- <img src="<?php echo base_url().'assets/project/images/new-logo.png'.$global_version; ?>" class="img-responsive" id="loader-img"> -->
                <div class="login-logo-div">
                    <img src="<?php echo base_url().getLogo(); ?>" class="img-responsive" id="loader-img">
                </div>
            </div>
        </div>
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-7 bs-reset">
                    <div class="login-bg">
                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                            <?php if(isset($loginGallery) && !empty($loginGallery)){ $i=1;?>
                              <?php foreach ($loginGallery as $gkey) {
                                if($i == 1){
                                  $active = 'active';
                                }else{
                                  $active = '';
                                }
                              ?>
                            <div class="item <?php echo $active ?>">
                              <img src="<?php echo base_url().GALLERY_SET_IMAGE_PATH.$gkey->gls_image; ?>" alt="...">
                              <div class="carousel-caption">
                              </div>
                            </div>
                          <?php $i++;}} ?>
                          </div>

                            <a class="carousel-control left" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="carousel-control right" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-5 login-container bs-reset">
                    <div class="login-content">
                        <div class="login-logo-div">
                            <!-- <img class="img-responsive logo-login" src="<?php echo base_url().'assets/project/images/new-logo.png'; ?>" /> -->
                            <img class="img-responsive logo-login" src="<?php echo base_url().getLogo(); ?>" />
                            
                        </div>
                      <!--   <h1>new</h1> -->
                        <!-- <p class="font-white"> <?php echo PROJECT_DESCRIPTION; ?> </p> -->

                        <form class="login-form" method="post" id="login_form" name="login_form">
                            <h1 class="font-green text-center login-page-title"> <!-- <?php PROJECT_TITLE; ?> --> Login</h1>
                            <input type="hidden" id="ref" value="<?php echo $ref; ?>">

                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>

                           <!--  <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group form-md-line-input form-md-floating-label">
                                        <div class="input-icon">
                                          <input class="form-control form-control-solid placeholder-no-fix form-group input-login login-text-input" type="text" autocomplete="off" id="usr_username" name="usr_username" autocomplete="off" required/> 
                                          <label>Username</label>
                                          <i class="fa fa-user login-user"></i>
                                        </div>                            
                                        <div class="help-block errormesssage"></div>
                                    </div>                                  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group form-md-line-input form-md-floating-label">
                                        <div class="input-icon">
                                            <input class="form-control form-control-solid placeholder-no-fix form-group input-login password-input" id="usr_password" type="password" autocomplete="off" name="usr_password" autocomplete="off" required/>
                                            <label>Password</label>
                                            <i class="fas fa-lock"></i>
                                        </div>                                 
                                            <div class="help-block errormesssage"></div>                                   
                                    </div>                                
                                </div>
                                <div class="col-xs-12">
                                    <label style="color: red;"></label>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class=" col-md-6 no-side-mobile-padding form-group form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon">
                                     <!--  <input class="form-control form-control-solid placeholder-no-fix form-group input-login login-text-input edited" type="text" autocomplete="off" id="usr_username" name="usr_username" autocomplete="off" required/>  -->
                                     <input type="text" name="username" id="usr_username" class="form-control edited" autocomplete="off">
                                      <label>Username</label>
                                      <i class="fa fa-user login-user"></i>
                                    </div>                            
                                    <div class="help-block errormesssage"></div>
                                </div> 
                                <div class="col-md-6 no-side-mobile-padding form-group form-group form-md-line-input form-md-floating-label">
                                    <div class="input-icon">
                                        <!-- <input class="form-control form-control-solid placeholder-no-fix form-group input-login password-input" id="usr_password" type="password" autocomplete="off" name="usr_password" autocomplete="off" required/> -->
                                        <input type="password" name="password" id="usr_password" class="form-control edited" autocomplete="off" autocorrect="off" autocapitalize="off" >
                                        <label>Password</label>
                                        <i class="fas fa-lock"></i>
                                    </div>                                 
                                        <div class="help-block errormesssage"></div>                                   
                                </div>   
                                
                            </div>

                            <div class="row">
                                <div class="col-sm-5 col-xs-6 no-side-mobile-padding login-connect">
                                    <div class="rem-password">
                                        <label class="rememberme mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" id="rememberme" name="rememberme" autocomplete="off" /> Remember me
                                            <span style="background-color: #fff;"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-7 col-xs-6 no-side-mobile-padding login-connect text-right">
                                    <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                                    </div>
                                    
                                 <button class="btn btn-success uppercase pull-right btn-submit-login btn green" id="forgetPass" type="submit">Submit</button>
                                </div>
                            </div>

                        </form>
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <form class="forget-form" action="" method="post" id="forgetPassword">
                            <h3 class="font-green text-center login-page-title">Forgot Password ?</h3>
                            <p> Enter your e-mail address below to reset your password. </p>
                            <div class="form-group form-group form-md-line-input form-md-floating-label">
                                <div class="input-icon">
                                     <input class="form-control placeholder-no-fix form-group" type="email" autocomplete="off" name="ppl_email" id="ppl_email"  required/>
                                    <label>Email</label>
                                    <i class="fa fa-envelope login-user"></i>
                                    <div class="help-block"></div>
                                </div>                                                                    
                            </div> 
                            <!-- <div class="form-group">

                                <input class="form-control placeholder-no-fix form-group" type="email" autocomplete="off" placeholder="Email" name="ppl_email" id="ppl_email"  required/>
                            </div> -->
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn green btn-outline btn-forget-back">Back</button>
                                <button type="submit" class="btn green btn-success uppercase pull-right ">Submit</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <!-- END FORGOT PASSWORD FORM -->
                        <div class="col-md-12 copyright-text text-center">
                            <p>
                                <a href="#">Copyright &copy; Nextasy Technologies 2018</a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="bs-reset">
                                <ul class="login-social">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                            <div class="col-md-12 col-xs-12 bs-reset text-center">
                                <div class="login-copyright text-center">
                                    <p>Copyright &copy; Nextasy Technologies 2018</p>
                                </div>
                            </div>
                    </div> -->
                </div>
            </div>
        </div>
        
        <?php $this->load->view('common/footer_scripts'); ?>

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'assets/project/global/plugins/jquery-validation/js/jquery.validate.min.js'.$global_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/project/project-scripts/login-5.js'.$global_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/module/login/form_validation_login.js'.$ci_asset_versn; ?>" ></script>
        <script src="<?php echo base_url().'assets/module/login/forget_password.js'.$global_version; ?>" ></script>
        <script type="text/javascript">
          document.onreadystatechange = function () {
                  var state = document.readyState
                   $(window).load(function(){ 
                    setTimeout(function(){
                         document.getElementById('interactive');
                         document.getElementById('load').style.display="none";
                         document.getElementById('loader-img').style.display="none";
                         document.getElementById('contents').style.display="none";
                          $('.user-login-5').css('display','block');
                      },1000);
                });

                   $('.carousel').carousel({
                      interval: 6000
                    })
            }
            
            
        </script>
        <script type="text/javascript">
            $('#usr_username, #usr_password').on('change', function (event)
            {
                if($('#usr_username').val().length > 0)
                    $('#usr_username').addClass('edited');

                if($('#usr_password').val().length > 0)
                    $('#usr_password').addClass('edited');
            });

            $('#usr_username, #usr_password').keydown(function (event) {
                var keypressed = event.keyCode || event.which;
                if (keypressed == 13) {
                    $(this).closest('form').submit();
                }
            });
        </script>

    </body>
</html>
