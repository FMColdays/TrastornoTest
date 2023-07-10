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
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SistemaController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function validar(Request $request)
    {
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
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
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
        if ($_SESSION['AuthGuard'] == 'guard_administrador') {
            return view('admin.inicio');
        } elseif ($_SESSION['AuthGuard'] == 'guard_estudiantes') {
            $testRealizados = TestRealizado::where('estudiante_id', auth()->user()->id)->get();
            return view('inicio', compact('tests', 'testRealizados'));
        }
    }

}
