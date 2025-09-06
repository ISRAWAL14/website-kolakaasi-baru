@extends('layouts.public')

@section('title', 'Fasilitas Umum - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Fasilitas Umum</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Berikut adalah daftar sarana dan prasarana publik yang tersedia di wilayah Kelurahan Kolakaasi.</p>
        </div>

        <div class="mt-16 space-y-16">
            {{-- Lakukan perulangan untuk setiap KATEGORI fasilitas --}}
            @forelse ($facilitiesByType as $type => $facilities)
                <div>
                    {{-- Tampilkan nama kategori sebagai judul --}}
                    <h3 class="text-2xl font-bold leading-8 tracking-tight text-teal-600 sm:text-3xl">{{ $type }}</h3>
                    
                    {{-- Buat grid untuk fasilitas di dalam kategori ini --}}
                    <div class="mx-auto mt-8 grid max-w-2xl grid-cols-1 gap-8 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                        
                        {{-- Lakukan perulangan untuk setiap FASILITAS --}}
                        @foreach ($facilities as $facility)
                            <div class="flex flex-col rounded-2xl bg-white p-8 text-center shadow-lg ring-1 ring-gray-900/5">
                                <h4 class="text-lg font-semibold leading-8 tracking-tight text-gray-800">{{ $facility->name }}</h4>
                                <p class="mt-4 text-sm leading-6 text-gray-600">{{ $facility->address }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-full">Data fasilitas umum belum tersedia.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection