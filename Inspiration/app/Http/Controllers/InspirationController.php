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
                $q->where('user_id', 1);
            }])->latest()->get();

        /**
         * ログイン中のユーザが投稿したアイデアデータ取得
         */
        $myIdea = Idea::where('user_id', 1)
            ->latest()->get();

        /**
         *ログイン中のユーザ投稿に対するレビュー
         */
        $review = Review::with(['ideas' => function ($q) {
            $q->where('user_id', 1);
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

    public function ideaDelete(Request $request){


        $ideaId = $request->input('ideaId');


        Idea::where('id',$ideaId)->delete();

        return response()->json([
            'success' => 'アイデアを削除しました'
        ]);
    }


    public function post(Request $request)
    {
        $idea = \App\Idea::create($request->all());

        return response()->json([
            'idea' => $idea
        ]);
    }

    /**
     * @param Request $request
     * アイデア投稿用
     */
    public function imgUpload(Request $request)
    {
        $file = request()->file;

        $file_name = $file->getClientOriginalName();

            $file->storeAs('public/',$file_name);

            $user = \App\User::find(1);



            $user->update(['img' =>'/storage/'.$file_name]);

//            return $user;


    }

    /**
     * @param Request $request
     * プロフィール画像投稿用
     */
    public function profileImg(Request $request)
    {
        $file = request()->file;

        $file_name = $file->getClientOriginalName();

        $file->storeAs('public/',$file_name);

        $user = \App\User::find(1);

        $user->update(['img' =>'/storage/'.$file_name]);

//            return $user;

    }

    public function categorySearch(Request $request)
    {
        $category_id = $request->input('categoryId');

        $categoryIdea = Idea::where('category_id',$category_id)
            ->latest()->get();

        return response()->json([
            'categoryIdea' =>$categoryIdea
        ]);
    }

    public function priceSearchHigher(Request $request)
    {

        $higherPrice = $request->input('higherPrice');

        $priceIdea = Idea::where('price', '>=', $higherPrice)->get();

        return response()->json([
            'a' =>$higherPrice,
            'higherIdea' =>$priceIdea
        ]);

    }
    public function priceSearchLower(Request $request)
    {
        $lowerPrice = $request->input('lowerPrice');

        $priceIdea = Idea::where('price', '<=' , $lowerPrice)->get();

        return response()->json([
            'a' =>$lowerPrice,
            'lowerIdea' =>$priceIdea
        ]);

    }

    public function priceSearchMiddle(Request $request)
    {
        $lowerPrice = $request->input('lowerPrice');
        $higherPrice = $request->input('higherPrice');

        $priceIdea = Idea::where('price', '>=', $higherPrice)
            ->where('price', '<=' , $lowerPrice)->get();

        return response()->json([
            'middleIdea' =>$priceIdea
        ]);

    }

    public function termSearchYear(Request $request)
    {
        {

            $yearTerm = new Carbon($request->input('year'));

            $yearIdea = Idea::whereYear('created_at', $yearTerm)
            ->get();

            return response()->json([
            'term' =>$yearTerm,
            'yearIdea' =>$yearIdea
            ]);


        }
    }

    public function termSearchMonth(Request $request)
    {
        {

            $monthTerm = new Carbon($request->input('month'));

            $monthIdea = Idea::whereMonth('created_at', $monthTerm)
                ->get();

            return response()->json([
                'term' =>$monthTerm,
                'monthIdea' =>$monthIdea
            ]);


        }
    }

    public function termSearchDay(Request $request)
    {
        {

            $dayTerm = new Carbon($request->input('day'));
            $trueDayTerm = $dayTerm->addDays(1);

            $dayIdea = Idea::whereDay('created_at','=', $trueDayTerm)
                ->get();

            return response()->json([
                'term' =>$dayTerm,
                'dayIdea' =>$dayIdea
            ]);


        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * 入力した日付以前に作られたデータ
     */
    public function termSearchBefore(Request $request)
    {
        {

            $beforeTerm = new Carbon($request->input('before'));
            $trueBeforeTerm = $beforeTerm->addDays(1);

            $beforeIdea = Idea::where('created_at', '<=', $trueBeforeTerm)->get();

            return response()->json([
                'a' => $beforeTerm,
                'beforeIdea' => $beforeIdea
            ]);
        }
    }

    public function termSearchAfter(Request $request)
    {
        {

            $afterTerm = new Carbon($request->input('after'));

            $afterIdea = Idea::where('created_at', '>=', $afterTerm)->get();

            return response()->json([
                'a' => $afterTerm,
                'afterIdea' => $afterIdea
            ]);




        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * 入力した日付以降に作られたデータ
     */
    public function termSearchMiddle(Request $request)
    {
        {

            $beforeTerm = new Carbon($request->input('before'));
            $afterTerm = new Carbon($request->input('after'));

            $trueBeforeTerm = $beforeTerm->addDays(1);

            $middleIdea = Idea::where('created_at', '<=', $trueBeforeTerm)
                ->where('created_at','>=',$afterTerm)->get();

            return response()->json([
                'middleIdea' => $middleIdea
            ]);


        }
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
