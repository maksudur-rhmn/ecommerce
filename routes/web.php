<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\LargeBannerController;
use App\Http\Controllers\SmallBannerController;
use App\Http\Controllers\SubCategoryController;

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
Route::get('/promote/{id}/admin', [AdminController::class, 'promote'])->name('promote.admin');
Route::get('/demote/{id}/admin', [AdminController::class, 'demote'])->name('demote.admin');

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
Route::get('/show/all/products', [FrontendController::class, 'productsAll'])->name('frontend.productsAll');
Route::get('/l2h/{name}/products', [FrontendController::class, 'lowToHigh'])->name('frontend.lowToHigh');
Route::get('/h2l/{name}/products', [FrontendController::class, 'HighToLow'])->name('frontend.highToLow');
Route::get('/product/details/{slug}', [FrontendController::class, 'productDetails'])->name('frontend.productDetails');
Route::get('/blogs/{id}/details', [FrontendController::class, 'blogDetails'])->name('frontend.blogDetails');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('frontend.blogs');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('/contact/post', [FrontendController::class, 'contactPost'])->name('frontend.contactpost');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/faq', [FrontendController::class, 'faq'])->name('frontend.faq');

// Cart Controller 
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/{coupon_name}', [CartController::class, 'index']);
Route::any('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/{cart_id}/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart/update', [CartController::class, 'cartUpdate'])->name('cart.custom.update');

// Wishlist Controller 
Route::resource('wishlist', WishlistController::class);

// Coupon Controller 
Route::resource('coupon', CouponController::class);

// Checkout Controller 
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index'); 
Route::post('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/order', [CheckoutController::class, 'order'])->name('order.store');

// Blog Controller 
Route::get('/blog/{id}/delete', [BlogController::class, 'delete'])->name('blog.delete');
Route::resource('blog', BlogController::class);

// About Controller 
Route::get('/abouts', [AboutController::class, 'index'])->name('abouts.index');
Route::post('/abouts/store', [AboutController::class, 'store'])->name('abouts.store');

// Footer Controller 
Route::get('/footer', [FooterController::class, 'index'])->name('footer.index');
Route::post('/footer/store', [FooterController::class, 'store'])->name('footer.store');

// Customer Controller 
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.dashboard');
Route::get('/notification/{id}/update', [CustomerController::class, 'notification'])->name('notification.update');
Route::post('add/review', [CustomerController::class, 'addreview'])->name('add.review');

// Search Controller 
Route::get('/search', [FrontendController::class, 'search']);

// LargeBanner Controller 
Route::get('/lg-banners', [LargeBannerController::class, 'index'])->name('lg-banners.index');
Route::post('/lg-banners/store', [LargeBannerController::class, 'store'])->name('lg-banners.store');
Route::get('/lg-banners/{id}/delete', [LargeBannerController::class, 'delete'])->name('lg-banners.delete');

// SmallBanner Controller 
Route::get('/sm-banners', [SmallBannerController::class, 'index'])->name('sm-banners.index');
Route::post('/sm-banners/store', [SmallBannerController::class, 'store'])->name('sm-banners.store');
Route::get('/sm-banners/{id}/delete', [SmallBannerController::class, 'delete'])->name('sm-banners.delete');

// Order Controller
Route::get('/order/cod', [OrderController::class, 'cod'])->name('orders.cod');
Route::get('/order/bkash', [OrderController::class, 'bkash'])->name('orders.bkash');
Route::post('/order/update', [OrderController::class, 'update'])->name('orders.update');

// RoleController
Route::get('roles', [RoleController::class,'index'])->name('roles.index');
Route::get('create/permissions', [RoleController::class,'createPermissions']);
Route::post('roles/store', [RoleController::class,'store'])->name('roles.store');
Route::post('roles/assign', [RoleController::class,'roleAssign'])->name('roles.assign');
Route::get('/roles/{user_id}/revoke', [RoleController::class,'roleRevoke'])->name('roles.revoke');
// RoleController ENDS 