@extends('layout')


@section('content')

    <section class="content-wrapper __main">
        <div class="content">
            <div class="main clearfix">
                <h1 class="main-title">Найти жильё</h1>
                <p class="main-subtitle">Ищите жильё сами или сдавайте его другим</p>
                <div class="main-form __bg-white-transparent">
                    {{ Form::open(['url' => action('HabitationController@postSearch') , 'method' => 'post']) }}
                    
<!--                    <form action="">-->
                        <div class="">
                            <div class="main-select-wr">
                                <div class="transform-select-wr">
                                    <select name="city" id="" class="transform-select">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="main-inp-wr">
                                <input name="dateFrom" class="input-text datapicker" type="text" id="datepicker-1" placeholder="Прибытие">
                            </div>
                            <div class="main-inp-wr">
                                <input name="dateTo" class="input-text datapicker" type="text" id="datepicker-2" placeholder="Отъезд">
                            </div>

                            <div class="main-inp-wr">
                                <div class="transform-select-wr">
                                    <select name="count" id="" class="transform-select">
                                        @for ($i = 1; $i < 10; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

<!--                            <a href="/search" class="btn--main-form __btn-green">Найти</a>-->
                            {{ Form::submit('Найти', ['class' => 'btn--main-form __btn-green']) }}

                        </div>
                        {{ Form::close() }}
<!--                    </form>-->
                </div>
                <div class="main-guests __bg-white-transparent">
                    <a href="{{ action('HabitationController@getCreateHabitation') }}" class="btn--main-guests __btn-green">Приму гостей</a>
                </div>
                
                <div class="main-social-links">
                    <a href="#" class="main-social-link __fa"></a>
                    <a href="#" class="main-social-link __tw"></a>
                    <a href="#" class="main-social-link __vk"></a>
                </div>
            </div>
        </div>
    </section>

@stop