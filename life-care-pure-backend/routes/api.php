<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PreciosEspecialesController;

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


Route::middleware('auth:api')->group(function () {

    Route::apiResource('precios', PrecioController::class);
    Route::apiResource('inventarios', InventoryController::class);
    Route::apiResource('clientes', ClientesController::class);
    Route::apiResource('facturas', FacturasController::class);
    Route::apiResource('user', UserController::class);
    Route::apiResource('precios-especiales', PreciosEspecialesController::class);
});
