<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApiDataController extends Controller
{
    public function guardarDatos()
    {
        try {
            // Hacer la solicitud a la API
            $apiKey = "10eef8c025308acae7a77758f992c70d";
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather?q=Santiago,CL&appid={$apiKey}&units=metric');  // Reemplaza con la URL de tu API

            if ($response->successful()) {
                $data = $response->json(); // Obtener los datos en formato JSON

                // Aquí debes ajustar los campos según la estructura de los datos de la API
                foreach ($data as $item) {
                    DB::table('orquideas2')->insert([
                        'temperatura' => $item['temperatura'],
                        'humedad' => $item['humedad'],
                    ]);
                }

                return redirect()->back()->with('success', 'Datos guardados correctamente.');
            } else {
                return redirect()->back()->with('error', 'Error al obtener datos de la API.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al procesar la solicitud: ' . $e->getMessage());
        }
    }
}
