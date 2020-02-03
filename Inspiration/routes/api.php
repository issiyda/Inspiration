<?php

use App\Http\Controllers\DetailController;
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
Route::post('/post','IdeaPostController@post');


/**
 * クチコミ機能ルーティング
 */
Route::get('/review','InspirationController@review');



/**
 * アイデア投稿保存
 */
Route::post('/saveIdea','postIdeaController@saveIdea');


/**
 * アイデア編集機能ルーティング
 */
Route::post('/ideaEdit','postIdeaController@editIdea');



/**
 *アイデア詳細ルーティング
 */
Route::get('/detail/{id}','DetailController@detail');

/**
 * レビュー取得ルーティング
 */
Route::get('/getReviews','ReviewController@getReviews');

/**
 * レビューされているか確認するためのルーティング
 */
Route::get('/reviewedJudge','ReviewController@reviewJudge');

Route::post('/reviewPost','ReviewController@reviewPost');


/**
 * 購入者かどうか判定するためのルーティング
 */
Route::get('/buyingJudge','DetailController@buyingJudge');

/**
 * カテゴリー検索
 */
Route::get('categorySearch','IdeaSearchController@categorySearch');

/**
 * 価格検索以上
 */
Route::get('priceSearch/higher','IdeaSearchController@priceSearchHigher');

/**
 * 価格検索以下
 */
Route::get('priceSearch/lower','IdeaSearchController@priceSearchLower');

/**
 * 価格検索中間
 */
Route::get('priceSearch/middle','IdeaSearchController@priceSearchMiddle');

Route::get('termSearch/before','IdeaSearchController@termSearchBefore');

/**
 * 期間検索（年別）
 */
Route::get('termSearch/year','IdeaSearchController@termSearchYear');

/**
 * 期間検索（月別）
 */
Route::get('termSearch/month','IdeaSearchController@termSearchMonth');

/**
 * 期間検索（日別）
 */
Route::get('termSearch/day','IdeaSearchController@termSearchDay');

/**
 * 期間検索（以前）
 */
Route::get('termSearch/before','IdeaSearchController@termSearchBefore');

/**
 * 期間検索（以降）
 */
Route::get('termSearch/after','IdeaSearchController@termSearchAfter');

/**
 * 期間検索（間）
 */
Route::get('termSearch/middle','IdeaSearchController@termSearchMiddle');

/**
 * アイデア削除ルーティング
 */
Route::delete('/ideaDelete','InspirationController@ideaDelete');


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
Route::post('/profileImgUpload',function(Request $request){


    $userId = $request->input('user_id');

    $file_name = request()->file->getClientOriginalName();

    request()->file->storeAs('public/images',$file_name);

    $user = App\User::find($userId);

    $user->update(['img' =>'/images/'.$file_name]);

    return $user;
});

/**
 * プロフィール詳細画面表示
 */
Route::get('/profileDetail','ProfileController@showProfileDetail');
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
 * メール送信機能のルーティング
 */
ROUTE::get('/mail','InspirationController@mail');

/**
 * Twitter機能のルーティング
 */
ROUTE::get('/twitter/share','InspirationController@share');


