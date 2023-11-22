<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrecioEspecial;
use Illuminate\Support\Facades\Gate;

class PrecioEspecialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Asegúrate de que el usuario tenga permiso para ver la lista de precios especiales
        if (Gate::denies('viewAny', PrecioEspecial::class)) {
            abort(403);
        }

        // Obtiene todos los precios especiales
        $preciosEspeciales = PrecioEspecial::all();

        // Devuelve los precios especiales como una respuesta JSON
        return response()->json($preciosEspeciales);
    }

    public function edit($id)
    {
        $precioEspecial = PrecioEspecial::findOrFail($id);

        if (Gate::denies('update', $precioEspecial)) {
            abort(403);
        }

        // Devuelve el precio especial como una respuesta JSON
        return response()->json($precioEspecial);
    }

    public function update(Request $request, $id)
    {
        $precioEspecial = PrecioEspecial::findOrFail($id);

        if (Gate::denies('update', $precioEspecial)) {
            abort(403);
        }

        // Actualiza el precio especial con los datos del request
        $precioEspecial->update($request->all());

        // Devuelve el precio especial actualizado como una respuesta JSON
        return response()->json($precioEspecial);
    }

    public function destroy($id)
    {
        $precioEspecial = PrecioEspecial::findOrFail($id);

        if (Gate::denies('delete', $precioEspecial)) {
            abort(403);
        }

        // Elimina el precio especial
        $precioEspecial->delete();

        // Devuelve una respuesta JSON indicando que la eliminación fue exitosa
        return response()->json(['message' => 'Precio especial eliminado con éxito']);
    }
}
