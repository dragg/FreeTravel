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
                        <a id="{{$habitation->id}}" href="#" class="page-conrol __close delete"></a>
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

                @if(isset($requests))
                    @foreach($requests as $request)
                        
                    
                        <!-- quest-block -->
                        <div class="quest-block __active clearfix">
                            <div class="quest-block-img">
                                <img src="/i/object-1.jpg" alt="">
                            </div>
                            <div class="quest-block-body">
                                <h4>{{ $request->habitation->title }}</h4>
                                <div class="quest-block-name">
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>{{ $request->user->first_name . " " . $request->user->first_name }}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __date"></i></span>{{ $request->from . " - " . $request->to}}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __persons"></i></span>{{ $request->user->email }}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __persons"></i></span>{{ $request->count }}</p>
                                </div>
                                @if($request->accept === 0)
                                <div class="quest-block-btns" id="{{$request->id}}">
                                    {{ Form::open(['url' => action('RequestController@postAccept'), 'method' => 'post', 'id' => 'accept']) }}
                                    {{ Form::hidden('id', $request->id)}}
                                    {{ Form::submit('Принять', ['class' => 'btn--quest-block __btn-green']) }}
                                    {{ Form::close() }}
                                    
                                    {{ Form::open(['url' => action('RequestController@postRefuse'), 'method' => 'post', 'id' => 'refuse']) }}
                                    {{ Form::hidden('id', $request->id)}}
                                    {{ Form::submit('Отказать', ['class' => 'btn--quest-block __btn-red']) }}
                                    {{ Form::close() }}
                                </div>
                                @endif
                                <div class="quest-block-response" style="display: {{$request->accept === 0 ? 'none' : '' }} ">
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __info"></i></span>
                                        @if($request->accept === 0)
                                            Заявка на рассмотрении
                                        @elseif($request->accept === -1)
                                            Заявка отклонена
                                        @elseif($request->accept === 1)
                                            Заявка одобрена
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /quest-block -->
                    @endforeach
                @endif

            </div>
            <!-- /request-cont -->
            
            
            
            
        </div>
    </div>
</section>

@include('habitation.popupDeleteHabitation')

@stop