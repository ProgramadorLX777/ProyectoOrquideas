<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        header {
            background: #4CAF50;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }

        .container {
            display: flex;
            justify-content: space-around;
            margin: 2rem;
        }

        .box {
            width: 30%;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            text-align: center;
            border-radius: 8px;
        }

        box h3 {
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .box button {
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .box button:hover {
            background: #45a049;
        }

        .box h3 {
            margin: 1rem 0;
            font-size: 1.2rem;
        }

        .btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <h1>Dashboard - Monitoreo de Orquídeas</h1>
    </header>
    <div class="container">
        <div class="box">
            <h3>Calendario de Riego</h3>
            <p>Visualizar los próximos riegos.</p>
            <button onclick="window.location.href='/calendario-riego'">Ver Calendario</button>
        </div>
        <!--
        <div class="box">
            <h3>Datos en Tiempo Real</h3>
            <p>Consulta la temperatura y humedad actuales.</p>
            <li>
                <a href="{{ route('datos.tiempoReal') }}">Datos en Tiempo Real</a>
            </li>
        </div>-->

        <div class="box">
            <h3>Datos en Tiempo Real</h3>
            <p>Consulta la temperatura y humedad actuales.</p>
            <div id="datos_tiempo_real">
                <p>Temperatura: <span id="temperatura">Cargando...</span> °C</p>
                <p>Humedad: <span id="humedad">Cargando...</span> %</p>
            </div>
        </div>

        <div class="box">
            <h3>Activar Sensores</h3>
            <p>Para comenzar con el regado de las orquídeas solo debe presionar el botón a continuación:</p>
            <button id="activar-riego"
            style="margin-top: 10px; background: #2196F3; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Activar Riego
        </button>
        </div>


    </div>

    <div class="container">
        <div class="box">
            <div class="dashboard-info">
                <h3>Valores ideales para las orquídeas</h3>
                <p><strong>Temperatura ideal:</strong> {{ $temperaturaIdeal[0] }}°C - {{ $temperaturaIdeal[1] }}°C</p>
                <p><strong>Humedad ideal:</strong> {{ $humedadIdeal[0] }}% - {{ $humedadIdeal[1] }}%</p>
                <form method="GET" action="{{ route('weather.export.pdf') }}">
                    <button type="submit">Exportar a PDF</button>
                </form>
            </div>
        </div>
    </div>

    <!--<div class="container">
        <h1>Insertar Datos Base de Datos:</h1>

        <form action="{{ route('guardar-datos') }}" method="GET">
            <button type="submit" class="btn btn-primary">Guardar Datos desde API</button>
        </form>
    </div>-->

    <!--<div class="container">
        <h1>Clima de Santiago</h1>
        <div class="weather-info">
            <p><strong>Temperatura:</strong> {{ $weather['temperatura'] ?? 'N/A' }} °C</p>
            <p><strong>Humedad:</strong> {{ $weather['humedad'] ?? 'N/A' }} %</p>
            <p><strong>Descripción:</strong> {{ $weather['descripcion'] ?? 'N/A' }}</p>
        </div>
        <form method="GET" action="{{ route('weather.export.pdf') }}">
            <button type="submit">Exportar a PDF</button>
        </form>
    </div>-->

    <!--<div class="box">
        <h3>Datos en Tiempo Real</h3>
        <p>Consulta la temperatura y humedad actuales.</p>
        <div id="datos_tiempo_real">
            <p>Temperatura: <span id="temperatura">Cargando...</span> °C</p>
            <p>Humedad: <span id="humedad">Cargando...</span> %</p>
        </div>

    </div>-->


    <script>
        // Función para obtener datos del servidor
        async function obtenerDatos() {
            try {
                const response = await fetch('/obtener-datos');
                const data = await response.json();

                // Mostrar los datos en el dashboard
                document.getElementById('temperatura').innerText = data.temperatura;
                document.getElementById('humedad').innerText = data.humedad;
            } catch (error) {
                console.error('Error al obtener los datos:', error);
            }
        }

        // Actualizar los datos cada 5 segundos
        setInterval(obtenerDatos, 2000);

        // Cargar los datos inicialmente
        obtenerDatos();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Elementos del DOM
            const temperaturaElement = document.getElementById('temperatura');
            const humedadElement = document.getElementById('humedad');
            const botonRiego = document.getElementById('activar-riego');

            // Valores iniciales (simulados)
            let temperaturaActual = 25; // Por ejemplo, 25°C
            let humedadActual = 50; // Por ejemplo, 50%

            // Mostrar valores iniciales
            temperaturaElement.innerText = temperaturaActual;
            humedadElement.innerText = humedadActual;

            // Función para activar el riego
            botonRiego.addEventListener('click', () => {
                botonRiego.disabled = true; // Deshabilitar el botón mientras está en ejecución
                botonRiego.innerText = "Riego Activado...";

                const intervalo = setInterval(() => {
                    // Disminuir temperatura y aumentar humedad
                    if (temperaturaActual > 20) {
                        temperaturaActual -= 0.2; // Disminuir gradualmente
                    }
                    if (humedadActual < 70) {
                        humedadActual += 0.5; // Aumentar gradualmente
                    }

                    // Actualizar en pantalla
                    temperaturaElement.innerText = temperaturaActual.toFixed(1);
                    humedadElement.innerText = humedadActual.toFixed(1);

                    // Detener el intervalo cuando se alcancen los valores objetivo
                    if (temperaturaActual <= 20 && humedadActual >= 70) {
                        clearInterval(intervalo);
                        botonRiego.disabled = false; // Rehabilitar el botón
                        botonRiego.innerText = "Activar Riego"; // Resetear el texto del botón
                    }
                }, 500); // Actualizar cada 500ms (0.5 segundos)
            });
        });
    </script>


</body>

</html>
