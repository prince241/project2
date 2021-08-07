<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
     
        
        $products = Product::latest()-> paginate(5);
           return view('admin.products.index', ['products' => $products]);
        // return view('users.products', ['products' => $products]);
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->role_id == 2) {
            abort(401);
        }
        return view('admin.products.create');
    }

    public function store(Request $request)
    {            
        $user = Auth::user();  
        if ($user->role_id == 2) {
            abort(401);
        } 
       
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|max:255',
            'size' => 'required|max:255',
            'image' => 'required|mimes:jpg,png.jpeg|max:5048'
        ]);

        $newImageName = time() . '.' .$request->image->extension();
         
      $request->image->move(public_path('images'), $newImageName);


        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->image= $newImageName;
        $product->save();

        return redirect()->back()->with('success', 'product added succefully');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }


    public function update()
    {
        return redirect()->back();
    }
}
 function getWhishlist() {
    $wishItems = Wishlist::where('user_id', '=', Auth::user()->id);
    return View('wishlist')->with('wishItems', $wishItems);
}
