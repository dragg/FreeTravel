<?php

class ProfileController extends BaseController
{
    public function getShow()
    {
        $user = DB::table('users')->where('email', Auth::user()['email'])->where('password', Auth::user()['password'])->first();
        return View::make('profile.index', ['user' => $user]);
    }
    
    public function postSave()
    {
        $response = false;
        if(Input::get('actionMain') == true) {
            $userData = [Input::get('first_name'), Input::get('last_name'),
                Input::get('email')];
            
            if(Auth::user()['email'] !== $userData[2])
            {
                $user = DB::table('users')->where('email', 
                        $userData[2])->first();
            
                if (!isset($user)) {
                    DB::table('users')->where('email', Auth::user()['email'])
                            ->update(['first_name' => $userData[0],
                                'last_name' => $userData[1], 'email' => $userData[2]]);
                    $response = true;
                }
                
                
            }
            else {
                DB::table('users')->where('email', Auth::user()['email'])
                    ->update(['first_name' => $userData[0],
                        'last_name' => $userData[1]]);
                
                $response = true;
            }
        }
        else {
            $userPasswords = [Input::get('oldPassword'), 
                    Input::get('newPassword'), Input::get('repeatPassword')];
            
        }
        
        return Response::json([$response]);
    }
    
}