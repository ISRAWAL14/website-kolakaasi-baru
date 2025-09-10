@extends('layouts.public')

@section('title', $album->title . ' - Galeri Foto')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="mx-auto max-w-4xl text-center bg-gray-50 dark:bg-gray-800/50 p-8 sm:p-12 rounded-2xl shadow-lg mb-16">
            <p class="text-base font-semibold leading-7 text-teal-600 dark:text-teal-400">
                {{ \Carbon\Carbon::parse($album->date)->translatedFormat('d F Y') }}
            </p>
            <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-5xl">
                {{ $album->title }}
            </h2>
            <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">
                {{ $album->description }}
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($album->photos as $photo)
                <a href="{{ asset('storage/' . $photo->path) }}" class="glightbox" data-gallery="gallery-{{ $album->id }}">
                    <div class="group relative overflow-hidden rounded-lg shadow-md bg-white p-2 border border-gray-200">
                        <div class="aspect-video w-full">
                            <img src="{{ asset('storage/' . $photo->path) }}" 
                                 alt="Foto dari {{ $album->title }}" 
                                 class="w-full h-full object-cover rounded-md transition-transform duration-300 group-hover:scale-105">
                        </div>
                    </div>
                </a>
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
</div>
@endsection