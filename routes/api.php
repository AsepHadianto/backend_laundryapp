<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
  Route::apiResource('users', UserController::class);
  Route::apiResource('categories', CategoryController::class);
  Route::apiResource('customers', CustomerController::class);
  Route::apiResource('products', ProductController::class);
  Route::apiResource('services', ServiceController::class);
  Route::apiResource('sales_records', SalesRecordController::class);
  Route::apiResource('product_sales_details', ProductSalesDetailController::class);
  Route::apiResource('service_sales_details', ServiceSalesDetailController::class);
  Route::get('/today-omzet', [SalesRecordController::class, 'todayOmzet']);
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::put('/users/update-password', [UserController::class, 'updatePassword']);
  Route::patch('/products/{id}/update-stock', [ProductController::class, 'updateStock']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('roles', RoleController::class);
