 var submitted = false;
    var peopleValidator = $('#companyProfileUpdate');
    peopleValidator.validate({
      errorClass:"custom-error",
    
          invalidHandler: function(form, validator) {
            submitted = true;
        },
          showErrors: function(errorMap, errorList) {
            if (submitted) {
                var summary = '<div class="alert alert-danger display-hide" style="display: block;"><button class="close" data-close="alert"></button>';
                $.each(errorList, function() { summary += this.message + "<br/>"; });
                summary+='</div>';
                $("#form_errors").html(summary);
                submitted = false;
            }
          },
      submitHandler:function(form)
      {
        $("#form_errors").html('');
      
        try
        {
          $('.btn_save').css('display','none');
          $('.btn_processing').css('display','inline-block');
               var formData = new FormData();

            formData.append('cpf_subject',$('#cpf_subject').val());
            formData.append('cpf_desc',$('#summernote_1').val());
            formData.append('cpf_id',$('#cpf_id').val());
            formData.append('cpf_ppl_id',$('#cpf_ppl_id').val());
         //********* IMAGE UPLOAD ***********//
                  var file = document.getElementById('cpl_doc');
                  var filejquery = $('#cpl_doc');
                  var count = file.files.length;
                  formData.append('file_count',count);
                    for (var i = 0; i < count; i++) 
                    {
                      var allowedFiles = ["jpeg", "jpg", "png","JPG","PNG","doc", "docx", "pdf", "txt"];

                            // var file_name = files1;
                       if(count != '0') 
                       {
                            var fileName = file.files[0].name;
                            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                            var size = parseFloat(file.files[0].size / 1024).toFixed(2);
                            if ($.inArray(fileNameExt, allowedFiles) == -1 || size>5000)
                             {
                                var data = fileName+" is Invalid ";
                                flag=false;

                                filejquery.css('border-color','red ');
                                filejquery.next().css('color','red ');
                                filejquery.next().html(data);
                                // console.log( filejquery.next().html(data));
                                // console.log('file error occured');
                                return false;
                             }
                             else
                             {
                                flag=true;
                                filejquery.css('border-color','#ccc');
                                filejquery.next().css('color','none ');
                                filejquery.next().html('');
                                formData.append("cpl_doc[]", document.getElementById('cpl_doc').files[i]);
                                // console.log('file error occured 3');
                             }
                      
                                // console.log('file error occured 2');
                        }
                        else
                        {
                            flag=true;
                            filejquery.css('border-color','#ccc');
                            filejquery.next().css('color','none ');
                            filejquery.next().html('');
                        }
                    }
                //********* IMAGE UPLOAD ***********//
         
                       $.ajax({
                        type:"POST",
                        dataType:"JSON",
                        data:formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        url:baseUrl+"people/companyProfileUpdateData",
                        success:function(response)
                        {
                          responsemsg(response, function(){
                            $('.btn_save').css('display','inline-block');
                            $('.btn_processing').css('display','none');
                            setTimeout(function(){
                              window.location.href = response.linkn;
                            })
                          })
                           /*if(response.success == true)
                            {
                               swal(
                                {
                                    title: "Done",
                                    text: response.message,
                                    type: "success",
                                    icon: "success",
                                    button: true,
                                });
                                setTimeout(function(){
                                  window.location.href = response.linkn;
                                }, 1000);
                            }
                            else
                            {
                              $('.btn_save').css('display','inline-block');
                              $('.btn_processing').css('display','none');
                              
                                swal(
                                {
                                    title: "Opps",
                                    text: response.message,
                                    type: "error",
                                    icon: "error",
                                    button: true,
                                });
                            }*/
                        }
                       });
        }
        catch(e)
        {
          console.log(e);
        }
       
      }
    });