$(document).ready(function(){

  $('.gallery_type').select2({
  width:'resolve',
  /*placeholder:"Select gallery type",*/
    ajax: {
      url: baseUrl+'gallerySet/getGalleryDropdown',
      dataType: 'json',
    }
  });

  $.validator.setDefaults({
       ignore: []
   });
	$("#gallery_add").validate({
		errorClass: "errormesssage",
		rules : {

			gls_name : "required",


      gls_type : "required",

		},
		messages: {
			gls_name : "This field is required",

			gls_type : "Please select gallery type",

		},
		submitHandler: function(form) {
			try
			{

				var gls_name        	= document.getElementById("gls_name").value;

        var gls_type     		  = document.getElementById("gls_type").value;

        var gls_order_by     	= document.getElementById("gls_order_by").value;



        if(typeof($('input[name=img]')[0].files[0]) == 'undefined')
				{
					swal({
						title:"Please select image for Gallery Set",
					 text:"Select image",
					 icon:"error",
           type: "error",
					 button: true,
				});
				}
				else{

				var formData = new FormData();
				formData.append('img', $('input[name=img]')[0].files[0]);
				formData.append("gls_name",gls_name);
        formData.append("gls_type",gls_type);
        formData.append("gls_order_by",gls_order_by);
        $('.btn_save').button('loading');
				$.ajax({

					type: "POST",
	                url: baseUrl + "gallerySet/gallery_set_insert",
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
	                		if(response.message == '1')
	                		{
	                			// alert('Invalid File type or size');
                        $('.btn_save').button('reset');
                        swal({
                         title:"Opps",
                         text:"Invalid File type or size for list image",
                         icon:"error",
                         button: true,
                      });
                    }
	                		else
	                		{
                        $('.btn_save').button('reset');
                        swal({
                          title:"Opps",
                         text:"Something Went wrong",
                         icon:"error",
                         button: true,
                      });
	                		}
	                	}
	                }
				});
			}
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
