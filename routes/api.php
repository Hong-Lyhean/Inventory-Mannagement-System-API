<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;

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

Route::apiResource('suppliers',SupplierController::class)
    ->where(['supplier' => '[0-9]+']);
Route::apiResource('products',ProductController::class);
Route::apiResource('categories',CategoryController::class);
Route::apiResource('staffs',StaffController::class);
Route::apiResource('customers',CustomerController::class);
Route::apiResource('orders',OrderController::class);
Route::apiResource('order_details',OrderDetailController::class);
Route::apiResource('payments',PaymentController::class);
