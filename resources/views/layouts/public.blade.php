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

    <header x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
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
                <a href="{{ route('layanan.page') }}" class="hover:text-teal-600">Layanan</a>
            </div>

            <a href="{{ route('login') }}" class="hidden md:block bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700">Login Admin</a>

            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-800 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </nav>

        <div :class="{'block': open, 'hidden': !open}" class="md:hidden pb-4">
            <a href="{{ route('profile.page') }}" class="block px-6 py-2 text-sm hover:bg-gray-100">Profil</a>
            <a href="{{ route('perangkat.page') }}" class="block px-6 py-2 text-sm hover:bg-gray-100">Perangkat</a>
            <a href="{{ route('fasilitas.page') }}" class="block px-6 py-2 text-sm hover:bg-gray-100">Fasilitas</a>
            <a href="{{ route('pengumuman.page') }}" class="block px-6 py-2 text-sm hover:bg-gray-100">Pengumuman</a>
            <a href="{{ route('agenda.page') }}" class="block px-6 py-2 text-sm hover:bg-gray-100">Agenda</a>
            <a href="{{ route('galeri.page') }}" class="block px-6 py-2 text-sm hover:bg-gray-100">Galeri</a>
            <a href="{{ route('kontak.page') }}" class="block px-6 py-2 text-sm hover:bg-gray-100">Kontak</a>
            <a href="{{ route('layanan.page') }}" class="block px-6 py-2 text-sm hover:bg-gray-100">Layanan</a>
            <div class="border-t border-gray-200 mt-2 pt-2 px-6">
                <a href="{{ route('login') }}" class="block w-full text-center bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700">Login Admin</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} KKN REGULER UHO BATCH 2 KELURAHAN KOLAKAASI</p>
        </div>
    </footer>

</body>
</html>