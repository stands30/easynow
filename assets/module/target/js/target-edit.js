$(document).ready(function(){

  for(i = 0 ; i < target_type_count ; i++)
  {

    var sbtElement = $('.target-type')[i];
    sbt_type = $(sbtElement).data('sbt_type');
    intializeSelect2(sbt_type,sbtElement);
  }

  $('.datepicker').datepicker({
      dateFormat : 'dd-mm-yy',
      changeMonth : true,
      changeYear : true
  });

  $(".target-durability").select2({
  width:'resolve',
  placeholder:"Select  type",
    ajax: {
      url: baseUrl+'target/getDurabilityDropdown',
      dataType: 'json',
    }
  });

  $.validator.setDefaults({
       ignore: []
   });
	$("#target-edit").validate({
		errorClass:   "errormesssage",

		submitHandler: function(form) {
			try
			{

        var target_type       =  $('.repeater').repeaterVal();

				var target_type1      = JSON.stringify(target_type['target_type1']);

        var target_type2      = JSON.stringify(target_type['target_type2']);

        var target_type3      = JSON.stringify(target_type['target_type3']);

        var target_type4      = JSON.stringify(target_type['target_type4']);





        var tgt_title         = document.getElementById("tgt_title").value;

        var tgt_durability    = document.getElementById("tgt_durability").value;

        var tgt_qty           = document.getElementById("tgt_qty").value;

        var tgt_volume        = document.getElementById("tgt_volume").value;

        var tgt_id            = document.getElementById("tgt_id").value;


				var formData = new FormData();


        formData.append("target_type1",target_type1);
        formData.append("target_type2",target_type2);
        formData.append("target_type3",target_type3);
        formData.append("target_type4",target_type4);
        formData.append("tgt_id",tgt_id);
        formData.append("tgt_title",tgt_title);
        formData.append("tgt_durability",tgt_durability);
        formData.append("tgt_qty",tgt_qty);
        formData.append("tgt_volume",tgt_volume);

        // $('.btn_save').button('loading');
				$.ajax({
			        type: "POST",
              url: baseUrl+'target/updateTarget',
              data : formData,
              dataType:"json",
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,
              success:function(response) {
              	if(response.success == true)
              	{
                    swal({
                       title:"Done",
                       text:response.message,
                       type: "success",
                       icon:"success",
                       button: true,
                    }).then(()=>{
                        window.location.href=response.linkn;
                    }
                 );
              	}
              	else
              	{
                  $('.btn_save').button('reset');
                    swal({
                      title:"Opps",
                     text:"Something Went wrong",
                     icon:"error",
                     button: true,
                  });

              	}
              }
				});

			}catch(e){
				console.log(e);
			}
    }
	    //     },
			//  errorPlacement: function(error, element){
			// 	error.appendTo( element.next('.help-block') );
			// }
      });

});

var reps = [];
for(i=1;i<=target_type_count;i++){
   this['repeater'+i] = $('.repeater'+i).repeater({
     defaultValues: {
       'textarea-input': 'foo',
       'text-input': 'bar',
       'select-input': 'B',
       'checkbox-input': ['A', 'B'],
       'radio-input': 'B'
     },
     show: function () {
       $(this).slideDown();
       var sbt_type_data = $(this).find('.target-type');
       var sbt_type = $(this).find('.target-type').data('sbt_type');
       var sbt_durability = $(this).find('.target-durability');
       intializeSelect2(sbt_type,sbt_type_data);

       $('.datepicker').datepicker({
           dateFormat : 'dd-mm-yy',
           changeMonth : true,
           changeYear : true
       });

       $(sbt_durability).select2({
       width:'resolve',
       placeholder:"Select  type",
         ajax: {
           url: baseUrl+'target/getDurabilityDropdown/'+sbt_type_value,
           dataType: 'json',
         }
       });

    },
    hide: function (deleteElement) {
        if(confirm('Are you sure you want to delete this element?')) {
            $(this).slideUp(deleteElement);
        }
    },
    ready: function (setIndexes) {

    }
  });
  // this['repeater'+i].setList(target_type1);
}

