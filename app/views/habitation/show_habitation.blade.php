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
                    <div id="thumbs-product" class="thumbs-product flexslider quest-block-img search-load-img" style="max-height: 320px; max-width: 380px; width: 400px">
                        <ul class="slides">
                            <li><img src="{{ $habitation->getPathPic() }}"></li>
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
                 
                        

                            @foreach($habitation->amenities as $amenity)
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
                        
                        
                            @foreach($habitation->restrictions as $restriction)
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
            <article class="object-dsct clearfix" style="padding: 26px 0 80px;">
                {{$habitation->description}}
            </article>
            <!-- /object-dsct -->
            {{--
            @if(Auth::check() && $IsOwner === false)
                --}}
            <a class="btn--main-guests __btn-green" id="reservation" style="float:right; margin-right: 50px">Забронировать</a>
            {{-- @endif --}}
       </div>
        
    </div>
   
</section>

<div class="popup-wrapper-bg" style="display: none" id="reservationPopup">
    <div class="popup" style="width: 600px">
        <h6>Бронирование</h6>
        <div class="main-form" style="padding: 0; margin: 10px 0 30px">
            {{ Form::open(['url' => action('RequestController@postReservation') , 'method' => 'post', 'id' => 'reservation']) }}
                <div>
                    {{ Form::hidden('id', $habitation->id) }}

                    <div class="main-inp-wr">
                        <input value="{{ isset($reservation) ? $reservation['dateFrom'] : '' }}" name="dateFrom" class="input-text datapicker" type="text" id="datepicker-1" placeholder="Прибытие">
                    </div>

                    <div class="main-inp-wr">
                        <input value="{{ isset($reservation) ?  $reservation['dateTo'] : '' }}" name="dateTo" class="input-text datapicker" type="text" id="datepicker-2" placeholder="Отъезд">
                    </div>

                    <div class="main-inp-wr">
                        <div class="transform-select-wr">
                            <select name="count" id="" class="transform-select">
                                @for ($i = 1; $i <= $habitation->places; $i++)
                                    <option value="{{$i}}"
                                            @if(isset($reservation))
                                                {{ ($i == $reservation['count']) ? 'selected="selected"' : '' }}
                                            @endif
                                            >{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    {{ Form::submit('Забронировать', ['class' => 'btn--main-form __btn-green', 'style' => 'margin-top: 20px']) }}
                </div>
            {{ Form::close() }}
        </div>
        <a href="#" class="popup-close"></a>
    </div>
</div>

@include('habitation.popupDeleteHabitation')

@stop