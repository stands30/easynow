
  // ********** DataTable Common functions *******//
 
   /* To override the object kindly refer following code
            dataTableObj:{ 
            lengthMenu : [
                          [10,200,400,-1],
                          [10,200,400,"All"] // change per page values here
                         ] 
    }*/

  	//params - 
  	/*
    	element_id_or_class (steing), 
    	url (string), 
    	columns (object), 
    	button (bool - optional), 
    	serverside (bool - optional), 
    	searchdelay (int - optional), 
    	optionalParam (object - optional);
  	*/

    $('[data-toggle="tooltip"]').tooltip(); 
       
    function customDatatable(element, url, columns, buttons = true, serverSide = false, delay = 1000, optParam = {})
    {
        $('.page-content-white').addClass('page-custom-datatable');
        $('.btn-group').addClass('btn-group-right');
        $('.btn.green').addClass('btn-add-new');

        var common_dataTableObj = {
        responsive: false,
        "order": [],
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered to 1 from _END_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search",
            "zeroRecords": "Showing _START_ to _END_ of _TOTAL_ entries"
        },

        "scrollY": true,
        "scrollX": true,

        "lengthMenu": [
            [100,200,400,-1],
            [100,200,400,"All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 100,
        // "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
        "dom": "<'row'<'col-lg-5 col-md-6 col-sm-12'><'col-lg-7 col-md-6 col-sm-12'fB>r><'table-scrollable't><'row'<'col-md-7 col-sm-12'il><'col-md-5 col-sm-12'p>>", // horizobtal scrollable datatable
        
    }

  	var btn_obj = [];

  	if(buttons)
  	{
  		btn_obj = [
            { extend: 'print', className: 'btn dark btn-outline' },
            { extend: 'copy', className: 'btn red btn-outline' },
            { extend: 'excel', className: 'btn yellow btn-outline ' },
            { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
        ];
  	}

		common_dataTableObj = $.extend({}, common_dataTableObj, {
			buttons: btn_obj
    	});

    	if(serverSide)
    	{
			common_dataTableObj = $.extend({}, common_dataTableObj, {
				searchDelay: delay,
				"serverSide": true,
	    	});
    	}	

    	var dataTableObj = $.extend({}, {
				'ajax'      : url,
				'columns'   : columns
			},
			common_dataTableObj
        );

    	/*if(optParam)
    	{
			dataTableObj = $.extend({}, dataTableObj, optParam);
    	}*/

    	return $(element).dataTable(dataTableObj);
    }
    function getTablCount(tableName, countElement) {
      $(tableName).on('draw.dt', function() {
        var count = $(tableName+'_wrapper').find(tableName + '_info').html().split(' ')[5];
        $(countElement).html('' + (count ? count : 0) + '');
      });
    }
    
    function customDatatablex(param)
    {
      //param.element, param.url, param.columns, buttons = true, serverSide = false, delay = 1000, optParam = {}
        $('.page-content-white').addClass('page-custom-datatable');
        $('.btn-group').addClass('btn-group-right');
        $('.btn.green').addClass('btn-add-new');

        var common_dataTableObj = {
        responsive: false,
        "order": [],
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered to 1 from _END_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search",
            "zeroRecords": "No matching records found"
        },
        // Header Fixed
        // fixedHeader: {
        //     header: true,
        //     headerOffset: fixedHeaderOffset
        // },  
        // For scroll
        "scrollY": true,
        "scrollX": true,

        "lengthMenu": [
            [100,200,400,-1],
            [100,200,400,"All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 100,
        // "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
        "dom": "<'row'<'col-md-6 col-sm-12'><'col-md-6 col-sm-12'fB>r><'table-scrollable't><'row'<'col-md-7 col-sm-12'il><'col-md-5 col-sm-12'p>>", // horizobtal scrollable datatable
        
    }    
    	var btn_obj = [];

    	if(param.buttons)
    	{
    		btn_obj = [
          { extend: 'copy', className: 'btn red btn-outline' },
          { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
        ];

        if(param.optParam.exportAccess)
          btn_obj.push({ extend: 'excel', className: 'btn yellow btn-outline' });
        
        if(param.optParam.printAccess)
          btn_obj.push({ extend: 'print', className: 'btn dark btn-outline'});
    	}

		  common_dataTableObj = $.extend({}, common_dataTableObj, {
			 buttons: btn_obj
    	});
        if(param.sr_no)
      {
        common_dataTableObj = $.extend({}, common_dataTableObj, {
       "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                  $("td:first", nRow).html(iDisplayIndex +1);
                 return nRow;
              },
        });
      }
       if(param.footerCallback)
      {
        common_dataTableObj = $.extend({}, common_dataTableObj, {
       "footerCallback" :param.footerCallback,
        });
      }
       if(param.columnDefs)
      {
        common_dataTableObj = $.extend({}, common_dataTableObj, {
       "columnDefs" :param.columnDefs,
        });
      }
       if(!param.searching)
      {
        common_dataTableObj = $.extend({}, common_dataTableObj, {
       "searching" :param.searching,
        });
      }
       if(!param.paging)
      {
        common_dataTableObj = $.extend({}, common_dataTableObj, {
       "paging" :param.paging,
        });
      }
       if(!param.info)
      {
        common_dataTableObj = $.extend({}, common_dataTableObj, {
       "info" :param.info,
        });
      }
    	if(param.serverSide)
    	{
			common_dataTableObj = $.extend({}, common_dataTableObj, {
				searchDelay: param.delay,
				"serverSide": true,
	    	});
    	}	
      nexlog(common_dataTableObj);
    	var dataTableObj = $.extend({}, {
  				'ajax'      : param.url,
  				'columns'   : param.columns

  			},

  			common_dataTableObj
      );

    	/*if(optParam.optParam)
    	{
			 dataTableObj = $.extend({}, dataTableObj, optParam.optParam);
    	}*/

    	return $(param.element).dataTable(dataTableObj);
    }


    // sidebar view more button

    var viewLessText     = 'View less <span> <i class="fa fa-angle-up"></i></span>';
    var viewMoreText     = 'View more <span> <i class="fa fa-angle-down"></i></span>';
    var navStack         = '.nav-stack';
    var viewMoreBtnClass = $('.btn-view-more');

    $(document).ready(function(){ 

      toggleOnloadSlide();
      $('input, select, .date-picker, .hasDatepicker').attr('autocomplete','off');

      $('input, select, textarea').each(function(){
        if($(this).val() != '')
          $(this).addClass('edited');
      });

      $(".btn-view-more").click(function()
      {
        navSlide();
      });
      
      $('.custom-select2').each(function(){
        if($(this).val() != '')
          var labelField = $(this).parents('.form-md-floating-label').find('.custom-label').text('');
      });

      $('.custom-select2-multiple').each(function(){
        if($(this).val() != '')
          $(this).parents('.form-md-floating-label').find('.custom-label').text('');
        else
          $(this).html('');
      });

      $('.custom-select2, .custom-select2-multiple').change(function(){
        var labelField = $(this).parents('.form-md-floating-label').find('.custom-label');
        if($(this).val())
          labelField.css('display','none');
        else
          labelField.css('display','block');          
      });

      $("input[type=number]").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
           // Allow: Ctrl+A, Command+A
          (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
           // Allow: home, end, left, right, down, up
          (e.keyCode >= 35 && e.keyCode <= 40)) {
          // let it happen, don't do anything
          return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
      });

      /*
      checkViewMoreToggle('slide-down');  
      $(".btn-view-more").click(function()
      {
        checkViewMoreToggle('slide-toggle');
      });
      */
      setTimeout(function(){
        $('.blank_option').remove();
      },1000);
    }); 

    // on window size change
    $(window).resize(function() {
      toggleOnloadSlide()
        /*console.log('window.innerWidth >>');
        console.log(window.innerWidth);
        if (window.innerWidth > 1200)
        {                                
          
        checkViewMoreToggle('slide-down');
        }
        if (window.innerWidth < 1200)
        {                            
          // $(".people-stack").slideUp();
          // console.log("View More");
          // $("a.btn-view-more").text("View more").append('<span> <i class="fa fa-angle-up"></i></span>');
        checkViewMoreToggle('slide-up');
        }*/
    });

    function toggleOnloadSlide()
    {
      var desktop = true;

      if (isMobile())                       
        desktop = false;

      $(navStack).css('display', 'none');
        viewMoreBtnClass.html(viewMoreText);

      if(desktop)
      {
        $(navStack).css('display', 'block');
        viewMoreBtnClass.html(viewLessText);
      }
    }

    function navSlide()
    {
      if($(navStack).css('display') == 'none' )
      {
        viewMoreBtnClass.html(viewLessText)
        $(navStack).slideDown();
      }
      else
      {
        viewMoreBtnClass.html(viewMoreText);
        $(navStack).slideUp();
      }
    }

    // function checkViewMoreToggle(customToggle)
    // {
    //   var viewMoreBtnClass = $('.btn-view-more');
    //   var customClass      = 'custom-view-more';
    //   var customLessClass  = 'custom-view-less';
    //   var navStack         = '.nav-stack';
    //   var viewMoreHasClass = $(viewMoreBtnClass).hasClass(customClass);
    //   var viewLessText     = 'View less <span> <i class="fa fa-angle-up"></i></span>';
    //   var viewMoreText     = 'View more <span> <i class="fa fa-angle-down"></i></span>';
    //   switch(customToggle)
    //   {
    //     case 'slide-up':
    //                      $(navStack).slideUp();
    //                      break;
    //     case 'slide-down':
    //                      $(navStack).slideDown();
    //                      break;
    //     case 'slide-toggle':
    //                      $(navStack).slideToggle();
    //                      break;
    //     default : 
    //                      return;
    //   }
    //     viewMoreBtnClass.toggleClass(customClass);
    //   if(!viewMoreHasClass)
    //   {
    //     viewMoreBtnClass.html(viewLessText);
    //   }
    //   else
    //   {
    //     viewMoreBtnClass.html(viewMoreText);
    //   }
    //   return true;
    // }

    function isMobile()
    {
      return window.innerWidth < 1200;
    }

    function preventSpecialCharacter(event)
    {
      // use at element - <input type="text" onkeypress="return preventSpecialCharacter(event) ">

      var key = event.charCode || event.keyCode || 0;
      //console.log(key) // to get the keycode for keypress event
      if(!(
        key == 8 ||   // backspace
        key == 9 ||   // tab
        key == 46 ||  // delete
        key == 32 ||  // space
        ((key == 173) && (event.shiftKey)) ||   // underscore
        ((key == 190) && (!event.shiftKey)) ||  // period
        ((key >= 48 && key <= 57) && (!event.shiftKey)) ||  // numerics
        (key >= 65 && key <= 90) ||   // a-z
        (key >= 97 && key <= 122)     // A-Z
      )) {
        event.preventDefault();
        return false;
      }
    }

    // --------- common function end

    function number_format(n) {
      return parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
    }

    $(document).ready(function(){
      selectActiveSidebar()
    })

    function selectActiveSidebar()
    {
      $("a[href*='" + window.location.href + "']").each(function () {
        $(this).css('font-weight','bold');
      });
    }

    $.fn.timeList = function(param)
    {
      var minuteDiff = param.minutediff;
      var selectNearest = param.default;

      var diff = 60/parseInt(minuteDiff);
      var min = [];
      var time = '';
      var selected = false;

      var getNearestTime = function(timeval){
        var dt = new Date();
        var timenow = dt.getHours().toString().padStart(2, '0') +''+ dt.getMinutes().toString().padStart(2, '0');

        if(timenow <= timeval && !selected)
        {
          selected = true;
          return timenow <= timeval;
        }
        return false;
      }

      for(var i = 0; i < 24; i++)
      {
        for(var j = 0; j < diff; j++)
        {
          var select = '';

          var timeint = (i).toString().padStart(2, '0')+(minuteDiff*j).toString().padStart(2, '0');
          var timeval = timeint.substring(0, 2) + ':' + timeint.substring(2, timeint.length);

          time += '<option';

          if(((selectNearest == true && getNearestTime(timeint)) || (selectNearest == timeval)))
            select = ' selected="selected"';
          else
            select = ' ';

          time += select+' value = "'+timeval+'">'+timeval+'</option>';
        }
      }

      $(this).html(time);
    };

    function responsemsg(response, callbacksuccess, callbackfailure)
    {
      if (response.success == true)
      {
        swal({
          title: "Done",
          text: response.message,
          type: "success",
          icon: "success",
          button: true,
        });

        if($('.no-redirect').prop('checked'))
          location.reload();
        else if(callbacksuccess)
          callbacksuccess();
      }
      else
      {
        swal({
          title: "Opps",
          text: "Something Went wrong",
          type: "error",
          icon: "error",
          button: true,
        });

        if($('.no-redirect').prop('checked'))
          location.reload();
        else if(callbackfailure)
          callbackfailure();
      }

      
      /*setTimeout(function(){
        window.location.href = response.linkn;
      },1000)*/
    }

    $.fn.getDefaultvalue = function()
    {
      var _this = $(this);
      var grp_arr = [];
      var elem = [];
      
      for(var i = 0; i < _this.length; i++)
      {
        var prm = $(_this[i]).data('gen-grp');
        elem[prm] = $(_this[i]).attr('id');

        if(prm)
          grp_arr.push(prm);
      }
      $.ajax({
        type: "POST",
        url : baseUrl + "lead/getDefaultvalue",
        data: {
          'data': grp_arr
        },
        success: function(response)
        {
          response = JSON.parse(response);
          var responsekey = Object.keys(response)
          for(var i = 0; i < responsekey.length; i++)
          {
            var option = '<option value="'+response[elem[responsekey[i]]].value+'" selected="selected">'+response[elem[responsekey[i]]].name+'</option>';
            $('#'+elem[responsekey[i]]).html(option).addClass('edited');
            $('#'+elem[responsekey[i]]).parent().find('.custom-label').addClass('hidden');            
          }
        }
      })
    };
     $.fn.getDefaultvalueById = function()
    {
      var _this = $(this);
      var grp_arr = [];
      var elem = [];
      
      for(var i = 0; i < _this.length; i++)
      {
        var prm = $(_this[i]).data('gen-grp');
        elem[prm] = $(_this[i]).attr('id');

        if(prm)
          grp_arr.push(prm);
      }
      $.ajax({
        type: "POST",
        url : baseUrl + "lead/getDefaultvalue",
        data: {
          'data': grp_arr
        },
        success: function(response)
        {
          response = JSON.parse(response);
          var responsekey = Object.keys(response)
          for(var i = 0; i < responsekey.length; i++)
          {
            var option = '<option value="'+response[responsekey[i]].value+'" selected="selected">'+response[responsekey[i]].name+'</option>';
            $('#'+elem[responsekey[i]]).html(option).addClass('edited');
            $('#'+elem[responsekey[i]]).parent().find('.custom-label').addClass('hidden');            
          }
        }
      })
    };

    function cswal(options)
    {
      var title = options.title;
      var text  = options.text;
      var type  = options.type;

      if(!title)
        title = 'Done';

      if(type == 'alert')
      {
        options['type'] = "success";
        options['icon'] = "success";
        swal(options);
      }
      else if(type == 'confirm') 
      {
        options['buttons']    = true;
        options['dangerMode'] = true;
        options['type']       = "info";
        options['icon']       = "info";
        options['confirmButtonText']  = "Yes";
        options['cancelButtonText']   = "No";

        swal(options).then((isConfirm) => {
          if(isConfirm)
            options.onyes();
          else
          {
            if(options.oncancel)
              options.oncancel();
          }
        })
      }
      else if(type == 'delete')
      {
        options['buttons']    = true;
        options['dangerMode'] = true;
        options['type']       = "error";
        options['icon']       = "error";
        options['confirmButtonText']  = "Yes";
        options['cancelButtonText']   = "No";
        
        swal(options).then((isConfirm) => {
          if(isConfirm)
            options.onyes();
          else
          {
            if(options.oncancel)
              options.oncancel();
          }        
        })
      }
    }

    $.fn.ezautocomplete = function(options)
    {
      var _this = this;
      $(_this).easyAutocomplete({
        url: function(value) {
          return options.url + value;
        },
        getValue: function(element) {
          if(element.id == 0)
            $(options.id).val('');

          return element.text;
        },
        list: {
          onClickEvent: function() {
            var selectedItemValue = $(_this).getSelectedItemData().id;
            $(options.id).val(selectedItemValue);
          },
          onChooseEvent: function() { 
            var selectedItemValue = $(_this).getSelectedItemData().id;
            $(options.id).val(selectedItemValue);
          },
          onHideListEvent: function() {
            if($(options.id).val() == '' || isNaN($(options.id).val()))
              $(options.id).val($(_this).val());
          }
        }
      })
    }
  function nexlog($data)
  {
    return console.log($data);
  }
   function indiancurrency (x)
   {
    x=x.toString();
    var afterPoint = '';
    if(x.indexOf('.') > 0)
       afterPoint = x.substring(x.indexOf('.'),x.length);
    x = Math.floor(x);
    x=x.toString();
    var lastThree = x.substring(x.length-3);
    var otherNumbers = x.substring(0,x.length-3);
    if(otherNumbers != '')
        lastThree = ',' + lastThree;
    var res1 = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
    var res =res1;
    return res ;
  }
  function round(value, decimals) {
  return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
  }
// $('.numeric-format').on('keypress',checkNumeric(this,event));
 /*$('.numeric-format').on('keydown',checkNumeric(event));
 function checkNumeric(evt)
 {
  nexlog(evt);
  if(evt != 'undefined')
    { 
      return false;
     }
     var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
  }*/
 /* function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}*/

$.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  };
  $(".numeric-format").inputFilter(function(value) {
    if(value == '-') return false;
  return /^-?\d*$/.test(value); });
  $(".numeric-decimal-format").inputFilter(function(value) {
    if(value == '-') return false;
  return /^-?\d*[.,]?\d*$/.test(value); });
  function initializeNumberFormatValidation()
  {
    $(".numeric-format").inputFilter(function(value) {
      if(value == '-') return false;
    return /^-?\d*$/.test(value); });
    $(".numeric-decimal-format").inputFilter(function(value) {
      if(value == '-') return false;
    return /^-?\d*[.,]?\d*$/.test(value); });

  }
  function checkNumeric(thisElement,evt)
  {
    console.log(' reached here || string : '+evt);
    if(evt != 'undefined')
    { 
      return false;
     }
    if ( isNaN( String.fromCharCode(evt.keyCode) )) 
    {
      evt.preventDefault();
    }
  }
  $('.btn_save_new').on('click', function() {
    $('.no-redirect').prop('checked', true);
    $('.btn_save').click();
  });
  
  var now = function(type)
  {
    var adate   = new Date();

    var year      = adate.getFullYear().toString();
    var month     = (adate.getMonth()+1).toString();
    var date      = adate.getDate().toString();
    var hour      = adate.getHours().toString();
    var minute    = adate.getMinutes().toString();

    month   = (month.length   ==  1 ? '0' + month   : month);
    date    = (date.length    ==  1 ? '0' + date    : date);
    hour    = (hour.length    ==  1 ? '0' + hour    : hour);
    minute  = (minute.length  ==  1 ? '0' + minute  : minute);

    if(type =='date')
      return year+'-'+month+'-'+date;
    else if(type == 'time')
      return hour+':'+minute;
    else
      return year+'-'+month+'-'+date+' '+hour+':'+minute;
  }

  var sanitizeURL = function(url)
  {
    var weblink = {
        url:'',
        text:''
    };

    if((url.indexOf('http://') !== -1) || (url.indexOf('https://') !== -1) || (url.indexOf('www') !== -1))
    {
      url = url.replace('https://', '');
      url = url.replace('http://', '');
      text = 'http://' + url;

      weblink.url   = url;
      weblink.text  = text;
    }
    
    return weblink;
  }
  function getTimeDiff(prev_date)
  {
     var prev_date = new Date(prev_date);
     var current_date = new Date();
     // nexlog(' current_date : '+current_date+' || prev_date : '+prev_date);
      var diff = Math.floor(current_date.getTime() - prev_date.getTime());
      var diff = diff/1000;  //miliseconds to seconds
      // nexlog('diff : '+diff);
      var day = 1000 * 60 * 60 * 24;
    var seconds = 1;
    var minute = seconds*60;
    var hours = minute*60;
    var days = hours*24;
    var months = days*30;
    var years = months*12;
   
     // nexlog(' hours : '+hours+' || minute : '+minute+' seconds : '+seconds+' || days : '+days+' months : '+months+' || years : '+years);
    if(diff > years)
    {
      message =  Math.floor(diff/years)+' years ago';
    }
    else if(diff > months && diff < years)
    {
      message =   Math.floor(diff/months)+' months ago';
    }
    else if(diff > days && diff < months )
    {
      message =   Math.floor(diff/days)+' days ago';
    }
     else if(diff > hours && diff < days )
    {
      message =   Math.floor(diff/hours)+' hours ago';
    }
      else if(diff > minute && diff < days )
    {
      message =   Math.floor(diff/minute)+' minute ago';
    }
     else if(diff > seconds && diff < minute )
    {
      message =   Math.floor(diff/seconds)+' seconds ago';
    }
    // nexlog(message);
    

    return message
  }


  // $(document).ready(function() {
  //         $('.email-preview-modal-summernote').summernote({height:200});
  // });
   /*function updateQueryStringParameter( key, value) {
      var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
      var currentUrl = window.location.href;
      var separator = currentUrl.indexOf('?') !== -1 ? "&" : "?";
      nexlog(currentUrl.replace(re, '$1' + key + "=" + value + '$2'));
      if (currentUrl.match(re)) {
        currentUrl = currentUrl.replace(re, '$1' + key + "=" + value + '$2');
      }
      else {
        currentUrl = currentUrl + separator + key + "=" + value;
      }
        window.history.pushState({path:currentUrl},'',currentUrl);
    }*/
   /* var key_array = new Array({ 'key':'stanley','value':0},{ 'key':'ds','value':1});
    updateQueryStringParameter();*/
  function updateQueryStringParameter(key_array) {
      var key_array_length = key_array.length;
      var url_parameters = '';
      for (var i = 0; i < key_array_length; i++) 
      {
         var key = key_array[i].key;
         var value = key_array[i].value;
         var currentUrl = window.location.href;
         var separator = '';
          if(i != 0)
          {
            separator='&';
          }else{
            // separator = currentUrl.indexOf('?') !== -1 ? "&" : "";

          }
          var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
          // console.log(re);
          // console.log(currentUrl.match(re));
          if (currentUrl.match(re))
          {
             removeParam(key);
          }
            url_parameters +=separator+key + "=" + value;
      }

            separator = currentUrl.indexOf('&') !== -1 ? "&" : "?";
          // var separator = url_parameters.indexOf('?') !== -1 ? "&" : "";
            // nexlog(separator +" separator");
         new_url = window.location.href+separator+url_parameters;
         new_url = new_url.replace('?&','?');
         new_url = new_url.replace('??','?');
         new_url = new_url.replace('#','');
        window.history.pushState({path:new_url},'',new_url);
    }
     function removeParam(parameter)
    {
      var url=document.location.href;
      var urlparts= url.split('?');

     if (urlparts.length>=2)
     {
      var urlBase=urlparts.shift(); 
      var queryString=urlparts.join("?"); 

      var prefix = encodeURIComponent(parameter)+'=';
      var pars = queryString.split(/[&;]/g);
      for (var i= pars.length; i-->0;)               
          if (pars[i].lastIndexOf(prefix, 0)!==-1)   
              pars.splice(i, 1);
      url = urlBase+'?'+pars.join('&');
      window.history.pushState('',document.title,url); // added this line to push the new url directly to url bar .

    }
    return url;
    }
    function getUrlParameterValueByParam(parameter_name)
    {
      var currentUrl = window.location.href;
      var url = new URL(currentUrl);
      var result = url.searchParams.get(parameter_name);
      return result;
    }
    function updateDateFilter(thisElement,callback='')
    {
      console.log('this');
       var start_date = $(thisElement).attr('data-daterangevaluestart');
       var end_date   = $(thisElement).attr('data-daterangevalueend');
      // console.log('start_date : '+start_date+' || end_date : '+end_date);
       var key_array = new Array({ 'key':'start_date','value':start_date},{ 'key':'end_date','value':end_date});
       // nexlog(key_array);
       updateQueryStringParameter(key_array);
       higlightSelectedDate();
       callback(start_date,end_date);
    }
    function higlightSelectedDate()
   {
    var startDate = getUrlParameterValueByParam('start_date');
    var endDate   = getUrlParameterValueByParam('end_date');
    $('.date-range-picker-div').removeClass('date-range-picker-div-selected');
     $('.date-range-picker-div').each(function(){
     var start_date_value = $(this).attr('data-daterangevaluestart');
     var end_date_value   = $(this).attr('data-daterangevalueend');
       if(start_date_value == startDate && end_date_value == endDate)
       {
         $(this).addClass('date-range-picker-div-selected');
       }
     });

   }

   $('select').on('select2:selecting', function(event){
    // console.log('actual value: ' + $(event.target).val());
    $(this).find('option').remove();
  });

   function displayFieldData(parent_form,custom_data)
   {
    // console.log(parent_form);
    //   console.log(custom_data);
      for(var key in custom_data)
      {
           if (custom_data.hasOwnProperty(key)) 
           {
              
                  var $inputElement = $(parent_form).find("[name="+key+"]");
                   
                          // nexlog(' inputElement >> ');
                          // nexlog(custom_data);
                          // nexlog(' type :'+$inputElement.attr("type"));
                            var type = $inputElement.attr("type"); //will either be 'text', 'radio', or 'checkbox
                          /*if($inputElement.is('select'))
                           {
                            type ='select';
                           }*/
                          /* else if($inputElement.is('textarea'))
                           {
                             type ='textarea';
                           }*/
                          /* nexlog('type : '+type+ ' inputElement : ');
                           nexlog($inputElement);*/
                        switch (type)
                        {
                            case "checkbox":
                                  nexlog($inputElement.val());
                                   if($inputElement.val() == custom_data[key])
                                   {
                                      $inputElement.prop('checked','checked');
                                   }
                                    break;
                            case 'summernote':
                                  nexlog(custom_data[key]);
                                  $inputElement.summernote('code',custom_data[key]);
                                 break;
                            case 'textarea':
                                  nexlog(custom_data[key]);
                                  $inputElement.html(custom_data[key]).addClass('edited');
                                 break;
                            case 'select':
                                 var option = "<option value='"+custom_data[key]+"' selected='selected'>"+custom_data[key+'_value']+"</option>";
                                  $inputElement.html(option).trigger('change');
                                 break;
                            case 'undefined':
                                 break;
                            default:
                                 $inputElement.val(custom_data[key]).addClass('edited');
                                break;
                        
                         }
            }
        }
    // for (var i = 0; i < custom_data.length; i++) 
    // {
    //   console.log(custom_data[i]);
    // }
   }
   Date.prototype.addDays = function(days) {
    custom_date   = this;
    custom_date   = new Date(custom_date.setDate(custom_date.getDate() + parseInt(days)));
    var year      = custom_date.getFullYear().toString();
   var month_name = ['January','February','March','April','May','June','July','August','September','October','November','December']
    var month     = month_name[custom_date.getMonth()];
    var date      = custom_date.getDate().toString();
    // month   = (month.length   ==  1 ? '0' + month   : month);
    date    = (date.length    ==  1 ? '0' + date    : date);
   

      return date+' '+month+','+year;
};