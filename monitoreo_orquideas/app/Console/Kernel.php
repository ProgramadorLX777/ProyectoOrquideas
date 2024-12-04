<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define los comandos que deben ser registrados.
     *
     * @var array
     */
    protected $commands = [
        // Registra aquí los comandos personalizados si tienes
        // Ejemplo:
        // Commands\GuardarDatosAPI::class,
    ];

    /**
     * Define el programador de tareas.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    /*protected function schedule(Schedule $schedule)
    {
        // Programa el comando para guardar los datos de la API cada minuto.
        $schedule->command('datos:guardar')->everyMinute();
    }*/

    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new \App\Jobs\StoreApiDataJob)->everyMinute();
    }


    /**
     * Registra los comandos personalizados.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
