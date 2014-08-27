$(document).ready(function(){
    
    function refresh_page() {
        location.reload();
    }
    
    $('a#signin').click(function(){
        $('div#signin').show();

        return false;
    });
    
    $('a#signup').click(function(){
        $('div#signup').show();

        return false;
    });
    
    $('#reservation').click(function(){
       $('#reservationPopup').show();
    });
    
    $('#ok_thank').click(function(){
        close_popup_window();

        return false;
    });
   

    function close_popup_window(){
        $('.popup-wrapper-bg').hide();
    }

    $('.popup-close').click(function(){
        close_popup_window();

        return false;
    });

    $('#link_signin').click(function(){
       $.post('/user/signin', {
           email: $('#signin-user-email').val(),
           password: $('#signin-user-password').val()
       },
       function(res){
           console.log(res);
           if(res[0] === 'Success')
           {
                close_popup_window();
                if(res[2] != null)
                    window.location.replace(res[2]);
                else
                    refresh_page();
           } else {
               alert(res[1]);
           }
       }, 'json');

       return false; 
    });
    
    $('#link_signup').click(function(){
        $.post('/user/signup', {
            first_name: $('#user-first_name').val(),
            last_name: $('#user-last_name').val(),
            email: $('#signup-user-email').val(),
            password: $('#signup-user-password').val(),
            password_confirmation: $('#user-repeat-password').val()
        },
        function(res){
            console.log(res);
            if(res[0] === 'Success')
            {
                close_popup_window();
                $('#thank').show();
            } else {
                alert(res[1]);
            }
        }, 'json');
       
        return false; 
    });
    
    
    var mainH = ($('#my_habitation').attr('data-active') === 'true' ? true : false);
    $('.request-housing').click(function(){
        if(!$(this).hasClass('__active')) {
            $('.request-housing').removeClass('__active');
            $(this).addClass('__active');

            if (mainH) {
                $('#my_habitation').hide();
                $('#request').show();
            }
            else {                
                $('#request').hide();    
                $('#my_habitation').show();
            }
            mainH = !mainH;
        }
    });
    
    
    var main = true;
    $('.request-profile').click(function(){
        if(!$(this).hasClass('__active')) {
            $('.request-profile').removeClass('__active');
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
        }
    });
    
    $('#save').click(function(){
        $.post('/profile/save',
        {
            actionMain: main,
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            telephone: $('#telephone').val(),
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
       return false;
    });
    
    var deleteId = null;
    
    $('.delete').click(function(){
        $('#deleteHabitation').show();
        deleteId = $(this).attr('id');
        return false;
    });
    
    var deleteHab = false;
    
    $('.deleteHab').click(function(){
        $('#deleteHabitation').show();
        deleteId = $(this).attr('id');
        deleteHab = true;
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
                if(deleteHab == true)
                    window.location.replace("/profile/my-habitation");
                else {
                    hidePopupDeleteHabitation();
                    $('a#' + deleteId).parent().parent().remove();
                    if($('.habitation').length == 0) {
                        $('#my_habitation').hide();
                        $('.request-head').hide();
                        $('.profile-default').show();
                    }
                }
                
            }
            else
            {
                alert('Не удалено!');
            }
        }, 'json');
        return false;
    });
    
    
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
           //$("#bar").width(percentComplete+'%');
            $("#percent").html(percentComplete+'%');

        },
        success: function(response) 
        {
            //$("#bar").width('100%');
            $("#percent").html('100%');
            $('#avatar').attr('src', '/avatars/'+response[1]+'?'+Math.random());
            $('#headerAvatar').attr('src', $('#avatar').attr('src')+'?'+Math.random());
        },
        complete: function(response) 
        {
            $('#deleteAvatar').parent().show();
            $("#percent").html('Фотография успешно загружена.').hide(10000);
            $('.search-load-controls-wr').show();
            //$("#message").html("<font color='green'>"+response.responseText+"</font>");
        },
        error: function()
        {
            $("#percent").html('Не удалось загрузить фотографию.');
            //$("#message").html("<font color='red'> ERROR: unable to upload files</font>");
            
        }

    }; 
 
    $("#uploadAvatar").ajaxForm(options);
    
    $('#upload').click(function(){
        $('#fileupload').click();
       
    });
    
    $('#fileupload').on('change', function() {
        if($('#fileupload').val() != "") {
            $('#percent').show();
            $('form#uploadAvatar').submit();
        }
    });
    
    $('#percent').click(function(){
       $(this).hide();
    });
    
    $('#deleteAvatar').click(function(){
        $('#deleteAvatar').parent().hide();
        $.post('/profile/delete-avatar', {},
        function(res){
            console.log(res);
            if(res[0] === 1) {
                $('#avatar').attr('src', '/avatars/'+res[1]+'?'+Math.random());
                $('#headerAvatar').attr('src', $('#avatar').attr('src')+'?'+Math.random());
                $("#percent").html('Фотография успешно удалена.').hide(5000);
            } else {
                $('#deleteAvatar').parent().show();
                $("#percent").html('Не удалось удалить фотографию.').hide(5000);
            }
        },'json');
    });


    $('form#reservation').submit(function(e){
        e.preventDefault();
        //if($('#signin') === 0) {
            var method = $(this).attr('method');
            var action = $(this).attr('action');
            var data = $(this).serialize();
            var thisForm = $(this);

            $.ajax({
                type: method,
                url: action,
                data: data,
                success: function(data, textStatus, jqXHR){
                    console.log(data);
                    if(data[0] === 'Success') {
                        $('a#myRequests')[0].click();
                    } else if(data[0] === 'Fail') {
                        alert(data[1]);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) 
                {
                    alert('Ошибка запроса!');
                }
            });
//        } else {
//           $('#signin').click();
//        }
    });

    $('form#accept').submit(function(e){
        e.preventDefault();

        var method = $(this).attr('method');
        var action = $(this).attr('action');
        var data = $(this).serialize();
        var thisForm = $(this);

        $.ajax({
            type: method,
            url: action,
            data: data,
            success: function(data, textStatus, jqXHR){
                if(data[0] === 'Success') {
                    thisForm.parent().hide();
                    $('#request' + thisForm.attr('class')).show();
                    $('#request' + thisForm.attr('class') + ' > p > span[class="text"]').text("Заявка одобрена");
                    thisForm.parent().parent().siblings('.page-controls-wr').show();
                    
                    var countRequests = parseInt($('#headCountRequests').text());
                    countRequests--;
                    
                    $('#headCountRequests').text(countRequests);
                    $('#tabCountRequests').text('+' + countRequests);
                    $('#noteCountRequests').text(countRequests);
                    
                    if(countRequests === 0) {
                        $('#headCountRequests').parent().parent().hide();
                        $('#tabCountRequests').hide();
                        $('#noteCountRequests').parent().hide();
                    } else {
                        
                    }
                    
                } else if(data[0] === 'Fail') {
                    alert(data[1]);
                }
                
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                alert('Ошибка соединения!');
            }
        });
    });
    
    $('form#refuse').submit(function(e){
        e.preventDefault();
        
        var method = $(this).attr('method');
        var action = $(this).attr('action');
        var data = $(this).serialize();
        var thisForm = $(this);

        $.ajax({
            type: method,
            url: action,
            data: data,
            success: function(data, textStatus, jqXHR){
                if(data[0] === 'Success') {
                    thisForm.parent().hide();
                    $('#request' + thisForm.attr('class')).show();
                    $('#request' + thisForm.attr('class') + ' > p > span[class="text"]').text("Заявка отклонена");
                    thisForm.parent().parent().siblings('.page-controls-wr').show();
                    
                    var countRequests = parseInt($('#headCountRequests').text());
                    countRequests--;
                    
                    $('#headCountRequests').text(countRequests);
                    $('#tabCountRequests').text('+' + countRequests);
                    $('#noteCountRequests').text(countRequests);
                    
                    if(countRequests === 0) {
                        $('#headCountRequests').parent().parent().hide();
                        $('#tabCountRequests').hide();
                        $('#noteCountRequests').parent().hide();
                    } else {
                        
                    }
                    
                } else if(data[0] === 'Fail') {
                    alert(data[1]);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                alert('Ошибка соединения!');
            }
        });
    });
    
    $('.edit_request').click(function(){
        
        var thisEdit = $(this);
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('href'),
            data: {id : $(this).attr('data-id')},
            success: function(data, textStatus, jqXHR){
                if(data[0] === 'Success') {
                    thisEdit.parent().hide();
                    $('#request' + thisEdit.attr('data-id')).hide();
                    $('#buttonRequest' + thisEdit.attr('data-id')).show();
                } else if(data[0] === 'Fail') {
                    alert(data[1]);
                }
                
                var countRequests = parseInt($('#headCountRequests').text());
                if(countRequests === 0) {
                    countRequests++;
                    $('#headCountRequests').text(countRequests);
                    $('#tabCountRequests').text('+' + countRequests);
                    $('#noteCountRequests').text(countRequests);
                    
                    $('#headCountRequests').parent().parent().show();
                    $('#tabCountRequests').show();
                    $('#noteCountRequests').parent().show();
                } else {
                    countRequests++;
                    $('#headCountRequests').text(countRequests);
                    $('#tabCountRequests').text('+' + countRequests);
                    $('#noteCountRequests').text(countRequests);
                }
                
                
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                alert('Ошибка соединения!');
            }
        });
        
        return false;
    });
    
    $('.deleteRequest').click(function(){
        var thisDelete = $(this);
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('href'),
            data: {id : $(this).attr('data-id')},
            success: function(data, textStatus, jqXHR){
                if(data[0] === 'Success') {
                    thisDelete.parent().parent().hide();
                } else if(data[0] === 'Fail') {
                    alert(data[1]);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                alert('Ошибка соединения!');
            }
        });
        
        return false;
    });
    
    
     var optionsHabPic = { 
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
           //$("#bar").width(percentComplete+'%');
            $("#percent").html(percentComplete+'%');

        },
        success: function(response) 
        {
            $('#habPic').attr('src', '/habitationsPic/'+response[1]+'?'+Math.random());
        },
        complete: function(response) 
        {
            $('#deleteAvatar').parent().show();
            $('.search-load-controls-wr').show();
        },
        error: function()
        {   
        }

    }; 
 
    $("#uploadHabPic").ajaxForm(optionsHabPic);
    
    $('#uploadButtonHabPic').click(function(){
        $('#fileupload').click();
       
    });
    
    $('#fileupload').on('change', function() {
        if($('#fileupload').val() != "") {
            $('#percent').show();
            $('form#uploadHabPic').submit();
        }
    });
    
    
    $('#deleteHabitationPic').click(function(){
        $('#deleteAvatar').parent().hide();
        $.post('/habitation/delete-habitation-pic', {
            id: $('#uploadHabPic > input[name=\'id\'').val()
        },
        function(res){
            console.log(res);
            if(res[0] === 'Success') {
                $('#deleteHabitationPic').parent().hide();
                $('#habPic').attr('src', '/habitationsPic/'+res[2]+'?'+Math.random());
            } else {
                alert(res[1]);
            }
        },'json');
    });
    
    $( "div.overout" )
    .mouseover(function() {
      $( "p:first", this ).text( "mouse over" );
      $( "p:last", this ).text( ++i );
    })
    .mouseout(function() {
      $( "p:first", this ).text( "mouse out" );
    });
    
    $('.choosen-object-block')
        .mouseover(function(){
            $(this).find('.choosen-object-block-info').show();
        })
        .mouseout(function() {
            $(this).find('.choosen-object-block-info').hide();
        });
    
});