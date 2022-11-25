$(function()
{
    $("#login_form").validate(
    {
        errorClass: "errormesssage",
        rules:
        {
          usr_username: "required",
          usr_password: "required"
        },
        messages:
        {
          /*usr_username: "Please Enter Username",
          usr_password: "Please Enter a Password"*/
        },
        submitHandler: function(form)
        {
            try
            {
                var usr_username = document.getElementById('usr_username').value;
                var usr_password = document.getElementById('usr_password').value;
                if (document.getElementById('rememberme').checked)
                {
                    var rememberme = 1;
                }
                else
                {
                    var rememberme = 0;
                }
                var ref = $('#ref').val();
                data = {
                    usr_username: usr_username,
                    usr_password: usr_password,
                    rememberme: rememberme,
                    ref: ref
                }

                $('.btn_save').button('loading');

                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "login",
                    data: data,
                    dataType: "json",
                    beforeSend: function()
                    {
                        $("#form_submit").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Connecting');
                    },
                    success: function(response)
                    {
                        if (response.success == true)
                        {
                            window.location.href = response.linkn;
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