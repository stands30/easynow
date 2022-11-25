$(document).ready(function(){
  $.validator.setDefaults({
       ignore: []
   });
   $("#account_add").validate({

     errorClass: "errormesssage",

    rules : {

      acc_name : "required",
      acc_desc : "required",


    },
    messages: {
      acc_name : "This field is required",
      acc_desc : "This field is required",

    },
    submitHandler: function(form) 
    {
      try
      {

        var acc_name          = document.getElementById("acc_name").value;
        var acc_desc          = document.getElementById("acc_desc").value;

        var formData = new FormData();

        formData.append("acc_name",acc_name);
        formData.append("acc_desc",acc_desc);

        $('.btn_save').button('loading');
        $.ajax({

          type: "POST",
                  url: baseUrl + "account/insertAccount",
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
                      $('.btn_save').button('reset');
                        swal({
                          title:"Opps",
                         text:"Something Went wrong",
                         type: "error",
                         icon:"error",
                         button: true,
                      });

                    }
                  }
        });
      }
      catch(e)
      {
        console.log(e);
      }
    },
      errorPlacement: function(error, element){
        error.appendTo( element.next('.help-block') );
      }
   });

   $("#account_edit").validate({

     errorClass: "errormesssage",

    rules : {

      acc_name : "required",
      acc_desc : "required",


    },
    messages: {
      acc_name : "This field is required",
      acc_desc : "This field is required",

    },
    submitHandler: function(form) 
    {
      try
      {

        var acc_id            = document.getElementById("acc_id").value;
        var acc_name          = document.getElementById("acc_name").value;
        var acc_desc          = document.getElementById("acc_desc").value;

        var formData = new FormData();

        formData.append("acc_id",acc_id);
        formData.append("acc_name",acc_name);
        formData.append("acc_desc",acc_desc);

        $('.btn_save').button('loading');
        $.ajax({

          type: "POST",
                  url: baseUrl + "account/updateAccount",
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
                      $('.btn_save').button('reset');
                        swal({
                          title:"Opps",
                         text:"Something Went wrong",
                         type: "error",
                         icon:"error",
                         button: true,
                      });

                    }
                  }
        });
      }
      catch(e)
      {
        console.log(e);
      }
    },
      errorPlacement: function(error, element){
        error.appendTo( element.next('.help-block') );
      }
   });
});
