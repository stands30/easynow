
	$(document).ready(function()
	{
		$('#lfp_next_date').datetimepicker({
			format: 'dd/mm/yyyy hh:ii',
			autoclose:true
		});

	    $.validator.setDefaults(
	    {
	        ignore: []
	    });

	    $("#follow_up_form").validate(
	    {
	        errorClass: "errormesssage",
	        rules:
	        {
	          lfp_next_date: "required",
	          lfp_followup_status: "required",
	          lfp_type: "required"
	        },
	        messages:
	        {
	          lfp_next_date: "Please select Next Date",
	          lfp_followup_status: "Please select follow up Status",
	          lfp_type: "Please select a follow up type"
	        },
		    errorPlacement: function(error, element) {
		      var group_div = $(element).closest('div.form-group')[0];
		      var placement = $(group_div).find('.help-block');
		      $(placement).append(error)
		    },
	        submitHandler: function(form)
	        {
	            try
	            {
	                var formData = new FormData();

	                formData.append("old_lfp_type"      	, $("#renew_old_lfp_type").val());
	                formData.append("old_lfp_id"      		, $("#renew_old_lfp_id").val());
	                formData.append("lfp_module_type_id"      		, $("#lfp_module_type_id").val());
	                formData.append("lfp_next_date"     	, $("#lfp_next_date").val());
	                formData.append("lfp_followup_status"   , $("#lfp_followup_status").val());
	                formData.append("lfp_type"      		, $("#lfp_type").val());
	                //formData.append("lfp_follow_by"      	, $("#lfp_follow_by").val());
	                formData.append("lfp_instruction"   	, $("#lfp_instruction").val());
	                formData.append("lfp_remark"      		, $("#lfp_remark").val());
	                formData.append("lfp_type_remark"      	, $("#lfp_type_remark").val());

	                var callUrl = 'lead/lead_followup_insert';

	                if($("#lfp_id").val() != '')
	                {
	                	formData.append("lfp_id"      		, $("#lfp_id").val());
	                	callUrl = 'lead/lead_followup_update';
	                }

	                $.ajax(
	                {
	                    type: "POST",
	                    url: baseUrl + callUrl,
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
	                            
	                            });

	                            setTimeout(function(){
	                            	window.location.href = baseUrl + 'followup-list'
	                            },1000);
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
	        }
	    });

	    var select2PeopleUrl = baseUrl+'people/getPeopleforDropdown/';

	    $('#led_ppl_id, #led_ref_by, #led_managed_by_1, #led_managed_by_2').select2({
	      tags: true,
	      placeholder:"Please Select People",
	      ajax:
	      {
	        url: select2PeopleUrl,
	        dataType: 'json',
	      }
	    });
	});
