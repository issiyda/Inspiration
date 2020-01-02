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

//Route::get('/{any}', function () {
//    return view('home');
//})->where('any', '.*');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
});
//    ->middleware('auth');

Route::get('/login/remember', 'Auth\RememberPasswordController@showPassRememberForm')->name('password.request');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('user.login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('user.logout');

