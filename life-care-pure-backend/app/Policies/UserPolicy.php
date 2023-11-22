<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        // Permite que solo los usuarios con el rol 'admin' puedan ver cualquier usuario
        return $user->hasRole('admin');
    }

    public function view(User $user, User $model): bool
    {
        // Permite que solo los usuarios con el rol 'admin' puedan ver los detalles de un usuario
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        // Permite que solo los usuarios con el rol 'admin' puedan crear usuarios
        return $user->hasRole('admin');
    }

    public function update(User $user, User $model): bool
    {
        // Permite que solo los usuarios con el rol 'admin' puedan actualizar usuarios
        return $user->hasRole('admin');
    }

    public function delete(User $user, User $model): bool
    {
        // Permite que solo los usuarios con el rol 'admin' puedan eliminar usuarios

        return $user->hasRole('admin');
    }
}
