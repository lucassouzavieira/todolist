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
    return view('welcome');
});
    
Route::get('/task', 'TaskController@index');
Route::get('/task/create', 'TaskController@create');
Route::get('/task/search', 'TaskController@search');
Route::get('/task/{task}', 'TaskController@show');
Route::get('/task/{task}/edit', 'TaskController@edit');
Route::put('/task/{task}', 'TaskController@update');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::post('/task/update/{task}', 'TaskController@updateJQuery');
Route::post('/task', 'TaskController@store');
