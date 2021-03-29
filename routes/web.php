<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\ReservaCitaController;
use App\Http\Controllers\EstadisticaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\EquipamientoController;
use App\Http\Controllers\ServicioController;

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('oculuxDashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/**SARIAH */

/**======================================================================== */
/**                               S A R I A H                               */
/**======================================================================== */

/**Reserva Cita */
Route::get('/ReservaCita/index', [ReservaCitaController::class, 'index'])->middleware(['auth'])->name('reservaCita_index');
Route::get('/ReservaCita/create', [ReservaCitaController::class, 'create'])->middleware(['auth'])->name('reservaCita_create');
Route::post('/ReservaCita/store', [ReservaCitaController::class, 'store'])->middleware(['auth'])->name('reservaCita_store');
Route::get('/ReservaCita/show/{id}', [ReservaCitaController::class, 'show'])->middleware(['auth'])->name('reservaCita_show');
Route::get('/ReservaCita/edit/{id}', [ReservaCitaController::class, 'edit'])->middleware(['auth'])->name('reservaCita_edit');
Route::put('/ReservaCita/update/{id}', [ReservaCitaController::class, 'update'])->middleware(['auth'])->name('reservaCita_update');
Route::delete('/ReservaCita/destroy/{id}', [ReservaCitaController::class, 'destroy'])->middleware(['auth'])->name('reservaCita_destroy');






/**GUSTAVO */
/**-------------------------------GUSTAVO--------------------------------------- */
//Promociones
Route::get('/Promocion/index', [PromocionController::class, 'index'])->middleware(['auth'])->name('promocion_index');
Route::get('/Promocion/create', [PromocionController::class, 'create'])->middleware(['auth'])->name('promocion_create');
Route::post('/Promocion/store', [PromocionController::class, 'store'])->middleware(['auth'])->name('promocion_store');
Route::get('/Promocion/show/{id}', [PromocionController::class, 'show'])->middleware(['auth'])->name('promocion_show');
Route::get('/Promocion/edit/{id}', [PromocionController::class, 'edit'])->middleware(['auth'])->name('promocion_edit');
Route::put('/Promocion/update/{id}', [PromocionController::class, 'update'])->middleware(['auth'])->name('promocion_update');
Route::delete('/Promocion/destroy/{id}', [PromocionController::class, 'destroy'])->middleware(['auth'])->name('promocion_destroy');

//Equipamientos
Route::get('/Equipamiento/index', [EquipamientoController::class, 'index'])->middleware(['auth'])->name('equipamiento_index');
Route::get('/Equipamiento/create', [EquipamientoController::class, 'create'])->middleware(['auth'])->name('equipamiento_create');
Route::post('/Equipamiento/store', [EquipamientoController::class, 'store'])->middleware(['auth'])->name('equipamiento_store');
Route::get('/Equipamiento/show/{id}', [EquipamientoController::class, 'show'])->middleware(['auth'])->name('equipamiento_show');
Route::get('/Equipamiento/edit/{id}', [EquipamientoController::class, 'edit'])->middleware(['auth'])->name('equipamiento_edit');
Route::put('/Equipamiento/update/{id}', [EquipamientoController::class, 'update'])->middleware(['auth'])->name('equipamiento_update');
Route::delete('/Equipamiento/destroy/{id}', [EquipamientoController::class, 'destroy'])->middleware(['auth'])->name('equipamiento_destroy');

//Servicios
Route::get('/Servicio/index', [ServicioController::class, 'index'])->middleware(['auth'])->name('servicio_index');
Route::get('/Servicio/create', [ServicioController::class, 'create'])->middleware(['auth'])->name('servicio_create');
Route::post('/Servicio/store', [ServicioController::class, 'store'])->middleware(['auth'])->name('servicio_store');
Route::get('/Servicio/show/{id}', [ServicioController::class, 'show'])->middleware(['auth'])->name('servicio_show');
Route::get('/Servicio/edit/{id}', [ServicioController::class, 'edit'])->middleware(['auth'])->name('servicio_edit');
Route::put('/Servicio/update/{id}', [ServicioController::class, 'update'])->middleware(['auth'])->name('servicio_update');
Route::delete('/Servicio/destroy/{id}', [ServicioController::class, 'destroy'])->middleware(['auth'])->name('servicio_destroy');

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
Route::get('/Reporte/paciente', [ReporteController::class, 'reportePacientes'])->middleware(['auth'])->name('reporte_index_paciente');

/**Sesion */
Route::get('/logout', [UsuarioController::class, 'logout']);
