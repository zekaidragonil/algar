<x-app-layout>
    <div class="max-w-3xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
        <a href="{{ route('facturas.index') }}" class="inline-block mb-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500">Volver</a>
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Crear Factura</h2>
    
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('facturas.store') }}" method="POST">
            @csrf
    
            <div class="mb-4">
                <label for="cita_id" class="block text-sm font-medium text-gray-700">Cita</label>
                <select class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="cita_id" name="cita_id" required>
                    <option value="">Seleccione una cita</option>
                    @foreach ($citas as $cita)
                        <option value="{{ $cita->id }}" {{ old('cita_id') == $cita->id ? 'selected' : '' }}>
                            Cita ID: {{ $cita->id }} - {{ $cita->paciente->nombre }} {{ $cita->paciente->apellido }} - {{ $cita->fecha_hora }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-4">
                <label for="monto_total" class="block text-sm font-medium text-gray-700">Monto Total</label>
                <input type="number" step="0.01" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="monto_total" name="monto_total" value="{{ old('monto_total') }}" required>
            </div>
    
            <div class="mb-4">
                <label for="metodo_pago" class="block text-sm font-medium text-gray-700">Método de Pago</label>
                <select class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="metodo_pago" name="metodo_pago" required>
                    <option value="efectivo" {{ old('metodo_pago') == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                    <option value="tarjeta" {{ old('metodo_pago') == 'tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                    <option value="transferencia" {{ old('metodo_pago') == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
                </select>
            </div>
    
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Guardar</button>
        </form>
    </div>

</x-app-layout>