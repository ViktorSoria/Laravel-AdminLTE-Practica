<?php

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MovimientosController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/empleados', EmpleadoController::class)->names('empleado');
    Route::resource('/movimientos', MovimientosController::class)->names('movimientos');
    Route::resource('/roles', RoleController::class)->names('roles');
    Route::resource('/permisos', PermisosController::class)->names('permisos');
    Route::resource('/usuarios', AsignarController::class)->names('asignar');
    Route::resource('/user', UsuarioController::class)->names('user');
});

Route::get('/auth/redirect', [AuthController::class, 'redirect']);
Route::get('/auth/callback-url', [AuthController::class, 'callback']);

