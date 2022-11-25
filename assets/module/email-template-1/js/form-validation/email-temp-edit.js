
	$(document).ready(function()
	{
	    // $.validator.setDefaults(
	    // {
	    //     ignore: []
	    // });
	    $("#email_temp_edit").validate(
	    {
	        errorClass: "errormesssage",
	        
	        submitHandler: function(form)
	        {
	            try
	            {
	                var formData = new FormData();

									var file = document.getElementById('emt_document');

									if(file.files.length != '0')
									{
										for (var i = 0; i < file.files.length; i++)
										{
					                formData.append("emt_document[]", document.getElementById('emt_document').files[i]);
								    }
									}

									formData.append("emt_id"      				      , $("#emt_id").val());
	                formData.append("emt_title"      				    , $("#emt_title").val());
	                formData.append("emt_description"   			  , $("#summernote_1").val());
	                formData.append("emt_sender"  				      , $("#emt_sender").val());
	                formData.append("emt_subject"  	            , $("#emt_subject").val());
	                formData.append("emt_cc"  			            , $("#emt_cc").val());
	                formData.append("emt_reply_to"      				, $("#emt_reply_to").val());




	                // $('.btn_save').button('loading');

	                $.ajax(
	                {
	                    type: "POST",
	                    url: baseUrl + "emailTemplate/email_temp_update",
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
		    errorPlacement: function(error, element) {
		      var group_div = $(element).closest('div.form-group')[0];
		      var placement = $(group_div).find('.help-block');
		      $(placement).append(error)
		    }
	    });


	});
