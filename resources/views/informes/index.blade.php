<x-app-layout>

    <div class="max-w-6xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Informes</h2>
    
       
            <a href="{{ route('informe.export') }}" class="inline-block px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Descargar Excel
            </a>
         
            <a href="{{ route('informes.create') }}" class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Nuevo Informe</a>
    
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
                        <th class="py-2 px-4">Descripción</th>
                        <th class="py-2 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informes as $informe)
                        <tr class="text-center border-b">
                            <td class="py-2 px-4">{{ $informe->id }}</td>
                            <td class="py-2 px-4">Cita ID: {{ $informe->cita_id }} - {{ $informe->cita->paciente->nombre }} {{ $informe->cita->paciente->apellido }} - {{ $informe->cita->fecha_hora }}</td>
                            <td class="py-2 px-4">{{ Str::limit($informe->descripcion, 50) }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('informes.show', $informe) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                <a href="{{ route('informes.edit', $informe) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">Editar</a>
                                <a href="{{ route('informe.pdf', $informe->id) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">pdf</a>
                                <a href="{{ route('inf.correo', $informe->id) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">correo</a>
                                <form action="{{ route('informes.destroy', $informe) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('¿Está seguro de que desea eliminar este informe?');">
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