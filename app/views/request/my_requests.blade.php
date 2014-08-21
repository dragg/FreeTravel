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
                                <img src="/i/object-1.jpg" alt="">
                            </div>
                            <div class="quest-block-body">
                                <h4><a href="{{action('HabitationController@getShowHabitation', $request->habitation_id)}}">{{ $request->habitation['title'] }}</a></h4>
                                <div class="quest-block-name">
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>{{ $request->habitation->user['first_name'] . ' ' . $request->habitation->user['last_name'] }}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __date"></i></span>{{ $request->from . ' - ' . $request->to}}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __email"></i></span>{{ $request->habitation->user['email'] }}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __persons"></i></span>{{ $request->count }}</p>
                                </div>
                                <div class="quest-block-response">
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
                
                <!-- /quest-block -->
            </div>
            <!-- /request-cont -->
        </div>
    </div>
</section>
@stop