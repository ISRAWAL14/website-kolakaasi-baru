@extends('layouts.public')

@section('title', 'Prosedur Layanan - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl">Prosedur Layanan Surat</h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">Informasi mengenai alur, persyaratan, dan biaya layanan administrasi di Kelurahan Kolakaasi.</p>
        </div>

        <div class="mx-auto mt-16 max-w-3xl space-y-6">
            @forelse ($services as $service)
                <div x-data="{ open: false }" class="rounded-lg border border-gray-200 bg-gray-50 shadow-sm">
                    <h2>
                        <button @click="open = !open" type="button" class="flex w-full items-center justify-between p-6 text-left font-semibold text-gray-800" :aria-expanded="open">
                            <span>{{ $service->name }}</span>
                            <svg class="h-6 w-6 shrink-0 transform transition-transform duration-200" :class="{'rotate-180': open, 'rotate-0': !open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </h2>
                    <div x-show="open" x-cloak class="prose max-w-none p-6 pt-0">
                        <h4 class="font-bold">Persyaratan:</h4>
                        <p>{!! nl2br(e($service->requirements)) !!}</p>

                        <h4 class="font-bold mt-4">Alur Proses:</h4>
                        <p>{!! nl2br(e($service->flow)) !!}</p>

                        <div class="mt-4 text-sm flex justify-between border-t pt-4">
                            <span><strong>Estimasi Waktu:</strong> {{ $service->duration }}</span>
                            <span><strong>Biaya:</strong> {{ $service->cost }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500">
                    <p>Belum ada data layanan yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection 