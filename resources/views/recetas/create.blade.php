<x-app-layout>
    <div class="max-w-3xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
        <a href="{{ route('recetas.index') }}" class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Volver</a>
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Crear Receta</h2>
    
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('recetas.store') }}" method="POST">
            @csrf
    
            <div class="mb-4">
                <label for="cita_id" class="block text-sm font-medium text-gray-700">Cita</label>
                <select class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="cita_id" name="cita_id" required>
                    <option value="">Seleccione una cita</option>
                    @foreach ($citas as $cita)
                        <option value="{{ $cita->id }}" {{ old('cita_id') == $cita->id ? 'selected' : '' }}>
                            Cita ID: {{ $cita->id }} - {{ $cita->paciente->nombre }} {{ $cita->paciente->apellido }} - {{ $cita->fecha_hora }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-4">
                <label for="medicamento" class="block text-sm font-medium text-gray-700">Medicamento</label>
                <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="medicamento" name="medicamento" value="{{ old('medicamento') }}" required>
            </div>
    
            <div class="mb-4">
                <label for="dosis" class="block text-sm font-medium text-gray-700">Dosis</label>
                <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="dosis" name="dosis" value="{{ old('dosis') }}" required>
            </div>
    
            <div class="mb-4">
                <label for="frecuencia" class="block text-sm font-medium text-gray-700">Frecuencia</label>
                <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="frecuencia" name="frecuencia" value="{{ old('frecuencia') }}" required>
            </div>
    
            <div class="mb-4">
                <label for="duracion" class="block text-sm font-medium text-gray-700">Duración</label>
                <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="duracion" name="duracion" value="{{ old('duracion') }}" required>
            </div>
    
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Guardar</button>
        </form>
    </div>

</x-app-layout>