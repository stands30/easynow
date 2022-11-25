 



$(document).ready(function(){

   $('.category-select2').select2({
    width:'resolve',
    /*placeholder:"Select Category",*/
     ajax: 
        {
          url: baseUrl+'cashbook_sub_category/getCategoryforDropdown',
          dataType: 'json',
        }
    });

  $.validator.setDefaults({
       ignore: []
   });
   $("#sub_category_add").validate({

     errorClass: "errormesssage",

    rules : {

      csc_cbc_id : "required",
      csc_name : "required",


    },
    messages: {
      csc_cbc_id : "This field is required",
      csc_name : "This field is required",

    },
    submitHandler: function(form) 
    {
      try
      {

        var csc_cbc_id          = document.getElementById("csc_cbc_id").value;
        var csc_name          = document.getElementById("csc_name").value;

        var formData = new FormData();

        formData.append("csc_cbc_id",csc_cbc_id);
        formData.append("csc_name",csc_name);

        $('.btn_save').button('loading');
        $.ajax({

          type: "POST",
                  url: baseUrl + "cashbook_sub_category/insertCashbook_sub_category",
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

   $("#sub_category_edit").validate({

     errorClass: "errormesssage",

    rules : {

      csc_cbc_id : "required",
      csc_name : "required",


    },
    messages: {
      csc_cbc_id : "This field is required",
      csc_name : "This field is required",

    },
    submitHandler: function(form) 
    {
      try
      {

        var csc_id            = document.getElementById("csc_id").value;
        var csc_cbc_id          = document.getElementById("csc_cbc_id").value;
        var csc_name          = document.getElementById("csc_name").value;

        var formData = new FormData();

        formData.append("csc_id",csc_id);
        formData.append("csc_cbc_id",csc_cbc_id);
        formData.append("csc_name",csc_name);

        $('.btn_save').button('loading');
        $.ajax({

          type: "POST",
                  url: baseUrl + "cashbook_sub_category/updateCashbook_sub_category",
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
