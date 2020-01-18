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
 * 退会用ルーティング
 */
Route::get('/withdraw/{id}','InspirationController@withdraw');

Route::get('/checkPass','InspirationController@checkPass');


/**
 * 投稿取得/表示ルーティング
 */
Route::get('/mypage/','InspirationController@myself');


/**
 * アイデア投稿確認機能ルーティング
 */
Route::post('/confirm','InspirationController@confirm');

/**
 * アイデア投稿機能ルーティング
 */
Route::post('/post','InspirationController@post');


/**
 * クチコミ機能ルーティング
 */
Route::get('/review','InspirationController@review');


/**
 * アイデア編集機能ルーティング
 */
Route::get('/ideaEdit','InspirationController@ideaEdit');

/**
 * アイデア削除機能ルーティング
 */
Route::get('/ideaEdit','InspirationController@ideaDelete');



/**
 *アイデア詳細ルーティング
 */
Route::get('/detail/{id}','InspirationController@detail');


/**
 * アイデア削除ルーティング
 */
Route::get('/ideaEdit','InspirationController@ideaDelete');


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
 * プロフィール画像アップロード
 */
Route::post('/fileupload',function(){

    $file_name = request()->file->getClientOriginalName();

    request()->file->storeAs('public/',$file_name);

    $user = App\User::find(2);

    $user->update(['img' =>'/storage/'.$file_name]);

    return $user;
});
/**
 * パスワードアップデート用ルーティング
 */
Route::post('/updatePass','InspirationController@updatePass');


/**
 * AllPost検索機能のルーティング
 */
ROUTE::get('/all/search','InspirationController@search');


ROUTE::get('/favState','InspirationController@favState');


/**
 * お気に入り機能のルーティング
 */
ROUTE::post('/favorite','InspirationController@favSwitch');

/**
 * 決済機能のルーティング
 */
ROUTE::get('/pay','InspirationController@pay');

/**
 * メール送信機能のルーティング
 */
ROUTE::get('/mail','InspirationController@mail');

/**
 * Twitter機能のルーティング
 */
ROUTE::get('/twitter/share','InspirationController@share');


