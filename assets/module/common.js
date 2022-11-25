
  function newEditable(editableElement, primary_key, updateUrl, select2Class, dropdownUrl,customSuccessFunction)
  {
    $(editableElement).editable({
      type: 'POST',
      pk:$(editableElement).attr('data-custom_select2_id'),
      sourceCache: false,
      params: function(params) {
        var peopleData = new Array();
        params['field'] = ($(this).attr('data-custom-gnp-grp')) ? $(this).attr('data-custom-gnp-grp'): $(this).attr('data-gnp-grp');
        params[primary_key] = $('#'+primary_key).val();
        params['field_value'] = params.value;
         params.old_value = $(editableElement).attr('data-custom_select2_id');
        return params;
      },
      url:updateUrl,
      validate: function(value) {
        if($.trim(value) == '' || $.trim(value) == $(this).attr('data-custom_select2_id')) {
        // if($.trim(value) == '' ) {
          return 'Please Select an option';
        }
      },
      success: function(response, newValue) {
        var select2CustomData = $('.'+select2Class).select2('data');
        $(this).attr('data-custom_select2_id', select2CustomData[0].id);
        $(this).attr('data-custom_select2_name', select2CustomData[0].text);
        $(this).html(select2CustomData[0].text);

        /*var gnp_group = $(this).attr('data-gnp-grp');

        if(gnp_group == 'emp_dept') {
          $('.emp_dept').attr('data-custom_select2_id', select2CustomData[0].id);
          $('.emp_dept').attr('data-custom_select2_name', select2CustomData[0].text);
          $('.emp_dept').html(select2CustomData[0].text);
        }*/
        // nexlog(customSuccessFunction);
        if(customSuccessFunction != '' && customSuccessFunction != undefined)
        {
          window[customSuccessFunction](response,newValue);
        }
      },
      tpl: '<select class="'+select2Class+'"></select>',
      select2: {
        width: '150px',
        tags: true,
        formatSelection: function(item) {
          for(var i = 0; i < test.results.length; i++) {
            if(isNaN(item)) {
              return false;
            }
            if(test.results[i].id == item)
              return test.results[i].text;
          }
        },
        insertTag: function(data, tag) {
          return false;
        },
        ajax: {
          url: function() {
            var gnp_group = '';
            gnp_group = $(this).parents('td').find(editableElement).data('gnp-grp');
            var custom_url = dropdownUrl + gnp_group;
            return baseUrl + custom_url;
          },
          dataType: "json",
          type: 'GET',
          processResults: function(item) {
            test = item;
            return item;
          },
        },
      },
    }).click(function() {
      selectCustomDatainSelect2(this, '.'+select2Class);
    });
  }

  function selectCustomDatainSelect2(selectorElement, select2Selector)
  {
    var customDataId = customDataValue = '';
    customDataId = $(selectorElement).attr('data-custom_select2_id');
    customDataValue = $(selectorElement).attr('data-custom_select2_name');
    selectedVal = '<option value="' + customDataId + '" selected>' + customDataValue + '</option>';

    setTimeout(function(){
      $(select2Selector).html(selectedVal).trigger('change')
    },100);
  } 

  function customTextEditable(editableElement, primary_key, updateUrl,customSuccessFunction)
  {

    $(editableElement).editable({
      type: 'POST',
      pk: '12',
      sourceCache: false,
      params: function(params) {
        var peopleData = new Array();
        params['field'] = ($(this).attr('data-custom-gnp-grp')) ? $(this).attr('data-custom-gnp-grp'): $(this).attr('data-gnp-grp');
        params[primary_key] = $('#'+primary_key).val();
        params['field_value'] = params.value;
        return params;
      },
      url: updateUrl,
      validate: function(value) {
        if($.trim(value) == '' ) {
          return 'Please Select an option';
        }
      },
      success: function(response, newValue) {
        nexlog(customSuccessFunction);
          if(customSuccessFunction != '' && customSuccessFunction != undefined)
          {
            window[customSuccessFunction](response,newValue);
          }
      },
    }).click(function() {
    });
  
  }