<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'rol' => 'required|string|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        return response()->json(['user' => $user], 201);
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

        // Si se proporcionó un rol en la solicitud, validar y actualizar el rol del usuario
        if ($request->input('role')) {
            // Validar el rol
            $validatedData = $request->validate([
                'role' => ['required', 'string', 'exists:roles,name'],
            ]);

            // Primero, revocar todos los roles actuales
            $user->roles()->detach();

            // Luego, asignar el nuevo rol
            $user->assignRole($validatedData['role']);
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
