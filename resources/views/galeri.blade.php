@extends('layouts.public')

@section('title', 'Galeri Foto - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl">Galeri Foto</h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">Dokumentasi kegiatan di Kelurahan Kolakaasi.</p>
        </div>

        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @forelse ($albums as $album)
                <a href="{{ route('galeri.show', $album) }}" class="block group">
                    <div class="relative overflow-hidden rounded-2xl shadow-lg transition-shadow duration-300 group-hover:shadow-xl">
                        <img src="{{ $album->photos->first() ? asset('storage/' . $album->photos->first()->path) : 'https://source.unsplash.com/random/800x600/?placeholder' }}" 
                             alt="{{ $album->title }}" 
                             class="w-full h-60 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6">
                            <p class="text-sm text-gray-300">{{ \Carbon\Carbon::parse($album->date)->translatedFormat('d F Y') }}</p>
                            <h3 class="text-xl font-bold text-white mt-1">{{ $album->title }}</h3>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-center text-gray-500 col-span-full">Belum ada album foto yang diunggah.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection