<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


Route::get('/',[FontendController::class,'index'])->name('/');

Route::get('/product-details/{id}',[FontendController::class,'productDetails'])->name('details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

    Route::get('/add-product',[AdminController::class,'addProduct'])->name('add.product');
    Route::get('/manage-product',[AdminController::class,'manageProduct'])->name('manage.product');
    //new.product
    Route::post('/new.product',[ProductController::class,'newProduct'])->name('new.product');
    //product.delete
    Route::get('/product_delete/{id}',[ProductController::class,'productDelete'])->name('product.delete');
    //edit
    Route::post('/edit',[ProductController::class,'productEdit'])->name('edit');
    //update.product
    Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update.product');

    //status

    Route::get('/status/{id}',[ProductController::class,'status'])->name('status');

});
