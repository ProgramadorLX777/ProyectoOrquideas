<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DatosController extends Controller
{
    public function obtenerDatos()
    {
        try {
            // URL del servicio API
            $apiKey = "10eef8c025308acae7a77758f992c70d";
            $url = "https://api.openweathermap.org/data/2.5/weather?q=Santiago,CL&appid={$apiKey}&units=metric";

            // Realizar la petición
            $response = Http::get($url);

            // Verificar si la petición fue exitosa
            if ($response->successful()) {
                $datos = $response->json();

                // Obtener datos específicos
                $temperatura = $datos['main']['temp'] ?? 'No disponible';
                $humedad = $datos['main']['humidity'] ?? 'No disponible';

                // Log de datos
                logger("Temperatura: {$temperatura} °C");
                logger("Humedad: {$humedad} %");

                // Retornar JSON al navegador
                return response()->json([
                    'temperatura' => $temperatura,
                    'humedad' => $humedad
                ]);
            } else {
                return response()->json(['error' => 'Error al obtener datos del servidor'], $response->status());
            }
        } catch (\Exception $e) {
            // Manejo de errores en caso de excepción
            return response()->json(['error' => 'No se pudo conectar al servidor: ' . $e->getMessage()], 500);
        }
    }

    public function mostrarVistaTiempoReal()
    {
        return view('datos_tiempo_real'); // Nombre del archivo de la vista
    }

    public function showDashboard()
    {
        // Valores ideales para las orquídeas
        $temperaturaIdeal = [18, 24]; // Rango de temperatura ideal en grados Celsius
        $humedadIdeal = [50, 70]; // Rango de humedad ideal en porcentaje

        return view('dashboard', compact('temperaturaIdeal', 'humedadIdeal'));
    }
}
