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

Route::get('/oculux', function () {
    return view('oculux');
})->middleware(['auth'])->name('oculux');

require __DIR__.'/auth.php';

/**SARIAH */
/**GUSTAVO */
/**EYVER */
Route::get('/Usuario/index', [UsuarioController::class, 'index']);
Route::get('/Paciente/index', [PacienteController::class, 'index']);
Route::get('/Trabajador/index', [TrabajadorController::class, 'index']);
