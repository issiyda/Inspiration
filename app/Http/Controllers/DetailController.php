<?php

namespace App\Http\Controllers;

use App\BuyingHistory;
use App\Idea;
use Illuminate\Http\Request;

class DetailController extends Controller
{


    public function detail($id)
    {
        $idea = Idea::where('id', $id)->get();

        return response()->json([
            'idea' => $idea
        ], 200);

    }

    public function buyingJudge(Request $request)
    {
        $userId = $request->input('userId');
        $postId = $request->input('postId');

        $judgeData = BuyingHistory::where('user_id',$userId)
            ->where('post_id',$postId)->first();


        //データがない場合はエラーが出てfalseが返却される
        if( (string)$judgeData->user_id === $userId && (string)$judgeData->post_id === $postId )
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
}
