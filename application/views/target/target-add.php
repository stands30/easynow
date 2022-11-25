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

    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/project/global/plugins/jquery-multi-select/css/multi-select.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/module/target/css/target-custom.css">
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
          <!-- END PAGE BAR -->
          <!-- END PAGE HEADER-->
          <div class="portlet portlet-fluid-background">
            <div class="row">
              <!-- END PAGE HEADER-->
              <div class="container-fluid">
                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Add New Target</h3>
                  <span class="sp_line color-primary"></span>
                </div>
                <form role="form" id="target_form" class="col-md-12 form_edit">
                  <div class="row">
                    <div class="col-md-12">
                      <span class="sub-list-title repeater-list-title">Pre-Requisite</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon input-label-text">
                          <input type="text" name="trg_name" id="trg_name" value="" class="form-control color-primary-light" data-msg="Please Enter Target Name">
                          <label for="trg_name">Target Name <span class="asterix-error"><em>*</em></span></label>
                          <i class="fas fa-bullseye list-level"></i>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">  
                        <label class="drp-title">Target Responsible <span class="asterix-error"><em>*</em></span></label>
                        <div class="input-icon">
                          <i class="fas fa-user-tie list-level"></i>
                            <select name="trg_responsible" id="trg_responsible" class="form-control trg_responsible" type="select" data-msg="Please Select People">
                            <option>Please Select Target Responsible</option>
                            <option option="0">Rohan</option>
                            <option option="1">Pratik</option>
                            <option option="2">Tushar</option>
                            <option option="3">Mandar</option>
                            <option option="4">Satish</option>
                            <option class="blank_option"></option>
                          </select>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <textarea type="textarea" class="form-control " id="trg_desc" name="trg_desc" rows="3" placeholder="" data-msg="Please Enter Target Description"></textarea>
                          <label>Target Description</label> 
                          <i class="fa fa-comment list-level"></i>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>

                   
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-md-checkboxes custom-checkbox-header">
                        <!-- <label></label> -->
                        <div class="md-checkbox-inline">
                            <div class="md-checkbox">
                                <input type="checkbox" id="checkbox6" class="md-check">
                                <label for="checkbox6">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Amount </label>
                            </div>
                            <div class="md-checkbox">
                                <input type="checkbox" id="checkbox7" class="md-check">
                                <label for="checkbox7">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span>Count </label>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="trg_amt" id="trg_amt" value="" class="form-control color-primary-light" data-msg="Please Enter Target Name">
                          <label for="trg_amt">Target Amount <span class="asterix-error"><em>*</em></span></label>
                          <i class="fas fa-id-card list-level"></i>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="input-icon">
                          <input type="text" name="trg_count" id="trg_count" value="" class="form-control color-primary-light" data-msg="Please Enter Target Name">
                          <label for="trg_count">Target Count <span class="asterix-error"><em>*</em></span></label>
                          <i class="fas fa-id-card list-level"></i>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label>According to checkbox check Target amount and  Target Count will be visible</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <span class="sub-list-title repeater-list-title">Who <span class="target-sub-list-title">Target For</span></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label>- organization is select then organization dropdown will be visible and list of team member will be displayed, - Team is selected then multiple select from left to right will be seen, - Individual then only people dropdown will been seen</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-radios mt-20">
                        <label class="control-custom-label">Choose Target Reference</label>
                        <div class="md-radio-inline">
                            <div class="md-radio">
                                <input type="radio" id="radio6" name="radio2" class="md-radiobtn">
                                <label for="radio6">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Organization</label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" id="radio7" name="radio2" class="md-radiobtn" checked>
                                <label for="radio7">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Team</label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" id="radio8" name="radio2" class="md-radiobtn">
                                <label for="radio8">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Individual</label>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">  
                        <label class="drp-title">People<span class="asterix-error"><em>*</em></span></label>
                        <div class="input-icon">
                          <i class="fa fa-user list-level"></i>
                            <select name="trg_people" id="trg_people" class="form-control trg_people" type="select" data-msg="Please Select People">
                            <option>Please Select People</option>
                            <option option="0">Rohan</option>
                            <option option="1">Pratik</option>
                            <option option="2">Tushar</option>
                            <option option="3">Mandar</option>
                            <option option="4">Satish</option>
                            <option class="blank_option"></option>
                          </select>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">  
                        <label class="drp-title">Organization<span class="asterix-error"><em>*</em></span></label>
                        <div class="input-icon">
                          <i class="fa fa-industry icon-company list-level"></i>
                            <select name="trg_organization" id="trg_organization" class="form-control trg_organization" type="select" data-msg="Please Select Organization">
                            <option>Please Select Organization</option>
                            <option option="0">Midas</option>
                            <option option="1">Red Hat</option>
                            <option option="2">Swastik Enterprise</option>
                            <option option="3">Fruit Bowl</option>
                            <option class="blank_option"></option>
                          </select>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label class="control-label control-custom-label col-md-12 no-side-padding">Team Member From Midas</label>
                      <ul class="team-member-list">
                        <li>Rayaan</li>
                        <li>Ronith</li>
                        <li>Prisha</li>
                        <li>Shreya</li>
                      </ul>
                    </div>
                    <div class="col-md-6 mb-20">
                      <div class="form-group">
                        <label class="control-label control-custom-label col-md-12 no-side-padding">Select Team Member</label>
                        <div class="col-md-12 no-side-padding">
                            <select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]">
                                <option>Aarav</option>
                                <option>Vivaan</option>
                                <option selected>Aditya</option>
                                <option selected>Aditya</option>
                                <option>Akshara </option>
                                <option>Adrika </option>
                                <option>Prisha</option>
                                <option>Shreya</option>
                                <option selected>Mishka</option>
                                <option>Advika</option>
                                <option>Advika</option>
                                <option>Nakul</option>
                                <option>Rayaan</option>
                                <option>Ronith</option>
                                <option>Shaurya</option>
                                <option>Tejas</option>
                            </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <span class="sub-list-title repeater-list-title">When <span class="target-sub-list-title">Target Interval</span></span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-md-radios mt-20">
                        <label>Target Duration</label>
                        <div class="md-radio-inline">
                            <div class="md-radio">
                                <input type="radio" id="radio9" name="radio3" class="md-radiobtn">
                                <label for="radio9">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Yearly</label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" id="radio10" name="radio3" class="md-radiobtn" checked>
                                <label for="radio10">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Monthly</label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" id="radio11" name="radio3" class="md-radiobtn">
                                <label for="radio11">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Quaterly</label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" id="radio12" name="radio3" class="md-radiobtn">
                                <label for="radio12">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Custom</label>
                            </div>
                        </div>
                      </div>
                    </div>

                    

                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">  
                        <label class="drp-title">Year<span class="asterix-error"><em>*</em></span></label>
                        <div class="input-icon">
                          <i class="fas fa-calendar-alt list-level"></i>
                            <select name="trg_year" id="trg_year" class="form-control trg_year" type="select" data-msg="Please Select Year">
                            <option>Please Select Year</option>
                            <option option="0">2016</option>
                            <option option="1">2017</option>
                            <option option="2">2018 </option>
                            <option option="3">2019</option>
                            <option option="4">2020</option>
                            <option option="5">2021</option>
                            <option class="blank_option"></option>
                          </select>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">  
                        <label class="drp-title">Month<span class="asterix-error"><em>*</em></span></label>
                        <div class="input-icon">
                          <i class="fas fa-calendar-alt list-level"></i>
                            <select name="trg_month" id="trg_month" class="form-control trg_month" type="select" data-msg="Please Select Month">
                            <option>Please Select Month</option>
                            <option option="0">January</option>
                            <option option="1">February</option>
                            <option option="2">March </option>
                            <option option="3">April</option>
                            <option option="4">May</option>
                            <option option="5">June</option>
                            <option option="6">July</option>
                            <option option="7">August</option>
                            <option option="8">September</option>
                            <option option="9">October</option>
                            <option option="10">November</option>
                            <option option="11">December</option>
                            <option class="blank_option"></option>
                          </select>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group form-md-line-input form-md-floating-label">  
                        <label class="drp-title">Quarterly<span class="asterix-error"><em>*</em></span></label>
                        <div class="input-icon">
                          <i class="fas fa-calendar-alt list-level"></i>
                            <select name="trg_quarterly" id="trg_quarterly" class="form-control trg_quarterly" type="select" data-msg="Please Select Month">
                            <option>Please Select Quarter</option>
                            <option option="0">Quarter 1</option>
                            <option option="1">Quarter 2</option>
                            <option option="2">Quarter 3 </option>
                            <option option="3">Quarter 4</option>
                            <option class="blank_option"></option>
                          </select>
                        </div>
                        <div class="help-block"></div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group  form-md-line-input form-md-floating-label">
                        <label class="drp-title">Start Date</label>
                        <div class="input-icon">
                          <input type="text" class="form-control trg_start_date date date-picker" id="trg_start_date" name="trg_start_date" required="" data-msg="Please Select Start Date" value="" required="">
                          <i class="fa fa-calendar-alt"></i>
                        </div> 
                        <span class="custom-error"></span>                                                               
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group  form-md-line-input form-md-floating-label">
                        <label class="drp-title">Start End</label>
                        <div class="input-icon">
                          <input type="text" class="form-control trg_end_date date date-picker" id="trg_end_date" name="trg_end_date" required="" data-msg="Please Select End Date" value="" required="">
                          <i class="fa fa-calendar-alt"></i>
                        </div> 
                        <span class="custom-error"></span>                                                               
                      </div>
                    </div>


                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <span class="sub-list-title repeater-list-title">What <span class="target-sub-list-title">Target On</span></span>
                    </div>
                  </div>
                  <div class="row mb-40">
                    

                    <div class="portlet-body tabs_forms">
                      <div class="tabbable-line">
                        <ul class="nav nav-tabs">
                          <li class=" line line-xs line-dark active">
                            <a href="#target_tab_1" data-toggle="tab" aria-expanded="true">People</a>
                          </li>
                          <li class=" line line-xs line-dark ">
                            <a href="#target_tab_2" data-toggle="tab" aria-expanded="true">Lead</a>
                          </li>
                          <li class=" line line-xs line-dark ">
                            <a href="#target_tab_3" data-toggle="tab" aria-expanded="true">Organization</a>
                          </li>
                          <li class=" line line-xs line-dark ">
                            <a href="#target_tab_4" data-toggle="tab" aria-expanded="true">Task</a>
                          </li>
                          <li class=" line line-xs line-dark ">
                            <a href="#target_tab_5" data-toggle="tab" aria-expanded="true">Quotation</a>
                          </li>
                          <li class=" line line-xs line-dark ">
                            <a href="#target_tab_6" data-toggle="tab" aria-expanded="true">Invoice</a>
                          </li>
                          <li class=" line line-xs line-dark ">
                            <a href="#target_tab_7" data-toggle="tab" aria-expanded="true">Payment Received</a>
                          </li>
                          <li class=" line line-xs line-dark ">
                            <a href="#target_tab_8" data-toggle="tab" aria-expanded="true">Meeting</a>
                          </li>
                        </ul>
                        <div class="tab-content tab_mod" style="padding-bottom: 40px;">
                          <div class="tab-pane mb-40 active" id="target_tab_1">
                            
                            <div class="col-md-push-2 col-md-8">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>All the value fields will be muilt select fields</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Title</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user list-level"></i>
                                        <select name="trg_people_title" id="trg_people_title" class="form-control trg_people_title" type="select" data-msg="Please Select Title">
                                        <option>Please Select Title</option>
                                        <option option="0">Mr</option>
                                        <option option="1">Mrs</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Designation</label>
                                    <div class="input-icon">
                                      <i class="fas fa-id-card-alt list-level"></i>
                                        <select name="trg_people_desg" id="trg_people_desg" class="form-control trg_people_desg" type="select" data-msg="Please Select Designation">
                                        <option>Please Select Designation</option>
                                        <option option="0">Director</option>
                                        <option option="1">Manager</option>
                                        <option option="2">Sales Executive</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="input-label-text">Gender</label>
                                        <div class="md-radio-inline">
                                            <?php echo getGenPrmResult('radio','ppl_gender','ppl_gender',1,'result'); ?>
                                        </div>
                                        <span class="help-block custom-error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">People Managed By</label>
                                    <div class="input-icon">
                                      <i class="fas fa-user-tie list-level"></i>
                                        <select name="trg_people_mang_by" id="trg_people_mang_by" class="form-control trg_people_mang_by" type="select" data-msg="Please Select Managed By">
                                        <option>Please Select Managed By</option>
                                        <option option="0">Director</option>
                                        <option option="1">Manager</option>
                                        <option option="2">Sales Executive</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                              </div>

                              <div class="row ">

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">People Tags</label>
                                    <div class="input-icon">
                                      <i class="fas fa-tags  list-level"></i>
                                        <select name="trg_people_tags" id="trg_people_tags" class="form-control trg_people_tags" type="select" data-msg="Please Select People Tags">
                                        <option>Please Select People Tags</option>
                                        <option option="0">SCGT</option>
                                        <option option="1">BNI</option>
                                        <option option="2">Facebook Campaing</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="input-label-text">Date Filter</label>
                                    <div class="md-checkbox-inline">
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="people_met_on" class="md-check">
                                            <label for="people_met_on">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Met On </label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="people_created_on" class="md-check">
                                            <label for="people_created_on">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Created On </label>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="tab-pane mb-40" id="target_tab_2">
                            <div class="col-md-push-2 col-md-8">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>All the value fields will be muilt select fields</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead People</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user list-level"></i>
                                        <select name="trg_lead_people" id="trg_lead_people" class="form-control trg_lead_people" type="select" data-msg="Please Select Lead">
                                        <option>Please Select Lead</option>
                                        <option option="0">Ankush</option>
                                        <option option="1">Pooja</option>
                                        <option option="2">Stanley</option>
                                        <option option="3">Pranali</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead Company</label>
                                    <div class="input-icon">
                                      <i class="fa fa-cubes list-level"></i>
                                        <select name="trg_lead_company" id="trg_lead_company" class="form-control trg_lead_company" type="select" data-msg="Please Select Company">
                                        <option>Please Select Company</option>
                                        <option option="0">Rituraj IT Solutions</option>
                                        <option option="1">Advocate Kavita Totkekar</option>
                                        <option option="2">Gayatri Sales Corporation</option>
                                        <option option="3">Universal Communication</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead Temp</label>
                                    <div class="input-icon">
                                      <i class="fa fa-sun list-level"></i>
                                        <select name="trg_lead_temp" id="trg_lead_temp" class="form-control trg_lead_temp" type="select" data-msg="Please Select Lead Temp">
                                        <option>Please Select Lead Temp</option>
                                        <option option="0">Hot</option>
                                        <option option="1">Cold</option>
                                        <option option="2">Warm</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Source</label>
                                    <div class="input-icon">
                                      <i class="fas fa-database list-level"></i>
                                        <select name="trg_lead_source" id="trg_lead_source" class="form-control trg_lead_source" type="select" data-msg="Please Select Source">
                                        <option>Please Select Source</option>
                                        <option option="0">Onine Enquire</option>
                                        <option option="1">G2G</option>
                                        <option option="2">Instagarm Marketing</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead Referred By</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user list-level"></i>
                                        <select name="trg_lead_ref_by" id="trg_lead_ref_by" class="form-control trg_lead_ref_by" type="select" data-msg="Please Select Referred By">
                                        <option>Please Select Referred By</option>
                                        <option option="0">Vinay Pagare</option>
                                        <option option="1">Darsh Mheta</option>
                                        <option option="2">Rajan Parekh</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead Type</label>
                                    <div class="input-icon">
                                      <i class="fas fa-th-list list-level"></i>
                                        <select name="trg_lead_type" id="trg_lead_type" class="form-control trg_lead_type" type="select" data-msg="Please Select Lead Type">
                                        <option>Please Select Lead Type</option>
                                        <option option="0">New </option>
                                        <option option="1">Existing</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead Stage</label>
                                    <div class="input-icon">
                                      <i class="fa fa-cubes list-level"></i>
                                        <select name="trg_lead_stage" id="trg_lead_stage" class="form-control trg_lead_stage" type="select" data-msg="Please Select Lead Stage">
                                        <option>Please Select Lead Stage</option>
                                        <option option="0">Lead In</option>
                                        <option option="1">Qualified</option>
                                        <option option="2">Proposal Sent</option>
                                        <option option="3">Trial</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead Status</label>
                                    <div class="input-icon">
                                      <i class="fas fa-info-circle list-level"></i>
                                        <select name="trg_lead_status" id="trg_lead_status" class="form-control trg_lead_status" type="select" data-msg="Please Select Lead Status">
                                        <option>Please Select Lead Status</option>
                                        <option option="0">Pending</option>
                                        <option option="1">Won</option>
                                        <option option="2">On Hold</option>
                                        <option option="3">Lost</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead Managed By</label>
                                    <div class="input-icon">
                                      <i class="fas fa-user-tie list-level"></i>
                                        <select name="trg_lead_mang_by" id="trg_lead_mang_by" class="form-control trg_lead_mang_by" type="select" data-msg="Please Select Lead Managed By">
                                        <option>Please Select Lead Managed By</option>
                                        <option option="0">Vinay Pagare</option>
                                        <option option="1">Darsh Mheta</option>
                                        <option option="2">Rajan Parekh</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead Campaign</label>
                                    <div class="input-icon">
                                      <i class="fas fa-user-tie list-level"></i>
                                        <select name="trg_lead_campaign" id="trg_lead_campaign" class="form-control trg_lead_campaign" type="select" data-msg="Please Select Lead Campaign">
                                        <option>Please Select Lead Campaign</option>
                                        <option option="0">Instagram Marketing</option>
                                        <option option="1">Facebook Marketing</option>
                                        <option option="2">Social Ranking</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="input-label-text">Date Filter</label>
                                    <div class="md-checkbox-inline">
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="lead_created_on" class="md-check">
                                            <label for="lead_created_on">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Created On </label>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="tab-pane mb-40" id="target_tab_3">
                            <div class="col-md-push-2 col-md-8">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>All the value fields will be muilt select fields</label>
                                </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Company State</label>
                                    <div class="input-icon">
                                      <i class="fas fa-map-marked-alt list-level"></i>
                                        <select name="trg_org_state" id="trg_org_state" class="form-control trg_org_state" type="select" data-msg="Please Select State">
                                        <option>Please Select State</option>
                                        <option option="0">Maharashtra</option>
                                        <option option="1">Kerala</option>
                                        <option option="2">Gujarat</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Industry</label>
                                    <div class="input-icon">
                                      <i class="fa fa-industry list-level"></i>
                                        <select name="trg_org_industry" id="trg_org_industry" class="form-control trg_org_industry" type="select" data-msg="Please Select Industry">
                                        <option>Please Select Industry</option>
                                        <option option="0">Digital Advertising Agency</option>
                                        <option option="1">Manufacturing</option>
                                        <option option="2">Consultants</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Company Type</label>
                                    <div class="input-icon">
                                      <i class="fas fa-building list-level"></i>
                                        <select name="trg_org_type" id="trg_org_type" class="form-control trg_org_type" type="select" data-msg="Please Select Organization Type">
                                        <option>Please Select Organization Type</option>
                                        <option option="0">Proprietor </option>
                                        <option option="1">Partnership</option>
                                        <option option="2">Private Limited</option>
                                        <option option="3">LLP</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Annual Revenue</label>
                                    <div class="input-icon">
                                      <i class="fas fa-chart-pie list-level"></i>
                                        <select name="trg_org_annual_rev" id="trg_org_annual_rev" class="form-control trg_org_annual_rev" type="select" data-msg="Please Select Annual Revenue">
                                        <option>Please Select Annual Revenue</option>
                                        <option option="0">0-10 Lacs </option>
                                        <option option="1">10-30 Lacs</option>
                                        <option option="2">30 - 50 Lacs</option>
                                        <option option="3">50-80 lacs</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Organization Tags</label>
                                    <div class="input-icon">
                                      <i class="fas fa-tags  list-level"></i>
                                        <select name="trg_org_tags" id="trg_org_tags" class="form-control trg_org_tags" type="select" data-msg="Please Select Organization Tags">
                                        <option>Please Select Organization Tags</option>
                                        <option option="0">SCGT</option>
                                        <option option="1">BNI</option>
                                        <option option="2">Facebook Campaing</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Organization Managed By</label>
                                    <div class="input-icon">
                                      <i class="fas fa-user-tie list-level"></i>
                                        <select name="trg_lead_mang_by" id="trg_lead_mang_by" class="form-control trg_lead_mang_by" type="select" data-msg="Please Select Organization Managed By">
                                        <option>Please Select Organization Managed By</option>
                                        <option option="0">Vinay Pagare</option>
                                        <option option="1">Darsh Mheta</option>
                                        <option option="2">Rajan Parekh</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input">
                                    <label class="input-label-text input-label-org">Organization Type</label>
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio_company" name="radio_company_account" value="<?php echo COMPANY_TYPE_COMPANY; ?>" class="md-radiobtn radio_company_account" checked>
                                            <label for="radio_company">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Company </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio_account" name="radio_company_account" value="<?php echo COMPANY_TYPE_ACCOUNT; ?>" class="md-radiobtn radio_company_account">
                                            <label for="radio_account">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Account </label>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="input-label-text">Date Filter</label>
                                    <div class="md-checkbox-inline">
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="org_created_on" class="md-check">
                                            <label for="org_created_on">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Created On </label>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="tab-pane mb-40" id="target_tab_4">
                            <div class="col-md-push-2 col-md-8">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>All the value fields will be muilt select fields</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Assigned To</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user list-level"></i>
                                        <select name="trg_tsk_assign_to" id="trg_tsk_assign_to" class="form-control trg_tsk_assign_to" type="select" data-msg="Please Select Assigned To">
                                        <option>Please Select Assigned To</option>
                                        <option option="0">Ankush</option>
                                        <option option="1">Pooja</option>
                                        <option option="2">Stanley</option>
                                        <option option="3">Pranali</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Supporter</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user list-level"></i>
                                        <select name="trg_tsk_supporter" id="trg_tsk_supporter" class="form-control trg_tsk_supporter" type="select" data-msg="Please Select Supporter">
                                        <option>Please Select Supporter</option>
                                        <option option="0">Ankush</option>
                                        <option option="1">Pooja</option>
                                        <option option="2">Stanley</option>
                                        <option option="3">Pranali</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Reviewer</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user list-level"></i>
                                        <select name="trg_tsk_review" id="trg_tsk_review" class="form-control trg_tsk_review" type="select" data-msg="Please Select Reviewer">
                                        <option>Please Select Reviewer</option>
                                        <option option="0">Ankush</option>
                                        <option option="1">Pooja</option>
                                        <option option="2">Stanley</option>
                                        <option option="3">Pranali</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Task Status</label>
                                    <div class="input-icon">
                                      <i class="fas fa-info-circle list-level"></i>
                                        <select name="trg_tsk_status" id="trg_tsk_status" class="form-control trg_tsk_status" type="select" data-msg="Please Select Task Status">
                                        <option>Please Select Task Status</option>
                                        <option option="0">Pending</option>
                                        <option option="1">Review</option>
                                        <option option="2">On Hold</option>
                                        <option option="3">Completed</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Task Type</label>
                                    <div class="input-icon">
                                      <i class="fas fa-clipboard list-level"></i>
                                        <select name="trg_tsk_type" id="trg_tsk_type" class="form-control trg_tsk_type" type="select" data-msg="Please Select Task Type">
                                        <option>Please Select Task Type</option>
                                        <option option="0">Support</option>
                                        <option option="1">Internal</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Task Priority</label>
                                    <div class="input-icon">
                                      <i class=" fas fa-flag list-level"></i>
                                        <select name="trg_tsk_priority" id="trg_tsk_priority" class="form-control trg_tsk_priority" type="select" data-msg="Please Select Task Priority">
                                        <option>Please Select Task Priority</option>
                                        <option option="0">Low</option>
                                        <option option="1">Medium</option>
                                        <option option="2">High</option>
                                        <option option="3">Critical</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <span class="sub-list-title">Related</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">People</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user list-level"></i>
                                        <select name="trg_tsk_related_people" id="trg_tsk_related_people" class="form-control trg_tsk_related_people" type="select" data-msg="Please Select People">
                                        <option>Please Select People</option>
                                        <option option="0">Ankush</option>
                                        <option option="1">Pooja</option>
                                        <option option="2">Stanley</option>
                                        <option option="3">Pranali</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead</label>
                                    <div class="input-icon">
                                      <i class="fas fa-user-tie list-level"></i>
                                        <select name="trg_tsk_related_lead" id="trg_tsk_related_lead" class="form-control trg_tsk_related_lead" type="select" data-msg="Please Select Lead">
                                        <option>Please Select Lead</option>
                                        <option option="0">Ankush</option>
                                        <option option="1">Pooja</option>
                                        <option option="2">Stanley</option>
                                        <option option="3">Pranali</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Account</label>
                                    <div class="input-icon">
                                      <i class="fa fa-industry icon-company list-level"></i>
                                        <select name="trg_tsk_related_acc" id="trg_tsk_related_acc" class="form-control trg_tsk_related_acc" type="select" data-msg="Please Select Account">
                                        <option>Please Select Account</option>
                                        <option option="0">High Tower</option>
                                        <option option="1">Robo Toys</option>
                                        <option option="2">Raj Solar Panel</option>
                                        <option option="3">CPR</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="input-label-text">Date Filter</label>
                                    <div class="md-checkbox-inline">
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="tsk_created_on" class="md-check">
                                            <label for="tsk_created_on">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Created On </label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="tsk_due_date" class="md-check">
                                            <label for="tsk_due_date">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Due Date </label>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane mb-40" id="target_tab_5">
                            <div class="col-md-push-2 col-md-8">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>All the value fields will be muilt select fields</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Billing Company</label>
                                    <div class="input-icon">
                                      <i class="fas fa-industry list-level"></i>
                                        <select name="trg_quo_billing_cmp" id="trg_quo_billing_cmp" class="form-control trg_quo_billing_cmp" type="select" data-msg="Please Select Billing Company">
                                        <option>Please Select Billing Company</option>
                                        <option option="0">Harissons Bags</option>
                                        <option option="1">Dhruv Enterprises</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Currency</label>
                                    <div class="input-icon">
                                      <i class="far fa-money-bill-alt icon-lead list-level"></i>
                                        <select name="trg_quo_currency" id="trg_quo_currency" class="form-control trg_quo_currency" type="select" data-msg="Please Select Currency">
                                        <option>Please Select Currency</option>
                                        <option option="0">Harissons Bags</option>
                                        <option option="1">Dhruv Enterprises</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Shipping</label>
                                    <div class="input-icon">
                                      <i class="fab fa-telegram-plane icon-leads list-level"></i>
                                        <select name="trg_quo_shipping" id="trg_quo_shipping" class="form-control trg_quo_shipping" type="select" data-msg="Please Select Shipping">
                                        <option>Please Select Shipping</option>
                                        <option option="0">Amazon</option>
                                        <option option="1">Blue Dart</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Quotation Lead</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user list-level"></i>
                                        <select name="trg_quo_lead" id="trg_quo_lead" class="form-control trg_quo_lead" type="select" data-msg="Please Select Quotation Lead">
                                        <option>Please Select Quotation Lead</option>
                                        <option option="0">Vinay Pagare</option>
                                        <option option="1">Darsh Mheta</option>
                                        <option option="2">Rajan Parekh</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>


                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Account</label>
                                    <div class="input-icon">
                                      <i class="fas fa-user-tie icon-lead list-level"></i>
                                        <select name="trg_quo_acc" id="trg_quo_acc" class="form-control trg_quo_acc" type="select" data-msg="Please Select Account">
                                        <option>Please Select Account</option>
                                        <option option="0">Harissons Bags</option>
                                        <option option="1">Dhruv Enterprises</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="input-label-text">Date Filter</label>
                                    <div class="md-checkbox-inline">
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="quo_created_on" class="md-check">
                                            <label for="quo_created_on">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Created On </label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="quo_date" class="md-check">
                                            <label for="quo_date">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Quotation Date</label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="quo_app_date" class="md-check">
                                            <label for="quo_app_date">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Approval Date</label>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="tab-pane mb-40" id="target_tab_6">
                            <div class="col-md-push-2 col-md-8">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>All the value fields will be muilt select fields</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Billing Company</label>
                                    <div class="input-icon">
                                      <i class="fas fa-industry list-level"></i>
                                        <select name="trg_inv_billing_cmp" id="trg_inv_billing_cmp" class="form-control trg_inv_billing_cmp" type="select" data-msg="Please Select Billing Company">
                                        <option>Please Select Billing Company</option>
                                        <option option="0">Harissons Bags</option>
                                        <option option="1">Dhruv Enterprises</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Currency</label>
                                    <div class="input-icon">
                                      <i class="far fa-money-bill-alt icon-lead list-level"></i>
                                        <select name="trg_inv_currency" id="trg_inv_currency" class="form-control trg_inv_currency" type="select" data-msg="Please Select Currency">
                                        <option>Please Select Currency</option>
                                        <option option="0">Harissons Bags</option>
                                        <option option="1">Dhruv Enterprises</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Shipping</label>
                                    <div class="input-icon">
                                      <i class="fab fa-telegram-plane icon-leads list-level"></i>
                                        <select name="trg_inv_shipping" id="trg_inv_shipping" class="form-control trg_inv_shipping" type="select" data-msg="Please Select Shipping">
                                        <option>Please Select Shipping</option>
                                        <option option="0">Amazon</option>
                                        <option option="1">Blue Dart</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Account</label>
                                    <div class="input-icon">
                                      <i class="fas fa-user-tie icon-lead list-level"></i>
                                        <select name="trg_inv_acc" id="trg_inv_acc" class="form-control trg_inv_acc" type="select" data-msg="Please Select Account">
                                        <option>Please Select Account</option>
                                        <option option="0">Harissons Bags</option>
                                        <option option="1">Dhruv Enterprises</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                

                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="input-label-text">Date Filter</label>
                                    <div class="md-checkbox-inline">
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="inv_created_on" class="md-check">
                                            <label for="inv_created_on">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Created On </label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="inv_date" class="md-check">
                                            <label for="inv_date">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Invoice Date</label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="inv_due_date" class="md-check">
                                            <label for="inv_due_date">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Due Date</label>
                                        </div>
                                        <!-- <div class="md-checkbox">
                                            <input type="checkbox" id="inv_approval_date" class="md-check">
                                            <label for="inv_approval_date">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Approval Date</label>
                                        </div> -->
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="tab-pane mb-40" id="target_tab_7">
                            <div class="col-md-push-2 col-md-8">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>All the value fields will be muilt select fields</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Account</label>
                                    <div class="input-icon">
                                      <i class="fas fa-user-tie icon-lead list-level"></i>
                                        <select name="trg_pay_acc" id="trg_pay_acc" class="form-control trg_pay_acc" type="select" data-msg="Please Select Account">
                                        <option>Please Select Account</option>
                                        <option option="0">Harissons Bags</option>
                                        <option option="1">Dhruv Enterprises</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Payment By</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user icon-people list-level"></i>
                                        <select name="trg_pay_by" id="trg_pay_by" class="form-control trg_pay_by" type="select" data-msg="Please Select Payment By">
                                        <option>Please Select Payment By</option>
                                        <option option="0">Vinay Pagare</option>
                                        <option option="1">Darsh Mheta</option>
                                        <option option="2">Rajan Parekh</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Received By</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user icon-people list-level"></i>
                                        <select name="trg_pay_rec_by" id="trg_pay_rec_by" class="form-control trg_pay_rec_by" type="select" data-msg="Please Select Received By">
                                        <option>Please Select Received By</option>
                                        <option option="0">Vinay Pagare</option>
                                        <option option="1">Darsh Mheta</option>
                                        <option option="2">Rajan Parekh</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Payment Mode</label>
                                    <div class="input-icon">
                                      <i class="fas fa-file-invoice-dollar color-dark-blue list-level"></i>
                                        <select name="trg_pay_mode" id="trg_pay_mode" class="form-control trg_pay_mode" type="select" data-msg="Please Select Payment Mode">
                                        <option>Please Select Payment Mode</option>
                                        <option option="0">Cash</option>
                                        <option option="1">Cheque</option>
                                        <option option="2">UTR No</option>
                                        <option option="3">Online Banking</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="input-label-text">Date Filter</label>
                                    <div class="md-checkbox-inline">
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="pymt_created_on" class="md-check">
                                            <label for="pymt_created_on">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Created On </label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="pymt_date" class="md-check">
                                            <label for="pymt_date">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Payment Date</label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="pymt_cheque_date" class="md-check">
                                            <label for="pymt_cheque_date">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Cheque Date</label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="pymt_due_date" class="md-check">
                                            <label for="pymt_due_date">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Due Date</label>
                                        </div>
                                        
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                           <div class="tab-pane mb-40" id="target_tab_8">
                            <div class="col-md-push-2 col-md-8">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>All the value fields will be muilt select fields</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Host People</label>
                                    <div class="input-icon">
                                      <i class="fas fa-chalkboard-teacher icon-lead list-level"></i>
                                        <select name="trg_meeting_host" id="trg_meeting_host" class="form-control trg_meeting_host" type="select" data-msg="Please Select Host People">
                                        <option>Please Select Host People</option>
                                        <option option="0">Ankush</option>
                                        <option option="1">Pooja</option>
                                        <option option="2">Stanley</option>
                                        <option option="3">Pranali</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Meeting With</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user list-level"></i>
                                        <select name="trg_meeting_with" id="trg_meeting_with" class="form-control trg_meeting_with" type="select" data-msg="Please Select Meeting With">
                                        <option>Please Select Meeting With</option>
                                        <option option="0">Ankush</option>
                                        <option option="1">Pooja</option>
                                        <option option="2">Stanley</option>
                                        <option option="3">Pranali</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Meeting Status</label>
                                    <div class="input-icon">
                                      <i class="fas fa-info-circle list-level"></i>
                                        <select name="trg_meeting_status" id="trg_meeting_status" class="form-control trg_meeting_status" type="select" data-msg="Please Select Meeting Status">
                                        <option>Please Select Meeting Status</option>
                                        <option option="0">Yes</option>
                                        <option option="1">No</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <span class="sub-list-title">Related</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">People</label>
                                    <div class="input-icon">
                                      <i class="fa fa-user list-level"></i>
                                        <select name="trg_tsk_related_people" id="trg_tsk_related_people" class="form-control trg_tsk_related_people" type="select" data-msg="Please Select People">
                                        <option>Please Select People</option>
                                        <option option="0">Ankush</option>
                                        <option option="1">Pooja</option>
                                        <option option="2">Stanley</option>
                                        <option option="3">Pranali</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Lead</label>
                                    <div class="input-icon">
                                      <i class="fas fa-user-tie list-level"></i>
                                        <select name="trg_tsk_related_lead" id="trg_tsk_related_lead" class="form-control trg_tsk_related_lead" type="select" data-msg="Please Select Lead">
                                        <option>Please Select Lead</option>
                                        <option option="0">Ankush</option>
                                        <option option="1">Pooja</option>
                                        <option option="2">Stanley</option>
                                        <option option="3">Pranali</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Task</label>
                                    <div class="input-icon">
                                      <i class="fas fa-clipboard list-level"></i>
                                        <select name="trg_meeting_tsk" id="trg_meeting_tsk" class="form-control trg_meeting_tsk" type="select" data-msg="Please Select Task">
                                        <option>Please Select Task</option>
                                        <option option="0">Support</option>
                                        <option option="1">Internal</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group form-md-line-input form-md-floating-label">  
                                    <label class="drp-title">Account</label>
                                    <div class="input-icon">
                                      <i class="fa fa-industry icon-company list-level"></i>
                                        <select name="trg_tsk_related_acc" id="trg_tsk_related_acc" class="form-control trg_tsk_related_acc" type="select" data-msg="Please Select Account">
                                        <option>Please Select Account</option>
                                        <option option="0">High Tower</option>
                                        <option option="1">Robo Toys</option>
                                        <option option="2">Raj Solar Panel</option>
                                        <option option="3">CPR</option>
                                        <option class="blank_option"></option>
                                      </select>
                                    </div>
                                    <div class="help-block"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="input-label-text">Date Filter</label>
                                      <div class="md-checkbox-inline">
                                          <div class="md-checkbox">
                                              <input type="checkbox" id="meeting_start_date" class="md-check">
                                              <label for="meeting_start_date">
                                                  <span></span>
                                                  <span class="check"></span>
                                                  <span class="box"></span> Meeting Start Date </label>
                                          </div>
                                          <div class="md-checkbox">
                                              <input type="checkbox" id="meeting_end_date" class="md-check">
                                              <label for="meeting_end_date">
                                                  <span></span>
                                                  <span class="check"></span>
                                                  <span class="box"></span> Meeting Start End </label>
                                          </div>
                                          <div class="md-checkbox">
                                              <input type="checkbox" id="meeting_created_on" class="md-check">
                                              <label for="meeting_created_on">
                                                  <span></span>
                                                  <span class="check"></span>
                                                  <span class="box"></span>Created On </label>
                                          </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>

                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_ADD)); ?> 
                </form>



              </div>
            </div>
          </div>
          <div class="js-scripts">
            <?php $this->load->view('common/footer_scripts'); ?>
          <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script type="text/javascript" src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
          <script type="text/javascript" src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
          <script type="text/javascript" src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
          <script type="text/javascript" src="<?php echo base_url(); ?>assets/project/global/scripts/app.min.js"></script>
            <script type="text/javascript">
              $("#trg_start_date").datepicker({ 
                   rtl: App.isRTL(),
                    orientation: "auto bottom",
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                  }).on('changeDate', function(ev) {
                    console.log('in here');
                  $(this).valid();  // triggers the validation test
                    $(this).addClass('edited');
                  // '$(this)' refers to '$("#datepicker")'
              });

              $("#trg_end_date").datepicker({ 
                   rtl: App.isRTL(),
                    orientation: "auto bottom",
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                  }).on('changeDate', function(ev) {
                    console.log('in here');
                  $(this).valid();  // triggers the validation test
                    $(this).addClass('edited');
                  // '$(this)' refers to '$("#datepicker")'
              });

                  $('#my_multi_select1').multiSelect()
            </script>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
