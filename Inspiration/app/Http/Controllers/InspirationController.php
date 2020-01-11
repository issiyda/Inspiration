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

    public function myself()
    {


        /**
         * ログイン中のユーザが購入したアイデアデータ取得
         */
        $buyingIdea = \App\Idea::where('bought_flag')->get();
        /**
         * ログイン中のユーザが投稿したアイデアデータ取得
         */
        $myIdea = Idea::where('user_id',2)->get();
        /**
         * ログイン中のユーザがお気に入りにしたアイデアデータ取得
         */
        $favIdea = Favorite::where('user_id',2)
            ->where('fav_flag',1)->get();
        /**
         *ログイン中のユーザ投稿に対するレビュー
         */
        $review = Review::with(['ideas' => function($q){
            $q->where('user_id',2);
        }])->get();


        return response()->json([
            'buyingIdea' =>$buyingIdea,
            'myIdea' =>$myIdea,
            'favIdea' =>$favIdea ,
            'review' =>$review
        ],200);
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

}
