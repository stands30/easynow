$(document).ready(function()
{
 
    

    $('#ipt_mode').getDefaultvalueById();
    check_payment_mode();
    $.validator.setDefaults(
    {
        ignore: []
    });
    
   $('#ipt_cmp_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'invoice_payment/getCompanyDropdown',
      dataType: 'json',
    }
  }).change(function(){
    getCmpPeople(this);
  });
  
   $('#ipt_managed_by').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'invoice_payment/getPeopleDropdown';
      },
      dataType: 'json',
    }
  });
    $('#ipt_ppl_id').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: function(){
        return baseUrl+'invoice_payment/getPeopleDropdown?company='+ $('#ipt_cmp_id').val();
      },
      dataType: 'json',
    }
  });
   $('#ipt_mode').select2({
    /*placeholder: "Please Select Managed By *",*/
    ajax: {
      url: baseUrl+'invoice_payment/getGenPrmforDropdown/finance_payment_mode',
      dataType: 'json',
    }
  });
  
    $("#payment_add").validate(
    {
        errorClass: "errormesssage",
        /*errorPlacement: function(error, element) {
          $(element).parent('div').find('.custom-error').html(error);
        },*/
        rules : {
          ipt_amt : "required",
        },
        messages: {
          ipt_amt : "Please enter amount",
        },
        submitHandler: function(form)
        {
            try
            {
             
              var ipt_invoice_amt = '';
              var ipt_invoice = '';
               $('.ipt_invoice').each(function(){
                 if($(this).prop('checked') == true)
                 {
                  ipt_invoice_amt += $(this).attr('data-inv_total')+',';
                  ipt_invoice += $(this).attr('data-inv_id')+',';
                 }
               });
               ipt_invoice.substring(0,ipt_invoice.length-1 );
               ipt_invoice_amt.substring(0,ipt_invoice_amt.length-1 );
                var dataString = $('#payment_add').serialize()+'&ipt_invoice='+ipt_invoice+'&ipt_invoice_amt='+ipt_invoice_amt;
                // $('.btn_save').button('loading');

                $.ajax(
                {
                    type: "POST",
                    url: baseUrl + "invoice_payment/invoice_payment_data_save",
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
          var placement = $(group_div).find('div.help-block');
          $(placement).append(error)
        }
    });
  $('#ipt_amt,#ipt_disc,#ipt_tds_percent').keyup(function(){
    calAmount();
  });
  $('#ipt_amt,#ipt_disc,#ipt_tds_percent').keypress(function(){
    calAmount();
  });

});
function getCmpPeople(thisElement)
  {
    var ppl_id = $(thisElement).select2('data')[0].cpl_ppl_id;
    var ppl_name = $(thisElement).select2('data')[0].cpl_ppl_name;
    var ppl_select2 = '<option value="'+ppl_id+'" selected>'+ppl_name+ "</option>";
      if(ppl_id != 0 && ppl_id != null)
      {
       $('#ipt_ppl_id').html(ppl_select2);
      }else
      {
        $('#ipt_ppl_id').html('<option value="0" selected >Please Select <option>').trigger('change');
      }
    getInvoiceDataByCompany();
  }
function getInvoiceDataByCompany()
{
   var data = {
      cmp_id:$('#ipt_cmp_id').val()
      }

        $.ajax(
        {
            type: "POST",
            url: baseUrl + "invoice_payment/getInvoiceDataByCompany",
            data: data,
            dataType: "json",
            success: function(response)
            {
             if(response.results)
             {
               var invoice_checkbox = '';
               var result = response.results;
               var result_length = result.length;
               for (var i = 0; i < result_length; i++) {
               var selected = '';
                  if(inv_code == result[i].inv_code)
                  {
                     selected = " checked='checked'";
                  }
                  invoice_checkbox+='<label class="mt-checkbox mt-checkbox-custom">'+''+result[i].inv_code+''+
                              ' (<b> <i class="fas fa-rupee-sign " aria-hidden="true"></i> '+result[i].inv_total_format+'</b>)'+
                             ' <input type="checkbox" class="ipt_invoice" value="'+result[i].inv_id+'" name="invoice_checkbox"  data-inv_id="'+result[i].inv_id+'" data-inv_code="'+result[i].inv_code+'" data-inv_total="'+result[i].inv_total+'" onchange="return calAmount()" '+selected+'/>'+
                              '<span></span>'+
                            '</label>';
               }
               // nexlog(invoice_checkbox);
               $('.invoice_checkbox').html(invoice_checkbox);
             }
            }
        });
}
/*
 ****** Calculation Functions ********
*/
function calAmount()
{
  nexlog('calAmount >>');
  var on_acc=amt=disc=sub_total=tds_percent=tds_amt=total=inv_amt=inv_checkbox=inv_checkbox_length=balance=inv_check_box_total=inv_check_box_amt=0;
  on_acc = ($('#ipt_on_acc').val() > 0) ? parseFloat($('#ipt_on_acc').val()):0;
  amt = ($('#ipt_amt').val() > 0) ? parseFloat($('#ipt_amt').val()):0;
  disc = ($('#ipt_disc').val() > 0) ? parseFloat($('#ipt_disc').val()):0;
  tds_percent = (!isNaN($('#ipt_tds_percent').val())) ? parseFloat($('#ipt_tds_percent').val()):0;
  var grand_total=0;
  /*amt = $('#ipt_amt').val();
  disc = $('#ipt_disc').val();
  tds_percent = $('#ipt_tds_percent').val();*/
  nexlog('acc : '+on_acc+' || amt : '+amt+' || disc : '+disc+' || tds_percent : '+tds_percent);
  sub_total = amt+disc;
  nexlog('sub_total : '+sub_total);
  if(tds_percent != '' && tds_percent > 0 && sub_total !='' && sub_total > 0)
  {
    nexlog(' tds_percent : '+tds_percent);
    if(tds_percent > 100)
    {
      tds_percent = 100;
      $('#ipt_tds_percent').val(100);
    }
    tds_amt = (parseFloat(sub_total) *(tds_percent/100)) ;
  }
  total = parseFloat(sub_total)+parseFloat(tds_amt);
  grand_total = parseFloat(total)+parseFloat(on_acc);
  // get invoice amounts
   inv_checkbox_length = $('.ipt_invoice').length;
      balance = parseFloat(grand_total);
   $('.ipt_invoice').each(function(){
     if($(this).prop('checked') == true)
     {
      inv_check_box_total += parseFloat($(this).attr('data-inv_total'));
      inv_check_box_amt =parseFloat($(this).attr('data-inv_total'));
      balance = parseFloat(grand_total)-parseFloat(inv_check_box_total);
      nexlog('inv_check_box_total : '+inv_check_box_total+' || inv_check_box_amt : '+inv_check_box_amt+' || balance : '+balance);
       if(inv_check_box_total > grand_total )
       {
         swal('Your Invoice ('+$(this).attr('data-inv_code')+') amount is more than balance amount');
         $(this).removeAttr('checked');
         calAmount();
         return false;
       }

     }
   });
  // get invoice amounts
  nexlog('sub_total : '+sub_total+' || tds_amt : '+tds_amt+' || total : '+total+' || balance : '+balance);
  $('#ipt_sub_total').val(sub_total);
  $('.ipt_sub_total_span').html(sub_total);
  $('#ipt_tds_amt').val(tds_amt);
  $('.ipt_tds_amt_span').html(tds_amt);
  $('#ipt_total').val(total);
  $('.ipt_total_span').html(total);
  // $('.grand_total').html(' Amount available for invoice : <b style="color:#000;">'+grand_total+'</b>');
  // $('.grand_total').attr('data-total',grand_total);
  $('#ipt_balance').val(balance);
  $('.ipt_balance_span').html(balance);
  nexlog('calAmount <<');
}
/*
 ****** Calculation Functions ********
*/


