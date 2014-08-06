@extends('layout')


@section('content')

    <section class="content-wrapper __main">
        <div class="content">
            <div class="main clearfix">
                <h1 class="main-title">Найти жильё</h1>
                <p class="main-subtitle">Ищите жильё сами или сдавайте его другим</p>
                <div class="main-form __bg-white-transparent">
                    <form action="">
                        <div class="">
                            <div class="main-select-wr">
                                <div class="transform-select-wr">
                                    <select name="" id="" class="transform-select">
                                        <option value="">State</option>
                                        <option value="">State</option>
                                    </select>
                                </div>
                            </div>

                            <div class="main-inp-wr">
                                <input class="input-text datapicker" type="text" id="datepicker-1" placeholder="Прибытие">
                            </div>
                            <div class="main-inp-wr">
                                <input class="input-text datapicker" type="text" id="datepicker-2" placeholder="Прибытие">
                            </div>

                            <div class="main-inp-wr">
                                <div class="transform-select-wr">
                                    <select name="" id="" class="transform-select">
                                        <option value="">Country</option>
                                        <option value="">Country</option>
                                    </select>
                                </div>
                            </div>

                            <a href="/search" class="btn--main-form __btn-green">Найти</a>

                        </div>
                    </form>
                </div>
                <div class="main-guests __bg-white-transparent">
                    <a href="#" class="btn--main-guests __btn-green">Приму гостей</a>
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