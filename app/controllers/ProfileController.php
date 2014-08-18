<?php

class ProfileController extends BaseController
{
    public function getShow() {
        $user = DB::table('users')->where('email', Auth::user()['email'])->where('password', Auth::user()['password'])->first();
         
        return View::make('profile.settings', ['user' => $user]);
    }
    
    public function postSave() {
        $response = false;
        $error = "";
        if(Input::get('actionMain') === "true") { //change personal data
            $userData = [Input::get('first_name'), Input::get('last_name'),
                Input::get('email'), Input::get('telephone')];
            
            if(Auth::user()['email'] !== $userData[2]) {
                $user = DB::table('users')->where('email', 
                        $userData[2])->first();
            
                if (!isset($user)) {
                    DB::table('users')->where('email', Auth::user()['email'])
                            ->update(['first_name' => $userData[0],
                                'last_name' => $userData[1], 'email' => $userData[2],
                                'telephone' => $userData[3]]);
                    $response = true;
                }
                else {
                    $error = 'This e-mail is exist!';
                }
                
                
            }
            else {
                DB::table('users')->where('email', Auth::user()['email'])
                    ->update(['first_name' => $userData[0],
                        'last_name' => $userData[1], 'telephone' => $userData[3]]);
                
                $response = true;
            }
        }
        else { //change password
            if (Input::get('newPassword') !== Input::get('repeatPassword')) {
                $error = 'Don\'t match passwords';
            }
            else {
                $user = DB::table('users')->where('email', Auth::user()['email'])->first();
                                
                if (!isset($user)) {
                    $error = 'Error of authentication!';
                }
                else if (!Hash::check(Input::get('oldPassword'), $user->password)) {
                    
                    $error = 'Current password is incorrect!';
                }
                else {
                    DB::table('users')->where('email', Auth::user()['email'])->update(['password' => Hash::make(Input::get('newPassword'))]);
                
                    $response = true;
                }
            }
            
            
        }
        
        return Response::json([$response, Input::get('actionMain'), $error]);
    }
    
    public function getMyHabitation() {
        $user = DB::table('users')->where('email', Auth::user()['email'])->first();
        
        $res = DB::table('habitations')
                ->where('deleted', 0)
                ->where('user_id', $user->id)
                ->join('cities', 'habitations.city_id', '=', 'cities.id')
                ->select('habitations.title', 'habitations.id', 'habitations.address', 'cities.name as city' )
                ->get();
        
//        var_dump($res);die();
        
        
        return View::make('profile.my_habitation', [
            'isEmpty' => count($res) === 0 ? TRUE : FALSE, 
            'habitations' => $res]);
    }
    
    public function getCreateHabitation() {
        
        $amenities = DB::table('amenities')->get();
        $restrictions = DB::table('restrictions')->get();
        $cities = DB::table('cities')->get();
        
        return View::make('profile.create_habitation', 
            ['amenities' => $amenities, 'restrictions' => $restrictions,
                'cities' => $cities]);
    }
    
    public function postDeleteAvatar() {
        $response = 0;
        
        $path = public_path() . '/avatars/' . Auth::user()->id . '.jpg';
        if(file_exists($path)) {
            unlink($path);
            $response = 1;
        }
        
        return Response::json([$response, 'none.jpg']);
    }
}