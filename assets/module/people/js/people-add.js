var peopleTypeF1Key, peopleTypeCompany, peopleTypeLead, peopleTypeCandidate, peopleTypeEvent, peopleTypeVendor, peopleTypeClient, peopleTypeTeam;
var select2url = baseUrl + 'people/getGenPrmforDropdown/';

// ******** People Company Type **********//
peopleTypeF1Key = $('#peopleTypeF1Key').val();
peopleTypeCompany = $('#peopleTypeConstants').data('company');
peopleTypeLead = $('#peopleTypeConstants').data('lead');
peopleTypeCandidate = $('#peopleTypeConstants').data('candidate');
peopleTypeEvent = $('#peopleTypeConstants').data('event');
peopleTypeVendor = $('#peopleTypeConstants').data('vendor');
peopleTypeClient = $('#peopleTypeConstants').data('client');
peopleTypeTeam = $('#peopleTypeConstants').data('team');
peopleTypeAdditional = $('#peopleTypeConstants').data('additional');
// ******** People Company Type **********//
$(document).ready(function()
{
  var select2PeopleUrl = baseUrl + 'people/getPeopleforDropdown/';
  $('#led_temp, #led_lead_status,#led_src,#led_type').getDefaultvalue();

  $('.date-picker').datepicker({
    autoClose: true,
  }).on('changeDate', function(e) {
    $(this).addClass('edited');
    $(this).datepicker("hide");
  });

  for(var i = 0; i < $('.add_det_select').length; i++) {
    setSelectOption('#' + $('.add_det_select')[i].id);
  }

  $("#ppl_dob").datepicker({
    dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeYear: true,
    yearRange: '-100y:c+nn',
    maxDate: '-1d'
  });
  $("#ppl_met_on").datepicker({
    dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeYear: true,

  });

  $('.ppl_managed_by').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: select2PeopleUrl + 'manage',
      dataType: 'json',
    }
  });
  $('#led_prod').on('change', function() {

    var prd_id = $(this).val();
    if(prd_id) {
      $.ajax({
        type: "POST",
        url: baseUrl + "people/getProductTotalAmt",
        data: {
          'data': prd_id
        },
        success: function(response) {
          $('#led_amount').val($.trim(response)).addClass('edited');
        }
      })
    } else
      $('#led_amount').val('0').addClass('edited');
  })
  $('.people-title').select2({

    placeholder: "Please Select Title",
    ajax: {
      url: select2url + 'ppl_title',
      dataType: 'json',
    }
  });
  $('.tags-select2').select2({
    allowClear: false,
    tags: true,
    width: 'resolve',
    /* placeholder: "Enter Tags",*/
    multiple: true,
    tokenSeparators: [';', '', ','],
    ajax: {
      url: baseUrl + 'people/getTagsforDropdown',
      dataType: 'json',
    }
  });


  $('.cmp_state').select2({
    width: 'resolve',
    /* placeholder: "Select State ",*/
    ajax: {
      url: baseUrl + 'people/getStateDropdown',
      dataType: 'json',
    }
  })

  $('.cpl_designation').select2({
    width: 'resolve',
    /* placeholder: "Select State ",*/
    ajax: {
      url: baseUrl + 'people/getDesignationDropdown',
      dataType: 'json',
    }
  }).on('change', function(){
    var data = $(this).select2('data');
    $('#emp_designation').val(data[0].text).addClass('edited');
  })

  // ******** Company Module ********//
  if(peopleTypeF1Key.indexOf(peopleTypeCompany) != -1) {
    var $companySelect2 = $('.company-select2');
    $companySelect2.select2({
      tags: true,
      tokenSeparators: [';', '', ','],
      width: 'resolve',
      maximumSelectionSize: 1,
      maximumSelectionLength: 1,
      multiple: true,
      /*      placeholder: "Please Select Company *",
       */
      ajax: {
        url: baseUrl + 'people/getCompanyforDropdown',
        dataType: 'json',
      }
    })
  }

  // ******** Company Module ********//
  // ******** Lead Module ********//
  if(peopleTypeF1Key.indexOf(peopleTypeLead) != -1) {


    $('.led_src').select2({
      /* placeholder: "Please Select Source *",*/
      ajax: {
        url: select2url + 'led_src',
        dataType: 'json',
      }
    });
    $('.led_temp').select2({
      /* placeholder: "Please Select Temp",*/
      ajax: {
        url: select2url + 'led_temp',
        dataType: 'json',
      }
    });
    $('.led_lead_status').select2({
      /* placeholder: "Please Select Status *",*/
      ajax: {
        url: select2url + 'led_lead_status',
        dataType: 'json',
      }
    });

    $('.led_lead_stage').select2({
      //placeholder:"Please Select Stage *",
      ajax: {
        url: function() {
          var led_pipeline = $('#led_pipeline').val();
          return baseUrl + 'lead/getLeadStageDropdown/' + led_pipeline;
        },
        dataType: 'json',
      }
    });
    $('.led_ref_by').select2({
      /* placeholder: "Please Select Reference By",*/
      ajax: {
        url: select2PeopleUrl + 'led_ref_by',
        dataType: 'json',
      }
    });
    $('.led_managed_by').select2({
      /*placeholder: "Please Select Managed By *",*/
      ajax: {
        url: select2PeopleUrl + 'manage',
        dataType: 'json',
      }
    });
    $('.led-product').select2({
      multiple: true,
      /*placeholder: "Please Select Product *",*/
      ajax: {
        url: baseUrl + 'people/getProductForDropdown',
        dataType: 'json',
      }
    });
    $('#emp_reporting_to').select2({
      tags: true,
      //placeholder:"Please Select People",
      ajax: {
        url: baseUrl + 'team/getTeamDropdown/',
        dataType: 'json',
      }
    });
    $('#led_type').select2({
      tags: true,
      //placeholder:"Please Select People",
      ajax: {
        url: select2url + 'led_type',
        dataType: 'json',
      }
    });
    $('#led_campaign').select2({
      tags: true,
      //placeholder:"Please Select People",
      ajax: {
        url: baseUrl + 'people/getCampaignDropdown',
        dataType: 'json',
      }
    });
  }
  // ******** Lead Module ********//
  // ******** Candidate Module ********//
  if(peopleTypeF1Key.indexOf(peopleTypeCandidate) != -1) {

    $('.cdt_role').select2({
      /* placeholder: "Please Select Role *",*/
      ajax: {
        url: select2url + 'cdt_role',
        dataType: 'json',
      }
    });
  }
  $(".cmp_industry").select2({
    width: 'resolve',
    /*      placeholder:"Select industry name",*/
    ajax: {
      url: baseUrl + 'company/getIndustryDropdown',
      dataType: 'json',
    }
  });

  $(".cmp_type").select2({
    width: 'resolve',
    /* placeholder:"Select company type",*/
    ajax: {
      url: baseUrl + 'company/getCompanyTypeDropdown',
      dataType: 'json',
    }
  });
  $(".cmp_anl_rev").select2({
    width: 'resolve',
    /*placeholder:"Select company annual revenue",*/
    ajax: {
      url: baseUrl + 'company/getCompanyAnnualDropdown',
      dataType: 'json',
    }
  });
  $(".cmp_stm_id").select2({
    width: 'resolve',
    /* placeholder:"Select State ",*/
    ajax: {
      url: baseUrl + 'company/getStateDropdown',
      dataType: 'json',
    }
  });

  $('.cmp_tgs_id').select2({
    tags: true,
    width: 'resolve',
    /* placeholder:"Enter Tags",*/
    multiple: true,
    tokenSeparators: [';', '', ','],
    ajax: {
      url: baseUrl + 'people/getTagsforDropdown',
      dataType: 'json',
    }
  });

  $('#cmp_managed_by').select2({
    //placeholder:"Please Select Team",
    ajax: {
      url: baseUrl + 'company/getEmployeeforDropdown',
      dataType: 'json',
    }
  });
  // ******** Candidate Module ********//
  // ******** Event Module ********//
  if(peopleTypeF1Key.indexOf(peopleTypeEvent) != -1) {
    var $eventSelect2 = $('.people-event');


    $eventSelect2.select2({
      tags: true,
      tokenSeparators: [';', '', ','],
      width: 'resolve',
      maximumSelectionSize: 1,
      maximumSelectionLength: 1,
      multiple: true,
      /* placeholder: "Please Select Event",*/
      dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
      ajax: {
        url: baseUrl + 'people/getEventForDropdown',
        dataType: 'json',
      }
    });
  }
  // ******** Event Module ********//
  // ******** Vendor Module ********//
  if(peopleTypeF1Key.indexOf(peopleTypeVendor) != -1) {
    var $vendorSelect2 = $('.vendor-company');

    $vendorSelect2.select2({
      tags: true,
      tokenSeparators: [';', '', ','],
      width: 'resolve',
      maximumSelectionSize: 1,
      maximumSelectionLength: 1,
      multiple: true,
      /*placeholder: "Please Select Vendor *",*/
      ajax: {
        url: baseUrl + 'people/getCompanyforDropdown',
        dataType: 'json',
      }
    });
    $('.vendor-company').change(function() {
      var cmpData;
      var cmpId;
      cmpId = $(this).val();
      cmpData = getCompDataById(cmpId);

      if(cmpData != null) {
        $('.vendor-gst').val(cmpData['cmp_gst_no']);
        $('.vendor-payment-terms').val(cmpData['cmp_payment_terms']);
        if(cmpData['cmp_stm_id'] != '') {
          var select2Option = '<option selected="selected" value="' + cmpData['cmp_stm_id'] + '">' + cmpData['state_name'] + '</option>';
          console.log(select2Option);
          $('.vendor-state').append(select2Option);
        }
      }
    });
  }
  // ******** Vendor Module ********//
  // ******** Client Module ********//
  if(peopleTypeF1Key.indexOf(peopleTypeClient) != -1) {
    var $clientSelect2 = $('.client-company');

    $clientSelect2.select2({
      tags: true,
      tokenSeparators: [';', '', ','],
      width: 'resolve',
      maximumSelectionSize: 1,
      maximumSelectionLength: 1,
      multiple: true,
      /*placeholder: "Please Select Client *",*/
      ajax: {
        url: baseUrl + 'people/getCompanyforDropdown',
        dataType: 'json',
      }
    });
    $('.client-company').change(function() {
      var cmpData;
      var cmpId;
      cmpId = $(this).val();
      cmpData = getCompDataById(cmpId);
      console.log(cmpData);

      if(cmpData != null) {
        $('.client-gstno').val(cmpData['cmp_gst_no']);
        $('.client-payment-terms').val(cmpData['cmp_payment_terms']);
        if(cmpData['cmp_stm_id'] != '') {
          var select2Option = '<option selected="selected" value="' + cmpData['cmp_stm_id'] + '">' + cmpData['state_name'] + '</option>';
          console.log(select2Option);
          $('.client-state').append(select2Option);

        }
      }
    });
  }
  // ******** Client Module ********//
  // ******** Team Module ********//
  if(peopleTypeF1Key.indexOf(peopleTypeTeam) != -1) {
    $('.team-dept').select2({
      /* placeholder: "Please Select Department *",*/
      ajax: {
        url: baseUrl + 'people/getDepartmentforDropdown',
        dataType: 'json',
      }
    });
  }
  // ******** Team Module ********//
  $('.blank_option').remove();

  //$('.select2-results__option--highlighted').on('change', function(){
  $('.select2-search__field').on('keydown', function() {
    console.log(this)
    //var id = $(this)[0].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.children[1].id;
    //console.log($('#select2-'+id+'-results').find('.select2-results__option--highlighted')[0].innerHTML);
  })

  peopleAddValidate();

});

