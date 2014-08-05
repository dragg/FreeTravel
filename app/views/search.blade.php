@extends('layout')


@section('content')

    <section class="content-wrapper">
        <div class="content">
            <div class="main __choosen clearfix">
                <div class="main-form">
                    <div class="main-select-wr">
                        <div class="transform-select-wr">
                            <select name="" id="" class="transform-select">
                                <option value="">Таганрог</option>
                                <option value="">Таганрог</option>
                            </select>
                        </div>
                    </div>

                    <div class="main-inp-wr">
                        <input class="input-text datapicker" type="text" id="datepicker-1" placeholder="Дата">
                    </div>
                    <div class="main-inp-wr">
                        <input class="input-text datapicker" type="text" id="datepicker-2" placeholder="Дата">
                    </div>

                    <div class="main-inp-wr">
                        <div class="transform-select-wr">
                            <select name="" id="" class="transform-select">
                                <option value="">2 гостя</option>
                                <option value="">3 гостя</option>
                            </select>
                        </div>
                    </div>
                    <a href="#" class="btn--main-form __btn-green">Найти</a>
                </div>

                <div class="request-head-info clearfix">
                    <p>У Вас <span>4</span> заявки</p>
                </div>

                <div class="choosen-object">
                    <div class="choosen-object-line clearfix">
                    
                        <?php foreach($results as $k => $v){ ?>
                        
                        <div class="choosen-object-block">
                            <h6>Квартира на Западном</h6>
                            <div class="choosen-object-block-img">
                                <img src="i/flat-1.jpg" alt="">
                                <div class="choosen-object-block-info">
                                    <div class="object-contact">
                                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __location"></i></span>Таганрог, ул. Калинина, д. 16, кв. 24</p>
                                        <p class="text-after-icon"><span class="icon-small-wr"><i class="icon-small __name"></i></span>Петров Василий</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php if(($k % 4 === 3) && (count($results) > ($k + 1))  ){ ?>
                        </div><div class="choosen-object-line clearfix">
                        <?php } ?>
                        
                        
                        <?php } ?>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@stop