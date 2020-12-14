<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
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

// Dashboard Overview Controller
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// Category Controller
Route::get('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
Route::resource('categories',CategoryController::class);

// Sub Category Controller 
Route::get('/subcategories/{id}/delete', [SubCategoryController::class, 'delete'])->name('subcategories.delete');
Route::resource('subcategories', SubCategoryController::class);

// Product Controller 
Route::get('/products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
  //Ajax Route 
Route::post('/get/sub/category', [ProductController::class, 'getSubCategory']);
Route::resource('products', ProductController::class);

// Faq Controller
Route::get('/faq/{id}/delete', [FaqController::class, 'delete'])->name('faqs.delete');
Route::resource('faqs', FaqController::class);


// Frontend Controller
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/all/{name}/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/l2h/{name}/products', [FrontendController::class, 'lowToHigh'])->name('frontend.lowToHigh');
Route::get('/h2l/{name}/products', [FrontendController::class, 'HighToLow'])->name('frontend.highToLow');
Route::get('/product/details/{slug}', [FrontendController::class, 'productDetails'])->name('frontend.productDetails');