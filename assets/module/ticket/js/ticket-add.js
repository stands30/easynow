
	$(document).ready(function()
	{
	    $.validator.setDefaults(
	    {
	        ignore: []
	    });
	    $("#ticket_add").validate(
	    {
	        errorClass: "errormesssage",
	        rules:
	        {
	          tck_title: "required",
	          tck_desc: "required",
	          tck_priority: "required",
	          tck_progress_status: "required",
	          tck_user_ass_to: "required",
	          tck_type: "required",
	          tck_client_id: "required"
	        },
	        messages:
	        {
	          tck_title: "Please enter a Title",
	          tck_desc: "Please enter a Description",
	          tck_priority: "Please set a Priority",
	          tck_progress_status: "Please select a Status",
	          tck_user_ass_to: "Please select the assigned people",
	          tck_type: "Please select the ticket type",
	          tck_client_id: "Please select a company type"
	        },
	        submitHandler: function(form)
	        {
	            try
	            {
	                var formData = new FormData();

					var file = document.getElementById('tck_document');

					if(file.files.length != '0') 
					{
						for (var i = 0; i < file.files.length; i++) 
						{	
	                        formData.append("tck_document[]", document.getElementById('tck_document').files[i]);
					    }
					}

	                formData.append("tck_title"      		, $("#tck_title").val());
	                formData.append("tck_desc"   			, $("#summernote_1").val());
	                formData.append("tck_priority"  		, $("#tck_priority").val());
	                formData.append("tck_progress_status"  	, $("#tck_progress_status").val());
	                formData.append("tck_user_ass_to"  		, $("#tck_user_ass_to").val());
	                formData.append("tck_type"      		, $("#tck_type").val());
	                formData.append("tck_client_id"    	, $("#tck_client_id").val());
	                formData.append("tck_due_dt"    		, $("#tck_due_dt").val());

	                $('.btn_save').button('loading');

	                $.ajax(
	                {
	                    type: "POST",
	                    url: baseUrl + "ticket/ticket_insert",
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
	                            }, function()
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

	    var select2PeopleUrl = baseUrl+'ticket/getPeopleforDropdown/';
	    var select2CompanyUrl = baseUrl+'ticket/getCompanyforDropdown/';
	    var select2url = baseUrl+'people/getGenPrmforDropdown/';
	  
	    $('#tck_user_ass_to').select2({
	      tags: true,
	      placeholder:"Please Select People",
	      ajax: 
	      {
	        url: select2PeopleUrl,
	        dataType: 'json',
	      }
	    }); 
	  
	    $('#tck_client_id').select2({
	      tags: true,
	      placeholder:"Please Select Client",
	      ajax: 
	      {
	        url: select2CompanyUrl,
	        dataType: 'json',
	      }
	    }); 

        $('#tck_priority').select2({
			placeholder:"Please Select Priority",
			ajax: 
			{
				url: select2url+'ticket_proirity',
				dataType: 'json',
			}
		});

        $('#tck_progress_status').select2({
			placeholder:"Please Select Status",
			ajax: 
			{
				url: select2url+'ticket_status',
				dataType: 'json',
			}
		});

        $('#tck_type').select2({
			placeholder:"Please Select Ticket Type",
			ajax: 
			{
				url: select2url+'ticket_type',
				dataType: 'json',
			}
		});
	});