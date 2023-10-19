<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestStoreRequest;
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
    public function index(Request $request)
    {
        try {
            $this->authorize('verTestAdmin', App\Models\Test::class);
            $buscar = trim($request->input('buscar'));

            if ($buscar == '') {
                $tests = Test::latest()->paginate(6);
            } else {

                $tests = Test::when($buscar, function ($query, $buscar) {
                    return $query->where(function ($query) use ($buscar) {
                        $query->where('nombreTest', 'LIKE', '%' . $buscar . '%');
                    });
                })->latest()->paginate(PHP_INT_MAX);
            }

            if ($request->ajax()) {
                $view = view('admin.tests.load', compact('tests'))->render();
                return response()->json(['view' => $view, 'nextPageUrl' => $tests->nextPageUrl()]);
            }
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

    public function store(TestStoreRequest $request)
    {
        try {
            $this->authorize('crearTest', App\Models\Test::class);
            $test = new Test();
            $test->nombreTest = str_replace(" ", "-", $request->input('nombre'));
            $test->descripcion = $request->input('descripcion');
            $test->resultado1 = $request->input('resultado1');
            $test->valor1 = $request->input('valorRes1');
            $test->resultado2 = $request->input('resultado2');
            $test->valor2 = $request->input('valorRes2');
            $test->resultado3 = $request->input('resultado3');
            $test->valor3 = $request->input('valorRes3');
            $test->save();

            $arrayCombinado = array_combine($request->input('valores'), $request->input('pregunta'));

            foreach ($arrayCombinado as $valores => $pregunta) {

                $preguntaT = new Pregunta();
                $preguntaT->test_id = $test->id;
                $preguntaT->pregunta = $pregunta;
                $preguntaT->save();

                $arrayResVal = array_combine($request->input('respuesta' . $valores), $request->input('valorR' . $valores));
                foreach ($arrayResVal as $respuestaN => $valorR) {
                    $opciones = new Opcion();
                    $opciones->pregunta_id = $preguntaT->id;
                    $opciones->opcion = $respuestaN;
                    $opciones->valor = $valorR;
                    $opciones->save();
                }
            }

            return redirect('test');
        } catch (Exception) {
            return redirect('@me');
        }
    }

    public function show(Test $test)
    {
        try {
            $nombre = $test->nombreTest;
            $test = Test::where('nombreTest', $nombre)->first();
            $testRealizado = TestRealizado::where('test_id', $test->id)->where('estudiante_id', auth()->user()->id)->first();


            if ($testRealizado !== null) $this->authorize('viewTest',  $testRealizado);

            $this->authorize('verTest', App\Models\Estudiante::class);
            $colores = ['#9AFAC2', '#FAF499', '#FA8E7D', '#FAA8EF', '#CCD3FA', '#C3F9F9', '#9FFA9B'];
            $color = $colores[array_rand($colores)];
            $preguntas = Pregunta::where('test_id', $test->id)->get();

            return view('test.test', compact('preguntas', 'test', 'nombre', 'color'));
        } catch (Exception) {
            return redirect('@me');
        }
    }

    public function edit(Test $test)
    {
        try {
            $this->authorize('editarTest', App\Models\Test::class);
            $preguntas = Pregunta::where('test_id', $test->id)->get();
            return view('admin.tests.editar', compact('test', 'preguntas'));
        } catch (Exception) {
            return redirect('@me');
        }
    }

    public function update(Request $request, Test $test)
    {

        try {
            $this->authorize('editarTest', App\Models\Test::class);

            //Cambio el nombre del test
            $test->nombreTest = str_replace(" ", "-", $request->input('nombre'));
            $test->descripcion = $request->input('descripcion');
            $test->resultado1 = $request->input('resultado1');
            $test->valor1 = $request->input('valorRes1');
            $test->resultado2 = $request->input('resultado2');
            $test->valor2 = $request->input('valorRes2');
            $test->resultado3 = $request->input('resultado3');
            $test->valor3 = $request->input('valorRes3');
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

                    foreach ($pregunta->opciones as $opcion) {
                        array_push($idOpcionesPregunta, $opcion->id);
                    }

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
                        $respuestaValor = array_combine($request->input('respuestaN' . $preguntaEditada), $request->input('valorRN' . $preguntaEditada));
                        foreach ($respuestaValor as $respuesta => $valorN) {
                            $opciones = new Opcion();
                            $opciones->pregunta_id = $pregunta->id;
                            $opciones->opcion = $respuesta;
                            $opciones->valor = $valorN;
                            $opciones->save();
                        }
                    }


                    //Editar opciones
                    $total = count($pregunta->opciones) - count($opcionesEliminadas);

                    if ($request->input('respuesta' . $preguntaEditada)) {
                        $contadorDeRespuestas = 0;
                        foreach ($pregunta->opciones as $opcion) {
                            if ($contadorDeRespuestas < $total) {
                                $opcion->opcion = $request->input('respuesta' . $preguntaEditada)[$contadorDeRespuestas];
                                $opcion->valor = $request->input('valorR' . $preguntaEditada)[$contadorDeRespuestas];
                                $opcion->save();
                                $contadorDeRespuestas++;
                            }
                        }
                    }
                }
            }


            //Reviso que preguntas se agregaron y las guardo en un array
            if ($request->input('valores')) {
                $arrayCombinado = array_combine($request->input('valores'), $request->input('preguntaN'));
                foreach ($arrayCombinado as $valores => $preguntaN) {

                    $pregunta = new Pregunta();
                    $pregunta->test_id = $test->id;
                    $pregunta->pregunta = $preguntaN;
                    $pregunta->save();

                    $respuestaValor = array_combine($request->input('respuestaN' . $valores), $request->input('valorRN' . $valores));
                    foreach ($respuestaValor as $respuestaN => $valorN) {
                        $opciones = new Opcion();
                        $opciones->pregunta_id = $pregunta->id;
                        $opciones->opcion = $respuestaN;
                        $opciones->valor = $valorN;
                        $opciones->save();
                    }
                }
            }



            return redirect()->route('test.index');
        } catch (Exception) {
            return redirect('@me');
        }
    }

    public function destroy(Test $test)
    {
        try {
            $this->authorize('eliminarTest', App\Models\Test::class);

            $test->delete();
            return redirect()->route('test.index');
        } catch (Exception) {
            return redirect('@me');
        }
    }
}
