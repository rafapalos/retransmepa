<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('empleados', 'App\Http\Controllers\EmpleadoController');
Route::resource('vehiculos', 'App\Http\Controllers\VehiculoController');
Route::resource('limpiezas', 'App\Http\Controllers\LimpiezaController');
Route::resource('incidencias', 'App\Http\Controllers\IncidenciaController');
Route::resource('liquidaciones', 'App\Http\Controllers\LiquidacionController');
Route::resource('usuarios', 'App\Http\Controllers\UsuarioController');
Route::resource('clientes', 'App\Http\Controllers\ClienteController');
Route::resource('codigopostales', 'App\Http\Controllers\CodigoPostalController');
Route::resource('delegaciones', 'App\Http\Controllers\DelegacionController');

Route::get('Evento/form','App\Http\Controllers\ControllerEvent@form');
Route::post('Evento/create','App\Http\Controllers\ControllerEvent@create');
Route::get('Evento/details/{id}','App\Http\Controllers\ControllerEvent@details');
Route::get('Evento/index','App\Http\Controllers\ControllerEvent@index');
Route::get('Evento/index/{month}','App\Http\Controllers\ControllerEvent@index_month');
Route::post('Evento/calendario','App\Http\Controllers\ControllerEvent@calendario');
Route::get('Evento/details/delete/{nombre}/{matricula}/{marca}/{modelo}/{fecha}/{hora}','App\Http\Controllers\ControllerEvent@destroy');
// Route::get('Evento/details/update/{nombre}/{matricula}/{marca}/{modelo}/{fecha}/{hora}','App\Http\Controllers\ControllerEvent@update');
