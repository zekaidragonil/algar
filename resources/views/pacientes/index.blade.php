<x-app-layout>

    <div class="max-w-6xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Pacientes</h2>
    
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
    
        <a href="{{ route('pacientes.create') }}" class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Nuevo Paciente</a>
    
        <div class="overflow-x-auto">
            <table class="overflow-x-auto">
                <thead>
                    <tr class="w-full bg-gray-800 text-white">
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Nombre</th>
                        <th class="py-2 px-4">Apellido</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">Teléfono</th>
                        <th class="py-2 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr class="text-center border-b">
                            <td class="py-2 px-4">{{ $paciente->id }}</td>
                            <td class="py-2 px-4">{{ $paciente->nombre }}</td>
                            <td class="py-2 px-4">{{ $paciente->apellido }}</td>
                            <td class="py-2 px-4">{{ $paciente->email }}</td>
                            <td class="py-2 px-4">{{ $paciente->telefono }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('pacientes.show', $paciente) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                <a href="{{ route('pacientes.edit', $paciente) }}" class="ml-4 text-yellow-600 hover:text-yellow-900">Editar</a>
                                <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" class="inline ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro de eliminar este paciente?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>