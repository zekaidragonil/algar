<x-app-layout>
    <form action="{{ route('recetas.send-email') }}" method="POST" class="mb-6">
        @csrf
        <input type="hidden" name="id_receta" value="{{ $id_receta }}">
        <div class="flex items-center space-x-4 mt-20">
            <input type="email" name="email" placeholder="Correo electrónico" required class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Enviar por Correo
            </button>
        </div>
    </form>
</x-app-layout>
