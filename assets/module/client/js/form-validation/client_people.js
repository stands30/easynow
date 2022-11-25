$(document).ready(function(){

  $(".client_people").select2({
  width:'resolve',
  placeholder:"Select People name",
    ajax: {
      url: baseUrl+'event/getPeopleDropdown',
      dataType: 'json',
    }
  });

  $(".client_name").select2({
  width:'resolve',
  placeholder:"Select Client name",
    ajax: {
      url: baseUrl+'client/getClientDropdown',
      dataType: 'json',
    }
  });

  $('.cpl_designation').select2({
    width: 'resolve',
    /* placeholder: "Select State ",*/
    ajax: {
      url: baseUrl + 'client/getDesignationDropdown',
      dataType: 'json',
    }
  })


  $.validator.setDefaults({
       ignore: []
   });
	$("#cmp_ppl_add").validate({
		errorClass: "errormesssage",

		submitHandler: function(form) {
			try
			{

				var cpl_ppl_id        	= document.getElementById("cpl_ppl_id").value;

        var cpl_designation     		  = document.getElementById("cpl_designation").value;

        var cpl_cmp_id     		  = document.getElementById("cpl_cmp_id").value;

				var formData = new FormData();

				formData.append("cpl_ppl_id",cpl_ppl_id);
        formData.append("cpl_designation",cpl_designation);
        formData.append("cpl_cmp_id",cpl_cmp_id);

				$.ajax({

					type: "POST",
	                url: baseUrl + "client/client_people_insert",
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
                            window.location.href = response.linkn;

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

      $("#cmp_ppl_edit").validate({
    		errorClass: "errormesssage",

    		submitHandler: function(form) {
    			try
    			{

            var cpl_ppl_id        	= document.getElementById("cpl_ppl_id").value;

            var cpl_designation     		  = document.getElementById("cpl_designation").value;

            var cpl_cmp_id     		  = document.getElementById("cpl_cmp_id").value;

            var cpl_id     		  = document.getElementById("cpl_id").value;

    				var formData = new FormData();

            formData.append("cpl_ppl_id",cpl_ppl_id);
    				formData.append("cpl_cmp_id",cpl_cmp_id);
            formData.append("cpl_designation",cpl_designation);
            formData.append("cpl_id",cpl_id);


    				$.ajax({

    					type: "POST",
    	                url: baseUrl + "client/client_people_update",
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
                                  window.location.href = response.linkn;
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
