<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Citas Reservadas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-medium">Historial de Reservas</h3>
                    <a href="{{ route('appointments.create') }}"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow-sm transition text-sm">
                        + Nueva Cita
                    </a>
                </div>

                @if ($appointments->isEmpty())
                    <p class="text-gray-500 dark:text-gray-400 text-center py-4">Aún no tienes ninguna cita reservada.
                    </p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b dark:border-gray-700 text-gray-500 dark:text-gray-400 text-sm">
                                    <th class="pb-3">Servicio</th>
                                    <th class="pb-3">Fecha</th>
                                    <th class="pb-3">Hora</th>
                                    <th class="pb-3">Precio</th>
                                    <th class="pb-3">Estado</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y dark:divide-gray-700">
                                @foreach ($appointments as $appointment)
                                    <tr class="text-sm">
                                        <td class="py-3 font-semibold">{{ $appointment->service->name }}</td>
                                        <td class="py-3">
                                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y') }}
                                        </td>
                                        <td class="py-3">
                                            {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}
                                            hs</td>
                                        <td class="py-3">${{ $appointment->service->price }}</td>
                                        <td class="py-3">
                                            <form action="{{ route('appointments.updateStatus', $appointment->id) }}"
                                                method="POST" class="flex items-center space-x-2">
                                                @csrf
                                                @method('PATCH')

                                                <select name="status"
                                                    class="text-xs font-bold rounded-lg px-2 py-1 border border-gray-300 dark:border-gray-600 bg-transparent focus:ring-2 focus:ring-indigo-500
                                                    {{ $appointment->status === 'pendiente' ? 'text-yellow-600 dark:text-yellow-400' : '' }}
                                                    {{ $appointment->status === 'finalizada' ? 'text-green-600 dark:text-green-400' : '' }}
                                                    {{ $appointment->status === 'rechazada' ? 'text-red-600 dark:text-red-400' : '' }}">

                                                    <option value="pendiente"
                                                        {{ $appointment->status === 'pendiente' ? 'selected' : '' }}>
                                                        Pendiente</option>
                                                    <option value="finalizada"
                                                        {{ $appointment->status === 'finalizada' ? 'selected' : '' }}>
                                                        Finalizada</option>
                                                    <option value="rechazada"
                                                        {{ $appointment->status === 'rechazada' ? 'selected' : '' }}>
                                                        Rechazada</option>
                                                </select>

                                                <button type="submit"
                                                    class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 p-1 rounded-md transition title='Guardar estado'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
