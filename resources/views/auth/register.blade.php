<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf


        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

         <input type="text" value="admin" name="role" hidden>
         <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />

            <select id="role" name="role" class="block mt-1 text-black w-full" required onchange="toggleEspecialidad()">
                <option value="paciente">Paciente</option>
                <option value="medico">Médico</option>
                <option value="admin">Administrador</option>
            </select>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        
        <div id="especialidad-container" class="mt-4 text-black" style="display: none;">
            <x-input-label for="especialidad" :value="__('Especialidad')" />
            <select id="especialidad" name="especialidad" class="block mt-1 w-full">
                <option value="" disabled selected>Seleccione una especialidad</option>
                @foreach ($especialidades as $especialidad)
                    <option value="{{ $especialidad->nombre }}">{{ $especialidad->nombre }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('especialidad')" class="mt-2" />
        </div>

        <!-- Botón de Registro -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

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
</x-guest-layout>
