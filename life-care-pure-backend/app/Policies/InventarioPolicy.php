<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Inventario;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventarioPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Inventario $inventario)
    {
        // Todos los usuarios pueden ver el inventario
        return true;
    }

    public function create(User $user)
    {
        // Sólo los usuarios con rol de administrador o con privilegios de inventario pueden crear un inventario
        return $user->rol == 'administrador' || $user->hasPrivilege('inventario');
    }

    public function update(User $user, Inventario $inventario)
    {
        // Sólo los usuarios con rol de administrador o con privilegios de inventario pueden actualizar el inventario
        return $user->rol == 'administrador' || $user->hasPrivilege('inventario');
    }

    public function delete(User $user, Inventario $inventario)
    {
        // Sólo los usuarios con rol de administrador o con privilegios de inventario pueden eliminar el inventario
        return $user->rol == 'administrador' || $user->hasPrivilege('inventario');
    }
}

