<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profil Kelurahan Kolakaasi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-teal-600">Kelurahan Kolakaasi</a>
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('profile.page') }}" class="hover:text-teal-600">Profil</a>
                <a href="{{ route('perangkat.page') }}" class="hover:text-teal-600">Perangkat</a>
                <a href="{{ route('fasilitas.page') }}" class="hover:text-teal-600">Fasilitas</a>
                <a href="{{ route('pengumuman.page') }}" class="hover:text-teal-600">Pengumuman</a>
                <a href="{{ route('agenda.page') }}" class="hover:text-teal-600">Agenda</a>
                <a href="{{ route('galeri.page') }}" class="hover:text-teal-600">Galeri</a>
                <a href="{{ route('kontak.page') }}" class="hover:text-teal-600">Kontak</a>
                <!-- [KODE BARU] Link untuk halaman layanan -->
                <a href="{{ route('layanan.page') }}" class="hover:text-teal-600">Layanan</a>
            </div>
            <a href="{{ route('login') }}" class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700">Login Admin</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} Kelurahan Kolakaasi. All rights reserved.</p>
            <p class="text-sm text-gray-400 mt-2">Dibuat dengan Laravel & Tailwind CSS</p>
        </div>
    </footer>

    </body>
</html>