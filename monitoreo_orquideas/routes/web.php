<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiDataController;

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

use App\Http\Controllers\WeatherController;

// Ruta para exportar datos del clima en PDF
Route::get('/clima/export/pdf', [WeatherController::class, 'exportPDF'])->name('weather.export.pdf');

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'Conexión exitosa';
    } catch (\Exception $e) {
        return 'Error al conectar: ' . $e->getMessage();
    }
});

Route::get('/guardar-datos', [ApiDataController::class, 'guardarDatos'])->name('guardar-datos');



