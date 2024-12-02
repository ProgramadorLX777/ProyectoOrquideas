<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte del Clima</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        h1 {
            color: #4CAF50;
        }
        .weather-info {
            margin-top: 20px;
        }
        .weather-info p {
            font-size: 16px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Reportes valores orquídeas</h1>
    <div class="weather-info">
        <p><strong>Temperatura:</strong> {{ $weather['temperatura'] }} °C</p>
        <p><strong>Humedad:</strong> {{ $weather['humedad'] }} %</p>
        <p><strong>Descripción:</strong> {{ $weather['descripcion'] }}</p>
    </div>
</body>
</html>
