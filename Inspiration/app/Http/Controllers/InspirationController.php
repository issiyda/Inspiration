<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspirationController extends Controller
{
    //

    public function mypage()
    {
        return view('layouts.index');
    }

    public function post()
    {
        return view('post');
    }
}
