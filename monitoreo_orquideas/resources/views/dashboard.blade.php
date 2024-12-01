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
    </style>
</head>

<body>
    <header>
        <h1>Dashboard - Monitoreo de Orquídeas</h1>
    </header>
    <div class="container">
        <div class="box">
            <h3>Calendario de Riego</h3>
            <p>Planifica y visualiza los próximos riegos.</p>
            <button onclick="window.location.href='/calendario-riego'">Ver Calendario</button>
        </div>
        <div class="box">
            <h3>Datos en Tiempo Real</h3>
            <p>Consulta la temperatura y humedad actuales.</p>
            <li>
                <a href="{{ route('datos.tiempoReal') }}">Datos en Tiempo Real</a>
            </li>
        </div>
        <div class="box">
            <h3>Conectar Sensores</h3>
            <p>Administra y configura los sensores.</p>
        </div>
    </div>
    <div class="box">
        <h3>Datos en Tiempo Real</h3>
        <p>Consulta la temperatura y humedad actuales.</p>
        <div id="datos_tiempo_real">
            <p>Temperatura: <span id="temperatura">Cargando...</span> °C</p>
            <p>Humedad: <span id="humedad">Cargando...</span> %</p>
        </div>
    </div>

    <div class="box">
        <div class="dashboard-info">
            <h3>Valores ideales para las orquídeas</h3>
            <p><strong>Temperatura ideal:</strong> {{ $temperaturaIdeal[0] }}°C - {{ $temperaturaIdeal[1] }}°C</p>
            <p><strong>Humedad ideal:</strong> {{ $humedadIdeal[0] }}% - {{ $humedadIdeal[1] }}%</p>
        </div>
    </div>

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

</body>

</html>
