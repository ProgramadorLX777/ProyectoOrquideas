<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class WeatherController extends Controller
{

    private $apiKey = "10eef8c025308acae7a77758f992c70d";

    /**
     * Obtiene los datos de la API y los muestra en la vista.
     */
    public function showWeather()
    {
        $url = "https://api.openweathermap.org/data/2.5/weather?q=Santiago,CL&appid={$this->apiKey}&units=metric";

        // Realizar la solicitud HTTP a la API
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            // Pasar los datos a la vista
            return view('dashboard', [
                'weather' => [
                    'temperatura' => $data['main']['temp'],
                    'humedad' => $data['main']['humidity'],
                    'descripcion' => $data['weather'][0]['description'],
                ]
            ]);
        }

        // Si falla la solicitud, redirigir con un mensaje de error
        return redirect()->back()->with('error', 'No se pudieron obtener los datos del clima.');
    }

    /**
     * Exporta los datos del clima a un PDF.
     */
    public function exportPDF()
    {
        $url = "https://api.openweathermap.org/data/2.5/weather?q=Santiago,CL&appid={$this->apiKey}&units=metric";
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            $weather = [
                'temperatura' => $data['main']['temp'],
                'humedad' => $data['main']['humidity'],
                'descripcion' => $data['weather'][0]['description'],
            ];

            // Generar el PDF con los datos
            $pdf = pdf::loadView('pdf.weather', compact('weather'));

            // Descargar el PDF
            return $pdf->download('reporte_clima_orquideas.pdf');
        }

        return redirect()->back()->with('error', 'No se pudieron obtener los datos del clima para generar el PDF.');
    }
}
