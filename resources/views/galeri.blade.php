@extends('layouts.public')

@section('title', 'Galeri Foto - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white">
    <div class="mx-auto max-w-7xl py-16 px-6 sm:py-24 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Galeri Foto</h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">Dokumentasi kegiatan dan suasana di Kelurahan Kolakaasi.</p>
        </div>

        <div class="mt-12 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8">
            @forelse ($allPhotos as $photo)
            
                <a href="{{ route('galeri.show', $photo->id) }}" 
                   class="group relative block w-full aspect-square overflow-hidden rounded-lg">
                    
                    <img src="{{ asset('storage/'. $photo->image_url) }}" 
                         alt="{{ $photo->caption }}" 
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300"></div>
                    <p class="absolute bottom-0 left-0 right-0 p-4 text-white text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">{{ $photo->caption }}</p>
                </a>

            @empty
                <p class="text-center text-gray-500 col-span-full">Belum ada foto di galeri.</p>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $allPhotos->links() }}
        </div>
    </div>
</div>
@endsection