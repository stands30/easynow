
	var specialKeys = new Array();
	specialKeys.push(8); //Backspace
	specialKeys.push(9); //Tab

	$('.numeric').keypress(function(e){
		var keyCode = e.which ? e.which : e.keyCode
		var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
		return ret;
	});
	$(document).on('click','.btn_can', function()
	{
		goBack();
	})
	
	// --------- config end ----------------------------------------------------------//




	// --------- common function

	// function restcall(callType, callUrl, postData, onSuccess, onError, aSync = true, optn = false)
	// {
	// 	$.ajax({
	// 		type  : callType,
	// 		url   : callUrl,
	// 		data  : postData,
	// 		async : aSync,
	// 		success : function(data) {
	// 			onSuccess(data, optn);
	// 		},
	// 		error   : function(data) {
	// 			if(onError)
	// 				onError(data, optn);
	// 			else
	// 				onGenericError(data);
	// 		}
	// 	})
	// }

	function onGenericError(data)
	{
		console.log(data);
	}

	function associateDOMEvents(event, componentArr)
	{
		for(var i=0; i < componentArr.length; i++)
		{
			$(document).on( event, componentArr[i][0], componentArr[i][1]);
		}
	}
	
	function goBack()
	{
	    /*window.history.back();

		if(confirm("Do you really want to go back??"))
		{
			history.go(-1);
		}        
		return false;*/

		swal({
		  title: "Are you sure?",
		  text: "Do you really want to go back??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    history.go(-1);
		  }
		});
	}

	function sweetAlert(msg, callback, options )
	{
		msg = JSON.parse(msg);
		swal(msg.title, msg.message, msg.status),function() {
				callback();
			};
	}

	// --------- common function end



