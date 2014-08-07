@extends('layout')

@section('content')
           <section class="content-wrapper">
                <div class="content __bg-white">
                    <!-- profile -->
                    <div class="profile clearfix">

                        <!-- profile-form -->
                        <div class="profile-form">
                            <div class="request-head-links">
                                <a href="#" class="request-housing __active"><em>Личные данные</em></a>
                                <a href="#" class="request-housing"><em>Смена пароля</em></a>
                            </div>
                            <div class="profile-line" id="mainProfile">
                                <div class="profile-inp-wr">
                                    <input class="input-text" value="<?= $user->first_name ?>" type="text" id="first_name" placeholder="Имя">
                                </div>
                                <div class="profile-inp-wr">
                                    <input class="input-text" value="<?= $user->last_name ?>" type="text" id="last_name" placeholder="Фамилия">
                                </div>
                                <div class="profile-inp-wr">
                                    <input class="input-text" value="<?= $user->email ?>" type="text" id="email" placeholder="E-mail">
                                </div>
                            </div>
                            
                            <div class="profile-line" id="passwordProfile" style="display: none">
                                <div class="profile-inp-wr">
                                    <input class="input-text" type="text" id="oldPassword" placeholder="Старый пароль">
                                </div>
                                <div class="profile-inp-wr">
                                    <input class="input-text" type="text" id="newPassword" placeholder="Новый пароль">
                                </div>
                                <div class="profile-inp-wr">
                                    <input class="input-text" type="text" id="repeatPassword" placeholder="Повторите пароль">
                                </div>
                            </div>

                            <div class="profile-btns-bar">
                                <a href="#" class="btn--profile __btn-green" id="save">Сохранить</a>
                                <a href="#" class="btn--profile __btn-red">Отмена</a>
                            </div>
                        </div>
                        <!-- /profile-form -->

                        <div class="profile-load-photo">
                            <div class="profile-load-img">
                                <div class="profile-load-img-empty">нет фото</div>
                                <img src="/i/statham.jpg" alt="" hidden>
                                <div class="search-load-controls-wr" hidden>
                                    <a href="#" class="page-conrol __close" ></a>
                                </div>
                            </div>
                           <div class="input-filesuctom" style="display: block;">
                              <a class="btn--profile-load __btn-green">Загрузить</a>
                              <input type="file" id="fileupload" name="f_File" multiple="">
                            </div>
                        </div>
                    </div>
                    <!-- /profile -->
                </div>
            </section>        

@stop