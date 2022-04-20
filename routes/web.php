<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('empleados', 'App\Http\Controllers\EmpleadoController');
Route::resource('vehiculos', 'App\Http\Controllers\VehiculoController');
Route::resource('limpiezas', 'App\Http\Controllers\LimpiezaController');
Route::resource('incidencias', 'App\Http\Controllers\IncidenciaController');
Route::resource('liquidaciones', 'App\Http\Controllers\LiquidacionController');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
