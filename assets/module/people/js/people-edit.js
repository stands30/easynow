$(document).ready(function() {
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

  $('.tags-select2').select2({
    tags: true,
    width: 'resolve',
    // placeholder: "Enter Tags",
    multiple: true,
    tokenSeparators: [';', '', ','],
    ajax: {
      url: baseUrl + 'people/getTagsforDropdown',
      dataType: 'json',
    }
  });
  $('.people-title').select2({
    placeholder: "Please Select Title",
    ajax: {
      url: baseUrl + 'people/getGenPrmforDropdown/ppl_title',
      dataType: 'json',
    }
  });

$('.ppl_managed_by').select2({
      /*placeholder: "Please Select Managed By *",*/
      ajax: {
        url: baseUrl + 'people/getPeopleforDropdown/manage',
        dataType: 'json',
      }
    });
});
// ******** Preview Image Starts here *********//
$('.profile-image').change(function(e) {
  preview_image(e);
});

function preview_image(event) {
  var total_file = $('.profile-image')[0].files.length;
  $('#image_preview').html('');
  for (var i = 0; i < total_file; i++) {
    $('#image_preview').append("<span class=\"pip\">" + "<img class=\"imageThumb\" src=\"" + URL.createObjectURL(event.target.files[i]) + "\" style=\"width:220px\" />" + "</span>");
  }
}
// ******** Preview Image Ends here*********//
$('#peopleEditForm').validate({
  errorClass: "custom-error",
  rules: {
    ppl_mobile: {
      remote: {
        url: baseUrl + 'people/peopleContactValidation/mobile/' + $('#ppl_mob_id').val(),
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
        url: baseUrl + 'people/peopleContactValidation/email/' + $('#ppl_email_id').val(),
        type: "post",
        data: {
          value: function() {
            return $('#ppl_email').val();
          },
        },
      },
    },
  },
  messages: {
    ppl_mobile: {
      remote: function() {
        return $.validator.format("{0} is already taken", $("#ppl_mobile").val());
      },
    },
    ppl_email: {
      remote: function() {
        return $.validator.format("{0} is already taken", $("#ppl_email").val());
      },
    },
  },
   errorPlacement: function(error, element) {
    console.log('element : >>');
    console.log('element : >>');
    // console.log(error.append('People'));
    console.log($(element).parent('div').find('.custom-error').html(error));
    console.log('element : <<');
  },
  submitHandler: function(form) {
    try {
      $('.btn_save').css('display', 'none');
      $('.btn_processing').css('display', 'inline-block');
      var formData = new FormData();
      // ******************  People ***********************//
      formData.append('ppl_id', $('#ppl_id').val());
      formData.append('ppl_title_id', $('#ppl_title_id').val());
      formData.append('ppl_email_id', $('#ppl_email_id').val());
      formData.append('ppl_mob_id', $('#ppl_mob_id').val());
      formData.append('ppl_name', $('#ppl_name').val());
      formData.append('ppl_address', $('#ppl_address').val());
      formData.append('ppl_mobile', $('#ppl_mobile').val());
      formData.append('ppl_email', $('#ppl_email').val());
      formData.append('ppl_dob', $('#ppl_dob').val());
      formData.append('ppl_met_on', $('#ppl_met_on').val());
        formData.append('ppl_location', $('#ppl_location').val());
        formData.append('ppl_google_lat', $('#ppl_google_lat').val());
        formData.append('ppl_google_long', $('#ppl_google_long').val()); 
      // ***** Radio Button ******//
      formData.append('ppl_gender', $('input[name="ppl_gender"]:checked').val());
      // ***** Radio Button ******//
      formData.append('ppl_tgs_id', $('#ppl_tgs_id').val());
      formData.append('ppl_remark', $('#ppl_remark').val());
      formData.append('ppl_social_fb', $('#ppl_social_fb').val());
      formData.append('ppl_social_linkedin', $('#ppl_social_linkedin').val());
      formData.append('ppl_social_instagram', $('#ppl_social_instagram').val());
      formData.append('ppl_social_twitter', $('#ppl_social_twitter').val());
      formData.append('ppl_social_youtube', $('#ppl_social_youtube').val());
      formData.append('ppl_website', $('#ppl_website').val());
      formData.append('ppl_managed_by', $('#ppl_managed_by').val());

      //********* IMAGE UPLOAD ***********//
      var file = document.getElementById('ppl_profile_image');
      var filejquery = $('ppl_profile_image');
      var count = file.files.length;
      formData.append('file_count', count);
      for (var i = 0; i < count; i++) {
        var allowedFiles = ["jpeg", "jpg", "png", "JPG", "PNG"];

        // var file_name = files1;
        if (count != '0') {
          var fileName = file.files[0].name;
          var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
          var size = parseFloat(file.files[0].size / 1024).toFixed(2);
          if ($.inArray(fileNameExt, allowedFiles) == -1 || size > 5000) {
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


      $.ajax({
        type: "POST",
        dataType: "JSON",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        url: baseUrl + "people/updatePeople",
        success: function(response) {

          responsemsg(response, function(){
            setTimeout(function() {
              window.location.href = response.linkn;
            }, 1000)
          }, function(){
            var message = 'Oops Something went wrong';
            if (response.message != '') {
              message = response.message;
            } else {
              if (response.email_msg != '') {
                message = response.email_msg;
              }
              if (response.mob_msg != '') {
                message = response.mob_msg;
              }
            }
          })

          /*if (response.success == true) {
            swal({
              title: "Done",
              text: response.message,
              type: "success",
              icon: "success",
              // button: true,
            });

            setTimeout(function() {
              window.location.href = response.linkn;
            }, 1000)
          } else {
            var message = 'Oops Something went wrong';
            if (response.message != '') {
              message = response.message;
            } else {
              if (response.email_msg != '') {
                message = response.email_msg;
              }
              if (response.mob_msg != '') {
                message = response.mob_msg;
              }
            }
            swal({
              title: "Opps",
              text: message,
              type: "error",
              icon: "error",
              button: true,
            });
          }*/
        }
      });

    } catch (e) {
      console.log(e);
    }

  }
});