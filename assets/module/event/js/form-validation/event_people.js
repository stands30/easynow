$(document).ready(function(){

  $(".event_people").select2({
  width:'resolve',
  placeholder:"Select People name",
    ajax: {
      url: baseUrl+'event/getPeopleDropdown',
      dataType: 'json',
    }
  });

  $(".event_name").select2({
  width:'resolve',
  placeholder:"Select Event name",
    ajax: {
      url: baseUrl+'event/getEventsDropdown',
      dataType: 'json',
    }
  });

  $.validator.setDefaults({
       ignore: []
   });
	$("#event_ppl_add").validate({
		errorClass: "errormesssage",

		submitHandler: function(form) {
			try
			{

				var epl_ppl_id        	= document.getElementById("epl_ppl_id").value;

        var epl_remark     		  = document.getElementById("epl_remark").value;

        var epl_evt_id     		  = document.getElementById("epl_evt_id").value;

				var formData = new FormData();

				formData.append("epl_ppl_id",epl_ppl_id);
        formData.append("epl_remark",epl_remark);
        formData.append("epl_evt_id",epl_evt_id);


				$.ajax({

					type: "POST",
          url: baseUrl + "event/event_people_insert",
          data : formData,
          dataType:"json",
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,
          success:function(response) {

            responsemsg(response, function(){
              $('.btn_save').css('display','inline-block');
              $('.btn_processing').css('display','none');
              if ($('.no-redirect').prop('checked'))
                location.reload();
              else {
                setTimeout(function() {
                  window.location.href = response.linkn;
                }, 1000);
              }            
            }, function(){
              var message = 'Oops Something went wrong';
              $('.btn_save').css('display', 'inline-block');
              $('.btn_processing').css('display', 'none');
            })
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

      $("#event_ppl_edit").validate({
    		errorClass: "errormesssage",

    		submitHandler: function(form) {
    			try
    			{

            var epl_ppl_id        	= document.getElementById("epl_ppl_id").value;

            var epl_remark     		= document.getElementById("epl_remark").value;

            var epl_id     		          = document.getElementById("epl_id").value;

            var epl_evt_id     		  = document.getElementById("epl_evt_id").value;

            // console.log(epl_id);

    				var formData = new FormData();

    				formData.append("epl_ppl_id",epl_ppl_id);
            formData.append("epl_remark",epl_remark);
            formData.append("epl_id",epl_id);
            formData.append("epl_evt_id",epl_evt_id);



    				$.ajax({

    					  type: "POST",
                url: baseUrl + "event/event_people_update",
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
                            window.location.href=response.linkn;
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
