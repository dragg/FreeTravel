@extends('layout')


@section('content')
<section class="content-wrapper">
    <div class="content __bg-white">
       <div class="object">

            <!-- object-head -->
           
            <div class="object-head clearfix">
                <h2 class="page-title">{{$habitation->title}}</h2>
                @if ($IsOwner === true)
                    <div class="page-controls-wr">
                        <a href="{{ action('HabitationController@getCreateHabitation')  . '?id=' . $habitation->id}}" class="page-conrol __write"></a>
                        <a id="{{$habitation->id}}" href="#" class="page-conrol __close deleteHab"></a>
                    </div>
                @endif
            </div>
           
            <!-- /object-head -->

            <!-- object-media -->
            <div class="object-media clearfix">
                <div class="object-slider">
                    <div id="thumbs-product" class="thumbs-product flexslider">
                        <ul class="slides">
                            <li><img src="/i/product-slider/slide-1.jpg"></li>
                        </ul>
                    </div>
                </div>
                
                <div class="object-info">
                    <div class="object-contact">
                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __location"></i></span>{{$habitation->city . " " . $habitation->address }}</p>
                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>{{$owner->first_name . " " . $owner->last_name}}</p>
                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __tel"></i></span>{{$owner->telephone}}</p>
                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __email"></i></span>{{$owner->email}}</p>
                    </div>
                    <div class="object-manual clearfix">
                        <div class="manual-icon">
                            <i class="icon-top __bed"></i>
                            <span>{{$habitation->places}} спальных места</span>
                        </div>
                        
                        @foreach($amenities as $amenity)
                            @if($amenity->name === "Интернет")
                                <div class="manual-icon">
                                    <i class="icon-top __inet"></i>
                                    <span>{{$amenity->name}}</span>
                                </div>
                            @elseif($amenity->name === "Wi-Fi")
                                <div class="manual-icon">
                                    <i class="icon-top __inet"></i>
                                    <span>{{$amenity->name}}</span>
                                </div>
                            @elseif($amenity->name === "Стиральная машина")
                                <div class="manual-icon">
                                    <i class="icon-top __washm"></i>
                                    <span>{{$amenity->name}}</span>
                                </div>
                            @elseif($amenity->name === "Кабельное ТВ")
                                <div class="manual-icon">
                                    <i class="icon-top __tv"></i>
                                    <span>{{$amenity->name}}</span>
                                </div>
                            @elseif($amenity->name === "Утюг")
                                <div class="manual-icon">
                                    <i class="icon-top __iron"></i>
                                    <span>{{$amenity->name}}</span>
                                </div>
                            @endif
                        @endforeach
                        
                        @foreach($restrictions as $restriction)
                            @if($restriction->name === "Есть животные")
                                <div class="manual-icon">
                                    <i class="icon-top __inet"></i>
                                    <span>{{$restriction->name}}</span>
                                </div>
                            @elseif($restriction->name === "Есть комнатные растения")
                                <div class="manual-icon">
                                    <i class="icon-top __inet"></i>
                                    <span>{{$restriction->name}}</span>
                                </div>
                            @elseif($restriction->name === "Нельзя курить")
                                <div class="manual-icon">
                                    <i class="icon-top __washm"></i>
                                    <span>{{$restriction->name}}</span>
                                </div>
                            @elseif($restriction->name === "Нельзя пить")
                                <div class="manual-icon">
                                    <i class="icon-top __tv"></i>
                                    <span>{{$restriction->name}}</span>
                                </div>
                            @endif
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <!-- /object-media -->

            <!-- object-dsct- -->
            <article class="object-dsct clearfix">
                {{$habitation->description}}
            </article>
            <!-- /object-dsct -->
            @if(Auth::check() && $IsOwner === false)
                {{ Form::open(['url' => action('RequestController@postReservation'), 'method' => 'post', 'id' => 'reservation']) }}
                <!--<a class="btn--main-guests __btn-green">Забронировать</a>-->
                    {{ Form::hidden('habitation_id', $habitation->id) }}
                    {{ Form::submit('Забронировать', ['class' => 'btn--main-guests __btn-green']) }}
                {{ Form::close() }}
            @endif
       </div>
        
    </div>
   
</section>


@include('habitation.popupDeleteHabitation')

@stop