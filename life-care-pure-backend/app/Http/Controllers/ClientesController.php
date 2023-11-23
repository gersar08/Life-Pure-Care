<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Clientes::class);
        $clientes = Clientes::all();
        return response()->json($clientes);
    }

    public function create()
    {
        $this->authorize('create', Clientes::class);
        // Aquí va tu código para mostrar el formulario de creación
    }

    public function store(Request $request)
    {
        $this->authorize('create', Clientes::class);
        $cliente = Clientes::create($request->all());
        return response()->json($cliente, 201);
    }

    public function edit(string $id)
    {
        $cliente = Clientes::findOrFail($id);
        $this->authorize('update', $cliente);
        // Aquí va tu código para mostrar el formulario de edición
    }

    public function update(Request $request, string $id)
    {
        $cliente = Clientes::findOrFail($id);
        $this->authorize('update', $cliente);
        $cliente->update($request->all());
        return response()->json($cliente);
    }

    public function destroy(string $id)
    {
        $cliente = Clientes::findOrFail($id);
        $this->authorize('delete', $cliente);
        $cliente->delete();
        return response()->json(['message' => 'Cliente deleted successfully']);
    }
}
