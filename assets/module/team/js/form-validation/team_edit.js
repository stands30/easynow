$(document).ready(function()
{
    $.validator.setDefaults(
    {
        ignore: []
    });
    $("#team_edit").validate(
    {
        errorClass: "errormesssage",
        rules:
        {
          emp_ppl_id: "required",
          emp_dept: "required"
        },
        messages:
        {
          emp_ppl_id: "Please Select a People",
          emp_dept: "Please Select a Department"
        },
        submitHandler: function(form)
        {
            try
            {
                var formData = new FormData();

                formData.append("emp_id"                , $("#emp_id").val());
                formData.append("emp_code"              , $("#emp_code").val());
                formData.append("emp_dept"              , $("#emp_dept").val());
                formData.append("emp_ppl_id"            , $("#emp_ppl_id").val());
                formData.append("emp_reporting_to"              , $("#emp_reporting_to").val());
                formData.append("emp_designation"       , $("#emp_designation").val());
                formData.append("emp_cmp_id"            , $("#emp_cmp_id").val());

                $('.btn_save').button('loading');

                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "team/team_update",
                    data: formData,
                    dataType: "json",
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    success: function(response)
                    {
                      responsemsg(response, function(){
                        $('.btn_save').css('display','inline-block');
                        $('.btn_processing').css('display','none');
                        if ($('.no-redirect').prop('checked'))
                          location.reload();
                        else {
                          setTimeout(function() {
                            window.location.href = response.linkn;
                          }, 1000);
                        }            
                      }, function(){
                        var message = 'Oops Something went wrong';
                        $('.btn_save').css('display', 'inline-block');
                        $('.btn_processing').css('display', 'none');
                      })
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


    var select2PeopleUrl    = baseUrl+'team/getPeopleforDropdown/';
    var select2DepartmentUrl    = baseUrl+'team/getDepartmentforDropdown/';
    var select2TeamUrl          = baseUrl+'team/getTeamDropdown/';

    $('#emp_ppl_id').select2({
      tags: true,
      placeholder:"Please Select People",
      ajax:
      {
        url: select2PeopleUrl,
        dataType: 'json',
      }
    });

    $('#emp_dept').select2({
      tags: true,
      placeholder:"Please Select Department",
      ajax:
      {
        url: select2DepartmentUrl,
        dataType: 'json',
      }
    });

    $('#emp_reporting_to').select2({
      tags: true,
      placeholder:"Please Select People",
      ajax:
      {
        url: select2TeamUrl,
        dataType: 'json',
      }
    });
    $('#emp_cmp_id').select2({
      tags: true,
      placeholder:"Please Select Company",
      ajax:
      {
        url: function()
        {
          return baseUrl+'team/getCompanyDropdown?emp_ppl='+$('#emp_ppl_id').val();
        },
        dataType: 'json',
      }
    });
});
