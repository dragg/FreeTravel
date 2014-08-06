$(document).ready(function(){
    $('a#signin').click(function(){
        $('div#signin').removeAttr('hidden');

        return false;
    });
    
    $('a#signup').click(function(){
        $('div#signup').removeAttr('hidden');

        return false;
    });
    
   
    $('#ok_thank').click(function(){
        close_popup_window();

        return false;
    });
    //function enter()

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
           email: $('#signin-user-email').val(),
           password: $('#signin-user-password').val()
       },
       function(res){
           if(res.length != 0)
           {
               close_popup_window();
               location.reload();
           }
           else
           {
               $('#signin-user-password').val('Неверный пароль').addClass('__incorrect-password');
           }
       }, 'json');

       return false; 
    });
    
    $('#link_signup').click(function(){
        $.post('/signup', {
            first_name: $('#user-first_name').val(),
            last_name: $('#user-last_name').val(),
            email: $('#signup-user-email').val(),
            password: $('#signup-user-password').val(),
            repeat_password: $('#user-repeat-password').val()
        },
        function(res){
            if(res != 0)
            {
                close_popup_window();
                $('#thank').removeAttr('hidden');
            }
            else
            {
                $('#signup-user-email').val('Такой пользователь существует').addClass('__incorrect-password');
            }
        }, 'json');
       
        return false; 
    });
});