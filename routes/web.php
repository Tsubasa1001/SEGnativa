<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TrabajadorController;

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

Route::get('/dashboard', function () {
    return view('oculuxDashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/**SARIAH */
/**GUSTAVO */
/**EYVER */
Route::get('/Usuario/index', [UsuarioController::class, 'index']);
Route::get('/Paciente/index', [PacienteController::class, 'index']);
Route::get('/Trabajador/index', [TrabajadorController::class, 'index']);
Route::get('/Estadistica/index', [EstadisticaController::class, 'index']);
Route::get('/Reporte/index', [ReporteController::class, 'index']);

Route::get('/logout', [UsuarioController::class, 'logout']);
