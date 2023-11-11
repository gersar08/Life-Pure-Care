<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Inventory::class);
        return response()->json(Inventory::all());
    }
    
    public function store(Request $request)
    {
        $this->authorize('create', Inventory::class);

        $inventory = Inventory::create($request->all());
    
        return response()->json($inventory, 201);
    }
    
    public function update(Request $request, Inventory $inventory)
    {
        $this->authorize('update', $inventory);

        $inventory->update($request->all());
    
        return response()->json($inventory);
    }
    
    public function destroy(Inventory $inventory)
    {
        $this->authorize('delete', $inventory);
    
        // Eliminar el elemento del inventario
        $inventory->delete();
    
        // Devolver una respuesta al cliente
        return response()->json(['message' => 'Inventory item deleted successfully']);
    }
}
