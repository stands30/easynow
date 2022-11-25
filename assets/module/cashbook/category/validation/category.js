 


$(document).ready(function(){
  var select2url = baseUrl+'cashbook_category/getGenPrmforDropdown/';

 $('.type-select2').select2({
    width:'resolve',
    placeholder:"Select type",
     ajax: 
        {
          url: select2url+'cashbook_type',
          dataType: 'json',
        }
    });
  $.validator.setDefaults({
       ignore: []
   });
   $("#category_add").validate({

     errorClass: "errormesssage",

    rules : {

      cbc_type : "required",
      cbc_name : "required",


    },
    messages: {
      cbc_type : "This field is required",
      cbc_name : "This field is required",

    },
    submitHandler: function(form) 
    {
      try
      {

        var cbc_type          = document.getElementById("cbc_type").value;
        var cbc_name          = document.getElementById("cbc_name").value;

        var formData = new FormData();

        formData.append("cbc_type",cbc_type);
        formData.append("cbc_name",cbc_name);

        $('.btn_save').button('loading');
        $.ajax({

          type: "POST",
                  url: baseUrl + "cashbook_category/insertCashbook_category",
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

   $("#category_edit").validate({

     errorClass: "errormesssage",

    rules : {

      cbc_type : "required",
      cbc_name : "required",


    },
    messages: {
      cbc_type : "This field is required",
      cbc_name : "This field is required",

    },
    submitHandler: function(form) 
    {
      try
      {

        var cbc_id            = document.getElementById("cbc_id").value;
        var cbc_type          = document.getElementById("cbc_type").value;
        var cbc_name          = document.getElementById("cbc_name").value;

        var formData = new FormData();

        formData.append("cbc_id",cbc_id);
        formData.append("cbc_type",cbc_type);
        formData.append("cbc_name",cbc_name);

        $('.btn_save').button('loading');
        $.ajax({

          type: "POST",
                  url: baseUrl + "cashbook_category/updateCashbook_category",
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
