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
        if(Request::user()->usertype == 1){
            return redirect('dashboard');
        }
        if(Request::user()->usertype == 0){
            return redirect('personal/user');
        }
    }
    return view('auth.login');
});
Route::get('login',function(){
    return view('auth.login');
});
Route::post('/signin','AccountController@index');


//dashboard
Route::get('dashboard','DashboardController@index');
Route::match(['get','post'],'upload', 'DtrController@upload');
Route::get('list', 'DtrController@dtr_list');
Route::post('search','DtrController@search');

//PERSONAL USER
Route::get('personal/user','PersonalController@index');
Route::get('attendance','PersonalController@attendance');
Route::post('personal/filter','PersonalController@filter');

Route::get('/clear', function(){
    Session::flush();
    return redirect('/');
});

Route::get('logout', 'AccountController@logout');
Route::get('angular', function(){
    return view('angular');
});


Route::get('table', function(){
   return view('dashboard.scroll');
});
Route::post('deploy','TestController@upload');