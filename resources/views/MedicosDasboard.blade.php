<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
             {{ auth()->user()->roles()->first()->name }}
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
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="w-full bg-gray-800 text-white">
                                        <th class="py-2 px-4">ID</th>
                                        <th class="py-2 px-4">Paciente</th>
                                        <th class="py-2 px-4">Medico</th>
                                        <th class="py-2 px-4">especialidad</th>
                                        <th class="py-2 px-4">fecha hora</th>
                                        <th class="py-2 px-4">Estado</th>
                                        <th class="py-2 px-4">opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                   @foreach ($citas as $cita)
                                   <tr class="text-center border-b">
                                    <td class="py-2 px-4">{{ $cita->id }}</td>
                                    <td class="py-2 px-4">{{ $cita->paciente->name }}</td> 
                                    <td class="py-2 px-4">{{ $cita->medico->name }}</td>
                                    <td class="py-2 px-4">{{ $cita->especialidad }}</td>
                                    <td class="py-2 px-4">{{ $cita->fecha_hora }}</td> 
                                    <td class="py-2 px-4">{{ $cita->estado }}</td>
                                    <td class="py-2 px-4">
                                        <a href="{{ route('citas.edit', $cita->id) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">Tomar cita</a>
                                        
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