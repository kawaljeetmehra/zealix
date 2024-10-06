<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockListAdminController;
use App\Http\Controllers\stockManagementDisributorController;
use App\Http\Controllers\AssignStockController;
use App\Http\Controllers\OrderStatusController;
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

Route::get('/your-product-route', [OrderController::class, 'getProducts']);
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');





Route::get('/assign-stocks', [AssignStockController::class, 'index'])->name('products.stockAssign');
Route::post('/assign-stock', [AssignStockController::class, 'assignStock'])->name('assignStock');


Route::get('/stockAdmin',[StockListAdminController::class,'index'])->name('stockAdmin');
Route::post('/update-stock', [StockListAdminController::class, 'updateStock'])->name('update.stock');
Route::get('/stockExpire',[StockListAdminController::class,'stockExipre'])->name('expirestockAdmin');
Route::get('/stockmanagementDistributor',[stockManagementDisributorController::class,'index'])->name('stockDistributor');;
Route::post('/update-stock-distributor', [stockManagementDisributorController::class, 'updateStock'])->name('update.stock.distributor');
Route::get('/stockExpireDistributor',[stockManagementDisributorController::class,'stockExipre'])->name('expirestockDistributor'); 


/***************************Order Status***************** */
  

Route::get('/orderstatus',[OrderStatusController::class,'index'])->name('orderstatus.index');
Route::get('/orderstatus/{id}/edit', [OrderStatusController::class, 'edit']);
Route::put('/orderstatus/{id}',[OrderStatusController::class,'update']);






