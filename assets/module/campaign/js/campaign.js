$(document).ready(function(){
   $('#cpn_type,#cpn_status').getDefaultvalue();
   var select2Url = baseUrl + 'campaign/getdropdown/';
 
    $('#cpn_status').select2({
    ajax: {
      url: select2Url + 'cpn_status',
      dataType: 'json',
    }
  });
    $('#cpn_type').select2({
    ajax: {
      url: select2Url + 'cpn_type',
      dataType: 'json',
    }
  });
    
	$.validator.setDefaults({
       ignore: []
   });
	$("#campaign_add").validate({
		errorClass: "errormesssage",
		errorPlacement: function(error, element)
        {
          var group_div = $(element).closest('div.form-group')[0];
          var placement = $(group_div).find('.errormesssage');
          $(placement).append(error)
        },
		submitHandler: function(form) {
			try
			{
        $('.btn_save').button('loading');
				$.ajax({
					type: "POST",
	        url: baseUrl + "campaign/campaign_insert",
	        data : {
	       	  name:$('#cpn_name').val(),
            type:$('#cpn_type').val(),
            status:$('#cpn_status').val(),
            start_date:$('#cpn_start_date').val(),
            end_date:$('#cpn_end_date').val(),
            budget_cost:$('#cpn_budget_cost').val(),
            revenue:$('#cpn_expected_revenue').val(),
            actual_cost:$('#cpn_actual_cost').val(),
            desc:$('#cpn_description').val(),
            message:$('#cpn_core_message').val(),
            cpn_id:$('#cpn_id').val()
	        },
	        dataType:"json",  
	        cache: false,           
	        success:function(response) {
	       	  responsemsg(response,function(){
              window.location.href = response.linkn;
            });
	        }
				});
			}catch(e){
				console.log(e);
			}
	  }
  });

  });
       