<?php

//Home
//Search results
//Show estate
//Sign in, Sign up

//My Requests

//My Habitation [delete, edit/add]
//Requests to my habitations [apply, decline]

//Profile [update, update password, upload photo]


Route::get('/', function()
{
	return View::make('home');
});


Route::get('/search', function(){
    
    return View::make('search')->with('results', range(1, 17));
    
});

Route::get('/show/{id}', function(){
    
    
    
});

//Route::post('/signin', function(){
//    $email = Input::get('email');
//    $password = Input::get('password');
//    
//    $user = DB::table('users')->where('email', $email)->first();
//    $result = [];
//    
//    if (isset($user) && Hash::check($password, $user->password))
//    {
//        $result["first_name"] = $user->first_name;
//        $result["last_name"] = $user->last_name;
//        $result["email"] = $user->email;
//        
//        if (Auth::check())
//        {
//            // The user is logged in...
//        }
//        if (!Auth::attempt(array('email' => $email, 'password' => $password), true))
//        {
//            $result = [];
//        }
//    }
//    
//    return Response::json($result);
//    
//});
//
//Route::post('/signup', function(){
//    
//    $email = Input::get('email');
//    $user = DB::table('users')->where('email', $email)->first();
//    if (isset($user)) 
//    {
//        //fail
//        return Response::json([0, 'Fail']);
//    }
//    else
//    {
//        return Response::json([1, 'Success']);
//    }
//});
//
//Route::get('/logout', function(){
//    
//    Auth::logout();
//    return Redirect::intended('/');
//});

Route::controller('requests', 'RequestController');
Route::controller('profile', 'ProfileController');
Route::controller('log', 'LogController');