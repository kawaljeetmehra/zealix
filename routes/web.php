<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockListAdminController;
use App\Http\Controllers\stockManagementDisributorController;
use App\Http\Controllers\AssignStockController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\OverSalesController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TaskReportController;

use App\Http\Controllers\RouteTrackingController;

use App\Http\Controllers\RecordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockReturnController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReturnOrderController;
use App\Http\Controllers\ProductPackagingController;
use App\Http\Controllers\ProductQuantityController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['auth', 'role:1,2,3']], function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboardSalesman',[DashboardController::class,'salesmandashboard'])->name('dashboardSalesman');
Route::resource('products', ProductController::class);

// Show the product entry form
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::resource('packaging', ProductPackagingController::class); 
Route::resource('quantity', ProductQuantityController::class);
// Store the new product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/assign-stocks', [AssignStockController::class, 'index'])->name('products.stockAssign');
Route::post('/assign-stock', [AssignStockController::class, 'assignStock'])->name('assignStock');


Route::get('/stockAdmin',[StockListAdminController::class,'index'])->name('stockAdmin');
Route::get('/stockmanagementDistributor',[stockManagementDisributorController::class,'index'])->name('stockDistributor');
   
Route::post('/update-stock', [StockListAdminController::class, 'updateStock'])->name('update.stock');
Route::get('/stockExpire',[StockListAdminController::class,'stockExipre'])->name('expirestockAdmin');
Route::post('/update-stock-distributor', [stockManagementDisributorController::class, 'updateStock'])->name('update.stock.distributor');
Route::get('/stockExpireDistributor',[stockManagementDisributorController::class,'stockExipre'])->name('expirestockDistributor'); 


Route::get('/stock-return', [StockReturnController::class, 'index'])->name('stock.return');


Route::get("/assign",[TaskController::class,'index']);
Route::resource('oversales', OverSalesController::class);
Route::get('/salesmanAttendance', [AttendanceController::class, 'salesmanAttendance'])->name('salesman.attendance');
Route::resource('orders', OrderController::class);
Route::post('/orders/updateStatus', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

Route::get('/your-product-route', [OrderController::class, 'getProducts']);
Route::get('/your-distributor-product-route', [OrderController::class, 'getDistributorProducts']);

Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

Route::get('/orderstatus',[OrderStatusController::class,'index'])->name('orderstatus.index');

Route::get('/stockAdmin',[StockListAdminController::class,'index'])->name('stockAdmin'); 



/***************************Order Status***************** */
  


Route::get('/orderstatus/{id}/edit', [OrderStatusController::class, 'edit']);
Route::put('/orderstatus/{id}',[OrderStatusController::class,'update']);
Route::get('/orderreturn',[OrderStatusController::class,'orderReturn']);
Route::get('/editorderreturn',[OrderStatusController::class,'orderEditReturn']);



Route::get('/shipping-orders', [OrderStatusController::class, 'shippingDetails'])->name('ShippingOrders.shippingDetails');

Route::get('/shipping-orders/{id}', [OrderStatusController::class, 'show'])->name('ShippingOrders.show');
Route::put('/shipping-orders/{id}', [OrderStatusController::class, 'shippingupdate'])->name('ShippingOrders.shippingupdate');



 Route::post("/assign/store",[TaskController::class,'store']); 
Route::post("/assign/store-salesman",[TaskController::class,'storeSalesman']);






Route::get('/salesman/attendance', [AttendanceController::class, 'showAttendance']);
Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store'); // Route for adding attendance
Route::put('/attendance/{id}', [AttendanceController::class, 'update'])->name('attendance.update'); // Route for updating attendance

Route::post('/markAttendance',[AttendanceController::class, 'MarkAttendance']);
Route::get('/getAttendanceStatus',[AttendanceController::class, 'getAttendanceStatus']);


Route::resource('tasks', TaskReportController::class);
Route::get('/tasks/get-tasks-by-salesman/{salesmanId}', [TaskReportController::class, 'getTasksBySalesman']);


Route::get("/routePlanning",[TaskController::class,'routePlanning'])->name('route.planning');
Route::post('/route-planning/stops', [TaskController::class, 'storeStops'])->name('route.planning.stops');
Route::post('/route-planning/assign', [TaskController::class, 'assignTasks'])->name('route.planning.assign');




Route::resource('routeTracking', RouteTrackingController::class);

Route::get('/categories', [CategoryController::class, 'getCategories'])->name('categories.get');
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::post('/categories/save', [CategoryController::class, 'saveCategory'])->name('categories.save');
Route::delete('/categories/{id}', [CategoryController::class, 'deleteCategory'])->name('categories.delete');

Route::get('/returnorderstatus', [ReturnOrderController::class, 'index'])->name('Returnorders.index');

});



Route::group(['middleware' => ['auth', 'role:1']], function () {

    Route::get('/records', [RecordController::class, 'index'])->name('records.index');

// Route to store new records
Route::post('/records', [RecordController::class, 'store'])->name('records.store');
Route::get('/record/{id}/edit', [RecordController::class, 'edit'])->name('record.edit');
Route::put('/record/{id}/update', [RecordController::class, 'update'])->name('record.update');


Route::resource('user',UserController::class);

});


// Route::group(['middleware'=>['auth','role:1,2,3']],function(){
   
    
// });