//********* Company Data ********//
function getCompDataById(cmpId) {
  var company_data = '';
  console.log(cmpId);
  if(!isNaN(cmpId)) {
    dataString = {
        cmp_id: cmpId
      },
      $.ajax({
        type: "POST",
        data: dataString,
        url: baseUrl + 'people/getCompanyDetailsById',
        dataType: "JSON",
        async: false,
        success: function(response) {
          company_data = response;
          
          clearCompany();

          $('#cmp_id').val(response.cmp_id);

          if(COMPANY_TYPE_COMPANY == response.cmp_type_id)
            $('#radio_company').prop('checked', response.cmp_type_id);
          else
            $('#radio_account').prop('checked', response.cmp_type_id);

          $('#cmp_address').html(response.cmp_address).addClass('edited');
          $('#cmp_remark').html(response.cmp_address).addClass('edited');
          $('#cmp_facebook').val(response.cmp_facebook).addClass('edited');
          $('#cmp_linkedin').val(response.cmp_linkedin).addClass('edited');
          $('#cmp_instagram').val(response.cmp_instagram).addClass('edited');
          $('#cmp_twitter').val(response.cmp_twitter).addClass('edited');
          $('#cmp_youtube').val(response.cmp_youtube).addClass('edited');
          $('#cmp_employee').val(response.cmp_employee).addClass('edited');
          $('#cmp_website').val(response.cmp_website).addClass('edited');

          $('#cmp_stm_id').html('<option value="'+response.cmp_stm_id+'">'+response.state_name+'</option>').trigger('change').addClass('edited');
          $('#cmp_industry').html('<option value="'+response.cmp_industry+'">'+response.cmp_industry_name+'</option>').trigger('change').addClass('edited');
          $('#cmp_type').html('<option value="'+response.cmp_type+'">'+response.cmp_type_name+'</option>').trigger('change').addClass('edited');
          $('#cmp_anl_rev').html('<option value="'+response.cmp_anl_rev+'">'+response.cmp_anl_rev_name+'</option>').trigger('change').addClass('edited');
          $('#cmp_managed_by').html('<option value="'+response.cmp_managed_by+'">'+response.cmp_managed_by_name+'</option>').trigger('change').addClass('edited');
          
          var cmp_tgs_id = response.cmp_tgs_id.split(',');
          var cmp_tgs_id_name = response.cmp_tgs_id_name.split(',');

          var tag_optn = '';

          for(var i = 0; i < cmp_tgs_id.length; i++)
          {
            tag_optn += '<option selected="selected" value="'+cmp_tgs_id[i]+'">'+cmp_tgs_id_name[i]+'</option>';
          }

          $('#cmp_tgs_id').html(tag_optn).trigger('change').addClass('edited');
        }
      });
  }
  return company_data;
}

