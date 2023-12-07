<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'name' => 'Miguel Lopez',
                'unique_id' => 'P546123',
                'telefono' => '123456789',
                'direccion' => 'Calle San Juan',
                'n_documento' => '123456789',
            ], [
                'name' => 'Juan Perez',
                'unique_id' => 'P546123',
                'telefono'  => '123456780',
                'direccion' => 'Calle San Pedro',
                'n_documento' => '123456709',
            ], [
                'name' => 'Pedro Rodriguez',
                'unique_id' => 'P546123',
                'telefono'  => '123456781',
                'direccion' => 'Calle San Salvador',
                'n_documento'   => '123456701',
            ]
        ]);
    }
}
