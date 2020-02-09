<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactController extends Controller
{
    //

    public function contactPost(Request $request)
    {

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
}
