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

    //アイデアに対する全レビューの取得

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

    //ログイン中のユーザが投稿に対してレビューしているかどうかの判断
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




        Mail::send('emails.toIdeaUserReviewedMail',[

                'ideaUserInfo' => $ideaUserInfo,
                'reviewerInfo' => $reviewerInfo,
                'ideaInfo'     => $ideaInfo,
                'star'         => $star,
                'comment'      => $comment


            ], function($message) use($ideaUserInfo){
            $message->to($ideaUserInfo[0]->email, $ideaUserInfo[0]->name.'さん')->subject('新規レビューを頂きました！！');
        });


        Review::create([
            'user_id' => $reviewerId,
            'idea_id' => $ideaId,
            'comment' => $comment,
            'star' => $star
        ]);

        return response()->json([
            'data' =>$request,
            'success' => 'review created successfully!'
        ],200);


    }
}
