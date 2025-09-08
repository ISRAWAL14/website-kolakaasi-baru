@extends('layouts.public')

@section('title', 'Beranda - Kelurahan Kolakaasi')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="relative h-screen bg-cover bg-center flex items-center justify-center text-white" style="background-image: url('https://source.unsplash.com/random/1920x1080/?village,indonesia');">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 text-center px-4">
            
            <!-- Pesan Selamat Datang -->
            <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg">Selamat Datang di Kelurahan Kolakaasi</h1>
            <p class="text-lg md:text-xl drop-shadow-md mb-12">Maju, Mandiri, dan Berbudaya</p>

            <!-- Tautan Cepat -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('layanan.page') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-6 rounded-lg transition-transform transform hover:scale-105 shadow-lg">
                    Cek Layanan Surat
                </a>
                <a href="{{ route('pengumuman.page') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-6 rounded-lg transition-transform transform hover:scale-105 shadow-lg">
                    Lihat Pengumuman
                </a>
                <a href="{{ route('profile.page') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-6 rounded-lg transition-transform transform hover:scale-105 shadow-lg">
                    Profil Kelurahan
                </a>
            </div>
            
        </div>
    </section>
@endsection