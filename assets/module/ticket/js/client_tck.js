$(document).ready(function(){



  $(".tck_type").select2({
  width:'resolve',
  placeholder:"Select Status",
    ajax: {
      url: baseUrl+'ticket/getStatusDropdown',
      dataType: 'json',
    }

  });

  $(".tck_priority").select2({
  width:'resolve',
  placeholder:"Select Status",
    ajax: {
      url: baseUrl+'ticket/getStatusDropdown',
      dataType: 'json',
    }

  });

  $(".tck_status").select2({
  width:'resolve',
  placeholder:"Select Status",
    ajax: {
      url: baseUrl+'ticket/getStatusDropdown',
      dataType: 'json',
    }

  });

  $(".tck_user_ass_to").select2({
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

        var bpm_status     		  = document.getElementById("bpm_status").value;

				var formData = new FormData();

				formData.append("bpm_name",bpm_name);
        formData.append("bpm_value",bpm_value);
        formData.append("bpm_status",bpm_status);


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
                          swal({
                             title:"Done",
                             text:response.message,
                             type: "success",
                             icon:"success",
                             button: true,
                          }).then(()=>{
                            getBusParamList();
                            $("#close_add").click();

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

            var bpm_status     		  = document.getElementById("bpm_status_e").value;

            // console.log(epl_id);

    				var formData = new FormData();

            formData.append("bpm_name",bpm_name);
            formData.append("bpm_id",bpm_id);
            formData.append("bpm_value",bpm_value);
            formData.append("bpm_status",bpm_status);



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
                        swal({
                           title:"Done",
                           text:response.message,
                           type: "success",
                           icon:"success",
                           button: true,
                        },function(){
                          getBusParamList();
                          $("#close_edit").click();

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
    				error.appendTo( element.next('.help-block') );
    			}
          });

	// $('#blogadd').validate({ignore:[]});
});
