<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            [
                'rol' => 'Administrador',
                'estado' => '1',
                'descripcion' => 'Administrador del sistema.',
            ],
            [
                'rol' => 'Vendedor',
                'estado' => '1',
                'descripcion' => 'Vendedor de Tickets.'
            ]
        ]);
        
        DB::table('usuarios')->insert([
            [
                'rol_id' => 1,
                'usuario' => 'Administrador',
                'correo' => 'admin@gmail.com',
                'password' =>  Hash::make('admin'),
                'estado' => '1'
                ]            
        ]);

    }
}
