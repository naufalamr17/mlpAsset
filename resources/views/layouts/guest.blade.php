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

<body class="font-sans text-gray-900 antialiased bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-row bg-white shadow-md rounded-lg overflow-hidden w-full sm:max-w-6xl min-h-[70vh]">
            <div class="flex flex-col items-start justify-center pl-6 ml-24 sm:pl-10 p-10 sm:w-1/2 bg-white"> <img src="{{ asset('img/mlpLogo.jpg') }}" alt="Application Logo" class="w-48 h-48 fill-current text-gray-500" />
            </div>
            <div class="w-full mr-10 mt-11 mb-11 sm:w-1/2 px-6 py-4">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('img/mlpLogo.jpg') }}" alt="Application Logo" class="w-20 h-20 fill-current text-gray-500" />
                </div>
                <h1 class="text-3xl font-bold leading-tight text-center">Log in to your account</h1>
                <p class="text-gray-400 mt-2 mb-4 text-center">Welcome back! Please enter your details.</p>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>


</html>