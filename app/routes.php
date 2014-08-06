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

Route::post('/signin', function(){
    $email = Input::get('email');
    $password = Input::get('password');
    
    $user = DB::table('users')->where('email', $email)->first();
    $result = [];
    
    if (isset($user) && Hash::check($password, $user->password))
    {
        $result["first_name"] = $user->first_name;
        $result["last_name"] = $user->last_name;
        $result["email"] = $user->email;
        
        if (Auth::check())
        {
            // The user is logged in...
        }
        if (!Auth::attempt(array('email' => $email, 'password' => $password), true))
        {
            $result = [];
        }
    }
    
    return Response::json($result);
    
});

Route::post('/signup', function(){
    
    $email = Input::get('email');
    $user = DB::table('users')->where('email', $email)->first();
    if (isset($user)) 
    {
        //fail
        return Response::json(0);
    }
    else
    {
//        Mail::send('emails.welcome', $data, function($message){
//            $message->to('dragg.ko@gmail.com', 'Philip Brown')->subject('Welcome to Cribbb!');
//        });
//        Mail::send('emails.welcome', [], function($message) {
//            $message->to('dragg.ko@gmail.com', 'Jon Doe')->subject('Welcome to the Laravel 4 Auth App!');
//        });
        
//        $to      = 'dragg.ko@gmail.com';
//        $subject = 'the subject';
//        $message = 'hello';
//        $headers = 'From: webmaster@example.com'; //. "\r\n" .
////            'Reply-To: webmaster@example.com' . "\r\n" .
////            'X-Mailer: PHP/' . phpversion();
//
//        mail($to, $subject, $message, $headers);
        $to='dragg.ko@gmail.com';         
        $subject='Send mail using php';
        $message='This mail send using php';
        $headers='From: dragg.ko@gmail.com';
        $mail=mail($to,$subject,$message,$headers);
        if($mail)
{
 echo'Mail send successfully';
}
else
{
 echo'Mail is not send';
}
        return Response::json(1);
    }
});

Route::get('/logout', function(){
    
    Auth::logout();
    return Redirect::intended('/');
});

Route::controller('requests', 'RequestController');
Route::controller('profile', 'ProfileController');