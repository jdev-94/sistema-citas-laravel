<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Citas Inteligente</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50 text-gray-900 dark:bg-gray-950 dark:text-gray-100">

    <header class="p-6 flex justify-between items-center max-w-7xl mx-auto">
        <div class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
            📅 CitasApp
        </div>
        <nav class="space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Iniciar
                        Sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition shadow-sm">Registrarse</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <main class="max-w-5xl mx-auto px-6 py-20 text-center">
        <h1
            class="text-5xl font-extrabold tracking-tight mb-6 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent dark:from-indigo-400 dark:to-purple-400">
            El sistema de reservas que tu negocio necesita
        </h1>
        <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-10">
            Una solución integral construida para automatizar la agendación de citas, permitiendo a los clientes elegir
            servicios en tiempo real y gestionar su historial de manera eficiente.
        </p>

        <div class="flex justify-center space-x-4 mb-20">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-lg shadow transition">
                    Ir a mis Citas
                </a>
            @else
                <a href="{{ route('register') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-lg shadow transition">
                    Probar Demo Gratis
                </a>
            @endauth
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl border dark:border-gray-800 shadow-sm">
                <div class="text-indigo-600 dark:text-indigo-400 text-2xl mb-3">🛠️</div>
                <h3 class="font-bold text-xl mb-2">Servicios Dinámicos</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Catálogo estructurado alimentado por base de datos
                    relacional mediante Seeders automatizados.</p>
            </div>

            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl border dark:border-gray-800 shadow-sm">
                <div class="text-indigo-600 dark:text-indigo-400 text-2xl mb-3">🔒</div>
                <h3 class="font-bold text-xl mb-2">Autenticación Segura</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Flujo de sesiones protegido con middlewares para
                    asegurar que cada usuario acceda solo a sus citas.</p>
            </div>

            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl border dark:border-gray-800 shadow-sm">
                <div class="text-indigo-600 dark:text-indigo-400 text-2xl mb-3">📊</div>
                <h3 class="font-bold text-xl mb-2">Arquitectura Limpia</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Implementación estricta del patrón MVC aislando la
                    lógica en controladores y optimizando consultas con Eloquent.</p>
            </div>
        </div>
    </main>

    <footer class="border-t dark:border-gray-800 mt-20 py-8 text-center text-sm text-gray-500">
        Proyecto Portafolio - Desarrollado en Laravel & Tailwind CSS
    </footer>

</body>

</html>
