<?php

namespace Database\Seeders;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //OPCIONES ALCOHOLISMO

        //1
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 1;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Una vez al mes o menos";
        $opcion->valor = 1;
        $opcion->pregunta_id = 1;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "De 2 a 4 veces por mes";
        $opcion->valor = 2;
        $opcion->pregunta_id = 1;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "2 o 3 veces por semana";
        $opcion->valor = 3;
        $opcion->pregunta_id = 1;
        $opcion->save();

        //2
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 2;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Menos de una vez al mes";
        $opcion->valor = 1;
        $opcion->pregunta_id = 2;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Mensualmente";
        $opcion->valor = 2;
        $opcion->pregunta_id = 2;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Semanalmente";
        $opcion->valor = 3;
        $opcion->pregunta_id = 2;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Diario o casi diario";
        $opcion->valor = 4;
        $opcion->pregunta_id = 2;
        $opcion->save();

        //3
        $opcion = new Opcion();
        $opcion->opcion = "Una o dos";
        $opcion->valor = 0;
        $opcion->pregunta_id = 3;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Tres o cuatro";
        $opcion->valor = 1;
        $opcion->pregunta_id = 3;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Cinco o seis";
        $opcion->valor = 2;
        $opcion->pregunta_id = 3;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "De siete a nueve";
        $opcion->valor = 3;
        $opcion->pregunta_id = 3;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Diez o más";
        $opcion->valor = 4;
        $opcion->pregunta_id = 3;
        $opcion->save();

        //4
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 4;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Menos de una vez al mes";
        $opcion->valor = 1;
        $opcion->pregunta_id = 4;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Mensualmente";
        $opcion->valor = 2;
        $opcion->pregunta_id = 4;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Semanalmente";
        $opcion->valor = 3;
        $opcion->pregunta_id = 4;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Diario o casi diario";
        $opcion->valor = 4;
        $opcion->pregunta_id = 4;
        $opcion->save();

        //5
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 5;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Menos de una vez al mes";
        $opcion->valor = 1;
        $opcion->pregunta_id = 5;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Mensualmente";
        $opcion->valor = 2;
        $opcion->pregunta_id = 5;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Semanalmente";
        $opcion->valor = 3;
        $opcion->pregunta_id = 5;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Diario o casi diario";
        $opcion->valor = 4;
        $opcion->pregunta_id = 5;
        $opcion->save();

        //6
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 6;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Menos de una vez al mes";
        $opcion->valor = 1;
        $opcion->pregunta_id = 6;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Mensualmente";
        $opcion->valor = 2;
        $opcion->pregunta_id = 6;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Semanalmente";
        $opcion->valor = 3;
        $opcion->pregunta_id = 6;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Diario o casi diario";
        $opcion->valor = 4;
        $opcion->pregunta_id = 6;
        $opcion->save();

        //7
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 7;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Menos de una vez al mes";
        $opcion->valor = 1;
        $opcion->pregunta_id = 7;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Mensualmente";
        $opcion->valor = 2;
        $opcion->pregunta_id = 7;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Semanalmente";
        $opcion->valor = 3;
        $opcion->pregunta_id = 7;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Diario o casi diario";
        $opcion->valor = 4;
        $opcion->pregunta_id = 7;
        $opcion->save();

        //8
        $opcion = new Opcion();
        $opcion->opcion = "No";
        $opcion->valor = 0;
        $opcion->pregunta_id = 8;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Sí, pero no en el último año";
        $opcion->valor = 1;
        $opcion->pregunta_id = 8;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Sí, en el último año";
        $opcion->valor = 2;
        $opcion->pregunta_id = 8;
        $opcion->save();

        //9
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 9;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Menos de una vez al mes";
        $opcion->valor = 1;
        $opcion->pregunta_id = 9;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Mensualmente";
        $opcion->valor = 2;
        $opcion->pregunta_id = 9;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Semanalmente";
        $opcion->valor = 3;
        $opcion->pregunta_id = 9;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Diario o casi diario";
        $opcion->valor = 4;
        $opcion->pregunta_id = 9;
        $opcion->save();

        //10
        $opcion = new Opcion();
        $opcion->opcion = "No";
        $opcion->valor = 0;
        $opcion->pregunta_id = 10;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Sí, pero no en el último año";
        $opcion->valor = 1;
        $opcion->pregunta_id = 10;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Sí, en el último año";
        $opcion->valor = 2;
        $opcion->pregunta_id = 10;
        $opcion->save();

        //OPCIONES DEPRESIÓN

        //1
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 11;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Varios días";
        $opcion->valor = 1;
        $opcion->pregunta_id = 11;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Más de la mitad de los días";
        $opcion->valor = 2;
        $opcion->pregunta_id = 11;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Casi todos los días";
        $opcion->valor = 3;
        $opcion->pregunta_id = 11;
        $opcion->save();

        //2
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 12;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Varios días";
        $opcion->valor = 1;
        $opcion->pregunta_id = 12;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Más de la mitad de los días";
        $opcion->valor = 2;
        $opcion->pregunta_id = 12;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Casi todos los días";
        $opcion->valor = 3;
        $opcion->pregunta_id = 12;
        $opcion->save();

        //3
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 13;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Varios días";
        $opcion->valor = 1;
        $opcion->pregunta_id = 13;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Más de la mitad de los días";
        $opcion->valor = 2;
        $opcion->pregunta_id = 13;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Casi todos los días";
        $opcion->valor = 3;
        $opcion->pregunta_id = 13;
        $opcion->save();

        //4
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 14;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Varios días";
        $opcion->valor = 1;
        $opcion->pregunta_id = 14;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Más de la mitad de los días";
        $opcion->valor = 2;
        $opcion->pregunta_id = 14;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Casi todos los días";
        $opcion->valor = 3;
        $opcion->pregunta_id = 14;
        $opcion->save();

        //5
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 15;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Varios días";
        $opcion->valor = 1;
        $opcion->pregunta_id = 15;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Más de la mitad de los días";
        $opcion->valor = 2;
        $opcion->pregunta_id = 15;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Casi todos los días";
        $opcion->valor = 3;
        $opcion->pregunta_id = 15;
        $opcion->save();

        //6
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 16;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Varios días";
        $opcion->valor = 1;
        $opcion->pregunta_id = 16;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Más de la mitad de los días";
        $opcion->valor = 2;
        $opcion->pregunta_id = 16;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Casi todos los días";
        $opcion->valor = 3;
        $opcion->pregunta_id = 16;
        $opcion->save();

        //7
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 17;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Varios días";
        $opcion->valor = 1;
        $opcion->pregunta_id = 17;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Más de la mitad de los días";
        $opcion->valor = 2;
        $opcion->pregunta_id = 17;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Casi todos los días";
        $opcion->valor = 3;
        $opcion->pregunta_id = 17;
        $opcion->save();

        //8

        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 18;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Varios días";
        $opcion->valor = 1;
        $opcion->pregunta_id = 18;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Más de la mitad de los días";
        $opcion->valor = 2;
        $opcion->pregunta_id = 18;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Casi todos los días";
        $opcion->valor = 3;
        $opcion->pregunta_id = 18;
        $opcion->save();

        //9
        $opcion = new Opcion();
        $opcion->opcion = "Nunca";
        $opcion->valor = 0;
        $opcion->pregunta_id = 19;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Varios días";
        $opcion->valor = 1;
        $opcion->pregunta_id = 19;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Más de la mitad de los días";
        $opcion->valor = 2;
        $opcion->pregunta_id = 19;
        $opcion->save();

        $opcion = new Opcion();
        $opcion->opcion = "Casi todos los días";
        $opcion->valor = 3;
        $opcion->pregunta_id = 19;
        $opcion->save();

        //OPCIONES MDQ

    
    }
}
