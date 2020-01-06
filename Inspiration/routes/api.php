<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/**
 * プロフィールデータの編集用
 */
Route::patch('/setting/{id}',function($id,Request $request){

    $user = \App\User::find($id);

    $user->fill($request->all())->update();

    return response()->json([
        'success' => 'user updated successfully!'
    ],200);

});
/**
 * 画像アップロード
 */
Route::post('/fileupload',function(){

    $file_name = request()->file->getClientOriginalName();

    request()->file->storeAs('public/',$file_name);

    $user = App\User::find(2);

    $user->update(['img' =>'../../../public/storage/'.$file_name]);

    return $user;
});


Route::get('/mypage','InspirationController@mypage');

//Route::get('/post','InspirationController@post');
