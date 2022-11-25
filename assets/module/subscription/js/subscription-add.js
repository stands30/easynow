$(document).ready(function()
{
    $('#sub_status').getDefaultvalue();

    $("#sub_people").select2({
      width:'resolve',
      ajax: {
        url: baseUrl+'autodeployment/getPeopleforDropdown',
        dataType: 'json',
      }
    });

    $("#sub_company").select2({
      width:'resolve',
      ajax: {
        url: baseUrl+'autodeployment/getCompanyforDropdown',
        dataType: 'json',
      }
    });

    $('#sub_status').select2({
      ajax:
      {
        url: baseUrl + 'autodeployment/getSubscriptionStatus/sub_status',
        dataType: 'json',
      }
    });

    $("#sub_people").on('change', function(){
      $.ajax(
      {
          type: "POST",
          url: baseUrl + "autodeployment/getPeopleDataByID/"+$('#sub_people').val(),
          success: function(response)
          {
            response = JSON.parse(response);

            $('#sub_phone').val(response.ppl_mobile);
            $('#sub_email').val(response.ppl_email);
          }
      });

    });

    $.validator.setDefaults(
    {
        ignore: []
    });

    $("#sub_add").validate(
    {
        errorClass: "errormesssage",
        rules:
        {
          cmp_name: "required"
        },
        messages:
        {
          cmp_name: "Please Enter Client Name"
        },
        submitHandler: function(form)
        {
            /*try
            {*/
                var formData = new FormData();

                formData.append("cli_ppl_id"            , $('#sub_people').select2('data')[0].id);
                formData.append("cli_cmp_id"            , $('#sub_company').select2('data')[0].id);

                formData.append("cli_name"              , $('#sub_people').select2('data')[0].text);
                formData.append("cli_company"           , $('#sub_company').select2('data')[0].text);

                formData.append("cli_email"             , $('#sub_email').val());
                formData.append("cli_mobile"            , $('#sub_phone').val());
                formData.append("cli_domain"            , $('#sub_domain').val());

                $('.btn_save').button('loading');

                $.ajax(
                {
                    type: "POST",
                    url: auto_deployment_url,
                    data: formData,
                    dataType: "json",
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    success: function(response)
                    {
                      if(isNaN(response))
                          alert('Unable to Add Account');
                      else
                          alert('Account Created Successfully');

                      //responsemsg(response, function(){
                        $('.btn_save').button('reset');
                      //})
                    }
                });
            /*}
            catch (e)
            {
                console.log(e);
            }*/
        },
        errorPlacement: function(error, element)
        {
          var group_div = $(element).closest('div.form-group')[0];
          var placement = $(group_div).find('.help-block');
          $(placement).append(error)
        }
    });
});
