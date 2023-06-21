<?php

namespace Database\Seeders;

use App\Models\Instituto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instituto = new Instituto();
        $instituto->nombre_instituto = 'Instituto Tecnológico de Acapulco';
        $instituto->save();

        $instituto = new Instituto();
        $instituto->nombre_instituto = 'Instituto Tecnológico de Agua Prieta';
        $instituto->save();

        $instituto = new Instituto();
        $instituto->nombre_instituto = 'Instituto Tecnológico de Aguascalientes';
        $instituto->save();
        
        $instituto = new Instituto();
        $instituto->nombre_instituto = 'Instituto Tecnológico de Altamira';
        $instituto->save();

        $instituto = new Instituto();
        $instituto->nombre_instituto = 'Instituto Tecnológico de Altiplano de Tlaxcala';
        $instituto->save();

        $instituto = new Instituto();
        $instituto->nombre_instituto = 'Instituto Tecnológico de Álvaro Obregón';
        $instituto->save();

        $instituto = new Instituto();
        $instituto->nombre_instituto = 'Instituto Tecnológico de Apizaco';
        $instituto->save();

        $instituto = new Instituto();
        $instituto->nombre_instituto = 'Instituto Tecnológico de Atitalaquia';
        $instituto->save();

        $instituto = new Instituto();
        $instituto->nombre_instituto = 'Instituto Tecnológico de Bahía de Banderas';
        $instituto->save();
    }
}
