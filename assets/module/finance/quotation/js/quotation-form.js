$(document).ready(function()
{
  if(qtn_id  != '')
  {
    $('#qtn_billing_cmp').attr('disabled','disabled');
  }
  else
  {
    $('#qtn_currency,#qtn_shipping').getDefaultvalueById();
  }
    $.validator.setDefaults(
    {
        ignore: []
    });
    $('.blank_option').remove();
    $('#qtn_currency').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'quotation/getGenPrmforDropdown/finance_currency',
      dataType: 'json',
    }
  });
    $('#qtn_shipping').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'quotation/getGenPrmforDropdown/finance_shipping',
      dataType: 'json',
    }
  });
     $('#qtn_cmp_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'quotation/getCompanyDropdown?lead='+$('#qtn_led_id').val();
      },
      dataType: 'json',
    }
  }).change(function(){
    getCompDetails(this);
   });
   $('#qtn_billing_cmp').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'quotation/getBillingCompanyDropdown';
      },
      dataType: 'json',
    }
  }).change(function(){
    getBillingCompDetails(this);
  });
      $('#qtn_billing_people').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'quotation/getPeopleDropdown?company='+$('#qtn_cmp_id').val();
      },
      dataType: 'json',
    }
  });
  $('#qtn_shipping_people').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'quotation/getPeopleDropdown?lead='+$('#qtn_led_id').val(),
      dataType: 'json',
    }
  });
    $('#qtn_led_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'quotation/getLeadDropdown',
      dataType: 'json',
    }
  });
    $('#qtn_led_id').change(function(){
      updateLeadData(this);
    });
      $('.qtp_size').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'quotation/getGenPrmforDropdown/product_size',
      dataType: 'json',
    }
  });
   $('.qtp_unit').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'quotation/getGenPrmforDropdown/product_unit',
      dataType: 'json',
    }
  });
    function updateLeadData(thisElement)
    {
      nexlog('qtn led change event >>');
      $('#qtn_cmp_id').val('').change();
      var led_val = $(thisElement).val();
      nexlog(' led_val : '+led_val);
      $('#qtn_title').val('').addClass('edited');
      if(led_val != '0')
      {
        nexlog($(thisElement).select2('data')[0]);
        var led_title    = $(thisElement).select2('data')[0].text;
        var led_ppl_id   = $(thisElement).select2('data')[0].ppl_id;
        var led_ppl_name = $(thisElement).select2('data')[0].ppl_name;
        var led_cmp_id   = $(thisElement).select2('data')[0].led_cmp_id;
        var led_cmp_name = $(thisElement).select2('data')[0].led_cmp_name;
        var led_cmp_address = $(thisElement).select2('data')[0].led_cmp_address;
        var led_cmp_gst = $(thisElement).select2('data')[0].led_cmp_gst_no;
        var led_cmp_state = $(thisElement).select2('data')[0].led_cmp_state;
        var led_cmp_payment_terms = $(thisElement).select2('data')[0].led_cmp_payment_terms;
        nexlog(' led_cmp_state : '+led_cmp_state+' led_cmp_payment_terms : '+led_cmp_payment_terms);
        $('#qtn_title').val(led_title).addClass('edited');
        var qtn_billing_people = '<option value="'+led_ppl_id+'" selected="selected">'+led_ppl_name+'</option>';
        nexlog(qtn_billing_people);
        $('#qtn_billing_people').html(qtn_billing_people).change();
        if(led_cmp_name !='')
        {
          var qtn_cmp = '<option value="'+led_cmp_id+'" selected="selected" data-cmp_address="'+led_cmp_address+'" data-cmp_gst_no="'+led_cmp_gst+'"> '+led_cmp_name+'</option>';
          nexlog('qtn_cmp : '+qtn_cmp);
            $('#qtn_cmp_id').html(qtn_cmp);
            $('#qtn_billing_addr').val(led_cmp_address).trigger('change');
            $('#qtn_billing_gst').val(led_cmp_gst);
            $('#qtn_cmp_state').val(led_cmp_state);
            $('#qtn_payment_terms').val(led_cmp_payment_terms);
            cloneBillingAddressToShippingAddress();
        }
        
      }
      nexlog('qtn led change event <<')
  
    }
     $('.qtn_disc_type').select2({
    
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'quotation/getGenPrmforDropdown/finance_disc_type',
      dataType: 'json',
    }
  });
       $('.qtp_product').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'quotation/getProductDropdown',
      dataType: 'json',
    }
  }).change(function(){
    getProductPrice(this);
    calculateProdPrice(this);
   });
    $("#quotation_form").validate(
    {
        errorClass: "errormesssage",
         rules: {
            qtn_code: {
              remote: {
                url: baseUrl + 'quotation/checkQuotationUnique/qtn_code/'+$("#qtn_id").val(),
                type: "post",
                data: {
                  value: function() {
                    return $('#qtn_code').val();
                  },
                },
              },
            },
          },
          messages: {
            qtn_code: {
              remote: function() {
                return $("#qtn_code").val()+" is already generated";
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
              var qtn_tax_computation='';
                   if($('#qtn_tax_computation').length > 0 && $('#qtn_tax_computation').prop("checked") == true)
                  {
                    qtn_tax_computation= '&qtn_tax_computation='+$('#qtn_tax_computation').val();
                  }
                var dataString = $('#quotation_form').serialize()+'&qtn_code=' + $('#qtn_code').val()+'&qtn_tax_computation='+qtn_tax_computation;
                $('.btn_save').button('loading');
                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "quotation/quotation_data_save",
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
    assignCustomEvents();
 $('#qtn_disc_type').change(function(event){
   calGrandTotal();
  });
  $('#qtn_disc').on('keyup',function(event){
   calGrandTotal();
  });
  $('#qtn_disc').on('keypress',function(event){
   calGrandTotal();
  });
  $('#qtn_billing_addr,#qtn_billing_gst,#qtn_billing_people').on('keyup',function(event){
   cloneBillingAddressToShippingAddress();
  });
  $('#qtn_billing_addr,#qtn_billing_gst,#qtn_billing_people').on('keypress',function(event){
   cloneBillingAddressToShippingAddress();
  });
  $('#qtn_billing_addr,#qtn_billing_gst,#qtn_billing_people').on('change',function(event){
   cloneBillingAddressToShippingAddress();
  });
 $('#qtn_billing_addr,#qtn_billing_gst,#qtn_billing_people').on('input',function(event){
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
      var parent_div = $(thisElement).parents('.quot_product_div');
      parent_div.find('.qtp_rate').val('');
      parent_div.find('.qtp_rate').val(prd_price).addClass('edited');
      parent_div.find('.qtp_desc').val('');
      parent_div.find('.qtp_desc').val(prd_desc).addClass('edited');
      parent_div.find('.qtp_prd_gst').val('');
      parent_div.find('.qtp_prd_gst').val(prd_gst).addClass('edited');
      parent_div.find('.qtp_tax_percent_span').html(' ('+prd_gst+'%)');
      var prd_qty = parent_div.find('.qtp_qty').val();
      if(prd_qty  != '' || prd_qty != '0')
      {
        nexlog(prd_qty);
          parent_div.find('.qtp_qty').val('1').addClass('edited');
      }
      
   calculateProdPrice(thisElement);
}
function getBillingCompDetails(thisElement)
{
  if($(thisElement).select2('data')[0])
    {
      var state = $(thisElement).select2('data')[0].cmp_state; 
      $('#qtn_billing_cmp_state').val(state);
      var cmp_payment_terms = $(thisElement).select2('data')[0].cmp_payment_terms;
      nexlog($(thisElement).select2('data')[0]);
      $('#qtn_payment_terms').val(cmp_payment_terms).addClass('edited');
    }
}
function getCompDetails(thisElement)
{
      var qtn_billing_addr = '';
      var qtn_billing_gst  = '';
      var qtn_billing_state  = '';
      if($(thisElement).val() != null)
      {
        qtn_billing_addr = $(thisElement).select2('data')[0].cmp_address;
        qtn_billing_gst = $(thisElement).select2('data')[0].cmp_gst_no;
        qtn_billing_state = $(thisElement).select2('data')[0].cmp_stm_id;
      }
      $('#qtn_billing_addr').val();
      $('#qtn_billing_gst').val();
      $('#qtn_cmp_state').val();
      $('#qtn_billing_addr').val(qtn_billing_addr).addClass('edited');
      $('#qtn_billing_gst').val(qtn_billing_gst).addClass('edited');
      $('#qtn_cmp_state').val(qtn_billing_state);
      cloneBillingAddressToShippingAddress();
}
var qtn_prd_repeater = $('.repeater').repeater({
       isFirstItemUndeletable: true,
       show: function () {
           $(this).slideDown();
                   $('.qtn_disc_type').select2({
                      /*placeholder: "Please Select Managed By *",*/
                      ajax: {
                        url: baseUrl+'quotation/getGenPrmforDropdown/finance_disc_type',
                        dataType: 'json',
                      }
                    });
                    $('.qtp_size').select2({
                      /*placeholder: "Please Select Managed By *",*/
                      ajax: {
                        url: baseUrl+'quotation/getGenPrmforDropdown/product_size',
                        dataType: 'json',
                      }
                    });
                     $('.qtp_unit').select2({
                      /*placeholder: "Please Select Managed By *",*/
                      ajax: {
                        url: baseUrl+'quotation/getGenPrmforDropdown/product_unit',
                        dataType: 'json',
                      }
                    });
                   $('.qtp_product').select2({
                    /*placeholder: "Please Select Managed By *",*/
                    ajax: {
                      url: baseUrl+'quotation/getProductDropdown',
                      dataType: 'json',
                    }
                  }).change(function(){
                  getProductPrice(this);
                 });
       
           assignCustomEvents();
       },
       hide: function (deleteElement) {
           if(confirm('Are you sure you want to delete this element?')) {
               nexlog($(this).find('.qtp_id'));
               var delete_id = $(this).find('.qtp_id').val();
                if(delete_id != '') {
                  var qtp_id = $('#delete_qtp_id').val();
                  if(qtp_id != '') {
                    var qtp_delete_id = $('#delete_qtp_id').val() + ',' + delete_id;
                  } else {
                    var qtp_delete_id = delete_id;
                  }
                  $('#delete_qtp_id').val(qtp_delete_id);
                }
               $(this).slideUp(deleteElement);
               setTimeout(function(){
                calAllProduct();
              },400);
           }
       }
   });
if(quotation_product != '')
{
  nexlog(quotation_product);
  nexlog('in here');
    qtn_prd_repeater.setList(quotation_product);
    for (i = 0; i < quotation_product.length; i++) {
            var prdSelect2Val =
              '<option value="'+quotation_product[i]["qtp_prd_id"] +'" selected>'+quotation_product[i]["prd_name"] +
              "</option>";
            $('select[name="quotation_product[' + i + '][qtp_prd_id]"]')
              .html(prdSelect2Val);
              var qtn_product_tax = $('#qtn_product_tax').val();
         var parent_div = $('select[name="quotation_product[' + i + '][qtp_prd_id]"]').parents('.quot_product_div');
         var prodSizeSelect2Val =
              '<option value="'+quotation_product[i]["qtp_size"] +'" selected>'+quotation_product[i]["qtp_size_name"]+
              "</option>";
              if(quotation_product[i]["qtp_size"] != 0 && quotation_product[i]["qtp_size"] != null)
              {
               $('select[name="quotation_product[' + i + '][qtp_size]"]').html(prodSizeSelect2Val);
              }else
              {
                $('select[name="quotation_product[' + i + '][qtp_size]"]').html('<option value="0" selected >Please Select <option>').trigger('change');
              }
           var prodUnitSelect2Val =
              '<option value="'+quotation_product[i]["qtp_unit"] +'" selected>'+quotation_product[i]["qtp_unit_name"]+
              "</option>";
              if(quotation_product[i]["qtp_unit"] != 0 && quotation_product[i]["qtp_unit"] != null)
              {
               $('select[name="quotation_product[' + i + '][qtp_unit]"]').html(prodUnitSelect2Val);
              }else
              {
                $('select[name="quotation_product[' + i + '][qtp_unit]"]').html('<option value="0" selected >Please Select <option>').trigger('change');
              }
             if(qtn_product_tax == '1')
             {
              var discTypeSelect2Val =
              '<option value="'+quotation_product[i]["qtp_disc_type"] +'" selected>'+quotation_product[i]["qtp_disc_type_name"]+
              "</option>";
              if(quotation_product[i]["qtp_disc_type"] != 0 && quotation_product[i]["qtp_disc_type"] != null)
              {
               $('select[name="quotation_product[' + i + '][qtp_disc_type]"]').html(discTypeSelect2Val);
              }else
              {
                $('select[name="quotation_product[' + i + '][qtp_disc_type]"]').html('<option value="0" selected >Please Select <option>').trigger('change');
              }
              
            // get values from fields
            nexlog('get values from fields >>');
             
              parent_div.find('.qtp_prd_amt_span').html(indiancurrency(parseFloat(quotation_product[i]["qtp_prd_amt"]).toFixed(2)));
              parent_div.find('.qtp_disc_amt_span').html(indiancurrency(parseFloat(quotation_product[i]["qtp_disc_amt"]).toFixed(2)));
              parent_div.find('.qtp_sub_total_span').html(indiancurrency(parseFloat(quotation_product[i]["qtp_sub_total"]).toFixed(2)));
              parent_div.find('.qtp_tax_span').html(indiancurrency(parseFloat(quotation_product[i]["qtp_tax"]).toFixed(2)));
              parent_div.find('.qtp_tax_percent_span').html('('+quotation_product[i]["qtp_prd_gst"]+'%)');
             }
              parent_div.find('.qtp_total_span').html(quotation_product[i]["qtp_total_format"]);
              /*$('input[name="quotation_product[' + i + '][qtp_disc_type]"]').val(quotation_product[i]["bdn_price"]);*/
            // nexlog(select2Val);
          }
}
function cloneBillingAddressToShippingAddress()
{
  nexlog('in herer');
  var qtn_billing_addr='';
  var qtn_billing_gst='';
  var qtn_billing_people='';
  var qtn_billing_people_name='';
  var qtn_billing_people_select2='';
  if($('#clone_check').prop("checked") == true)
  {
    qtn_billing_addr   = $('#qtn_billing_addr').val();
    qtn_billing_gst    = $('#qtn_billing_gst').val();
    qtn_billing_people = $('#qtn_billing_people').val();
    if($('#qtn_billing_people').select2('data')[0])
    {
     qtn_billing_people_name = $('#qtn_billing_people').select2('data')[0].text;
    }
    $('#qtn_shipping_addr').val(qtn_billing_addr).addClass('edited');
    $('#qtn_shipping_gst').val(qtn_billing_gst).addClass('edited');
     qtn_billing_people_select2 = '<option value="'+qtn_billing_people+'" selected="selected">'+qtn_billing_people_name+'</option>';
    nexlog(qtn_billing_people_select2);
    $('#qtn_shipping_people').html(qtn_billing_people_select2).change();
  }
  else
  {
    $('#qtn_shipping_addr').val(qtn_billing_addr);
    $('#qtn_shipping_gst').val(qtn_billing_gst);
    $('#qtn_shipping_people').val(qtn_billing_people).change();
  }
 
 
}
/*
 ****** Calculation Functions ********
*/
function assignCustomEvents()
{
  $('.qtp_rate,.qtp_qty,.qtp_disc,.qtp_prd_gst').off('keyup');
    $('.qtp_rate,.qtp_qty,.qtp_disc,.qtp_prd_gst').on('keyup',function(event){
   calculateProdPrice(this);
  });
  $('.qtp_rate,.qtp_qty,.qtp_disc,.qtp_prd_gst').off('keypress');
  $('.qtp_rate,.qtp_qty,.qtp_disc,.qtp_prd_gst').on('keypress',function(event){
   calculateProdPrice(this);
  });
  $('.qtp_disc,.qtp_prd_gst').off('change');
  $('.qtp_disc,.qtp_prd_gst').on('change',function(event){
   calculateProdPrice(this);
  });
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
function calculateProdPrice(thisElement)
{
    nexlog('calculateProdPrice >>');
    var prd_rate=prd_qty=prd_amt=prd_disc_type=prd_disc=prd_disc_percent=prd_disc_amt=prd_sub_total=prd_gst=prd_tax=prd_total=0;
    var parent_div = $(thisElement).parents('.quot_product_div');
    var qtn_product_tax = $('#qtn_product_tax').val();
    // get values from fields
    nexlog('get values from fields >>');
     prd_rate       = parent_div.find('.qtp_rate').val();
     prd_qty        = parent_div.find('.qtp_qty').val();
     if(qtn_product_tax == '1')
     {
        prd_disc_type  = parent_div.find('.qtn_disc_type').val();
        prd_disc       = parent_div.find('.qtp_disc').val();
        prd_gst        = parent_div.find('.qtp_prd_gst').val();
     }else
     {
        prd_disc_type  = 0;
        prd_disc       = 0;
        prd_gst        = 0;
     }
     
    nexlog('prd_rate : '+prd_rate+' || prd_qty : '+prd_qty+' || prd_disc_type : '+prd_disc_type+' || prd_disc : '+prd_disc+' || prd_gst : '+prd_gst);
    nexlog('get values from fields <<');
    // get values from fields
    // calculate product amt
    nexlog('calculate product amt >>');
    if(prd_qty =='' || prd_qty == '0')
    {
      prd_qty =1;
      parent_div.find('.qtp_qty').val('1').addClass('edited');
    }
    if(prd_rate =='' || prd_rate == '0')
    {
      prd_rate =0.00;
    }
    prd_amt = parseFloat(prd_qty) * parseFloat(prd_rate);
    prd_sub_total = prd_amt;
    nexlog('prd_amt : '+prd_amt+' || prd_sub_total : '+prd_sub_total);
    nexlog('calculate product amt << ');
    // calculate product amt
    // calculate product discount
     if(qtn_product_tax == '1')
     {
        nexlog('calculate product discount >> ');
        if(prd_disc_type != null || prd_disc_type !='')
        {
          nexlog('prd_disc_type : '+prd_disc_type+' || disc_type_rs : '+disc_type_rs);
          switch(prd_disc_type)
          {
            case disc_type_rs:
                  nexlog(' disc_type_rs >>');
                   prd_disc_percent = prd_disc;
                  nexlog(' prd_disc_percent : '+prd_disc_percent);
                  nexlog(' disc_type_rs <<');
                  break; 
            case disc_type_percentage:
                  nexlog(' disc_type_percentage >>');
                  if(prd_disc > 100)
                  {
                    parent_div.find('.qtp_disc').val('100');
                    return false;                
                  }
                   prd_disc_percent = (parseFloat(prd_amt) *(parseFloat(prd_disc)/100)) ;
                  nexlog(' prd_disc_percent : '+prd_disc_percent);
                  nexlog(' disc_type_percentage <<');
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
        nexlog('prd_disc_type : '+prd_disc_type+' || prd_disc_percent : '+prd_disc_percent+' || prd_sub_total : '+prd_sub_total);
        nexlog('calculate product discount << ');
        // calculate product discount
        // calculate product tax and total
        nexlog(' calculate product tax >>');
        if($('#qtn_tax_computation').length > 0 && $('#qtn_tax_computation').prop("checked") == true)
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
        nexlog(' prd_gst : '+prd_gst+' prd_tax : '+prd_tax);
        nexlog(' calculate product tax <<');
        }
        else
        {
          prd_tax =0;
        }
    prd_total =   +prd_sub_total + +prd_tax;
    nexlog('prd_tax : '+prd_tax+' || prd_total : '+prd_total);
    // calculate product tax and total
    // Assign Values
    nexlog(' Assign Values >>');
      if(qtn_product_tax == '1')
     {
       parent_div.find('.qtp_disc_amt_span').html(indiancurrency(prd_disc_percent));
       parent_div.find('.qtp_prd_amt_span').html(indiancurrency(prd_amt.toFixed(2)));
       parent_div.find('.qtp_prd_amt').val(prd_amt);
       parent_div.find('.qtp_disc_amt').val(prd_disc_percent);
       parent_div.find('.qtp_sub_total_span').html(indiancurrency(prd_sub_total.toFixed(2)));
       parent_div.find('.qtp_sub_total').val(prd_sub_total);
       parent_div.find('.qtp_tax_span').html(indiancurrency(prd_tax.toFixed(2)));
       parent_div.find('.qtp_tax').val(prd_tax);
     }
     parent_div.find('.qtp_total_span').html(indiancurrency(prd_total.toFixed(2)));
     parent_div.find('.qtp_total').val(prd_total);
    nexlog('prd_amt : '+prd_amt+' || prd_disc_percent : '+prd_disc_percent+' || prd_sub_total : '+prd_sub_total+' || prd_tax : '+prd_tax+' || prd_total : '+prd_total);
    nexlog(' Assign Values <<');
    // Assign Values
    calGrandTotal();
    nexlog('calculateProdPrice <<');
}   
function calGrandTotal()
{
    nexlog('calGrandTotal >>');
  var prd_amt=qtn_disc_type=qtn_disc=qtn_tax_percent=gst_tax=prd_length=prd_sub_total=prd_tax=grand_total= 0.00;
  prd_length            = $('.quot_product_div').length;
  var qtn_product_tax   = $('#qtn_product_tax').val();
  var qtn_tax_percent   = $('#qtn_tax_percent').val();
  for (var i = 0; i < prd_length; i++) 
  {
    if(qtn_product_tax == '1')
   {
    prd_tax     += parseFloat($('input[name="quotation_product['+i+'][qtp_tax]"]').val());
    prd_amt     += parseFloat($('input[name="quotation_product['+i+'][qtp_sub_total]"]').val());
   }
   else
   {
    prd_amt     += parseFloat($('input[name="quotation_product['+i+'][qtp_total]"]').val());
   }
  }
    nexlog('prd_amt : '+prd_amt+' || qtn_disc_type : '+qtn_disc_type+' || qtn_disc : '+qtn_disc+' || qtn_tax_percent : '+qtn_tax_percent);
  prd_sub_total=prd_amt;
 if(qtn_product_tax != '1')
   {
      qtn_disc_type   = $('#qtn_disc_type').val();
      qtn_tax_percent = $('#qtn_tax_percent').val();
      qtn_disc        = $('#qtn_disc').val();
      // calculate product discount
        nexlog('calculate total discount >> ');
        if(qtn_disc_type != null || qtn_disc_type !='')
        {
          nexlog('qtn_disc_type : '+qtn_disc_type);
          switch(qtn_disc_type)
          {
            case disc_type_rs:
                  nexlog(' disc_type_rs >>');
                   qtn_disc_percent = qtn_disc;
                  nexlog(' qtn_disc_percent : '+qtn_disc_percent);
                  nexlog(' disc_type_rs <<');
                  break; 
            case disc_type_percentage:
                  nexlog(' disc_type_percentage >>');
                  if(qtn_disc > 100)
                  {
                    $('#qtn_disc').val('0');
                    qtn_disc = 0;
                    return false;                
                  }
                   qtn_disc_percent = (parseFloat(prd_amt) *(parseFloat(qtn_disc)/100)) ;
                  nexlog(' qtn_disc_percent : '+qtn_disc_percent);
                  nexlog(' disc_type_percentage <<');
                  break;
            default:
                  qtn_disc_percent = 0;
                  break;
          }
          if(qtn_disc == '' )
          {
            qtn_disc_percent = 0;
          }
          else
          {
            prd_sub_total =(parseFloat(prd_amt)-parseFloat(qtn_disc_percent));
          }
          
        }
        nexlog('qtn_disc_type : '+qtn_disc_type+' || qtn_disc_percent : '+qtn_disc_percent+' || prd_sub_total : '+prd_sub_total);
        nexlog('calculate total discount << ');
        // calculate product discount
        // calculate product tax and total
        nexlog(' calculate total tax >>');
        if($('#qtn_tax_computation').length > 0 && $('#qtn_tax_computation').prop("checked") == true)
        {
          if(qtn_tax_percent != 'undefined' && qtn_tax_percent !='' && qtn_tax_percent > 0)
          {
            prd_tax = (parseFloat(prd_sub_total) * (parseFloat(qtn_tax_percent) / 100));
          }else
          {
             prd_tax =0;
          }
        }
        else
        {
          prd_tax = 0;
        }
        nexlog(' qtn_tax_percent : '+qtn_tax_percent+' prd_tax : '+prd_tax);
        nexlog(' calculate total tax <<');
        grand_total =   +prd_sub_total + +prd_tax;
        nexlog('prd_amt : '+prd_amt+' || disc_type_percentage : '+qtn_disc_percent+' || prd_sub_total : '+prd_sub_total+' || prd_tax : '+prd_tax+' || grand_total : '+grand_total);
        // calculate product tax and total
      $('#qtn_amt').val(prd_amt);
      $('.qtn_amt_span').html(indiancurrency(prd_amt));
      $('#qtn_disc_amt').val(qtn_disc_percent);
      $('.qtn_disc_amt_span').html(indiancurrency(qtn_disc_percent));
      $('#qtn_sub_total').val(prd_sub_total);
      $('.qtn_sub_total_span').html(indiancurrency(prd_sub_total));
        nexlog('prd_amt : '+prd_amt+' || disc_type_percentage : '+qtn_disc_percent+' || prd_sub_total : '+prd_sub_total);
   }
   else
   {
     // grand_total =   prd_sub_total;
      $('#qtn_sub_total').val(prd_sub_total);
      $('.qtn_sub_total_span').html(indiancurrency(prd_sub_total));
   }
    grand_total =   +prd_sub_total + +prd_tax;
   nexlog('prd_sub_total : '+prd_sub_total+' || prd_tax : '+prd_tax+' || grand_total : '+grand_total);
  $('#qtn_tax').val(prd_tax);
  $('.qtn_tax_span').html(indiancurrency(prd_tax.toFixed(2)));
  $('#qtn_total').val(grand_total);
  $('.qtn_total_span').html(indiancurrency(grand_total.toFixed(2)));
    nexlog('calGrandTotal <<');
}
  $('#qtn_tax_computation').change(function(){
    calAllProduct();
  });
 function calAllProduct()
 {
   var prod_total  = $('.quot_product_div').length;
   for (var i = 0; i < prod_total; i++) 
   {
     $('input[name="quotation_product['+i+'][qtp_rate]"]').trigger('keypress');
   }
 }
/*
 ****** Calculation Functions ********
*/
function checkBillingComp()
{
   var result = true;
    if($('#qtn_tax_computation').length > 0 && $('#qtn_tax_computation').prop("checked") == true)
    {
       var blng_cmp_state = $('#qtn_billing_cmp_state').val();
           if(blng_cmp_state == '')
          {
             swal(
                  {
                      title: "Opps",
                      text: "Please update state of "+$('#qtn_billing_cmp').select2('data')[0].text+" for tax computation",
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
   var qtn_cmp_result = true;
     if($('#qtn_tax_computation').length > 0 && $('#qtn_tax_computation').prop("checked") == true)
    {
       var qtn_cmp_state = $('#qtn_cmp_state').val();
           if(qtn_cmp_state == 0 || qtn_cmp_state == '')
          {
       nexlog(qtn_cmp_state);
             swal(
                  {
                      title: "Opps",
                      text: "Please update state of "+$('#qtn_cmp_id').select2('data')[0].text+" for tax computation",
                      type: "error",
                      icon: "error",
                      button: true,
                  });
             qtn_cmp_result = false;
          }
      }
    return qtn_cmp_result;
}