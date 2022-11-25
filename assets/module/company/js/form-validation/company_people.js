$(document).ready(function(){

  $(".company_people").select2({
  width:'resolve',
  placeholder:"Select People name",
    ajax: {
      url: baseUrl+'company/getPeopleDropdown',
      dataType: 'json',
    }
  });

  $(".company_name").select2({
  width:'resolve',
  placeholder:"Select Company name",
    ajax: {
      url: baseUrl+'company/getCompanyDropdown',
      dataType: 'json',
    }
  });

  $.validator.setDefaults({
       ignore: []
   });
	$("#cmp_ppl_add").validate({
		errorClass: "errormesssage",
    rules:
    {
      cpl_ppl_id: "required",
      cpl_cmp_id: "required"
    },
    messages:
    {
      cpl_ppl_id: "Please select a People First",
      cpl_cmp_id: "Please select a Company First"
    },
		submitHandler: function(form) {
			try
			{
				var cpl_ppl_id        	= document.getElementById("cpl_ppl_id").value;
        var cpl_designation     = document.getElementById("cpl_designation").value;
        var cpl_cmp_id     		  = document.getElementById("cpl_cmp_id").value;

				var formData = new FormData();

				formData.append("cpl_ppl_id",cpl_ppl_id);
        formData.append("cpl_designation",cpl_designation);
        formData.append("cpl_cmp_id",cpl_cmp_id);

				$.ajax({

					type: "POST",
	             url: baseUrl + "company/company_people_insert",
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
  				error.appendTo($(element[0].parentNode.parentNode).find('.help-block'));
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
    	                url: baseUrl + "company/company_people_update",
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
                          })

                          setTimeout(function(){
                            window.location.href = response.linkn;
                          },1000);
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
