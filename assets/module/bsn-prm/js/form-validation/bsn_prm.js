$(document).ready(function(){

  $(".bpn_sts_add").select2({
  width:'resolve',
  placeholder:"Select Status",
    ajax: {
      url: baseUrl+'businessParam/getStatusDropdown',
      dataType: 'json',
    }
  });

  $(".bpn_sts_edit").select2({
  width:'resolve',
  placeholder:"Select Status",
    ajax: {
      url: baseUrl+'businessParam/getStatusDropdown',
      dataType: 'json',
    }

  });

  $.validator.setDefaults({
       ignore: []
   });
	$("#bsn_add").validate({
    errorClass: "errormesssage",
    
		submitHandler: function(form) {
			try
			{

				var bpm_name        	= document.getElementById("bpm_name").value;

        var bpm_value     		  = document.getElementById("bpm_value").value;

        var bpm_status          = document.getElementById("bpm_status").value;

        var bpm_desc     		  = document.getElementById("bpm_desc").value;

				var formData = new FormData();

				formData.append("bpm_name",bpm_name);
        formData.append("bpm_value",bpm_value);
        formData.append("bpm_status",bpm_status);
        formData.append("bpm_desc",bpm_desc);


				$.ajax({

					type: "POST",
	                url: baseUrl + "businessParam/bsn_prm_insert",
	                data : formData,
	                dataType:"json",
	                contentType: false,       // The content type used when sending data to the server.
	                cache: false,             // To unable request pages to be cached
	                processData:false,
	                success:function(response) {
	                	if(response.success == true)
	                	{
                            $("#close_add").click();
                          swal({
                             title:"Done",
                             text:response.message,
                             type: "success",
                             icon:"success",
                             button: true,
                          });
                          getBusParamList();
                            $("#bpm_name").val('');
                            $("#bpm_value").val('');

	                	}
	                	else
	                	{

                        swal({
                          title:"Opps",
                         text:"Something Went wrong",
                         icon:"error",
                         button: true,
                      });

	                	}
	                }
				});

			}catch(e){
				console.log(e);
			}
	        },
          errorPlacement: function(error, element){
              var group_div = $(element).closest('div.form-group')[0];
              var placement = $(group_div).find('.help-block');
              $(placement).append(error)
            }
      });

      $("#bsn_edit").validate({
    		errorClass: "errormesssage",

    		submitHandler: function(form) {
    			try
    			{

            var bpm_name        	  = document.getElementById("bpm_name_e").value;

            var bpm_id        	    = document.getElementById("bpm_id").value;

            var bpm_value     		  = document.getElementById("bpm_value_e").value;

            var bpm_status          = document.getElementById("bpm_status_e").value;

            var bpm_desc     		  = document.getElementById("bpm_desc_e").value;

            // console.log(epl_id);

    				var formData = new FormData();

            formData.append("bpm_name",bpm_name);
            formData.append("bpm_id",bpm_id);
            formData.append("bpm_value",bpm_value);
            formData.append("bpm_status",bpm_status);

            formData.append("bpm_desc",bpm_desc);



    				$.ajax({

    					  type: "POST",
                url: baseUrl + "businessParam/bsn_prm_update",
                data : formData,
                dataType:"json",
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success:function(response) {
                	if(response.success == true)
                	{
                          $("#close_edit").click();
                        swal({
                           title:"Done",
                           text:response.message,
                           type: "success",
                           icon:"success",
                           button: true,
                        }).then(()=>{
                          getBusParamList();

                        }
                     );
                	}
                	else
                	{
                      swal({
                        title:"Opps",
                       text:"Something Went wrong",
                       icon:"error",
                       button: true,
                    });

                	}
                }
    				});

    			}catch(e){
    				console.log(e);
    			}

    	        },
    			   errorPlacement: function(error, element){
              var group_div = $(element).closest('div.form-group')[0];
              var placement = $(group_div).find('.help-block');
              $(placement).append(error)
            }
          });

	// $('#blogadd').validate({ignore:[]});
});