function clearCompany()
{
  $('#cmp_id').val('');
  $('#radio_company').prop('checked', '');

  $('#cmp_address').html('').removeClass('edited');
  $('#cmp_remark').html('').removeClass('edited');
  $('#cmp_facebook').val('').removeClass('edited');
  $('#cmp_linkedin').val('').removeClass('edited');
  $('#cmp_instagram').val('').removeClass('edited');
  $('#cmp_twitter').val('').removeClass('edited');
  $('#cmp_youtube').val('').removeClass('edited');
  $('#cmp_employee').val('').removeClass('edited');
  $('#cmp_website').val('').removeClass('edited');

  $('#cmp_stm_id').html('').trigger('change').removeClass('edited');
  $('#cmp_industry').html('').trigger('change').removeClass('edited');
  $('#cmp_type').html('').trigger('change').removeClass('edited');
  $('#cmp_anl_rev').html('').trigger('change').removeClass('edited');
  $('#cmp_tgs_id').html('').trigger('change').removeClass('edited');
  $('#cmp_managed_by').html('').trigger('change').removeClass('edited');
}

function setSelectOption(select_id) {
  $(select_id).select2({
    ajax: {
      url: select2url + $(select_id).data('gnp_prm'),
      dataType: 'json',
    }
  });
}
//********* Company Data ********//

// ******** Enable Login Module ********//
var loginDeptTeam, loginDeptCompany, loginDeptClient, loginDeptVendor;
loginDeptTeam = $('#peopleLoginConstants').data('team');
loginDeptCompany = $('#peopleLoginConstants').data('company');
loginDeptClient = $('#peopleLoginConstants').data('client');
loginDeptVendor = $('#peopleLoginConstants').data('vendor');

