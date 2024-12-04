<?php

namespace App\Jobs;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StoreApiDataJob
{
    /**
     * Ejecutar el job.
     *
     * @return void
     */
    public function handle()
    {
        // Llama a la API para obtener los datos
        $apiKey = "10eef8c025308acae7a77758f992c70d";
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather?q=Santiago,CL&appid={$apiKey}&units=metric');
        $data = $response->json();

        // Supongamos que tu tabla se llama "registros"
        DB::table('registros')->insert([
            'temperatura' => $data['temperatura'],
            'humedad' => $data['humedad'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Opcional: Log para verificar
        logger('Datos almacenados correctamente.');
    }
}
