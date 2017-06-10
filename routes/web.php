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

/*
|--------------------------------------------------------------------------
| Chat Routes
|--------------------------------------------------------------------------
|
| Here is where you can register chat routes for your application.
|
*/
Route::group(['middleware' => ['auth'], 'prefix' => 'chat'], function () {
    Route::get('/', 'Chat\ChatController@index')->name('chat');
    Route::get('/messages', 'Chat\ChatController@messages')->name('messages');
});
