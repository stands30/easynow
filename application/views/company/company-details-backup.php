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
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?>
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url(); ?>assets/module/people/css/people-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/css/dataTables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/css/buttons.bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/select2/css/select2-bootstrap.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/project/css/sidebar.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />

    <style type="text/css">
      
    </style>
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
        <div class="page-content page-content-detail">
          <!-- BEGIN PAGE HEADER-->
          <!-- BEGIN PAGE BAR -->
          <div class="page-bar" id="breadcrumbs-list">
            <?php echo $breadcrumb; ?>
            <div class="breadcrumb-button">
                <a href="<?php echo base_url('company-details-'.$companydata->prev_encrypt) ?>" class=" previous" title="">
                    <button id="newlead" class="btn green">
                        <i class="fa fa-arrow-left"></i>
                        <!-- Previous  -->
                    </button>
                </a>
                <a href="<?php echo base_url('company-details-'.$companydata->next_encrypt) ?>" class="next">
                    <button id="newlead" class="btn green">
                        <!-- Next --><i class="fa fa-arrow-right"></i>
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
                <?php
                $cmpData['cmp_id'] = $companydata->cmp_id;
                $cmpencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_id);
                $this->load->view('company/company_sidebar',$cmpData);
                ?>

                <input id="cmp_id" type="hidden" name="cmp_id" value="<?php echo $companydata->cmp_id; ?>" />

                <aside class="profile-info col-lg-10 detail-view-list">
                  <section class="panel">
                    <!-- <label>make drop down editable for state,Industry,Company Type,Annual Revenue,Managed By</label> -->
                    <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                      <div class="text-center invoice-btn col-lg-offset-10">
                      </div>

                      <header class="panel-heading color-primary panelHeading people-details-list">
                        <div class="detail-box people-row">
                          <!-- <div class="col-md-8 col-sm-8 col-xs-12"> -->
                          <div class="title-details">
                            <div class="title-list">
                               <span class="panel-title"><?php echo  $companydata->cmp_name; ?></span>&nbsp;&nbsp;
                            </div>
                            <div class="title-list-action">      
                              <?php
                                if(!property_exists($companydata, 'private_access') || (property_exists($companydata, 'private_access') && $companydata->private_access == 1)) 
                                { 
                                  if($edit_access) { ?>                                                
                                  <a class="btn btn-edit" href="<?php echo base_url('company-edit-'.$cmpencryptedId); ?>" data-toggle="tooltip"  data-original-title="Edit">
                                  <i class="fa fa-edit"></i><span class="btn-text"> Edit</span></a>
                                <?php }?>
                                <?php if($delete_access) { ?> 
                                   <a class="btn btn-edit " onclick="deleteCompany('<?php echo $cmpencryptedId; ?>')" data-toggle="tooltip" data-original-title="Delete">
                                  <i class="fa fa-trash"> </i> <span class="btn-text"> Delete</span></a>
                                <?php }
                                }
                              ?>
                            </div>
                          </div>
                           <div class="profile-details">
                             <!-- <div class="col-md-4 col-xs-5 main-people-detail">  -->                                       
                           </div>
                          <div class="created-details">
                                <span class="created">Created By: <?php echo $companydata->cmp_crdt_by; ?></span><br>
                                <span class="sp-date">Created On:  <?php echo display_date($companydata->cmp_crdt_dt); ?></span>
                          </div>
                        </div>
                       </header>

                      <div class="">
                        <table class="table table-detail-custom table-style">
                           <tbody>
                            <!-- <tr>
                               <td rowspan="2">
                                <img height="130" width="130" src="
                                <?php
                                  if(isset($companydata->cmp_logo) && $companydata->cmp_logo != '')
                                    echo base_url().'assets/module/company/img/'.$companydata->cmp_logo;
                                  else
                                    echo base_url().'assets/project/images/nologo.png';
                                  ?>" />
                              </td> 
                            </tr> -->
                            <tr>
                              <td><i class="fas fa-globe"></i> Website</td>
                              <td>
                                <?php 
                                  if(isset($companydata->cmp_website)) 
                                  {
                                    $website = sanitizeURL($companydata->cmp_website);
                                    echo '<a href="http://'.$website->url.'" target="_blank">'.$website->text.'</a></td>'; 
                                  }
                                ?>
                              </td>
                              <!-- <td><i class="fas fa-map-marker-alt"></i> State</td>
                              <td>
                                <a href="javascript:;" id="cmp_stm_id" class="cmp_stm_id company-state-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select State" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $companydata->cmp_stm_id; ?>" data-custom_select2_name="<?php echo $companydata->cmp_stm_name; ?>"  data-gnp-grp="cmp_stm_id"><?php if(isset($companydata->cmp_stm_name)) echo $companydata->cmp_stm_name; ?> </a>
                              </td> -->
                              <td><i class="fas fa-map-marker-alt"></i> State</td>
                              <td><?php if(isset($companydata->cmp_stm_name)) echo '<a href="company-list-'.$this->nextasy_url_encrypt->encrypt_openssl(COMPANY_FILTER_STATE).'-'.$this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_stm_id).'" target="_blank">'.$companydata->cmp_stm_name.'</a></td>'; ?></td>
                            </tr>
                            <tr>
                              <td><i class="fas fa-industry"></i> Industry</td>

                              <td><?php if(isset($companydata->cmp_industry)) echo '<a href="company-list-'.$this->nextasy_url_encrypt->encrypt_openssl(COMPANY_FILTER_INDUSTRY).'-'.$this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_industry).'" target="_blank">'.$companydata->cmp_industry_name.'</a></td>'; ?></td>
                              <!-- <td>
                                <a href="javascript:;" id="cmp_industry" class="cmp_industry company-industry-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Industry" data-original-title="Select Industry" data-custom_select2_id="<?php echo $companydata->cmp_industry; ?>" data-custom_select2_name="<?php echo $companydata->cmp_industry_name; ?>"  data-gnp-grp="cmp_industry"><?php if(isset($companydata->cmp_industry)) echo $companydata->cmp_industry_name; ?> </a>
                                  
                                </td> -->
                              <td><i class="fas fa-industry"></i> Company Type</td>
                              
                              <td><?php if(isset($companydata->cmp_type_name)) echo '<a href="company-list-'.$this->nextasy_url_encrypt->encrypt_openssl(COMPANY_FILTER_TYPE).'-'.$this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_type).'" target="_blank">'.$companydata->cmp_type_name.'</a></td>'; ?></td>
                            </tr>
                            <tr>
                              
                              <td><i class="fas fa-rupee-sign"></i> Annual revenue</td>
                              <td><?php if(isset($companydata->cmp_anl_rev)) echo '<a href="company-list-'.$this->nextasy_url_encrypt->encrypt_openssl(COMPANY_FILTER_REVENUE).'-'.$this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_anl_rev).'" target="_blank">'.$companydata->cmp_anl_rev_name.'</a></td>'; ?></td>
                              <!-- <td>
                                <a href="javascript:;" id="cmp_anl_rev" class="cmp_anl_rev company-revenue-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Revenue" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $companydata->cmp_anl_rev; ?>" data-custom_select2_name="<?php echo $companydata->cmp_anl_rev_name; ?>"  data-gnp-grp="cmp_anl_rev"><?php if(isset($companydata->cmp_anl_rev)) echo $companydata->cmp_anl_rev_name; ?> </a>
                              </td> -->
                               <td><i class="fas fa-user"></i> No. Of Employees</td>
                              <td><?php if(isset($companydata->cmp_employee)) echo $companydata->cmp_employee; ?></td>
                            </tr>
                            <tr>
                              <td><i class="fas fa-id-card"></i> GST No</td>
                              <td ><?php if(isset($companydata->cmp_gst_no)) echo $companydata->cmp_gst_no; ?></td>
                              <td><i class="fas fa-address-card"></i> Pan No</td>
                              <td><?php if(isset($companydata->cmp_pan)) echo $companydata->cmp_pan; ?></td>
                              
                            </tr>
                            <tr>
                              <td><i class="fas fa-user"></i> Managed By</td>
                              <td>
                                <a href="javascript:;" id="cmp_managed_by" class="cmp_managed_by company-managedby-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Reporting To" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $companydata->cmp_managed_by; ?>" data-custom_select2_name="<?php echo $companydata->cmp_managed_by_name; ?>"  data-gnp-grp="cmp_managed_by"><?php if(isset($companydata->cmp_managed_by_name)) echo $companydata->cmp_managed_by_name; ?> </a>
                              </td>
                              <td><i class="fas fa-user"></i> Type</td>
                              <td>

                                <a href="javascript:;" id="cmp_type_id" class="cmp_type_id company-company-type-editable" data-type="select2" data-pk="1" data-placement="top" data-placeholder="Please Select Reporting To" data-original-title="Select Reporting To" data-custom_select2_id="<?php echo $companydata->cmp_type_id; ?>" data-custom_select2_name="<?php echo $companydata->cmp_type_id_name; ?>"  data-gnp-grp="cmp_type_id"><?php if(isset($companydata->cmp_type_id_name)) echo $companydata->cmp_type_id_name; ?> </a>
                              </td>
                              
                            </tr>
                            
                            <tr>
                              <td><i class="fas fa-map-marker-alt"></i> Address</td>
                              <td colspan="3"><?php if(isset($companydata->cmp_address)) echo $companydata->cmp_address; ?></td>
                            </tr>
                            <tr>
                              
                             
                              <td><i class="fas fa-image"></i> Logo</td>
                              <td colspan="3">  
                                <div class="gly-image col-md-4" style="">
                                  <div class="cbp-caption-defaultWrap ">

                                    <?php 
                                      if($companydata->cmp_logo)
                                        $imagefullPath = base_url().COMPANY_LOGO.$companydata->cmp_logo; 
                                      else
                                        $imagefullPath = base_url().COMPANY_LOGO.'no-image.jpg'; 
                                    ?>

                                      <img src="<?php echo $imagefullPath; ?>" class="img-responsive"  style="max-width: 100%;max-width: 100%;" alt=""> 
                                  </div>
                                  <div class="del-overlay">
                                        <div class="col-xs-12 ">
                                          <div class=" icon-overlay">
                                              
                                          <a class="btn del-icon text-center delete-image" data-image_name="<?php echo $companydata->cmp_logo; ?>" data-image_id="<?php echo $companydata->cmp_id; ?>"><i class="fa fa-trash"></i></a>
                                          </div>
                                        </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            
                            <tr>
                              <td><i class="fas fa-tags"></i> Tags</td>
                              <td colspan="3"><?php if(isset($companydata->cmp_tgs_id)) echo getTags($companydata->cmp_tgs_id,'company'); ?></td>
                              
                            </tr>
                            
                           <tr>
                             <td><i class="far fa-credit-card"></i> Payment Terms</td>
                              <td colspan="3"><?php if(isset($companydata->cmp_payment_terms)) echo $companydata->cmp_payment_terms; ?></td>
                           </tr>
                            <tr>
                              <td><i class="far fa-credit-card"></i> Remarks</td>
                              <td colspan="3"><?php if(isset($companydata->cmp_remark)) echo $companydata->cmp_remark; ?></td>
                            </tr>
                            <tr>
                              <td><i class="fas fa-share-alt"></i> Social Media</td>
                              <td colspan="3">
                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_facebook) && $companydata->cmp_facebook == '') echo 'social-disabled'; ?>" href="<?php  if(isset($companydata->cmp_facebook)) echo $companydata->cmp_facebook ?>" data-toggle="tooltip"  data-original-title="Facebook" target="_blank">
                                  <img class="fa-whatsapp-img-title social-logo " src="<?php echo base_url(); ?>assets/project/images/facebook.png" style="    width: 30px!important;" />
                                  <span class="btn-text"></span>
                                </a>
                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_instagram)  && $companydata->cmp_instagram == '') echo 'social-disabled'; ?>" href="<?php  if(isset($companydata->cmp_instagram)) echo $companydata->cmp_instagram ?>" data-toggle="tooltip"  data-original-title="Instagram" target="_blank">
                                  <img class="fa-whatsapp-img-title social-logo social-small-logo"  src="<?php echo base_url(); ?>assets/project/images/instagram.png" />
                                  <span class="btn-text"></span>
                                </a>
                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_linkedin)  && $companydata->cmp_linkedin == '') echo 'social-disabled'; ?>" href="<?php if(isset($companydata->cmp_linkedin)) echo $companydata->cmp_linkedin; ?>" data-toggle="tooltip"  data-original-title="LinkedIn" target="_blank"> 
                                  <img class="fa-whatsapp-img-title social-logo" style="width: 15px;" src="<?php echo base_url(); ?>assets/project/images/linkedin.png" />
                                  <span class="btn-text"></span>
                                </a>
                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_twitter)  && $companydata->cmp_twitter == '') echo 'social-disabled'; ?>" href="<?php if(isset($companydata->cmp_twitter)) echo $companydata->cmp_twitter; ?>" data-toggle="tooltip"  data-original-title="Twitter" target="_blank">
                                  <img class="fa-whatsapp-img-title social-logo social-small-logo"  src="<?php echo base_url(); ?>assets/project/images/twitter.png" />
                                  <span class="btn-text"></span>
                                </a>
                                <a class=" table-div-btn btn-profile social-profile <?php if(isset($companydata->cmp_youtube)  && $companydata->cmp_youtube == '') echo 'social-disabled'; ?>" href="<?php if(isset($companydata->cmp_youtube)) echo $companydata->cmp_youtube; ?>" data-toggle="tooltip"  data-original-title="Youtube" target="_blank">
                                  <img class="fa-whatsapp-img-title social-logo social-ex-smal-logo"  src="<?php echo base_url(); ?>assets/project/images/youtube.png" />
                                  <span class="btn-text"></span>
                                </a>
                              </td>
                            </tr>
                            
                           </tbody>
                        </table>
                     </div>
                    </div>
                  </section>
                </aside>
                <!-- MAIN CONTENTS END HERE -->
              </div>
            </div>
          </div>
          <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
      </div>

      <!-- Add Event people add -->


      <!-- Add Event people edit -->

      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/bootstrap/js/dataTables.bootstrap.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/buttons/js/buttons.bootstrap.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/pages/scripts/table-datatables-responsive.min.js<?php echo global_asset_version(); ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/project/global/plugins/select2/js/select2.full.min.js<?php echo $global_asset_version; ?>" type="text/javascript">
      </script>

      <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js<?php echo $global_asset_version  ; ?>" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/module/common.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        

      </div>
        <script type="text/javascript">

      $(document).ready(function()
      {
        var primary_key     = 'cmp_id';
        var updateUrl       = baseUrl + 'company/updateCompanyCustomData';
        
        var editableElement = '.company-managedby-editable';
        var select2Class    = 'company_managedby_select2';
        var dropdownUrl     = 'company/getEmployeeforDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
        
        var editableElement = '.company-state-editable';
        var select2Class    = 'company_state_select2';
        var dropdownUrl     = 'company/getStateDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
        
        var editableElement = '.company-industry-editable';
        var select2Class    = 'company_industry_select2';
        var dropdownUrl     = 'company/getIndustryDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
        
        var editableElement = '.company-revenue-editable';
        var select2Class    = 'company_revenue_select2';
        var dropdownUrl     = 'company/getCompanyAnnualDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
        
        var editableElement = '.company-type-editable';
        var select2Class    = 'company_type_select2';
        var dropdownUrl     = 'company/getCompanyTypeDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);
        
        var editableElement = '.company-company-type-editable';
        var select2Class    = 'company_cmp_type_select2';
        var dropdownUrl     = 'company/getCmpTypeDropdown/';
        newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl);

        getcmpList();
      })

      function getcmpList()
      {
        cmpDataTable = $('#company_people_tbl').DataTable({
          'ajax'      : baseUrl + 'company-people-list-<?php echo $this->nextasy_url_encrypt->encrypt_openssl($companydata->cmp_id); ?>',
          'columns'   : [
            {   'data'  : 'cpl_ppl_name' ,
              'render': function(data, type, row, meta)
              {

                var link = row.cpl_ppl_name;

                if(row.private_access == 0)
                  return link;

                <?php if($detail_access) { ?>
                    link =`<a href="`+baseUrl+`people-details-`+row.cpl_ppl_id_encrypt+`"> `+data+`</a>
                    `;
                <?php }?>
              return link;
              }
            },
            {   'data'  : 'cpl_ppl_email' },
            {   'data'  : 'cpl_ppl_mobile' },
            {   'data'  : 'cpl_designation' },
            {   'data'  : 'cpl_met_on' },
            {   'data'  : 'led_id' ,
              'render': function(data, type, row, meta)
              {
                // <a onclick="return deleteUser('`+row.cpl_ppl_id+`')">
                //  <i  class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>

                var link = ``;

                if(row.private_access == 0)
                  return "<?php echo FORM_INACCESS_MESSAGE; ?>";

                <?php if($edit_access) { ?>
                  link += `
                    <a href="`+baseUrl+`company-people-edit-`+row.cpl_id_encrypt+`-`+row.cpl_cmp_id_encrypt+`" title="View Detail">
                    <i  class="fa fa-edit" aria-hidden="true" title="Edit Company"></i></a>`;

                <?php }?>

                return link;
              }
            }
          ]
        });
      }

    </script>

    <script type="text/javascript">

      function deleteUser(evt_id)
      {
        var type = '2';
        swal({
           title:"Delete",
           text:"Are you sure",
           type: "error",
           icon:"error",
           button: true,
        }).then(()=>{
        $.ajax({
          type: "POST",
          url: "Event/deleteEvent",
          data:{evt_id:evt_id,type:type},
          dataType:"json",
          success:function(response)
          {
            location.reload();
          }
          });
        });
      }

	    $('.delete-image').click(function()
      {
        var cmp_logo  = $(this).data('image_name');
        var cmp_id = $(this).data('image_id');
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Logo",
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
              cmp_logo:cmp_logo,
              cmp_id:cmp_id
            },
            console.log(data);
            $.ajax({
                  type:"POST",
                  dataType:"JSON",
                  data:data,
                  url:baseUrl+'company/deleteCompLogo',
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
                          })
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
              swal("Cancelled", "Logo is safe :)", "error");
            }
          });
        });

        function deleteCompany(cmp_id)
        {
          cswal({
            text : 'Do you want to delete this Company?', 
            title   : 'Done', 
            type    : 'delete', 
            onyes : function(){
              $.ajax({
                type: "POST",
                url: baseUrl + "company/company_delete/"+cmp_id,
                success: function(response) {
                  response = JSON.parse(response);
                  if(response.success == true) {
                    swal({
                      title: "Done",
                      text: response.message,
                      type: "success",
                      icon: "success",
                      button: true,
                    })
                  } else {
                    swal({
                      title: "Opps",
                      text: "Something Went wrong",
                      type: "error",
                      icon: "error",
                      button: true,
                    });
                  }
                  location.href = response.linkn;
                }
              });
            }
          });
        }
        </script>
      </body>
    </html>
