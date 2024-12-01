<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Riego</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            text-align: center;
        }

        header {
            background: #0c204f;
            color: white;
            padding: 1rem 0;
        }

        h1 {
            margin: 0;
            font-size: 1.8rem;
        }

        table {
            width: 90%;
            max-width: 1000px;
            margin: 2rem auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #0c204f;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #0c204f;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f7f7f7;
        }

        /* Días con riego programado */
        .riego {
            background-color: #d5f4c4;
            color: #2a2a2a;
            font-weight: bold;
        }

        .riego p {
            margin: 0;
            font-size: 0.9rem;
        }

        .dia-oscuro {
            background-color: #f2f2f2;
        }

        .boton-regresar {
            display: inline-block;
            margin: 2rem auto;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .boton-regresar:hover {
            background: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <h1>Calendario de Riego Orquídeas</h1>
    </header>

    <table>
        <thead>
            <tr>
                <th>Domingo</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="dia-oscuro"></td>
                <td class="dia-oscuro"></td>
                <td class="dia-oscuro"></td>
                <td class="dia-oscuro"></td>
                <td>1</td>
                <td class="riego">
                    <p>Se comienza el riego desde las</p>
                    <p>09:00 hrs</p>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="riego">
                    <p>Se comienza el riego desde las</p>
                    <p>07:00 hrs</p>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td class="riego">
                    <p>Se comienza el riego desde las</p>
                    <p>09:00 hrs</p>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="riego">
                    <p>Se comienza el riego desde las</p>
                    <p>07:00 hrs</p>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td class="riego">
                    <p>Se comienza el riego desde las</p>
                    <p>09:00 hrs</p>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="riego">
                    <p>Se comienza el riego desde las</p>
                    <p>07:00 hrs</p>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td class="riego">
                    <p>Se comienza el riego desde las</p>
                    <p>09:00 hrs</p>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="riego">
                    <p>Se comienza el riego desde las</p>
                    <p>07:00 hrs</p>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td class="riego">
                    <p>Se comienza el riego desde las</p>
                    <p>09:00 hrs</p>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <a href="/dashboard" class="boton-regresar">Volver al Dashboard</a>
</body>

</html>
