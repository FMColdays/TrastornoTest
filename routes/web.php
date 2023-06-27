<?php

use App\Http\Controllers\SistemaController;
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

Route::redirect('/', '@me');

Route::get('login', [SistemaController::class, 'login'])->name('login')->middleware('guest');
Route::post('validar', [SistemaController::class, 'validar'])->name('validar');
Route::get('logout', [SistemaController::class, 'logout'])->name(("logout"));

Route::get('registro', [SistemaController::class, 'registro'])->name('registro');
Route::post('registrarse', [SistemaController::class, 'registrarse'])->name('registrarse');

Route::get('@me', [SistemaController::class, 'inicio'])->name('@me')->middleware('auth');

Route::get('Audit', [SistemaController::class, 'test'])->name('Audit')->middleware('auth');
Route::get('PHQ-9', [SistemaController::class, 'test'])->name('PHQ-9')->middleware('auth');
Route::get('MDQ', [SistemaController::class, 'test'])->name('MDQ')->middleware('auth');
Route::get('DEP-ADO', [SistemaController::class, 'test'])->name('DEP-ADO')->middleware('auth');
Route::get('EDDS', [SistemaController::class, 'test'])->name('EDDS')->middleware('auth');
Route::get('BHS', [SistemaController::class, 'test'])->name('BHS')->middleware('auth');
Route::get('Ansiedad', [SistemaController::class, 'test'])->name('Ansiedad')->middleware('auth');
Route::get('Estres', [SistemaController::class, 'test'])->name('Estres')->middleware('auth');
Route::get('Afeccion', [SistemaController::class, 'test'])->name('Afeccion')->middleware('auth');


Route::get('testrealizado/{testrealizado}', [SistemaController::class, 'testRealizado'])->name('testRealizado')->middleware('auth');
Route::post('guardarTest', [SistemaController::class, 'GuardarTest'])->name('guardarTest');
