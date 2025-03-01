<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Detalles de la Cita</h2>
    
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <p class="mb-4"><strong>Paciente:</strong> {{ $cita->paciente->nombre }} {{ $cita->paciente->apellido }}</p>
            <p class="mb-4"><strong>Médico:</strong> Dr. {{ $cita->medico->nombre }} {{ $cita->medico->apellido }} - {{ $cita->medico->especialidad->nombre }}</p>
            <p class="mb-4"><strong>Fecha y Hora:</strong> {{ $cita->fecha_hora}}</p>
            <p class="mb-4"><strong>Estado:</strong> {{ ucfirst($cita->estado) }}</p>
            <p class="mb-4"><strong>Observaciones:</strong> {{ $cita->observaciones }}</p>
        </div>
    
        <a href="{{ route('citas.index') }}" class="mt-4 inline-block py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Volver</a>
    </div>

</x-app-layout>   