<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dato;
use Illuminate\Support\Facades\Http;

class GuardarDatosAPI extends Command
{
    protected $signature = 'datos:guardar'; // Nombre del comando
    protected $description = 'Obtiene los datos de la API y los guarda en la base de datos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Llamada a la API para obtener datos
        $response = Http::get('URL_DE_TU_API'); // Reemplaza con la URL real de tu API

        if ($response->ok()) {
            $datos = $response->json();

            // Guardar datos en la base de datos
            Dato::create([
                'temperatura' => $datos['temperatura'],
                'humedad' => $datos['humedad']
            ]);

            $this->info('Datos guardados correctamente.');
        } else {
            $this->error('Error al obtener los datos de la API.');
        }
    }
}
