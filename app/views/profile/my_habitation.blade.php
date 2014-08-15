@extends('layout')

@section('content')
<section class="content-wrapper">
    <div class="content">
        <div class="request">

            <!-- request-cont -->
            <div class="profile-default" style="display: <?= $isEmpty === TRUE ? 'block' : 'none' ?>">
                <p>Вы ещё не создали ни одного профиля жилья</p>
                <div class="profile-default-btns-bar">
                    <a href="<?= action('ProfileController@getCreateHabitation')?>" class="btn--profile-default __btn-green">Создать</a>
                </div>
            </div>
            <!-- /request-cont -->
            
            
            
            <!-- request-head -->
            <div class="request-head" style="display: <?= $isEmpty !== TRUE ? 'block' : 'none' ?>">
                <div class="request-head-links">
                    <a href="#" class="request-housing __active"><em>Мое жилье</em></a>
                    <a href="#" class="request-housing "><em>Заявки на жилье</em> <span>+1</span></a>
                </div>
                <div class="request-head-info clearfix">
                    <p>У Вас <span>2</span> заявки</p>
                </div>
            </div>
            <!-- /request-head -->

            <?php if($isEmpty !== TRUE) : ?>
            
            <!-- request-cont -->
            <div class="request-cont" id="my_habitation">
                
                <?php foreach ($habitations as $habitation): ?>
                
                 <!-- quest-block -->
                <div class="quest-block __active clearfix habitation">
                    <div class="page-controls-wr">
                        <a href="{{ action('HabitationController@getCreateHabitation')  . '?id=' . $habitation->id}} " class="page-conrol __write"></a>
                        <a id="{{$habitation->id}}" href="#" class="page-conrol __close"></a>
                    </div>
                    <div class="quest-block-img">
                        <img src="/i/object-1.jpg" alt="">
                    </div>
                    <div class="quest-block-body">
                        <h4><a href="{{ action('HabitationController@getShowHabitation', $habitation->id)}}">{{$habitation->title}}</a></h4>
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
                
                <div class="profile-default" style="margin-top: 30px">
                    <div class="profile-default-btns-bar">
                        <a href="<?= action('HabitationController@getCreateHabitation')?>" class="btn--profile-default __btn-green">Добавить</a>
                    </div>
                </div>
            </div>
            <!-- /request-cont -->
            
            <?php endif; ?>
            <!-- request-cont -->
            <div class="request-cont" id="request" style="display: none">

                <!-- quest-block -->
                <div class="quest-block __active clearfix">
                    <div class="quest-block-img">
                        <img src="/i/object-1.jpg" alt="">
                    </div>
                    <div class="quest-block-body">
                        <h4>Уютная картира на Западном</h4>
                        <div class="quest-block-name">
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>Петров Василий</p>
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __date"></i></span>23.11.2014 — 28.11.2014</p>
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __persons"></i></span>email@gmail.com</p>
                        </div>
                        <div class="quest-block-btns">
                            <a href="#" class="btn--quest-block __btn-green">Принять</a>
                            <a href="#" class="btn--quest-block __btn-red">Отказать</a>
                        </div>
                    </div>
                </div>
                <!-- /quest-block -->

                <!-- quest-block -->
                <div class="quest-block clearfix">
                    <div class="quest-block-img">
                        <img src="/i/object-1.jpg" alt="">
                    </div>
                    <div class="quest-block-body">
                        <h4>Уютная картира на Западном</h4>
                        <div class="quest-block-name">
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>Петров Василий</p>
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __date"></i></span>23.11.2014 — 28.11.2014</p>
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __persons"></i></span>email@gmail.com</p>
                        </div>
                        <div class="quest-block-response">
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __info"></i></span>Заявка отклонена</p>
                        </div>
                    </div>
                </div>
                <!-- /quest-block -->

                <!-- quest-block -->
                <div class="quest-block clearfix">
                    <div class="quest-block-img">
                        <img src="/i/object-1.jpg" alt="">
                    </div>
                    <div class="quest-block-body">
                        <h4>Уютная картира на Западном</h4>
                        <div class="quest-block-name">
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>Петров Василий</p>
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __date"></i></span>23.11.2014 — 28.11.2014</p>
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __persons"></i></span>email@gmail.com</p>
                        </div>
                        <div class="quest-block-response">
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __info"></i></span>Заявка отклонена</p>
                        </div>
                    </div>
                </div>
                <!-- /quest-block -->

                <!-- quest-block -->
                <div class="quest-block clearfix">
                    <div class="quest-block-img">
                        <img src="/i/object-1.jpg" alt="">
                    </div>
                    <div class="quest-block-body">
                        <h4>Уютная картира на Западном</h4>
                        <div class="quest-block-name">
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>Петров Василий</p>
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __date"></i></span>23.11.2014 — 28.11.2014</p>
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __persons"></i></span>email@gmail.com</p>
                        </div>
                        <div class="quest-block-response">
                            <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __info"></i></span>Заявка отклонена</p>
                        </div>
                    </div>
                </div>
                <!-- /quest-block -->

            </div>
            <!-- /request-cont -->
            
            
            
            
        </div>
    </div>
</section>

<div class="popup-wrapper-bg" style="display: none" id="deleteHabitation">
    <div class="popup">
        <h6>Удаление</h6>
        <p>Вы действительно хотите удалить "Уютная квартира на западном"?</p>
        <div class="popup-btns-bar">
            <a id="applyDeleteHabitation" href="#" class="btn--popup-2btn __btn-green">Принять</a>
            <a id="cancelDeleteHabitation" href="#" class="btn--popup-2btn __btn-red">Отказать</a>
        </div>
        <a href="#" class="popup-close"></a>
    </div>
</div>

@stop