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
        $test = Test::where('nombreTest', $nombre)->first();

        $valor = 0;
        $idTest = 0;

        try {

            if ($test->nombreTest == 'Ansiedad') {
                $suma = $suma / 20;
            } elseif ($test->nombreTest == 'Estres') {
                $suma = $suma / 30;
            } elseif ($test->nombreTest == 'Afeccion-Academica') {
                $suma = $suma / 30;
            }


            if ($suma <= $test->valor1) {
                $res = $test->resultado1;
                $valor = 1;
            } elseif ($suma <= $test->valor2) {
                $res = $test->resultado2;
                $valor = 2;
            } else {
                $res = $test->resultado3;
                $valor = 3;
            }

            $resultado = new Resultado;
            $resultado->estudiante_id = auth()->user()->id;
            $resultado->nombre_test = $test->nombreTest;
            $resultado->test_id = $test->id;
            $resultado->resultado = $valor;
            $resultado->save();
            return view('test.resultado', compact('res', 'nombre'));
        } catch (Exception) {
        }

        return redirect('@me');
    }
}
