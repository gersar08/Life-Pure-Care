<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Crear el rol de administrador
        $adminRole = Role::create(['name' => 'admin']);

        // Crear el usuario administrador
        $admin = User::create([
            'name' => 'Admin User',
            'username' => 'admin',
            'password' => bcrypt('password'), // Cambia 'password' por la contraseña que quieras
        ]);

        // Asignar el rol de administrador al usuario administrador
        $admin->assignRole($adminRole);
    }
}
