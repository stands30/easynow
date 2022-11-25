$(document).ready(function(){

  $('#searchTags').select2({
  // tags: true,
  width:'resolve',
  placeholder:"Search Multiple tags",
  multiple: true,
  tokenSeparators: [';', '',','],
    ajax: {
      url: baseUrl+'people/getTagsforDropdown',
      dataType: 'json',
    }
  });

  $(".bpn_sts_add").select2({
  width:'resolve',
  placeholder:"Select Status",
    ajax: {
      url: baseUrl+'tags/getStatusDropdown',
      dataType: 'json',
    }
  });

  $(".bpn_sts_edit").select2({
  width:'resolve',
  placeholder:"Select Status",
    ajax: {
      url: baseUrl+'tags/getStatusDropdown',
      dataType: 'json',
    }

  });

  

  $.validator.setDefaults({
       ignore: []
   });
	$("#tags_add").validate({
    errorClass: "errormesssage",

		submitHandler: function(form) {
			try
			{

				var tgs_name        	= document.getElementById("tgs_name").value;

        var tgs_status        = document.getElementById("tgs_status").value;


				var formData = new FormData();

				formData.append("tgs_name",tgs_name);
        
        formData.append("tgs_status",tgs_status);


				$.ajax({

					type: "POST",
	                url: baseUrl + "tags/tags_insert",
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
                          }).then(()=>{
                            location.reload();

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

      $("#tags_edit").validate({
    		errorClass: "errormesssage",

    		submitHandler: function(form) {
    			try
    			{

            var tgs_name        	  = document.getElementById("tgs_name_e").value;

            var tgs_id        	    = document.getElementById("tgs_id").value;



            var tgs_status     		  = document.getElementById("tgs_status_e").value;

            // console.log(epl_id);

    				var formData = new FormData();

            formData.append("tgs_name",tgs_name);
            formData.append("tgs_id",tgs_id);

            formData.append("tgs_status",tgs_status);



    				$.ajax({

    					  type: "POST",
                url: baseUrl + "tags/tags_update",
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
                          pplTagsList();

                        });
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
