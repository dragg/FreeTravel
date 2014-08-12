@extends('layout')

@section('content')
<section class="content-wrapper">
    <div class="content">
        <div class="request">

            <?php if($isEmpty === TRUE): ?>
            <!-- request-cont -->
            <div class="profile-default">
                <p>Вы ещё не создали ни одного профиля жилья</p>
                <div class="profile-default-btns-bar">
                    <a href="<?= action('ProfileController@getCreateHabitation')?>" class="btn--profile-default __btn-green">Создать</a>
                </div>
            </div>
            <!-- /request-cont -->
            
            <?php else: ?>
            
            <!-- request-head -->
            <div class="request-head">
                <div class="request-head-links">
                    <a href="#" class="request-housing __active"><em>Мое жилье</em></a>
                    <a href="#" class="request-housing "><em>Заявки на жилье</em> <span>+1</span></a>
                </div>
                <div class="request-head-info clearfix">
                    <p>У Вас <span>2</span> заявки</p>
                </div>
            </div>
            <!-- /request-head -->

            <!-- request-cont -->
            <div class="request-cont">
                
                <?php foreach ($habitations as $habitation): ?>
                
                 <!-- quest-block -->
                <div class="quest-block __active clearfix">
                    <div class="page-controls-wr">
                        <a href="#" class="page-conrol __write"></a>
                        <a href="#" class="page-conrol __close"></a>
                    </div>
                    <div class="quest-block-img">
                        <img src="/i/object-1.jpg" alt="">
                    </div>
                    <div class="quest-block-body">
                        <h4>{{$habitation->title}}</h4>
                        <div class="quest-block-name">
                            <p class="text-after-icon">
                                <span class="icon-small-wr">
                                    <i class="icon-small __location"></i>
                                </span>
                                {{ $habitation->city . " " . $habitation->address }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /quest-block -->
                
                <?php endforeach; ?>
                
            </div>
            <!-- /request-cont -->
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="popup-wrapper-bg" style="display: none" id="deleteHabitation">
    <div class="popup">
        <h6>Удаление</h6>
        <p>Вы действительно хотите удалить "Уютная квартира на западном"?</p>
        <div class="popup-btns-bar">
            <a href="#" class="btn--popup-2btn __btn-green">Принять</a>
            <a id="cancelDeleteHabitation" href="#" class="btn--popup-2btn __btn-red">Отказать</a>
        </div>
        <a href="#" class="popup-close"></a>
    </div>
</div>

@stop