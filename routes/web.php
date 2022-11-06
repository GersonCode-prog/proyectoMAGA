<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CaderController;
use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TipopersonaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [AsistenciaController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/tipopersona', [TipopersonaController::class, 'index'])->middleware('auth')->name('tipopersona');
// Route::get('/tipopersona/{id}', [TipopersonaController::class, 'index'])->middleware('auth')->name('tipopersona');


Route::get('/comunidades', [ComunidadController::class, 'index'])->middleware('auth')->name('comunidades');


Route::get('/personas', [PersonaController::class, 'index'])->middleware('auth')->name('personas');
Route::get('/caderes', [CaderController::class, 'index'])->middleware('auth')->name('caderes');
Route::get('/capacitaciones', [CapacitacionController::class, 'index'])->middleware('auth')->name('capacitaciones');
Route::get('/asistencia/{capacitacion}', [AsistenciaController::class, 'index'])->middleware('auth')->name('asistencia');

Route::get('/pdf/{id}', [AsistenciaController::class, 'createPDF'])->middleware('auth')->name('pdf');








require __DIR__.'/auth.php';
