$(function()
{
    $("#forgetPassword").validate(
    {
        errorClass: "errormesssage",
        rules:
        {
          ppl_email:
              {

                  remote: {
                          url: baseUrl+'login/peopleContactValidation/email',
                          type: "post",
                          data: {
                            value:function(){
                               return $('#ppl_email').val();
                          },
                      },
              },
            },
        },
        messages:
        {
          ppl_email: {
              remote : "Email id doesn't corresponds to any user "
          },
        },
        submitHandler: function(form)
        {
            try
            {
                var ppl_email = document.getElementById('ppl_email').value;

                data = {
                    ppl_email: ppl_email,
                }

                $('.btn_save').button('loading');

                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "login/forgotPasswordReset",
                    data: data,
                    dataType: "json",
                    beforeSend: function()
                    {
                        $("#forgetPass").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Sending');
                    },
                    success: function(response)
                    {
                        if (response.success == true)
                        {
                          swal({
                             title:"Done",
                             text:response.message,
                             type: "success",
                             icon:"success",
                             button: true,
                          }).then(()=>{
                              window.location.href=response.linkn;
                          }
                       );
                        }
                        else
                        {
                            $('.btn_save').button('reset');
                            $("#form_submit").html(' Sign In');
                            swal(response.message);
                        }
                    }
                });
            }
            catch (e)
            {
                console.log(e);
            }
        }
    });
});
