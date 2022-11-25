
  function getModules()
  {
    $.ajax({
      type: "POST",
      url: baseUrl + 'get-form-modules',
      async: false,
      success: function(response) {
        var menu    = JSON.parse(response).menu;
        var submenu = JSON.parse(response).submenu;

        for(var i = 0; i < menu.length; i++)
          createPanel(menu[i].mnu_id, menu[i].mnu_name);

        for(var j = 0; j < submenu.length; j++)
        {
          var row = createRow(submenu[j].mnu_id, submenu[j].mnu_name, submenu[j].sbm_id, submenu[j].sbm_name);
          $('#collapse_child_'+submenu[j].mnu_id).append(row);
        }
      }
    });
  }

  function getHeader()
  {
    return  '<div class="row desktop-view text-center">'+
              '<div class="col-md-2"><div class="form-group"><label><b>Name</b></label></div></div>'+
              '<div class="col-md-1 nsp"><div class="form-group"><label><b>Access</b></label></div></div>'+
              '<div class="col-md-3 nsp">'+
                '<div class="col-md-3 nsp"><div class="form-group"><label><b>All</b></label></div></div>'+
                '<div class="col-md-3 nsp"><div class="form-group"><label><b>Add</b></label></div></div>'+
                '<div class="col-md-3 nsp"><div class="form-group"><label><b>Edit</b></label></div></div>'+
                '<div class="col-md-3 nsp"><div class="form-group"><label><b>Delete</b></label></div></div>'+
              '</div>'+
              '<div class="col-md-3 nsp">'+
                '<div class="col-md-3 nsp"><div class="form-group"><label><b>List</b></label></div></div>'+
                '<div class="col-md-3 nsp"><div class="form-group"><label><b>Details</b></label></div></div>'+
                '<div class="col-md-3 nsp"><div class="form-group"><label><b>Export</b></label></div></div>'+
                '<div class="col-md-3 nsp"><div class="form-group"><label><b>Print</b></label></div></div>'+
              '</div>'+
              '<div class="col-md-3 nsp">'+
                '<div class="col-md-3 nsp"><div class="form-group"><label><b>Private</b></label></div></div>'+
              '</div>'+
            '</div>';
  }

  function createPanel(menu_id, menu_name)
  {
    var panel = '<div class="panel panel-default">'+
                  '<div class="panel-heading">'+
                    '<h4 class="panel-title">'+
                      '<a data-toggle="collapse" data-parent="#accordion" href="#collapse_'+menu_id+'"><span class="glyphicon glyphicon-plus"></span><b>'+menu_name+'</b></a>'+
                    '</h4>'+
                  '</div>'+
                  '<div id="collapse_'+menu_id+'" class="panel-collapse collapse">'+
                    '<div id="collapse_child_'+menu_id+'" class="panel-body background-clr">'+getHeader()+'</div>'+
                  '</div>'+
                '</div>';

    $('#accordion').append(panel);
  }

  function createRow(menu_id, menu_name, submenu_id, submenu_name)
  {
    var name  = menu_name;

    if(submenu_id != '0')
      name  = submenu_name;

    return  '<div class="row text-center form-access-row">'+
              '<div class="form-group col-md-2 "><h4 class="box-name">'+name+'</h4></div>'+

              '<div class="col-md-1 col-xs-4 col-sm-4 col-sm-4 nsp"><div class="form-group"><label class="mobile-view"><b>Access</b></label><label class="switch">'+
                '<input id="mnu'+menu_id+'_sbm'+submenu_id+'_access" data-menu_id="'+menu_id+'" data-sub_menu_id="'+submenu_id+'" data-type="access" type="checkbox" class="access-color-chk access-chk" disabled="disabled">'+
                '<span class="slider access-color round"></span></label></div>'+
              '</div>'+

              '<div class="col-md-3 nsp">'+
                '<div class="col-md-3 col-xs-4 col-sm-4  col-sm-4 nsp"><div class="form-group"><label class="mobile-view"><b>All</b></label><label class="switch">'+
                  '<input id="mnu'+menu_id+'_sbm'+submenu_id+'_all" type="checkbox" disabled="disabled" class="all-access-chk access-chk">'+
                  '<span class="slider all-color round child_access"></span></label></div>'+
                '</div>'+
                '<div class="col-md-3 col-xs-4 col-sm-4 col-sm-4 nsp"><div class="form-group"><label class="mobile-view"><b>Add</b></label><label class="switch">'+
                  '<input id="mnu'+menu_id+'_sbm'+submenu_id+'_add" data-menu_id="'+menu_id+'" data-sub_menu_id="'+submenu_id+'" data-type="add" type="checkbox" disabled="disabled" class="child-access-chk access-chk">'+
                  '<span class="slider round child_access"></span></label></div>'+
                '</div>'+
                '<div class="col-md-3 col-xs-4 col-sm-4  col-sm-4 nsp"><div class="form-group"><label class="mobile-view"><b>Edit</b></label><label class="switch">'+
                  '<input id="mnu'+menu_id+'_sbm'+submenu_id+'_edit" data-menu_id="'+menu_id+'" data-sub_menu_id="'+submenu_id+'" data-type="edit" type="checkbox" disabled="disabled" class="child-access-chk access-chk">'+
                  '<span class="slider round child_access"></span></label></div>'+
                '</div>'+
                '<div class="col-md-3 col-xs-4 col-sm-4  col-sm-4 nsp"><div class="form-group"><label class="mobile-view"><b>Delete</b></label><label class="switch">'+
                  '<input id="mnu'+menu_id+'_sbm'+submenu_id+'_delete" data-menu_id="'+menu_id+'" data-sub_menu_id="'+submenu_id+'" data-type="delete" type="checkbox" disabled="disabled" class="child-access-chk access-chk">'+
                  '<span class="slider round child_access"></span></label></div>'+
                '</div>'+
              '</div>'+

              '<div class="col-md-3 nsp">'+
                '<div class="col-md-3 col-xs-4 col-sm-4 nsp"><div class="form-group"><label class="mobile-view"><b>List</b></label><label class="switch">'+
                  '<input id="mnu'+menu_id+'_sbm'+submenu_id+'_list"  data-menu_id="'+menu_id+'" data-sub_menu_id="'+submenu_id+'" data-type="list" type="checkbox" disabled="disabled" class="child-access-chk access-chk">'+
                  '<span class="slider round child_access"></span></label></div>'+
                '</div>'+
                '<div class="col-md-3 col-xs-4 col-sm-4 nsp"><div class="form-group"><label class="mobile-view"><b>Detail</b></label><label class="switch">'+
                  '<input id="mnu'+menu_id+'_sbm'+submenu_id+'_detail"  data-menu_id="'+menu_id+'" data-sub_menu_id="'+submenu_id+'" data-type="detail" type="checkbox" disabled="disabled" class="child-access-chk access-chk">'+
                  '<span class="slider round child_access"></span></label></div>'+
                '</div>'+
                '<div class="col-md-3 col-xs-4 col-sm-4 nsp"><div class="form-group"><label class="mobile-view"><b>Export</b></label><label class="switch">'+
                  '<input id="mnu'+menu_id+'_sbm'+submenu_id+'_export"  data-menu_id="'+menu_id+'" data-sub_menu_id="'+submenu_id+'" data-type="export" type="checkbox" disabled="disabled" class="child-access-chk access-chk">'+
                  '<span class="slider round child_access"></span></label></div>'+
                '</div>'+
                 '<div class="col-md-3 col-xs-4 col-sm-4 nsp"><div class="form-group"><label class="mobile-view"><b>Print</b></label><label class="switch">'+
                  '<input id="mnu'+menu_id+'_sbm'+submenu_id+'_print"  data-menu_id="'+menu_id+'" data-sub_menu_id="'+submenu_id+'" data-type="print" type="checkbox" disabled="disabled" class="child-access-chk access-chk">'+
                  '<span class="slider round child_access"></span></label></div>'+
                '</div>'+
              '</div>'+

              '<div class="col-md-3 nsp">'+
                 '<div class="col-md-3 col-xs-4 col-sm-4 nsp"><div class="form-group"><label class="mobile-view"><b>Access</b></label><label class="switch">'+
                  '<input id="mnu'+menu_id+'_sbm'+submenu_id+'_private"  data-menu_id="'+menu_id+'" data-sub_menu_id="'+submenu_id+'" data-type="private" type="checkbox" disabled="disabled" class="child-access-chk access-chk">'+
                  '<span class="slider round child_access"></span></label></div>'+
                '</div>'+
              '</div>'+
            '</div>';
  }

  function updateAccess(switch_obj)
  {
    var data_obj = {};
    data_obj.usr_id = $('#employee_select').val();
    data_obj.mnu_id = $(switch_obj).data('menu_id');
    data_obj.sbm_id = $(switch_obj).data('sub_menu_id');
    data_obj.type   = $(switch_obj).data('type');
    data_obj.val    = $(switch_obj).is(':checked') ? 1 : 0;

    $.ajax(
    {
        type: "POST",
        url: baseUrl + "Form_access/updateAccess",
        data: data_obj,
        dataType: "json",
        success: function(response)
        {
            console.log(response);
        }
    });
  }

  function getAccessDetail()
  {

    $('.access-chk').prop("checked", false);

    usr_id = $('#employee_select').val();

    if(!usr_id)
    {
      alert('Please Select an Employee');
      return;
    }

    $('#accordion').removeClass('hidden');

    $.ajax(
    {
      type: "POST",
      url: baseUrl + "Form_access/getAccessDetail/"+usr_id,
      dataType: "json",
      success: function(response)
      {
        $('.access-color-chk').removeProp('disabled');

        for(var i = 0; i < response.length; i++)
        {
          $("#mnu"+response[i].fma_mnu_id+"_sbm"+response[i].fma_sbm_id+"_access").prop('checked', (response[i].fma_access == 1 ? true : false)).trigger('change');
          $("#mnu"+response[i].fma_mnu_id+"_sbm"+response[i].fma_sbm_id+"_add").prop('checked', (response[i].fma_add == 1 ? true : false));
          $("#mnu"+response[i].fma_mnu_id+"_sbm"+response[i].fma_sbm_id+"_edit").prop('checked', (response[i].fma_edit == 1 ? true : false));
          $("#mnu"+response[i].fma_mnu_id+"_sbm"+response[i].fma_sbm_id+"_delete").prop('checked', (response[i].fma_delete == 1 ? true : false));
          $("#mnu"+response[i].fma_mnu_id+"_sbm"+response[i].fma_sbm_id+"_detail").prop('checked', (response[i].fma_detail == 1 ? true : false));
          $("#mnu"+response[i].fma_mnu_id+"_sbm"+response[i].fma_sbm_id+"_list").prop('checked', (response[i].fma_list == 1 ? true : false));
          $("#mnu"+response[i].fma_mnu_id+"_sbm"+response[i].fma_sbm_id+"_export").prop('checked', (response[i].fma_export == 1 ? true : false));
          $("#mnu"+response[i].fma_mnu_id+"_sbm"+response[i].fma_sbm_id+"_print").prop('checked', (response[i].fma_print == 1 ? true : false));
          $("#mnu"+response[i].fma_mnu_id+"_sbm"+response[i].fma_sbm_id+"_private").prop('checked', (response[i].fma_private == 1 ? true : false));

          var all = (response[i].fma_add && response[i].fma_edit && response[i].fma_delete && response[i].fma_detail 
            && response[i].fma_list && response[i].fma_export && response[i].fma_print && response[i].fma_private)

            $("#mnu"+response[i].fma_mnu_id+"_sbm"+response[i].fma_sbm_id+"_all").prop('checked', all);
        }
      }
    });
  }