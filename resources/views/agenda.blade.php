@extends('layouts.public')

@section('title', 'Agenda Kegiatan - Kelurahan Kolakaasi')

@section('content')
<div class="bg-gray-50 py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Agenda Kegiatan</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Jadwal dan informasi kegiatan yang akan atau telah diselenggarakan di Kelurahan Kolakaasi.</p>
        </div>
        <div class="mx-auto mt-16 max-w-2xl space-y-8 lg:mx-0 lg:max-w-none">
            @forelse ($allAgendas as $agenda)
            <div class="flex flex-col sm:flex-row items-center gap-x-8 gap-y-4 rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                <div class="flex-none text-center sm:border-r sm:border-gray-200 sm:pr-8">
                    <p class="text-4xl font-bold text-teal-600">{{ $Carbon::parse($agenda->date)->format('d') }}</p>
                    <p class="text-lg text-gray-500">{{ $Carbon::parse($agenda->date)->format('M Y') }}</p>
                </div>
                <div class="flex-auto">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ $agenda->title }}</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-600">{{ $agenda->description }}</p>
                    <p class="mt-2 text-xs font-semibold text-gray-500">
                        <span>{{ $agenda->location }}</span> |
                        <span>Pukul: {{ $Carbon::parse($agenda->time)->format('H:i') }} WITA</span>
                    </p>
                </div>
            </div>
            @empty
            <p class="text-center text-gray-500 col-span-full">Belum ada agenda kegiatan yang tersedia.</p>
            @endforelse

            <div class="mt-16">
                {{ $allAgendas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection