<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reservar una Cita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf <h3 class="text-lg font-medium mb-4">1. Selecciona un Servicio</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        @foreach ($services as $service)
                            <label
                                class="border p-4 rounded-lg block cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <input type="radio" name="service_id" value="{{ $service->id }}"
                                    {{ old('service_id') == $service->id ? 'checked' : '' }} required class="mr-2">
                                <span class="font-bold">{{ $service->name }}</span>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $service->description }}</p>
                                <div class="mt-2 text-sm font-semibold">
                                    Duración: {{ $service->duration_minutes }} mins | Precio: ${{ $service->price }}
                                </div>
                            </label>
                        @endforeach
                    </div>

                    <h3 class="text-lg font-medium mb-4">2. Elige Fecha y Hora</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Fecha</label>
                            <input type="date" name="appointment_date" value="{{ old('appointment_date') }}" required
                                class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Hora</label>
                            <input type="time" name="appointment_time" value="{{ old('appointment_time') }}"
                                required
                                class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-sm transition">
                            Confirmar Reserva
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
