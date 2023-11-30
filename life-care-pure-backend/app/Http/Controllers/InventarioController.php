<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventario;
use Illuminate\Support\Facades\Gate;

class InventarioController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Inventario::class);

        $inventario = Inventario::all();

        return response()->json($inventario);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Inventario::class);

        $validatedData = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'cantidad' => ['required', 'integer'],
            // Agrega aquí más campos según sea necesario
        ]);

        $item = Inventario::create($validatedData);

        return response()->json($item, 201);
    }

    public function show(Inventario $inventario)
    {
        $this->authorize('view', $inventario);

        return response()->json($inventario);
    }

    public function update(Request $request, Inventario $inventario)
    {
        $this->authorize('update', $inventario);

        $validatedData = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'cantidad' => ['required', 'integer'],
            // Agrega aquí más campos según sea necesario
        ]);

        $inventario->update($validatedData);

        return response()->json($inventario);
    }

    public function destroy(Inventario $inventario)
    {
        $this->authorize('delete', $inventario);

        $inventario->delete();

        return response()->json(null, 204);
    }
}
