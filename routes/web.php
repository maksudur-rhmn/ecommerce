<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

// Dashboard Overview Controller
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// Category Controller
Route::get('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
Route::resource('categories',CategoryController::class);

// Sub Category Controller 
Route::get('/subcategories/{id}/delete', [SubCategoryController::class, 'delete'])->name('subcategories.delete');
Route::resource('subcategories', SubCategoryController::class);

// Product Controller 
Route::resource('products', ProductController::class);