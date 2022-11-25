$(document).ready(function(){
  $.validator.setDefaults({
       ignore: []
   });
   $("#reset_password").validate({
     errorClass: "errormesssage",
 		rules : {

 			ppl_pass : "required",

      ppl_confirm_pass: {
      required : true,
      equalTo  : "#ppl_pass"
    }
 		},
 		messages: {
 			ppl_pass : "Please enter password",


       ppl_confirm_pass :
       {
         required : "Please confirm passowrd",
         equalTo  : "Password doesn't matched"
       }

 		},
    submitHandler: function(form) {
			try
			{

				var ppl_pass        	= document.getElementById("ppl_pass").value;


        var ppl_id     		  = document.getElementById("ppl_id").value;




				var formData = new FormData();

				formData.append("ppl_pass",ppl_pass);
        formData.append("ppl_id",ppl_id);

        $('.btn_save').button('loading');
				$.ajax({

					type: "POST",
	                url: baseUrl + "login/reset_password",
	                data : formData,
	                dataType:"json",
	                contentType: false,       // The content type used when sending data to the server.
	                cache: false,             // To unable request pages to be cached
	                processData:false,
	                success:function(response) {

                    responsemsg(response, function(){
                      $('.btn_save').button('reset');
                      setTimeout(function(){
                        window.location.href=response.linkn;
                      })
                    })
                                      
                    /*if(response.success == true)
                    {
                      swal({
                         title:"Done",
                         text:response.message,
                         type: "success",
                         icon:"success",
                         button: true,
                      }).then(()=>{
                      }
                   );


                    }
                    else
                    {
                        swal({
                          title:"Opps",
                         text:"Something Went wrong",
                         type: "error",
                         icon:"error",
                         button: true,
                      });

	                	}*/
	                }
				});
			}
			catch(e){
				console.log(e);
			}
	        },
			 errorPlacement: function(error, element){
				error.appendTo( element.next('.help-block') );
			}
   });
});
