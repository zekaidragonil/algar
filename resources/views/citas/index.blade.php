<x-app-layout>
    <div class="max-w-6xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Citas</h2>

        {{--  <div class="space-x-2">

            <a href="{{ route('cita.export') }}" class="inline-block px-4 py-2 bg-green-500 text-white font-semibold
        rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
        Descargar Excel
        </a>
        <a href="{{ route('correo') }}"
            class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Enviar por Correo
        </a>

        <a href="{{ route('citas.create') }}"
            class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Nueva
            Cita</a>
    </div>
    --}}

    @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('medicos.store') }}" method="POST" class="bg-white p-6 rounded-md shadow-md">
    @csrf

    <h2 class="text-lg font-bold mb-4">Asignar Cita</h2>

    <div class="mb-4">
        <label for="doctor_id" class="block text-gray-700 font-medium">Doctor</label>
        <select id="doctor_id" name="doctor_id" class="border-gray-300 rounded w-full p-2 bg-white" required>
            <option value="" disabled selected>Seleccione un doctor</option>
            @foreach ($doctores as $doctor)
                <option value="{{ $doctor->id }}">Dr: {{ $doctor->name }} - especialidad: {{ $doctor->especilidad }}</option>
            @endforeach
        </select>
    </div>


    <div class="mb-4">
        <label for="cita_id" class="block text-gray-700 font-medium">Cita</label>
        <select id="cita_id" name="asignado" class="border-gray-300 rounded w-full p-2 bg-white" required>
            <option value="" disabled selected>Seleccione una cita</option>
            @foreach ($citas as $cita)
                <option value="{{ $cita->id }}">Paciente: {{ $cita->paciente->name  }} - Especialidad: {{ $cita->especialidad }}</option>
            @endforeach
        </select>
    </div>
     <div class="flex justify-center">
         <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">
             Asignar Cita
         </button>
     </div>

</form>


    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="w-full bg-gray-800 text-white">
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">doctor</th>
                    <th class="py-2 px-4">Cita asignada Asignado</th>
                    <th class="py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignacion as $cita)
                <tr class="text-center border-b">
                    <td class="py-2 px-4">{{ $cita->id }}</td>
                    <td class="py-2 px-4">Dr -{{ $cita->user->name }}</td>
                    <td class="py-2 px-4">Paciente -{{ $cita->cita->paciente->name }}</td>
                  
                    <td class="py-2 px-4">
                       
                        <a href="{{ route('citas.edit', $cita) }}"
                            class="ml-4 text-indigo-600 hover:text-indigo-900">Editar</a>
                        <a href="{{ route('cita.pdf', $cita->id) }}"
                            class="ml-4 text-indigo-600 hover:text-indigo-900">pdf</a>
                        <form action="{{ route('citas.destroy', $cita) }}" method="POST" class="inline-block ml-4"
                            onsubmit="return confirm('¿Está seguro de que desea eliminar esta cita?');">
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