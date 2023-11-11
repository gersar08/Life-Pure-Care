<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrecioEspecial;

class PreciosEspecialesController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('create', PrecioEspecial::class);

        $precioEspecial = PrecioEspecial::create([
            'reference_code' => $request->reference_code,
            'inventario_id' => $request->inventario_id,
            'precio' => $request->precio,
        ]);

        return response()->json($precioEspecial, 201);
    }

    public function update(Request $request, $id)
    {
        $precioEspecial = PrecioEspecial::findOrFail($id);

        $this->authorize('update', $precioEspecial);

        $precioEspecial->update([
            'reference_code' => $request->reference_code,
            'inventario_id' => $request->inventario_id,
            'precio' => $request->precio,
        ]);

        return response()->json($precioEspecial, 200);
    }

    public function destroy($id)
    {
        $precioEspecial = PrecioEspecial::findOrFail($id);

        $this->authorize('delete', $precioEspecial);

        $precioEspecial->delete();

        return response()->json(null, 204);
    }
}
