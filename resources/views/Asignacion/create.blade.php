<x-app-layout>
 

    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Dashboard') }}
           {{auth()->user()->roles->first()->name}}
       </h2>
   </x-slot>

  

   <div class="py-12 w-full">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class=" overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                   <div class="container mx-auto px-4 py-8">
                       <div class="bg-white shadow-md rounded-lg p-6">
                        <a href="{{ route('asignacion.index') }}" class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Volver</a>
                        <form action="{{ route('asignacion.store') }}" method="POST" class="bg-white p-6 rounded-md shadow-md">
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
                        
                       </div>
                   </div>
                   
                  
               </div>
           </div>
       </div>
   </div>
  
</x-app-layout>
