
	$(document).ready(function()
	{
		$('#lfp_next_date').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true
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
	                formData.append("lfp_module_type"    	, $("#lfp_module_type").val());
	                formData.append("lfp_module_type_id"    , $("#lfp_module_type_id").val());
	                formData.append("lfp_next_date"     	, $("#lfp_next_date").val() + ' ' + $("#lfp_next_time").val());
	                formData.append("lfp_followup_status"   , $("#lfp_followup_status").val());
	                formData.append("lfp_type"      		, $("#lfp_type").val());
	                formData.append("lfp_instruction"   	, $("#lfp_instruction").val());
	                //formData.append("lfp_follow_by"      	, $("#lfp_follow_by").val());
	                formData.append("lfp_managed_by"      	, $("#lfp_managed_by").val());
	                formData.append("lfp_remark"      		, $("#lfp_remark").val());
	                formData.append("lfp_type_remark"      	, $("#lfp_type_remark").val());
                	formData.append("lfp_id"      			, $("#lfp_id").val());
	                formData.append("lfp_sendmail"      	, $("#lfp_sendmail").is(':checked'));

                	if($("#lfp_id").val() != '')
	                	callUrl = 'followup/followup_update';
	                else
	                	callUrl = 'followup/followup_insert';

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
	                            swal({
	                                title: "Done",
	                                text: response.message,
	                                type: "success",
	                                icon: "success",
	                                button: true,
	                            })
	                            
								setTimeout(function(){
	                            	location.reload();
									//window.location.href = response.linkn;
								}, 1000);
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

	    var select2PeopleUrl 			= baseUrl+'followup/getPeopleDropdown/';
	    var select2FollowUpTypeUrl 		= baseUrl+'followup/getFollowUpTypeDropdown/';
	    var select2FollowUpTypeIDUrl 	= baseUrl+'followup/getFollowUpTypeIDDropdown/';

	    $(' #lfp_managed_by').select2({
			tags: true,
			placeholder:"Please Select People",
			ajax:
			{
				url: baseUrl+'lead/getEmployeeforDropdown',
				dataType: 'json',
			}
	    });
	    

	    // $('#dashboard-report-range').daterangepicker({
     //            "ranges": {
     //                'Today': [moment(), moment()],
     //                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
     //                'Last 7 Days': [moment().subtract('days', 6), moment()],
     //                'Last 30 Days': [moment().subtract('days', 29), moment()],
     //                'This Month': [moment().startOf('month'), moment().endOf('month')],
     //                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
     //            },
     //            "locale": {
     //                "format": "MM/DD/YYYY",
     //                "separator": " - ",
     //                "applyLabel": "Apply",
     //                "cancelLabel": "Cancel",
     //                "fromLabel": "From",
     //                "toLabel": "To",
     //                "customRangeLabel": "Custom",
     //                "daysOfWeek": [
     //                    "Su",
     //                    "Mo",
     //                    "Tu",
     //                    "We",
     //                    "Th",
     //                    "Fr",
     //                    "Sa"
     //                ],
     //                "monthNames": [
     //                    "Jan",
     //                    "Feb",
     //                    "Mar",
     //                    "Apr",
     //                    "May",
     //                    "Jun",
     //                    "Jul",
     //                    "Aug",
     //                    "Sep",
     //                    "Oct",
     //                    "Nov",
     //                    "Dec"
     //                ],
     //                "firstDay": 1
     //            },
     //            //"startDate": "11/08/2015",
     //            //"endDate": "11/14/2015",
     //            opens: (App.isRTL() ? 'right' : 'left'),
     //        }, function(start, end, label) {
     //            $('#dashboard-report-range span').html(start.format('MMM D') + ' - ' + end.format('MMM D'));
     //        });

     //        $('#dashboard-report-range span').html(moment().subtract('days', 29).format('MMM D') + ' - ' + moment().format('MMM D'));
     //        $('#dashboard-report-range').show();
		/*$("#lfp_module_type_id").select2({
		    placeholder: "Please Select Followup ID",
		    ajax: {
				url: function(params) {
			        if($('#lfp_module_type').val() != 'null') {
			          return select2FollowUpTypeIDUrl + $('#lfp_module_type').val();
			        }
			        return false;
				},
				dataType: 'json',
		    }
		})*/
	});
