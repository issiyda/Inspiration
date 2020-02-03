<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Idea;
use App\Review;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InspirationController extends Controller
{
    //

    public function checkPass(Request $request)
    {
        $userId = $request->input('user_id');
        $inputPass = $request->input('inputPass');
        $userPass = User::find($userId)->select('password')->first();

        if ((Hash::check($inputPass, $userPass['password']))) {
            return response()->json([
            ]);
        } elseif (!(Hash::check($inputPass, $userPass))) {
            return response()->json([
                'message' => '現在のパスと一致しません',
            ]);


        }
    }

    public function updatePass(Request $request)
    {
        $userId = $request->input('user_id');
        $newPass = $request->input('newPass');

        User::find($userId)->update(['password' => Hash::make($newPass)]);

        return response()->json([
            'success' => 'パスワードを変更しました',
        ]);
    }

    public function withdraw($id)
    {
        User::find($id)->delete();
    }


    public function mypage()
    {
        return view('layouts.index');
    }



    public function myself(Request $request)
    {

        $userId = $request->Input('userId');

        $allIdea = Idea::get();


        /**
         * ログイン中のユーザが購入したアイデアデータ取得
         */
        $buyingIdea = \App\Idea::where('bought_flag')
            ->latest()->get();

        /**
         * ログイン中のユーザがお気に入りにしたアイデアデータ取得
         */
        $favIdea = Idea::wherehas('favorites' ,function($q){
            $q->where('fav_flag',1);
        })->latest()->get();

        /**
         * ログイン中のユーザが投稿したアイデアデータ取得
         */
        $myIdea = Idea::where('user_id',$userId)
            ->latest()->get();

        /**
         *ログイン中のユーザ投稿に対するレビュー
         */
        $review = Review::where('user_id',$userId)
            ->latest()->get();


        return response()->json([
            'allIdea' => $allIdea,
            'buyingIdea' => $buyingIdea,
            'myIdea' => $myIdea,
            'favIdea' => $favIdea,
            'review' => $review,
            'userId' =>$userId
        ], 200);
    }

    public function confirm()
    {

    }

    /**
     * 投稿削除
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ideaDelete(Request $request){


        $ideaId = $request->input('ideaId');


        Idea::where('id',$ideaId)->delete();

        return response()->json([
            'success' => 'アイデアを削除しました'
        ]);
    }


//    /**
//     *
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function post(Request $request)
//    {
//        $idea = \App\Idea::create($request->all());
//
//        return response()->json([
//            'idea' => $idea
//        ]);
//    }

    /**
     * @param Request $request
     *
     * プロフィール画像変更
     */
    public function imgUpload(Request $request)
    {
        $file = request()->file;

        $file_name = $file->getClientOriginalName();

            $file->storeAs('public/images',$file_name);

            $user = \App\User::find(1);

            $user->update(['img' =>'/images/'.$file_name]);
    }

    /**
     * @param Request $request
     *
     * プロフィール画像投稿用
     */
    public function profileImg(Request $request)
    {
        $file = request()->file;

        $file_name = $file->getClientOriginalName();

        $file->storeAs('public/',$file_name);

        $user = \App\User::find(1);

        $user->update(['img' =>'/images/'.$file_name]);

//            return $user;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * お気に入り情報取得
     */
    public function favState(Request $request)
    {
        $userId = $request->input('userId');
        $ideaId = $request->input('ideaId');

        $favState = Favorite::where('user_id', $userId)
            ->where('idea_id', $ideaId)->value('fav_flag');

        return response()->json([
            'favState' =>$favState,
//            'success' => 'getting favState successfully!'
        ],200);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * お気に入りの切り替え
     */
    public function favSwitch(Request $request)
    {

        $userId = $request->input('userId');
        $ideaId = $request->input('ideaId');

        $favState = Favorite::where('user_id', $userId)
            ->where('idea_id', $ideaId)->value('fav_flag');

//        データがなければ作る
        if ($favState === null) {

            Favorite::create(['user_id' => $userId,
                    'idea_id' => $ideaId,
                    'fav_flag' => 1]);

            return response()->json([
                'data' =>$favState,
                    'success' => 'user created successfully!'
            ],200);
            }

        //データが有れば切り替える
        else {
            if($favState === 0){
                $favState = Favorite::where('user_id', $userId)
                    ->where('idea_id', $ideaId)->first();

                $favState->fav_flag = 1;
                $favState->save();

                return response()->json([
                    'data' =>$favState,
                    'success' => 'user adding fav successfully!'
                ],200);

            }elseif($favState === 1){
                $favState = Favorite::where('user_id', $userId)
                    ->where('idea_id', $ideaId)->first();

                $favState->fav_flag = 0;
                $favState->save();

                return response()->json([
                    'data' =>$favState,
                    'success' => 'user removed fav successfully!'
                ],200);


            }

            return response()->json([
                'data' =>$favState,

                'success' => 'user updated successfully!'
            ],200);
        }


    }


}
