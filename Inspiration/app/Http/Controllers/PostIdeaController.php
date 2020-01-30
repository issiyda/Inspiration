<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;

class PostIdeaController extends Controller
{
    //

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * 新規アイデア保存ロジック
     */
    public function saveIdea(Request $request)
    {

        $user_id = $request->input('user_id');
        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $overflow = $request->input('overflow');
        $content = $request->input('content');
        $price = $request->input('price');

        //画像pathの保存
        $file_name = $request->file->getClientOriginalName();
        request()->file->storeAs('public/ideaImages',$file_name);


        //アイデア作成保存
        Idea::create(

            [   'user_id' => $user_id,
                'category_id' => $category_id,
                'img' => '/ideaImages/'.$file_name,
                'title' => $title,
                'overflow' =>$overflow,
                'content' => $content,
                'price' => $price
            ]);


        return response()->json([
            'data' => $request->all()
        ]);
    }

    public function editIdea(Request $request)
    {
        $idea_id = $request->input('idea_id');
        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $overflow = $request->input('overflow');
        $content = $request->input('content');
        $price = $request->input('price');


        //画像pathの保存
        if ($request->file) {
            $file_name = $request->file->getClientOriginalName();
            request()->file->storeAs('public/ideaImages', $file_name);


            //アイデア作成保存
            Idea::find($idea_id)->update(
                [
                    'category_id' => $category_id,
                    'img' => '/ideaImages/' . $file_name,
                    'title' => $title,
                    'overflow' => $overflow,
                    'content' => $content,
                    'price' => $price
                ]);

        }else
        {
            Idea::find($idea_id)->update(
                [
                    'category_id' => $category_id,
                    'title' => $title,
                    'overflow' => $overflow,
                    'content' => $content,
                    'price' => $price
                ]);
        }

        return response()->json([
            'data' => $request->all()
        ]);
    }

    public function saveIdeaImages(Request $request)
    {
        $file_name = $request->file->getClientOriginalName();
        request()->file->storeAs('public/ideaImages',$file_name);

    }

}
