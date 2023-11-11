<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Inventory;
use App\Models\PrecioEspecial;

class ClientesController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Cliente::class);
        return response()->json(Cliente::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', Cliente::class);

        $cliente = Cliente::create($request->all());

        $inventario = Inventory::where('product_name', $request->product_name)->first();

        if ($inventario) {
            PrecioEspecial::create([
                'reference_code' => $cliente->reference_code,
                'inventario_id' => $inventario->id,
                'precio' => $request->precio,
            ]);
        }

        return response()->json($cliente, 201);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $this->authorize('update', $cliente);

        $cliente->update($request->all());

        $inventario = Inventory::where('product_name', $request->product_name)->first();

        if ($inventario) {
            $precioEspecial = PrecioEspecial::where('reference_code', $cliente->reference_code)->first();

            if ($precioEspecial) {
                $precioEspecial->update([
                    'inventario_id' => $inventario->id,
                    'precio' => $request->precio,
                ]);
            } else {
                PrecioEspecial::create([
                    'reference_code' => $cliente->reference_code,
                    'inventario_id' => $inventario->id,
                    'precio' => $request->precio,
                ]);
            }
        }

        return response()->json($cliente, 200);
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        $this->authorize('delete', $cliente);

        $cliente->delete();

        return response()->json(null, 204);
    }
}
