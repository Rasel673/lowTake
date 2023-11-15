<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Backend\{
    AdminController,
    CategoryController,
    SliderController,
    ProductController,
    SaleController,
    CouponController

};




/*------------------------------------------
--------------------------------------------
 Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:1'])->group(function () {

Route::group(['prefix'=>'admin'],function(){


    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');



    //  category route==================
   
    Route::get('categories', [CategoryController::class, 'allCategories'])->name('allCategories');
    Route::any('category/create', [CategoryController::class, 'createCategory'])->name('createCategory');
    Route::any('category/edit/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
    Route::get('category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/category/search/',[CategoryController::class,'search'])->name('category.search');


    //  product  route==================
    Route::get('products', [ProductController::class, 'allProducts'])->name('allProducts');
    Route::any('product/create', [ProductController::class, 'createProduct'])->name('createProduct');
    Route::any('product/edit/{id}', [ProductController::class, 'editProduct'])->name('editProduct');
    Route::any('product/view/{id}', [ProductController::class, 'viewProduct'])->name('viewProduct');
    Route::get('product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('/product/search/',[ProductController::class,'search'])->name('Product.search');




    // slider---------------------
    Route::get('/sliders',[SliderController::class,'allSliders'])->name('allSliders');
    Route::get('/sliders/create',[SliderController::class,'createSlider'])->name('createSlider');
    Route::post('/sliders/store',[SliderController::class,'store'])->name('storeSlider');
    Route::get('/sliders/edit/{id}',[SliderController::class,'edit'])->name('editSlider');
    Route::put('/sliders/update/{id}',[SliderController::class,'update'])->name('updateSlider');
    Route::get('/sliders/delete/{id}',[SliderController::class,'delete'])->name('deleteSlider');



    //sale orders route===================================
    Route::get('sales', [SaleController::class, 'allSales'])->name('allSales');
    Route::get('sales/search/', [SaleController::class, 'search'])->name('Sale.search');
    Route::get('sales/order_details/{id}',[SaleController::class,'orderDetails'])->name('orderDetails');
    Route::get('sales/order_Invoice/{id}',[SaleController::class,'orderInvoice'])->name('orderInvoice');
    
    //change status-------------
    Route::get('change_status/{type}/{id}', [SaleController::class, 'chang_status'])->name('chang_status');
  
  
    // cupon setup-----------
    Route::get('coupons',[CouponController::class,'allCoupons'])->name('admin.coupons');
    Route::any('coupon/add',[CouponController::class,'storeCoupon'])->name('admin.storeCoupon');
    Route::any('coupon/edit/{coupon_id}',[CouponController::class,'updateCoupon'])->name('admin.updateCoupon');
    Route::get('coupon/delete/{id}', [CouponController::class, 'deleteCuopon'])->name('deleteCuopon');  



    // website setup route-------=============================---------
    Route::any('/website_settings',[AdminController::class,'website_setup'])->name('website_setup');

    //pages settings route-----------------------
    Route::any('/page_setting', [AdminController::class, 'page_settings'])->name('page_settings');




});

});
    


