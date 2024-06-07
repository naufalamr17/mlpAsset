<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                            <div @click="open = ! open">
                                <button class="inline-flex items-center px-1 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>Inventory Asset</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>

                            <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute z-50 mt-2 w-48 rounded-md shadow-lg ltr:origin-top-left rtl:origin-top-right start-0" style="display: none;" @click="open = false">
                                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                    <div class="px-3 py-2"><x-nav-link :href="route('inventory')" :active="request()->routeIs('inventory')">
                                            {{ __('Input Asset') }}
                                        </x-nav-link></a></div>
                                    <div class="px-3 py-2"><x-nav-link :href="route('repair_inventory')" :active="request()->routeIs('repair_inventory')">
                                            {{ __('Repair Asset') }}
                                        </x-nav-link></a></div>
                                    <div class="px-3 py-2"><x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard!!')">
                                            {{ __('Dispose Asset') }}
                                        </x-nav-link></a></div>
                                    <div class="px-3 py-2"><x-nav-link :href="route('history_inventory')" :active="request()->routeIs('history_inventory')">
                                            {{ __('History Asset') }}
                                        </x-nav-link></a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mt-4">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard!!')">
                            {{ __('Report') }}
                        </x-nav-link>
                    </li>
                    <li class="mt-4">
                        <x-nav-link :href="route('user_center')" :active="request()->routeIs('user_center')">
                            {{ __('User') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="flex-1">
            @if (isset($header))
            <header class="bg-white shadow flex justify-between items-center">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </header>

            @endif

            <main class="p-1">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>