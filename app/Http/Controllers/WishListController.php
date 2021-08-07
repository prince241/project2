<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;


class WishListController extends Controller
{
    public function index()
    {
        $products = Auth::user()->wishlistProducts;
        return view('users.wishlist.index', ['products' => $products]);
    }
    public function store(Request $request)
    {
        // dd($request->product_id);
       $user = Auth::user();
       $user->Wishlists()->firstOrCreate(['product_id' => $request->product_id]);
       return true;
    }
    public function delete(Request $request)
    {
        //  dd($request->product_id);
       $user = Auth::user();
       $wishlist = Wishlist::where('user_id', $user->id)
       ->where('product_id', $request->product_id)->first();
       $wishlist->delete();
// dd($sql);
    //    $user->wishlists()->dissociate(['product_id' => $request->product_id]);
       return true;
       return view('users.wishlist.index');
    }
    public function addToCart(Request $request)
    {
        //  dd($request->product_id);
       $user = Auth::user();
       $wishlist = Wishlist::firstOrCreate(['user_id' => $user->id],['product_id' => $request->product_id])
       ->where('product_id', $request->product_id)->first();
       $wishlist->is_in_cart=true;
       $wishlist->save();
// dd($sql);
    //    $user->wishlists()->dissociate(['product_id' => $request->product_id]);
       return true;
       return view('users.wishlist.index');
    }
}

// public function destroy($id) {

//     $blog = Blog::find($id);

//     $blog->delete();

//     return redirect('/nieuws');

// }