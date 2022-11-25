<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php $this->load->view('common/header_styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/project/project-css/login-5.min.css<?php echo $global_asset_version; ?>">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/project/login/login-custom.css<?php echo $global_asset_version; ?>">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/module/login/css/customer-login.css<?php echo $global_asset_version; ?>">
</head>
<body class=" login">
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
            <div class="col-md-8 bs-reset">
                <div class="login-bg">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
	                        <img src="<?php echo base_url()?>assets/client_modules/easynow/login/bg-3.jpg" alt="...">
                          	<div class="carousel-caption">
					          <h5 class="carousel-title">First slide label</h5>
					          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
					        </div>
                        </div>

                        <div class="item">
                          	<img src="<?php echo base_url()?>assets/client_modules/easynow/login/bg-4.jpg" alt="...">
                          	<div class="carousel-caption">
					          	<h5 class="carousel-title">Second slide label</h5>
					          	<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
					        </div>
                        </div>

                      
                      </div>

                        <a class="carousel-control left" href="#carousel-example-generic" data-slide="prev">
                            <span class="fas fa-angle-left"></span>
                        </a>
                        <a class="carousel-control right" href="#carousel-example-generic" data-slide="next">
                            <span class="fas fa-angle-right"></span>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-md-4 login-container bs-reset">
            	<div class="col-md-12">
	        		<div class="login-content">
	        			<div class="login-logo-div">
	                        <img class="img-responsive logo-login" src="<?php echo base_url().getLogo(); ?>" />
	                    </div>
	        		</div>
	        	</div>
	        	<div class="col-md-12 login-title text-center">
	        		<h4 class="title-login">Login</h4>
	        		<h4 class="title-password">Forget Password</h4>
	        	</div>
	        	<div class="col-md-12">
            		<div class="login-details-container">
            			<form class="login-form" method="post" id="customer_login_form" name="customer_login_form">
            				<div class=" col-md-12 no-side-mobile-padding form-group form-group form-md-line-input form-md-floating-label">
            					<div class="input-icon">
                                 <input type="text" name="username" id="usr_username" class="form-control edited" autocomplete="off">
                                  <label>Username</label>
                                  <i class="fa fa-user login-user"></i>
                                </div> 
            				</div>
            				<div class=" col-md-12 no-side-mobile-padding form-group form-group form-md-line-input form-md-floating-label floating-last-label">
            					<label class="drp-title">Company</label>
            					<div class="input-icon">
            						<i class="fas fa-briefcase company-color"></i>
            						<select name="login-company" id="login-company" class="form-control login-company custom-select2">
            							<option>Nextasy</option>
            							<option>Avenue</option>
            						</select>
            					</div>
            				</div>
            				<div class=" col-md-12 no-side-mobile-padding form-group form-group form-md-line-input form-md-floating-label">
            					<div class="input-icon">
                                    <input type="password" name="password" id="usr_password" class="form-control edited" autocomplete="off" autocorrect="off" autocapitalize="off" >
                                    <label>Password</label>
                                    <i class="fas fa-lock"></i>
                                </div>  
            				</div>
            				<div class="col-md-12 no-side-mobile-padding">
            					<div class="pull-left login-connect">
            						<div class="rem-password">
	                                    <label class="rememberme mt-checkbox mt-checkbox-outline">
	                                        <input type="checkbox" id="rememberme" name="rememberme" autocomplete="off" /> Remember me
	                                        <span style="background-color: #fff;"></span>
	                                    </label>
	                                </div>
            					</div>
            					<div class="pull-right login-connect">
            						<div class="forgot-password">
	                                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
	                                </div>
            					</div>
            					<div class="clearfix"></div>
            				</div>
            				<div class="col-md-12 no-side-mobile-padding btn-list-sub">
            					<button class="btn btn-success uppercase btn-submit-login btn green btn-full-width" id="forgetPass" type="submit">Submit</button>
            				</div>

            			</form>

            		</div>
	        	</div>

	        	<div class="col-md-12">
	        		<div class="forget-details-container">
	        			<form class="forget-form" action="" method="post" id="forgetPassword">
	        				<p> Enter your e-mail address below to reset your password. </p>
	        				<div class="form-group form-group form-md-line-input form-md-floating-label">
	                            <div class="input-icon">
	                                 <input class="form-control placeholder-no-fix form-group" type="email" autocomplete="off" name="ppl_email" id="ppl_email"  required/>
	                                <label>Email</label>
	                                <i class="fa fa-envelope login-user"></i>
	                                <div class="help-block"></div>
	                            </div>                                                                    
	                        </div> 
	                        <div class="form-actions">
	                            <button type="button" id="back-btn" class="btn green btn-outline btn-forget-back">Back</button>
	                            <button type="submit" class="btn green btn-success uppercase pull-right btn-submit-right">Submit</button>
	                        </div>
	                        <div class="clearfix"></div>
	        			</form>
	        		</div>
	        	</div>
            	


                <div class="login-content">
                    
                   
                    
                    <!-- END FORGOT PASSWORD FORM -->
                    <div class="col-md-12 copyright-text text-center">
                        <p class="copy-show">
                            <a href="#" >Copyright &copy; <a href="http://nextasy.in/" target="_blank">Nextasy Technologies</a> <br> Powered by <a href="https://easynow.app/" target="_blank">EasyNow</a> - Bring Life To Your Work </a>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


	<?php $this->load->view('common/footer_scripts'); ?>
	<script type="text/javascript" src="<?php echo base_url()?>assets/project/project-scripts/login-5.js"></script>

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

</body>
</html>



