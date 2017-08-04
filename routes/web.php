<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/team_detail/{short}','TeamController@detail');

Route::post('/setMatches','HomeController@setMatches');
Route::post('/attack','HomeController@attack');
Route::post('/match_result','HomeController@match_result');
Route::post('/saveLog','HomeController@saveLog');
Route::post('/getLog','HomeController@getLog');
