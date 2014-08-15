@extends('layout')

@section('content')

<section class="content-wrapper">
    <div class="content __bg-white">
       <div class="object">

            <!-- object-head -->
            <div class="object-head clearfix">
                <h2 class="page-title">{{$habitation->title}}</h2>
                <div class="page-controls-wr">
                    <a href="#" class="page-conrol __write"></a>
                    <a href="#" class="page-conrol __close"></a>
                </div>
            </div>
            <!-- /object-head -->

            <!-- object-media -->
            <div class="object-media clearfix">
                <div class="object-slider">
                    <div id="thumbs-product" class="thumbs-product flexslider">
                        <ul class="slides">
                            <li><img src="/i/product-slider/slide-1.jpg"></li>
                            <li><img src="/i/product-slider/slide-1.jpg"></li>
                            <li><img src="/i/product-slider/slide-1.jpg"></li>
                        </ul>
                    </div>
                </div>
                <div class="object-info">
                    <div class="object-contact">
                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __location"></i></span>{{$habitation->city . " " . $habitation->address }}</p>
                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>{{Auth::user()->first_name . " " . Auth::user()->last_name}}</p>
                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __tel"></i></span>+7 909 418 1234</p>
                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __email"></i></span>{{Auth::user()->email}}</p>
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

       </div>
    </div>
</section>
@stop