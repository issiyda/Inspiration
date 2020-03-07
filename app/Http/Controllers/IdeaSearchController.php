<?php

namespace App\Http\Controllers;

use App\Idea;
use Carbon\Carbon;
use Illuminate\Http\Request;

class   IdeaSearchController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *カテゴリ検索
     */
    public function categorySearch(Request $request)
    {
        $category_id = $request->input('categoryId');

        $categoryIdea = Idea::where('category_id', $category_id)
            ->latest()->get();


        return response()->json([
            'categoryIdea' => $categoryIdea
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 入力値より高い価格検索
     */
    public function priceSearchHigher(Request $request)
    {

        $higherPrice = $request->input('higherPrice');

        $priceIdea = Idea::where('price', '>=', $higherPrice)
            ->latest()->get();

        return response()->json([
            'higherIdea' => $priceIdea
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 入力値以下の価格検索
     */
    public function priceSearchLower(Request $request)
    {
        $lowerPrice = $request->input('lowerPrice');

        $priceIdea = Idea::where('price', '<=', $lowerPrice)
            ->latest()->get();

        return response()->json([
            'lowerIdea' => $priceIdea
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 中間の価格検索
     */
    public function priceSearchMiddle(Request $request)
    {
        $lowerPrice = $request->input('lowerPrice');
        $higherPrice = $request->input('higherPrice');

        $priceIdea = Idea::where('price', '>=', $higherPrice)
            ->where('price', '<=', $lowerPrice)
            ->latest()->get();

        return response()->json([
            'middleIdea' => $priceIdea
        ]);
    }

    public function termSearchYear(Request $request)
    {
        {

            $yearTerm = new Carbon($request->input('year'));

            $yearIdea = Idea::whereYear('created_at', $yearTerm)
                ->latest()->get();

            return response()->json([
                'yearIdea' => $yearIdea
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * 期間の検索
     */
    public function termSearchMonth(Request $request)
    {
        {

            $monthTerm = new Carbon($request->input('month'));

            $monthIdea = Idea::whereYear('created_at', $monthTerm)
                ->whereMonth('created_at', $monthTerm)
                ->latest()->get();

            return response()->json([
                'monthIdea' => $monthIdea
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * 日付検索
     */
    public function termSearchDay(Request $request)
    {
        {

            $dayTerm = new Carbon($request->input('day'));
            $trueDayTerm = $dayTerm->addHours(9);

            $dayIdea = Idea::whereDate('created_at', '=', $trueDayTerm)
                ->latest()->get();

            return response()->json([
                'dayIdea' => $dayIdea
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * 入力日付以降に作られたアイデア検索
     */
    public function termSearchAfter(Request $request)
    {
        {

            $afterTerm = new Carbon($request->input('after'));
            $trueAfterTerm = $afterTerm->addHours(9);

            $afterIdea = Idea::where('created_at', '>=', $trueAfterTerm)
                ->latest()->get();

            return response()->json([
                'afterIdea' => $afterIdea
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
            $trueBeforeTerm = $beforeTerm->addHours(32)->addMinutes(59)->addSeconds(59);

            $beforeIdea = Idea::where('created_at', '<=', $trueBeforeTerm)
                ->latest()->get();

            return response()->json([
                'beforeIdea' => $beforeIdea
            ]);
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * 入力した日付以降と以前の間に作られたアイデア検索
     */
    public function termSearchMiddle(Request $request)
    {
        {

            $beforeTerm = new Carbon($request->input('before'));
            $afterTerm = new Carbon($request->input('after'));

            $trueAfterTerm = $afterTerm->addHours(9);
            $trueBeforeTerm = $beforeTerm->addHours(32)->addMinutes(59)->addSeconds(59);

            $middleIdea = Idea::where('created_at', '<=', $trueBeforeTerm)
                ->where('created_at', '>=', $trueAfterTerm)
                ->latest()->get();

            return response()->json([
                'middleIdea' => $middleIdea
            ]);
        }
    }
}
