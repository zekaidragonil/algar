<x-app-layout>
 

     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            {{auth()->user()->roles->first()->name}}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card de Pacientes -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="bg-blue-500 p-3 rounded-full text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-2a4 4 0 00-8 0v2m4-7a4 4 0 100-8 4 4 0 000 8z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-700">Pacientes</h4>
                            <p class="text-gray-500">{{ $pacientesCount }} registrados</p>
                        </div>
                    </div>
                </div>

                <!-- Card de Médicos -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="bg-green-500 p-3 rounded-full text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.656-1.79 3-4 3s-4-1.344-4-3m8 0c0 1.656 1.79 3 4 3s4-1.344 4-3m-8 0V9c0-.656.534-1.191 1.2-1.438A2 2 0 0116 7.732M8 11V9c0-.656-.534-1.191-1.2-1.438A2 2 0 004 7.732" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-700">Médicos</h4>
                            <p class="text-gray-500">{{ $medicosCount }} registrados</p>
                        </div>
                    </div>
                </div>

                <!-- Card de Especialidades -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="bg-yellow-500 p-3 rounded-full text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 9.75v2.25m4.5-2.25v2.25m2.25-2.25a2.25 2.25 0 10-4.5 0v.75a2.25 2.25 0 104.5 0v-.75zM3 21.75a2.25 2.25 0 002.25-2.25h13.5A2.25 2.25 0 0021 19.5v-15a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 4.5v15z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-700">Especialidades</h4>
                            <p class="text-gray-500">{{ $especialidadesCount }} disponibles</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto px-4 py-8">
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Calendario de Citas</h2>
                    
                            <div id="calendar"></div>
                        </div>
                    </div>
                    
                   
                </div>
            </div>
        </div>
    </div>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var events = @json($citas);

           console.log(events);
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: events
          });
          calendar.render();
        });
  
      </script>
</x-app-layout>
