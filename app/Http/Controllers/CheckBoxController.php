<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\CheckBox;
use Illuminate\Support\Facades\Auth;

class CheckBoxController extends Controller
{

    public function check()
    {
        $products = User::with(['wishListProducts' => function ($query) {
            $query->where('is_in_cart', true);
        }])
        ->where('id', Auth::user()->id)
        ->first()
        ->wishListProducts;
        return view('users.checklist.checkout', ['products' => $products]);
    }
    public function delete(Request $request)
    {
        //  dd($request->product_id);
       $user = Auth::user();
       $wishlist = Wishlist::where('user_id', $user->id)
       ->where('product_id', $request->product_id)->first();
       $wishlist->is_in_cart = false;
       $wishlist->save();
       // dd($sql);
    //    $user->wishlists()->dissociate(['product_id' => $request->product_id]);
       return true;
       return view('users.wishlist.index');
    }


    public function store(Request $request)
    {
        // dd($request->product_id);
        $user = Auth::user();
        $user->checkout()->firstOrCreate(['product_id' => $request->product_id]);
        return true;
    }
}

