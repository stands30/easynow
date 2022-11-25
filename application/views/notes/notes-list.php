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
            <?php $this->load->view('email/common/email_styles'); ?>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.css<?php echo $global_asset_version; ?>">            
            <link href="<?php echo base_url(); ?>assets/project/global/plugins/pickr/css/pickr.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/module/notes/css/notes-custom.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <style type="text/css">
              

            </style>
             <!-- BEGIN PAGE LEVEL PLUGINS -->
        </head>
        <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
            <?php $this->load->view('common/header'); ?>
            <div class="clearfix"> </div>
            <!-- BEGIN CONTAINER -->
            <div class="page-container" >
                <?php $this->load->view('common/sidebar'); ?>
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper" >
                    <!-- BEGIN CONTENT BODY -->
                    <div class="">
                    <div class="page-content color">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar my-day-page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->                      
                        <div class="portlet">                          
                          <div class="container-fluid">
                           <!--  <div class="row">
                              <div class="col-md-8">search</div>
                              <div class="col-md-4">sorting</div>
                            </div> -->
                            <!-- <div class="row">
                             <a href="<?php echo base_url('email-compose'); ?>" data-title="Compose" data-toggle="modal" data-target="#compose-modal" class="btn red compose-btn btn-block">
                            <i class="fa fa-edit"></i> Compose </a>
                            </div> -->
                            <div class="row">
                              <div class="col-md-push-2 col-md-8">
                                <div class="form-group">
                                  <div class="relative-text relative-notes">
                                    <input type="text" placeholder="Write a note..." class="search-placeholder notes-sub-placeholder " autocomplete="off" name="">
                                    <div class="inline-group">
                                      <button class="search-button">
                                        <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                                            <label for="file-1" title="Add Image"  class="notes-icon-option label-image-notes notes-hidden-image"><i class="fas fa-image"></i></label>
                                        <!-- <i class="fas fa-search"></i> -->
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-40 main-notes hidden">
                                <!-- <div class="row mb-40 main-notes hidden"> -->
                                  <div class="col-md-12">
                                    
                                    <div class="notes-img-add-details">
                                        <div class="notes-header">
                                          <div class="notes-images">
                                            <div id="image_preview" class="image_preview"></div>
                                            <a href="#" class="preview_delete" onclick="deletePreview()"><i class="fas fa-trash"></i> Delete</a>
                                            <!-- <img src="<?php echo base_url(); ?>assets/module/notes/images/img-1.jpg" class="img-responsive notes-main-img"> -->
                                          </div>
                                        </div>
                                        <div class="notes-img-details notes-curve">
                                          <div class="form-group">
                                            <input type="text" name="notes-title" placeholder="Title" class="form-control form-no-border form-title-notes">
                                          </div>

                                          <div class="form-group text-area-content ">
                                            <textarea class="form-control notes-text-record form-no-border" rows="5" id="comment" placeholder="Write a note..."></textarea>
                                          </div>
                                          <div class="clearfix"></div>
                                          <div class="notes-option">
                                            
                                            <div class="dropdown dropdown-pallete">
                                              <button class="notes-icon-option dropdown-toggle"  title="Choose Color" type="button" data-toggle="dropdown" data-hover="dropdown">
                                                <i class="fas fa-palette"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-color">
                                                <div class="color-block" title="White" data-value="#fff" style="background-color: #fff "></div>
                                                <div class="color-block" title="Red" data-value="#f28b82" style="background-color: #f28b82;"></div>
                                                <div class="color-block" title="Orange" data-value="#ffd595" style="background-color: #ffd595;"></div>
                                                <div class="color-block " title="yellow" data-value="#fff475" style="background-color: #fff475;"></div>
                                                <div class="color-block " title="green" data-value="rgb(204, 255, 144)" style="background-color: rgb(204, 255, 144);"></div>
                                                <div class="color-block " title="teal" data-value="rgb(167, 255, 235)" style="background-color: rgb(167, 255, 235);"></div>
                                                <div class="color-block " title="blue" data-value="rgb(203, 240, 248)" style="background-color: #cbf0f8;"></div>
                                                <div class="color-block " title="purple" data-value="rgb(215, 174, 251)" style="background-color: rgb(215, 174, 251);"></div>
                                                <div class="color-block " title="dark-blue" data-value="#aecbfa" style="background-color: #aecbfa;"></div>
                                                <div class="color-block " title="gray" data-value="rgb(232, 234, 237)" style="background-color: rgb(232, 234, 237);"></div>
                                              </div>
                                              
                                            </div>
                                         
                                            <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                                            <label for="file-1" title="Add Image"  class="notes-icon-option label-image-notes"><i class="fas fa-image"></i></label>

                                            
                                            <div class="dropdown dropdown-more">
                                              <button class="notes-icon-option dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                              </button>

                                              <ul class="dropdown-menu">
                                                <li><a href="#"><i class="fas fa-trash"></i> Delete Note</a></li>
                                                <li><a href="#"><i class="fas fa-th-list"></i> Convert to Task</a></li>
                                              </ul>

                                            </div>
                                            <a href="#"  class="notes-icon-option notes-close-option pull-right" title="Close">
                                              Close <i class="fas fa-times"></i> 
                                            </a>
                                          </div>

                                        </div>
                                        
                                        
                                    </div>
                                  </div>
                                </div>
                                

                              </div>


                            </div>

                            <div class="row grid mb-40">

                              <div class="col-lg-4 grid-item ">
                                <div class="notes-display notes-display-color">
                                  <a href="#" class="notes-row" data-toggle="modal" data-target="#editNotes">
                                    <div class="notes-details">
                                      <div class="notes-title">Tracking team's productivity & having no task, process management system</div>
                                      <div class="notes-description">
                                        We spend big chunk of our revenue on team’s salary. Our team is the most powerful resource that we have. But if we don’t apply right system, we won’t be able to get the maximum results.
                                        <br>
                                        Most of the time unassigned / incomplete task create emergency situation in business. These emergency situations disturbs business flow.
                                        <br>
                                        Our team does lot of manual work due to which their productivity goes down. Having right system in place makes your team happy & boost their productivity.
                                      </div>
                                    </div>
                                  </a>
                                  <div class="notes-option notes-option-grid">
                                    <div class="dropdown dropdown-pallete">
                                      <button class="notes-icon-option dropdown-toggle"  title="Choose Color" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-palette"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-color">
                                        <div class="color-grid " title="White" data-value="#fff" style="background-color: #fff"></div>
                                        <div class="color-grid " title="Red" data-value="#f28b82" style="background-color: #f28b82"></div>
                                        <div class="color-grid " title="Orange" data-value="#ffd595" style="background-color: #ffd595"></div>
                                        <div class="color-grid " title="yellow" data-value="#fff475" style="background-color: #fff475"></div>
                                        <div class="color-grid " title="green" data-value="rgb(204, 255, 144)" style="background-color: rgb(204, 255, 144)"></div>
                                        <div class="color-grid " title="teal" data-value="rgb(167, 255, 235)" style="background-color: rgb(167, 255, 235)"></div>
                                        <div class="color-grid " title="blue" data-value="rgb(203, 240, 248)" style="background-color: rgb(203, 240, 248)"></div>
                                        <div class="color-grid " title="purple" data-value="rgb(215, 174, 251)" style="background-color: rgb(215, 174, 251)"></div>
                                        <div class="color-grid " title="dark-blue" data-value="#aecbfa" style="background-color: #aecbfa"></div>
                                        <div class="color-grid " title="gray" data-value="rgb(232, 234, 237)" style="background-color: rgb(232, 234, 237)"></div>
                                      </div>
                                      
                                    </div>
                                    <div class="dropdown dropdown-more">
                                      <button class="notes-icon-option dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                      </button>
                                      <!-- <input class="star" type="checkbox" title="bookmark page" checked> -->
                                      <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fas fa-trash"></i> Delete Note</a></li>
                                        <li><a href="#"><i class="fas fa-th-list"></i> Convert to Task</a></li>
                                      </ul>

                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 grid-item ">
                                <div class="notes-display notes-display-color">
                                  <a href="#" class="notes-row" data-toggle="modal" data-target="#editNotes">
                                    <div class="notes-details">
                                      <div class="notes-title">Meeting For EasyNow</div>
                                      <div class="notes-description">
                                        Module For Easynow
                                        <br>
                                        People
                                        Sales
                                        Finance
                                        Marketing
                                        Productivity
                                      </div>
                                    </div>
                                  </a>
                                  <div class="notes-option notes-option-grid">
                                    <div class="dropdown dropdown-pallete">
                                      <button class="notes-icon-option dropdown-toggle"  title="Choose Color" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-palette"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-color">
                                        <div class="color-grid " title="White" data-value="#fff" style="background-color: #fff"></div>
                                        <div class="color-grid " title="Red" data-value="#f28b82" style="background-color: #f28b82"></div>
                                        <div class="color-grid " title="Orange" data-value="#ffd595" style="background-color: #ffd595"></div>
                                        <div class="color-grid " title="yellow" data-value="#fff475" style="background-color: #fff475"></div>
                                        <div class="color-grid " title="green" data-value="rgb(204, 255, 144)" style="background-color: rgb(204, 255, 144)"></div>
                                        <div class="color-grid " title="teal" data-value="rgb(167, 255, 235)" style="background-color: rgb(167, 255, 235)"></div>
                                        <div class="color-grid " title="blue" data-value="rgb(203, 240, 248)" style="background-color: rgb(203, 240, 248)"></div>
                                        <div class="color-grid " title="purple" data-value="rgb(215, 174, 251)" style="background-color: rgb(215, 174, 251)"></div>
                                        <div class="color-grid " title="dark-blue" data-value="#aecbfa" style="background-color: #aecbfa"></div>
                                        <div class="color-grid " title="gray" data-value="rgb(232, 234, 237)" style="background-color: rgb(232, 234, 237)"></div>
                                      </div>
                                      
                                    </div>
                                    <div class="dropdown dropdown-more">
                                      <button class="notes-icon-option dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                      </button>

                                      <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fas fa-trash"></i> Delete Note</a></li>
                                        <li><a href="#"><i class="fas fa-th-list"></i> Convert to Task</a></li>
                                      </ul>

                                    </div>
                                    
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-4 grid-item ">
                                <div class="notes-display blue notes-display-color">
                                  <a href="#" class="notes-row" data-toggle="modal" data-target="#editNotes">
                                    <div class="notes-details">
                                      <div class="notes-title">Meeting For EasyNow</div>
                                      <div class="notes-description">
                                        Module For Easynow
                                        <br>
                                        People
                                        Sales
                                        Finance
                                        Marketing
                                        Productivity
                                      </div>
                                    </div>
                                  </a>
                                  <div class="notes-option notes-option-grid">
                                    <div class="dropdown dropdown-pallete">
                                      <button class="notes-icon-option dropdown-toggle"  title="Choose Color" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-palette"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-color">
                                        <div class="color-grid " title="White" data-value="#fff" style="background-color: #fff"></div>
                                        <div class="color-grid " title="Red" data-value="#f28b82" style="background-color: #f28b82"></div>
                                        <div class="color-grid " title="Orange" data-value="#ffd595" style="background-color: #ffd595"></div>
                                        <div class="color-grid " title="yellow" data-value="#fff475" style="background-color: #fff475"></div>
                                        <div class="color-grid " title="green" data-value="rgb(204, 255, 144)" style="background-color: rgb(204, 255, 144)"></div>
                                        <div class="color-grid " title="teal" data-value="rgb(167, 255, 235)" style="background-color: rgb(167, 255, 235)"></div>
                                        <div class="color-grid " title="blue" data-value="rgb(203, 240, 248)" style="background-color: rgb(203, 240, 248)"></div>
                                        <div class="color-grid " title="purple" data-value="rgb(215, 174, 251)" style="background-color: rgb(215, 174, 251)"></div>
                                        <div class="color-grid " title="dark-blue" data-value="#aecbfa" style="background-color: #aecbfa"></div>
                                        <div class="color-grid " title="gray" data-value="rgb(232, 234, 237)" style="background-color: rgb(232, 234, 237)"></div>
                                      </div>
                                      
                                    </div>
                                    <div class="dropdown dropdown-more">
                                      <button class="notes-icon-option dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                      </button>

                                      <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fas fa-trash"></i> Delete Note</a></li>
                                        <li><a href="#"><i class="fas fa-th-list"></i> Convert to Task</a></li>
                                      </ul>

                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 grid-item ">
                                <div class="notes-display notes-display-color">
                                  <a href="#" class="notes-row" data-toggle="modal" data-target="#editNotes">
                                    <div class="notes-details">
                                      <div class="notes-title">Tracking team's productivity & having no task, process management system</div>
                                      <div class="notes-description">
                                        We spend big chunk of our revenue on team’s salary. Our team is the most powerful resource that we have. But if we don’t apply right system, we won’t be able to get the maximum results.
                                        <br>
                                        Most of the time unassigned / incomplete task create emergency situation in business. These emergency situations disturbs business flow.
                                        <br>
                                        Our team does lot of manual work due to which their productivity goes down. Having right system in place makes your team happy & boost their productivity.
                                      </div>
                                    </div>
                                  </a>
                                  <div class="notes-option notes-option-grid">
                                    <div class="dropdown dropdown-pallete">
                                      <button class="notes-icon-option dropdown-toggle"  title="Choose Color" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-palette"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-color">
                                        <div class="color-grid " title="White" data-value="#fff" style="background-color: #fff"></div>
                                        <div class="color-grid " title="Red" data-value="#f28b82" style="background-color: #f28b82"></div>
                                        <div class="color-grid " title="Orange" data-value="#ffd595" style="background-color: #ffd595"></div>
                                        <div class="color-grid " title="yellow" data-value="#fff475" style="background-color: #fff475"></div>
                                        <div class="color-grid " title="green" data-value="rgb(204, 255, 144)" style="background-color: rgb(204, 255, 144)"></div>
                                        <div class="color-grid " title="teal" data-value="rgb(167, 255, 235)" style="background-color: rgb(167, 255, 235)"></div>
                                        <div class="color-grid " title="blue" data-value="rgb(203, 240, 248)" style="background-color: rgb(203, 240, 248)"></div>
                                        <div class="color-grid " title="purple" data-value="rgb(215, 174, 251)" style="background-color: rgb(215, 174, 251)"></div>
                                        <div class="color-grid " title="dark-blue" data-value="#aecbfa" style="background-color: #aecbfa"></div>
                                        <div class="color-grid " title="gray" data-value="rgb(232, 234, 237)" style="background-color: rgb(232, 234, 237)"></div>
                                      </div>
                                      
                                    </div>
                                    <div class="dropdown dropdown-more">
                                      <button class="notes-icon-option dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                      </button>

                                      <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fas fa-trash"></i> Delete Note</a></li>
                                        <li><a href="#"><i class="fas fa-th-list"></i> Convert to Task</a></li>
                                      </ul>

                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 grid-item ">
                                <div class="notes-display notes-display-color">
                                  <a href="#" class="notes-row" data-toggle="modal" data-target="#editNotes">
                                    <div class="notes-details">
                                      <div class="notes-title">Meeting For EasyNow</div>
                                      <div class="notes-description">
                                        Module For Easynow
                                        <br>
                                        People
                                        Sales
                                        Finance
                                        Marketing
                                        Productivity
                                      </div>
                                    </div>
                                  </a>
                                  <div class="notes-option notes-option-grid">
                                    <div class="dropdown dropdown-pallete">
                                      <button class="notes-icon-option dropdown-toggle"  title="Choose Color" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-palette"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-color">
                                        <div class="color-grid " title="White" data-value="#fff" style="background-color: #fff"></div>
                                        <div class="color-grid " title="Red" data-value="#f28b82" style="background-color: #f28b82"></div>
                                        <div class="color-grid " title="Orange" data-value="#ffd595" style="background-color: #ffd595"></div>
                                        <div class="color-grid " title="yellow" data-value="#fff475" style="background-color: #fff475"></div>
                                        <div class="color-grid " title="green" data-value="rgb(204, 255, 144)" style="background-color: rgb(204, 255, 144)"></div>
                                        <div class="color-grid " title="teal" data-value="rgb(167, 255, 235)" style="background-color: rgb(167, 255, 235)"></div>
                                        <div class="color-grid " title="blue" data-value="rgb(203, 240, 248)" style="background-color: rgb(203, 240, 248)"></div>
                                        <div class="color-grid " title="purple" data-value="rgb(215, 174, 251)" style="background-color: rgb(215, 174, 251)"></div>
                                        <div class="color-grid " title="dark-blue" data-value="#aecbfa" style="background-color: #aecbfa"></div>
                                        <div class="color-grid " title="gray" data-value="rgb(232, 234, 237)" style="background-color: rgb(232, 234, 237)"></div>
                                      </div>
                                      
                                    </div>
                                    <div class="dropdown dropdown-more">
                                      <button class="notes-icon-option dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                      </button>

                                      <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fas fa-trash"></i> Delete Note</a></li>
                                        <li><a href="#"><i class="fas fa-th-list"></i> Convert to Task</a></li>
                                      </ul>

                                    </div>
                                    
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-4 grid-item ">
                                <div class="notes-display notes-display-color">
                                  <a href="#" class="notes-row" data-toggle="modal" data-target="#editNotes">
                                      <div class="notes-display-img">
                                        <img src="<?php echo base_url(); ?>assets/client_modules/easynow/notes/images/img-1.jpg" class="img-responsive notes-grid-img">
                                      </div>
                                      <div class="notes-details">
                                        <div class="notes-title">Meeting For EasyNow</div>
                                        <div class="notes-description">
                                          Module For Easynow
                                          <br>
                                          People
                                          Sales
                                          Finance
                                          Marketing
                                          Productivity
                                        </div>
                                      </div>
                                  </a>
                                  <div class="notes-option notes-option-grid">
                                    <div class="dropdown dropdown-pallete">
                                      <button class="notes-icon-option dropdown-toggle"  title="Choose Color" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-palette"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-color">
                                        <div class="color-grid " title="White" data-value="#fff" style="background-color: #fff"></div>
                                        <div class="color-grid " title="Red" data-value="#f28b82" style="background-color: #f28b82"></div>
                                        <div class="color-grid " title="Orange" data-value="#ffd595" style="background-color: #ffd595"></div>
                                        <div class="color-grid " title="yellow" data-value="#fff475" style="background-color: #fff475"></div>
                                        <div class="color-grid " title="green" data-value="rgb(204, 255, 144)" style="background-color: rgb(204, 255, 144)"></div>
                                        <div class="color-grid " title="teal" data-value="rgb(167, 255, 235)" style="background-color: rgb(167, 255, 235)"></div>
                                        <div class="color-grid " title="blue" data-value="rgb(203, 240, 248)" style="background-color: rgb(203, 240, 248)"></div>
                                        <div class="color-grid " title="purple" data-value="rgb(215, 174, 251)" style="background-color: rgb(215, 174, 251)"></div>
                                        <div class="color-grid " title="dark-blue" data-value="#aecbfa" style="background-color: #aecbfa"></div>
                                        <div class="color-grid " title="gray" data-value="rgb(232, 234, 237)" style="background-color: rgb(232, 234, 237)"></div>
                                      </div>
                                      
                                    </div>
                                    <div class="dropdown dropdown-more">
                                      <button class="notes-icon-option dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                      </button>

                                      <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fas fa-trash"></i> Delete Note</a></li>
                                        <li><a href="#"><i class="fas fa-th-list"></i> Convert to Task</a></li>
                                      </ul>

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

            <!-- Notes Modal start here -->
            <div id="editNotes" class="modal modal-greeting fade" role="dialog">
                <div class="vertical-alignment-helper">
                  <div class="modal-dialog vertical-align-center">
                    <!-- Modal content-->
                    <div class="modal-content greeting-modal-content modal-notes">
                        <!-- <div class="modal-header">
                            <button type="button" class="image-greeting-modal" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title modal-title-tag text-center">Notes</h4>
                        </div> -->
                        <div class="modal-body notes-modal">
                            <form>
                              <div class="greeting-container">
                                <div class="greeting-context">
                                  <div class="row">
                                    <div class="notes-modal-img ">
                                      <!-- <img src="<?php echo base_url(); ?>assets/module/notes/images/img-1.jpg" class="img-responsive notes-main-img"> -->
                                      <div id="modal_preview_image" class="modal_preview_image"></div>
                                      <a href="#" class="preview_delete" onclick="deletePreview()"><i class="fas fa-trash"></i> Delete</a>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12 mt-20">
                                        <div class="form-group">
                                            <input type="text" name="notes-title" placeholder="Title" class="form-control form-no-border modal-notes-title" value="Tracking team's productivity ">
                                          </div>

                                          <div class="form-group text-area-content ">
                                            <textarea class="form-control notes-text-record notes-text-record-edit form-no-border" rows="5" id="notes-comment-edit" placeholder="Write a note..." value="">We spend big chunk of our revenue on team’s salary. Our team is the most powerful resource that we have. But if we don’t apply right system, we won’t be able to get the maximum results. Most of the time unassigned / incomplete task create emergency situation in business.</textarea>
                                          </div>
                                      </div>
                                      <div class="col-md-12 text-right">
                                        <span class="edited-notes">Edited Feb 23,2019</span>
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
                                         
                                            <input type="file" name="file-2[]" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" />
                                            <label for="file-2" title="Add Image"  class="notes-icon-option label-image-notes"><i class="fas fa-image"></i></label>

                                            
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

            <!-- END CONTAINER -->

            <div class="js-scripts">



                <?php $this->load->view('common/footer_scripts'); ?>

                <?php $this->load->view('email/common/footer_scripts'); ?>
                <script src="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.js<?php echo $global_asset_version; ?>"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/pickr/js/pickr.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/project/global/plugins/masonary/masonry.pkgd<?php echo $global_asset_version; ?>" type="text/javascript"></script>
                <script type="text/javascript">
                  
                  $('.text-area-content').on( 'change keyup keydown paste cut', 'textarea', function (){
                      $(this).height(0).height(this.scrollHeight);
                  }).find( 'textarea' ).change();

                </script>

                 <script type="text/javascript">
                  $('.inputfile-1').change(function(e) {
                    preview_image(e);
                  });

                  function preview_image(event) {
                    

                    var total_file = $('.inputfile-1')[0].files.length;
                    $('#image_preview').html('');
                    for(var i = 0; i < total_file; i++) {
                      $('#image_preview').append("<span class=\"pip\">" + "<img class=\"imageThumb img-responsive notes-main-img notes-module-img\" src=\"" + URL.createObjectURL(event.target.files[i]) + "\" width=\"auto\" height=\"160px\"  />" + "</span>");
                    }
                  }

                   $('.inputfile-2').change(function(e) {
                    modal_preview_image(e);
                  });

                  function modal_preview_image(event) {
                    

                    var total_file = $('.inputfile-2')[0].files.length;
                    $('#modal_preview_image').html('');
                    for(var i = 0; i < total_file; i++) {
                      
                      $('#modal_preview_image').append("<span class=\"pip\">" + "<img class=\"imageThumb img-responsive notes-main-img notes-modal-img\" src=\"" + URL.createObjectURL(event.target.files[i]) + "\" width=\"auto\" height=\"160px\"  />" + "</span>");
                      
                    }
                  }



                  function deletePreview(){
                    $(".notes-module-img").css("display", "none");
                    $(".notes-modal-img").css("display", "none");
                    $(".preview_delete").css("display", "none");
                    
                  }

                </script>

                <script type="text/javascript">
                  $('.inputfile-1').on('click', function() {
                    $(this).removeClass('notes-curve');
                  })

                  $('.relative-notes').on('click', function() {
                    $(".relative-notes").hide();
                    
                    $(".main-notes").removeClass('hidden');
                  })


                  $('.notes-close-option').on('click', function() {
                    $(".relative-notes").show();
                    
                    $(".main-notes").addClass('hidden');
                  })

                  
                </script>

                <script type="text/javascript">

                   
                      $(document).ready(function() {
                        
                         $(".color-block").click(function(){
                          var color = $(this).attr("data-value");
                          console.log(color);
                          $(".notes-img-details").css("background-color", color);
                          $(".notes-img-add-details").css("background-color", color);
                        });

                         $(".color-modal").click(function(){
                          var color = $(this).attr("data-value");
                          $(".notes-modal").css("background-color", color);
                        });

                         $(".color-grid").click(function(){
                          var color = $(this).attr("data-value");                          
                          $(this).parents(".notes-display-color").css("background-color", color);
                        });
                    });
                </script>

               

            </div>

        </body>

    </html>
