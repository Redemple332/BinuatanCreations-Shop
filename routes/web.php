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
use App\Http\Livewire\Admin\Catalog\Images;

use App\Http\Livewire\Admin\Promo\DiscountIndex;
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
Route::get('/admin/catalog/categories', Categories::class)->name('admin.category');
Route::get('/admin/catalog/size', Sizes::class)->name('admin.size');
Route::get('/admin/catalog/color', Colors::class)->name('admin.color');
Route::get('/admin/catalog/image', Images::class)->name('admin.image');

//Promo
Route::get('/admin/promo/discount', DiscountIndex::class)->name('admin.discount');


Route::get('/admin/orders', Orders::class)->name('admin.orders');


