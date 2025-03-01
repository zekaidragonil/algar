<html>
<head>
    <title>Recetas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Recetas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cita</th>
                <th>Medicamento</th>
                <th>Dosis</th>
                <th>Frecuencia</th>
                <th>Duración</th>
            </tr>
        </thead>
        <tbody>

                <tr>
                    <td>{{ $recetas->id }}</td>
                    <td>Cita ID: {{ $recetas->cita_id }} - {{ $recetas->cita->paciente->nombre }} {{ $recetas->cita->paciente->apellido }}</td>
                    <td>{{ $recetas->medicamento }}</td>
                    <td>{{ $recetas->dosis }}</td>
                    <td>{{ $recetas->frecuencia }}</td>
                    <td>{{ $recetas->duracion }}</td>
                </tr>
   
        </tbody>
    </table>
</body>
</html>