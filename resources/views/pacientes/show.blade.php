<x-app-layout>
    
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Detalles del Paciente</h2>
    
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">{{ $paciente->nombre }} {{ $paciente->apellido }}</h3>
            <p class="mb-2"><strong>Email:</strong> {{ $paciente->email }}</p>
            <p class="mb-2"><strong>Teléfono:</strong> {{ $paciente->telefono }}</p>
            <p class="mb-2"><strong>Dirección:</strong> {{ $paciente->direccion }}</p>
            <p class="mb-2"><strong>Fecha de Nacimiento:</strong> {{ $paciente->fecha_nacimiento }}</p>
            <p class="mb-2"><strong>Género:</strong> {{ ucfirst($paciente->genero) }}</p>
        </div>
    
        <a href="{{ route('pacientes.index') }}" class="mt-4 inline-block py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Volver</a>
    </div>
    
</x-app-layout>