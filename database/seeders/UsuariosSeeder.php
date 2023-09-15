<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('usuarios')->insert([
                'nombre' => Str::random(5),
                'apellido' => Str::random(5),
                'correo' => Str::random(5) . '@example.com',
            ]);
        }
    }
}
