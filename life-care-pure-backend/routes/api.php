<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    // Ruta para obtener el usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Rutas para el panel de administrador
    Route::middleware('can:admin')->group(function () {
        // Rutas CRUD para la tabla 'user'
        Route::get('/admin/users', 'AdminController@users');
        Route::post('/admin/users', 'AdminController@storeUser');
        Route::get('/admin/users/view/{id}', 'AdminController@showUser');
        Route::put('/admin/users/{id}', 'AdminController@updateUser');
        Route::delete('/admin/users/{id}', 'AdminController@deleteUser');

        // Rutas CRUD para la tabla 'inventario'
        Route::get('/admin/inventory', 'AdminController@inventory');
        Route::post('/admin/inventory', 'AdminController@storeInventory');
        Route::get('/admin/inventory/view/{id}', 'AdminController@showInventory');
        Route::put('/admin/inventory/{id}', 'AdminController@updateInventory');
        Route::delete('/admin/inventory/{id}', 'AdminController@deleteInventory');

        // Rutas CRUD para la tabla 'precios'
        Route::get('/admin/prices', 'AdminController@prices');
        Route::post('/admin/prices', 'AdminController@storePrice');
        Route::get('/admin/prices/view/{id}', 'AdminController@showPrice');
        Route::put('/admin/prices/{id}', 'AdminController@updatePrice');
        Route::delete('/admin/prices/{id}', 'AdminController@deletePrice');

        // Rutas CRUD para la tabla 'precios_especiales'
        Route::get('/admin/special-prices', 'AdminController@specialPrices');
        Route::post('/admin/special-prices', 'AdminController@storeSpecialPrice');
        Route::get('/admin/special-prices/view/{id}', 'AdminController@showSpecialPrice');
        Route::put('/admin/special-prices/{id}', 'AdminController@updateSpecialPrice');
        Route::delete('/admin/special-prices/{id}', 'AdminController@deleteSpecialPrice');

        // Rutas CRUD para la tabla 'producto'
        Route::get('/admin/products', 'AdminController@products');
        Route::post('/admin/products', 'AdminController@storeProduct');
        Route::get('/admin/products/view/{id}', 'AdminController@showProduct');
        Route::put('/admin/products/{id}', 'AdminController@updateProduct');
        Route::delete('/admin/products/{id}', 'AdminController@deleteProduct');

        // Rutas CRUD para la tabla 'clientes'
        Route::get('/admin/clients', 'AdminController@clients');
        Route::post('/admin/clients', 'AdminController@storeClient');
        Route::get('/admin/clients/view/{id}', 'AdminController@showClient');
        Route::put('/admin/clients/{id}', 'AdminController@updateClient');
        Route::delete('/admin/clients/{id}', 'AdminController@deleteClient');
    });
});
