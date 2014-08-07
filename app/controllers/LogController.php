<?php

class LogController extends BaseController {

        public function postSignin(){
            $email = Input::get('email');
            $password = Input::get('password');

            $user = DB::table('users')->where('email', $email)->first();
            $result = [];

            if (isset($user) && Hash::check($password, $user->password))
            {
                $result = [true, 'Success'];

                if (Auth::check())
                {
                    // The user is logged in...
                }
                if (!Auth::attempt(array('email' => $email, 'password' => $password), true))
                {
                    $result = [false, 'Fail'];
                }
            }

            return Response::json($result);
        }
     
        public function postSignup(){
            $response = false;
            $email = Input::get('email');
            $user = DB::table('users')->where('email', $email)->first();
            if (!isset($user))
            {
                $password = Input::get('password');
                $repeat_password = Input::get('repeat_password');
                if($password === $repeat_password)
                {
                    $first_name = Input::get('first_name');
                    $last_name = Input::get('last_name');
                    DB::table('users')->insert(['email' => $email, 
                        'first_name' => $first_name, 'last_name' => $last_name,
                        'password' => Hash::make($password)]);
                    $response = true;
                }
            }
            
            return Response::json([$response, $response === true ? 'Success' : 'Fail']);
        }

        public function getLogout(){
            Auth::logout();
            return Redirect::intended('/');
        }
}