$('.enable-login-tab').click(function() {
  var teamId = $('#emp_dept').select2("val");
  console.log('cmpId >> ' + cmpId);
  //var cmpId = $('#cpl_cmp_id').select2("val");
  var cmpId = $('#cpl_cmp_id').val();
  console.log('cmpId >> ' + cmpId);
  var vndrId = $('#vdr_cmp_id').select2("val");
  console.log('vndrId >> ' + vndrId);
  var cliId = $('#cli_cmp_id ').select2("val");
  console.log('cliId >> ' + cliId);

  if(!teamId && !cmpId && !vndrId && !cliId)
    $('#login_dept_lbl').html('');
  else
    $('#login_dept_lbl').html('Department');

  if(teamId != '' && teamId != '0' && teamId != null) {
    console.log("teamId != '' && teamId != '0' >>");
    var teamCheckbox = $('.custom-people_login_dept-' + loginDeptTeam).closest('.checkbox-custom');
    modifyBlockByElement(teamCheckbox, 'block');
  } else {
    console.log("teamId != '' && teamId != '0' else part >>");
    // modifyBlockByElement('.enable-login-company','none');
    var teamCheckbox = $('.custom-people_login_dept-' + loginDeptTeam).closest('.checkbox-custom');
    modifyBlockByElement(teamCheckbox, 'none');
  }
  if(cmpId != '' && cmpId != '0' && cmpId != null) {
    console.log("cmpId != '' && cmpId != '0' >>");
    var cmpCheckbox = $('.custom-people_login_dept-' + loginDeptCompany).closest('.checkbox-custom');
    modifyBlockByElement(cmpCheckbox, 'block');
  } else {
    console.log("cmpId != '' && cmpId != '0' else part >>");
    // modifyBlockByElement('.enable-login-company','none');
    var cmpCheckbox = $('.custom-people_login_dept-' + loginDeptCompany).closest('.checkbox-custom');
    modifyBlockByElement(cmpCheckbox, 'none');
  }
  if(vndrId != '' && vndrId != '0' && vndrId != null) {
    console.log("vndrId != '' && vndrId != '0' >>");
    // modifyBlockByElement('.enable-login-vendor','block');
    var vdrCheckbox = $('.custom-people_login_dept-' + loginDeptVendor).closest('.checkbox-custom');
    modifyBlockByElement(vdrCheckbox, 'block');
  } else {
    console.log("vndrId != '' && vndrId != '0' else part >>");
    // modifyBlockByElement('.enable-login-vendor','none');
    var vdrCheckbox = $('.custom-people_login_dept-' + loginDeptVendor).closest('.checkbox-custom');
    modifyBlockByElement(vdrCheckbox, 'none');
  }
  if(cliId != '' && cliId != '0' && cliId != null) {
    console.log("cliId != '' && cliId != '0' >>");
    // modifyBlockByElement('.enable-login-client','block');
    var cliCheckbox = $('.custom-people_login_dept-' + loginDeptClient).closest('.checkbox-custom');
    modifyBlockByElement(cliCheckbox, 'block');
  } else {
    console.log("cliId != '' && cliId != '0' else part >>");
    // modifyBlockByElement('.enable-login-client','none');
    var cliCheckbox = $('.custom-people_login_dept-' + loginDeptClient).closest('.checkbox-custom');
    modifyBlockByElement(cliCheckbox, 'none');
  }
  if((teamId != '' && teamId != 0 && teamId != null) || (cmpId != '' && cmpId != 0 && cmpId != null) || (vndrId != '' && vndrId != 0 && vndrId != null) || (cliId != '' && cliId != 0 && cliId != null)) {
    console.log("(cmpId != '' && cmpId != 0) || (vndrId != '' && vndrId != 0) || (cliId != '' && cliId != 0 ) >>");
    modifyBlock('.enable-login-div', 'inline-flex');
    /*var cmpCheckbox = $('checkbox-people_login_dept-'+loginDeptCompany).closest('.checkbox-custom');
    modifyBlockByElement(cmpCheckbox,'inline-flex');*/
  } else {
    console.log("(cmpId != '' && cmpId != 0) || (vndrId != '' && vndrId != 0) || (cliId != '' && cliId != 0 ) >>");
    modifyBlock('.enable-login-div', 'none');
    /*var cmpCheckbox = $('checkbox-people_login_dept-'+loginDeptCompany).closest('.checkbox-custom');
    modifyBlockByElement(cmpCheckbox,'none');*/
  }
});
// ******** Enable Login Module ********//

// ******** Preview Image Starts here *********//
$('.profile-image').change(function(e) {
  preview_image(e);
});

