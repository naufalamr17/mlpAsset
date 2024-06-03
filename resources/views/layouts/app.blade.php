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
    <div class="min-h-screen bg-gray-100 flex"> <!-- Menggunakan flexbox untuk tata letak -->
        <!-- Sidebar -->
        <aside class="bg-white w-1/5 min-w-0 max-w-full"> <!-- Menetapkan lebar sidebar -->
            <!-- Isi sidebar di sini -->
            <!-- Contoh: -->
            <div class="p-6">
                <div class="flex items-center">
                    <!-- Gambar -->
                    <img src="{{ asset('img/mlpLogo.jpg') }}" alt="Application Logo" class="w-20 h-20 fill-current text-gray-500" />

                    <!-- Teks -->
                    <div class="ml-4">
                        <h1 class="text-xl font-semibold mb-1">MLP</h1>
                        <!-- Teks tambahan, jika ada -->
                    </div>
                </div>

                <ul class="mt-4">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Menu 2</a></li>
                    <li><a href="#">Menu 3</a></li>
                    <!-- Tambahkan menu sesuai kebutuhan -->
                </ul>
            </div>
        </aside>

        <div class="flex-1"> <!-- Menetapkan flex-grow untuk konten utama agar mengisi sisa ruang -->
            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main class="p-4"> <!-- Memberikan padding agar konten tidak terlalu dekat dengan sisi -->
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>