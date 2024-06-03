<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex">
        <aside class="bg-white w-1/5 min-w-0 max-w-full">
            <div class="p-6">
                <div class="flex items-center">
                    <img src="{{ asset('img/mlpLogo.jpg') }}" alt="Application Logo" class="w-20 h-20 fill-current text-gray-500" />

                    <div class="ml-4">
                        <h1 class="text-xl font-semibold mb-1">MLP</h1>
                    </div>
                </div>
                <br>
                <hr>
                <ul class="mt-4 space-y-4">
                    <li class="mt-4">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </li>
                    <li class="mt-4">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard!!')">
                            {{ __('Inventory Asset') }}
                        </x-nav-link>
                    </li>
                    <li class="mt-4">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard!!')">
                            {{ __('Report') }}
                        </x-nav-link>
                    </li>
                    <li class="mt-4">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard!!')">
                            {{ __('User') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="flex-1">
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif

            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>