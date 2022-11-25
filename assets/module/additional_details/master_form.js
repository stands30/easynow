  $(document).ready(function() 
  {
    var typeDropdown;
    var typeDropdownMultiple;

    $('.adm-category-select2').select2({
      ajax: {
        url: baseUrl + 'additional_details/getAdtCategory',
        dataType: 'json',
      }
    });

    $('.adm-type-select2').select2({
      ajax: {
        url: baseUrl + 'additional_details/getGenPrmforDropdown/adm_type',
        dataType: 'json',
      }
    }).change(function() {
      toggleGroupDropDown($(this).val());
    });


    $('.adm-group-select2').select2({
      tags: true,
      tokenSeparators: [';', '', ','],
      matcher: matchCustom,
     /* placeholder: "Please Select Group",*/
      ajax: {
        url: baseUrl + 'additional_details/getGenPrmGroupName',
        dataType: 'json',
      }
    });

    toggleGroupDropDown($('.adm-type-select2').val());
  });
  
  var current_select2 = null;

  $(document).on('keydown', '.select2-search__field', function (ev) {
    var me = $(this);
    if (me.data('listening') != 1)
    {
      me
        .data('listening', 1)
        .keydown(function(event) {
          preventSpecialCharacter(event)
        })
      ;
    }
  });

  function toggleGroupDropDown(typeVal)
  {
    typeDropdown = $('#adt_type_constants').data('dropdown');
    typeDropdownMultiple = $('#adt_type_constants').data('dropdown_multiple');
    console.log(typeVal);
    switch (typeVal) {
      case '' + typeDropdown + '':
        console.log('case : ' + typeDropdown);
        $('.adt_group').css('display', 'block');
        break;
      case '' + typeDropdownMultiple + '':
        console.log('case : ' + typeDropdownMultiple);
        $('.adt_group').css('display', 'block');
        break;
      default:
        $('.adt_group').css('display', 'none');
        break;
    }
  }

  function matchCustom(params, data) {
    // If there are no search terms, return all of the data
    console.log(terms);
    if ($.trim(params.term) === '') {
      return data;
    }
    // Do not display the item if there is no 'text' property
    if (typeof data.text === 'undefined') {
      return null;
    }

    // `params.term` should be the term that is used for searching
    // `data.text` is the text that is displayed for the data object
    if (data.text.indexOf(params.term) > -1) {
      var modifiedData = $.extend({}, data, true);
      modifiedData.text += ' (matched)';

      // You can return modified objects from here
      // This includes matching the `children` how you want in nested data sets
      return modifiedData;
    }

    // Return `null` if the term should not be displayed
    return null;
  }

  $('.adm-group-select2').alphanum();

  $('.input.select2-search__field').focus(function() {
    alert($(this).val());
  });
  var submitted = false;
  $('#master_form').validate({
    errorClass: "custom-error",
    invalidHandler: function(form, validator) {
      submitted = true;
    },
    showErrors: function(errorMap, errorList) {
      if (submitted) {
        var summary = '<div class="alert alert-danger display-hide" style="display: block;"><button class="close" data-close="alert"></button>';
        $.each(errorList, function() {
          summary += this.message + "<br/>";
          $(this.element).parent('div').find('.custom-error').html(this.message);

        });
        summary += '</div>';
        $("#form_errors").html(summary);
        submitted = false;

      }
    },
    submitHandler: function(form) {
      try {
        var adm_all_type = $('#adt_type_constants').data();
        var adm_type = $('#adm_type').val();
        var formData = new FormData();
        formData.append('adm_id', $('#adm_id').val());
        formData.append('adm_adc_id', $('#adm_adc_id').val());
        formData.append('adm_name', $('#adm_name').val());
        formData.append('adm_order', $('#adm_order').val());
        formData.append('adm_type', adm_type);
        formData.append('adm_placeholder', $('#adm_placeholder').val());
        formData.append('adm_all_type', JSON.stringify(adm_all_type));
        if (adm_type == adm_all_type.dropdown || adm_type == adm_all_type.dropdown_multiple) {
          formData.append('adm_group', $('#adm_group').val());
        }
        $.ajax({
          type: "POST",
          dataType: "JSON",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          url: baseUrl + "additional_details/masterUpdate",
          success: function(response) {
            if (response.success == true) {
              $('.btn_save').css('display', 'inline-block');
              $('.btn_processing').css('display', 'none');
              swal({
                title: "Done",
                text: response.message,
                type: "success",
                icon: "success",
                button: true,
              });
              setTimeout(function() {
                window.location.href = response.linkn;
              }, 1000);
            } else {
              $('.btn_save').css('display', 'inline-block');
              $('.btn_processing').css('display', 'none');

              swal({
                title: "Opps",
                text: response.message,
                type: "error",
                icon: "error",
                button: true,
              });
            }
          }
        });
      } catch (e) {
        console.log(e);
      }
    }
  });
