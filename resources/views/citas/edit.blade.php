<x-app-layout>
    <div class="max-w-3xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Tomar cita</h2>
    
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('citas.update', $cita) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex gap-4">
            <div class="mb-4">
                <label for="fecha_hora" class="block text-sm font-medium text-gray-700">Fecha y Hora</label>
                <input type="datetime-local" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="fecha_hora" name="fecha_hora" value="{{ old('fecha_hora', $cita->fecha_hora) }}" required>
            </div>
    
            <div class="mb-4 w-full">
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="estado" name="estado" required>
                    <option value="pendiente" {{ old('estado', $cita->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="completada" {{ old('estado', $cita->estado) == 'completada' ? 'selected' : '' }}>Completada</option>
                    <option value="cancelada" {{ old('estado', $cita->estado) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>
            </div>
            <div class="mb-4">
                <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                <textarea class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="observaciones" name="observaciones" rows="3">{{ old('observaciones', $cita->observaciones) }}</textarea>
            </div>
    
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Actualizar</button>
        </form>
    </div>
</x-app-layout>