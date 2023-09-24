<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\DocentesController;
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


Route::controller(DocentesController::class)->group(function() {
    Route::get('/docentes', 'index');
    Route::get('/docentes/{id}', 'show');
    Route::post('/docentes', 'store');
    Route::put('/docentes/{id}', 'update');
    Route::delete('/docentes/{id}', 'destroy');
});

Route::controller(AlumnosController::class)->group(function() {
    Route::get('/alumno', 'index');
    Route::get('/alumno/{id}', 'show');
    Route::post('/alumno', 'store');
    Route::put('/alumno/{id}', 'update');
    Route::delete('/alumno/{id}', 'destroy');
});

Route::controller(CursosController::class)->group(function() {
    Route::get('/cursos', 'index');
    Route::get('/cursos/{id}', 'show');
    Route::post('/cursos', 'store');
    Route::put('/cursos/{id}', 'update');
    Route::delete('/cursos/{id}', 'destroy');
});