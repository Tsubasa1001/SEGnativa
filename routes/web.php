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

/**======================================================================== */
/**                               E Y V E R                                 */
/**======================================================================== */

/**Usuario */
Route::get('/Usuario/index', [UsuarioController::class, 'index'])->middleware(['auth'])->name('usuario_index');

/**Paciente */
Route::get('/Paciente/index', [PacienteController::class, 'index'])->middleware(['auth'])->name('paciente_index');

/**Trabajador */
Route::get('/Trabajador/index', [TrabajadorController::class, 'index'])->middleware(['auth'])->name('trabajador_index');

/**Estadistica */
Route::get('/Estadistica/index', [EstadisticaController::class, 'index'])->middleware(['auth'])->name('estadistica_index');

/**Reporte */
Route::get('/Reporte/index', [ReporteController::class, 'index'])->middleware(['auth'])->name('reporte_index');

/**Sesion */
Route::get('/logout', [UsuarioController::class, 'logout']);
