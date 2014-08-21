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
                    @foreach($requests as $r)
                        <div class="quest-block clearfix {{$r->accept === 0 ?  '__active' : '' }}">
                            <div class="quest-block-img">
                                <img src="/i/object-1.jpg" alt="">
                            </div>
                            <div class="quest-block-body">
                                <h4>{{ $r->habitation['title'] }}</h4>
                                <div class="quest-block-name">
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>{{ $r->user['first_name'] . ' ' . $r->user['last_name'] }}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __date"></i></span>{{ $r->from . ' - ' . $r->to}}</p>
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __persons"></i></span>{{ $r->user['email'] }}</p>
                                </div>
                                <div class="quest-block-response">
                                    <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __info"></i></span>
                                        @if($r->accept === 0)
                                            Заявка на рассмотрении
                                        @elseif($r->accept === -1)
                                            Заявка отклонена
                                        @elseif($r->accept === 1)
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