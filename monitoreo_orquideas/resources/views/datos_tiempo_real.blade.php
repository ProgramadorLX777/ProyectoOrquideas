<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos en Tiempo Real</title>
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
            margin: 2rem auto;
            max-width: 80%;
            background: white;
            padding: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Datos en Tiempo Real</h1>
        <a href="/dashboard" style="color: white; text-decoration: none;">Volver al Dashboard</a>
    </header>
    <div class="container">
        <h2>Monitoreo en Tiempo Real</h2>
        <p>Temperatura: <span id="temperatura">Cargando...</span> °C</p>
        <p>Humedad: <span id="humedad">Cargando...</span> %</p>
    </div>
    <script>
        async function obtenerDatos() {
            try {
                const response = await fetch('/obtener-datos');
                const data = await response.json();
                document.getElementById('temperatura').textContent = data.temperatura || 'No disponible';
                document.getElementById('humedad').textContent = data.humedad || 'No disponible';
            } catch (error) {
                console.error('Error al obtener los datos:', error);
            }
        }

        // Llama a la función para actualizar los datos cada 5 segundos
        setInterval(obtenerDatos, 20000);
        obtenerDatos();
    </script>
</body>
</html>
