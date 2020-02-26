<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //


    public function showProfileDetail(Request $request)
    {

        $userId = $request->input('userId');
        $user = User::find($userId);

        return response()->json([
            'profile' => $user
    ]);

    }

}
