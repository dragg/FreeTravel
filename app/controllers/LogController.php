<?php

class LogController extends BaseController {

	public function showWelcome()
	{
		return View::make('hello');
	}
        
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
    
            $email = Input::get('email');
            $user = DB::table('users')->where('email', $email)->first();
            if (isset($user)) 
            {
                //fail
                return Response::json([0, 'Fail']);
            }
            else
            {
                return Response::json([1, 'Success']);
            }
        }

        public function getLogout(){
            Auth::logout();
            return Redirect::intended('/');
        }
}