this['repeater1'].setList(target_type1);
this['repeater2'].setList(target_type2);
this['repeater3'].setList(target_type3);
this['repeater4'].setList(target_type4);
// console.log(target_type4);
for(i = 0 ;i < target_type1.length;i++)
 {
   var select2Val = '<option value="'+target_type1[i]['sbt_type_id']+'">'+target_type1[i]['sbt_type_name']+'</option>';
   $('select[name="target_type1['+i+'][sbt_type_id]"]').html(select2Val).trigger('change');
   if(target_type1[i]['sbt_durability'] == null)
   {
     target_type1[i]['sbt_durability'] = 0;
     target_type1[i]['sbt_durability_name'] = 'Please Select';
   }
   var select2 = '<option value="'+target_type1[i]['sbt_durability']+'">'+target_type1[i]['sbt_durability_name']+'</option>';
   $('select[name="target_type1['+i+'][sbt_durability]"]').html(select2).trigger('change');
 }
 for(i = 0 ;i < target_type2.length;i++)
 {
   var select2Val = '<option value="'+target_type2[i]['sbt_type_id']+'">'+target_type2[i]['sbt_type_name']+'</option>';
   $('select[name="target_type2['+i+'][sbt_type_id]"]').html(select2Val).trigger('change');
   if(target_type2[i]['sbt_durability'] == null)
   {
     target_type2[i]['sbt_durability'] = 0;
     target_type2[i]['sbt_durability_name'] = 'Please Select';
   }
   var select2 = '<option value="'+target_type2[i]['sbt_durability']+'">'+target_type2[i]['sbt_durability_name']+'</option>';
   $('select[name="target_type2['+i+'][sbt_durability]"]').html(select2).trigger('change');
 }
 for(i = 0 ;i < target_type3.length;i++)
 {
   var select2Val = '<option value="'+target_type3[i]['sbt_type_id']+'">'+target_type3[i]['sbt_type_name']+'</option>';
   $('select[name="target_type3['+i+'][sbt_type_id]"]').html(select2Val).trigger('change');
   if(target_type3[i]['sbt_durability'] == null)
   {
     target_type3[i]['sbt_durability'] = 0;
     target_type3[i]['sbt_durability_name'] = 'Please Select';
   }
   var select2 = '<option value="'+target_type3[i]['sbt_durability']+'">'+target_type3[i]['sbt_durability_name']+'</option>';
   $('select[name="target_type3['+i+'][sbt_durability]"]').html(select2).trigger('change');
 }
 for(i = 0 ;i < target_type4.length;i++)
 {
   var select2Val = '<option value="'+target_type4[i]['sbt_type_id']+'">'+target_type4[i]['sbt_type_name']+'</option>';
   $('select[name="target_type4['+i+'][sbt_type_id]"]').html(select2Val).trigger('change');
   if(target_type4[i]['sbt_durability'] == null)
   {
     target_type4[i]['sbt_durability'] = 0;
     target_type4[i]['sbt_durability_name'] = 'Please Select';
   }
   var select2 = '<option value="'+target_type4[i]['sbt_durability']+'">'+target_type4[i]['sbt_durability_name']+'</option>';
   $('select[name="target_type4['+i+'][sbt_durability]"]').html(select2).trigger('change');
 }

function intializeSelect2(sbt_type,sbt_type_data)
{
  if(typeof(sbt_type) !== 'undefined')
  {
    switch (sbt_type) {
      case target_type1_val :
        sbt_placeholder = "Select  People";
        sbt_type_value  = target_type1_val;
        break;
      case target_type2_val :
        sbt_placeholder = "Select  Stage";
        sbt_type_value  = target_type2_val;
        break;
      case target_type3_val :
        sbt_placeholder = "Select  Product";
        sbt_type_value  = target_type3_val;
        break;
      case target_type4_val :
        sbt_placeholder = "Select  Source";
        sbt_type_value  = target_type4_val;
        break;
    }
  }
  else
  {
    sbt_placeholder = '';
    sbt_type_value = 0;
  }



  $(sbt_type_data).select2({
  width:'resolve',
  placeholder:sbt_placeholder,
    ajax: {
      url: baseUrl+'target/getTargetDropdowns/'+sbt_type_value,
      dataType: 'json',
    }
  });
  return true;
}
