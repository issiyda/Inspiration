<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input;

class ReviewController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * アイデアに対する全レビューの取得
     */
    public function getReviews(Request $request)
    {
        $ideaId = $request->input('ideaId');

        $review = Review::join('users','user_id','users.id')
            ->where('idea_id',$ideaId)
            ->get();

        return response()->json([
            'reviews' => $review
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * ログイン中のユーザが投稿に対してレビューしているかどうかの判断
     */
    public function reviewJudge(Request $request)
    {

        $userId = $request->input('userId');
        $ideaId = $request->input('ideaId');

        $review = Review::where('user_id',$userId)
            ->where('idea_id',$ideaId)
            ->first();

        if( (string)$review->user_id === $userId && (string)$review->idea_id === $ideaId )
        {
            return response()->json([
                'judge' => true
            ]);        }
        else
        {
            return response()->json([
                'judge' => false
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * レビュー投稿
     */
    public function reviewPost(Request $request)
    {
        $reviewerId = $request->input('userId');
        $ideaId = $request->input('ideaId');
        $ideaUserId = $request->input('ideaUserId');
        $star = $request->input('star');
        $comment = $request->input('comment');
        //レビュー者（ログイン中のユーザ）とアイデア投稿者のデータ取得
        $ideaInfo = Idea::where('id', $ideaId)->get();
        $ideaUserInfo = User::where('id',$ideaUserId)->get();
        $reviewerInfo = User::where('id',$reviewerId)->get();




        //レビューされた際にアイデア提供者にメール送信
        Mail::send('emails.toIdeaUserReviewedMail',[

                'ideaUserInfo' => $ideaUserInfo,
                'reviewerInfo' => $reviewerInfo,
                'ideaInfo'     => $ideaInfo,
                'star'         => $star,
                'comment'      => $comment


            ], function($message) use($ideaUserInfo){
            $message->to($ideaUserInfo[0]->email, $ideaUserInfo[0]->name.'さん')->subject('新規レビューを頂きました！！');
        });

        //アイデアの平均点数計算ロジック
        $reviewCount = Review::where('idea_id',$ideaId)->count() + 1;
        $sumStars = Review::where('idea_id',$ideaId)->sum('star') + $star;


        $averageReview = $sumStars / $reviewCount ;
        $averageReview = round($averageReview,1);


        $average = Idea::where('id',$ideaId)->first();
        $average->averageReview = $averageReview;
        $average->review_counts = $reviewCount;
        $average->save();


        //レビュー作成
        Review::create([
            'user_id' => $reviewerId,
            'idea_id' => $ideaId,
            'comment' => $comment,
            'star' => $star
        ]);


        return response()->json([
            'data' =>$request,
            'review' => $averageReview,
            'success' => 'review created successfully!'
        ],200);

    }
}
