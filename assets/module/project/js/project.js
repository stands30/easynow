$(document).ready(function(){
   
   var select2Url = baseUrl + 'project/getdropdown/';
 
    $('#prj_cmp_id').select2({
      placeholder:'Please Select Company',
    ajax: {
       url: baseUrl + 'project/getCompanyDropdown/',
      dataType: 'json',
    }
  });
    $('#prj_project_status').select2({
    ajax: {
      url: select2Url + 'prj_project_status',
      dataType: 'json',
    }
  });
  $('#prj_manage_by').select2({
    ajax: {
      url: baseUrl + 'project/getPeopleDropdown?managed_by=1',
      dataType: 'json',

    }
  });
    
	$.validator.setDefaults({
       ignore: []
   });
	$("#project_save").validate({
		errorClass: "errormesssage",
		errorPlacement: function(error, element)
        {
          var group_div = $(element).closest('div.form-group')[0];
          var placement = $(group_div).find('.errormesssage');
          $(placement).append(error)
        },
		submitHandler: function(form) {
			try
			{
        $('.btn_save').button('loading');
				$.ajax({
					type: "POST",
	        url: baseUrl + "project/project_save",
	        data : {
            prj_id:$('#prj_id').val(),
	       	  title:$('#prj_title').val(),
            cmp_id:$('#prj_cmp_id').val(),
            work_ord:$('#prj_work_ord').val(),
            project_status:$('#prj_project_status').val(),
            manage_by:$('#prj_manage_by').val(),
            site_loc:$('#prj_site_loc').val(),
            site_add:$('#prj_site_add').val(),
            desc:$('#prj_desc').val()
	        },
	        dataType:"json",  
	        cache: false,           
	        success:function(response) {
	       	  responsemsg(response,function(){
              window.location.href = response.linkn;
            });
	        }
				});
			}catch(e){
				console.log(e);
			}
	  }
  });

  });
       