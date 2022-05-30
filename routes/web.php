<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Sessions\LoginLogoutController;
use App\Http\Controllers\Sessions\RegisterController;
use Illuminate\Support\Facades\Route;

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
//
// Index
//
Route::get('/', [HomeController::class, 'index'])->name('home');
//
// Show all the drinks && single drink
//
Route::get('/boissons', [ProductController::class, 'index'])->name('drinks');
Route::get('/boissons/{product:slug}', [ProductController::class, 'showDrink'])->name('drink');
//
// Show all the snacks && single snacks
//
Route::get('/snacks', [ProductController::class, 'index'])->name('snacks');
Route::get('/snacks/{product:slug}', [ProductController::class, 'showSnack'])->name('snack');
//
// Show all the brands && single brands w/ it's related products
//
Route::get('/marques', [BrandController::class, 'index']);
Route::get('/marques/{brand:slug}', [BrandController::class, 'show']);
//
// Register
//
Route::middleware('guest')->group(function () {
    Route::get('/inscription', [RegisterController::class, 'create']);
    Route::post('/inscription', [RegisterController::class, 'store']);

    Route::get('/connexion', [LoginLogoutController::class, 'create'])->name('login');
    Route::post('/connexion', [LoginLogoutController::class, 'store']);
});
Route::middleware('auth')->group(function () {
    Route::post('/deconnexion', [LoginLogoutController::class, 'destroy']);
});

// ADMIN ONLY
Route::middleware('admin')->group(function () {
    Route::get('/admin/produits/ajouter', [ProductController::class, 'create']);
    Route::post('/admin/produits/ajouter', [ProductController::class, 'store']);
});
