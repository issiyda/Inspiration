<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Profile詳細情報取得
     */
    public function showProfileDetail(Request $request)
    {

        $userId = $request->input('userId');
        $user = User::find($userId);

        return response()->json([
            'profile' => $user
    ]);

    }

}
