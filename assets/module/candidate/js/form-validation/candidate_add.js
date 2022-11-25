$(document).ready(function()
{
    $.validator.setDefaults(
    {
        ignore: []
    });
    $("#candidate_add").validate(
    {
        errorClass: "errormesssage",
        rules:
        {
          cdt_ppl_id: "required",
          cdt_role: "required",
          cdt_total_exp: "required",
          cdt_relative_exp: "required",
          cdt_notice_period: "required",
          cdt_exp_ctc: "required",
          cdt_cur_ctc: "required",
          cdt_skills: "required",
        },
        messages:
        {
          cdt_ppl_id: "Please Select a People",
          cdt_role: "Please Select a Role",
          cdt_total_exp: "Please Enter Total Experience",
          cdt_relative_exp: "Please Enter Relative Experience",
          cdt_notice_period: "Please Enter Notice Period",
          cdt_exp_ctc: "Please Enter Expected CTC",
          cdt_cur_ctc: "Please Enter Current CTC",
          cdt_skills: "Please Enter Skills"
        },
        submitHandler: function(form)
        {
            try
            {
                var formData = new FormData();

                formData.append("cdt_ppl_id"            , $("#cdt_ppl_id").val());
                formData.append("cdt_role"              , $("#cdt_role").val());
                formData.append("cdt_total_exp"         , $("#cdt_total_exp").val());
                formData.append("cdt_relative_exp"      , $("#cdt_relative_exp").val());
                formData.append("cdt_notice_period"     , $("#cdt_notice_period").val());
                formData.append("cdt_exp_ctc"           , $("#cdt_exp_ctc").val());
                formData.append("cdt_cur_ctc"           , $("#cdt_cur_ctc").val());
                formData.append("cdt_skills"            , $("#cdt_skills").val());
                formData.append("cdt_remark"            , $("#cdt_remark").val());

                $('.btn_save').button('loading');

                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "candidate/candidate_insert",
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


    var select2PeopleUrl    = baseUrl+'candidate/getPeopleforDropdown/';
    var select2url          = baseUrl+'candidate/getGenPrmforDropdown/';
  
    $('#cdt_ppl_id').select2({
      tags: true,
      placeholder:"Please Select People",
      ajax: 
      {
        url: select2PeopleUrl,
        dataType: 'json',
      }
    }); 

    $('#cdt_role').select2({
      placeholder:"Please Select Role",
      ajax: 
      {
        url: select2url+'cdt_role',
        dataType: 'json',
      }
    });
});