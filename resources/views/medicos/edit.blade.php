<x-app-layout>

    <div class="max-w-3xl mx-auto mt-20 p-6 bg-white rounded-lg shadow-md">
        <a href="{{ route('medicos.index') }}" class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Volver</a>
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Editar Médico</h2>
    
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('medicos.update', $medico) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex gap-4">
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="nombre" name="nombre" value="{{ old('nombre', $medico->nombre) }}" required>
            </div>
    
            <div class="mb-4">
                <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
                <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="apellido" name="apellido" value="{{ old('apellido', $medico->apellido) }}" required>
            </div>
            </div>
            <div class="flex gap-4">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="email" name="email" value="{{ old('email', $medico->email) }}" required>
            </div>
    
            <div class="mb-4">
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="telefono" name="telefono" value="{{ old('telefono', $medico->telefono) }}" required>
            </div>
            </div>
            <div class="mb-4">
                <label for="especialidad_id" class="block text-sm font-medium text-gray-700">Especialidad</label>
                <select class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="especialidad_id" name="especialidad_id" required>
                    @foreach ($especialidades as $especialidad)
                        <option value="{{ $especialidad->id }}" {{ old('especialidad_id', $medico->especialidad_id) == $especialidad->id ? 'selected' : '' }}>
                            {{ $especialidad->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Actualizar</button>
        </form>
    </div>
</x-app-layout>