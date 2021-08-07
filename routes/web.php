<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdressController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebViewController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\CheckBoxController;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\Encoder\AddressEncoderInterface;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('guest')->group(function () {
//     Route::view('login', 'auth.login'); 
//     Route::view('register', 'auth.register');
// });
Route::get('login', function () {
    return view('auth.login');
})->middleware('guest');
Route::view('register', 'auth.register');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('home', function () {
    return redirect()->route('products.index');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
     Route::post('profile/update-password',[ProfileController::class, 'updatePassword'])->name('update.password');
});

Route::prefix('web')->group(function () {
    Route::get('products', [WebViewController::class, 'product'])->name('web.product');
});

Route::view('password/reset','password.reset')->name('password.reset');

Route::post('password/reset', [PasswordController::class, 'checker']);

Route::get('wishlists/index', [WishListController::class, 'index'])->name('wishlists.index');



//---------AJAX--------------//

Route::get('search/products', [SearchController::class, 'productSearch']);

Route::get('users/product_price', [SearchController::class, 'lowestOrder'])->name('product_price');

Route::get('wishlists/add', [WishListController::class, 'store']);

Route::get('wishlists/remove', [WishListController::class, 'delete'])->name('wishlists.remove');

Route::get('cart/add', [WishListController::class, 'addToCart']);

Route::get('checklist/checkout', [CheckBoxController::class, 'check'])->name('checklist.checkout');

Route::get('checklist/remove', [CheckBoxController::class, 'delete'])->name('checklist.remove');



//   Route::get('wishlist/add', [WishListController::class, 'addToWishlist']);a



Route::post('user/update', [AdressController::class, 'update'])->name('wishlist.update');