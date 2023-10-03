<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employees', 'index');
    Route::get('/employees/{id}', 'show');
    Route::post('/employees', 'create');  
    Route::put('/employees/{id}', 'update');
    Route::delete('/employees/{id}', 'destroy');
});

Route::controller(PurchaseController::class)->group(function () {
    Route::get('/purchase', 'index');
    Route::get('/purchase/{id}', 'show');
    Route::post('/purchase', 'create');  
    Route::put('/purchase/{id}', 'update');
    Route::delete('/purchase/{id}', 'destroy');
});

Route::controller(SaleController::class)->group(function () {
    Route::get('/sales', 'index');
    Route::get('/sales/{id}', 'show');
    Route::post('/sales', 'create');  
    Route::put('/sales/{id}', 'update');
    Route::delete('/sales/{id}', 'destroy');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/products/{id}', 'show');
    Route::post('/products', 'create');  
    Route::put('/products/{id}', 'update');
    Route::delete('/products/{id}', 'destroy');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/clients', 'index');
    Route::get('/clients/{id}', 'show');
    Route::post('/clients', 'create');  
    Route::put('/clients/{id}', 'update');
    Route::delete('/clients/{id}', 'destroy');
});
