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
            <!-- OPTIONAL LAYOUT STYLES -->
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <!-- END OPTIONAL LAYOUT STYLES -->
            <style type="text/css">

              .profile-icon{
                color: #fff;
                text-align: center;
                padding: 10px 48px;
              }
              .profile-icon img{
                display: block;
                margin: 0 auto;
              }
              .people-tag{
                background: #1d96ad;
                color: #fff;
                padding: 2px 4px;
              }
              .modal .modal-header .btn-contact{
                margin-top: -48px!important;
              }
               .send-mail-processing
              {
                display: none;
              }
            </style>
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
                            <?php echo $breadcrumb; ?>
                             <div class="breadcrumb-button">
                              <?php
                                $prev_ppl_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($people->prev_people);
                                $next_ppl_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($people->next_people);
                              ?>
                               <!-- Previous  -->
                              <a href="<?php echo base_url('people-details-'.$prev_ppl_encrypted_id); ?>" class=" previous" title="">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-left"></i>                                    
                                  </button>
                                  
                              </a>
                              <!-- Next -->
                              <a href="<?php echo base_url('people-details-'.$next_ppl_encrypted_id); ?>" class="next">
                                  <button class="btn green">
                                      <i class="fa fa-arrow-right"></i>
                                  </button>
                                  
                              </a>
                          </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->
                        <div class="portlet">
                            <div class="row">
                                <!-- END PAGE HEADER-->
                                <div class="container-fluid">
                                    <!-- -----MAIN CONTENTS START HERE----- -->
                                      <?php
                                      $pplData['ppl_id'] = $people->ppl_id;
                                      $pplencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($people->ppl_id);
                                      $this->load->view('people/people_sidebar',$pplData); ?>
                                      <aside class="profile-info col-lg-10 detail-view-list">
                                        <input type="hidden" name="ppl_id" id="ppl_id" value="<?php echo $pplData['ppl_id']; ?>">
                                         <section class="panel">
                                            <div class="panel-body bio-graph-info panel-detail-view">
                                               <div class="text-center invoice-btn col-lg-offset-10">
                                               </div>
                                               <header class="panel-heading color-primary panelHeading people-details-list">
                                                <div class="detail-box people-row">
                                                  <!-- <div class="col-md-8 col-sm-8 col-xs-12"> -->
                                                  <div class="title-details">
                                                    <div class="title-list">
                                                       <span class="panel-title"><?php echo  $people->ppl_title_name.' '.$people->ppl_name; ?></span>&nbsp;&nbsp;
                                                    </div>
                                                    <div class="title-list-action">      
                                                      <?php
                                                        if(!property_exists($people, 'private_access') || (property_exists($people, 'private_access') && $people->private_access == 1)) 
                                                        { 
                                                          if($edit_access) { ?>                                                
                                                          <a class="btn btn-edit" href="<?php echo base_url('people-edit-'.$pplencryptedId); ?>" data-toggle="tooltip"  data-original-title="Edit">
                                                          <i class="fa fa-edit"></i><span class="btn-text"> Edit</span></a>
                                                        <?php }?>
                                                        <?php if($delete_access) { ?> 
                                                           <a class="btn btn-edit " onclick="deletePeople(<?php echo $people->ppl_id; ?>)" data-toggle="tooltip" data-original-title="Delete">
                                                          <i class="fa fa-trash"> </i> <span class="btn-text"> Delete</span></a>
                                                        <?php }
                                                        }
                                                      ?>
                                                             
                                                    </div>
                                                                                                                                                            
                                                  </div>
                                                   <div class="profile-details">
                                                     <!-- <div class="col-md-4 col-xs-5 main-people-detail">  -->
                                                                 
                                                       <span class="detail-list-heading">Profile</span>
                                                       <br>
                                                       <?php if($people->ppl_email != '')
                                                        { ?>
                                                       <a class="btn btn-edit send-mail btn-profile" href="#" data-toggle="tooltip"  data-original-title="Send Profile Detail Mail to <?php echo  $people->ppl_title_name.' '.$people->ppl_name; ?>">
                                                        <span class="btn-text send-mail-button"><i class="fa fa-envelope title"></i></span><span class="send-mail-processing"><i class='fa fa-spinner '></i> Sending Mail...</i> </span><span class="btn-text"></span></a>
                                                        <?php }  if($people->ppl_mob != '') { ?>
                                                        <a class=" table-div-btn" href="https://wa.me/91<?php echo $people->ppl_mob; ?>" data-toggle="tooltip"  data-original-title="Send Profile Detail WhatsApp Message to <?php echo  $people->ppl_title_name.' '.$people->ppl_name; ?>" target="_blank">
                                                        <!-- <a class=" table-div-btn" href="https://wa.me/91<?php echo $people->ppl_mob; ?>" data-toggle="tooltip"  data-original-title="<?php echo $people->ppl_mob; ?>" target="_blank"> -->
                                                          <img class="fa-whatsapp-img-title" src="<?php echo base_url(); ?>assets/project/images/whatapp.png" />
                                                          <span class="btn-text"></span>
                                                        </a>
                                                        

                                                        <?php } ?>
                                                                                                    
                                                   </div>
                                                  <div class="created-details">
                                                        <span class="created">Created By: <?php echo $people->crtd_by_name; ?></span><br>
                                                        <span class="sp-date">Created On:  <?php echo display_date($people->ppl_crdt_dt); ?></span>
                                                  </div>
                                                </div>
                                               </header>
                                               <div class="table-responsive table-responsive-style">
                                                  <table class="table table-detail-custom table-style">
                                                     <tbody>
                                                      <!-- <tr>
                                                        <td>Profile</td>
                                                        <td>
                                                          
                                                        </td>
                                                        <td>Communicate</td>
                                                        <td></td>
                                                      </tr> -->
                                                       <tr>
                                                          <td> <i class="fa fa-envelope list-level" aria-hidden="true"></i> Email</td>
                                                           <td>
                                                            <?php if($people->ppl_email != '')
                                                            { ?>
                                                            <a href="mailto:<?php echo $people->ppl_email; ?>"><?php echo $people->ppl_email; ?></a>
                                                            <a class="btn btn-edit contact-add table-div-btn"  data-contact-type="<?php echo CONTACT_EMAIL; ?>" data-contact-ppl_id="<?php echo $people->ppl_id; ?>"
                                                            data-contact-pct_id="" data-contact-pct_value="" data-contact-pct_active_name="" data-contact-pct_active="" data-toggle="modal"  >
                                                              <i class="fa fa-plus" data-toggle="tooltip" data-original-title="Add Email"></i>
                                                              <span class="btn-text"></span>
                                                            </a>
                                                      <?php } ?></td>
                                                           <td> <i class="fa fa-mobile list-level" aria-hidden="true"></i> Mobile</td>
                                                           <td>
                                                            <?php if($people->ppl_mob != '')
                                                            { ?> <a href="tel:<?php echo $people->ppl_mob; ?>"><?php echo $people->ppl_mob; ?></a>
                                                            <a class="btn btn-edit contact-add table-div-btn"  data-contact-type="<?php echo CONTACT_MOBILE; ?>" data-contact-ppl_id="<?php echo $people->ppl_id; ?>"   data-contact-pct_id="" data-contact-pct_value="" data-contact-pct_active="" data-contact-pct_active_name="" data-toggle="modal">
                                                      <i class="fa fa-plus" data-toggle="tooltip" data-original-title="Add Contact No"></i><span class="btn-text"></span></a>
                                                        <a class=" table-div-btn" href="https://wa.me/91<?php echo$people->ppl_mob; ?>" data-toggle="tooltip"  data-original-title="Send Profile Detail WhatsApp Message to <?php echo  $people->ppl_title_name.' '.$people->ppl_name; ?>" target="_blank">
                                                         <img class="fa-whatsapp-img" src="<?php echo base_url(); ?>assets/project/images/whatapp.png"><span class="btn-text"></span></a>
                                                      <?php } ?></td>
                                                        </tr>
                                                      <!--   <tr>
                                                          <?php if(isset($people_contact) && !empty($people_contact)){

                                                       foreach ($people_contact as $people_contactKey) {
                                                        if($people_contactKey->pct_type == CONTACT_EMAIL)
                                                        {
                                                        ?>
                                                        <td>Email</td>
                                                          <td>
                                                            <a href="mailto:<?php echo $people_contactKey->pct_value; ?>"><?php echo $people_contactKey->pct_value; ?></a>
                                                            <a class="contact-add table-div-btn"  data-contact-type="<?php echo CONTACT_EMAIL; ?>" data-contact-ppl_id="<?php echo $people->ppl_id; ?>"   data-contact-pct_id="<?php echo $people_contactKey->pct_id; ?>" data-contact-pct_value="<?php echo $people_contactKey->pct_value; ?>" data-contact-pct_contact_type="<?php echo $people_contactKey->pct_contact_type; ?>" data-contact-pct_contact_type_name="<?php echo $people_contactKey->pct_contact_type_name; ?>" data-contact-pct_active="<?php echo $people_contactKey->pct_active; ?>" data-contact-pct_active_name="<?php echo $people_contactKey->pct_active_name; ?>" data-toggle="modal">
                                                      <i class="fa fa-edit"></i><span class="btn-text"></span></a>
                                                      <a class="contact-delete table-div-btn"  data-contact_id="<?php echo $people_contactKey->pct_id; ?>" data-contact_value="<?php echo $people_contactKey->pct_value; ?>" >
                                                      <i class="fa fa-trash"></i><span class="btn-text"></span></a></td>
                                                        </tr>
                                                      <?php }
                                                       }
                                                     } ?>
                                                       <?php if(isset($people_contact) && !empty($people_contact)){
                                                        echo '';
                                                            foreach ($people_contact as $people_contactKey) {
                                                        if($people_contactKey->pct_type == CONTACT_MOBILE)
                                                        {
                                                        ?>
                                                        <td>Mobile</td>
                                                          <td>
                                                            <a href="tel:<?php echo $people_contactKey->pct_value; ?>"><?php echo $people_contactKey->pct_value; ?></a>
                                                            <a class="contact-add table-div-btn"  data-contact-type="<?php echo CONTACT_MOBILE; ?>" data-contact-ppl_id="<?php echo $people->ppl_id; ?>"   data-contact-pct_id="<?php echo $people_contactKey->pct_id; ?>" data-contact-pct_value="<?php echo $people_contactKey->pct_value; ?>" data-contact-pct_contact_type="<?php echo $people_contactKey->pct_contact_type; ?>" data-contact-pct_contact_type_name="<?php echo $people_contactKey->pct_contact_type_name; ?>" data-contact-pct_active="<?php echo $people_contactKey->pct_active; ?>"  data-contact-pct_active_name="<?php echo $people_contactKey->pct_active_name; ?>"  data-toggle="modal">
                                                      <i class="fa fa-edit"></i><span class="btn-text"></span></a><a class="contact-delete table-div-btn"  data-contact_id="<?php echo $people_contactKey->pct_id; ?>" data-contact_value="<?php echo $people_contactKey->pct_value; ?>" >
                                                      <i class="fa fa-trash"><span class="btn-text"></span></a></td>
                                                      <?php }
                                                       }} ?>
                                                       </tr> -->
                                                        <tr>
                                                          <td><i class="fa fa-industry icon-company list-level"></i> Company</td>
                                                          <td><?php if(isset($people->company_name)) 
                                                          { 
                                                            $cmp_id = '';
                                                            if(isset($people->company_id) && $people->company_id !='')
                                                            {
                                                              $cmp_id = $this->nextasy_url_encrypt->encrypt_openssl($people->company_id);
                                                            }
                                                            ?>
                                                            <a href="<?php echo base_url('company-details-'.$cmp_id); ?>">
                                                              <?php  echo $people->company_name; ?>
                                                            </a>
                                                           
                                                          <?php }?></td>
                                                          <td><i class="fas fa-id-card-alt list-level"></i> Designation</td>
                                                          <td><?php if(isset($people->cpl_designation)) echo $people->cpl_designation_name;?></td>
                                                        </tr>

                                                        <tr>
                                                          <td><i class="fa fa-calendar list-level" aria-hidden="true"></i> Met On</td>
                                                           <td><?php echo display_date($people->ppl_met_on_dt); ?></td>
                                                          <td><i class="fa fa-calendar list-level" aria-hidden="true"></i> DOB</td>
                                                           <td><?php echo display_date($people->ppl_dob_dt); ?></td>
                                                        </tr>

                                                        <tr>

                                                           <td><i class="fa fa-user icon-people list-level"></i> Managed By</td>
                                                           <td>
                                                             <a href="javascript:;" id="ppl_managed_by" class="ppl_managed_by_select2" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select  Managed By" data-original-title="Select Managed By" data-custom_select2_id="<?php echo $people->ppl_managed_by ?>" data-custom_select2_name="<?php echo $people->ppl_managed_by_name; ?>" ><?php echo $people->ppl_managed_by_name; ?>
                                                             </a>
                                                          </td>
                                                           <td><i class="fa fa-transgender list-level" aria-hidden="true"></i> Gender</td>
                                                           <td><?php echo $people->ppl_gender_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td><i class="fas fa-share-alt list-level"></i> Social Media</td>
                                                          <td colspan="3">
                                                            <a class=" table-div-btn btn-profile social-profile <?php if(isset($people->ppl_social_fb) && $people->ppl_social_fb == '') echo 'social-disabled'; ?>" href="<?php  if(isset($people->ppl_social_fb)) echo $people->ppl_social_fb ?>" data-toggle="tooltip"  data-original-title="Facebook" target="_blank">
                                                              <img class="fa-whatsapp-img-title social-logo " src="<?php echo base_url(); ?>assets/project/images/facebook.png" style="width: 32px!important;" />
                                                              <span class="btn-text"></span>
                                                            </a>
                                                            <a class=" table-div-btn btn-profile social-profile <?php if(isset($people->ppl_social_instagram)  && $people->ppl_social_instagram == '') echo 'social-disabled'; ?>" href="<?php  if(isset($people->ppl_social_instagram)) echo $people->ppl_social_instagram ?>" data-toggle="tooltip"  data-original-title="Instagram" target="_blank">
                                                              <img class="fa-whatsapp-img-title social-logo social-small-logo"  src="<?php echo base_url(); ?>assets/project/images/instagram.png" />
                                                              <span class="btn-text"></span>
                                                            </a>
                                                            <a class=" table-div-btn btn-profile social-profile <?php if(isset($people->ppl_social_linkedin)  && $people->ppl_social_linkedin == '') echo 'social-disabled'; ?>" href="<?php if(isset($people->ppl_social_linkedin)) echo $people->ppl_social_linkedin; ?>" data-toggle="tooltip"  data-original-title="LinkedIn" target="_blank"> 
                                                              <img class="fa-whatsapp-img-title social-logo" style="width: 15px;" src="<?php echo base_url(); ?>assets/project/images/linkedin.png" />
                                                              <span class="btn-text"></span>
                                                            </a>
                                                            <a class=" table-div-btn btn-profile social-profile <?php if(isset($people->ppl_social_twitter)  && $people->ppl_social_twitter == '') echo 'social-disabled'; ?>" href="<?php if(isset($people->ppl_social_twitter)) echo $people->ppl_social_twitter; ?>" data-toggle="tooltip"  data-original-title="Twitter" target="_blank">
                                                              <img class="fa-whatsapp-img-title social-logo social-small-logo"  src="<?php echo base_url(); ?>assets/project/images/twitter.png" />
                                                              <span class="btn-text"></span>
                                                            </a>
                                                            <a class=" table-div-btn btn-profile social-profile <?php if(isset($people->ppl_social_youtube)  && $people->ppl_social_youtube == '') echo 'social-disabled'; ?>" href="<?php if(isset($people->ppl_social_youtube)) echo $people->ppl_social_youtube; ?>" data-toggle="tooltip"  data-original-title="Youtube" target="_blank">
                                                              <img class="fa-whatsapp-img-title social-logo social-ex-smal-logo"  src="<?php echo base_url(); ?>assets/project/images/youtube.png" />
                                                              <span class="btn-text"></span>
                                                            </a>
                                                            <a class=" table-div-btn btn-profile social-profile <?php if($people->ppl_website == '') echo 'social-disabled '; ?>" href="<?php if(isset($people->ppl_website)) echo $people->ppl_website; ?>" data-toggle="tooltip"  data-original-title="Website" target="_blank">
                                                              <img class="fa-whatsapp-img-title social-logo social-small-logo <?php if($people->ppl_website == '') echo 'social-disabled '; ?>"  src="<?php echo base_url(); ?>assets/project/images/website-logo.png" />
                                                              <span class="btn-text"></span>
                                                            </a>
                                                          </td>

                                                        </tr>
                                                        <tr>
                                                          <td>
                                                            <i class="fas fa-map-marked-alt"></i>
                                                          Location</td>
                                                           <td colspan="3">
                                                            <a href="https://www.google.fr/maps?saddr=<?php if(isset($people->ppl_location) and !empty($people->ppl_location)) echo $people->ppl_location; ?>" target="_blank"><?php if(isset($people->ppl_location) and !empty($people->ppl_location)) echo $people->ppl_location; ?></a></td>
                                                        </tr>
                                                        <tr>
                                                           <td><i class="fa fa-tags list-level" aria-hidden="true"></i> Tags</td>
                                                           <td class="tag-view-list" colspan="5"> <?php echo getTags($people->ppl_tgs_id,'people');  ?> </td>
                                                        </tr>
                                                        <tr>
                                                           <td><i class="fa fa-map-marker list-level" aria-hidden="true"></i> Address</td>
                                                           <td colspan="5"><?php echo $people->ppl_address; ?></td>
                                                        </tr>
                                                        <tr>
                                                           <td><i class="fa fa-comments list-level" aria-hidden="true"></i> Remark</td>
                                                           <td colspan="5"><?php echo $people->ppl_remark; ?></td>
                                                        </tr>
                                                        
                                                        
                                                     </tbody>
                                                  </table>
                                               </div>
                                            </div>
                                         </section>
                                          

                                         <section class="panel">
                                            <div class="panel-body bio-graph-info panel-detail-view">
                                               <div class="text-center invoice-btn col-lg-offset-10">
                                               </div>
                                               <header class="panel-heading color-primary panelHeading">
                                                <div class="row detail-box">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <span class="panel-title">Additional Email </span>&nbsp;&nbsp; <a class="btn btn-edit contact-add table-div-btn"  data-contact-type="<?php echo CONTACT_EMAIL; ?>" data-contact-ppl_id="<?php echo $people->ppl_id; ?>"  data-toggle="modal">
                                                      <i class="fa fa-plus" data-toggle="tooltip" data-original-title="Add Email"></i><span class="btn-text"></span></a>
                                                </div>
                                               </header>
                                               <div class="table-responsive table-responsive-style">
                                                  <table class="table table-style">
                                                  <!--   <thead>
                                                      <tr>
                                                        <th>Email</th>
                                                        <th>Active</th>
                                                      </tr>
                                                    </thead> -->
                                                     <tbody>
                                                       <?php if(isset($people_contact) && !empty($people_contact)){
                                                       foreach ($people_contact as $people_contactKey) {
                                                        if($people_contactKey->pct_type == CONTACT_EMAIL)
                                                        {
                                                        ?>
                                                        <tr>
                                                          <td>
                                                            <a href="mailto:<?php echo $people_contactKey->pct_value; ?>"><?php echo $people_contactKey->pct_value; ?></a>
                                                          </td>
                                                          <td> <a class="contact-add table-div-btn"  data-contact-type="<?php echo CONTACT_EMAIL; ?>" data-contact-ppl_id="<?php echo $people->ppl_id; ?>"   data-contact-pct_id="<?php echo $people_contactKey->pct_id; ?>" data-contact-pct_value="<?php echo $people_contactKey->pct_value; ?>" data-contact-pct_contact_type="<?php echo $people_contactKey->pct_contact_type; ?>" data-contact-pct_contact_type_name="<?php echo $people_contactKey->pct_contact_type_name; ?>" data-contact-pct_active="<?php echo $people_contactKey->pct_active; ?>" data-contact-pct_active_name="<?php echo $people_contactKey->pct_active_name; ?>" data-toggle="modal">
                                                      <i class="fa fa-edit"></i><span class="btn-text"></span></a>
                                                      <a class="contact-delete table-div-btn"  data-contact_id="<?php echo $people_contactKey->pct_id; ?>" data-contact_value="<?php echo $people_contactKey->pct_value; ?>" >
                                                      <i class="fa fa-trash"></i><span class="btn-text"></span></a></td>
                                                        </tr>
                                                      <?php }
                                                       }} ?>
                                                     </tbody>
                                                  </table>
                                               </div>
                                            </div>
                                         </section>
                                         <section class="panel">
                                            <div class="panel-body bio-graph-info panel-detail-view">
                                               <div class="text-center invoice-btn col-lg-offset-10">
                                               </div>
                                               <header class="panel-heading color-primary panelHeading">
                                                <div class="row detail-box">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <span class="panel-title">Additional Mobile Number's</span>&nbsp;&nbsp; <a class="btn btn-edit contact-add table-div-btn"  data-contact-type="<?php echo CONTACT_MOBILE; ?>" data-contact-ppl_id="<?php echo $people->ppl_id; ?>"  data-toggle="modal">
                                                      <i class="fa fa-plus" data-toggle="tooltip" data-original-title="Add Contact No"></i><span class="btn-text"></span></a>
                                                </div>
                                               </header>
                                               <div class="table-responsive table-responsive-style">
                                                  <table class="table table-style">
                                                  <!--   <thead>
                                                      <tr>
                                                        <th>Email</th>
                                                        <th>Active</th>
                                                      </tr>
                                                    </thead> -->
                                                     <tbody>
                                                       <?php if(isset($people_contact) && !empty($people_contact)){
                                                            foreach ($people_contact as $people_contactKey) {
                                                        if($people_contactKey->pct_type == CONTACT_MOBILE)
                                                        {
                                                        ?>
                                                        <tr>
                                                          <td>
                                                            <a href="tel:<?php echo $people_contactKey->pct_value; ?>"><?php echo $people_contactKey->pct_value; ?>
                                                                <!--  <a class=" table-div-btn" href="https://wa.me/91<?php echo $people_contactKey->pct_value; ?>" data-toggle="tooltip"  data-original-title="<?php echo $people_contactKey->pct_value; ?>" target="_blank"> -->
                                                                 <a class=" table-div-btn" href="https://wa.me/91<?php echo $people_contactKey->pct_value; ?>" data-toggle="tooltip"  data-original-title="Send Profile Detail WhatsApp Message to <?php echo  $people->ppl_title_name.' '.$people->ppl_name; ?>" target="_blank">

                                                                  
                                                          <img class="fa-whatsapp-img-title" src="<?php echo base_url(); ?>assets/project/images/whatapp.png" />
                                                          <span class="btn-text"></span>
                                                        </a>
                                                            </a>
                                                          </td>
                                                          <td><a class="contact-add table-div-btn"  data-contact-type="<?php echo CONTACT_MOBILE; ?>" data-contact-ppl_id="<?php echo $people->ppl_id; ?>"   data-contact-pct_id="<?php echo $people_contactKey->pct_id; ?>" data-contact-pct_value="<?php echo $people_contactKey->pct_value; ?>" data-contact-pct_contact_type="<?php echo $people_contactKey->pct_contact_type; ?>" data-contact-pct_contact_type_name="<?php echo $people_contactKey->pct_contact_type_name; ?>" data-contact-pct_active="<?php echo $people_contactKey->pct_active; ?>"  data-contact-pct_active_name="<?php echo $people_contactKey->pct_active_name; ?>"  data-toggle="modal">
                                                      <i class="fa fa-edit"></i><span class="btn-text"></span></a><a class="contact-delete table-div-btn"  data-contact_id="<?php echo $people_contactKey->pct_id; ?>" data-contact_value="<?php echo $people_contactKey->pct_value; ?>" >
                                                      <i class="fa fa-trash"><span class="btn-text"></span></a></td>
                                                        </tr>
                                                      <?php }
                                                       }} ?>
                                                     </tbody>
                                                  </table>
                                               </div>
                                            </div>
                                         </section>
                                        <!--  <?php if($additional_detail_visible == ACTIVE_STATUS) { ?>
                                         <section class="panel">
                                            <div class="panel-body bio-graph-info">
                                               <div class="text-center invoice-btn col-lg-offset-10">
                                               </div>
                                               <header class="panel-heading color-primary panelHeading">
                                                <div class="row detail-box">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <span class="panel-title">Additional Details </span>&nbsp;&nbsp; 
                                                      <a class="btn btn-edit" href="<?php echo base_url('people-additional-detail-edit-'.$pplencryptedId); ?>" data-toggle="tooltip"  data-original-title="Edit">
                                                        <i class="fa fa-edit"></i><span class="btn-text"></span></a>
                                                </div>
                                               </header>
                                               <div class="table-responsive table-responsive-style">
                                                  <table class="table table-style">
                                                     <tbody>
                                                       <?php 
                                                       
                                                       if(isset($people_details) && !empty($people_details)){
                                                        foreach ($people_details['category'] as $detailCategory) {
                                                            echo '<tr><td colspan="4"><b>'.$detailCategory->adc_category.'</b></td></tr>';
                                                            $i = 0;
                                                            foreach ($people_details['details'] as $peopleDetail) {
                                                                if($peopleDetail->adc_id == $detailCategory->adc_id) {
                                                                  if($i % 2 == 0)
                                                                    echo '<tr>';
                                                              ?>
                                                            <td><?php echo $peopleDetail->adm_name; ?></td>
                                                            <td><?php 
                                                            
                                                              if($peopleDetail->adm_desc == 'url')
                                                                echo '<a href = "http://'.$peopleDetail->adt_value_name.'">'.$peopleDetail->adt_value_name.'</a>'; 
                                                              else if($peopleDetail->adm_desc == 'email')
                                                                echo '<a href = "mailto:http://'.$peopleDetail->adt_value_name.'">'.$peopleDetail->adt_value_name.'</a>'; 
                                                              else
                                                                echo $peopleDetail->adt_value_name;
                                                            ?></td>
                                                        <?php } $i++; }
                                                       } } ?>
                                                     </tbody>
                                                  </table>
                                               </div>
                                            </div>
                                         </section>
                                       <?php } ?> -->
                                      </aside>
                                    <!-- -----MAIN CONTENTS END HERE----- -->
                                    <!-- People Contact Model -->
                                    <div class="modal fade" id="peopleContactAdd" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <form id="peopleContactForm">
                                              <div class="modal-header">
                                                 <div class="text-center">
                                                    <h3 class="modal-title text-center" id="exampleModalLongTitle">Contact Details
                                                    </h3>
                                                    <span class="sp_line color-primary">
                                                    </span>
                                                  </div>
                                                <!-- <h4 class="modal-title" id="exampleModalLongTitle">Contact Details</h4> -->
                                                <button type="button" class="close btn-contact" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <!-- hidden fields -->
                                                <input type="hidden" name="pct_type" id="pct_type">
                                                <input type="hidden" name="pct_ppl_id" id="pct_ppl_id">
                                                <input type="hidden" name="pct_id" id="pct_id">
                                                <!-- hidden fields -->
                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <div class="form-group form-md-line-input  form-md-floating-label">
                                                         <!-- <label class="">&nbsp;</label> -->
                                                          <div class="input-icon">
                                                          <input type="text" id="pct_value" name="pct_value" class="form-control pct-type-input edited" required="">
                                                              <i class="pct-type-icon"></i>
                                                              <label class="control-label pct-type-label">Email</label>
                                                              <span class="help-block custom-error"></span>
                                                          </div>                                      
                                                      </div>
                                                    <!-- <div class="form-group">
                                                      <label class="control-label pct-type-label">Email</label>
                                                       <input type="text" id="pct_value" name="pct_value" class="form-control pct-type-input" required="">
                                                    </div> -->
                                                  </div>
                                                  <input type="hidden" id="pct_active" name="pct_active" value="<?php ACTIVE_STATUS; ?>" >
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn green btn_save_email">Save changes</button>
                                                <button type="button" class="btn btn_processing btn_processing_email" style="display: none;"><i class='fa fa-spinner'></i> Saving...</i></button>
                                              </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- People Contact Model -->
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
                <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery.mockjax.js<?php echo $global_asset_version ; ?>" type="text/javascript"></script>

                <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
            
                <!-- END OPTIONAL SCRIPTS -->
                <script type="text/javascript">
                  var select2url = baseUrl + 'people/getGenPrmforDropdown/';
                  $(document).ready(function()
                  {
                   /* $('#pct_active').select2({
                      width: 'resolve',
                      ajax: {
                        url: select2url + 'active_status',
                        dataType: 'json',
                      }
                    });*/
                  });
                      
                  $('.send-mail').click(function(){
                    $('.send-mail-button').css('display','none');
                    $('.send-mail-processing').css('display','inline-block');
                    var formData = new FormData();
                    formData.append('ppl_id','<?php echo $people->ppl_id ?>');
                     $.ajax({
                      type:"POST",
                      dataType:"JSON",
                      data:formData,
                      cache: false,
                      contentType: false,
                      processData: false,
                      url:baseUrl+"people/sendMail",
                      success:function(response)
                      {
                         if(response.success == true)
                          {
                            $('.send-mail-button').css('display','inline-block');
                            $('.send-mail-processing').css('display','none');
                              swal(
                              {
                                  title: "Done",
                                  text: response.message,
                                  type: "success",
                                  icon: "success",
                                  button: true,
                              },function()
                              {
                               });
                          }
                          else
                          {
                            $('.send-mail-button').css('display','inline-block');
                            $('.send-mail-processing').css('display','none');
                              swal(
                              {
                                  title: "Opps",
                                  text: "Something Went wrong",
                                  type: "error",
                                  icon: "error",
                                  button: true,
                              });
                          }
                      }
                     });
                  });
                  var validator = $('#peopleContactForm').validate({
                    errorClass: "custom-error",
                    focusCleanup: true,
                    errorPlacement: function(error, element) {
                      console.log('element : >>');
                      // console.log(error.append('People'));
                      console.log($(element).parent('div').find('.custom-error').html(error));
                      console.log('element : <<');
                    },
                    submitHandler:function(form)
                    {
                      try
                      {
                        $('.btn_save_email').css('display', 'none');
                        $('.btn_processing_email').css('display', 'inline-block');
                        var formData = new FormData();
                        formData.append('pct_type'          ,   $('#pct_type').val());
                        formData.append('pct_ppl_id'        ,   $('#pct_ppl_id').val());
                        formData.append('pct_id'            ,   $('#pct_id').val());
                        formData.append('pct_value'         ,   $('#pct_value').val());
                        formData.append('pct_active'        ,   $('#pct_active').val());
                            $.ajax({
                                type:"POST",
                                dataType:"JSON",
                                data:formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                url:baseUrl+"people/contactDetailsUpdate",
                                success:function(response)
                                {
                                    $('.btn_save_email').css('display', 'inline-block');
                                    $('.btn_processing_email').css('display', 'none');
                                    if(response.success == true)
                                    {
                                      
                                        swal(
                                        {
                                            title: "Done",
                                            text: response.message,
                                            type: "success",
                                            icon: "success",
                                            button: true,
                                        });
                                        setTimeout(function(){
                                          location.reload();
                                }, 1000);
                                    }
                                    else
                                    {
                                        swal(
                                        {
                                            title: "Opps",
                                            text: "Something Went wrong",
                                            type: "error",
                                            icon: "error",
                                            button: true,
                                        });
                                    }
                                }
                               });
                      }
                      catch(e)
                      {
                        console.log(e);
                      }
                    }
                  });
                  validator.element('.pct-type-input');
                  $('.contact-add').click(function(){
                    var contactType  = $(this).data('contact-type');
                    var contactPplId = $(this).data('contact-ppl_id');
                    var contactPctId = $(this).data('contact-pct_id');
                    var contactPctValue = $(this).data('contact-pct_value');
                    var contactPctActive      = $(this).data('contact-pct_active');
                    // var contactPctContactType = $(this).data('contact-pct_contact_type');
                    var contactPctActiveName = $(this).data('contact-pct_active_name');
                    console.log(contactPctActiveName);
                    $('#pct_type').val(contactType);
                    $('#pct_ppl_id').val(contactPplId);
                    $('#pct_id').val(contactPctId);
                    $('#pct_value').val(contactPctValue);
                    // $('#pct_active').prop('checked', (contactPctActive==1?1:0));
                    $('#pct_active').html('<option value = "'+contactPctActive+'">'+contactPctActiveName+'</option>').trigger('change');
                    $('.pct-type-input').rules( "remove" );
                    switch(contactType)
                    {
                      case 1:
                              console.log('case 1 >>')
                              $('.pct-type-icon').addClass('fas fa-envelope');
                              $('.pct-type-icon').removeClass('fa fa-mobile');
                              // fas fa-th-list
                              $('.pct-type-label').html('Email');
                              $('.pct-type-input').attr('type','email');
                              $('.pct-type-input').rules( "add",{
                      email:true
                    });
                              console.log('case 1 >>')
                              break;
                      case 2:
                              console.log('case 2 >>')
                              $('.pct-type-icon').removeClass('fa fa-envelope');
                              $('.pct-type-icon').addClass('fa fa-mobile');
                              $('.pct-type-label').html('Contact No');
                              $('.pct-type-input').attr('type','text');
                              $('.pct-type-input').rules( "add",{
                      number:true
                    });
                              console.log('case 2 >>')
                              break;
                             break;
                      default:
                              break;
                    }
                     $(this).attr('href','#peopleContactAdd');
                  });
                  $('.contact-delete').click(function(){
                              var pct_id  = $(this).data('contact_id');
                              var pct_value = $(this).data('contact_value');
                    swal({
                              title: "Are you sure?",
                              text: "You will not be able to recover this contact details",
                              type: "warning",
                              showCancelButton: true,
                              confirmButtonClass: "btn-danger",
                              confirmButtonText: "Yes, delete it!",
                              cancelButtonText: "No, cancel please!",
                              closeOnConfirm: false,
                              closeOnCancel: false
                            },
                            function(isConfirm) {
                              if (isConfirm) 
                              {
                                data={
                                    pct_id:pct_id,
                                    pct_value:pct_value
                                },
                                console.log(data);
                               $.ajax({
                                    type:"POST",
                                    dataType:"JSON",
                                    data:data,
                                    url:baseUrl+'people/deletePeopleContact',
                                    success:function(response)
                                    {
                                        if (response.success == true)
                                        {
                                             swal(
                                            {
                                                title: "Done",
                                                text: response.message,
                                                type: "success",
                                                icon: "success",
                                                button: true,
                                            },function(){
                                            });
                                                setTimeout(function(){
                                 location.reload();
                                }, 1000);
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
                                        }
                                    }
                                });
                              } else {
                                swal("Cancelled", "Contact Details is safe :)", "error");
                              }
                            });
                  });
                   function deletePeople(ppl_id)
                    {
                       swal({
                              title: "Are you sure?",
                              text: "You will not be able to recover People!",
                              type: "warning",
                              showCancelButton: true,
                              confirmButtonClass: "btn-danger",
                              confirmButtonText: "Yes, delete it!",
                              cancelButtonText: "No, cancel please!",
                              closeOnConfirm: false,
                              closeOnCancel: false
                            },
                            function(isConfirm) {
                              if (isConfirm) 
                              {
                                data={
                                    ppl_id:ppl_id
                                },
                               $.ajax({
                                    type:"POST",
                                    dataType:"JSON",
                                    data:data,
                                    url:baseUrl+'people/deletePeople',
                                    success:function(response)
                                    {
                                        if (response.success == true)
                                        {
                                             swal(
                                            {
                                                title: "Done",
                                                text: response.message,
                                                type: "success",
                                                icon: "success",
                                                button: true,
                                            },function(){
                                              window.location.href=baseUrl+"people-list";
                                            });
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
                                        }
                                    }
                                });
                              } else {
                                swal("Cancelled", "Your People is safe :)", "error");
                              }
                            });
                    }
                    $('#ppl_managed_by').editable({
                      type: 'POST',
                      pk: '12',
                      sourceCache: false,
                      params: function(params) {
                        var peopleData = new Array();
                        console.log(params);
                        params.people_data ={
                        ppl_id: $('#ppl_id').val(),
                        ppl_managed_by: params.value
                        };
                        return params;
                      },
                      url: baseUrl + 'people/updatePeopleCustomData',
                      title: 'Select Managed By',
                      emptytext: 'No Managed By',
                      validate: function(value) {
                        if ($.trim(value) == '') {
                          return 'Please Select Managed By ';
                        }

                      },
                      success: function(response, newValue) {
                        console.log(response);
                        swal(
                              {
                                  title: "Done",
                                  text: response.message,
                                  type: "success",
                                  icon: "success",
                                  button: true,
                              },function(){
                              });
                                location.reload();
                        // var select2CustomData = $('.ppl_managed_by_select2').select2('data');
                      /*  console.log($('#ppl_managed_by').attr('data-custom_select2_id', select2CustomData[0].id));
                        console.log($('#ppl_managed_by').attr('data-custom_select2_name', select2CustomData[0].text));*/
                        // selectCustomDatainSelect2('#ppl_managed_by','.ppl_managed_by_select2');

                        // var selectedVal = '<option value="'select2CustomData[0]+'" selected>'+select2CustomData[1]+'</option>';
                        // $('.ppl_managed_by_select2').html(selectedVal);
                      },
                      //MUST be there - it won't work otherwise.
                      tpl: '<select class="ppl_managed_by_select2"></select>',
                      select2: {
                        width: '150px',
                        //tricking the code to think its in tags mode (it isn't)
                        tags: true,
                        //this is the actual function that triggers to send back the correct text.
                        formatSelection: function(item) {
                          //test is a global holding variable set during the ajax call of my results json.
                          //the item passed here is the ID of selected item. However you have to minus one due zero index array.

                          for (var i = 0; i < test.results.length; i++) {
                            if (test.results[i].id == item)
                              return test.results[i].text;
                          }
                          //return 4;
                          //return test.results[parseInt(item)-1].text;
                        },
                        ajax: {
                          url:baseUrl + 'people/getPeopleforDropdown/manage',
                          dataType: "json",
                          type: 'GET',
                          processResults: function(item) {
                            //Test is a global holding variable for reference later when formatting the selection.
                            //it gets modified everytime the dropdown is modified. aka super convenient.
                            test = item;
                            return item;
                          },

                        },

                      },
                    }).click(function() {
                      selectCustomDatainSelect2('#ppl_managed_by', '.ppl_managed_by_select2');

                    });
                     function selectCustomDatainSelect2(selectorElement, select2Selector) {
                      var customDataId = customDataValue = '';
                      customDataId = $(selectorElement).attr('data-custom_select2_id');
                      customDataValue = $(selectorElement).attr('data-custom_select2_name');
                      selectedVal = '<option value="' + customDataId + '" selected>' + customDataValue + '</option>';
                      $(select2Selector).html(selectedVal).trigger('change');

                      return true;

                    }
                </script>
            </div>
        </body>
    </html>
