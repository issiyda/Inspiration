<?php

namespace App\Http\Controllers;

use App\BuyingHistory;
use App\Idea;
use Illuminate\Http\Request;
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

            //アイデアの購入済みに変更処理

            $postId = $request->input('postId');
            $userId =  $request->input('userId');

            $idea = Idea::where('id',$postId);
            $idea->update(['bought_flag' => 1]);

            //購入データ作成
            BuyingHistory::create([
                'post_id' => $postId,
                'user_id' => $userId,
                'price' => $amount
            ]);

            return view('layouts.index');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }


        }


}
