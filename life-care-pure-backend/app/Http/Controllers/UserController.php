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
        $user->update($request->all());
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
