<?php

namespace App\Http\Controllers;

use App\Idea;
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

        $idea = Idea::get();

        return response()->json([
            'idea' =>$idea
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
