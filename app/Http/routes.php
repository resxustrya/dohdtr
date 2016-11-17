<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
    if(Auth::check()){
        return redirect('dashboard');
    }
    return view('auth.login');
});
Route::post('/signin','AccountController@index');


//dashboard
Route::get('dashboard','DashboardController@index');

Route::get('/clear', function(){
    Session::flush();
    return redirect('/');
});



