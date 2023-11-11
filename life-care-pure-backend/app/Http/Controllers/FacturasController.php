<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Inventory;

class FacturasController extends Controller
{
    public function index()
    {
        return Factura::all();
    }

    public function store(Request $request)
    {
        $this->authorize('create', Factura::class);

        // Encuentra el cliente basado en el código proporcionado
        $cliente = Cliente::where('codigo', $request->codigo_cliente)->first();

        // Si el cliente no existe, devuelve un error
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        $inventario = Inventory::where('product_name', $request->product_name)->first();

        if ($inventario && $inventario->quantity >= $request->quantity) {
            $inventario->decrement('quantity', $request->quantity);
        } else {
            return response()->json(['error' => 'No hay suficiente inventario'], 400);
        }

        // Crea la factura con los datos del cliente y del producto
        $factura = Factura::create([
            'codigo_cliente' => $cliente->codigo,
            'producto_id' => $request->producto_id,
            // otros campos
        ]);

        return response()->json($factura, 201);
    }

    public function update(Request $request, Factura $factura)
    {
        $this->authorize('update', $factura);

        $factura->update($request->all());

        return response()->json($factura);
    }

    public function destroy(Factura $factura)
    {
        $this->authorize('delete', $factura);

        $factura->delete();

        return response()->json(null, 204);
    }
}
