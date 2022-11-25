
	$(document).ready(function()
	{
		// $('#mtg_prod').prop('multiple','multiple');

	    // $.validator.setDefaults(
	    // {
	    //     ignore: []
	    // });

	    initiallizeSelect2();

	    $("#meeting_add").validate(
	    {
	        errorClass: "errormesssage",
	        rules:
	        {
				mtg_title 	: "required",
				mtg_fr_dt 	: "required",
				mtg_fr_time : "required",
				mtg_to_dt 	: "required",
				mtg_to_time : "required"
	        },
	        messages:
	        {
				mtg_title 	: "Please Enter Title",
				mtg_fr_dt 	: "Please Select From Date",
				mtg_fr_time : "Please Select From Time",
				mtg_to_dt 	: "Please Select To Date",
				mtg_to_time : "Please Select To Time"
	        },
	        submitHandler: function(form)
	        {
	            try
	            {
	                var formData = new FormData();

					var file = document.getElementById('mtg_document');

					if(file.files.length != '0')
					{
						for (var i = 0; i < file.files.length; i++)
						{
		                	formData.append("mtg_document[]", document.getElementById('mtg_document').files[i]);
					    }
					}

					formData.append("mtg_title"			, $("#mtg_title").val());
					formData.append("mtg_fr_dt"			, $("#mtg_fr_dt").val());
					formData.append("mtg_to_dt"			, $("#mtg_to_dt").val());
					formData.append("mtg_fr_time"		, $("#mtg_fr_time").val());
					formData.append("mtg_to_time"		, $("#mtg_to_time").val());
					formData.append("mtg_people"		, $("#mtg_people").val());
					formData.append("mtg_host"			, $("#mtg_host").val());
					formData.append("mtg_description"	, $("#summernote_1").val());
					formData.append("mtg_status"	, $("#mtg_status").val());
					formData.append("mtg_lead"			, $("#mtg_lead").val());
					formData.append("mtg_task"			, $("#mtg_task").val());
					formData.append("mtg_rlt_ppl"			, $("#mtg_rlt_ppl").val());
					formData.append("mtg_act"			, $("#mtg_act").val());

					// if($("#mtg_prod").val())
					// 	formData.append("mtg_prod"		, $("#mtg_prod").val());

					// formData.append("mtg_cmp"		, $("#mtg_cmp").val());

	                $('.btn_save').button('loading');

	                $.ajax(
	                {
	                    type: "POST",
	                    url: baseUrl + "meeting/meeting_insert",
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

	});

	function initiallizeSelect2()
	{
		var select2PeopleUrl  	= baseUrl+'meeting/getPeopleforDropdown/';
		var select2ProductUrl 	= baseUrl+'meeting/getProductForDropdown/';
		var select2CompanyUrl 	= baseUrl+'meeting/getCompanyForDropdown/';
		var select2TaskUrl 		= baseUrl+'meeting/getTaskForDropdown/';
  		var select2url        	= baseUrl+'meeting/getGenPrmforDropdown/';
  		var select2Leadurl      = baseUrl+'meeting/getLeadforDropdown/';
  		var select2Accurl      = baseUrl+'meeting/getAccountforDropdown/';

		$('#mtg_people').select2({
	     /* placeholder:"Please Select People *",*/
	      multiple: true,
	      ajax:
	      {
	        url: select2PeopleUrl + 'all',
	        dataType: 'json',
	      }
	    });

	    $('#mtg_rlt_ppl').select2({
	      placeholder:"Please Select People *",
	      multiple: true,
	      ajax:
	      {
	        url: select2PeopleUrl + 'all',
	        dataType: 'json',
	      }
	    });
		
		$('#mtg_host').select2({
	      placeholder:"Please Select Host *",
	      ajax:
	      {
	        url: select2PeopleUrl + 'all',
	        dataType: 'json',
	      }
	    });
		
		$('#mtg_lead').select2({
	      placeholder:"Please Select Lead *",
	      ajax:
	      {
	        url: select2Leadurl,
	        dataType: 'json',
	      }
	    });

		$('#mtg_cmp').select2({
	      placeholder:"Please Select Company *",
	      ajax:
	      {
	        url: select2CompanyUrl + 'company',
	        dataType: 'json',
	      }
	    });

		$('#mtg_prod').select2({
			multiple:true,
	     /* placeholder:"Please Select Product *",*/
	      ajax:
	      {
	        url: select2ProductUrl,
	        dataType: 'json',
	      }
	    });

		$('#mtg_task').select2({
	      placeholder:"Please Select Task *",
	      ajax:
	      {
	        url: select2TaskUrl,
	        dataType: 'json',
	      }
	    });

		$('#mtg_status').select2({
			placeholder:"Please Select Status",
			ajax:
			{
			  url: select2url+'mtg_status',
			  dataType: 'json',
			}
		});


		$('#mtg_act').select2({
			placeholder:"Please Select Account",
			ajax:
			{
			  url: select2Accurl,
			  dataType: 'json',
			}
		});
	    
		// $('.blank_option').remove();
	}