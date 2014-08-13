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

Route::get('/test', function(){
    return View::make('test.test');
});

Route::post('/upload', function(){
    
    $user = DB::table('users')->where('email', Auth::user()['email'])
                ->first();
        
        
        
        $file = Input::file('myfile');
        $destinationPath = 'public/avatars/';
        $extension = explode('.', $file->getClientOriginalName());
        $extension = $extension[count($extension) - 1];
        $filename = $user->id . "." . $extension;
        $uploadSuccess = $file->move($destinationPath, $filename);

        if( $uploadSuccess ) {
            return Response::json('success', 200); // or do a redirect with some message that file was uploaded
        } else {
            return Response::json('error', 400);
        }
    
    return Response::json([Input::file('myfile')->getClientOriginalName()]);
});

Route::controller('requests', 'RequestController');
Route::controller('profile', 'ProfileController');
Route::controller('log', 'LogController');
Route::controller('habitation', 'HabitationController');
Route::controller('upload', 'UploadController');
