<?php

namespace App\Http\Controllers;

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
        //
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
        return view('admin.tests.editar', compact('test'));
    }

    public function update(Request $request, Test $test)
    {
        //
    }

    public function destroy(Test $test)
    {
        //
    }
}
