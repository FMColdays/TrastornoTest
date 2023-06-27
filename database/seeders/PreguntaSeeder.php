<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pregunta = new Pregunta();
        $pregunta->pregunta = '¿Qué tan frecuentemente ingiere bebidas alcohólicas?';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Durante el último año, ¿qué tan frecuentemente bebió a la mañana siguiente después de haber bebido en exceso el día anterior?';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = '¿Cuántas copas se toma en un día típico o común de los que bebe?';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Durante el último año, ¿qué tan frecuentemente se sintió culpable o tuvo remordimiento por haber bebido?';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = '¿Qué tan frecuentemente toma seis o más copas en la misma ocasión?';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Durante el último año, ¿qué tan frecuentemente olvidó algo de lo que había pasado cuando estuvo bebiendo?';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Durante el último año, ¿le ocurrió que no pudo parar de beber una vez que había empezado?';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = '¿Se ha lastimado o alguien ha resultado lastimado como consecuencia de su ingestión de alcohol?';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Durante el último año, ¿qué tan frecuentemente dejó de hacer algo que debería haber hecho por beber?';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = '¿Algún amigo, familiar o doctor se ha preocupado por la forma en que bebe o le ha sugerido que le baje?';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 1;
        $pregunta->save();

        //TEST DEPRESION

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Tener poco interés o placer en hacer las cosas';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 2;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Sentirse desanimado/a, deprimido/a, o sin esperanza';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 2;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Con problemas en dormirse o en mantenerse dormido/a, o en dormir demasiado';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 2;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Sentirse cansado/a o tener poca energía';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 2;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Tener poco apetito o comer en exceso';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 2;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Sentir falta de amor propio-o que sea un fracaso o que decepcionara a sí mismo/a su familia';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 2;
        $pregunta->save();
        
        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Tener dificultad para concentrarse en cosas tales como leer el periódico o mirar televisión';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 2;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Se mueve o habla tan lentamente que otra gente se podría dar cuenta- o de lo contrario, está tan agitado/a o inquieto/a que se mueve mucho más de lo acostumbrado';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 2;
        $pregunta->save();
        
        $pregunta = new Pregunta();
        $pregunta->pregunta = 'Se le han ocurrido pensamientos de que sería mejor estar muerto/a o de que haría daño de alguna manera';
        $pregunta->tipo_pregunta = 'Opciones';
        $pregunta->test_id = 2;
        $pregunta->save();

        //TEST MDQ









    }
}
