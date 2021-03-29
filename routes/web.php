<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PromocionController;
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
//Promociones
Route::get('/Promocion/index', [PromocionController::class, 'index'])->middleware(['auth'])->name('promocion_index');
Route::get('/Promocion/create', [PromocionController::class, 'create'])->middleware(['auth'])->name('promocion_create');
Route::post('/Promocion/store', [PromocionController::class, 'store'])->middleware(['auth'])->name('promocion_store');
Route::get('/Promocion/show/{id}', [PromocionController::class, 'show'])->middleware(['auth'])->name('promocion_show');
Route::get('/Promocion/edit/{id}', [PromocionController::class, 'edit'])->middleware(['auth'])->name('promocion_edit');
Route::put('/Promocion/update/{id}', [PromocionController::class, 'update'])->middleware(['auth'])->name('promocion_update');
Route::delete('/Promocion/destroy/{id}', [PromocionController::class, 'destroy'])->middleware(['auth'])->name('promocion_destroy');

/**======================================================================== */
/**                               E Y V E R                                 */
/**======================================================================== */

/**Usuario */
Route::get('/Usuario/index', [UsuarioController::class, 'index'])->middleware(['auth'])->name('usuario_index');
Route::get('/Usuario/create', [UsuarioController::class, 'create'])->middleware(['auth'])->name('usuario_create');
Route::post('/Usuario/store', [UsuarioController::class, 'store'])->middleware(['auth'])->name('usuario_store');
Route::get('/Usuario/show/{id}', [UsuarioController::class, 'show'])->middleware(['auth'])->name('usuario_show');
Route::get('/Usuario/edit/{id}', [UsuarioController::class, 'edit'])->middleware(['auth'])->name('usuario_edit');
Route::put('/Usuario/update/{id}', [UsuarioController::class, 'update'])->middleware(['auth'])->name('usuario_update');
Route::delete('/Usuario/destroy/{id}', [UsuarioController::class, 'destroy'])->middleware(['auth'])->name('usuario_destroy');

/**Paciente */
Route::get('/Paciente/index', [PacienteController::class, 'index'])->middleware(['auth'])->name('paciente_index');
Route::get('/Paciente/create', [PacienteController::class, 'create'])->middleware(['auth'])->name('paciente_create');
Route::post('/Paciente/store', [PacienteController::class, 'store'])->middleware(['auth'])->name('paciente_store');
Route::get('/Paciente/show/{id}', [PacienteController::class, 'show'])->middleware(['auth'])->name('paciente_show');
Route::get('/Paciente/edit/{id}', [PacienteController::class, 'edit'])->middleware(['auth'])->name('paciente_edit');
Route::put('/Paciente/update/{id}', [PacienteController::class, 'update'])->middleware(['auth'])->name('paciente_update');
Route::delete('/Paciente/destroy/{id}', [PacienteController::class, 'destroy'])->middleware(['auth'])->name('paciente_destroy');

/**Trabajador */
Route::get('/Trabajador/index', [TrabajadorController::class, 'index'])->middleware(['auth'])->name('trabajador_index');
Route::get('/Trabajador/create', [TrabajadorController::class, 'create'])->middleware(['auth'])->name('trabajador_create');
Route::post('/Trabajador/store', [TrabajadorController::class, 'store'])->middleware(['auth'])->name('trabajador_store');
Route::get('/Trabajador/show/{id}', [TrabajadorController::class, 'show'])->middleware(['auth'])->name('trabajador_show');
Route::get('/Trabajador/edit/{id}', [TrabajadorController::class, 'edit'])->middleware(['auth'])->name('trabajador_edit');
Route::put('/Trabajador/update/{id}', [TrabajadorController::class, 'update'])->middleware(['auth'])->name('trabajador_update');
Route::delete('/Trabajador/destroy/{id}', [TrabajadorController::class, 'destroy'])->middleware(['auth'])->name('trabajador_destroy');

/**Estadistica */
Route::get('/Estadistica/index', [EstadisticaController::class, 'index'])->middleware(['auth'])->name('estadistica_index');

/**Reporte */
Route::get('/Reporte/index', [ReporteController::class, 'index'])->middleware(['auth'])->name('reporte_index');

/**Sesion */
Route::get('/logout', [UsuarioController::class, 'logout']);
