$(document).ready(function(){
  $.validator.setDefaults({
       ignore: []
   });
   $("#event_edit").validate({
     errorClass: "errormesssage",
 		rules : {

 			evt_name : "required",

 			// blg_slug : "required",


 			// img_alt : "required",

 		},
 		messages: {
 			evt_name : "Please enter event name",




 		},
    submitHandler: function(form) {
			try
			{
        var evt_id            = document.getElementById("evt_id").value;

				var evt_name        	= document.getElementById("evt_name").value;


        var evt_date     		  = document.getElementById("evt_date").value;

        var evt_desc          = document.getElementById("evt_desc").value;
        var evt_managed_by     		  = document.getElementById("evt_managed_by").value;

        // console.log(evt_desc);
        // console.log(evt_location);
        // console.log(evt_desc);
        // console.log(evt_desc);
				var formData = new FormData();

				formData.append("evt_name",evt_name);
        formData.append("evt_date",evt_date);
        formData.append("evt_desc",evt_desc);
        formData.append("evt_managed_by",evt_managed_by);
        formData.append("evt_id",evt_id);


        // console.log($('input[name=img]')[0].files[0]);
        // console.log($('input[name=img2]')[0].files[0]);
        $('.btn_save').css('display', 'none');
        $('.btn_processing').css('display', 'inline-block');
				$.ajax({

					type: "POST",
          url: baseUrl + "Event/event_update",
          data : formData,
          dataType:"json",
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,
          success:function(response) {
          	// $('.btn_save').css('display', 'inline-block');
           //  $('.btn_processing').css('display', 'none');
           
           //  if(response.success == true)
           //  {
           //    swal({
           //       title:"Done",
           //       text:response.message,
           //       type: "success",
           //       icon:"success",
           //       button: true,
           //    });

           //    setTimeout(function(){
           //        window.location.href=response.linkn;
           //    },1000);


           //  }
           //  else
           //  {
           //      swal({
           //        title:"Opps",
           //       text:"Something Went wrong",
           //       type: "error",
           //       icon:"error",
           //       button: true,
           //    });

           //  }
            responsemsg(response,function(){
                window.location.href = response.linkn;
            });
          }
				});
			}
			catch(e){
				console.log(e);
			}
	        },
			 errorPlacement: function(error, element) {
          var group_div = $(element).closest('div.form-group')[0];
          var placement = $(group_div).find('div.help-block');
          $(placement).append(error)
        }
   });
   
    $('#evt_managed_by').select2({
      //placeholder:"Please Select Team",
      ajax: 
      {
        url: baseUrl+'lead/getEmployeeforDropdown',
        dataType: 'json',
      }
    });
});
