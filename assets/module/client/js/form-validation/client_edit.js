$(document).ready(function()
{
  $(".cmp_industry").select2({
  width:'resolve',
  // placeholder:"Select industry name",
    ajax: {
      url: baseUrl+'client/getIndustryDropdown',
      dataType: 'json',
    }
  });

  $(".cmp_type").select2({
  width:'resolve',
 /* placeholder:"Select client type",*/
    ajax: {
      url: baseUrl+'client/getClientTypeDropdown',
      dataType: 'json',
    }
  });

  $(".cmp_anl_rev").select2({
  width:'resolve',
  /*placeholder:"Select client annual revenue",*/
    ajax: {
      url: baseUrl+'client/getClientAnnualDropdown',
      dataType: 'json',
    }
  });

  $(".cmp_stm_id").select2({
  width:'resolve',
 /* placeholder:"Select State ",*/
    ajax: {
      url: baseUrl+'client/getStateDropdown',
      dataType: 'json',
    }
  });

  $('.cmp_tgs_id').select2({
  tags: true,
  width:'resolve',
  //placeholder:"Enter Tags",
  multiple: true,
  tokenSeparators: [';', '',','],
    ajax: {
      url: baseUrl+'people/getTagsforDropdown',
      dataType: 'json',
    }
  });

    $.validator.setDefaults(
    {
        ignore: []
    });
    $("#client_edit").validate(
    {
        errorClass: "errormesssage",
        rules:
        {
          cmp_name: "required"
        },
        messages:
        {
          cmp_name: "Please Enter Company Name"
        },
        submitHandler: function(form)
        {
            try
            {
                var formData = new FormData();

                if($('#cmp_logo')[0].files.length > 0)
                {
                    formData.append('cmp_logo'      , $('#cmp_logo')[0].files[0]);
                }

                formData.append("cmp_id"        , $("#cmp_id").val());
                formData.append("cmp_name"      , $("#cmp_name").val());
                formData.append("cmp_website"   , $("#cmp_website").val());
                formData.append("cmp_industry"  , $("#cmp_industry").val());
                formData.append("cmp_logo"      , $("#cmp_logo").val());
                formData.append("cmp_address"   , $("#cmp_address").val());
           formData.append("cmp_payment_terms"  , $("#cmp_payment_terms").val());
                formData.append("cmp_pay_due"   , $("#cmp_pay_due").val());
                formData.append("cmp_pan"       , $("#cmp_pan").val());
                formData.append("cmp_gst_no"    , $("#cmp_gst_no").val());
                formData.append("cmp_stm_id"    , $("#cmp_stm_id").val());
                formData.append("cmp_type"      , $("#cmp_type").val());
                formData.append("cmp_anl_rev"   , $("#cmp_anl_rev").val());
                formData.append("cmp_employee"  , $("#cmp_employee").val());
                formData.append("cmp_tgs_id"   , $("#cmp_tgs_id").val());
                
                $('.btn_save').button('loading');

                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "client/client_update",
                    data: formData,
                    dataType: "json",
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    success: function(response)
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
                            }).then(()=>
                            {
                                window.location.href = response.linkn;
                            });
                        }
                        else
                        {
                            $('.btn_save').button('reset');
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
            catch (e)
            {
                console.log(e);
            }
        },
        errorPlacement: function(error, element)
        {
          var group_div = $(element).closest('div.form-group')[0];
          var placement = $(group_div).find('.help-block');
          $(placement).append(error)
        }
    });
});
