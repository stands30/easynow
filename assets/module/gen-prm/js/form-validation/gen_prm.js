$(document).ready(function(){

  $(".gen_prm_group").select2({
  width:'resolve',
  placeholder:"Select Parameter Group",
    ajax: {
      url: baseUrl+'genParameter/getGenGroupDropdown',
      dataType: 'json',
    }
  });

  // $(".event_name").select2({
  // width:'resolve',
  // placeholder:"Select Event name",
  //   ajax: {
  //     url: baseUrl+'event/getEventsDropdown',
  //     dataType: 'json',
  //   }
  // });

  // $.validator.setDefaults({
  //      ignore: []
  //  });
	$("#gen_prm_add").validate({
		errorClass: "errormesssage",
		submitHandler: function(form) {
			try
			{

				var gnp_name        	= document.getElementById("gnp_name").value;

        var gnp_value     		  = document.getElementById("gnp_value").value;

        var gnp_group     		  = document.getElementById("gnp_group").value;

        var gnp_order     		  = document.getElementById("gnp_order").value;

        var gnp_status     		  = document.getElementById("gnp_status").value;

        var gpn_id              = document.getElementById("gpn_id").value;

        var gpn_title              = document.getElementById("gpn_title").value;

        var gnp_description     		  = document.getElementById("gnp_description").value;

				var formData = new FormData();

				formData.append("gnp_name",gnp_name);
        formData.append("gnp_value",gnp_value);
        formData.append("gnp_group",gnp_group);
        formData.append("gpn_id",gpn_id);
        formData.append("gpn_title",gpn_title);
        formData.append("gnp_order",gnp_order);
        formData.append("gnp_status",gnp_status);
        formData.append("gnp_description",gnp_description);


				$.ajax({

					type: "POST",
	                url: baseUrl + "genParameter/gen_prm_insert",
	                data : formData,
	                dataType:"json",
	                contentType: false,       // The content type used when sending data to the server.
	                cache: false,             // To unable request pages to be cached
	                processData:false,
	                success:function(response) {
	                	// if(response.success == true)
	                	// {
                  //     $('.btn_save').css('display', 'inline-block');
                  //     $('.btn_processing').css('display', 'none');
                  //      swal({
                  //        title:"Done",
                  //        text:response.message,
                  //        type: "success",
                  //        icon:"success",
                  //        button: true,
                  //       }).then(()=>{
                  //         if($('.no-redirect').prop('checked'))
                  //           location.reload();
                  //         else {
                  //           setTimeout(function() {
                  //             window.location.href = response.linkn;
                  //           }, 1000);
                  //         }
                  //       });

                  //       setTimeout(function(){
                  //         $('.swal-button--confirm').click();
                  //       },1000)
	                	// }
	                	// else
	                	// {

                  //       swal({
                  //         title:"Opps",
                  //        text:"Something Went wrong",
                  //        icon:"error",
                  //        button: true,
                  //     });

	                	// }

                    responsemsg(response,function(){
                      window.location.href = response.linkn;
                    });
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

      $("#gen_prm_edit").validate({
    		errorClass: "errormesssage",

    		submitHandler: function(form) {
    			try
    			{

            var gnp_id        	= document.getElementById("gnp_id").value;

            var gnp_name        	= document.getElementById("gnp_name").value;

            // var gnp_value     		  = document.getElementById("gnp_value").value;

            var gnp_group     		  = document.getElementById("gnp_group").value;

            var gnp_order     		  = document.getElementById("gnp_order").value;

            var gnp_status     		  = document.getElementById("gnp_status").value;

            var gnp_description     		  = document.getElementById("gnp_description").value;

            var gpn_id              = document.getElementById("gpn_id").value;

            var gpn_title              = document.getElementById("gpn_title").value;

    				var formData = new FormData();

            formData.append("gnp_id",gnp_id);
    				formData.append("gnp_name",gnp_name);
            formData.append("gnp_group",gnp_group);
            formData.append("gpn_id",gpn_id);
            formData.append("gpn_title",gpn_title);
            formData.append("gnp_order",gnp_order);
            formData.append("gnp_status",gnp_status);
            formData.append("gnp_description",gnp_description);



    				$.ajax({

    					  type: "POST",
                url: baseUrl + "genParameter/gen_prm_update",
                data : formData,
                dataType:"json",
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success:function(response) {
                	// if(response.success == true)
                	// {
                 //        swal({
                 //           title:"Done",
                 //           text:response.message,
                 //           type: "success",
                 //           icon:"success",
                 //           button: true,
                 //        }).then(()=>{
                 //            window.location.href = response.linkn;
                 //        }
                 //     );
                        
                 //        setTimeout(function(){
                 //          $('.swal-button--confirm').click();
                 //        },1000)
                	// }
                	// else
                	// {

                 //      swal({
                 //        title:"Opps",
                 //       text:"Something Went wrong",
                 //       icon:"error",
                 //       button: true,
                 //    });

                	// }
                  responsemsg(response,function(){
                    window.location.href = response.linkn;
                  });
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
