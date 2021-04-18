<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard\Dashboard;
use App\Http\Livewire\Admin\Products\Index;
use App\Http\Livewire\Admin\Products\Create;
use App\Http\Livewire\Admin\Orders\Orders;
use App\Http\Livewire\Admin\Catalog\Categories;
use App\Http\Livewire\Admin\Catalog\Colors;
use App\Http\Livewire\Admin\Catalog\Sizes;
use App\Http\Livewire\Admin\Catalog\Images;
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
Route::get('/admin/products', Index::class)->name('admin.products');
Route::get('/admin/products/create', Create::class)->name('admin.product.create');

//CATALOG
Route::get('/admin/catalog/categories', Categories::class)->name('admin.category');
Route::get('/admin/catalog/size', Sizes::class)->name('admin.size');
Route::get('/admin/catalog/color', Colors::class)->name('admin.color');
Route::get('/admin/catalog/image', Images::class)->name('admin.image');


Route::get('/admin/orders', Orders::class)->name('admin.orders');


