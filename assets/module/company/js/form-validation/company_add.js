$(document).ready(function()
{

      $(".cmp_industry").select2({
      width:'resolve',
/*      placeholder:"Select industry name",*/
        ajax: {
          url: baseUrl+'company/getIndustryDropdown',
          dataType: 'json',
        }
      });

      $(".cmp_type").select2({
      width:'resolve',
     /* placeholder:"Select company type",*/
        ajax: {
          url: baseUrl+'company/getCompanyTypeDropdown',
          dataType: 'json',
        }
      });
      $(".cmp_anl_rev").select2({
      width:'resolve',
      /*placeholder:"Select company annual revenue",*/
        ajax: {
          url: baseUrl+'company/getCompanyAnnualDropdown',
          dataType: 'json',
        }
      });
      $(".cmp_stm_id").select2({
      width:'resolve',
     /* placeholder:"Select State ",*/
        ajax: {
          url: baseUrl+'company/getStateDropdown',
          dataType: 'json',
        }
      });

      $('.cmp_tgs_id').select2({
      tags: true,
      width:'resolve',
     /* placeholder:"Enter Tags",*/
      multiple: true,
      tokenSeparators: [';', '',','],
        ajax: {
          url: baseUrl+'people/getTagsforDropdown',
          dataType: 'json',
        }
      });

      $('#cmp_managed_by').select2({
        //placeholder:"Please Select Team",
        ajax: 
        {
          url: baseUrl+'company/getEmployeeforDropdown',
          dataType: 'json',
        }
      });
    $.validator.setDefaults(
    {
        ignore: []
    });
    $("#company_add").validate(
    {
        errorClass: "errormesssage",
        rules:
        {
          cmp_name: "required",
          cmp_website: {
            url: {
                depends : function(){
                    return ($('#cmp_website').val().length > 7)
                }
            }
          }
        },

        messages:
        {
          cmp_name: "Please Enter Company Name",
          cmp_website: {
            url: "Please enter valid website address"
          }
        },
        submitHandler: function(form)
        {
            try
            {
                var formData = new FormData();

                //********* IMAGE UPLOAD ***********//
                var file = document.getElementById('cmp_logo');
                var filejquery = $('#cmp_logo');
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
                      formData.append("cmp_logo", document.getElementById('cmp_logo').files[i]);
                    }

                  } else {
                    flag = true;
                    filejquery.css('border-color', '#ccc');
                    filejquery.next().css('color', 'none ');
                    filejquery.next().html('');
                  }
                }
                //********* IMAGE UPLOAD ***********//
                $("#cmp_website").val($("#cmp_website").val().replace("http://", ""));

                // console.log($("#cmp_tgs_id").val());
                formData.append("cmp_name"          , $("#cmp_name").val());
                formData.append("cmp_website"       , $("#cmp_website").val());
                formData.append("cmp_industry"      , $("#cmp_industry").val());
                formData.append("cmp_address"       , $("#cmp_address").val());
                formData.append("cmp_payment_terms" , $("#cmp_payment_terms").val());
                formData.append("cmp_pay_due"       , $("#cmp_pay_due").val());
                formData.append("cmp_pan"           , $("#cmp_pan").val());
                formData.append("cmp_gst_no"        , $("#cmp_gst_no").val());
                formData.append("cmp_stm_id"        , $("#cmp_stm_id").val());
                formData.append("cmp_type"          , $("#cmp_type").val());
                formData.append("cmp_anl_rev"       , $("#cmp_anl_rev").val());
                formData.append("cmp_employee"      , $("#cmp_employee").val());
                formData.append("cmp_managed_by"    , $("#cmp_managed_by").val());
                formData.append("cmp_type_id"       , $(".radio_company_account:checked").val());

                formData.append('cmp_location', $('#cmp_location').val());
                formData.append('cmp_google_lat', $('#cmp_google_lat').val());
                formData.append('cmp_google_long', $('#cmp_google_long').val());  

                formData.append("cmp_facebook"      , $("#cmp_facebook").val());
                formData.append("cmp_linkedin"      , $("#cmp_linkedin").val());
                formData.append("cmp_instagram"     , $("#cmp_instagram").val());
                formData.append("cmp_twitter"       , $("#cmp_twitter").val());
                formData.append("cmp_youtube"       , $("#cmp_youtube").val());

                if($("#cmp_logo")[0].files.length > 0)
                  formData.append("cmp_logo"          , $("#cmp_logo")[0].files[0]);

                if($("#cmp_tgs_id").val())
                  formData.append("cmp_tgs_id"    , $("#cmp_tgs_id").val());
                
                $('.btn_save').button('loading');

                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "company/company_insert",
                    data: formData,
                    dataType: "json",
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    success: function(response)
                    {
                        // if (response.success == true)
                        // {
                        //     swal(
                        //     {
                        //         title: "Done",
                        //         text: response.message,
                        //         type: "success",
                        //         icon: "success",
                        //         button: true,
                        //     })
                        //     setTimeout(function()
                        //     {
                        //         window.location.href = response.linkn;
                        //     },1000);
                        // }
                        // else
                        // {
                        //     $('.btn_save').button('reset');
                        //     swal(
                        //     {
                        //         title: "Opps",
                        //         text: "Something Went wrong",
                        //         type: "error",
                        //         icon: "error",
                        //         button: true,
                        //     });
                        // }
                      responsemsg(response,function(){
                        window.location.href = response.linkn;
                      });
                    }
                });
            }
            catch (e)
            {
                console.log(e);
            }
        },
        errorPlacement: function(error, element)
        {
          var group_div = $(element).closest('div.form-group')[0];
          var placement = $(group_div).find('.help-block');
          console.log(error)
          $(placement).append(error)
        }
    });

    $('#cmp_gst_no').on('keypress change', function()
    {
        $('#cmp_pan').val($(this).val().slice(2, ($(this).val().length - 1)));
    
        if($(this).val().length > 3)
            $('#cmp_pan').addClass('edited');
        else
            $('#cmp_pan').removeClass('edited');
    })
});
