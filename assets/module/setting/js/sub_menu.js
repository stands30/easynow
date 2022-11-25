$(document).ready(function(){

  $(".mnu_status").select2({
  width:'resolve',
  placeholder:"Select Status",
    ajax: {
      url: baseUrl+'setting/getStatusDropdown',
      dataType: 'json',
    }
  });

  $(".mnu_list").select2({
  width:'resolve',
  placeholder:"Select Menu",
    ajax: {
      url: baseUrl+'setting/getMenuDropdown',
      dataType: 'json',
    }
  });

  $(".sub_mnu_list").select2({
  width:'resolve',
  placeholder:"Select Sub menu",
    ajax: {
      url: baseUrl+'setting/getSubMenuDropdown?exclude='+$('#sbm_id').val(),
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
	$("#sub_menu_add").validate({
    errorClass: "errormesssage",

		submitHandler: function(form) {
			try
			{

				var sbm_mnu_id        	= document.getElementById("sbm_mnu_id").value;

        var sbm_parent_id     	= document.getElementById("sbm_parent_id").value;

        var sbm_name     		    = document.getElementById("sbm_name").value;

        var sbm_link     		    = document.getElementById("sbm_link").value;

        var sbm_icon     		    = document.getElementById("sbm_icon").value;

        var sbm_order     		  = document.getElementById("sbm_order").value;

        var sbm_status     		  = document.getElementById("sbm_status").value;

				var formData = new FormData();
				formData.append("sbm_mnu_id",sbm_mnu_id);
        formData.append("sbm_parent_id",sbm_parent_id);
        formData.append("sbm_name",sbm_name);
        formData.append("sbm_link",sbm_link);
        formData.append("sbm_icon",sbm_icon);
        formData.append("sbm_order",sbm_order);
        formData.append("sbm_status",sbm_status);


				$.ajax({

					type: "POST",
	                url: baseUrl + "setting/sub_menu_insert",
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

      $("#sub_menu_edit").validate({
    		errorClass: "errormesssage",

    		submitHandler: function(form) {
    			try
    			{
            var sbm_mnu_id        	= document.getElementById("sbm_mnu_id").value;

            var sbm_parent_id     	= document.getElementById("sbm_parent_id").value;

            var sbm_name     		    = document.getElementById("sbm_name").value;

            var sbm_link     		    = document.getElementById("sbm_link").value;

            var sbm_icon     		    = document.getElementById("sbm_icon").value;

            var sbm_order     		  = document.getElementById("sbm_order").value;

            var sbm_status     		  = document.getElementById("sbm_status").value;

            var sbm_id     		      = document.getElementById("sbm_id").value;

            // console.log(epl_id);

            var formData = new FormData();

            formData.append("sbm_id",sbm_id);
    				formData.append("sbm_mnu_id",sbm_mnu_id);
            formData.append("sbm_parent_id",sbm_parent_id);
            formData.append("sbm_name",sbm_name);
            formData.append("sbm_link",sbm_link);
            formData.append("sbm_icon",sbm_icon);
            formData.append("sbm_order",sbm_order);
            formData.append("sbm_status",sbm_status);

    				$.ajax({

    					  type: "POST",
                url: baseUrl + "setting/sub_menu_update",
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

	// $('#blogadd').validate({ignore:[]});
});
