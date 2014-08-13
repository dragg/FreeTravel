$(document).ready(function(){
    
    function refresh_page() {
        location.reload();
    }
    
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
   

    function close_popup_window(){
        $('.popup-wrapper-bg').attr('hidden', 'hidden');
    }

    $('.popup-close').click(function(){
        close_popup_window();

        return false;
    });

    $('#link_signin').click(function(){
       $.post('/log/signin', {
           email: $('#signin-user-email').val(),
           password: $('#signin-user-password').val()
       },
       function(res){
           if(res[0] === true)
           {
               close_popup_window();
               refresh_page();
           }
           else
           {
               $('#signin-user-password').val('Неверный пароль').addClass('__incorrect-password');
           }
       }, 'json');

       return false; 
    });
    
    $('#link_signup').click(function(){
        $.post('/log/signup', {
            first_name: $('#user-first_name').val(),
            last_name: $('#user-last_name').val(),
            email: $('#signup-user-email').val(),
            password: $('#signup-user-password').val(),
            repeat_password: $('#user-repeat-password').val()
        },
        function(res){
            if(res[0] === true)
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
    
    
    var main = true;
    $('.request-housing').click(function(){
        $('.request-housing').removeClass('__active');
        $(this).addClass('__active');
        
        if (main) {
            $('#mainProfile').hide();
            $('#passwordProfile').show();
        }
        else {
            $('#passwordProfile').hide();    
            $('#mainProfile').show();
        }
        main = !main;
        
    });
    
    $('#save').click(function(){
        $.post('/profile/save',
        {
            actionMain: main,
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email: $('#email').val(),
            oldPassword: $('#oldPassword').val(),
            newPassword: $('#newPassword').val(),
            repeatPassword: $('#repeatPassword').val()
        },
        function(res){
            console.log(res);
            if (res[0] === true) {
                alert('Всё гуд!');
                refresh_page();
            }
            else if(res[0] === false)
            {
                alert(res[2]);
            }
        }, 'json');
        
        return false;
    });
            
    $('#cancel').click(function(){
        refresh_page();
    });
    
    $('#saveHabitation').click(function(){
       $('form').submit();
       return ;
    });
    
    var deleteId = null;
    
    $('.__close').click(function(){
        $('#deleteHabitation').show();
        deleteId = $(this).attr('id');
        return false;
    });
    
    function hidePopupDeleteHabitation() {
        $('#deleteHabitation').hide();
    }
    
    $('#cancelDeleteHabitation').click(function(){
        hidePopupDeleteHabitation();
    });
    
    $('#applyDeleteHabitation').click(function(){
       $.post('/habitation/delete-habitation', {
            id: deleteId
        },
        function(res){
            console.log(res);
            if(res == true)
            {
                hidePopupDeleteHabitation();
                $('a#' + deleteId).parent().parent().remove();
            }
            else
            {
                alert('Не удалено!');
            }
        }, 'json');
        
    });
    //Test
    
     var options = { 
        beforeSend: function() 
        {
            $("#progress").show();
            //clear everything
            $("#bar").width('0%');
            $("#message").html("");
            $("#percent").html("0%");
        },
        uploadProgress: function(event, position, total, percentComplete) 
        {
            $("#bar").width(percentComplete+'%');
            $("#percent").html(percentComplete+'%');

        },
        success: function() 
        {
            $("#bar").width('100%');
            $("#percent").html('100%');
            
        },
        complete: function(response) 
        {
            
            $("#message").html("<font color='green'>"+response.responseText+"</font>");
            console.log(response);
        },
        error: function()
        {
            $("#message").html("<font color='red'> ERROR: unable to upload files</font>");
            
        }

        }; 
 
    $("#myForm").ajaxForm(options);
    
    $('#upload').click(function(){
       $('input:file').click();
    });
});