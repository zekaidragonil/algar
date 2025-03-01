<html>
<head>
    <title>Cita</title>
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
    <h1>Cita</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Fecha y Hora</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
  
                <tr>
                    <td>{{ $recetas->id }}</td>
                    <td>{{ $recetas->paciente->nombre }}</td>
                    <td>{{ $recetas->medico->name }}</td>
                    <td>{{ $recetas->fecha_hora }}</td>
                    <td>{{ $recetas->estado }}</td>
                </tr>
   
        </tbody>
    </table>
</body>
</html>