<x-app-layout>
<div class="max-w-3xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
    <a href="{{ route('citas.index') }}" class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Volver</a>
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Crear Cita</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('citas.store') }}" method="POST">
        @csrf
        <div class="flex gap-4">
            <div class="mb-4">
                <label for="paciente_id" class="block text-sm font-medium text-gray-700">Paciente</label>
                <select class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="paciente_id" name="paciente_id" required>
                    <option value="">Seleccione un paciente</option>
                    @foreach ($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                            {{ $paciente->nombre }} {{ $paciente->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-4">
                <label for="medico_id" class="block text-sm font-medium text-gray-700">Médico</label>
                <select class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="medico_id" name="medico_id" required>
                    <option value="">Seleccione un médico</option>
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->id }}" {{ old('medico_id') == $medico->id ? 'selected' : '' }}>
                            Dr. {{ $medico->nombre }} {{ $medico->apellido }} - {{ $medico->especialidad->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex gap-4">
            <div class="mb-4">
                <label for="fecha_hora" class="block text-sm font-medium text-gray-700">Fecha y Hora</label>
                <input type="datetime-local" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="fecha_hora" name="fecha_hora" value="{{ old('fecha_hora') }}" required>
            </div>
    
            <div class="mb-4 w-full">
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="estado" name="estado" required>
                    <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="completada" {{ old('estado') == 'completada' ? 'selected' : '' }}>Completada</option>
                    <option value="cancelada" {{ old('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>
        </div>
        <div class="mb-4 w-full">
            <label for="notas" class="block text-sm font-medium text-gray-700">Notas</label>
            <textarea class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="notas" name="observaciones" rows="3">{{ old('notas') }}</textarea>
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Guardar</button>
    </form>
</div>

</x-app-layout>