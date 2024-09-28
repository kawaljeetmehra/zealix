<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);

// Show the product entry form
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Store the new product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


Route::resource('orders', OrderController::class);
Route::post('/orders/updateStatus', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
