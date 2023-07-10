<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrador = new Administrador();
        $administrador->correo = "erickgp51@gmail.com";
        $administrador->contraseña = Hash::make("Animales1");
        $administrador->save();
    }
}
