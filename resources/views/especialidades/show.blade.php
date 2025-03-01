<x-app-layout>

<div class="max-w-3xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Detalles de la Especialidad</h2>

    <div class="bg-gray-50 p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold mb-4">{{ $especialidad->nombre }}</h3>
    </div>

    <a href="{{ route('especialidades.index') }}" class="mt-4 inline-block py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Volver</a>
</div>
</x-app-layout>