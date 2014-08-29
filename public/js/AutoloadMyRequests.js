$(document).ready(function(){
    var offset = 5, del = 5, all = false;
    $(window).scroll(function(){
        if(!mainH && $(window).scrollTop() + $(window).height() >= $(document).height()) {
            if(!all) {
                $.ajax('/profile/my-requests/' + offset,{
                    dataType: 'json',
                    method: 'POST',                
                    error: function() {
                        alert("Произошла ошибка при подгрузке заявок!");
                    },
                    success: function(res) {
                        if(res.length < del)
                            all = true;
                        offset += del;
                        //console.log(res);
                        
                        for(i = 0; i < res.length; i++) {
                            request = $('#example').clone().removeAttr('id');
                            href = request.children('.quest-block-body').children('h4').children('a');//.attr('href');
                            href.attr('href', href.attr('href') + '/' + res[i].habitation_id);
                            
                            request.children('.page-controls-wr').children('a').attr('data-id', res[i].request_id);
                            request.children('.quest-block-body').children('h4').children('a').text(res[i].title);
                            request.children('.quest-block-body').children('.quest-block-name').children('.FullName').children('.FullName').text(res[i].fullName);
                            request.children('.quest-block-body').children('.quest-block-name').children('.Period').children('.Period').text(res[i].period);
                            request.children('.quest-block-body').children('.quest-block-name').children('.Email').children('.Email').text(res[i].email);
                            request.children('.quest-block-body').children('.quest-block-name').children('.Count').children('.Count').text(res[i].count);
                            
                            
                            request.children('.quest-block-img').children('img').attr('src', res[i].pic);
                            
                            var id = request.children('.quest-block-body').children('.quest-block-btns').attr('id');
                            request.children('.quest-block-body').children('.quest-block-btns').attr('id', id + res[i].request_id); //children('.quest-block-name').children('.FullName').children('.FullName').text(res[i].fullName);
                            
                            request.children('.quest-block-body').children('.quest-block-btns').hide();
                            var idreal = res[i].request_id;
                            request.children('.quest-block-body').children('.quest-block-btns').children('form#accept').addClass("" + idreal);
                            request.children('.quest-block-body').children('.quest-block-btns').children('form#refuse').addClass("" + idreal);
                            
                            request.children('.quest-block-body').children('.quest-block-btns').children('form#accept').children('input[name=\'id\']').val(res[i].request_id);
                            request.children('.quest-block-body').children('.quest-block-btns').children('form#refuse').children('input[name=\'id\']').val(res[i].request_id);
                            
                            status = '';
                            if(res[i].accept === 0) {
                                request.children('.quest-block-body').children('.quest-block-btns').show();
                                request.children('.page-controls-wr').hide();
                                
                                request.addClass('__active');
                                request.children('.quest-block-body').children('.quest-block-name').children('.StatusRequest').hide();
                            } else if(res[i].accept === 1) {
                                status = 'Заявка одобрена';
                            } else if(res[i].accept === -1) {
                                status = 'Заявка отклонена';
                            }
                            request.children('.quest-block-body').children('.quest-block-name').children('.StatusRequest').children('.StatusRequest').text(status);
                            
                            request.appendTo($('.request-cont')).show();    
                        }
                        

                    }
                });
            }
        }
    });
});