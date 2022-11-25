// Product Selectors
  var prd_rate_selector       = '.prod_rate';
  var prod_qty_selector       = '.prod_qty';
  var prod_disc_type_selector = '.prod_disc_type';
  var prod_disc_selector      = '.prod_disc';
  var prod_gst_selector       = '.prod_gst_percent';
// Product Selectors
$(document).ready(function()
{
  var module_id = $('.module_id').val();
  if(module_id == '')
  {
    $('.ord_type,.ord_category,.prod_disc_type').getDefaultvalueById();
  }
   $('.cmp_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'order/getCompanyDropdown?lead='+$('#ord_led_id').val();
      },
      dataType: 'json',
    }
  }).change(function(){
    getCompDetails(this);
   });
    $('.blank_option').remove();
   
    $('.prod_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url:baseUrl+'order/getProductDropdown/',
      dataType: 'json',
    }
  }).change(function(){
    updateProdDetails(this);
  });
    $('#ord_led_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'order/getLeadDropdown',
      dataType: 'json',
    }
  }).change(function(){
      updateLeadData(this);
    });
    $('.prod_variant').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url:function(){
        return  baseUrl+'order/getProductVariantDropdown?product='+$(this).parents('.product_repeater_item').find('.prod_id').val();
      },   
      dataType: 'json',
    }
}).change(function(){
    updateProdVariantDetails(this);
  });
  assignCustomEvents();
    $('#ord_billing_cmp').select2({
        /*placeholder: "Please Select Managed By *",*/
        ajax: {
          url: function(){
            return baseUrl+'order/getBillingCompanyDropdown';
          },
          dataType: 'json',
        }
      }).change(function(){
        getBillingCompDetails(this);
      });
    $('.billing_people').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'order/getPeopleDropdown?company='+$('.cmp_id').val();
      },
      dataType: 'json',
    }
  });
  $('.shipping_people').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'order/getPeopleDropdown' ,
      dataType: 'json',
    }
  });
     $('.ord_type').select2({
      /*placeholder: "Please Select Managed By *",*/
      ajax: {
        url:function(){
          return  baseUrl+'order/getGenPrmforDropdown/'+$(this).attr('data-gen-grp');
        } ,
        dataType: 'json',
      }
    });
     $('.ord_category').select2({
      /*placeholder: "Please Select Managed By *",*/
      ajax: {
        url:function(){
          return  baseUrl+'order/getGenPrmforDropdown/'+$(this).attr('data-gen-grp');
        } ,
        dataType: 'json',
      }
    });
      $('.prod_disc_type').select2({
      /*placeholder: "Please Select Managed By *",*/
      ajax: {
        url:function(){
          return  baseUrl+'order/getGenPrmforDropdown/'+$(this).attr('data-gen-grp');
        } ,
        dataType: 'json',
      }
    });
      $('#ord_disc_type').change(function(event){
     calGrandTotal();
    });
    $('#ord_disc').on('keyup',function(event){
     calGrandTotal();
    });
    $('#ord_disc').on('keypress',function(event){
     calGrandTotal();
    });
  });

 function updateProdDetails(thisElement)
{
  if($(thisElement).select2('data')[0])
  {
    var product_element = $(thisElement).select2('data')[0];
    var prod_parent_div = $(thisElement).parents('.product_repeater_item');
    var prd_desc        = $(thisElement).select2('data')[0].text;
    var prd_variant     = product_element.prd_variant;
    var prd_variant_id  = product_element.prd_variant_id;
    var prd_price       = product_element.prd_price;
    var prd_gst         = product_element.prd_gst;
    nexlog('product_element >>');
    nexlog(prd_desc);
    nexlog('product_element <<');
    nexlog('prd_desc : '+prd_desc);
      nexlog(prod_parent_div);
      nexlog(prod_parent_div.find('.prod_desc').html(prd_desc));
       prod_parent_div.find('.prod_desc').val(prd_desc).addClass('edited');
      if(prd_variant != '')
      {
        var prod_variant_option = '<option value="'+prd_variant_id+'" selected="selected">'+prd_variant+'</option>';
        prod_parent_div.find('.prod_variant').html(prod_variant_option).trigger('change');
      }
        prod_parent_div.find(prd_rate_selector).val(prd_price).addClass('edited');
        prod_parent_div.find('.prod_tax_percent_span').html('('+prd_gst+'%)');
        prod_parent_div.find('.prod_gst_percent').val(prd_gst);
        calculateProdPrice(thisElement); 
   
  }
}

