<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;

class UserPolicy
{
    public function create(User $user)
    {
        // Solo los usuarios con el rol de 'admin' pueden crear usuarios
        return $user->hasRole('admin');
    }
    
    public function update(User $currentUser, User $user)
    {
        // Solo los usuarios con el rol de 'admin' pueden actualizar usuarios
        // Un usuario puede actualizar su propia información
        return $currentUser->hasRole('admin') || $currentUser->id === $user->id;
    }
    
    public function delete(User $currentUser)
    {
        // Solo los usuarios con el rol de 'admin' pueden eliminar usuarios
        return $currentUser->hasRole('admin');
    }
}
