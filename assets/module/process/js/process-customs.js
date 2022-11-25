 // ******** Preview Image Starts here *********//
            $('.profile-image').change(function(e){
               preview_image(e);
            });
            function preview_image(event) 
            {
                var total_file= $('.profile-image')[0].files.length;
                 $('#image_preview').html('');
                for(var i=0;i<total_file;i++)
                {
                    $('#image_preview').append("<span class=\"pip\">" + "<img class=\"imageThumb\" src=\"" +  URL.createObjectURL(event.target.files[i]) + "\" width=\"50%\" height=\"50%\" />" +"</span>");
                }
            }
    // ******** Preview Image Ends here*********//