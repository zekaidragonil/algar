<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas Médicas</title>
</head>
<body>
    <h1>Recetas Médicas</h1>
    <p>Lista de recetas:</p>

    <ul>
            <li>
                <strong>medico:</strong> {{ $medico }}<br>
                <strong>paciente:</strong> {{ $paciente }}<br>
                <strong>Medicamento:</strong> {{ $medicamento }}<br>
                <strong>Dosis:</strong> {{ $dosis }}<br>
                <strong>Frecuencia:</strong> {{ $frecuencia }}<br>
                <strong>Duración:</strong> {{ $duracion }}<br>
            </li>
            <hr>
    </ul>

    <p>Gracias por utilizar nuestro servicio de gestión de recetas médicas.</p>
</body>
</html>