function preview_image(event) {
  var total_file = $('.profile-image')[0].files.length;
  $('#image_preview').html('');
  for(var i = 0; i < total_file; i++) {
    $('#image_preview').append("<span class=\"pip\">" + "<img class=\"imageThumb\" src=\"" + URL.createObjectURL(event.target.files[i]) + "\" width=\"220px\"  />" + "</span>");
  }
}
// ******** Preview Image Ends here*********//
function checkPeopleType(type, element = '') {
  var peopleTypeStatus = true;
  var companyField = '#cpl_cmp_id';
  var leadField = '#led_title';
  var candidateField = '#cdt_role';
  var eventField = '#epl_evt_id';
  var vendorField = '#vdr_cmp_id';
  var clientField = '#cli_cmp_id';
  var teamField = '#emp_dept';
  var pswdField = '#ppl_password';
  switch (type) {
    case 'company':
      if($(companyField).val() == '' || $(companyField).val() == '0' || $(companyField).val() == null)
        peopleTypeStatus = false;
      break;
    case 'lead':
      if($(leadField).val() == '')
        peopleTypeStatus = false;
      break;
    case 'candidate':
      if($(candidateField).select2("val") == '' || $(candidateField).select2("val") == '0' || $(candidateField).select2("val") == null)
        peopleTypeStatus = false;
      break;
    case 'event':
      if($(eventField).select2("val") == '' || $(eventField).select2("val") == '0' || $(eventField).select2("val") == null)
        peopleTypeStatus = false;
      break;
    case 'vendor':
      if($(vendorField).select2("val") == '' || $(vendorField).select2("val") == '0' || $(vendorField).select2("val") == null)
        peopleTypeStatus = false;
      break;
    case 'client':
      if($(cli_cmp_id).select2("val") == '' || $(cli_cmp_id).select2("val") == '0' || $(cli_cmp_id).select2("val") == null)
        peopleTypeStatus = false;
      break;
    case 'team':
      if($(teamField).select2("val") == '' || $(teamField).select2("val") == '0' || $(teamField).select2("val") == null)
        peopleTypeStatus = false;
      break;
    case 'password':
      if($(pswdField).val() == '')
        peopleTypeStatus = false;
      break;
    default:
      peopleTypeStatus = false;
      break;
  }
  // console.log(peopleTypeStatus);
  if(element != '') {
    var requiredAsterix = $(element).parents('.form-group').find('.asterix-error');
    // console.log(requiredAsterix);
    if(peopleTypeStatus) {
      console.log(requiredAsterix);
      modifyBlockByElement(requiredAsterix, 'inline-block');
      /* swal(
           {
               title: "Opps",
               text: "Some fields are yet to be filled",
               type: "error",
               icon: "error",
               button: true,
           });*/
    } else {
      modifyBlockByElement(requiredAsterix, 'none');
    }

  }
  return peopleTypeStatus;
}
// ****** Modify Block Code Starts Here ********//
function modifyBlock(name, visibility) {
  // console.log(' name : '+name+' visibility : '+visibility);
  // console.log( $(name).css('display',visibility));
  $(name).css('display', visibility)
  return;
}

function modifyBlockByElement(element, visibility) {
  // console.log(' name : ');
  // console.log(element);
  // console.log(' visibility : '+visibility);
  // console.log( $(name).css('display',visibility));
  element.css('display', visibility)
  return;
}

