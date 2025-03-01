<x-app-layout>

    <div class="max-w-6xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Recetas</h2>
    
        <div class="space-x-2">

            <a href="{{ route('recetas.export') }}" class="inline-block px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Descargar Excel
            </a>

            <a href="{{ route('recetas.create') }}" class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Nueva Receta</a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
    
       
    
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="w-full bg-gray-800 text-white">
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Cita</th>
                        <th class="py-2 px-4">Medicamento</th>
                        <th class="py-2 px-4">Dosis</th>
                        <th class="py-2 px-4">Frecuencia</th>
                        <th class="py-2 px-4">Duración</th>
                        <th class="py-2 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recetas as $receta)
                        <tr>
                            <td class="py-2 px-4">{{ $receta->id }}</td>
                            <td class="py-2 px-4">Cita ID: {{ $receta->cita_id }} - {{ $receta->cita->paciente->nombre }} {{ $receta->cita->paciente->apellido }}</td>
                            <td class="py-2 px-4">{{ $receta->medicamento }}</td>
                            <td class="py-2 px-4">{{ $receta->dosis }}</td>
                            <td class="py-2 px-4">{{ $receta->frecuencia }}</td>
                            <td class="py-2 px-4">{{ $receta->duracion }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('recetas.show', $receta) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                |
                                <a href="{{ route('recetas.edit', $receta) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                |
                                <a href="{{ route('recetas.pdf', $receta->id) }}" class="text-indigo-600 hover:text-indigo-900">pdf</a>
                                |
                                <a href="{{ route('correo', $receta->id) }}" class="text-indigo-600 hover:text-indigo-900">correo</a>
                                |
                                <form action="{{ route('recetas.destroy', $receta) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>