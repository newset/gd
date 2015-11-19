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

Route::get('/', function () {
    return view('welcome');
});

/* view route */
Route::get('_/{page?}', 'CookController@page')->where('page', '(.*)');
Route::post('q/{ctl}/{action}/{params?}', 'CookController@cook')->where('params', '(.*)');

if (is_debug()) {
	Route::get('q/{ctrl}/{action}/{params?}', 'CookController@cook')->where('params', '(.*)');
}
