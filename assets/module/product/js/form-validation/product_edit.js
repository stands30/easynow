$(document).ready(function()
{
    $.validator.setDefaults(
    {
        ignore: []
    });
    $("#product_edit").validate(
    {
        errorClass: "errormesssage",
        rules:
        {

          prd_name: "required"

        },
        messages:
        {

          prd_name: "Please enter product name"
        },
        submitHandler: function(form)
        {
            try
            {
                var formData = new FormData();

                formData.append("prd_id"       , $("#prd_id").val());
                formData.append("prd_name"       , $("#prd_name").val());
                formData.append("prd_price"      , $("#prd_price").val());
                formData.append("prd_hsn_code"   , $("#prd_hsn_code").val());
                formData.append("prd_gst"        , $("#prd_gst").val());

                $('.btn_save').button('loading');

                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "product/product_update",
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
                        //     }).then(()=>
                        //     {
                        //         window.location.href = response.linkn;
                        //     });
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
          $(placement).append(error)
        }
    });

});
