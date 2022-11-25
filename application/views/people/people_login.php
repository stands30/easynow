
    <!DOCTYPE html>

    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>

        <head>
            <link rel="shortcut icon" href="favicon.ico" />
            <?php $this->load->view('common/header_styles'); ?>
            <!-- OPTIONAL LAYOUT STYLES -->

            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
             <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
             <!-- Form -X editable  -->
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
             <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
             <!-- Form -X editable  -->
        <!-- END PAGE LEVEL PLUGINS -->
            <!-- END OPTIONAL LAYOUT STYLES -->

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
                    <div class="page-content page-content-detail">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php 
                            echo $breadcrumb; 
                            echo getPrevNextBtn('people-login', $people->ppl_id); ?>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->
                        <div class="portlet">
                            <div class="row">
                                <!-- END PAGE HEADER-->
                                <div class="container-fluid">

                                    <!-- MAIN CONTENTS START HERE-->
                                      <?php
                                      $pplData['ppl_id'] = $people->ppl_id;
                                      $pplData['peopleLoginCheckVisible'] = $peopleLoginCheckVisible;
                                      $pplencryptedId  = $this->nextasy_url_encrypt->encrypt_openssl($people->ppl_id);
                                      $resetLink       = $people->ppl_id.'-';
                                      $encrypResetLink = $this->nextasy_url_encrypt->encrypt_openssl($resetLink);
                                      $this->load->view('people/people_sidebar',$pplData); ?>
                                      <aside class="profile-info col-lg-10 detail-view-list">
                                         <section class="panel">
                                            <div class="panel-body bio-graph-info panel-detail-view">
                                               <div class="text-center invoice-btn col-lg-offset-10">
                                               </div>
                                               <header class="panel-heading color-primary panelHeading">
                                                <div class="row detail-box">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">

                                                      <span class="panel-title"><?php echo $people->ppl_name; ?></span>&nbsp;&nbsp;
                                                      <?php  if($peopleLoginCheckVisible)
                                                    { ?>
                                                      <a class="btn-edit" href="<?php echo base_url('people-reset-password-'.$encrypResetLink) ?>">
                                                         <i class="fa fa-edit">
                                                        </i>
                                                        <span class="btn-text"> Reset Password
                                                        </span>
                                                      </a>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <span class="created">Created By: <?php echo $people->crtd_by_name; ?></span><br>
                                                      <span class="sp-date">Created On:  <?php echo $people->ppl_crdt_date; ?></span>
                                                </div>
                                               </header>
                                               <div class="table-responsive">
                                                <?php

                                              if($peopleLoginCheckVisible)
                                                    {  ?>
                                                  <table class="table table-detail-custom table-nowrap table-responsive-style">
                                                     <tbody>
                                                        <tr>
                                                           <td>Type</td>
                                                           <td>
                                                          <div class="col-md-12">
                                                            <?php echo getGenPrmResult('switch-checkbox-detail','people_login_type','people_login_type',$people->ppl_login_type,'result'); ?>
                                                          </div>
                                                           </td>
                                                        </tr>

                                                        <tr>
                                                           <td>Department</td>
                                                           <td>
                                                            <?php 
                                                                  $peopleLoginData = array();
                                                                  if(!empty($people->emp_ppl_count) && $people->emp_ppl_count > 0)
                                                                  {
                                                                  $peopleLoginData[] = PEOPLE_LOGIN_TEAM; 
                                                                  }
                                                                  if(!empty($people->cmp_ppl_count) && $people->cmp_ppl_count > 0)
                                                                  {
                                                                  $peopleLoginData[] = PEOPLE_LOGIN_COMPANY; 
                                                                  }
                                                                  if(!empty($people->cli_ppl_count) && $people->cli_ppl_count > 0)
                                                                  {
                                                                  $peopleLoginData[] = PEOPLE_LOGIN_CLIENT; 
                                                                  }
                                                                  if(!empty($people->vdr_ppl_count) && $people->vdr_ppl_count > 0)
                                                                  {
                                                                  $peopleLoginData[] = PEOPLE_LOGIN_VENDOR; 
                                                                  }
                                                                 ?>
                                                            <div class="col-md-12">
                                                            <?php echo getGenPrmResult('people-switch-checkbox-detail','people_login_dept','people_login_dept',$people->ppl_login_dept,'result',$peopleLoginData); ?>
                                                            </div>
                                                           </td>
                                                        </tr>
                                                        <tr>
                                                          <td>Username</td>
                                                          <td>
                                                             <a href="javascript:;" id="ppl_username" data-type="text" data-pk="1" data-placement="top" data-placeholder="Please enter username" data-original-title="Please enter username"  ><?php echo $people->ppl_username; ?> </a>
                                                          </td>
                                                        </tr>
                                                     </tbody>
                                                  </table>
                                                  <?php }else{ ?>

                                                    <h3>Sorry You don't have access to this page</h3>
                                                  <?php } ?>
                                               </div>
                                            </div>
                                         </section>
                                      </aside>

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
                <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <!-- Form -X editable  -->
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery.mockjax.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>

                <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js<?php echo $global_asset_version; ?>" type="text/javascript"  ></script>
               <script src="<?php echo base_url(); ?>assets/project/pages/scripts/form-editable.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
             <!-- Form -X editable  -->
                <!-- END OPTIONAL SCRIPTS -->
                <script type="text/javascript">
                  var ppl_id = '<?php echo $people->ppl_id; ?>';
                  $('#ppl_username').editable({
                        type: 'POST',
                        pk: '12',
                        params: function(params)
                        {
                          params.ppl_id=ppl_id;
                          params.ppl_username=params.value;
                          return params;
                        },
                        url: baseUrl+"people/updateLoginData",
                        title: 'Enter username',
                        emptytext: 'No username available',
                        validate: function(value) {
                          if($.trim(value) == '') {
                              return 'Please enter username';
                          }
                      }
                    });
                  $('input[name="people_login_type"]').on('switchChange.bootstrapSwitch', function (event, state)
                  {
                       var people_login_type = '';
                       $('input[name="people_login_type"]:checked').each(function()
                       {
                          people_login_type+=this.value+',';
                       });
                       data=
                       {
                          ppl_id:ppl_id,
                          ppl_login_type:people_login_type,
                          currentState:state
                       }
                         updatePeopleData(data,this,state);
                    });
                  $('input[name="people_login_dept"]').on('switchChange.bootstrapSwitch', function (event, state)
                  {
                    console.log(state);
                      var people_login_dept = '';
                       $('input[name="people_login_dept"]:checked').each(function()
                        {
                          people_login_dept+=this.value+',';
                       });
                       data=
                       {
                          ppl_id:ppl_id,
                          ppl_login_dept:people_login_dept,
                          currentState:state
                       }
                         updatePeopleData(data,this,state);

                    });
                  function updatePeopleData(data,currentCheckBox,currentState)
                  {
                    // console.log(data);
                    $.ajax({
                      type:"POST",
                      dataType:"JSON",
                      data:data,
                      url:baseUrl+"people/updateLoginData",
                      success:function(response)
                      {
                         if(response.success == true)
                          {
                              /*swal(
                              {
                                  title: "Done",
                                  text: response.message,
                                  type: "success",
                                  icon: "success",
                                  button: true,
                              }).then(()=>
                              {
                               });*/
                          }
                          else
                          {
                              swal(
                              {
                                  title: "Opps",
                                  text: response.message,
                                  type: "error",
                                  icon: "error",
                                  button: true,
                              });
                                console.log(currentCheckBox);
                                console.log(!currentState);
                                $(currentCheckBox).bootstrapSwitch('state', !currentState);
                          }
                      }
                     });
                  }
                </script>
            </div>
        </body>
    </html>
