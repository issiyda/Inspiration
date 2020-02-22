<?php

namespace App\Http\Controllers;

use App\Idea;
use Carbon\Carbon;
use Illuminate\Http\Request;

class   IdeaSearchController extends Controller
{
    //

    public function categorySearch(Request $request)
    {
        $category_id = $request->input('categoryId');

        $categoryIdea = Idea::where('category_id',$category_id)
            ->latest()->get();


        return response()->json([
            'categoryIdea' =>$categoryIdea
        ]);
    }

    public function priceSearchHigher(Request $request)
    {

        $higherPrice = $request->input('higherPrice');

        $priceIdea = Idea::where('price', '>=', $higherPrice)->get();

        return response()->json([
            'higherIdea' =>$priceIdea
        ]);

    }
    public function priceSearchLower(Request $request)
    {
        $lowerPrice = $request->input('lowerPrice');

        $priceIdea = Idea::where('price', '<=' , $lowerPrice)->get();

        return response()->json([
            'lowerIdea' =>$priceIdea
        ]);

    }

    public function priceSearchMiddle(Request $request)
    {
        $lowerPrice = $request->input('lowerPrice');
        $higherPrice = $request->input('higherPrice');

        $priceIdea = Idea::where('price', '>=', $higherPrice)
            ->where('price', '<=' , $lowerPrice)->get();

        return response()->json([
            'middleIdea' =>$priceIdea
        ]);

    }

    public function termSearchYear(Request $request)
    {
        {

            $yearTerm = new Carbon($request->input('year'));

            $yearIdea = Idea::whereYear('created_at', $yearTerm)
                ->get();

            return response()->json([
                'yearIdea' =>$yearIdea
            ]);


        }
    }

    public function termSearchMonth(Request $request)
    {
        {

            $monthTerm = new Carbon($request->input('month'));

            $monthIdea = Idea::whereMonth('created_at', $monthTerm)
                ->get();

            return response()->json([
                'monthIdea' =>$monthIdea
            ]);


        }
    }

    public function termSearchDay(Request $request)
    {
        {

            $dayTerm = new Carbon($request->input('day'));
            $trueDayTerm = $dayTerm->addDays(1);

            $dayIdea = Idea::whereDay('created_at','=', $trueDayTerm)
                ->get();

            return response()->json([
                'dayIdea' =>$dayIdea
            ]);


        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * 入力した日付以前に作られたデータ
     */
    public function termSearchBefore(Request $request)
    {
        {

            $beforeTerm = new Carbon($request->input('before'));
            $trueBeforeTerm = $beforeTerm->addDays(1);

            $beforeIdea = Idea::where('created_at', '<=', $trueBeforeTerm)->get();

            return response()->json([
                'beforeIdea' => $beforeIdea
            ]);
        }
    }

    public function termSearchAfter(Request $request)
    {
        {

            $afterTerm = new Carbon($request->input('after'));
            $trueAfterTerm = $afterTerm->addDays(1);

            $afterIdea = Idea::where('created_at', '>=', $trueAfterTerm)->get();

            return response()->json([
                'afterIdea' => $afterIdea
            ]);


        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * 入力した日付以降に作られたデータ
     */
    public function termSearchMiddle(Request $request)
    {
        {

            $beforeTerm = new Carbon($request->input('before'));
            $afterTerm = new Carbon($request->input('after'));

            $trueBeforeTerm = $beforeTerm->addDays(1);
            $trueAfterTerm = $afterTerm->addDays(1);

            $middleIdea = Idea::where('created_at', '<=', $trueBeforeTerm)
                ->where('created_at','>=',$trueAfterTerm)->get();

            return response()->json([
                'middleIdea' => $middleIdea
            ]);


        }
    }







}
