$(document).ready(function()
{
  $('#piv_location').getDefaultvalue();
   $('#piv_cmp_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'inventory/getCompanyDropdown/?purchase_order=1';
      },
      dataType: 'json',
    }
  });
   $('#piv_type_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'inventory/getPODropdown/?cmp_id='+$('#piv_cmp_id').val();
      },
      dataType: 'json',
    }
  }).change(function(){
    getPOProducts();
  });
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
      url:baseUrl+'inventory/getProductDropdown/',
      dataType: 'json',
    }
  }).change(function(){
    updateProdDetails(this);
  });
    $('.prod_variant').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url:function(){
        return  baseUrl+'inventory/getProductVariantDropdown?product='+$(this).parents('.product_repeater_item').find('.prod_id').val();
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
    var piv_pending     = product_element.piv_pending;
    nexlog('product_element >>');
    nexlog(product_element);
    nexlog('product_element <<');
      if(prd_variant != '')
      {
        var prod_variant_option = '<option value="'+prd_variant_id+'" selected="selected">'+prd_variant+'</option>';
        prod_parent_div.find('.prod_variant').html(prod_variant_option).trigger('change');
      }
        prod_parent_div.find('.prod_price').val(prd_price).addClass('edited');
        if(prod_parent_div.find('.prod_qty').val() == '')
        {
          prod_parent_div.find('.prod_qty').val('').addClass('edited');
        }
         if(piv_pending == '' && piv_pending == '')
        {
          prod_parent_div.find('.prod_qty').val('').addClass('edited');
          prod_parent_div.find('.piv_pending_span').html('');
          prod_parent_div.find('.piv_pending_span').attr('data-piv_total','');
        }
        else
        {
          prod_parent_div.find('.prod_qty').val(piv_pending).addClass('edited');
          prod_parent_div.find('.piv_pending_span').html(piv_pending+' / '+piv_pending);
          prod_parent_div.find('.piv_pending_span').attr('data-piv_total',piv_pending);
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
    var piv_pending     = product_element.piv_pending;
    
      prod_parent_div.find('.prod_price').val(prd_price).addClass('edited');
        if(piv_pending == '' && piv_pending == '')
        {
          prod_parent_div.find('.prod_qty').val('').addClass('edited');
          prod_parent_div.find('.piv_pending_span').html('');
          prod_parent_div.find('.piv_pending_span').attr('data-piv_total','');
        }
        else
        {
          prod_parent_div.find('.prod_qty').val(piv_pending).addClass('edited');
          prod_parent_div.find('.piv_pending_span').html(piv_pending+' / '+piv_pending);
          prod_parent_div.find('.piv_pending_span').attr('data-piv_total',piv_pending);
        }
  }
}
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
initializeNumberFormatValidation();
 
}
var product_repeater = $('.repeater').repeater({
       isFirstItemUndeletable: true,
       show: function () {
           $(this).slideDown();
              $('.prod_id').select2({
                  /*placeholder: "Please Select Managed By *",*/
                  ajax: {
                    url:baseUrl+'inventory/getProductDropdown/',
                    dataType: 'json',
                  }
                }).change(function(){
                  updateProdDetails(this);
                });
                  $('.prod_variant').select2({
                  /*placeholder: "Please Select Managed By *",*/
                  ajax: {
                    url:function(){
                      return  baseUrl+'inventory/getProductVariantDropdown?product='+$(this).parents('.product_repeater_item').find('.prod_id').val();
                    },   
                    dataType: 'json',
                  }
              }).change(function(){
                  updateProdVariantDetails(this);
                });
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
  $("#inventory_module_form").validate(
    {
        errorClass: "errormesssage",
        
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
function getPOProducts()
{
  var piv_type_id = $('#piv_type_id').val();
  $.ajax(
        {
            type: "POST",
            url: baseUrl + "inventory/getPOProducts/"+piv_type_id,
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                product_repeater.setList(response);
                 for (i = 0; i < response.length; i++) 
                 {
                      var prdSelect2Val =
                        '<option value="'+response[i]["piv_prd_id"] +'" selected>'+response[i]["piv_prd_id_value"] +
                        "</option>";
                      $('select[name="product_repeater_item['+i+'][piv_prd_id_value]"]').html(prdSelect2Val);
                        nexlog(prdSelect2Val);
                   var parent_div = $('select[name="product_repeater_item[' + i + '][piv_prd_id]"]').parents('.product_repeater_item');
                   var prodSizeSelect2Val =
                        '<option value="'+response[i]["piv_prv_id"] +'" selected>'+response[i]["piv_prv_id_value"]+
                        "</option>";
                        nexlog(prodSizeSelect2Val);
                        nexlog( $('select[name="product_repeater_item[' + i + '][piv_prv_id]"]'));
                        if(response[i]["piv_prv_id"] != 0 && response[i]["piv_prv_id"] != null)
                        {
                         $('select[name="product_repeater_item[' + i + '][piv_prv_id_value]"]').html(prodSizeSelect2Val);
                        }else
                        {
                          $('select[name="product_repeater_item[' + i + '][piv_prv_id_value]"]').html('<option value="0" selected >Please Select <option>');
                        }
                       if(response[i]["piv_pending"] == '')
                        {
                         $('input[name="product_repeater_item['+i+'][piv_qty]"]').val(response[i]["piv_pending"]).addClass('edited');
                          $($('.piv_pending_span')[i]).html('');
                          $($('.piv_pending_span')[i]).attr('data-piv_total','');
                          $($('.piv_total_span')[i]).html(response[i]["total_stock"]);
                        }
                        else
                        {
                          $('input[name="product_repeater_item['+i+'][piv_qty]"]').val(response[i]["piv_pending"]).addClass('edited');
                          $($('.piv_pending_span')[i]).html(response[i]["piv_pending"]);
                          $($('.piv_pending_span')[i]).attr('data-piv_total',response[i]["piv_pending"]);
                          $($('.piv_total_span')[i]).html(response[i]["total_stock"]);
                        }
                      
                        nexlog('thisElement >>');
                         var product = parent_div.find('.prod_price');
                        nexlog($('input[name="product_repeater_item['+i+'][piv_qty]"]'));
                        nexlog('thisElement <<');
                        checkPendingValue($('input[name="product_repeater_item['+i+'][piv_qty]"]'));
                  }
                  assignCustomEvents();

            }
        });
}
function checkPendingValue(thisElement)
{
  nexlog(thisElement);
    var parent_div   = $(thisElement).parents('.product_repeater_item');
    var received_qty = parseFloat(parent_div.find('.prod_qty').val());
    var total_qty    = parseFloat(parent_div.find('.piv_pending_span').attr('data-piv_total'));
    nexlog('total_qty : '+total_qty+' || received_qty : '+received_qty);
    if(received_qty > total_qty)
    {
      swal(
            {
                title: "Opps",
                text: "Received Qty cannot be greater than pending qty",
                type: "error",
                icon: "error",
                button: true,
            });
      parent_div.find('.prod_qty').val(pending_qty);
    }
    else
    {
    var pending_qty  = total_qty-received_qty;
      parent_div.find('.piv_pending').val(pending_qty);
    }
}