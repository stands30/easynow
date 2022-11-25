$(document).ready(function()
{

      var amc_ppl_id = $('#amc_ppl_id').val();

       $(".amc_cmp_id").select2({
                  width:'resolve',
                  placeholder:"Please Select Company",
                    ajax: {

                      url: baseUrl+'amc/getCompanyDropdown/'+amc_ppl_id,
                      dataType: 'json',
                    }
                  });

       $(".amc_prd_id").select2({
                  width:'resolve',
                  placeholder:"Please Select Product",
                    ajax: {
                      url: baseUrl+'amc/getProductForDropdown',
                      dataType: 'json',
                    }
                  });

       $(".amc_ppl_id").select2({
                  width:'resolve',
                  placeholder:"Please Select People",
                    ajax: {
                      url: baseUrl+'amc/getPeopleForDropdown',
                      dataType: 'json',
                    }
                  }).change(function(){
                    // console.log();
                    $(".amc_cmp_id").select2({
                  width:'resolve',
                  placeholder:"Please Select Company",
                    ajax: {

                      url: baseUrl+'amc/getCompanyDropdown/'+this.value,
                      dataType: 'json',
                    }
                  });
                  });
       $(".amc_inv_id").select2({
                  width:'resolve',
                  placeholder:"Please Select Invoice",
                    ajax: {
                      url: baseUrl+'amc/getInvoiceForDropdown',
                      dataType: 'json',
                    }
                  });

       $(".amc_type_status").select2({
                  width:'resolve',
                  placeholder:"Please Select Status",
                    ajax: {
                      url: baseUrl+'amc/getGenPrmforDropdown/amc_type_status',
                      dataType: 'json',
                    }
                  });

    $.validator.setDefaults(
    {
        ignore: []
    });
    $("#amc_add").validate(
    {
        errorClass: "errormesssage",
        
        
        submitHandler: function(form)
        {
            try
            {
                $('.btn_save').button('loading');
                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "amc/amc_insert",
                    data : $(form).formObject(),
                    dataType:"json",
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
                        //     window.location.href = response.linkn;
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

    $("#amc_edit").validate(
    {
        errorClass: "errormesssage",
        
        
        submitHandler: function(form)
        {
            try
            {
              
        //          console.log($(form).formObject());
        // return; 
                $('.btn_save').button('loading');
                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "amc/amc_update",
                    data : $(form).formObject(),
                    dataType:"json",
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

                        //     window.location.href = response.linkn;
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
    $('#amc_type_status').getDefaultvalue();
});

$.fn.formObject = function()
{
  var formData = $(this).serializeArray();
  var objectData = {};

  for(var i = 0; i < formData.length; i++)
  {
    objectData[formData[i]['name']] = formData[i]['value'];
  }
  // objectData.vsv_subj_prpty_accomodation = $('#vsv_subj_prpty_accomodation').val();
  // objectData.vsv_prpty_desc_type_of_flat = $('#vsv_prpty_desc_type_of_flat').val();
  return objectData;
};


