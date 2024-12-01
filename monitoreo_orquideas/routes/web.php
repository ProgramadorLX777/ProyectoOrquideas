<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/obtener-datos', [App\Http\Controllers\DatosController::class, 'obtenerDatos']);
Route::get('/datos_tiempo_real', [App\Http\Controllers\DatosController::class, 'mostrarVistaTiempoReal'])->name('datos.tiempoReal');
Route::get('/api/datos', [App\Http\Controllers\DatosController::class, 'obtenerDatos'])->name('datos.obtener');
Route::get('/dashboard', [DatosController::class, 'showDashboard']);
Route::get('/calendario-riego', function () {
    return view('calendario-riego');
});

