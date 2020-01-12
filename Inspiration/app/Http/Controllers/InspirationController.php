<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Idea;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class InspirationController extends Controller
{
    //

    public function mypage()
    {
        return view('layouts.index');
    }

    public function detail($id)
    {
        $idea = Idea::where('id', $id)->get();

        return response()->json([
            'idea' => $idea
        ], 200);

    }

    public function myself()
    {

        $allIdea = Idea::get();


        /**
         * ログイン中のユーザが購入したアイデアデータ取得
         */
        $buyingIdea = \App\Idea::where('bought_flag')
            ->latest()->get();

        /**
         * ログイン中のユーザがお気に入りにしたアイデアデータ取得
         */
        $favIdea = Favorite::where('fav_flag', 1)
            ->with(['ideas' => function ($q) {
                $q->where('user_id', 2);
            }])->latest()->get();

        /**
         * ログイン中のユーザが投稿したアイデアデータ取得
         */
        $myIdea = Idea::where('user_id', 2)
            ->latest()->get();

        /**
         *ログイン中のユーザ投稿に対するレビュー
         */
        $review = Review::with(['ideas' => function ($q) {
            $q->where('user_id', 2);
        }])->latest()->get();


        return response()->json([
            'allIdea' => $allIdea,
            'buyingIdea' => $buyingIdea,
            'myIdea' => $myIdea,
            'favIdea' => $favIdea,
            'review' => $review
        ], 200);
    }

    public function confirm()
    {

    }


    public function post(Request $request)
    {
        $idea = \App\Idea::create($request->all());

        return response()->json([
            'idea' => $idea
        ]);
    }

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
//        データが有れば更新する


    }


}
