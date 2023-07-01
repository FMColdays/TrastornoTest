<?php

namespace App\Http\Controllers;


use App\Http\Requests\GuardarTestStoreRequest;
use App\Http\Requests\RegistrarseStoreRequest;
use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\Instituto;
use App\Models\OpcionSelecionada;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Semestre;
use App\Models\Test;
use App\Models\TestRealizado;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class SistemaController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function validar(Request $request)
    {
        $encontrado = Estudiante::where('correo', $request->input('correo'))->first();
        if (!is_null($encontrado)) {
            $conincide = Hash::check($request->input('contraseña'), $encontrado->contraseña);
            if ($conincide) {
                Auth::guard('guard_estudiantes')->login($encontrado);
                $_SESSION['AuthGuard'] = 'guard_estudiantes';
                return redirect('@me');
            } else {
                return redirect('login')->with('mensaje', 'Datos erróneos. Por favor, inténtelo otra vez');
            }
        } else {
            return redirect('login')->with('mensaje', 'Datos erróneos. Por favor, inténtelo otra vez');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function registro()
    {
        $institutos = Instituto::all();
        $carreras = Carrera::all();
        $semestres = Semestre::all();
        return view('auth.registro', compact('institutos', 'carreras', 'semestres'));
    }

    public function registrarse(RegistrarseStoreRequest $request)
    {
        $estudiante = new Estudiante();
        $estudiante->fill($request->all());
        $estudiante->contraseña = Hash::make($request->input('contraseña'));
        $estudiante->save();

        Auth::guard('guard_estudiantes')->login($estudiante);
        $_SESSION['AuthGuard'] = 'guard_estudiantes';
        return redirect('@me');
    }


    public function inicio()
    {
        $tests = Test::all();
        $testRealizados = TestRealizado::where('estudiante_id', auth()->user()->id)->get();
        return view('inicio', compact('tests', 'testRealizados'));
    }


    public function test(Request $request)
    {
        try {
            $nombre = trim(parse_url($request->url(), PHP_URL_PATH), '/');
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

    public function testRealizado($nombreTestRealizado)
    {
        try {
            $testRealizado = TestRealizado::where('nombre', $nombreTestRealizado)->firstOrFail();
            $this->authorize('viewRealizado', $testRealizado);

            $nombre = $testRealizado->test->nombreTest;
            $preguntas = Pregunta::where('test_id', $testRealizado->test->id)->get();
            $opciones = OpcionSelecionada::where('test_realizado_id', $testRealizado->id)->get();
            return view('test.testRealizado', compact('preguntas', 'opciones', 'nombre'));
        } catch (AuthorizationException) {
            return redirect('@me');
        } catch (ModelNotFoundException) {
            return redirect('@me');
        }
    }

    public function GuardarTest(GuardarTestStoreRequest $request)
    {

        try {
            $opciones = $request->except('_token', 'test_id', 'nombre');
            $test = Test::where('nombreTest', decrypt($request->input('nombre')))->first();
            $testRealizado = TestRealizado::where('test_id', $test->id)->where('estudiante_id', auth()->user()->id)->first();
            if ($testRealizado !== null) $this->authorize('viewTest',  $testRealizado);

            $randomString1 = substr(base_convert(mt_rand(), 10, 36), 1);
            $randomString2 = substr(base_convert(time(), 10, 36), 1);
            $test_realizado = new TestRealizado;
            $test_realizado->nombre = decrypt($request->input('nombre')) . "-" . $randomString1 . $randomString2;
            $test_realizado->test_id = decrypt($request->input('test_id'));
            $test_realizado->estudiante_id = auth()->user()->id;
            $test_realizado->save();

            foreach ($opciones as $preguntaID => $opcion) {

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
            return redirect('@me');
        } catch (AuthorizationException) {
            return redirect('@me');
        }
    }

    public function resultado(){
        return view('test.resultado');
    }

    public function descagarPDF()
    {
        try {
            $this->authorize('permisoPDF', App\Models\TestRealizado::class);
            $testRealizado = TestRealizado::where('estudiante_id', auth()->user()->id)->get();
            $pdf = Pdf::loadView('pdf.descargar', compact('testRealizado'));
            return $pdf->stream('test.pdf');
        } catch (AuthorizationException) {
            return redirect('@me');
        }
    }
}
