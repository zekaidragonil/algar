<!DOCTYPE html>
<html>
<head>
    <title>Informe de Citas</title>
</head>
<body>
    <h1>Informe Médico</h1>
    <h2>Paciente: {{$informe->cita->paciente->name }}</h2>
    <p><strong>Fecha y Hora de la Cita:</strong> {{ $informe->cita->fecha_hora }}</p>
    <p><strong>Médico:</strong> {{ $informe->cita->medico->name }}</p>
        <p><strong>Estado:</strong> {{ $informe->cita->estado }}</p>
        <p><strong>Observaciones de la Cita:</strong> {{ $informe->cita->observaciones }}</p>

        <h3>Descripción del Informe Médico:</h3>
        <p>{{ $informe->descripcion }}</p>

        <hr>
 
</body>
</html>
