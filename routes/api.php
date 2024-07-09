<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesRecordController;
use App\Http\Controllers\ProductSalesDetailController;
use App\Http\Controllers\ServiceSalesDetailController;
// use Laravel\Sanctum\Sanctum;

// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
// Route::get('/me', [AuthController::class, 'me'])->middleware(['auth:sanctum']);
// Route::apiResource('login', AuthController::class, '/login');
Route::middleware('auth:sanctum')->group(function () {
  Route::apiResource('users', UserController::class);
  Route::apiResource('categories', CategoryController::class);
  Route::apiResource('products', ProductController::class);
  Route::apiResource('services', ServiceController::class);
  Route::apiResource('sales_records', SalesRecordController::class);
  Route::apiResource('product_sales_details', ProductSalesDetailController::class);
  Route::apiResource('service_sales_details', ServiceSalesDetailController::class);
  Route::get('/me', [AuthController::class, 'me']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('roles', RoleController::class);
Route::apiResource('customers', CustomerController::class);
