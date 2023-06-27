<?php

namespace Database\Seeders;

use App\Models\Semestre;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            $semestre = new Semestre();
            $semestre->numero_semestre = $this->convertirNumeroASemestre($i);
            $semestre->save();
        }
    }

    private function convertirNumeroASemestre($numero)
    {
        $semestres = ['Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Séptimo', 'Octavo', 'Noveno', 'Décimo', 'Onceavo', 'Doceavo', 'Treceavo', 'Catorceavo', 'Quinceavo'];

        return $semestres[$numero - 1];
    }
}