function peopleAddValidate()
{
  // ****** Modify Block Code Ends Here ********//
  var submitted = false;
  var peopleValidator = $('#peopleAddForm');
  peopleValidator.validate({
    errorClass: "custom-error",
    ignore: [],
    rules: {
      ppl_password: {
        required: function(element) {
          return checkPeopleType('password', element);
        },
        minlength: 6
      },
      ppl_cnfm_password: {
        equalTo: "#ppl_password",
        required: function(element) {
          return checkPeopleType('password', element);
        },
        minlength: 6
      },
      ppl_mobile: {
        remote: {
          url: baseUrl + 'people/peopleContactValidation/mobile',
          type: "post",
          data: {
            value: function() {
              return $('#ppl_mobile').val();
            },
          },
        },
      },
      ppl_email: {
        remote: {
          url: baseUrl + 'people/peopleContactValidation/email',
          type: "post",
          data: {
            value: function() {
              return $('#ppl_email').val();
            },
          },
        },
      },
      ppl_username: {
        remote: {
          url: baseUrl + 'people/peopleUsernameValidation',
          type: "post",
          data: {
            value: function() {
              return $('#ppl_username').val();
            },
          },
        },
      },
      // ****** Company *****//
      cpl_cmp_id: {
        required: function(element) {
          return checkPeopleType('company', element);
        },
      },
      cpl_designation: {
        required: function(element) {
          return checkPeopleType('company', element);
        },
      },
      // ****** Company *****//
      // ****** Lead *****//
      led_src: {
        required: function(element) {
          return checkPeopleType('lead', element);
        },
      },
      /* led_prod: {
         required: function(element) {
           return checkPeopleType('lead', element);
         },
       },*/
      led_amount: {
        required: function(element) {
          return checkPeopleType('lead', element);
        },
      },
      led_managed_by: {
        required: function(element) {
          return checkPeopleType('lead', element);
        },
      },
      led_lead_status: {
        required: function(element) {
          return checkPeopleType('lead', element);
        },
      },
      led_lead_status: {
        required: function(element) {
          return checkPeopleType('lead', element);
        },
      },
      led_lead_stage: {
        required: function(element) {
          return checkPeopleType('lead', element);
        },
      },
      // ****** Lead *****//
      // ****** candidate *****//
      cdt_total_exp: {
        required: function(element) {
          return checkPeopleType('candidate', element);
        },
      },
      cdt_relative_exp: {
        required: function(element) {
          return checkPeopleType('candidate', element);
        },
      },
      cdt_exp_ctc: {
        required: function(element) {
          return checkPeopleType('candidate', element);
        },
      },
      cdt_cur_ctc: {
        required: function(element) {
          return checkPeopleType('candidate', element);
        },
      },
      cdt_skills: {
        required: function(element) {
          return checkPeopleType('candidate', element);
        },
      },
      // ****** candidate *****//
      // ****** event *****//
      epl_evt_id: {
        required: function(element) {
          return checkPeopleType('event', element);
        },
      },
      // ****** event *****//
      // ****** Vendor *****//
      vdr_cmp_id: {
        required: function(element) {
          return checkPeopleType('vendor', element);
        },
      },
      vdr_cpl_designation: {
        required: function(element) {
          return checkPeopleType('vendor', element);
        },
      },
      // ****** Vendor *****//
      // ****** Client *****//
      cli_cmp_id: {
        required: function(element) {
          return checkPeopleType('client', element);
        },
      },
      cli_cpl_designation: {
        required: function(element) {
          return checkPeopleType('client', element);
        },
      },
      // ****** Client *****//
      // ****** Team *****//
      emp_dept: {
        required: function(element) {
          return checkPeopleType('team', element);
        },
      },
      // ****** Team *****//
    },


    messages: {
      ppl_mobile: {
        remote: function() {
          return $("#ppl_mobile").val()+" is already taken";
        },
      },
      ppl_email: {
        remote: function() {
          return $("#ppl_email").val()+" is already taken";
        },
      },
      ppl_username: {
        remote: function() {
          return $("#ppl_username").val()+" is already taken";
        },
      },
      ppl_password: {
        required: 'Please Enter password'
      },
      ppl_cnfm_password: {
        required: 'Please Enter password'
      },
    },
    invalidHandler: function(form, validator) {
      submitted = true;
    },
    errorPlacement: function(error, element) {
      $(element).parent('div').find('.custom-error').html(error);
    },
    /*showErrors: function(errorMap, errorList) {
      if(submitted) {
        var summary = '<div class="alert alert-danger display-hide" style="display: block;"><button class="close" data-close="alert"></button>';
        $.each(errorList, function() {
          summary += this.message + "<br/>";
          $(this.element).parent('div').find('.custom-error').html(this.message);

        });
        summary += '</div>';
        $("#form_errors").html(summary);
        swal({
          title: "Opps",
          text: ' You have some error in form',
          type: "error",
          icon: "error",
          button: true,
        });
        $('.swal-button--confirm').click();
        submitted = false;

      }
    },*/
    submitHandler: function(form) {
      $("#form_errors").html('');

      try {
        var formData = new FormData();

        // ******************  People Type ***********************//
        formData.append('peopleTypeF1Key', $('#peopleTypeF1Key').val());

        // ******************  People Type ***********************//
        // ******************  People ***********************//
        formData.append('ppl_name', $('#ppl_name').val());
        formData.append('ppl_title_id', $('#ppl_title_id').val());
        formData.append('ppl_address', $('#ppl_address').val());
        formData.append('ppl_location', $('#ppl_location').val());
        formData.append('ppl_google_lat', $('#ppl_google_lat').val());
        formData.append('ppl_google_long', $('#ppl_google_long').val());  
        formData.append('ppl_mobile', $('#ppl_mobile').val());
        formData.append('ppl_email', $('#ppl_email').val());
        formData.append('ppl_dob', $('#ppl_dob').val());
        formData.append('ppl_met_on', $('#ppl_met_on').val());
        // ***** Radio Button ******//
        formData.append('ppl_gender', $('input[name="ppl_gender"]:checked').val());
        // ***** Radio Button ******//
        formData.append('ppl_tgs_id', $('#ppl_tgs_id').val());
        formData.append('ppl_remark', $('#ppl_remark').val());
        formData.append('send_mail', $('input[name="send_mail"]:checked').val());
        formData.append('ppl_social_fb', $('#ppl_social_fb').val());
        formData.append('ppl_social_linkedin', $('#ppl_social_linkedin').val());
        formData.append('ppl_social_instagram', $('#ppl_social_instagram').val());
        formData.append('ppl_social_twitter', $('#ppl_social_twitter').val());
        formData.append('ppl_social_youtube', $('#ppl_social_youtube').val());
        formData.append('ppl_website', $('#ppl_website').val());
        formData.append('ppl_managed_by', $('#ppl_managed_by').val());
        //********* IMAGE UPLOAD ***********//
        var file = document.getElementById('ppl_profile_image');
        var filejquery = $('#ppl_profile_image');
        var count = file.files.length;
        formData.append('file_count', count);
        for(var i = 0; i < count; i++) {
          var allowedFiles = ["jpeg", "jpg", "png", "JPG", "PNG"];

          // var file_name = files1;
          if(count != '0') {
            var fileName = file.files[0].name;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            var size = parseFloat(file.files[0].size / 1024).toFixed(2);
            if($.inArray(fileNameExt, allowedFiles) == -1 || size > 5000) {
              var data = fileName + " is Invalid ";
              flag = false;

              filejquery.css('border-color', 'red ');
              filejquery.next().css('color', 'red ');
              filejquery.next().html(data);
              return false;
            } else {
              flag = true;
              filejquery.css('border-color', '#ccc');
              filejquery.next().css('color', 'none ');
              filejquery.next().html('');
              formData.append("ppl_profile_image", document.getElementById('ppl_profile_image').files[i]);
            }

          } else {
            flag = true;
            filejquery.css('border-color', '#ccc');
            filejquery.next().css('color', 'none ');
            filejquery.next().html('');
          }
        }
        //********* IMAGE UPLOAD ***********//

        // ******* People Type Company ******//
        if(peopleTypeF1Key.indexOf(peopleTypeCompany) != -1) {

          //********* IMAGE UPLOAD ***********//
          var file = document.getElementById('cmp_logo');
          var filejquery = $('#cmp_logo');
          var count = file.files.length;
          formData.append('file_count', count);
          for(var i = 0; i < count; i++) {
            var allowedFiles = ["jpeg", "jpg", "png", "JPG", "PNG"];

            // var file_name = files1;
            if(count != '0') {
              var fileName = file.files[0].name;
              var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
              var size = parseFloat(file.files[0].size / 1024).toFixed(2);
              if($.inArray(fileNameExt, allowedFiles) == -1 || size > 5000) {
                var data = fileName + " is Invalid ";
                flag = false;

                filejquery.css('border-color', 'red ');
                filejquery.next().css('color', 'red ');
                filejquery.next().html(data);
                return false;
              } else {
                flag = true;
                filejquery.css('border-color', '#ccc');
                filejquery.next().css('color', 'none ');
                filejquery.next().html('');
                formData.append("cmp_logo", document.getElementById('cmp_logo').files[i]);
              }

            } else {
              flag = true;
              filejquery.css('border-color', '#ccc');
              filejquery.next().css('color', 'none ');
              filejquery.next().html('');
            }
          }

          formData.append("cpl_cmp_id", $("#cpl_cmp_id").val());
          formData.append('cpl_designation', $('#cpl_designation').val());
          formData.append("cmp_name", $("#cmp_name").val());
          formData.append("cmp_website", $("#cmp_website").val());
          formData.append("cmp_industry", $("#cmp_industry").val());
          formData.append("cmp_address", $("#cmp_address").val());
          formData.append("cmp_payment_terms", $("#cmp_payment_terms").val());
          formData.append("cmp_pay_due", $("#cmp_pay_due").val());
          formData.append("cmp_pan", $("#cmp_pan").val());
          formData.append("cmp_gst_no", $("#cmp_gst_no").val());
          formData.append("cmp_stm_id", $("#cmp_stm_id").val());
          formData.append("cmp_type", $("#cmp_type").val());
          formData.append("cmp_anl_rev", $("#cmp_anl_rev").val());
          formData.append("cmp_employee", $("#cmp_employee").val());
          formData.append("cmp_managed_by", $("#cmp_managed_by").val());
          formData.append("cmp_type_id", $(".radio_company_account:checked").val());

          formData.append('cmp_location', $('#cmp_location').val());
          formData.append('cmp_google_lat', $('#cmp_google_lat').val());
          formData.append('cmp_google_long', $('#cmp_google_long').val());  

          formData.append("cmp_facebook", $("#cmp_facebook").val());
          formData.append("cmp_linkedin", $("#cmp_linkedin").val());
          formData.append("cmp_instagram", $("#cmp_instagram").val());
          formData.append("cmp_twitter", $("#cmp_twitter").val());
          formData.append("cmp_youtube", $("#cmp_youtube").val());
        }
        // ******* People Type Company ******//
        // ******* People Type Lead ******//
        if(peopleTypeF1Key.indexOf(peopleTypeLead) != -1) {
          formData.append('led_src', $('#led_src').val());
          formData.append('led_title', $('#led_title').val());
          formData.append('led_temp', $('#led_temp').val());
          formData.append('led_ref_by', $('#led_ref_by').val());
          // formData.append('led_prod', $('#led_prod').val());
          formData.append('led_amount', $('#led_amount').val());
          formData.append('led_managed_by', $('#led_managed_by').val());
          formData.append('led_lead_status', $('#led_lead_status').val());
          formData.append('led_lead_stage', $('#led_lead_stage').val());
          formData.append('led_remark', $('#led_remark').val());
          formData.append('led_type', $('#led_type').val());
          formData.append('led_campaign', $('#led_campaign').val());
          formData.append('led_pipeline', $('#led_pipeline').val());
        }

        // ******* People Type Lead ******//
        // ******* People Type Candidate ******//
        if(peopleTypeF1Key.indexOf(peopleTypeCandidate) != -1) {
          formData.append('cdt_role', $('#cdt_role').val());
          formData.append('cdt_total_exp', $('#cdt_total_exp').val());
          formData.append('cdt_relative_exp', $('#cdt_relative_exp').val());
          formData.append('cdt_notice_period', $('#cdt_notice_period').val());
          formData.append('cdt_exp_ctc', $('#cdt_exp_ctc').val());
          formData.append('cdt_cur_ctc', $('#cdt_cur_ctc').val());
          formData.append('cdt_skills', $('#cdt_skills').val());
          formData.append('cdt_remark', $('#cdt_remark').val());
        }
        // ******* People Type Candidate ******//
        // ******* People Type Event ******//
        if(peopleTypeF1Key.indexOf(peopleTypeEvent) != -1) {
          formData.append('epl_evt_id', $('#epl_evt_id').val());
          formData.append('epl_remark', $('#epl_remark').val());
        }
        // ******* People Type Event ******//
        // ******* People Type Vendor ******//
        if(peopleTypeF1Key.indexOf(peopleTypeVendor) != -1) {
          formData.append('vdr_cmp_id', $('#vdr_cmp_id').val());
          formData.append('vdr_cpl_designation', $('#vdr_cpl_designation').val());
          formData.append('vdr_cpl_remark', $('#vdr_cpl_remark').val());
          formData.append('vdr_cmp_gst_no', $('#vdr_cmp_gst_no').val());
          formData.append('vdr_cmp_state', $('#vdr_cmp_state').val());
          formData.append('vdr_cmp_payment_terms', $('#vdr_cmp_payment_terms').val());
        }
        // ******* People Type Vendor ******//
        // ******* People Type Client ******//
        if(peopleTypeF1Key.indexOf(peopleTypeClient) != -1) {
          formData.append('cli_cmp_id', $('#cli_cmp_id').val());
          formData.append('cli_cpl_designation', $('#cli_cpl_designation').val());
          formData.append('cli_cpl_remark', $('#cli_cpl_remark').val());
          formData.append('cli_cmp_gst_no', $('#cli_cmp_gst_no').val());
          formData.append('cli_cmp_state', $('#cli_cmp_state').val());
          formData.append('cli_cmp_payment_terms', $('#cli_cmp_payment_terms').val());
        }
        // ******* People Type Client ******//
        // ******* People Type Team ******//
        if(peopleTypeF1Key.indexOf(peopleTypeTeam) != -1) {
          formData.append('emp_dept', $('#emp_dept').val());
          formData.append('emp_code', $('#emp_code').val());
          formData.append('emp_designation', $('#emp_designation').val());
        }
        // ******* People Type Team ******//
        // ******* People Type Team ******//
        var additionalInvalid = 0;

        if(peopleTypeF1Key.indexOf(peopleTypeAdditional) != -1) {
          for(var i = 0; i < $('.add_det').length; i++) {
            formData.append('adt_adm_id[' + i + ']', $('.add_det')[i].id.split('_')[1]);

            var valx = $('.add_det')[i].value;

            if($('.add_det')[i].type == 'select-multiple' && $($('.add_det')[i]).val())
              valx = $($('.add_det')[i]).select2("val").join(',');

            formData.append('adt_value[' + i + ']', valx);

            if(!validateAdditionalDetails($('.add_det')[i]))
              additionalInvalid++;
          }
        }

        if(additionalInvalid > 0)
          return;

        // ******* People Type Team ******//
        var ppl_login_type = '';
        var ppl_login_dept = '';
        $('input[name="people_login_type"]:checked').each(function() {
          ppl_login_type += this.value + ',';
        });
        $('input[name="people_login_dept"]:checked').each(function() {
          ppl_login_dept += this.value + ',';
        });
        formData.append('ppl_username', $('#ppl_username').val());
        formData.append('ppl_password', $('#ppl_password').val());
        formData.append('ppl_login_type', ppl_login_type);
        formData.append('ppl_login_dept', ppl_login_dept);

        $('.btn_save').css('display', 'none');
        $('.btn_processing').css('display', 'inline-block');
        // ******************  People ***********************//
        $.ajax({
          type: "POST",
          dataType: "JSON",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          url: baseUrl + "people/insertPeople",
          success: function(response) {
            responsemsg(response, function() {
              $('.btn_save').css('display', 'inline-block');
              $('.btn_processing').css('display', 'none');
              if($('.no-redirect').prop('checked'))
                location.reload();
              else {
                setTimeout(function() {
                  window.location.href = response.linkn;
                }, 1000);
              }
            }, function() {
              var message = 'Oops Something went wrong';
              $('.btn_save').css('display', 'inline-block');
              $('.btn_processing').css('display', 'none');
              if(response.message != '') {
                message = response.message;
              } else {
                if(response.email_msg != '') {
                  message = response.email_msg;
                }
                if(response.mob_msg != '') {
                  message = response.mob_msg;
                }
              }
            })
          }
        });
      } catch (e) {
        console.log(e);
      }

    }
  });

}

