<html>
<head>
    <title>facturas</title>
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
    <h1>facturas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Citas</th>
                <th>Total</th>
                <th>Metodo de pago</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($recetas as $receta)
                <tr>
                    <td>{{ $receta->id }}</td>
                    <td>{{ $receta->cita->paciente->nombre }}</td>
                    <td>{{ $receta->monto_total }}</td>
                    <td>{{ $receta->metodo_pago }}</td>
            
                </tr>
                @endforeach
              
   
        </tbody>
    </table>
</body>
</html>