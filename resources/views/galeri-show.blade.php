@extends('layouts.public')

@section('title', $album->title . ' - Galeri Foto')

@section('content')
<div class="bg-white py-16 sm:py-24" 
     x-data="{ 
         show: false, 
         photos: {{ json_encode($album->photos->pluck('path')->map(fn($path) => asset('storage/' . $path))) }}, 
         currentIndex: 0,
         next() { this.currentIndex = (this.currentIndex + 1) % this.photos.length; },
         prev() { this.currentIndex = (this.currentIndex - 1 + this.photos.length) % this.photos.length; }
     }"
     @keydown.escape.window="show = false"
     @keydown.arrow-right.window="next()"
     @keydown.arrow-left.window="prev()">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center mb-16">
            <p class="text-base font-semibold leading-7 text-teal-600">{{ \Carbon\Carbon::parse($album->date)->translatedFormat('d F Y') }}</p>
            <h2 class="text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl">{{ $album->title }}</h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">{{ $album->description }}</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($album->photos as $index => $photo)
                <button @click="show = true; currentIndex = {{ $index }}">
                    <div class="group relative overflow-hidden rounded-lg shadow-md bg-white p-2 border border-gray-200">
                        <div class="aspect-video w-full">
                            <img src="{{ asset('storage/' . $photo->path) }}" 
                                 alt="Foto dari {{ $album->title }}" 
                                 class="w-full h-full object-cover rounded-md transition-transform duration-300 group-hover:scale-105">
                        </div>
                    </div>
                </button>
            @empty
                 <p class="text-center text-gray-500 col-span-full">Tidak ada foto di dalam album ini.</p>
            @endforelse
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('galeri.page') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                Kembali ke Galeri
            </a>
        </div>
    </div>

    <div x-show="show" x-cloak 
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 backdrop-blur-sm"
         @click.self="show = false">
        
        <button @click="show = false" class="absolute top-4 right-4 text-white text-4xl z-50">&times;</button>
        
        <button @click.stop="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 p-2 bg-white/20 rounded-full text-white z-50">
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        </button>

        <div class="relative w-full max-w-4xl h-full max-h-[80vh]">
            <img :src="photos[currentIndex]" class="w-full h-full object-contain">
        </div>

        <button @click.stop="next()" class="absolute right-4 top-1/2 -translate-y-1/2 p-2 bg-white/20 rounded-full text-white z-50">
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </button>
    </div>
</div>
@endsection