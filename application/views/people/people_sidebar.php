  <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
  
    .fa-whatsapp-img-sidebar {
      width: 23px;
      margin-top: -10px;
    }
    .ppl_name_head {
      margin-bottom: 20px;
    }
</style>
  <?php

        $pplData              = $this->people_model->getPeopledataById($ppl_id);
        $pplEncryptedId       = $this->nextasy_url_encrypt->encrypt_openssl($ppl_id);
        $pplEncryptedNm       = $this->nextasy_url_encrypt->encrypt_openssl($pplData->ppl_name);
        $peopleType           = $this->home_model->getGenPrmResultByGroup('people_type','result_array');
        $peopleLoginDept      = $this->home_model->getGenPrmResultByGroup('people_login_dept','result_array');
        $peopleTypeF1KeyArray = array_column($peopleType, 'f1');
        $peopleTypeVisible   = '';
  ?>
                                <aside class="col-lg-2 sidebar-menu-list">
                                <!-- <aside class="profile-nav col-lg-3"> -->
                                   <section class="panel">
                                      <div class="user-heading round color-primary">
                                        <p class="sidebar-title">People Details</p>
                                        <?php if($pplData->ppl_profile_image != '' && $pplData->ppl_profile_image != '0')
                                        { ?>
                                          
                                          <div class="profile-icon">
                                              <!-- <i class="fa fa-user fa-2x" aria-hidden="true" ></i> -->
                                              <img src="<?php echo base_url().PEOPLE_PROFILE_IMAGE.$pplData->ppl_profile_image; ?>" class="img-responsive img-circle">
                                          </div>
                                        <?php } ?>
                                         <h1 class="ppl_name_head"><?php echo $pplData->ppl_title_name.' '.$pplData->ppl_name; ?></h1>

                                         <?php if($pplData->ppl_mob != ''){ ?>
                                          <div class="text-center">
                                          <a href="tel:<?php echo $pplData->ppl_mob; ?>" class="people-contact" data-toggle="tooltip"  data-original-title="<?php echo $pplData->ppl_mob; ?>"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></a>
                                          &nbsp;&nbsp;
                                           <a href="#" class="people-contact" data-toggle="tooltip"  data-original-title="Tel"><i class="fas fa-phone fa-2x" aria-hidden="true"></i></a>
                                             &nbsp;&nbsp;
                                         <?php }?>
                                         <?php if($pplData->ppl_email != ''){ ?>
                                           <a href="mailto:<?php echo $pplData->ppl_email; ?>" class="people-contact" data-toggle="tooltip"  data-original-title="<?php echo $pplData->ppl_email; ?>"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>
                                         <?php }?>

                                         <?php if($pplData->ppl_mob != ''){ ?>
                                          <a class=" table-div-btn" href="https://wa.me/91<?php echo $pplData->ppl_mob; ?>" data-toggle="tooltip"  data-original-title="<?php echo $pplData->ppl_mob; ?>" target="_blank">
                                            <img class="fa-whatsapp-img-sidebar" src="<?php echo base_url(); ?>assets/project/images/whatapp.png" />
                                            <span class="btn-text"></span>
                                          </a>
                                          </div>
                                         <?php }?>

                                      </div>
                                      <div class="actions actions-sidebar">
                                        <div class="btn-group text-center">
                                          <a class="btn-view-more" ></a>
                                        </div>
                                      </div>

                                                   <!--  <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle btn-view-more" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> View More
                                                        <span class="fa fa-angle-down"> </span>
                                                    </a> -->
                                      <ul class="nav nav-pills nav-stacked color-primary nav-stack">
                                         <li id="people-details" class="people_link">
                                            <a href="<?php echo base_url().'people-details-'.$pplEncryptedId; ?>">
                                                <span>Person</span>
                                                <!-- count -->
                                                <span class="sidebar-badge"></span>
                                                <!-- count -->
                                                <i class="fas fa-caret-right"></i>
                                            </a>
                                         </li>
                                    <?php
                                    if(!empty($peopleType))
                                     {
                                        foreach ($peopleType as $peopleTypekey)
                                         {
                                           $peopleTypeVisibleClass = '';
                                            switch ($peopleTypekey['f1']) {
                                                case PEOPLE_TYPE_COMPANY:
                                                    $peopleTypeLink = 'people-company-detail-';
                                                   // if(!empty($pplData->cmp_ppl_count)) 
                                                    $peopleTypeVisible = $pplData->cmp_ppl_count;
                                                    break;
                                                case PEOPLE_TYPE_LEAD:
                                                    $peopleTypeLink = 'people-lead-detail-';
                                                      // if(!empty($pplData->led_ppl_count)) 
                                                    $peopleTypeVisible = $pplData->led_ppl_count;
                                                    break;
                                                case PEOPLE_TYPE_CANDIDATE:
                                                    $peopleTypeLink = 'people-candidate-detail-';
                                                      // if(!empty($pplData->cdt_ppl_count)) 
                                                    $peopleTypeVisible = $pplData->cdt_ppl_count;
                                                    break;
                                                case PEOPLE_TYPE_EVENT:
                                                    $peopleTypeLink = 'people-event-detail-';
                                                      // if(!empty($pplData->epl_ppl_count)) 
                                                    $peopleTypeVisible = $pplData->epl_ppl_count;
                                                    break;
                                                case PEOPLE_TYPE_VENDOR:
                                                    $peopleTypeLink = 'people-vendor-detail-';
                                                       if($pplData->vdr_ppl_count > 0) 
                                                    $peopleTypeVisible = $pplData->vdr_ppl_count;
                                                    break;
                                                case PEOPLE_TYPE_CLIENT:
                                                    $peopleTypeLink = 'people-client-detail-';
                                                      // if(!empty($pplData->cli_ppl_count)) 
                                                    $peopleTypeVisible = $pplData->cli_ppl_count;
                                                    break;
                                                case PEOPLE_TYPE_TEAM:
                                                    $peopleTypeLink = 'people-team-detail-';
                                                      // if(!empty($pplData->emp_ppl_count)) 
                                                    $peopleTypeVisible = $pplData->emp_ppl_count;
                                                    break;
                                                default:
                                                    $peopleTypeLink = '';
                                                    break;
                                            }
                                            if($peopleTypeVisible <= 0)
                                            {
                                              $peopleTypeVisibleClass = 'color-inactive';
                                            }
                                            if($peopleTypekey['f1'] != PEOPLE_ADDITIONAL_DETAILS ) {
                                            ?>
                                          <li id="company-details" class="people_link <?php echo $peopleTypeVisibleClass; ?>"  >
                                            <a href="<?php echo base_url().$peopleTypeLink.$pplEncryptedId.'-'.$pplEncryptedNm; ?>">
                                              <span><?php echo $peopleTypekey['f2']; ?></span> 
                                              <span class="sidebar-badge"><?php echo $peopleTypeVisible; ?></span>
                                              <i class="fas fa-caret-right"></i>
                                            </a>
                                         </li>
                                        <?php }
                                      }
                                    }
                                    ?>
                                    <?php
                                    $peopleLoginVisible = false;
                                   if(!empty($peopleLoginDept))
                                     {
                                        foreach ($peopleLoginDept as $peopleLoginDeptkey)
                                         {
                                            switch ($peopleLoginDeptkey['f1']) {
                                              case PEOPLE_LOGIN_TEAM:
                                                if(!empty($pplData->emp_ppl_count) && $pplData->emp_ppl_count > 0)
                                                  $peopleLoginVisible = true;
                                                break;
                                              case PEOPLE_LOGIN_COMPANY:
                                                if(!empty($pplData->cmp_ppl_count) && $pplData->cmp_ppl_count > 0)
                                                  $peopleLoginVisible = true;
                                                break;
                                              case PEOPLE_LOGIN_CLIENT:
                                                if(!empty($pplData->cli_ppl_count) && $pplData->cli_ppl_count > 0)
                                                  $peopleLoginVisible = true;
                                                break;
                                              case PEOPLE_LOGIN_VENDOR:
                                                if(!empty($pplData->vdr_ppl_count) && $pplData->vdr_ppl_count > 0)
                                                  $peopleLoginVisible = true;
                                                break;

                                              default:
                                                # code...
                                                break;
                                            }
                                         }
                                      }
                                    if($peopleLoginVisible)
                                          { ?>
                                         <li id="company-details" class="people_link "  >
                                            <a href="<?php echo base_url('people-login-').$pplEncryptedId.'-'.$pplEncryptedNm; ?>">
                                                <span>Login</span>
                                                <i class="fas fa-caret-right"></i>
                                            </a>
                                         </li>
                                         <?php } ?>

                                         <li id="company-details" class="people_link "  >
                                            <a href="<?php echo base_url('people-activity-detail-').$pplEncryptedId.'-'.$pplEncryptedNm; ?>">
                                                <span>Activity</span>
                                                <i class="fas fa-caret-right"></i>
                                            </a>
                                         </li>
                                      </ul>
                                   </section>
                                </aside>


                               
