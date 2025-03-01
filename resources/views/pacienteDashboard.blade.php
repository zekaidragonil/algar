<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto px-4 py-8">
                        <div class="mb-8">
                            <h3 class="text-lg font-bold text-indigo-600">Bienvenido a nuestro consultorio</h3>
                            <p class="text-gray-700 mt-2">
                                Nuestro consultorio médico se especializa en brindar atención de calidad en una 
                                variedad de áreas médicas, asegurando un cuidado integral para nuestros pacientes. 
                                Contamos con un equipo de médicos altamente calificados y especialistas en distintas disciplinas 
                                para atender tus necesidades de salud.
                            </p>
                        </div>
                        @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                        @endif


                        <form action="{{ route('citas.store') }}" method="POST"
                            class="bg-white p-6 rounded-md shadow-md">
                            @csrf

                            <h2 class="text-lg font-bold mb-4">Solicitar Cita</h2>


                            <div class="flex items-center space-x-4">
                                <label for="especialidad" class="form-label font-medium"> Especialidad</label>

                                <select class=" border-gray-300 w-86  rounded p-2 bg-white" id="especialidad"
                                    name="especialidad" required>
                                    <option value="" selected disabled>Seleccione una especialidad</option>
                                    @foreach ($especialidades as $a)
                                    <option value="{{$a->nombre}}">{{ $a->nombre}}</option>
                                    @endforeach
                                </select>


                                <button type="submit"
                                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">
                                    Solicitar Cita
                                </button>
                            </div>
                        </form>


                        <div style="margin-top:20px" class="mt-16 overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr class="w-full bg-gray-800 text-white">
                                        <th class="py-2 px-4">id</th>
                                        <th class="py-2 px-4">Nombre del Paciente</th>
                                        <th class="py-2 px-4">Especialidad Solicitada</th>
                                        <th class="py-2 px-4">Estatus</th>
                                        <th class="py-2 px-4">Doctor</th>
                                        <th class="py-2 px-4">Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($citas as $cita)
                                    <tr class="text-center border-b">
                                        <td class="py-2 px-4">{{ $cita->id }}</td>
                                        <td class="py-2 px-4">{{ $cita->paciente->name }}</td>
                                        <td class="py-2 px-4">{{ $cita->especialidad }}</td>
                                        <td class="py-2 px-4">{{ ucfirst($cita->estado) }}</td>
                                        <td class="py-2 px-4">
                                            {{ $cita->medico ? $cita->medico->name : 'Por asignar' }}
                                        </td>                                        
                                        <td class="py-2 px-4">{{$cita->fecha_hora}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                         
                        <div class="mt-20 overflow-x-auto">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Infome medico') }}
                            </h2>
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
                                                <a href="{{ route('informe.pdf', $informe->id) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">pdf</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-20 overflow-x-auto">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Receta') }}
                            </h2>
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
                                                <a href="{{ route('recetas.pdf', $receta->id) }}" class="text-indigo-600 hover:text-indigo-900">pdf</a> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-20 overflow-x-auto">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Factura') }}
                            </h2>
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="w-full bg-gray-800 text-white">
                                        <th class="py-2 px-4">ID</th>
                                        <th class="py-2 px-4">Cita</th>
                                        <th class="py-2 px-4">Monto Total</th>
                                        <th class="py-2 px-4">Método de Pago</th>
                                        <th class="py-2 px-4">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($facturas as $factura)
                                        <tr class="text-center border-b">
                                            <td class="py-2 px-4">{{ $factura->id }}</td>
                                            <td class="py-2 px-4">Cita ID: {{ $factura->cita_id }} - {{ $factura->cita->paciente->nombre }} {{ $factura->cita->paciente->apellido }}</td>
                                            <td class="py-2 px-4">${{ number_format($factura->monto_total, 2) }}</td>
                                            <td class="py-2 px-4">{{ ucfirst($factura->metodo_pago) }}</td>
                                            <td class="py-2 px-4">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>