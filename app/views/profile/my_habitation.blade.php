@extends('layout')

@section('content')

<section class="content-wrapper">
    <div class="content">
        <div class="request">

            <!-- request-cont -->
            <div class="profile-default">
                <p>Вы ещё не создали ни одного профиля жилья</p>
                <div class="profile-default-btns-bar">
                    <a href="<?= action('ProfileController@getCreateHabitation')?>" class="btn--profile-default __btn-green">Создать</a>
                </div>
            </div>
            <!-- /request-cont -->

        </div>
    </div>
</section>

@stop