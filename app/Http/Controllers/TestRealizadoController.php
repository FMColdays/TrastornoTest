<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use App\Models\OpcionSelecionada;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Resultado;
use App\Models\Test;
use App\Models\TestRealizado;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TestRealizadoController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try {

            $opciones = $request->except('_token', 'test_id', 'nombre');

            $test = Test::where('nombreTest', decrypt($request->input('nombre')))->first();
            $testRealizado = TestRealizado::where('test_id', $test->id)->where('estudiante_id', auth()->user()->id)->first();
            if ($testRealizado !== null) $this->authorize('viewTest',  $testRealizado); //Si ya realizo el test lo regresa

            $test_realizado = new TestRealizado;
            $test_realizado->nombre = uniqid(decrypt($request->input('nombre')) . '_');
            $test_realizado->test_id = decrypt($request->input('test_id'));
            $test_realizado->estudiante_id = auth()->user()->id;
            $test_realizado->save();

            $suma = 0;
            foreach ($opciones as $preguntaID => $opcion) {
                $opcionValor = Opcion::where('id', $opcion)->first();
                $suma += $opcionValor->valor;
                $opcionSeleccionada = new OpcionSelecionada;
                $opcionSeleccionada->opcion_id = $opcion;
                $opcionSeleccionada->test_realizado_id = $test_realizado->id;
                $opcionSeleccionada->save();

                $nueva_respuesta = new Respuesta;
                $nueva_respuesta->estudiante_id = auth()->user()->id;
                $nueva_respuesta->test_id = decrypt($request->input('test_id'));
                $nueva_respuesta->pregunta_id = $preguntaID;
                $nueva_respuesta->opcion_id =  $opcion;
                $nueva_respuesta->save();
            }



            if (auth()->user()->testRealizado()->count() > 8) {
                auth()->user()->id_certificado = uniqid();
                auth()->user()->save();
            }


            return redirect('resultado')->with(['suma' => $suma, 'nombreTest' => $test->nombreTest]);
        } catch (Exception) {
            return redirect('@me');
        }
    }

    public function show(TestRealizado $testRealizado)
    {
        try {

            $this->authorize('viewRealizado', $testRealizado);

            $nombre = $testRealizado->test->nombreTest;
            $preguntas = Pregunta::where('test_id', $testRealizado->test->id)->get();
            $opciones = OpcionSelecionada::where('test_realizado_id', $testRealizado->id)->get();
            return view('test.testRealizado', compact('preguntas', 'opciones', 'nombre'));
        } catch (Exception) {
            return redirect('@me');
        }
    }

    public function edit(TestRealizado $testRealizado)
    {
        //
    }

    public function update(Request $request, TestRealizado $testRealizado)
    {
        //
    }

    public function destroy(TestRealizado $testRealizado)
    {
        //
    }


    public function resultado()
    {

        $suma = session('suma');
        $nombre = session('nombreTest');
        $valor = 0;
        $idTest = 0;

        try {
            if ($nombre == 'Audit') {
                $idTest = 1;
                if ($suma <= 7) {
                    $res = "Consumo de alcohol de bajo riesgo";
                    $valor = 1;
                } elseif ($suma <= 15) {
                    $res = "Consumo de alcohol de riesgo";
                    $valor = 2;
                } else {
                    $res = "Posibilidad de trastorno por consumo de alcohol";
                    $valor = 3;
                }
            } elseif ($nombre == 'PHQ-9') {
                $idTest = 2;
                if ($suma <= 4) {
                    $res = "Ausencia de síntomas depresivos";
                    $valor = 1;
                } elseif ($suma <= 9) {
                    $res = "Síntomas leves de depresión";
                    $valor = 1;
                } elseif ($suma <= 14) {
                    $res = "Síntomas moderados de depresión";
                    $valor = 2;
                } elseif ($suma <= 19) {
                    $res = "Síntomas moderadamente graves de depresión";
                    $valor = 2;
                } else {
                    $res = "Síntomas de depresión grave";
                    $valor = 3;
                }
            } elseif ($nombre == 'MDQ') {
                $idTest = 3;
                if ($suma <= 7) {
                    $res = "Sin riesgo de desorden de personalidad";
                    $valor = 1;
                } elseif ($suma <= 10) {
                    $res = "Probabilidad de desorden de personalidad";
                    $valor = 2;
                } else {
                    $res = "Riesgo de desorden de personalidad";
                    $valor = 3;
                }
            } elseif ($nombre == 'DEP-ADO') {
                $idTest = 4;
                if ($suma <= 10) {
                    $res = "Bajo riesgo en consumo de drogas";
                    $valor = 1;
                } elseif ($suma <= 30) {
                    $res = "Propenso a adicciones en el consumo de drogas";
                    $valor = 2;
                } elseif ($suma <= 40) {
                    $res = "Alto riesgo con el consumo de drogas";
                    $valor = 2;
                } else {
                    $res = "Riesgo muy alto con el consumo de drogas";
                    $valor = 3;
                }
            } elseif ($nombre == 'EDDS') {
                $idTest = 5;
                if ($suma <= 21) {
                    $res = "Bajo riesgo de desorden alimenticio";
                    $valor = 1;
                } elseif ($suma <= 43) {
                    $res = " Probabilidad moderada de desorden alimenticio";
                    $valor = 2;
                } else {
                    $res = " Probabilidad alta de desorden alimenticio";
                    $valor = 3;
                }
            } elseif ($nombre == 'BHS') {
                $idTest = 6;
                if ($suma <= 3) {
                    $res = "Nivel bajo de desesperanza";
                    $valor = 1;
                } elseif ($suma <= 8) {
                    $res = "Nivel moderado de desesperanza";
                    $valor = 2;
                } else {
                    $res = "Nivel alto de desesperanza";
                    $valor = 3;
                }
            } elseif ($nombre == 'Ansiedad') {
                $idTest = 7;
                $promedio = $suma / 20;
                if ($promedio <= 2) {
                    $res = "Sin riesgo de ansiedad";
                    $valor = 1;
                } elseif ($promedio <= 3) {
                    $res = "Ansiedad moderada";
                    $valor = 2;
                } else {
                    $res = "Ansiedad severa";
                    $valor = 3;
                }
            } elseif ($nombre == 'Estres') {
                $idTest = 8;
                $promedio = $suma / 30;

                if ($promedio <= 2) {
                    $res = "Sin riesgo de estres";
                    $valor = 1;
                } elseif ($promedio <= 3) {
                    $res = "Estres moderado";
                    $valor = 2;
                } else {
                    $res = "Estres severo";
                    $valor = 3;
                }
            } elseif ($nombre == 'Afeccion-Academica') {
                $idTest = 9;
                $promedio = $suma / 30;

                if ($promedio <= 2) {
                    $res = "Sin afectación académica";
                    $valor = 1;
                } elseif ($promedio <= 3) {
                    $res = "Afectación académica leve";
                    $valor = 2;
                } elseif ($promedio <= 4) {
                    $res = "Afectación académica moderada";
                    $valor = 2;
                } else {
                    $res = "Afectación académica severa";
                    $valor = 3;
                }
            }

            if ($res !== '') {
                $resultado = new Resultado;
                $resultado->estudiante_id = auth()->user()->id;
                $resultado->nombre_test = $nombre;
                $resultado->test_id = $idTest;
                $resultado->resultado= $valor;
                $resultado->save();
                return view('test.resultado', compact('res', 'nombre'));
            }
        } catch (Exception) {
        }

        return redirect('@me');
    }
}
