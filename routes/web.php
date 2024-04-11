<?php

use App\Http\Controllers\DestinoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AvionController;
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
Route::get('/destinos', [DestinoController::class, 'index'])->name('destinos');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/aeronaves', [AvionController::class, 'index'])->name('aviones');
Route::post('/guardar-aeronave', [AvionController::class, 'agregarAeronave'])->name('guardarAeronave');
