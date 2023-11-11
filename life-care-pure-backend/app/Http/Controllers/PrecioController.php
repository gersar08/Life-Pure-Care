<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
    public function index()
    {
        return Precio::all();
    }

    public function store(Request $request)
    {
        $this->authorize('create', Precio::class);

        $precio = Precio::create($request->all());

        return response()->json($precio, 201);
    }

    public function update(Request $request, Precio $precio)
    {
        $this->authorize('update', $precio);

        $precio->update($request->all());

        return response()->json($precio);
    }

    public function destroy(Precio $precio)
    {
        $this->authorize('delete', $precio);

        $precio->delete();

        return response()->json(null, 204);
    }
}
