
<style>
.hd-btn{
    font-size: 22px;
    /*width: 34px;*/
    width: 28.99px;
    margin-top: -5px;
    border-radius: 19px !important;
    background-color: #3eacbe;
    border: none;
}
.btn:not(.btn-sm):not(.btn-lg){
    line-height: 1.24;
}
</style>   
<!-- <div class="easynow-preloader" style="display: block !important;">
    <a>
        <img src="<?php //echo base_url().getLogo(); ?>"  alt="logo" class="" /> </a>
</div>   -->   

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
     
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo base_url(); ?>" class="header-logo">
            <img src="<?php echo base_url().getLogo(); ?>"  alt="logo" class="logo-default logo-style" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        <span></span>
        </a>
        <!-- <div class="header-search">
            <a href="#" class="search-tool" onclick="searchList()">
                <i class="fas fa-search"></i>
            </a>
            <div class="form-search">
                <form class="form-inline search-inline-tool tool-animation">
                    <input id="header-search-input" class="header-search-input" placeholder="Search..." />
                    <a href="#" onclick="searchClose()" class="flat-close">
                        <i class="fas fa-times"></i>
                    </a>
                </form>
            </div>
        </div> -->
        <!-- <form class="main-header-serach">
            <input id="header-search"/>
        </form> -->
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            

            <ul class="nav navbar-nav pull-right">

                <!-- <li class="dropdown dropdown-extended dropdown-inbox dropdown-plugin-mobile" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle dropdown-plugin-icon" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        
                        <i class="fas fa-plus"></i>
                        
                    </a>
                    <ul class="dropdown-menu dropdown-plugin">
                        <li>
                            <ul class="dropdown-menu-list dropdown-plugin-list scroller" style="height: auto;" data-handle-color="#637283">
                                <li>
                                    <a href="#" onclick="openTag()" class="plugin-tag navbar-tag">
                                        <img src="<?php echo base_url(); ?>assets/project/svg/tag-white.svg" class="header-add-tag" title="Tag" >
                                    </a>
                                </li>
                                <li>
                                    
                                    <a href="#" class="plugin-tag navbar-tag" data-toggle="modal" data-target="#addNotes">
                                        <img src="<?php echo base_url(); ?>assets/project/svg/post-it.svg" class="header-add-tag" title="Add Notes" >
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown dropdown-plugin-desktop">
                    <a href="#" onclick="openTag()" class="navbar-tag navbar-tag-desktop">
                        <img src="<?php echo base_url(); ?>assets/project/svg/tag-white.svg" class="header-add-tag header-desktop-tab" title="Tag" >
                    </a>
                </li>

                <li class="dropdown dropdown-plugin-desktop">
                    <a href="#" data-toggle="modal" data-target="#addNotes" class="navbar-tag navbar-tag-desktop">
                        <img src="<?php echo base_url(); ?>assets/project/svg/post-it.svg" class="header-add-tag header-desktop-tab" title="Notes" >
                    </a>
                </li>

                <li class="dropdown dropdown-plugin-desktop">
                    <a href="#" onclick="composeOpen()" class="navbar-tag navbar-tag-desktop">
                        <img src="<?php echo base_url(); ?>assets/project/svg/message.svg" class="header-add-tag header-desktop-tab" title="Notes" >
                    </a>
                </li> -->

                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="javascript:;" class="dropdown-toggle dropdown-create navbar-tag-desktop" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" title="Click here to add">
                        <!-- <i class="icon-calendar"></i>   -->  
                        <div class="hidden-sm display-create">
                            <span><i class="far fa-calendar-plus"></i></span>
                        </div>                                                                  
                        <div class="hidden-xs">
                          <!--  <button class="button-crt" style="vertical-align:middle">
                               <span class="create-list username"></span>
                           </button>  -->
                           <button type="button" class="btn btn-primary btn-xs hd-btn">+</button>
                        </div>                                     
                    </a>

                    <ul class="dropdown-menu extended tasks">
                        <!-- <li class="external">
                            <h3>Create</h3>                                        
                        </li> -->
                        <li>
                            <ul class="dropdown-menu-list scroller dropdown-li" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="<?php echo base_url('people-add'); ?>">
                                        <span class="dropdown-target">
                                            <span class="desc task-tile crt-drp crt-drp"> <span class="dropdown-list-icon"><i class="fa fa-user" style="color: #4badf8" ></i></span> &nbsp;Add People</span>         
                                        </span>                                                  
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('lead-add'); ?>">
                                        <span class="dropdown-target">
                                            <span class="desc task-tile crt-drp"> <span class="dropdown-list-icon"><i class="fas fa-chalkboard-teacher" style="color: #c75df3" ></i></span> &nbsp;Add Lead</span>         
                                        </span>                                                  
                                    </a>                                              
                                </li>
                                <li>
                                    <a href="<?php echo base_url('followup-list'); ?>">
                                       <span class="dropdown-target">
                                        <span class="desc task-tile crt-drp"> <span class="dropdown-list-icon"><i class="fa fa-fas fa-calendar-alt icon-meeting" style="color: #ff6363" ></i></span> &nbsp; Add Follow Up </span>        
                                        </span>
                                    </a>
                                </li>
                                 <li>
                                   <a href="<?php echo base_url('task-add'); ?>">
                                       <span class="dropdown-target">
                                        <span class="desc task-tile crt-drp"> <span class="dropdown-list-icon"><i class="fas fa-cogs icon-company" style="color: #2562f7"></i></span> &nbsp;Add Task</span>        
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('company-add'); ?>">
                                        <span class="dropdown-target">
                                            <span class="desc task-tile crt-drp"> <span class="dropdown-list-icon"><i class="fa fa-fas fa-money-check light-green-color" style="color: #edba09" ></i></span> &nbsp; Add Account </span>         
                                        </span>                                                  
                                    </a>
                                   
                                </li>
                               
                               
                              
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->                            
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <!-- <img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/project/layouts/layout/img/avatar3_small.jpg" /> -->
                   <!--  <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata(PEOPLE_SESSION_NAME); ?> </span> -->
                    <!-- <span class="username username-hide-on-mobile">
                        
                    </span> -->
                    <img src="<?php echo base_url(); ?>assets/project/images/prson_no_img.png" class="img-circle">
                    <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata(PEOPLE_SESSION_NAME); ?> </span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default dropdown-personal-details">
                         <?php $ppl_id = $this->session->userdata(PEOPLE_SESSION_ID);
                           if($ppl_id !='')
                           {
                                 $ppl_encrypted_id = $this->nextasy_url_encrypt->encrypt_openssl($ppl_id);
                                 $reset_encrypted       =  $this->nextasy_url_encrypt->encrypt_openssl($ppl_id.'-');
                                 { ?>
                                     <li>
                                        <a href="<?php echo base_url('people-details-'.$ppl_encrypted_id); ?>" >
                                        <!-- <i class="icon-user"></i> --><i class="fa fa-user icon-people"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('people-reset-password-'.$reset_encrypted); ?>" >
                                        <!-- <i class="icon-key"></i> --><i class="fa fa-key icon-company"></i> Reset Password </a>
                                    </li>
                                 <?php 
                                 }
                            } ?> 
                       <!--   <li>
                            <a >
                            <i class="icon-user"></i> My Profile </a>
                        </li> -->
                        <?php if($this->session->userdata(PEOPLE_SESSION_NAME)) {?> 
                        <li>
                            <a href="<?php echo base_url('logout'); ?>" onclick="localStorage.removeItem('last_visited_link');">
                            <!-- <i class="icon-logout"></i> --><i class="fas fa-sign-out-alt dark-green"></i> Log Out </a>
                        </li>
                      <?php } ?>
                    </ul>
                </li>

                
            </ul>

            <!-- Tag Overlay Div -->
            <div id="overlayTag" class="overlay-tag" onclick="closeNav()"></div>
            <div id="tagSildebar" class="tag-sidebar">
                <div class="tag-list">
                    <a href="javascript:void(0)" class="tag-closebtn" onclick="closeNav()">&times;</a>
                    <div class="row mt-20">
                        <div class="col-md-6 col-xs-6">
                            <span class="tag-title">Tags</span>
                        </div>
                        <div class="col-md-6 col-xs-6 text-right">
                            <a href="#" data-toggle="modal" data-target="#addTag" class="create-tag-add" onclick="openModal()">
                                <img src="<?php echo base_url(); ?>assets/project/svg/add-tag.svg" class="tag-add" title="Add Tag" >
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="relative-text">
                                    <input type="text" placeholder="Find a Tag" name="" class="search-placeholder">
                                    <button class="search-button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <hr class="tag-row">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tag-record-list">
                                <ul class="tag-main-list">
                                    <li>
                                        <span class="tag-alpha">A</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Ami</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tag-alpha">C</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Charms Classic Deco</a>
                                            </li>
                                            <li>
                                                <a href="#" class="main-tag">Charms Classic Deco</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tag-alpha">F</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Fashion</a>
                                            </li>
                                            <li>
                                                <a href="#" class="main-tag">freshfruits.com</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tag-alpha">A</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Ami</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tag-alpha">C</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Charms Classic Deco</a>
                                            </li>
                                            <li>
                                                <a href="#" class="main-tag">Charms Classic Deco</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tag-alpha">F</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Fashion</a>
                                            </li>
                                            <li>
                                                <a href="#" class="main-tag">freshfruits.com</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tag-alpha">A</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Ami</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tag-alpha">C</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Charms Classic Deco</a>
                                            </li>
                                            <li>
                                                <a href="#" class="main-tag">Charms Classic Deco</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tag-alpha">F</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Fashion</a>
                                            </li>
                                            <li>
                                                <a href="#" class="main-tag">freshfruits.com</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <span class="tag-alpha">A</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Ami</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tag-alpha">C</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Charms Classic Deco</a>
                                            </li>
                                            <li>
                                                <a href="#" class="main-tag">Charms Classic Deco</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tag-alpha">F</span>
                                        <ul class="tag-sub-list">
                                            <li>
                                                <a href="#" class="main-tag">Fashion</a>
                                            </li>
                                            <li>
                                                <a href="#" class="main-tag">freshfruits.com</a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tag Overlay Div -->


        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

