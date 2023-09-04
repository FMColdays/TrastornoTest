<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use App\Models\Pregunta;
use App\Models\Test;
use App\Models\TestRealizado;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->authorize('verTestAdmin', App\Models\Test::class);
            $tests = Test::all();
            return view('admin.tests.index', compact('tests'));
        } catch (AuthorizationException) {
            return redirect('@me');
        }
    }

    public function create()
    {
        try {
            $this->authorize('crearTest', App\Models\Test::class);
            return view('admin.tests.agregar');
        } catch (Exception) {
            return redirect('@me');
        }
    }

    public function store(Request $request)
    {
        $contadorPregunta = 0;

        $test = new Test();
        $test->nombreTest = str_replace(" ", "-", $request->input('nombre'));
        $test->save();

        foreach ($request->input('pregunta') as $pregunta) {
            $contadorPregunta++;
            $contadorRespuesta = 0;

            $preguntaT = new Pregunta();
            $preguntaT->test_id = $test->id;
            $preguntaT->pregunta = $pregunta;
            $preguntaT->save();


            foreach ($request->input('respuesta' . $contadorPregunta) as $respuesta) {
                $contadorRespuesta++;
                $opciones = new Opcion();
                $opciones->pregunta_id = $preguntaT->id;
                $opciones->opcion = $respuesta;
                $opciones->valor = $contadorRespuesta;
                $opciones->save();
            }
        }

        return redirect('test');
    }

    public function show(Test $test)
    {
        try {
            $nombre = $test->nombreTest;
            $test = Test::where('nombreTest', $nombre)->first();
            $testRealizado = TestRealizado::where('test_id', $test->id)->where('estudiante_id', auth()->user()->id)->first();

            if ($testRealizado !== null) $this->authorize('viewTest',  $testRealizado);

            $colores = ['#9AFAC2', '#FAF499', '#FA8E7D', '#FAA8EF', '#CCD3FA', '#C3F9F9', '#9FFA9B'];
            $color = $colores[array_rand($colores)];
            $preguntas = Pregunta::where('test_id', $test->id)->get();

            return view('test.test', compact('preguntas', 'test', 'nombre', 'color'));
        } catch (AuthorizationException) {
            return redirect('@me');
        }
    }

    public function edit(Test $test)
    {
        $preguntas = Pregunta::where('test_id', $test->id)->get();
        return view('admin.tests.editar', compact('test', 'preguntas'));
    }

    public function update(Request $request, Test $test)
    {

        //Cambio el nombre del test
        $test->nombreTest = str_replace(" ", "-", $request->input('nombre'));
        $test->save();

        //Guardo todos los id de las preguntas del test
        $idPreguntasTest = array();
        foreach ($test->preguntas as $pregunta) {
            array_push($idPreguntasTest, $pregunta->id);
        }

        //Reviso que preguntas se eliminaron y guardo sus id en un array
        $preguntasEliminadas =  array_values(array_diff($idPreguntasTest, $request->input('id')));

        //Reviso que haya preguntas eliminadas y si las hay las elimino por su id
        if ($preguntasEliminadas) {
            foreach ($preguntasEliminadas as $preguntaEliminada) {
                $pregunta = Pregunta::find($preguntaEliminada);
                $pregunta->delete();
            }
        }


        //Reviso que preguntas se modificaron y las guardo en un array
        $preguntasEditadas =  array_values(array_intersect($idPreguntasTest, $request->input('id')));

        //Reviso que haya preguntas editadas y si las hay las edito por su id
        if ($preguntasEditadas) {
            $contadorDePreguntas = 0;
            foreach ($preguntasEditadas as $preguntaEditada) {
                $pregunta = Pregunta::find($preguntaEditada);
                $pregunta->pregunta = $request->input('pregunta')[$contadorDePreguntas++];
                $pregunta->save();


                //Guardo todos los id de las opciones de la pregunta
                $idOpcionesPregunta = array();
                $numeroDeOpciones = 0;

                foreach ($pregunta->opciones as $opcion) {
                    $numeroDeOpciones++;
                    array_push($idOpcionesPregunta, $opcion->id);
                }
                $numeroOpcionesMenos = $numeroDeOpciones;

                //Reviso que opciones se eliminaron y guardo sus id en un array
                $opcionesEliminadas =  array_values(array_diff($idOpcionesPregunta, $request->input('idRespuesta' . $preguntaEditada)));

                //Reviso que haya opciones eliminadas y si las hay las elimino por su id
                if ($opcionesEliminadas) {
                    foreach ($opcionesEliminadas as $opcionEliminada) {
                        $opcion = Opcion::find($opcionEliminada);
                        $opcion->delete();
                    }
                }



                //Agregar nuevas opciones a las preguntas si es que hay
                if ($request->input('respuestaN' . $preguntaEditada)) {
                    foreach ($request->input('respuestaN' . $preguntaEditada) as $respuesta) {
                        $numeroDeOpciones++;
                        $opciones = new Opcion();
                        $opciones->pregunta_id = $pregunta->id;
                        $opciones->opcion = $respuesta;
                        $opciones->valor = $numeroDeOpciones;
                        $opciones->save();
                    }
                }


                //Editar opciones
                $valorDeOpcion = $numeroDeOpciones - $numeroOpcionesMenos;
                $total = count($pregunta->opciones) - count($opcionesEliminadas);

                if ($request->input('respuesta' . $preguntaEditada)) {
                    $contadorDeRespuestas = 0;
                    foreach ($pregunta->opciones as $opcion) {
                        if ($contadorDeRespuestas < $total) {
                            $opcion->opcion = $request->input('respuesta' . $preguntaEditada)[$contadorDeRespuestas++];
                            $opcion->valor = $valorDeOpcion;
                            $opcion->save();
                            $valorDeOpcion++;
                        }
                    }
                }
            }
        }


        //Reviso que preguntas se agregaron y las guardo en un array
        if ($request->input('valores')) {
            $arrayCombinado = array_combine($request->input('valores'), $request->input('preguntaN'));
            foreach ($arrayCombinado as $valores => $preguntaN) {
                $valorDeOpcion = 0;

                $pregunta = new Pregunta();
                $pregunta->test_id = $test->id;
                $pregunta->pregunta = $preguntaN;
                $pregunta->save();

                foreach ($request->input('respuestaN' . $valores) as $respuestaN) {
                    $valorDeOpcion++;
                    $opciones = new Opcion();
                    $opciones->pregunta_id = $pregunta->id;
                    $opciones->opcion = $respuestaN;
                    $opciones->valor = $valorDeOpcion;
                    $opciones->save();
                }
            }
        }



        return redirect()->route('test.index');
    }

    public function destroy(Test $test)
    {
        //
    }
}
