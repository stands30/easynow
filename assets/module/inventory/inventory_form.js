$(document).ready(function()
{
  $('#piv_location').getDefaultvalue();
   $('#piv_location').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'inventory/getGenPrmforDropdown/'+$(this).attr('data-gen-grp');
      },
      dataType: 'json',
    }
  });
    $('.managed_by').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'inventory/getPeopleDropdown?managed_by=1';
      },
      dataType: 'json',
    }
  });
    $('.prod_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url:function(){
       
      return baseUrl+'inventory/getProductDropdown';
      },
      dataType: 'json',
    }
  }).change(function(){
    updateProdDetails(this);
  });
    $('.prod_variant').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
       url:function(){
           /* var other_variant='';
            var currentParentDiv = $(this).parents('.product_repeater_item');
            var currentProduct = currentParentDiv.find('.prod_id').val();
            var thisElementName = $(this).attr('name');
            $('.prod_variant').each(function()
            {
                  var currElementName = $(this).attr('name');
                  nexlog('thisElementName : '+thisElementName+' || currElementName : '+currElementName);
              if(thisElementName != currElementName)
              {
                  var currentElementParentDiv = $(this).parents('.product_repeater_item');
                  var currentElementProduct = currentParentDiv.find('.prod_id').val();
                  nexlog('currentProduct : '+currentProduct+' || currentElementProduct : '+currentElementProduct);
                   if( currentProduct == currentElementProduct )
                    {
                      other_variant += $(this).val()+',';
                    }
              }
                
            }); */
          var getParameter = '?product='+$(this).parents('.product_repeater_item').find('.prod_id').val();
           return  baseUrl+'inventory/getProductVariantDropdown'+getParameter;
        },   
      dataType: 'json',
    }
}).change(function(){
    updateProdVariantDetails(this);
  });
 initializeNumberFormatValidation();
});
function updateProdDetails(thisElement)
{
  nexlog(thisElement.value);
  if($(thisElement).select2('data')[0] && thisElement.value != 0)
  {
    var product_element = $(thisElement).select2('data')[0];
    var prod_parent_div = $(thisElement).parents('.product_repeater_item');
    var prd_variant     = product_element.prd_variant;
    var prd_variant_id  = product_element.prd_variant_id;
    var prd_price       = product_element.prd_price;
    nexlog('product_element >>');
    nexlog(product_element);
    nexlog(prd_variant);
    nexlog('product_element <<');
      if(prd_variant != '' &&  prd_variant != undefined)
      {
        var prod_variant_option = '<option value="'+prd_variant_id+'" selected="selected">'+prd_variant+'</option>';
        prod_parent_div.find('.prod_variant').html(prod_variant_option).trigger('change');
      }
        prod_parent_div.find('.prod_price').val(prd_price).addClass('edited');
        if(prod_parent_div.find('.prod_qty').val() == '')
        {
          prod_parent_div.find('.prod_qty').val('').addClass('edited');
        }
   
  }
}
function updateProdVariantDetails(thisElement)
{
  // nexlog($(thisElement).select2('data'));
  if($(thisElement).select2('data')[0])
  {
    var product_element = $(thisElement).select2('data')[0];
    var prod_parent_div = $(thisElement).parents('.product_repeater_item');
    var prd_price       = product_element.prv_price;
    
      prod_parent_div.find('.prod_price').val(prd_price).addClass('edited');
       if(prod_parent_div.find('.prod_qty').val() == '')
        {
          prod_parent_div.find('.prod_qty').val('').addClass('edited');
        }
  }
}
var product_repeater = $('.repeater').repeater({
       isFirstItemUndeletable: true,
       show: function () {
           $(this).slideDown();
              $('.prod_id').select2({
                  /*placeholder: "Please Select Managed By *",*/
                  ajax: {
                    url:function(){
                        /* var other_variant='';
                          var currentParentDiv = $(this).parents('.product_repeater_item');
                          var currentProduct = currentParentDiv.find('.prod_id').val();
                          var thisElementName = $(this).attr('name');
                          $('.prod_variant').each(function()
                          {
                                var currElementName = $(this).attr('name');
                                nexlog('thisElementName : '+thisElementName+' || currElementName : '+currElementName);
                            if(thisElementName != currElementName)
                            {
                                var currentElementParentDiv = $(this).parents('.product_repeater_item');
                                var currentElementProduct = currentParentDiv.find('.prod_id').val();
                                var currentElementVariant = currentParentDiv.find('.prod_variant').val();
                                nexlog('currentProduct : '+currentProduct+' || currentElementProduct : '+currentElementProduct);
                                 if( currentProduct == currentElementProduct )
                                  {
                                     if(currentElementVariant != null)
                                     {
                                        other_variant += currentElementVariant+',';
                                     }
                                  }
                            }
                              
                          });
                        var getParameter = '?other_variant='+other_variant;*/
                      
                    return baseUrl+'inventory/getProductDropdown';
                    },
                    dataType: 'json',
                  }
                }).change(function(){
                  updateProdDetails(this);
                });
                  $('.prod_variant').select2({
                  /*placeholder: "Please Select Managed By *",*/
                  ajax: {
                    url:function()
                    {
                        /*  var other_variant='';
                          var currentParentDiv = $(this).parents('.product_repeater_item');
                          var currentProduct = currentParentDiv.find('.prod_id').val();
                          var thisElementName = $(this).attr('name');
                          $('.prod_variant').each(function()
                          {
                                var currElementName = $(this).attr('name');
                                nexlog('thisElementName : '+thisElementName+' || currElementName : '+currElementName);
                            if(thisElementName != currElementName)
                            {
                                var currentElementParentDiv = $(this).parents('.product_repeater_item');
                                var currentElementProduct = currentParentDiv.find('.prod_id').val();
                                nexlog('currentProduct : '+currentProduct+' || currentElementProduct : '+currentElementProduct);
                                 if( currentProduct == currentElementProduct )
                                  {
                                    other_variant += $(this).val()+',';
                                  }
                            }
                              
                          });*/
                        var getParameter = '?product='+$(this).parents('.product_repeater_item').find('.prod_id').val();
                        return  baseUrl+'inventory/getProductVariantDropdown'+getParameter;
                      },    
                    dataType: 'json',
                  }
              }).change(function(){
                  updateProdVariantDetails(this);
                });
                 initializeNumberFormatValidation();
       },
       hide: function (deleteElement) {
           if(confirm('Are you sure you want to delete this element?')) {
               var delete_id = $(this).find('.prod_unique_id').val();
                if(delete_id != '') {
                  var prd_id = $('.delete_form_prod_id').val();
                  if(prd_id != '') {
                    var prd_delete_id = $('.delete_form_prod_id').val() + ',' + delete_id;
                  } else {
                    var prd_delete_id = delete_id;
                  }
                  $('.delete_form_prod_id').val(prd_delete_id);
                }
               $(this).slideUp(deleteElement);
               
           }
       }
   });