<div id="addTag" class="modal modal-greeting fade" role="dialog">
    <div class="vertical-alignment-helper">
      <div class="modal-dialog vertical-align-center">
        <!-- Modal content-->
        <div class="modal-content greeting-modal-content">
            <form name="tag-form">
              <button type="button" class="image-greeting-modal" data-dismiss="modal">&times;</button>
              <div class="greeting-container">
                <div class="greeting-context">
                  <div class="row">
                      <div class="col-md-12">
                          <h3 class="text-center modal-title-tag">Compose</h3>
                          <span class=""></span>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 mt-20">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <div class="input-icon">
                                <input type="text" name="tag_name" id="tag_name" value="" class="form-control create-tag">
                                <label class="create-tag-label">Name Your Tag </label>
                                
                            </div>
                        </div>
                      </div>

                      <div class="col-md-12 text-center">
                            <button type="button" class="btn green btn-add-new pull-right">Create Tag</button>
                            <button type="button" class="btn green btn-add-new mr-10 pull-right" data-dismiss="modal">Close</button>
                      </div>
                  </div>
                </div>
              </div>

        </form>
        </div>

      </div>
    </div>
</div>

<!-- Notes Modal start here -->
<div id="addNotes" class="modal modal-greeting fade" role="dialog">
    <div class="vertical-alignment-helper">
      <div class="modal-dialog vertical-align-center">
        <!-- Modal content-->
        <div class="modal-content greeting-modal-content modal-notes">
            <!-- <div class="modal-header">
                <button type="button" class="image-greeting-modal" data-dismiss="modal">&times;</button>
                <h4 class="modal-title modal-title-tag text-center">Notes</h4>
            </div> -->
            <div class="modal-body notes-modal">
                <form id="notes-form">
                  <div class="greeting-container">
                    <div class="greeting-context">
                      <div class="row">
                        <div class="notes-modal-img">
                          <!-- <img src="<?php echo base_url(); ?>assets/module/notes/images/img-1.jpg" class="img-responsive notes-main-img"> -->
                          <div id="main_modal_preview_image" class="main_modal_preview_image"></div>
                          <a href="#" class="preview_delete" onclick="deleteModalPreview()"><i class="fas fa-trash"></i> Delete</a>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 mt-20">
                            <div class="form-group modal-title">
                                <input type="text" name="notes-title" placeholder="Title" class="form-control form-no-border modal-notes-title" value="">
                              </div>

                              <div class="form-group text-area-content main-text-area-content">
                                <textarea class="form-control notes-text-record form-no-border" rows="5" id="notes-comment-edit" placeholder="Write a note..."></textarea>
                              </div>
                          </div>
                          
                          <div class="col-md-12">
                            <div class="notes-option">
                                <div class="dropdown dropdown-pallete">
                                  <button class="notes-icon-option dropdown-toggle"  title="Choose Color" type="button" data-toggle="dropdown" data-hover="dropdown">
                                    <i class="fas fa-palette"></i>
                                  </button>
                                  <div class="dropdown-menu dropdown-color">
                                    <div class="color-modal" title="White" data-value="#fff" style="background-color: #fff"></div>
                                    <div class="color-modal" title="Red" data-value="#f28b82" style="background-color: #f28b82"></div>
                                    <div class="color-modal" title="Orange" data-value="#ffd595" style="background-color: #ffd595"></div>
                                    <div class="color-modal" title="yellow" data-value="#fff475" style="background-color: #fff475"></div>
                                    <div class="color-modal" title="green" data-value="rgb(204, 255, 144)" style="background-color: rgb(204, 255, 144)"></div>
                                    <div class="color-modal" title="teal" data-value="rgb(167, 255, 235)" style="background-color: rgb(167, 255, 235)"></div>
                                    <div class="color-modal" title="blue" data-value="rgb(203, 240, 248)" style="background-color: rgb(203, 240, 248)"></div>
                                    <div class="color-modal" title="purple" data-value="rgb(215, 174, 251)" style="background-color: rgb(215, 174, 251)"></div>
                                    <div class="color-modal" title="dark-blue" data-value="#aecbfa" style="background-color: #aecbfa"></div>
                                    <div class="color-modal" title="gray" data-value="rgb(232, 234, 237)" style="background-color: rgb(232, 234, 237)"></div>

                                    
                                  </div>
                                  
                                </div>
                             
                                <input type="file" name="file-3[]" id="file-3" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" />
                                <label for="file-3" title="Add Image"  class="notes-icon-option label-image-notes"><i class="fas fa-image"></i></label>

                                
                                <div class="dropdown dropdown-more">
                                  <button class="notes-icon-option dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                  </button>

                                  <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fas fa-trash"></i> Delete Note</a></li>
                                    <li><a href="#"><i class="fas fa-th-list"></i> Convert to Task</a></li>
                                  </ul>

                                </div>
                                <a href="#"  class="notes-icon-option notes-close-option pull-right" title="Close" data-dismiss="modal">
                                  Close <i class="fas fa-times"></i> 
                                </a>
                              </div>
                          </div>
                         
                      </div>
                    </div>
                  </div>
                </form>
            </div>
        </div>

      </div>
    </div>
</div>
<!-- Notes Modal ends here -->



