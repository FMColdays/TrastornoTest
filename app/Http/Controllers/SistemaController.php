<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrarseStoreRequest;
use App\Models\Administrador;
use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\Instituto;
use App\Models\Semestre;
use App\Models\Test;
use App\Models\TestRealizado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SistemaController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function validar(Request $request)
    {
        try {
            $encontrado = Administrador::where('correo', $request->input('correo'))->first();

            if (is_null($encontrado)) {
                $encontrado = Estudiante::where('correo', $request->input('correo'))->first();
                if (is_null($encontrado)) {
                    return redirect('login')->with('mensaje', 'Datos erróneos. Por favor, inténtelo otra vez');
                } else {
                    $conincide = Hash::check($request->input('contraseña'), $encontrado->contraseña);
                    if ($conincide) {
                        Auth::guard('guard_estudiantes')->login($encontrado);
                        $_SESSION['AuthGuard'] = 'guard_estudiantes';
                        return redirect('@me');
                    } else {
                        return redirect('login')->with('mensaje', 'Datos erróneos. Por favor, inténtelo otra vez');
                    }
                }
            } else {
                $conincide = Hash::check($request->input('contraseña'),  $encontrado->contraseña);
                if ($conincide) {
                    Auth::guard('guard_administrador')->login($encontrado);
                    $_SESSION['AuthGuard'] = 'guard_administrador';
                    return redirect('@me');
                } else {
                    return redirect('login')->with('mensaje', 'Datos erróneos. Por favor, inténtelo otra vez');
                }
            }
        } catch (Exception) {
            return redirect('login')->with('mensaje', 'Algo salió mal, intentelo otra vez');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function registro()
    {

        $datosTablaPivot = DB::table('carrera_instituto')
        ->join('institutos', 'carrera_instituto.instituto_id', '=', 'institutos.id')
        ->join('carreras', 'carrera_instituto.carrera_id', '=', 'carreras.id')
        ->select(
            'institutos.nombre_instituto',
            'carreras.id',
            'carreras.nombre_carrera',
            'carreras.modalidad',
            'carrera_instituto.instituto_id',   
        )->get();

        $institutos = Instituto::all();
        $semestres = Semestre::all();
        return view('auth.registro', compact('institutos', 'datosTablaPivot', 'semestres'));
    }

    public function registrarse(RegistrarseStoreRequest $request)
    {
        try {
            $estudiante = new Estudiante();
            $estudiante->fill($request->all());
            $estudiante->contraseña = Hash::make($request->input('contraseña'));
            $estudiante->save();

            Auth::guard('guard_estudiantes')->login($estudiante);
            $_SESSION['AuthGuard'] = 'guard_estudiantes';
            return redirect('@me');
        } catch (Exception) {
            return redirect('login')->with('mensaje', 'Algo salió mal, inténtelo otra vez');
        }
    }


    public function inicio()
    {
        $tests = Test::all();
        if ($_SESSION['AuthGuard'] == 'guard_administrador') {
            return view('admin.inicio');
        } elseif ($_SESSION['AuthGuard'] == 'guard_estudiantes') {
            $testRealizados = TestRealizado::where('estudiante_id', auth()->user()->id)->get();
            return view('inicio', compact('tests', 'testRealizados'));
        }
    }
}
