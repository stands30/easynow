// $(document).ready(function(){
// 	$('.nav-stacked li a').on('focus',function(){
//         var idx = $('.nav-stacked li a').index(this);
//         $('.nav-stacked i.fas').eq(idx).css('display','block');
//     })
// })
//         

    // Datepicker

    setPeopleNavActive()

    $(document).ready(function()
    {
        // Placeholder 
        $('input, textarea').each(function()
        {
            $(this).data('placeHolder',$(this).attr('placeholder'));
            $(this).focusin(function() {
                $(this).attr('placeholder','');
            }).focusout(function() {
                $(this).attr('placeholder',$(this).data('placeHolder'));
            });
        })

        $('input[type=file]').on('change',function() {
            var fileName = $('input[type=file]').val();
            if(fileName) {
                $('.thumbnail').css('display','block');
            }
        })
    })

    function setPeopleNavActive()
    {
        $('.nav-item').removeClass('active');
        $('#nav_people').addClass('active');    

        var urlArr = $(location).attr("href").split('/');
        selectedLink = urlArr[urlArr.length-1];
        $('.people_link').removeClass('active');
        $('#'+selectedLink).addClass('active');
    }
