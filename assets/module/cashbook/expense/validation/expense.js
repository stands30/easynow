 var select2url = baseUrl+'expense/getGenPrmforDropdown/';

 $('.approval-select2').select2({
    width:'resolve',
    placeholder:"Select type",
     ajax: 
        {
          url: select2url+'approval_status',
          dataType: 'json',
        }
    });

 $('.category-select2').select2({
    width:'resolve',
    /*placeholder:"Select Category",*/
     ajax: 
        {
          url: baseUrl+'expense/getCategoryforDropdown',
          dataType: 'json',
        }
    });

function getSubCategoryDetails(category_id)
{
$('.sub-category-select2').empty();
 $('.sub-category-select2').select2({
    width:'resolve',
   /* placeholder:"Select Sub Category",*/
     ajax: 
        {
          url: baseUrl+'expense/getSubCategoryforDropdown/'+category_id,
          dataType: 'json',
        }
    });
}

$('.people-select2').select2({
    width:'resolve',
   /* placeholder:"Select Person",*/
     ajax: 
        {
          url: baseUrl+'expense/getPersonforDropdown',
          dataType: 'json',
        }
    });

$('.account-select2').select2({
    width:'resolve',
    placeholder:"Select Account",
     ajax: 
        {
          url: baseUrl+'expense/getAccountforDropdown',
          dataType: 'json',
        }
    });



$(document).ready(function(){
  $.validator.setDefaults({
       ignore: []
   });
   $("#expense_add").validate({

     errorClass: "errormesssage",

    rules : {

      csb_date : "required",
      csb_amount : "required",


    },
    messages: {
      csb_date : "This field is required",
      csb_amount : "This field is required",

    },
    submitHandler: function(form) 
    {
      try
      {

        var csb_type            = document.getElementById("csb_type").value;
        var csb_particular      = document.getElementById("csb_particular").value;
        var csb_amount          = document.getElementById("csb_amount").value;
        var csb_date            = document.getElementById("csb_date").value;
        var csb_approve         = document.getElementById("csb_approve").value;
        var csb_cbc_id          = document.getElementById("csb_cbc_id").value;
        var csb_csc_id          = document.getElementById("csb_csc_id").value;
        var csb_ppl_id          = document.getElementById("csb_ppl_id").value;
        var csb_acc_id          = document.getElementById("csb_acc_id").value;
        var csb_remark          = document.getElementById("csb_remark").value;

        var formData = new FormData();

        formData.append("csb_type",csb_type);
        formData.append("csb_particular",csb_particular);
        formData.append("csb_amount",csb_amount);
        formData.append("csb_date",csb_date);
        formData.append("csb_approve",csb_approve);
        formData.append("csb_cbc_id",csb_cbc_id);
        formData.append("csb_csc_id",csb_csc_id);
        formData.append("csb_ppl_id",csb_ppl_id);
        formData.append("csb_acc_id",csb_acc_id);
        formData.append("csb_remark",csb_remark);

        $('.btn_save').button('loading');
        $.ajax({

          type: "POST",
                  url: baseUrl + "expense/insertExpense",
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

   $("#expense_edit").validate({

     errorClass: "errormesssage",

    rules : {

      csb_date : "required",
      csb_amount : "required",


    },
    messages: {
      csb_date : "This field is required",
      csb_amount : "This field is required",

    },
    submitHandler: function(form) 
    {
      try
      {

        var csb_id              = document.getElementById("csb_id").value;
        var csb_type            = document.getElementById("csb_type").value;
        var csb_particular      = document.getElementById("csb_particular").value;
        var csb_amount          = document.getElementById("csb_amount").value;
        var csb_date            = document.getElementById("csb_date").value;
        var csb_approve         = document.getElementById("csb_approve").value;
        var csb_cbc_id          = document.getElementById("csb_cbc_id").value;
        var csb_csc_id          = document.getElementById("csb_csc_id").value;
        var csb_ppl_id          = document.getElementById("csb_ppl_id").value;
        var csb_acc_id          = document.getElementById("csb_acc_id").value;
        var csb_remark          = document.getElementById("csb_remark").value;

        var formData = new FormData();

        formData.append("csb_id",csb_id);
        formData.append("csb_type",csb_type);
        formData.append("csb_particular",csb_particular);
        formData.append("csb_amount",csb_amount);
        formData.append("csb_date",csb_date);
        formData.append("csb_approve",csb_approve);
        formData.append("csb_cbc_id",csb_cbc_id);
        formData.append("csb_csc_id",csb_csc_id);
        formData.append("csb_ppl_id",csb_ppl_id);
        formData.append("csb_acc_id",csb_acc_id);
        formData.append("csb_remark",csb_remark);

        $('.btn_save').button('loading');
        $.ajax({

          type: "POST",
                  url: baseUrl + "expense/updateExpense",
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

 function getSubCategoryDetails(category_id)
{
$('.custom_select2_label').html('');
 $('.sub-category-select2').select2({
    width:'resolve',
    placeholder:"Select Sub Category",
     ajax: 
        {
          url: baseUrl+'expense/getSubCategoryforDropdown/'+category_id,
          dataType: 'json',
        }
    });
}

