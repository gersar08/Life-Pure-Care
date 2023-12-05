<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PreciosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PrecioEspecialController;

// Ruta para iniciar sesión
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/users', [UserController::class, 'index']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/search/{field}/{query}', [UserController::class, 'search']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    Route::get('/clientes', [ClientesController::class, 'index']);
    Route::put('/clientes/{id}', [ClientesController::class, 'update']);
    Route::post('/clientes', [ClientesController::class, 'store']);
    Route::get('/clientes/search/{field}/{query}', [ClientesController::class, 'search']);
    Route::delete('/clientes/{id}', [ClientesController::class, 'destroy']);

    Route::get('/inventario', [InventarioController::class, 'index']);
    Route::put('/inventario/{id}', [InventarioController::class, 'update']);
    Route::post('/inventario', [InventarioController::class, 'store']);
    Route::get('/inventario/search/{field}/{query}', [InventarioController::class, 'search']);
    Route::delete('/inventario/{id}', [InventarioController::class, 'destroy']);

    Route::get('/precios', [PreciosController::class, 'index']);
    Route::put('/precios/{id}', [PreciosController::class, 'update']);
    Route::post('/precios', [PreciosController::class, 'store']);
    Route::get('/precios/search/{field}/{query}', [PreciosController::class, 'search']);
    Route::delete('/precios/{id}', [PreciosController::class, 'destroy']);

    Route::get('/productos', [ProductoController::class, 'index']);
    Route::put('/productos/{id}', [ProductoController::class, 'update']);
    Route::post('/productos', [ProductoController::class, 'store']);
    Route::get('/productos/search/{field}/{query}', [ProductoController::class, 'search']);
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

    Route::get('/precio-especial', [PrecioEspecialController::class, 'index']);
    Route::put('/precio-especial/{id}', [PrecioEspecialController::class, 'update']);
    Route::post('/precio-especial', [PrecioEspecialController::class, 'store']);
    Route::get('/precio-especial/search/{field}/{query}', [PrecioEspecialController::class, 'search']);
    Route::delete('/precio-especial/{id}', [PrecioEspecialController::class, 'destroy']);
});
