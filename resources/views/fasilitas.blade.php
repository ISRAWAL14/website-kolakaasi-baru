@extends('layouts.public')

@section('title', 'Fasilitas Umum - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Fasilitas Umum</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Berikut adalah daftar sarana dan prasarana publik yang tersedia di wilayah Kelurahan Kolakaasi.</p>
        </div>
        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @forelse ($allFacilities as $facility)
            <div class="flex flex-col rounded-2xl bg-white p-8 text-center shadow-lg ring-1 ring-gray-900/5">
                <h3 class="text-lg font-semibold leading-8 tracking-tight text-teal-600">{{ $facility->name }}</h3>
                <p class="mt-4 text-sm leading-6 text-gray-600">{{ $facility->address }}</p>
                <p class="order-first text-sm font-semibold tracking-tight text-gray-500">{{ $facility->type }}</p>
            </div>
            @empty
            <p class="text-center text-gray-500 col-span-full">Data fasilitas umum belum tersedia.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection