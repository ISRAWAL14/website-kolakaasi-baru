@extends('layouts.public')

@section('title', 'Perangkat Kelurahan - Kelurahan Kolakaasi')

@section('content')

<div class="bg-white py-16 sm:py-24"
    x-data="{
        showModal: false,
        selectedPerangkat: null,
        // PERBAIKAN 1: Kita gunakan $allPerangkat langsung, karena sudah bukan objek paginasi
        allPerangkat: {{ Js::from($allPerangkat) }}
    }"
    @keydown.escape.window="showModal = false">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Perangkat Kelurahan</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Berikut adalah susunan perangkat yang bertugas di Kelurahan Kolakaasi.</p>
        </div>

        <div class="mx-auto mt-16 grid max-w-none grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($allPerangkat as $index => $perangkat)
                {{-- PERBAIKAN 2: @click sekarang langsung merujuk ke allPerangkat --}}
                <div @click="showModal = true; selectedPerangkat = allPerangkat[{{ $index }}]"
                    class="cursor-pointer bg-white border border-gray-200 rounded-lg shadow-md p-8 text-center flex flex-col items-center transition-transform duration-300 hover:-translate-y-2 hover:shadow-xl">
                    
                    <img class="h-32 w-32 rounded-full object-cover mb-4 ring-4 ring-gray-100" 
                         src="{{ $perangkat->foto ? asset('storage/' . $perangkat->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($perangkat->name) . '&color=FFFFFF&background=14B8A6' }}" 
                         alt="Foto {{ $perangkat->name }}">
                    
                    <div class="mt-4">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $perangkat->name }}</h3>
                        <p class="text-lg text-teal-600 mt-1">{{ $perangkat->position }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-full">Data perangkat kelurahan belum tersedia.</p>
            @endforelse
        </div>
        
        {{-- PERBAIKAN 3: Menghapus tombol paginasi karena tidak digunakan lagi --}}
    </div>

    <!-- Kode HTML untuk Modal Pop-up Detail (Tetap sama) -->
    <div x-show="showModal" 
         x-cloak
         x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 backdrop-blur-sm p-4">

        <button @click="showModal = false" class="absolute top-4 right-4 text-white text-4xl z-50">&times;</button>

        <div x-show="showModal"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
             @click.outside="showModal = false"
             class="relative bg-white w-full max-w-4xl max-h-[90vh] rounded-2xl shadow-xl overflow-y-auto">
            
             <div class="md:flex" x-if="selectedPerangkat">
                <!-- Kolom Foto -->
                <div class="md:w-1/3">
                    <img :src="selectedPerangkat.foto ? '/storage/' + selectedPerangkat.foto : 'https://ui-avatars.com/api/?name=' + encodeURIComponent(selectedPerangkat.name) + '&color=FFFFFF&background=14B8A6&size=512'" 
                         :alt="'Foto ' + selectedPerangkat.name"
                         class="w-full h-full object-cover md:rounded-l-2xl">
                </div>
                <!-- Kolom Detail Data -->
                <div class="p-8 md:p-12 md:w-2/3">
                    <h2 class="text-4xl font-bold text-gray-900" x-text="selectedPerangkat.name"></h2>
                    <p class="mt-2 text-2xl font-semibold text-teal-600" x-text="selectedPerangkat.position"></p>
                    <p class="mt-1 text-sm text-gray-500" x-show="selectedPerangkat.masa_jabatan" x-text="'Masa Jabatan: ' + selectedPerangkat.masa_jabatan"></p>

                    <hr class="my-6">
                    
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Tugas Pokok & Fungsi:</h3>
                    <p class="text-gray-600 prose" x-text="selectedPerangkat.tupoksi || 'Informasi tugas pokok belum tersedia.'"></p>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection