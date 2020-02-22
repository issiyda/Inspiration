<?php

namespace App\Http\Controllers;

use App\BuyingHistory;
use App\Idea;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class StripeController extends Controller
{
    //

    public function charge(Request $request)
    {

        try{

            $amount = $request->input('price');

            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $amount,
                'currency' => 'jpy'
            ));

            $postId = $request->input('postId');
            //購入者のId
            $userId =  $request->input('userId');
            //投稿者のデータ取得
            $ideaUserInfo = User::where('id',Idea::where('id',$postId)->get()[0]->user_id)->get();
            $ideaInfo = Idea::where('id', $postId)->get();
            $buyingUserInfo = User::where('id',$userId)->get();

            //メール（アイデア投稿者側）
            Mail::send('emails.toIdeaUserMail',[

                'ideaUserInfo' => $ideaUserInfo,
                'buyingUserInfo' => $buyingUserInfo,
                'ideaInfo'     => $ideaInfo,

            ], function($message) use($ideaUserInfo){
                $message->to($ideaUserInfo[0]->email, $ideaUserInfo[0]->name.'さん')->subject('アイデアが購入されました！');
            });

            //メール(アイデア購入側)
            Mail::send('emails.toIdeaBuyingUserMail',[

                'ideaUserInfo' => $ideaUserInfo,
                'buyingUserInfo' => $buyingUserInfo,
                'ideaInfo'     => $ideaInfo,

            ], function($message) use($buyingUserInfo){
                $message->to($buyingUserInfo[0]->email, $buyingUserInfo[0]->name.'さん')->subject('アイデアを購入しました！');
            });

            //アイデアを購入済みに変更処理
            $idea = Idea::where('id',$postId);
            $idea->update(['bought_flag' => 1]);



            //購入データ作成
            BuyingHistory::create([
                'post_id' => $postId,
                'user_id' => $userId,
                'price' => $amount
            ]);

            return redirect('/mypage')->with('flash_message', '投稿が完了しました');


            return view('layouts.index');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }


        }


}
