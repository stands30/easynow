$(document).ready(function()
{
    $.validator.setDefaults(
    {
        ignore: []
    });
   var prd_id = $('#prd_id').val();
   if(prd_id == '')
  {
    $('#prd_category,#prd_unit,.prv_variant_id').getDefaultvalueById();
  }
     $('#prd_category').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'product/getGenPrmforDropdown/prd_category',
      dataType: 'json',
    }
  });
      $('.prv_variant_id').select2({
    /*placeholder: "Please Select Managed By *",*/
   ajax: {
      url:function(){
          var prv_variant=[];
          var thisElementName = $(this).attr('name');
          console.log(thisElementName);
          $('.prv_variant_id').each(function(){
          var currElementName = $(this).attr('name');
          console.log(currElementName);
           if(thisElementName != currElementName )
            {
              prv_variant.push($(this).val()); 
            }

          });

        return baseUrl+'product/getGenPrmforDropdown/product_size?product_size='+prv_variant.join();
        },
      dataType: 'json',
    }
  });
        $('#prd_unit').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'product/getGenPrmforDropdown/product_unit',
      dataType: 'json',
    }
  });
  
    $("#product_add").validate(
    {
        errorClass: "errormesssage",
        rules:
        {

          prd_name: "required"

        },
        messages:
        {

          prd_name: "Please enter product name"
        },
        submitHandler: function(form)
        {
            try
            {
                var formData = new FormData();

              var dataString = $('#product_add').serialize();
                $('.btn_save').button('loading');

                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "product/product_insert",
                    dataType: "json",
                      data: dataString,
                    dataType: "json",

                    success: function(response)
                    {
                        // if (response.success == true)
                        // {
                        //     swal(
                        //     {
                        //         title: "Done",
                        //         text: response.message,
                        //         type: "success",
                        //         icon: "success",
                        //         button: true,
                        //     }).then(()=>
                        //     {
                        //         window.location.href = response.linkn;
                        //     });
                        // }
                        // else
                        // {
                        //     $('.btn_save').button('reset');
                        //     swal(
                        //     {
                        //         title: "Opps",
                        //         text: "Something Went wrong",
                        //         type: "error",
                        //         icon: "error",
                        //         button: true,
                        //     });
                        // }
                        responsemsg(response,function(){
                            window.location.href = response.linkn;
                        });
                    }
                });
            }
            catch (e)
            {
                console.log(e);
            }
        },
        errorPlacement: function(error, element)
        {
          var group_div = $(element).closest('div.form-group')[0];
          var placement = $(group_div).find('.help-block');
          $(placement).append(error)
        }
    });

});

function assignCustomEvents()
{
  
 $(".numeric-decimal-format").inputFilter(function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); });
  $(".numeric-format").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });
/*$('.qtp_delete').off('click');
  $('.qtp_delete').on('click',function(){
   calculateProdPrice(this);
  });*/
  // checkIfNumber(event);
}
var prv_repeater = $('.repeater').repeater({
       isFirstItemUndeletable: true,
       show: function () {
           $(this).slideDown();
            $('.prv_variant_id ').select2({
                /*placeholder: "Please Select Managed By *",*/
                ajax: {
                  url:function(){
                      var prv_variant=[];
                      var thisElementName = $(this).attr('name');
                      console.log(thisElementName);
                      $('.prv_variant_id').each(function(){
                      var currElementName = $(this).attr('name');
                      console.log(currElementName);
                       if(thisElementName != currElementName )
                        {
                          prv_variant.push($(this).val()); 
                        }

                      });

                    return baseUrl+'product/getGenPrmforDropdown/product_size?product_size='+prv_variant.join();
                    },
                  dataType: 'json',
                }
              });
            assignCustomEvents();
       },
       hide: function (deleteElement) {
           if(confirm('Are you sure you want to delete this element?')) {
               nexlog($(this).find('.prv_id'));
               var delete_id = $(this).find('.prv_id').val();
                if(delete_id != '') {
                  var prv_id = $('#delete_prv_id').val();
                  if(prv_id != '') {
                    var prv_delete_id = $('#delete_prv_id').val() + ',' + delete_id;
                  } else {
                    var qtp_delete_id = delete_id;
                  }
                  $('#delete_prv_id').val(qtp_delete_id);
                }
               $(this).slideUp(deleteElement);
               setTimeout(function(){
                calAllProduct();
              },400);
           }
       }
   });
if(product_variant != '')
{
  nexlog(product_variant);
  nexlog('in here');
    prv_repeater.setList(product_variant);
    for (i = 0; i < product_variant.length; i++) {
            var prdsizeSelect2Val =
              '<option value="'+product_variant[i]["prv_variant_id"] +'" selected>'+product_variant[i]["prv_variant_name"] +
              "</option>";
            $('select[name="product_variant[' + i + '][prv_variant_id]"]').html(prdsizeSelect2Val).change();
        
          }
}