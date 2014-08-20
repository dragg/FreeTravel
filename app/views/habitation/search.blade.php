@extends('layout')

@section('content')

<section class="content-wrapper">
    <div class="content">
        <div class="main __choosen clearfix">
            
                @if(isset($error))
                    <div class="alert alert-warning">
                        {{$error}}
                    </div>
                    
                @endif
               
            <div class="main-form">
                {{ Form::open(['url' => action('HabitationController@postSearch') , 'method' => 'post']) }}
                    
<!--                    <form action="">-->
                        <div class="">
                            <div class="main-select-wr">
                                <div class="transform-select-wr">
                                    <select name="city" id="" class="transform-select">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                    {{ ($city->id == $searchData['city']) ? 'selected="selected"' : '' }}
                                                    >{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="main-inp-wr">
                                <input value="{{ $searchData['dateFrom'] }}" name="dateFrom" class="input-text datapicker" type="text" id="datepicker-1" placeholder="Прибытие">
                            </div>
                            <div class="main-inp-wr">
                                <input value="{{ $searchData['dateTo'] }}" name="dateTo" class="input-text datapicker" type="text" id="datepicker-2" placeholder="Отъезд">
                            </div>

                            <div class="main-inp-wr">
                                <div class="transform-select-wr">
                                    <select name="count" id="" class="transform-select">
                                        @for ($i = 1; $i < 10; $i++)
                                            <option value="{{$i}}"
                                                    {{ ($i == $searchData['count']) ? 'selected="selected"' : '' }}
                                                    >{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

<!--                            <a href="/search" class="btn--main-form __btn-green">Найти</a>-->
                            {{ Form::submit('Найти', ['class' => 'btn--main-form __btn-green']) }}

                        </div>
                        {{ Form::close() }}

            <div class="request-head-info clearfix">

            </div>

           
            <div class="choosen-object">
                <div class="choosen-object-line clearfix">
                    @if(isset($habitations))
                        @foreach ($habitations as $habitation)
                        <div class="choosen-object-block">
                            <h6><a href="{{ action('HabitationController@getShowHabitation', [$habitation->id, $searchData['dateFrom'], $searchData['dateTo'], $searchData['count']])}}">{{$habitation->title}}</a></h6>
                            <div class="choosen-object-block-img">
                                <img src="/i/flat-1.jpg" alt="">
                                <div class="choosen-object-block-info">
                                    <div class="object-contact">
                                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __location"></i></span>Таганрог, ул. Калинина, д. 16, кв. 24</p>
                                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>Петров Василий</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            

        </div>
    </div>
</section>

@stop