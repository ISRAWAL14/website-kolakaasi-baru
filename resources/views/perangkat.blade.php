@extends('layouts.public')

@section('title', 'Perangkat Kelurahan - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Perangkat Kelurahan</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Berikut adalah susunan perangkat yang bertugas di Kelurahan Kolakaasi.</p>
        </div>
        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-4">
            @forelse ($allPerangkat as $perangkat)
            <div class="rounded-lg bg-gray-50 p-6 text-center shadow-md ring-1 ring-gray-900/5">
                <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">{{ $perangkat->name }}</h3>
                <p class="text-sm leading-6 text-gray-600">{{ $perangkat->position }}</p>
            </div>
            @empty
            <p class="text-center text-gray-500 col-span-full">Data perangkat kelurahan belum tersedia.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection