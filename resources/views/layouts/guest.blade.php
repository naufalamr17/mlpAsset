<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <img src="{{ asset('img/exa.jpg') }}" alt="Background Image" class="fixed top-0 left-0 w-full h-full object-cover z-0" style="filter: brightness(0.6);" />

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg z-10">
            <div class="flex justify-center">
                <img src="{{ asset('img/mlpLogo.jpg') }}" alt="Application Logo" class="w-20 h-20 fill-current text-gray-500 mb-2" />
            </div>
            <h1 class="text-3xl font-bold leading-tight text-center">Log in to your account</h1>
            <p class="text-gray-400 mt-2 mb-4 text-center">Welcome back! Please enter your details.</p>
            {{ $slot }}
        </div>
    </div>
</body>


</html>