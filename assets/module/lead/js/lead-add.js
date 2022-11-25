
	$(document).ready(function()
	{
		$('#led_temp, #led_lead_status,#led_src,#led_type').getDefaultvalue();

		$('#led_cmp_id').select2();
		
	    $.validator.setDefaults(
	    {
	        ignore: []
	    });
	    $("#lead_add").validate(
	    {
	        errorClass: "errormesssage",
	        rules:
	        {
			  led_ppl_id: "required",
	          led_src: "required",
	          led_title: "required",
	          led_temp: "required",
	          //led_cmp_id: "required",
	          led_prod: "required",
	          led_amount: "required",
	          led_managed_by: "required",
	          led_lead_status: "required"
	        },
	        messages:
	        {
	          led_ppl_id: "Please select a People",
			  led_title: "Please Enter Title",
	          led_src: "Please Select source",
	          led_temp: "Please select Temp",
	          //led_cmp_id: "Please select Company",
	          led_prod: "Please select Product",
	          led_amount: "Please Enter Amount",
	          led_managed_by: "Please select Managed by 1",
	          led_lead_status: "Please Select Lead Status"
	        },
	        submitHandler: function(form)
	        {
	            try
	            {
	                var formData = new FormData();

	                formData.append("led_ppl_id"      	, $("#led_ppl_id").val());
		        	formData.append("led_title"   		, $("#led_title").val());
	                formData.append("led_src"   		, $("#led_src").val());
	                formData.append("led_temp"  		, $("#led_temp").val());
	                formData.append("led_cmp_id"  		, $("#led_cmp_id").val());
	                formData.append("led_ref_by"  		, $("#led_ref_by").val());
	                // formData.append("led_prod"  		, $("#led_prod").val());
	                formData.append("led_amount"      	, $("#led_amount").val());
	                formData.append("led_managed_by"    , $("#led_managed_by").val());
	                formData.append("led_remark"   		, $("#led_remark").val());
	                formData.append("led_lead_status"   , $("#led_lead_status").val());
	                formData.append("led_lead_stage"   	, $("#led_lead_stage").val());
	                formData.append("led_type"   	    , $("#led_type").val());
	                formData.append("led_campaign"   	, $("#led_campaign").val());
	                formData.append("led_pipeline"   	, $("#led_pipeline").val());
	                
	                $('.btn_save').button('loading');

	                $.ajax(
	                {
	                    type: "POST",
	                    url: baseUrl + "lead/lead_insert",
	                    data: formData,
	                    dataType: "json",
	                    contentType: false, // The content type used when sending data to the server.
	                    cache: false, // To unable request pages to be cached
	                    processData: false,
	                    success: function(response)
	                    { 
		                  // responsemsg(response, function(){
		                  //   $('.btn_save').css('display','inline-block');
		                  //   $('.btn_processing').css('display','none');
		                  //   if ($('.no-redirect').prop('checked'))
		                  //     location.reload();
		                  //   else {
		                  //     setTimeout(function() {
		                  //       window.location.href = response.linkn;
		                  //     }, 1000);
		                  //   }            
		                  // }, function(){
		                  //   var message = 'Oops Something went wrong';
		                  //   $('.btn_save').css('display', 'inline-block');
		                  //   $('.btn_processing').css('display', 'none');
		                  // })
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

		var select2PeopleUrl  = baseUrl+'people/getPeopleforDropdown/';
		var select2url        = baseUrl+'people/getGenPrmforDropdown/';
		var select2ProductUrl = baseUrl+'lead/getProductForDropdown/';
		var select2CompanyUrl = baseUrl+'lead/getLeadCompanyForDropdown/';

		$('#led_ppl_id, #led_ref_by').select2({
	      //placeholder:" ",
	       escapeMarkup: function(m) { 
		       return m; 
		    },
	      ajax:
	      {
	        url: select2PeopleUrl,
	        dataType: 'json',
	      }
	    });

	    $('#led_managed_by').select2({
          //placeholder:"Please Select Team",
          ajax: 
          {
            url: baseUrl+'lead/getEmployeeforDropdown',
            dataType: 'json',
          }
        });

		$('#led_src').select2({
	      //placeholder:"Please Select Source *",
	      ajax:
	      {
	        url: select2url + 'led_src',
	        dataType: 'json'
	      }
	    });

		$('#led_cmp_id').select2({
	      //placeholder:"Please Select Company *",
	      ajax:
	      {
	        url: select2CompanyUrl+'0', // To get Null data when no lead is selected
	        dataType: 'json',
	      }
	    });

		$('#led_lead_stage').select2({
	      //placeholder:"Please Select Stage *",
	      ajax:
	      {
	        url: function()
	        {
	        	 var led_pipeline = $('#led_pipeline').val();
                  return baseUrl+'lead/getLeadStageDropdown/'+led_pipeline;
	        },
	        dataType: 'json',
	      }
	    });

		$('#led_lead_status').select2({
	      //placeholder:"Please Select Status *",
	      ajax:
	      {
	        url: select2url + 'led_lead_status',
	        dataType: 'json',
	      }
	    });

		$('#led_prod').select2({
			multiple:true,
	      //placeholder:"Please Select Product *",
	      ajax:
	      {
	        url: select2ProductUrl,
	        dataType: 'json',
	      }
	    });

		$('#led_temp').select2({
	      //placeholder:"Please Select Temp *",
	      ajax:
	      {
	        url: select2url + 'led_temp',
	        dataType: 'json',
	      }
	    });
	     $('#led_type').select2({
		      tags: true,
		      //placeholder:"Please Select People",
		      ajax:
		      {
		        url: select2url+'led_type',
		        dataType: 'json',
		      }
		    }); 
		 $('#led_campaign').select2({
		      tags: true,
		      //placeholder:"Please Select People",
		      ajax:
		      {
		        url:  baseUrl+'people/getCampaignDropdown',
		        dataType: 'json',
		      }
		    });
		$('.blank_option').remove();

		$('#led_prod').on('change', function(){

			var prd_id = $(this).val();
			if(prd_id)
			{
				$.ajax({
					type: "POST",
					url : baseUrl + "lead/getProductTotalAmt",
					data: {
						'data': prd_id
					},
					success: function(response)
					{
						$('#led_amount').val($.trim(response)).addClass('edited');
					}
				})
			}
			else
				$('#led_amount').val('0').addClass('edited');
		})

		$('#led_ppl_id').on('change', function(){
			var select2CompanyUrl = baseUrl+'lead/getLeadCompanyForDropdown/';
			$('#led_cmp_id').select2({
				ajax:
				{
					url: select2CompanyUrl + $('#led_ppl_id').val(),
					dataType: 'json',
				}
		    });
		    setLeadCompany();
		})
	});


	function setLeadCompany()
	{
        $.ajax(
        {
            type: "POST",
            url: baseUrl + "lead/setLeadCompany/"+$('#led_ppl_id').val(),
            success: function(response)
            {
            	if(response == '[]')
            	{
            		$('#led_cmp_id').html('').trigger('change');
            		return;	
            	}

            	response = JSON.parse(response);

            	response = response[0];
            	console.log(response)
            	$('#led_cmp_id').html('<option value="'+response.id+'"">'+response.text+'</option>').trigger('change');
            }
        });

	}