$(document).ready(function(){
  $("#inventory_module_form").validate(
    {
        errorClass: "errormesssage",
         rules: {
            piv_code: {
              remote: {
                url: baseUrl + 'inventory/checkUniqueCode/piv_code/',
                type: "post",
                data: {
                  value: function() {
                    return $('#piv_code').val();
                  },
                },
              },
            },
          },
          messages: {
            piv_code: {
              remote: function() {
                return "Above code is already generated";
              },
            },
          },
        /*errorPlacement: function(error, element) {
          $(element).parent('div').find('.custom-error').html(error);
        },*/
        submitHandler: function(form)
        {
            try
            {
              var por_qty = 0;
             $('.prod_qty').each(function(){
              por_qty+=$(this).val();
             });
             if(por_qty == 0)
             {
                   swal(
                {
                    title: "Opps",
                    text: "Qty cannot be zero",
                    type: "error",
                    icon: "error",
                    button: true,
                });
                   return false;
             }
              var dataString = $('#inventory_module_form').serialize(); 
              // $('.btn_save').button('loading');
                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "inventory/multi_form_data_save",
                    data: dataString,
                    dataType: "json",
                    success: function(response)
                    {
                      responsemsg(response,function(){
                                window.location.href = response.linkn;
                      });
                    }
                });
            }
            catch (e)
            {
                nexlog(e);
            }
        },
        errorPlacement: function(error, element)
        {
          var group_div = $(element).closest('div.form-group')[0];
          var placement = $(group_div).find('.custom-error');
          $(placement).append(error)
        }
    });
 });