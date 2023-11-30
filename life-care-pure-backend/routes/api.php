<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



// Ruta para iniciar sesión
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/clientes/manage', [ClientesController::class, 'index']);
    Route::post('/clientes', [ClientesController::class, 'store']);
    Route::get('/clientes/create', [ClientesController::class, 'create']);
    Route::get('/clientes/{id}/edit', [ClientesController::class, 'edit']);
    Route::put('/clientes/{id}', [ClientesController::class, 'update']);

    Route::get('/users/manage', [ClientesController::class, 'index']);
    Route::post('/users', [ClientesController::class, 'store']);
    Route::get('/users/create', [ClientesController::class, 'create']);
    Route::get('/users/{id}/edit', [ClientesController::class, 'edit']);
    Route::put('/users/{id}', [ClientesController::class, 'update']);

    Route::get('/inventario/manage', [ClientesController::class, 'index']);
    Route::post('/inventario', [ClientesController::class, 'store']);
    Route::get('/inventario/create', [ClientesController::class, 'create']);
    Route::get('/inventario/{id}/edit', [ClientesController::class, 'edit']);
    Route::put('/inventario/{id}', [ClientesController::class, 'update']);

    Route::get('/precios/manage', [ClientesController::class, 'index']);
    Route::post('/precios', [ClientesController::class, 'store']);
    Route::get('/precios/create', [ClientesController::class, 'create']);
    Route::get('/precios/{id}/edit', [ClientesController::class, 'edit']);
    Route::put('/precios/{id}', [ClientesController::class, 'update']);

    Route::get('/productos/manage', [ClientesController::class, 'index']);
    Route::post('/productos', [ClientesController::class, 'store']);
    Route::get('/productos/create', [ClientesController::class, 'create']);
    Route::get('/productos/{id}/edit', [ClientesController::class, 'edit']);
    Route::put('/productos/{id}', [ClientesController::class, 'update']);

    Route::get('/precio-especiales/manage', [ClientesController::class, 'index']);
    Route::post('/precio-especiales', [ClientesController::class, 'store']);
    Route::get('/precio-especiales/create', [ClientesController::class, 'create']);
    Route::get('/precio-especiales/{id}/edit', [ClientesController::class, 'edit']);
    Route::put('/precio-especiales/{id}', [ClientesController::class, 'update']);


});
