$(document).ready(function(){

  $(".mnu_status").select2({
  width:'resolve',
  placeholder:"Select Status",
    ajax: {
      url: baseUrl+'setting/getStatusDropdown',
      dataType: 'json',
    }
  });

  // $(".bpn_sts_edit").select2({
  // width:'resolve',
  // placeholder:"Select Status",
  //   ajax: {
  //     url: baseUrl+'businessParam/getStatusDropdown',
  //     dataType: 'json',
  //   }
  //
  // });

  $.validator.setDefaults({
       ignore: []
   });
	$("#mnu_add").validate({
    errorClass: "errormesssage",

		submitHandler: function(form) {
			try
			{

				var mnu_name        	  = document.getElementById("mnu_name").value;

        var mnu_link     		    = document.getElementById("mnu_link").value;

        var mnu_icon     		    = document.getElementById("mnu_icon").value;

        var mnu_order     		  = document.getElementById("mnu_order").value;

        var mnu_status     		  = document.getElementById("mnu_status").value;

				var formData = new FormData();

				formData.append("mnu_name",mnu_name);
        formData.append("mnu_link",mnu_link);
        formData.append("mnu_icon",mnu_icon);
        formData.append("mnu_order",mnu_order);
        formData.append("mnu_status",mnu_status);


				$.ajax({

					type: "POST",
	                url: baseUrl + "setting/menu_master_insert",
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



	        }
      });

      $("#mnu_edit").validate({
    		errorClass: "errormesssage",

    		submitHandler: function(form) {
    			try
    			{
            var mnu_id              = document.getElementById("mnu_id").value;

            var mnu_name        	  = document.getElementById("mnu_name").value;

            var mnu_link     		    = document.getElementById("mnu_link").value;

            var mnu_icon     		    = document.getElementById("mnu_icon").value;

            var mnu_order     		  = document.getElementById("mnu_order").value;

            var mnu_status     		  = document.getElementById("mnu_status").value;

            // console.log(epl_id);

    				var formData = new FormData();

            formData.append("mnu_id",mnu_id);
            formData.append("mnu_name",mnu_name);
            formData.append("mnu_link",mnu_link);
            formData.append("mnu_icon",mnu_icon);
            formData.append("mnu_order",mnu_order);
            formData.append("mnu_status",mnu_status);



    				$.ajax({

    					  type: "POST",
                url: baseUrl + "setting/menu_master_update",
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
