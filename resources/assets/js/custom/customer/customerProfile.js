$(document).ready(function () {
    "use strict";
    $('.select2').select2();


    $('#tabs li').click(function (e) { 
        e.preventDefault();
        $('#tabs li').removeClass('active');
        $(this).addClass('active');
        var tab = $(this).data('id');

        if (tab == 'profile_tab') {
            $('#tab li').css('display', 'none');
            $('#profile_left_content').css('display', '');
        }else if(tab == 'address_tab'){
            $('#tab li').css('display', 'none');
            $('#address_left_content').css('display', '');
        }
    });



    $('#profile_picture').change(function (e) { 
        e.preventDefault();
        $('#btn_profile_picture').removeClass('hide');
        
    });
})