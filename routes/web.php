<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
Route::get('/admin/products', ProductIndex::class)->name('admin.products');
Route::get('/admin/products/create', ProductCreate::class)->name('admin.product.create');
Route::get('/admin/products/{product}', ProductEdit::class)->name('admin.product.edit');

//CATALOG
Route::get('/admin/catalog/categories', Categories::class)->name('admin.categories');
Route::get('/admin/catalog/sizes', Sizes::class)->name('admin.sizes');
Route::get('/admin/catalog/colors', Colors::class)->name('admin.colors');

//Promo
Route::get('/admin/promo/discounts', DiscountIndex::class)->name('admin.discounts');
Route::get('/admin/promo/coupons', CouponIndex::class)->name('admin.coupons');
Route::get('/admin/promo/banners', BannerIndex::class)->name('admin.banners');


Route::get('/admin/orders', Orders::class)->name('admin.orders');


