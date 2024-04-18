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
Route::post('/api/agregar-aeronave', [AdminController::class, 'agregarAeronave'])->name('agregarAeronave'); //agregar aeronave
Route::get('/editar-aeronave/{id}', [AdminController::class, 'editarAeronave'])->name('editarAeronave'); //editar aeronave
Route::get('/api/confirm-eliminar-aeronave/{id}', [AdminController::class, 'verEliminarAeronave'])->name('verEliminarAeronave'); //ver aeronave a eliminar
Route::get('/api/eliminar-aeronave/{id}', [AdminController::class, 'eliminarAeronave'])->name('eliminarAeronave'); //eliminar aeronave
Route::post('/api/actualizar-aeronave/{id}', [AdminController::class, 'actualizarAeronave'])->name('actualizarAeronave'); //actualizar aeronave

Route::post('/api/agregar-pais', [AdminController::class, 'agregarPais'])->name('agregarPais'); //agregar pais
Route::get('/editar-pais/{id}', [AdminController::class, 'editarPais'])->name('editarPais');
Route::post('/api/actualizar-pais/{id}', [AdminController::class, 'actualizarPais'])->name('actualizarPais'); //actualizar pais

//vistas
Route::post('/agregar-ciudad', [AdminController::class, 'agregarCiudad'])->name('agregarCiudad'); //agregar ciudad a un pais
Route::get('/destinos', [DestinoController::class, 'index'])->name('destinos');
Route::get('/comprar-boletos/{idAvion}', [compraController::class, 'index'])->name('compraBoletos');
