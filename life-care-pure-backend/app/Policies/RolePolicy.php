<?php

// app/Policies/RolePolicy.php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    /**
     * Determine whether the user can manage roles.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    
    public function manageRoles(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can assign a role.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function assignRole(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can remove a role.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */


    public function removeRole(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can modify inventory.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    
    public function modifyInventory(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can modify price.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function modifyPrice(User $user)
    {
        return $user->hasRole('admin');
    }
}