$('input[name="people_login_dept"]').on('switchChange.bootstrapSwitch', function(event, state) {
  var people_login_dept = '';
  $('input[name="people_login_dept"]:checked').each(function() {
    people_login_dept += this.value + ',';
  });
  data = {
    ppl_login_dept: people_login_dept,
    currentState: state
  }
  checkMaxUsers(data, this, state);
});

function checkMaxUsers(data, currentCheckBox, currentState) {
  // console.log(data);
  $.ajax({
    type: "POST",
    dataType: "JSON",
    data: data,
    url: baseUrl + "people/checkMaxUsersAtInsert",
    success: function(response) {
      if(response.success == true) {
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
      } else {
        swal({
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

function validateAdditionalDetails(element) {
  // Element Types - select-one, text, textarea, select-one, select-multiple, number, email, text

  switch (element.type) {
    case 'number':
      if(isNaN(element.value) && element.value != '') {
        $(element).parent('div').find('.custom-error').html('Please Enter Number Only');
        $(element).focus();
        return false;
      }
      return true;
      break;
    case 'email':
      if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(element.value)) && element.value != '') {
        $(element).parent('div').find('.custom-error').html('Please Enter Valid Email');
        $(element).focus();
        return false;
      }
      return true;
      break;
    default:
      return true;
      break;
  }
}

function validateMobile(e)
{
  console.log(e.keyCode);
  if(e.ctrlKey === true && (e.key==="v" || e.key==="a" || e.key==="c"))
    return true;
  else
    return ((e.keyCode >= 96 && e.keyCode <= 105) || (e.keyCode >= 48 && e.keyCode <= 57) || e.keyCode == 8 || e.keyCode == 9 || (e.keyCode == 17 && e.keyCode == 86 && e.keyCode == 46));
}

function getCompanyDetails()
{
  $.ajax({
    type: "POST",
    dataType: "JSON",
    data: data,
    url: baseUrl + "people/checkMaxUsersAtInsert",
    success: function(response) {
    }
  });
}