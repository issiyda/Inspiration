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


use App\Http\Controllers\DetailController;

Route::get('/',function(){
    return view('home');
});

Route::get('/home',function(){
    return view('home');
});

Route::post('/home',function(){
    return view('home');
});

Route::get('/contact',function(){
    return view('contact');
})->name('contact');

Route::post('/contactPost','contactController@contactHome')->name('contactPost');

Route::get('/users','UserController@getUserData');

Route::post('/mypage','StripeController@charge');

Route::get('/ideaDetail/{id}','DetailController@informalDetail');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/mypage', "InspirationController@mypage")->name('mypage');

//Route::group(['middleware' => ['auth']], function() {

    Route::get('/{any}', function () {
        return redirect('/mypage');
    })->where('any', '.*');
//});



//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::get('/', function () {
//    return view('home');
//});
//    ->middleware('auth');

