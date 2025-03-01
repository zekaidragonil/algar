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
                        <a href="{{ route('users.create') }}" class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Nuevo usuario</a>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="w-full bg-gray-800 text-white">
                                        <th class="py-2 px-4">ID</th>
                                        <th class="py-2 px-4">Email</th>
                                        <th class="py-2 px-4">Rol</th>
                                        <th class="py-2 px-4">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $cita)
                                    <tr class="text-center border-b">
                                        <td class="py-2 px-4">{{ $cita->id }}</td>
                                        <td class="py-2 px-4">{{ $cita->email }}</td>
                                        <td class="py-2 px-4">{{ $cita->roles->first()->name }}</td>
                                      
                                        <td class="py-2 px-4">
                                           
                                            <a href="{{ route('users.edit', $cita->id) }}"
                                                class="ml-4 text-indigo-600 hover:text-indigo-900">Editar</a>
                                           
                                            <form action="{{ route('users.destroy', $cita->id) }}" method="POST" class="inline-block ml-4"
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
                   </div>
                   
                  
               </div>
           </div>
       </div>
   </div>
  
</x-app-layout>
