<?php

use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSubcategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
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
Route::get('/recherche', [HomeController::class, 'search']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'send']);
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
// Show all the subcategories && single subcategory w/ it's related products
//
Route::get('/categories/{subcategory:slug}', [\App\Http\Controllers\SubcategoryController::class, 'show']);
//
//
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
    // Dashboard
    Route::get('/admin', [AdminHomeController::class, 'index']);
    // PRODUCTS
    // Index
    Route::get('/admin/produits/', [AdminProductController::class, 'index']);
    // Add & Store Product
    Route::get('/admin/produits/ajouter', [AdminProductController::class, 'create']);
    Route::post('/admin/produits/ajouter', [AdminProductController::class, 'store']);
    // Edit Product
    Route::get('/admin/produits/{product}/modifier', [AdminProductController::class, 'edit']);
    Route::patch('/admin/produits/{product}', [AdminProductController::class, 'update']);
    //
    // SUBCATEGORIES
    // Subcatgories List Admin
    Route::get('/admin/sous-categories/', [AdminSubcategoryController::class, 'index']);
    // Add & Store Brand
    Route::get('/admin/sous-categories/ajouter', [AdminSubcategoryController::class, 'create']);
    Route::post('/admin/sous-categories/ajouter', [AdminSubcategoryController::class, 'store']);
    // Edit Sous-categories
    Route::get('/admin/sous-categories/{subcategory}/modifier', [AdminSubcategoryController::class, 'edit']);
    Route::patch('/admin/sous-categories/{subcategory}', [AdminSubcategoryController::class, 'update']);
    // BRANDS
    // Brands Index
    Route::get('/admin/marques/', [AdminBrandController::class, 'index']);
    // Add & Store Brand
    Route::get('/admin/marques/ajouter', [AdminBrandController::class, 'create']);
    Route::post('/admin/marques/ajouter', [AdminBrandController::class, 'store']);
    // Edit Brand
    Route::get('/admin/marques/{brand}/modifier', [AdminBrandController::class, 'edit']);
    Route::patch('/admin/marques/{brand}', [AdminBrandController::class, 'update']);

});
