<?php

namespace App\Http\Controllers;

use App\Models\Precios;
use Illuminate\Http\Request;

class PreciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin'); // Solo los usuarios con el rol 'admin' pueden acceder
    }

    public function index()
    {
        $precios = Precios::all();

        return response()->json($precios);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'producto_id' => ['required', 'integer', 'exists:productos,id'],
            'precio' => ['required', 'numeric'],
            // Agrega aquí más campos según sea necesario
        ]);

        $precio = Precios::create($validatedData);

        return response()->json($precio, 201);
    }

    public function show(Precios $precio)
    {
        return response()->json($precio);
    }

    public function update(Request $request, Precios $precio)
    {
        $validatedData = $request->validate([
            'producto_id' => ['required', 'integer', 'exists:productos,id'],
            'precio' => ['required', 'numeric'],
            // Agrega aquí más campos según sea necesario
        ]);

        $precio->update($validatedData);

        return response()->json($precio);
    }

    public function destroy(Precios $precio)
    {
        $precio->delete();

        return response()->json(null, 204);
    }
}
