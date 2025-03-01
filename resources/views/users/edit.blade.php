<x-app-layout>
    <div class="max-w-3xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
        <a href="{{ route('users.index') }}" class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Volver</a>
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit User</h2>
    
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT') 
            <div class="flex gap-4">
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="password" name="password" value="{{ old('password') }}">
            </div>
    
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
            </div>
            </div>

            @role('admin')
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Rol</label>
                <select id="role" name="role" class="mt-1 block w-full"  id="role" name="role" onchange="toggleEspecialidad()">
                    <option value="admin">Administrador</option>
                    <option value="medico">Médico</option>
                </select>
            </div>
    
             @endrole
         
            <div id="especialidad-container" class="mb-4" style="display: none;">
                <label for="especialidad" class="block text-sm font-medium text-gray-700">
                    Especialidad
                </label>
                <select  class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="especialidad" name="especialidad">
                    <option value="" disabled selected>Seleccione una especialidad</option>
                    <option value="medico">medico</option>
                    @foreach ($especialidades as $especialidad)
                        <option value="{{ $especialidad->nombre }}">{{ $especialidad->nombre }}</option>
                    @endforeach
                </select>
            </div>
    

             @role('medico')
               <input type="text" name="role" value="medico" hidden>
             @endrole
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Guardar</button>
        </form>
    </div>

    <script>
        function toggleEspecialidad() {
            const roleSelect = document.getElementById('role');
            const especialidadContainer = document.getElementById('especialidad-container');

            if (roleSelect.value === 'medico') {
                especialidadContainer.style.display = 'block'; 
            } else {
                especialidadContainer.style.display = 'none'; 
            }
        }
    </script>

</x-app-layout>