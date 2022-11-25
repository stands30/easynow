/*$(document).ready(function()
{
    var display_format = "D MMM YYYY";
    var custom_format = "YYYY-MM-D";
	$('#daterangepicker-custom-range').daterangepicker({
        
        "ranges": {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Last 7 Days': [moment().subtract('days', 6), moment()],
            'Last 30 Days': [moment().subtract('days', 29), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        "locale": {
            "format": "MM/DD/YYYY",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Su",
                "Mo",
                "Tu",
                "We",
                "Th",
                "Fr",
                "Sa"
            ],
            "monthNames": [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ],
            "firstDay": 1
        },
        //"startDate": "11/08/2015",
        //"endDate": "11/14/2015",
        opens: (App.isRTL() ? 'right' : 'left'),
    }, function(start, end, label) {
        $('#daterangepicker-custom-range span').html(start.format(display_format) + ' - ' + end.format(display_format));
        $('#daterangepicker-custom-range').attr('data-daterangevaluestart',start.format(custom_format));
        $('#daterangepicker-custom-range').attr('data-daterangevalueend',end.format(custom_format));
    });

    $('# span').html(moment().subtract('days', 29).format(display_format) + ' - ' + moment().format(display_format));
    $('#daterangepicker-custom-range').attr('data-daterangevaluestart',moment().subtract('days', 29).format(custom_format));
    $('#daterangepicker-custom-range').attr('data-daterangevalueend',moment().format(custom_format));
    $('#daterangepicker-custom-range').show();
});daterangepicker-custom-range



*/

  $(document).ready(function(){
    var display_format = "D MMM YYYY";
    var custom_format = "YYYY-MM-D";
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#daterangepicker-custom-range span').html(start.format(display_format) + ' - ' + end.format(display_format));
        $('#daterangepicker-custom-range').attr('data-daterangevaluestart',start.format(custom_format));
        $('#daterangepicker-custom-range').attr('data-daterangevalueend',end.format(custom_format));
    }
    $('#daterangepicker-custom-range').daterangepicker({
        startDate: start,
        endDate: end,
          locale: {
          cancelLabel: 'Clear'
      },
        ranges: {
           // 'Please Select': ['Start Date', 'End Date'],
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
  });
/*$('#daterangepicker-custom-range').on('cancel.daterangepicker', function(ev, picker) {
  //do something, like clearing an input
  $('#daterangepicker-custom-range').val('');
});*/