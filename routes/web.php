<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    HomeController,
    CartController,
    OrderController,
    ProductController,
};




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, 'index'] );





// search product--------------
Route::post('/products/search', [HomeController::class,'search_product'])->name('home.products.search');


// cart controller----------
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');



  // order check out route--------------
Route::any('checkout', [OrderController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('/order/confirm/{id}',[OrderController::class, 'confirm_order'] )->name('confirm_order');

// cupon apply---------------
Route::post('/cupon_apply',[OrderController::class, 'cupponApply'])->name('cupponApply');




Route::get('/clear', function()
{
  
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return "cleared";
});













// auth routes----------------
Auth::routes();

  /*------------------------------------------
--------------------------------------------
All Normal Authenicated Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:0'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
  
});
  
  