<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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

Route::get('/auth/facebook', [SocialController::class, 'facebookRedirect'])->name('auth.facebook');

Route::get('/auth/facebook/callback', [SocialController::class, 'loginWithFacebook'])->name('auth.facebook.callback');

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::redirect('/dashboard', '/', 301);

    Route::get('/products', [ProductController::class, 'list'])->name('product.list');
});
