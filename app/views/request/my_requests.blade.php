@extends('layout')

@section('content')

<section class="content-wrapper">
    <div class="content">
        <div class="request">
            <!-- request-head -->
            <div class="request-head">
            </div>
            <!-- /request-head -->
            
            <!-- request-cont -->
            <div class="request-cont">
                <!-- quest-block -->
                @if(isset($requests))
                    @foreach($requests as $request)
                        <div class="quest-block clearfix {{$request->accept === 0 ?  '__active' : '' }}">
                            <div class="page-controls-wr">
                                <a data-id="{{$request->id}}" href="{{ action('RequestController@postDelete') }}" class="page-conrol __close deleteRequest"></a>
                            </div>
                            <div class="quest-block-img">
                                <img src="{{ $request->habitation->getPathPic() }}" alt="">
                            </div>
                            <div class="quest-block-body">
                                <h4><a href="{{action('HabitationController@getShowHabitation', $request->habitation_id)}}">{{ $request->habitation['title'] }}</a></h4>
                                <div class="quest-block-name">
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>{{ $request->habitation->user->getFullName() }}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __date"></i></span>{{ $request->getPeriod()}}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __email"></i></span>{{ $request->habitation->user['email'] }}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __persons"></i></span>{{ $request->count }}</p>
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
                    @endforeach
                @endif
                
                
                <div class="quest-block clearfix" style="display: none" id="example">
                    <div class="page-controls-wr">
                        <a data-id="" href="{{ action('RequestController@postDelete') }}" class="page-conrol __close deleteRequest"></a>
                    </div>
                    <div class="quest-block-img">
                        <img src="" alt="">
                    </div>
                    <div class="quest-block-body">
                        <h4><a href="{{action('HabitationController@getShowHabitation')}}">Title</a></h4>
                        <div class="quest-block-name">
                            <p class="text-after-icon FullName"><span class="icon-small-wr"><i class="icon-small __name"></i></span><span class="FullName"></span></p>
                            <p class="text-after-icon Period"><span class="icon-small-wr"><i class="icon-small __date"></i></span><span class="Period"></span></p>
                            <p class="text-after-icon Email"><span class="icon-small-wr"><i class="icon-small __email"></i></span><span class="Email"></span></p>
                            <p class="text-after-icon Count"><span class="icon-small-wr"><i class="icon-small __persons"></i></span><span class="Count"></span></p>
                            <p class="text-after-icon StatusRequest"><span class="icon-small-wr"><i class="icon-small __info"></i></span>
                                <span class="StatusRequest"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /quest-block -->
            </div>
            <!-- /request-cont -->
        </div>
    </div>

</section>

<script src="/js/AutoloadRequests.js"></script>

@stop