<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebViewController extends Controller
{
    public function product()
    {
        $products = Product::latest()-> paginate(5);
        return view('users.products', ['products' => $products]);
    }

}
