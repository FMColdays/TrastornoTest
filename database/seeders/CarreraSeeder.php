<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $carrera = new Carrera();
        $carrera->nombre_carrera = 'Ingeniería en sistemas';
        $carrera->save();

        $carrera = new Carrera();
        $carrera->nombre_carrera = 'Ingeniería química ';
        $carrera->save();

        $carrera = new Carrera();
        $carrera->nombre_carrera = 'Ingeniería industrial';
        $carrera->save();

    }
}