function getBillingCompDetails(thisElement)
{
  if($(thisElement).select2('data')[0])
    {
      var state = $(thisElement).select2('data')[0].cmp_state; 
      $('.billing_cmp_state').val(state);
      var cmp_payment_terms = $(thisElement).select2('data')[0].cmp_payment_terms;
      $('.billing_terms').summernote('code',cmp_payment_terms);
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
    
      prod_parent_div.find(prd_rate_selector).val(prd_price).addClass('edited');
      calculateProdPrice(thisElement);
  }
}
function updateLeadData(thisElement)
    {
      nexlog('ord led change event >>');
      $('#ord_cmp_id').val('').change();
      var led_val = $(thisElement).val();
      nexlog(' led_val : '+led_val);
      $('#ord_title').val('').addClass('edited');
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
        var ots_amt = $(thisElement).select2('data')[0].ots_amt;
        var led_cmp_encrypted_id = $(thisElement).select2('data')[0].led_cmp_encrypted_id;
        var ots_link = baseUrl+'outstanding-details-'+led_cmp_encrypted_id; 
        nexlog(' led_cmp_state : '+led_cmp_state+' led_cmp_payment_terms : '+led_cmp_payment_terms);
        $('#ord_title').val(led_title).addClass('edited');
        var ord_billing_people = '<option value="'+led_ppl_id+'" selected="selected">'+led_ppl_name+'</option>';
        nexlog(ord_billing_people);
        $('#ord_billing_people').html(ord_billing_people).change();
        if(led_cmp_name !='')
        {
          var ord_cmp = '<option value="'+led_cmp_id+'" selected="selected" data-cmp_address="'+led_cmp_address+'" data-cmp_gst_no="'+led_cmp_gst+'"> '+led_cmp_name+'</option>';
          nexlog('ord_cmp : '+ord_cmp);
            $('#ord_cmp_id').html(ord_cmp);
            $('#ord_billing_addr').val(led_cmp_address).trigger('change');
            $('#ord_billing_gst').val(led_cmp_gst);
            $('#ord_cmp_state').val(led_cmp_state);
            $('#ord_payment_terms').html(led_cmp_payment_terms);
            $('.ots_amt').html(ots_amt);
            $('.ots-link').attr('href',ots_link);
            cloneBillingAddressToShippingAddress();
        }
        
      }
      nexlog('ord led change event <<')
  
    }
