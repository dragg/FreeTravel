$(document).ready(function(){
    $('a#signin').click(function(){
        $('div#signin').removeAttr('hidden');

        return false;
    });

    function enter()

    function close_popup_window()
    {
        $('.popup-wrapper-bg').attr('hidden', 'hidden');
    }

    $('.popup-close').click(function(){
        close_popup_window();

        return false;
    });

    $('#link_signin').click(function(){
       $.post('/signin', {
           email: $('#user-email').val(),
           password: $('#user-password').val()
       },
       function(res){
           if(res.length != 0)
           {
               close_popup_window();
           }
       }, 'json');

       return false; 
    });
});