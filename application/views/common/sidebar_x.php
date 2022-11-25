                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <div class="page-sidebar navbar-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <!-- BEGIN SIDEBAR MENU -->
                        <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <li class="sidebar-toggler-wrapper hide">
                                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                                <!-- END SIDEBAR TOGGLER BUTTON -->
                            </li>


                            <li id="nav_people" class="nav-item">
                                <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">
                                    <!-- <i class="fas fa-chart-line icon-finance"></i> -->
                                    <i class="fas fa-chart-pie pie-color"></i>
                                    <span class="title">Dashboard</span>
                                    
                                </a>
                            </li>
                            <li id="nav_people" class="nav-item">
                                <a href="<?php echo base_url('people-dashboard'); ?>" class="nav-link nav-toggle">
                                    <i class="fa fa-user icon-people"></i>
                                    <span class="title">People</span>
                                    
                                </a>
                            </li>
                            <li id="" class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <!-- <i class="fa fa-industry icon-company"></i> -->
                                    <!-- <i class="fas fa-money-check icon-company"></i> -->
                                    <i class="fas fa-briefcase company-color"></i>
                                    <span class="title">Account</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('company-list'); ?>" class="nav-link">
                                          <!-- <i class="fa fa-industry icon-company"></i> -->
                                          <i class="fas fa-money-check light-green-color"></i>                                    
                                          Account
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('company-list'); ?>" class="nav-link">
                                          <i class="fa fa-industry icon-company"></i>
                                    <span class="title">Company</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li id="" class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <!-- <i class="fa fa-industry icon-company"></i> -->
                                    <i class="fas fa-chart-line color-pink"></i>
                                    <span class="title">Sales</span>
                                    
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('active-lead-list'); ?>" class="nav-link">
                                            <i class="fas fa-chalkboard-teacher icon-lead"></i> Active Leads</a>
                                    </li>
                                  
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('lead-list'); ?>" class="nav-link">
                                             <i class="fas fa-chalkboard-teacher icon-lead"></i> All Leads</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('sales-followup-list'); ?>" class="nav-link">
                                            <i class="fas fa-calendar-alt icon-follow-up"></i>Sales Follow Up</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('quotations-list'); ?>" class="nav-link">
                                            <i class="fas fa-file-invoice-dollar color-dark-blue"></i><!-- <i class="icon-star icon-finance"></i> --> Quotations</a>
                                    </li>                                     

                                     <li class="nav-item">
                                        <a href="<?php echo base_url('invoice-list'); ?>" class="nav-link">
                                            <i class="fas fa-file-invoice-dollar color-dark-blue"></i>Invoices</a>
                                    </li>

                                     <li class="nav-item">
                                        <a href="<?php echo base_url('product-list'); ?>" class="nav-link">
                                            <i class="fa fa-cart-plus icon-product"></i>Product</a>
                                    </li>

                                    
                                </ul>
                            </li>

                           <!--  <li id="nav_people" class="nav-item">
                                <a href="<?php echo base_url('productivity-dashboard'); ?>" class="nav-link nav-toggle">
                                    <i class="fas fa-cogs icon-company"></i>
                                    <span class="title">Productivity</span>
                                    
                                </a>
                            </li> -->

                            <li id="" class="nav-item">
                                <a href="#" class="nav-link nav-toggle">                                    
                                    <i class="fas fa-cogs icon-company"></i>
                                    <span class="title">Productivity</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('task-dashboard'); ?>" class="nav-link">
                                          <i class="fas fa-calendar-alt icon-task"></i>
                                          Task
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="<?php echo base_url('meeting-list'); ?>" class="nav-link">
                                        <i class="fas fa-calendar-alt icon-meeting"></i>Meeting
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="<?php echo base_url('followup-list'); ?>" class="nav-link">
                                        <i class="fas fa-calendar-alt icon-meeting"></i>Follow Up
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li id="" class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="fas fa-chart-line icon-finance"></i>
                                    <span class="title">Reports</span>
                                    <!--  <span class="arrow"></span> -->
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('my-day'); ?>" class="nav-link">
                                            <i class="fas fa-chart-line icon-finance"></i> My Day</a>
                                    </li>
                                  
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('sales-dashboard'); ?>" class="nav-link">
                                            <i class="fas fa-chart-line icon-finance"></i> Sales Overview</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('sales-funnel'); ?>" class="nav-link">
                                            <i class="fas fa-chart-line icon-finance"></i> Sales Funnel</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('report-80-20'); ?>" class="nav-link">
                                            <i class="fas fa-chart-line icon-finance"></i> 80/20 Sales</a>
                                    </li>

                                     <li class="nav-item">
                                        <a href="<?php echo base_url('business-generation'); ?>" class="nav-link">
                                            <i class="fas fa-chart-line icon-finance"></i> Business Generation</a>
                                    </li>

                                     <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fas fa-chart-line icon-finance"></i> Rejection Report</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fas fa-chart-line icon-finance"></i> GST Report</a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li id="" class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <!-- <i class="fa fa-industry icon-company"></i> -->
                                    <i class="fas fa-project-diagram icon-project"></i>
                                    <span class="title">Marketing</span>
                                    <!--  <span class="arrow"></span> -->
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('event-list'); ?>" class="nav-link">
                                            <i class="fas fa-location-arrow icon-event"></i> Events</a>
                                    </li>
                                  
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('campaign-list'); ?>" class="nav-link">
                                            <i class="fas fa-bullhorn pie-color"></i><!-- <i class="icon-star icon-finance"></i> --> Campaign</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('value-addition-list'); ?>" class="nav-link">
                                            <i class="fas fa-folder-plus"></i> Value Addition</a>
                                    </li>
                                </ul>
                            </li>

                            <li id="" class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="fa fa-industry icon-company"></i>
                                    <span class="title">Finance</span>
                                    <!--  <span class="arrow"></span> -->
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="icon-star icon-finance"></i>Purchase</a>
                                    </li>
                                  
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="icon-star icon-finance"></i>Outstanding </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="icon-star icon-finance"></i>Payments</a>
                                    </li>
                                </ul>
                            </li>

                            <li id="nav_people" class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="fa fa-user icon-people"></i>
                                    <span class="title">Notice Board</span>
                                    <!--  <span class="arrow"></span> -->
                                </a>
                            </li>

                            <li id="" class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="fa fa-wrench icon-setting"></i>
                                    <span class="title">Settings</span>
                                </a>
                                <ul class="sub-menu">
                                    <li id="nav_people" class="nav-item">
                                       <a href="<?php echo base_url('form-access'); ?>" class="nav-link nav-toggle">
                                           <i class="fa fa-th-list sub-icon-color icon-setting"></i>
                                           <span class="title">Form Access</span>
                                       </a>
                                    </li>

                                    <li id="nav_people" class="nav-item">
                                      <a href="<?php echo base_url('business-parameter'); ?>" class="nav-link nav-toggle">
                                          <i class="fa fa-briefcase sub-icon-color icon-setting"></i>
                                          <span class="title">Business Parameter</span>
                                      </a>
                                    </li>

                                    <li id="nav_people" class="nav-item">
                                       <a href="<?php echo base_url('general-parameter-list'); ?>" class="nav-link nav-toggle">
                                           <i class="fa fa-th-list sub-icon-color icon-setting"></i>
                                           <span class="title">General Parameter</span>
                                       </a>
                                    </li>
                                      
                                     <li id="nav_people" class="nav-item">
                                      <a href="<?php echo base_url('company-profile'); ?>" class="nav-link nav-toggle">
                                          <i class="fas fa-user-circle sub-icon-color icon-setting"></i>
                                          <span class="title">Company Profile</span>
                                      </a>
                                  </li>

                                   
                                  <li id="nav_people" class="nav-item">
                                      <a href="<?php echo base_url('gallery-set-list'); ?>" class="nav-link nav-toggle">
                                          <i class="fa fa-image sub-icon-color icon-setting"></i>
                                          <span class="title">Gallery Set</span>
                                      </a>
                                  </li>
                                 
                                  
                                 <!--  <li id="" class="nav-item">
                                        <a class="nav-link nav-toggle">
                                            <i class="far fa-clipboard sub-icon-color icon-additional"></i>
                                            <span class="title">Additional Details</span>
                                        </a>
                                         <ul class="sub-menu">
                                            <li id="" class="nav-item">
                                                <a href="<?php echo base_url('additional-detail-category-list'); ?>" class="nav-link nav-toggle">
                                                    <i class="fas fa-id-badge sub-icon-color icon-additional"></i>
                                                    <span class="title">Categories</span>

                                                </a>
                                            </li>
                                            <li id="" class="nav-item">
                                                <a href="<?php echo base_url('additional-detail-master-list'); ?>" class="nav-link nav-toggle">
                                                   <i class="fas fa-user-tie sub-icon-color icon-additional"></i>
                                                    <span class="title">Master</span>

                                                </a>
                                            </li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </li>

                            
                           
                            <!-- <li id="nav_people" class="nav-item">
                               <a href="<?php echo base_url('team-list'); ?>" class="nav-link nav-toggle">
                                  
                                  <i class="fa fa-users icon-team"></i>

                                   <span class="title">Team</span>
                                    
                               </a>
                           </li>
                           
 -->
                           
                           
                         
                         
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
