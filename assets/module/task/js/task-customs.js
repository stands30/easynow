$(document).ready(function(){
  $(".view_more").hide();
  initiallizeSelect2();
});

function viewMore()
{
  $(".view_more").show();
  $(".view_more_btn").hide().removeClass("view_more_div");;
  $(".view_less_btn").show().addClass("view_more_div");
  initiallizeSelect2();
}

function viewLess()
{
  $(".view_more").hide();
  $(".view_more_btn").show();
  $(".view_less_btn").hide();

}


     $(function() {

        $( "#tsk_due_dt" ).datepicker({
            dateFormat : 'dd-mm-yy',
            changeMonth : true,
            changeYear : true,

        });
    });


function initiallizeSelect2()
{
  var select2PeopleUrl  = baseUrl+'task/getPeopleforDropdown/';
  var select2CompanyUrl = baseUrl+'task/getCompanyforDropdown/';
  var select2ProductUrl = baseUrl+'task/getProductforDropdown/';
  var select2LeadUrl    = baseUrl+'task/getLeadforDropdown/';
  var select2url        = baseUrl+'task/getGenPrmforDropdown/';
  var select2Accounturl = baseUrl+'task/getAccountforDropdown/';

    $('.select2ppl').select2({
      // placeholder:"Please Select People",
      ajax:
      {
        url: select2PeopleUrl + 'team',
        dataType: 'json',
      }
    });

    $('#tsk_client_id').select2({
      placeholder:"Please Select Client",
      ajax:
      {
        url: select2CompanyUrl+ 'client',
        dataType: 'json',
      }
    });

    $('#tsk_led_id').select2({
      placeholder:"Please Select Lead",
      ajax:
      {
        url: select2LeadUrl,
        dataType: 'json',
      }
    });

      $('#tsk_priority').select2({
    placeholder:"Please Select Priority",
    ajax:
    {
      url: select2url+'tsk_priority',
      dataType: 'json',
    }
  });

    $('#tsk_progress_status').select2({
    placeholder:"Please Select Status",
    ajax:
    {
      url: select2url+'tsk_progress_status',
      dataType: 'json',
    }
  });

  $('#tsk_type').select2({
    placeholder:"Please Select Ticket Type",
    ajax:
    {
      url: select2url+'tsk_type',
      dataType: 'json',
    }
  });

  $('#tsk_related_ppl').select2({

  width:'resolve',
  placeholder:"Select",
  multiple: true,
    ajax: {
      url : select2PeopleUrl + 'all',
      dataType: 'json',
    }
  });
  $('#tsk_related_cmp').select2({

  width:'resolve',
  placeholder:"Select",
    ajax: {
      url: select2Accounturl,
      dataType: 'json',
    }
  });
  $('#tsk_related_prd').select2({

  width:'resolve',
  placeholder:"Select",
  multiple: true,
    ajax: {
      url: select2ProductUrl,
      dataType: 'json',
    }
  });
}
