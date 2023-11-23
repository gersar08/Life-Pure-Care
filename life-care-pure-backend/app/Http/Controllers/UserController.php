<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $user = User::create($request->all());

        // Asignar el rol al usuario
        $user->assignRole($request->input('role'));

        return response()->json($user, 201);
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        return response()->json($user);
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        // Actualizar los datos del usuario
        $user->update($request->all());

        // Si se proporcionó un rol en la solicitud, actualizar el rol del usuario
        if ($request->input('role')) {
            // Primero, revocar todos los roles actuales
            $user->roles()->detach();

            // Luego, asignar el nuevo rol
            $user->assignRole($request->input('role'));
        }

        return response()->json($user);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
