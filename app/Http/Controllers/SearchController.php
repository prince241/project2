<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function productSearch(Request $request)
    {
        $name = @$request->q;
        $min = @$request->min;
        $max = @$request->max;
        $sortByPrice = @$request->sortByPrice;
        $range = [
            'min' => (int)($request->min ?? 0),
            'max' => (int)($request->max ?? 1000000),
        ];

        // dump($name);
        // dump($min);
        // dd($max);
        $products = Product::when(!is_null($name), function ($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        })
            ->when(!is_null($min), function ($query) use ($min) {
                $query->where('price', '>=', (int)$min);
            })
            ->when(!is_null($max), function ($query) use ($max) {
                $query->where('price', '<=', (int)$max);
            })
            // ->whereBetween('price', $range)
            ->when(!is_null($sortByPrice), function ($query) use ($sortByPrice) {
                $query->orderBy(DB::raw('price * 1 '), $sortByPrice);
            })
            ->get(); 
        if (!$products->count()) {
            return response()->json(['success' => false, 'message' => 'no result found']);
        }
        $renderData = view('users.product_list', compact('products'))->render();
        return response()->json(['success' => true, 'data' => $renderData]);
    }

    public function lowestOrder(Request $request)
    {
        $price = @$request->price;
        $products = Product::when(!is_null($price), function ($query) use ($price) {
            $products = Product::orderBy('price', 'ASC')->get();
        })->latest()->get();

        if (!$products->count()) {
            return response()->json(['success' => false, 'message' => 'no result found']);
        }
        $renderData = view('product_price', compact('products'))->render();
        return response()->json(['success' => true, 'data' => $renderData]);
    }
}
// public function filterPrice($min, $max)
// {
//     $query = DB::table('products')
//                 ->whereBetween('price', 
//                  [use($min), use($max)])
//                 ->get();

//      return view('public.products.list')->withTours($filter);
// }
