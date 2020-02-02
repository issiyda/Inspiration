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
///**
// * 新規ユーザー登録画面表示
// */
//Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
//
///**
// * 新規ユーザー登録（DBにデータ保存）
// */
//Route::post('/register','Auth\RegisterController@create')->name('register');
//
//
///**
// * パスワードリマインダー画面表示
// */
////Route::get('/login/remember', 'Auth\RememberPasswordController@showPassRememberForm')->name('password.request');
//
///**
// * ログイン画面表示
// */
//Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//
///**
// *
// */
//Route::post('/login', 'Auth\LoginController@login')->name('login');
//
///**
// * ログアウト実行
// */
//Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::post('/home',function(){
    return view('home');
});

Route::get('/users','UserController@getUserData');

Route::post('/mypage','StripeController@charge');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();


Route::get('/mypage', "InspirationController@mypage")->name('mypage');

Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');



//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::get('/', function () {
//    return view('home');
//});
//    ->middleware('auth');

