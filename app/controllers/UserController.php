<?php

class UserController extends BaseController {

    protected $rulesSignup = [
        'first_name' => 'required|min:6',
        'last_name' => 'required|min:6',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6'
    ];
    
    protected $rulesSignin = [
        'email' => 'required|email|exists:users',
        'password' => 'required|min:3'
    ];
    
    public function postSignin(){
        $response = 'Success';
        $message = '';
        $url = '';
        
        $validator = Validator::make(Input::all(), $this->rulesSignin);
        
        if($validator->fails()) {
            $response = 'Fail';
            $message = $validator->messages()->first();
        } else {
           
            if (!Auth::attempt(['email' =>  Input::get('email'),
                'password' => Input::get('password')], true))
            {
                $response = 'Fail';
                $message = 'Password is incorrect.';
            }
        }
        
        $url = Session::get('url')['intended'];
        
        
        return Response::json([$response, $message, $url]);
    }

    public function postSignup(){
        $response = 'Success';
        $message = '';

        $validator = Validator::make(Input::all(), $this->rulesSignup);
        if($validator->fails()) {
            $response = 'Fail';
            $message = $validator->messages()->first();
        } else {
            User::create([
                'first_name' => Input::get('first_name'),
                'last_name' => Input::get('last_name'),
                'email' => Input::get('email'),
                'password' => Hash::make(Input::get('password'))
            ]);
        }

        return Response::json([$response, $message]);
    }

    public function getLogout(){
        Auth::logout();
        return Redirect::intended('/');
    }
}
