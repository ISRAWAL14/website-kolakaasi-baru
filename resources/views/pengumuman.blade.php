@extends('layouts.public')

@section('title', 'Pengumuman - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Pengumuman Kelurahan</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Informasi dan pengumuman resmi terbaru dari Kelurahan Kolakaasi untuk masyarakat.</p>
        </div>
        <div class="mx-auto mt-16 max-w-2xl space-y-16 lg:mx-0 lg:max-w-none">
            @forelse ($allAnnouncements as $announcement)
            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="{{ $announcement->created_at->toIso8601String() }}" class="text-gray-500">
                        {{ $Carbon::parse($announcement->created_at)->translatedFormat('d F Y') }}
                    </time>
                    <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Info Kelurahan</a>
                </div>
                <div class="group relative">
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        <a href="#">
                            <span class="absolute inset-0"></span>
                            {{ $announcement->title }}
                        </a>
                    </h3>
                    <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $announcement->content }}</p>
                </div>
                <div class="relative mt-8 flex items-center gap-x-4">
                    <div class="text-sm leading-6">
                        <p class="font-semibold text-gray-900">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                {{ $announcement->author }}
                            </a>
                        </p>
                    </div>
                </div>
            </article>
            @empty
            <p class="text-center text-gray-500 col-span-full">Belum ada pengumuman yang tersedia.</p>
            @endforelse

            <div class="mt-16">
                {{ $allAnnouncements->links() }}
            </div>
        </div>
    </div>
</div>
@endsection