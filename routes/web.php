<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\AvionController;
use App\Http\Controllers\compraController;


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
    return view('index');
});

//registro clientes
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/sign', [AuthController::class, 'sign'])->name('sign');
Route::post('/api/crear-cliente', [AuthController::class, 'crearCliente'])->name('crearCliente');

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/api/agregar-aeronave', [AdminController::class, 'agregarAeronave'])->name('agregarAeronave');
Route::get('/editar-aeronave/{id}', [AdminController::class, 'editarAeronave'])->name('editarAeronave');
Route::get('/api/confirm-eliminar-aeronave/{id}', [AdminController::class, 'verEliminarAeronave'])->name('verEliminarAeronave');
Route::get('/api/eliminar-aeronave/{id}', [AdminController::class, 'eliminarAeronave'])->name('eliminarAeronave');
Route::post('/api/actualizar-aernave/{id}', [AdminController::class, 'actualizarAeronave'])->name('actualizarAeronave');
Route::get('/destinos', [DestinoController::class, 'index'])->name('destinos');


Route::get('/comprar-boletos', [compraController::class, 'index'])->name('compraBoletos');
