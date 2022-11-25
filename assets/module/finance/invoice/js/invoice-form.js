$(document).ready(function()
{
  if(inv_id  != '')
  {
    // $('#inv_billing_cmp').attr('disabled','disabled');
  }
  else
  {
    $('#inv_currency,#inv_shipping').getDefaultvalueById();
  }
    $.validator.setDefaults(
    {
        ignore: []
    });
    $('.blank_option').remove();
    $('#inv_currency').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'invoice/getGenPrmforDropdown/finance_currency',
      dataType: 'json',
    }
  });
    $('#inv_shipping').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'invoice/getGenPrmforDropdown/finance_shipping',
      dataType: 'json',
    }
  });
     $('#inv_cmp_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    allowClear: true,
    ajax: {
      url: function(){
        return baseUrl+'invoice/getCompanyDropdown?lead='+$('#inv_led_id').val();
      },
      dataType: 'json',
    }
  }).change(function(){
    getCompDetails(this);
   });

   $('#inv_billing_cmp').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'invoice/getBillingCompanyDropdown';
      },
      dataType: 'json',
    }
  }).change(function(){
    getBillingCompDetails(this);
  });
      $('#inv_billing_people').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'invoice/getPeopleDropdown?company='+$('#inv_cmp_id').val();
      },
      dataType: 'json',
    }
  });
  $('#inv_shipping_people').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'invoice/getPeopleDropdown?lead='+$('#inv_led_id').val(),
      dataType: 'json',
    }
  });
    $('#inv_led_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'invoice/getLeadDropdown',
      dataType: 'json',
    }
  });
    $('#inv_led_id').change(function(){
      updateLeadData(this);
    });
       $('.inp_size').select2({
        /*placeholder: "Please Select Managed By *",*/
        ajax: {
          url: baseUrl+'quotation/getGenPrmforDropdown/product_size',
          dataType: 'json',
        }
      });
       $('.inp_unit').select2({
        /*placeholder: "Please Select Managed By *",*/
        ajax: {
          url: baseUrl+'quotation/getGenPrmforDropdown/product_unit',
          dataType: 'json',
        }
      });
    function updateLeadData(thisElement)
    {
      // nexlog('inv led change event >>');
      $('#inv_cmp_id').val('').change();
      var led_val = $(thisElement).val();
      // nexlog(' led_val : '+led_val);
      $('#inv_title').val('').addClass('edited');
      if(led_val != '0')
      {
        // nexlog($(thisElement).select2('data')[0]);
        var led_title    = $(thisElement).select2('data')[0].text;
        var led_ppl_id   = $(thisElement).select2('data')[0].ppl_id;
        var led_ppl_name = $(thisElement).select2('data')[0].ppl_name;
        var led_cmp_id   = $(thisElement).select2('data')[0].led_cmp_id;
        var led_cmp_name = $(thisElement).select2('data')[0].led_cmp_name;
        var led_cmp_address = $(thisElement).select2('data')[0].led_cmp_address;
        var led_cmp_gst = $(thisElement).select2('data')[0].led_cmp_gst_no;
        var led_cmp_state = $(thisElement).select2('data')[0].led_cmp_state;
        var led_cmp_payment_terms = $(thisElement).select2('data')[0].led_cmp_payment_terms;
        // nexlog(' led_cmp_state : '+led_cmp_state+' led_cmp_payment_terms : '+led_cmp_payment_terms);
        $('#inv_title').val(led_title).addClass('edited');
        var inv_billing_people = '<option value="'+led_ppl_id+'" selected="selected">'+led_ppl_name+'</option>';
        // nexlog(inv_billing_people);
        $('#inv_billing_people').html(inv_billing_people).change();
        if(led_cmp_name !='')
        {
          var inv_cmp = '<option value="'+led_cmp_id+'" selected="selected" data-cmp_address="'+led_cmp_address+'" data-cmp_gst_no="'+led_cmp_gst+'"> '+led_cmp_name+'</option>';
          // nexlog('inv_cmp : '+inv_cmp);
            $('#inv_cmp_id').html(inv_cmp);
            $('#inv_billing_addr').val(led_cmp_address).trigger('change');
            $('#inv_billing_gst').val(led_cmp_gst);
            $('#inv_cmp_state').val(led_cmp_state);
            $('#inv_payment_terms').val(led_cmp_payment_terms);
            cloneBillingAddressToShippingAddress();
        }
        
      }
      // nexlog('inv led change event <<')
  
    }
     $('.inv_disc_type').select2({
    
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'invoice/getGenPrmforDropdown/finance_disc_type',
      dataType: 'json',
    }
  });
       $('.inp_product').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'invoice/getProductDropdown',
      dataType: 'json',
    }
  }).change(function(){
    getProductPrice(this);
    calculateProdPrice(this);
   });
    $("#invoice_form").validate(
    {
        errorClass: "errormesssage",
         rules: {
            inv_code: {
              remote: {
                url: baseUrl + 'invoice/checkinvoiceUnique/inv_code/'+$("#inv_id").val(),
                type: "post",
                data: {
                  value: function() {
                    return $('#inv_code').val();
                  },
                },
              },
            },
          },
          messages: {
            inv_code: {
              remote: function() {
                return $("#inv_code").val()+" is already generated";
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
              var billing_cmp = checkBillingComp();
              if(billing_cmp == false)
              {
                return;
              }
               var acc_cmp = checkAccountComp();
              if(acc_cmp == false)
              {
                return;
              }
              var inv_tax_computation='';
                   if($('#inv_tax_computation').length > 0 && $('#inv_tax_computation').prop("checked") == true)
                  {
                    inv_tax_computation= '&inv_tax_computation='+$('#inv_tax_computation').val();
                  }
                var dataString = $('#invoice_form').serialize()+'&inv_code=' + $('#inv_code').val()+'&inv_tax_computation='+inv_tax_computation;
                // $('.btn_save').button('loading');
                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "invoice/invoice_data_save",
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
                // nexlog(e);
            }
        },
        errorPlacement: function(error, element)
        {
          var group_div = $(element).closest('div.form-group')[0];
          var placement = $(group_div).find('.custom-error');
          $(placement).append(error)
        }
    });
    assignCustomEvents();
 $('#inv_disc_type').change(function(event){
   calGrandTotal();
  });
  $('#inv_disc').on('keyup',function(event){
   calGrandTotal();
  });
  $('#inv_disc').on('keypress',function(event){
   calGrandTotal();
  });
  $('#inv_billing_addr,#inv_billing_gst,#inv_billing_people').on('keyup',function(event){
   cloneBillingAddressToShippingAddress();
  });
  $('#inv_billing_addr,#inv_billing_gst,#inv_billing_people').on('keypress',function(event){
   cloneBillingAddressToShippingAddress();
  });
  $('#inv_billing_addr,#inv_billing_gst,#inv_billing_people').on('change',function(event){
   cloneBillingAddressToShippingAddress();
  });
 $('#inv_billing_addr,#inv_billing_gst,#inv_billing_people').on('input',function(event){
   cloneBillingAddressToShippingAddress();
  });
});
/*
 ****** Calculation Functions ********
*/
function getProductPrice(thisElement)
{
      var prd_price = '';
      if($(thisElement).val() != null)
      {
          prd_price = $(thisElement).select2('data')[0].prd_price;
          prd_desc = $(thisElement).select2('data')[0].text;
          prd_gst = $(thisElement).select2('data')[0].prd_gst;
      }
      var parent_div = $(thisElement).parents('.inv_product_div');
      parent_div.find('.inp_rate').val('');
      parent_div.find('.inp_rate').val(prd_price).addClass('edited');
      parent_div.find('.inp_desc').val('');
      parent_div.find('.inp_desc').val(prd_desc).addClass('edited');
      parent_div.find('.inp_prd_gst').val('');
      parent_div.find('.inp_prd_gst').val(prd_gst).addClass('edited');
      parent_div.find('.inp_tax_percent_span').html(' ('+prd_gst+'%)');
      var prd_qty = parent_div.find('.inp_qty').val();
      if(prd_qty  != '' || prd_qty != '0')
      {
        // nexlog(prd_qty);
          parent_div.find('.inp_qty').val('1').addClass('edited');
      }
      
   calculateProdPrice(thisElement);
}
function getBillingCompDetails(thisElement)
{
  if($(thisElement).select2('data')[0])
    {
      var state = $(thisElement).select2('data')[0].cmp_state; 
      $('#inv_billing_cmp_state').val(state);
      var cmp_payment_terms = $(thisElement).select2('data')[0].cmp_payment_terms;
      // nexlog($(thisElement).select2('data')[0]);
      $('#inv_payment_terms').val(cmp_payment_terms).addClass('edited');
    }
}
function getCompDetails(thisElement)
{
      var inv_billing_addr = '';
      var inv_billing_gst  = '';
      var inv_billing_state  = '';
      var inv_billing_people_id  = 0;
      var inv_billing_people_name  = 'Please Select';
      if($(thisElement).val() != null)
      {
        inv_billing_addr = $(thisElement).select2('data')[0].cmp_address;
        inv_billing_gst = $(thisElement).select2('data')[0].cmp_gst_no;
        inv_billing_state = $(thisElement).select2('data')[0].cmp_stm_id;
        inv_billing_people_id = ($(thisElement).select2('data')[0].cpl_id) ? $(thisElement).select2('data')[0].cpl_id:0;
        inv_billing_people_name = ($(thisElement).select2('data')[0].cpl_name) ? $(thisElement).select2('data')[0].cpl_name:'Please Select';
      }
      $('#inv_billing_addr').val('');
      $('#inv_billing_gst').val('');
      $('#inv_cmp_state').val('');
      var inv_billing_people = '<option value="'+inv_billing_people_id+'" selected="selected">'+inv_billing_people_name+'</option>';
      // nexlog(inv_billing_people);
      $('#inv_billing_people').html(inv_billing_people).change();    
      $('#inv_billing_addr').val(inv_billing_addr).addClass('edited');
      $('#inv_billing_gst').val(inv_billing_gst).addClass('edited');
      $('#inv_cmp_state').val(inv_billing_state);
      nexlog('cmp state : '+inv_billing_state);
      cloneBillingAddressToShippingAddress();
}
var inv_prd_repeater = $('.repeater').repeater({
       isFirstItemUndeletable: true,
       show: function () {
           $(this).slideDown();
             $('.inv_disc_type').select2({
                /*placeholder: "Please Select Managed By *",*/
                ajax: {
                  url: baseUrl+'invoice/getGenPrmforDropdown/finance_disc_type',
                  dataType: 'json',
                }
              });
                   $('.inp_product').select2({
                /*placeholder: "Please Select Managed By *",*/
                ajax: {
                  url: baseUrl+'invoice/getProductDropdown',
                  dataType: 'json',
                }
              }).change(function(){
              getProductPrice(this);
             });
               $('.inp_size').select2({
                /*placeholder: "Please Select Managed By *",*/
                ajax: {
                  url: baseUrl+'quotation/getGenPrmforDropdown/product_size',
                  dataType: 'json',
                }
              });
               $('.inp_unit').select2({
                /*placeholder: "Please Select Managed By *",*/
                ajax: {
                  url: baseUrl+'quotation/getGenPrmforDropdown/product_unit',
                  dataType: 'json',
                }
              });
           assignCustomEvents();
       },
       hide: function (deleteElement) {
           if(confirm('Are you sure you want to delete this element?')) {
               // nexlog($(this).find('.inp_id'));
               var delete_id = $(this).find('.inp_id').val();
                if(delete_id != '') {
                  var inp_id = $('#delete_inp_id').val();
                  if(inp_id != '') {
                    var inp_delete_id = $('#delete_inp_id').val() + ',' + delete_id;
                  } else {
                    var inp_delete_id = delete_id;
                  }
                  $('#delete_inp_id').val(inp_delete_id);
                }
               $(this).slideUp(deleteElement);
               setTimeout(function(){
                calAllProduct();
              },400);
           }
       }
   });
