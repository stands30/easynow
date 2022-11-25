$(document).ready(function()
{
   $('#location_from').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'stockTransfer/getGenPrmforDropdown/'+$(this).attr('data-gen-grp');
      },
      dataType: 'json',
    }
  }).change(function(){
    resetQty();
  });
   $('#location_to').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'stockTransfer/getGenPrmforDropdown/'+$(this).attr('data-gen-grp')+'?gnp_value='+$('#location_from').val();
      },
      dataType: 'json',
    }
  });
    $('.managed_by').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'stockTransfer/getPeopleDropdown?managed_by=1';
      },
      dataType: 'json',
    }
  });
    $('.prod_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
       url: function(){
        return baseUrl+'stockTransfer/getProductDropdown/?location_from='+$('#location_from').val();
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
        return  baseUrl+'stockTransfer/getProductVariantDropdown?product='+$(this).parents('.product_repeater_item').find('.prod_id').val()+'&location_from='+$('#location_from').val();
      },   
      dataType: 'json',
    }
}).change(function(){
    updateProdVariantDetails(this);
  });
assignCustomEvents();
});
function updateProdDetails(thisElement)
{
  if($(thisElement).select2('data')[0])
  {
    var product_element = $(thisElement).select2('data')[0];
    var prod_parent_div = $(thisElement).parents('.product_repeater_item');
    var prd_variant     = product_element.prd_variant;
    var prd_variant_id  = product_element.prd_variant_id;
    var prd_price       = product_element.prd_price;
    var total_stock       = product_element.total_stock;
    var unblocked_stock = product_element.unblocked_stock;
    nexlog('product_element >>');
    nexlog(product_element);
    nexlog('product_element <<');
      if(prd_variant != '')
      {
        var prod_variant_option = '<option value="'+prd_variant_id+'" selected="selected">'+prd_variant+'</option>';
        prod_parent_div.find('.prod_variant').html(prod_variant_option).trigger('change');
      }
        prod_parent_div.find('.prod_price').val(prd_price).addClass('edited');
       if(total_stock == '' && total_stock == '')
        {
          prod_parent_div.find('.prod_qty').val('').addClass('edited');
          prod_parent_div.find('.piv_total_span').html('');
          prod_parent_div.find('.piv_total_span').attr('data-piv_total','');
        }
        else
        {
          prod_parent_div.find('.prod_qty').val(total_stock).addClass('edited');
          prod_parent_div.find('.piv_total_span').html(unblocked_stock+' / '+total_stock);
          prod_parent_div.find('.piv_total_span').attr('data-piv_total',unblocked_stock);
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
    var total_stock       = product_element.total_stock;
    var unblocked_stock = product_element.unblocked_stock;
    
      prod_parent_div.find('.prod_price').val(prd_price).addClass('edited');
       if(total_stock == '' && total_stock == 0)
        {
          prod_parent_div.find('.prod_qty').val('').addClass('edited');
          prod_parent_div.find('.piv_total_span').html('');
          prod_parent_div.find('.piv_total_span').attr('data-piv_total','');
        }
        else
        {
          prod_parent_div.find('.prod_qty').val(total_stock).addClass('edited');
          prod_parent_div.find('.piv_total_span').html(unblocked_stock+' / '+total_stock);
          prod_parent_div.find('.piv_total_span').attr('data-piv_total',unblocked_stock);
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
                    url:baseUrl+'stockTransfer/getProductDropdown/',
                    dataType: 'json',
                  }
                }).change(function(){
                  updateProdDetails(this);
                });
                  $('.prod_variant').select2({
                  /*placeholder: "Please Select Managed By *",*/
                  ajax: {
                    url:function(){
                      return  baseUrl+'stockTransfer/getProductVariantDropdown?product='+$(this).parents('.product_repeater_item').find('.prod_id').val();
                    },   
                    dataType: 'json',
                  }
              }).change(function(){
                  updateProdVariantDetails(this);
                });
            assignCustomEvents();
       },
       hide: function (deleteElement) {
           if(confirm('Are you sure you want to delete this element?')) {
               nexlog($(this).find('.prod_unique_id'));
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
               setTimeout(function(){
                calAllProduct();
              },400);
           }
       }
   });
$(document).ready(function(){
  $("#module_form").validate(
    {
        errorClass: "errormesssage",
         rules: {
            piv_code: {
              remote: {
                url: baseUrl + 'stockTransfer/checkUniqueCode/piv_code/',
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
              var dataString = $('#module_form').serialize(); 
              // $('.btn_save').button('loading');
                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "stockTransfer/multi_form_data_save",
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
function assignCustomEvents()
{
    $('.prod_qty').off('keypress');
    $('.prod_qty').on('keypress',function(event){
     checkPendingValue(this);
    });
    $('.prod_qty').off('keyup');
    $('.prod_qty').on('keyup',function(event){
     checkPendingValue(this);
    });
 
}
function checkPendingValue(thisElement)
{
    var parent_div = $(thisElement).parents('.product_repeater_item');
    var received_qty = parent_div.find('.prod_qty').val();
    var total_qty = parent_div.find('.piv_total_span').attr('data-piv_total');
    nexlog('total_qty : '+total_qty+' || received_qty : '+received_qty);
    if(parseFloat(total_qty) < parseFloat(received_qty) )
    {
      swal(
            {
                title: "Opps",
                text: "Received Qty cannot be greater than Total qty",
                type: "error",
                icon: "error",
                button: true,
            });
      parent_div.find('.prod_qty').val(total_qty);
    }
}
function resetQty()
{
  var prd_option = '<option value=0 selected>Please Select</option>';
  $('.piv_pending_span').html('');
  $('.prod_id').html(prd_option).trigger('change');
  $('.prod_variant').html(prd_option).trigger('change');
  $('.piv_pending_span').attr('data-piv_total','');
  $('.prod_qty').val('');
  $('.prod_price').val('');
}