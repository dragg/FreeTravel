<!DOCTYPE html>
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8" lang="en">		 <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9" lang="en">				 <![endif]-->
<!--[if gt IE 8]><!--> <html lang="ru">							 <!--<![endif]-->

	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<title></title>

		<link rel="stylesheet" media="all" href="/style/reset.css">
        <link rel="stylesheet" media="all" href="/js/plugins/select2-3.4.5/select2.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" media="all" href="/style/style.css">


        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="/js/plugins/select2-3.4.5/select2.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

        <script src="/js/plugins/select2-3.4.5/select2.min.js"></script>


		<script src="/js/main.js"></script>
                
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
<script src="http://malsup.github.com/jquery.form.js"></script>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <link rel="stylesheet" media="all" href="style/ie/lt-ie9.css">
		<![endif]-->

        <!--[if gte IE 9]>
            <link rel="stylesheet" media="all" href="style/ie/ie9.css">
        <![endif]-->

        <script>

            $(document).ready(function(){
                
                $('.transform-select').select2({
                    minimumResultsForSearch: -1
                });
                
                /*datepicker inicialization */
                $( ".datapicker" ).datepicker({ dateFormat: "dd-mm-yy" });
                var monthNames = $( ".datapicker" ).datepicker( "option", "monthNames" );
                $( ".datapicker" ).datepicker( "option", "monthNames", [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ] );

                var dayNamesMin = $( ".datapicker" ).datepicker( "option", "dayNamesMin" );
                $( ".datapicker" ).datepicker( "option", "dayNamesMin", [ "Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс" ] );
                /*/ datepicker inicialization */


            });

        </script>

	</head>

	<body>
        <!-- wrapper -->
        <div class="wrapper">
            <header class="header clearfix">
                <a href="/" class="logo"><h1><span>Ino</span>Travel</h1></a>
                <menu class="header-menu">
                    <ul>
                        <?php if(Auth::check()): ?>
                        <li><a href="{{ action('ProfileController@getShow') }}" style="margin-right: 10px"><span>{{ Auth::user()->last_name . " ". Auth::user()->first_name }}</span></a></li>
                        <li><div class="profile-load-img" style="max-width: 100px; max-height: 60px"><img src="<?= file_exists('public/avatars/' . Auth::user()->id . '.jpg') ? '/avatars/' . Auth::user()->id . '.jpg' : '/avatars/none.jpg' ?>" alt="Photo-1" style="margin-left: 0px;max-height: 60px;" id="headerAvatar"></div></li>
                            <li><a href="{{ action('ProfileController@getMyHabitation')}}"><span>Моё жильё</span></a></li>
                            <li class="__empty-cell"></li>
                            <li class="__empty-cell"><a href="{{ action('RequestController@getMyRequests')}}" id="myRequests"><span>Заявки</span></a></li> 
                            <li class="__empty-cell"><a href="/user/logout"><span>Выход</span></a></li> 
                        <?php else: ?>
                            <li><a id="signup" href="#"><span>Регистрация</span></a></li>
                            <li><a id="signin" href="#"><span>Вход</span></a></li>
                        <?php endif; ?>
                    </ul>
                </menu>
            </header>
            
            @yield('content')

        </div>
        <!-- /wrapper -->
        <?php if(!Auth::check()): ?>
        
        <!-- popup login -->
        <div id="signin" class="popup-wrapper-bg" style="display: none">
            <div class="popup">
                <h6>Вход в систему</h6>

                <div class="popup-inp-bar">
                    <div class="popup-inp-wr">
                        <input class="input-text" type="text" id="signin-user-email" placeholder="E-mail">
                    </div>
                    <div class="popup-inp-wr">
                        <input class="input-text" type="text" id="signin-user-password" placeholder="Пароль">
                    </div>
                </div>

                <div class="popup-btns-bar">
                    <a id="link_signin" href="#" class="btn--popup-btn __btn-green">Войти</a>
                </div>
                <a href="#" class="popup-close"></a>
            </div>
        </div>
        <!-- /popup login -->

        <!-- popup  entry details -->
        <div id="" class="popup-wrapper-bg" style="display: none">
            <div class="popup __pop-entry">
                <h6>Вход в систему</h6>

                <div class="popup-inp-bar">
                    <div class="popup-inp-wr">
                        <input class="input-text" type="text" id="datepicker-1" placeholder="E-mail">
                    </div>
                    <div class="popup-inp-wr">
                        <input class="input-text __incorrect-password" type="text" id="datepicker-1" placeholder="Пароль">
                    </div>
                </div>

                <div class="popup-login-service clearfix">
                    <div class="search-checkbox-wr ">
                        <input id="searchCheck-inet" type="checkbox">
                        <label for="searchCheck-inet">Интернет</label>
                    </div>
                    <a href="#" class="popup-link">Забыли пароль?</a>
                </div>

                <div class="popup-btns-bar">
                    <a href="#" class="btn--popup-btn __btn-green">Войти</a>
                </div>
                 <div class="popup-login-service clearfix">
                    <a href="#" class="popup-link">Зарегистрироваться</a>
                </div>
                <a href="#" class="popup-close"></a>
            </div>
        </div>
        <!-- /popup  entry details -->

         <!-- popup signup -->
        <div id="signup" class="popup-wrapper-bg" style="display: none">
            <div class="popup">
                <h6>Регистрация</h6>

                <div class="popup-inp-bar">
                    <div class="popup-inp-wr">
                        <input class="input-text" type="text" id="user-first_name" placeholder="Имя">
                    </div>
                    <div class="popup-inp-wr">
                        <input class="input-text" type="text" id="user-last_name" placeholder="Фамилия">
                    </div>
                    <div class="popup-inp-wr">
                        <input class="input-text" type="text" id="signup-user-email" placeholder="E-mail">
                    </div>
                    <div class="popup-inp-wr">
                        <input class="input-text" type="text" id="signup-user-password" placeholder="Пароль">
                    </div>
                    <div class="popup-inp-wr">
                        <input class="input-text" type="text" id="user-repeat-password" placeholder="Повторите пароль">
                    </div>
                </div>

                <div class="popup-btns-bar">
                    <a id="link_signup" href="#" class="btn--popup-btn __btn-green">Зарегистрироватья</a>
                </div>
                <a href="#" class="popup-close"></a>
            </div>
        </div>
        <!-- /popup signup -->

        <!-- popup thank -->
        <div id="thank" class="popup-wrapper-bg" hidden>
            <div class="popup __thank">
                <h6>Спасибо!</h6>

                <p class="">Регистрация прошла успешна. На Ваш почтовый ящик было отправлено письмо для подтверждения регистрации.</p>

                <div class="popup-btns-bar">
                    <a href="#" class="btn--popup-btn __btn-green" id="ok_thank">OK</a>
                </div>
                <a href="#" class="popup-close"></a>
            </div>
        </div>
        <!-- /popup thank -->
        
        <?php endif; ?>
        

	</body>
</html>