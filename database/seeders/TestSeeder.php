<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test = new Test();
        $test->nombreTest = 'Audit';
        $test->descripcion = 'Test de evaluación del consumo de alcohol';
        $test->save();

        $test = new Test();
        $test->nombreTest = 'PHQ-9';
        $test->descripcion = 'Test de evaluación de la depresión PHQ-9';
        $test->save();

        $test = new Test();
        $test->nombreTest = 'MDQ';
        $test->descripcion = 'Test Mood Disorder Questionnaire';
        $test->save();

        $test = new Test();
        $test->nombreTest = 'DEP-ADO';
        $test->descripcion = 'Test de evaluación del consumo de drogas y alcohol';
        $test->save();

        $test = new Test();
        $test->nombreTest = 'EDDS';
        $test->descripcion = 'Test para evaluar la relación con la comida y los trastornos alimentarios';
        $test->save();

        $test = new Test();
        $test->nombreTest = 'BHS';
        $test->descripcion = 'Escala de Desesperanza de Beck. Evalúa la actitud y perspectiva hacia el futuro de una persona, así como su nivel de desesperanza';
        $test->save();

        $test = new Test();
        $test->nombreTest = 'Ansiedad';
        $test->descripcion = 'Escala de Ansiedad. Evalúa los niveles de ansiedad en diferentes situaciones y contextos';
        $test->save();

        $test = new Test();
        $test->nombreTest = 'Estres';
        $test->descripcion = 'Cuestionario para evaluar el nivel de estrés en una persona';
        $test->save();

        $test = new Test();
        $test->nombreTest = 'Afeccion';
        $test->descripcion = 'Evalúa la afectación académica debido a problemas emocionales o de estrés';
        $test->save();
    }
}
