<x-app-layout>

    <div class="max-w-6xl mt-20 mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Facturas</h2>
    
        <a href="{{ route('facturas.create') }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                nueva factura
            </a>
        <a href="{{ route('facturas.export') }}" class="inline-block px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Descargar Excel
            </a>
          
           
    
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
                                <a href="{{ route('facturas.show', $factura) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                |
                                <a href="{{ route('facturas.edit', $factura) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                |
                                <a href="{{ route('factura.correo', $factura->id) }}" class="text-indigo-600 hover:text-indigo-900">Correo</a>
                                |
                                <form action="{{ route('facturas.destroy', $factura) }}" method="POST" class="inline">
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
</x-app-layout>