if(invoice_product != '')
{
  // nexlog(invoice_product);
  // nexlog('in here');
    inv_prd_repeater.setList(invoice_product);
    for (i = 0; i < invoice_product.length; i++) {
            var prdSelect2Val =
              '<option value="'+invoice_product[i]["inp_prd_id"] +'" selected>'+invoice_product[i]["prd_name"] +
              "</option>";
            $('select[name="invoice_product[' + i + '][inp_prd_id]"]')
              .html(prdSelect2Val);
              var inv_product_tax = $('#inv_product_tax').val();
         var parent_div = $('select[name="invoice_product[' + i + '][inp_prd_id]"]').parents('.inv_product_div');
         var prodSizeSelect2Val =
              '<option value="'+invoice_product[i]["inp_size"] +'" selected>'+invoice_product[i]["inp_size_name"]+
              "</option>";
              if(invoice_product[i]["inp_size"] != 0 && invoice_product[i]["inp_size"] != null)
              {
               $('select[name="invoice_product[' + i + '][inp_size]"]').html(prodSizeSelect2Val);
              }else
              {
                $('select[name="invoice_product[' + i + '][inp_size]"]').html('<option value="0" selected >Please Select <option>').trigger('change');
              }
           var prodUnitSelect2Val =
              '<option value="'+invoice_product[i]["inp_unit"] +'" selected>'+invoice_product[i]["inp_unit_name"]+
              "</option>";
              if(invoice_product[i]["inp_unit"] != 0 && invoice_product[i]["inp_unit"] != null)
              {
               $('select[name="invoice_product[' + i + '][inp_unit]"]').html(prodUnitSelect2Val);
              }else
              {
                $('select[name="invoice_product[' + i + '][inp_unit]"]').html('<option value="0" selected >Please Select <option>').trigger('change');
              }
             if(inv_product_tax == '1')
             {
              var discTypeSelect2Val =
              '<option value="'+invoice_product[i]["inp_disc_type"] +'" selected>'+invoice_product[i]["inp_disc_type_name"]+
              "</option>";
              // nexlog( 'disc type : '+invoice_product[i]["inp_disc_type"]);
              if(invoice_product[i]["inp_disc_type"] != 0 && invoice_product[i]["inp_disc_type"] != null)
              {
               $('select[name="invoice_product[' + i + '][inp_disc_type]"]').html(discTypeSelect2Val);
              }else
              {
                $('select[name="invoice_product[' + i + '][inp_disc_type]"]').html('<option value="0" selected >Please Select <option>').trigger('change');
              }
              
            // get values from fields
            // nexlog('get values from fields >>');
             
              parent_div.find('.inp_prd_amt_span').html(invoice_product[i]["inp_prd_amt_format"]);
              parent_div.find('.inp_disc_amt_span').html(invoice_product[i]["inp_disc_amt_format"]);
              parent_div.find('.inp_sub_total_span').html(invoice_product[i]["inp_sub_total_format"]);
              parent_div.find('.inp_tax_span').html(invoice_product[i]["inp_tax_format"]);
              parent_div.find('.inp_sub_total_span').html(invoice_product[i]["inp_sub_total_format"]);
              parent_div.find('.inp_tax_percent_span').html('('+invoice_product[i]["inp_prd_gst"]+'%)');
             }
              parent_div.find('.inp_total_span').html(invoice_product[i]["inp_total_format"]);
              /*parent_div.find('.inp_prd_amt_span').html(invoice_product[i]["inp_prd_amt"]);
              parent_div.find('.inp_disc_amt_span').html(invoice_product[i]["inp_disc_amt"]);
              parent_div.find('.inp_sub_total_span').html(invoice_product[i]["inp_sub_total"]);
              parent_div.find('.inp_tax_span').html(invoice_product[i]["inp_tax"]);
              parent_div.find('.inp_tax_percent_span').html('('+invoice_product[i]["inp_prd_gst"]+'%)');
             }
              parent_div.find('.inp_total_span').html(invoice_product[i]["inp_total_format"]);*/
              /*$('input[name="invoice_product[' + i + '][inp_disc_type]"]').val(invoice_product[i]["bdn_price"]);*/
            nexlog(select2Val);
          }
}
function cloneBillingAddressToShippingAddress()
{
  // nexlog('in herer');
  var inv_billing_addr='';
  var inv_billing_gst='';
  var inv_billing_people='';
  var inv_billing_people_name='';
  var inv_billing_people_select2='';
  if($('#clone_check').prop("checked") == true)
  {
    inv_billing_addr   = $('#inv_billing_addr').val();
    inv_billing_gst    = $('#inv_billing_gst').val();
    inv_billing_people = $('#inv_billing_people').val();
    if($('#inv_billing_people').select2('data')[0])
    {
     inv_billing_people_name = $('#inv_billing_people').select2('data')[0].text;
    }
    $('#inv_shipping_addr').val(inv_billing_addr).addClass('edited');
    $('#inv_shipping_gst').val(inv_billing_gst).addClass('edited');
     inv_billing_people_select2 = '<option value="'+inv_billing_people+'" selected="selected">'+inv_billing_people_name+'</option>';
    // nexlog(inv_billing_people_select2);
    $('#inv_shipping_people').html(inv_billing_people_select2).change();
  }
  else
  {
    $('#inv_shipping_addr').val(inv_billing_addr);
    $('#inv_shipping_gst').val(inv_billing_gst);
    $('#inv_shipping_people').val(inv_billing_people).change();
  }
 
 
}
/*
 ****** Calculation Functions ********
*/
function assignCustomEvents()
{
  $('.inp_rate,.inp_qty,.inp_disc,.inp_prd_gst').off('keyup');
    $('.inp_rate,.inp_qty,.inp_disc,.inp_prd_gst').on('keyup',function(event){
   calculateProdPrice(this);
  });
  $('.inp_rate,.inp_qty,.inp_disc,.inp_prd_gst').off('keypress');
  $('.inp_rate,.inp_qty,.inp_disc,.inp_prd_gst').on('keypress',function(event){
   calculateProdPrice(this);
  });
  $('.inp_disc,.inp_prd_gst').off('change');
  $('.inp_disc,.inp_prd_gst').on('change',function(event){
   calculateProdPrice(this);
  });
  $(".numeric-decimal-format").inputFilter(function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); });
  $(".numeric-format").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });
