<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FileController;

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

if (env('APP_ENV') == 'production') {
    \Illuminate\Support\Facades\URL::forceScheme('https');
}

Route::get('/auth/facebook', [SocialController::class, 'facebookRedirect'])->name('auth.facebook');

Route::get('/auth/facebook/callback', [SocialController::class, 'loginWithFacebook'])->name('auth.facebook.callback');

Route::get('/products', [ProductController::class, 'products_list'])->name('products.list');
Route::get('/product/detail/{id}', [ProductController::class, 'product_detail'])->name('product.detail');

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::redirect('/dashboard', '/', 301);
    Route::post('/file_upload', [FileController::class, 'upload'])->name('file_upload');
    Route::get('/storage/images/{file}', [FileController::class, 'return_file'])->name('file_serve');

    Route::middleware(['isseller'])->group(function () {
        Route::get('/', DashboardController::class)->name('seller.dashboard');

        Route::get('/seller/products/{date?}', [ProductController::class, 'list'])->name('seller.products.list');
        Route::get('/seller/product/detail/{id}/{date?}', [ProductController::class, 'detail'])->name('seller.product.detail');
        Route::get('/seller/product/add', [ProductController::class, 'add'])->name('seller.product.add');
        Route::post('/seller/product/save', [ProductController::class, 'save'])->name('seller.product.save');
        Route::post('/seller/product/delete', [ProductController::class, 'delete'])->name('seller.product.delete');
    });
    Route::post('/product/buy', [ProductController::class, 'product_buy'])->name('product.buy');
});
