<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactController extends Controller
{
    //

    public function contactPost(Request $request)
    {

        $request->validate([
            'userName' => 'required',
            'userEmail' => 'required|email',
            'subject' => 'required|max:30',
            'contents' => 'required|max:500'
        ],
            [
                'userName' => 'お名前',
            ]);


        $subject = $request->input('subject');
        $contents = $request->input('contents');
        $userEmail = $request->input('userEmail');
        $userName = $request->input('userName');



        Mail::send('emails.contactMail', [

            'userName' => $userName,
            'subject' => $subject,
            'contents' => $contents

        ], function ($message) use ($userEmail, $userName, $subject) {
            $message->to($userEmail, $userName . 'さん')->subject('新規お問い合わせ:'.$subject);

        });

        return response()->json([
            'success' => 'contact created successfully!'
        ]);

    }

    public function contactHome(Request $request)
    {

        $request->validate([
            'userName' => 'required',
            'userEmail' => 'required|email',
            'subject' => 'required|max:30',
            'contents' => 'required|max:500'
        ],
            [
                'userName' => 'お名前',
            ]);


        $subject = $request->input('subject');
        $contents = $request->input('contents');
        $userEmail = $request->input('userEmail');
        $userName = $request->input('userName');



        Mail::send('emails.contactMail', [

            'userName' => $userName,
            'subject' => $subject,
            'contents' => $contents

        ], function ($message) use ($userEmail, $userName, $subject) {
            $message->to($userEmail, $userName . 'さん')->subject('新規お問い合わせ:'.$subject);

        });

        return redirect('/contact')->with('flash_message', 'お問い合わせが完了しました');

    }
}
