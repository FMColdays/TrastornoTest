<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InstitutoController;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestRealizadoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

Route::get('login', [SistemaController::class, 'login'])->name('login')->middleware('guest');
Route::post('validar', [SistemaController::class, 'validar'])->name('validar')->middleware('guest');
Route::get('logout', [SistemaController::class, 'logout'])->name(("logout"))->middleware('auth');

Route::get('registro', [SistemaController::class, 'registro'])->name('registro')->middleware('guest');
Route::post('registrarse', [SistemaController::class, 'registrarse'])->name('registrarse')->middleware('guest');

Route::get('@me', [SistemaController::class, 'inicio'])->name('@me')->middleware('auth');

// Administrador
Route::resource('estudiantes', EstudianteController::class)->middleware('auth');
Route::resource('institutos', InstitutoController::class)->middleware('auth');
Route::resource('carreras', CarreraController::class)->middleware('auth');
Route::resource('test', TestController::class)->middleware('auth');
Route::resource('testRealizado', TestRealizadoController::class)->middleware('auth');


// Estudiantes
Route::get('resultado', [TestRealizadoController::class, 'resultado'])->name('resultado')->middleware('auth');
