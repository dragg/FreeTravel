@extends('layout')

@section('content')

           <section class="content-wrapper">
                <div class="content __bg-white">
                    <!-- profile -->
                    <div class="profile clearfix">

                        <!-- profile-form -->
                        <div class="profile-form">
                            <div class="request-head-links">
                                <a href="#" class="request-profile __active"><em>Личные данные</em></a>
                                <a href="#" class="request-profile"><em>Смена пароля</em></a>
                            </div>
                            <div class="profile-line" id="mainProfile">
                                <div class="profile-inp-wr">
                                    <input class="input-text" value="<?= Auth::user()->first_name ?>" type="text" id="first_name" placeholder="Имя">
                                </div>
                                <div class="profile-inp-wr">
                                    <input class="input-text" value="<?= Auth::user()->last_name ?>" type="text" id="last_name" placeholder="Фамилия">
                                </div>
                                <div class="profile-inp-wr">
                                    <input class="input-text" value="<?= Auth::user()->telephone ?>" type="text" id="telephone" placeholder="Телефон">
                                </div>
                                <div class="profile-inp-wr">
                                    <input class="input-text" value="<?= Auth::user()->email ?>" type="text" id="email" placeholder="E-mail">
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
                                <a href="#" class="btn--profile __btn-red" id="cancel">Отмена</a>
                            </div>
                        </div>
                        <!-- /profile-form -->

                        <div class="profile-load-photo">
                            <div class="profile-load-img">
                                <img src="<?= file_exists('public/avatars/' . Auth::user()->id . '.jpg') ? '/avatars/' . Auth::user()->id . '.jpg' : '/avatars/none.jpg' ?>" id="avatar">
                                <div class="search-load-controls-wr" hidden>
                                    <a href="#" class="page-conrol __close" ></a>
                                </div>
                                <div class="search-load-controls-wr" style="display: <?= file_exists('public/avatars/' . Auth::user()->id . '.jpg') ? 'block' : 'none' ?>">
                                    <a id="deleteAvatar" href="#" class="page-conrol __close"></a>
                                </div>
                            </div>
                           <div class="input-filesuctom" style="display: block;">
                                <form id="uploadAvatar" action="{{action('UploadController@postUploadAvatar')}}" method="post" enctype="multipart/form-data">
                                    <input type="file" size="60" name="avatarFile" id="fileupload">
                                    <a id="upload" class="btn--profile-load __btn-green">Загрузить</a>
                                </form>
                              
                              
                            </div>
                            <section>
                                <div class="content" style="width: 400px">
                                    <div id="progress">
                                           <div id="percent" style="display: none">0%</div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- /profile -->
                </div>
            </section>        

@stop