/*$('.inp_delete').off('click');
  $('.inp_delete').on('click',function(){
   calculateProdPrice(this);
  });*/
  // checkIfNumber(event);
}
function calculateProdPrice(thisElement)
{
    // nexlog('calculateProdPrice >>');
    var prd_rate=prd_qty=prd_amt=prd_disc_type=prd_disc=prd_disc_percent=prd_disc_amt=prd_sub_total=prd_gst=prd_tax=prd_total=0;
    var parent_div = $(thisElement).parents('.inv_product_div');
    var inv_product_tax = $('#inv_product_tax').val();
    // get values from fields
    // nexlog('get values from fields >>');
     prd_rate       = parent_div.find('.inp_rate').val();
     prd_qty        = parent_div.find('.inp_qty').val();
     if(inv_product_tax == '1')
     {
        prd_disc_type  = parent_div.find('.inv_disc_type').val();
        prd_disc       = parent_div.find('.inp_disc').val();
        prd_gst        = parent_div.find('.inp_prd_gst').val();
     }else
     {
        prd_disc_type  = 0;
        prd_disc       = 0;
        prd_gst        = 0;
     }
     
    // nexlog('prd_rate : '+prd_rate+' || prd_qty : '+prd_qty+' || prd_disc_type : '+prd_disc_type+' || prd_disc : '+prd_disc+' || prd_gst : '+prd_gst);
    // nexlog('get values from fields <<');
    // get values from fields
    // calculate product amt
    // nexlog('calculate product amt >>');
    if(prd_qty =='' || prd_qty == '0')
    {
      prd_qty =1;
      parent_div.find('.inp_qty').val('1').addClass('edited');
    }
    if(prd_rate =='' || prd_rate == '0')
    {
      prd_rate =0.00;
    }
    prd_amt = parseFloat(prd_qty) * parseFloat(prd_rate);
    prd_sub_total = prd_amt;
    // nexlog('prd_amt : '+prd_amt+' || prd_sub_total : '+prd_sub_total);
    // nexlog('calculate product amt << ');
    // calculate product amt
    // calculate product discount
     if(inv_product_tax == '1')
     {
        // nexlog('calculate product discount >> ');
        if(prd_disc_type != null || prd_disc_type !='')
        {
          // nexlog('prd_disc_type : '+prd_disc_type+' || disc_type_rs : '+disc_type_rs);
          switch(prd_disc_type)
          {
            case disc_type_rs:
                  // nexlog(' disc_type_rs >>');
                   prd_disc_percent = prd_disc;
                  // nexlog(' prd_disc_percent : '+prd_disc_percent);
                  // nexlog(' disc_type_rs <<');
                  break; 
            case disc_type_percentage:
                  // nexlog(' disc_type_percentage >>');
                  if(prd_disc > 100)
                  {
                    parent_div.find('.inp_disc').val('100');
                    return false;                
                  }
                   prd_disc_percent = (parseFloat(prd_amt) *(parseFloat(prd_disc)/100)) ;
                  // nexlog(' prd_disc_percent : '+prd_disc_percent);
                  // nexlog(' disc_type_percentage <<');
                  break;
            default:
                  prd_disc_percent = 0;
                  break;
          }
          if(prd_disc == '' )
          {
            prd_disc_percent = 0;
          }
          else
          {
            prd_sub_total =(parseFloat(prd_amt)-parseFloat(prd_disc_percent));
          }
          
        }
        // nexlog('prd_disc_type : '+prd_disc_type+' || prd_disc_percent : '+prd_disc_percent+' || prd_sub_total : '+prd_sub_total);
        // nexlog('calculate product discount << ');
        // calculate product discount
        // calculate product tax and total
        // nexlog(' calculate product tax >>');
        if($('#inv_tax_computation').length > 0 && $('#inv_tax_computation').prop("checked") == true)
        {
          if(prd_gst != 'undefined' && prd_gst !='' && prd_gst > 0)
          {
            prd_tax = (parseFloat(prd_sub_total) * (parseFloat(prd_gst) / 100));
          }else
          {
             prd_tax =0;
          }
        }
        else
        {
          prd_tax = 0;
        }
        // nexlog(' prd_gst : '+prd_gst+' prd_tax : '+prd_tax);
        // nexlog(' calculate product tax <<');
        }
        else
        {
          prd_tax =0;
        }
    prd_total =   +prd_sub_total + +prd_tax;
    // nexlog('prd_tax : '+prd_tax+' || prd_total : '+prd_total);
    // calculate product tax and total
    // Assign Values
    // nexlog(' Assign Values >>');
      if(inv_product_tax == '1')
     {
       parent_div.find('.inp_disc_amt_span').html(indiancurrency(prd_disc_percent));
       parent_div.find('.inp_prd_amt_span').html(indiancurrency(prd_amt.toFixed(2)));
       parent_div.find('.inp_prd_amt').val(prd_amt);
       parent_div.find('.inp_disc_amt').val(prd_disc_percent);
       parent_div.find('.inp_sub_total_span').html(indiancurrency(prd_sub_total.toFixed(2)));
       parent_div.find('.inp_sub_total').val(prd_sub_total);
       parent_div.find('.inp_tax_span').html(indiancurrency(prd_tax.toFixed(2)));
       parent_div.find('.inp_tax').val(prd_tax);
     }
     parent_div.find('.inp_total_span').html(indiancurrency(prd_total.toFixed(2)));
     parent_div.find('.inp_total').val(prd_total);
    // nexlog('prd_amt : '+prd_amt+' || prd_disc_percent : '+prd_disc_percent+' || prd_sub_total : '+prd_sub_total+' || prd_tax : '+prd_tax+' || prd_total : '+prd_total);
    // nexlog(' Assign Values <<');
    // Assign Values
    calGrandTotal();
    // nexlog('calculateProdPrice <<');
}   
function calGrandTotal()
{
    // nexlog('calGrandTotal >>');
  var prd_amt=inv_disc_type=inv_disc=inv_tax_percent=gst_tax=prd_length=prd_sub_total=prd_tax=grand_total= 0.00;
  prd_length            = $('.inv_product_div').length;
  var inv_product_tax   = $('#inv_product_tax').val();
  var inv_tax_percent   = $('#inv_tax_percent').val();
  for (var i = 0; i < prd_length; i++) 
  {
    if(inv_product_tax == '1')
   {
    prd_tax     += parseFloat($('input[name="invoice_product['+i+'][inp_tax]"]').val());
    prd_amt     += parseFloat($('input[name="invoice_product['+i+'][inp_sub_total]"]').val());
   }
   else
   {
    prd_amt     += parseFloat($('input[name="invoice_product['+i+'][inp_total]"]').val());
   }
  }
    // nexlog('prd_amt : '+prd_amt+' || inv_disc_type : '+inv_disc_type+' || inv_disc : '+inv_disc+' || inv_tax_percent : '+inv_tax_percent);
  prd_sub_total=prd_amt;
 if(inv_product_tax != '1')
   {
      inv_disc_type   = $('#inv_disc_type').val();
      inv_tax_percent = $('#inv_tax_percent').val();
      inv_disc        = $('#inv_disc').val();
      // calculate product discount
        // nexlog('calculate total discount >> ');
        if(inv_disc_type != null || inv_disc_type !='')
        {
          // nexlog('inv_disc_type : '+inv_disc_type);
          switch(inv_disc_type)
          {
            case disc_type_rs:
                  // nexlog(' disc_type_rs >>');
                   inv_disc_percent = inv_disc;
                  // nexlog(' inv_disc_percent : '+inv_disc_percent);
                  // nexlog(' disc_type_rs <<');
                  break; 
            case disc_type_percentage:
                  // nexlog(' disc_type_percentage >>');
                  if(inv_disc > 100)
                  {
                    $('#inv_disc').val('0');
                    inv_disc = 0;
                    return false;                
                  }
                   inv_disc_percent = (parseFloat(prd_amt) *(parseFloat(inv_disc)/100)) ;
                  // nexlog(' inv_disc_percent : '+inv_disc_percent);
                  // nexlog(' disc_type_percentage <<');
                  break;
            default:
                  inv_disc_percent = 0;
                  break;
          }
          if(inv_disc == '' )
          {
            inv_disc_percent = 0;
          }
          else
          {
            prd_sub_total =(parseFloat(prd_amt)-parseFloat(inv_disc_percent));
          }
          
        }
        // nexlog('inv_disc_type : '+inv_disc_type+' || inv_disc_percent : '+inv_disc_percent+' || prd_sub_total : '+prd_sub_total);
        // nexlog('calculate total discount << ');
        // calculate product discount
        // calculate product tax and total
        // nexlog(' calculate total tax >>');
        if($('#inv_tax_computation').length > 0 && $('#inv_tax_computation').prop("checked") == true)
        {
          if(inv_tax_percent != 'undefined' && inv_tax_percent !='' && inv_tax_percent > 0)
          {
            prd_tax = (parseFloat(prd_sub_total) * (parseFloat(inv_tax_percent) / 100));
          }else
          {
             prd_tax =0;
          }
        }
        else
        {
          prd_tax = 0;
        }
        // nexlog(' inv_tax_percent : '+inv_tax_percent+' prd_tax : '+prd_tax);
        // nexlog(' calculate total tax <<');
        // nexlog('prd_amt : '+prd_amt+' || disc_type_percentage : '+inv_disc_percent+' || prd_sub_total : '+prd_sub_total);
        // calculate product tax and total
      $('#inv_amt').val(prd_amt);
      $('.inv_amt_span').html(indiancurrency(prd_amt));
      $('#inv_disc_amt').val(inv_disc_percent);
      $('.inv_disc_amt_span').html(indiancurrency(inv_disc_percent));
      $('#inv_sub_total').val(prd_sub_total);
      $('.inv_sub_total_span').html(indiancurrency(parseFloat(prd_sub_total).toFixed(2)));
   }
   else
   {
      // grand_total =   prd_sub_total;
      $('#inv_sub_total').val(prd_sub_total);
      $('.inv_sub_total_span').html(indiancurrency(parseFloat(prd_sub_total).toFixed(2)));
   }
   grand_total =   +prd_sub_total + +prd_tax;
   // nexlog('prd_sub_total : '+prd_sub_total+' || prd_tax : '+prd_tax+' || grand_total : '+grand_total);
        
  $('#inv_tax').val(prd_tax);
  $('.inv_tax_span').html(indiancurrency(prd_tax.toFixed(2)));
  $('#inv_total').val(grand_total);
  $('.inv_total_span').html(indiancurrency(grand_total.toFixed(2)));
    // nexlog('calGrandTotal <<');
}
  $('#inv_tax_computation').change(function(){
    calAllProduct();
  });
 function calAllProduct()
 {
   var prod_total  = $('.inv_product_div').length;
   for (var i = 0; i < prod_total; i++) 
   {
     $('input[name="invoice_product['+i+'][inp_rate]"]').trigger('keypress');
   }
 }
/*
 ****** Calculation Functions ********
*/
function checkBillingComp()
{
   var result = true;
    if($('#inv_tax_computation').length > 0 && $('#inv_tax_computation').prop("checked") == true)
    {
       var blng_cmp_state = $('#inv_billing_cmp_state').val();
           if(blng_cmp_state == '')
          {
             swal(
                  {
                      title: "Opps",
                      text: "Please update state of "+$('#inv_billing_cmp').select2('data')[0].text+" for tax computation",
                      type: "error",
                      icon: "error",
                      button: true,
                  });
             result = false;
          }
    }
    return result;
}
function checkAccountComp()
{
   var inv_cmp_result = true;
     if($('#inv_tax_computation').length > 0 && $('#inv_tax_computation').prop("checked") == true)
    {
       var inv_cmp_state = $('#inv_cmp_state').val();
           if(inv_cmp_state == 0 || inv_cmp_state == '')
          {
       // nexlog(inv_cmp_state);
             swal(
                  {
                      title: "Opps",
                      text: "Please update state of "+$('#inv_cmp_id').select2('data')[0].text+" for tax computation",
                      type: "error",
                      icon: "error",
                      button: true,
                  });
             inv_cmp_result = false;
          }
      }
    return inv_cmp_result;
}