var product_repeater = $('.repeater').repeater({
       isFirstItemUndeletable: true,
       show: function () {
           $(this).slideDown();
              $('.prod_id').select2({
                  /*placeholder: "Please Select Managed By *",*/
                  ajax: {
                    url:baseUrl+'order/getProductDropdown/',
                    dataType: 'json',
                  }
                }).change(function(){
                  updateProdDetails(this);
                });
                  $('.prod_variant').select2({
                  /*placeholder: "Please Select Managed By *",*/
                  ajax: {
                    url:function(){
                      return  baseUrl+'order/getProductVariantDropdown?product='+$(this).parents('.product_repeater_item').find('.prod_id').val();
                    },   
                    dataType: 'json',
                  }
              }).change(function(){
                  updateProdVariantDetails(this);
                });
              $('.prod_disc_type').select2({
                /*placeholder: "Please Select Managed By *",*/
                ajax: {
                  url:function(){
                    return  baseUrl+'order/getGenPrmforDropdown/'+$(this).attr('data-gen-grp');
                  } ,
                  dataType: 'json',
                }
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
if(product_repeater_item != '')
{
  nexlog(product_repeater_item);
    product_repeater.setList(product_repeater_item);
    for (i = 0; i < product_repeater_item.length; i++) {
            var prdSelect2Val =
              '<option value="'+product_repeater_item[i]["orp_prd_id"] +'" selected>'+product_repeater_item[i]["orp_prd_id_value"] +
              "</option>";
            $('select[name="product_repeater_item['+i+'][orp_prd_id]"]').html(prdSelect2Val);
              nexlog(prdSelect2Val);
              var product_tax = $('.product_tax').val();
         var parent_div = $('select[name="product_repeater_item[' + i + '][orp_prd_id]"]').parents('.product_repeater_item');
         var prodSizeSelect2Val =
              '<option value="'+product_repeater_item[i]["orp_prv_id"] +'" selected>'+product_repeater_item[i]["orp_prv_id_value"]+
              "</option>";
              nexlog(prodSizeSelect2Val);
              nexlog( $('select[name="product_repeater_item[' + i + '][orp_prv_id]"]'));
              if(product_repeater_item[i]["orp_prv_id"] != 0 && product_repeater_item[i]["orp_prv_id"] != null)
              {
               $('select[name="product_repeater_item[' + i + '][orp_prv_id]"]').html(prodSizeSelect2Val);
              }else
              {
                $('select[name="product_repeater_item[' + i + '][orp_prv_id]"]').html('<option value="0" selected >Please Select <option>');
              }
          
             if(product_tax == '1')
             {
              
              var discTypeSelect2Val =
              '<option value="'+product_repeater_item[i]["orp_disc_type"] +'" selected>'+product_repeater_item[i]["orp_disc_type_value"]+
              "</option>";
              if(product_repeater_item[i]["orp_disc_type"] != 0 && product_repeater_item[i]["orp_disc_type"] != null)
              {
               $('select[name="product_repeater_item[' + i + '][orp_disc_type]"]').html(discTypeSelect2Val);
              }else
              {
                $('select[name="product_repeater_item[' + i + '][orp_disc_type]"]').html('<option value="0" selected >Please Select <option>').trigger('change');
              }
                parent_div.find('.prd_amt_span').html(indiancurrency(parseFloat(product_repeater_item[i]["orp_prd_amt"]).toFixed(2)));
                parent_div.find('.prd_amt').html(product_repeater_item[i]["orp_prd_amt"]);
              parent_div.find('.prod_disc_amt_span').html(indiancurrency(parseFloat(product_repeater_item[i]["orp_disc_amt"]).toFixed(2)));
            // get values from fields
              nexlog('get values from fields >>');
             
              parent_div.find('.prod_sub_total_span').html(product_repeater_item[i]["orp_sub_total_format"]);
              parent_div.find('.prod_tax_span').html(product_repeater_item[i]["orp_tax_format"]);
              parent_div.find('.prod_tax_percent_span').html('('+product_repeater_item[i]["orp_tax_percent"]+'%)');
             }
              parent_div.find('.prod_total_span').html(product_repeater_item[i]["orp_total_format"]);
              /*$('input[name="product_repeater_item[' + i + '][orp_disc_type]"]').val(product_repeater_item[i]["bdn_price"]);*/
            // nexlog(select2Val);
              setTimeout(function(){
              calGrandTotal();
              },200);
          }
}
/*
 ****** Calculation Functions ********
*/
function assignCustomEvents()
{
  $('.prod_rate,.prod_qty,.prod_disc').off('keyup');
    $('.prod_rate,.prod_qty,.prod_disc').on('keyup',function(event){
   calculateProdPrice(this);
  });
  $('.prod_rate,.prod_qty,.prod_disc').off('keypress');
  $('.prod_rate,.prod_qty,.prod_disc').on('keypress',function(event){
   calculateProdPrice(this);
  });
  $('.prod_disc_type,.prod_prd_gst').off('change');
  $('.prod_disc_type,.prod_prd_gst').on('change',function(event){
   calculateProdPrice(this);
  });
 $(".numeric-decimal-format").inputFilter(function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); });
  $(".numeric-format").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });
  $('.billing_addr,.billing_gst,.billing_people').on('keyup',function(event){
     cloneBillingAddressToShippingAddress();
    });
    $('.billing_addr,.billing_gst,.billing_people').on('keypress',function(event){
     cloneBillingAddressToShippingAddress();
    });
    $('.billing_addr,.billing_gst,.billing_people').on('change',function(event){
     cloneBillingAddressToShippingAddress();
    });
   $('.billing_addr,.billing_gst,.billing_people').on('input',function(event){
     cloneBillingAddressToShippingAddress();
    });
}
  
function calculateProdPrice(thisElement)
{
    // nexlog('calculateProdPrice >>');
   

    var prd_rate=prd_qty=prd_amt=prd_disc_type=prd_disc=prd_disc_percent=prd_disc_amt=prd_sub_total=prd_gst=prd_tax=prd_total=0;
    var parent_div = $(thisElement).parents('.product_repeater_item');
    var product_tax = $('.product_tax').val();
    // get values from fields
    // nexlog('get values from fields >>');
     prd_rate       = parent_div.find(prd_rate_selector).val();
     prd_qty        = parent_div.find(prod_qty_selector).val();
     if(product_tax == '1')
     {
        prd_disc_type  = (parent_div.find(prod_disc_type_selector)) ? parent_div.find('.prod_disc_type').val():0;
        prd_disc       = (parent_div.find(prod_disc_selector)) ? parent_div.find('.prod_disc').val():0;
        prd_gst        = parent_div.find(prod_gst_selector).val();
     }else
     {
        prd_disc_type  = 0;
        prd_disc       = 0;
        prd_gst        = 0;
     }
     
    // nexlog('prd_rate : '+prd_rate+' || prd_qty : '+prd_qty+' || prd_disc_type : '+prd_disc_type+' || prd_disc : '+prd_disc+' || prod_gst : '+prd_gst);
    // nexlog('get values from fields <<');
    // get values from fields
    // calculate product amt
    // nexlog('calculate product amt >>');
    if(prd_qty =='' || prd_qty == '0')
    {
      prd_qty =1;
      parent_div.find(prod_qty_selector).val('1').addClass('edited');
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
     if(product_tax == '1')
     {
        // nexlog('calculate product discount >> prd_disc_type : '+prd_disc_type);
            if(prd_disc_type != null && prd_disc_type !='')
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
                        parent_div.find(prod_disc_selector).val('100');
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
            if($('.prod_tax_computation').length > 0 && $('.prod_tax_computation').prop("checked") == true)
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
      if(product_tax == '1')
     {
       parent_div.find('.prod_disc_amt_span').html(indiancurrency(prd_disc_percent));
       parent_div.find('.prod_amt_span').html(indiancurrency(prd_amt.toFixed(2)));
       parent_div.find('.prod_amt').val(prd_amt);
       parent_div.find('.prod_disc_amt').val(prd_disc_percent);
     }
       parent_div.find('.prod_sub_total_span').html(indiancurrency(prd_sub_total.toFixed(2)));
       parent_div.find('.prod_sub_total').val(prd_sub_total);
       parent_div.find('.prod_tax_span').html(indiancurrency(prd_tax.toFixed(2)));
       nexlog('prd_tax : '+prd_tax);
       parent_div.find('.prod_tax').val(prd_tax);
     parent_div.find('.prod_total_span').html(indiancurrency(prd_total.toFixed(2)));
     parent_div.find('.prod_total').val(prd_total);
    // nexlog('prd_amt : '+prd_amt+' || prd_disc_percent : '+prd_disc_percent+' || prd_sub_total : '+prd_sub_total+' || prd_tax : '+prd_tax+' || prd_total : '+prd_total);
    // nexlog(' Assign Values <<');
    // Assign Values
    calGrandTotal();
    // nexlog('calculateProdPrice <<');
}   
function calGrandTotal()
{
    // nexlog('calGrandTotal >>');
  var prd_amt=prod_disc_type=prod_disc=gst_tax=prd_length=prd_sub_total=prd_tax=grand_total= 0.00;
  prd_length            = $('.product_repeater_item').length;
  var product_tax       = $('.product_tax').val();
  for (var i = 0; i < prd_length; i++) 
  {
    if(product_tax == '1')
   {
    // prd_tax     += parseFloat($('input[name="product_repeater_item['+i+'][product_tax]"]').val());
    prd_tax     += ($('.prod_tax')[i]) ? parseFloat($('.prod_tax')[i].value):0;
    prd_amt     += parseFloat($('.prod_sub_total')[i].value);
   }
   else
   {
    prd_amt     += parseFloat($('.prod_total')[i].value);
   }
  }
    nexlog('prd_amt : '+prd_amt+' || prod_disc_type : '+prod_disc_type+' || prod_disc : '+prod_disc);
  prd_sub_total=prd_amt;
 if(product_tax != '1')
   {
    nexlog('without product tax');
      prod_disc_type   = $('.prod_disc_type').val();
      prod_tax_percent = $('.prod_gst_percent').val();
      prod_disc         = $('.prod_disc').val();
      // calculate product discount
        nexlog('calculate total discount >> prod_disc_type : '+prod_disc_type+' prod_disc : '+prod_disc);
        if(prod_disc_type != null && prod_disc_type !='')
        {
          // nexlog('prd_disc_type : '+prd_disc_type);
          switch(prod_disc_type)
          {
            case disc_type_rs:
                  // nexlog(' disc_type_rs >>');
                   prod_disc = prod_disc;
                  // nexlog(' prod_tax_percent : '+prod_tax_percent);
                  // nexlog(' disc_type_rs <<');
                  break; 
            case disc_type_percentage:
                  // nexlog(' disc_type_percentage >>');
                  if(prod_disc > 100)
                  {
                    $('.prod_disc').val('0');
                    prod_disc = 0;
                    return false;                
                  }
                   prod_disc = (parseFloat(prd_amt) * (parseFloat(prod_disc)/100)) ;
                  // nexlog(' prod_tax_percent : '+prod_tax_percent);
                  // nexlog(' disc_type_percentage <<');
                  break;
            default:
                  prod_disc = 0;
                  break;
          }
          if(prod_disc == '' )
          {
            prod_disc = 0;
          }
          else
          {
            prd_sub_total =(parseFloat(prd_amt)-parseFloat(prod_disc));
          }
          nexlog(' prd_sub_total : '+prd_sub_total);
        }
        nexlog('prd_disc_type : '+prod_disc_type+' || prod_disc : '+prod_disc+' || prod_disc : '+prod_disc+' || prd_sub_total : '+prd_sub_total);
        // nexlog('calculate total discount << ');
        // calculate product discount
        // calculate product tax and total
        // nexlog(' calculate total tax >>');
        if($('.prod_tax_computation').length > 0 && $('.prod_tax_computation').prop("checked") == true)
        {
          if(prod_tax_percent != 'undefined' && prod_tax_percent !='' && prod_tax_percent > 0)
          {
            prd_tax = (parseFloat(prd_sub_total) * (parseFloat(prod_tax_percent) / 100));
          }else
          {
             prd_tax =0;
          }
        }
        else  if($('.prod_tax_computation').length > 0 && $('.prod_tax_computation').prop("checked") == false)
        {
            prd_tax = 0.00 ;
        }
        else
        {
            prd_tax = (parseFloat(prd_sub_total) * (parseFloat(prod_tax_percent) / 100));
        }
        // nexlog(' prod_tax_percent : '+prod_tax_percent+' prd_tax : '+prd_tax);
        // nexlog(' calculate total tax <<');
        grand_total =   +prd_sub_total + +prd_tax;
        // nexlog('prd_amt : '+prd_amt+' || disc_type_percentage : '+prod_tax_percent+' || prd_sub_total : '+prd_sub_total+' || prd_tax : '+prd_tax+' || grand_total : '+grand_total);
        // calculate product tax and total
      $('.form_amt').val(prd_amt);
      $('.form_amt_span').html(indiancurrency(prd_amt));
      $('.form_disc_amt').val(prod_disc);
      $('.form_disc_amt_span').html(indiancurrency(prod_disc));
      $('.form_sub_total').val(prd_sub_total);
      $('.form_sub_total_span').html(indiancurrency(prd_sub_total.toFixed(2)));
        // nexlog('prd_amt : '+prd_amt+' || disc_type_percentage : '+prod_tax_percent+' || prd_sub_total : '+prd_sub_total);
   }
   else
   {
     // grand_total =   prd_sub_total;
      $('.form_sub_total').val(prd_sub_total);
      $('.form_sub_total_span').html(indiancurrency(prd_sub_total.toFixed(2)));
      grand_total =   +prd_sub_total + +prd_tax;
   }
   nexlog('prd_sub_total : '+prd_sub_total+' || prd_tax : '+prd_tax+' || grand_total : '+grand_total);
  $('.form_gst').val(prd_tax);
  $('.form_gst_span').html(indiancurrency(prd_tax.toFixed(2)));
  $('.form_total').val(grand_total);
  $('.form_total_span').html(indiancurrency(grand_total.toFixed(2)));
    // nexlog('calGrandTotal <<');
}
  $('.prod_tax_computation').change(function(){
    var computation_value= this.value;
    if(this.value == '1')
    {
      computation_value = 0;
    }
    else
    {
      computation_value = 1;
    }
    $(this).val(computation_value);
    setTimeout(function(){
                calAllProduct();
              },400);
  });
 function calAllProduct()
 {
   var prod_total  = $('.product_repeater_item').length;
   for (var i = 0; i < prod_total; i++) 
   {
     $($('.prod_rate')[i]).trigger('keypress');
   }
 }
/*
 ****** Calculation Functions ********
*/
 $(document).ready(function(){
  $("#custom_module_form").validate(
    {
        errorClass: "errormesssage",
         rules: {
            ord_code: {
              remote: {
                url: baseUrl + 'order/checkUniqueCode/ord_code/'+$("#ord_id").val(),
                type: "post",
                data: {
                  value: function() {
                    return $('#ord_code').val();
                  },
                },
              },
            },
          },
          messages: {
            ord_code: {
              remote: function() {
                return $("#ord_code").val()+" is already generated";
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
              var billing_cmp = checkCompanyState('.billing_cmp_state','.billing_cmp');
              if(billing_cmp == false)
              {
                return;
              }
              var vdr_cmp = checkCompanyState('.cli_cmp_state','.cmp_id');
              if(vdr_cmp == false)
              {
                return;
              }
              var ord_tax_computation=0;
                 if($('#ord_tax_computation').length > 0 && $('#ord_tax_computation').prop("checked") == true)
                {
                  ord_tax_computation= $('#ord_tax_computation').val();
                }
                
              var formData = new FormData(form)
              formData.append('ord_tax_computation',ord_tax_computation);
              // formData['ord_tax_computation']=0;
               
              // $('.btn_save').button('loading');
                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "order/multi_form_data_save",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
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


 
 function checkCompanyState(state_selector,cmp_selector)
{
   var ord_cmp_result = true;
     if($('.prod_tax_computation').length > 0 && $('.prod_tax_computation').prop("checked") == true)
    {
       var cmp_state = $(state_selector).val();
           if(cmp_state  == 0 || cmp_state  == '')
          {
       nexlog(cmp_state );
             swal(
                  {
                      title: "Opps",
                      text: "Please update state of "+$(cmp_selector).select2('data')[0].text+" for tax computation",
                      type: "error",
                      icon: "error",
                      button: true,
                  });
             ord_cmp_result = false;
          }
      }
    return ord_cmp_result;
}
function getCompDetails(thisElement)
{
      var billing_addr = '';
      var billing_gst  = '';
      var people_option  = '<option value="0" selected="selected">Please Select</option>';
      if($(thisElement).val() != null)
      {
        var billing_addr = $(thisElement).select2('data')[0].cmp_address;
        var billing_gst = $(thisElement).select2('data')[0].cmp_gst_no;
        var billing_state = $(thisElement).select2('data')[0].cmp_stm_id;
        var ppl_id = $(thisElement).select2('data')[0].cpl_ppl_id;
        var ppl_name = $(thisElement).select2('data')[0].cpl_ppl_name;
        var ots_amt = $(thisElement).select2('data')[0].ots_amt;
        var cmp_encrypted_id = $(thisElement).select2('data')[0].cmp_encrypted_id;
        var ots_link = baseUrl+'outstanding-details-'+cmp_encrypted_id; 
        if(ppl_id !='')
        {
          people_option = '<option value="'+ppl_id+'" selected="selected">'+ppl_name+'</option>';
        }
      }
      $('.billing_addr').val('');
      $('.billing_gst').val('');
      $('.cli_cmp_state').val('');
      $('.ots_amt').val('');
      $('.billing_addr').val(billing_addr).addClass('edited');
      $('.billing_gst').val(billing_gst).addClass('edited');
      $('.cli_cmp_state').val(billing_state);
      $('.billing_people').html(people_option).trigger('change');
      $('.ots_amt').html(ots_amt);
      $('.ots-link').attr('href',ots_link);
      cloneBillingAddressToShippingAddress();
}
function cloneBillingAddressToShippingAddress()
{
  nexlog('in herer');
  var billing_addr='';
  var billing_gst='';
  var billing_people='';
  var billing_people_name='';
  var billing_people_select2='';
  if($('#clone_check').prop("checked") == true)
  {
    billing_addr   = $('.billing_addr').val();
    billing_gst    = $('.billing_gst').val();
    billing_people = $('.billing_people').val();
    if($('.billing_people').select2('data')[0])
    {
     billing_people_name = $('.billing_people').select2('data')[0].text;
    }
    $('.shipping_addr').val(billing_addr).addClass('edited');
    $('.shipping_gst').val(billing_gst).addClass('edited');
     billing_people_select2 = '<option value="'+billing_people+'" selected="selected">'+billing_people_name+'</option>';
    nexlog(billing_people_select2);
    $('.shipping_people').html(billing_people_select2).change();
  }
  else
  {
    $('.shipping_addr').val(billing_addr);
    $('.shipping_gst').val(billing_gst);
    $('.shipping_people').val(billing_people).change();
  }
 
 
}