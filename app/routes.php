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

//Route::get('profile', function(){
//    
//});

Route::controller('requests', 'RequestController');
Route::controller('profile', 'ProfileController');
Route::controller('log', 'LogController');
