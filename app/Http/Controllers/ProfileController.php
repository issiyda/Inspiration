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

    /**
     * @param Request $request
     * @return mixed
     * Profile画像追加・変更
     */
    public function profileImgUpload(Request $request)
    {
        $userId = $request->input('user_id');

        $file_name = request()->file->getClientOriginalName();

        request()->file->storeAs('public/images',$file_name);

        $user = User::find($userId);

        $user->update(['img' =>'/images/'.$file_name]);

        return $user;
    }

public function profileSetting(Request $request)
{
    $userId = $request->id;

    $user = \App\User::find($userId);

    $user->fill($request->all())->update();

    return response()->json([
        'success' => 'user updated successfully!'
    ],200);

}




}
