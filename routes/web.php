<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Auth\AdminLogin;



use App\Http\Livewire\Admin\Dashboard\Dashboard;

use App\Http\Livewire\Admin\Products\ProductIndex;
use App\Http\Livewire\Admin\Products\ProductEdit;
use App\Http\Livewire\Admin\Products\ProductCreate;

use App\Http\Livewire\Admin\Orders\Orders;
use App\Http\Livewire\Admin\Catalog\Categories;
use App\Http\Livewire\Admin\Catalog\Colors;
use App\Http\Livewire\Admin\Catalog\Sizes;


use App\Http\Livewire\Admin\Promo\DiscountIndex;
use App\Http\Livewire\Admin\Promo\CouponIndex;
use App\Http\Livewire\Admin\Promo\BannerIndex;

use App\Http\Controllers\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Auth\AdminResetPasswordController;

//Customer
use App\Http\Controllers\PagesController;




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
//Customers
Route::get('/',[PagesController::class,'home'])->name('home');
Route::get('products/cart',[PagesController::class,'cart'])->name('cart');
Route::get('products/cart/checkout',[PagesController::class,'checkout'])->middleware('auth')->name('checkout');


Route::get('/products',[PagesController::class,'products'])->name('products');
Route::get('products?',[PagesController::class,'products'])->name('products.category');
Route::get('/products/{product}',[PagesController::class,'singleProduct'])->name('products.single-item');

Route::get('/profile',[PagesController::class,'customerProfile'])->name('customer.profile');
Route::get('/wishlist',[PagesController::class,'wishlist'])->name('wishlist');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');//Log out User











//Admin
Route::get('admin/login', AdminLogin::class)->middleware('guest:admin')->name('admin.login');
Route::get('admin/dashboard', Dashboard::class)->middleware('auth:admin')->name('admin.dashboard');
Route::get('/admin/orders', Orders::class)->middleware('auth:admin')->name('admin.orders');

Route::group(['middleware' => 'guest:admin','prefix' => 'admin/password', 'as' => 'admin.password.'], function(){
    Route::post('/email',[AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
    Route::get('/reset',[AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
    Route::post('/reset',[AdminResetPasswordController::class,'reset']);
    Route::get('/reset/{token}',[AdminResetPasswordController::class,'showResetForm'])->name('reset');
});

//Products
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin/products', 'as' => 'admin.'], function(){
   
    Route::get('/', ProductIndex::class)->name('products');
    Route::get('/create', ProductCreate::class)->name('product.create');
    Route::get('/{product}', ProductEdit::class)->name('product.edit');
    
});

// Catalogs
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin/catalog', 'as' => 'admin.'], function(){
    
    Route::get('/categories', Categories::class)->name('categories');
    Route::get('/sizes', Sizes::class)->name('sizes');
    Route::get('/colors', Colors::class)->name('colors');

});

//Promos
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin/promo', 'as' => 'admin.'], function(){
   
    Route::get('/discounts', DiscountIndex::class)->name('discounts');
    Route::get('/coupons', CouponIndex::class)->name('coupons');
    Route::get('/banners', BannerIndex::class)->name('banners');

});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
