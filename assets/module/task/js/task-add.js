
	$(document).ready(function()
	{
	    $.validator.setDefaults(
	    {
	        ignore: []
	    });
	    $("#task_add").validate(
	    {
	        errorClass: "errormesssage",
	        rules:
	        {
	          tsk_title: "required",


	        },
	        messages:
	        {
	          tsk_title: "Please enter a Title",


	        },
	        submitHandler: function(form)
	        {
	            try
	            {
	                var formData = new FormData();

									var file = document.getElementById('tsk_document');

									if(file.files.length != '0')
									{
										for (var i = 0; i < file.files.length; i++)
										{
					                formData.append("tsk_document[]", document.getElementById('tsk_document').files[i]);
								    }
									}

									formData.append("tsk_title"      				, $("#tsk_title").val());
	                formData.append("tsk_led_id"      			, $("#tsk_led_id").val());
	                formData.append("tsk_desc"   			      , $("#summernote_1").val());
	                formData.append("tsk_priority"  				, $("#tsk_priority").val());
	                formData.append("tsk_progress_status"  	, $("#tsk_progress_status").val());
	                formData.append("tsk_user_ass_to"  			, $("#tsk_user_ass_to").val());
	                formData.append("tsk_type"      				, $("#tsk_type").val());
	                formData.append("tsk_client_id"    			, $("#tsk_client_id").val());
									formData.append("tsk_due_dt"    				, $("#tsk_due_dt").val());
									formData.append("tsk_supporter"    			, $("#tsk_supporter").val());
									formData.append("tsk_reviewer"    			, $("#tsk_reviewer").val());
									formData.append("tsk_related_ppl"    		, $("#tsk_related_ppl").val());
									formData.append("tsk_related_prd"    		, $("#tsk_related_prd").val());
	                formData.append("tsk_related_cmp"    		, $("#tsk_related_cmp").val());



	                // $('.btn_save').button('loading');

	                $.ajax(
	                {
	                    type: "POST",
	                    url: baseUrl + "task/task_insert",
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
                         //        $('.btn_save').button('reset');
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
		    errorPlacement: function(error, element) {
		      var group_div = $(element).closest('div.form-group')[0];
		      var placement = $(group_div).find('.help-block');
		      $(placement).append(error)
		    }
	    });

	    $('.blank_option').remove();
	});
