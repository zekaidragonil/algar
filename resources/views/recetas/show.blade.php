<x-app-layout>
    <div class="max-w-3xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Detalles de la Receta</h2>
    
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <p class="mb-4"><strong>Cita:</strong> Cita ID: {{ $receta->cita_id }} - {{ $receta->cita->paciente->nombre }} {{ $receta->cita->paciente->apellido }}</p>
            <p class="mb-4"><strong>Medicamento:</strong> {{ $receta->medicamento }}</p>
            <p class="mb-4"><strong>Dosis:</strong> {{ $receta->dosis }}</p>
            <p class="mb-4"><strong>Frecuencia:</strong> {{ $receta->frecuencia }}</p>
            <p class="mb-4"><strong>Duración:</strong> {{ $receta->duracion }}</p>
        </div>
    
        <a href="{{ route('recetas.index') }}" class="mt-4 inline-block py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Volver</a>
    </div>

</x-app-layout>